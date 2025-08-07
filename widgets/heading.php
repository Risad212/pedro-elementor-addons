<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;

class PEA_Hedding extends Widget_Base {

	public function get_name(){
		return 'pea_heading';
	}

	public function get_title(): string {
		return __( 'Heading', 'pedro-elementor-addons' );
	}

	public function get_icon(): string {
		return 'eicon-e-heading';
	}

	public function get_categories(): array {
		return [ 'basic' ];
	}

	public function get_keywords(): array {
		return [ 'heading', 'title' ];
	}

	// Start content contorls
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Heading', 'elementor-addon' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => __( 'Heading', 'elementor-addon' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Heading', 'elementor-addon' ),
			]
		);


		$this->add_control(
			'link',
			[
				'label'      => esc_html__( 'Link', 'elementor' ),
				'type'       => Controls_Manager::URL,
				'dynamic'    => [
					'active' => true,
				],
				'default'    => [
					'url'    => '',
				],
			]
		);

	     $this->add_control(
			'heading_tag',
			[
				'label'    => esc_html__( 'HTML Tag', 'elementor' ),
				'type'     => Controls_Manager::SELECT,
				'options'  => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				],
				'default'  => 'h2',
			]
		);

		$this->end_controls_section();


		//Start Style Controls
		$this->start_controls_section(
			'Style',
			[
				'label' => __( 'Heading', 'elementor-addon' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'align',
			[
               'label'           => esc_html__( 'Alignment', 'elementor' ),
			   'type'            => Controls_Manager::CHOOSE,
			   'separator'       => 'after',
			   'options'         => [
				  'left'         => [
						'title'  => esc_html__( 'Left', 'elementor' ),
						'icon'   => 'eicon-text-align-left'
					],
					'center'     => [
						'title'  => esc_html__( 'Center', 'elementor' ),
						'icon'   => 'eicon-text-align-center'
					],
					'right'      => [
						'title'  => esc_html__( 'Right', 'elementor' ),
						'icon'   => 'eicon-text-align-right'
					],
					'justify'    => [
						'title'  => esc_html__( 'Justified', 'elementor' ),
						'icon'   => 'eicon-text-align-justify'
					]
				],
				'selectors'      => [
					'{{WRAPPER}} .pea_heading' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'color',
			[
				'label'                        => __( 'Color', 'elementor-addon' ),
				'type'                         =>  Controls_Manager::COLOR,
				'selectors'                    => [
					'{{WRAPPER}} .pea_heading' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'selector' => '{{WRAPPER}} .pea_heading',
			]
		);

		$this->end_controls_section();
        
	}

	protected function render(): void {
		?>
		<h2 class="pea_heading"> Hello World </2>
		<?php
	}
}