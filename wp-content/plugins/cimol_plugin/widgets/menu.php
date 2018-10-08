<?php
namespace CimolPlugin\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		
/**
 * @since 1.1.0
 */
class Cimol_Menu extends Widget_Base {

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
		return 'cimol-menu';
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
		return __( 'Cimol Menu', 'cimol_plg' );
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
		return 'fa fa-th-large';
	}

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
		return [ 'cimol-menu-elements' ];
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
				'label' => __( 'Menu to Display', 'cimol_plg' ),
			]
		);

		$this->add_control(
			'cimol_menu',
			[
				'label'   => __( 'Select Menu', 'cimol_plg' ),
				'type'    => Controls_Manager::SELECT, 'options' => navmenu_navbar_menu_choices(),
				'default' => '',
			]
		);
		
		
		$this->add_control(
			'menu_type',
			[
				'label' => __( 'Drop Down Type', 'cimol_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'left' => __( 'From Left', 'cimol_plg' ),
					'right' => __( 'From Right', 'cimol_plg' ),
				],
				'default' => 'left',
			]
		);
		
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Parent Menu Alignment', 'cimol_plg' ),
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
						'title' => __( 'Right', 'cimol_plg'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .white-header' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'align_child',
			[
				'label' => __( 'Child Menu Alignment', 'cimol_plg' ),
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
						'title' => __( 'Right', 'cimol_plg'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-box ul li ul' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'desktop_menu',
			[
				'label' => __( 'Desktop Menu', 'cimol_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'inline-block' => __( 'Show', 'cimol_plg' ),
					'none' => __( 'Hide', 'cimol_plg' ),
				],
				'default' => 'inline-block',
				'label_block' => true,
				'selectors' => [
					'{{WRAPPER}} .menu-box' => 'display: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'mobile_menu',
			[
				'label' => __( 'Mobile Menu', 'cimol_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'inline-block' => __( 'Show', 'cimol_plg' ),
					'none' => __( 'Hide', 'cimol_plg' ),
				],
				'default' => 'inline-block',
				'label_block' => true,
				'selectors' => [
					'{{WRAPPER}} .box-mobile' => 'display: {{VALUE}};',
				],
			]
		);
		
		

		$this->end_controls_section();

		$this->start_controls_section(
			'menu_section',
			[
				'label' => __( 'Menu Settings (parent)', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'menu_margin',
			[
				'label' => __( 'Margin ', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'border_type',
			[
				'label' => __( 'Boder Type', 'cimol_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => __( 'None', 'cimol_plg' ),
					'solid' => __( 'Solid', 'cimol_plg' ),
					'dotted' => __( 'Dotted', 'cimol_plg' ),
					'double' => __( 'Double', 'cimol_plg' ),
					'dashed' => __( 'Dashed', 'cimol_plg' ),
					
				],
				'default' => 'none',
				'label_block' => true,
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul > li > a' => 'border-style: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'menu_border',
			[
				'label' => __( 'Border ', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul > li > a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'menu_border_radius',
			[
				'label' => __( 'Border Radius ', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul > li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'menu_border_color',
			[
				'label' => __( 'Border Color ', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul > li > a' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'menu_border_color_hover',
			[
				'label' => __( 'Border Color on Hover ', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul > li > a:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'menu_padding',
			[
				'label' => __( 'Padding', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul > li >a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'menu_typo',
				'label'     => __( 'Title Typography', 'cimol_plg' ),
				'selector'  => '{{WRAPPER}} .menu-box >div>ul> li> a',
			]
		);
		
		$this->add_control(
			'menu_color',
			[
				'label' => __( 'Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul> li> a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'menu_color_hover',
			[
				'label' => __( 'Color on Hover', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul> li> a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'menu_bg',
			[
				'label' => __( 'Background', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul> li> a' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'menu_bg_hover',
			[
				'label' => __( 'Background on Hover', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul> li> a:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'menu_in_opacity',
			[
				'label' => __( 'Opacity', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					    'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul> li> a' => 'opacity: {{SIZE}};',
				],
			]
		);
		
		$this->add_control(
			'opacity_hover',
			[
				'label' => __( 'Opacity on Hover', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					    'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul> li> a:hover' => 'opacity: {{SIZE}};',
				],
			]
		);
		
		$this->add_control(
			'menu_stick_color',
			[
				'label' => __( 'Color on Sticky Menu', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>.cimol-stick> li> a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'menu_stick_color_hover',
			[
				'label' => __( 'Color on Sticky Menu (hover)', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}  .menu-box >div>.cimol-stick> li> a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'menu_child_section',
			[
				'label' => __( 'Menu Settings (dropdown)', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
			'child_margin',
			[
				'label' => __( 'Top Margin (dropdown parent only)', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					    'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul > li > ul' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'menu_child_padding',
			[
				'label' => __( 'Padding', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul li  ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'menu_child_typo',
				'label'     => __( 'Title Typography', 'cimol_plg' ),
				'selector'  => '{{WRAPPER}} .menu-box >div>ul> li> ul li a',
			]
		);
		
		$this->add_control(
			'menu_child_color',
			[
				'label' => __( 'Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul> li> ul li a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'menu_child_color_hover',
			[
				'label' => __( 'Color on Hover', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul> li> ul li a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'menu_child_bg',
			[
				'label' => __( 'Background', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul> li> ul li a' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'menu_child_bg_hover',
			[
				'label' => __( 'Background on Hover', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul> li> ul li a:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'opacity',
			[
				'label' => __( 'Opacity', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					    'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul> li> ul li a' => 'opacity: {{SIZE}};',
				],
			]
		);
		
		$this->add_control(
			'slider_opacity_hover',
			[
				'label' => __( 'Opacity on Hover', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					    'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .menu-box >div>ul> li> ul li a:hover' => 'opacity: {{SIZE}};',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'menumobile_section',
			[
				'label' => __( 'Mobile Menu Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'hamb_color',
			[
				'label' => __( 'Hamburger Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .hamburger__icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .hamburger__icon::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .hamburger__icon::after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .hamburger.active .hamburger__icon' => 'background-color: transparent;',
				],
			]
			
		);
		
		$this->add_control(
			'hab_stick',
			[
				'label' => __( 'Hamburger Color on Sticky Menu', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cimol-stick .hamburger__icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .cimol-stick .hamburger__icon::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .cimol-stick .hamburger__icon::after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .cimol-stick .hamburger.active .hamburger__icon' => 'background-color: transparent;',
				],
			]
		);
		
		$this->add_responsive_control(
			'hamb_margin',
			[
				'label' => __( 'Hamburger Margin', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .hamburger' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'hamb_padding',
			[
				'label' => __( 'Hamburger Padding', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .hamburger' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'fat_nav_bg',
			[
				'label' => __( 'Mobile Menu Background Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .fat-nav' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'mobile_color',
			[
				'label' => __( 'Link Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .fat-nav li a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'mobile_color_hover',
			[
				'label' => __( 'Link Color on Hover', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .fat-nav li a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'mobile_padding_text',
			[
				'label' => __( 'Link Padding', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .fat-nav li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};display:block;',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'mobile_typo',
				'label'     => __( 'Typography', 'cimol_plg' ),
				'selector'  => '{{WRAPPER}} .fat-nav li a',
			]
		);
		
		
		$this->add_responsive_control(
			'mobile_align',
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
						'title' => __( 'Right', 'cimol_plg'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .fat-nav li' => 'text-align: {{VALUE}};',
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
		$settings = $this->get_settings();?>

		<!--HEADER START-->
							
                            <div class="white-header no-bg">
                                <div class="menu-box <?php if ($settings['menu_type']=='right'){echo 'cimol-right-menu';} ?> ">
                                    <?php wp_nav_menu( array( 'menu' => $settings['cimol_menu'],'items_wrap' => '<ul id="%1$s" class="cimol-nav navigation %2$s">%3$s</ul>' ) ); ?>
                                </div><!--/.menu-box-->
                                <div class="box-mobile cimol-menu-element">
                                	<a href="#" class="hamburger"><div class="hamburger__icon"></div></a>
                                    <div class="fat-nav">
                                        <div class="fat-nav__wrapper">
                                            <?php 
											$menuParameters = array(
											  'menu' => $settings['cimol_menu'],
											  'container'       => false,
											  'echo'            => false,
											  'items_wrap'      => '%3$s',
											  'depth'           => 0,
											); ?>
											
											<div class="fat-list"> <?php echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' ); ?></div>
                                        </div>
                                    </div>
                                </div><!--/.box-mobile-->
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
	protected function _content_template() { 
		
	}
}


