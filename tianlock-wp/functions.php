<?php
// ------------------------------------------------ 
// ---------- Options Framework Theme ------------- 
// ------------------------------------------------
 include( get_template_directory() . '/inc/Acid/acid.php' );
 include( get_template_directory() . '/inc/Acid/theme-options.php' );

// ---------------------------------------------- 
// - Updates for Themes (Envato Market plugin.) -
// ---------------------------------------------- 
 include( get_template_directory() . '/functions/custom/github.php');

// ---------------------------------------------- 
// --------------- Load Custom Widgets ----------
// ----------------------------------------------
 include( get_template_directory() . '/functions/widgets.php');
 include( get_template_directory() . '/functions/widgets/widget-banner-300.php');         //1 
 include( get_template_directory() . '/functions/widgets/widget-banner-250.php');         //2
 include( get_template_directory() . '/functions/widgets/widget-banner-160.php');         //3
 include( get_template_directory() . '/functions/widgets/widget-latest-posts-tags.php');  //4
 include( get_template_directory() . '/functions/widgets/widget-latest-posts.php');       //5
 include( get_template_directory() . '/functions/widgets/widget-posts-categories.php');   //6
 include( get_template_directory() . '/functions/widgets/widget-top-posts.php');          //7
 include( get_template_directory() . '/functions/widgets/widget-top-liked-posts.php');    //8
 include( get_template_directory() . '/functions/widgets/widget-module-1.php');           //9
 include( get_template_directory() . '/functions/widgets/widget-module-2.php');           //10 
 include( get_template_directory() . '/functions/widgets/widget-module-3.php');           //11 
 include( get_template_directory() . '/functions/widgets/widget-module-4.php');           //12
 include( get_template_directory() . '/functions/widgets/widget-module-5.php');           //13
 include( get_template_directory() . '/functions/widgets/widget-social.php');             //14
 include( get_template_directory() . '/functions/widgets/widget-banner-text.php');        //15
 include( get_template_directory() . '/functions/widgets/widget-top-tags.php');           //16

// ----------------------------------------------
// --------------- Load Custom ------------------
// ---------------------------------------------- 
 include( get_template_directory() . '/functions/custom/comments.php');
  
// ----------------------------------------------
// ------ Content width -------------------------
// ----------------------------------------------
if ( ! isset( $content_width ) ) $content_width = 970;

// ----------------------------------------------
// ------ Theme set up --------------------------
// ----------------------------------------------
add_action( 'after_setup_theme', 'tianlock_wp_theme_setup' );
if ( !function_exists('tianlock_wp_theme_setup') ) {

    function tianlock_wp_theme_setup() {
    
        // Register navigation menu
        register_nav_menus(
            array(
                'tianlock-wp-primary-menu' => esc_html__( 'Header Navigation', 'tianlock-wp' )
            )
        );
        
        // Localization support
        load_theme_textdomain( 'tianlock-wp', get_template_directory() . '/languages' );
        
        // Feed Links
        add_theme_support( 'automatic-feed-links' );
        
        // Title Tag
        add_theme_support( 'title-tag' );

        // Post thumbnails
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'tianlock-wp-thumbnail-blog-featured', 600, 380, true ); // Home featured posts
        add_image_size( 'tianlock-wp-thumbnail-blog-list', 250, 250, true ); // Home Blog List.
        add_image_size( 'tianlock-wp-thumbnail-footer', 300, 186, true ); // Footer thumbnails.
        add_image_size( 'tianlock-wp-thumbnail-widget-small', 80, 80, true ); // Sidebar Widget.
        add_image_size( 'tianlock-wp-thumbnail-single-image', 860, '', true ); // Single thumbnails.
    
    }
}

// ----------------------------------------------
// ------------ JavaScrips Files ----------------
// ----------------------------------------------
if( !function_exists( 'tianlock_wp_enqueue_scripts' ) ) {
    function tianlock_wp_enqueue_scripts() {

        // Register css files
        wp_enqueue_style( 'tianlock-wp-style', get_stylesheet_uri(), '', '2.5');
        wp_enqueue_style( 'tianlock-wp-default', get_template_directory_uri() . '/css/colors/default.css', array( 'tianlock-wp-style' ), '2.5' );
        wp_enqueue_style( 'tianlock-wp-responsive', get_template_directory_uri() . '/css/responsive.css', array( 'tianlock-wp-style' ), '2.5' );
        wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/owl-carousel/owl.carousel.css', array(), '2.0.0' );
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome-free-5.14.0-web/css/all.min.css', array(), '5.14.0' );

        // Register scripts
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'tianlock-wp-customjs', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.2', true );
        wp_enqueue_script( 'jquery-sticky-kit',  get_template_directory_uri() . '/js/jquery.sticky-kit.js', array( 'jquery' ), '1.1.2', true );
        wp_enqueue_script( 'jquery-modaleffects',  get_template_directory_uri() . '/js/jquery.modaleffects.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'jquery-owl-carousel', get_template_directory_uri() . '/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '2.0', true );

        // Load Comments & .js files.
        if( is_single() ) {
            wp_enqueue_script( 'comment-reply' );
         }

// ----------------------------------------------
// Register Fonts: https://gist.github.com/kailoon/e2dc2a04a8bd5034682c
// ----------------------------------------------
        function tianlock_wp_fonts_url() {
            $tianlock_wp_font_url_google = '';
            
            /*
            Translators: If there are characters in your language that are not supported
            by chosen font(s), translate this to 'off'. Do not translate into your own language.
             */
            if ( 'off' !== _x( 'on', 'Google font: on or off', 'tianlock-wp' ) ) {
                $tianlock_wp_font_url_google = add_query_arg( 'family', urlencode( 'Oswald:400,700|Roboto:400,500,700' ), "//fonts.googleapis.com/css" );
            }
            return $tianlock_wp_font_url_google;
        }
        /* -- Enqueue styles -- */
        wp_enqueue_style( 'tianlock_wp_fonts', tianlock_wp_fonts_url(), array(), '1.0.0' );
  

    }
    add_action('wp_enqueue_scripts', 'tianlock_wp_enqueue_scripts');
}


// ----------------------------------------------
// ---------- excerpt length adjust -------------
// ----------------------------------------------
function tianlock_wp_excerpt($str, $length, $minword = 3) {
    $sub = '';
    $len = 0;
    foreach (explode(' ', $str) as $word) {
        $part = (($sub != '') ? ' ' : '') . $word;
        $sub .= $part;
        $len += strlen($part);
        if (strlen($word) > $minword && strlen($sub) >= $length) { break; }
    }
    return $sub . (($len < strlen($str)) ? ' ..' : '');
}


// ------------------------------------------------ 
// --- Characters limit for title -----------------
// ------------------------------------------------ 
function tianlock_wp_the_title($length, $replacer = ' ..') {
    $string = get_the_title();
    if( mb_strlen( $string ) > $length ) {
        $string = mb_substr( $string, 0, $length-3 );
        echo esc_attr($string) . $replacer;
    } else echo esc_attr($string);
}


// ------------------------------------------------ 
// ------------ Notice ----------------------------
// ------------------------------------------------
function themes_admin_notice(){
    global $pagenow;
    if ( $pagenow == 'themes.php' ) {
         echo '<div class="notice notice-info is-dismissible" style="box-shadow: 0 1px 5px rgba(0,0,0,0.2); ">
             <p><a class="button" href="https://anthemes.com/" target="_blank">Anthemes.com</a> <a class="button activate" href="https://themeforest.net/item/tianlock-wp-emoji-magazine-membership-wordpress-theme/21579115" target="_blank">TianLock Theme</a> <a class="button activate" href="https://themeforest.net/item/tianlock-wp-emoji-magazine-membership-wordpress-theme/21579115/support" target="_blank">Get Support</a></p>
         </div>';
    }
}
add_action('admin_notices', 'themes_admin_notice');


// ------------------------------------------------ 
// --- One Click Demo Import (Plugin) -------------
// ------------------------------------------------ 
function anthemes_wp_plugin_intro_text( $anthemes_wp_default_text ) {
    $anthemes_wp_default_text =  /* https://wordpress.org/plugins/one-click-demo-import/faq/ the inline style is added for the demo import plugin, that is displayed via Dashboard > Appearance. */ '<div class="ocdi__intro-text" style="width:355px;">'. esc_html__( 'Please click "Import Demo Data" button only once and wait, it can take a couple of minutes.', 'tianlock-wp' ) .'</div>';?><br /><img style="width:400px; margin-bottom: 20px; border-radius: 4px;" src="<?php echo get_template_directory_uri(); ?>/screenshot.png" width="400" hieght="300" alt="img" /><br /> In the meantime, you check the <a href="https://anthemes.com/docs/tianlock/" target="_blank">help file</a> or <a href="https://anthemes.com/support/" target="_blank">get support</a>.<?php
    return $anthemes_wp_default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'anthemes_wp_plugin_intro_text' );

function anthemes_wp_import_files() {
    return array(
        array(
            'import_file_name'             => esc_html__( 'Main Demo', 'tianlock-wp' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . '/functions/demo/tianlock-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/functions/demo/tianlock-widgets.wie',
        ) 
    );
}
add_filter( 'pt-ocdi/import_files', 'anthemes_wp_import_files' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );


// ------------------------------------------------ 
// ---------- TGM_Plugin_Activation -------------
// ------------------------------------------------ 
 include( get_template_directory() . '/functions/custom/class-tgm-plugin-activation.php');
 add_action( 'tgmpa_register', 'tianlock_wp_register_required_plugins' );

function tianlock_wp_register_required_plugins() {

    $plugins = array(

        array(
            'name'                  =>  esc_html__( 'Shortcodes', 'tianlock-wp' ), // The plugin name
            'slug'                  => 'anthemes-shortcodes', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/plugins/anthemes-shortcodes.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
            'is_callable'           => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
       ),

        array(
            'name'                  => esc_html__( 'Emoji Likes System', 'tianlock-wp' ), // The plugin name
            'slug'                  => 'thumbs-rating', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/plugins/thumbs-rating.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),

        array(
            'name'                  => esc_html__( 'TianLock Theme Options', 'tianlock-wp' ), // The plugin name
            'slug'                  => 'tianlock-options', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/plugins/tianlock-options.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),

        array(
            'name'                  => esc_html__( 'Nav Menu Roles', 'tianlock-wp' ),
            'slug'                  => 'nav-menu-roles',
            'required'              => false,
            'version'               => '',
        ), 

        array(
            'name'                  => esc_html__( 'AccessPress Anonymous Post', 'tianlock-wp' ),
            'slug'                  => 'accesspress-anonymous-post',
            'required'              => false,
            'version'               => '',
        ),

        array(
            'name'                  => esc_html__( 'WP-PageNavi', 'tianlock-wp' ),
            'slug'                  => 'wp-pagenavi',
            'required'              => false,
            'version'               => '',
        ),

        array(
            'name'                  => esc_html__( 'Meta Box', 'tianlock-wp' ),
            'slug'                  => 'meta-box',
            'required'              => false,
            'version'               => '',
        ), 
        
        array(
            'name'                  => esc_html__( 'WooCommerce', 'tianlock-wp' ),
            'slug'                  => 'woocommerce',
            'required'              => false,
            'version'               => '',
        ),

        array(
            'name'                  => esc_html__( 'One Click Demo Import', 'tianlock-wp' ),
            'slug'                  => 'one-click-demo-import',
            'required'              => false,
            'version'               => '', 
        ),  

    );

    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );

}
?>