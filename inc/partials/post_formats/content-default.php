<h2><?php the_title(); ?></h2>
<?php
	$show_authors_is_enabled = get_theme_mod( 'cc_base_show_authors' );

if ( $show_authors_is_enabled ) {
	get_template_part( 'inc/partials/entry/entry', 'author' );
} else {
	echo '<span class="entry-date">' . get_the_date( CC_Site::get_date_format() ) . '</span>';
}
?>
<?php
if ( function_exists( 'yoast_breadcrumb' ) ) {
	yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
}
?>
