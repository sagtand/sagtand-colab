<?php

if (!function_exists('FoundationPress_scripts')) :
  function FoundationPress_scripts() {

    add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
    function add_defer_attribute($tag, $handle) {
        if ( 'ffda-app' !== $handle )
            return $tag;
        return str_replace( ' src', ' async="async" src', $tag );
    }

    // deregister the jquery version bundled with wordpress
    wp_deregister_script( 'jquery' );

    // register scripts
    wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr/modernizr.min.js', array(), '1.0.0', false );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery/dist/jquery.min.js', array(), '1.0.0', false );
    wp_register_script( 'ffda-app', get_template_directory_uri() . '/js/app.js', array('jquery'), '1.0.0', true );

    // enqueue scripts
    wp_enqueue_script('modernizr');
    wp_enqueue_script('jquery');
    wp_enqueue_script('ffda-app');

  }

  add_action( 'wp_enqueue_scripts', 'FoundationPress_scripts' );
endif;

?>