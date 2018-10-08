<?php
//load all theme jquery script
function cimol_theme_scripts() {
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js',array('jquery'), false, '', false);	
		wp_enqueue_script( 'boostrap', get_template_directory_uri() . '/js/bootstrap.min.js',array(),'', 'in_footer');
		wp_enqueue_script( 'jquery-effects-core');
		wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/superfish.js',array(),'', 'in_footer');
		wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js',array(),'', 'in_footer');
		wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js',array(),'', 'in_footer');
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/js/jquery.sticky.js',array(),'', 'in_footer');
		wp_enqueue_script( 'imagesloaded'); 	
		wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/js/slick.min.js',array(),'', 'in_footer');
		wp_enqueue_script( 'cimol-slick-slider-animation', get_template_directory_uri() . '/js/slick-animation.js',array(),'', 'in_footer');
		wp_enqueue_script( 'cimol_totop', get_template_directory_uri() . '/js/totop.js',array(),'', 'in_footer');
		wp_enqueue_script( 'cimol_customscript', get_template_directory_uri() . '/js/script.js',array(),'', 'in_footer');
		// Load the html5 shiv.		
		wp_enqueue_script( 'cimol-html5','https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js', array(), '3.7.3' );
		wp_script_add_data( 'cimol-html5', 'conditional', 'lt IE 9' );
}    




