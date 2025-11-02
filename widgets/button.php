<?php
use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;


class Pea_Button extends Widget_Base {


   public function get_name() {
       return 'pea_button';
   }


   public function get_title(): string {
       return __( 'Button', 'pedro-elementor-addons' );
   }


   public function get_icon(): string {
       return 'eicon-button pedro-elementor-icon';
   }


   public function get_categories(): array {
       return [ 'pedro' ];
   }


   public function get_keywords(): array {
       return [ 'Button' ];
   }


   // Start content controls
   protected function register_controls() {


       $this->start_controls_section(
           'section_title',
           [
               'label' => __( 'Button', 'pedro-elementor-addons' ),
               'tab'   => Controls_Manager::TAB_CONTENT,
           ]
       );


       $this->add_control(
           'button_text',
           [
               'label'   => esc_html__( 'Text', 'pedro-elementor-addons' ),
               'type'    => Controls_Manager::TEXT,
               'default' => esc_html__( 'Know More', 'pedro-elementor-addons' ),
           ]
       );


       $this->add_control(
           'button_link',
           [
               'label'   => esc_html__( 'Link', 'pedro-elementor-addons' ),
               'type'    => Controls_Manager::URL,
               'options' => [ 'url', 'is_external', 'nofollow' ],
               'default' => [
                   'url' => '#',
                   'is_external' => true,
                   'nofollow'    => true,
               ],
               'label_block'     => true,
           ]
       );

        $this->add_control(
			'pea_button_blend_toggle',
			[
				'label' => esc_html__( 'Show Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


       $this->end_controls_section();


       // Button style
       $this->start_controls_section(
           'style_section',
           [
               'label'   => esc_html__( 'Style', 'pedro-elementor-addons' ),
               'tab'     => Controls_Manager::TAB_STYLE,
           ]
       );


       $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'name'     => 'typography',
               'selector' => '{{WRAPPER}} .pea-button',
           ]
       );


       $this->add_group_control(
           Group_Control_Text_Shadow::get_type(),
           [
               'name'     => 'text_shadow',
               'selector' => '{{WRAPPER}} .pea-button',
           ]
       );


       // normal
       $this->start_controls_tabs( 'style_tabs' );


       $this->start_controls_tab(
           'style_normal_tab',
           [
               'label'     => esc_html__( 'Normal', 'pedro-elementor-addons' ),
           ]
       );


        $this->add_control(
           'text-color',
           [
               'label'     => esc_html__( 'Text Color', 'pedro-elementor-addons' ),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .pea-button' => 'color: {{VALUE}}',
               ],
           ]
       );


       $this->add_group_control(
           Group_Control_Background::get_type(),
           [
               'name'     => 'background',
               'types'    => [ 'classic', 'gradient'],
               'selector' => '{{WRAPPER}} .pea-button',
           ]
       );


       $this->end_controls_tab();


        // hover style
       $this->start_controls_tab(
           'style_hover_tab',
           [
               'label'    => esc_html__( 'hover', 'pedro-elementor-addons' ),
           ]
       );


        $this->add_control(
           'text-hover-color',
           [
               'label'     => esc_html__( 'Text Color', 'pedro-elementor-addons' ),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .pea-button' => 'color: {{VALUE}}',
               ],
           ]
       );


        $this->add_group_control(
           Group_Control_Background::get_type(),
           [
               'name'     => 'background_hover',
               'types'    => [ 'classic', 'gradient' ],
               'selector' => '{{WRAPPER}} .pea-button:before, {{WRAPPER}} .pea-button:after',
           ]
       );


        $this->add_control(
           'button_hover_color',
           [
               'label'     => esc_html__( 'Button Color', 'pedro-elementor-addons' ),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .pea-button:hover' => 'border-color: {{VALUE}}',
               ],
           ]
       );


       $this->add_control(
           'button_hover_transition_duration',
           [
               'label'      => esc_html__( 'Transition Duration', 'elementor' ),
               'type'       => Controls_Manager::SLIDER,
               'size_units' => [ 's', 'ms', 'custom' ],
               'default'    => [
                   'unit'   => 's',
               ],
               'selectors'  => [
                   '{{WRAPPER}} .pea-button' => 'transition-duration: {{SIZE}}{{UNIT}};',
               ],
           ]
       );


       $this->end_controls_tab();
       $this->end_controls_tabs();


       // box shadow
       $this->add_group_control(
           Group_Control_Box_Shadow::get_type(),
           [
               'name'     => 'box_shadow',
               'selector' => '{{WRAPPER}} .pea-button',
           ]
       );


       $this->add_group_control(
           Group_Control_Border::get_type(),
           [
               'name'     => 'button_border',
               'selector' => '{{WRAPPER}} .pea-button',
           ]
       );




       $this->add_responsive_control(
           'button_padding',
           [
               'label'      => esc_html__( 'Padding', 'pedro-elementor-addons' ),
               'type'       => Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
               'separator'  => 'before',
               'selectors'  => [
                   '{{WRAPPER}} .pea-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
               ]
           ]
       );


       $this->end_controls_section();
   }


   protected function render(): void {
       $settings = $this->get_settings_for_display();
     
       // add attribute to a tag
       $this->add_render_attribute( 'button', 'class', 'pea-button' );
       $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );

       // add new tab attribute
       $this->add_render_attribute( 'button', 'target', '_blank' );
       $this->add_render_attribute( 'button', 'rel', 'noopener noreferrer' );

       // toggle for switch blend
       if( 'yes' === $settings['pea_button_blend_toggle'] ){
          $this->add_render_attribute( 'button_blend', 'style', 'mix-blend-mode: difference;' );
       }
       ?>

       <a href="#" <?php echo $this->get_render_attribute_string('button') ?> > 
           <span <?php echo $this->get_render_attribute_string('button_blend') ?> >
              <?php echo esc_html( $settings['button_text'] ); ?>
          </span>
       </a>

       <?php
   }
}



