<?php
class WP_Widget_Donate extends WP_Widget {
	function __construct() {
		$widget_ops  = array(
			'classname'   => 'donate-banner',
			'description' => 'Shows a donation banner',
		);
		$control_ops = array();
		parent::__construct( 'donate-banner', 'CC Donation banner', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		$donate_url = 'https://us.netdonor.net/page/6650/donate/1/';
		echo '<div class="widget donate">';
			echo '<h3 class="b-header">' . $instance['title'] . '</h3>';
			echo '<div class="donate-buttons">';
				echo '<form action="' . $donate_url . '" class="donate-form" method="get">';
				echo '<input type="hidden" class="amount-input" name="transaction.donationAmt" value="">';
				echo '<input type="hidden" name="ea.tracking.id" value="donate-mid-page">';
				echo '<a href="#" class="button donate-amount" data-amount="5">$5</a>';
				echo '<a href="#" class="button donate-amount" data-amount="15">$15</a>';
				echo '<a href="#" class="button donate-amount" data-amount="25">$25</a>';
				echo '<a href="#" class="button donate-amount" data-amount="50">$50</a>';
				echo Components::button( 'Donate now', '#', 'normal', 'donate', true, 'cc-letterheart' );
				echo '</form>';
			echo '</div>';
		echo '</div>';
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		extract( $instance );
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
	}
}

function cc_donation_widget_init() {
	register_widget( 'WP_Widget_Donate' );
}

add_action( 'widgets_init', 'cc_donation_widget_init' );
