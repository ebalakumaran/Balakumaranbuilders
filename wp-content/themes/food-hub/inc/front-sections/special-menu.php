<?php

if ( ! function_exists( 'food_hub_add_special_menu_section' ) ) :

    function food_hub_add_special_menu_section() {
    
     if ( get_theme_mod( 'special_menu_section_enable' ) == false ) {
            return false;
        }

        // Get special menu section details
        $section_details = array();
        $section_details = apply_filters( 'food_hub_filter_special_menu_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render special menu section now.
        food_hub_render_special_menu_section( $section_details );
    }
endif;

if ( ! function_exists( 'food_hub_get_special_menu_section_details' ) ) :
  
    function food_hub_get_special_menu_section_details( $input ) {

        $content = array();
         $page_ids = array();

                for ( $i = 1; $i <= 4; $i++ ) {
                    if ( ! empty( get_theme_mod( 'special_menu_content_product_' . $i ) ) )
                        $page_ids[] = get_theme_mod( 'special_menu_content_product_' . $i );
                }
                
                $args = array(
                    'post_type'         => 'product',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( 4 ),
                    'orderby'           => 'post__in',
                    ); 

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = food_restro_trim_content( 15 );

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
// special menu section content details.
add_filter( 'food_hub_filter_special_menu_section_details', 'food_hub_get_special_menu_section_details' );


if ( ! function_exists( 'food_hub_render_special_menu_section' ) ) :
 
   function food_hub_render_special_menu_section( $content_details = array() ) {

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="food_restro_special_menu_section">
            
            <div id="special-menu" class="relative page-section">
            <div class="wrapper">

                <div class="section-header">
                    <?php if ( ! empty( get_theme_mod( 'special_menu_subtitle' ) ) ) : ?>
                        <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'special_menu_subtitle' ), esc_html__( 'SPECIAL MENU', 'food-hub' ) ); ?></p>
                    <?php endif; 

                    if ( ! empty( get_theme_mod( 'special_menu_title' ) ) ) : ?>
                    <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'special_menu_title' ), esc_html__( 'Explore Delicious Flavour', 'food-hub' ) ); ?></h2>
                <?php endif; ?>
            </div><!-- .section-header -->

            <div class="section-content">
                <?php foreach ( $content_details as $content ) : ?>
                    <article>
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        </header>

                        <span class="price">
                            <?php  
                            $product = new WC_Product( $content['id'] );
                            echo $product->get_price_html();
                            ?>
                        </span><!-- .price -->

                        <div class="entry-content">
                            <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                        </div><!-- .entry-content -->

                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-fill" tabindex="-1">
                                <span class="more-icon">
                                    <?php echo food_restro_get_svg( array( 'icon' => 'more' ) ); ?>
                                </span><!-- .more-icon -->
                            </a>
                        </div><!-- .read-more -->
                    </article>
                <?php endforeach; ?>
            </div><!-- .section-content -->
        </div><!-- .wrapper -->
    </div><!-- .special-menu -->

        </div>

    <?php }
endif;