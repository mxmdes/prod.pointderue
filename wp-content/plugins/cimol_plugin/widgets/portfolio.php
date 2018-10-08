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
class Cimol_Portfolio extends Widget_Base {

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
		return 'cimol-portfolio';
	}
	
	//script depend
	public function get_script_depends() { return [ 'jquery-isotope','cimol-portfolio' ]; }
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
		return __( 'Cimol Portfolio', 'cimol_plg' );
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
		return 'fa fa-clone';
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
				'label' => __( 'Portfolio Settings.', 'cimol_plg' ),
			]
		);
		
		$this->add_control(
			'port_style',
			[
				'label' => __( 'Style', 'cimol_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1' => __( 'Style One', 'cimol_plg' ),
					'2' => __( 'Style Two', 'cimol_plg' ),
				],
				'default' => '1',
			]
		);
		
		$this->add_control(
			'filter',
			[
				'label' => __( 'Filter', 'cimol_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'show' => __( 'Show', 'cimol_plg' ),
					'hide' => __( 'Hide', 'cimol_plg' ),
				],
				'default' => 'show',
			]
		);
		
		$this->add_responsive_control(
			'filter_align',
			[
				'label' => __( 'Filter Alignment', 'cimol_plg' ),
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
					'{{WRAPPER}} .port-filter' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		
		$this->add_control(
			'portfolio_item',
			[
				'label' => __( 'Item to display', 'cimol_plg' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '12',
			]
		);
		
		
		
		$this->add_control(
			'port_column',
			[
				'label' => __( 'Columns', 'cimol_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'3' => __( 'Three Columns', 'cimol_plg' ),
					'4' => __( 'Four Columns', 'cimol_plg' ),
				],
				'default' => '3',
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'portfolio_styling',
			[
				'label' => __( '<div style="padding:10px 0;">Portfolio Item Settings.  <br/><small style="font-weight:normal;">You can click the (All) filter to refresh the layout when you change the Height settings.</small></div>', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'portfolio_margin',
			[
				'label' => __( 'Margin', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .port-inner' => 'margin: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'portfolio_height',
			[
				'label' => __( 'Height', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .port-box' => 'padding: {{SIZE}}% 0;',
				],
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
				'condition' => [
					'port_style' => '1',
				],
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
				'label' => __( 'Title Content Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'cport_typography',
				'label'     => __( 'Title Typography', 'cimol_plg' ),
				'selector'  => '{{WRAPPER}} .dbox-relative h3',
			]
		);
		
		$this->add_control(
			'title_cl',
			[
				'label' => __( 'Title Color', 'cimol_plg' ),
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
				'label' => __( 'Category/Text Content Settings', 'cimol_plg' ),
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
			'section_title_style',
			[
				'label' => __( 'Filter Settings', 'cimol_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'filter_typography',
				'label'     => __( 'Typography', 'cimol_plg' ),
				'selector'  => '{{WRAPPER}} .port-filter a',
			]
		);
		
		$this->add_control(
			'filter_padding',
			[
				'label' => __( 'Padding', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .port-filter a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'filter_border_radius',
			[
				'label' => __( 'Border Radius', 'cimol_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .port-filter a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'filter_margin',
			[
				'label' => __( 'Spacing', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .port-filter a' => 'margin-left: {{SIZE}}{{UNIT}};margin-right: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'min' => -50,
						'max' => 50,
					],
				],
			]
		);
		
		$this->add_control(
			'color_def',
			[
				'label' => __( 'Color Scheme', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .port-filter a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .port-filter a.active' => 'background: {{VALUE}};color:#ffffff;',
					'{{WRAPPER}} .port-filter a::before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .port-filter a::after' => 'background: {{VALUE}};',
					'{{WRAPPER}} .port-filter a:hover' => 'background: {{VALUE}};color:#ffffff;',
				],
			]
		);
		
		$this->add_control(
			'color_hov',
			[
				'label' => __( 'Color on Hover', 'cimol_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .port-filter a.active' => 'color: {{VALUE}};',
					'{{WRAPPER}} .port-filter a:hover' => 'color: {{VALUE}};'
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'port_mask',
			[
				'label' => __( 'Portfolio Mask Settings', 'cimol_plg' ),
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
					'{{WRAPPER}} .port-inner:hover .port-box' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'mask_color_opacity',
			[
				'label' => __( 'Mask Color Opacity (on hover)', 'cimol_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 1,
						'step' =>0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .port-inner:hover .port-box' => 'opacity: {{SIZE}};',
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
		if  ($settings['filter'] == 'show') { ?>
        <ul class="port-filter center-port-filter">
                            
			<?php
            $ridianur_taxonomy = 'portfolio_category';
            $ridianur_terms = get_terms($ridianur_taxonomy); // Get all terms of a taxonomy
            if ( $ridianur_terms && !is_wp_error( $ridianur_terms ) ) : ?>
            <li>
                <a class="active" href="#" data-filter="*">
                    <?php if ( function_exists( 'ot_get_option' )&& ot_get_option( 'portfolios_all' ) ) { 
                    echo esc_attr( ot_get_option( 'portfolios_all' ));} else { esc_html_e('All','cimol_plg'); } ?>
                </a>
            </li>
            <?php foreach ( $ridianur_terms as $ridianur_term ) { ?>
                <li><a data-filter=".<?php echo  strtolower(preg_replace('/[^a-zA-Z]+/','-', $ridianur_term->name)); ?>" href="#">
                <?php echo esc_attr( $ridianur_term->name); ?></a></li>
            <?php } 
            endif;?>
        </ul>
        <?php } ?>
		
        
   
   		<div class="portfolio-body clearfix <?php if  ($settings['port_style'] == '2') {echo "portfolio-type-two"; } ?>">
			<?php if ($settings['portfolio_item']) {
			$ridianur_work = new \WP_Query(array(
					'posts_per_page'   => $settings['portfolio_item'],
					'post_type' =>  'portfolio', 'cimol_plg',
				)); 
			} else {
				$ridianur_work = new \WP_Query(array(
					'posts_per_page'   => 5,
					'post_type' =>  'portfolio', 'cimol_plg',
				));
			}
            $i= 0; 
            if ($ridianur_work->have_posts()) : while  ($ridianur_work->have_posts()) : $ridianur_work->the_post();
            global $post ;
            
            ?>
            
            <?php $ridianur_terms = get_the_terms( get_the_ID(), 'portfolio_category' ); ?>
            <div class="<?php if  ($settings['port_column'] == '3') {echo "col-md-4"; } else  {echo "col-md-3"; } ?>
             port-item <?php foreach ($ridianur_terms as $ridianur_term) { 
            echo  strtolower(preg_replace('/[^a-zA-Z]+/', '-', $ridianur_term->name)). ' '; } 
            $ridianur_allClasses = get_post_class(); foreach ($ridianur_allClasses as $ridianur_class) { 
            echo esc_attr( $ridianur_class . " "); } ?>" id="post-<?php the_ID(); ?>">
                
                <div class="port-inner">
                    <a class="port-link" href="<?php the_permalink(); ?>" ></a>
                    <div class="port-box"></div>
                    <div class="port-img width-img img-bg" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
                    <div class="img-mask"></div>
                    <div class="port-dbox">
                        <div class="dbox-relative">
                            <h3><?php the_title(); ?></h3>
                            <?php $ridianur_taxonomy = 'portfolio_category'; 
                                $ridianur_taxs = wp_get_post_terms($post->ID,$ridianur_taxonomy);  ?> 
                            <p><?php $ridianur_cats = array();  foreach ( $ridianur_taxs as $ridianur_tax ) { $ridianur_cats[] =   $ridianur_tax->name ;   } 
                            echo implode(', ', $ridianur_cats);?></p>
                        </div><!--/.dbox-relative-->
                    </div><!--/.port-dbox-->
                </div><!--/.port-inner-->
                
                
                
            </div><!--.port-item-->
           
            <?php endwhile; else: ?>
            <div class="alert alert-warning"><?php _e('There is no Portfolio Post Found. You need to create at least 1 portfolio post first.','cimol-plg'); ?></div>
            <?php endif;  wp_reset_postdata();  ?>
                          
                            
        </div><!--/.portfolio-body-->
                        
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



