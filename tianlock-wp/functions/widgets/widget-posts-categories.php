<?php
// ------------------------------------------------------
// ------ Posts by Categories  --------------------------
// ------ by Anthemes.net -------------------------------
//        http://themeforest.net/user/An-Themes/portfolio
//        http://themeforest.net/user/An-Themes/follow 
// ------------------------------------------------------

class tianlock_wp_postcat extends WP_Widget {
     function __construct() {
      $widget_ops = array('description' => esc_html__('Posts by Categories', 'tianlock-wp'));
        parent::__construct(false, $name = ''. esc_html__('Custom: Posts by Categories', 'tianlock-wp') .'',$widget_ops);  
    }



    function widget($args, $instance) {   
        extract( $args );
        $number = $instance['number'];
        $title = $instance['title'];
        $category = $instance['category'];
        $checkmiddle = $instance[ 'checkmiddle' ] ? 'true' : 'false';
?>



<?php echo wp_kses_post($before_widget); ?> 
<?php if ( $title ) echo wp_kses_post($before_title) . esc_attr($title) . wp_kses_post($after_title); ?>


<ul class="article_list">
<?php // The Query
$tianlock_wp_widget_postcat = new WP_Query(array('post_type' => 'post',  'ignore_sticky_posts' => 1, 'cat' => esc_attr($category), 'posts_per_page' => esc_attr($number) )); // number to display more / less ?>
<?php while ($tianlock_wp_widget_postcat->have_posts()) : $tianlock_wp_widget_postcat->the_post(); ?> 
 
    <li>
      <?php if ( has_post_thumbnail()) { ?> 
          <div class="article-comm"><a href="<?php the_permalink(); ?>"><?php printf( _nx( '<i class="fas fa-comments"></i> 0', '<i class="fas fa-comments"></i> %1$s', get_comments_number(), '', 'tianlock-wp' ), number_format_i18n( get_comments_number() ) ); ?></a></div>
          <?php if( 'on' == $instance[ 'checkmiddle' ] ) { ?>
            <a href="<?php the_permalink(); ?>"> <?php echo the_post_thumbnail('tianlock-wp-thumbnail-blog-list'); ?></a>
          <?php } else { ?>
            <a href="<?php the_permalink(); ?>"> <?php echo the_post_thumbnail('tianlock-wp-thumbnail-widget-small'); ?></a>
          <?php } ?>
      <div class="author-il">
      <?php } else { ?>
      <div class="author-il-full">
      <?php } ?>
        <h3><a href="<?php the_permalink(); ?>"><?php esc_attr(tianlock_wp_the_title( 43, ' ..')); ?></a></h3>
        <?php if ( function_exists( 'getPostViews_tianlock_wp' ) ) { ?><div class="listviews"><i class="fas fa-bolt" aria-hidden="true"></i> <?php echo esc_attr(getPostViews_tianlock_wp(get_the_ID())); ?> <?php esc_html_e( 'Views', 'tianlock-wp' ); ?></div><?php } ?> 
      </div>
    </li>

<?php endwhile; 
/* Restore original Post Data */
wp_reset_postdata(); ?>  
</ul><div class="clear"></div>

<?php echo wp_kses_post($after_widget); ?>


<?php
    }
    function update($new_instance, $old_instance) {       
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number']    = is_numeric( $new_instance['number'] ) ? intval( $new_instance['number'] ) : 5;
    $instance['category']  = wp_strip_all_tags( $new_instance['category'] );
    $instance['checkmiddle'] = strip_tags($new_instance['checkmiddle']);
    return $instance;
    }

  function form( $instance ) {
    $defaults  = array(
      'title' => '', 'category' => '', 'number' => 5, 'checkmiddle' => 'off',  
       );
    $instance  = wp_parse_args( ( array ) $instance, $defaults ); 
?>


        <p>
          <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'tianlock-wp' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php if( isset($instance['title']) ) echo esc_attr($instance['title']); ?>" />
        </p>

         <p>
          <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e( 'Number of Posts:', 'tianlock-wp' ); ?></label>      
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php if( isset($instance['number']) ) echo esc_attr($instance['number']); ?>" />
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
        
        <p>
          <input class="checkbox" type="checkbox" <?php checked( $instance[ 'checkmiddle' ], 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'checkmiddle' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'checkmiddle' )); ?>" /> 
          <label for="<?php echo esc_attr($this->get_field_id( 'checkmiddle' )); ?>"><?php esc_html_e( 'Check if the widget is used in the Sidebar "middle".', 'tianlock-wp' ); ?></label>
        </p>  

<?php  } } 
add_action('widgets_init', create_function('', 'return register_widget("tianlock_wp_postcat");')); // register widget
?>