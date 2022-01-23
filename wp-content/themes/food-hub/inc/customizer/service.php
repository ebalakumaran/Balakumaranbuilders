<?php

// service title setting and control
$wp_customize->add_setting( 'service_sub_title', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'           	=> esc_html__( 'OUR SERVICES', 'food-hub' ),
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'service_sub_title', array(
	'label'           	=> esc_html__( 'Sub Title', 'food-hub' ),
	'section'        	=> 'food_restro_service_section',
	'active_callback' 	=> 'food_restro_is_service_section_enable',
	'type'				=> 'text',
	'priority'             => 15,
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'service_sub_title', array(
		'selector'            => '#our-services .section-subtitle',
		'settings'            => 'service_sub_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'food_hub_service_sub_title_partial',
    ) );
}