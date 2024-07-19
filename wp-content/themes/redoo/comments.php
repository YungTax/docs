<?php
   if( post_password_required() ) {
      return;
   }
?>
<?php if ( have_comments() ) : ?>
<div class="single_section_comment">
   <div id="comments" class="comments-area">
      <?php endif; // have_comments() ?>
      <?php if ( have_comments() ) :
         $comments_by_type = separate_comments( $comments );
         $jelly_comments_count = count( $comments_by_type['comment'] );  
         $jelly_pings_count = count( $comments_by_type['pings'] );
      ?>
         <?php if($jelly_pings_count){?>  
            <div class="themelazer_title_head">   
               <h3>                                                                                
                  <?php echo esc_html( sprintf( _n( 'One Ping', '%1$s Pings & Trackbacks', $jelly_pings_count, 'redoo' ), number_format_i18n( $jelly_pings_count ) ) ); ?>
               </h3>
            </div>
            <ol class="commentlist">
               <?php wp_list_comments( array( 'callback' => 'redoo_comment', 'style' => 'ol', 'type' => 'pings' ) ); ?>
            </ol>
         <?php }?>
         <?php if($jelly_comments_count){?>
            <div class="themelazer_title_head">   
               <h3>
                  <?php echo esc_html( sprintf( _n( 'One Comment', '%1$s Comments', $jelly_comments_count, 'redoo' ), number_format_i18n( $jelly_comments_count ) ) ); ?>
               </h3>
            </div>
            <ol class="commentlist">
               <?php wp_list_comments( array( 'callback' => 'redoo_comment', 'style' => 'ol', 'type' => 'comment' ) ); ?>
            </ol>
         <?php }?>
         <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-below" class="navigation" role="navigation">
               <div class="nav-previous">
                  <?php previous_comments_link( esc_html__( '« Older Comments', 'redoo' ) ); ?>
               </div>
               <div class="nav-next">
                  <?php next_comments_link( esc_html__( 'Newer Comments »', 'redoo' ) ); ?>
               </div>
            </nav>
         <?php endif;?>
      <?php endif; // have_comments() ?>
      <?php comment_form(
         array(
         'comment_notes_after' => '',
         'fields'  => apply_filters( 'comment_form_default_fields', array(
                        'author' => '<div class="form-fields row"><span class="comment-form-author col-md-6">' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="'. esc_attr__( 'Full Name *', 'redoo' ) .'" /></span>',
                        'email'  => '<span class="comment-form-email col-md-6"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" placeholder="'. esc_attr__( 'Email address *', 'redoo' ) .'" /></span></div>',
                  ) ),
         'comment_field'=> '<p class="comment-form-comment"><textarea class="u-full-width" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="'. esc_attr__( 'Comment *', 'redoo' ) .'"></textarea></p>'
         )
      );?>
      <?php if ( have_comments() ) : ?>
   </div>
</div>
<?php endif; // have_comments() ?>