<h2><?php the_title() ?></h2>
<span class="entry-date"><?php the_date('F d, Y') ?></span>
<?php
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
	}
?>