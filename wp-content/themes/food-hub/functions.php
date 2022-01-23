<?php

if ( ! function_exists( 'food_hub_enqueue_styles' ) ) :

	function food_hub_enqueue_styles() {
		wp_enqueue_style( 'food-hub-style-parent', get_template_directory_uri() . '/style.css' );

		wp_enqueue_style( 'food-hub-style', get_stylesheet_directory_uri() . '/style.css', array( 'food-hub-style-parent' ), '1.0.0' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'food_hub_enqueue_styles', 99 );

function food_hub_customize_control_style() {

	wp_enqueue_style( 'blog-plus-customize-controls', get_theme_file_uri() . '/customizer-control.css' );

}
add_action( 'customize_controls_enqueue_scripts', 'food_hub_customize_control_style' );

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' 	=> esc_html__( 'Primary', 'food-hub' ),
	'social' 	=> esc_html__( 'Social', 'food-hub' ),
	) );

if ( ! function_exists( 'food_hub_topbar' ) ) :

	function food_hub_topbar() { 

		if ( get_theme_mod( 'topbar_section_enable' ) == true ) :

			?>

		<div id="top-bar" class="relative">
			<div class="wrapper">
				<div class="<?php echo esc_attr( ( ( get_theme_mod( 'social_menu_enable' ) == true ) && has_nav_menu('social') ) ? 'col-2' : 'col-1' ); ?> clear">
					<div class="hentry">
						<ul class="contact-info">
							<li>
								<a href="tel:<?php echo esc_attr( get_theme_mod( 'contact_number' ) ); ?>">
									<?php echo food_restro_get_svg( array( 'icon' => 'phone' ) );

									if( !empty(  get_theme_mod( 'contact_text' ) ) ){

										echo esc_html( get_theme_mod( 'contact_text' ) );

									}

									if( !empty(  get_theme_mod( 'contact_number' ) ) ){ 

										echo esc_html( get_theme_mod( 'contact_number' ) );

									} ?>
								</a>
							</li>
						</ul><!-- .contact-info -->
					</div><!-- .hentry -->

					<?php if ( ( get_theme_mod( 'social_menu_enable' ) == true ) && has_nav_menu('social') ): ?>

						<div class="hentry">
							<div class="secondary-menu">
								<?php  
								wp_nav_menu( array(
									'theme_location' => 'social',
									'container' => false,
									'menu_class' => 'menu social-icons',
									'echo' => true,
									'fallback_cb' => 'food_restro_menu_fallback_cb',
									'depth' => 1,
									'link_before' => '<span class="screen-reader-text">',
									'link_after' => '</span>',
									) );
									?>
								</div><!-- .secondary-menu -->
							</div><!-- .hentry -->

						<?php endif; ?>

					</div><!-- .col-2 -->
				</div><!-- .wrapper -->
			</div>

			<?php
			endif;

		}
		endif;
		add_action( 'food_hub_topbar_action', 'food_hub_topbar', 10 );

		function food_hub_product_choices() {
			$posts = get_posts( array( 'numberposts' => -1, 'post_type' => 'product' ) );
			$choices = array();
			$choices[0] = esc_html__( '--Select--', 'food-hub' );
			foreach ( $posts as $post ) {
				$choices[ $post->ID ] = $post->post_title;
			}
			return  $choices;
		}

	require get_theme_file_path() . '/inc/customizer.php';

	require get_theme_file_path() . '/inc/front-sections/service.php';

	require get_theme_file_path() . '/inc/front-sections/special-menu.php';

	require get_theme_file_path() . '/inc/front-sections/testimonial.php';

	require get_theme_file_path() . '/inc/front-sections/special-offer.php';

	require get_theme_file_path() . '/inc/front-sections/blog.php';

	require get_theme_file_path() . '/inc/front-sections/subscribe.php';