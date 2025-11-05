<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin {
	
     /**
     * store instance of plugin
     * 
     * @since 1.0.0
     * 
     * @var null
     */
	private static $_instance = null;

    /**
     * instance of plugin
     * 
     * @since 1.0.0
     * 
     * @return instance
     */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
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
		wp_enqueue_style( 'pea-swiper-css', PEA_PLUGIN_URL . 'assets/css/pea-swiper-bundle.min.css', [], '1.0.0', 'all' );
		wp_enqueue_style( 'pea-main-css',   PEA_PLUGIN_URL . 'assets/css/pea-main.css', [], '1.0.0', 'all' );

		wp_enqueue_script( 'pea-swiper-js', PEA_PLUGIN_URL . 'assets/js/pea-swiper-bundle.min.js', [ 'jquery' ], '1.0.0', true );
		wp_enqueue_script( 'pea-main-js',   PEA_PLUGIN_URL . 'assets/js/pea-main.js', ['jquery'], '1.0.0', true );

	}

	/**
	 * Elementor Editor Js Files
	 * 
	 * @since 1.0.0
	 * 
	 * @access public
	 */
	public function enqueue_editor_scripts(){
		wp_enqueue_script( 'reskill-elementor-editor', PEA_PLUGIN_URL . 'assets/js/editor.min.js', ['elementor-editor','jquery'], '1.0.0', true);
	}

	/**
	 * Elementor Css Files
	 * 
	 * @since 1.0.0
	 * 
	 * @access public 
	 */
	public function enqueue_editor_styles() {
      wp_enqueue_style( 'pea-editor-css', PEA_PLUGIN_URL . 'assets/css/pea-editor.css', [], '1.0.0','all');
    }


	/**
	 *  Plugin class constructor
	 * 
	 * @since 1.0.0
	 * 
	 * @access public
	 */
	public function __construct() {

		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

		// Register widget categories
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_widget_categories' ] );

		// Enqueue scripts for widgets
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		// Enqueue scripts for Elementor Editor
		add_action( 'elementor/editor/after_enqueue_scripts', [$this, 'enqueue_editor_scripts']);

		// Enqueue style for Elemetnor Editor
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'enqueue_editor_styles' ] );
	}
}

Plugin::instance();