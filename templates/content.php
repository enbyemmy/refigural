
<?php $category = get_the_category(); ?>
<article <?php post_class(); ?>>

<h1 class="entry-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h1>
  <div class="entry-content banner">
	<?php if (get_field('banner')){ ?>
	<?php $image = get_field('banner'); ?>
	<a href="<?php the_permalink(); ?>" >
		<img data-original="<?php echo $image['url']; ?>" src="/wp-content/themes/refigural/assets/img/gray.jpg" class="lazy" width="300"  />
		<noscript>
		    <img src="<?php echo $image['url']; ?>" width="300" />
		</noscript>
	</a>
<a id="<?php echo $category[0]->category_nicename; ?>"></a>
	
	<?php } else { ?>
	<?php //the_content(); ?>
	<?php } ?>
  </div>
</article>
<?php if (get_field('cover_photo')){ ?>
<?php $cover = get_field('cover_photo'); ?>
<div class="cover-photo">
	<h1 class="cover-title"><a><?php echo $category[0]->name; ?></a></h1>
	<img data-original="<?php echo $cover; ?>" class="lazy" src="/wp-content/themes/refigural/assets/img/gray.jpg" />
</div>
<?php } ?>


<?php /*
<?php $category = get_the_category(); ?>
<article <?php post_class(); ?>>

<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  <div class="entry-content banner">
	<?php if (get_field('banner')){ ?>
	<?php $image = get_field('banner'); ?>
	<a href="<?php the_permalink(); ?>">
		<img alt="<?php echo $image['url']; ?>" class="lazy" width="300" data-original="<?php echo $image['url']; ?>" src="/wp-content/themes/refigural/assets/img/gray.jpg" />
		<noscript>
		    <img alt="<?php echo $image['url']; ?>" width="300" src="<?php echo $image['url']; ?>" />
		</noscript>
	</a>
	<?php } else { ?>
	<?php //the_content(); ?>
	<?php } ?>
  </div>
</article>
<?php if (get_field('cover_photo')){ ?>
<?php $cover = get_field('cover_photo'); ?>
<a id="<?php echo $category[0]->category_nicename; ?>"></a>
<div class="cover-photo">
	<h1 class="cover-title"><a href="#"><?php echo $category[0]->name; ?></a></h1>
	<img alt="<?php echo $cover; ?>" data-original="<?php echo $cover['url']; ?>" class="lazy" src="/wp-content/themes/refigural/assets/img/gray.jpg">
</div>
<?php } ?> */ ?>
