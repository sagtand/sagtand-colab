<?php //Redirect all traffic to attachement-URL's to their parent-post
wp_redirect( get_permalink( $post->post_parent ), 301 ); exit; ?>