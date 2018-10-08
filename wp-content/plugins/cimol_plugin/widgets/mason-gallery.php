<?php
namespace CimolPlugin\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		
/**
 * @since 1.1.0
 */
class Cimol_MasonGallery extends Widget_Base {

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
		return 'cimol-mason-gallery';
	}
	
	public function get_script_depends() { return [ 'jquery-magnific-popup','cimol-gallery-popup','jquery-isotope','cimol-masonry-gallery','imagesloaded' ]; }

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
		return __( 'Cimol Masonry Gallery', 'cimol_plg' );
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
		return 'eicon-posts-masonry';
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
			'section_title',
			[
				'label' => __( 'Gallery', 'cimol_plg' ),
			]
		);

		$this->add_control(
			'gallery',
			[
				'label' => __( 'Add Images', 'elementor' ),
				'type' => Controls_Manager::GALLERY,
			]
		);
		
		$this->add_control(
			'port_column',
			[
				'label' => __( 'Gallery Columns', 'cimol_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'col-md-6' => __( 'Two Columns', 'cimol_plg' ),
					'col-md-4' => __( 'Three Columns', 'cimol_plg' ),
					'col-md-3' => __( 'Four Columns', 'cimol_plg' ),
				],
				'default' => 'col-md-3',
			]
		);
		

		$this->add_responsive_control(
			'gallery_margin',
			[
				'label' => __( 'Gallery Item Margin', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .port-item' => 'padding: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cimol-gallery' => 'margin: -{{SIZE}}{{UNIT}};overflow:hidden;',
				],
			]
		);
		
		$this->add_control(
			'image_position',
			[
				'label' => __( 'Image Position', 'cimol_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'center center' => __( 'Center Center', 'cimol_plg' ),
					'center left' => __( 'Center Left', 'cimol_plg' ),
					'center right' => __( 'Center Right', 'cimol_plg' ),
					'top center' => __( 'Top Center', 'cimol_plg' ),
					'top left' => __( 'Top Left', 'cimol_plg' ),
					'top right' => __( 'Top Right', 'cimol_plg' ),
					'bottom center' => __( 'Bottom Center', 'cimol_plg' ),
					'bottom left' => __( 'Bottom Left', 'cimol_plg' ),
					'bottom right' => __( 'Bottom Right', 'cimol_plg' ),
				],
				'default' => 'center center',
				'selectors' => [
					'{{WRAPPER}} .port-img ' => 'background-position: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_show',
			[
				'label' => __( 'Show Image Title', 'cimol_plg' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'cimol_plg' ),
				'label_off' => __( 'Hide', 'cimol_plg' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'caption_show',
			[
				'label' => __( 'Show Image Caption', 'cimol_plg' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'cimol_plg' ),
				'label_off' => __( 'Hide', 'cimol_plg' ),
				'return_value' => 'yes',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		
		$this->add_responsive_control(
			'port_content',
			[
				'label' => __( 'Content Margin (on hover)', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'port_padding',
			[
				'label' => __( 'Content Padding (on hover)', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'bg_content',
			[
				'label' => __( 'Content Background', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'content_align',
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
					]
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'title_typo',
			[
				'label' => __( 'Title Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'cport_typography',
				'label'     => __( 'Typography', 'cimol_plg' ),
				'selector'  => '{{WRAPPER}} .dbox-relative h3',
			]
		);
		
		$this->add_control(
			'title_cl',
			[
				'label' => __( 'Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative h3' => 'color: {{VALUE}};',
				],
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'sub_typo',
			[
				'label' => __( 'Caption Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'ctext_typography',
				'label'     => __( 'Text Typography', 'cimol_plg' ),
				'selector'  => '{{WRAPPER}} .dbox-relative p',
			]
		);
		
		$this->add_control(
			'txt_cl',
			[
				'label' => __( 'Text Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative p' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'port_mask',
			[
				'label' => __( 'Mask Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
			'mask_color',
			[
				'label' => __( 'Mask Color', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .port-inner:hover .mason-mask' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'mask_color_opacity',
			[
				'label' => __( 'Mask Color Opacity(on hover)', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 1,
						'step' =>0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .port-inner:hover .mason-mask' => 'opacity: {{SIZE}};',
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
		$images = $this->get_settings( 'gallery' ); 
		?>
		
        
		<div class="cimol-gallery mason-gallery clearfix">
			<?php foreach ( $images as $image ) { 
			$img = get_post($image['id']);
			//get the image title
			$image_title = $img->post_title;
			//get the image caption
			$image_caption = $img->post_excerpt;
			?>
			
				<div class="<?php echo esc_attr ($settings['port_column']); ?> port-item">
                
                    <div class="port-inner">
                        <a href="<?php echo esc_url ($image['url']); ?>" class="port-link popup-portfolio" 
                        <?php if ($settings['title_show'] =='yes'){ ?>
                        title="<?php echo esc_attr ( $image_title )?>"
                        <?php } ?> ></a>
                        
                        
                        <div class="img-mask mason-mask"></div>
                        <img alt="<?php echo esc_attr ( $image_title )?>" src="<?php echo esc_url ($image['url']); ?>" />
                        <div class="port-dbox">
                        
                        	<?php if ($settings['title_show'] =='yes' || $settings[caption_show] =='yes'){ ?>
                            <div class="dbox-relative">
                            	
                                <?php if ($settings['title_show'] =='yes'){ ?>
                                <h3><?php echo esc_attr ( $image_title )?></h3>
                                <?php } ?>
                                
                                <?php if ($settings['caption_show'] =='yes' && $image_caption) { ?>
                                <p><?php echo esc_attr ( $image_caption )?></p>
                                <?php } ?>
                            </div><!--/.dbox-relative-->
                            <?php } ?>
                             
                        </div><!--/.port-dbox-->
                       
                        
                    </div><!--/.port-inner-->
                    
				</div><!--.port-item-->
				
			<?php 
			
			
			
			
			} ?>
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
	protected function _content_template() { }
	
}


