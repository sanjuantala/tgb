<?php
// ------------------------------------------------------
// ------ Most used Tags  -------------------------------
// ------ by AnThemes.net -------------------------------
//        http://themeforest.net/user/An-Themes/portfolio
//        http://themeforest.net/user/An-Themes/follow 
// ------------------------------------------------------

class tianlock_wp_toptags extends WP_Widget {
     function __construct() {
      $widget_ops = array('description' => esc_html__('Display your most used Tags.', 'tianlock-wp'));
      parent::__construct(false, $name = ''. esc_html__('Custom: Most used Tags', 'tianlock-wp') .'',$widget_ops); 
    }

   function widget($args, $instance) {  
		extract( $args );
		$title_tw = $instance['title_tw'];
		$number = $instance['number'];
?>		
 
<?php echo wp_kses_post($before_widget); ?>
<?php if ( $title_tw ) echo wp_kses_post($before_title) . esc_attr( $title_tw ) . wp_kses_post($after_title); ?>

  <div class="tagcloud">
   <?php wp_tag_cloud('number='.esc_attr($number).'&orderby=count&order=DESC'); ?>
   <div class="clear"></div>
  </div>

<?php echo wp_kses_post($after_widget); ?> 
  
<?php
    }

     function update($new_instance, $old_instance) {				
			$instance = $old_instance;
			$instance['title_tw'] = strip_tags($new_instance['title_tw']);
			$instance['number'] = strip_tags($new_instance['number']);
     return $instance;
    }

 	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance );
?>


         <p>
          <label for="<?php echo esc_attr($this->get_field_id('title_tw')); ?>"><?php esc_html_e( 'Title:', 'tianlock-wp' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title_tw')); ?>" name="<?php echo esc_attr($this->get_field_name('title_tw')); ?>" type="text" value="<?php if( isset($instance['title_tw']) ) echo esc_attr($instance['title_tw']); ?>" />
        </p>
      

         <p>
          <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e( 'Number of Posts:', 'tianlock-wp' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php if( isset($instance['number']) ) echo esc_attr($instance['number']); ?>" />
        </p>

<?php  } }
add_action('widgets_init', create_function('', 'return register_widget("tianlock_wp_toptags");')); // register widget
?>