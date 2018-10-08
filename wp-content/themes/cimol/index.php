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
        	
        
        <div class="content blog-wrapper">  
			<div class="container clearfix">
				 <div class="row clearfix">
				 	<div class="col-md-8 blog-content">
						
						<?php get_template_part( 'loop/loop', 'post' ); ?>
                        
                        <ul class="pagination clearfix">
                            <li><?php  previous_posts_link(); ?></li>
                            <li><?php next_posts_link(); ?> </li>
                        </ul>
                        
						<div class="spacing40 clearfix"></div>
					</div><!--/.col-md-8-->
					
					<?php get_sidebar(); ?>
                    
				 </div><!--/.row-->
			</div><!--/.container-->
		</div><!--/.blog-wrapper-->
        
	<?php //custom footer
        if ( function_exists( 'ot_get_option' ) ) { 
			do_action('cimol-custom-footer','cimol_footer_start') ;
        } else {
			//Fall back if no optiontree installed
			get_template_part( 'loop/bottom','footer'); 
		}
        
get_footer(); ?>