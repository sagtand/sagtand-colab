<?php get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns loop" role="main">
	

		<div class="loop__container">
			<?php 
			// List 5 latest atoms
			$atoms = new WP_Query( array( 'posts_per_page' => 4, 'post_type' => 'atoms'));

			// Atoms loop
			if ( $atoms->have_posts() ) { ?>
				<h2 class="loop__header">Latests Atoms</h2>
				<ul class="small-block-grid-2">
				<?php
				while ( $atoms->have_posts() ) {
					$atoms->the_post();
					include 'parts/loop.php';
				}
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
			</ul>
			<a href="<?= get_site_URL() ?>/atoms">See all atoms</a>
		</div>


		<div class="loop__container">
			<?php 
			// List 5 latest molecules
			$molecules = new WP_Query( array( 'posts_per_page' => 4, 'post_type' => 'molecules'));

			// molecules loop
			if ( $molecules->have_posts() ) { ?>
				<h2 class="loop__header">Latests molecules</h2>
				<ul class="small-block-grid-2">
				<?php
				while ( $molecules->have_posts() ) {
					$molecules->the_post();
					include 'parts/loop.php';
				}
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
			</ul>
			<a href="<?= get_site_URL() ?>/molecules">See all molecules</a>
		</div>


		<div class="loop__container">
			<?php 
			// List 5 latest organisms
			$organisms = new WP_Query( array( 'posts_per_page' => 4, 'post_type' => 'organisms'));

			// organisms loop
			if ( $organisms->have_posts() ) { ?>
				<h2 class="loop__header">Latests organisms</h2>
				<ul class="small-block-grid-2">
				<?php
				while ( $organisms->have_posts() ) {
					$organisms->the_post();
					include 'parts/loop.php';
				}
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
			</ul>
			<a href="<?= get_site_URL() ?>/organisms">See all organisms</a>
		</div>


		<div class="loop__container">
			<?php 
			// List 5 latest parts
			$parts = new WP_Query( array( 'posts_per_page' => 4, 'post_type' => 'parts'));

			// parts loop
			if ( $parts->have_posts() ) { ?>
				<h2 class="loop__header">Latests parts</h2>
				<ul class="small-block-grid-2">
				<?php
				while ( $parts->have_posts() ) {
					$parts->the_post();
					include 'parts/loop.php';
				}
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
			</ul>
			<a href="<?= get_site_URL() ?>/parts">See all oarts</a>
		</div>

		
		<div class="loop__container">
		<?php 
		// List 5 latest songs
		$songs = new WP_Query( array( 'posts_per_page' => 4, 'post_type' => 'songs'));

		// songs loop
		if ( $songs->have_posts() ) { ?>
			<h2 class="loop__header">Latests songs</h2>
			<ul class="small-block-grid-2">
			<?php
			while ( $songs->have_posts() ) {
				$songs->the_post();
				include 'parts/loop.php';
			}
		} else {
			// no posts found
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		?>
		</ul>
		<a href="<?= get_site_URL() ?>/songs">See all songs</a>
		</div>

	</div>
</div>
<div class="row bg-color">
	<div class="small-12 large-12 columns">

	<?php get_template_part('parts/nyhetsflode'); ?>
<!-- 	<?php //get_sidebar(); ?>
 -->
	</div>
</div>
<?php get_footer(); ?>
