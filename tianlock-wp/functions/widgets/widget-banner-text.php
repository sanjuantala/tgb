<?php
// ------------------------------------------------------
// ------ Widget Banner  -------------------------------
// ------ by Anthemes.net -------------------------------
//        http://themeforest.net/user/An-Themes/portfolio
//        http://themeforest.net/user/An-Themes/follow 
// ------------------------------------------------------

class tianlock_wp_300px_text extends WP_Widget {
     function __construct() {
	    $widget_ops = array('description' => esc_html__('Advertisement Text.', 'tianlock-wp'));
        parent::__construct(false, $name = ''. esc_html__('Custom: Advertisement 300px Text', 'tianlock-wp') .'',$widget_ops); 
    }

   function widget($args, $instance) {  
		extract( $args );
		$title_tw = $instance['title_tw'];
		$btext = $instance['btext'];
?>		
 
<?php echo wp_kses_post($before_widget); ?> 
<?php if ( $title_tw ) echo wp_kses_post($before_title) . esc_attr( $title_tw ) . wp_kses_post($after_title); ?>

<div class="text-300">
  <?php echo stripslashes_deep($btext); // esc_textarea() if is added will be shown as a text ?>
  <div class="clear"></div>
</div>

<?php echo wp_kses_post($after_widget); ?>
  
<?php
    }

     function update($new_instance, $old_instance) {				
			$instance = $old_instance;
			$instance['title_tw'] = strip_tags($new_instance['title_tw']);
			$instance['btext'] = stripslashes($new_instance['btext']);
     return $instance;
    }

 	function form( $instance ) {

  // Set up some default widget settings
  $defaults = array(
    'title_tw' => 'Advertisement Text',
    'btext' => stripslashes('<img src="http://placehold.it/250x60" alt="img">
<h3>Premium Content of new trending stories, for <br /> <del>$9.95</del> $3.95</h3>
<a href="#" class="button black">More info</a>
<a href="#" class="button pink">Sign up now</a>')   
  );

		$instance = wp_parse_args( (array) $instance, $defaults );
?>

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('title_tw')); ?>"><?php esc_html_e( 'Title:', 'tianlock-wp' ); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title_tw')); ?>" name="<?php echo esc_attr($this->get_field_name('title_tw')); ?>" type="text" value="<?php if( isset($instance['title_tw']) ) echo esc_attr($instance['title_tw']); ?>" />
        </p>
        
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('btext')); ?>"><?php esc_html_e( 'Advertisement HTML:', 'tianlock-wp' ); ?></label>      
          <textarea style="height:100px;" class="widefat" id="<?php echo esc_attr($this->get_field_id('btext')); ?>" name="<?php echo esc_attr($this->get_field_name('btext')); ?>" ><?php if( isset($instance['btext']) ) echo stripslashes($instance['btext']); ?></textarea>
        </p> 

<?php  } }
add_action('widgets_init', create_function('', 'return register_widget("tianlock_wp_300px_text");')); // register widget
?>