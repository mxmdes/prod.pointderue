<?php
function cimol_theme_styles()  
{ 
  // Register the style for the theme
  wp_register_style
    ('bootstrap', 
    get_template_directory_uri() . '/css/bootstrap.min.css', 
    array(), 
    '1', 
    'all' );
  wp_register_style
    ('font_awesome', 
    get_template_directory_uri() . '/css/font-awesome.min.css', 
    array(), 
    '1', 
    'all' );
  wp_register_style
    ('magnific-popup', 
    get_template_directory_uri() . '/css/magnific-popup.css', 
    array(), 
    '1', 
    'all' );
  wp_register_style
    ('preloader', 
    get_template_directory_uri() . '/css/preloader.css', 
    array(), 
    '1', 
    'all' );
  wp_register_style
    ('animate', 
    get_template_directory_uri() . '/css/animate.css', 
    array(), 
    '1', 
    'all' );
  wp_register_style
    ('magic-css', 
    get_template_directory_uri() . '/css/magic.css', 
    array(), 
    '1', 
    'all' );
   wp_register_style
    ('slick', 
    get_template_directory_uri() . '/css/slick.css', 
    array(), 
    '1', 
    'all' );
  wp_register_style
    ('fatNav', 
    get_template_directory_uri() . '/css/jquery.fatNav.css', 
    array(), 
    '1', 
    'all' );
  wp_register_style
    ('cimol-theme-style', 
    get_stylesheet_directory_uri() . '/style.css', 
    array(), 
    '1', 
    'all' );



  // enqueing:
  wp_enqueue_style('bootstrap');
  wp_enqueue_style('font_awesome');
  wp_enqueue_style('slick');
  wp_enqueue_style( 'fatNav' );
  wp_enqueue_style( 'magnific-popup' );
  wp_enqueue_style( 'magic-css' );
  wp_enqueue_style( 'animate' );
  wp_enqueue_style( 'preloader' );
  wp_enqueue_style( 'cimol-theme-style' );
}

//google font
/*
Register Fonts
*/
function cimol_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'cimol' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Arimo:400,700&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,hebrew,latin-ext,vietnamese|Montserrat:400,700,800|Playfair Display:400,400i,700,700i&amp;subset=cyrillic,latin-ext' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
/*
Enqueue scripts and styles.
*/
function cimol_fonts_style() {
    wp_enqueue_style( 'cimol-fonts', cimol_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'cimol_fonts_style' );


//for google font  in editor
function cimol_fonts_editor_style() {
    $font_url = add_query_arg( 'family', urlencode( 'Arimo:400,700&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,hebrew,latin-ext,vietnamese|Montserrat:400,700,800|Playfair Display:400,400i,700,700i&amp;subset=cyrillic,latin-ext' ), "//fonts.googleapis.com/css" );
    add_editor_style( $font_url );
}
add_action( 'after_setup_theme', 'cimol_fonts_editor_style' );