<?php
	get_header();
	the_post();
	$post_format = get_post_format();
?>
<section class="main-content">
	<?php
	if ( ! empty( $post_format ) ) {
		get_template_part( 'inc/partials/post_formats/content', $post_format );
	} else {
		get_template_part( 'inc/partials/post_formats/content', 'default' );
	}
	?>
	<div class="container">
		<div class="columns is-centered">
			<div class="column is-8">
				<section class="entry-page-content">
					<div class="text-format content body-big">
						<?php the_content(); ?>
					</div>
					<footer class="entry-footer">
						<?php get_template_part( 'inc/partials/entry/entry', 'footer' ); ?>
					</footer>
				</section>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
