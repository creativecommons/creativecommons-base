<hr>
<div class="columns leveled">
	<div class="column is-one-third">
		<div class="entry-meta">
			<div class="terms-list the-categories margin-vertical-normal">
				<h6>Categories</h6>
				<?php echo CC_Site::show_categories( get_the_ID() ); ?>
			</div>
			<div class="terms-list the-tags margin-vertical-normal">
				<h6>Tags</h6>
				<?php echo CC_Site::show_tags( get_the_ID() ); ?>
			</div>
		</div>
	</div>
	<div class="column is-one-fifth">
		<div class="share-entry margin-vertical-normal">
			<h6>Share</h6>
			<a href="<?php echo CC_Site::social_share( 'facebook', get_the_ID() ); ?>" class="share facebook"><i class="icon facebook colored"></i></a>
			<a href="<?php echo CC_Site::social_share( 'twitter', get_the_ID() ); ?>" class="share twitter"><i class="icon twitter colored"></i></a>
			<a href="<?php echo CC_Site::social_share( 'linkedin', get_the_ID() ); ?>" class="share linkedin"><i class="icon linkedin colored"></i></a>
		</div>
	</div>
</div>
