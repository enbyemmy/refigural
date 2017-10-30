<?php // get the call to action banner ?>

<?php // check if it's the home page ?>
<?php if (is_front_page()){ ?>
<?php
        $your_query = new WP_Query( 'pagename=call-to-action-module' ); // I used a category id 1 as an example
        //var_dump($my_query);
    while ( $your_query->have_posts() ) : $your_query->the_post();
        ?>
<?php $banner = get_field('cta_banner_image');

//calcultate image ratio
$img_ratio = $banner['width'] / $banner['height'];

 ?>
<?php //var_dump($banner); ?>
<?php if (get_field("cta_enabled")){ ?>
<img class="placeholder-banner" src="<?php echo $banner['url']; ?>" style="visibility: hidden; position: absolute;" /><div class="call-to-action" style="background-image: url('<?php echo $banner['url']; ?>');">
<a class="blocklink" href="<?php echo (get_field('cta_banner_link')); ?>">Kickstarter</a>
<?php
	the_content();
    // reset post data (important!)
    wp_reset_postdata();
     ?>
</div>
<?php } ?>
<?php endwhile; ?>
<?php } ?>
<header class="banner navbar navbar-default navbar-static-top" role="banner">
<a id="top"></a>
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
	
    </nav>
  </div>
</header>
