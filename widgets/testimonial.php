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
			'title',
			[
				'label'   => __( 'Content', 'elementor-addon' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => '10',
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor-addon' ),
			]
		);

		
		$this->add_control(
			'client_image',
			[
				'label' => esc_html__( 'Choose Image', 'pedro-elementor-addons' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'testimonial_image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `testimonial_image_size` and `testimonial_image_custom_dimension`.
				'default' => 'full',
			]
		);

		
		$this->add_control(
			'client_name',
			[
				'label' => esc_html__( 'Name', 'pedro-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'ai' => [
					'active' => false,
				],
				'default' => esc_html__( 'Ema Watson', 'pedro-elementor-addons' ),
			]
		);

       $this->add_control(
			'client_designation',
			[
				'label' => esc_html__( 'Title', 'pedro-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'ai' => [
					'active' => false,
				],
				'default' => esc_html__( 'WP Developer', 'pedro-elementor-addons' ),
			]
		);

		$aside = is_rtl() ? 'right' : 'left';

		$this->add_control(
			'testimonial_image_position',
			[
				'label' => esc_html__( 'Image Position', 'pedro-elementor-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'aside',
				'options' => [
					'aside' => [
						'title' => esc_html__( 'Aside', 'pedro-elementor-addons' ),
						'icon' => 'eicon-h-align-' . $aside,
					],
					'top' => [
						'title' => esc_html__( 'Top', 'pedro-elementor-addons' ),
						'icon' => 'eicon-v-align-top',
					],
				],
				'toggle' => false,
				'condition' => [
					'testimonial_image[url]!' => '',
				],
				'separator' => 'before',
				'style_transfer' => true,
			]
		);

		$this->add_responsive_control(
			'testimonial_alignment',
			[
				'label' => esc_html__( 'Alignment', 'pedro-elementor-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'pedro-elementor-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'pedro-elementor-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'pedro-elementor-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-wrapper' => 'text-align: {{VALUE}}',
				],
				'style_transfer' => true,
			]
		);
		
		$this->end_controls_section();
        
	   // style content
	   $this->start_controls_section(
			'style_content',
			[
				'label' => esc_html__( 'Content', 'pedro-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label'     => esc_html__( 'Text Color', 'pedro-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);
	
	    $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'text_shadow',
				'selector' => '{{WRAPPER}} .your-class',
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
			'image_size',
			[
				'label'      => esc_html__( 'Width', 'textdomain' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'width: {{SIZE}}{{UNIT}};',
				]
			]
		);

        $this->end_controls_section();


		// style image
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
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'name_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'name_text_shadow',
				'selector' => '{{WRAPPER}} .your-class',
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
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'designation_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'designation_text_shadow',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->end_controls_section();

	}

	protected function render(): void {
		?>
		<div class="pea-testimonial-wrapper">
			<!-- Swiper -->
			<div class="swiper pea-testimonial-slider">
			<div class="swiper-wrapper">

				<!-- Slide 1 -->
				<div class="swiper-slide">
				<div class="pea-testimonial-card">
					<p class="pea-testimonial-text">"Working with this team was a breeze — they turned our ideas into a
					beautiful, fast site. Communication stayed on point and delivery was on time."</p>
					<div class="pea-testimonial-meta">
					<img class="pea-avatar" src="headshot.webp" alt="">
					<div class="pea-meta-info">
						<strong>Ariana R.</strong>
						<small>Founder, Bloom Studio</small>
					</div>
					</div>
				</div>
				</div>

				<!-- Slide 2 -->
				<div class="swiper-slide">
				<div class="pea-testimonial-card">
					<p class="pea-testimonial-text">"Great attention to detail. The final product is exactly what we needed —
					modern, accessible, and easy to update. Highly recommend."</p>
					<div class="pea-testimonial-meta">
					<img class="pea-avatar" src="headshot.webp" alt="">
					<div class="pea-meta-info">
						<strong>Michael K.</strong>
						<small>Product Lead, NovaApps</small>
					</div>
					</div>
				</div>
				</div>

				<!-- Slide 3 -->
				<div class="swiper-slide">
				<div class="pea-testimonial-card">
					<p class="pea-testimonial-text">"They provided steady guidance and practical suggestions during the whole
					process. Our conversion rates improved after the redesign."</p>
					<div class="pea-testimonial-meta">
					<img class="pea-avatar" src="headshot.webp" alt="">
					<div class="pea-meta-info">
						<strong>Sana N.</strong>
						<small>Marketing Manager, Verde</small>
					</div>
					</div>
				</div>
				</div>

				<!-- Slide 4 -->
				<div class="swiper-slide">
				<div class="pea-testimonial-card">
					<p class="pea-testimonial-text">"They provided steady guidance and practical suggestions during the whole
					process. Our conversion rates improved after the redesign."</p>
					<div class="pea-testimonial-meta">
					<img class="pea-avatar" src="headshot.webp" alt="">
					<div class="pea-meta-info">
						<strong>Sana N.</strong>
						<small>Marketing Manager, Verde</small>
					</div>
					</div>
				</div>
				</div>
			</div>
			</div>

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