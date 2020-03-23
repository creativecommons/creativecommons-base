<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title('|') ?></title>
	<?php wp_head(); ?>
</head>
<?php 
	//get site global settings (settings.php)
	global $_set;
	$settings = $_set->settings;
 ?>
<body <?php body_class(); ?>>
<?php do_action( 'cc_theme_before_header' ); ?>
<header class="main-header hide-for-small-only hide">
    
    <div class="vocab container">
        <div class="vocab grid navigation">
            <div class="cell desktop-3-wide logo">
                <a href="<?php bloginfo('url') ?>"><h1 class="site-title"><?php bloginfo('name') ?></h1><span class="tagline"><?php bloginfo( 'description' ) ?></span></a>
            </div>
            <div class="cell large-9 columns nav align-self-middle">
                <nav class="main-navigation">
                        <?php 
                        $args = array(
                            'theme_location' => 'main-menu',
                            'container' => '',
                            'fallback_cb' => false,
                            'items_wrap' => '<ul id = "%1$s" class = "menu %2$s">%3$s</ul>'
                            );

                        wp_nav_menu( $args );
                        ?>
                </nav>
            </div>
        </div>
    </div>
    
</header>
<header class="vocab global-header" id="global-header">
    <div class="vocab container">
        <div class="flex">
            <nav class="vocab navigation inverted navigation-container">
                <header class="nav-header">
                    <h3>Our network of products</h3>
                    <a href="#" class="vocab button gold-colored normal-sized inverted slightly-rounded to-upper">
                        <span class="addons padded">
                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzEiIGhlaWdodD0iMzAiIHZpZXdCb3g9IjAgMCAzMSAzMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTIxLjU3ODggNS4wMzcxN0MxOS4yNTYzIDQuNzA1OCAxNy4yNTA0IDUuNTYxMTYgMTUuNTMzMSA3LjQ0MjA2SDE1LjUzMzFDMTUuNTMxOCA3LjQ0MzU1IDE1LjUyNDEgNy40NTE5NCAxNS41MTY1IDcuNDYwMjhDMTUuNTA4MyA3LjQ2OTM4IDE1LjUgNy40Nzg0MyAxNS41IDcuNDc4NDFDMTUuNSA3LjQ3ODQyIDE1LjQ5MzEgNy40NzA4NCAxNS40ODU2IDcuNDYyNTlDMTUuNDc3NSA3LjQ1MzY5IDE1LjQ2ODcgNy40NDQwMSAxNS40NjcgNy40NDIyMkMxMy43NDk3IDUuNTYxMjIgMTEuNzQzOCA0LjcwNTc5IDkuNDIxMjEgNS4wMzcxN0M3LjAyNDA2IDUuMzc5MiA0Ljk4MzA3IDcuMTEyNDYgNC4yNTc0NiA5LjQ0ODU3QzMuNjk5MTEgMTEuMjQ2MiAzLjkzMDg5IDEzLjI1OTQgNC42Nzg1OCAxNS4wOTUzQzUuODQxNDggMTcuOTUwNyA5LjI3Nzg5IDIyLjAwOTQgMTUuNSAyNC44NDdDMjEuNzIyMSAyMi4wMDk0IDI1LjE1ODUgMTcuOTUwNyAyNi4zMjE0IDE1LjA5NTNDMjcuMDY5MSAxMy4yNTk0IDI3LjMwMDkgMTEuMjQ2MiAyNi43NDI2IDkuNDQ4NTdDMjYuMDE2OSA3LjExMjQ2IDIzLjk3NTkgNS4zNzkyIDIxLjU3ODggNS4wMzcxN1pNMy4xNjY2OCA3LjA0ODk0QzUuODcwMDUgMi41NzM5NyAxMS43NDkgMS43OTcwNSAxNS41IDQuNzc0NTVDMTkuMjUxIDEuNzk3MDQgMjUuMTMgMi41NzM5NiAyNy44MzMzIDcuMDQ4OTNDMjguNzMwOSA4LjUzNDc0IDI5LjA2OCAxMC4yNjIyIDI4Ljk4ODggMTEuOTc3M0MyOC44NTE0IDE0Ljk1MjIgMjcuNTgxOCAxNy41NTI3IDI1LjcxNjcgMTkuNzk2NkMyMy4yMDU2IDIyLjgxNzggMTkuNTU0OCAyNS4xOTI1IDE1LjU3OTkgMjYuOTY0NEMxNS41NjY4IDI2Ljk3MDMgMTUuNTI0MyAyNi45ODk3IDE1LjUgMjdDMTUuNDc3OCAyNi45OSAxNS40NDM5IDI2Ljk3NTEgMTUuNDI4MyAyNi45NjgyTDE1LjQyMDYgMjYuOTY0OEMxMS40MjUxIDI1LjE5MjggNy43OTQ1NyAyMi44MTgzIDUuMjgzMjkgMTkuNzk2N0MzLjQxODMgMTcuNTUyNiAyLjE0ODYxIDE0Ljk1MjIgMi4wMTExOCAxMS45NzczQzEuOTMxOTYgMTAuMjYyMiAyLjI2OTA5IDguNTM0NzYgMy4xNjY2OCA3LjA0ODk0Wk0xMy42ODM2IDE0LjI5NjhMMTUuMzkxMyAxNS4xNTI5QzE1LjA3NTUgMTUuOTAxNiAxNC4yODc0IDE2LjU5NTggMTMuNTc4MSAxNi45NTU1QzEyLjY2MTUgMTcuNDIwMyAxMS41ODM4IDE3LjQ3MTIgMTAuNTk0IDE3LjI1MjNDOC41NjQwMyAxNi44MDM0IDcuNjE5MDMgMTUuMDgzNSA3LjU4Mzc5IDEzLjA5MjVDNy41NDkzMiAxMS4xNDQ2IDguNTMyNTYgOS4zMzg1MyAxMC40NzM4IDguODEzMDVDMTIuMjk4MiA4LjMxOTIxIDE0LjQ1MDQgOC45MjE4NyAxNS4zNjg4IDEwLjY5MzlMMTMuNTA0MyAxMS42NjA2QzEzLjI5MDcgMTEuMTU3NCAxMi44OTA4IDEwLjU5NzYgMTEuOTUyNCAxMC41NDg2QzEwLjQ4MzcgMTAuNDcxNyAxMC4wNTM5IDExLjkwOCAxMC4xMDQ3IDEzLjE1MTdDMTAuMTQxOSAxNC4wNjIxIDEwLjQzMTcgMTUuMTQ3NSAxMS40MTA5IDE1LjQxODhDMTIuNjU4MyAxNS43NjQ1IDEzLjA5MDEgMTUuMTcyMSAxMy42ODM2IDE0LjI5NjhaTTIxLjczMzMgMTQuMjk2OEwyMy40NDA5IDE1LjE1MjlDMjMuMTI1MSAxNS45MDE2IDIyLjMzNyAxNi41OTU4IDIxLjYyNzcgMTYuOTU1NUMyMC43MTExIDE3LjQyMDMgMTkuNjMzNCAxNy40NzEyIDE4LjY0MzYgMTcuMjUyM0MxNi42MTM2IDE2LjgwMzQgMTUuNjY4NiAxNS4wODM1IDE1LjYzMzQgMTMuMDkyNUMxNS41OTg5IDExLjE0NDYgMTYuNTgyMiA5LjMzODUzIDE4LjUyMzQgOC44MTMwNUMyMC4zNDc4IDguMzE5MjEgMjIuNSA4LjkyMTg3IDIzLjQxODQgMTAuNjkzOUwyMS41NTM5IDExLjY2MDZDMjEuMzQwMyAxMS4xNTc0IDIwLjk0MDQgMTAuNTk3NiAyMC4wMDIgMTAuNTQ4NkMxOC41MzMzIDEwLjQ3MTcgMTguMTAzNSAxMS45MDggMTguMTU0MyAxMy4xNTE3QzE4LjE5MTUgMTQuMDYyMSAxOC40ODEzIDE1LjE0NzUgMTkuNDYwNSAxNS40MTg4QzIwLjcwNzkgMTUuNzY0NSAyMS4xMzk3IDE1LjE3MjEgMjEuNzMzMyAxNC4yOTY4WiIgZmlsbD0iYmxhY2siLz48L3N2Zz4=" alt="">
                        </span>
                        <span class="content has-addons">
                            Donate now
                        </span>
                    </a>
                </header>
                <ul class="links description-nav">
                    <li class="link">
                        <a href="#">
                            <h5 class="link-title">CC Search</h5>
                            <span class="link-description">Search for licensed content across all our partners.</span>
                        </a>
                    </li>
                    <li class="link">
                        <a href="#">
                            <h5 class="link-title">Global Network</h5>
                            <span class="link-description">Our global community of lorem ipsum dolor sit.</span>
                        </a>
                    </li>
                    <li class="link">
                        <a href="#">
                            <h5 class="link-title">Certificate Program</h5>
                            <span class="link-description">Program licenses, open practices and the ethos of the Commons.</span>
                        </a>
                    </li>
                    <li class="link">
                        <a href="#">
                            <h5 class="link-title">Global Summit</h5>
                            <span class="link-description">Annual event of discussion and debate with our community.</span>
                        </a>
                    </li>
                    <li class="link">
                        <a href="#">
                            <h5 class="link-title">CC Open Source</h5>
                            <span class="link-description">Open projects to participate with our community.</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <a href="#" class="vocab button black slide-button slightly-rounded">
                <span class="content">Our Network</span>
            </a>
        </div>
    </div>
</header>
<header class="vocab header small">
    <?php do_action( 'cc_theme_before_header_content' ); ?>
    <div class="vocab container">
        <div class="flex">
            <div id="branding-section">
                <div id="branding-content">
                    <a href="" class="homelink">
                        <div class="vocab image-view brand-imagery normal-sized height-constrained">
                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDEiIGhlaWdodD0iNDEiIHZpZXdCb3g9IjAgMCA0MSA0MSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTUuOTMyOSA2LjU0ODkxQzkuNjY4OCAyLjc3NDM5IDE0LjUwMzIgMC43NDk3NTYgMTkuOTk3IDAuNzQ5NzU2QzI1LjQ5MDcgMC43NDk3NTYgMzAuNDM1MiAyLjc3NDM5IDM0LjI4MDYgNi42MDM3M0MzOC4wNzE1IDEwLjM3ODkgNDAuMDQ5IDE1LjMwMjggNDAuMDQ5IDIwLjcxODhDNDAuMDQ5IDI2LjE4OTYgMzguMDcxNSAzMS4wNTg3IDM0LjMzNTYgMzQuNzI0MkMzMC4zODAyIDM4LjYwODQgMjUuMjcwNSA0MC42ODcyIDE5Ljk5NyA0MC42ODcyQzE0LjcyMzQgNDAuNjg3MiA5LjcyMzg1IDM4LjYwODQgNS44Nzg0OCAzNC43NzlDMi4wMzI0NyAzMC45NDkxIDAgMjYuMDI1MiAwIDIwLjcxODhDMCAxNS40NjY2IDIuMDg3NTIgMTAuNDMzNyA1LjkzMjkgNi41NDg5MVpNMzEuNjk4OSA5LjE3NTMyQzI4LjU2NzMgNi4wNTY3NyAyNC41NTY3IDQuMzYxMDcgMjAuMDUyIDQuMzYxMDdDMTUuNTQ3MyA0LjM2MTA3IDExLjU5MTIgNi4wMDI1OCA4LjUxNDYyIDkuMTIwNUM1LjM4MzAyIDEyLjI5MzkgMy42MjUxNyAxNi4zOTY3IDMuNjI1MTcgMjAuNzE4OEMzLjYyNTE3IDI0Ljk4NjEgNS4zODMwMiAyOS4wODg5IDguNTE0NjIgMzIuMjA4MUMxMS42NDU2IDM1LjMyNjYgMTUuNzExMiAzNy4wMjIzIDIwLjA1MTQgMzcuMDIyM0MyNC4zMzY1IDM3LjAyMjMgMjguNTExNiAzNS4zMjYgMzEuNzUzMyAzMi4xNTMzQzM0LjgyOTggMjkuMTQzNyAzNi40MjMyIDI1LjIwNDcgMzYuNDIzMiAyMC43MTg4QzM2LjQyMzIgMTYuMjg3NyAzNC43NzQ4IDEyLjIzOSAzMS42OTg5IDkuMTc1MzJaTTE5Ljc5MzIgMTcuNDAwNUMxOC42NjA1IDE1LjM0MzcgMTYuNzI4IDE0LjUyNTIgMTQuNDg0OSAxNC41MjUyQzExLjIxOTcgMTQuNTI1MiA4LjYyMDkzIDE2LjgyNTIgOC42MjA5MyAyMC43MTg4QzguNjIwOTMgMjQuNjc3OSAxMS4wNjQxIDI2LjkxMjQgMTQuNTk2MiAyNi45MTI0QzE2Ljg2MjIgMjYuOTEyNCAxOC43OTQgMjUuNjczNiAxOS44NjAzIDIzLjc5MzlMMTcuMzcyMiAyMi41MzNDMTYuODE2NiAyMy44NiAxNS45NzMxIDI0LjI1ODMgMTQuOTA2OSAyNC4yNTgzQzEzLjA2MyAyNC4yNTgzIDEyLjIxOTUgMjIuNzMyMSAxMi4yMTk1IDIwLjcxOTRDMTIuMjE5NSAxOC43MDY4IDEyLjkzMDEgMTcuMTc5OSAxNC45MDY5IDE3LjE3OTlDMTUuNDM5NyAxNy4xNzk5IDE2LjUwNTkgMTcuNDY3OSAxNy4xMjggMTguNzk0NEwxOS43OTMyIDE3LjQwMDVaTTI2LjA1MzIgMTQuNTI1MkMyOC4yOTY0IDE0LjUyNTIgMzAuMjI4MyAxNS4zNDM3IDMxLjM2MTYgMTcuNDAwNUwyOC42OTYzIDE4Ljc5NDRDMjguMDczNyAxNy40Njc5IDI3LjAwNzUgMTcuMTc5OSAyNi40NzQ3IDE3LjE3OTlDMjQuNDk3OSAxNy4xNzk5IDIzLjc4NjYgMTguNzA2OCAyMy43ODY2IDIwLjcxOTRDMjMuNzg2NiAyMi43MzIxIDI0LjYzMTQgMjQuMjU4MyAyNi40NzQ3IDI0LjI1ODNDMjcuNTQwOSAyNC4yNTgzIDI4LjM4NSAyMy44NiAyOC45NCAyMi41MzNMMzEuNDI4IDIzLjc5MzlDMzAuMzYxOCAyNS42NzM2IDI4LjQyOTkgMjYuOTEyNCAyNi4xNjQgMjYuOTEyNEMyMi42MzI1IDI2LjkxMjQgMjAuMTg4NyAyNC42Nzc5IDIwLjE4ODcgMjAuNzE4OEMyMC4xODg3IDE2LjgyNTIgMjIuNzg4MSAxNC41MjUyIDI2LjA1MzIgMTQuNTI1MloiIGZpbGw9ImJsYWNrIi8+PC9zdmc+" alt="Logo">
                        </div>
                    </a>
                    <span class="branding-text">Global Summit</span>
                </div>
                <a href="#" class="vocab button" id="hamburger" type="button">
                    <span class="content">
                        <span class="fa-layers">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" class="icon svg-inline--fa fa-times fa-w-11"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" class=""></path></svg><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="icon svg-inline--fa fa-bars fa-w-14 active"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg>
                        </span>
                    </span>
                </a>
            </div>
            <div id="content-section">
                <nav class="vocab navigation">
                    <ul class="links">
                        <li class="link">
                            <a href="#"><span>Home page</span></a>
                        </li>
                        <li class="link">
                            <a href="#"><span>About</span></a>
                        </li>
                        <li class="link menu-item-has-children">
                            <a href="#"><span>Test</span></a>
                            <ul class="sub-menu">
                                <li class="menu-item link">
                                    <a href="#">Item 1</a>
                                </li>
                                <li class="menu-item link">
                                    <a href="#">Item 2</a>
                                </li>
                                <li class="menu-item link">
                                    <a href="#">Item 3</a>
                                </li>
                            </ul>
                        </li>
                        <li class="link">
                            <a href="#"><span>Contact</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <?php do_action( 'cc_theme_after_header_content' ); ?>
</header>
<?php do_action( 'cc_theme_after_header' ); ?>