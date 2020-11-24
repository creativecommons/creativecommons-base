---
title: Advanced Customizations
date: 2020-09-08 11:58:22
slug: advanced-customizations
description:
---
import CopyToClipBoard from "../src/components/CopyToClipboard.vue"
import { filters } from "../data/markdown-helpers/filters.js"

## Customize CSS
The styling of the theme is made up of [Sass](https://sass-lang.com/), [Bulma](https://bulma.io/), and the [CC Vocabulary](https://cc-vocabulary.netlify.app/). All the boilerplate for creating custom styles is in the **front** directory in the root of the CC Child Theme starter. All custom styles in **front/styles/** will override default theme styles as long as you use the same CSS classes used in the parent theme.

### Add Advanced CSS

_The instructions that follow assume that you have successfully installed the CC WP Base Theme Starter into your **wordpress** > **wp-content** > **themes** directory and activated it in your local development environment._

- Open the wordpress directory in a text editor or IDE of your choice.
- Cd into **wordpress**/**wp-content**/**themes**/**cc-wp-base-theme-starter**/**front**
- Install all the necessary node modules by running the command below in your terminal:

<CopyToClipBoard text="npm install"/>

- To add custom styles cd into the styles folder, add your styles in the relevant sass files. 
- Run the npm scripts below in your terminal, to watch and compile your styles respectively.
```
npm watch

npm build
```

## Advanced Widgets

The widgets in the theme can be divided into three categories: default WordPress widgets, layout widgets, as well as CC custom content widgets.

### Default WordPress Widgets 
These are widgets that come prepackaged in WordPress to learn more about them view [WordPress Widgets](https://wordpress.org/support/article/wordpress-widgets/).

### Layout Widgets
These widgets are used to design the structure of the widget areas. The layout widgets are powered by CSS Grid and they effectively work in pairs as it is outlined below.

#### Column Container Open and Column Container Close
These are used to create containers. Column Containers are blocks of space that are designed to wrap Single Column Widgets.
 
#### Column Container Open
The Column Container Open widget is used to initialize a container component.
Its parameters are shown in the screenshot below:

## Hooks

Hooks enable users to insert their custom executable code into wordpress.

### Using Filters

The following filters are available in the theme:

**cc_theme_base_mandatory_sidebars**

Applied to expand the mandatory sidebars of the theme. It gets an array of the mandatory sidebars of the base theme as a parameter. The function should return an array with the sidebars:

<CopyToClipBoard :text="filters.sidebar" />

**cc_theme_base_menus**

Applied to add new menu placeholders. By default this theme has:

- Main menu
- Footer menu

```
array(
    'main-menu' => 'Main menu',
    'main-menu-mobile' => 'Main menu mobile',
    'footer' => 'Footer menu'
);
```
If you want to add new menu placeholder:

<CopyToClipboard :text="filters.placeholder" />

### Using Actions

The following actions are available in the theme:

- **cc_theme_before_header**: Action before the header element.
- **cc_theme_before_header_content**: Action inside element but before the header content.
- **cc_theme_after_header**: Action after the header element
- **cc_theme_after_header_content**: Action inside element but after the header content.
- **cc_theme_before_footer**: Action before the footer element.
- **cc_theme_before_footer_content**: Action inside element but before the footer content.
- **cc_theme_after_footer**:  Action after the footer element.
- **cc_theme_after_footer_content**: Action inside element but after the footer content.

