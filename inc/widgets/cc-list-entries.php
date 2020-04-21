<?php

class WP_Widget_news extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		$widget_ops = array('classname' => 'widget-news', 'description' => 'Show the last categorized news from the current site');
		$control_ops = array();
		parent::__construct('widget-news', 'CC Last news', $widget_ops, $control_ops);
	}
	function get_last_news($size, $category)
	{
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $size,
			'post_status' => 'publish'
		);
		if (is_single()) {
			global $post;
			$args['post__not_in'] = array($post->ID);
		}
		if (!empty($category)) {
			$args['cat'] = $category;
		}
		$news = new WP_Query($args);
		if ($news->have_posts()) {
			return $news->posts;
		} else {
			return false;
		}
	}
	function widget($args, $instance)
	{
		global $post;
		$size = (!empty($instance['size'])) ? $instance['size'] : 1;
		$the_category = (!empty($instance['category'])) ? $instance['category'] : null;
		$link_text = (!empty($instance['link_text'])) ? $instance['link_text'] : 'More news';
		$news = $this->get_last_news($size, $the_category);
		if (!empty($news)) {
			echo '<div class="widget news">';
			echo '<header class="widget-header">';
			if ($instance['show_title']) {
				echo '<h2 class="widget-title">' . esc_attr( $instance['title'] ) . '</h2>';
			}
			if (!empty($instance['is_link'] && (!empty($instance['category'])))) {
				$link = get_category_link($instance['category']);
				echo '<div class="more-news">';
				echo '<a href="' . $link . '" class="widget-more">' . $link_text . '<i class="icon chevron-right"></i></a>';
				echo '</div>';
			}
			echo '</header>';
			echo '<div class="widget-content">';
			foreach ($news as $item) {
				echo Components::simple_entry( $item->ID, false, true );
			}
			echo '</div>';	
			echo '</div>';
		}
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	function form($instance)
	{
		extract($instance);
		echo '<p><label for="' . $this->get_field_id('title') . '">Title: <input type="text" name="' . $this->get_field_name('title') . '" id="' . $this->get_field_id('title') . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_name('show_title') . '">Show title? </label><input type="checkbox" id="' . $this->get_field_id('show_title') . '"' . ((!empty($show_title)) ? ' checked="checked" ' : '') . ' name="' . $this->get_field_name('show_title') . '" value="1"></p>';
		echo '<p><label for="' . $this->get_field_name('is_link') . '">Link to news archive? </label><input type="checkbox" id="' . $this->get_field_id('is_link') . '"' . ((!empty($is_link)) ? ' checked="checked" ' : '') . ' name="' . $this->get_field_name('is_link') . '" value="1"></p>';
		echo '<p><label for="' . $this->get_field_id('link_text') . '">Link text: <input type="text" name="' . $this->get_field_name('link_text') . '" id="' . $this->get_field_id('link_text') . '" value="' . $instance['link_text'] . '" class="widefat"/></label></p>';
		echo '<p><label for="' . $this->get_field_id('size') . '">Entries number: <input type="number" name="' . $this->get_field_name('size') . '" id="' . $this->get_field_id('size') . '" value="' . $instance['size'] . '"/></label></p>';
		echo '<p><label for="' . $this->get_field_id('category') . '">Category: ';
		wp_dropdown_categories(array('show_option_none' => 'Select', 'selected' => $instance['category'], 'class' => 'widefat', 'name' => $this->get_field_name('category'), 'id' => $this->get_field_id('category')));
		echo '</label></p>';
	}
}

function cc_text_news_widget_init()
{
	register_widget('WP_Widget_news');
}

add_action('widgets_init', 'cc_text_news_widget_init');
