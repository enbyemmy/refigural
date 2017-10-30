<?php while (have_posts()) : the_post(); ?>
	
  <article <?php post_class(); ?>>

	<?php $backgroundvideo =  get_field('background_video'); ?>
	<?php if ($backgroundvideo) { ?>
	<script>
	window.bgvideo = '<?php echo $backgroundvideo; ?>';
	</script>

	<?php } ?>

	<?php if (get_field('background_color')){ ?>
	<style type="text/css"> body div.wrap.container {background-color: <?php echo get_field('background_color'); ?> !important; }</style>

	<?php }	?>
  <?php if (get_field('bg_opacity')){ ?>
	<?php $image = get_field('bg_opacity'); ?>
	<?php $opacity = get_field('opacity'); ?>
		<?php if ($opacity){ ?>
		<style type="text/css"> body div.wrap.container {background: rgba(255,255,255,<?php echo $opacity; ?>); }</style>
		<?php } else { ?>
			<style type="text/css"> body div.wrap.container {background: rgba(255,255,255,0.8); }</style>
		<?php }?>
	<?php } else { ?>
	<?php } ?>
	<?php if (get_field('background_image')){ ?>
	<?php $image = get_field('background_image'); ?>
	<a href="<?php the_permalink(); ?>">
		<img class="bgstretch" src="<?php echo $image; ?>" style="display: none;" />
	</a>
	<?php } else { ?>
	<?php } ?>
      <h1 class="piece-title"><?php the_title(); ?></h1>
    <div class="entry-content">
      <?php the_content(); ?>
	<?php echo get_next_posts_link('Go to next page'); ?>	

	
    </div>
	<div class="credits">
		<div class="share">
		<div class="fb-share-button" data-href="<?php echo the_permalink(); ?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
		<a class="twitter-share-button"
  href="https://twitter.com/intent/tweet?text=<?php echo the_title(); ?>&url=<?php echo urlencode(the_permalink()); ?>"
  data-size="large">
Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

		</div>
		<div class="credits-container">
	<?php $credits = get_field('credits'); ?>
	<?php echo $credits; ?>
		</div>
	</div>
	


 <?php $prev_post = get_adjacent_post( true, '', true, 'category' ); ?>
 <?php if ( is_a( $prev_post, 'WP_Post' ) ) { ?>
 	<a class="previous" title="<?php echo get_the_title( $prev_post->ID ); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>">Previous</a>
 <?php } ?>

 <?php $next_post = get_adjacent_post( true, '', false, 'category' ); ?>
 <?php if ( is_a( $next_post, 'WP_Post' ) ) { ?>
 	<a class="next" title="<?php echo get_the_title( $next_post->ID ); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>">Next</a>
 <?php } ?>

  </article>
<?php endwhile; ?>

<div class="read-more-container">
<div class="read-more">
<?php
// get more posts related to current tags
$category = get_the_category($post->ID);
if ($category) {
?>
<h3>
	keep looking at <?php echo $category[0]->cat_name; ?>
</h3>

<?php
	// echo '<script type="text/javascript">console.log(';
		// var_dump($tags);
		// echo ');</script>';

// add tracking for viewed articles and push to "push__not_in"
$args=array(
// 'tag__in' => $category["slug"],
// 'post__not_in' => array($post->ID),
'category__not_in' => array(35,36),
'category__in' => $category[0]->term_id,
'posts_per_page'=>9,
// 'limit'=>3,
// 'orderby'=>'',
'post_password'=>'',
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
<div class="entry-container">
<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<div class="banner">
		<?php if (get_field('banner')){ ?>
		<?php $image = get_field('banner'); ?>
		<a href="<?php the_permalink(); ?>">
			<img class="lazy" width="300" data-original="<?php echo $image['url']; ?>" src="/wp-content/themes/refigural/assets/img/gray.jpg" />
			<noscript>
				<img class="lazy" width="300" src="<?php echo $image['url']; ?>" />
			</noscript>
		</a>
		<?php } else { ?>
		<?php //the_content(); ?>
		<?php } ?>
	</div>
</div>
<?php
endwhile;
}
wp_reset_query();
}
?>
</div>

<div class="read-more">
<?php
// get more posts related to current tags
$tags = wp_get_post_tags($post->ID);
if ($tags) {
		$taglist = array();
	foreach($tags as $tag){
		array_push($taglist, $tags[0]->name);
	}
	?>

	<?php foreach($tags as $tag){ ?>
		<h3>
			keep looking at <?php echo $tag->name; ?>
		</h3>

		<?php
			// echo '<script type="text/javascript">console.log(';
				// var_dump($tags);
				// echo ');</script>';

		// add tracking for viewed articles and push to "push__not_in"
		$args=array(
		'tag__in' => $tag->term_id,
		'post__not_in' => array($post->ID),
		'posts_per_page'=>9,
		'orderby'=>'rand',
		'post_password'=>'',
		);
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
		while ($my_query->have_posts()) : $my_query->the_post(); ?>
		<div class="entry-container">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="banner">
				<?php if (get_field('banner')){ ?>
				<?php $image = get_field('banner'); ?>
				<a href="<?php the_permalink(); ?>">
					<img class="lazy" width="300" data-original="<?php echo $image['url']; ?>" src="/wp-content/themes/refigural/assets/img/gray.jpg" />
					<noscript>
						<img class="lazy" width="300" src="<?php echo $image['url']; ?>" />
					</noscript>
				</a>
				<?php } else { ?>
				<?php //the_content(); ?>
				<?php } ?>
			</div>
		</div>
		<?php
		endwhile;
		}
		wp_reset_query();
	}
}
?>
</div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
