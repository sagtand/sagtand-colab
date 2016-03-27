<?php //get all audio-clips
if( have_rows('assets') ): ?>

	<div class="assets-loop">
	<h3>Assets:</h3>

	<?php while( have_rows('assets') ): the_row(); 

		// vars
		$asset = get_sub_field('asset');
		$title = get_sub_field('title');
		$asset_url = $asset['url'];
		$filetype = wp_check_filetype( $asset_url );

		if( !$title ):
			$title = get_the_title($asset->ID);
		endif;
		?>
		
		<a href="<?= $asset_url ?>" download class="button"><?= $title ?> <em>(.<?= $filetype['ext'] ?>)</em></a>
		

	<?php endwhile; ?>

	</ul>

<?php endif;