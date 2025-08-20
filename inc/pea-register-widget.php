<?php

function pea_register_widget( $widgets_manager ) {

	require_once dirname(__DIR__). '/widgets/heading.php';
    require_once dirname(__DIR__). '/widgets/image.php';
	
	$widgets_manager->register( new \PEA_Hedding() );
	$widgets_manager->register( new \PEA_Image() );

}
add_action( 'elementor/widgets/register', 'pea_register_widget' );