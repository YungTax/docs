<?php if (get_theme_mod('header_layout_design')=='header_layout_1'){?>
   <header class="themelazer_main_header">
      <!-- Header Middle -->
      <div class="themelazer_middle_header white_bg">
         <?php if (is_active_sidebar('instagram-header')) : ?>
               <div class="header_insta">                    
                  <?php  if (is_active_sidebar('instagram-header')) : dynamic_sidebar('instagram-header'); endif; ?>  
               </div>
         <?php endif; ?> 
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="themelazer_promomenu_wrapper">
                     <div class="themelazer_header_social_icons">
                        <!-- <div class="themelazer_btn_dark_mode">
                           <div class="themelazer_btn_dark_mode-inner-left"></div>
                           <div class="themelazer_btn_dark_mode-inner"></div>
                        </div> -->
                        <?php if(!get_theme_mod('disable_social_icons')==1){?>
                        <ul class="themelazer_social_wrapper">
                           <?php if(get_theme_mod('facebook')){?>
                           <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" title="facebook" aria-label="facebook"  target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('twitter')){?>
                           <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" title="twitter" aria-label="twitter"  target="_blank"><i class="fab fa-twitter"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('vk')){?>
                           <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" title="vk" aria-label="vk"  target="_blank"><i class="fab fa-vk"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('telegram')){?>
                           <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" title="telegram" aria-label="telegram"   target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                           <?php }?>                        
                           <?php if(get_theme_mod('behance')){?>
                           <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>"  title="Behance" aria-label="Behance"  target="_blank"><i class="fab fa-behance"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('vimeo')){?>
                           <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" title="vimeo" aria-label="vimeo"  target="_blank"><i class="fab fa-vimeo"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('youtube')){?>
                           <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" title="youtube" aria-label="youtube"   target="_blank"><i class="fab fa-youtube"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('instagram')){?>
                           <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>"  title="Instgram" aria-label="Instgram" target="_blank"><i class="fab fa-instagram"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('linkedin')){?>
                           <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" title="linkedin" aria-label="linkedin"  target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('pinterest')){?>
                           <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" title="pinterest" aria-label="pinterest"  target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('deviantart')){?>
                           <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" title="deviantart" aria-label="deviantart"  target="_blank"><i class="fab fa-deviantart"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('dribble')){?>
                           <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" title="dribble" aria-label="dribble"  target="_blank"><i class="fab fa-dribbble"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('dropbox')){?>
                           <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" title="dropbox" aria-label="dropbox"  target="_blank"><i class="fab fa-dropbox"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('rss')){?>
                           <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" title="rss" aria-label="rss"  target="_blank"><i class="fa fa-rss"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('skype')){?>
                           <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" title="skype" aria-label="skype"  target="_blank"><i class="fab fa-skype"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('stumbleupon')){?>
                           <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>"title="stumbleupon" aria-label="stumbleupon"   target="_blank"><i class="fab fa-stumbleupon"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('wordpress')){?>
                           <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" title="wordpress" aria-label="wordpress"  target="_blank"><i class="fab fa-wordpress"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('yahoo')){?>
                           <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" title="yahoo" aria-label="yahoo"  target="_blank"><i class="fab fa-yahoo"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('sound_cloud')){?>
                           <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" title="sound cloud" aria-label="sound cloud" target="_blank"><i class="fab fa-soundcloud"></i></a></li>
                           <?php }?>
                        </ul>
                        <?php }?>
                     </div>
                     
                     <div class="themelazer_mobile_logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php $logo = get_theme_mod('redoo_logo_white'); ?>
                        <?php if (!empty($logo)): ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php else: ?>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/img/redoo_white.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php endif; ?></a>
                     </div>
                     <div class="themelazer-nav">
                        <!-- Main Menu -->
                        <div class="themelazer-navigation">
                           <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
                           <?php $main_menu = array( 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'menu', 'menu_id' => 'themelazer_m_menu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
                           <?php }else{ ?>
                           <?php if ( current_user_can( 'manage_options' ) ){ ?>
                           <ul class="menu">
                              <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                 <?php esc_html_e( 'Click here to add navigation menu', 'redoo' ); ?></a>
                              </li>
                           </ul>
                           <?php }}?>
                        </div>
                        <!-- Main Menu End-->
                     </div>
                     <ul class="header-s-m black_color">
                        <li>
                           <?php if(!get_theme_mod('disable_top_search')==1){?>
                              <a href="#search_popup"  title="Search" aria-label="Search" class="toggle-search-box">
                                 <i class="ti-search"></i>
                              </a>
                           <?php }?>
                        </li>
                        <li class="themelazer_mb_themelazern sidemenuoption-open is-active"><i class="ti-menu"></i></li>
                     </ul>
                     
                  
                  </div>
               </div>
            </div>
         </div>
         <div id="themelazer_search_wrapper">
            <i class="ti-close"></i>
            <form role="search" class="form-search" method="get" id="s" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
               <input spellcheck="false" autocomplete="off" type="text" value="" name="s" placeholder="<?php esc_attr_e('Search...', 'redoo'); ?>" />
            </form>
            <p>Type above and press Enter to search. Press Esc to cancel.</p> 
            <div class="themelazer_category_list"> 
               <?php
                  $categories = get_categories();
                  echo '<div class="category_header_search" ><div class="themelazer_post_categories_search_form">';
                     foreach($categories as $category) {
                           $title_bg_Color = get_term_meta($category->term_id, "category_color_options", true); 
                           echo '<a '.'style="background:'.$title_bg_Color. '"'.' href="'. get_category_link($category->term_id) . '">' . $category->name .' '.$category->category_count.''. '</a>';
                     }
                  echo '</div></div>';
               ?>
            </div>
            </div>
            <div class="themelazer_search_wrapper">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">            
                        <?php get_search_form(); ?>                    
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <!--Header Top-->   
      <div id="themelazer_top_bar">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="themelazer_logo_header2">
                     <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php $logo = get_theme_mod('redoo_logo_white'); ?>
                        <?php if (!empty($logo)): ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php else: ?>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/img/redoo_white.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php endif; ?>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Header Top -->
   </header>
<?php }elseif (get_theme_mod('header_layout_design')=='header_layout_2'){?>
   <header class="themelazer_main_header">
      <!--Header Top-->   
      <div id="themelazer_top_bar">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="themelazer_logo_header2">
                     <a href="<?php echo esc_url(home_url('/')); ?>">
               <?php $logo = get_theme_mod('redoo_logo_white'); ?>
               <?php if (!empty($logo)): ?>
               <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
               <?php else: ?>
               <img src="<?php echo esc_url(get_template_directory_uri().'/img/redoo_white.png'); ?>" alt="<?php bloginfo('description'); ?>" />
               <?php endif; ?></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Header Top -->
      <!-- Header Middle -->
      <div class="themelazer_middle_header header_layout2">
      <?php if (is_active_sidebar('instagram-header')) : ?>
      <div class="header_insta">       
      <?php  if (is_active_sidebar('instagram-header')) : dynamic_sidebar('instagram-header'); endif; ?>  
      </div>
      <?php endif; ?> 
      <div class="container clearfix">
         <div class="row">
            <div class="col-md-12">
               <div class="themelazer_promomenu_wrapper">
                  <div class="themelazer_header_social_icons">
                     <?php if(!get_theme_mod('disable_social_icons')==1){?>
                     <ul class="themelazer_social_wrapper">
                        <?php if(get_theme_mod('facebook')){?>
                        <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" title="facebook" aria-label="facebook"  target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('twitter')){?>
                        <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" title="twitter" aria-label="twitter"  target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('vk')){?>
                        <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" title="vk" aria-label="vk"  target="_blank"><i class="fab fa-vk"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('telegram')){?>
                        <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" title="telegram" aria-label="telegram"   target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                        <?php }?>                        
                        <?php if(get_theme_mod('behance')){?>
                        <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>"  title="Behance" aria-label="Behance"  target="_blank"><i class="fab fa-behance"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('vimeo')){?>
                        <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" title="vimeo" aria-label="vimeo"  target="_blank"><i class="fab fa-vimeo"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('youtube')){?>
                        <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" title="youtube" aria-label="youtube"   target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('instagram')){?>
                        <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>"  title="Instgram" aria-label="Instgram" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('linkedin')){?>
                        <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" title="linkedin" aria-label="linkedin"  target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('pinterest')){?>
                        <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" title="pinterest" aria-label="pinterest"  target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('deviantart')){?>
                        <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" title="deviantart" aria-label="deviantart"  target="_blank"><i class="fab fa-deviantart"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('dribble')){?>
                        <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" title="dribble" aria-label="dribble"  target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('dropbox')){?>
                        <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" title="dropbox" aria-label="dropbox"  target="_blank"><i class="fab fa-dropbox"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('rss')){?>
                        <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" title="rss" aria-label="rss"  target="_blank"><i class="fa fa-rss"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('skype')){?>
                        <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" title="skype" aria-label="skype"  target="_blank"><i class="fab fa-skype"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('stumbleupon')){?>
                        <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>"title="stumbleupon" aria-label="stumbleupon"   target="_blank"><i class="fab fa-stumbleupon"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('wordpress')){?>
                        <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" title="wordpress" aria-label="wordpress"  target="_blank"><i class="fab fa-wordpress"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('yahoo')){?>
                        <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" title="yahoo" aria-label="yahoo"  target="_blank"><i class="fab fa-yahoo"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('sound_cloud')){?>
                        <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" title="sound cloud" aria-label="sound cloud" target="_blank"><i class="fab fa-soundcloud"></i></a></li>
                        <?php }?>
                     </ul>
                     <?php }?>
                  </div>
                  <ul class="header-s-m black_color">
                     <li>
                        <?php if(!get_theme_mod('disable_top_search')==1){?>
                           <a href="#search_popup" title="Search" aria-label="Search"  class="toggle-search-box">
                                 <i class="ti-search"></i>
                              </a>
                        <?php }?>
                     </li>
                     <li class="themelazer_mb_themelazern sidemenuoption-open is-active"><i class="ti-menu"></i></li>
                  </ul>
                  <div class="themelazer_mobile_logo">
                     <a href="<?php echo esc_url(home_url('/')); ?>">
                     <?php $logo = get_theme_mod('redoo_logo_white'); ?>
                     <?php if (!empty($logo)): ?>
                     <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                     <?php else: ?>
                     <img src="<?php echo esc_url(get_template_directory_uri().'/img/redoo_white.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                     <?php endif; ?></a>
                  </div>
                  <div class="themelazer-nav clearfix">
                     <!-- Main Menu -->
                     <div class="themelazer-navigation">
                        <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
                        <?php $main_menu = array( 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'menu', 'menu_id' => 'themelazer_m_menu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
                        <?php }else{ ?>
                        <?php if ( current_user_can( 'manage_options' ) ){ ?>
                        <ul class="menu">
                           <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                              <?php esc_html_e( 'Click here to add navigation menu', 'redoo' ); ?></a>
                           </li>
                        </ul>
                        <?php }}?>
                     </div>
                     <!-- Main Menu End-->
                  </div>

               </div>
            </div>
         </div>
      </div>
      <div id="themelazer_search_wrapper">
         <i class="ti-close"></i>
         <form role="search" class="form-search" method="get" id="s" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <input spellcheck="false" autocomplete="off" type="text" value="" name="s" placeholder="<?php esc_attr_e('Search...', 'redoo'); ?>" />
         </form>
         <p>Type above and press Enter to search. Press Esc to cancel.</p> 
         <div class="themelazer_category_list"> 
            <?php
               $categories = get_categories();
               echo '<div class="category_header_search" ><div class="themelazer_post_categories_search_form">';
                  foreach($categories as $category) {
                        $title_bg_Color = get_term_meta($category->term_id, "category_color_options", true); 
                        echo '<a '.'style="background:'.$title_bg_Color. '"'.' href="'. get_category_link($category->term_id) . '">' . $category->name .' '.$category->category_count.''. '</a>';
                  }
               echo '</div></div>';
            ?>
         </div>
         </div>
         <div class="themelazer_search_wrapper">
            <div class="container">
               <div class="row">f

                  <div class="col-md-12">            
                     <?php get_search_form(); ?>                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
<?php }elseif (get_theme_mod('header_layout_design')=='header_layout_3'){?>
   <header class="themelazer_main_header">
      <!-- Header Middle -->
      <div class="themelazer_middle_header layout3">
               <?php if (is_active_sidebar('instagram-header')) : ?>
      <div class="header_insta">
                  <?php  if (is_active_sidebar('instagram-header')) : dynamic_sidebar('instagram-header'); endif; ?>
      </div>
      <?php endif; ?> 
         <div class="container clearfix">
            <div class="row">
               <div class="col-md-12">
                  <div class="themelazer_promomenu_wrapper">

                     <div class="themelazer_logo_header3">
                              <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php $logo = get_theme_mod('redoo_logo'); ?>
                        <?php if (!empty($logo)): ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php else: ?>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/img/redoo.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php endif; ?></a>
                           </div>


                     <div class="themelazer-nav clearfix">
                        <!-- Main Menu -->
                        <div class="themelazer-navigation header_layout_3">
                           <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
                           <?php $main_menu = array( 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'menu', 'menu_id' => 'themelazer_m_menu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
                           <?php }else{ ?>
                           <?php if ( current_user_can( 'manage_options' ) ){ ?>
                           <ul class="menu">
                              <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                 <?php esc_html_e( 'Click here to add navigation menu', 'redoo' ); ?></a>
                              </li>
                           </ul>
                           <?php }}?>
                        </div>
                        <!-- Main Menu End-->
                     </div>
                     
                     
                     <ul class="header-s-m">
                        <li><?php if(!get_theme_mod('disable_top_search')==1){?>
                           <a href="#search_popup"  title="Search" aria-label="Search" class="toggle-search-box layout_3">
                        <i class="ti-search"></i>
                        </a>
                     
                        <?php }?>
               
                        </li>
                     
                        <li class="themelazer_mb_themelazern sidemenuoption-open is-active"><i class="ti-menu"></i></li>
                     </ul>
                  
                  </div>
               </div>
            </div>
         </div>
         <div id="themelazer_search_wrapper">
            <i class="ti-close"></i>
            <form role="search" class="form-search" method="get" id="s" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
               <input spellcheck="false" autocomplete="off" type="text" value="" name="s" placeholder="<?php esc_attr_e('Search...', 'redoo'); ?>" />
            </form>
            <p>Type above and press Enter to search. Press Esc to cancel.</p> 
            <div class="themelazer_category_list"> 
               <?php
                  $categories = get_categories();
                  echo '<div class="category_header_search" ><div class="themelazer_post_categories_search_form">';
                     foreach($categories as $category) {
                           $title_bg_Color = get_term_meta($category->term_id, "category_color_options", true); 
                           echo '<a '.'style="background:'.$title_bg_Color. '"'.' href="'. get_category_link($category->term_id) . '">' . $category->name .' '.$category->category_count.''. '</a>';
                     }
                  echo '</div></div>';
               ?>
            </div>
            </div>
            <div class="themelazer_search_wrapper">
               <div class="container">
                  <div class="row">f

                     <div class="col-md-12">            
                        <?php get_search_form(); ?>                    
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </header> 
<?php }elseif (get_theme_mod('header_layout_design')=='header_layout_4'){?>
   <header class="themelazer_main_header">
      <!-- Header Middle -->
      <div class="themelazer_middle_header layout4">
         <?php if (is_active_sidebar('instagram-header')) : ?>
      <div class="header_insta">  
         <?php  if (is_active_sidebar('instagram-header')) : dynamic_sidebar('instagram-header'); endif; ?>
      </div>
      <?php endif; ?> 
         <div class="container clearfix">
            <div class="row">
               <div class="col-md-12">
                  <div class="themelazer_promomenu_wrapper">
                     <div class="themelazer_logo_header3">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                           <?php $logo = get_theme_mod('redoo_logo'); ?>
                           <?php if (!empty($logo)): ?>
                                    <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                           <?php else: ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri().'/img/redoo.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                           <?php endif; ?>
                        </a>
                     </div>
                     <div class="themelazer-nav clearfix">
                        <!-- Main Menu -->
                        <div class="themelazer-navigation header_layout_3">
                           <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
                           <?php $main_menu = array( 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'menu', 'menu_id' => 'themelazer_m_menu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
                           <?php }else{ ?>
                           <?php if ( current_user_can( 'manage_options' ) ){ ?>
                           <ul class="menu">
                              <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                 <?php esc_html_e( 'Click here to add navigation menu', 'redoo' ); ?></a>
                              </li>
                           </ul>
                           <?php }}?>
                        </div>
                        <!-- Main Menu End-->
                     </div>
                     <ul class="header-s-m">
                        <li>
                           <?php if(!get_theme_mod('disable_top_search')==1){?>
                              <a href="#search_popup"  title="Search" aria-label="Search" class="toggle-search-box layout_3">
                                 <i class="ti-search"></i>
                              </a>
                           <?php }?>
                        </li>
                        <li class="themelazer_mb_themelazern sidemenuoption-open is-active"><i class="ti-menu"></i></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div id="themelazer_search_wrapper">
            <i class="ti-close"></i>
            <form role="search" class="form-search" method="get" id="s" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
               <input spellcheck="false" autocomplete="off" type="text" value="" name="s" placeholder="<?php esc_attr_e('Search...', 'redoo'); ?>" />
            </form>
            <p>Type above and press Enter to search. Press Esc to cancel.</p> 
            <div class="themelazer_category_list"> 
               <?php
                  $categories = get_categories();
                  echo '<div class="category_header_search" ><div class="themelazer_post_categories_search_form">';
                     foreach($categories as $category) {
                           $title_bg_Color = get_term_meta($category->term_id, "category_color_options", true); 
                           echo '<a '.'style="background:'.$title_bg_Color. '"'.' href="'. get_category_link($category->term_id) . '">' . $category->name .' '.$category->category_count.''. '</a>';
                     }
                  echo '</div></div>';
               ?>
            </div>
            </div>
            <div class="themelazer_search_wrapper">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">            
                        <?php get_search_form(); ?>                    
                     </div>
                  </div>
               </div>
            </div>
         </div>

   </header> 
   <?php }else{?>
      <header class="themelazer_main_header">
      <!-- Header Middle -->
      <div class="themelazer_middle_header white_bg">
      <?php if (is_active_sidebar('instagram-header')) : ?>
      <div class="header_insta">       
      <?php  if (is_active_sidebar('instagram-header')) : dynamic_sidebar('instagram-header'); endif; ?>
      </div>
      <?php endif; ?> 
         <div class="container clearfix">
            <div class="row">
               <div class="col-md-12">
                  <div class="themelazer_promomenu_wrapper">
                     <div class="themelazer_header_social_icons">
                        <?php if(!get_theme_mod('disable_social_icons')==1){?>
                           <ul class="themelazer_social_wrapper">
                              <?php if(get_theme_mod('facebook')){?>
                              <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" title="facebook" aria-label="facebook"  target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('twitter')){?>
                              <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" title="twitter" aria-label="twitter"  target="_blank"><i class="fab fa-twitter"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('vk')){?>
                              <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" title="vk" aria-label="vk"  target="_blank"><i class="fab fa-vk"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('telegram')){?>
                              <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" title="telegram" aria-label="telegram"   target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                              <?php }?>                        
                              <?php if(get_theme_mod('behance')){?>
                              <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>"  title="Behance" aria-label="Behance"  target="_blank"><i class="fab fa-behance"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('vimeo')){?>
                              <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" title="vimeo" aria-label="vimeo"  target="_blank"><i class="fab fa-vimeo"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('youtube')){?>
                              <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" title="youtube" aria-label="youtube"   target="_blank"><i class="fab fa-youtube"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('instagram')){?>
                              <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>"  title="Instgram" aria-label="Instgram" target="_blank"><i class="fab fa-instagram"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('linkedin')){?>
                              <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" title="linkedin" aria-label="linkedin"  target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('pinterest')){?>
                              <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" title="pinterest" aria-label="pinterest"  target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('deviantart')){?>
                              <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" title="deviantart" aria-label="deviantart"  target="_blank"><i class="fab fa-deviantart"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('dribble')){?>
                              <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" title="dribble" aria-label="dribble"  target="_blank"><i class="fab fa-dribbble"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('dropbox')){?>
                              <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" title="dropbox" aria-label="dropbox"  target="_blank"><i class="fab fa-dropbox"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('rss')){?>
                              <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" title="rss" aria-label="rss"  target="_blank"><i class="fa fa-rss"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('skype')){?>
                              <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" title="skype" aria-label="skype"  target="_blank"><i class="fab fa-skype"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('stumbleupon')){?>
                              <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>"title="stumbleupon" aria-label="stumbleupon"   target="_blank"><i class="fab fa-stumbleupon"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('wordpress')){?>
                              <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" title="wordpress" aria-label="wordpress"  target="_blank"><i class="fab fa-wordpress"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('yahoo')){?>
                              <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" title="yahoo" aria-label="yahoo"  target="_blank"><i class="fab fa-yahoo"></i></a></li>
                              <?php }?>
                              <?php if(get_theme_mod('sound_cloud')){?>
                              <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" title="sound cloud" aria-label="sound cloud" target="_blank"><i class="fab fa-soundcloud"></i></a></li>
                              <?php }?>
                           </ul>
                        <?php }?>
                     </div>
                     <div class="themelazer_mobile_logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php $logo = get_theme_mod('redoo_logo_white'); ?>
                        <?php if (!empty($logo)): ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php else: ?>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/img/redoo_white.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php endif; ?></a>
                     </div>
                     <div class="themelazer-nav clearfix">
                        <!-- Main Menu -->
                        <div class="themelazer-navigation">
                           <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
                           <?php $main_menu = array( 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'menu', 'menu_id' => 'themelazer_m_menu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
                           <?php }else{ ?>
                           <?php if ( current_user_can( 'manage_options' ) ){ ?>
                           <ul class="menu">
                              <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                 <?php esc_html_e( 'Click here to add navigation menu', 'redoo' ); ?></a>
                              </li>
                           </ul>
                           <?php }}?>
                        </div>
                        <!-- Main Menu End-->
                     </div>
                     <ul class="header-s-m black_color">
                        <li>
                           <?php if(!get_theme_mod('disable_top_search')==1){?>
                              <a href="#search_popup"  title="Search" aria-label="Search" class="toggle-search-box">
                                 <i class="ti-search"></i>
                              </a>
                           <?php }?> 
                        </li>
                        <li class="themelazer_mb_themelazern sidemenuoption-open is-active"><i class="ti-menu"></i></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div id="themelazer_search_wrapper">
            <i class="ti-close"></i>
            <form role="search" class="form-search" method="get" id="s" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
               <input spellcheck="false" autocomplete="off" type="text" value="" name="s" placeholder="<?php esc_attr_e('Search...', 'redoo'); ?>" />
            </form>
            <p>Type above and press Enter to search. Press Esc to cancel.</p> 
            <div class="themelazer_category_list"> 
               <?php
                  $categories = get_categories();
                  echo '<div class="category_header_search" ><div class="themelazer_post_categories_search_form">';
                     foreach($categories as $category) {
                           $title_bg_Color = get_term_meta($category->term_id, "category_color_options", true); 
                           echo '<a '.'style="background:'.$title_bg_Color. '"'.' href="'. get_category_link($category->term_id) . '">' . $category->name .' '.$category->category_count.''. '</a>';
                     }
                  echo '</div></div>';
               ?>
            </div>
            </div>
            <div class="themelazer_search_wrapper">
               <div class="container">
                  <div class="row">f

                     <div class="col-md-12">            
                        <?php get_search_form(); ?>                    
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <!--Header Top-->   
      <div id="themelazer_top_bar">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="themelazer_logo_header2">
                     <a href="<?php echo esc_url(home_url('/')); ?>">
               <?php $logo = get_theme_mod('redoo_logo_white'); ?>
               <?php if (!empty($logo)): ?>
               <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
               <?php else: ?>
               <img src="<?php echo esc_url(get_template_directory_uri().'/img/resport-whtie.png'); ?>" alt="<?php bloginfo('description'); ?>" />
               <?php endif; ?></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Header Top -->
   </header>
<?php } ?>




