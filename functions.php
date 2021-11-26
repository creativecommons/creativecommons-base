<?php
/**
 * Functions: list
 *
 * @version 2021.07.1
 * @package creativecommons-base
 */
require get_theme_file_path( 'inc/theme-customizer.php' );

/* Allow full-width Gutenberg widget alignment */
add_theme_support( 'align-wide' );

/* Theme Constants (to speed up some common things) ------*/
define( 'HOME_URI', get_bloginfo( 'url' ) );
define( 'PRE_HOME_URI', get_bloginfo( 'url' ) . '/wp-content/themes' );
define( 'SITE_NAME', get_bloginfo( 'name' ) );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_IMG', THEME_URI . '/assets/img' );
define( 'THEME_JS', THEME_URI . '/assets/js' );
define ('THEME_CSS', THEME_URI . '/');
/**
* Calling related files
*/
  // include TEMPLATEPATH . '/inc/search.php';
  require TEMPLATEPATH . '/inc/widgets.php';
  require TEMPLATEPATH . '/inc/class-cc-site.php';
  require TEMPLATEPATH . '/inc/class-cc-filters.php';
  require TEMPLATEPATH . '/inc/class-components.php';
  require TEMPLATEPATH . '/inc/class-walkers.php';
  require TEMPLATEPATH . '/inc/helpers.php';

  add_action( 'customize_register', 'cc_base_theme_customize_register' );

/**
 * Images
 * ------
 * */

// Add theme support for post thumbnails
add_theme_support( 'post-thumbnails' );

// Define custom thumbnail sizes
add_image_size( 'squared', 300, 300, true );
add_image_size( 'landscape-small', 550, 300, true );
add_image_size( 'landscape-medium', 740, 416, true );
add_image_size( 'landscape-featured', 1000, 500, true );

/**
*  THEME SIDEBARS
*  Default sidebars availables
*/
$mandatory_sidebars = array(
	'Homepage Notification' => array(
		'name' => 'home-notification',
	),
	'Homepage widgets'      => array(
		'name' => 'homepage-sidebar',
	),
	'Single'                => array(
		'name' => 'single',
	),
	'Page'                  => array(
		'name' => 'page',
	),
	'Page Footer'           => array(
		'name' => 'page-footer',
	),
);
/**
 * Mandatory sidebars
 *
 * This filter allows to add more sidebars for each theme.
 *
 * @since 2020.04.1
 *
 * @param array $mandatory_sidebars : Array with sidebar information same format as $mandatory_sidebars
 * @return array list of filteded sidebars list
 */
$mandatory_sidebars = apply_filters( 'cc_theme_base_mandatory_sidebars', $mandatory_sidebars );
foreach ( $mandatory_sidebars as $sidebar => $id_sidebar ) {
	register_sidebar(
		array(
			'name'          => $sidebar,
			'id'            => $id_sidebar['name'],
			'before_widget' => '<section id="%1$s" class="widget %2$s">' . "\n",
			'after_widget'  => '</section>',
			'before_title'  => '<header class="widget-header"><h3 class="widget-title">',
			'after_title'   => '</h3></header>',
		)
	);
}

/**
 * Theme specific stuff
 * --------------------
 * */

/**
 * Theme singleton class
 * ---------------------
 * Stores various theme and site specific info and groups custom methods
 **/
class Site {
	private static $instance;

	protected $settings;
	public $show_welcome = true;

	const id        = __CLASS__;
	const theme_ver = '2020.11.2';
	private function __construct() {
		$this->actions_manager();

	}
	public function __get( $key ) {
		return isset( $this->$key ) ? $this->$key : null;
	}
	public function __isset( $key ) {
		return isset( $this->$key );
	}
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}
		return self::$instance;
	}
	public function __clone() {
		trigger_error( 'Clone is not allowed.', E_USER_ERROR );
	}
	/**
	 * Setup theme actions, both in the front and back end
	 * */
	public function actions_manager() {
		add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'init', array( $this, 'init_functions' ) );
		add_action( 'init', array( $this, 'register_menus_locations' ) );
	}
	public function init_functions() {
		add_post_type_support( 'page', 'excerpt' );
	}
	public function setup_theme() {
		/**
	 * Post formats
	 *
	 * This filter allows to customize the enable post formats list.
	 *
	 * @since 2020.04.1
	 *
	 * @param array $array : Array with enabled post formats
	 * @return array list of filtered enabled post formats
	 */
		$available_post_formats = apply_filters( 'cc_theme_base_post_formats', array( 'gallery', 'image', 'video' ) );
		add_theme_support( 'post-formats', $available_post_formats );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'responsive-embeds' );
	}

	public function register_menus_locations() {
		$theme_base_menus = array(
			'main-navigation'   => 'Main navigation',
			'main-menu-mobile'  => 'Main navigation mobile',
			'footer-navigation' => 'Footer navigation',
			'404-navigation'    => '404 Navigation',
		);
		/**
	 * Menu locations
	 *
	 * This filter allows to add or remove menu locations.
	 *
	 * @since 2020.04.1
	 *
	 * @param array $theme_base_menu : Array with menu locations data same format as $theme_base_menus
	 * @return array list of filteded sidebars list
	 */
		$theme_base_menus = apply_filters( 'cc_theme_base_menus', $theme_base_menus );
		register_nav_menus( $theme_base_menus );
	}

	public function get_post_thumbnail_url( $postid = null, $size = 'landscape-medium' ) {
		if ( is_null( $postid ) ) {
			global $post;
			$postid = $post->ID;
		}
		$thumb_id = get_post_thumbnail_id( $postid );
		$img_src  = wp_get_attachment_image_src( $thumb_id, $size );
		return $img_src ? current( $img_src ) : '';
	}

	public function enqueue_styles() {
		// Front-end styles
		wp_enqueue_style( 'gfonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Source+Sans+Pro:400,400i,600' );
		wp_enqueue_style( 'cc_base_style', THEME_CSS . '/style.css', self::theme_ver );
		wp_enqueue_style( 'dashicons' );
	}

	function admin_enqueue_scripts() {
		// admin scripts
		global $pagenow;
		$current_screen = get_current_screen();
		if ( is_admin() && ( $pagenow == 'widgets.php' ) || $current_screen->id == 'dashboard_page_cc-main-site-settings' ) {
			wp_enqueue_media();
			wp_enqueue_script( 'script-admin', THEME_JS . '/admin_scripts.js', array( 'jquery' ), self::theme_ver );
		}
		// Add custom stylesheet for admins
		wp_enqueue_style( 'cc_base_style', THEME_CSS . '/style.css', self::theme_ver );
	}

	function enqueue_scripts() {
		// front-end scripts
		wp_enqueue_script( 'jquery', true );
		wp_enqueue_script( 'glideSlide', THEME_JS . '/glide.min.js', '', self::theme_ver, true );
		wp_enqueue_script( 'cc_base_script', THEME_JS . '/script.js', array( 'jquery' ), self::theme_ver, true );

		// attach data to script.js
		$ajax_data = array(
			'url' => admin_url( 'admin-ajax.php' ),
		);
		wp_localize_script( 'cc_base_script', 'Ajax', $ajax_data );
	}
}

/**
 * Instantiate the class object
 * */

$_s = Site::get_instance();

/**
 * This line disables the default color picker so users are constrained just to the
 * Createive Commons brand guide.
 */
add_theme_support('disable-custom-colors');

/**
 * The colors on the brand guide of Creative Commons Figma design are defined below
 * for use by WordPress.
 */
$cc_colors = array(
    //Brand
    array(
        'name'  => esc_attr__( 'Tomato', 'themeCreativeCommons' ),
        'slug'  => 'tomato',
        'color' => '#c74200',
    ),
    array(
        'name'  => esc_attr__( 'Dark Slate Gray', 'themeCreativeCommons' ),
        'slug'  => 'dark-slate-gray',
        'color' => '#333333',
    ),
    array(
        'name'  => esc_attr__( 'Gold', 'themeCreativeCommons' ),
        'slug'  => 'gold',
        'color' => '#fbd43c',
    ),
    array(
        'name'  => esc_attr__( 'Forest Green', 'themeCreativeCommons' ),
        'slug'  => 'forest-green',
        'color' => '#008000',
    ),
    array(
        'name'  => esc_attr__( 'Dark Turqoise', 'themeCreativeCommons' ),
        'slug'  => 'dark-turquoise',
        'color' => '#05b5da',
    ),
    array(
        'name'  => esc_attr__( 'Dark Slate Blue', 'themeCreativeCommons' ),
        'slug'  => 'dark-slate-blue',
        'color' => '#1547a8',
    ),

    //Soft Brand
    array(
        'name'  => esc_attr__( 'Soft Tomato', 'themeCreativeCommons' ),
        'slug'  => 'soft-tomato',
        'color' => '#feede9',
    ),
    array(
        'name'  => esc_attr__( 'Soft Gold', 'themeCreativeCommons' ),
        'slug'  => 'soft-gold',
        'color' => '#fef6d8',
    ),
    array(
        'name'  => esc_attr__( 'Soft Green', 'themeCreativeCommons' ),
        'slug'  => 'soft-green',
        'color' => '#e0f5e0',
    ),
    array(
        'name'  => esc_attr__( 'Soft Turquoise', 'themeCreativeCommons' ),
        'slug'  => 'soft-turquoise',
        'color' => '#dff6fc',
    ),
    array(
        'name'  => esc_attr__( 'Soft Blue', 'themeCreativeCommons' ),
        'slug'  => 'soft-blue',
        'color' => '#e3ebfd',
    ),

    //Neutral
    array(
        'name'  => esc_attr__( 'Dark Gray', 'themeCreativeCommons' ),
        'slug'  => 'dark-gray',
        'color' => '#767676',
    ),
    array(
        'name'  => esc_attr__( 'Gray', 'themeCreativeCommons' ),
        'slug'  => 'gray',
        'color' => '#b0b0b0',
    ),
    array(
        'name'  => esc_attr__( 'Light Gray', 'themeCreativeCommons' ),
        'slug'  => 'light-gray',
        'color' => '#d8d8d8',
    ),
    array(
        'name'  => esc_attr__( 'Lighter Gray', 'themeCreativeCommons' ),
        'slug'  => 'lighter-gray',
        'color' => '#f5f5f5',
    ),

    //Binary
    array(
        'name'  => esc_attr__( 'White', 'themeCreativeCommons' ),
        'slug'  => 'white',
        'color' => '#ffffff',
    ),
    array(
        'name'  => esc_attr__( 'Black', 'themeCreativeCommons' ),
        'slug'  => 'black',
        'color' => '#000000',
    ),
);

// This line below adds the colors defined above into the color pallete of WordPress
add_theme_support( 'editor-color-palette', $cc_colors);
