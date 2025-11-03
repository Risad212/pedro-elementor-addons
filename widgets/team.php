<?php

use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Css_Filter;


class Pea_Team extends Widget_Base {

    public function get_name() {
        return 'pea_team';
    }

    public function get_title(): string {
        return __( 'Team', 'pedro-elementor-addons' );
    }

    public function get_icon(): string {
        return 'eicon-person pedro-elementor-icon';
    }

    public function get_categories(): array {
        return [ 'pedro' ];
    }

    public function get_keywords(): array {
        return [ 'team', 'member', 'crew', 'staff', 'person' ];
    }

    // Start content controls
    protected function register_controls() {

        $this->start_controls_section(
            'section_title',
            [
                'label'   => __( 'Information', 'pedro-elementor-addons' ),
                'tab'     => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'team_image',
			[
				'label'   => __( 'Choose Image', 'pedro-elementor-addons' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'    => 'thumbnail', 
				'exclude' => [ 'custom' ],
				'default' => 'large',
			]
		);

        	$this->add_control(
			 'team_name',
			[
				'label'       => __( 'Name', 'pedro-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
                'label_block' => true,
				'default'     => __( 'Pedro Team Member', 'pedro-elementor-addons' ),
				'placeholder' => __( 'Type Member Name',  'pedro-elementor-addons' ),
			]
		);

        $this->add_control(
			 'job_title',
			[
				'label'       => __( 'Job Title', 'pedro-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
                'label_block' => true,
				'default'     => __( 'Pedro Office', 'pedro-elementor-addons' ),
				'placeholder' => __( 'Type Member Job Title',  'pedro-elementor-addons' ),
			]
		);

        
		$this->add_control(
			'team_bio',
			[
				'label'       => __( 'Short Bio', 'pedro-elementor-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 5,
				'placeholder' => __( 'A Happy Pedro Member!', 'pedro-elementor-addons' ),
			]
		);

        $this->add_control(
            'title_tag',
            [
                'label'    => __( 'Title HTML Tag', 'pedro-elementor-addons' ),
                'type'     => Controls_Manager::SELECT,
                'default'  => 'h2',
                'options'  => [
                    'h1'   => __(  'H1', 'pedro-elementor-addons' ),
                    'h2'   => __(  'H2', 'pedro-elementor-addons' ),
                    'h3'   => __(  'H3', 'pedro-elementor-addons' ),
                    'h4'   => __(  'H4', 'pedro-elementor-addons' ),
                    'h5'   => __(  'H5', 'pedro-elementor-addons' ),
                    'h6'   => __(  'H6', 'pedro-elementor-addons' ),
                    'div'  => __(  'DIV', 'pedro-elementor-addons' ),
                    'span' => __(  'SPAN', 'pedro-elementor-addons' ),
                ],
            ]
        );

        $this->add_responsive_control(
			'team_align',
			[
				'label'          => __( 'Alignment', 'pedro-elementor-addons' ),
				'type'           => Controls_Manager::CHOOSE,
				'options'        => [
					'left'       => [
						'title'  => __( 'Left', 'pedro-elementor-addons' ),
						'icon'   => 'eicon-text-align-left',
					],
					'center'     => [
						'title'  => __( 'Center', 'pedro-elementor-addons' ),
						'icon'   => 'eicon-text-align-center',
					],
					'right'      => [
						'title'  => __( 'Right', 'pedro-elementor-addons' ),
						'icon'   => 'eicon-text-align-right',
					],
					'justify'    => [
						'title'  => __( 'Justify', 'pedro-elementor-addons' ),
						'icon'   => 'eicon-text-align-justify',
					],
				],
				'toggle'          => true,
				'selectors'       => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Photo', 'pedro-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		 );

        $this->add_responsive_control(
			'image_width',
			[
				'label'       => __( 'Width', 'pedro-elementor-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => [ 'px', '%'],
				'range'       => [
					'%'       => [
						'min' => 20,
						'max' => 100,
					],
					'px'      => [
						'min' => 100,
						'max' => 700,
					],
				],
				'selectors'   => [
					'{{WRAPPER}} .pea-team-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'image_height',
			[
				'label'       => __( 'Height', 'pedro-elementor-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'range'       => [
					'px'      => [
						'min' => 100,
						'max' => 700,
					],
				],
				'selectors'   => [
					'{{WRAPPER}} .pea-team-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        	$this->add_responsive_control(
			'image_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'pedro-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .pea-team-img' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

        $this->add_responsive_control(
			'image_padding',
			[
				'label'      => __( 'Padding', 'pedro-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .pea-team-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'image_border',
				'selector' => '{{WRAPPER}} .pea-team-img',
			]
		);

        $this->add_control(
			'image_border_radius',
			[
				'label'      => __( 'Margin', 'pedro-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors'  => [
					'{{WRAPPER}} .pea-team-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'selector' => '{{WRAPPER}} .pea-team-img',
			]
		);

        	$this->add_control(
			'background_color',
			[
				'label'     => __( 'Background Color', 'pedro-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pea-team-img' => 'background: {{VALUE}}',
				],
			]
		);


        $this->start_controls_tabs('style_tabs');

        $this->start_controls_tab(
            'tab_image_opacity_normal',
            [
                'label' => __( 'Normal', 'pedro-elementor-addons' ),
            ]
        );

        $this->add_control(
			'image_opacity_normal',
			[
				'label'        => __( 'Opacity', 'pedro-elementor-addons' ),
				'type'         => Controls_Manager::SLIDER,
				'range'        => [
					'px'       => [
						'min'  => 0.10,
						'max'  => 1,
						'step' => 0.01,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .pea-team-img' => 'opacity: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_image_opacity_hover',
            [
                'label' => __( 'Hover', 'pedro-elementor-addons' ),
            ]
        );

        $this->add_control(
			'image_opacity_hover',
			[
				'label'        => __( 'Opacity', 'pedro-elementor-addons' ),
				'type'         => Controls_Manager::SLIDER,
				'range'        => [
					'px'       => [
						'min'  => 0.10,
						'max'  => 1,
						'step' => 0.01,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .pea-team-img' => 'opacity: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'img_hover_transition',
			[
				'label'        => __( 'Transition Duration', 'pedro-elementor-addons' ),
				'type'         => Controls_Manager::SLIDER,
				'range'        => [
					'px'       => [
						'max'  => 3,
						'step' => 0.1,
					],
				],
				'default'      => [
					'size'     => .2,
				],
				'selectors'    => [
					'{{WRAPPER}} .pea-team-img' => 'transition-duration: {{SIZE}}s;',
				],
			]
		);

        $this->end_controls_tab();

        $this->end_controls_tabs();
       
        // css filter
        $this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name'     => 'img_css_filters',
				'selector' => '{{WRAPPER}} .pea-team-img',
			]
		);

        $this->end_controls_tab();

        $this->end_controls_section();

      // Name, Job Title, Bio
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Name, Job Title & Bio', 'pedro-elementor-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'Content Padding',
            [
                'label'      => __( 'Content Padding', 'pedro-elementor-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .pea-card-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
			'title_spacing',
			[
				'label'      => __( 'Name Bottom Spacing', 'pedro-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
                'separator'  => 'before',
				'selectors'  => [
					'{{WRAPPER}} .pea-team-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

       $this->add_control(
			'name_color',
			[
				'label'     => __( 'Color', 'pedro-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pea-team-title' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'name_typography',
				'selector' => '{{WRAPPER}} .pea-team-title',
			]
		);

        
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'name_shadow',
				'selector' => '{{WRAPPER}} .pea-team-title',
                'separator' => 'before',
			]
		);

        // job title
        $this->add_responsive_control(
			'job_title_spacing',
			[
				'label'      => __( 'Job Title Bottom Spacing', 'pedro-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
                'separator' => 'before',
				'selectors'  => [
					'{{WRAPPER}} .pea-team-position' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

       $this->add_control(
			'job_title_color',
			[
				'label'     => __( 'Color', 'pedro-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pea-team-position' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'job_title_typography',
				'selector' => '{{WRAPPER}} .pea-team-position',
			]
		);

        
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'job_title_shadow',
				'selector' => '{{WRAPPER}} .pea-team-position',
                'separator' => 'before',
			]
		);

        // short bio
        $this->add_responsive_control(
			'short_bio_spacing',
			[
				'label'      => __( 'Short Bio Bottom Spacing', 'pedro-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
                'separator'  => 'before',
				'selectors'  => [
					'{{WRAPPER}} .pea-short-disc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

       $this->add_control(
			'short_bio_color',
			[
				'label'     => __( 'Color', 'pedro-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pea-short-disc' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'short_bio_typography',
				'selector' => '{{WRAPPER}} .pea-short-disc',
			]
		);

        
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'short_bio_shadow',
				'selector' => '{{WRAPPER}} .pea-short-disc',
                'separator' => 'after',
			]
		);
        
        $this->end_controls_section();


    }

    protected function render(): void {
        
        $settings = $this->get_settings_for_display();

        ?>
            <div class="pea-team-card">
                <div class="pea-card-img">
                    <img class="pea-team-img" src="#" alt="Team Member">
                    <div class="pea-social-media">
                        <ul class="pea-social-media">
                            <li class="pea-item">
                                <a href="#">
                                    <!-- Facebook -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                        <path
                                            d="M279.14 288l14.22-92.66h-88.91V127.83c0-25.35 12.42-50.06 52.24-50.06H295V6.26S259.76 0 225.36 0c-73.22 0-121.09 44.38-121.09 124.72v70.62H22.89V288h81.38v224h100.17V288z" />
                                    </svg>
                                </a>
                            </li>
                            <li class="pea-item">
                                <a href="#">
                                    <!-- Twitter (X) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M459.4 151.7c.32 4.54.32 9.1.32 13.67 0 139.2-106 299.36-299.34 299.36A296.77 296.77 0 010 408.3a218.32 218.32 0 00162.29-45.21A105.25 105.25 0 0163.1 306a132.43 132.43 0 0019.88 1.63 111.09 111.09 0 0027.61-3.55A105.2 105.2 0 0120.9 201v-1.32a105.61 105.61 0 0047.55 13.12A105.25 105.25 0 0135.7 93.45a298.74 298.74 0 00217.13 110.16 118.64 118.64 0 01-2.61-24.06A105.23 105.23 0 01356 74.3a206.23 206.23 0 0066.74-25.5 105.12 105.12 0 01-46.17 58.11A210.76 210.76 0 00512 97.2a226.94 226.94 0 01-52.6 54.5z" />
                                    </svg>
                                </a>
                            </li>
                            <li class="pea-item">
                                <a href="#">
                                    <!-- Instagram -->
                                    <svg viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z"
                                                ></path>
                                            <path
                                                d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z"
                                                ></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z"
                                                ></path>
                                        </g>
                                    </svg>

                                </a>
                            </li>
                            <li class="pea-item">
                                <a href="#">
                                    <!-- LinkedIn -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            d="M100.28 448H7.4V148.9h92.88zm-46.44-340a53.7 53.7 0 1153.7-53.7 53.7 53.7 0 01-53.7 53.7zm394.34 340h-92.68V302.4c0-34.7-12.4-58.4-43.5-58.4-23.7 0-37.8 16-44 31.4-2.3 5.5-2.8 13.2-2.8 21v151.6H174.2s1.2-246.1 0-271.9h92.7v38.5a92.3 92.3 0 0183.5-45.9c60.9 0 106.6 39.8 106.6 125.2z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>

                   </div>
                </div>
                <div class="pea-card-content">
                    <h4 class="pea-team-title"><a href="#">Ema Jackson</a></h4>
                    <span class="pea-team-position">Project Manager</span>
                    <p class="pea-short-disc">A small river named Duden flows by their place and supplies it with the
                        necessary</p>
                </div>
            </div>
      <?php
    }
}
