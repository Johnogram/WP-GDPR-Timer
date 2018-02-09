<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://minns.io
 * @since      1.0.0
 *
 * @package    Jog_Gdpr_Timer
 * @subpackage Jog_Gdpr_Timer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Jog_Gdpr_Timer
 * @subpackage Jog_Gdpr_Timer/admin
 * @author     John-O-Gram <john@minns.io>
 */
class Jog_Gdpr_Timer_Admin {

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
	 * Namespace options
	 * 
	 * @since 	1.0.0
	 * @access 	private
	 * @var 	string 		$option_name 	The options namespace
	 */
	private $option_name = 'jog_gdpr_options';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jog-gdpr-timer-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/jog-gdpr-timer-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );

	}

	/**
	 * Add options page
	 * 
	 * @since 1.0.0
	 */
	public function add_options_page() {

		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'GDPR Countdown Timer Settings', 'jog-gdpr-timer' ),
			__( 'GDPR Countdown Timer', 'jog-gdpr-timer' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);

	}

	/**
	 * Render the options page
	 * 
	 * @since	1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/jog-gdpr-timer-admin-display.php';
	}

	/**
	 * Register plugin settings
	 * 
	 * @since	1.0.0
	 */
	public function register_settings() {

		/**
		 * Add settings page
		 */
		add_settings_section( 
			$this->option_name . '_appearance_settings',
			__( 'Appearance Settings', 'jog-gdpr-timer' ),
			array( $this, $this->option_name . '_appearance_settings_cb' ),
			$this->plugin_name
		);

		/**
		 * Add settings fields
		 */
		add_settings_field( 
			$this->option_name . '_text_colour',
			__( 'Text Colour', 'jog-gdpr-timer' ),
			array( $this, $this->option_name . '_text_colour_cb' ),
			$this->plugin_name,
			$this->option_name . '_appearance_settings',
			array( 'label_for' => $this->option_name . '_text_colour' )
		);

		add_settings_field( 
			$this->option_name . '_bg_colour',
			__( 'BG Colour', 'jog-gdpr-timer' ),
			array( $this, $this->option_name . '_bg_colour_cb' ),
			$this->plugin_name,
			$this->option_name . '_appearance_settings',
			array( 'label_for' => $this->option_name . '_bg_colour' )
		);

		add_settings_field( 
			$this->option_name . '_custom_font_url',
			__( 'Custom Font URL', 'jog-gdpr-timer' ),
			array( $this, $this->option_name . '_custom_font_url_cb' ),
			$this->plugin_name,
			$this->option_name . '_appearance_settings',
			array( 'label_for' => $this->option_name . '_custom_font_url' )
		);

		add_settings_field( 
			$this->option_name . '_custom_font_family',
			__( 'Custom Font Family', 'jog-gdpr-timer' ),
			array( $this, $this->option_name . '_custom_font_family_cb' ),
			$this->plugin_name,
			$this->option_name . '_appearance_settings',
			array( 'label_for' => $this->option_name . '_custom_font_family' )
		);

		/**
		 * Register the settings fields
		 */
		register_setting(
			$this->plugin_name,
			$this->option_name . '_text_colour',
			array( $this, $this->option_name . '_sanitize_values' )
		);

		register_setting(
			$this->plugin_name,
			$this->option_name . '_bg_colour',
			array( $this, $this->option_name . '_sanitize_values' )
		);

		register_setting(
			$this->plugin_name,
			$this->option_name . '_custom_font_url',
			array( $this, $this->option_name . '_sanitize_values' )
		);

		register_setting(
			$this->plugin_name,
			$this->option_name . '_custom_font_family',
			array( $this, $this->option_name . '_sanitize_values' )
		);
	}

	/**
	 * Sanitize the values
	 * 
	 * @since	1.0.0
	 * @param 	string	$value	$_POST value
	 * @return 	string	Sanitized value
	 */
	public function jog_gdpr_options_sanitize_values( $value ) {

		// To Do: Add sanitization
		return $value;

	}

	/**
	 * Render the text for the appearance settings page
	 * 
	 * @since 	1.0.0
	 */
	public function jog_gdpr_options_appearance_settings_cb() {
		echo '<p>' . __( 'Choose how your timer will look', 'jog-gdpr-timer' ) . '</p>';
	}

	/**
	 * 
	 */
	public function jog_gdpr_options_text_colour_cb() {
		$text_colour = get_option( $this->option_name . '_text_colour' );
		echo '<input
			type="text"
			name="' . $this->option_name . '_text_colour' . '"
			id="' . $this->option_name . '_text_colour' . '"
			value="' . $text_colour . '"
			class="colour-field"
		>';
	}

	/**
	 * 
	 */
	public function jog_gdpr_options_bg_colour_cb() {
		$bg_colour = get_option( $this->option_name . '_bg_colour' );
		echo '<input
			type="text"
			name="' . $this->option_name . '_bg_colour' . '"
			id="' . $this->option_name . '_bg_colour' . '"
			value="' . $bg_colour . '"
			class="colour-field"
		>';
	}

	/**
	 * 
	 */
	public function jog_gdpr_options_custom_font_url_cb() {
		$custom_font_url = get_option( $this->option_name . '_custom_font_url' );
		echo '<input
			type="text"
			name="' . $this->option_name . '_custom_font_url' . '"
			id="' . $this->option_name . '_custom_font_url' . '"
			value="' . $custom_font_url . '"
			class="regular-text"
		>';
	}

	/**
	 * 
	 */
	public function jog_gdpr_options_custom_font_family_cb() {
		$custom_font_family = get_option( $this->option_name . '_custom_font_family' );
		echo '<input
			type="text"
			name="' . $this->option_name . '_custom_font_family' . '"
			id="' . $this->option_name . '_custom_font_family' . '"
			value="' . $custom_font_family . '"
			class="regular-text"
		>';
	}


}
