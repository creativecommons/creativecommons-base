---
title: Getting started
date: 2020-09-08 12:05:54
slug: getting-started
description:
---
import CopyToClipBoard from "../src/components/CopyToClipboard.vue"
import { queulatSettings  } from "../data/markdown-helpers/queulat-settings.js"

To get started you have to first install the CC WP Base Theme locally. 

## Requirements

<ul class="markdown-list">
<li>
  <a href="https://wordpress.org/support/article/how-to-install-wordpress/" target="_blank">
  WordPress</a></li>

  <li>
  <a href="https://getcomposer.org/" target="_blank">
  Composer</a>:  Install composer globally by following the <a href="https://getcomposer.org/doc/00-intro.md#globally" target="_blank">documentation</a> for your particular OS.</li>
</ul>

<br/>

_For a step by step guide on how you can set up WordPress in your local environment checkout [How to set up a local development...](https://www.endpoint.com/blog/2019/08/07/set-up-local-development-environment-for-wordpress)_
## Installation Guide

1. Download the <a href="https://github.com/creativecommons/wp-theme-base/archive/master.zip">zip</a> package of the theme.
2. Unzip to your wp-content/themes directory.
3. Navigate to the wp-theme-base directory and run the command below on the terminal, to install all the necessary package dependencies:

```bash
composer install
```
One of the installed dependencies is  [Queulat](https://github.com/felipelavinz/queulat). In-order to initialize Queulat in the project, follow the instructions provided in [feliperlavinz/queulat](https://github.com/felipelavinz/queulat#loading-queulat-as-mu-plugin). 

<br/>
Alternatively, to initialize Queulat navigate to the mu-plugins directory. The mu-plugins directory is in the root of the wp-content folder. It’s automatically created when you install Queulat using composer. At the root of the mu-plugins directory create an index.php file. Then copy and paste the code below:

<CopyToClipBoard :text="queulatSettings "/>

4. Start your development server and activate the CC WP Base Theme in your local WordPress Dashboard.
