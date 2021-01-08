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
<!--BEGIN HEADER-->
<header class="main-header">
  <div class="container">
    <nav class="navbar is-default is-active is-paddingless">
      <div class="navbar-brand">
        <a href="<?php bloginfo( 'url' ); ?>" class="has-text-black">
          <?php echo CC_Site::get_current_website_logo(); ?>
        </a>
        <a role="button" class="navbar-burger is-active" aria-label="menu" aria-expanded="false">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div class="navbar-menu is-active">
        <div class="navbar-start">
          <a class="button donate" href="https://creativecommons.org/donate?c_src=website&c_src2=NavBar">
            <i class="icon heart"></i>
            Donate
          </a>
        </div>
        <div class="tabs-nav">
          <div class="tabs">
            <ul>
              <li class="menu is-active"><a>Menu</a>
              </li>
              <li class="explore-tab"><a>Explore Creative Commons</a></li>
            </ul>
          </div>
          <div class="tabs-content">
            <div class="tabs-panel is-active">
              <?php
                wp_nav_menu(
                  array(
                    'theme_location'  => 'main-navigation',
                    'depth'           => 2,
                    'container'       => '',
                    'container_class' => '',
                    'items_wrap'      => '<div id="%1$s" class="navbar-end">%3$s</div>',
                    'menu_class'      => 'navbar-menu',
                    'menu_id'         => 'primary-menu',
                    'after'           => '</div>',
                    'walker'          => new Navwalker(),
                  )
                );
              ?>
            </div>
            <div class="tabs-panel explore"></div>
          </div>
        </div>
          <?php
            wp_nav_menu(
              array(
                'theme_location'  => 'main-navigation',
                'depth'           => 2,
                'container'       => '',
                'container_class' => '',
                'items_wrap'      => '<div id="%1$s" class="navbar-end main-nav">%3$s</div>',
                'menu_class'      => 'navbar-menu',
                'menu_id'         => 'primary-menu',
                'after'           => '</div>',
                'walker'          => new Navwalker(),
              )
            );
          ?>
      </div>
    </nav>
  </div>
  <?php do_action( 'cc_theme_after_header_content' ); ?>
</header>
