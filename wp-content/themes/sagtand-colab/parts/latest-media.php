<?php
//Get the latest audio
if( have_rows('sounds', $media_id) ) {
	$rows = get_field( 'sounds', $media_id ); // get all the rows from and page ID
	$end_row = end( $rows ); // get the end row
	$media = $end_row['media' ]; // get the sub field value 
	echo do_shortcode('[audio src="' . $media['url'] . '"]');
}
?>