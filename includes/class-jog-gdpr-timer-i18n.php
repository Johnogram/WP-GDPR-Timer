<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://minns.io
 * @since      1.0.0
 *
 * @package    Jog_Gdpr_Timer
 * @subpackage Jog_Gdpr_Timer/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Jog_Gdpr_Timer
 * @subpackage Jog_Gdpr_Timer/includes
 * @author     John-O-Gram <john@minns.io>
 */
class Jog_Gdpr_Timer_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'jog-gdpr-timer',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
