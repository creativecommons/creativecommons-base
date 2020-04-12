<?php
	global $_set;
  $settings = $_set->settings;
	$is_feature_enabled = $settings['enable_featured'];
	$is_announcement_enabled = ( $settings['enabled_announcement'] ) ? ' has-featured-enabled' : '';
	$featured_image = ( !empty( $settings[ 'featured_image' ] ) ) ? 'style="background-image: url('.wp_get_attachment_url( $settings['featured_image'], 'landscape-featured' ).');"' : false;
	$featured_background_color = ( !empty( $settings[ 'featured_background_color' ] ) ) ? 'has-background-'.$settings['featured_background_color'] : '';
?>
<section class="featured-content <?php echo $featured_background_color . $is_announcement_enabled ?>" <?php echo $featured_image ?>>
	<div class="container">
		<div class="wrap-content padding-vertical-larger">
			<div class="columns is-centered">
				<div class="column is-6 has-text-centered">
					<?php if ( !empty( $settings['featured_content'] ) ): ?>
						<h3 class="heading-b"><?php echo esc_attr( $settings['featured_content'] ) ?></h3>
						<?php
							if ( $settings['include_donate'] ) {
								echo Components::button('Donate now', 'https://us.netdonor.net/page/6650/donate/1', 'small', 'donate', true, 'cc-letterheart');
							}
						?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>