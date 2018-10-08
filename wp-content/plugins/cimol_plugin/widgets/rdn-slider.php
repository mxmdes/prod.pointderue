<?php
namespace CimolPlugin\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		
/**
 * @since 1.1.0
 */
class Rdn_Slider extends Widget_Base {

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
		return 'rdn-slider';
	}
	
	//script depend
	public function get_script_depends() { return [ 'jquery-slick','cimol-slick-slider-animation','cimol-slider-script' ]; }

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
		return __( 'Cimol Slider', 'cimol_plg' );
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
		return 'eicon-slideshow';
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
			'section_content',
			[
				'label' => __( 'Slider Settings', 'cimol_plg' ),
			]
		);
		
		
		
		$this->add_control(
			'slider_list',
			[
				'label' => __( 'Slider List', 'cimol_plg' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'title' => __( 'Slider Heading Title', 'cimol_plg' ),
						'subtitle' => __( 'Slider subtitle', 'cimol_plg' ),
						'text' => __( 'Slider text', 'cimol_plg' ),
					],
					[
						'title' => __( 'Slider Heading Title', 'cimol_plg' ),
						'subtitle' => __( 'Slider subtitle', 'cimol_plg' ),
						'text' => __( 'Slider text', 'cimol_plg' ),
					],
					[
						'title' => __( 'Slider Heading Title', 'cimol_plg' ),
						'subtitle' => __( 'Slider subtitle', 'cimol_plg' ),
						'text' => __( 'Slider text', 'cimol_plg' ),
					],
				],
				'fields' => [
					[
						'name' => 'title',
						'label' => __( 'Slider Heading Title', 'cimol_plg' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Insert your slider heading title here..', 'cimol_plg' ),
						'default' => __( 'Slider Heading Title' ,  'cimol_plg'  ),
					],
					[
						'name' => 'subtitle',
						'label' => __( 'Slider Subtitle', 'cimol_plg' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Insert your slider subtitle here..', 'cimol_plg' ),
						'default' => __( 'Slider Subtitle' ,  'cimol_plg'  ),
					],
					[
						'name' => 'text',
						'label' => __( 'Slider Text', 'cimol_plg' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'default' => __( 'Slider Text' ,  'cimol_plg' ),
					],
					[
						'name' => 'btn_text',
						'label' => __( 'Button Text', 'cimol_plg' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Link', 'cimol_plg' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => __( 'Leave it blank if you don\'t need this button', 'cimol_plg' ),
					],
					[
						'name' => 'image',
						'label' => __( 'Slider Image', 'cimol_plg' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		
		$this->add_responsive_control(
			'slider_width',
			[
				'label' => __( 'Slider Container Max Width (px)', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>100,
						'max' => 4000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-box ' => 'max-width: {{SIZE}}px;',
				],
			]
		);
		
		$this->add_responsive_control(
			'slider_content',
			[
				'label' => __( 'Slider Content Max Width (px)', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>100,
						'max' => 4000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-content ' => 'max-width: {{SIZE}}px;',
				],
			]
		);
		
		$this->add_responsive_control(
			'slider_height',
			[
				'label' => __( 'Slider Top Padding (%)', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-box ' => 'padding-top: {{SIZE}}%;',
				],
			]
		);
		
		$this->add_responsive_control(
			'slider_height_bottom',
			[
				'label' => __( 'Slider Bottom Padding (%)', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-box ' => 'padding-bottom: {{SIZE}}%;',
				],
			]
		);
		
		$this->add_control(
			'slider_speed',
			[
				'label' => __( 'Slider Speed', 'cimol_plg' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'frontend_available' => true,
			]
		);
		
		$this->add_control(
			'show_line',
			[
				'label' => __( 'Show Line','cimol_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'show' => __( 'Show','cimol_plg' ),
					'hide' => __( 'Hide','cimol_plg' ),
				],
				'default' => 'show',
			]
		);
		
		$this->add_control(
			'show_arrows',
			[
				'label' => __( 'Show Arrows','cimol_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'visible' => __( 'Show','cimol_plg' ),
					'hidden' => __( 'Hide','cimol_plg' ),
				],
				'default' => 'visible',
				'selectors' => [
					'{{WRAPPER}} .slider .slick-arrow' => 'visibility: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'align',
			[
				'label' => __( 'Slider Alignment', 'cimol_plg' ),
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .slider-box' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Slider Title Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Margin', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'title_typo',
				'label'     => __( 'Title Typography', 'cimol_plg' ),
				'selector'  => '{{WRAPPER}} .slider-title',
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'sl_mask',
			[
				'label' => __( 'Slider Mask Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'slider_mask',
			[
				'label' => __( 'Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-mask' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'sl_line_section',
			[
				'label' => __( 'Slider Line Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_line' => 'show',
				],
			]
		);
		
		$this->add_responsive_control(
			'line_width',
			[
				'label' => __( 'Slider Line Width', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>10,
						'max' => 2000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-line ' => 'width: {{SIZE}}px;max-width:100%;',
				],
			]
		);
		
		$this->add_responsive_control(
			'line_height',
			[
				'label' => __( 'Slider Line Height', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>10,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-line ' => 'height: {{SIZE}}px;',
				],
			]
		);
		
		$this->add_control(
			'linecolor',
			[
				'label' => __( 'Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-line' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'line_margin',
			[
				'label' => __( 'Margin', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-line' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'subtitle_section',
			[
				'label' => __( 'Slider Subtitle Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label' => __( 'Margin', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'subtitle_typo',
				'label'     => __( 'Subtitle Typography', 'cimol_plg' ),
				'selector'  => '{{WRAPPER}} .slider-subtitle',
			]
		);
		
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-subtitle' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'textsetting_section',
			[
				'label' => __( 'Slider Text Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'text_margin',
			[
				'label' => __( 'Margin', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'text_typo',
				'label'     => __( 'Text Typography', 'cimol_plg' ),
				'selector'  => '{{WRAPPER}} .slider-text',
			]
		);
		
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-text' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'btn_settings',
			[
				'label' => __( 'Button Setting','cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'btn_typography',
				'label'     => __( 'Typography', 'cimol_plg' ),
				'selector'  => '{{WRAPPER}} .slider-btn',
			]
		);
		
		$this->add_responsive_control(
			'btn_margin',
			[
				'label' => __( 'Margin', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-btn' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => __( 'Padding', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-btn' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'btn_border_radius',
			[
				'label' => __( 'Border Radius', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-btn' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'btn_color_section',
			[
				'label' => __( 'Button Color Scheme Setting','cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color','cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-btn' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_color_hover',
			[
				'label' => __( 'Color on Hover','cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_bg',
			[
				'label' => __( 'Background Color','cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-btn' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .slider-btn::before' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_bg_hover',
			[
				'label' => __( 'Background Color on Hover','cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-btn:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .slider-btn::after' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'btn_border',
			[
				'label' => __( 'Border', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-btn' => 'border-style:solid;border-width:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					
				],
			]
		);
		
		$this->add_responsive_control(
			'btn_border_hover',
			[
				'label' => __( 'Border on Hover', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-btn:hover' => 'border-style:solid;border-width:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					
				],
			]
		);
		
		$this->add_control(
			'btn_border_color',
			[
				'label' => __( 'Border Color','cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-btn' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_border_color_hover',
			[
				'label' => __( 'Border Color on  Hover','cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'sl_arrow',
			[
				'label' => __( 'Slider Arrows Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_arrows' => 'show',
				],
			]
		);
		
		$this->add_control(
			'arrow_color',
			[
				'label' => __( 'Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider .slick-arrow' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'arrow_color_hover',
			[
				'label' => __( 'Color on Hover', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider .slick-arrow:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'arrow_bg_color',
			[
				'label' => __( 'Background Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider .slick-arrow' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'arrow_bg_color_hover',
			[
				'label' => __( 'Background Color on Hover', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider .slick-arrow:hover' => 'background-color: {{VALUE}};',
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
		$settings = $this->get_settings();
		
		?>
        
        
        <div class="slider home-slider  ani-slider  clearfix" data-slick='{"autoplaySpeed": <?php echo esc_attr ( $settings['slider_speed'] )?>}'>
        
			<?php foreach ( $settings['slider_list'] as $index => $item ) : ?>
                
                <div class="item slide clearfix">
                
                  <div class="slider-img-bg" data-animation="puffIn" data-delay="0.2s" data-animation-duration="0.7s"  
                  style="background-image:url(<?php echo esc_url ( $item['image']['url']); ?>);" ></div>
                  
                  <div class="slider-mask" data-animation="slideUpReturn" data-delay="0.1s"></div>
                  
                  <div class="caption-box clearfix">
                      
                      <div class="slider-box container-fluid">
                      <div class="slider-content">
                      
                      	  <?php if ( $item['subtitle']){?>
                          <p class="slider-subtitle" data-animation="fadeIn" data-delay="1.5s">
                              <?php echo wp_kses_post ( $item['subtitle']) ; ?>
                          </p>
                          <?php } ?>
                          
                          <div class="slider-hidden">
                              <h3 class="slider-title" data-animation="fadeInUp" data-delay="0.8s"><?php echo wp_kses_post ( $item['title'] ); ?></h3>
                          </div><!--/.slider-hidden-->
                          
                          <?php if ( $settings['show_line'] == 'show' ){?>
                          <div class="slider-line"  data-animation="swashIn" data-delay="0.5s"></div>
                          <?php } ?>
                          
                          <?php if ( $item['text']){?>
                          <p class="slider-text" data-animation="fadeInDown" data-delay="1s">
                              <?php echo wp_kses_post ( $item['text']) ; ?>
                          </p>
                          <?php } ?>
                          
                          <?php if ( $item['btn_link'] && $item['btn_text']){ ?>
                              <div class="btn-relative" data-animation="swashIn" data-delay="1.8s" data-animation-duration="1s">
                                <?php if ( ! empty( $item['btn_link']['url'] ) ) {
									$link_key = 'link_' . $index;
			
									$this->add_render_attribute( $link_key, 'href', $item['btn_link']['url'] );
			
									if ( $item['btn_link']['is_external'] ) {
										$this->add_render_attribute( $link_key, 'target','_blank' );
									}
			
									if ( $item['btn_link']['nofollow'] ) {
										$this->add_render_attribute( $link_key, 'rel', 'nofollow' );
									}
			
									echo '<a class="slider-btn" ' . $this->get_render_attribute_string( $link_key ) . '>';
								} ?>
                                 	<?php echo esc_attr ( $item['btn_text'] ) ; ?>
                                 </a> 
                              </div><!--/.btn-relative-->
                          <?php } ?>
                              
                      </div><!--/.slider-content-->
                  </div><!--/.slider-box-->
                  
                     
                      
                  </div><!--/.caption-box-->
                </div><!--/.slide-->
				
				<?php
				
			endforeach; 
			
			?>
		</div>
		
		
		<?php
	
	}

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


