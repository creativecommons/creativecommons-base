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
				$out .= '<a href="'.get_permalink( $post_id ).'" class="button is-primary">Read more</a>';
			$out     .= '</div>';
		$out         .= '</article>';

		return $out;
	}
	/**
	 * Card post event. It tooks the size of the container
	 *
	 * @param int     $post_id : post or entry id.
	 * @param boolean $has_content : should we show the except of the entry?.
	 * @return string component layout
	 */
	public static function card_post_event( $post_id, $has_content = true ) {
		$out .= '<article class="card entry-post entry-event horizontal">';
			$out         .= '<header class="card-header">';
			$out .= '<div class="card-date">';
          $out .= '<span class="month">'.get_the_date('F', $post_id).'</span>';
          $out .= '<span class="day">'.get_the_date('d', $post_id).'</span>';
          $out .= '<span class="year">'.get_the_date('Y', $post_id).'</span>';
        $out .= '</div>';
			$out         .= '</header>';
		$out         .= '<div class="card-content">';
			$out     .= '<h4 class="card-title"><a href="' . get_permalink( $post_id ) . '">' . get_the_title( $post_id ) . '</a></h4>';
		if ( $has_content ) {
			$the_post = get_post( $post_id );
			$out     .= '<div class="content">';
				$out .= do_excerpt( $the_post );
			$out     .= '</div>';
		}
				$out .= '<a href="'.get_permalink( $post_id ).'" class="read-more">Read more</a>';
			$out     .= '</div>';
		$out         .= '</article>';

		return $out;
	}
	/**
	 * Card statistic.
	 *
	 * @param int     $post_id : post or entry id.
	 * @param string  $number : Entry statisticas (it's a string because can be used to show number such as "600+").
	 * @param string  $caption : Text under the number.
	 * @param boolean $caption_is_title : if caption is the entry title.
	 * @param boolean $has_content : should we show an except of the entry?.
	 * @param boolean $has_link : should we show the link to the entry?.
	 * @return string component layout
	 */
	public static function card_statistic( $post_id, $number, $caption, $caption_is_title = true, $has_content = true, $has_link = true ) {
		$caption = ( $caption_is_title ) ? get_the_title( $post_id ) : $caption;
		$out .= '<article class="card entry-post entry-statistic">';
			$out         .= '<header class="card-header">';
			$out .= '<div class="card-statistic">';
          $out .= '<span class="number">'.$number.'</span>';
          $out .= '<span class="caption">'.$caption.'</span>';
        $out .= '</div>';
			$out         .= '</header>';
		$out         .= '<div class="card-content">';
		if ( $has_content ) {
			$the_post = get_post( $post_id );
			$out     .= '<div class="content">';
				$out .= do_excerpt( $the_post );
			$out     .= '</div>';
		}
			if ( $has_link ) {
				$out .= '<a href="'.get_permalink( $post_id ).'" class="read-more">Read more</a>';
			}
			$out     .= '</div>';
		$out         .= '</article>';

		return $out;
	}
	/**
	 * Card quote.
	 *
	 * @param int     $post_id : post or entry id.
	 * @param boolean $show_image : whether to show or not the image.
	 * @param string  $author_name : quote author.
	 * @param string  $author_description : quote author description.
	 * @return string component layout
	 */
	public static function card_quote( $post_id, $show_image = true, $author_name, $author_description ) {
		$out .= '<article class="card entry-post entry-quote horizontal no-border">';
		if ( has_post_thumbnail( $post_id ) && $show_image ) {
			$out         .= '<header class="card-image">';
				$out     .= '<figure class="image is-1by1">';
					$out .= get_the_post_thumbnail( $post_id, 'thumbnail' );
				$out     .= '</figure>';
			$out         .= '</header>';
		}
		$out .= '<div class="card-content">';
			$out .= '<span class="quote"></span>';
			$the_post = get_post( $post_id );
			$out     .= '<div class="content">';
				$out .= apply_filters( 'the_content', $the_post->post_content );
				$out .= '<div class="quote-author">';
            $out .= '<strong class="title"> '.$author_name.'</strong>';
            $out .= '<p class="description">'.$author_description.'</p>';
          $out .= '</div>';
			$out  .= '</div>';
			$out     .= '</div>';
		$out         .= '</article>';

		return $out;
	}
	/**
	 * Card quote.
	 *
	 * @param int     $post_id : attachment image id
	 * @param string  $url : optional URL for card title.
	 * @return string component layout
	 */
	public static function card_image( $post_id, $url = false ) {
		$out .= '<article class="card entry-post entry-image vertical">';
			$out  .= '<header class="card-image">';
				$out     .= '<figure class="image is-4by5">';
					$out .= wp_get_attachment_image($post_id, 'landscape-medium');
				$out     .= '</figure>';
			$out .= '</header>';
		$out .= '<div class="card-content">';
			$the_post = get_post( $post_id );
				$out .= '<h4 class="card-title">';
				if ( $url ) {
					$out .= '<a href="'.esc_url($url).'">';
				}
				$out .= get_the_title( $post_id );
				if ( $url ) {
					$out .= '</a>';
				}
				$out .= '</h4>';
				$out .= '<span class="subtitle">'.esc_attr($post->post_exerpt).'</span>';
			$out     .= '</div>';
		$out   .= '</article>';

		return $out;
	}
	/**
	 * Card link border / no-border
	 *
	 * @param int     $post_id : entry_id (optional).
	 * @param boolean $use_post_data : this grabs data from a given $post_id.
	 * @param string  $background_color : background color of card tomato|orange|gold|forest-green|dark-turquoise|dark-slate-blue|dark-slate-gray. 
	 * @param string  $title : Custom title if $use_post_data is set to false.
	 * @param string  $description : Custom description if $use_post_data is set to false.
	 * @param string  $link_text : Custom link text otherwhise is set to "Read more".
	 * @param string  $url : Custom URL if $use_post_data is set to false.
	 * @param boolean $has_content : should we show an except of the entry?.
	 * @param boolean $has_border : should we show the border format of the card.
	 * @param boolean $has_link : should we show the bottom link?.
	 * @param boolean $extra_class : extra class to component if it's needed.
	 * @return string component layout
	 */
	public static function card_link( $post_id = null, $use_post_data = false, $background_color, $title = null, $description = null, $link_text = null, $url = null, $has_content = true, $has_border = false, $has_link = true, $extra_class = false ) {
		$the_title = ( $use_post_data ) ? get_the_title($post_id) : $title;
		$the_url = ( $use_post_data ) ? get_permalink( $post_id ) : $url;
		$the_link_text = ( $use_post_data ) ? 'Read more' : esc_attr( $link_text );
		$border_class = ( !$has_border ) ? ' no-border' : '';
		$color_class = ( !$has_border ) ? 'class="has-background-'.$background_color.'"' : '';
		$class = ( !empty( $extra_class ) ) ? ' '.$extra_class : '';
		$out .= '<article class="card entry-post link '.$border_class.$class.'">';
			$out .= '<a href="'.$the_url.'" '.$color_class.'>';
				$out .= '<span class="card-content has-bottom-link">';
					$out .= '<h2 class="card-title">'.$the_title.'</h2>';
					if ( $has_content ) {
						if ( $use_post_data ) {
							$the_post = get_post( $post_id );
							$the_content = do_excerpt( $the_post );
						} else {
							$the_content = $description;
						}
					$out .= '<span class="content">'.esc_attr($description).'</span>';
				}
				if ( $has_link ) {
					$out .= '<span class="link-arrow">'.$the_link_text.'</span>';
				}
				$out .= '</span>';
			$out .= '</a>';
		$out .= '</article>';
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
	public static function button( $text, $url, $size, $color, $new_tab = false, $icon = false ) {
		$size_class   = ( ! empty( $size ) ) ? $size : '';
		$color_class  = ( ! empty( $color ) ) ? $color : '';
		$open_new_tab = ( $new_tab ) ? ' target="_blank"' : '';
		$icon = ( !empty($icon) ) ? '<i class="icon '. $icon .' margin-right-small is-size-5 padding-top-smaller"></i> ' : '';

		$out          = '';
		if ( ! empty( $text ) && ! empty( $url ) ) {
			$out .= '<a href="' . $url . '" class="button ' . $size_class .' '. $color_class . '"' . $open_new_tab . '>' . $icon.$text . '</a>';
		}
		return $out;
	}
	/**
	 * Notification
	 *
	 * @param string  $type : Type of notification content|warning
	 * @param string  $url : Notification url.
	 * @param string  $title : Notification title.
	 * @param string  $content : Notification content.
	 * @param int     $img_id : Entry Id for image
	 * @return string component layout
	 */
	public static function notification($type = 'warning', $url, $title, $content, $img_id = null ) {
		$out .= '<div class="notification '.$type.'">';
			$out .= '<a href="'.esc_url( $url ).'" class="notification-container">';
			if ( ( $type == 'content' ) && ( !empty( $img_id ) ) ) {
				$out .= '<span class="content-image">';
					$out .= wp_get_attachment_image( $img_id, 'landscape-small' );
				$out .= '</span>';
			}
			if ( $type == 'content' ) {
				$out .= '<span class="content-wrap">';
			}
				$out .= '<h4 class="b-header">'. esc_attr( $title ).'</h4>';
				$out .= '<span class="notification-content">'.esc_attr( $content ).'</span>';
				$out .= '<span class="icon-container">';
					$out .= '<i class="icon chevron-right"></i>';
				$out .= '</span>';
				if ( $type == 'content' ) {
					$out .= '</span>';	
				}
			$out .= '</a>';
		$out .= '</div>';

		return $out;
	}
}
