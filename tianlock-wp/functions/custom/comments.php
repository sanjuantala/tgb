<?php
// ------------------------------------------------------
// ------ Comments --------------------------------------
// ------ by AnThemes.net -------------------------------
//        http://themeforest.net/user/An-Themes/portfolio
// ------------------------------------------------------

if ( ! function_exists( 'tianlock_wp_comment' ) ) :
function tianlock_wp_comment( $comment, $args, $depth ) {
switch ( $comment->comment_type ) :
case '' :
case 'comment':
?>

      <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div id="comment-<?php comment_ID(); ?>"> 

            <div class="comment-body">
                  <?php comment_text(); ?>
                  <?php if ( $comment->comment_approved == '0' ) : ?>
                  <div style="display:block; color:red;"><?php esc_html_e('Your comment is awaiting moderation.', 'tianlock-wp'); ?></div> 
                  <?php endif; ?>
            </div>
            <span class="comm-avatar"><?php echo wp_kses_post(get_avatar( $comment, 18)); ?></span>
            <span class="comment-author"><?php echo get_comment_author_link(); ?></span>
            <span class="comment-date"><?php echo esc_attr(get_comment_date()); ?> <?php echo esc_attr(get_comment_time()); ?></span>                         
            <span style="margin-left: 10px; font-size:12px;"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>                     
            <div class="clear"></div>            
          </div><!-- #comment- -->

<?php break; case 'pingback'  :  case 'trackback' : ?>
<li class="post pingback"> <p><?php esc_html_e('Pingback:', 'tianlock-wp'); ?> <?php esc_url(comment_author_link()); ?></p> </li>
<?php break; endswitch; } endif; ?>