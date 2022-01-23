<?php

// Add Special Offer section
$wp_customize->add_section( 'food_restro_special_offer_section', array(
	'title'             => esc_html__( 'Special Offer','food-hub' ),
	'description'       => esc_html__( 'Special Offer Section options.', 'food-hub' ),
	'panel'             => 'food_restro_front_page_panel',
	'priority'             => 55,
) );

// Special Offer content enable control and setting
$wp_customize->add_setting( 'special_offer_section_enable', array(
	'default'			=> 	false,
	'sanitize_callback' => 'food_restro_sanitize_switch_control',
) );

$wp_customize->add_control( new Food_Hub_Switch_Control( $wp_customize, 'special_offer_section_enable', array(
	'label'             => esc_html__( 'Special Offer Section Enable', 'food-hub' ),
	'section'           => 'food_restro_special_offer_section',
	'on_off_label' 		=> food_restro_switch_options(),
) ) );

// special offer subtitle setting and control
$wp_customize->add_setting( 'special_offer_subtitle', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> esc_html__( 'SPECIAL OFFER', 'food-hub' ),
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'special_offer_subtitle', array(
	'label'           	=> esc_html__( 'Sub Title', 'food-hub' ),
	'section'        	=> 'food_restro_special_offer_section',
	'active_callback' 	=> 'food_restro_is_special_offer_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'special_offer_subtitle', array(
		'selector'            => '#special-offer .section-header p.section-subtitle',
		'settings'            => 'special_offer_subtitle',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'food_restro_special_offer_subtitle_partial',
    ) );
}

// special offer posts drop down chooser control and setting
$wp_customize->add_setting( 'special_offer_content_product', array(
	'sanitize_callback' => 'food_restro_sanitize_page',
) );

$wp_customize->add_control( new Food_Hub_Dropdown_Chooser( $wp_customize, 'special_offer_content_product', array(
	'label'             => esc_html__( 'Select Product', 'food-hub' ),
	'section'           => 'food_restro_special_offer_section',
	'choices'			=> food_hub_product_choices(),
	'active_callback'	=> 'food_restro_is_special_offer_section_enable',
) ) );

// special offer btn title setting and control
$wp_customize->add_setting( 'special_offer_btn_title', array(
	'default'           	=> esc_html__( 'Read More', 'food-hub' ),
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'special_offer_btn_title', array(
	'label'           	=> esc_html__( 'Button Label', 'food-hub' ),
	'section'        	=> 'food_restro_special_offer_section',
	'active_callback' 	=> 'food_restro_is_special_offer_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'special_offer_btn_title', array(
		'selector'            => '#special-offer .read-more a',
		'settings'            => 'special_offer_btn_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'food_restro_special_offer_btn_title_partial',
    ) );
}