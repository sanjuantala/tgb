<?php if ( post_password_required() ) : ?>
    <p class="nopassword"><?php esc_html_e('This post is password protected. Enter the password to view any comments.', 'tianlock-wp'); ?></p>
<?php return; endif; ?>

<?php if ( have_comments() ) : ?>
 
            <ul class="comment">
                <?php wp_list_comments( array( 'callback' => 'tianlock_wp_comment' ) ); ?>
            </ul>
            <div class="clear"></div>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
        <div class="pagination">
            <?php previous_comments_link('&lsaquo; ' . esc_html__('Older Comments', 'tianlock-wp') . ''); ?>
            <?php next_comments_link('' . esc_html__('Newer Comments', 'tianlock-wp') . ' &rsaquo;'); ?>
            <div class="clear"></div>
        </div>
<?php endif; // check for comment navigation ?>


<?php else : // or, if we don't have comments:
    if ( ! comments_open() ) : ?>
    <p class="nocomments"><?php esc_html_e('Comments are closed.', 'tianlock-wp'); ?></p>
<?php endif; // end ! comments_open() ?>
<?php endif; // end have_comments() ?>

 
<?php comment_form(); ?>