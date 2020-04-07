<?php
/**
 * CC Site
 *
 * This file contains a mix of useful functions for several uses.
 *
 * @link https://github.com/creativecommons/wp-theme-base
 *
 * @package WordPress
 * @subpackage wp-theme-base
 * @since 2020.04.1
 */

/**
 * CC Site
 *
 * A set of useful functions.
 *
 *  @since 2020.04.1
 */

class CC_Site {
	public static function get_terms_list( $post_id, $term = 'category' ) {
		$terms = wp_get_post_terms( $post_id, $term );
		return $terms;
	}
	public static function show_categories( $post_id ) {
		$categories = self::get_terms_list( $post_id );
		if ( !empty( $categories ) ) {
			$out = '';
			foreach ( $categories as $category ) {
				$category_link = get_term_link( $category, 'category' );
				$out .= Components::button( $category->name, $category_link, 'tiny', '' );
			}
			return $out;
		}
	}
	public static function show_tags( $post_id ) {
		$tags = self::get_terms_list( $post_id, 'post_tag' );
		if ( !empty( $tags ) ) {
			$out = '';
			foreach ( $tags as $tag ) {
				$tag_link = get_term_link( $tag, 'post_tag' );
				$out .= Components::button( $tag->name, $tag_link, 'tag', '' );
			}
			return $out;
		}
	}
}
