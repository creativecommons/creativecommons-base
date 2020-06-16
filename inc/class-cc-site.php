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
	public static function get_highlighted_posts( $current_object, $size = 10, $category = 'highlight' ) {
		$args  = array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => $size,
			'tax_query'      => array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => array( $current_object->slug, $category ),
				),
			),
		);
		$query = new WP_Query( $args );
		return $query;
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
	/**
	 * Current page title
	 * Display the title of the current page checking the context
	 *
	 * @return string current page title
	 */
	static function page_title() {
		$get = get_queried_object();
		if ( is_post_type_archive() ) {
			return 'Archive: ' . $get->labels->name;
		} elseif ( is_category() ) {
			return 'Category ' . $get->name;
		} elseif ( is_tag() ) {
			return 'Tag "' . $get->name . '"';
		} elseif ( is_tax() ) {
			return 'Archive ' . $get->name;
		} if ( is_search() ) {
			return 'Search for: &#8220;' . get_search_query() . '&#8221;';
		} elseif ( is_404() ) {
			return 'Content not found';
		} elseif ( is_author() ) {
			return 'Author: ' . $get->display_name;
		} elseif ( is_home() ) {
			return 'Blog';
		} else {
			the_title();
		}
	}
	/**
	 * Set the default website logo and allows to filter it in child themes
	 *
	 * @return void
	 */
	public static function get_current_website_logo() {
		$default_logo = 'cc/logomark.svg#logomark';
		$current_main_logo = apply_filters( 'cc_theme_base_set_default_logo', $default_logo );
		return Components::cc_logos($current_main_logo, false);
	}
	/**
	 * Get the top parent page of the current navigation level
	 *
	 * @return int $post_id : top level parent page
	 */
	public static function get_parent_page() {
		global $post;
		if ($post->post_parent)	{
			$ancestors = get_post_ancestors($post->ID);
			$root = count( $ancestors )-1;
			return $ancestors[$root];
		} else {
			return $post->ID;
		}
	}
}
