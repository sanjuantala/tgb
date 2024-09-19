<div class="sidebar-wrapper">
<aside class="left-sidebar">
	<?php if ( is_active_sidebar( 'sidebar_middle_tianlock_wp' ) ) { ?>
	    <?php dynamic_sidebar( 'sidebar_middle_tianlock_wp' ); ?>
	<?php } else { ?>
		<?php the_widget( 'WP_Widget_Recent_Posts', 'number=4' ); ?>
		<?php the_widget( 'WP_Widget_Meta'); ?>
	<?php } ?>	
</aside>
</div>