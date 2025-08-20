<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;

class PEA_Image extends Widget_Base {

    public function get_name(){
        return 'pea_image';
    }

    public function get_title(): string {
		return __( 'Image', 'pedro-elementor-addons' );
	}

    public function get_icon(): string {
		return 'eicon-e-image';
	}

	public function get_categories(): array {
		return [ 'basic' ];
	}

    public function get_keywords(): array {
		return [ 'image', 'picture' ];
	}

    // register control
    protected function register_controls(){

        // Content Tab Start
        $this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Setting', 'elementor-addon' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'image',
			[
				'label'   => esc_html__( 'Choose Image', 'textdomain' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

         $this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'exclude' => [ 'custom' ],
				'include' => [],
				'default' => 'large',
			]
		);

        $this->add_control(
			'image_caption',
			[
				'label'          => __( 'Imge Resulation', 'textdomain' ),
				'type'           =>  Controls_Manager::SELECT,
				'default'        => 'none',
				'options'        => [
					'attachment' => __( 'attachment caption', 'textdomain' ),
					'custom'     => __( 'custom caption', 'textdomain' ),
				],
			]
		);

        $this->end_controls_section();

    }

    protected function render(): void {
		?>
		 <img src="#" class="pea-image" alt="">
		<?php
	}
}