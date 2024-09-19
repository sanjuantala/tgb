<?php
    // Copyright Left
    $tianlock_wp_copyleft = get_theme_mod('tianlock_wp_copyleft');
    if (empty($tianlock_wp_copyleft)) { $tianlock_wp_copyleft = '&copy; 2018 <a href=\"http://anthemes.com/themes/tianlock/\">TianLock</a>. Powered by <a href=\"https://wordpress.org/\">WordPress</a>'; }
    
    // Copyright Right
    $tianlock_wp_copyright = get_theme_mod('tianlock_wp_copyright');
    if (empty($tianlock_wp_copyright)) { $tianlock_wp_copyright = 'TianLock Theme by <a href=\"http://anthemes.com/\">Anthemes</a>'; }

    // Company info
    $tianlock_wp_footer_links5 = get_theme_mod('tianlock_wp_footer_links5');
    if (empty($tianlock_wp_footer_links5)) { $tianlock_wp_footer_links5 = 'TianLock is a tremendously intuitive, suited to be deployed for a number of different websites and projects of all kinds, but peculiarly well suited for news websites, sharing your trending stories. <a href=\"#\">Explore all new Trending Stories <i class=\"fas fa-long-arrow-alt-right\"></i></a>'; }
?>

<!-- Begin Footer -->
<footer> 
    <?php if ( 'option2' == get_theme_mod( 'tianlock_wp_footer_display_icons' ) ) {  ?>
    <div class="social-section">
        <!-- footer social icons. -->
        <?php $tianlock_wp_footer_icons = get_theme_mod('tianlock_wp_footer_icons'); ?>
        <?php if (!empty($tianlock_wp_footer_icons)) { ?>
            <?php echo wp_kses_post(stripslashes($tianlock_wp_footer_icons)); ?>
        <?php } ?>
    </div>
    <?php } ?>


    <?php if ( 'option2' == get_theme_mod( 'tianlock_wp_footercontent' ) ) {  ?>
    <div class="wrap-middle">
      <div class="footer_1col_half">
        <div class="widget-title-f"><h3><?php esc_html_e('Top Articles by likes', 'tianlock-wp'); ?></h3></div>
        <ul class="footer-posts">
            <?php $tianlock_wp_topfooter = new WP_Query(array('meta_key' => '_thumbs_rating_up', 'ignore_sticky_posts' => 1, 'orderby' => 'meta_value_num', 'order' => 'DESC', 'posts_per_page' => esc_attr('4') )); // number to display more / less ?>
            <?php while ($tianlock_wp_topfooter->have_posts()) : $tianlock_wp_topfooter->the_post(); ?> 

            <li>
              <?php if ( has_post_thumbnail()) { ?>
                <div class="article-comm"><a href="<?php the_permalink(); ?>"><?php printf( _nx( '<i class="fas fa-comments"></i> 0', '<i class="fas fa-comments"></i> %1$s', get_comments_number(), '', 'tianlock-wp' ), number_format_i18n( get_comments_number() ) ); ?></a></div>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('tianlock-wp-thumbnail-footer', array('title' => "")); ?></a>
              <?php } ?>             
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h4> <?php echo esc_attr(tianlock_wp_the_title( 55, ' ..')); ?> </h4></a>                                            
            </li>
            
            <?php endwhile; 
            /* Restore original Post Data */
            wp_reset_postdata(); ?>             
        </ul>  
      </div><!-- end .footer_1col_half -->


      <div class="footer_1col_last">
        <div class="footer_4col">
            <?php echo wp_kses_post(stripslashes(get_theme_mod('tianlock_wp_footer_links1'))); ?>
        </div>  

        <div class="footer_4col">
            <?php echo wp_kses_post(stripslashes(get_theme_mod('tianlock_wp_footer_links2'))); ?>
        </div> 

        <div class="footer_4col">
            <?php echo wp_kses_post(stripslashes(get_theme_mod('tianlock_wp_footer_links3'))); ?>
        </div> 

        <div class="footer_4col_last">
            <?php echo wp_kses_post(stripslashes(get_theme_mod('tianlock_wp_footer_links4'))); ?>
        </div><div class="clear"></div>         

        <div class="company-info">
            <p><?php echo wp_kses_post(stripslashes(get_theme_mod('tianlock_wp_footer_links5', $tianlock_wp_footer_links5))); ?></p>
        </div>  
      </div><!-- end .footer_1col_last -->  
      <div class="clear"></div>
    </div><!-- end .wrap-middle -->
    <?php } ?>


    <div class="footer-navigation">
        <div class="wrap">
          <div class="copyright">
              <?php echo wp_kses_post(stripslashes(get_theme_mod('tianlock_wp_copyleft', $tianlock_wp_copyleft))); ?>
          </div>

          <div class="copyright_right">
              <?php echo wp_kses_post(stripslashes(get_theme_mod('tianlock_wp_copyright', $tianlock_wp_copyright))); ?>
          </div>
        </div><!-- end .wrap -->
    </div><div class="clear"></div>

    <p id="back-top"><a href="#top">
      <span><i class="fas fa-chevron-up"></i></span></a>
    </p><!-- end #back-top -->
</footer><!-- end #footer -->

<!-- Footer Theme output -->
<?php wp_footer();?>
</body>
</html>