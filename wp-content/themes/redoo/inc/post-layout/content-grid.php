<div <?php post_class( 'col-md-6');?>>
     <div class=" blog-style-one blog-small-grid">
                <div class="single-blog-style-one">
         <div class="img-box <?php if ( has_post_thumbnail()){echo 'ghave_img';}else{echo 'gnone_img';}?>">
            <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail()) {the_post_thumbnail('redoo_slider_grid_small');} ?></a>
         </div>                        
            <!-- <?php if(get_theme_mod('disable_post_category') !=1){
               $categories = get_the_category(get_the_ID());          
               if ($categories) {
                 echo '<div class="themelazer_post_categories">';
                 foreach( $categories as $tag) {
                  echo '<a '.$tag->name.'" href="'.esc_url(get_category_link($tag->term_id)).'">'.$tag->name.'</a>';
                 }
                 echo "</div>";
                 }
                 }
               ?> -->
               <?php if(get_theme_mod('disable_post_category') !=1){
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
               }?>
        
         <div class="text-box">
            <h3>
               <a href="<?php the_permalink(); ?>" tabindex="-1"><?php the_title()?></a>
            </h3>
            <?php redoo_post_meta_sx(get_the_ID());?>
            <p><?php echo wp_trim_words( get_the_content(), 14, '...' );?> </p>
            
         </div>
      </div>
   </div>
</div>