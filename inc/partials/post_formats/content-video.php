<?php
	$video_url = get_post_meta( get_the_ID(), 'post_video_url', true );
if ( ! empty( $video_url ) ) {
	echo '<figure class="wp-block-embed-youtube wp-block-embed is-type-video is-provider-' . Videos::get_video_class( $video_url ) . ' wp-embed-aspect-16-9 wp-has-aspect-ratio">';
		echo '<div class="wp-block-embed__wrapper">';
			echo Videos::get_video_embed( $video_url );
		echo '</div>';
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
		echo '<span class="entry-date">'. get_the_date( 'F d, Y' ) .'</span>';
	}
 ?>
<?php
if ( function_exists( 'yoast_breadcrumb' ) ) {
	yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
}
?>
