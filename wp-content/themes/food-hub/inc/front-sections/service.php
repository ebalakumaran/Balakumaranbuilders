<?php

if ( ! function_exists( 'food_hub_add_service_section' ) ) :
 
    function food_hub_add_service_section() {
    	$options = food_restro_get_theme_options();
        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'food_restro_section_status', true, 'service_section_enable' );

        if ( true !== $service_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'food_restro_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        food_restro_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'food_restro_get_service_section_details' ) ) :
  
    function food_restro_get_service_section_details( $input ) {
        $options = food_restro_get_theme_options();

        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['service_content_page_' . $i] ) )
                $page_ids[] = $options['service_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = food_restro_trim_content( 13 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// service section content details.
add_filter( 'food_restro_filter_service_section_details', 'food_restro_get_service_section_details' );

if ( ! function_exists( 'food_restro_render_service_section' ) ) :

   function food_restro_render_service_section( $content_details = array() ) {
        $options = food_restro_get_theme_options();
        $column = ! empty( $options['service_column'] ) ? $options['service_column'] : 'col-4';
        $i = 1;        

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="food_restro_service_section">

        <div id="our-services" class="relative page-section">
            <div class="wrapper">
                    <div class="section-header">
                    <?php if( !empty( get_theme_mod( 'service_sub_title' ) ) ): ?>
                    <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'service_sub_title' ), esc_html__( 'OUR SERVICES', 'food-hub' ) ); ?></p>
                <?php endif; ?>
                <?php if ( ! empty( $options['service_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['service_title'] ); ?></h2>
                <?php endif; ?>
                    </div><!-- .section-header -->

                <!-- supports col-2,col-3,col-4  -->
                <div class="section-content col-3">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                        <div class="entry-container">
                            <div class="icon-container">
                                <a href="<?php echo esc_url( $content['url'] ); ?>">
                                    <i class="fa fa-2x <?php echo ! empty( $options['service_content_icon_' . $i] ) ? esc_attr( $options['service_content_icon_' . $i] ) : 'fa-cogs'; ?>"></i>
                                </a>
                            </div><!-- .icon-container -->
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </header>
                            <div class="entry-content">
                                <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .entry-content -->
                            </div>
                        </article><!-- .hentry -->
                    <?php $i++; endforeach; ?>
                </div><!-- .entry-content -->
            </div><!-- .wrapper -->
        </div><!-- #our-services-->

        </div>
        
    <?php }
endif;