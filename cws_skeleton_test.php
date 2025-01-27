<?php
/*
 * Plugin Name: CWS Skeleton Test
 * Plugin URI: https://github.com/NoomCrazyWeb/cws-skeleton-test.git
 * GitHub Plugin URI: NoomCrazyWeb/cws-skeleton-test
 * GitHub Branch: main
 * Description: A lightweight and flexible WordPress plugin skeleton for testing and development purposes.
 * Version: 1.0.0
 * Author: Crazy Web Studio
 * Author URI: https://www.crazywebstudio.co.th
 * Text Domain: cws-skeleton-test
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Copyright 2024 Crazy Web Studio
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Define constants.
 */
define( 'CWS_SKELETON_TEST_VERSION', '1.0.0' );
define( 'CWS_SKELETON_TEST_DIR', plugin_dir_path( __FILE__ ) );
define( 'CWS_SKELETON_TEST_URL', plugin_dir_url( __FILE__ ) );

/**
 * Activate the plugin.
 */
function cws_skeleton_test_activate() {
    // Code to run on plugin activation.
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'cws_skeleton_test_activate' );

/**
 * Deactivate the plugin.
 */
function cws_skeleton_test_deactivate() {
    // Code to run on plugin deactivation.
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'cws_skeleton_test_deactivate' );

/**
 * Load plugin textdomain for translations.
 */
function cws_skeleton_test_load_textdomain() {
    load_plugin_textdomain( 'cws-events-automation-main', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'cws_skeleton_test_load_textdomain' );

/**
 * Add a sample admin menu.
 */
function cws_skeleton_test_add_admin_menu() {
    add_menu_page(
        __( 'CWS Skeleton Test', 'cws-skeleton-test' ),
        __( 'CWS Skeleton Test', 'cws-skeleton-test' ),
        'manage_options',
        'cws-skeleton-test',
        'cws_skeleton_test_admin_page',
        'dashicons-admin-generic',
        90
    );
}
add_action( 'admin_menu', 'cws_skeleton_test_add_admin_menu' );

/**
 * Display admin page content.
 */
function cws_skeleton_test_admin_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'CWS Skeleton Test Admin Page', 'cws-events-automation-main' ); ?></h1>
        <p><?php esc_html_e( 'This is a placeholder for the plugin admin page.', 'cws-events-automation-main' ); ?></p>
    </div>
    <?php
}

/**
 * Sample shortcode.
 */
function cws_skeleton_test_sample_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'name' => 'World',
    ), $atts, 'cws_skeleton_test' );

    return '<p>' . sprintf( esc_html__( 'Hello, %s!', 'cws-events-automation-main' ), esc_html( $atts['name'] ) ) . '</p>';
}
add_shortcode( 'cws_skeleton_test', 'cws_skeleton_test_sample_shortcode' );

// Plugin ready for further development!
