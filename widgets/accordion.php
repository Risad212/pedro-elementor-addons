<?php
namespace PedroEA\Widgets;

use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Repeater;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Pea_Accordion extends Widget_Base {

    public function get_name() {
        return 'pea_accordion';
    }

    public function get_title(): string {
        return __( 'Accordion', 'pedro-for-elementor-addons' );
    }

    public function get_icon(): string {
        return 'pedro-elementor-icon eicon-accordion';
    }

    public function get_categories(): array {
        return [ 'pedro' ];
    }

    public function get_keywords(): array {
        return [ 'accordion' ];
    }

    // Start content controls
    protected function register_controls() {

       

    }

   protected function render(): void {
    $settings = $this->get_settings_for_display();


    ?>
     <div class="accordion-container">
        <div class="accordion-item">
        <div class="accordion-trigger">
            <div class="accordion-title">What is Webflow and why is it the best website builder?</div>
            <div class="accordion-arrow">
            <div class="accordion-arrow-icon">
                <svg viewBox="-12 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>angle-right</title> <path d="M0.88 23.28c-0.2 0-0.44-0.080-0.6-0.24-0.32-0.32-0.32-0.84 0-1.2l5.76-5.84-5.8-5.84c-0.32-0.32-0.32-0.84 0-1.2 0.32-0.32 0.84-0.32 1.2 0l6.44 6.44c0.16 0.16 0.24 0.36 0.24 0.6s-0.080 0.44-0.24 0.6l-6.4 6.44c-0.2 0.16-0.4 0.24-0.6 0.24z"></path> </g></svg>
            </div>
            </div>
        </div>
        <div class="accordion-content">
            <div class="accordion-content-inner">
            <p class="accordion-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
        </div>

    <div class="accordion-item">
      <div class="accordion-trigger">
        <div class="accordion-title">How do I get started with Webflow?</div>
        <div class="accordion-arrow">
          <div class="accordion-arrow-icon">
            <svg viewBox="-12 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>angle-right</title> <path d="M0.88 23.28c-0.2 0-0.44-0.080-0.6-0.24-0.32-0.32-0.32-0.84 0-1.2l5.76-5.84-5.8-5.84c-0.32-0.32-0.32-0.84 0-1.2 0.32-0.32 0.84-0.32 1.2 0l6.44 6.44c0.16 0.16 0.24 0.36 0.24 0.6s-0.080 0.44-0.24 0.6l-6.4 6.44c-0.2 0.16-0.4 0.24-0.6 0.24z"></path> </g></svg>
          </div>
        </div>
      </div>
      <div class="accordion-content">
        <div class="accordion-content-inner">
          <p class="accordion-paragraph">Getting started is easy! Simply sign up for a free account, choose a template
            or start from scratch, and begin designing your website with our intuitive drag-and-drop interface. No
            coding required!</p>
        </div>
      </div>
    </div>
    </div>

    <?php }
}
