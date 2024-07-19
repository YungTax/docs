<?php
if ( ! isset( $content_width ) ){ $content_width = 1190; }
    add_theme_support( 'post-formats', array('gallery', 'quote', 'video', 'audio') );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "title-tag" );
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'align-wide' );
// Post thumbnail support
if ( !function_exists( 'redoo_image_size' ) ) {
    function redoo_image_size() {
        add_image_size('redoo_justify_feature', 1000, 0, false);
        add_image_size('redoo_small_feature', 150, 150, true);
        add_image_size('redoo_small_recent_feature', 150, 100, true);
        add_image_size('redoo_feature_link_list', 230, 115, true);
        add_image_size('redoo_large_feature', 650, 650, true);
        add_image_size('redoo_large_list_feature', 300, 300, true );
        add_image_size('redoo_large_slider_image', 1920, 982, true);
        add_image_size('redoo_slider_grid_large', 1100, 700, true);
        add_image_size('redoo_slider_grid_small', 650, 465, true);
        add_image_size('redoo_list_post_large', 650, 850, true);
        add_image_size('redoo_list_large', 450, 450, true);
        add_image_size('redoo_carousel', 600, 750, true);
        add_image_size('redoo_marsonry',1000,1500, true);
        add_image_size('redoo_grid_post', 1400, 650, true);
    }
    add_action( 'init', 'redoo_image_size' );
}       

//body class
add_filter( 'body_class','redoo_body_classes' );
function redoo_body_classes( $classes ) {
    $classes[] = 'mobile_nav_class';
    if (is_active_sidebar('general-sidebar')) {$classes[] = 'themelazer-has-sidebar';}
    return $classes;    
}
// woocomerce theme support   
function redoo_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'redoo_add_woocommerce_support' );
  
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 4; // 4products per row
    }
}
add_filter('loop_shop_columns', 'loop_columns', 999);

//Remove Mobile Menu id
add_filter('nav_menu_item_id', 'redoo_my_css_attributes_filter', 100, 1);
function redoo_my_css_attributes_filter($var) {
    return is_array($var) ? array() : '';
}

//custom categories_link
add_filter('wp_list_categories', 'redoo_categories_count_span');
add_filter('get_archives_link', 'redoo_archives_count');
function redoo_categories_count_span($links) {
    $links = str_replace('</a> (', '</a> <span>', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

// Replace default categories widgets
function redoo_archives_count($links){
    $links = str_replace('</a>&nbsp;(', '</a> <span>', $links);
    $links = str_replace(')</li>', '</span></li>', $links);
    return $links;
}

// Sidebar register
function redoo_sidebar_register() {
    register_sidebar(array(
        'name' => esc_html__('General Sidebar', 'redoo'),
        'id' => 'general-sidebar',
        'before_widget' => '<div id="%1$s" class="single-sidebar  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>',
    ));
    register_sidebar(array(
        'name' => esc_html__('First Footer Sidebar', 'redoo'),
        'id' => 'footer1-sidebar',
        'before_widget' => '<div id="%1$s" class="single-sidebar  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Second Footer Sidebar', 'redoo'),
        'id' => 'footer2-sidebar',
        'before_widget' => '<div id="%1$s" class="single-sidebar  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Third Footer Sidebar', 'redoo'),
        'id' => 'footer3-sidebar',
        'before_widget' => '<div id="%1$s" class="single-sidebar  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>',
    )); 

    register_sidebar(array(
        'name' => esc_html__('Fourth Footer Sidebar', 'redoo'),
        'id' => 'footer4-sidebar',
        'before_widget' => '<div id="%1$s" class="single-sidebar  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>',
    ));     
    register_sidebar(array(
        'name' => esc_html__('Instagram', 'redoo'),
        'id' => 'instagram-sidebar',
        'before_widget' => '<div id="%1$s" class="single-sidebar %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>',
    ));       
    
}
add_action('widgets_init', 'redoo_sidebar_register');

//gallery hook
if (!function_exists('redoo_themelazermedia_gallery_upload_get_images')) {
    function redoo_themelazermedia_gallery_upload_get_images(){
        $ids=$_POST['ids'];
        $ids=explode(",",$ids);
        foreach($ids as $id):
            $image = wp_get_attachment_image_src($id,'thumbnail', true);
            echo '<li class="themelazermedia-gallery-image-holder"><img src="'.esc_url($image[0]).'"/></li>';
        endforeach;
        exit;
    }
    add_action( 'wp_ajax_redoo_themelazermedia_gallery_upload_get_images', 'redoo_themelazermedia_gallery_upload_get_images');
}

//register menu
function redoo_register_menu() {
    register_nav_menus(
            array(
                'Main_Menu' => esc_html__('Main menu', 'redoo'),
                'Footer_Menu' => esc_html__('Footer menu', 'redoo'),
                'Side_Menu' => esc_html__('Side menu', 'redoo')
            )
    );
}
add_action('init', 'redoo_register_menu');

//language part
function redoo_setup_language(){
    load_theme_textdomain('redoo', get_template_directory() . '/langs');
}
add_action('after_setup_theme', 'redoo_setup_language');

// Author Social icons
function redoo_author_contact_icons() { ?>
    <?php if(get_the_author_meta('facebook')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('facebook')); ?>"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('twitter')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('twitter')); ?>"><i class="fab fa-twitter"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('linkedin')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('linkedin')); ?>"><i class="fab fa-linkedin-in"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('instagram')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('instagram')); ?>"><i class="fab fa-instagram"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('pinterest')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('pinterest')); ?>"><i class="fab fa-pinterest-p"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('tumblr')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('tumblr')); ?>"><i class="fab fa-tumblr"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('youtube')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('youtube')); ?>"><i class="fab fa-youtube"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('dribbble')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('dribbble')); ?>"><i class="fab fa-dribbble"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('redoo-email')) : ?><a target="_blank" href="mailto:<?php echo esc_html(the_author_meta('redoo-email')); ?>">M</a><?php endif; ?>

<?php }

//Comment template
if ( ! function_exists( 'redoo_comment' ) ){
function redoo_comment( $comment, $args, $depth ) {
    global $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :      
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <p>
            <?php esc_html_e( 'Pingback:', 'redoo'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'redoo'), '<span class="edit-link">', '</span>' ); ?>
                
        </p>
        <?php
            break;
            default :
            global $post;
        ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <div class="comment-meta comment-author vcard">
                <?php
                    echo get_avatar( $comment, 80 );
                    echo '<section class="comment-content comment" itemprop="text">';
                    printf( '<span class="comment-author-name" itemprop="name">%1$s %2$s</span>',
                        get_comment_author_link(),
                        ( $comment->user_id === $post->post_author ) ? '<span> ' . esc_html__( 'Post author', 'redoo') . '</span>' : ''
                    );  
                ?>
                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation">
                                <?php esc_html_e( 'Your comment is awaiting moderation.', 'redoo'); ?>
                            </p>
                        <?php endif; ?>
                        <?php comment_text();
                            printf( '<a class="comment-author-date" itemprop="datePublished" href="%1$s"><time datetime="%2$s"><i class="far fa-clock"></i>%3$s</time></a>',
                                    esc_url( get_comment_link( $comment->comment_ID ) ),
                                    get_comment_time( 'c' ),
                                    sprintf( esc_html__( '%1$s at %2$s', 'redoo'), get_comment_date(), get_comment_time() )
                                );
                        ?>
                        <div class="com_wp_nav">
                            <?php edit_comment_link( esc_html__( 'Edit', 'redoo'), '', '' ); ?>
                            <?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'redoo'), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                        </div>
                </section>
            </div>              
        </article>
    <?php
    break;
    endswitch; 
    }
}
// Pagination Numeric 
function redoo_pagination_num($args = array()){    
    $big = 999999999;
    $paging = array(
                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format'    => '?paged=%#%',
                        'current'   => max( 1, $args['paged'] ),
                        'total'     => $args['total'],
                        'prev_next' => true,
                        'prev_text' => '<i class="ti-angle-left"></i>',
                        'next_text' => '<i class="ti-angle-right"></i>',
                        'type' => 'list',
                    );
    return paginate_links($paging);
}
//NUMERIC PAGE NAVI
if ( ! function_exists( 'redoo_pagination' ) ) {
    function redoo_pagination( $redoo_qry = NULL ) {
            $redoo_no_more_articles = esc_html__( 'No more articles', 'redoo' );
            $redoo_load_more_text = esc_html__( 'Load More', 'redoo' );
            $redoo_pagination_type = 'numbered';
            if ( is_category() ) {
                    $redoo_cat_id = get_query_var('cat');
                    $redoo_pagination_type = get_term_meta( $redoo_cat_id, 'redoo_cat_infinite', true);   
            }
            if ( is_home() ) {
            }

            if ( is_tag() ) {
            }
            if ( $redoo_qry == NULL ) {
                    global $wp_query;
                    $redoo_total = $GLOBALS['wp_query']->max_num_pages;
                    $redoo_paged = get_query_var('paged');
            } else {     
                if ( is_page() ) {
                    $redoo_total = $redoo_qry->max_num_pages;
                    $redoo_pagination_type = 'n';
                    $redoo_paged = get_query_var('page');
                } else {
                    global $wp_query;
                    $redoo_paged = get_query_var('paged');
                    $redoo_total = $GLOBALS['wp_query']->max_num_pages;
                }
            }
            if ( $redoo_pagination_type == 'infinite-load' ) {
                if ( get_next_posts_link() != NULL ) {
                    echo '<div class="pagination-more"><div class="more-previous">' . get_next_posts_link( $redoo_load_more_text ) . '</div></div>';
                } else {
                    echo '<div class="pagination-more"><div class="more-previous">' . $redoo_no_more_articles . '</div></div>';
                }
            } elseif ( $redoo_pagination_type == 'infinite-scroll' ) {
                if (  get_next_posts_link() != NULL ) {
                    echo '<div class="themelazer-infinite-load">' . get_next_posts_link( $redoo_load_more_text ) . '</div>';
                } else {
                    echo '<div class="themelazer-infinite-load"><span>' . $redoo_no_more_articles . '</span></div>';
                }
            } else {
                $redoo_pagination = paginate_links( array(
                    'base'     => str_replace( 99999, '%#%', esc_url( get_pagenum_link(99999) ) ),
                    'format'   => '',
                    'total'    => $redoo_total,
                    'current'  => max( 1, $redoo_paged ),
                    'mid_size' => 2,
                    'prev_text' => '<i class="ti-angle-left"></i>',
                    'next_text' => '<i class="ti-angle-right"></i>',
                    'type' => 'list',
                ) );
                echo '<div class="themelazer-pagination">
                      <div class="themelazer-pagination-wrapper">' . $redoo_pagination . '</div></div>';
            }
    }
}

// Reading Time Calculation
function redoo_reading_time_calculation( $content) {
    $post_id = get_the_ID();
    $minutes = 0;
    $words_per_minute = 225;
    $words_per_second = $words_per_minute / 60;
    $content_reading = get_post_field('post_content', $post_id);
    $content_reading = strip_tags($content_reading);
    $words = str_word_count($content_reading);
    if ( !empty( $words ) ) {
        $minutes = floor( $words / $words_per_minute );
    }
    if( $minutes < 1){
        $minutes = 1;   
    }
    return $minutes;
}

// Single meta
function redoo_singlepost_meta($post_id) {                
    echo'<div class="meta-info"> <ul>';
    if(get_theme_mod('disable_post_author') !=1){ echo '<li class="post-author" title="'.esc_attr(get_the_author_meta()).'">';
    echo get_avatar(get_the_author_meta('ID'), 80);
    echo esc_html_e('by ','redoo').the_author_posts_link();echo'</li>';}          
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}                 
    if(function_exists('redoo_bac_PostViews')){
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo redoo_bac_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'redoo');                
    echo '</li>';
    }}
    if(get_theme_mod('disable_post_comment_meta') !=1){
        echo '<li class="post-comment">';
        echo comments_popup_link(esc_html__('0 Comment', 'redoo' ), esc_html__('1 Comment', 'redoo'), esc_html__('% Comments', 'redoo'));
        echo '</li>';
    }
    echo '<li class="post-read">'.redoo_reading_time_calculation('content').esc_html__('minutes read','redoo').'</li>';
    echo'</ul></div>'; 
}
function redoo_singlepost_large($post_id) {                
    echo'<div class="meta-info"> <ul>';
    if(get_theme_mod('disable_post_author') !=1){ echo '<li class="post-author" title="'.esc_attr(get_the_author_meta()).'">';
    echo get_avatar(get_the_author_meta('ID'), 80);
    echo esc_html_e('by ','redoo').the_author_posts_link();echo'</li>';}          
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}                 
    if(function_exists('redoo_bac_PostViews')){
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo redoo_bac_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'redoo');                
    echo '</li>';
    }}
    echo'</ul></div>'; 
}
function redoo_post_meta_m($post_id) {
    echo'<div class="meta-info"> <ul>';
    if(get_theme_mod('disable_post_author') !=1){ echo '<li class="post-author" title="'.esc_attr(get_the_author_meta()).'">';
    echo esc_html_e('by ','redoo').the_author_posts_link();echo'</li>';}       
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    if(function_exists('redoo_get_PostViews')){
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo redoo_get_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'redoo');                
    echo '</li>';
    }}
     echo'</ul></div>'; 
}
function redoo_post_meta_sx($post_id) {
    echo'<div class="meta-info"> <ul>';   
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo redoo_get_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'redoo');                
    echo '</li>';
    echo '<li class="post-read">'.redoo_reading_time_calculation('content').esc_html__('minutes read','redoo').'</li>';
    }
    echo'</ul></div>'; 
}
function redoo_post_meta_s($post_id) {
    echo'<div class="meta-info"> <ul>';   
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo redoo_get_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'redoo');                
    echo '</li>';
    
    }
    echo'</ul></div>'; 
}

if ( ! function_exists( 'redoo_get_qry' ) ) {
    function redoo_get_qry() {
        if ( is_home() || is_category() ) {
            $redoo_paged = get_query_var('paged');
            $redoo_grid_size = $redoo_current_cat = NULL;
            if ( $redoo_paged == false ) {
                $redoo_paged = 1;
            }
            if ( is_category() ) {
                $redoo_current_cat = get_query_var('cat');
                $redoo_grid_size = redoo_get_category_offset();
            } elseif ( is_home() ) {
                $redoo_grid_size = 0;
            }
            if ( $redoo_grid_size != NULL ) {
                $redoo_offset_loop = 'on';
            } else {
                $redoo_offset_loop = NULL;
            }
            $redoo_featured_qry = array( 'cat' => $redoo_current_cat, 'offset' => $redoo_grid_size, 'orderby' => 'date', 'order' => 'DESC',  'post_status' => 'publish', 'redoo_offset_loop' => $redoo_offset_loop, 'paged' => $redoo_paged );
            $redoo_qry = new WP_Query( $redoo_featured_qry );
        } elseif ( is_page() ) {
            $redoo_paged = get_query_var('page');
            $redoo_arr = NULL;
            if ( $redoo_paged == false ) {
                $redoo_paged = 1;
            }
            $redoo_page_id = get_the_ID();
            $redoo_hp_category_filter = 'off';
            $redoo_lb_offset = 'on';

            if ( $redoo_hp_category_filter == 'off' ) {
                $redoo_hp_category = '';
                foreach ( $redoo_hp_category as $redoo_cat ) {
                    $redoo_arr .= $redoo_cat . ',';
                }
                $redoo_arr = rtrim( $redoo_arr, ",");
            }
            if ( $redoo_lb_offset != NULL ) {
                $redoo_offset_loop = 'on';
            } else {
                $redoo_offset_loop = NULL;
            }
            $redoo_qry = new WP_Query( array('post_status' => 'publish', 'ignore_sticky_posts' => true, 'paged' => $redoo_paged, 'cat' => $redoo_arr, 'offset' => $redoo_lb_offset, 'redoo_offset_loop' => $redoo_offset_loop  ) );
        } else {
            global $wp_query;
            $redoo_qry = $wp_query;
        }
        return $redoo_qry;
    }
}

//OFFSETTING QUERY VARIABLE['redoo_offset_loop']
if ( ! function_exists( 'redoo_offset_loop_pre_get_posts' ) ) {
    function redoo_offset_loop_pre_get_posts( $query ){
        if ( isset( $query->query_vars['redoo_offset_loop'] ) && ( $query->query_vars['redoo_offset_loop'] == 'on' ) ) {
            if ( is_category() ) { $redoo_grid_size = redoo_get_category_offset(); }
            $redoo_posts_per_page = get_option('posts_per_page');
            if ( $query->is_paged == true ) {
                $redoo_page_offset = $redoo_grid_size + ( ( $query->query_vars['paged'] - 1 ) * $redoo_posts_per_page );
                $query->set( 'offset', $redoo_page_offset );
            } else {
                $query->set( 'offset', $redoo_grid_size );
            }
        }
        if ( ( is_category() || is_tag() || is_home() ) && $query->is_main_query() && ( ! is_admin() ) ) {
            $query->set( 'post_type', 'post' );
        }
        return $query;
    }
}
add_action( 'pre_get_posts', 'redoo_offset_loop_pre_get_posts' );

//CATEGORY PAGINATION WITH OFFSET
if ( ! function_exists( 'redoo_category_offset' ) ) {
    function redoo_get_category_offset() {
        $redoo_return = 0;
        $redoo_cat_id = get_query_var('cat');
        $redoo_offset = 'on';
        if ( $redoo_offset == 'on' || $redoo_offset == 'off' || $redoo_offset == '' ) {
            $redoo_grid_onoff = "";
         
            if ($redoo_grid_onoff == 'style_1'){
                $redoo_return = 0;
            }elseif($redoo_grid_onoff == 'style_2'){
                $redoo_return = 0;
            }
            elseif($redoo_grid_onoff == 'style_3'){
                $redoo_return = 0;
            }
            elseif($redoo_grid_onoff == 'style_4'){
                $redoo_return = 0;
            }
            elseif($redoo_grid_onoff == 'style_5'){
                $redoo_return = 0;
            }
            elseif($redoo_grid_onoff == 'style_6'){
                $redoo_return = 0;
            }
            elseif($redoo_grid_onoff == 'style_7'){
                $redoo_return = 0;
            }
            elseif($redoo_grid_onoff == 'style_8'){
                $redoo_return = 0;
            }
            elseif($redoo_grid_onoff == 'style_9'){
                $redoo_return = 0;
            }
            elseif($redoo_grid_onoff == 'style_10'){
                $redoo_return = 0;
            }
            else{
                $redoo_return = NULL;
            }
        }
        return $redoo_return;
    }
}

//PAGINATION WITH OFFSET
if ( ! function_exists( 'redoo_pagination_offset' ) ) {
    function redoo_pagination_offset($found_posts, $query) {
        $redoo_grid_size = 0; 
        if ( is_category() ) { 
            $redoo_grid_size = redoo_get_category_offset(); 
        }
        if ( is_home() ) { 
            $redoo_grid_size = 0; 
        }
        if ( is_page() ) { 
            $redoo_grid_size = 0;
        }
        return ( $found_posts - $redoo_grid_size );
    }
}
add_filter('found_posts', 'redoo_pagination_offset', 1, 2 );

// Customizer Fucntion
include get_template_directory() . '/inc/customizer/customizer.php';
// Plugin Activation
include get_template_directory() . '/inc/required/class-tgm-plugin-activation.php';
// Require Plugin
include get_template_directory() . '/inc/required/required-plugins.php';
// Assets
include get_template_directory() . '/inc/assets/assets.php';
// Import Demo Data
include get_template_directory() . '/inc/assets/import-demo.php';
// Post view Funtion
include get_template_directory() . '/inc/assets/view-post-counter.php';
// Load Google Fonts
include get_template_directory() . '/inc/assets/load-fonts.php';
// Extra User Contact Method
include get_template_directory() . '/inc/assets/user-contactmethod.php';
// Metabox 
include get_template_directory() . '/inc/metabox/category-meta.php';
?>