<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap','font_awesome','slick','fatNav','magnific-popup','magic-css','animate','preloader' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION
// Enqueue custom css
function wp_enqueue_custom_stylesheets() {
    if ( ! is_admin() ) {
        wp_enqueue_style( 'mytheme-custom', get_template_directory_uri() . '/custom.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_custom_stylesheets', 11 );