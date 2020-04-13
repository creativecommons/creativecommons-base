<?php if ( is_active_sidebar( 'home-notification' ) ) : ?>
<div class="container notification-container push-up">
	<div class="columns is-centered">
		<div class="column is-10">
			<?php dynamic_sidebar( 'home-notification' ); ?>
		</div>
	</div>
</div>
<?php endif; ?>
