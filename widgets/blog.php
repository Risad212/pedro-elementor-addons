<?php
use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Image_Size;


class Pea_Blog extends Widget_Base {

	public function get_name(){
		return 'pea_blog';
	}

	public function get_title(): string {
		return __( 'Blog', 'pedro-elementor-addons' );
	}

	public function get_icon(): string {
		return 'eicon-posts-grid  pedro-elementor-icon';
	}

	public function get_categories(): array {
		return [ 'pedro' ];
	}

	public function get_keywords(): array {
		return [ 'Blog', 'Post'];
	}

	// Start content contorls
	protected function register_controls(){
        
      $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_number',
			[
				'label'   => esc_html__( 'Number Of Post', 'textdomain' ),
				'type'    => Controls_Manager::NUMBER,
                'default' => 3,
			]
		);

     $this->end_controls_section();
    }

  protected function render(): void {

    $settings = $this->get_settings_for_display();
    
    if( empty( $settings['post_number'] ) ){
        return;
    }

    $number_of_post = $settings['post_number'];

    
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $number_of_post,
    );

    $pea_query = new WP_Query( $args );

    if ( $pea_query->have_posts() ) : ?>
        <div class="pea-blog-grid">
            <?php while ( $pea_query->have_posts() ) : $pea_query->the_post(); ?>
                <div class="pea-blog-card">
                    <div class="pea-blog-img">
                        <a href="<?php the_permalink(); ?>">
                            <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'medium' );
                            } else { ?>
                                <img src="assets/media/blog/blog-placeholder.webp" alt="">
                            <?php } ?>
                        </a>
                    </div>
                    <div class="pea-card-body">
                        <div class="pea-cart-top">
                            <span class="pea-author">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z"/>
                                </svg>
                                <?php the_author(); ?>
                            </span>
                            <span class="pea-date">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34">
                                    <path d="M8 1c-.5 0-1 .4-1 1v1H4C2.4 3 1 4.3 1 6v24c0 1.7 1.3 3 3 3h26c1.7 0 3-1.3 3-3V6c0-1.7-1.3-3-3-3h-3V2c0-.6-.4-1-1-1s-1 .4-1 1v1H9V2c0-.6-.4-1-1-1z"/>
                                </svg>
                                <?php echo get_the_date(); ?>
                            </span>
                        </div>
                        <h3 class="pea-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php
    endif;

    wp_reset_postdata();
   }
  
}