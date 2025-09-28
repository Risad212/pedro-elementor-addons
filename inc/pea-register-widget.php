<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Register a custom Elementor widget category only if function doesn't exist
if ( ! function_exists( 'pea_elementor_widget_categories' ) ) {

    function pea_elementor_widget_categories( $elements_manager ) {
        $elements_manager->add_category(
            'pedro', // Category slug
            [
                'title' => esc_html__( 'Pedro', 'textdomain' )
            ]
        );
    }

    // Hook into Elementor
    add_action( 'elementor/elements/categories_registered', 'pea_elementor_widget_categories' );
}


function pea_register_widget( $widgets_manager ) {
	require_once dirname(__DIR__). '/widgets/testimonial.php';
   
	$widgets_manager->register( new \PEA_Testimonial() );
}
add_action( 'elementor/widgets/register', 'pea_register_widget' );