<?php
/**
 * Plugin Name: Pedro Elementor Addon
 * Description: Elementor Addon For Pedro Theme
 * Version:     1.0.0
 * Author:      hmrisad
 * Author URI:  
 * Text Domain: pedro-elementor-addons
 * Domain Path: /languages
 */

// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {
     exit;
} 



class Pedro_Elementor_Addons {

	
	private static $_instance = null;

    /**
     * instance of plugin
     * 
     * @since 1.0.0
     * 
     * @access public
     */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
    

    public function define_constant(){
       define('PEA_VERSION', '1.0.0');
       // URL (for enqueuing CSS/JS)
       define('PEA_PLUGIN_URL', plugins_url('/', __FILE__));
       // PATH (for including PHP files)
      define('PEA_PLUGIN_PATH', plugin_dir_path(__FILE__));
    }


    /**
     * Register Widgets
     * 
     * @since 1.0.0
     * 
     * @access public
     */
	public function register_widgets( $widgets_manager ) {
		require_once PEA_PLUGIN_PATH . 'widgets/testimonial.php';

		$widgets_manager->register( new Widgets\Pea_Testimonial() );
	}

	 /**
     * Register Widgets categories
     * 
     * @since 1.0.0
     * 
     * @access public
     */
	public function register_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'pedro',
			[
				'title' => __( 'Pedro', 'pedro-elementor-addons' ),
			]
		);
	}

	 /**
     * Register Widgets categories
     * 
     * @since 1.0.0
     * 
     * @access public
     */
	public function enqueue_scripts() {
		wp_enqueue_style( 'pea-swiper-css', PEA_PLUGIN_PATH . 'assets/css/pea-swiper-bundle.min.css', [], '1.0.0', 'all' );
		wp_enqueue_style( 'pea-main-css',   PEA_PLUGIN_PATH . 'assets/css/pea-main.css', [], '1.0.0', 'all' );

		wp_enqueue_script( 'pea-swiper-js', PEA_PLUGIN_PATH . 'assets/js/pea-swiper-bundle.min.js', [ 'jquery' ], '1.0.0', true );
		wp_enqueue_script( 'pea-main-js',   PEA_PLUGIN_PATH . 'assets/js/pea-main.js', ['jquery'], '1.0.0', true );

	}

	// public function enqueue_editor_scripts(){
	// 	wp_enqueue_script( 'reskill-elementor-editor', RCORE_URL . 'assets/js/editor.min.js', ['elementor-editor','jquery'], '1.0.0', true);
	// }
	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

        // Define constant
        $this->define_constant();

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

		// Register widget categories
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_widget_categories' ] );

		// Enqueue scripts for widgets
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		// // Enqueue scripts for Elementor Editor
		// add_action( 'elementor/editor/after_enqueue_scripts', [$this, 'enqueue_editor_scripts']);
	}
}

// Instantiate Plugin Class
Pedro_Elementor_Addons::instance();
