<?php
    //Google font load
    function redoo_fonts() {
        $google_font = '';
        $title_style_text = get_theme_mod('redoo_title_font_family','Work Sans');
        $redoo_title_font_weight = get_theme_mod('redoo_title_font_weight','700');
        $paragrap_style_text = get_theme_mod('redoo_p_font_family','Roboto');
        $redoo_p_font_weight = get_theme_mod('redoo_p_font_weight','400');
        $menu_font_style = get_theme_mod('redoo_menu_font_family','Roboto');
        $redoo_menu_font_weight = get_theme_mod('redoo_menu_font_weight','600');
        $redoo_sub_menu_font_weight = ','.get_theme_mod('redoo_sub_menu_font_weight','600');
        $subsets  = 'latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese';
        $google_font = add_query_arg( array(
                'family' => urlencode ( $title_style_text.':'.$redoo_title_font_weight.'|'.$paragrap_style_text.':'.$redoo_p_font_weight.'|'.$menu_font_style.':'.$redoo_menu_font_weight.$redoo_sub_menu_font_weight),
                'subset' => urlencode ( $subsets ),
            ), '//fonts.googleapis.com/css' );
        return esc_url_raw($google_font);
    }
    function redoo_font_scripts() {
        wp_enqueue_style( 'redoo_fonts_url', redoo_fonts(), array(), '1.6' );
    }
    add_action( 'wp_enqueue_scripts', 'redoo_font_scripts' );
?>