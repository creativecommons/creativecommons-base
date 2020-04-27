<?php
class WP_Widget_Twitter_Timeline extends WP_Widget {
	function __construct() {
		$widget_ops  = array(
			'classname'   => 'twitter-timeline',
			'description' => 'Display the Twitter timeline',
		);
		$control_ops = array();
		parent::__construct( 'twitter-timeline', 'CC Twitter timeline', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		$url        = ( ! empty( $instance['url'] ) ) ? esc_attr( $instance['url'] ) : 'https://twitter.com/creativecommons';
		$height     = ( ! empty( $instance['height'] ) ) ? esc_attr( $instance['height'] ) : 390;
		$has_border = ( $instance['has_border'] ) ? ' has-border' : '';
		echo '<div class="widget twitter' . $has_border . '">';
		if ( ! empty( $instance['title'] ) ) {
			echo '<h2 class="widget-title">' . esc_attr( $instance['title'] ) . '</h2>';
		}
		echo '<div class="widget-content">';
		echo '<a class="twitter-timeline" data-height="' . $height . '" href="' . $url . '?ref_src=twsrc%5Etfw">Tweets by creativecommons</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> ';
		echo '</div>';
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		extract( $instance );
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'height' ) . '">Height: <input type="text" name="' . $this->get_field_name( 'height' ) . '" id="' . $this->get_field_id( 'height' ) . '" value="' . $instance['height'] . '" class="widefat" /><br><small>Timeline height</small></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'url' ) . '">Twitter Url: <input type="text" name="' . $this->get_field_name( 'url' ) . '" id="' . $this->get_field_id( 'url' ) . '" value="' . $instance['url'] . '" class="widefat" /><br><small>Timeline account URL to point the timeline (default: https://twitter.com/creativecommons.org)</small></label></p>';
		echo '<p><label for="' . $this->get_field_name( 'has_border' ) . '">Add border? </label><input type="checkbox" id="' . $this->get_field_id( 'has_border' ) . '"' . ( ( ! empty( $instance['has_border'] ) ) ? ' checked="checked" ' : '' ) . ' name="' . $this->get_field_name( 'has_border' ) . '" value="1"></p>';
	}
}

function cc_twitter_timeline_widget_init() {
	register_widget( 'WP_Widget_Twitter_Timeline' );
}

add_action( 'widgets_init', 'cc_twitter_timeline_widget_init' );
