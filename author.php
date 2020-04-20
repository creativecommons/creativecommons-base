<?php 
	get_header();
	$author_image = get_avatar(get_queried_object()->ID, 'squared');
?>
<header class="page-header">
	<div class="container">
		<div class="columns is-centered">
			<?php if ( !empty( $author_image ) ): ?>
				<div class="column is-1">
					<?php echo $author_image ?>
				</div>
			<?php endif; ?>
			<div class="column">
				<h2><?php echo CC_Site::page_title(); ?></h2>
				<?php
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
					}
				?>
			</div>
		</div>
	</div>
</header>
<section class="main-content">
	<div class="container">
		<div class="columns padding-vertical-larger">
			<div class="column is-8">
				<?php 
				if ( have_posts() ):
						while ( have_posts() ): the_post(); 
							echo Components::simple_entry( get_the_ID(), true, true );
						endwhile;
					the_posts_pagination();
				endif;
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>