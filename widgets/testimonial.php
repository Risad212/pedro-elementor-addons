<?php
use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Image_Size;


class Pea_Testimonial extends Widget_Base {


   public function get_name(){
       return 'pea_testimonial';
   }


   public function get_title(): string {
       return __( 'Testimonial', 'pedro-elementor-addons' );
   }


   public function get_icon(): string {
       return 'eicon-testimonial pedro-elementor-icon';
   }


   public function get_categories(): array {
       return [ 'pedro' ];
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
           'testimonial_list',
           [
               'label'  => esc_html__( 'Testimonial', 'textdomain' ),
               'type'   => Controls_Manager::REPEATER,
               'fields' => [
                   [
                       'name'        => 'discription',
                       'label'       => esc_html__( 'Discription', 'textdomain' ),
                       'type'        => Controls_Manager::TEXTAREA,
                       'default'     => esc_html__( 'discription text' , 'textdomain' ),
                       'label_block' => true,
				   ],
				   [
                       'name'        => 'image',
                       'label'       => esc_html__( 'Image', 'textdomain' ),
                       'type'        => Controls_Manager::MEDIA,
                       'default'     => [
					    'url'        => Utils::get_placeholder_image_src(),
				       ],
                       'label_block' => true,
				   ],
				   [
                       'name'        => 'name',
                       'label'       => esc_html__( 'Name', 'textdomain' ),
                       'type'        => Controls_Manager::TEXT,
                       'default'     => esc_html__( 'Ema Watson', 'textdomain' ),
                       'label_block' => true,
				   ],
				   [
                       'name'        => 'designation',
                       'label'       => esc_html__( 'Designation', 'textdomain' ),
                       'type'        => Controls_Manager::TEXT,
                       'default'     => esc_html__( 'Founder', 'textdomain' ),
                       'label_block' => true,
				   ],

               ],
               'default' => [
                   [
                       'list_title'   => esc_html__( 'Review Item', 'textdomain' ),
                       'list_content' => esc_html__( 'Review text', 'textdomain' ),
                   ],
               ],
               'title_field' => '{{{ list_title }}}',
           ]
       );


       $this->end_controls_section();


      
      // style content
      $this->start_controls_section(
        'style_content',
        [
            'label' => esc_html__( 'Discription', 'pedro-elementor-addons' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );


    $this->add_control(
        'discription_color',
        [
            'label'     => esc_html__( 'Text Color', 'pedro-elementor-addons' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pea-testimonial-text' => 'color: {{VALUE}}',
            ],
        ]
    );
  
       $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'content_typography',
            'selector' => '{{WRAPPER}} .pea-testimonial-text',
        ]
    );


    $this->add_group_control(
        Group_Control_Text_Shadow::get_type(),
        [
            'name'     => 'text_shadow',
            'selector' => '{{WRAPPER}} .pea-testimonial-text',
        ]
    );
      
    $this->end_controls_section();


    // style image
     $this->start_controls_section(
        'style_image',
        [
            'label' => esc_html__( 'Image', 'pedro-elementor-addons' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );


    $this->add_control(
        'image_width',
        [
            'label'       => esc_html__( 'Width', 'textdomain' ),
            'type'        => Controls_Manager::SLIDER,
            'size_units'  => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
            'range'       => [
                'px'      => [
                    'min' => 20,
                    'max' => 200,
                ],
            ],
            'selectors'   => [
                '{{WRAPPER}} .pea-avatar' => 'width: {{SIZE}}{{UNIT}};',
            ]
        ]
      );

	  
    $this->add_control(
        'image_height',
        [
            'label'       => esc_html__( 'Height', 'textdomain' ),
            'type'        => Controls_Manager::SLIDER,
            'size_units'  => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
            'range'       => [
                'px'      => [
                    'min' => 20,
                    'max' => 200,
                ],
            ],
            'selectors'   => [
                '{{WRAPPER}} .pea-avatar' => 'height: {{SIZE}}{{UNIT}};',
            ]
        ]
      );

	  $this->add_responsive_control(
			'pea_testimonial_radius',
			[
				'label'      => __( 'Border radius', 'exclusive-addons-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '50',
					'right'  => '50',
					'bottom' => '50',
					'left'   => '50'
				],
				'selectors'  => [
					'{{WRAPPER}} .pea-avatar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
	  );

     $this->end_controls_section();


    // style name
     $this->start_controls_section(
        'style_name',
        [
            'label' => esc_html__( 'Name', 'pedro-elementor-addons' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );


    $this->add_control(
        'name_color',
        [
            'label'     => esc_html__( 'Text Color', 'textdomain' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pea-meta-name' => 'color: {{VALUE}}',
            ],
        ]
    );


    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'name_typography',
            'selector' => '{{WRAPPER}} .pea-meta-name',
        ]
    );


    $this->add_group_control(
        Group_Control_Text_Shadow::get_type(),
        [
            'name'     => 'name_text_shadow',
            'selector' => '{{WRAPPER}} .pea-meta-name',
        ]
    );


    $this->end_controls_section();


    // designation style
    $this->start_controls_section(
        'designation_section',
        [
            'label' => esc_html__( 'Designation', 'textdomain' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );


    $this->add_control(
        'designation_text_color',
        [
            'label'     => esc_html__( 'Text Color', 'textdomain' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pea-meta-designation' => 'color: {{VALUE}}',
            ],
        ]
    );


    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'designation_typography',
            'selector' => '{{WRAPPER}} .pea-meta-designation',
        ]
    );


    $this->add_group_control(
        Group_Control_Text_Shadow::get_type(),
        [
            'name'     => 'designation_text_shadow',
            'selector' => '{{WRAPPER}} .pea-meta-designation',
        ]
    );

    $this->end_controls_section();

   }


   protected function render(): void {
      
       $settings = $this->get_settings_for_display();
	   $testimonial_list = $settings['testimonial_list'];

       ?>
       <div class="pea-testimonial-wrapper">
           <!-- Swiper -->
           <div class="swiper pea-testimonial-slider">
           <div class="swiper-wrapper">
		      <?php 
			     foreach( $testimonial_list as $item ){
					?>
				   	<div class="swiper-slide">
					<div class="pea-testimonial-card">
						<p class="pea-testimonial-text">
						  <?php 
						  	 if( $item['discription'] ){
							   echo $item['discription'];
							 }
						   ?>
						</p>
						<div class="pea-testimonial-meta">
						<img class="pea-avatar" src="<?php echo $item['image']['url']; ?>" alt="">
						<div class="pea-meta-info">
							<strong class="pea-meta-name">
							<?php 
						  	 if( $item['name'] ){
							   echo $item['name'];
							 }?>
						   </strong>
							<small class="pea-meta-designation">
							<?php 
						  	  if( $item['designation'] ){
							   echo $item['designation'];
							 }?>
							</small>
						</div>
						</div>
					</div>
                   </div>
				 <?php } ?>
               
           <!-- Pagination -->
           <div class="pea-swiper-pagination"></div>

           <!-- Navigation -->

           <div class="pea-button-prev" aria-label="Previous slide">
               <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
               <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
               <g id="SVGRepo_iconCarrier">
                   <path d="M15 7L10 12L15 17" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                   stroke-linejoin="round"></path>
               </g>
               </svg>
           </div>

           <div class="pea-button-next" aria-label="Next slide">
               <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
               <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
               <g id="SVGRepo_iconCarrier">
                   <path d="M10 7L15 12L10 17" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                   stroke-linejoin="round"></path>
               </g>
               </svg>
           </div>
           </div>
       </div>

       <?php
   }
}

