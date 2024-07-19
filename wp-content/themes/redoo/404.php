<?php get_header(); ?>
   <div class="themelazer-blog-body">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-6">
               <div class="page-notfound text-center">
                  <h1 class="page-title"><?php esc_html_e('404', 'redoo'); ?></h1>
                  <p class="page-desc"><?php esc_html_e('We’re sorry but we can’t seem to find the page you requested. 
                     This might be because you have typed the web address incorrectly', 'redoo'); ?>
                  </p>
                  <a href="<?php echo esc_url(home_url('')); ?>" class="themelazern_404_page">
                     <?php esc_html_e('Go To Home Page', 'redoo'); ?>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
<?php get_footer(); ?>