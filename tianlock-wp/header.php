<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<?php
    // Logo
    $tianlock_wp_logo = get_theme_mod('tianlock_wp_logo');
    if (empty($tianlock_wp_logo)) { $tianlock_wp_logo = get_template_directory_uri().'/images/logo.png'; }
?>
    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <!-- Mobile Device Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <!-- Theme output -->
    <?php wp_head(); ?> 

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<!-- Begin Header -->
<header>
    <div class="main-menu">
            <!-- Logo -->    
            <a href="<?php echo esc_url(home_url( '/' )); ?>"><img class="logo" src="<?php echo esc_url($tianlock_wp_logo); ?>" alt="<?php esc_attr(bloginfo('sitename')); ?>" /></a>

            <!-- Navigation Menu -->
            <?php if ( has_nav_menu( 'tianlock-wp-primary-menu' ) ) : // Check if there's a menu assigned to the 'Header Navigation' location. ?>
                <nav>
                    <!-- Menu Toggle btn-->
                    <div class="menu-toggle">
                        <button type="button" id="menu-btn">
                            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                        </button>
                    </div>                       
                    <?php wp_nav_menu( array( 'container' => false, 'items_wrap' => '<ul id="respMenu" class="ant-responsive-menu" data-menu-style="horizontal">%3$s</ul>', 'theme_location' =>   'tianlock-wp-primary-menu' ) ); ?>
                </nav>
            <?php endif; // End check for menu. ?>

            <ul class="top-social">
                <?php if ( 'option2' == get_theme_mod( 'tianlock_wp_topicons_display' ) ) {  ?>
                     <?php echo wp_kses_post(stripslashes(get_theme_mod('tianlock_wp_top_icons'))); ?> 
                <?php } ?>
                <li class="md-trigger search" data-modal="modal-7"><i class="fas fa-search"></i></li>
            </ul>
    </div><!-- end .main-menu -->
</header><!-- end #header -->

<!-- Search form modal -->
<div class="md-modal md-effect-7" id="modal-7">
    <div class="md-content">
      <div><button class="md-close"><i class="fas fa-times"></i></button><?php get_search_form(); ?></div>
    </div><!-- end .md-content -->
</div><!-- end .md-modal -->


<?php if ( 'option2' == get_theme_mod( 'tianlock_wp_display_featured_articles' ) ) {  ?>
<?php if ( is_front_page() ) { ?>
<!-- Begin Featured Articles -->
<div id="featured-slider-wrap">
    <ul class="featured-slider">

    <?php $tianlock_wp_top_views_slider = new WP_Query( array( 'post_type' => 'post', 'meta_key' => 'post_views_count_tianlock_wp', 'ignore_sticky_posts' => esc_attr(1), 'orderby' => 'meta_value_num', 'order' => 'DESC', 'posts_per_page' => esc_attr(8) ) );  ?> 
    <?php while ($tianlock_wp_top_views_slider->have_posts()) : $tianlock_wp_top_views_slider->the_post(); ?> 

    <li class="item">

        <?php if ( function_exists( 'tianlock_wp_rcp_lock2' ) ) { echo tianlock_wp_rcp_lock2(); } ?>
        <?php if ( has_post_thumbnail()) { ?>        
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('tianlock-wp-thumbnail-blog-featured'); ?></a>
        <?php } else { ?>
            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="<?php esc_html_e( 'article image', 'tianlock-wp' ); ?>" /></a>
        <?php } ?>  
        <div class="clear"></div>      
        <div class="content">
            <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo wp_kses_post(get_avatar( get_the_author_meta( 'user_email' ), 34)); ?></a>
            <a href="<?php the_permalink(); ?>"><h3><?php echo esc_attr(tianlock_wp_the_title( 53, ' ..')); ?></h3></a>
         </div><!-- end .content -->
    </li><!-- end .item -->

    <?php endwhile; 
    /* Restore original Post Data */
    wp_reset_postdata(); ?>

    </ul><!-- end #featured-slider -->
</div><!-- end #featured-slider-wrap -->
<?php } } ?>


<?php if ( 'option2' == get_theme_mod( 'tianlock_wp_display_random_articles' ) ) {  ?>
<?php if ( is_front_page() ) { ?>
<div class="random-slider-wrap">
    <ul class="random-slider">
        <?php $tianlock_wp_randomposts = new WP_Query(array('orderby' => 'rand', 'ignore_sticky_posts' => esc_attr(1), 'posts_per_page' => esc_attr(6) )); ?>
        <?php while ($tianlock_wp_randomposts->have_posts()) : $tianlock_wp_randomposts->the_post(); ?> 

            <li><h3><a href="<?php the_permalink(); ?>"><?php echo esc_attr(tianlock_wp_the_title( 60, ' ..')); ?> <i class="fas fa-long-arrow-alt-right"></i></a></h3></li> 

        <?php endwhile; 
        /* Restore original Post Data */
        wp_reset_postdata(); ?>
    </ul>
</div><div class="clear"></div>
<?php } } ?>