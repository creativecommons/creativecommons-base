<?php
class WP_Widget_Notification extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'   => 'cc-notification',
			'description' => 'Shows a notification',
		);
		$control_ops = array();
		parent::__construct( 'cc-notification', 'CC Notification', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		$url = ( ! empty( $url ) ) ? $instance['url'] : '#';
		echo Components::notification( $instance['type'], $url, $instance['title'], $instance['description'], $instance['attachment_id'] );
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'description' ) . '">Description: <textarea name="' . $this->get_field_name( 'description' ) . '" id="' . $this->get_field_id( 'description' ) . '" class="widefat">' . $instance['description'] . '</textarea></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'url' ) . '">Url: <input type="text" name="' . $this->get_field_name( 'url' ) . '" id="' . $this->get_field_id( 'url' ) . '" value="' . $instance['url'] . '" class="widefat" /></label></p>';
		echo '<h3>Image</h3>';
		echo '<p>';
		$img_selected = '';
		if ( ! empty( $instance['attachment_id'] ) ) {
			$img_selected = '<img src="' . wp_get_attachment_thumb_url( $instance['attachment_id'] ) . '" width="150">';
		}
		echo '<div>' . $img_selected . '</div>';
		echo '<a href="#" id="' . $this->get_field_id( 'attach_button' ) . '" onClick="bindEventWidgetImage(this.id);return false;" data-targetid="' . $this->get_field_id( 'attachment_id' ) . '" data-button-text="Select" data-uploader-title="Select widget image" class="button widget_custom_media_upload">Upload image</a>';
		echo '<input type="hidden" id="' . $this->get_field_id( 'attachment_id' ) . '" name="' . $this->get_field_name( 'attachment_id' ) . '" value="' . $instance['attachment_id'] . '">';
		echo '</p>';
		echo '<h3>Display</h3>';
		echo '<p><label>Notification format: </label>';
		echo '<select class="widefat" id="' . $this->get_field_id( 'type' ) . '" name="' . $this->get_field_name( 'type' ) . '">';
		echo '<option value="">Select format</option>';
		echo '<option value="warning" ' . ( ( $instance['type'] == 'warning' ) ? 'selected="selected"' : '' ) . '>Warning</option>';
		echo '<option value="content" ' . ( ( $instance['type'] == 'content' ) ? 'selected="selected"' : '' ) . '>Content</option>';
		echo '</select>';
		echo '</p>';
	}
}

function cc_notification_widget_init() {
	register_widget( 'WP_Widget_Notification' );
}

add_action( 'widgets_init', 'cc_notification_widget_init' );
