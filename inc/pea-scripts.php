<?php

function pea_addon_enqueue_assets() {
    // Swiper CSS
    wp_enqueue_style(
        'pea-swiper-style',
        plugin_dir_url( __FILE__ ) . 'assets/css/pea-swiper-bundle.min.css',
        array(),
        '1.0.0'
    );

    // Swiper JS
    wp_enqueue_script(
        'pea-swiper-script',
        plugin_dir_url( __FILE__ ) . 'assets/js/pea-swiper-bundle.min.js',
        array('jquery'),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'pea_addon_enqueue_assets' );