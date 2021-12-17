<?php
get_header();
$author_id = get_queried_object()->ID;
$author_meta = get_user_meta($author_id);

$author_image_url = get_avatar_url($author_id, 'squared');
$user_nicename = get_queried_object()->user_nicename;
$cc_position = $author_meta["cc_position"]['0'];
$author_description =  $author_meta["description"]['0'];
$first_name = $author_meta["first_name"]['0'];

?>
<header class="page-header  bg-grey">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
	}
	?>
	<div class="container">
		<div class="columns m-0 is-centered">
			<?php if (!empty($author_image_url)) : ?>
				<div class="column is-4">
					<img alt="Author Photo" src="<?php echo $author_image_url ?>" class="avatar avatar-96 full-height full-width photo p-3 bg-white" loading="lazy">
				</div>
			<?php endif; ?>
			<div class="column">
				<div class="is-size-2 is-uppercase color-black has-text-weight-bold"><?php echo $user_nicename ?></div>
				<div class="is-size-4 is-uppercase color-black has-text-weight-bold"><?php echo $cc_position ?></div>
				<p class="mt-2"><?php echo nl2br($author_description) ?></p>
			</div>
		</div>
	</div>
</header>
<section class="main-content">
	<div class="container">
		<div class="columns padding-vertical-larger">
			<div class="column">
				<?php
				if (have_posts()) :
					echo "<h2 class='mb-2'>" . $first_name . "'s Posts</h2>";
					$row = 1;
					while (have_posts()) :
						$is_last_post = $wp_query->post_count === $row;
						the_post();
						echo Components::simple_entry(get_the_ID(), true, true, null, null, null, null, null, null, $is_last_post);
						$row++;
					endwhile;

					$links = paginate_links(array(
						'show_all'  => true,
						'type'      => 'array'
					));

					if ($links) :

						echo '<div class=" mt-4 is-size-5">';
						$current_page = get_query_var('paged');
						foreach ($links as $key => $link) {
							$total_size = sizeof($links);
							$is_current = $current_page === $key;
							$current_class = $is_current ? ' is-light ' : '';
							echo join('class="button ml-2 same-line p-4 ' . $current_class . ' ', explode('class="', $link));
						}
						echo '</div>';
					endif;
				endif;
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>