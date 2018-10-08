<?php

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
        
			<div class="clearfix content page-content-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-8 news-list aligncenter">
							<h2 class="error-title"><?php esc_html_e('404', 'cimol'); ?></h2>
							<h3><?php esc_html_e('Oops..!!! Page not found!','cimol') ?></h3>
                            <div class="spacing40 clearboth"></div>
							<a class="content-btn" href="<?php echo esc_url ( home_url() ); ?>"><?php esc_html_e('Go Back Now!','cimol') ?></a>
						</div><!--/.col-md-8-->
						
						<?php get_sidebar(); ?>
					 </div><!--/.row-->
				</div><!--/.container-->
			</div><!--/.content-->
    
    
	<?php //custom footer
        if ( function_exists( 'ot_get_option' ) ) { 
			do_action('cimol-custom-footer','cimol_footer_start') ;
        } else {
			//Fall back if no optiontree installed
			get_template_part( 'loop/bottom','footer'); 
		}
        
get_footer(); ?>