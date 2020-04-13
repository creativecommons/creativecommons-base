<?php
class WP_Widget_text_banner_simple extends WP_Widget {
	/** constructor */
	function __construct() {
		$widget_ops  = array(
			'classname'   => 'text-banner',
			'description' => 'Shows a simple text banner with link',
		);
		$control_ops = array();
		parent::__construct( 'text-banner', 'CC Text banner', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		$color               = ( ! empty( $instance['color'] ) ) ? $instance['color'] : 'tomato';
				$content     = ( $instance['has_content'] ) ? $instance['description'] : '';
				$link_text   = ( $instance['has_link'] ) ? $instance['link-text'] : '';
				$has_border  = ( ! $instance['has_border'] ) ? false : true;
				$extra_class = ( ! empty( $spaces ) ) ? 'use-' . $spaces . '-cols' : '';
				echo Components::card_link( false, false, $color, esc_attr( $instance['title'] ), $content, $link_text, esc_url( $instance['url'] ), $instance['has_content'], $instance['has_border'], $instance['has_link'], $extra_class );
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		extract( $instance );
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'description' ) . '">Description: <textarea name="' . $this->get_field_name( 'description' ) . '" id="' . $this->get_field_id( 'description' ) . '" class="widefat">' . $instance['description'] . '</textarea></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'link-text' ) . '">Link text: <textarea name="' . $this->get_field_name( 'link-text' ) . '" id="' . $this->get_field_id( 'link-text' ) . '" class="widefat">' . $instance['link-text'] . '</textarea></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'url' ) . '">Url: <input type="text" name="' . $this->get_field_name( 'url' ) . '" id="' . $this->get_field_id( 'url' ) . '" value="' . $instance['url'] . '" class="widefat" /></label></p>';
		echo '<h3>Display</h3>';
		echo '<p><label for="' . $this->get_field_name( 'has_link' ) . '">Show bottom link? </label><input type="checkbox" id="' . $this->get_field_id( 'has_link' ) . '"' . ( ( ! empty( $has_link ) ) ? ' checked="checked" ' : '' ) . ' name="' . $this->get_field_name( 'has_link' ) . '" value="1"></p>';
				echo '<p><label for="' . $this->get_field_name( 'has_content' ) . '">Show description? </label><input type="checkbox" id="' . $this->get_field_id( 'has_content' ) . '"' . ( ( ! empty( $has_content ) ) ? ' checked="checked" ' : '' ) . ' name="' . $this->get_field_name( 'has_content' ) . '" value="1"></p>';
				echo '<p><label for="' . $this->get_field_name( 'has_border' ) . '">Has border? </label><input type="checkbox" id="' . $this->get_field_id( 'has_border' ) . '"' . ( ( ! empty( $has_border ) ) ? ' checked="checked" ' : '' ) . ' name="' . $this->get_field_name( 'has_border' ) . '" value="1"></p>';
		echo '<p><label>How many columns should use: </label>';
			echo '<select class="widefat" id="' . $this->get_field_id( 'spaces' ) . '" name="' . $this->get_field_name( 'spaces' ) . '">';
				echo '<option value="">1</option>';
				echo '<option value="2" ' . ( ( $spaces == '2' ) ? 'selected="selected"' : '' ) . '>2</option>';
				echo '<option value="3" ' . ( ( $spaces == '3' ) ? 'selected="selected"' : '' ) . '>3</option>';
				echo '<option value="4" ' . ( ( $spaces == '4' ) ? 'selected="selected"' : '' ) . '>4</option>';
			echo '</select>';
		echo '</p>';
		echo '<p><label>Color: </label>';
		echo '<select class="widefat" id="' . $this->get_field_id( 'color' ) . '" name="' . $this->get_field_name( 'color' ) . '">';
			echo '<option value="">Select color</option>';
				echo '<option value="tomato"' . ( ( $color == 'tomato' ) ? 'selected="selected"' : '' ) . '>Tomato</option>';
				echo '<option value="dark-slate-gray" ' . ( ( $color == 'dark-slate-gray' ) ? 'selected="selected"' : '' ) . '>Dark Slate Gray</option>';
				echo '<option value="gold" ' . ( ( $color == 'gold' ) ? 'selected="selected"' : '' ) . '>Gold</option>';
				echo '<option value="orange" ' . ( ( $color == 'orange' ) ? 'selected="selected"' : '' ) . '>Orange</option>';
				echo '<option value="forest-green" ' . ( ( $color == 'forest-green' ) ? 'selected="selected"' : '' ) . '>Forest Green</option>';
								echo '<option value="dark-turquoise" ' . ( ( $color == 'dark-turquoise' ) ? 'selected="selected"' : '' ) . '>Dark Turnquoise</option>';
								echo '<option value="dark-slate-blue" ' . ( ( $color == 'dark-slate-blue' ) ? 'selected="selected"' : '' ) . '>Dark Slate Blue</option>';
			echo '</select>';
		echo '</p>';
	}
}

function cc_text_banner_widget_init() {
	 register_widget( 'WP_Widget_text_banner_simple' );
}

add_action( 'widgets_init', 'cc_text_banner_widget_init' );
