<?php

if ( ! function_exists( 'food_hub_add_special_offer_section' ) ) :
 
    function food_hub_add_special_offer_section() {
    	
         if ( get_theme_mod( 'special_offer_section_enable' ) == false ) {
            return false;
        }

        // Get special offer section details
        $section_details = array();
        $section_details = apply_filters( 'food_hub_filter_special_offer_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render special offer section now.
        food_hub_render_special_offer_section( $section_details );
    }
endif;

if ( ! function_exists( 'food_hub_get_special_offer_section_details' ) ) :
    
    function food_hub_get_special_offer_section_details( $input ) {

        $content = array();
         $page_id = ! empty( get_theme_mod( 'special_offer_content_product' ) ) ? get_theme_mod( 'special_offer_content_product' ) : '';
                $args = array(
                    'post_type'         => 'product',
                    'p'                 => $page_id,
                    'posts_per_page'    => 1,
                    ); 

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = food_restro_trim_content( 50 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : '';

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// special offer section content details.
add_filter( 'food_hub_filter_special_offer_section_details', 'food_hub_get_special_offer_section_details' );


if ( ! function_exists( 'food_hub_render_special_offer_section' ) ) :

   function food_hub_render_special_offer_section( $content_details = array() ) {
        $readmore = ! empty( get_theme_mod( 'special_offer_btn_title' ) ) ? get_theme_mod( 'special_offer_btn_title' ) : esc_html__( 'Read More', 'food-hub' );

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>

        <div id="food_restro_special_offer_section">

            <div id="special-offer" class="relative page-section">
                <div class="wrapper <?php echo ! empty( $content['image'] ) ? 'col-2' : 'col-1'; ?>">
                    <div class="section-container">
                        <div class="section-header">
                            <?php if ( ! empty( get_theme_mod( 'special_offer_subtitle' ) ) ) : ?>
                                <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'special_offer_subtitle' ) ) ?></p>
                            <?php endif; ?>
                                
                                <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>

                        </div><!-- .section-header -->

                        <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                            <div class="section-content">
                                <?php echo wp_kses_post( $content['excerpt'] ); ?>
                            </div><!-- .entry-content -->
                        <?php endif; ?>

                            <span class="price">
                                <?php  
                                    $product = new WC_Product( $content['id'] );
                                    echo $product->get_price_html();
                                ?>
                            </span><!-- .price -->

                        <?php if ( ! empty( $content['url'] ) ) : ?>
                            <div class="read-more">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-fill">   <?php echo esc_html( $readmore ); ?>
                                    <span class="more-icon">
                                        <?php echo food_restro_get_svg( array( 'icon' => 'more' ) ); ?>
                                    </span><!-- .more-icon -->
                                </a>
                            </div><!-- .read-more -->
                        <?php endif; ?>
                    </div><!-- .section-container -->

                    <?php if ( ! empty( $content['image'] ) ) : ?>
                        <div class="featured-image">
                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                        </div><!-- .featured-image -->
                    <?php endif; ?>
                </div><!-- .wrapper -->
            </div><!-- #special-offer -->

            </div>

        <?php endforeach;
    }
endif;