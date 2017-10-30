<div id="window">
<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php if (is_category('blog')){ ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content-blog', get_post_format()); ?>
<?php endwhile; ?>
<?php } else { ?>

<?php if (is_home()){ ?>
<?php wp_reset_query(); ?>


<?php // issue 12 ?>

<?php query_posts ($query_string . '&cat=44'); ?>

<?php $category = get_the_category(); ?>
<div class="issue" id="cover-issue-12">

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

</div>
<?php wp_reset_query(); ?>


<?php // advertisement ?>

<div class="ad">

<?php 
$page = get_page(4344); 
$ad = get_field("advertisement_artwork", $page->ID);
$ad_logo = get_field("advertisement_logo", $page->ID);
$ad_link = get_field("advertisement_destination", $page->ID);
?>
<a href="<?php echo $ad_link; ?>">
  <img src="<?php echo $ad; ?>" />
  <img class="logo" src="<?php echo $ad_logo; ?>" />
</a>


</div>

<?php // issue 11 ?>

<?php query_posts ($query_string . '&cat=42'); ?>

<?php $category = get_the_category(); ?>
<div class="issue" id="cover-issue-11">

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

</div>

<?php wp_reset_query(); ?>


<?php // issue 10 ?>

<?php query_posts ($query_string . '&cat=41'); ?>

<?php $category = get_the_category(); ?>
<div class="issue" id="cover-issue-10">

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

</div>
<?php wp_reset_query(); ?>


<?php // issue 9 ?>

<?php query_posts ($query_string . '&cat=39'); ?>

<?php $category = get_the_category(); ?>
<div class="issue" id="cover-issue-9">

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

</div>
<?php wp_reset_query(); ?>

<?php // issue 8 ?>

<?php query_posts ($query_string . '&cat=32'); ?>

<?php $category = get_the_category(); ?>

<div class="issue" id="cover-issue-8">

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

</div>
<?php wp_reset_query(); ?>
	
<?php // issue 7 ?>

<?php query_posts ($query_string . '&cat=31'); ?>

<?php $category = get_the_category(); ?>

<div class="issue" id="cover-issue-7">

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

</div>
<?php wp_reset_query(); ?>

<?php // issue 6 ?>

<?php query_posts ($query_string . '&cat=30'); ?>

<?php $category = get_the_category(); ?>

<div class="issue" id="cover-issue-6">

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

</div>
<?php wp_reset_query(); ?>

<?php // issue 5 ?>

<?php query_posts ($query_string . '&cat=27'); ?>

<?php $category = get_the_category(); ?>

<div class="issue" id="cover-issue-5">

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

</div>
<?php wp_reset_query(); ?>


<?php // issue 4 ?>

<?php query_posts ($query_string . '&cat=25'); ?>

<?php $category = get_the_category(); ?>

<div class="issue" id="cover-issue-4">

<?php while (have_posts()) : the_post(); ?>
	  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

</div>
<?php wp_reset_query(); ?>

<?php //issue 3 ?>

<?php query_posts ($query_string . '&cat=22'); ?>
<?php } ?>
	
<?php $category = get_the_category(); ?>

<div class="issue" id="cover-issue-3">

<?php while (have_posts()) : the_post(); ?>
	  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

</div>

<?php wp_reset_query(); ?>

<?php query_posts ($query_string . '&cat=8'); ?>
	
<?php $category = get_the_category(); ?>

<div class="issue" id="cover-issue-2">

<?php while (have_posts()) : the_post(); ?>
	  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

</div>


<?php wp_reset_query(); ?>

<?php query_posts ($query_string . '&cat=7'); ?>
	
<?php $category = get_the_category(); ?>

<div class="issue" id="cover-issue-1">

<?php while (have_posts()) : the_post(); ?>
	  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

</div>

<?php } ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
</div>
<?php /*
<div id="subscribe-now">
<a href="#" class="close-popup">X</a>
<h3>subscribe to refigural for infrequent updates!</h3><div class="easy">it's so easy...</div>

<div id="subscribe-popup" >
<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
	   /*
</style>
<form action="//refigural.us9.list-manage.com/subscribe/post?u=267eaf1e2450e2d390b256811&amp;id=a4e28ed288" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="e-mail address" required>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_267eaf1e2450e2d390b256811_a4e28ed288" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" class="submit" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>

</div>
*/ ?>
