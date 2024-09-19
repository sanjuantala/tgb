<div class="sidebar-wrapper">
<aside class="sidebar">
<?php if ( class_exists( 'WooCommerce' ) ) {
	if ( is_woocommerce() || is_checkout() || is_cart() ) {
		if ( is_active_sidebar( 'sidebar_shop_tianlock_wp' ) ) {
			dynamic_sidebar( 'sidebar_shop_tianlock_wp' );
		} // WooCommerce sidebar
	} else { if ( is_active_sidebar( 'sidebar_article_tianlock_wp' ) ) {
  		dynamic_sidebar( 'sidebar_article_tianlock_wp' );
  	} else { 
		 the_widget( 'WP_Widget_Search' ); 
		 the_widget( 'WP_Widget_Archives' ); 
	}  }	// default sidebar	
} else {
  	if ( is_active_sidebar( 'sidebar_article_tianlock_wp' ) ) {
  		dynamic_sidebar( 'sidebar_article_tianlock_wp' );
  	   } else { 
		 the_widget( 'WP_Widget_Search' ); 
		 the_widget( 'WP_Widget_Archives' ); 
	}   
} ?> 
</aside>
</div>