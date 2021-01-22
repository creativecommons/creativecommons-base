<?php

class WP_Widget_org_news extends WP_Widget {
	const CATEGORIES_URL   = 'https://creativecommons.org/wp-json/wp/v2/categories';
	const TAGS_URL         = 'https://creativecommons.org/wp-json/wp/v2/tags';
	const ENTRIES_URL      = 'https://creativecommons.org/wp-json/wp/v2/posts';
	const MEDIA_URL        = 'https://creativecommons.org/wp-json/wp/v2/media';
	const USERS_URL        = 'https://creativecommons.org/wp-json/wp/v2/users';
	const TRANSIENT_PREFIX = 'cc_widget_org_news_';
	const CC_ORG_BLOG_URL  = 'https://creativecommons.org/blog';

	public $per_page_categories = 50;

	/** constructor */
	function __construct() {
		$widget_ops  = array(
			'classname'   => 'widget-org-news',
			'description' => 'Show the latest categorized news from the main CC website',
		);
		$control_ops = array();
		parent::__construct( 'widget-org-news', 'CC Org Last news', $widget_ops, $control_ops );
	}
	public function query_api( $url ) {
		$response  = wp_remote_get( $url );
		$http_code = wp_remote_retrieve_response_code( $response );
		if ( $http_code == 200 ) {
			$api_response = json_decode( wp_remote_retrieve_body( $response ) );
			return $api_response;
		} else {
			return false;
		}
	}
	function get_last_news( $size, $category, $tag ) {
		if ( false === ( $get_entries = get_transient( self::TRANSIENT_PREFIX . $this->id . '_entries' ) ) ) {
			$entries_url = self::ENTRIES_URL . '?per_page=' . $size;
			if ( ! empty( $category ) ) {
				$entries_url .= '&categories=' . $category;
			}
			if ( ! empty( $tag ) ) {
				$entries_url .= '&tags=' . $tag;
			}

			$get_entries = $this->query_api( $entries_url );
			if ( ! empty( $get_entries ) ) {
				$modified_entries = array();
				foreach ( $get_entries as $entry ) {
					if ( ! empty( $entry->featured_media ) ) {
						$api_response = $this->query_api( self::MEDIA_URL . '/' . $entry->featured_media );
						$author_query = $this->query_api( self::USERS_URL . '/' . $entry->author );
						if ( ! empty( $api_response ) ) {
							$entry->featured_media_url      = $api_response->media_details->sizes->cc_list_post_thumbnail->source_url;
							$entry->featured_media_url_full = $api_response->media_details->sizes->full->source_url;
						}
						if ( ! empty( $author_query )) {
							$entry->author_data = $author_query;
						}
					}
					$modified_entries[] = $entry;
				}
				$get_entries = $modified_entries;
				set_transient( self::TRANSIENT_PREFIX . $this->id . '_entries', $get_entries, HOUR_IN_SECONDS );
			}
		}
		return $get_entries;
	}
	function get_ccorg_categories() {
		if ( false === ( $get_categories = get_transient( self::TRANSIENT_PREFIX . $this->id . '_categories' ) ) ) {
			$api_response = $this->query_api( self::CATEGORIES_URL . '?per_page=' . $this->per_page_categories );
			foreach ( $api_response as $category ) {
				$get_categories[ $category->id ] = array(
					'name' => $category->name,
					'link' => $category->link,
				);
			}
			set_transient( self::TRANSIENT_PREFIX . 'categories', $get_categories, HOUR_IN_SECONDS );
		}
		return $get_categories;
	}
	function get_tag_id( $tag_slug ) {
		$api_response = $this->query_api( self::TAGS_URL . '?slug=' . $tag_slug );
		if ( ! empty( $api_response ) ) {
			return $api_response[0]->id;
		}
	}
	function widget( $args, $instance ) {
		global $post;
		$size         = ( ! empty( $instance['size'] ) ) ? $instance['size'] : 3;
		$the_category = ( ! empty( $instance['category'] ) ) ? $instance['category'] : null;
		$link_text    = ( ! empty( $instance['link_text'] ) ) ? $instance['link_text'] : 'More news';
		$tag          = ( ! empty( $instance['tag_id'] ) ) ? $instance['tag_id'] : false;
		$news         = $this->get_last_news( $size, $the_category, $tag );
		$categories   = $this->get_ccorg_categories();
		if ( ! empty( $news ) ) {
			echo '<div class="widget news">';
			echo '<header class="widget-header">';
			if ( $instance['show_title'] ) {
				echo '<h2 class="widget-title">' . esc_attr( $instance['title'] ) . '</h2>';
			}
			if ( ! empty( $instance['is_link'] && ( ! empty( $instance['category'] ) ) ) ) {
				$link = ! empty( $instance['category'] ) ? $categories[ $instance['category'] ] : self::CC_ORG_BLOG_URL;
				echo '<div class="more-news">';
				echo '<a href="' . $link['link'] . '" class="widget-more" target="_blank">' . $link_text . '<i class="icon chevron-right"></i></a>';
				echo '</div>';
			}
			echo '</header>';
			echo '<div class="widget-content">';
			foreach ( $news as $item ) {
				$thumb_url = ( ! empty( $item->featured_media ) ) ? $item->featured_media_url : '';
				echo Components::simple_entry( $item->ID, false, true, true, $item->title->rendered, $thumb_url, $item->date, $item->link, $item->excerpt->rendered );
			}
			echo '</div>';
			echo '</div>';
		}
	}

	function update( $new_instance, $old_instance ) {
		if ( ! empty( $new_instance['tag'] ) ) {
			$new_instance['tag_id'] = $this->get_tag_id( $new_instance['tag'] );
			if ( ! empty( $new_instance['tag_id'] ) ) {
				$new_instance['tag_remote_exists'] = 1;
			} else {
				$new_instance['tag_remote_exists'] = 0;
			}
		}
		delete_transient( self::TRANSIENT_PREFIX . $this->id . '_categories' );
		delete_transient( self::TRANSIENT_PREFIX . $this->id . '_entries' );
		delete_transient( self::TRANSIENT_PREFIX . '_thumbnails' );
		return $new_instance;
	}

	function form( $instance ) {
		extract( $instance );
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_name( 'show_title' ) . '">Show title? </label><input type="checkbox" id="' . $this->get_field_id( 'show_title' ) . '"' . ( ( ! empty( $show_title ) ) ? ' checked="checked" ' : '' ) . ' name="' . $this->get_field_name( 'show_title' ) . '" value="1"></p>';
		echo '<p><label for="' . $this->get_field_name( 'is_link' ) . '">Link to news archive? </label><input type="checkbox" id="' . $this->get_field_id( 'is_link' ) . '"' . ( ( ! empty( $is_link ) ) ? ' checked="checked" ' : '' ) . ' name="' . $this->get_field_name( 'is_link' ) . '" value="1"></p>';
		echo '<p><label for="' . $this->get_field_id( 'link_text' ) . '">Link text: <input type="text" name="' . $this->get_field_name( 'link_text' ) . '" id="' . $this->get_field_id( 'link_text' ) . '" value="' . $instance['link_text'] . '" class="widefat"/></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'size' ) . '">Entries number: <input type="number" name="' . $this->get_field_name( 'size' ) . '" id="' . $this->get_field_id( 'size' ) . '" value="' . $instance['size'] . '"/></label></p>';
		$tag_error = ( ! $instance['tag_remote_exists'] ) ? '<small style="color:red;">The tag doesn\'t seems to exists in the source website</small>' : '';
		echo '<p><label for="' . $this->get_field_id( 'tag' ) . '">Tag slug: <input type="text" name="' . $this->get_field_name( 'tag' ) . '" id="' . $this->get_field_id( 'tag' ) . '" value="' . $instance['tag'] . '"/></label>' . $tag_error . '</p>';
		echo '<input type="hidden" name="' . $this->get_field_name( 'tag_id' ) . ' value="' . $instance['tag_id'] . '"/>';
		echo '<input type="hidden" name="' . $this->get_field_name( 'tag_remote_exists' ) . ' value="' . $instance['tag_remote_exists'] . '"/>';
		echo '<p><label for="' . $this->get_field_id( 'category' ) . '">Category: ';
		$get_categories = $this->get_ccorg_categories();
		echo '<p><select name="' . $this->get_field_name( 'category' ) . '" id="' . $this->get_field_id( 'category' ) . '">';
		foreach ( $get_categories as $key => $category ) {
			$selected = ( $key == $instance['category'] ) ? 'selected = "selected" ' : '';
			echo '<option value="' . $key . '" ' . $selected . '>' . $category['name'] . '</option>';
		}
		echo '</select>';
		echo '</label></p>';
	}
}

function cc_text_news_org_widget_init() {
	register_widget( 'WP_Widget_org_news' );
}

add_action( 'widgets_init', 'cc_text_news_org_widget_init' );
