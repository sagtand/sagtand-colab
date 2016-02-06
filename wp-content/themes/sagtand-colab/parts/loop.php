<?php
//get data
$postType = get_post_type( get_the_ID() );
$postObj = get_post_type_object( $postType );
$postObjSingular = $postObj->labels->singular_name;

?>
<li class="element-item" data-category="<?= $postObjSingular ?>">
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<header>
			<h3 class="entry-title--loop"><a href="<?= get_the_permalink() ?>"><?php the_title(); ?></a></h3>
		</header>
		<?php Colab_short_meta(); ?>

		<?php //get all audio-clips
		$medias = get_attached_media( 'audio', get_the_ID() );
		foreach( $medias as $media ): ?>
			<?= do_shortcode('[audio src="' . wp_get_attachment_url( $media->ID) . '"]'); ?>
			<?php
		endforeach;
		?>
		
	</article>
</li>