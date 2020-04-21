<?php 
	get_header();
	the_post();
?>
<header class="page-header">
	<div class="container">
		<div class="columns is-centered">
			<div class="column is-6">
				<div class="has-text-centered">
					<p class="value">404</p>
					<h2><?php echo CC_Site::page_title(); ?></h2>
				</div>
				<hr>
				<h4>You can try searching for content</h4>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</header>
<?php get_footer(); ?>