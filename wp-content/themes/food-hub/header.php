<?php do_action( 'food_restro_doctype' ); ?>
<head>
<?php
	
	do_action( 'food_restro_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php
	
	do_action( 'food_restro_page_start_action' ); 

	do_action( 'food_hub_topbar_action' );

	do_action( 'food_restro_header_action' );

	do_action( 'food_restro_content_start_action' );

	do_action( 'food_restro_header_image_action' );

    if ( food_restro_is_frontpage() ) {

    	$options = food_restro_get_theme_options();

    	$sorted = array( 'slider','service','special_menu','testimonial','special_offer','blog','subscribe' );
	
		foreach ( $sorted as $section ) {
			if ( $section == 'service' || $section == 'special_menu' || $section == 'testimonial' || $section == 'special_offer' || $section == 'subscribe' ) {
				add_action( 'food_hub_primary_content', 'food_hub_add_'. $section .'_section' );
			}else{
				add_action( 'food_hub_primary_content', 'food_restro_add_'. $section .'_section' );
			}	
		}

		do_action( 'food_hub_primary_content' );
	}