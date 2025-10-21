<?php
use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Image_Size;


class Pea_Timeline extends Widget_Base {

	public function get_name(){
		return 'pea_timeline';
	}

	public function get_title(): string {
		return __( 'Timeline', 'pedro-elementor-addons' );
	}

	public function get_icon(): string {
		return 'eicon-time-line  pedro-elementor-icon';
	}

	public function get_categories(): array {
		return [ 'pedro' ];
	}

	public function get_keywords(): array {
		return [ 'Timeline'];
	}

	// Start content contorls
	protected function register_controls(){
        
      $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'widget_title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);

		$this->end_controls_section();
    }

  protected function render(): void {
		$settings = $this->get_settings_for_display();

		?>

		<div class="pea-main-timeline">
        <div class="pea-timeline">
            <span class="pea-icon"><svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="1052 796 200 200" enable-background="new 1052 796 200 200" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M1151.998,921.75c-4.129,0-8.17-0.771-12.01-2.292l-50.167-19.888c0,11.08,0,27.65,0,32.066 c0,15.562,27.836,28.174,62.178,28.174s62.181-12.612,62.181-28.174v-32.067l-50.172,19.889 C1160.168,920.979,1156.127,921.75,1151.998,921.75z"></path> <path d="M1248.592,867.082l-87.989-34.878c-5.526-2.19-11.681-2.19-17.208,0l-87.988,34.878c-2.057,0.815-3.407,2.804-3.407,5.016 c0,2.213,1.351,4.201,3.407,5.017l12.317,4.882v34.925c-2.736,1.865-4.533,5.007-4.533,8.568c0,3.262,1.508,6.171,3.863,8.071 l-3.751,18.007c-0.503,2.416,0.108,4.931,1.666,6.845c1.557,1.915,3.894,3.026,6.361,3.026h4.449c2.468,0,4.804-1.111,6.361-3.026 c1.557-1.914,2.168-4.429,1.666-6.845l-3.752-18.007c2.356-1.9,3.864-4.81,3.864-8.071c0-3.562-1.797-6.703-4.533-8.568v-30.303 l63.729,25.264c5.708,2.263,12.063,2.263,17.771,0l87.709-34.768c2.057-0.815,3.407-2.804,3.407-5.017 C1252,869.886,1250.649,867.897,1248.592,867.082z"></path> </g> </g></svg></span>
            <div class="pea-timeline-content">
            <h3 class="pea-title">Harvard University</h3>
            <h5 class="pea-title-text">Computer Science</h5>
            <p class="pea-description">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit placeat tenetur, maiores, consectetur enim ullam quo earum laborum eius possimus alias repellendus illum!
            </p>
            </div>
        </div>

        <div class="pea-timeline">
            <span class="pea-icon"><svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="1052 796 200 200" enable-background="new 1052 796 200 200" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M1151.998,921.75c-4.129,0-8.17-0.771-12.01-2.292l-50.167-19.888c0,11.08,0,27.65,0,32.066 c0,15.562,27.836,28.174,62.178,28.174s62.181-12.612,62.181-28.174v-32.067l-50.172,19.889 C1160.168,920.979,1156.127,921.75,1151.998,921.75z"></path> <path d="M1248.592,867.082l-87.989-34.878c-5.526-2.19-11.681-2.19-17.208,0l-87.988,34.878c-2.057,0.815-3.407,2.804-3.407,5.016 c0,2.213,1.351,4.201,3.407,5.017l12.317,4.882v34.925c-2.736,1.865-4.533,5.007-4.533,8.568c0,3.262,1.508,6.171,3.863,8.071 l-3.751,18.007c-0.503,2.416,0.108,4.931,1.666,6.845c1.557,1.915,3.894,3.026,6.361,3.026h4.449c2.468,0,4.804-1.111,6.361-3.026 c1.557-1.914,2.168-4.429,1.666-6.845l-3.752-18.007c2.356-1.9,3.864-4.81,3.864-8.071c0-3.562-1.797-6.703-4.533-8.568v-30.303 l63.729,25.264c5.708,2.263,12.063,2.263,17.771,0l87.709-34.768c2.057-0.815,3.407-2.804,3.407-5.017 C1252,869.886,1250.649,867.897,1248.592,867.082z"></path> </g> </g></svg></span>
            <div class="pea-timeline-content">
            <h3 class="pea-title">Stanford University</h3>
            <h5 class="pea-title-text">Advance Graphic Designer</h5>
            <p class="pea-description">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit placeat tenetur, maiores, consectetur enim ullam quo earum laborum eius possimus alias repellendus illum!
            </p>
            </div>
        </div>

        <div class="pea-timeline">
            <span class="pea-icon"><svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="1052 796 200 200" enable-background="new 1052 796 200 200" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M1151.998,921.75c-4.129,0-8.17-0.771-12.01-2.292l-50.167-19.888c0,11.08,0,27.65,0,32.066 c0,15.562,27.836,28.174,62.178,28.174s62.181-12.612,62.181-28.174v-32.067l-50.172,19.889 C1160.168,920.979,1156.127,921.75,1151.998,921.75z"></path> <path d="M1248.592,867.082l-87.989-34.878c-5.526-2.19-11.681-2.19-17.208,0l-87.988,34.878c-2.057,0.815-3.407,2.804-3.407,5.016 c0,2.213,1.351,4.201,3.407,5.017l12.317,4.882v34.925c-2.736,1.865-4.533,5.007-4.533,8.568c0,3.262,1.508,6.171,3.863,8.071 l-3.751,18.007c-0.503,2.416,0.108,4.931,1.666,6.845c1.557,1.915,3.894,3.026,6.361,3.026h4.449c2.468,0,4.804-1.111,6.361-3.026 c1.557-1.914,2.168-4.429,1.666-6.845l-3.752-18.007c2.356-1.9,3.864-4.81,3.864-8.071c0-3.562-1.797-6.703-4.533-8.568v-30.303 l63.729,25.264c5.708,2.263,12.063,2.263,17.771,0l87.709-34.768c2.057-0.815,3.407-2.804,3.407-5.017 C1252,869.886,1250.649,867.897,1248.592,867.082z"></path> </g> </g></svg></span>
            <div class="pea-timeline-content">
            <h3 class="pea-title">Boston State University</h3>
            <h5 class="pea-title-text">Visual Art & Design</h5>
            <p class="pea-description">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit placeat tenetur, maiores, consectetur enim ullam quo earum laborum eius possimus alias repellendus illum!
            </p>
            </div>
        </div>

        </div>

	 <?php
	}
  
}