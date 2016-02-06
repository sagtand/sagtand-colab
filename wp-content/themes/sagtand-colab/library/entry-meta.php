<?php
if(!function_exists('FoundationPress_entry_meta')) :
    function FoundationPress_entry_meta() {
		$tempo = get_field( 'tempo' );
		$key = get_field( 'key' );
        echo '<time class="updated" datetime="'. get_the_time('c') .'">'. sprintf(__('Posted on %s @ %s.', 'FoundationPress'), get_the_time('Y-m-d'), get_the_time()) .'</time>';
        echo '<p class="byline author">'. __('Created by', 'FoundationPress') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
        echo '<p>';
        if( $tempo ) { echo '<span class="tempo meta tempo--' . $tempo . '">Tempo: <em>' . $tempo  . '</em></span>'; }
        if( $key ) { echo '<span class="key meta key--' . $key . '">Key: <em>' . $key  . '</em></span>'; } 
        echo '</p>';
    }
endif;

if(!function_exists('Colab_short_meta')) :
    function Colab_short_meta() {
        $tempo = get_field( 'tempo' );
        $key = get_field( 'key' );
        echo '<div class="meta--short">';
        echo '<span class="byline author"> '. __('By', 'FoundationPress') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></span>';
        echo '<div class="meta--short__meta">';
        if( $tempo ) { echo '<span class="tempo meta tempo--' . $tempo . '">T: <em>' . $tempo  . '</em></span>'; }
        if( $key ) { echo '<span class="key meta key--' . $key . '">K: <em>' . $key  . '</em></span>'; } 
        echo '</div>';
        echo '</div>';
    }
endif;
?>