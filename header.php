<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title( '|' ); ?></title>
	<?php wp_head(); ?>
</head>
<?php
	// get site global settings (settings.php)
	global $_set;
if ( ! empty( $_set ) ) {
	$settings = $_set->settings;
}
?>
<body <?php body_class(); ?>>
<?php do_action( 'cc_theme_before_header' ); ?>

<header class="main-header">
	<?php do_action( 'cc_theme_before_header_content' ); ?>
	<div class="container">
		<nav class="navbar">
			<div class="navbar-brand">
			<a href="<?php bloginfo( 'url' ); ?>" class="has-text-black">
				<svg
					class="logo"
					xmlns="http://www.w3.org/2000/svg"
					preserveAspectRatio="xMidyMid meet"
					viewBox="0 0 304 73">
					<use href="<?php echo get_bloginfo( 'template_directory' ) . '/assets/img/logos/cc/logomark.svg#logomark'; ?>"></use>
				</svg>
			</a>
			<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>
		</div>
	<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'main-navigation',
				'depth'           => 2,
				'container'       => 'div',
				'container_class' => 'navbar-menu',
				'items_wrap'      => '<div id="%1$s" class="navbar-end">%3$s</div>',
				'menu_class'      => 'navbar-menu',
				'menu_id'         => 'primary-menu',
				'after'           => '</div>',
				'walker'          => new Navwalker(),
			)
		);
		?>
		</nav>
	</div>
	<?php do_action( 'cc_theme_after_header_content' ); ?>
</header>
<?php do_action( 'cc_theme_after_header' ); ?>
