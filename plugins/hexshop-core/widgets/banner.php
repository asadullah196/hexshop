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
class Hexshop_Banner extends Widget_Base {

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
		return 'hexshop-banner';
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
		return __( 'Banner', 'hexshop-core' );
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
			'contact_content',
			[
				'label' => __( 'Left Content', 'hexshop-main' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'background',
			[
				'label' => esc_html__( 'Choose Image', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Title', 'hexshop-main' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Say Hello. Dont Be Shy!', 'hexshop-main' ),
				'placeholder' => esc_html__( 'Type your title here', 'hexshop-main' ),
			]
		);

		$this->add_control(
			'display_description',
			[
				'label' => esc_html__( 'Show Description', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hexshop-main' ),
				'label_off' => esc_html__( 'Hide', 'hexshop-main' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'hexshop-main' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Details to details is what makes Hexashop different from the other themes.', 'hexshop-main' ),
				'condition' => [
					'display_description' => 'yes',
				],
			]
		);

		$this->add_control(
			'display_cta',
			[
				'label' => esc_html__( 'Show CTA', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hexshop-main' ),
				'label_off' => esc_html__( 'Hide', 'hexshop-main' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label' => esc_html__( 'CTA Text', 'hexshop-main' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Purchase Now', 'hexshop-main' ),
				'condition' => [
					'display_cta' => 'yes',
				],
			]
		);

		$this->add_control(
			'cta_url',
			[
				'label' => esc_html__( 'CTA URL', 'hexshop-main' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
				'condition' => [
					'display_cta' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'category_content',
			[
				'label' => __( 'Right Content', 'hexshop-main' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'product_category_list',
			[
				'label' => esc_html__( 'Category', 'hexshop-core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => product_cat(),
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
				'label' => esc_html__( 'Sub Heading', 'hexshop-main' ),
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

		// Access user given category
		$category_names = $settings['product_category_list'];

		foreach ($category_names as $category_name) {
			// Get the category object by name
			$category = get_term_by('name', $category_name, 'product_cat');

			if ($category) {
				// Get the category description
				$category_description = term_description($category->term_id, 'product_cat');

				// Get the category URL
				$category_url = get_term_link($category->term_id, 'product_cat');
				$category_img_url = get_field('category_image', 'category_' . $category->term_id);

				?>

				<!-- Display the category description and URL 
				<div class="category-info">
					<h2><?php echo esc_html($category->name); ?></h2>
					<p><?php echo $category_description; ?></p>
					<a href="<?php echo esc_url($category_url); ?>">Visit Category</a>
					<img src="<?php echo esc_url($category_img_url); ?>" alt="">
				</div> -->

				<?php
			}
		}

		?>

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content heading_alignment">
                                <h4 class="hexshop_title"><?php echo esc_html__($settings['heading'], 'hexshop-core'); ?></h4>
								<?php if ('yes' === $settings['display_description']) : ?>
                                <span class="hexshop_sub_title"><?php echo esc_html__($settings['description'], 'hexshop-core'); ?></span>
								<?php endif; ?>
                                <?php if ('yes' === $settings['display_cta']) : ?>
								<div class="main-border-button hexshop_cta">
                                    <a href="<?php echo esc_url($settings['cta_text']); ?>"><?php echo esc_html__($settings['cta_text'], 'hexshop-core'); ?></a>
                                </div>
								<?php endif; ?>
                            </div>
							<?php if(!empty($settings['background']['url'])) : ?>
								<img src="<?php echo esc_url($settings['background']['url']); ?>" alt="">
							<?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            
							<?php foreach ($category_names as $category_name) :

								$category = get_term_by('name', $category_name, 'product_cat');
								if ($category) {

									// Get the category name
									$category_name = $category->name;
									
									// Get the category description
									$category_description = term_description($category->term_id, 'product_cat');

									// Get the category URL
									$category_url = get_term_link($category->term_id, 'product_cat');

									// Get the category image
									$category_img_url = get_field('category_image', 'category_' . $category->term_id);

								}
							?>


							<div class="col-lg-6">
								<div class="right-first-image">
									<div class="thumb">
										<div class="inner-content">
											<h4><?php echo esc_html($category_name); ?></h4>
											<span>Best Clothes For Women</span>
										</div>
										<div class="hover-content">
											<div class="inner">
												<h4><?php echo esc_html($category_name); ?></h4>
												<p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
												<div class="main-border-button">
													<a href="#">Discover More</a>
												</div>
											</div>
										</div>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/baner-right-image-01.jpg">
									</div>
								</div>
							</div>



							<?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

		<?php
	}
}
