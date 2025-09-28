<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;


class PEA_Testimonial extends Widget_Base {

	public function get_name(){
		return 'pea_testimonial';
	}

	public function get_title(): string {
		return __( 'Testimonial', 'pedro-elementor-addons' );
	}

	public function get_icon(): string {
		return 'eicon-testimonial';
	}

	public function get_categories(): array {
		return [ 'first-category' ];
	}

	public function get_keywords(): array {
		return [ 'Testimonial'];
	}

	// Start content contorls
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Testimonial', 'elementor-addon' ),
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

		$this->end_controls_section();
        
	}

	protected function render(): void {
		?>
		<h2 class="pea_heading"> Hello World </2>
		<?php
	}
}