<?php
/*
Template Name: Delete old blog-posts/custom posts
*/


get_header(); ?>
<div class="row">
	<div class="small-12 medium-12 columns" role="main">
		<?php 		
		$mycustomposts = get_posts( array( 'post_type' => 'blog'));
		    echo '<pre>';
		    print_r($mycustomposts);
		    echo '</pre>';
		   foreach( $mycustomposts as $mypost ) {
		     // Delete's each post.
		    wp_delete_post( $mypost->ID, true);
		    // Set to False if you want to send them to Trash.
		   }
		   echo '<h1 style=:"color:red;"> Deleted some stuff! </h1>';

		?>
	</div>
</div>
<?php get_footer(); ?>