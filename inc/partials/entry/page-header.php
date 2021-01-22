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
