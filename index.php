<?php
get_header();
the_post();
?>
<section class="main-content">
	<?php get_template_part( 'inc/partials/entry/page', 'header' ); ?>
	<div class="container">
		<div class="columns padding-vertical-larger">
			<div class="column is-12">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						echo Components::simple_entry( get_the_ID(), true, true );
					endwhile;

					echo '<div class="custom-pagination margin-vertical-bigger">';
					the_posts_pagination(
						array(
							'screen_reader_text' => ' ',
							'prev_text'          => '<i class="icon chevron-left"></i>',
							'next_text'          => '<i class="icon chevron-right"></i>',
						)
					);
					echo '</div>';
				endif;
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
