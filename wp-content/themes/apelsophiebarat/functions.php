<?php
#note :
#parent theme get_template_directory_uri()
#child  theme get_stylesheet_directory_uri()

/*
	Importer le style du thème parent
	see https://wpmarmite.com/child-theme-wordpress/
*/
function gssb_enqueue_styles(){
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');	
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), false, 'screen and (min-device-width: 481px)' );
	wp_enqueue_style( 'child-phone-style', get_stylesheet_directory_uri() . '/phone_style.css', array('child-style'), false, 'only screen and (max-device-width: 480px)' );
	wp_enqueue_style( 'child-menuc-antine-style', get_stylesheet_directory_uri() . '/menu-cantine.css', array('child-style'));
}

add_action( 'wp_enqueue_scripts', 'gssb_enqueue_styles' );

function gssb_add_viewport() {
	echo '<meta name="viewport" content="width=device-width, minimum-scale=1.0,maximum-scale=1.0">';
}

add_action('wp_head', 'gssb_add_viewport');


function twentyten_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'twentyten', get_template_directory() . '/languages' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'twentyten' ),
		)
	);

	// This theme allows users to set a custom background.
	add_theme_support(
		'custom-background', array(
			// Let WordPress know what our default background color is.
			'default-color' => 'cbd401',
			'default-image'          => get_stylesheet_directory() . '/fond.jpg',
			'default-repeat'         => 'repeat-y',
			'default-position-x'     => 'center',
        	'default-position-y'     => 'top',
	        'default-size'           => 'auto',
			'default-attachment'     => 'scroll',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	);

	// The custom header business starts here.

	$custom_header_support = array(
		/*
		 * The default image to use.
		 * The %s is a placeholder for the theme template directory URI.
		 */
		'default-image'       => get_stylesheet_directory_uri() . '/banner.jpg',
		// The height and width of our custom header.
		/**
		 * Filter the Twenty Ten default header image width.
		 *
		 * @since Twenty Ten 1.0
		 *
		 * @param int The default header image width in pixels. Default 940.
		 */
		'width'               => apply_filters( 'twentyten_header_image_width', 940 ),
		/**
		 * Filter the Twenty Ten defaul header image height.
		 *
		 * @since Twenty Ten 1.0
		 *
		 * @param int The default header image height in pixels. Default 198.
		 */
		   'height'           => apply_filters( 'twentyten_header_image_height', 198 ),
		// Support flexible heights.
		'flex-height'         => true,
		// Don't support text inside the header image.
		'header-text'         => false,
		// Callback for styling the header preview in the admin.
		'admin-head-callback' => 'twentyten_admin_header_style',
	);

	add_theme_support( 'custom-header', $custom_header_support );

	/*
	 * We'll be using post thumbnails for custom header images on posts and pages.
	 * We want them to be 940 pixels wide by 198 pixels tall.
	 * Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	 */
	set_post_thumbnail_size( $custom_header_support['width'], $custom_header_support['height'], true );

	// ... and thus ends the custom header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.		
}