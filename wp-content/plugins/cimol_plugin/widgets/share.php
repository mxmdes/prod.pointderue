<?php
namespace CimolPlugin\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		
/**
 * @since 1.1.0
 */
class Cimol_Share extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'cimol-share';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Cimol Share Box', 'cimol_plg' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-facebook-like-box';
	}
	
	//script depend
	public function get_script_depends() { return [ 'cimol-share' ]; }

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'cimol-elements' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
	
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Share Box Settings', 'cimol_plg' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Text', 'cimol_plg' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Share This:', 'cimol_plg' ),
			]
		);


		
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'cimol_plg' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'cimol_plg' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'cimol_plg' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'cimol_plg' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .share-box' => 'text-align: {{VALUE}};',
				],
			]
		);

	

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Share Box Style.', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'desc_typography',
				'label'     => __( 'Typography', 'cimol_plg' ),
				'selector'  => '{{WRAPPER}} .share-text',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .share-text' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Text Margin)', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .share-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Icon Size (px)', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>1,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .share-box a ' => 'font-size: {{SIZE}}px;',
				],
			]
		);
		
		$this->add_responsive_control(
			'icon_spacing',
			[
				'label' => __( 'Icon Spacing (px)', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>1,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .share-box a ' => 'margin-left: {{SIZE}}px;',
				],
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .share-box a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_color_hover',
			[
				'label' => __( 'Icon Color on Hover', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .share-box a:hover' => 'color: {{VALUE}};',
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
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings(); ?>
        
				<div class="share-box cimol-share-box">
                   <span class="share-text"><?php echo esc_attr( $settings['title']); ?> </span>
                   <a class="tw-share" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" 
                   title="<?php esc_html_e("Tweet this", "cimol_plg"); ?>">
                      <i class="fa fa-twitter"></i>
                   </a>
                   <a class="fb-share" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" 
                   title="<?php esc_html_e("Share on Facebook", "cimol_plg"); ?>">
                      <i class="fa fa-facebook"></i>
                   </a>
                   <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php 
                   global $post;
                   $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>" 
                   title="<?php esc_html_e("Pin This", "cimol_plg"); ?>">
                      <i class="fa fa-pinterest"></i>
                   </a>
                   <a class="go-share" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" 
                   title="<?php esc_html_e("Share on Google+", "cimol_plg"); ?>">
                      <i class="fa fa-google-plus"></i>
                  </a>
               </div>
		
	<?php }

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _content_template() { }
}


