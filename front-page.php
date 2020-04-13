<?php
	get_header();
	global $_set;
  $settings                  = $_set->settings;
	$is_feature_enabled      = $settings['enable_featured'];
	$is_announcement_enabled = $settings['enabled_announcement'];
?>
	<section class="main-content">
		<?php
		if ( $is_feature_enabled ) {
			get_template_part( 'inc/partials/home/home', 'featured' );
		}
		if ( $is_announcement_enabled ) {
			get_template_part( 'inc/partials/home/home', 'notification' );
		}

			get_template_part( 'inc/partials/home/home', 'content' );
		?>
	</section>
<?php get_footer(); ?>
