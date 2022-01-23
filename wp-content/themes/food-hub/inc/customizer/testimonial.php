<?php

// testimonial title setting and control
$wp_customize->add_setting( 'testimonial_sub_title', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'           	=> esc_html__( 'TESTIMONIALS', 'food-hub' ),
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'testimonial_sub_title', array(
	'label'           	=> esc_html__( 'Sub Title', 'food-hub' ),
	'section'        	=> 'food_restro_testimonial_section',
	'active_callback' 	=> 'food_restro_is_testimonial_section_enable',
	'type'				=> 'text',
	'priority'             => 15,
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'testimonial_sub_title', array(
		'selector'            => '#client-testimonial .section-subtitle',
		'settings'            => 'testimonial_sub_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'food_hub_testimonial_sub_title_partial',
    ) );
}