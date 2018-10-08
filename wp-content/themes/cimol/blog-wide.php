<?php
/*
* Template Name: Blog Wide 
* Description: Blog page wide style without sidebar
*/

get_header(); 
        
		//custom header
		if ( function_exists( 'ot_get_option' ) ) { 
			do_action('cimol-custom-header','cimol_header_start') ;        
        } else { ?>
        
            <!--Fall back if no optiontree installed-->
            <!--HOME START-->
            <div class="default-header clearfix">
                <!--HEADER START-->
                <?php get_template_part( 'loop/menu','normal'); ?>
                <!--HEADER END-->
            </div><!--/home end-->
            <!--HOME END-->
            
		<?php } ?>
        	

		<div class="content blog-wrapper">  
			<div class="container clearfix blog-content">

				<?php $cimol_post_per_page = get_option('posts_per_page');
                      $cimol_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                      $cimol_args = array(
                          'posts_per_page' => $cimol_post_per_page,
                          'paged' => $cimol_paged,
                          'post_type' => 'post'
                        ); 
                        query_posts($cimol_args);
                        
                 get_template_part( 'loop/loop', 'post' ); ?>
                
                 <?php  cimol_pagination(); ?>
                <div class="spacing40 clearfix"></div>
	
			</div><!--/.container-fluid-->
		</div><!--/.blog-wrapper-->

	<?php //custom footer
        if ( function_exists( 'ot_get_option' ) ) { 
			do_action('cimol-custom-footer','cimol_footer_start') ;
        } else {
			//Fall back if no optiontree installed
			get_template_part( 'loop/bottom','footer'); 
		}
        
get_footer(); ?>