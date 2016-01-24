<?php get_header(); ?>
<div class="row">

	<?php do_action('foundationPress_before_content'); ?>

	<?php while (have_posts()) : the_post(); 
		//get data
		$postType = get_post_type( get_the_ID() );
		$postObj = get_post_type_object( $postType );
		$postObjSingular = $postObj->labels->singular_name;

	?>
	<div class="small-12 large-8 columns" role="main">

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
			<p class="meta"><?= $postObjSingular; ?></p>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php FoundationPress_entry_meta(); ?>
			</header>
			<?php do_action('foundationPress_post_before_entry_content'); ?>
			<div class="entry-content">

			<?php if ( has_post_thumbnail() ): ?>
				<div class="row">
					<div class="column">
						<?php the_post_thumbnail('', array('class' => 'th')); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>

			</footer>
			<?php do_action('foundationPress_post_before_comments'); ?>
			<?php comments_template(); ?>
			<?php do_action('foundationPress_post_after_comments'); ?>
		</article>

	</div>
	<aside id="sidebar" class="small-12 large-4 columns">
		<?php
		$values = false;
		if ( get_field('molecules_atoms') ) { $values = get_field('molecules_atoms'); $childrenType = 'atoms'; }
		else if ( get_field('organisms_molecules') ) { $values = get_field('organisms_molecules'); $childrenType = 'molecules'; }
		else if ( get_field('parts_organisms') ) { $values = get_field('parts_organisms'); $childrenType = 'organisms'; }
		else if ( get_field('songs_parts') ) { $values = get_field('songs_parts'); $childrenType = 'parts'; }


		if( $values ): ?>

		<article id="categories-3" class="row widget widget_postmeta">
			<div class="small-12 columns">
			<h3>Using following <?= $childrenType ?>:</h3>
			<ul class="media">
			<?php foreach( $values as $value ): ?>
				<li><div class="media__title">
						<a href="<?php echo get_permalink( $value->ID ); ?>">
							<?php echo get_the_title( $value->ID ); ?>
						</a>
					</div>
						<?php //get all audio-clips
						$medias = get_attached_media( 'audio', $value->ID );
						foreach( $medias as $media ): ?>
							<div class="media__audio">
								<?= do_shortcode('[audio src="' . wp_get_attachment_url( $media->ID) . '"]'); ?>
							</div><?php
						endforeach;
						?>
					
				</li>
			<?php endforeach; ?>
			</ul>

			</div>
		</article>
		<?php endif; ?>


		<?php do_action('foundationPress_before_sidebar'); ?>
		<?php dynamic_sidebar("sidebar-widgets"); ?>
		<?php do_action('foundationPress_after_sidebar'); ?>
	</aside>

	<?php endwhile;?>

	<?php do_action('foundationPress_after_content'); ?>

</div>
<?php get_footer(); ?>
