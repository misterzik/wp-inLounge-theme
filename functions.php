<?php
/**
 * Insanen Solutions by misterzik
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package inLoungeTheme
 */

if ( ! function_exists( 'inLoungeTheme_setup' ) ) :
function inLoungeTheme_setup() {
	load_theme_textdomain( 'inLoungeTheme', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(
    		'primary' => __( 'Primary Menu', 'inLoungeTheme' ),
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
	add_theme_support( 'custom-background', apply_filters( 'inLoungeThemecustom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function inLoungeTheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'inLoungeTheme_content_width', 640 );
}


function inLoungeTheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'inLoungeTheme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><i class="fa fa-glass widgetIcon"></i>  ',
		'after_title'   => '</h4>',
	) );
}

function inLoungeTheme_scripts() {
	wp_enqueue_style( 'inLoungeTheme-style', get_template_directory_uri().'/style.min.css' );
	wp_enqueue_style( 'inLoungeTheme-bscss', get_template_directory_uri() . '/inc/lib/bootstrap/dist/css/bootstrap.min.css');
	wp_enqueue_style( 'inLoungeTheme-fa', get_template_directory_uri() . '/inc/lib/font-awesome-css/css/font-awesome.min.css');
	wp_enqueue_style( 'inLoungeTheme-custom', get_template_directory_uri() . '/custom.css');


	wp_enqueue_script( 'inLoungeTheme-jq', get_template_directory_uri() . '/inc/lib/jquery/dist/jquery.min.js', array(), true );
	wp_enqueue_script( 'inLoungeTheme-bs', get_template_directory_uri() . '/inc/lib/bootstrap/dist/js/bootstrap.min.js', array('jquery'));
	wp_enqueue_script( 'inLoungeTheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'inLoungeTheme-loading', get_template_directory_uri() . '/js/loading.js', array(), true );
	wp_enqueue_script( 'inLoungeTheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function inLoungeTheme_register_required_plugins() {
 $plugins = array(
	 array(
		 'name'      => 'WP-WetSlider',
		 'slug'      => 'wp-wetslider',
		 'source'    => 'https://github.com/misterzik/wp-wetslider/archive/master.zip',
		 'required'           => true,
		 'force_activation'   => false,
		 'force_deactivation' => false,
	 ),
	 array(
		 'name'      => 'WP-StickyNewz',
		 'slug'      => 'wp-stickynewz',
		 'source'    => 'https://github.com/misterzik/wp-stickynewz/archive/master.zip',
		 'required'           => true,
		 'force_activation'   => false,
		 'force_deactivation' => false,
	 ),
 );

 $config = array(
	 'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
	 'default_path' => '',                      // Default absolute path to bundled plugins.
	 'menu'         => 'required-plugins-insanen', // Menu slug.
	 'has_notices'  => true,                    // Show admin notices or not.
	 'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
	 'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
	 'is_automatic' => false,                   // Automatically activate plugins after installation or not.
	 'message'      => '',                      // Message to output right before the plugins table.
 );

 tgmpa( $plugins, $config );
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';
require_once('class-tgm-plugin-activation.php');
require_once('wp_bootstrap_navwalker.php');

add_action('tgmpa_register', 'inLoungeTheme_register_required_plugins' );
add_action( 'wp_enqueue_scripts', 'inLoungeTheme_scripts' );
add_action( 'widgets_init', 'inLoungeTheme_widgets_init' );
add_action( 'after_setup_theme', 'inLoungeTheme_content_width', 0 );
add_action( 'after_setup_theme', 'inLoungeTheme_setup' );
