<?php
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
add_action( 'customize_preview_init', 'bosa_shop_customize_preview_js', 999, 1 );

function bosa_shop_customize_preview_js() {
	wp_enqueue_script( 'bosa-shop-customizer', get_stylesheet_directory_uri() . '/inc/customizer/customizer.js', array( 'customize-preview' ) );
}

function bosa_shop_customize_getting_js() {
	wp_dequeue_script( 'bosa-customizer-getting-started' );
	wp_enqueue_script( 'bosa-shop_customizer-getting-started', get_stylesheet_directory_uri() . '/inc/getting-started/getting-started.js', array( 'customize-controls', 'jquery' ), true );

	wp_enqueue_style( 'bosa-store-customize-controls', get_stylesheet_directory_uri() . '/inc/customizer/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'bosa_shop_customize_getting_js', 99 );

/**
 * Kirki Customizer
 *
 * @return void
 */
add_action( 'init' , 'bosa_shop_kirki_fields', 999, 1 );

function bosa_shop_kirki_fields(){

	/**
	* If kirki is not installed do not run the kirki fields
	*/

	if ( !class_exists( 'Kirki' ) ) {
		return;
	}

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Site Title', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'site_title_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '38px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.2',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.site-header .site-branding .site-title',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Site Description', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'site_description_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'normal',
			'font-size'      => '14px',
			'text-transform' => 'none',
		),
		'transport'   => 'auto',
		'output'   => array(
			array(
				'element' => '.site-header .site-branding .site-description',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Main Menu', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_menu_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Jost',
			'font-size'      => '18px',
			'text-transform' => 'none',
			'variant'        => '500',
			'line-height'    => '1.5',
		),
		'transport'   => 'auto',
		'output'   => array(
			array(
				'element' => array( '.main-navigation ul.menu li a', '.slicknav_menu .slicknav_nav li a' )
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Main Menu Description', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_menu_description_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Poppins',
			'font-size'      => '11px',
			'text-transform' => 'none',
			'variant'        => 'normal',
			'line-height'    => '1.3',
		),
		'transport'   => 'auto',
		'output'   => array(
			array(
				'element' => array( '.main-navigation .menu-description, .slicknav_menu .menu-description' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Body', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'body_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'normal',
			'font-size'      => '14px',
		),
		'transport'   => 'auto',
		'output' => array( 
			array(
				'element' => 'body',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'General Title (H1 - H6)', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'general_title_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'text-transform' => 'none',
		),
		'transport'   => 'auto',
		'output'   => array(
			array(
				'element' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'span.woocommerce-Price-amount.amount', '.button-primary', '.button-outline', '.button-text', 'button', '.woocommerce a.added_to_cart', 'body.woocommerce a.button', 'input[type="submit"]', '.product-title' ),
			),
		),	
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Page & Single Post Title', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'page_title_font_control',
		'section'      => 'typography',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '42px',
			'text-transform' => 'none',
		),
		'transport'   => 'auto',
		'output'   => array(
			array(
				'element' => array( '.page-title' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Title Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_slider_title_font_control',
		'section'      => 'main_slider_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '52px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.2',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-banner .banner-content .entry-title',
			),
		),
		'active_callback' => array(
			array(
			'setting'  => 'hide_slider_title',
			'operator' => '==',
			'value'    => false,
			),
			array(
			'setting'  => 'main_slider_controls',
			'operator' => '==',
			'value'    => 'slider',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Category Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_slider_cat_font_control',
		'section'      => 'main_slider_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '15px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.6',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-banner .banner-content .entry-header .cat-links a',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'main_slider_controls',
				'operator' => '==',
				'value'    => 'slider',
			),
			array(
				'setting'  => 'hide_slider_category',
				'operator' => '==',
				'value'    => false,
				),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Meta Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_slider_meta_font_control',
		'section'      => 'main_slider_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.6',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-banner .banner-content .entry-meta a',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'main_slider_controls',
				'operator' => '==',
				'value'    => 'slider',
			),
			array(
				array(
				'setting'  => 'hide_slider_date',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_slider_author',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_slider_comment',
				'operator' => '==',
				'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Excerpt Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_slider_excerpt_font_control',
		'section'      => 'main_slider_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'normal',
			'font-size'      => '15px',
			'text-transform' => 'initial',
			'line-height'    => '1.8',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-banner .banner-content .entry-text p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'main_slider_controls',
				'operator' => '==',
				'value'    => 'slider',
			),
			array(
				'setting'  => 'hide_slider_excerpt',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Slider Button Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'main_slider_button_font_control',
		'section'      => 'main_slider_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '400',
			'font-size'      => '14px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.4',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-banner .slide-inner .banner-content .button-container a',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'main_slider_controls',
				'operator' => '==',
				'value'    => 'slider',
			),
			array(
				'setting'  => 'hide_slider_button',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Content Alignment', 'bosa-shop' ),
		'type'        => 'select',
		'settings'    => 'main_slider_content_alignment',
		'section'     => 'main_slider_options',
		'default'     => 'left',
		'choices'  => array(
			'center' => esc_html__( 'Center', 'bosa-shop' ),
			'left'   => esc_html__( 'Left', 'bosa-shop' ),
			'right'  => esc_html__( 'Right', 'bosa-shop' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'main_slider_controls',
				'operator' => '==',
				'value'    => 'slider',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Title Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_section_title_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '36px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.2',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-area .section-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Description Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_section_description_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'normal',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'line-height'    => '1.8',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-area .section-title-wrap p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Title Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '18px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.4',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.feature-posts-content-wrap .feature-posts-content .feature-posts-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Category Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'featured_posts_cat_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'uppercase',
			'line-height'    => '1',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.post .feature-posts-content .cat-links a',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hide_featured_posts_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Meta Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'featured_posts_meta_font_control',
		'section'      => 'feature_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.6',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.post .feature-posts-content .entry-meta a',
			),
		),
		'active_callback' => array(
			array(
				array(
				'setting'  => 'hide_featured_posts_date',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_featured_posts_author',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_featured_posts_comment',
				'operator' => '==',
				'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Columns', 'bosa-shop' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_columns',
		'section'     => 'feature_posts_options',
		'default'     => 'four_columns',
		'placeholder' => esc_attr__( 'Select category', 'bosa-shop' ),
		'choices'  => array(
			'one_column'    => esc_html__( '1 Column', 'bosa-shop' ),
			'two_columns'   => esc_html__( '2 Columns', 'bosa-shop' ),
			'three_columns' => esc_html__( '3 Columns', 'bosa-shop' ),
			'four_columns'  => esc_html__( '4 Columns', 'bosa-shop' ),
		)
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Height (in px)', 'bosa-shop' ),
		'description'  => esc_html__( 'This option will only apply to Desktop. Please click on below Desktop Icon to see changes. Automatically adjust by theme default in the responsive devices.
		', 'bosa-shop' ),
		'type'         => 'slider',
		'settings'     => 'feature_posts_height',
		'section'      => 'feature_posts_options',
		'transport'    => 'postMessage',
		'default'      => 350,
		'choices' => array(
			'min' => '100',
			'max' => '1200',
			'step' => '10',
		),
		'active_callback' => array(
			array(
				'setting'  => 'feature_posts_section_layouts',
				'operator' => '==',
				'value'    => array( 'feature_one' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Title Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'latest_posts_section_title_font_control',
		'section'      => 'latest_posts_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '36px',
			'text-transform' => 'none',
			'line-height'    => '1.2',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-post-area .section-title-wrap .section-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_latest_posts_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Description Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'latest_posts_section_description_font_control',
		'section'      => 'latest_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'normal',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'line-height'    => '1.8',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-post-area .section-title-wrap p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_latest_posts_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Title Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'blog_post_title_font_control',
		'section'      => 'blog_page_style_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '22px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.4',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '#primary article .entry-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hide_post_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Category Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'blog_post_cat_font_control',
		'section'      => 'blog_page_style_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'uppercase',
			'line-height'    => '1',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '#primary .post .entry-content .entry-header .cat-links a',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hide_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Meta Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'blog_post_meta_font_control',
		'section'      => 'blog_page_style_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.6',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '#primary .entry-meta',
			),
		),
		'active_callback' => array(
			array(
				array(
				'setting'  => 'hide_date',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_author',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_comment',
				'operator' => '==',
				'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Excerpt Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'blog_post_excerpt_font_control',
		'section'      => 'blog_page_style_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '15px',
			'text-transform' => 'initial',
			'line-height'    => '1.8',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '#primary .entry-text p',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Title Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'highlight_posts_section_title_font_control',
		'section'      => 'highlight_posts_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '36px',
			'text-transform' => 'none',
			'line-height'    => '1.2',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-highlight-post .section-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_highlight_posts_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Description Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'highlight_posts_section_description_font_control',
		'section'      => 'highlight_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'normal',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'line-height'    => '1.8',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-highlight-post .section-title-wrap p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_highlight_posts_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Title Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'highlight_posts_title_font_control',
		'section'      => 'highlight_posts_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '20px',
			'text-transform' => 'none',
			'line-height'    => '1.4',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.highlight-post-slider .post .entry-content .entry-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hide_highlight_posts_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Category Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'highlight_posts_cat_font_control',
		'section'      => 'highlight_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'capitalize',
			'line-height'    => '1',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.highlight-post-slider .post .cat-links a',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hide_highlight_posts_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Post Meta Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'highlight_posts_meta_font_control',
		'section'      => 'highlight_posts_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.6',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.highlight-post-slider .post .entry-meta a',
			),
		),
		'active_callback' => array(
			array(
				array(
				'setting'  => 'hide_highlight_posts_date',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_highlight_posts_author',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_highlight_posts_comment',
				'operator' => '==',
				'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Widget Title Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'sidebar_widget_title_font_control',
		'section'      => 'sidebar_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '18px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.4',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.sidebar .widget .widget-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'sidebar_settings',
				'operator' => 'contains',
				'value'    => array( 'right', 'left', 'right-left' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Widget Title Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'footer_widget_title_font_control',
		'section'      => 'footer_widgets_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '20px',
			'text-transform' => 'none',
			'line-height'    => '1.4',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.site-footer .widget .widget-title',
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Header Layouts', 'bosa-shop' ),
		'description' => esc_html__( 'Select layout & scroll below to change its options', 'bosa-shop' ),
		'type'        => 'radio-image',
		'settings'    => 'header_layout',
		'section'     => 'header_style_options',
		'default'     => 'header_four',
		'priority'	  => '40',
		'choices'  => array(
			'header_one'    => get_template_directory_uri() . '/assets/images/header-layout-1.png',
			'header_two'    => get_template_directory_uri() . '/assets/images/header-layout-2.png',
			'header_three'  => get_template_directory_uri() . '/assets/images/header-layout-3.png',
			'header_four'  => get_stylesheet_directory_uri() . '/assets/images/header-layout-4.png',
		)
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Top Header Section', 'bosa-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_top_header_section',
		'section'      => 'header_style_options',
		'default'      => false,
		'priority'	   => '50',
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Advertisement Banner', 'bosa-shop' ),
		'description'  => esc_html__( 'Image dimensions 555 by 68 pixels is recommended.', 'bosa-shop' ),
		'type'         => 'image',
		'settings'     => 'header_advertisement_banner',
		'section'      => 'header_style_options',
		'default'      => '',
		'priority'	   => '222',
		'choices'     => array(
			'save_as' => 'id',
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Advertisement Banner Link', 'bosa-shop' ),
		'type'     => 'link',
		'settings' => 'header_advertisement_banner_link',
		'section'  => 'header_style_options',
		'default'  => '#',
		'priority' => '224',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Non Transparent Mid Header Background Color', 'bosa-shop' ),
		'description'  => esc_html__( 'It can be used as a transparent background color over image.', 'bosa-shop' ),
		'type'         => 'color',
		'settings'     => 'mid_header_background_color',
		'section'      => 'header_style_options',
		'default'      => '',
		'priority'	   => '230',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_three', 'header_four' ),
			),
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Non Transparent Mid Header Text Color', 'bosa-shop' ),
		'type'         => 'color',
		'settings'     => 'mid_header_text_color',
		'section'      => 'header_style_options',
		'default'      => '#333333',
		'priority'	   => '235',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Non Transparent Mid Header Text Link Hover Color', 'bosa-shop' ),
		'type'         => 'color',
		'settings'     => 'mid_header_text_link_hover_color',
		'section'      => 'header_style_options',
		'default'      => '#086abd',
		'priority'	  =>  '240',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_three', 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Mid Header Section Border', 'bosa-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mid_header_border',
		'section'      => 'header_style_options',
		'default'      => false,
		'priority'	   => '250',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_three', 'header_four' ),
			),
		),
	) );

		Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Header Height (in px)', 'bosa-shop' ),
		'description' => esc_html__( 'This option will only apply to Desktop. Please click on below Desktop Icon to see changes. Automatically adjust by theme default in the responsive devices.
		', 'bosa-shop' ),
		'type'        => 'slider',
		'settings'    => 'header_image_height',
		'section'     => 'header_style_options',
		'transport'   => 'postMessage',
		'default'     => 110,
		'priority'	  => '300',
		'choices'     => array(
			'min'  => 50,
			'max'  => 1200,
			'step' => 10,
		),
	) );

	// Contact Detail Options
	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Contact Details', 'bosa-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_contact_detail',
		'section'      => 'header_style_options',
		'default'      => false,
		'priority'	   => '320',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_one', 'header_two', 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Phone Number', 'bosa-shop' ),
		'type'         => 'text',
		'settings'     => 'contact_phone',
		'section'      => 'header_style_options',
		'default'      => '',
		'priority'	   => '330',
		'active_callback' => array(
			array(
				'setting'  => 'disable_contact_detail',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_one', 'header_two', 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable WooCommerce Compare', 'bosa-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_woocommerce_compare',
		'section'      => 'header_style_options',
		'default'      => false,
		'priority'	   => '430',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Disable WooCommerce Wishlist', 'bosa-shop' ),
		'type'     => 'checkbox',
		'settings' => 'disable_woocommerce_wishlist',
		'section'  => 'header_style_options',
		'default'  => false,
		'priority'	   => '440',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Disable WooCommerce My Account', 'bosa-shop' ),
		'type'     => 'checkbox',
		'settings' => 'disable_woocommerce_account',
		'section'  => 'header_style_options',
		'default'  => false,
		'priority'	   => '450',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Disable WooCommerce Cart', 'bosa-shop' ),
		'type'     => 'checkbox',
		'settings' => 'disable_woocommerce_cart',
		'section'  => 'header_style_options',
		'default'  => false,
		'priority'	   => '460',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Mid Header Section Border', 'bosa-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mobile_mid_header_border',
		'section'      => 'header_responsive',
		'default'      => false,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_one', 'header_three', 'header_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Header Advertisement Banner', 'bosa-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'disable_mobile_ad_banner',
		'section'     => 'header_responsive',
		'default'     => false,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_four' ),
			),
			array(
				'setting'  => 'disable_mobile_top_header',
				'operator' => '=',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Header Secondary Menu', 'bosa-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'disable_secondary_menu',
		'section'     => 'header_responsive',
		'default'     => false,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'contains',
				'value'    => array( 'header_three', 'header_four' ),
			),
			array(
				'setting'  => 'disable_mobile_top_header',
				'operator' => '=',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Post Layouts', 'bosa-shop' ),
		'description' => esc_html__( 'Grid / List / Single', 'bosa-shop' ),
		'type'        => 'radio-image',
		'settings'    => 'archive_post_layout',
		'section'     => 'blog_page_style_options',
		'default'     => 'grid',
		'choices'  => array(
			'grid'           => get_template_directory_uri() . '/assets/images/grid-layout.png',
			'list'           => get_template_directory_uri() . '/assets/images/list-layout.png',
			'single'         => get_template_directory_uri() . '/assets/images/single-layout.png',
		)
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Footer Layouts', 'bosa-shop' ),
		'type'        => 'radio-image',
		'settings'    => 'footer_layout',
		'section'     => 'footer_style_options',
		'default'     => 'footer_four',
		'choices'  => array(
			'footer_one'   => get_template_directory_uri() . '/assets/images/footer-layout-1.png',
			'footer_two'   => get_template_directory_uri() . '/assets/images/footer-layout-2.png',
			'footer_three' => get_template_directory_uri() . '/assets/images/footer-layout-3.png',
			'footer_four' => get_stylesheet_directory_uri() . '/assets/images/footer-layout-4.png',
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Bottom Footer Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'footer_style_font_control',
		'section'      => 'footer_style_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '500',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'line-height'    => '1.6',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => array( '.site-footer .site-info', '.site-footer .footer-menu ul li a' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Select Image', 'bosa-shop' ),
		'type'         => 'image',
		'settings'     => 'bottom_footer_image',
		'section'      => 'footer_style_options',
		'default'      => '',
		'choices'     => array(
			'save_as' => 'id',
		),
		'active_callback' => array(
			array(
				'setting'  => 'footer_layout',
				'operator' => 'contains',
				'value'    => array( 'footer_one', 'footer_two', 'footer_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Image Link', 'bosa-shop' ),
		'type'     => 'link',
		'settings' => 'bottom_footer_image_link',
		'section'  => 'footer_style_options',
		'default'  => '',
		'active_callback' => array(
			array(
				'setting'  => 'footer_layout',
				'operator' => 'contains',
				'value'    => array( 'footer_one', 'footer_two', 'footer_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'    => esc_html__( 'Image Target', 'bosa-shop' ),
		'description' => esc_html__( 'If enabled, the page will be open in an another browser tab.', 'bosa-shop' ),
		'type'     => 'checkbox',
		'settings' => 'bottom_footer_image_target',
		'section'  => 'footer_style_options',
		'default'  => true,
		'active_callback' => array(
			array(
				'setting'  => 'footer_layout',
				'operator' => 'contains',
				'value'    => array( 'footer_one', 'footer_two', 'footer_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Image Width', 'bosa-shop' ),
		'type'         => 'slider',
		'settings'     => 'bottom_footer_image_width',
		'section'      => 'footer_style_options',
		'transport'    => 'postMessage',
		'default'      => 270,
		'choices'      => array(
			'min'  => 10,
			'max'  => 1140,
			'step' => 5,
		),
		'active_callback' => array(
			array(
				'setting'  => 'footer_layout',
				'operator' => 'contains',
				'value'    => array( 'footer_one', 'footer_two', 'footer_four' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Section Border', 'bosa-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_footer_border',
		'section'      => 'footer_style_options',
		'default'      => false,
		'active_callback' => array(
			array(
				'setting'  => 'footer_layout',
				'operator' => 'contains',
				'value'    => array( 'footer_four' ),
			),
		),
	) );

	Kirki::add_section( 'featured_pages_options', array(
	    'title'      => esc_html__( 'Featured Pages', 'bosa-shop' ),
	    'panel'      => 'blog_homepage_options',	   
	    'capability' => 'edit_theme_options',
	    'priority'   => '15',
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Featured Pages Section', 'bosa-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_featured_pages_section',
		'section'      => 'featured_pages_options',
		'default'      => false,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Section Title', 'bosa-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_featured_pages_section_title',
		'section'      => 'featured_pages_options',
		'default'      => true,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Title', 'bosa-shop' ),
		'type'        => 'text',
		'settings'    => 'featured_pages_section_title',
		'section'     => 'featured_pages_options',
		'default'     => '',
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Title Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'featured_pages_section_title_font_control',
		'section'      => 'featured_pages_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '600',
			'font-size'      => '24px',
			'text-transform' => 'none',
			'line-height'    => '1.2',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-pages-area .section-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Section Description', 'bosa-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_featured_pages_section_description',
		'section'      => 'featured_pages_options',
		'default'      => true,
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Description', 'bosa-shop' ),
		'type'        => 'text',
		'settings'    => 'featured_pages_section_description',
		'section'     => 'featured_pages_options',
		'default'     => '',
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Section Description Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'featured_pages_section_description_font_control',
		'section'      => 'featured_pages_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => 'normal',
			'font-size'      => '16px',
			'text-transform' => 'none',
			'line-height'    => '1.8',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-pages-area .section-title-wrap p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Title and Description Alignment', 'bosa-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_section_title_desc_alignment',
		'section'     => 'featured_pages_options',
		'default'     => 'text-left',
		'choices'     => array(
			'text-left'	 	=> esc_html__( 'Left', 'bosa-shop' ),
			'text-center'  	=> esc_html__( 'Center', 'bosa-shop' ),   
			'text-right'		=> esc_html__( 'Right', 'bosa-shop' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'disable_featured_pages_section_title',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'disable_featured_pages_section_description',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Section Layout', 'bosa-shop' ),
		'description' => esc_html__( 'Select layout & scroll below to change its options', 'bosa-shop' ),
		'type'        => 'radio-image',
		'settings'    => 'featured_pages_section_layouts',
		'section'     => 'featured_pages_options',
		'default'     => 'featured_pages_layout_one',
		'choices'     => array(
			'featured_pages_layout_one'    => get_stylesheet_directory_uri() . '/assets/images/feature-page-layout-one.png',
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Columns', 'bosa-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_columns',
		'section'     => 'featured_pages_options',
		'default'     => 'four_columns',
		'placeholder' => esc_attr__( 'Select category', 'bosa-shop' ),
		'choices'  => array(
			'one_column'    => esc_html__( '1 Column', 'bosa-shop' ),
			'two_columns'   => esc_html__( '2 Columns', 'bosa-shop' ),
			'three_columns' => esc_html__( '3 Columns', 'bosa-shop' ),
			'four_columns'  => esc_html__( '4 Columns', 'bosa-shop' ),
		)
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 1', 'bosa-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_one',
		'section'     => 'featured_pages_options',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 1', 'bosa-shop' ),
		'choices'     => bosa_store_get_pages(),
		'active_callback' => array(
			array(
				'setting'  => 'featured_pages_columns',
				'operator' => 'contains',
				'value'    => array( 'one_column', 'two_columns', 'three_columns', 'four_columns' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 2', 'bosa-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_two',
		'section'     => 'featured_pages_options',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 2', 'bosa-shop' ),
		'choices'     => bosa_store_get_pages(),
		'active_callback' => array(
			array(
				'setting'  => 'featured_pages_columns',
				'operator' => 'contains',
				'value'    => array( 'two_columns', 'three_columns', 'four_columns' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 3', 'bosa-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_three',
		'section'     => 'featured_pages_options',
		'default'     => '',
		'choices'     => bosa_store_get_pages(),
		'placeholder' => esc_html__( 'Select Page 3', 'bosa-shop' ),
		'active_callback' => array(
			array(
				'setting'  => 'featured_pages_columns',
				'operator' => 'contains',
				'value'    => array( 'three_columns', 'four_columns' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page 4', 'bosa-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_four',
		'section'     => 'featured_pages_options',
		'default'     => '',
		'choices'     => bosa_store_get_pages(),
		'placeholder' => esc_html__( 'Select Page 4', 'bosa-shop' ),
		'active_callback' => array(
			array(
				'setting'  => 'featured_pages_columns',
				'operator' => 'contains',
				'value'    => array( 'four_columns' ),
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Featured Page Overlay Opacity', 'bosa-shop' ),
		'type'        => 'number',
		'settings'    => 'featured_pages_overlay_opacity',
		'section'     => 'featured_pages_options',
		'default'     => 2,
		'choices' => array(
			'min' => '0',
			'max' => '9',
			'step' => '1',
		)
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Height (in px)', 'bosa-shop' ),
		'description'  => esc_html__( 'This option will only apply to Desktop. Please click on below Desktop Icon to see changes. Automatically adjust by theme default in the responsive devices.
		', 'bosa-shop' ),
		'type'         => 'slider',
		'settings'     => 'featured_pages_height',
		'section'      => 'featured_pages_options',
		'transport'    => 'postMessage',
		'default'      => 250,
		'choices' => array(
			'min' => '100',
			'max' => '1200',
			'step' => '10',
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Background Image Size', 'bosa-shop' ),
		'type'         => 'radio',
		'settings'     => 'featured_pages_image_size',
		'section'      => 'featured_pages_options',
		'default'      => 'cover',
		'choices'      => array(
			'cover'    => esc_html__( 'Cover', 'bosa-shop' ),
			'pattern'  => esc_html__( 'Pattern / Repeat', 'bosa-shop' ),
			'norepeat' => esc_html__( 'No Repeat', 'bosa-shop' ),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page Border Radius (px)', 'bosa-shop' ),
		'type'        => 'slider',
		'settings'    => 'featured_pages_radius',
		'section'     => 'featured_pages_options',
		'transport'	  => 'postMessage', 
		'default'     =>  0,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Disable Page Title', 'bosa-shop' ),
		'type'        => 'checkbox',
		'settings'    => 'disable_featured_pages_title',
		'section'     => 'featured_pages_options',
		'default'     => false,
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Page Title Color', 'bosa-shop' ),
		'type'         => 'color',
		'settings'     => 'featured_pages_title_color',
		'section'      => 'featured_pages_options',
		'default'      => '#1a1a1a',
		'active_callback' => array(
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Page Hover Color', 'bosa-shop' ),
		'type'         => 'color',
		'settings'     => 'featured_pages_hover_color',
		'section'      => 'featured_pages_options',
		'default'      => '#086abd',
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page Title Horizontal Alignment', 'bosa-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_text_alignment',
		'section'     => 'featured_pages_options',
		'default'     => 'text-center',
		'choices'     => array(
			'text-left'	 	=> esc_html__( 'Left', 'bosa-shop' ),
			'text-center'  	=> esc_html__( 'Center', 'bosa-shop' ),   
			'text-right'	=> esc_html__( 'Right', 'bosa-shop' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'       => esc_html__( 'Page Title Vertical Alignment', 'bosa-shop' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_title_alignment',
		'section'     => 'featured_pages_options',
		'default'     => 'align-center',
		'choices'     => array(
			'align-top'	 	=> esc_html__( 'Top', 'bosa-shop' ),
			'align-center'  => esc_html__( 'Center', 'bosa-shop' ),   
			'align-bottom'  => esc_html__( 'Bottom', 'bosa-shop' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) ); 

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Page Title Typography', 'bosa-shop' ),
		'type'         => 'typography',
		'settings'     => 'featured_pages_font_control',
		'section'      => 'featured_pages_options',
		'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '18px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.4',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.feature-pages-content-wrap .feature-pages-content .feature-pages-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'bosa', array(
		'label'        => esc_html__( 'Disable Featured Pages', 'bosa-shop' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mobile_featured_pages',
		'section'      => 'blog_page_responsive',
		'default'      => false,
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_section',
				'operator' => '=',
				'value'    => false,
			),
		),
	) );
}