<?php

add_action('rest_api_init', function () {
    register_rest_route('api/v1', '/menus/main-navigation', array(
        'methods' => 'GET',
        'callback' => 'get_menus',
    ));
});

function get_menus()
{
    header('Content-Type: text/html');
    $html_string =  wp_nav_menu(
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


    $style_string = "<style> @import url(".get_site_url()."/wp-content/themes/creativecommons-base/style.css); </style>";

    return $html_string .  $style_string;
}
