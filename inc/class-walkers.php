<?php
/**
 * Bulma-Navwalker
 *
 * @package creativecommons-base
 * @since 2020.04.1
 */

/**
 * Author: Carlo Operio - https://www.linkedin.com/in/carlooperio/, Bulma-Framework
 * Author URI: https://github.com/wp-bootstrap
 * License: GPL-3.0+
 * License URI: https://github.com/Poruno/Bulma-Navwalker/blob/master/LICENSE
 */

class Navwalker extends Walker_Nav_Menu {
	/** 
	 * Creates the start element.
	 * @param string $output Html string containing the output.
	 * @param int $depth nesting level of the menu.
	 * @param array $args Other dynamic input.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "<div class='navbar-dropdown'>";
	}

	/**
	 * Creates the menu using an anchor tag. Creates dropdown if the given menu has children.
	 * @param string $output Html string containing the output.
	 * @param object $item menu information of a single menu item.
	 * @param int $depth nesting level of the menu.
	 * @param array $args Other dynamic input.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$classes      = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[]    = 'menu-item-' . $item->ID;
		$class_names  = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$li_classes   = 'navbar-item ' . $item->post_name . ' ' . $class_names;
		$has_children = empty($args->walker) ? false : $args->walker->has_children;
		$li_classes  .= $has_children ? ' has-dropdown is-hoverable' : '';
		if ( $has_children ) {
			$output .= "<div class='" . $li_classes . "'>";
			$output .= "\n<a class='navbar-link is-arrowless' href='" . $item->url . "'>" . $item->title . '<i class="icon caret-down"></i></a>';
		} else {
			$output .= "<a class='" . $li_classes . "' href='" . $item->url . "'>" . $item->title;
		}
		// Adds has_children class to the item so end_el can determine if the current element has children
		if ( $has_children ) {
			$item->classes[] = 'has_children';
		}
	}
	/**
	 * Append the end of element tag. If there are more records to process it completes the previous
	 * anchor tag else it add the final end-div tag
	 * @param string $output Html string containing the output.
	 * @param object $item menu information of a single menu item.
	 * @param int $depth nesting level of the menu.
	 * @param array $args Other dynamic input.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		/* Checks if the current item has any child elements */
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		if ( in_array( 'has_children', $classes) ) {
			$output .= '</div>';
		}
		$output .= '</a>';
	}

	/**
	 * Adds end of div tag for any given menu
	 * @param string $output Html string containing the output.
	 * @param int $depth nesting level of the menu.
	 * @param array $args Other dynamic input.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= '</div>';
	}
}
