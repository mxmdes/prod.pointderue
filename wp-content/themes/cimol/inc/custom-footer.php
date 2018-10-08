<?php 
//function for custom footer
function cimol_footer_start () {
	if (is_singular()) { //if single page/post
		global $post;
		if (get_post_meta($post->ID, 'custom_footer_choice', true) =='custom_footer' && get_post_meta($post->ID, 'footer_list', true)) { 
			$footer_id =  get_post_meta($post->ID, 'footer_list', true); 
	
				$cimol_footer = new WP_Query(array(
					'posts_per_page'   => 1,
					'post_type' =>  'footer',
					 'p'         => $footer_id,
				)); 
				
				if ($cimol_footer->have_posts()) : while  ($cimol_footer->have_posts()) : $cimol_footer->the_post();
				global $post ; ?>
				
				<footer class="cimol-custom-footer clearfix">
					<?php the_content(); ?>
				</footer>
				
			<?php endwhile; endif; wp_reset_postdata();
		} 
		//if page setting choose footer global
		else if (get_post_meta($post->ID, 'custom_footer_choice', true) =='global'){ 
		
		  //if custom footer & list are selected in theme options
		  if (ot_get_option( 'footer_set' ) =='custom' && ot_get_option( 'footer_set_list' ) !='' ) {
			  
			  $footer_id =  ot_get_option( 'footer_set_list' ); 
		
			  $cimol_footer = new WP_Query(array(
				  'posts_per_page'   => 1,
				  'post_type' =>  'footer',
				   'p'         => $footer_id,
			  )); 
			  
			  if ($cimol_footer->have_posts()) : while  ($cimol_footer->have_posts()) : $cimol_footer->the_post();
			  global $post ; ?>
			  
				  <footer class="cimol-custom-footer clearfix">
					<?php the_content(); ?>
				  </footer>
			  
			  <?php endwhile; endif; wp_reset_postdata();
		  } else {
			  get_template_part( 'loop/bottom','footer');
		  }
		
		//if no footer
		} else if (get_post_meta($post->ID, 'custom_footer_choice', true) =='no_footer'){ 
		//do nothing
		} else {  
			
			//if else (standard footer)
        	get_template_part( 'loop/bottom','footer'); 
		}
	
	//if not single page/post
	} else {
		//if custom footer & list are selected in theme options
		  if (ot_get_option( 'footer_set' ) =='custom' && ot_get_option( 'footer_set_list' ) !='' ) {
			  
			  $footer_id =  ot_get_option( 'footer_set_list' ); 
		
			  $cimol_footer = new WP_Query(array(
				  'posts_per_page'   => 1,
				  'post_type' =>  'footer',
				   'p'         => $footer_id,
			  )); 
			  
			  if ($cimol_footer->have_posts()) : while  ($cimol_footer->have_posts()) : $cimol_footer->the_post();
			  global $post ; ?>
			  
				  <nav class="cimol-custom-footer clearfix <?php echo esc_attr ( get_post_meta($post->ID, 'head_position', true))?>">
					  <?php the_content(); ?>
				  </nav>
			  
			  <?php endwhile; endif; wp_reset_postdata();
		  } else { //standard footer
			  get_template_part( 'loop/bottom','footer'); 
		  }
	}
}