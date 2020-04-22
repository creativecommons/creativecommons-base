<?php
class WP_Widget_Twitter_Timeline extends WP_Widget {
	function __construct()
	{
		$widget_ops  = array(
			'classname'   => 'twitter-timeline',
			'description' => 'Display the Twitter timeline',
		);
		$control_ops = array();
		parent::__construct('twitter-timeline', 'CC Twitter timeline', $widget_ops, $control_ops);
	}

	function widget($args, $instance)
	{
		$url = (!empty($instance['url'])) ?  esc_attr($instance['url']) : 'https://twitter.com/creativecommons';
		$height = (!empty($instance['height'])) ?  esc_attr($instance['height']) : 390;
		echo '<div class="widget twitter">';
		if ( !empty( $instance['title']) ) {
			echo '<h2 class="widget-title">'.esc_attr($instance['title']).'</h2>';
		}
		echo '<div class="widget-content">';
		echo '<a class="twitter-timeline" data-height="'.$height.'" href="'.$url.'?ref_src=twsrc%5Etfw">Tweets by creativecommons</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> ';
		echo '</div>';
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	function form($instance)
	{
		extract($instance);
		echo '<p><label for="' . $this->get_field_id('title') . '">Title: <input type="text" name="' . $this->get_field_name('title') . '" id="' . $this->get_field_id('title') . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id('height') . '">Height: <textarea name="' . $this->get_field_name('height') . '" id="' . $this->get_field_id('height') . '" class="widefat">' . $instance['height'] . '</textarea></label></p>';
		echo '<p><label for="' . $this->get_field_id('url') . '">Twitter url (creativecommons as default": <textarea name="' . $this->get_field_name('url') . '" id="' . $this->get_field_id('url') . '" class="widefat">' . $instance['url'] . '</textarea></label></p>';
	}
}

function cc_twitter_timeline_widget_init()
{
	register_widget('WP_Widget_Twitter_Timeline');
}

add_action('widgets_init', 'cc_twitter_timeline_widget_init');
