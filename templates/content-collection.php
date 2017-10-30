	<?php if (get_field('background_image') != ''){ ?>
	<?php } ?>
	<?php if (get_field('background_image')){ ?>
	<?php $image = get_field('background_image'); ?>
			<img class="bgstretch" src="<?php echo $image; ?>" style="display: none;" />
			<?php } ?>


				<div class="blank">
					<h1 class="announce">
						<?php if (get_field('announcement')){
							echo get_field('announcement');
						}
						?>
					</h1>

				</div>

<div class="bgwhite">
<?php the_content(); ?>
</div>