<?php
	/** Template name:  page */

	get_header();
	the_post();
?>

<section class="main-content">
	<header class="single-header">
		<div class="container">
			<div class="columns is-centered">
				<div class="column">
					<?php get_template_part( 'inc/partials/entry/page', 'header' ); ?>
				</div>
			</div>
		</div>
	</header>

	<section class="entry-page-content">
		<div class="text-format body-big">
			<?php the_content(); ?>
		</div>
		<footer class="entry-footer">
			<?php get_template_part( 'inc/partials/entry/page', 'footer' ); ?>
		</footer>
	</section>

</section>
<?php get_footer(); ?>
