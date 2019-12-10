# CC blank WordPress theme

This is a blank CC theme for Wordpress. Please use it with a [child theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/) 

## Hooks
### Filters
#### cc_theme_base_mandatory_sidebars

Applied to expand the mandatory sidebars of the theme. It gets an array of the mandatory sidebars of the base theme as a parameter. The function should return an array with the sidebars

```
function filter_function_name( $mandatory_sidebars ) {
  // ...
}
add_filter( 'cc_theme_base_mandatory_sidebars', 'filter_function_name', 10, 1 );
```

#### cc_theme_base_menus
Applied to add new menu placeholders. By default this theme has:
- Main menu
- Main menu mobile
- Footer menu

The function gets an array with the defined menus in the current format

```
array(
    'main-menu' => 'Main menu',
    'main-menu-mobile' => 'Main menu mobile',
    'footer' => 'Footer menu'
);
```
If you want to add new menu placeholder
```
function filter_menu_list( $menu_list ) {
    // $menu_list['menu_ID'] = 'Menu name';
  $menu_list['new_menu'] = 'This is a new menu';
  
  return $menu_list;
}
add_filter( 'cc_theme_base_menus', 'filter_menu_list', 10, 1 );
```

### Actions
#### cc_theme_before_header
Action before the header element

#### cc_theme_before_header_content
Action inside <header> element but before the header content

#### cc_theme_after_header
Action after the header element

#### cc_theme_after_header_content
Action inside <header> element but after the header content

#### cc_theme_before_footer
Action before the footer element

#### cc_theme_before_footer_content
Action inside <footer> element but before the footer content

#### cc_theme_after_footer
Action after the footer element

#### cc_theme_after_footer_content
Action inside <footer> element but after the footer content