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
	/**
	 * Return the term list of a certain taxonomy related to an entry
	 *
	 * @param int    $post_id : entry ID.
	 * @param string $term : term slug.
	 * @return array array of Term objects
	 */
	public static function get_terms_list( $post_id, $term = 'category' ) {
		$terms = wp_get_post_terms( $post_id, $term );
		return $terms;
	}
	/**
	 * Return a list of button links to each category of a certain post
	 *
	 * @param int $post_id : entry ID.
	 * @return string List of button links
	 */
	public static function show_categories( $post_id ) {
		$categories = self::get_terms_list( $post_id );
		if ( ! empty( $categories ) ) {
			$out = '';
			foreach ( $categories as $category ) {
				$category_link = get_term_link( $category, 'category' );
				$out          .= Components::button( $category->name, $category_link, 'tiny', '' );
			}
			return $out;
		}
	}
	/**
	 * Return a list of button links to each tag of a certain post
	 *
	 * @param int $post_id : entry ID.
	 * @return string List of button links
	 */
	public static function show_tags( $post_id ) {
		$tags = self::get_terms_list( $post_id, 'post_tag' );
		if ( ! empty( $tags ) ) {
			$out = '';
			foreach ( $tags as $tag ) {
				$tag_link = get_term_link( $tag, 'post_tag' );
				$out     .= Components::button( $tag->name, $tag_link, 'tag', '' );
			}
			return $out;
		}
	}
	/**
	 * Return a share url with entry url parameters to share in social media
	 *
	 * @param string $which : Which social media facebook|twitter|linkedin.
	 * @param int    $post_id : entry ID.
	 * @return string url with parameters to share.
	 */
	public static function social_share( $which, $post_id ) {
		if ( ! empty( $post_id ) ) {
			$url   = get_permalink( $post_id );
			$title = get_the_title( $post_id );
			switch ( $which ) {
				case 'facebook':
					return 'https://www.facebook.com/sharer.php?u=' . urlencode( $url );
					break;
				case 'linkedin':
					return 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode( $url );
				break;
				case 'twitter':
					return 'https://twitter.com/intent/tweet?via=creativecommons&text=' . urlencode( $title ) . '&url=' . urlencode( $url );
				break;
				default:
					return '';
				break;
			}
		}
	}
}
