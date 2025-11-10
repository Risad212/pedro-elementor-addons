<?php
namespace PedroEA\Widgets;

use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Pea_Timeline extends Widget_Base {

	public function get_name(){
		return 'pea_timeline';
	}

	public function get_title(): string {
		return __( 'Timeline', 'pedro-for-elementor-addons' );
	}

	public function get_icon(): string {
		return 'eicon-time-line pedro-elementor-icon';
	}

	public function get_categories(): array {
		return [ 'pedro' ];
	}

	public function get_keywords(): array {
		return [ 'Timeline' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'pedro-for-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'icon',
			[
				'label'        => esc_html__( 'Icon', 'pedro-for-elementor-addons' ),
				'type'         => Controls_Manager::ICONS,
				'default'      => [
					'value'    => 'fa-solid fa-graduation-cap',
					'library'  => 'fa-solid',
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'pedro-for-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Timeline Title', 'pedro-for-elementor-addons' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'education_info',
			[
				'label'       => esc_html__( 'Education Info', 'pedro-for-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Computer Science at Harvard University', 'pedro-for-elementor-addons' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'pedro-for-elementor-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Page layouts look better with something in each section.', 'pedro-for-elementor-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'timeline_list',
			[
				'label'       => esc_html__( 'Timeline', 'pedro-for-elementor-addons' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default' => [
					[
						'list_title'   => esc_html__( 'Title #1', 'pedro-for-elementor-addons' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'pedro-for-elementor-addons' ),
					],
					[
						'list_title'   => esc_html__( 'Title #2', 'pedro-for-elementor-addons' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'pedro-for-elementor-addons' ),
					]
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'switch_icon',
			[
				'label'        => esc_html__( 'Icon', 'pedro-for-elementor-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'pedro-for-elementor-addons' ),
				'label_off'    => esc_html__( 'Hide', 'pedro-for-elementor-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);


		$this->add_control(
			'switch_title',
			[
				'label'        => esc_html__( 'Title', 'pedro-for-elementor-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'pedro-for-elementor-addons' ),
				'label_off'    => esc_html__( 'Hide', 'pedro-for-elementor-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'switch_education',
			[
				'label'        => esc_html__( 'education info', 'pedro-for-elementor-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'pedro-for-elementor-addons' ),
				'label_off'    => esc_html__( 'Hide', 'pedro-for-elementor-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'switch_discription',
			[
				'label'        => esc_html__( 'discription', 'pedro-for-elementor-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'pedro-for-elementor-addons' ),
				'label_off'    => esc_html__( 'Hide', 'pedro-for-elementor-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->end_controls_section();

		// icon style
		$this->start_controls_section(
			'icon_section',
			[
				'label' => esc_html__( 'Icon', 'pedro-for-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label'        => esc_html__( 'Size', 'pedro-for-elementor-addons' ),
				'type'         => Controls_Manager::SLIDER,
				'size_units'   => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'        => [
					'px'       => [
						'min'  => 0,
						'step' => 1,
					],
				],
				'default'       => [
					'unit'      => 'px',
					'size'      => 35,
				],
				'selectors'     => [
					'{{WRAPPER}} .pea-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			  'icon_color',
			[
				'label'     => esc_html__( 'Color', 'pedro-for-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pea-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			  'icon_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'pedro-for-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pea-icon' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'border',
				'selector' => '{{WRAPPER}} .pea-icon',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'selector' => '{{WRAPPER}} .pea-icon',
			]
		);


		$this->end_controls_section();

		// title style
		$this->start_controls_section(
			'title_section',
			[
				'label' => esc_html__( 'Title', 'pedro-for-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			 Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .pea-title',
			]
		);

			$this->add_control(
			  'title_color',
			[
				'label'     => esc_html__( 'Color', 'pedro-for-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pea-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		// education style
		$this->start_controls_section(
			'education_section',
			[
				'label' => esc_html__( 'Education', 'pedro-for-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			 Group_Control_Typography::get_type(),
			[
				'name'     => 'education_typography',
				'selector' => '{{WRAPPER}} .pea-title-text',
			]
		);

			$this->add_control(
			  'education_color',
			[
				'label'     => esc_html__( 'Color', 'pedro-for-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pea-title-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		// discription style
		$this->start_controls_section(
			'discription_section',
			[
				'label' => esc_html__( 'Discription', 'pedro-for-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			 Group_Control_Typography::get_type(),
			[
				'name'     => 'discription_typography',
				'selector' => '{{WRAPPER}} .pea-description',
			]
		);

			$this->add_control(
			  'discription_color',
			[
				'label'     => esc_html__( 'Color', 'pedro-for-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pea-description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		
	}

	protected function render(): void {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['timeline_list'] ) ) {
			return;
		}
		?>
		<div class="pea-main-timeline">
			<?php foreach ( $settings['timeline_list'] as $item ) : ?>
				<div class="pea-timeline">

					<?php if( !empty( $settings['switch_icon'] ) ){ ?>
					   <span class="pea-icon">
						 <?php
						  if ( ! empty( $item['icon']['value'] ) ) {
							Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] );
						  } else {
							echo '<i class="fa-solid fa-graduation-cap" aria-hidden="true"></i>';
						  }?>
					</span>
					<?php }?>
					
					<div class="pea-timeline-content">
						<?php if( !empty( $settings['switch_title'] ) ){ ?>
	                      <h3 class="pea-title"><?php echo esc_html( $item['title'] ); ?></h3>
						 <?php }?>
						 <?php if( !empty( $settings['switch_education'] ) ){ ?>
                           <h5 class="pea-title-text"><?php echo esc_html( $item['education_info'] ); ?></h5>
						<?php } ?>
						
						<?php if( !empty( $settings['switch_discription'] ) ){ ?>
                           <p class="pea-description"><?php echo esc_html( $item['description'] ); ?></p>
						<?php } ?>
						
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}
}
