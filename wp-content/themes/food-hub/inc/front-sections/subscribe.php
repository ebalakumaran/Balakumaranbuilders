<?php

if ( ! function_exists( 'food_hub_add_subscribe_section' ) ) :
  
    function food_hub_add_subscribe_section() {
    	
        if ( get_theme_mod( 'subscribe_section_enable' ) == false ) {
            return false;
        }

        // Render subscribe section now.
        food_hub_render_subscribe_section();
    }
endif;
add_action( 'food_hub_footer_primary_content', 'food_hub_add_subscribe_section', 10 );

if ( ! function_exists( 'food_hub_render_subscribe_section' ) ) :

   function food_hub_render_subscribe_section() {
       
        ?>

        <div id="food_restro_subscribe_section">

        <div id="subscribe-us" class="relative">
            <div class="wrapper <?php echo ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'subscriptions' ) ) ? 'col-2' : 'col-1'; ?>">
                <div class="hentry">
                        <header class="entry-header">
                            <?php if ( ! empty( get_theme_mod( 'subscribe_textfield1' ) ) ) : ?>
                                <h2 class="entry-title"><?php echo esc_html( get_theme_mod( 'subscribe_textfield1' ) ); ?></h2>
                            <?php endif; 

                            if ( ! empty( get_theme_mod( 'subscribe_textfield2' ) ) ) : ?>
                                <h3><?php echo esc_html( get_theme_mod( 'subscribe_textfield2' ) ); ?></h3>
                            <?php endif; ?>
                        </header>
                </div><!-- .hentry -->

                <div class="hentry">
                    <?php if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'subscriptions' ) ) :
                        $subscription_shortcode = '[jetpack_subscription_form title="" subscribe_text="" subscribe_button="" show_subscribers_total=""]';
                        echo do_shortcode( wp_kses_post( $subscription_shortcode ) ); 
                    endif; ?>
                </div><!-- .hentry -->
            </div><!-- .wrapper -->
        </div><!-- #subscribe-us -->

        </div>

        <?php
    }
endif;