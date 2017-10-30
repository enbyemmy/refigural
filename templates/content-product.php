<?php while (have_posts()) : the_post(); ?>
	<?php if (get_field('background_image') != ''){ ?>
	<div class="blank"></div>
	<?php } ?>
  <article <?php post_class(); ?>>
  <a class="return" href="javascript:history.back();"><<< Return</a>
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
	

<?php /*
 <?php $prev_post = get_adjacent_post( true, '', true, 'category' ); ?>
 <?php if ( is_a( $prev_post, 'WP_Post' ) ) { ?>
 	<a class="previous fixed" title="<?php echo get_the_title( $prev_post->ID ); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>">Previous</a>
 <?php } ?>

 <?php $next_post = get_adjacent_post( true, '', false, 'category' ); ?>
 <?php if ( is_a( $next_post, 'WP_Post' ) ) { ?>
 	<a class="next fixed" title="<?php echo get_the_title( $next_post->ID ); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>">Next</a>
 <?php } ?>
 */ ?>

  </article>
<?php endwhile; ?>

<?php /*
<div class="read-more-container">
<h3>
	keep reading
</h3>
<div class="read-more">
<?php
// get more posts related to current tags
$tags = wp_get_post_tags($post->ID);
if ($tags) {
	$taglist = array();
//foreach($tags as $tag){
	array_push($taglist, $tags[0]->name);
//}

// add tracking for viewed articles and push to "push__not_in"

$args=array(
'tags__in' => $tags[0]->name,
'category__not_in' => 5,
'post__not_in' => array($post->ID),
'posts_per_page'=>3,
'orderby'=>'rand',
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
<div class="entry-container">
<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<div class="entry-content banner">
		<?php if (get_field('banner')){ ?>
		<?php $image = get_field('banner'); ?>
		<a href="<?php the_permalink(); ?>">
			<img class="lazy" width="300" data-original="<?php echo $image['url']; ?>" src="/wp-content/themes/refigural/assets/img/gray.jpg" />
			<noscript>
				<img class="lazy" width="300" src="<?php echo $image['url']; ?>" />
			</noscript>
		</a>
		<?php } else { ?>
		<?php the_content(); ?>
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
</div>
*/ ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
