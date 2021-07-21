<?php
$featured_content_is_enabled       = get_theme_mod( 'cc_base_enable_featured_content' );
$announcement_is_enabled           = ( get_theme_mod( 'cc_base_enabled_announcement' ) ) ? ' has-notification-enabled' : '';
$featured_content                  = get_theme_mod( 'cc_base_featured_content' );
$featured_image_setting            = get_theme_mod( 'cc_base_featured_content_background_image' );
$featured_image                    = ( ! empty( $featured_image_setting ) ) ? 'style="background-image: url(' . wp_get_attachment_url( $featured_image_setting, 'landscape-featured' ) . ');"' : false;
$featured_background_color_setting = get_theme_mod( 'cc_base_featured_content_background_color' );
$featured_background_color         = ( ! empty( $featured_background_color_setting ) ) ? 'has-background-' . $featured_background_color_setting : '';
$include_donate_is_enabled         = get_theme_mod( 'cc_base_include_donate' );
?>

<!-- TODO: determine what the following line intends to achieve and clean up semantics to make more self-documenting -->
<section class="featured-content <?php echo $featured_background_color . $announcement_is_enabled; ?>" <?php echo $featured_image; ?>>
	<div class="container">
		<div class="wrap-content padding-vertical-larger">
			<div class="columns is-centered">
				<div class="column is-6 has-text-centered">
					<!-- TODO: determine whether this whole <section> should be wrapped in the following if statement -->
					<?php if ( $featured_content_is_enabled ) : ?>
						<h3 class="heading-b"><?php echo esc_attr( $featured_content ); ?></h3>

						<?php
						if ( $include_donate_is_enabled ) {
							echo Components::button( 'Donate now', 'https://creativecommons.org/donate', 'small', 'donate', true, 'cc-letterheart' );
						}
						?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
