<?php 
global $wp_query, $paged;

if( get_query_var('paged') ) {
    $paged = get_query_var('paged');
}else if ( get_query_var('page') ) {
    $paged = get_query_var('page');
}else{
    $paged = 1;
}
$wp_query = null;

$bloggArgs = array(
'post_type' => 'blog',
'order'     => 'DESC',
'orderby'   => 'title',
'posts_per_page' => 4,
'paged'          => $paged,
);
$wp_query = new WP_Query( $bloggArgs );


if($wp_query->have_posts()) { 

	?>
	<section id="nyhetsflode" class="nyhetsflode">
		<h5>Nyhetsflöde</h5>
		<ul id="nyhetsflode-list">
			<?php
			while($wp_query->have_posts()) { $wp_query->the_post();
			?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<li>
					<span class="meta"><?php the_time('Y-m-d'); ?></span>
					<h6><?php the_title(); ?><span class="meta">&nbsp;Läs&nbsp;mer&nbsp;></span></h6>
				</li>
			</a>
			<?php
			}
			?>
		</ul>
	</section>
	<?php if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination("#nyhetsflode"); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
		</nav>
	<?php } ?>
	<?php
}
wp_reset_query();
?>