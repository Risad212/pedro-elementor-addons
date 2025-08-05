<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;

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
		$this->end_controls_section();


		//Start Style Controls
		$this->start_controls_section(
			'Style',
			[
				'label' => __( 'Heading', 'elementor-addon' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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

		$this->end_controls_section();
        
	}

	protected function render(): void {
		?>
		<h2 class="pea_heading"> Hello World </2>
		<?php
	}

	protected function content_template(): void {
		?>
		<p> Hello World </p>
		<?php
	}
}