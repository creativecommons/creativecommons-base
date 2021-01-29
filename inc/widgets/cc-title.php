<?php
class WP_Widget_Title extends WP_Widget {

	/** constructor */
	function __construct() {
		$widget_ops  = array(
			'classname'   => 'cc-title',
			'description' => 'Title with vocabulary formats',
		);
		$control_ops = array();
		parent::__construct( 'cc-title', 'CC title', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		$title_size           = ( ! empty( $instance['title_size'] ) ) ? 'h' . $instance['title_size'] : 'h1';
		$class_centered       = ( !empty($instance['is_centered']) ) ? 'has-text-centered' : '';
		$class_vertical_space = ( ! empty( $instance['vertical_space'] ) ) ? ' padding-vertical-' . $instance['vertical_space'] : ' padding-vertical-normal';
		echo '<div class="widget title">';
			echo '<' . $title_size . '  class="' . $class_centered . $class_vertical_space . '">' . $instance['title'] . '</' . $title_size . '>';
		echo '</div>';
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		$is_centered    = $instance['is_centered'];
		$vertical_space = $instance['vertical_space'];
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_name( 'is_centered' ) . '">Center title? </label><input type="checkbox" id="' . $this->get_field_id( 'is_centered' ) . '"' . ( ( ! empty( $is_centered ) ) ? ' checked="checked" ' : '' ) . ' name="' . $this->get_field_name( 'is_centered' ) . '" value="1"></p>';
		echo '<p><label>Title size: </label>';
		echo '<select class="widefat" id="' . $this->get_field_id( 'title_size' ) . '" name="' . $this->get_field_name( 'title_size' ) . '">';
		echo '<option value="">Select</option>';
		for ( $i = 1; $i <= 6; $i++ ) {
			echo '<option value="' . $i . '" ' . ( ( $instance['title_size'] == $i ) ? 'selected="selected"' : '' ) . '>H' . $i . '</option>';
		}
		echo '</select>';
		echo '</p>';
		echo '<p><label>Space: </label>';
		echo '<select class="widefat" id="' . $this->get_field_id( 'vertical_space' ) . '" name="' . $this->get_field_name( 'vertical_space' ) . '">';
		echo '<option value="">Select size</option>';
		echo '<option value="normal"' . ( ( $vertical_space == 'normal' ) ? 'selected="selected"' : '' ) . '>Normal</option>';
		echo '<option value="big"' . ( ( $vertical_space == 'big' ) ? 'selected="selected"' : '' ) . '>Big</option>';
		echo '<option value="bigger" ' . ( ( $vertical_space == 'bigger' ) ? 'selected="selected"' : '' ) . '>Bigger</option>';
		echo '<option value="large" ' . ( ( $vertical_space == 'large' ) ? 'selected="selected"' : '' ) . '>Large</option>';
		echo '<option value="larger" ' . ( ( $vertical_space == 'larger' ) ? 'selected="selected"' : '' ) . '>Larger</option>';
		echo '<option value="xl" ' . ( ( $vertical_space == 'xl' ) ? 'selected="selected"' : '' ) . '>XL</option>';
		echo '</select>';
		echo '</p>';
	}
}
function cc_title_widget_init() {
	register_widget( 'WP_Widget_Title' );
}

add_action( 'widgets_init', 'cc_title_widget_init' );
