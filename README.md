# CC blank WordPress theme
<!-- ALL-CONTRIBUTORS-BADGE:START - Do not remove or modify this section -->
[![All Contributors](https://img.shields.io/badge/all_contributors-3-orange.svg?style=flat-square)](#contributors-)
<!-- ALL-CONTRIBUTORS-BADGE:END -->

This is a blank CC theme for Wordpress. Please use it with a [child theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/) 

## Theme usage

The following projects inherit from the `creativecommons-base` theme:

- [Certificate](https://github.com/creativecommons/creativecommons-certificate/blob/b2967296b0324f33d1be4c041954513363191bcc/composer.json#L21)
- [wp-theme-creativecommons.org](https://github.com/creativecommons/wp-theme-creativecommons.org/blob/375cafbaccf03eded02f8f7f422e02e97833515a/composer.json#L20)

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

# Contribute
Contributions are highly appreciated. Please see [`CONTRIBUTING.md`](CONTRIBUTING.md).

## Contributors ✨

Thanks goes to these wonderful people ([emoji key](https://allcontributors.org/docs/en/emoji-key)):

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tr>
    <td align="center"><a href="http://www.epacking.be"><img src="https://avatars.githubusercontent.com/u/19891785?v=4?s=100" width="100px;" alt=""/><br /><sub><b>Alain Seys</b></sub></a><br /><a href="https://github.com/creativecommons/creativecommons-base/commits?author=alainseys" title="Code">💻</a> <a href="https://github.com/creativecommons/creativecommons-base/commits?author=alainseys" title="Documentation">📖</a></td>
    <td align="center"><a href="https://zack.cat"><img src="https://avatars.githubusercontent.com/u/6351754?v=4?s=100" width="100px;" alt=""/><br /><sub><b>Zack Krida</b></sub></a><br /><a href="https://github.com/creativecommons/creativecommons-base/commits?author=zackkrida" title="Code">💻</a></td>
    <td align="center"><a href="http://kritigodey.com"><img src="https://avatars.githubusercontent.com/u/287034?v=4?s=100" width="100px;" alt=""/><br /><sub><b>Kriti Godey</b></sub></a><br /><a href="#projectManagement-kgodey" title="Project Management">📆</a></td>
  </tr>
</table>

<!-- markdownlint-restore -->
<!-- prettier-ignore-end -->

<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/all-contributors/all-contributors) specification. Contributions of any kind welcome!