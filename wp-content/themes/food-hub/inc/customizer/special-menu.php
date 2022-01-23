<?php

// Add Special Menu section
$wp_customize->add_section( 'food_restro_special_menu_section', array(
	'title'             => esc_html__( 'Special Menu','food-hub' ),
	'description'       => esc_html__( 'Special Menu Section options.', 'food-hub' ),
	'panel'             => 'food_restro_front_page_panel',
	'priority'             => 25,
) );

// Special Menu content enable control and setting
$wp_customize->add_setting( 'special_menu_section_enable', array(
	'default'			=> 	false,
	'sanitize_callback' => 'food_restro_sanitize_switch_control',
) );

$wp_customize->add_control( new Food_Hub_Switch_Control( $wp_customize, 'special_menu_section_enable', array(
	'label'             => esc_html__( 'Special Menu Section Enable', 'food-hub' ),
	'section'           => 'food_restro_special_menu_section',
	'on_off_label' 		=> food_restro_switch_options(),
) ) );

// special_menu subtitle setting and control
$wp_customize->add_setting( 'special_menu_subtitle', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> esc_html__( 'SPECIAL MENU', 'food-hub' ),
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'special_menu_subtitle', array(
	'label'           	=> esc_html__( 'Sub Title', 'food-hub' ),
	'section'        	=> 'food_restro_special_menu_section',
	'active_callback' 	=> 'food_restro_is_special_menu_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'special_menu_subtitle', array(
		'selector'            => '#special-menu .section-header p.section-subtitle',
		'settings'            => 'special_menu_subtitle',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'food_restro_special_menu_subtitle_partial',
    ) );
}

// special_menu title setting and control
$wp_customize->add_setting( 'special_menu_title', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> esc_html__( 'Explore Delicious Flavour', 'food-hub' ),
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'special_menu_title', array(
	'label'           	=> esc_html__( 'Title', 'food-hub' ),
	'section'        	=> 'food_restro_special_menu_section',
	'active_callback' 	=> 'food_restro_is_special_menu_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'special_menu_title', array(
		'selector'            => '#special-menu .section-header h2.section-title',
		'settings'            => 'special_menu_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'food_restro_special_menu_title_partial',
    ) );
}

for ( $i = 1; $i <= 4; $i++ ) :

	// special_menu posts drop down chooser control and setting
	$wp_customize->add_setting( 'special_menu_content_product_' . $i, array(
		'sanitize_callback' => 'food_restro_sanitize_page',
	) );

	$wp_customize->add_control( new Food_Hub_Dropdown_Chooser( $wp_customize, 'special_menu_content_product_' . $i, array(
		'label'             => sprintf( esc_html__( 'Select Product %d', 'food-hub' ), $i ),
		'section'           => 'food_restro_special_menu_section',
		'choices'			=> food_hub_product_choices(),
		'active_callback'	=> 'food_restro_is_special_menu_section_enable',
	) ) );

endfor;