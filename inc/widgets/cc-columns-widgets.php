<?php
class WP_Widget_Column_Open extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		$widget_ops  = array(
			'classname'   => 'column-open',
			'description' => 'Open a column container',
		);
		$control_ops = array();
		parent::__construct('column-open', '-- Column container Open', $widget_ops, $control_ops);
	}

	function widget($args, $instance)
	{
		$class_columns = ($instance['columns'] != 'auto') ? 'total-cols-' . $instance['columns'] : '';
		echo '<aside class="grid-container ' . $class_columns . '">';
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	function form($instance)
	{
		$columns = $instance['columns'];
		echo '<p><label>Columns: </label>';
		echo '<select class="widefat" id="' . $this->get_field_id('columns') . '" name="' . $this->get_field_name('columns') . '">';
		echo '<option value="">Select</option>';
		echo '<option value="auto"' . (($columns == 'auto') ? 'selected="selected"' : '') . '>Auto fit</option>';
		for ( $i = 2; $i<= 8; $i++ ) {
			echo '<option value="'.$i.'" ' . (($columns == $i) ? 'selected="selected"' : '') . '>'.$i.'</option>';
		}
		echo '</select>';
		echo '</p>';
	}
}

class WP_Widget_Column_Close extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		$widget_ops  = array(
			'classname'   => 'column-close',
			'description' => 'close a column container',
		);
		$control_ops = array();
		parent::__construct('column-close', '-- Column Container Close', $widget_ops, $control_ops);
	}

	function widget($args, $instance)
	{
		echo '</aside>';
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	function form($instance)
	{

		echo '<p>This widget has no configurations</p>';
	}
}
class WP_Widget_Single_Column_Open extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		$widget_ops  = array(
			'classname'   => 'single-column-open',
			'description' => 'Open a single column space',
		);
		$control_ops = array();
		parent::__construct('single-column-open', '-- Single Column open', $widget_ops, $control_ops);
	}

	function widget($args, $instance)
	{
		$class_columns = ($instance['columns'] != 'auto') ? 'use-' . $instance['columns'] . '-cols' : '';
		echo '<div class="' . $class_columns . '">';
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	function form($instance)
	{
		$columns = $instance['columns'];
		echo '<p><label>How many columns should use?: </label>';
		echo '<select class="widefat" id="' . $this->get_field_id('columns') . '" name="' . $this->get_field_name('columns') . '">';
		echo '<option value="">Select</option>';
		echo '<option value="auto"' . (($columns == 'auto') ? 'selected="selected"' : '') . '>Auto fit</option>';
		for ( $i = 2; $i<= 8; $i++ ) {
			echo '<option value="'.$i.'" ' . (($columns == $i) ? 'selected="selected"' : '') . '>'.$i.'</option>';
		}
		echo '</select>';
		echo '</p>';
	}
}
class WP_Widget_Single_Column_Close extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		$widget_ops  = array(
			'classname'   => 'single-column-close',
			'description' => 'close a single column container',
		);
		$control_ops = array();
		parent::__construct('single-column-close', '-- Single Column Close', $widget_ops, $control_ops);
	}

	function widget($args, $instance)
	{
		echo '</div>';
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	function form($instance)
	{

		echo '<p>This widget has no configurations</p>';
	}
}
function cc_columns_widget_init()
{
	register_widget('WP_Widget_column_open');
	register_widget('WP_Widget_column_close');
	register_widget('WP_Widget_single_column_open');
	register_widget('WP_Widget_single_column_close');
}

add_action('widgets_init', 'cc_columns_widget_init');
