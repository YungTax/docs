<?php
    //Theme style
    add_action( 'wp_enqueue_scripts', 'redoo_load_css' );
    function redoo_load_css() {
        wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', true, '5.0.2' ); 
        wp_enqueue_style( 'bootstrap-map', get_template_directory_uri(). '/css/bootstrap.css.map', true, '5.0.2');
        wp_enqueue_style( 'all_style', get_template_directory_uri().'/css/fonts.css', false, '1.0' );
        wp_enqueue_style( 'redoo_style', get_template_directory_uri().'/style.css', false, '1.0' );
        wp_enqueue_style( 'redoo_style_min', get_template_directory_uri().'/css/main.min.css',true,'1.0');
        wp_add_inline_style( 'redoo_style', redoo_generate_dynamic_css() );
    }
    if ( !function_exists( 'redoo_generate_dynamic_css' ) ){
        function redoo_generate_dynamic_css() {
            ob_start(); get_template_part( 'dynamic-css' );
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    }
    //Theme scripts
    function redoo_enqueue_script() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){wp_enqueue_script( 'comment-reply' );}
        wp_enqueue_script( 'Bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js', array('jquery'), '5.0.2', true);
        wp_enqueue_script( 'fluidvids', get_template_directory_uri().'/js/fluidvids.js', array('jquery'), '1.0', true );
        wp_enqueue_script( 'slicknav', get_template_directory_uri().'/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true );
        wp_enqueue_script( 'justified', get_template_directory_uri().'/js/justified.js', array('jquery'), '1.6', true );
        wp_enqueue_script( 'slick', get_template_directory_uri().'/js/slick.js', array('jquery'), '1.0.10', true );
        wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri().'/js/theia-sticky-sidebar.js', array('jquery'), '1.0.4', true );
        wp_enqueue_script( 'sticky', get_template_directory_uri().'/js/jquery.sticky.js', array('jquery'), '1.0.4', true );      
        wp_enqueue_script( 'marsonry', get_template_directory_uri().'/js/masonry.pkgd.min.js', array('jquery'), '4.2.2',true);
        wp_enqueue_script( 'redoo-main', get_template_directory_uri().'/js/main.min.js', array('jquery'), '1.0', true );
        wp_register_script('twitter-js', get_template_directory_uri().'/js/twitter.js', array('jquery'), '4.2.5', true ); 
    }
    add_action( 'wp_enqueue_scripts', 'redoo_enqueue_script' );
?>