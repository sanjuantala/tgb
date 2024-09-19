<div class="sidebar-wrapper">
<aside class="sidebar">
	<?php if ( is_active_sidebar( 'sidebar_home_tianlock_wp' ) ) { ?>
	    <?php dynamic_sidebar( 'sidebar_home_tianlock_wp' ); ?>
	<?php } else { ?>
		<?php the_widget( 'WP_Widget_Search' ); ?> 
		<?php the_widget( 'WP_Widget_Archives' ); ?>
	<?php } ?>	 	
</aside>
</div>