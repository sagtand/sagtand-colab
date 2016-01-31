<?php
if(!function_exists('FoundationPress_entry_meta')) :
    function FoundationPress_entry_meta() {
		$tempo = get_field( 'tempo' );
		$key = get_field( 'key' );
        echo '<time class="updated" datetime="'. get_the_time('c') .'">'. sprintf(__('Posted on %s at %s.', 'FoundationPress'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
        echo '<p class="byline author">'. __('Written by', 'FoundationPress') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
        echo '<p>';
        if( $tempo ) { echo '<span class="tempo meta tempo--' . $tempo . '">Tempo: <em>' . $tempo  . '</em></span>'; }
        if( $key ) { echo '<span class="key meta key--' . $key . '">Key: <em>' . $key  . '</em></span>'; } 
        echo '</p>';
    }
endif;
?>