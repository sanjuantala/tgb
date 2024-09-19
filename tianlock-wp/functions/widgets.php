<?php 
// Register widgetized areas
function tianlock_wp_widgets_init() {

	register_sidebar( array (
		'name' => esc_html__( 'Sidebar #1 = Home Page (right)', 'tianlock-wp' ),
		'id' => 'sidebar_home_tianlock_wp',
		'description'   => esc_html__( 'Add widgets here to appear in the sidebar.', 'tianlock-wp' ),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div><div class="clear"></div>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Sidebar #2 = Home Page (middle)', 'tianlock-wp' ),
		'id' => 'sidebar_middle_tianlock_wp',
		'description'   => esc_html__( 'Add widgets here to appear in the middle sidebar. The sidebar has a maximum width of 160px.', 'tianlock-wp' ),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div><div class="clear"></div>',
	) );

    register_sidebar( array (
		'name' => esc_html__( 'Home Modules (Top)', 'tianlock-wp' ),
		'description' => esc_html__('Use only the widgets that start with the name "Module".', 'tianlock-wp'),
		'id' => 'homemodules_tianlock_wp',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '',
		'after_title' => '<div class="clear"></div>',
	) );

    register_sidebar( array (
		'name' => esc_html__( 'Home Modules (Bottom)', 'tianlock-wp' ),
		'description' => esc_html__('Use only the widgets that start with the name "Module".', 'tianlock-wp'),
		'id' => 'homemodules_bottom_tianlock_wp',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '',
		'after_title' => '<div class="clear"></div>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Sidebar #3 = Article Page', 'tianlock-wp' ),
		'id' => 'sidebar_article_tianlock_wp',
		'description'   => esc_html__( 'Add widgets here to appear in the sidebar.', 'tianlock-wp' ),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div><div class="clear"></div>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Sidebar #4 = Article Page Bottom', 'tianlock-wp' ),
		'id' => 'sidebar_article_bottom_tianlock_wp',
		'description'   => esc_html__( 'Add widgets here to appear in the sidebar, next to the comments form.', 'tianlock-wp' ),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div><div class="clear"></div>',
	) );


	register_sidebar( array (
		'name' => esc_html__( 'Sidebar #5 = Default Page', 'tianlock-wp' ),
		'id' => 'sidebar_page_tianlock_wp',
		'description'   => esc_html__( 'Add widgets here to appear in the sidebar.', 'tianlock-wp' ),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div><div class="clear"></div>',
	) );

    register_sidebar( array (
		'name' => esc_html__( 'Shop Sidebar', 'tianlock-wp' ),
		'id' => 'sidebar_shop_tianlock_wp',
		'description'   => esc_html__( 'Add widgets here to appear in the sidebar.', 'tianlock-wp' ),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div><div class="clear"></div>',
	) );

}

add_action( 'widgets_init', 'tianlock_wp_widgets_init' );
?>