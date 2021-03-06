<?php
/**
 * Front-end Actions
 *
 * @package     Give
 * @subpackage  Functions
 * @copyright   Copyright (c) 2016, WordImpress
 * @license     https://opensource.org/licenses/gpl-license GNU Public License
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hooks Give actions, when present in the $_GET superglobal. Every give_action
 * present in $_GET is called using WordPress's do_action function. These
 * functions are called on init.
 *
 * @since  1.0
 *
 * @return void
 */
function give_get_actions() {

	$get_data = give_clean( $_GET ); // WPCS: input var ok, sanitization ok, CSRF ok.

	$_get_action = ! empty( $get_data['give_action'] ) ? $get_data['give_action'] : null;

	// Add backward compatibility to give-action param ( $_GET ).
	if ( empty( $_get_action ) ) {
		$_get_action = ! empty( $get_data['give-action'] ) ? $get_data['give-action'] : null;
	}

	if ( isset( $_get_action ) ) {
		/**
		 * Fires in WordPress init or admin init, when give_action is present in $_GET.
		 *
		 * @since 1.0
		 *
		 * @param array $_GET Array of HTTP GET variables.
		 */
		do_action( "give_{$_get_action}", $get_data );
	}

}

add_action( 'init', 'give_get_actions' );

/**
 * Hooks Give actions, when present in the $_POST super global. Every give_action
 * present in $_POST is called using WordPress's do_action function. These
 * functions are called on init.
 *
 * @since  1.0
 *
 * @return void
 */
function give_post_actions() {

	$post_data = give_clean( $_POST ); // WPCS: input var ok, sanitization ok, CSRF ok.

	$_post_action = ! empty( $post_data['give_action'] ) ? $post_data['give_action'] : null;

	// Add backward compatibility to give-action param ( $_POST ).
	if ( empty( $_post_action ) ) {
		$_post_action = ! empty( $post_data['give-action'] ) ? $post_data['give-action'] : null;
	}

	if ( isset( $_post_action ) ) {
		/**
		 * Fires in WordPress init or admin init, when give_action is present in $_POST.
		 *
		 * @since 1.0
		 *
		 * @param array $_POST Array of HTTP POST variables.
		 */
		do_action( "give_{$_post_action}", $post_data );
	}

}

add_action( 'init', 'give_post_actions' );

/**
 * Connect WordPress user with Donor.
 *
 * @param  int   $user_id   User ID.
 * @param  array $user_data User Data.
 *
 * @since  1.7
 *
 * @return void
 */
function give_connect_donor_to_wpuser( $user_id, $user_data ) {
	/* @var Give_Donor $donor */
	$donor = new Give_Donor( $user_data['user_email'] );

	// Validate donor id and check if do nor is already connect to wp user or not.
	if ( $donor->id && ! $donor->user_id ) {

		// Update donor user_id.
		if ( $donor->update( array( 'user_id' => $user_id ) ) ) {
			$donor_note = sprintf( esc_html__( 'WordPress user #%d is connected to #%d', 'give' ), $user_id, $donor->id );
			$donor->add_note( $donor_note );

			// Update user_id meta in payments.
			// if( ! empty( $donor->payment_ids ) && ( $donations = explode( ',', $donor->payment_ids ) ) ) {
			// 	foreach ( $donations as $donation  ) {
			// 		give_update_meta( $donation, '_give_payment_user_id', $user_id );
			// 	}
			// }
			// Do not need to update user_id in payment because we will get user id from donor id now.
		}
	}
}

add_action( 'give_insert_user', 'give_connect_donor_to_wpuser', 10, 2 );


/**
 * Processing after donor batch export complete
 *
 * @since 1.8
 *
 * @param $data
 */
function give_donor_batch_export_complete( $data ) {
	// Remove donor ids cache.
	if (
		isset( $data['class'] )
		&& 'Give_Batch_Donors_Export' === $data['class']
		&& ! empty( $data['forms'] )
		&& isset( $data['give_export_option']['query_id'] )
	) {
		Give_Cache::delete( Give_Cache::get_key( $data['give_export_option']['query_id'] ) );
	}
}

add_action( 'give_file_export_complete', 'give_donor_batch_export_complete' );

/**
 * Print css for wordpress setting pages.
 *
 * @since 1.8.7
 */
function give_admin_quick_css() {
	/* @var WP_Screen $screen */
	$screen = get_current_screen();

	if ( ! ( $screen instanceof WP_Screen ) ) {
		return false;
	}

	switch ( true ) {
		case ( 'plugins' === $screen->base || 'plugins-network' === $screen->base ):
			?>
			<style>
				tr.active.update + tr.give-addon-notice-tr td {
					box-shadow: none;
					-webkit-box-shadow: none;
				}

				tr.active + tr.give-addon-notice-tr td {
					position: relative;
					top: -1px;
				}

				tr.active + tr.give-addon-notice-tr .notice {
					margin: 5px 20px 15px 40px;
				}

				tr.give-addon-notice-tr .dashicons {
					color: #f56e28;
				}

				tr.give-addon-notice-tr td {
					border-left: 4px solid #00a0d2;
				}

				tr.give-addon-notice-tr td {
					padding: 0 !important;
				}

				tr.active.update + tr.give-addon-notice-tr .notice {
					margin: 5px 20px 5px 40px;
				}
			</style>
			<?php
	}
}

add_action( 'admin_head', 'give_admin_quick_css' );


/**
 * Set Donation Amount for Multi Level Donation Forms
 *
 * @param int $form_id Donation Form ID.
 *
 * @since 1.8.9
 *
 * @return void
 */
function give_set_donation_levels_max_min_amount( $form_id ) {
	if (
		( 'set' === $_POST['_give_price_option'] ) ||
		( in_array( '_give_donation_levels', $_POST ) && count( $_POST['_give_donation_levels'] ) <= 0 ) ||
		! ( $donation_levels_amounts = wp_list_pluck( $_POST['_give_donation_levels'], '_give_amount' ) )
	) {
		// Delete old meta.
		give_delete_meta( $form_id, '_give_levels_minimum_amount' );
		give_delete_meta( $form_id, '_give_levels_maximum_amount' );

		return;
	}

	// Sanitize donation level amounts.
	$donation_levels_amounts = array_map( 'give_maybe_sanitize_amount', $donation_levels_amounts );

	$min_amount = min( $donation_levels_amounts );
	$max_amount = max( $donation_levels_amounts );

	// Set Minimum and Maximum amount for Multi Level Donation Forms.
	give_update_meta( $form_id, '_give_levels_minimum_amount', $min_amount ? give_sanitize_amount_for_db( $min_amount ) : 0 );
	give_update_meta( $form_id, '_give_levels_maximum_amount', $max_amount ? give_sanitize_amount_for_db( $max_amount ) : 0 );
}

add_action( 'give_pre_process_give_forms_meta', 'give_set_donation_levels_max_min_amount', 30 );


/**
 * Save donor address when donation complete
 *
 * @since 2.0
 *
 * @param int $payment_id
 */
function _give_save_donor_billing_address( $payment_id ) {
	$donor_id  = absint( give_get_payment_donor_id( $payment_id ));

	// Bailout
	if ( ! $donor_id ) {
		return;
	}


	/* @var Give_Donor $donor */
	$donor = new Give_Donor( $donor_id );

	// Save address.
	$donor->add_address( 'billing[]', give_get_donation_address( $payment_id ) );
}

add_action( 'give_complete_donation', '_give_save_donor_billing_address', 9999 );


/**
 * Update form id in payment logs
 *
 * @since 2.0
 *
 * @param array $args
 */
function give_update_log_form_id( $args ) {
	$new_form_id = absint( $args[0] );
	$payment_id  = absint( $args[1] );
	$logs        = Give()->logs->get_logs( $payment_id );

	// Bailout.
	if ( empty( $logs ) ) {
		return;
	}

	/* @var object $log */
	foreach ( $logs as $log ) {
		Give()->logs->logmeta_db->update_meta( $log->ID, '_give_log_form_id', $new_form_id );
	}

	// Delete cache.
	Give()->logs->delete_cache();
}

add_action( 'give_update_log_form_id', 'give_update_log_form_id' );

/**
 * Verify addon dependency before addon update
 *
 * @since 2.1.4
 *
 * @param $error
 * @param $hook_extra
 *
 * @return WP_Error
 */
function __give_verify_addon_dependency_before_update( $error, $hook_extra ) {
	// Bailout.
	if (
		is_wp_error( $error )
		|| ! array_key_exists( 'plugin', $hook_extra )
	) {
		return $error;
	}

	$plugin_base    = strtolower( $hook_extra['plugin'] );
	$licensed_addon = array_map( 'strtolower', Give_License::get_licensed_addons() );

	// Skip if not a Give addon.
	if ( ! in_array( $plugin_base, $licensed_addon ) ) {
		return $error;
	}

	$plugin_base = strtolower( $plugin_base );
	$plugin_slug = str_replace( '.php', '', basename( $plugin_base ) );

	/**
	 * Filter the addon readme.txt url
	 *
	 * @since 2.1.4
	 */
	$url = apply_filters(
		'give_addon_readme_file_url',
		"https://givewp.com/downloads/plugins/{$plugin_slug}/readme.txt",
		$plugin_slug
	);

	$parser           = new Give_Readme_Parser( $url );
	$give_min_version = $parser->requires_at_least();


	if ( version_compare( GIVE_VERSION, $give_min_version, '<' ) ) {
		return new WP_Error(
			'Give_Addon_Update_Error',
			sprintf(
				__( 'Give version %s is required to update this add-on.', 'give' ),
				$give_min_version
			)
		);
	}

	return $error;
}

add_filter( 'upgrader_pre_install', '__give_verify_addon_dependency_before_update', 10, 2 );

/**
 * Function to add suppress_filters param if WPML add-on is activated.
 *
 * @since 2.1.4
 *
 * @param array WP query argument for Total Goal.
 *
 * @return array WP query argument for Total Goal.
 */
function __give_wpml_total_goal_shortcode_agrs( $args ) {
	$args['suppress_filters'] = true;

	return $args;
}

/**
 * Function to remove WPML post where filter in goal total amount shortcode.
 *
 * @since 2.1.4
 * @global SitePress $sitepress
 */
function __give_remove_wpml_parse_query_filter() {
	global $sitepress;
	remove_action('parse_query', array($sitepress, 'parse_query'));
}


/**
 * Function to add WPML post where filter in goal total amount shortcode.
 *
 * @since 2.1.4
 * @global SitePress $sitepress
 */
function __give_add_wpml_parse_query_filter() {
	global $sitepress;
	add_action('parse_query', array($sitepress, 'parse_query'));
}

/**
 * Action all the hook that add support for WPML.
 *
 * @since 2.1.4
 */
function give_add_support_for_wpml() {
	if ( ! function_exists( 'is_plugin_active' ) ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}


	if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) ) {

		add_filter( 'give_totals_goal_shortcode_query_args', '__give_wpml_total_goal_shortcode_agrs' );

		// @see https://wpml.org/forums/topic/problem-with-query-filter-in-get_posts-function/#post-271309
		add_action( 'give_totals_goal_shortcode_before_render', '__give_remove_wpml_parse_query_filter', 99 );
		add_action( 'give_totals_goal_shortcode_after_render', '__give_add_wpml_parse_query_filter', 99 );
	}
}

add_action( 'give_init', 'give_add_support_for_wpml', 1000 );
