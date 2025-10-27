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
              'label' => __( 'Testimonial', 'pedro-elementor-addons' ),
              'tab'   => Controls_Manager::TAB_CONTENT,
          ]
      );




      $this->add_control(
          'testimonial_list',
          [
              'label'               => esc_html__( 'Testimonial', 'pedro-elementor-addons' ),
              'type'                => Controls_Manager::REPEATER,
              'fields'              => [
                  [
                      'name'        => 'discription',
                      'label'       => esc_html__( 'Discription', 'pedro-elementor-addons' ),
                      'type'        => Controls_Manager::TEXTAREA,
                      'default'     => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s' , 'pedro-elementor-addons' ),
                      'label_block' => true,
                  ],
                  [
                      'name'        => 'image',
                      'label'       => esc_html__( 'Image', 'pedro-elementor-addons' ),
                      'type'        => Controls_Manager::MEDIA,
                      'default'     => [
                       'url'        => Utils::get_placeholder_image_src(),
                      ],
                      'label_block' => true,
                  ],
                  [
                      'name'        => 'name',
                      'label'       => esc_html__( 'Name', 'pedro-elementor-addons' ),
                      'type'        => Controls_Manager::TEXT,
                      'default'     => esc_html__( 'Ema Watson', 'pedro-elementor-addons' ),
                      'label_block' => true,
                  ],
                  [
                      'name'        => 'designation',
                      'label'       => esc_html__( 'Designation', 'pedro-elementor-addons' ),
                      'type'        => Controls_Manager::TEXT,
                      'default'     => esc_html__( 'Founder', 'pedro-elementor-addons' ),
                      'label_block' => true,
                  ]


              ],
              'default'              => [
                  [
                      'list_title'   => esc_html__( 'Testimonial Item', 'pedro-elementor-addons' ),
                      'list_content' => esc_html__( 'Review text', 'pedro-elementor-addons' ),
                  ],
                  [
                      'list_title'   => esc_html__( 'Testimonial Item', 'pedro-elementor-addons' ),
                      'list_content' => esc_html__( 'Review text', 'pedro-elementor-addons' ),
                  ],
                  [
                      'list_title'   => esc_html__( 'Testimonial Item', 'pedro-elementor-addons' ),
                      'list_content' => esc_html__( 'Review text', 'pedro-elementor-addons' ),
                  ],
                  [
                      'list_title'   => esc_html__( 'Testimonial Item', 'pedro-elementor-addons' ),
                      'list_content' => esc_html__( 'Review text', 'pedro-elementor-addons' ),
                  ]
              ],
              'title_field'          => '{{{ list_title }}}',
          ]
      );

       // Navigation Icons (Previous & Next)
        $this->add_control(
            'navigation_icon',
            [
                'label'       => esc_html__( 'Previous Navigation Icon', 'pedro-elementor-addons' ),
                'type'        => Controls_Manager::ICONS,
                'default'     => [
                    'value'   => 'fas fa-arrow-left',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid'   => [ 'arrow-left', 'chevron-left' ],
                    'fa-regular' => [ 'arrow-alt-circle-left' ],
                ],
            ]
        );


        $this->add_control(
           'image_switch',
           [
               'label'        => esc_html__( 'Image', 'pedro-elementor-addons' ),
               'type'         => Controls_Manager::SWITCHER,
               'label_on'     => esc_html__( 'Show', 'pedro-elementor-addons' ),
               'label_off'    => esc_html__( 'Hide', 'pedro-elementor-addons' ),
               'return_value' => 'yes',
               'default'      => 'yes',
           ]
       );


       $this->add_control(
           'name_switch',
           [
               'label'        => esc_html__( 'Name', 'pedro-elementor-addons' ),
               'type'         => Controls_Manager::SWITCHER,
               'label_on'     => esc_html__( 'Show', 'pedro-elementor-addons' ),
               'label_off'    => esc_html__( 'Hide', 'pedro-elementor-addons' ),
               'return_value' => 'yes',
               'default'      => 'yes',
           ]
       );


       $this->add_control(
           'designation_switch',
           [
               'label'        => esc_html__( 'Designation', 'pedro-elementor-addons' ),
               'type'         => Controls_Manager::SWITCHER,
               'label_on'     => esc_html__( 'Show', 'pedro-elementor-addons' ),
               'label_off'    => esc_html__( 'Hide', 'pedro-elementor-addons' ),
               'return_value' => 'yes',
               'default'      => 'yes',
           ]
       );


        $this->add_control(
           'discription_switch',
           [
               'label'        => esc_html__( 'Designation', 'pedro-elementor-addons' ),
               'type'         => Controls_Manager::SWITCHER,
               'label_on'     => esc_html__( 'Show', 'pedro-elementor-addons' ),
               'label_off'    => esc_html__( 'Hide', 'pedro-elementor-addons' ),
               'return_value' => 'yes',
               'default'      => 'yes',
           ]
       );


        $this->add_control(
           'pagination_switch',
           [
               'label'        => esc_html__( 'Pagination', 'pedro-elementor-addons' ),
               'type'         => Controls_Manager::SWITCHER,
               'label_on'     => esc_html__( 'Show', 'pedro-elementor-addons' ),
               'label_off'    => esc_html__( 'Hide', 'pedro-elementor-addons' ),
               'return_value' => 'yes',
               'default'      => 'yes',
           ]
       );


         $this->add_control(
           'navigation_switch',
           [
               'label'        => esc_html__( 'Navigation', 'pedro-elementor-addons' ),
               'type'         => Controls_Manager::SWITCHER,
               'label_on'     => esc_html__( 'Show', 'pedro-elementor-addons' ),
               'label_off'    => esc_html__( 'Hide', 'pedro-elementor-addons' ),
               'return_value' => 'yes',
               'default'      => 'yes',
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
           'label'       => esc_html__( 'Width', 'pedro-elementor-addons' ),
           'type'        => Controls_Manager::SLIDER,
           'size_units'  => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
           'range'       => [
               'px'      => [
                   'min' => 20,
                   'max' => 200,
               ],
           ],
           'default'     => [
               'unit'    => 'px',
               'size'    => 50,
           ],
           'selectors'   => [
               '{{WRAPPER}} .pea-avatar' => 'width: {{SIZE}}{{UNIT}};',
           ]
       ]
     );


    
   $this->add_control(
       'image_height',
       [
           'label'       => esc_html__( 'Height', 'pedro-elementor-addons' ),
           'type'        => Controls_Manager::SLIDER,
           'size_units'  => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
           'range'       => [
               'px'      => [
                   'min' => 20,
                   'max' => 200,
               ],
           ],
           'default'     => [
               'unit'    => 'px',
               'size'    => 50,
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
           'label'     => esc_html__( 'Text Color', 'pedro-elementor-addons' ),
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
           'label' => esc_html__( 'Designation', 'pedro-elementor-addons' ),
           'tab'   => Controls_Manager::TAB_STYLE,
       ]
   );




   $this->add_control(
       'designation_text_color',
       [
           'label'     => esc_html__( 'Text Color', 'pedro-elementor-addons' ),
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


   // pagination style
   $this->start_controls_section(
       'pagination_section',
       [
           'label' => esc_html__( 'Pagination', 'pedro-elementor-addons' ),
           'tab'   => Controls_Manager::TAB_STYLE,
       ]
   );


   $this->add_control(
           'pagination_size',
           [
               'label'        => esc_html__( 'Size', 'pedro-elementor-addons' ),
               'type'         => Controls_Manager::SLIDER,
               'size_units'   => [ 'px', '%', 'em', 'rem', 'custom' ],
               'range'        => [
                   'px'       => [
                       'min'  => 1,
                       'step' => 1,
                   ]
               ],
               'default'      => [
                   'unit'     => 'px',
                   'size'     => 8,
               ],
               'selectors'    => [
                   '{{WRAPPER}} .pea-swiper-pagination .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
               ],
           ]
       );


       $this->add_control(
           'pagination_color',
           [
               'label'     => esc_html__( 'Color', 'pedro-elementor-addons' ),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .pea-swiper-pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
               ],
           ]
       );


       $this->add_control(
           'pagination_active_color',
           [
               'label'     => esc_html__( 'Active Color', 'pedro-elementor-addons' ),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .pea-swiper-pagination .swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
               ],
           ]
       );




   $this->end_controls_section();




   // Navigation style
   $this->start_controls_section(
       'navigation_section',
       [
           'label' => esc_html__( 'Navigation', 'pedro-elementor-addons' ),
           'tab'   => Controls_Manager::TAB_STYLE,
       ]
   );




     $this->add_control(
           'navigation_button_size',
           [
               'label'        => esc_html__( 'Button Size', 'pedro-elementor-addons' ),
               'type'         => Controls_Manager::SLIDER,
               'size_units'   => [ 'px', '%', 'em', 'rem', 'custom' ],
               'range'        => [
                   'px'       => [
                       'min'  => 1,
                       'step' => 1,
                   ]
               ],
               'default'      => [
                   'unit'     => 'px',
                   'size'     => 40,
               ],
               'selectors'    => [
                   '{{WRAPPER}} .navigation-button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
               ],
           ]
       );


       $this->add_control(
           'navigation_icon_size',
           [
               'label'        => esc_html__( 'Icon Size', 'pedro-elementor-addons' ),
               'type'         => Controls_Manager::SLIDER,
               'size_units'   => [ 'px', '%', 'em', 'rem', 'custom' ],
               'range'        => [
                   'px'       => [
                       'min'  => 1,
                       'step' => 1,
                   ]
               ],
               'default'      => [
                   'unit'     => 'px',
                   'size'     => 35,
               ],
               'selectors'    => [
                   '{{WRAPPER}} .navigation-button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
               ],
           ]
       );


         $this->add_control(
           'navigation_color',
           [
               'label'     => esc_html__( 'Backgroun Color', 'pedro-elementor-addons' ),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .navigation-button' => 'background-color: {{VALUE}};',
               ],
           ]
       );


        $this->add_control(
           'navigation_icon_color',
           [
               'label'     => esc_html__( 'Icon Color', 'pedro-elementor-addons' ),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .navigation-button svg' => 'fill: {{VALUE}};',
               ],
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
           <?php foreach ( $testimonial_list as $item ) : ?>
               <div class="swiper-slide">
               <div class="pea-testimonial-card">
                  
                   <?php if ( !empty( $settings['discription_switch'] ) )  { ?>
                       <p class="pea-testimonial-text">
                         <?php echo esc_html( $item['discription'] ); ?>
                       </p>
                   <?php }?>


                   <div class="pea-testimonial-meta">
                   <?php if ( ! empty( $settings['image_switch'] ) ) { ?>
                       <img class="pea-avatar"
                            src="<?php echo esc_url( $item['image']['url']); ?>"
                            alt="<?php echo esc_attr( $item['name']); ?>">
                     <?php }?>
                   <div class="pea-meta-info">
                       <?php if( ! empty( $settings['name_switch'] ) ){?>
                          <strong class="pea-meta-name">
                             <?php echo esc_html( $item['name']) ?>
                           </strong>
                       <?php }?>


                       <?php
                           if( ! empty( $settings['designation_switch'] ) ) {?>
                                <small class="pea-meta-designation">
                                 <?php echo esc_html( $item['designation']); ?>
                               </small>
                       <?php }?>
                      </div>
                   </div>
                   </div>
               </div>
               <?php endforeach; ?>
           </div>
          </div>


          <!-- Pagination -->
           <?php if( ! empty( $settings[ 'pagination_switch'] ) ) {?>
             <div class="pea-swiper-pagination"></div>
           <?php } ?>




         <!-- Navigation -->
        <?php if( ! empty( $settings['navigation_switch'] ) ) : 

    // Get the icon settings
    $nav_icon = $settings['navigation_icon']; 

?>
    <div class="navigation-button pea-button-prev" aria-label="Previous slide">
        <span class="pea-icon-prev">
            <?php
            if ( ! empty( $nav_icon['value'] ) ) {
                // Render Elementor icon if set
                \Elementor\Icons_Manager::render_icon( $nav_icon, [ 'aria-hidden' => 'true' ] );
            } else {
                // Default left arrow SVG
                echo '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 7L10 12L15 17" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>';
            }
            ?>
        </span>
    </div>

    <div class="navigation-button pea-button-next" aria-label="Next slide">
        <span class="pea-icon-next">
            <?php
            if ( ! empty( $nav_icon['value'] ) ) {
                // Render Elementor icon if set
                Icons_Manager::render_icon( $nav_icon, [ 'aria-hidden' => 'true' ] );
            } else {
                // Default right arrow SVG
                echo '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 7L15 12L10 17" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>';
            }
            ?>
        </span>
    </div>

<?php endif; ?>



       </div>
      <?php
  }
}
