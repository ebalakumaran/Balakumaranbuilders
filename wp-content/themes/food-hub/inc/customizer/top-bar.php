<?php

// Add Topbar section
$wp_customize->add_section( 'food_hub_topbar_section', array(
	'title'             => esc_html__( 'Topbar','food-hub' ),
	'description'       => esc_html__( 'Topbar Section options.', 'food-hub' ),
	'panel'             => 'food_restro_front_page_panel',
	'priority'             => 5,
) );

// topbar enable/disable control and setting
$wp_customize->add_setting( 'topbar_section_enable', array(
	'default'			=> 	false,
	'sanitize_callback' => 'food_restro_sanitize_switch_control',
) );

$wp_customize->add_control( new Food_Hub_Switch_Control( $wp_customize, 'topbar_section_enable', array(
	'label'             => esc_html__( 'Topbar Section Enable', 'food-hub' ),
	'section'           => 'food_hub_topbar_section',
	'on_off_label' 		=> food_restro_switch_options(),
) ) );

// Topbar content enable control and setting
$wp_customize->add_setting( 'social_menu_enable', array(
	'default'			=> false,
	'sanitize_callback' => 'food_restro_sanitize_switch_control',
) );

$wp_customize->add_control( new Food_Hub_Switch_Control( $wp_customize, 'social_menu_enable', array(
	'label'             => esc_html__( 'Social Menu Enable', 'food-hub' ),
	'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show secondary and social menu.', 'food-hub' ), esc_html__( 'Click Here', 'food-hub' ), esc_html__( 'to create menu', 'food-hub' ) ),
	'section'           => 'food_hub_topbar_section',
	'active_callback'   => 'food_hub_is_topbar_section_enable',
	'on_off_label' 		=> food_restro_switch_options(),
) ) );

$wp_customize->add_setting( 'contact_text', array(
	'default'             => esc_html__( ' Any Questions? Call Us:', 'food-hub' ),
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('contact_text', array(
    'label'             => esc_html__( 'Text Field', 'food-hub' ),
    'section'           => 'food_hub_topbar_section',
    'type'              => 'text',
    'active_callback'   => 'food_hub_is_topbar_section_enable',
 ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'contact_text', array(
		'selector'            => '#top-bar .contact-info a',
		'settings'            => 'contact_text',
    ) );
}

$wp_customize->add_setting( 'contact_number', array(
	'default'             => esc_html__( '1-223-355-2214', 'food-hub' ),
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('contact_number', array(
    'label'             => esc_html__( 'Contact Number', 'food-hub' ),
    'section'           => 'food_hub_topbar_section',
    'type'              => 'text',
    'active_callback'   => 'food_hub_is_topbar_section_enable',
 ) );