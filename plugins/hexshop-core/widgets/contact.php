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
class Hexshop_Contact extends Widget_Base {

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
		return 'hexshop-contact';
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
		return __( 'Contact', 'hexshop-core' );
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
				'label' => __( 'Content', 'hexshop-main' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
			'shortcode',
			[
				'label' => esc_html__( 'Short Code', 'hexshop-main' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '', 'hexshop-main' ),
				'placeholder' => esc_html__( 'Type your short code here', 'hexshop-main' ),
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
		?>

		<div class="contact-area">
			<div class="section-heading heading_alignment">
				<h2 class="hexshop_title"><?php echo esc_html__($settings['heading'], 'hexshop-core'); ?></h2>
				<?php if ('yes' === $settings['display_description']) : ?>
				<span class="hexshop_sub_title">
					<?php
						// Check if Elementor is in edit mode
						$is_edit_mode = \Elementor\Plugin::$instance->editor->is_edit_mode();

						if ( $is_edit_mode ) {
							// Output the content with tags in the backend (editor)
							echo wp_kses_post( $settings['description'] );
						} else {
							// Output the content without tags in the frontend
							echo esc_html__( wp_strip_all_tags( $settings['description'], 'sadaka-core' ) );
						}
					?>
				</span>
				<?php endif; ?>
			</div><br/>
			<div class="contact-form">
				<?php if(!empty($settings['shortcode'])) : ?>
					<?php echo do_shortcode( $settings['shortcode'] ); ?>
				<?php else : ?>
					<p><?php echo esc_html__('Please add Short Code!', 'hexshop-core'); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<?php
	}
}
