<?php
/**
 * CC Vocabulary components : Components
 *
 * This file contains a component class to work with CC Vocabulary components.
 *
 * @link https://github.com/creativecommons/wp-theme-base
 * @link https://github.com/creativecommons/vocabulary
 *
 * @package WordPress
 * @subpackage wp-theme-base
 * @since 2020.04.1
 */

/**
 * Vocabulary components
 *
 * Class to handle CC Vocabulary components
 *
 *  @since 2020.04.1
 */
class Components {
	/**
	 * Genereic card post and its variants
	 *
	 * @param int     $post_id : post or entry id.
	 * @param boolean $show_image : whether to show or not the image.
	 * @param boolean $is_video : is the post a video.
	 * @param boolean $has_button : should we show the action button?.
	 * @param boolean $has_content : should we show the except of the entry?.
	 * @param string  $direction : direction of the card `horizontal` or `vertical`.
	 * @return string component layout
	 */
	public static function card_post( $post_id, $show_image = true, $is_video = false, $has_button = true, $has_content = true, $direction = 'horizontal' ) {
		$out .= '<article class="card entry-post ' . $direction . '">';
		if ( has_post_thumbnail( $post_id ) && $show_image ) {
			$out         .= '<header class="card-image">';
				$out     .= '<figure class="image is-4by3">';
					$out .= get_the_post_thumbnail( $post_id, 'landscape-medium' );
				$out     .= '</figure>';
			$out         .= '</header>';
		}
		$button_class = ( $has_button ) ? ' with-button' : '';
		$out         .= '<div class="card-content ' . $button_class . '">';
			$out     .= '<h4 class="card-title"><a href="' . get_permalink( $post_id ) . '">' . get_the_title( $post_id ) . '</a></h4>';
		if ( ! $is_video ) {
			$out .= '<span class="subtitle"> ' . get_the_date( 'd F Y', $post_id ) . ' </span>';
		}
		if ( $has_content ) {
			$the_post = get_post( $post_id );
			$out     .= '<div class="content">';
				$out .= do_excerpt( $the_post );
			$out     .= '</div>';
		}
				$out .= '<a href="#" class="button is-primary">Read more</a>';
			$out     .= '</div>';
		$out         .= '</article>';

		return $out;
	}
	/**
	 * Genereic button and its variants
	 *
	 * @param string  $text : Button text.
	 * @param string  $url : Button url.
	 * @param string  $size : Button size big|small|tiny|tag.
	 * @param string  $color : Button color is_primary|donate|is_success|is_info|is_warning|is_danger.
	 * @param boolean $new_tab : open the button in new tab.
	 * @return string component layout
	 */
	public static function button( $text, $url, $size, $color, $new_tab = false ) {
		$size_class   = ( ! empty( $size ) ) ? $size : '';
		$color_class  = ( ! empty( $color ) ) ? $color : '';
		$open_new_tab = ( $new_tab ) ? ' target="_blank"' : '';
		$out          = '';
		if ( ! empty( $text ) && ! empty( $url ) ) {
			$out .= '<a href="' . $url . '" class="button ' . $size_class . $color_class . '"' . $open_new_tab . '>' . $text . '</a>';
		}
		return $out;
	}
}
