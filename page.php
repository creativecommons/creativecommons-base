<?php 
	get_header();
	the_post();
	$post_format = get_post_format();
?>
<section class="main-content">
	<header class="page-header">
		<div class="container">
			<div class="columns is-centered">
				<div class="column is-three-quarters">
					<?php get_template_part( 'inc/partials/post_formats/content', 'default' ); ?>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="columns is-centered">
			<div class="column is-three-quarters">
				<section class="entry-content">
					<div class="text-format">
						<?php the_content(); ?>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
<?php get_footer() ?>
