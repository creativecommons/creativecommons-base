<?php
/**
 * THEME WIDGETS
 */
$active_widgets = apply_filters('cc_active_parent_widgets_list', array(
	'cc-columns-widgets',
	'cc-banner-link',
	'cc-notification',
	'cc-list-entries',
	'cc-newsletter-form',
	'cc-twitter-timeline',
	'cc-card',
	'cc-title',
	'cc-donate',
	'cc-org-news'
) );

foreach ($active_widgets as $widget) {
	require TEMPLATEPATH . '/inc/widgets/'.$widget.'.php';
}
