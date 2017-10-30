  <article <?php post_class(); ?>>
	<?php if (get_field('background_image')){ ?>
	<?php $image = get_field('background_image'); ?>
	<a href="<?php the_permalink(); ?>">
		<img class="bgstretch" src="<?php echo $image; ?>" style="display: none;" />
	</a>
	<?php } else { ?>
	<?php } ?>
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
<div class="share">
    <div class="fb-share-button" data-href="<?php echo the_permalink(); ?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
    <a class="twitter-share-button"
  href="https://twitter.com/intent/tweet?text=<?php echo urlencode(the_title()); ?>&url=<?php echo urlencode(the_permalink()); ?>"
  data-size="large">
Tweet</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
