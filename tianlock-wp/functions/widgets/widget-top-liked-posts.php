<?php
// ------------------------------------------------------
// ------ Top Liked Posts  ------------------------------
// ------ by Anthemes.net -------------------------------
//        http://themeforest.net/user/An-Themes/portfolio
//        http://themeforest.net/user/An-Themes/follow 
// ------------------------------------------------------

class tianlock_wp_likedposts extends WP_Widget {
     function __construct() {
      $widget_ops = array('description' => esc_html__('Top Posts by likes.', 'tianlock-wp'));
        parent::__construct(false, $name = ''. esc_html__('Custom: Top Posts by likes.', 'tianlock-wp') .'',$widget_ops); 
     }


    function widget($args, $instance) {   
        extract( $args );
        $number = $instance['number'];
        $title = $instance['title'];
        $checkmiddle = $instance[ 'checkmiddle' ] ? 'true' : 'false';

    // Metadata
    $tianlock_wp_metadata_info = get_theme_mod('tianlock_wp_metadata_info');
    if (empty($tianlock_wp_metadata_info)) { $tianlock_wp_metadata_info = 'No'; }

?>


<?php echo wp_kses_post($before_widget); ?> 
<?php if ( $title ) echo wp_kses_post($before_title) . esc_attr($title) . wp_kses_post($after_title); ?>


<ul class="article_list">
<?php // The Query
$tianlock_wp_toplikes = new WP_Query(array('meta_key' => '_thumbs_rating_up', 'ignore_sticky_posts' => 1, 'orderby' => 'meta_value_num', 'order' => 'DESC', 'posts_per_page' => esc_attr($number) )); // number to display more / less ?>
<?php while ($tianlock_wp_toplikes->have_posts()) : $tianlock_wp_toplikes->the_post(); ?> 
 
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
        <?php if ($tianlock_wp_metadata_info == 'Yes') { ?>
        <div class="likes-widget"><?php if (function_exists('thumbs_rating_getlink')) { echo stripslashes(thumbs_rating_getlink()); } ?></div>
        <?php } ?>
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
    $instance['number'] = strip_tags($new_instance['number']);
    $instance['checkmiddle'] = strip_tags($new_instance['checkmiddle']);
    return $instance;
    }

  function form( $instance ) {
    $defaults  = array(
      'title' => '', 'number' => 5, 'checkmiddle' => 'off',  
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
          <input class="checkbox" type="checkbox" <?php checked( $instance[ 'checkmiddle' ], 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'checkmiddle' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'checkmiddle' )); ?>" /> 
          <label for="<?php echo esc_attr($this->get_field_id( 'checkmiddle' )); ?>"><?php esc_html_e( 'Check if the widget is used in the Sidebar "middle".', 'tianlock-wp' ); ?></label>
        </p> 

<?php  } } 
add_action('widgets_init', create_function('', 'return register_widget("tianlock_wp_likedposts");')); // register widget
?>