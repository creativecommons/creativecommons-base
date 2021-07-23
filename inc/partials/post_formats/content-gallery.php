<?php
	$gallery_objects = get_post_meta( get_the_ID(), 'post_gallery', false );
if ( ! empty( $gallery_objects ) ) {
	echo '<div class="glide entry-gallery">';
	echo '<div class="glide__track" data-glide-el="track">';
	echo '<ul class="glide__slides">';
	foreach ( $gallery_objects as $object ) {
		echo '<li class="glide__slide">';
		echo wp_get_attachment_image( $object, 'landscape-featured' );
		echo '</li>';
	}
	echo '</ul>';
	echo '</div>';
	echo '<div class="glide__arrows" data-glide-el="controls">';
	echo '<button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="icon chevron-left"></i></button>';
	echo '<button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="icon chevron-right"></i></button>';
	echo '</div>';
	echo '</div>';
}
?>
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
