<?php

if ( class_exists( 'coauthors_plus' ) ) { // Get the Co-Authors for the post
	$co_authors = get_coauthors();
} else {
	$co_authors = array();
}
echo '<div class="entry-author">';
	echo '<div class="author-image">';
		$author_bio_avatar_size = apply_filters( 'cc_author_bio_avatar_size', 50 );
		if (count($co_authors)){
			foreach ($co_authors as $an_author){
				if ($an_author->type == 'guest-author') {
					echo get_avatar( get_the_author_meta( 'user_email', $an_author->ID ), $author_bio_avatar_size );
				} else {
					echo '<a href="' . get_author_posts_url(get_the_author_meta( 'ID', $an_author->ID ), get_the_author_meta( 'user_nicename', $an_author->ID )) . '">' . get_avatar( get_the_author_meta( 'user_email', $an_author->ID ), $author_bio_avatar_size ) . '</a>';
				}
			}
		} else {
			echo '<a href="' . get_author_posts_url(get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' )) . '">' . get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size ) . '</a>';
		}
	echo '</div>';
	echo '<div class="author-info-group">';
		echo '<div class="author-name">';
			if ( function_exists( 'coauthors_posts_links' ) ) {
				if (count($co_authors)){
					$x = 1;
					foreach ($co_authors as $an_author){
						if ($an_author->type == 'guest-author') {
							echo $an_author->display_name;
						} else {
							echo '<a href="' . get_author_posts_url($an_author->ID, $an_author->user_nicename) . '">' . $an_author->display_name . '</a>';
						}
						if ($x != count($co_authors)) { echo ' and '; }
						$x++;
					}
				}
			} else {
					the_author_posts_link();
			}
		echo '</div>';
		echo '<div class="author-date">'. get_the_date( 'F d, Y' ); '</div>';
	echo '</div>';
echo '</div>';
echo '</div>';