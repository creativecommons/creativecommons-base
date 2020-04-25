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
		$class_gaps = ($instance['remove_gaps']) ? ' no-gap ' : '';
		$class_vertical_space = (!empty($instance['vertical_space'])) ? ' padding-vertical-'.$instance['vertical_space'] : '';
		echo '<aside class="grid-container ' . $class_gaps . $class_columns . $class_vertical_space . '">';
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	function form($instance)
	{
		$columns = $instance['columns'];
		$remove_gaps = $instance['remove_gaps'];
		$vertical_space = $instance['vertical_space'];
		echo '<p><label>Columns: </label>';
		echo '<p><label for="' . $this->get_field_name('remove_gaps') . '">Remove gap? </label><input type="checkbox" id="' . $this->get_field_id('remove_gaps') . '"' . ((!empty($remove_gaps)) ? ' checked="checked" ' : '') . ' name="' . $this->get_field_name('remove_gaps') . '" value="1"></p>';
		echo '<select class="widefat" id="' . $this->get_field_id('columns') . '" name="' . $this->get_field_name('columns') . '">';
		echo '<option value="">Select</option>';
		echo '<option value="auto"' . (($columns == 'auto') ? 'selected="selected"' : '') . '>Auto fit</option>';
		for ( $i = 2; $i<= 8; $i++ ) {
			echo '<option value="'.$i.'" ' . (($columns == $i) ? 'selected="selected"' : '') . '>'.$i.'</option>';
		}
		echo '</select>';
		echo '</p>';
		echo '<p><label>Space: </label>';
		echo '<select class="widefat" id="' . $this->get_field_id('vertical_space') . '" name="' . $this->get_field_name('vertical_space') . '">';
		echo '<option value="">Select size</option>';
		echo '<option value="normal"' . (($vertical_space == 'normal') ? 'selected="selected"' : '') . '>Normal</option>';
		echo '<option value="big"' . (($vertical_space == 'big') ? 'selected="selected"' : '') . '>Big</option>';
		echo '<option value="bigger" ' . (($vertical_space == 'bigger') ? 'selected="selected"' : '') . '>Bigger</option>';
		echo '<option value="large" ' . (($vertical_space == 'large') ? 'selected="selected"' : '') . '>Large</option>';
		echo '<option value="larger" ' . (($vertical_space == 'larger') ? 'selected="selected"' : '') . '>Larger</option>';
		echo '<option value="xl" ' . (($vertical_space == 'xl') ? 'selected="selected"' : '') . '>XL</option>';
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
		$class_color = ( !empty( $instance['color'] ) ) ? ' has-background-'.$instance['color'] : '';
		echo '<div class="cell ' . $class_columns . $class_color .'">';
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	function form($instance)
	{
		$columns = $instance['columns'];
		$color = $instance['color'];
		echo '<p><label>How many columns should use?: </label>';
		echo '<select class="widefat" id="' . $this->get_field_id('columns') . '" name="' . $this->get_field_name('columns') . '">';
		echo '<option value="">Select</option>';
		echo '<option value="auto"' . (($columns == 'auto') ? 'selected="selected"' : '') . '>Auto fit</option>';
		for ( $i = 2; $i<= 8; $i++ ) {
			echo '<option value="'.$i.'" ' . (($columns == $i) ? 'selected="selected"' : '') . '>'.$i.'</option>';
		}
		echo '</select>';
		echo '</p>';
		echo '<p><label>Color: </label>';
		echo '<select class="widefat" id="' . $this->get_field_id('color') . '" name="' . $this->get_field_name('color') . '">';
		echo '<option value="">Select color</option>';
		echo '<option value="lighter-gray"' . (($color == 'lighter-gray') ? 'selected="selected"' : '') . '>Lighter Gray</option>';
		echo '<option value="tomato"' . (($color == 'tomato') ? 'selected="selected"' : '') . '>Tomato</option>';
		echo '<option value="gold" ' . (($color == 'gold') ? 'selected="selected"' : '') . '>Gold</option>';
		echo '<option value="forest-green" ' . (($color == 'forest-green') ? 'selected="selected"' : '') . '>Forest Green</option>';
		echo '<option value="dark-turquoise" ' . (($color == 'dark-turquoise') ? 'selected="selected"' : '') . '>Dark Turnquoise</option>';
		echo '<option value="dark-slate-blue" ' . (($color == 'dark-slate-blue') ? 'selected="selected"' : '') . '>Dark Slate Blue</option>';
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
