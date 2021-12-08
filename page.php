<?php
	get_header();
	the_post();
?>

<section class="main-content">
	<header class="page-header">
		<div class="container">
			<div class="columns is-centered">
				<div class="column">
					<?php
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
					}
					?>
				</div>
			</div>
		</div>
	</header>
	<section class="entry-page-content">
		<div class="content">
			<?php the_content(); ?>
		</div>
		<footer class="entry-footer">
			<?php get_template_part( 'inc/partials/entry/page', 'footer' ); ?>
		</footer>
	</section>

</section>
<?php get_footer(); ?>
