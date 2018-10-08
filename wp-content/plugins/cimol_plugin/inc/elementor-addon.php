<?php


//display menu list
function navmenu_navbar_menu_choices() {
	$menus = wp_get_nav_menus();
	$items = array();
	$i     = 0;
	foreach ( $menus as $menu ) {
		if ( $i == 0 ) {
			$default = $menu->slug;
			$i ++;
		}
		$items[ $menu->slug ] = $menu->name;
	}

	return $items;
}

//display category blog list
function category_choice() {
    $categories = get_categories( );
	$blogs = array();
	$i     = 0;
	foreach ( $categories as $category ) {
		if ( $i == 0 ) {
			$default = $category->name ;
			$i ++;
		}
		$blogs[ $category->term_id ] = $category->name;
	}
	return $blogs;
}

//for imagesloaded 
add_action( 'elementor/editor/after_enqueue_scripts', function() {
   wp_enqueue_script( 'imagesloaded'); 
} );

//for isotope
add_action( 'elementor/editor/after_enqueue_scripts', function() {
   wp_enqueue_script(
   	'jquery-isotope',
   	CIMOL_URL .'widgets/js/isotope.pkgd.js',
   		array('jquery'),
   	'1',
   	true // in_footer
   );
} );

//for slick slider
add_action( 'elementor/editor/after_enqueue_scripts', function() {
   wp_enqueue_script(
   	'jquery-slick',
   	CIMOL_URL .'widgets/js/slick.min.js',
   		array('jquery'),
   	'1',
   	true // in_footer
   );
} );


//for sticky
add_action( 'elementor/editor/after_enqueue_scripts', function() {
   wp_enqueue_script(
   	'jquery-sticky',
   	CIMOL_URL .'widgets/js/jquery.sticky.js',
   		array('jquery'),
   	'1',
   	true // in_footer
   );
} );


//for superfish script
add_action( 'elementor/editor/after_enqueue_scripts', function() {
   wp_enqueue_script(
   	'jquery-superfish',
   	CIMOL_URL .'widgets/js/superfish.js',
   		array('jquery'),
   	'1',
   	true // in_footer
   );
} );

//for fitvids script
add_action( 'elementor/editor/after_enqueue_scripts', function() {
   wp_enqueue_script(
   	'jquery-fitvids',
   	CIMOL_URL .'widgets/js/jquery.fitvids.js',
   		array('jquery'),
   	'1',
   	true // in_footer
   );
} );

add_action( 'elementor/editor/after_enqueue_scripts', function() {
   wp_enqueue_script(
   	'rdn-elementor',
   	CIMOL_URL .'widgets/js/rdn-elementor.js',
   		array('jquery'),
   	'1',
   	true // in_footer
   );
} );

//add new category elementor
add_action( 'elementor/init', function () {
	$elementsManager = Elementor\Plugin::instance()->elements_manager;
	$elementsManager->add_category(
		'cimol-elements',
		array(
			'title' => 'Cimol General Elements',
			'icon'  => 'font',
		),
		1
	);
} );

//add new category elementor
add_action( 'elementor/init', function () {
	$elementsManager = Elementor\Plugin::instance()->elements_manager;
	$elementsManager->add_category(
		'cimol-menu-elements',
		array(
			'title' => 'Cimol Custom Menu Elements',
			'icon'  => 'font',
		),
		2
	);
} );

//add new category elementor
add_action( 'elementor/init', function () {
	$elementsManager = Elementor\Plugin::instance()->elements_manager;
	$elementsManager->add_category(
		'cimol-portfolio-elements',
		array(
			'title' => 'Cimol Single Portfolio Elements',
			'icon'  => 'font',
		),
		3
	);
} );

//add new category elementor
add_action( 'elementor/init', function () {
	$elementsManager = Elementor\Plugin::instance()->elements_manager;
	$elementsManager->add_category(
		'cimol-blog-elements',
		array(
			'title' => 'Cimol Blog Post Elements',
			'icon'  => 'font',
		),
		4
	);
} );




add_action('elementor/element/before_section_end', function( $section, $section_id, $args ) {
	if( $section->get_name() == 'google_maps' && $section_id == 'section_map' ){
		// we are at the end of the "section_image" area of the "image-box"
		$section->add_control(
			'map_style' ,
			[
				'label'        => 'Map Style',
				'type'         => Elementor\Controls_Manager::SELECT,
				'default'      => 'default',
				'options'      => array( 'default' => 'Default', 'gray' => 'Grayscale Map' ),
				'prefix_class' => 'map-',
				'label_block'  => true,
			]
		);
	}
}, 10, 3 );

//remove custom header on elementor editor
function remove_custom_header_footer() {
remove_action('cimol-header-page','cimol_custom_header_page') ; 
remove_action('cimol-header-global','cimol_custom_header_global') ; 
remove_action('cimol-custom-footer','cimol_footer_start') ; 
}
add_action( 'elementor/frontend/before_enqueue_scripts', 'remove_custom_header_footer' );

