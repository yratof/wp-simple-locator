<?php
require_once('class-sl-activation.php');
require_once('class-sl-shortcode.php');
require_once('class-sl-formhandler.php');
require_once('class-sl-formhandler-posttype.php');
require_once('class-sl-settings.php');
require_once('class-sl-metafields.php');
require_once('class-sl-posttype.php');
require_once('class-sl-dependencies.php');
require_once('class-sl-widget.php');

/**
* Primary Plugin Class
*/
class WPSL_SimpleLocator {

	function __construct()
	{
		$this->init();
		$this->formActions();
		add_filter( 'plugin_action_links_' . 'wp-simple-locator/simplelocator.php', array($this, 'settingsLink' ) );
		add_action( 'init', array($this, 'localize') );
	}


	/**
	* Initialize
	*/
	public function init()
	{
		new WPSL_Activation;
		new WPSL_Dependencies;
		new WPSL_PostType;
		new WPSL_MetaFields;
		new WPSL_Settings;
		new WPSL_Shortcode;
		add_action( 'widgets_init', array($this, 'registerWidget'));
	}


	/**
	* Set Form Actions & Handlers
	*/
	public function formActions()
	{
		if ( is_admin() ) {

			// Front End Form
			add_action( 'wp_ajax_nopriv_locate', 'wpsl_form_handler' );
			add_action( 'wp_ajax_locate', 'wpsl_form_handler' );

			// Admin Settings Post Type Select
			add_action( 'wp_ajax_wpslposttype', 'wpsl_posttype_handler' );
		}
	}


	/**
	* Add a link to the settings on the plugin page
	*/
	public function settingsLink($links)
	{ 
  		$settings_link = '<a href="options-general.php?page=wp_simple_locator">Settings</a>'; 
  		array_unshift($links, $settings_link); 
  		return $links; 
	}


	/**
	* Register the Widget
	*/
	public function registerWidget()
	{
		register_widget( 'WPSL_Widget' );
	}


	/**
	* Localization Text Domain
	*/
	public function localize()
	{
		load_plugin_textdomain('wpsimplelocator', false, 'wp-simple-locator' . '/languages' );
	}

}