<?php
if ( has_post_thumbnail() ) {
	echo '<figure class="entry-image">';
		the_post_thumbnail( 'landscape-featured' );
	echo '</figure>';
}
?>
<h2><?php the_title(); ?></h2>
<?php 
	global $_set;
	$settings = $_set->settings;
	if ( $settings['show_authors'] ) {
		get_template_part( 'inc/partials/entry/entry','author' );
	} else {
		echo '<span class="entry-date">'. get_the_date( CC_Site::get_date_format() ) .'</span>';
	}
 ?>
<?php
if ( function_exists( 'yoast_breadcrumb' ) ) {
	yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
}
?>
