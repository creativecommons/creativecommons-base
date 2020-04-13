<?php
/**
 * CC Filters
 *
 * This file contains a mix of useful filters & actions.
 *
 * @link https://github.com/creativecommons/wp-theme-base
 *
 * @package WordPress
 * @subpackage wp-theme-base
 * @since 2020.04.1
 */

/**
 * CC Filters
 *
 * A set of useful Filters & actions.
 *
 *  @since 2020.04.1
 */
class CC_Filters {
	/**
	 * Add class to WordPress default navigation layout to match with Vocabulary
	 *
	 * @since 2020.04.1
	 * @param array $atts : attributes.
	 * @param array $item : item.
	 * @param array $args : arguments.
	 */
	public static function cc_add_class_to_anchor_menu( $atts, $item, $args ) {
		if ( $args->theme_location == 'footer-navigation' ) {
			$atts['class'] = 'menu-item';
		}
		return $atts;
	}
}
add_filter( 'nav_menu_link_attributes', array( 'CC_Filters', 'cc_add_class_to_anchor_menu' ), 1, 3 );
