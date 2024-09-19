<div class="sidebar-wrapper">
<aside class="sidebar">
<?php if ( class_exists( 'WooCommerce' ) ) {
	if ( is_woocommerce() || is_checkout() || is_cart() ) {
		if ( is_active_sidebar( 'sidebar_shop_tianlock_wp' ) ) {
			dynamic_sidebar( 'sidebar_shop_tianlock_wp' );
		} // WooCommerce sidebar
	} else { if ( is_active_sidebar( 'sidebar_page_tianlock_wp' ) ) {
  		dynamic_sidebar( 'sidebar_page_tianlock_wp' );
  	} }	// default sidebar	
} else {
  	if ( is_active_sidebar( 'sidebar_page_tianlock_wp' ) ) {
  		dynamic_sidebar( 'sidebar_page_tianlock_wp' );
  	} // default sidebar
} ?>
</aside>
</div>