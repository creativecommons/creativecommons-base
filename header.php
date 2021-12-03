<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="https://unpkg.com/@creativecommons/vocabulary@2020.11.3/css/vocabulary.css"></script>
	<title><?php wp_title( '|' ); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php include 'explore-cc.php'; ?>
<?php do_action( 'cc_theme_before_header' ); ?>
<!--BEGIN HEADER-->
<header class="main-header">
	<?php do_action( 'cc_theme_before_header_content' ); ?>
	<div class="container">
		<nav class="navbar">
			<div class="navbar-brand">
			<a href="<?php bloginfo( 'url' ); ?>" class="has-text-black">
				<?php echo CC_Site::get_current_website_logo(); ?>
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
				'items_wrap'      => '<div id="%1$s" class="navbar-start">%3$s</div>',
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
<!--END HEADER-->
<?php do_action( 'cc_theme_after_header' ); ?>
