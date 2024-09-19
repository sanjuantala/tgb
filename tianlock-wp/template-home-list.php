<?php 
/* 
Template Name: Template - Home
*/ 
?>
<?php get_header(); // add header  ?>

<!-- Home Modules (Widgets) -->
<?php if ( is_active_sidebar( 'homemodules_tianlock_wp' ) ) { ?>
<div class="module-section">
    <div class="wrap-container">
        <div class="module-wrap"><?php dynamic_sidebar( 'homemodules_tianlock_wp' ); ?></div>
    </div><!-- end .wrap-container -->
</div><!-- end .module-section -->
<?php } ?> 
<!-- End. Home Modules --> 

<!-- Begin wrap container -->
<div class="wrap-container">

        <nav class="menu--adsila">
            <div class="menu__item">
                <span class="menu__item-name"><?php echo esc_attr(get_theme_mod('tianlock_wp_blog_titleleft', 'Freshh')); ?></span> 
                <span class="menu__item-label"><?php echo esc_attr(get_theme_mod('tianlock_wp_blog_titleright', 'Explore all new trending stories')); ?></span>
            </div>
        </nav><!-- end .menu-adsila -->

    <!-- Begin Main Wrap left Content -->
    <div class="wrap-left-content"> 

        <ul id="infinite-articles" class="modern-list js-masonry">
            <?php
                if ( get_query_var('paged') )  {  $paged = get_query_var('paged'); } elseif ( get_query_var('page') ) { $paged = get_query_var('page'); } else { $paged = 1;  }
                // The Query
                query_posts( array( 'post_type' => 'post', 'paged' => $paged ) );
                $num=0; if (have_posts()) : while (have_posts()) : the_post(); $num++;
            ?>

            <?php if ( 'option2' == get_theme_mod( 'tianlock_wp_display_banners' ) ) {  ?>
                <?php if($num==2) { ?><li class="homeadv"><?php echo stripslashes(get_theme_mod('tianlock_wp_add728')); ?></li><?php } ?>
            <?php } ?>

            <li <?php post_class('ms-item') ?> id="post-<?php the_ID(); ?>">
                <?php if ( has_post_thumbnail()) { ?>
                    <div class="article-comm"><a href="<?php the_permalink(); ?>"><?php printf( _nx( '<i class="fas fa-comments"></i> 0', '<i class="fas fa-comments"></i> %1$s', get_comments_number(), '', 'tianlock-wp' ), number_format_i18n( get_comments_number() ) ); ?></a></div> 
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('tianlock-wp-thumbnail-blog-list', array('title' => "")); ?></a>
                <div class="modern-list-content">
                <?php } else { ?>
                <div class="modern-list-content-full">
                <?php } // post thumbnail ?>
                                    
                    <div class="clear"></div>
                    <div class="titleContainer">
                        <h2><span class="indent"><span class="heading"> <a href="<?php the_permalink(); ?>"><?php esc_attr(tianlock_wp_the_title( 80, ' ..')); ?> <?php if ( function_exists( 'tianlock_wp_rcp_lock' ) ) { echo esc_attr(tianlock_wp_rcp_lock()); } ?></a></span></span></h2>
                    </div>

                    <p><?php echo wp_kses_post(tianlock_wp_excerpt(strip_tags(strip_shortcodes(get_the_excerpt())), 180)); ?></p>

                    <div class="clear"></div>
                    <ul class="meta-content-home">
                        <li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo wp_kses_post(get_avatar( get_the_author_meta( 'user_email' ), 24 )); ?></a></li>
                        <li class="aut-name"><?php esc_url(the_author_posts_link()); ?></li>
                        <?php if ( function_exists( 'getPostViews_tianlock_wp' ) ) { ?><li class="listviews"><i class="fas fa-bolt" aria-hidden="true"></i> <?php echo esc_attr(getPostViews_tianlock_wp(get_the_ID())); ?> <?php esc_html_e( 'Views', 'tianlock-wp' ); ?></li><?php } ?>
                    </ul><!-- end .meta-content-home -->
                    <div class="thumbs-ranting"><?php if (function_exists('thumbs_rating_getlink')) { echo stripslashes(thumbs_rating_getlink()); } ?></div>

                    <div class="clear"></div>
                </div><!-- end .modern-list-content -->              
            </li><!-- end .ms-item -->  

            <?php endwhile; ?>             
        </ul><!-- end .modern-list -->

        <!-- Pagination -->
        <?php if(function_exists('wp_pagenavi')) { ?>
            <?php wp_pagenavi(); ?>
            <?php } else { ?>
            <div class="defaultpag">
                    <div class="sright"><?php next_posts_link('' . esc_html__('Older Entries', 'tianlock-wp') . ' &rsaquo;'); ?></div>
                    <div class="sleft"><?php previous_posts_link('&lsaquo; ' . esc_html__('Newer Entries', 'tianlock-wp') . ''); ?></div>
            </div><!-- end .defaultpag -->
        <?php } // Default Pagination ?>
        <!-- pagination -->

        <?php endif; ?>   
    </div><!-- end .wrap-left-content -->
    
     
    <!-- Begin Sidebar (right) -->
    <?php  get_sidebar(); // add sidebar ?>
    <!-- end #sidebar  (right) -->    

    <!-- Begin Sidebar (middle) -->    
    <?php get_template_part('functions/custom/sidebar-middle'); ?>
    <!-- end #sidebar (middle) --> 

        
<div class="clear"></div>
</div><!-- end .wrap-container -->


<!-- Home Modules (Widgets) -->
<?php if ( is_active_sidebar( 'homemodules_bottom_tianlock_wp' ) ) { ?>
<div class="module-section">
    <div class="wrap-container">
        <div class="module-wrap"><?php dynamic_sidebar( 'homemodules_bottom_tianlock_wp' ); ?></div>
    </div><!-- end .wrap-container -->
</div><!-- end .module-section -->
<?php } ?> 
<!-- End. Home Modules --> 


<?php get_footer(); // add footer  ?>