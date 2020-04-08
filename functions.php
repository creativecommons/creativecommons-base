<?php
/**
 * Functions: list
 *
 * @version 2020.04.1
 * @package wp-theme-base
 */

/* Theme Constants (to speed up some common things) ------*/
define( 'HOME_URI', get_bloginfo( 'url' ) );
define( 'PRE_HOME_URI', get_bloginfo( 'url' ) . '/wp-content/themes' );
define( 'SITE_NAME', get_bloginfo( 'name' ) );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_IMG', THEME_URI . '/assets/img' );
define( 'THEME_CSS', THEME_URI . '/assets/css' );
define( 'THEME_FONTS', THEME_URI . '/assets/fonts' );
define( 'THEME_JS', THEME_URI . '/assets/js' );
/**
* Calling related files
*/
  // include TEMPLATEPATH . '/inc/widgets.php';
  // include TEMPLATEPATH . '/inc/search.php';
  // include TEMPLATEPATH . '/inc/settings.php';
  include TEMPLATEPATH . '/inc/metaboxes.php';
  include TEMPLATEPATH . '/inc/class-cc-site.php';
  require TEMPLATEPATH . '/inc/class-cc-filters.php';
  require TEMPLATEPATH . '/inc/class-components.php';
  require TEMPLATEPATH . '/inc/class-walkers.php';
  require TEMPLATEPATH . '/inc/helpers.php';


/**
 * Images
 * ------
 * */

// Add theme suppor for post thumbnails
add_theme_support( 'post-thumbnails' );

// Define custom thumbnail sizes
add_image_size( 'squared', 300, 300, true );
add_image_size( 'landscape-medium', 740, 416, true );
add_image_size( 'landscape-featured', 1000, 500, true );

/**
*  THEME SIDEBARS
*  Default sidebars availables
*/
$mandatory_sidebars = array(

	'Single' => array(
		'name' => 'single',
	),
	'Page'   => array(
		'name' => 'page',
	),
	'Page Footer'   => array(
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
	const theme_ver = '2020.04.1';
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
		wp_enqueue_style( 'vocabulary_fonts', 'https://unpkg.com/@creativecommons/fonts@1.0.0-beta.2/css/fonts.css', self::theme_ver );
		wp_enqueue_style( 'cc_base_style', THEME_CSS . '/styles.css', self::theme_ver );
		wp_enqueue_style( 'dashicons' );
	}

	function admin_enqueue_scripts() {

		// admin scripts
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
