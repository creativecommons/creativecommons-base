<?php

class cc_filters {
  /**
   * Add class to Wordpress default navigation layout to match with Vocabulary
   *
   */
  function cc_add_class_to_anchor_menu( $atts, $item, $args ) {
    if($args->theme_location == 'footer-navigation') {
      $atts['class'] = 'menu-item';
    }
    return $atts;
  }
}
add_filter('nav_menu_link_attributes', array( 'cc_filters','cc_add_class_to_anchor_menu' ), 1, 3);