<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <meta name="author" content="<?php the_author_meta('display_name', 1); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" >	
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?> 
</head>
	
    <body <?php body_class(); ?>>
	
	
				<!--preloader function-->
                <?php if ( function_exists( 'ot_get_option' ) ) :if (ot_get_option( 'preloader_set')) :  
                 $cimol_preload = ot_get_option( 'preloader_set' ); if ($cimol_preload == 'show_home') {  ?>
                    
                    <?php  if (is_front_page() ){ ?>
                            <!-- Preloader -->
                            <div id="preloader">
                                <div id="status">
                                    <div class="spinner">
                                      <div class="rect1"></div>
                                      <div class="rect2"></div>
                                      <div class="rect3"></div>
                                      <div class="rect4"></div>
                                      <div class="rect5"></div>
                                    </div>
                                </div><!--status-->
                            </div><!--/preloader-->
                    
                    <?php } 
                } else if ($cimol_preload == 'show_all') {?>
                
                       	<!-- Preloader -->
                        <div id="preloader">
                            <div id="status">
                                <div class="spinner">
                                  <div class="rect1"></div>
                                  <div class="rect2"></div>
                                  <div class="rect3"></div>
                                  <div class="rect4"></div>
                                  <div class="rect5"></div>
                                </div>
                            </div><!--status-->
                        </div><!--/preloader-->
                
                <?php  } endif ; endif; ?>
				