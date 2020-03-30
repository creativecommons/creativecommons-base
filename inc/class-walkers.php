<?php
/**
 * Bulma-Navwalker
 *
 * @package wp-theme-base
 * @since 2020.04.1
 */

/**
 * Author: Carlo Operio - https://www.linkedin.com/in/carlooperio/, Bulma-Framework
 * Author URI: https://github.com/wp-bootstrap
 * License: GPL-3.0+
 * License URI: https://github.com/Poruno/Bulma-Navwalker/blob/master/LICENSE
 */

class Navwalker extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "<div class='navbar-dropdown'>";
	}
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$li_classes   = 'navbar-item ' . $item->title;
		$has_children = $args->walker->has_children;
		$li_classes  .= $has_children ? ' has-dropdown is-hoverable' : '';
		if ( $has_children ) {
			$output .= "<div class='" . $li_classes . "'>";
			$output .= "\n<a class='navbar-link' href='" . $item->url . "'>" . $item->title . '</a>';
		} else {
			$output .= "<a class='" . $li_classes . "' href='" . $item->url . "'>" . $item->title;
		}
		// Adds has_children class to the item so end_el can determine if the current element has children
		if ( $has_children ) {
			$item->classes[] = 'has_children';
		}
	}
	public function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( in_array( 'has_children', $item->classes ) ) {
			$output .= '</div>';
		}
		$output .= '</a>';
	}
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= '</div>';
	}
}
