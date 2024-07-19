<div class="bt_search_form_wrapper">
   <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
      <input type="text" class="bt_search_inout header_layout_3" data-swplive="true" placeholder="<?php echo esc_attr('What are you looking for?', 'redoo'); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="keyword" id="keyword" onkeyup="fetch()" />
      <button type="submit" class="bt_search_submit">
            <i class="fa fa-search"></i>
            <span><?php esc_html_e('Search', 'redoo');?></span>
      </button>
   </form>
</div>