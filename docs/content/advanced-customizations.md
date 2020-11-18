---
title: Advanced Customizations
date: 2020-09-08 11:58:22
slug: advanced-customizations
description:
---

import CopyToClipBoard from "../src/components/CopyToClipboard.vue"
## Customizing CSS

<CopyToClipBoard :text="
`<?php
/**
 * Plugin Name: Queulat Loader
 * Description: Load Queulat mu-plugin
 */
// Load Composer autoloader (ABSPATH it's the path to wp-load.php).
require_once ABSPATH . 'wp-content/themes/wp-theme-base/vendor/autoload.php';
// Load Queulat main file.
require_once __DIR__ .'/queulat/queulat.php';
`
" />



## Hooks


## Using Actions




## Using Filters


