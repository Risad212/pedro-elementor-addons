<?php
use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;

class Pea_Testimonial extends Widget_Base {

    public function get_name() {
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
        return [ 'Testimonial' ];
    }

    // Start content controls
    protected function register_controls() {

        $this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Testimonial', 'pedro-elementor-addons' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->end_controls_section();
    }

    protected function render(): void {
        
        $settings = $this->get_settings_for_display();

        ?>
            <div class="pea-team-card">
                <div class="pea-card-img">
                    <img class="pea-img-fluid" src="doctor-1.png" alt="Team Member">
                    <ul class="pea-social-media">
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

                    </ul>
                </div>
                <div class="pea-card-content">
                    <h4 class="pea-title"><a href="#">Ema Jackson</a></h4>
                    <span class="pea-position">Project Manager</span>
                    <p class="pea-short-disc">A small river named Duden flows by their place and supplies it with the
                        necessary</p>
                </div>
            </div>
      <?php
    }
}
