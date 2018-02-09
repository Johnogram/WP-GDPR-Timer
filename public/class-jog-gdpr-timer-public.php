<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://minns.io
 * @since      1.0.0
 *
 * @package    Jog_Gdpr_Timer
 * @subpackage Jog_Gdpr_Timer/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Jog_Gdpr_Timer
 * @subpackage Jog_Gdpr_Timer/public
 * @author     John-O-Gram <john@minns.io>
 */
class Jog_Gdpr_Timer_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * UNIX Timestamp for GDPR
	 * 
	 * @since 	1.0.0
	 * @access 	private
	 * @var 	string		$gdpr_unix_time		The Unix Timestamp for GDPR
	 */
	private $gdpr_unix_time;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->gdpr_unix_time = mktime( 0, 0, 0, 5, 25, 2018 );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Jog_Gdpr_Timer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Jog_Gdpr_Timer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jog-gdpr-timer-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Jog_Gdpr_Timer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Jog_Gdpr_Timer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/jog-gdpr-timer-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Get GDPR unix timestamp
	 * 
	 * @since 	1.0.0
	 * @access 	private
	 * @return	string 		The GDPR enforcement data as unix timestap
	 */
	private function get_gdpr_time() {
		return $this->gdpr_unix_time;
	}

}
