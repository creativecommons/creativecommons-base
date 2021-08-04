<?php
	get_header();
	the_post();
?>

<section class="main-content">
	<header class="page-header">
		<div class="container">
			<div class="columns is-centered">
				<div class="column">
					<?php get_template_part( 'inc/partials/entry/page', 'header' ); ?>
				</div>
			</div>
		</div>
	</header>

	<aside class="sidebar">
		<?php
			$parent = CC_Site::get_parent_page();
			echo '<nav class="side-navigation padding-vertical-big">';
			echo '<ul class="list-pages">';
			wp_list_pages(
				array(
					'child_of'  => $parent,
					'show_date' => '',
					'depth'     => 3,
					'title_li'  => '',
				)
			);
			echo '</ul>';
			echo '</nav>';

			get_sidebar();
		?>
	</aside>


	<section class="entry-page-content">
		<div class="text-format">
			<?php the_content(); ?>
		</div>
	</section>


	<?php get_template_part( 'inc/partials/entry/page', 'footer' ); ?>
</section>
<?php get_footer(); ?>
