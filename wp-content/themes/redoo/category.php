<?php get_header();
   $cur_cat_id = get_query_var('cat');
   $jelly_header_id = absint( get_term_meta( $cur_cat_id, 'jelly_header_id', true ) );
   $categories = get_the_category(get_the_ID());          
   if ($categories) {
      echo '<div class="themelazer_post_categories">';
      foreach( $categories as $tag) {
         $tag_link = get_category_link($tag->term_id);
         $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
            echo '<a class="post-category-color-text" itemprop="articleSection" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.''.$tag->count.'</a>';
      }
      echo "</div>";
   }
?>
   <section class="themelazer_page_category_wrapper"> 
         <div class="themelazer_page_category">
            <?php 
               if ($jelly_header_id){
                  $category_image = wp_get_attachment_image_src( $jelly_header_id , 'disto_large_slider_image' );
                  echo '<div class="category_image_bg_image" style="background-image: url('.$category_image[0].');"></div>';
                  echo '<div class="category_image_bg_ov"></div>';
               }else{

               }                            
            ?>
            <div class="container">
               <div class="themelazer_category_div_wrapper" style="background: <?php echo get_term_meta($tag->term_id, "category_color_options", true);?>">
                  <h2>Category: <?php single_cat_title('', true);?></h2>
                  <!-- <?php if(get_theme_mod('disable_post_category') !=1){
                              $categories = get_the_category(get_the_ID());          
                              if ($categories) {
                                 echo '<div class="themelazer_post_categories">';
                                 foreach( $categories as $tag) {
                                    $tag_link = get_category_link($tag->term_id);
                                    $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                                       echo '<a class="post-category-color-text" itemprop="articleSection" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
                                 }
                                 echo "</div>";
                              }
                  }?> -->
                  <p><?php echo category_description();?></p>
               </div>
            </div>
         </div>
   </section>
   <div class="themelazer-blog-body">
      <div class="container" id="wrapper_masonry">
         <div class="row"> 
            <div class="col-md-8 ">
               <div class="row"> 
                  <?php $redoo_qry = redoo_get_qry();
                     if ( $redoo_qry->have_posts() ) {
                        while ( $redoo_qry->have_posts()){ 
                           $redoo_qry->the_post();
                           $redoo_post_id = $post->ID;          
                           get_template_part( 'inc/post-layout/content','grid');          
                        }
                     }else{       
                           echo '<div class="col-md-12">'; 
                                    if (is_search()) {  esc_html_e('No result found', 'redoo');}
                           echo '</div>'; 
                     }
                  ?>
               </div>
               <?php redoo_pagination( $redoo_qry ); wp_reset_postdata();?>
            </div>
            <div class="col-md-4 themelazer_sidebar themelazer_sticky">
               <?php if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');endif; ?>
            </div>
         </div>
      </div>
   </div>
   </div>   
<!-- end content -->
<?php get_footer(); ?>