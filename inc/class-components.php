<?php

/**
 * CC Vocabulary components : Components
 *
 * This file contains a component class to work with CC Vocabulary components.
 *
 * @link https://github.com/creativecommons/creativecommons-base
 * @link https://github.com/creativecommons/vocabulary
 *
 * @package WordPress
 * @subpackage creativecommons-base
 * @since 2020.04.1
 */

/**
 * Vocabulary components
 *
 * Class to handle CC Vocabulary components
 *
 *  @since 2020.04.1
 */
class Components
{

	/**
	 * Genereic card post and its variants
	 *
	 * @param int     $post_id : post or entry id.
	 * @param boolean $use_post_data : whether to use data from a post ID
	 * @param boolean $show_image : whether to show or not the image.
	 * @param boolean $is_stretch : Should the top image be stretched to fit container.
	 * @param boolean $is_video : is the post a video.
	 * @param boolean $has_button : should we show the action button?.
	 * @param boolean $has_border : should we show the border of the card?.
	 * @param boolean $has_content : should we show the except of the entry?.
	 * @param string  $pre_title : string showed before the title.
	 * @param string  $description : content of the card if it's not using post data.
	 * @param string  $url : url of card if it's not using post data.
	 * @param string  $title : title of the card if it's not using post data.
	 * @param string  $date : date format of the card if it's not using post data.
	 * @param int     $image_id : image id of the card if it's not using post data.
	 * @param string  $direction : direction of the card `horizontal` or `vertical`.
	 * @param string  $button_text : text of the button.
	 * @param string  $button_size : size of the button big|small|tiny
	 * @param string  $button_color : color of the button is_primary|donate|is-success|is-info|.is-warning|.is-danger
	 * @return string component layout
	 */
	public static function card_post(
		$post_id = false,
		$use_post_data = false,
		$show_image = true,
		$is_stretch = true,
		$is_video = false,
		$has_button = true,
		$has_border = true,
		$has_content = true,
		$pre_title = false,
		$description = false,
		$url = false,
		$title = false,
		$date = false,
		$image_id = false,
		$direction = 'horizontal',
		$button_text = false,
		$button_size = false,
		$button_color = false
	) {
		$card_image   = ($use_post_data) ? get_the_post_thumbnail($post_id, 'landscape-medium') : wp_get_attachment_image($image_id, 'landscape-medium');
		$card_title    = ($use_post_data) ? get_the_title($post_id) : $title;
		$card_url      = ($use_post_data) ? get_permalink($post_id) : $url;
		$card_date     = ($use_post_data) ? get_the_date(CC_Site::get_date_format(), $post_id) : $date;
		$card_border   = ($has_border) ? '' : ' no-border ';
		$button_color  = ($button_color) ? $button_color : 'is-primary';
		$button_size   = ($button_size) ? $button_size : 'big';
		$button_text   = (!empty($button_text)) ? $button_text : 'Read More';
		$strecth_class = ($is_stretch) ? ' is_stretched' : '';
		$button_class  = ($has_button) ? ' with-button' : '';

		$out = '<article class="card entry-post ' . $direction . $card_border . '">';
		if (($use_post_data && has_post_thumbnail($post_id) && $show_image) || (!$use_post_data && !empty($image_id) && $show_image)) {
			$out .= '<header class="card-image' . $strecth_class . '">';
			$out .= '<figure class="image is-4by3">';
			$out .= $card_image;
			$out .= '</figure>';
			$out .= '</header>';
		}

		$out .= '<div class="card-content ' . $button_class . '">';
		if (!empty($pre_title)) {
			$out .= '<span class="pre-title">' . $pre_title . '</span>';
		}
		$out .= '<h4 class="card-title"><a href="' . $card_url . '">' . $card_title . '</a></h4>';
		if (!$is_video && !empty($card_date) & $date) {
			$out .= '<span class="subtitle"> ' . $card_date . ' </span>';
		}
		if ($has_content) {
			$the_post         = ($use_post_data) ? get_post($post_id) : false;
			$the_description  = ($use_post_data) ? do_excerpt($the_post, array('length' => 110)) : $description;
			$filtered_content = apply_filters('cc_theme_base_filter_card_content', $the_description, $post_id);
			$out             .= '<div class="content">';
			$out             .= $filtered_content;
			$out             .= '</div>';
		}
		if ($has_button) {
			$out .= self::button($button_text, $card_url, $button_size, $button_color);
		}
		$out .= '</div>';
		$out .= '</article>';

		return $out;
	}
	/**
	 * Card post event. It tooks the size of the container
	 *
	 * @param int     $post_id : post or entry id.
	 * @param boolean $has_content : should we show the except of the entry?.
	 * @return string component layout
	 */
	public static function card_post_event($post_id, $has_content = true)
	{
		$out .= '<article class="card entry-post entry-event horizontal">';
		$out .= '<header class="card-header">';
		$out .= '<div class="card-date">';
		$out .= '<span class="month">' . get_the_date('F', $post_id) . '</span>';
		$out .= '<span class="day">' . get_the_date('d', $post_id) . '</span>';
		$out .= '<span class="year">' . get_the_date('Y', $post_id) . '</span>';
		$out .= '</div>';
		$out .= '</header>';
		$out .= '<div class="card-content">';
		$out .= '<h4 class="card-title"><a href="' . get_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h4>';
		if ($has_content) {
			$the_post         = get_post($post_id);
			$entry_content    = do_excerpt($the_post);
			$filtered_content = apply_filters('cc_theme_base_filter_card_event_content', $entry_content, $post_id);
			$out             .= '<div class="content">';
			$out             .= $filtered_content;
			$out             .= '</div>';
		}
		$out .= '<a href="' . get_permalink($post_id) . '" class="read-more">Read more <i class="icon chevron-right"></i></a>';
		$out .= '</div>';
		$out .= '</article>';

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
	public static function card_statistic($post_id, $number, $caption, $caption_is_title = true, $has_content = true, $has_link = true)
	{
		$caption = ($caption_is_title) ? get_the_title($post_id) : $caption;
		$out    .= '<article class="card entry-post entry-statistic">';
		$out    .= '<header class="card-header">';
		$out    .= '<div class="card-statistic">';
		$out    .= '<span class="number">' . $number . '</span>';
		$out    .= '<span class="caption">' . $caption . '</span>';
		$out    .= '</div>';
		$out    .= '</header>';
		$out    .= '<div class="card-content">';
		if ($has_content) {
			$the_post         = get_post($post_id);
			$entry_content    = do_excerpt($the_post);
			$filtered_content = apply_filters('cc_theme_base_filter_card_event_content', $entry_content, $post_id);
			$out             .= '<div class="content">';
			$out             .= $filtered_content;
			$out             .= '</div>';
		}
		if ($has_link) {
			$out .= '<a href="' . get_permalink($post_id) . '" class="read-more">Read more</a>';
		}
		$out .= '</div>';
		$out .= '</article>';

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
	public static function card_quote($post_id, $show_image = true, $author_name, $author_description)
	{
		$out .= '<article class="card entry-post entry-quote horizontal no-border">';
		if (has_post_thumbnail($post_id) && $show_image) {
			$out .= '<header class="card-image">';
			$out .= '<figure class="image is-1by1">';
			$out .= get_the_post_thumbnail($post_id, 'thumbnail');
			$out .= '</figure>';
			$out .= '</header>';
		}
		$out             .= '<div class="card-content">';
		$out             .= '<span class="quote"></span>';
		$the_post         = get_post($post_id);
		$entry_content    = apply_filters('the_content', $the_post->post_content);
		$filtered_content = apply_filters('cc_theme_base_filter_card_quote_content', $entry_content, $post_id);
		$out             .= '<div class="content">';
		$out             .= $filtered_content;
		$out             .= '<div class="quote-author">';
		$out             .= '<strong class="title"> ' . $author_name . '</strong>';
		$out             .= '<p class="description">' . $author_description . '</p>';
		$out             .= '</div>';
		$out             .= '</div>';
		$out             .= '</div>';
		$out             .= '</article>';

		return $out;
	}
	/**
	 * Card quote.
	 *
	 * @param int    $post_id : attachment image id
	 * @param string $url : optional URL for card title.
	 * @return string component layout
	 */
	public static function card_image($post_id, $url = false)
	{
		$out     .= '<article class="card entry-post entry-image vertical">';
		$out     .= '<header class="card-image">';
		$out     .= '<figure class="image is-4by5">';
		$out     .= wp_get_attachment_image($post_id, 'landscape-medium');
		$out     .= '</figure>';
		$out     .= '</header>';
		$out     .= '<div class="card-content">';
		$the_post = get_post($post_id);
		$out     .= '<h4 class="card-title">';
		if ($url) {
			$out .= '<a href="' . esc_url($url) . '">';
		}
		$out .= get_the_title($post_id);
		if ($url) {
			$out .= '</a>';
		}
		$out .= '</h4>';
		$out .= '<span class="subtitle">' . esc_attr($the_post->post_exerpt) . '</span>';
		$out .= '</div>';
		$out .= '</article>';

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
	public static function card_link($post_id = null, $use_post_data = false, $background_color, $title = null, $description = null, $link_text = null, $url = null, $has_content = true, $has_border = false, $has_link = true, $extra_class = false)
	{
		$the_title     = ($use_post_data) ? get_the_title($post_id) : $title;
		$the_url       = ($use_post_data) ? get_permalink($post_id) : $url;
		$the_link_text = ($use_post_data) ? 'Read more' : esc_attr($link_text);
		$border_class  = (!$has_border) ? ' no-border' : '';
		$color_class   = (!$has_border) ? 'class="has-background-' . $background_color . '"' : '';
		$class         = (!empty($extra_class)) ? ' ' . $extra_class : '';

		$out  = '<article class="card entry-post link ' . $border_class . $class . '">';
		$out .= '<a href="' . $the_url . '" ' . $color_class . '>';
		$out .= '<span class="card-content has-bottom-link">';
		$out .= '<h2 class="card-title">' . $the_title . '</h2>';
		if ($has_content) {
			if ($use_post_data) {
				$the_post         = get_post($post_id);
				$get_content      = do_excerpt($the_post);
				$filtered_content = apply_filters('cc_theme_base_filter_card_link_content', $get_content, $post_id);
				$the_content      = $filtered_content;
			} else {
				$filtered_content = apply_filters('cc_theme_base_filter_card_link_content', $description, $post_id);
				$the_content      = $filtered_content;
			}
			$out .= '<span class="content">' . esc_attr($description) . '</span>';
		}
		if ($has_link) {
			$out .= '<span class="link-arrow">' . $the_link_text . '</span>';
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
	public static function button($text, $url, $size, $color, $new_tab = false, $icon = false)
	{
		$size_class   = (!empty($size)) ? $size : '';
		$color_class  = (!empty($color)) ? $color : '';
		$open_new_tab = ($new_tab) ? ' target="_blank"' : '';
		$icon         = (!empty($icon)) ? '<i class="icon ' . $icon . ' margin-right-small is-size-5 padding-top-smaller"></i> ' : '';

		$out = '';
		if (!empty($text) && !empty($url)) {
			$out .= '<a href="' . $url . '" class="button ' . $size_class . ' ' . $color_class . '"' . $open_new_tab . '>' . $icon . $text . '</a>';
		}
		return $out;
	}
	/**
	 * Notification
	 *
	 * @param string $type : Type of notification content|warning
	 * @param string $url : Notification url.
	 * @param string $title : Notification title.
	 * @param string $content : Notification content.
	 * @param int    $img_id : Entry Id for image
	 * @return string component layout
	 */
	public static function notification($type = 'warning', $url, $title, $content, $img_id = null)
	{
		$out .= '<div class="notification ' . $type . '">';
		$out .= '<a href="' . esc_url($url) . '" class="notification-container">';
		if (($type == 'content') && (!empty($img_id))) {
			$out .= '<span class="content-image">';
			$out .= wp_get_attachment_image($img_id, 'landscape-small');
			$out .= '</span>';
		}
		if ($type == 'content') {
			$out .= '<span class="content-wrap">';
		}
		$out .= '<h4 class="b-header">' . esc_attr($title) . '</h4>';
		$out .= '<span class="notification-content">' . esc_attr($content) . '</span>';
		$out .= '<span class="icon-container">';
		$out .= '<i class="icon chevron-right"></i>';
		$out .= '</span>';
		if ($type == 'content') {
			$out .= '</span>';
		}
		$out .= '</a>';
		$out .= '</div>';

		return $out;
	}
	/**
	 * Simple entry
	 *
	 * @param int     $post_id : post or entry ID.
	 * @param boolean $has_content : whether to show or not the content excerpt.
	 * @param boolean $has_image : whether to show or not the entry thumbnail.
	 * @param boolean $use_remote_data : whether to use or not remote data providing each element separatedly
	 * @param string  $title : the title of the entry
	 * @param string  $image_url : the url of the entry featured image
	 * @param string  $date : the date of the entry
	 * @param string  $permalink : the permalink of the entry
	 * @param string  $excerpt : the excerpt of the entry
	 * @return string component layout
	 */
	public static function simple_entry($post_id, $has_content = true, $has_image = true, $use_remote_data = null, $title = null, $image_url = null, $date = null, $permalink = null, $excerpt = null, $is_last_post = false)
	{
		$has_thumb       = (!$use_remote_data) ? has_post_thumbnail($post_id) : !empty($image_url);
		$has_thumb_class = (!empty($has_thumb)) ? ' has-image' : '';
		$external        = ($use_remote_data) ? ' target="_blank" ' : '';
		$out             = '<article class="entry-simple-post mt-2 is-align-content-end' . $has_thumb_class . '">';
		$out            .= '<div class="columns is-gapless">';
		$out            .= '<figure class="entry-image column m-2 is-4">';

		if ($has_thumb && $has_image) {
			$thumb_image = (!$use_remote_data) ? get_the_post_thumbnail($post_id, 'landscape-small') : '<img src="' . $image_url . '" alt="' . $title . '" />';
			$out        .= $thumb_image;
		}
		$out          .= '</figure>';

		$title         = (!$use_remote_data) ? get_the_title($post_id) : $title;
		$the_title     = empty($title) ? "No title" : $title;
		$the_permalink = (!$use_remote_data) ? get_permalink($post_id) : $permalink;
		$the_date      = (!$use_remote_data) ? get_the_date('d F Y') : mysql2date('d F Y', $date);
		$out          .= '<div class="entry-content column">';
		$out          .= '<h4 class="b-header"><a href="' . $the_permalink . '"' . $external . '>' . $the_title . '</a></h4>';
		if ($has_content) {
			$the_post    = get_post($post_id);
			$the_excerpt = (!$use_remote_data) ? do_excerpt($the_post) : $excerpt;
			$out        .= '<div class="entry-description">';
			$out        .= $the_excerpt;
			$out        .= '</div>';
		}
		$out       .= '<span class="has-text-weight-bold">' . $the_date . '</span>';
		$categories = wp_get_post_categories($post_id, array('fields' => 'names'));

		if (!empty($categories)) {
			$out       .= '<div>';
			foreach ($categories as $category) {
				$out   .= '<button class="button secondary is-small">' . $category . '</button>';
			}
			$out     .= '</div>';
		}

		$out       .= '</div>';
		$out       .= '</div>';
		if (!$is_last_post) {
			$out   .= '<hr class="divider"/>';
		}
		$out       .= '</article>';
		return $out;
	}
	/**
	 * cc_logos
	 *
	 * @param string  $logo_name lettermark|letterheart
	 * @param boolean $has_dark_background
	 * @return void
	 */
	public static function cc_logos($logo_name = 'cc/logomark.svg#logomark', $has_dark_background = false)
	{
		$out = '';
		if ($has_dark_background) {
			$out .= '<div class="has-text-white">';
		}
		$default_image_size = '304 73';
		$image_size         = apply_filters('cc_theme_base_set_default_size_logo', $default_image_size);
		$out               .= '<svg';
		$out           .= ' class="logo"';
		$out           .= ' xmlns="http://www.w3.org/2000/svg"';
		$out           .= ' preserveAspectRatio="xMidyMid meet"';
		$out           .= ' viewBox="0 0 ' . $image_size . '">';
		$out           .= ' <use href="' . get_bloginfo('template_directory') . '/assets/img/logos/' . $logo_name . '"></use>';
		$out               .= '</svg>';
		if ($has_dark_background) {
			$out .= '</div>';
		}
		return $out;
	}
}
