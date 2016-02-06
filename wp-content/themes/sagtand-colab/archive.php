<?php get_header(); ?>
<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-12 columns loop" role="main">

	<?php if ( have_posts() ) :
		$postType = get_post_type( get_the_ID() );
		$postObj = get_post_type_object( $postType );
		$postObjPlural = $postObj->labels->all_items; ?>
		
		<h2 class="loop__header"><?= $postObjPlural ?></h2>

		
		<div class="controlls">
			<input type="text" id="quicksearch" placeholder="Search" />

			<?php
			// <div id="filters" class="button-group">
			//   <button class="button is-checked" data-filter="*">Show&nbsp;all</button>
			//   <!-- <button class="button" data-filter=".molekule">Molekule</button>
			//   <button class="button" data-filter=".transition">transition</button>
			//   <button class="button" data-filter=".alkali, .alkaline-earth">alkali and alkaline-earth</button>
			//   <button class="button" data-filter=":not(.transition)">not transition</button>
			//   <button class="button" data-filter=".metal:not(.transition)">metal but not transition</button> -->
			// </div>
			?>
		</div>


		<div class="isotope">


			<ul class="small-block-grid-1 medium-block-grid-2">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php include 'parts/loop.php'; ?>
					
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; // end have_posts() check ?>
			</ul>
		</div>

	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
</div>
<?php get_footer(); ?>
