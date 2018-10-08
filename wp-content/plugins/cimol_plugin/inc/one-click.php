<?php

//oneclick importer
function ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => 'All Demo Content',
			'import_file_url'            => plugins_url( '/demo-data/cimol.xml' , __FILE__ ),
			'import_widget_file_url'     => plugins_url( '/demo-data/cimol.wie' , __FILE__ ),
			'import_preview_image_url'   => plugins_url( '/demo-data/cimol.jpg' , __FILE__ ),
			'import_notice'                => __( '<p>To prevent any error, please use the clean wordpress site to import the demo data. </p><p>Or you can use this plugin 
			<a href="https://wordpress.org/plugins/wordpress-database-reset/" target="_blank">WordPress Database Reset</a> to reset/clear the database first.</p><p>After you import this demo, you will have to setup the elementor page builder & flickr settings separately.</p>', 'cordon_plg' ),
			'preview_url'                => 'http://theme.ridianur.com/cimol/',
		),
		array(
			'import_file_name'           => 'Library/Page Template Only',
			'import_file_url'            => plugins_url( '/demo-data/cimol-library.xml' , __FILE__ ),
			'import_preview_image_url'   => plugins_url( '/demo-data/library.jpg' , __FILE__ ),
			'import_notice'                => __( 'For better import experience, try to import the media first.', 'cordon_plg' ),
			'preview_url'                => 'http://theme.ridianur.com/cimol/',
		),
		array(
			'import_file_name'           => 'Media Only',
			'import_file_url'            => plugins_url( '/demo-data/cimol-media.xml' , __FILE__ ),
			'import_preview_image_url'   => plugins_url( '/demo-data/media.jpg' , __FILE__ ),
			'import_notice'                => __( 'Import the media first before you import the library/page template.', 'cordon_plg' ),
			'preview_url'                => 'http://theme.ridianur.com/cimol/',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );


add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );


function ocdi_after_import( $selected_import ) {
	
	// Assign menus to their locations.
    $multi_page = get_term_by( 'name', 'Default Menu', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
			'ridianur-homepage-menu' => $multi_page->term_id,
        )
    );

	if ( 'All Demo Content' === $selected_import['import_file_name'] ) {
 		// The exported theme options string
        $str = file_get_contents( plugins_url( '/demo-data/cimol.txt' , __FILE__ ));
        $theme_options = unserialize(ot_decode($str));
        update_option(ot_options_id(), $theme_options);
		
		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Home Agency' );
	
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );

	}
	

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import' );

