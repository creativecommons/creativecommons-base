<?php
	$highlight_post = CC_Site::get_highlighted_posts( get_queried_object(), 1 );
if ( $highlight_post->have_posts() ) :
	?>
<div class="container">
	<?php
	while ( $highlight_post->have_posts() ) :
		$highlight_post->the_post();
		echo Components::card_post( get_the_ID(), true, false, true, true, 'horizontal', 'small', 'is-primary' );
		endwhile;
	?>
</div>
<?php endif; ?>
