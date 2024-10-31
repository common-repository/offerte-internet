<?php
/*
Plugin Name: Offerte Internet
Plugin URI:  https://www.offerteinternet.net
Description: Aggiunge un widget che mostra le migliori offerte internet per l'adsl e la fibra in Italia prese da OfferteInternet.net.
Version:     2.1.4
Author:      Offerte Internet
Author URI:  https://gravida.pro/emanuele-feliziani-web-developer
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/widget.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/fetch_and_store.php' );

// Create the cron job
add_action( 'offerte_internet_cron_hook', 'offerte_internet_fetch_data' );
// Create a scheduled event (if it does not exist already)…
function offerte_internet_add_cron() {
	if ( ! wp_next_scheduled( 'offerte_internet_cron_hook' ) ) {
		wp_schedule_event( time(), 'daily', 'offerte_internet_cron_hook' );
	}
}
// …and make sure it's called whenever WordPress loads
add_action( 'wp', 'offerte_internet_add_cron' );

// On activation we create the option and populate it.
function offerte_internet_activate() {
	offerte_internet_fetch_data();
	offerte_internet_add_cron();
}
register_activation_hook( __FILE__, 'offerte_internet_activate' );

// When deactivating the plugin, we clean up the options.
function offerte_internet_deactivate() {
	delete_option( 'offerte_internet_data' );
	$timestamp = wp_next_scheduled( 'offerte_internet_cron_hook' );
	wp_unschedule_event( $timestamp, 'offerte_internet_cron_hook' );
}
register_deactivation_hook( __FILE__, 'offerte_internet_deactivate' );

// Enqueue appropriate styles and scripts
add_action( 'wp_enqueue_scripts', 'offerte_internet_assets' );
function offerte_internet_assets() {
	wp_enqueue_style( 'offerte-internet-styles', plugin_dir_url( __FILE__ ) . 'offerte-internet.css' );
}
