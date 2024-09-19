<?php
// ------------------------------------------------------
// ------ Module 1: Articles by Categories  -------------
// ------ by AnThemes.net -------------------------------
//        http://themeforest.net/user/An-Themes/portfolio
//        http://themeforest.net/user/An-Themes/follow 
// ------------------------------------------------------

class tianlock_wp_module1 extends WP_Widget {
     function __construct() {
	    $widget_ops = array('description' => esc_html__('Module 1: Articles by Categories', 'tianlock-wp'));
        parent::__construct(false, $name = ''. esc_html__('== Module 1 == Articles by Categories', 'tianlock-wp') .'',$widget_ops); 
    }

   function widget($args, $instance) {  
		extract( $args );
		$title = $instance['title'];
    $redtitle = $instance['redtitle'];
    $blacktitle = $instance['blacktitle'];
		$category = $instance['category'];

    // Get the ID of a given category
    $category_id = $category;

    // Get the URL of this category
    $category_link = get_category_link( $category_id );    
?>		
 
<?php echo wp_kses_post($before_widget); ?>
<?php if ( $title ) echo wp_kses_post($before_title) . esc_attr($title) . wp_kses_post($after_title); ?>

    <!-- Module Title -->
    <nav class="menu--adsila">
        <div class="menu__item">
          <a href="<?php echo esc_url( $category_link ); ?>"><span class="menu__item-name"><?php echo esc_attr( $redtitle ); ?></span></a>
          <a href="<?php echo esc_url( $category_link ); ?>"><span class="menu__item-label"><?php echo esc_attr( $blacktitle ); ?></span></a>
        </div>
    </nav>

    <!-- Articles Module -->
    <ul class="articles-modules">
        <?php $tianlock_wp_module_categories = new WP_Query(array('post_type' => 'post',  'ignore_sticky_posts' => 1, 'cat' => esc_attr($category), 'posts_per_page' => esc_attr(5) )); // number to display more / less ?>
        <?php while ($tianlock_wp_module_categories->have_posts()) : $tianlock_wp_module_categories->the_post(); ?> 
 
        <li>
          <?php if ( has_post_thumbnail()) { ?>
                    <div class="article-comm"><a href="<?php the_permalink(); ?>"><?php printf( _nx( '<i class="fas fa-comments"></i> 0', '<i class="fas fa-comments"></i> %1$s', get_comments_number(), '', 'tianlock-wp' ), number_format_i18n( get_comments_number() ) ); ?></a></div>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('tianlock-wp-thumbnail-blog-list', array('title' => "")); ?></a>
          <?php } else { ?>
                    <div class="article-comm"><a href="<?php the_permalink(); ?>"><?php printf( _nx( '<i class="fas fa-comments"></i> 0', '<i class="fas fa-comments"></i> %1$s', get_comments_number(), '', 'tianlock-wp' ), number_format_i18n( get_comments_number() ) ); ?></a></div>          
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="<?php esc_html_e( 'article image', 'tianlock-wp' ); ?>" /></a>
          <?php } ?>

          <div class="title-section"> 
            <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo wp_kses_post(get_avatar( get_the_author_meta( 'user_email' ), 24 )); ?></a>
            <a href="<?php the_permalink(); ?>"><h3><?php esc_attr(tianlock_wp_the_title( 40, ' ..')); ?> <?php if ( function_exists( 'tianlock_wp_rcp_lock' ) ) { echo esc_attr(tianlock_wp_rcp_lock()); } ?></h3></a>
          </div><!-- end .title-section -->
        </li>

        <?php endwhile; 
        /* Restore original Post Data */
        wp_reset_postdata(); ?>
    </ul><!-- end #top-articles-slider -->
    <div class="clear"></div>
 

<?php echo wp_kses_post($after_widget); ?> 
  
<?php
    }

    function update($new_instance, $old_instance) {       
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['redtitle'] = strip_tags($new_instance['redtitle']);
    $instance['blacktitle'] = strip_tags($new_instance['blacktitle']);
    $instance['category']  = wp_strip_all_tags( $new_instance['category'] );
     return $instance;
    }

  function form( $instance ) {
    $defaults  = array( 'title' => '', 'redtitle' => '', 'blacktitle' => '', 'category' => '');
    $instance  = wp_parse_args( ( array ) $instance, $defaults );
    $title     = $instance['title'];
    $redtitle     = $instance['redtitle'];
    $blacktitle     = $instance['blacktitle'];
    $category  = $instance['category'];
?>

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('redtitle')); ?>"><?php esc_html_e( '1st Title:', 'tianlock-wp' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('redtitle')); ?>" name="<?php echo esc_attr($this->get_field_name('redtitle')); ?>" type="text" value="<?php if( isset($instance['redtitle']) ) echo esc_attr($instance['redtitle']); ?>" />
        </p>

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('blacktitle')); ?>"><?php esc_html_e( '2nd Title:', 'tianlock-wp' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('blacktitle')); ?>" name="<?php echo esc_attr($this->get_field_name('blacktitle')); ?>" type="text" value="<?php if( isset($instance['blacktitle']) ) echo esc_attr($instance['blacktitle']); ?>" />
        </p>

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php esc_html_e( 'Category:', 'tianlock-wp' ); ?></label>      
            <?php
            wp_dropdown_categories( array(

              'show_count' => 1,
              'orderby'    => 'title',
              'hide_empty' => false,
              'name'       => esc_attr($this->get_field_name( 'category' )),
              'id'         => 'rpjc_widget_cat_recent_posts_category',
              'class'      => 'widefat',
              'selected'   => $category

            ) );
            ?>
        </p> 

<?php  } }
add_action('widgets_init', create_function('', 'return register_widget("tianlock_wp_module1");')); // register widget
?>