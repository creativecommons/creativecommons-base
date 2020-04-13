<?php if ( is_active_sidebar('home-announcement') ) : ?>
<div class="container">
	<div class="columns">
		<div class="column is-6">
			<?php dynamic_sidebar( 'home-announcement' ); ?>
		</div>
	</div>
</div>
<?php endif; ?>