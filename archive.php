<?php get_header(); ?>
<section class="main-content">
<?php get_template_part( 'inc/partials/entry/page', 'header' ); ?>
	<div class="container">
		<div class="columns padding-vertical-larger">
			<div class="column is-8">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
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
