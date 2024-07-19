<!DOCTYPE html>
<html class="ie ie9" <?php language_attributes(); ?>>
<html<?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <?php wp_head(); ?>         
   </head>
  <!-- <div class="themelazer_progress_bar_wrapper">
      <div class="themelazer_progress_bar" id="progress_bar_active"></div>
   </div> -->
   <body<?php body_class();?>>
      <div class="themelazer_scroll">
         <p class="themelazer_scroll_body">
            <span class="themelazer_scroll_text"><?php esc_html_e('SCROLL' , 'redoo');?></span>
            <span class="themelazer_scroll_line"></span>
         </p>
      </div>
      <div class="themelazer_main_wrapper 
            <?php if (get_theme_mod('category_layout_design') == 'category_layout_2'){
                  echo 'themelazer_cat_s1';
               }else{
                  echo 'fdasfasf';
               }?> 
               <?php if(get_theme_mod('en_border_radius')==1){
                  echo 'themelazer_en_radius';
               }else{}
            ?> 
      ">
      <?php wp_body_open(); ?>
      <?php get_template_part('header-layout'); ?>
         
            