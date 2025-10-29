<?php
/**
 * Plugin Name: Pedro Elementor Addon
 * Description: Elementor Addon For Pedro Theme
 * Version:     1.0.0
 * Author:      hmrisad
 * Author URI:  
 * License: GPL3
 * License URI: http://www.gnu.org/licenses/gpl.html
 * Text Domain: pedro-elementor-addons
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
     exit;
} 


final class Pedro_Elementro_Addon {

	/**
	 * Defince Plugin Version
	 * 
	 * @since 1.2.1
	 * 
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * Defince Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * 
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	/**
	 * Defince Minimum PHP Version
	 *
	 * @since 1.0.0
	 * 
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * 
	 * @access public
	 */
	public function __construct() {
		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'plugin_init' ) );
	}

	/**
	 * Initialize The Plugin
	 *
	 * Validates that Elementor is already loaded.
	 * 
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * 
	 * if all check have passed include the plugin class.
	 *
	 * Fired by plugins_loaded action hook.
	 *
	 * @since 1.2.0
	 * 
	 * @access public
	 */
	public function plugin_init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );

			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );

			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );

			return;
		}
        
		// defined constant for plugin
		$this->define_constant();

		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'plugin.php' );
	}

	/**
	 * Defince Constant
	 * 
	 * @since 1.0.0
	 * 
	 * @access public
	 */
	public function define_constant(){
       // URL (for enqueuing CSS/JS)
       define('PEA_PLUGIN_URL', plugins_url('/', __FILE__));

       // PATH (for including PHP files)
      define('PEA_PLUGIN_PATH', plugin_dir_path(__FILE__));
    }

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * 
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
	/* translators: 1: Plugin name 2: Elementor */
	__( '"%1$s" requires "%2$s" to be installed and activated.', 'pedro-elementor-addons' ),
	'<strong>' . esc_html__( 'Pedro Elementor Addon', 'pedro-elementor-addons' ) . '</strong>',
	'<strong>' . esc_html__( 'Elementor', 'pedro-elementor-addons' ) . '</strong>'
		);

		printf(
			'<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>',
			wp_kses_post( $message )
		);

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
	/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
	esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'pedro-elementor-addons' ),
	'<strong>' . esc_html__( 'Pedro Elementor Addon', 'pedro-elementor-addons' ) . '</strong>',
	'<strong>' . esc_html__( 'Elementor', 'pedro-elementor-addons' ) . '</strong>',
	esc_html( self::MINIMUM_ELEMENTOR_VERSION )
);

printf(
	'<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>',
	wp_kses_post( $message )
);

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'pedro-elementor-addons' ),
			'<strong>' . esc_html__( 'Pedro Elementor Addon', 'pedro-elementor-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'pedro-elementor-addons' ) . '</strong>',
			esc_html( self::MINIMUM_PHP_VERSION )
		);

		printf(
			'<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>',
			wp_kses_post( $message )
		);

	}
}

// Instantiate Parker_Core.
new Pedro_Elementro_Addon();


