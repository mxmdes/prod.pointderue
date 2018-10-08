<?php
namespace CimolPlugin;

use CimolPlugin\Widgets\Rdn_Slider;
use CimolPlugin\Widgets\Cimol_Portfolio;
use CimolPlugin\Widgets\Cimol_Title;
use CimolPlugin\Widgets\Cimol_Team;
use CimolPlugin\Widgets\Cimol_Testimonial;
use CimolPlugin\Widgets\Cimol_TextIcon;
use CimolPlugin\Widgets\Cimol_Post;
use CimolPlugin\Widgets\Cimol_PostTwo;
use CimolPlugin\Widgets\Cimol_PostThree;
use CimolPlugin\Widgets\Cimol_PostFour;
use CimolPlugin\Widgets\Cimol_PostSlider;
use CimolPlugin\Widgets\Cimol_Menu;
use CimolPlugin\Widgets\Cimol_Contact;
use CimolPlugin\Widgets\Cimol_OtherPortfolio;
use CimolPlugin\Widgets\Cimol_Gallery;
use CimolPlugin\Widgets\Cimol_MasonGallery;
use CimolPlugin\Widgets\Cimol_Logo;
use CimolPlugin\Widgets\Cimol_Sidebar;
use CimolPlugin\Widgets\Cimol_Share;



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class CimolPlugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		//register all script 
		add_action( 'elementor/widgets/widgets_registered',[ $this, 'on_widgets_registered' ] );
		//isotope script
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('jquery-isotope',CIMOL_URL .'widgets/js/isotope.pkgd.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('cimol-portfolio',CIMOL_URL .'widgets/js/portfolio.js', array('jquery'), null, true  );} );
		//blog masonry script
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('cimol-blog-masonry',CIMOL_URL .'widgets/js/blog-mason.js', array('jquery'), null, true  );} );
		//slider script
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('jquery-slick',CIMOL_URL .'widgets/js/slick.min.js.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('cimol-slick-slider-animation',CIMOL_URL .'widgets/js/slick-animation.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('cimol-slider-script',CIMOL_URL .'widgets/js/slider.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('cimol-blog-slider-script',CIMOL_URL .'widgets/js/blog-slider.js', array('jquery'), null, true  );} );
		//gallery popup
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('jquery-magnific-popup',CIMOL_URL .'widgets/js/jquery.magnific-popup.min.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('cimol-gallery-popup',CIMOL_URL .'widgets/js/popup-gallery.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('cimol-blog-script',CIMOL_URL .'widgets/js/blog.js', array('jquery'), null, true  );} );
		
		//gallery  masonry
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('cimol-masonry-gallery',CIMOL_URL .'widgets/js/mason-gallery.js', array('jquery'), null, true  );} );
		
		//share script
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('cimol-share',CIMOL_URL .'widgets/js/share.js', array('jquery'), null, true  );} );
		
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require __DIR__ . '/widgets/rdn-slider.php';
		require __DIR__ . '/widgets/portfolio.php';
		require __DIR__ . '/widgets/title.php';
		require __DIR__ . '/widgets/testimonial.php';
		require __DIR__ . '/widgets/team.php';
		require __DIR__ . '/widgets/text-icon.php';
		require __DIR__ . '/widgets/post.php';
		require __DIR__ . '/widgets/post-two.php';
		require __DIR__ . '/widgets/post-three.php';
		require __DIR__ . '/widgets/post-four.php';
		require __DIR__ . '/widgets/post-slider.php';
		require __DIR__ . '/widgets/menu.php';
		require __DIR__ . '/widgets/contact.php';
		require __DIR__ . '/widgets/other-portfolio.php';
		require __DIR__ . '/widgets/gallery.php';
		require __DIR__ . '/widgets/mason-gallery.php';
		require __DIR__ . '/widgets/logo.php';
		require __DIR__ . '/widgets/sidebar.php';
		require __DIR__ . '/widgets/share.php';
		
	}
	

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Rdn_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_Portfolio() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_Title() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_Testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_TextIcon() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_PostTwo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_PostThree() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_PostFour() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_PostSlider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_Menu() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_Contact() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_Gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_MasonGallery() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_OtherPortfolio() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_Logo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_Sidebar() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Cimol_Share() );
		
	}
}

new CimolPlugin();



