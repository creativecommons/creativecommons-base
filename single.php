<?php 
	get_header();
	the_post();
	$post_format = get_post_format();
?>
<section class="main-content">
	<header class="single-header">
		<div class="container">
			<div class="columns is-centered">
				<div class="column is-three-quarters">
					<?php 
						if ( !empty( $post_format ) ) {
							get_template_part( 'inc/partials/post_formats/content', $post_format );
						} else {
							get_template_part( 'inc/partials/post_formats/content', 'default' );
						}
					?>
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
					<div class="entry-meta">
						<hr>
						<div class="terms-list the-categories margin-vertical-normal">
							<h6>Categories</h6>
							<?php echo CC_Site::show_categories( get_the_ID() ); ?>
						</div>
						<div class="terms-list the-tags margin-vertical-normal">
							<h6>Tags</h6>
							<?php echo CC_Site::show_tags( get_the_ID() ); ?>
							</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
<?php get_footer() ?>
