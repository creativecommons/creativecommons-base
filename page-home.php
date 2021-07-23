<?php
	/* Template name: Home Layout */
	get_header();
	$featured_content_is_enabled = get_theme_mod( 'cc_base_enable_featured_content' );
	$announcement_is_enabled     = get_theme_mod( 'cc_base_enabled_announcement' );
?>
	<section class="main-content another-class">
		Main content!
		<?php
		if ( $featured_content_is_enabled ) {
			get_template_part( 'inc/partials/home/home', 'featured' );
		}
		if ( $announcement_is_enabled ) {
			get_template_part( 'inc/partials/home/home', 'notification' );
		}

			get_template_part( 'inc/partials/home/home', 'content' );
		?>
	</section>
<?php get_footer(); ?>
