<?php
/**
 * Initialize the Post Post Meta Boxes. 
 */
add_action( 'admin_init', 'cimol_page_mb' );
function cimol_page_mb() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $cimol_page_mb = array(
    'id'          => 'page_meta_box',
    'title'       => esc_html__( 'Page Settings', 'cimol_plg' ),
    'desc'        => '',
    'pages'       => array( 'page','portfolio','post'),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	
	  array(
        'id'          => 'custom_footer_header_note',
        'label'       => esc_html__('Please Note', 'cimol_plg' ),
        'desc'        => esc_html__('The Custom Header & Custom Footer only appear on the actual page, not in elementor editor.', 'cimol_plg' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  
	   
	  
	  array(
        'label'       => esc_html__( 'Header Settings', 'cimol_plg' ),
        'id'          => 'header_setting_section',
        'type'        => 'tab',
      ),
	  
	  array(
        'label'       => esc_html__( 'Header Options', 'cimol_plg' ),
		'desc'          =>  '',
        'id'          => 'custom_header_choice',
        'type'        => 'select',
		'std'		 => 'global',
		'choices'     => array( 
			 array(
                'value'       => 'global',
                'label'       => esc_html__( 'Use Global Settings (in Theme Options)', 'cimol_plg' )
              ),
			  array(
                'value'       => 'standard',
                'label'       => esc_html__( 'Use Default Header', 'cimol_plg' )
              ),
			  array(
                'value'       => 'custom_header',
                'label'       => esc_html__( 'Use Custom Header', 'cimol_plg' )
              ),
			  array(
                'value'       => 'no_header',
                'label'       => esc_html__( 'No Header', 'cimol_plg' )
              ),
			  
		)
      ),
	  
      array(
        'id'          => 'header_list',
        'label'       => esc_html__( 'Choose Custom Header', 'cimol_plg' ),
        'desc'        => '',
        'std'         => '',
		'condition'   => 'custom_header_choice:is(custom_header)',
        'type' => 'custom-post-type-select',
        'rows'        => '',
        'post_type'   => 'header',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  
	  array(
        'label'       => esc_html__( 'Header Format', 'cimol_plg' ),
		'desc'          =>  esc_html__( '', 'cimol_plg' ),
        'id'          => 'menu_format',
        'type'        => 'select',
		'condition'   => 'custom_header_choice:is(standard)',
		'std'		 => 'head_clean',
		'choices'     => array( 
			  array(
                'value'       => 'head_clean',
                'label'       => esc_html__( 'Black Text with White Background Header in Relative Position', 'cimol_plg' )
              ),
			  array(
                'value'       => 'head_standard',
                'label'       => esc_html__( 'White Text with Transparent Background Header in Absolute Position', 'cimol_plg' )
              ),
			  
		)
      ),
	  
	  array(
        'label'       => esc_html__( 'Footer Settings', 'cimol_plg' ),
        'id'          => 'footer_setting_section',
        'type'        => 'tab',
      ),
 
	  array(
        'label'       => esc_html__( 'Use Custom Footer', 'cimol_plg' ),
		'desc'          =>  '',
        'id'          => 'custom_footer_choice',
        'type'        => 'select',
		'std'		 => 'global',
		'choices'     => array( 
			  array(
                'value'       => 'global',
                'label'       => esc_html__( 'Use Global Settings (in Theme Options) Footer', 'cimol_plg' )
              ),
			  array(
                'value'       => 'standard',
                'label'       => esc_html__( 'Use Default Footer', 'cimol_plg' )
              ),
			  array(
                'value'       => 'custom_footer',
                'label'       => esc_html__( 'Use Custom Footer', 'cimol_plg' )
              ),
			  array(
                'value'       => 'no_footer',
                'label'       => esc_html__( 'No Footer', 'cimol_plg' )
              ),
			  
		)
      ),
	  
	
	  
	  array(
        'id'          => 'footer_list',
        'label'       => esc_html__( 'Choose Custom Footer', 'cimol_plg' ),
        'desc'        => '',
        'std'         => '',
		'condition'   => 'custom_footer_choice:is(custom_footer)',
        'type' => 'custom-post-type-select',
        'rows'        => '',
        'post_type'   => 'footer',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $cimol_page_mb );

}

