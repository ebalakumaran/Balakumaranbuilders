<?php

function food_hub_customize_register( $wp_customize ) {

	class Food_Hub_Switch_Control extends WP_Customize_Control{

		public $type = 'switch';

		public $on_off_label = array();

		public function __construct( $manager, $id, $args = array() ){
	        $this->on_off_label = $args['on_off_label'];
	        parent::__construct( $manager, $id, $args );
	    }

		public function render_content(){
	    ?>
		    <span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
			</span>

			<?php if( $this->description ){ ?>
				<span class="description customize-control-description">
				<?php echo wp_kses_post( $this->description ); ?>
				</span>
			<?php } ?>

			<?php
				$switch_class = ( $this->value() == 'true' ) ? 'switch-on' : '';
				$on_off_label = $this->on_off_label;
			?>
			<div class="onoffswitch <?php echo esc_attr( $switch_class ); ?>">
				<div class="onoffswitch-inner">
					<div class="onoffswitch-active">
						<div class="onoffswitch-switch"><?php echo esc_html( $on_off_label['on'] ) ?></div>
					</div>

					<div class="onoffswitch-inactive">
						<div class="onoffswitch-switch"><?php echo esc_html( $on_off_label['off'] ) ?></div>
					</div>
				</div>	
			</div>
			<input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr( $this->value() ); ?>"/>
			<?php
	    }
	}

	class Food_Hub_Dropdown_Taxonomies_Control extends WP_Customize_Control {

	public $type = 'dropdown-taxonomies';

	public $taxonomy = '';

	public function __construct( $manager, $id, $args = array() ) {

		$taxonomy = 'category';
		if ( isset( $args['taxonomy'] ) ) {
			$taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
			if ( true === $taxonomy_exist ) {
				$taxonomy = esc_attr( $args['taxonomy'] );
			}
		}
		$args['taxonomy'] = $taxonomy;
		$this->taxonomy = esc_attr( $taxonomy );

		parent::__construct( $manager, $id, $args );
	}

	public function render_content() {

		$tax_args = array(
			'hierarchical' => 0,
			'taxonomy'     => $this->taxonomy,
		);
		$taxonomies = get_categories( $tax_args );

	?>
    <label>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
      <?php if ( ! empty( $this->description ) ) : ?>
      	<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
      <?php endif; ?>
       <select <?php $this->link(); ?>>
			<?php
			printf( '<option value="%s" %s>%s</option>', '', selected( $this->value(), '', false ), esc_html__( '--None--', 'food-hub') );
			?>
			<?php if ( ! empty( $taxonomies ) ) :  ?>
            <?php foreach ( $taxonomies as $key => $tax ) :  ?>
				<?php
				printf( '<option value="%s" %s>%s</option>', esc_attr( $tax->term_id ), selected( $this->value(), $tax->term_id, false ), esc_html( $tax->name ) );
				?>
            <?php endforeach ?>
			<?php endif ?>
       </select>
    </label>
    <?php
	}
}

class Blog_plus_Dropdown_Multiple_Chooser extends WP_Customize_Control{
	public $type = 'dropdown_multiple_chooser';

	public function render_content(){
		if ( empty( $this->choices ) )
                return;
		?>
            <label>
                <span class="customize-control-title">
                	<?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

                <select class="blog-diary-chosen-select" multiple <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
                    ?>
                </select>
            </label>
		<?php
	}
}

	class Food_Hub_Dropdown_Chooser extends WP_Customize_Control{

		public $type = 'dropdown_chooser';

		public function render_content(){
			if ( empty( $this->choices ) )
	                return;
			?>
	            <label>
	                <span class="customize-control-title">
	                	<?php echo esc_html( $this->label ); ?>
	                </span>

	                <?php if($this->description){ ?>
		            <span class="description customize-control-description">
		            	<?php echo wp_kses_post($this->description); ?>
		            </span>
		            <?php } ?>

	                <select class="food-hub-chosen-select" <?php $this->link(); ?>>
	                    <?php
	                    foreach ( $this->choices as $value => $label )
	                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
	                    ?>
	                </select>
	            </label>
			<?php
		}
	}

	//Custom control for horizontal line
class Food_Hub_Customize_Horizontal_Line extends WP_Customize_Control {
	public $type = 'hr';

	public function render_content() {
		?>
		<div>
			<hr style="border: 1px dotted #72777c;" />
		</div>
		<?php
	}
}

class Food_Hub_Icon_Picker extends WP_Customize_Control{
	public $type = 'icon-picker';


	public function render_content(){
		$id = uniqid();
		?>
            <label>
                <span class="customize-control-title">
                	<?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>
	            <input id="food-hub-<?php echo esc_attr( $id ); ?>" placeholder="<?php esc_attr_e( 'Click here to select icon', 'food-hub' ); ?>" class="food-hub-icon-picker input" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />

			</label>
		<?php
	}
}
	
	$wp_customize->remove_section( 'colors' );	

	//top-bar section
	require get_theme_file_path() . '/inc/customizer/top-bar.php';

	//service section
	require get_theme_file_path() . '/inc/customizer/service.php';

	//special-menu section
	require get_theme_file_path() . '/inc/customizer/special-menu.php';

	//testimonial section
	require get_theme_file_path() . '/inc/customizer/testimonial.php';

	//special-offer section
	require get_theme_file_path() . '/inc/customizer/special-offer.php';

	//blog section
	require get_theme_file_path() . '/inc/customizer/blog.php';

	//subscribe section
	require get_theme_file_path() . '/inc/customizer/subscribe.php';

}
add_action( 'customize_register', 'food_hub_customize_register' );

/*=============active callback=====================*/

function food_hub_is_topbar_section_enable( $control ) {
	return ( $control->manager->get_setting( 'topbar_section_enable' )->value() );
}

function food_restro_is_special_menu_section_enable( $control ) {
	return ( $control->manager->get_setting( 'special_menu_section_enable' )->value() );
}

function food_restro_is_special_offer_section_enable( $control ) {
	return ( $control->manager->get_setting( 'special_offer_section_enable' )->value() );
}

function food_hub_is_subscribe_section_enable( $control ) {
	return ( $control->manager->get_setting( 'subscribe_section_enable' )->value() );
}

/*=============Partial Refresh=====================*/

if ( ! function_exists( 'food_hub_service_sub_title_partial' ) ) :
    // service_sub_title
    function food_hub_service_sub_title_partial() {
        return esc_html( get_theme_mod( 'service_sub_title' ) );
    }
endif;

if ( ! function_exists( 'food_restro_special_menu_subtitle_partial' ) ) :
    // special_menu_subtitle
    function food_restro_special_menu_subtitle_partial() {
        return esc_html( get_theme_mod( 'special_menu_subtitle' ) );
    }
endif;

if ( ! function_exists( 'food_restro_special_menu_title_partial' ) ) :
    // special_menu_title
    function food_restro_special_menu_title_partial() {
        return esc_html( get_theme_mod( 'special_menu_title' ) );
    }
endif;

if ( ! function_exists( 'food_hub_testimonial_sub_title_partial' ) ) :
    // testimonial_sub_title
    function food_hub_testimonial_sub_title_partial() {
        return esc_html( get_theme_mod( 'testimonial_sub_title' ) );
    }
endif;

if ( ! function_exists( 'food_restro_special_offer_subtitle_partial' ) ) :
    // special_offer_subtitle
    function food_restro_special_offer_subtitle_partial() {
        return esc_html( get_theme_mod( 'special_offer_subtitle' ) );
    }
endif;

if ( ! function_exists( 'food_restro_special_offer_btn_title_partial' ) ) :
    // special_offer_btn_title
    function food_restro_special_offer_btn_title_partial() {
        return esc_html( get_theme_mod( 'special_offer_btn_title' ) );
    }
endif;

if ( ! function_exists( 'food_hub_blog_sub_title_partial' ) ) :
    // blog_sub_title
    function food_hub_blog_sub_title_partial() {
        return esc_html( get_theme_mod( 'blog_sub_title' ) );
    }
endif;

if ( ! function_exists( 'food_restro_subscribe_textfield1_partial' ) ) :
    // subscribe_textfield1
    function food_restro_subscribe_textfield1_partial() {
        return esc_html( get_theme_mod( 'subscribe_textfield1' ) );
    }
endif;

if ( ! function_exists( 'food_restro_subscribe_textfield2_partial' ) ) :
    // subscribe_textfield2
    function food_restro_subscribe_textfield2_partial() {
        return esc_html( get_theme_mod( 'subscribe_textfield2' ) );
    }
endif;