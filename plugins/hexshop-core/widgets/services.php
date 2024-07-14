<?php
namespace ElementorHelloWorld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Hexshop_Services extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'hexshop-services';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Service', 'hexshop-core' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'hexshop-category' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'hexshop-core' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */

	protected function register_controls() {

		$this -> register_controls_content();
		$this -> register_controls_style();
	}

	/** Function for all the content */
	protected function register_controls_content() {

		$this->start_controls_section(
			'blog_content',
			[
				'label' => esc_html__( 'Blog Post', 'sadaka-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_per_page',
			[
				'label' => esc_html__( 'Post Per Page', 'sadaka-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'category_list',
			[
				'label' => esc_html__( 'Category', 'sadaka-core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => post_cat('service-cat'),
			]
		);

		$this->add_control(
			'category_exclude',
			[
				'label' => esc_html__( 'Category Exclude', 'sadaka-core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => post_cat('service-cat'),
			]
		);

		$this->add_control(
			'post_exclude',
			[
				'label' => esc_html__( 'Post Exclude', 'sadaka-core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => get_all_post('hexshop-services'),
			]
		);

		$this->add_control(
			'blog_order',
			[
				'label' => esc_html__( 'Order', 'sadaka-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC' => esc_html__( 'ASC', 'sadaka-core' ),
					'DFESC'  => esc_html__( 'DESC', 'sadaka-core' ),
				],
			]
		);

		$this->add_control(
			'order_by',
			[
				'label' => esc_html__( 'Order By', 'sadaka-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'name' => esc_html__( 'Name', 'sadaka-core' ),
					'date'  => esc_html__( 'Date', 'sadaka-core' ),
					'title'  => esc_html__( 'Title', 'sadaka-core' ),
					'rand'  => esc_html__( 'Rand', 'sadaka-core' ),
					'id'  => esc_html__( 'ID', 'sadaka-core' ),
				],
			]
		);

		$this->add_control(
			'description_word',
			[
				'label' => esc_html__( 'Words Per Post', 'sadaka-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 30,
			]
		);

		$this->add_control(
			'cta_title',
			[
				'label' => esc_html__( 'CTA Text', 'sadaka-main' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'sadaka-main' ),
				'placeholder' => esc_html__( 'Type your text here', 'sadaka-main' ),
			]
		);

		$this->end_controls_section();
	
	}

	/** Function for all the style */
	protected function register_controls_style() {

		$this->start_controls_section(
			'heading_alignment_style',
			[
				'label' => esc_html__( 'Alignment', 'hexshop-main' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_align',
			[
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .heading_alignment' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'heading_style',
			[
				'label' => esc_html__( 'Heading', 'hexshop-main' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_margin',
			[
				'label' => esc_html__( 'Margin', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => '',
					'right' => '',
					'bottom' => '',
					'left' => '',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .hexshop_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_padding',
			[
				'label' => esc_html__( 'Padding', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => '',
					'right' => '',
					'bottom' => '',
					'left' => '',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .hexshop_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .hexshop_title',
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Color', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .hexshop_title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'sub_heading_style',
			[
				'label' => esc_html__( 'Description', 'hexshop-main' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_heading_margin',
			[
				'label' => esc_html__( 'Margin', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => '',
					'right' => '',
					'bottom' => '',
					'left' => '',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .hexshop_sub_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'sub_heading_padding',
			[
				'label' => esc_html__( 'Padding', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => '',
					'right' => '',
					'bottom' => '',
					'left' => '',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .hexshop_sub_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sub_heading_typography',
				'selector' => '{{WRAPPER}} .hexshop_sub_title',
			]
		);

		$this->add_control(
			'sub_heading_color',
			[
				'label' => esc_html__( 'Color', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .hexshop_sub_title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'cta_style',
			[
				'label' => esc_html__( 'CTA', 'hexshop-main' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'cta_margin',
			[
				'label' => esc_html__( 'Margin', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => '',
					'right' => '',
					'bottom' => '',
					'left' => '',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .hexshop_cta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'cta_padding',
			[
				'label' => esc_html__( 'Padding', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => '',
					'right' => '',
					'bottom' => '',
					'left' => '',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .hexshop_cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cta_typography',
				'selector' => '{{WRAPPER}} .hexshop_cta',
			]
		);

		$this->add_control(
			'cta_color',
			[
				'label' => esc_html__( 'Color', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .hexshop_cta' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$args = array(
			'post_type' => 'hexshop-services',
			'order' => $settings['blog_order'],
			'orderby' => $settings['order_by'],
			'posts_per_page' => !empty($settings['post_per_page']) ? $settings['post_per_page'] : -1,
			'post__not_in'=> $settings['post_exclude'],
		);

		if(!empty($settings['category_list'] || $settings['category_exclude'] )){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => !empty($settings['category_exclude']) ?  $settings['category_exclude'] : $settings['category_list'],
					'operator' => !empty($settings['category_exclude']) ? 'NOT IN' : 'IN',
				),
			);
		}

		$blog_archive_description = $settings['description_word'];

		$query = new \WP_Query( $args );

		?>

	<section class="our-blogs">
        <div class="container">
            <div class="row">
                <?php if ( $query->have_posts() ) : ?>
					<?php while ( $query->have_posts() ) : $query->the_post();
						$categories = get_the_category(get_the_ID());
					?>
                    <div class="col-lg-4"><br/>
                        <div class="service-item heading_alignment">
                            <?php if(has_post_thumbnail()) : ?>
                            <img src="<?php echo esc_html(the_post_thumbnail_url()); ?>" alt="">
                            <br/><br/>
                            <?php endif; ?>
                            <h4 class="hexshop_title"><a href="<?php the_permalink( ); ?>"><?php the_title(); ?></a></h4>
							<br/>
                            <p class="hexshop_sub_title">
                                <?php 
                                    $post_content = get_the_content();
                                    $word_limit = !empty($blog_archive_description) ? $blog_archive_description : 20;
                                    $trimmed_content = wp_trim_words($post_content, $word_limit);
                                    echo $trimmed_content;
                                ?>
                            </p>
							<br/>
                            <a href="<?php the_permalink( ); ?>" class="hexshop_cta"><?php echo esc_html__($settings['cta_title'],'hexshop-core'); ?></a><br/><br/>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

		<?php
	}
}
