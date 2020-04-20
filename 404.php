<?php 
	get_header();
	the_post();
?>
<header class="page-header">
	<div class="container">
		<div class="columns is-centered">
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
		<div class="columns is-centered padding-vertical-larger">
			<div class="column is-6">
				<div class="has-text-centered">
					<p class="value">404</p>
					<h2>Not found</h2>
				</div>
				<hr>
				<h4>You can try searching for content</h4>
				<?php get_search_form(); ?>
				<hr>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => '404-navigation',
						'depth'          => 1,
						'container'      => false,
						'items_wrap'     => '<div class="404-navigation">%3$s</div>',
						'menu_class'     => 'navbar-menu'
					)
				);
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>