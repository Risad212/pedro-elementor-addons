<?php
namespace PedroEA;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PedroEA_Plugin {
	
	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Register Widgets
	 */
	public function register_widgets( $widgets_manager ) {

		require_once PEA_PLUGIN_PATH . 'widgets/testimonial.php';
		require_once PEA_PLUGIN_PATH . 'widgets/timeline.php';
        require_once PEA_PLUGIN_PATH . 'widgets/button.php';
        require_once PEA_PLUGIN_PATH . 'widgets/team.php';

		$widgets_manager->register( new \Pea_Testimonial() );
		$widgets_manager->register( new \Pea_Timeline() );
		$widgets_manager->register( new \Pea_Button() );
		$widgets_manager->register( new \Pea_Team() );
	}

	/**
	 * Register Widgets categories
	 */
	public function register_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'pedroea',
			[
				'title' => __( 'Pedro', 'pedro-for-elementor-addons' ), 
			]
		);
	}

	/**
	 * Enqueue front-end scripts & styles
	 */
	public function enqueue_scripts() {
		
		wp_enqueue_style( 'pedroea-swiper-css', PEDROEA_URL . 'assets/css/pedroea-swiper-bundle.min.css', [], '1.0.0', 'all' );
		wp_enqueue_style( 'pedroea-main-css',   PEDROEA_URL . 'assets/css/pedroea-main.css', [], '1.0.0', 'all' );

		wp_enqueue_script( 'pea-swiper-js', PEA_PLUGIN_URL . 'assets/js/pea-swiper-bundle.min.js', [ 'jquery' ], '1.0.0', true );
		wp_enqueue_script( 'pea-main-js',   PEA_PLUGIN_URL . 'assets/js/pea-main.js', ['jquery'], '1.0.0', true );

	}

	/**
	 * Enqueue Elementor Editor Js Files
	 */
	public function enqueue_editor_scripts(){
		wp_enqueue_script( 'pedroea-elementor-editor', PEDROEA_URL . 'assets/js/editor.min.js', ['elementor-editor','jquery'], '1.0.0', true);
	}

	/**
	 * Enqueue Elementor Editor Styles
	 */
	public function enqueue_editor_styles() {
      wp_enqueue_style( 'pea-editor-css', PEA_PLUGIN_URL . 'assets/css/pea-editor.css', [], '1.0.0','all');
    }

	
	/**
	 * Plugin Constructor
	 */
	public function __construct() {
		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

		// Register widget categories
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_widget_categories' ] );

		// Enqueue front-end scripts
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		// Enqueue editor scripts
		add_action( 'elementor/editor/after_enqueue_scripts', [$this, 'enqueue_editor_scripts']);

		// Enqueue editor styles
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'enqueue_editor_styles' ] );
	}
}

PedroEA_Plugin::instance();