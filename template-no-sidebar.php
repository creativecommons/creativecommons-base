<?php
	/** Template name: No sidebar */

	get_header();
	the_post();
?>
<section class="main-content">
	<header class="single-header">
		<div class="container">
			<div class="columns is-centered">
				<div class="column is-8">
					<?php get_template_part( 'inc/partials/entry/page', 'header' ); ?>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="columns is-centered">
			<div class="column is-8">
				<section class="entry-page-content">
					<div class="text-format body-big">
						<?php the_content(); ?>
					</div>
					<footer class="entry-footer">
						<?php get_template_part( 'inc/partials/entry/page', 'footer' ); ?>
					</footer>
				</section>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
