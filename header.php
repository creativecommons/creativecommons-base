<!doctype html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?php wp_title( '|' ); ?>
  </title>
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
  <!-- BEGIN HEADER -->
  <header class="main-header">
    <nav class="navbar is-default"><?php // gets .is-active applied ?>
      <div class="navbar-brand">
        <a href="<?php bloginfo( 'url' ); ?>" class="has-text-black">
          <?php echo CC_Site::get_current_website_logo(); ?>
        </a>

        <a role="button" class="navbar-burger aria-label=" menu" aria-expanded="false">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div class="navbar-menu"><?php // gets .is-active applied ?>
        <div class="navbar-start">
          <?php do_action( 'cc_theme_before_header_buttons' ); ?>
          <!-- <div class="locale">
            <div class="control has-icons-left">
              <div class="select is-small">
                <select>
                  <option disabled>Select</option>
                  <option selected>English</option>
                  <option>le Français</option>
                  <option>日本語</option>
                  <option>Русский</option>
                  <option>Español</option>
                </select>
              </div>
              <div class="icon globe is-small is-left ">
                <i class="icon globe ">locale</i>
              </div>
            </div>
          </div> -->
          <a class="button donate" href="http://creativecommons.org/donate">
            <i class="icon heart"></i>
            Donate
          </a>
          <?php do_action( 'cc_theme_after_header_buttons' ); ?>
        </div>
        <div class="tabs-nav">
          <div class="tabs">
            <ul>
              <li class="menu"><a href="#tab-menu">Menu</a><?php // gets .is-active applied ?>
              </li>
              <li class="explore-tab"><a href="#tab-explore">Explore Creative Commons</a></li>
            </ul>
          </div>
          <div class="tabs-content">
            <div class="tabs-panel is-active" id="tab-menu"><?php // gets .is-active applied ?>
              <?php
                wp_nav_menu(
                  array(
                    'theme_location'  => 'main-menu-mobile',
                    'depth'           => 2,
                    'container'       => 'div',
                    'container_class' => 'navbar-end',
                    'items_wrap'      => '<div id="%1$s" class="navbar-end">%3$s</div>',
                    'menu_class'      => 'navbar-end',
                    'menu_id'         => 'mobile-menu',
                    'after'           => '</div>',
                    'walker'          => new Navwalker(),
                  )
                );
              ?>
            </div>
            <div class="tabs-panel explore" id="tab-explore"><?php // gets .is-active applied ?>
              <!-- Populated by the global header -->
            </div>
          </div>
        </div>
        <?php
          wp_nav_menu(
            array(
              'theme_location'  => 'main-navigation',
              'depth'           => 2,
              'container'       => 'div',
              'container_class' => 'navbar-menu',
              'items_wrap'      => '<div id="%1$s" class="navbar-end main-nav">%3$s</div>',
              'menu_class'      => 'navbar-menu',
              'menu_id'         => 'primary-menu',
              'after'           => '</div>',
              'walker'          => new Navwalker(),
            )
          );
        ?>
        <?php do_action( 'cc_theme_after_header_menu_desktop' ); ?>
    </nav>
    <?php do_action( 'cc_theme_after_header_content' ); ?>
  </header>


  <!--END HEADER-->
  <?php do_action( 'cc_theme_after_header' ); ?>
