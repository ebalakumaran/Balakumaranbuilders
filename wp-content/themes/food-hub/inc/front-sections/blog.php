<?php

if ( ! function_exists( 'food_hub_add_blog_section' ) ) :

    function food_hub_add_blog_section() {
    	$options = food_restro_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'food_restro_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'food_restro_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        food_restro_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'food_restro_get_blog_section_details' ) ) :

    function food_restro_get_blog_section_details( $input ) {
        $options = food_restro_get_theme_options();

        $content = array();
        $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : array();
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 3,
            'category__not_in'  => ( array ) $cat_ids,
            'ignore_sticky_posts'   => true,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = food_restro_trim_content( 15 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

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
// blog section content details.
add_filter( 'food_restro_filter_blog_section_details', 'food_restro_get_blog_section_details' );


if ( ! function_exists( 'food_restro_render_blog_section' ) ) :

   function food_restro_render_blog_section( $content_details = array() ) {
        $options = food_restro_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="food_restro_blog_section">

        <div id="latest-posts" class="relative page-section">
            <div class="wrapper">
                    <div class="section-header">
                    <?php if ( ! empty( get_theme_mod( 'blog_sub_title' ) ) ) : ?>
                    <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'blog_sub_title' ), esc_html( 'LATEST BLOG', 'food-hub' ) ); ?></p>
                <?php endif; ?>
                <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                <?php endif; ?>
                    </div><!-- .section-header -->

                    <div class="section-content blog-posts-wrapper col-3">
                        <?php foreach ( $content_details as $content ) : ?>
                            <article>
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                        <?php food_restro_posted_on( $content['id'] ); ?> 
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <span class="cat-links">
                                        <?php the_category( '', '', $content['id'] ) ?>
                                    </span><!-- .cat-links -->

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->
                                </div><!-- .entry-container -->
                            </article>
                        <?php endforeach; ?>

                    </div><!-- .section-content -->

            </div><!-- .wrapper -->
        </div><!-- #latest-posts -->

        </div>

    <?php }
endif;