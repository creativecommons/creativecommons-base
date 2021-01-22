<header class="single-header">
		<div class="container">
			<div class="columns breadcrumb-container">
				<div class="column">
					<?php
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
					}
					?>
				</div>
			</div>
			<div class="columns">
			<?php
			if ( has_post_thumbnail() ) {
				echo '<div class="column is-6">';
					echo '<figure class="entry-image">';
						echo CC_Site::post_thumbnail_caption( get_the_ID(), 'landscape-featured' );
					echo '</figure>';
				echo '</div>';
			}
			?>
			<div class="column is-6 entry-meta-container">
				<div class="entry-meta-header">
					<div class="entry-category">
						<?php echo CC_Site::show_categories( get_the_ID() ); ?>
					</div>
					<h2><?php the_title(); ?></h2>
						<div class="columns leveled is-vcentered">
							<div class="column is-8">	
							<?php
								global $_set;
								$settings = $_set->settings;
							if ( $settings['show_authors'] ) {
								get_template_part( 'inc/partials/entry/entry', 'author' );
							} else {
								echo '<span class="entry-date">' . get_the_date( CC_Site::get_date_format() ) . '</span>';
							}
							?>
					</div>
					<div class="column is-2">
					<?php get_template_part('inc/partials/entry/share','entry'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
