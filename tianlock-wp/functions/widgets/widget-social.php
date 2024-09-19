<?php
// ------------------------------------------------------
// ------ Widget Social  --------------------------------
// ------ by Anthemes.net -------------------------------
//        http://themeforest.net/user/An-Themes/portfolio
//        http://themeforest.net/user/An-Themes/follow 
// ------------------------------------------------------

class tianlock_wp_social extends WP_Widget {
     function __construct() {
	    $widget_ops = array('description' => esc_html__('Social Icons: FaceBook / Twitter / YouTube', 'tianlock-wp'));
        parent::__construct(false, $name = ''. esc_html__('Custom: Social Icons', 'tianlock-wp') .'',$widget_ops); 
    }

   function widget($args, $instance) {  
		extract( $args );
		$title_tw = $instance['title_tw'];
		$fblink = $instance['fblink'];
    $twlink = $instance['twlink'];
    $ytlink = $instance['ytlink'];
?>		
 
<?php echo wp_kses_post($before_widget); ?> 
<?php if ( $title_tw ) echo wp_kses_post($before_title) . esc_attr( $title_tw ) . wp_kses_post($after_title); ?>

<ul class="social-widget">
        <?php if ( $fblink ) { ?><li><a class="fbbutton" target="_blank" href="<?php echo esc_url( $fblink ); ?>"><i class="fab fa-facebook-f"></i> <span><?php esc_html_e( 'Like', 'tianlock-wp' ); ?></span></a></li><?php } ?>
        <?php if ( $twlink ) { ?><li><a class="twbutton" target="_blank" href="<?php echo esc_url( $twlink ); ?>"><i class="fab fa-twitter"></i> <span><?php esc_html_e( 'Follow', 'tianlock-wp' ); ?></span></a></li><?php } ?>
        <?php if ( $ytlink ) { ?><li><a class="ytbutton" target="_blank" href="<?php echo esc_url( $ytlink ); ?>"><i class="fab fa-youtube"></i> <span><?php esc_html_e( 'Subscribe', 'tianlock-wp' ); ?></span></a></li><?php } ?>
</ul><!-- end .social-widget -->
<div class="clear"></div>

<?php echo wp_kses_post($after_widget); ?>
  
<?php
    }

     function update($new_instance, $old_instance) {				
			$instance = $old_instance;
			$instance['title_tw'] = strip_tags($new_instance['title_tw']);
			$instance['fblink'] = stripslashes($new_instance['fblink']);
      $instance['twlink'] = stripslashes($new_instance['twlink']);
      $instance['ytlink'] = stripslashes($new_instance['ytlink']);
     return $instance;
    }

 	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance);
?>

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('title_tw')); ?>"><?php esc_html_e( 'Widget Title:', 'tianlock-wp' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title_tw')); ?>" name="<?php echo esc_attr($this->get_field_name('title_tw')); ?>" type="text" value="<?php if( isset($instance['title_tw']) ) echo esc_attr($instance['title_tw']); ?>" />
        </p>
        
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('fblink')); ?>"><?php esc_html_e( 'Facebook Link:', 'tianlock-wp' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('fblink')); ?>" name="<?php echo esc_attr($this->get_field_name('fblink')); ?>" type="text" value="<?php if( isset($instance['fblink']) ) echo esc_attr($instance['fblink']); ?>" />
        </p>

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('twlink')); ?>"><?php esc_html_e( 'Twitter Link:', 'tianlock-wp' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twlink')); ?>" name="<?php echo esc_attr($this->get_field_name('twlink')); ?>" type="text" value="<?php if( isset($instance['twlink']) ) echo esc_attr($instance['twlink']); ?>" />
        </p>

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('ytlink')); ?>"><?php esc_html_e( 'YouTube Link:', 'tianlock-wp' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('ytlink')); ?>" name="<?php echo esc_attr($this->get_field_name('ytlink')); ?>" type="text" value="<?php if( isset($instance['ytlink']) ) echo esc_attr($instance['ytlink']); ?>" />
        </p>

<?php  } }
add_action('widgets_init', create_function('', 'return register_widget("tianlock_wp_social");')); // register widget
?>