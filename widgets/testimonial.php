<?php
namespace PedroEA\Widgets;

use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class PedroEA_Testimonial extends Widget_Base {

    public function get_name() {
        return 'pedroea_testimonial';
    }

    public function get_title(): string {
        return __( 'Testimonial', 'pedro-for-elementor-addons' );
    }

    public function get_icon(): string {
        return 'eicon-testimonial pedro-elementor-icon';
    }

    public function get_categories(): array {
        return [ 'pedroea' ];
    }

    public function get_keywords(): array {
        return [ 'Testimonial' ];
    }

    // Start content controls
    protected function register_controls() {

        $this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Testimonial', 'pedro-for-elementor-addons' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater for testimonials
        $this->add_control(
            'testimonial_list',
            [
                'label'   => __( 'Testimonial', 'pedro-for-elementor-addons' ),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => [
                    [
                        'name'        => 'description',
                        'label'       => __( 'Description', 'pedro-for-elementor-addons' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'pedro-for-elementor-addons' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'image',
                        'label'       => __( 'Image', 'pedro-for-elementor-addons' ),
                        'type'        => Controls_Manager::MEDIA,
                        'default'     => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'name',
                        'label'       => __( 'Name', 'pedro-for-elementor-addons' ),
                        'type'        => Controls_Manager::TEXT,
                        'default'     => __( 'Ema Watson', 'pedro-for-elementor-addons' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'designation',
                        'label'       => __( 'Designation', 'pedro-for-elementor-addons' ),
                        'type'        => Controls_Manager::TEXT,
                        'default'     => __( 'Founder', 'pedro-for-elementor-addons' ),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'name'        => __( 'Ema Watson', 'pedro-for-elementor-addons' ),
                        'designation' => __( 'Founder', 'pedro-for-elementor-addons' ),
                        'description' => __( 'Great service and support.', 'pedro-for-elementor-addons' ),
                    ],
                    [
                        'name'        => __( 'John Doe', 'pedro-for-elementor-addons' ),
                        'designation' => __( 'CEO', 'pedro-for-elementor-addons' ),
                        'description' => __( 'Highly recommend this company.', 'pedro-for-elementor-addons' ),
                    ],
                ],
                'title_field' => '{{{ name }}}',
            ]
        );

        // Arrow Icons
        $this->add_control(
            'arrow_prev_icon',
            [
                'label'   => __( 'Previous Icon', 'pedro-for-elementor-addons' ),
                'type'    => Controls_Manager::ICONS,
                'skin'    => 'inline',
                'default' => [
                    'value'   => 'fas fa-chevron-left',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'arrow_next_icon',
            [
                'label'   => __( 'Next Icon', 'pedro-for-elementor-addons' ),
                'type'    => Controls_Manager::ICONS,
                'skin'    => 'inline',
                'separator' => 'after',
                'default' => [
                    'value'   => 'fas fa-chevron-right',
                    'library' => 'fa-solid',
                ],
            ]
        );

        // Switches
        $switches = [
            'image_switch'       => 'Image',
            'name_switch'        => 'Name',
            'designation_switch' => 'Designation',
            'description_switch' => 'Description',
            'pagination_switch'  => 'Pagination',
            'navigation_switch'  => 'Navigation',
        ];

        foreach ( $switches as $key => $label ) {
            $this->add_control(
                $key,
                [
                    'label'        => esc_html( $label ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'pedro-for-elementor-addons' ),
                    'label_off'    => __( 'Hide', 'pedro-for-elementor-addons' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );
        }

        $this->end_controls_section();
        
    }

    protected function render(): void {
        $settings         = $this->get_settings_for_display();
        $testimonial_list = $settings['testimonial_list'];
        ?>
        <div class="pea-testimonial-wrapper">
            <div class="swiper pea-testimonial-slider">
                <div class="swiper-wrapper">
                    <?php foreach ( $testimonial_list as $item ) : ?>
                        <div class="swiper-slide">
                            <div class="pea-testimonial-card">

                                <?php if ( ! empty( $settings['description_switch'] ) ) : ?>
                                    <p class="pea-testimonial-text">
                                        <?php echo esc_html( $item['description'] ); ?>
                                    </p>
                                <?php endif; ?>

                                <div class="pea-testimonial-meta">
                                    <?php if ( ! empty( $settings['image_switch'] ) ) : ?>
                                        <img class="pea-avatar"
                                             src="<?php echo esc_url( $item['image']['url'] ); ?>"
                                             alt="<?php echo esc_attr( $item['name'] ); ?>">
                                    <?php endif; ?>

                                    <div class="pea-meta-info">
                                        <?php if ( ! empty( $settings['name_switch'] ) ) : ?>
                                            <strong class="pea-meta-name">
                                                <?php echo esc_html( $item['name'] ); ?>
                                            </strong>
                                        <?php endif; ?>

                                        <?php if ( ! empty( $settings['designation_switch'] ) ) : ?>
                                            <small class="pea-meta-designation">
                                                <?php echo esc_html( $item['designation'] ); ?>
                                            </small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Pagination -->
            <?php if ( ! empty( $settings['pagination_switch'] ) ) : ?>
                <div class="pea-swiper-pagination"></div>
            <?php endif; ?>

            <!-- Navigation -->
            <?php if ( ! empty( $settings['navigation_switch'] ) ) : ?>
                <div class="navigation-button pea-button-prev" aria-label="Previous slide">
                    <span class="pea-icon-prev pea-nav-icon">
                        <?php Icons_Manager::render_icon( $settings['arrow_prev_icon'], ['aria-hidden' => 'true'] ); ?>
                    </span>
                </div>

                <div class="navigation-button pea-button-next" aria-label="Next slide">
                    <span class="pea-icon-next pea-nav-icon">
                        <?php Icons_Manager::render_icon( $settings['arrow_next_icon'], ['aria-hidden' => 'true'] ); ?>
                    </span>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}
