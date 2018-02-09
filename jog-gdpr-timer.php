<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://minns.io
 * @since             1.0.0
 * @package           Jog_Gdpr_Timer
 *
 * @wordpress-plugin
 * Plugin Name:       GDPR Timer
 * Plugin URI:        https://johnogram.github.io/WP-GDPR-Timer/
 * Description:       A quick, easy to use and lightweight GDPR countdown timer, embeded on demand through the use of shortcodes.
 * Version:           1.0.0
 * Author:            John-O-Gram
 * Author URI:        http://minns.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       jog-gdpr-timer
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-jog-gdpr-timer-activator.php
 */
function activate_jog_gdpr_timer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-jog-gdpr-timer-activator.php';
	Jog_Gdpr_Timer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-jog-gdpr-timer-deactivator.php
 */
function deactivate_jog_gdpr_timer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-jog-gdpr-timer-deactivator.php';
	Jog_Gdpr_Timer_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_jog_gdpr_timer' );
register_deactivation_hook( __FILE__, 'deactivate_jog_gdpr_timer' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-jog-gdpr-timer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_jog_gdpr_timer() {

	$plugin = new Jog_Gdpr_Timer();
	$plugin->run();

}
run_jog_gdpr_timer();
