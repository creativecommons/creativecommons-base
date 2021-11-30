<?php

function cc_base_theme_customize_register( $wp_customize ) {
	register_featured_content_settings( $wp_customize );
	register_display_settings( $wp_customize );
}

function register_display_settings( $wp_customize ) {
	$wp_customize->add_section(
		'cc_base_display_settings_section',
		array(
			'title'      => __( 'Display Settings', 'cc_base_theme_settings' ),
			'priority'   => 500,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_setting(
		'cc_base_include_donate',
		array(
			'type'       => 'theme_mod',
			'default'    => true,
			'transport'  => 'refresh',
			'capability' => 'manage_options',
		)
	);

	$wp_customize->add_setting(
		'cc_base_show_authors',
		array(
			'type'       => 'theme_mod',
			'default'    => true,
			'transport'  => 'refresh',
			'capability' => 'manage_options',
		)
	);

	$wp_customize->add_control(
		'cc_base_include_donate',
		array(
			'type'        => 'checkbox',
			'section'     => 'cc_base_display_settings_section',
			'label'       => __( 'Include donate', 'cc_base_theme_settings' ),
			'description' => __( 'Include donate button in footer', 'cc_base_theme_settings' ),
		)
	);

	$wp_customize->add_control(
		'cc_base_show_authors',
		array(
			'type'        => 'checkbox',
			'section'     => 'cc_base_display_settings_section',
			'label'       => __( 'Show authors', 'cc_base_theme_settings' ),
			'description' => __( 'Show authors on content', 'cc_base_theme_settings' ),
		)
	);
}

function register_featured_content_settings( $wp_customize ) {
	$wp_customize->add_section(
		'cc_base_featured_content_section',
		array(
			'title'      => __( 'Featured Content', 'cc_base_theme_settings' ),
			'priority'   => 500,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_setting(
		'cc_base_featured_content',
		array(
			'type'       => 'theme_mod',
			'default'    => '',
			'transport'  => 'refresh',
			'capability' => 'manage_options',
		)
	);

	$wp_customize->add_setting(
		'cc_base_featured_content_background_color',
		array(
			'type'       => 'theme_mod',
			'default'    => '#ffffff',
			'transport'  => 'refresh',
			'capability' => 'manage_options',
		)
	);

	$wp_customize->add_setting(
		'cc_base_featured_content_background_image',
		array(
			'type'       => 'theme_mod',
			'default'    => null,
			'transport'  => 'refresh',
			'capability' => 'manage_options',
		)
	);

	$wp_customize->add_control(
		'cc_base_featured_content',
		array(
			'type'        => 'textarea',
			'section'     => 'cc_base_featured_content_section',
			'label'       => __( 'Featured content', 'cc_base_theme_settings' ),
			'description' => __( 'Enter the featured content to display', 'cc_base_theme_settings' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'cc_base_featured_content_background_image',
			array(
				'label'       => __( 'Background image', 'cc_base_theme_settings' ),
				'description' => __( 'Choose a background image for featured content', 'cc_base_theme_settings' ),
				'section'     => 'cc_base_featured_content_section',
				'mime_type'   => 'image',
			)
		)
	);

	$wp_customize->add_control(
		'cc_base_featured_content_background_color',
		array(
			'label'       => __( 'Background color', 'cc_base_theme_settings' ),
			'description' => __( 'Choose a background color for featured content', 'cc_base_theme_settings' ),
			'section'     => 'cc_base_featured_content_section',
			'type'        => 'select',
			'choices'     => array(
				'tomato'          => 'Tomato',
				'dark-slate-gray' => 'Dark Slate Gray',
				'gold'            => 'Gold',
				'orange'          => 'Orange',
				'forest-green'    => 'Forest Green',
				'dark-turquoise'  => 'Dark Turquoise',
				'dark-slate-blue' => 'Dark Slate Blue',
			),
		)
	);
}
