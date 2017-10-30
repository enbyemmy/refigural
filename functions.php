<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/roots/pull/1042
 */
$roots_includes = array(
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/wrapper.php',         // Theme wrapper class
  'lib/sidebar.php',         // Sidebar class
  'lib/config.php',          // Configuration
  'lib/activation.php',      // Theme activation
  'lib/titles.php',          // Page titles
  'lib/nav.php',             // Custom nav modifications
  'lib/gallery.php',         // Custom [gallery] modifications
  'lib/scripts.php',         // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
);

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


if ( function_exists( 'add_image_size' ) ) {
// add_image_size( 'new-size', 350, 250, true ); //(cropped)
}
add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
$addsizes = array(
"new-size" => __( "New Size")
);
$newsizes = array_merge($sizes, $addsizes);
return $newsizes;
}

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Two Column',  
			'block' => 'div',  
			'classes' => 'twocol',
			'wrapper' => true,
			
		),  
		array(  
			'title' => 'One Column',  
			'block' => 'div',  
			'classes' => 'onecol',
			'wrapper' => true,
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  

function my_theme_add_editor_styles() {
    add_editor_style( 'body.css' );
}
add_action( 'after_setup_theme', 'my_theme_add_editor_styles' ); 


add_filter( 'wp_title', 'filter_wp_title' );
/**
 * Filters the page title appropriately depending on the current page
 *
 * This function is attached to the 'wp_title' fiilter hook.
 *
 * @uses	get_bloginfo()
 * @uses	is_home()
 * @uses	is_front_page()
 */
function filter_wp_title( $title ) {
	$filtered_title = strtolower(str_replace('|', '~', $title));
	return $filtered_title;
}

/**
 * Disable responsive image support (test!)
 */

// Clean the up the image from wp_get_attachment_image()
add_filter( 'wp_get_attachment_image_attributes', function( $attr )
{
    if( isset( $attr['sizes'] ) )
        unset( $attr['sizes'] );

    if( isset( $attr['srcset'] ) )
        unset( $attr['srcset'] );

    return $attr;

 }, PHP_INT_MAX );

// Override the calculated image sizes
add_filter( 'wp_calculate_image_sizes', '__return_false',  PHP_INT_MAX );

// Override the calculated image sources
add_filter( 'wp_calculate_image_srcset', '__return_false', PHP_INT_MAX );

// Remove the reponsive stuff from the content
remove_filter( 'the_content', 'wp_make_content_images_responsive' );


function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
				update_option('image_default_link_type', 'none');

	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

function theme_gallery_defaults( $settings ) {
    $settings['galleryDefaults']['columns'] = 0;
    $settings['galleryDefaults']['size'] = 'full'	;

    return $settings;
}
add_filter( 'media_view_settings', 'theme_gallery_defaults' );

//add_filter( 'the_content', 'remove_width_attribute', 10);


/**
 * Add styles/classes to the "Styles" drop-down
 */ 
add_filter( 'tiny_mce_before_init', 'fb_mce_before_init' );

function fb_mce_before_init( $settings ) {

    $style_formats = array(
        array(
        	'title' => 'paragraph',
        	'block' => 'p',
    	),    	
        array(
        	'title' => 'caption italicized',
        	'block' => 'p',
        	'classes' => 'caption-italicized'
    	),
        array(
        	'title' => 'caption',
        	'block' => 'p',
        	'classes' => 'caption'
    	),
    	array(
            'title' => 'pullquote',
            'block' => 'p',
            'classes' => 'pullquote'
        ),
    	array(
            'title' => 'header',
            'block' => 'h2',
        ),
        array(
            'title' => 'announce',
            'block' => 'div',
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

/* modify the gallery code */
add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 1,
        'size' => 'medium',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }
    // Here's your actual output, you may customize it to your need
    $output = '<div class="gallery';
    if ($attr["link"] == "file")
    	$output .= '';
    $output .= '">';

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
//      $img = wp_get_attachment_image_src($id, 'medium');
//      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
        $img = wp_get_attachment_image_src($id, 'full');
        if ($attr["link"] == "file"){
	        $output .= '<a>';
       }
        $output .= "<p><img class=\"lazy\" src=\"/wp-content/themes/refigural/assets/img/gray.jpg\" data-original=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"\" />\n</p>";
        if ($attr["link"] == "file"){
	        $output .= '</a>';
        
	    }
        if ($attachment->post_excerpt != "" && $attr["link"] != "file"){
        	$output .= '<p class="caption">' . $attachment->post_excerpt . '</p>';
        }
    }

    $output .= "</div>\n";

    return $output;
}
