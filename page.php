<?php
	get_header();
	the_post();
?>

<section class="main-content">
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
