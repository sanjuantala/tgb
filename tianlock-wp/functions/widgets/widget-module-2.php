<?php
// ------------------------------------------------------
// ------ Widget Banner  -------------------------------
// ------ by AnThemes.net -------------------------------
//        http://themeforest.net/user/An-Themes/portfolio
//        http://themeforest.net/user/An-Themes/follow 
// ------------------------------------------------------

class tianlock_wp_728px extends WP_Widget {
     function __construct() {
	    $widget_ops = array('description' => esc_html__('Advertisement - Paste your HTML or JavaScript code.', 'tianlock-wp'));
        parent::__construct(false, $name = ''. esc_html__('== Module 2 == Advertisement 728x90', 'tianlock-wp') .'',$widget_ops); 
    }

   function widget($args, $instance) {  
		extract( $args );
		$title_tw = $instance['title_tw'];
    $title_add = $instance['title_add'];
		$bcode = $instance['bcode'];
?>		
 
<?php echo wp_kses_post($before_widget); ?>
<?php if ( $title_tw ) echo wp_kses_post($before_title) . esc_attr( $title_tw ) . wp_kses_post($after_title); ?>

<div class="module-728">
  <h3><?php echo esc_attr( $title_add ); ?></h3><div class="clear"></div>
  <?php echo stripslashes_deep($bcode); // esc_textarea() if is added will be shown as a text ?>
  <div class="clear"></div>
</div>

<?php echo wp_kses_post($after_widget); ?> 
  
<?php
    }

     function update($new_instance, $old_instance) {				
			$instance = $old_instance;
			$instance['title_tw'] = strip_tags($new_instance['title_tw']);
      $instance['title_add'] = strip_tags($new_instance['title_add']);
			$instance['bcode'] = stripslashes($new_instance['bcode']);
     return $instance;
    }

 	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance );
?>


        <p>
          <label for="<?php echo esc_attr($this->get_field_id('title_add')); ?>"><?php esc_html_e( 'Title:', 'tianlock-wp' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title_add')); ?>" name="<?php echo esc_attr($this->get_field_name('title_add')); ?>" type="text" value="<?php if( isset($instance['title_add']) ) echo esc_attr($instance['title_add']); ?>" />
        </p>

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('bcode')); ?>"><?php esc_html_e( 'Paste your HTML or JavaScript code here:', 'tianlock-wp' ); ?></label>      
          <textarea style="height:100px;" class="widefat" id="<?php echo esc_attr($this->get_field_id('bcode')); ?>" name="<?php echo esc_attr($this->get_field_name('bcode')); ?>" ><?php if( isset($instance['bcode']) ) echo stripslashes($instance['bcode']); ?></textarea>
        </p> 

<?php  } }
add_action('widgets_init', create_function('', 'return register_widget("tianlock_wp_728px");')); // register widget
?>