<?php

/**
*
* $acid_location is where the Acid folder is located in your theme
* In this scenaario, the Acid folder is located in wp-contents/themes/YOUR_THEME/inc
* 
* It is important to specify the location properly so that Acid knows the location of the assets it needs to look and function correctly
* 
*/

$acid_location = get_stylesheet_directory_uri() . '/inc/'; 
$acid = acid_instance( $acid_location );

/**
*
* Create your theme options as PHP arrays
* WordPress Customizer's structure allows you to create Options that are nested in Sections, which are in turn nested in Panels
* 
* Acid uses the same structure, allowing you to nest options easily, without needing to reference the section or panel ID
*
*/
$data = array (
    'panels' => array (
        'another-panel' => array (
            'title' => esc_html__( 'Theme Options', 'tianlock-wp' ),
            'description' => esc_html__( 'WordPress Theme Customizer', 'tianlock-wp' ),
            'sections' => array (



                //////////// Section
                //////////// General Settings
                'tianlock_general_settings' => array (
                    'title' => esc_html__( 'General Settings', 'tianlock-wp' ),
                    'description' => esc_html__( 'General Settings section', 'tianlock-wp' ),
                    'options' => array (
                        
                        // Logo
                        'tianlock_wp_logo'  => array(
                            'label'         => esc_html__( 'Custom Logo.', 'tianlock-wp' ),
                            'description'   => esc_html__('Upload a custom logo image for your site here. Size for height should be 80px or 160px for a better display, for retina screens.', 'tianlock-wp'),
                            'type'          => 'image',
                        ),

                        // Social icons
                        'tianlock_wp_topicons_display' => array (
                            'label' => esc_html__('Display Social Icons?', 'tianlock-wp'),
                            'type' => 'select',
                            'default' => 'option1',
                            'choices' => array (
                                'option1' => esc_html__( 'No', 'tianlock-wp'),
                                'option2' => esc_html__( 'Yes', 'tianlock-wp'), 
                            ),
                        ),

                        // Social icons
                        'tianlock_wp_top_icons' => array(
                            'label'         => esc_html__( 'Social Icons.', 'tianlock-wp' ),
                            'description'   => "". esc_html__('You can use HTML code. For more social icons go to', 'tianlock-wp') ." <a href=\"http://fontawesome.io/icons/\" target=\"_blank\">Font Awesome</a> ". esc_html__('and at the bottom you have Brand Icons!', 'tianlock-wp') ."",
                            'type'          => 'textarea',
                            'default'       => "<li><a href=\"#\"><i class=\"fab fa-facebook-f\"></i></a></li>
<li><a href=\"#\"><i class=\"fab fa-twitter\"></i></a></li>
<li><a href=\"#\"><i class=\"fab fa-instagram\"></i></a></li>
<li><a href=\"#\"><i class=\"fab fa-pinterest\"></i></a></li>
<li><a href=\"#\"><i class=\"fab fa-google-plus-g\"></i></a></li>
                                ",
                        ),

                    ), // Options
                ), // General Settings



                //////////// Section
                //////////// Blog Settings
                'tianlock_blog_settings' => array (
                    'title' => esc_html__( 'Blog Settings', 'tianlock-wp' ),
                    'description' => esc_html__( 'Blog Settings section', 'tianlock-wp' ),
                    'options' => array (
                        
                        // Top Articles
                        'tianlock_wp_display_featured_articles' => array (
                            'label' => esc_html__('Display: Top Articles carousel?', 'tianlock-wp'),
                            'type' => 'select',
                            'default' => 'option1',
                            'choices' => array (
                                'option1' => esc_html__( 'No', 'tianlock-wp'),
                                'option2' => esc_html__( 'Yes', 'tianlock-wp'), 
                            ),
                        ),
 
                        // Sub Header Random Articles
                        'tianlock_wp_display_random_articles' => array (
                            'label' => esc_html__('Display: Random Articles carousel?', 'tianlock-wp'),
                            'type' => 'select',
                            'default' => 'option1',
                            'choices' => array (
                                'option1' => esc_html__( 'No', 'tianlock-wp'),
                                'option2' => esc_html__( 'Yes', 'tianlock-wp'), 
                            ),
                        ),

                        // Responsive 728x90 AD AREA
                        'tianlock_wp_display_banners' => array (
                            'label' => esc_html__('Display: 728x90 AD AREA between posts?', 'tianlock-wp'),
                            'type' => 'select',
                            'default' => 'option1',
                            'choices' => array (
                                'option1' => esc_html__( 'No', 'tianlock-wp'),
                                'option2' => esc_html__( 'Yes', 'tianlock-wp'), 
                            ),
                        ),

                        // Responsive 728x90 AD AREA
                        'tianlock_wp_add728' => array(
                            'label'         => esc_html__( 'Responsive 728x90 AD AREA between posts.', 'tianlock-wp' ),
                            'description'   => esc_html__( 'Paste your HTML or JavaScript code here. AD Area displayed in the homepage after the first post.', 'tianlock-wp' ),
                            'type'          => 'textarea',
                            'default'       => "<a href=\"#\"><img src=\"http://placehold.it/728x90\" width=\"728\" height=\"90\" alt=\"img\" /></a>",
                        ),

                        // Blog Homepage Title
                        'tianlock_wp_blog_titleleft' => array(
                            'label'         => esc_html__( 'Blog Homepage Title', 'tianlock-wp' ),
                            'description'   => esc_html__( 'Blog Homepage Title', 'tianlock-wp' ),
                            'type'          => 'text',
                            'default'       => esc_html__( 'Fresh', 'tianlock-wp' ),
                        ),

                        // Blog Homepage Title
                        'tianlock_wp_blog_titleright' => array(
                            'label'         => esc_html__( 'Blog Homepage Title', 'tianlock-wp' ),
                            'description'   => esc_html__( 'Blog Homepage Title', 'tianlock-wp' ),
                            'type'          => 'text',
                            'default'       => esc_html__( 'Explore all new trending stories', 'tianlock-wp' ),
                        ),

                        // Hide Featured Image 
                        'tianlock_wp_hidefimg' => array (
                            'label'         => esc_html__( 'Hide Featured Image?', 'tianlock-wp' ),
                            'description'   => esc_html__( 'Hide Featured Image on article page for all posts.', 'tianlock-wp' ),
                            'type'          => 'select',
                            'default'       => 'option1',
                            'choices'       => array (
                                'option1' => esc_html__( 'No', 'tianlock-wp'),
                                'option2' => esc_html__( 'Yes', 'tianlock-wp'), 
                            ),
                        ),


                    ), // Options
                ), // Blog Settings



                //////////// Section
                //////////// Style Settings
                'tianlock_style_settings' => array (
                    'title' => esc_html__( 'Style Settings', 'tianlock-wp' ),
                    'description' => esc_html__( 'Style Settings section', 'tianlock-wp' ),
                    'options' => array (
                        
                        'tianlock_wp_main_color1' => array(
                            'label'         => esc_html__( 'Main Color (pink)', 'tianlock-wp' ),
                            'description'   => esc_html__( 'Use the color picker to change the main color of the site to match your brand color.', 'tianlock-wp' ),
                            'type'          => 'color',
                            'default'       => '#f15085'
                        ), 

                        'tianlock_wp_main_color2' => array(
                            'label'         => esc_html__( 'Main Color (yellow)', 'tianlock-wp' ),
                            'description'   => esc_html__( 'Use the color picker to change the main color of the site to match your brand color.', 'tianlock-wp' ),
                            'type'          => 'color',
                            'default'       => '#ffdd33'
                        ), 

                        'tianlock_wp_entry_linkcolor' => array(
                            'label'         => esc_html__( 'Entry Link Color', 'tianlock-wp' ),
                            'description'   => esc_html__( 'Use the color picker to change the entry link color on article or default / full width pages.', 'tianlock-wp' ),
                            'type'          => 'color',
                            'default'       => '#f15085'
                        ), 

                        'tianlock_wp_body_bg' => array(
                            'label'         => esc_html__( 'Body Background', 'tianlock-wp' ),
                            'description'   => esc_html__( 'Use the color picker to change the Body Background color.', 'tianlock-wp' ),
                            'type'          => 'color',
                            'default'       => '#f6f6f6'
                        ),

                        'tianlock_wp_module_leftbg' => array(
                            'label'         => esc_html__( 'Modules Section Background Color (Left and Right)', 'tianlock-wp' ),
                            'description'   => esc_html__( 'Left Background Color: use the color picker to change the Modules Section Background color.', 'tianlock-wp' ),
                            'type'          => 'color',
                            'default'       => '#f8f8f8'
                        ),

                        'tianlock_wp_module_rightbg' => array(
                            'label'         => esc_html__( 'Modules Section Background Color (Left and Right)', 'tianlock-wp' ),
                            'description'   => esc_html__( 'Right Background Color: use the color picker to change the Modules Section Background color.', 'tianlock-wp' ),
                            'type'          => 'color',
                            'default'       => '#ffffff'
                        ),

                    ), // Options
                ), // Style Settings



                //////////// Section
                //////////// Footer Settings
                'tianlock_footer_settings' => array (
                    'title' => esc_html__( 'Footer Settings', 'tianlock-wp' ),
                    'description' => esc_html__( 'Footer Settings section', 'tianlock-wp' ),
                    'options' => array (

                        // Social icons
                        'tianlock_wp_footer_display_icons' => array (
                            'label'       => esc_html__('Display Social Icons?', 'tianlock-wp'),
                            'type'        => 'select',
                            'default' => 'option1',
                            'choices' => array (
                                'option1' => esc_html__( 'No', 'tianlock-wp'),
                                'option2' => esc_html__( 'Yes', 'tianlock-wp'), 
                            ),
                        ),

                        // Social icons
                        'tianlock_wp_footer_icons' => array(
                            'label'         => esc_html__( 'Social Icons.', 'tianlock-wp' ),
                            'description'   => "". esc_html__('You can use HTML code. For more social icons go to', 'tianlock-wp') ." <a href=\"http://fontawesome.io/icons/\" target=\"_blank\">Font Awesome</a> ". esc_html__('and at the bottom you have Brand Icons!', 'tianlock-wp') ."",
                            'type'          => 'textarea',
                            'default'       => "<ul class=\"footer-social\">
<li><a href=\"#\"><i class=\"fab fa-twitter\"></i> <span>Twitter</span></a></li>
<li><a href=\"#\"><i class=\"fab fa-facebook-f\"></i> <span>Facebook</span></a></li>
<li><a href=\"#\"><i class=\"fab fa-google-plus-g\"></i> <span>Google+</span></a></li>
<li><a href=\"#\"><i class=\"fab fa-youtube\"></i> <span>Youtube</span></a></li>
<li><a href=\"#\"><i class=\"fab fa-vimeo-square\"></i> <span>Vimeo</span></a></li>
<li><a href=\"#\"><i class=\"fab fa-pinterest\"></i> <span>Pinterest</span></a></li>
<li><a href=\"#\"><i class=\"fas fa-rss\"></i> <span>Rss</span></a></li>
</ul>",
                        ),

                        // Footer Content
                        'tianlock_wp_footercontent' => array (
                            'label'       => esc_html__('Display: Footer Content?', 'tianlock-wp'),
                            'type'        => 'select',
                            'default' => 'option1',
                            'choices' => array (
                                'option1' => esc_html__( 'No', 'tianlock-wp'),
                                'option2' => esc_html__( 'Yes', 'tianlock-wp'), 
                            ),
                        ),

                        // 1st Widget
                        'tianlock_wp_footer_links1' => array(
                            'label'         => esc_html__( '1st Widget', 'tianlock-wp' ),
                            'type'          => 'textarea',
                            'default'       => "<div class=\"widget-title-f\"><h3>Links</h3></div>
<ul class=\"footer-links\">
<li><a href=\"#\">Social Media </a></li>
<li><a href=\"#\">Entertainment </a></li>
<li><a href=\"#\">Paid Marketing </a></li>
</ul>",
                        ),

                        // 2nd Widget
                        'tianlock_wp_footer_links2' => array(
                            'label'         => esc_html__( '2nd Widget', 'tianlock-wp' ),
                            'type'          => 'textarea',
                            'default'       => "<div class=\"widget-title-f\"><h3>Tutorials</h3></div>
<ul class=\"footer-links\">
<li><a href=\"#\">Psdtuts+ Tutorials </a></li>
<li><a href=\"#\">Nettuts+ Videos </a></li>
<li><a href=\"#\">Wptuts+ Layers </a></li>
</ul>",
                        ),

                        // 3rd Widget
                        'tianlock_wp_footer_links3' => array(
                            'label'         => esc_html__( '3rd Widget', 'tianlock-wp' ),
                            'type'          => 'textarea',
                            'default'       => "<div class=\"widget-title-f\"><h3>Friends</h3></div>
<ul class=\"footer-links\">
<li><a href=\"#\">ThemeForest.net </a></li> 
<li><a href=\"#\">GraphicRiver.net </a></li>
<li><a href=\"#\">PhotoDune.net </a></li>
</ul>",
                        ),

                        // 4th Widget
                        'tianlock_wp_footer_links4' => array(
                            'label'         => esc_html__( '4th Widget', 'tianlock-wp' ),
                            'type'          => 'textarea',
                            'default'       => "<div class=\"widget-title-f\"><h3>Pages</h3></div>
<ul class=\"footer-links\">
<li><a href=\"#\">Default Pages </a></li> 
<li><a href=\"#\">Full width page </a></li>
<li><a href=\"#\">Typography and Styles </a></li>
</ul>",
                        ),

                        // Company info
                        'tianlock_wp_footer_links5' => array(
                            'label'         => esc_html__( 'Company info', 'tianlock-wp' ),
                            'type'          => 'textarea',
                            'default'       => "TianLock is a tremendously intuitive, suited to be deployed for a number of different websites and projects of all kinds, but peculiarly well suited for news websites, sharing your trending stories. <a href=\"#\">Explore all new Trending Stories <i class=\"fas fa-long-arrow-alt-right\"></i></a>",
                        ),

                        // Copyright Left
                        'tianlock_wp_copyleft' => array(
                            'label'         => esc_html__( 'Copyright Left', 'tianlock-wp' ),
                            'type'          => 'textarea',
                            'default'       => "&copy; 2018 <a href=\"http://anthemes.com/themes/tianlock/\">TianLock</a>. Powered by <a href=\"https://wordpress.org/\">WordPress</a>",
                        ),

                        // Copyright Right
                        'tianlock_wp_copyright' => array(
                            'label'         => esc_html__( 'Copyright Right', 'tianlock-wp' ),
                            'type'          => 'textarea',
                            'default'       => "TianLock Theme by <a href=\"https://anthemes.com/\">Anthemes.com</a>",
                        ),

                    ), // Options
                ), // Footer Settings



            ),
        ),
    ),
);

$acid->config( $data );


?>