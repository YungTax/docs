<?php get_header();?>
   <div class="themelazer-blog-body">
      <div class="container" id="wrapper_masonry">
         <div class="row">
            <div class="col-md-8 themelazer_content">
               <div class="row">
                  <div class="col-md-12">
                     <div class="author_info author_info_page">
                        <div class="author_avatar"><?php echo get_avatar(get_the_author_meta('user_email'), 300); ?></div>
                        <div class="author_description">
                           <h3 class="author_title"><?php the_author_meta( 'display_name' ); ?></h3>
                           <div class="author_bio">
                              <p><?php echo get_the_author_meta('description'); ?></p>
                              <p class="author_post_count"><?php echo esc_html_e('Posts made: ', 'redoo') . count_user_posts( get_the_author_meta('ID') ); ?></p>
                           </div>
                           <div class="themelazer-author-social-links">
                              <div class="themelazer-social-links-items">
                                 <div class="themelazer-social-links-item">
                                    <?php if(function_exists('redoo_author_contact_icons')) { 
                                       redoo_author_contact_icons(get_the_ID()); } 
                                    ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <h3 class="themlazer_author_post_title"><?php echo esc_html_e('Latest articles by ','redoo') . the_author_meta( 'display_name' ); ?></h3>
               <div class="row"> 
                  <?php 
                     $redoo_qry = redoo_get_qry();
                     if ( $redoo_qry->have_posts() ) {
                        while ( $redoo_qry->have_posts() ) { 
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
               <?php
                  redoo_pagination( $redoo_qry );
                  wp_reset_postdata();
               ?>  
            </div>
            <div class="col-md-4 themelazer_sidebar themelazer_sticky">
               <?php if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');endif; ?>
            </div>
         </div>
      </div>
   </div>
<!-- end content -->
<?php get_footer(); ?>