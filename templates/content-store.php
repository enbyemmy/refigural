	<?php /* Template Name: Store */ ?>
	<?php if (get_field('bg_opacity')){ ?>
	<style type="text/css">html body div.container { background: rgba(255,255,255,0.6); }</style>
	<?php } ?>
	<?php if (get_field('background_image')){ ?>
	<?php $image = get_field('background_image'); ?>
	<a href="<?php the_permalink(); ?>">
		<img class="bgstretch" src="<?php echo $image; ?>" style="display: none;" />
	</a>
	<?php } else { ?>
	<?php } ?>
<?php the_content(); ?>
