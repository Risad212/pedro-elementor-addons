<?php
namespace PedroEA\Widgets;

use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Icons_Manager;
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

      $this->start_controls_section(
            'section_title',
            [
                'label'   => __( 'Layout', 'pedro-for-elementor-addons' ),
                'tab'     => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        // Title
        $repeater->add_control(
            'title',
            [
                'label'       => __('Title', 'pea-for-elementor-addons'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Title', 'pea-for-elementor-addons'),
                'label_block' => true,
            ]
        );

        // Icon
        $repeater->add_control(
            'icon',
            [
                'label'       => __('Icon', 'pea-for-elementor-addons'),
                'type'        => Controls_Manager::ICONS,
                'default'     => [
                    'value'   => 'fas fa-chevron-right',
                    'library' => 'fa-solid',
                ],
            ]
        );

        // Content/Description
        $repeater->add_control(
            'content',
            [
                'label'      => __('Content', 'pea-for-elementor-addons'),
                'type'       => Controls_Manager::TEXTAREA,
                'default'    => __('Accordion content goes here...', 'pea-for-elementor-addons'),
                'show_label' => true,
            ]
        );

        // Add the repeater to the widget
        $this->add_control(
            'accordion_list',
            [
                'label' => __('Accordion Items', 'pea-for-elementor-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title'   => __('Accordion 1', 'pea-for-elementor-addons'),
                        'content' => __('Accordion content 1', 'pea-for-elementor-addons'),
                    ],
                    [
                        'title'   => __('Accordion 2', 'pea-for-elementor-addons'),
                        'content' => __('Accordion content 2', 'pea-for-elementor-addons'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
              

    }

   protected function render(): void {
    $settings = $this->get_settings_for_display();

    $accortion_list = $settings['accordion_list'];

    // var_dump( $accortion_list );

    if( empty( $accortion_list ) ){
        return;
    }
    
    ?>
     <div class="pea-accordion-container">
      <?php foreach( $accortion_list as $item ){?>
         <div class="pea-accordion-item">
        <div class="pea-accordion-trigger">
          <div class="pea-accordion-title">
            <?php echo esc_html($item['title']); ?>
          </div>
          <div class="pea-accordion-arrow">
            <div class="pea-accordion-arrow-icon">
                <?php if (!empty($item['icon'])) {
                   Icons_Manager::render_icon($item['icon'], [
                      'aria-hidden' => 'true',
                  ]);
                  }?>
            </div>
          </div>
        </div>
        <div class="pea-accordion-content">
          <div class="pea-accordion-content-inner">
            <p class="pea-accordion-paragraph">
              <?php echo  $item['content'] ?>
            </p>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>

    <?php }
}
