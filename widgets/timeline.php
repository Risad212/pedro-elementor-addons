<?php
use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;

class Pea_Timeline extends Widget_Base {

	public function get_name(){
		return 'pea_timeline';
	}

	public function get_title(): string {
		return __( 'Timeline', 'pedro-elementor-addons' );
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
				'label' => esc_html__( 'Content', 'pedro-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon',
			[
				'label'   => esc_html__( 'Icon', 'pedro-elementor-addons' ),
				'type'    => Controls_Manager::ICONS,
				'default' => [
					'value'    => 'fa-solid fa-graduation-cap', // ✅ Font Awesome 6 format
					'library'  => 'fa-solid',
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'pedro-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Timeline Title', 'pedro-elementor-addons' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'education_info',
			[
				'label'       => esc_html__( 'Education Info', 'pedro-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Computer Science at Harvard University', 'pedro-elementor-addons' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'pedro-elementor-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Page layouts look better with something in each section.', 'pedro-elementor-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'timeline_list',
			[
				'label'       => esc_html__( 'Timeline', 'pedro-elementor-addons' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [],
				'title_field' => '{{{ title }}}',
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
					<span class="pea-icon">
						<?php
						if ( ! empty( $item['icon']['value'] ) ) {
							Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] );
						} else {
							echo '<i class="fa-solid fa-graduation-cap" aria-hidden="true"></i>';
						}
						?>
					</span>

					<div class="pea-timeline-content">
						<h3 class="pea-title"><?php echo esc_html( $item['title'] ); ?></h3>
						<h5 class="pea-title-text"><?php echo esc_html( $item['education_info'] ); ?></h5>
						<p class="pea-description"><?php echo esc_html( $item['description'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}
}
