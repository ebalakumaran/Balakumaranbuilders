<?php

// Add Subscribe section
$wp_customize->add_section( 'food_restro_subscribe_section', array(
	'title'             => esc_html__( 'Subscribe','food-hub' ),
	'description'       => esc_html__( 'Subscribe Section options.', 'food-hub' ),
	'panel'             => 'food_restro_front_page_panel',
	'priority'             => 80,
) );

// Subscribe content enable control and setting
$wp_customize->add_setting( 'subscribe_section_enable', array(
	'default'			=>  false,
	'sanitize_callback' => 'food_restro_sanitize_switch_control',
) );

$wp_customize->add_control( new Food_Hub_Switch_Control( $wp_customize, 'subscribe_section_enable', array(
	'label'             => esc_html__( 'Subscribe Section Enable', 'food-hub' ),
	'description'       => esc_html__( 'Install Jetpack and Enable Subscription Module to activate Subsription form.', 'food-hub' ),
	'section'           => 'food_restro_subscribe_section',
	'on_off_label' 		=> food_restro_switch_options(),
) ) );

// subscribe subtitle setting and control
$wp_customize->add_setting( 'subscribe_textfield1', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> esc_html__( 'Opening - Closing Time', 'food-hub' ),
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'subscribe_textfield1', array(
	'label'           	=> esc_html__( 'Text Field 1', 'food-hub' ),
	'section'        	=> 'food_restro_subscribe_section',
	'active_callback' 	=> 'food_hub_is_subscribe_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'subscribe_textfield1', array(
		'selector'            => '#subscribe-us .entry-header h3',
		'settings'            => 'subscribe_textfield1',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'food_restro_subscribe_textfield1_partial',
    ) );
}

// subscribe title setting and control
$wp_customize->add_setting( 'subscribe_textfield2', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> esc_html__( 'Available Daily, 9am-10pm', 'food-hub' ),
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'subscribe_textfield2', array(
	'label'           	=> esc_html__( 'Text Field 2', 'food-hub' ),
	'section'        	=> 'food_restro_subscribe_section',
	'active_callback' 	=> 'food_hub_is_subscribe_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'subscribe_textfield2', array(
		'selector'            => '#subscribe-us .entry-header h2.entry-title',
		'settings'            => 'subscribe_textfield2',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'food_restro_subscribe_textfield2_partial',
    ) );
}