<?php //get all audio-clips
if( have_rows('sounds') ): ?>

	<ul class="media-loop">

	<?php while( have_rows('sounds') ): the_row(); 

		// vars
		$media = get_sub_field('media');
		$media_url = $media['url'];
		$filetype = wp_check_filetype( $media_url );
		$title = get_sub_field('title');
		$content = get_sub_field('description');

		if( !$title ):
			$title = get_the_title($asset->ID);
		endif;
		?>

		<li class="media-item">
			<div class="content">
				<h3>
					<?= $title ?>
				</h3>
				<?= do_shortcode('[audio src="' . $media['url'] . '"]'); ?>

			    <?php echo $content; ?>
		    </div>
		    <div class="buttons">
		    	<a href="<?= $media_url ?>" download class="button">Download <em>(.<?= $filetype['ext'] ?>)</em></a>
		    </div>
		</li>

	<?php endwhile; ?>

	</ul>

<?php endif;