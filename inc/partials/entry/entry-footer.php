<hr>
<div class="columns leveled">
	<div class="column is-12">
		<div class="entry-meta">
			<div class="terms-list the-tags margin-vertical-normal">
				<?php $tag_list = CC_Site::show_tags( get_the_ID() ); ?>
				<?php if( ! empty($tag_list)): ?>
					<h6>Tags</h6>
					<?php echo $tag_list ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
