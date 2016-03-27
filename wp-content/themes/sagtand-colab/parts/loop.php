<?php
//get data
$postType = get_post_type( get_the_ID() );
$postObj = get_post_type_object( $postType );
$postObjSingular = $postObj->labels->singular_name;

?>
<li class="element-item" data-category="<?= $postObjSingular ?>">
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<?php Colab_short_meta(); ?>
		<div class="content">
			<header>
				<h3 class="entry-title--loop"><a href="<?= get_the_permalink() ?>"><?php the_title(); ?></a></h3>
			</header>
			<?php $media_id = get_the_ID();
			include(locate_template('parts/latest-media.php')); ?>
		</div>
		
	</article>
</li>