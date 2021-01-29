<?php
class WP_Widget_Card extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'   => 'cc-card',
			'description' => 'Shows a card in differents formats',
		);
		$control_ops = array();
		parent::__construct( 'cc-card', 'CC Card', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		$url           = ( ! empty( $instance['url'] ) ) ? esc_url( $instance['url'] ) : '#';
		$has_border    = ( !empty($instance['has_border']) ) ? true : false;
		$is_video      = ( !empty($instance['is_video']) ) ? true : false;
		$has_button    = ( !empty($instance['has_button']) ) ? true : false;
		$stretch_image = ( !empty($instance['stretch_image']) ) ? true : false;
		$direction     = ( !empty($instance['direction']) ) ? $instance['direction'] : 'horizontal';
		$format        = ( !empty($instance['type']) ) ? $instance['type'] : 'card-post';
		$button_size   = ( !empty($instance['button-size']) ) ? $instance['button-size'] : 'small';
		$button_color  = ( !empty($instance['color']) ) ? $instance['color'] : 'is-primary';
		echo '<div class="widget card">';
			echo Components::card_post( false, false, true, $stretch_image, $is_video, $has_button, $has_border, true, $instance['pre-title'], $instance['description'], $url, $instance['title'], false, $instance['attachment_id'], $direction, $instance['button_text'], $button_size, $button_color );
		echo '</div>';
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		echo '<p><label for="' . $this->get_field_id( 'pre-title' ) . '">Pre Title: <input type="text" name="' . $this->get_field_name( 'pre-title' ) . '" id="' . $this->get_field_id( 'pre-title' ) . '" value="' . $instance['pre-title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'description' ) . '">Description: <textarea name="' . $this->get_field_name( 'description' ) . '" id="' . $this->get_field_id( 'description' ) . '" class="widefat">' . $instance['description'] . '</textarea></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'url' ) . '">Url: <input type="text" name="' . $this->get_field_name( 'url' ) . '" id="' . $this->get_field_id( 'url' ) . '" value="' . $instance['url'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'button_text' ) . '">Button text: <input type="text" name="' . $this->get_field_name( 'button_text' ) . '" id="' . $this->get_field_id( 'button_text' ) . '" value="' . $instance['button_text'] . '" class="widefat" /></label></p>';
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
		echo '<p><label for="' . $this->get_field_name( 'has_border' ) . '">Add border? </label><input type="checkbox" id="' . $this->get_field_id( 'has_border' ) . '"' . ( ( ! empty( $instance['has_border'] ) ) ? ' checked="checked" ' : '' ) . ' name="' . $this->get_field_name( 'has_border' ) . '" value="1"></p>';
		echo '<p><label for="' . $this->get_field_name( 'is_video' ) . '">Is Video? </label><input type="checkbox" id="' . $this->get_field_id( 'is_video' ) . '"' . ( ( ! empty( $instance['is_video'] ) ) ? ' checked="checked" ' : '' ) . ' name="' . $this->get_field_name( 'is_video' ) . '" value="1"></p>';
		echo '<p><label for="' . $this->get_field_name( 'stretch_image' ) . '">Stretch image? </label><input type="checkbox" id="' . $this->get_field_id( 'stretch_image' ) . '"' . ( ( ! empty( $instance['stretch_image'] ) ) ? ' checked="checked" ' : '' ) . ' name="' . $this->get_field_name( 'stretch_image' ) . '" value="1"></p>';
		echo '<p><label for="' . $this->get_field_name( 'has_button' ) . '">Show button? </label><input type="checkbox" id="' . $this->get_field_id( 'has_button' ) . '"' . ( ( ! empty( $instance['has_button'] ) ) ? ' checked="checked" ' : '' ) . ' name="' . $this->get_field_name( 'has_button' ) . '" value="1"></p>';
		echo '<p><label>Direction: </label>';
		echo '<select class="widefat" id="' . $this->get_field_id( 'direction' ) . '" name="' . $this->get_field_name( 'direction' ) . '">';
		echo '<option value="">Select direction</option>';
		echo '<option value="horizontal" ' . ( ( $instance['direction'] == 'horizontal' ) ? 'selected="selected"' : '' ) . '>Horizontal</option>';
		echo '<option value="vertical" ' . ( ( $instance['direction'] == 'vertical' ) ? 'selected="selected"' : '' ) . '>Vertical</option>';
		echo '</select>';
		echo '</p>';
		echo '<p><label>Button size: </label>';
		echo '<select class="widefat" id="' . $this->get_field_id( 'button-size' ) . '" name="' . $this->get_field_name( 'button-size' ) . '">';
		echo '<option value="">Select size</option>';
		echo '<option value="big"' . ( ( $instance['button-size'] == 'big' ) ? 'selected="selected"' : '' ) . '>Big</option>';
		echo '<option value="small" ' . ( ( $instance['button-size'] == 'small' ) ? 'selected="selected"' : '' ) . '>Small</option>';
		echo '<option value="tiny" ' . ( ( $instance['button-size'] == 'tiny' ) ? 'selected="selected"' : '' ) . '>Tiny</option>';
		echo '</select>';
		echo '</p>';
		echo '<p><label>Button color: </label>';
		echo '<select class="widefat" id="' . $this->get_field_id( 'color' ) . '" name="' . $this->get_field_name( 'color' ) . '">';
		echo '<option value="">Select color</option>';
		echo '<option value="is-primary"' . ( ( $instance['color'] == 'is-primary' ) ? 'selected="selected"' : '' ) . '>Primary</option>';
		echo '<option value="is-donate" ' . ( ( $instance['color'] == 'is-donate' ) ? 'selected="selected"' : '' ) . '>Donate</option>';
		echo '<option value="is-info" ' . ( ( $instance['color'] == 'is-info' ) ? 'selected="selected"' : '' ) . '>info</option>';
		echo '<option value="is-warning" ' . ( ( $instance['color'] == 'is-warning' ) ? 'selected="selected"' : '' ) . '>Warning</option>';
		echo '<option value="is-danger" ' . ( ( $instance['color'] == 'is-danger' ) ? 'selected="selected"' : '' ) . '>Danger</option>';
		echo '<option value="dark-turquoise" ' . ( ( $instance['color'] == 'dark-turquoise' ) ? 'selected="selected"' : '' ) . '>Dark Turnquoise</option>';
		echo '<option value="dark-slate-blue" ' . ( ( $instance['color'] == 'dark-slate-blue' ) ? 'selected="selected"' : '' ) . '>Dark Slate Blue</option>';
		echo '</select>';
		echo '</p>';
	}
}

function cc_card_widget_init() {
	register_widget( 'WP_Widget_Card' );
}

add_action( 'widgets_init', 'cc_card_widget_init' );
