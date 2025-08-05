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

final class Pedro_Elementor_Addons{

    /**
     * The Plugin Path
     * 
     * @var string
     */
    public $pedro_plugin_path;

    /**
     * The theme directory Path
     * 
     * @var string
     */
    public $theme_dir_path;


     /**
     * instance, Ensures only one instance of the class.
     * 
     * @access public
     * 
     * @return instance of this class
     */
    public static function getInstance(){
        static $instance = false;

        if( ! $instance ){
            $instance = new self();
        }

        return $instance;
    }

    /**
     *  Class Constructor
     * 
     * @access private
     * 
     */
    private function __construct(){

        if ( did_action( 'elementor/loaded' ) ) {
            add_action( 'plugins_loaded', array( $this, 'plugin_init' ) );
        } else {
            add_action( 'admin_notices', array( $this, 'elementor_required_error' ) );
        }

    }


    /**
     * defines requred constant
     * 
     * @access public
     */
    public function define_constants(){
        define('PEA_VERSION', '1.0.0');
        define('PEA_PLUGIN_PATH',    plugins_url( '/', __FILE__ ));
        define('PEA_THEME_DIR_PATH', plugins_url( '/', __FILE__ ));
    }


    /**
     * plugin initialize
     * 
     * @access public
     */
    public function plugin_init(){
      $this->file_includes();
    }

    /**
     * files includes
     * 
     * @access public
     */
    public function file_includes(){
     require_once __DIR__ . '/inc/pea-register-widget.php';
    }


    /**
     * elementor requred error 
     * 
     * @access public
     */
    public function elementor_required_error(){
     
    }

}

Pedro_Elementor_Addons::getInstance();