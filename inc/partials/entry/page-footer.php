<?php if ( is_active_sidebar( 'before-footer' ) ) : ?>
<footer class="entry-footer padding-vertical-bigger">
	<div class="container">
		<?php dynamic_sidebar( 'before-footer' ); ?>
	</div>
</footer>
<?php endif; ?>
