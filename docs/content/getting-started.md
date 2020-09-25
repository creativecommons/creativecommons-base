---
title: Getting started
date: 2020-09-08 12:05:54
slug: getting-started
---

To get started you have to first install the CC WP Base Theme locally. 

## Requirements

- [WordPress](https://wordpress.org/support/article/how-to-install-wordpress/): Version 5.2 or greater
- [Composer](https://getcomposer.org/): Install composer globally by following [documentation](https://getcomposer.org/doc/00-intro.md) for your particular OS.

<br/>

_For a step by step guide on how you can set up WordPress in your local environment please read and follow the tutorial provided in this [How to set up a local development...](https://www.endpoint.com/blog/2019/08/07/set-up-local-development-environment-for-wordpress)._

## Installation Guide

1. Download the [zip]() package of the theme.
2. Unzip to your wp-content/themes directory.
3. Navigate to the wp-theme-base directory and run the command below on the terminal, to install all the necessary package dependencies:

```bash
composer install
```
One of the installed dependencies is Queulat. In-order to initialize [Queulat](https://github.com/felipelavinz/queulat) in the project, follow the instructions provided in [feliperlavinz/queulat](https://github.com/felipelavinz/queulat#loading-queulat-as-mu-plugin). 

<br/>
Alternatively, to initialize Queulat navigate to the mu-plugins directory. The mu-plugins directory is in the root of the wp-content folder. It’s automatically created when you install Queulat using composer. At the root of the mu-plugins directory create an index.php file. Then copy and paste the code below:

```bash
<?php
/**
 * Plugin Name: Queulat Loader
 * Description: Load Queulat mu-plugin
 */

// Load Composer autoloader (ABSPATH it's the path to wp-load.php).
require_once ABSPATH . 'wp-content/themes/wp-theme-base/vendor/autoload.php';

// Load Queulat main file.
require_once __DIR__ .'/queulat/queulat.php';
```
