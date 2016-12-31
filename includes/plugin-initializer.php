<?php

class WP_Multisite_SharedContent_Initializer {

	protected $registration_manager;
	protected $localization_domain;
	protected $version;


	public function get_localization_domain() 
	{
		return $this->localization_domain;
	}

	public function get_registration_manager() 
	{
		return $this->registration_manager;
	}

	public function get_version() 
	{
		return $this->version;
	}


	public function __construct() 
	{
		$this->localization_domain = 
			defined( 'WP_MULTISITE_SHARED_CONTENT_LOCALIZATION_DOMAIN' ) 
				? WP_MULTISITE_SHARED_CONTENT_LOCALIZATION_DOMAIN
				: 'wp-multisite-shared-content';

		$this->version =
			defined( 'PLUGIN_NAME_VERSION' ) 
				? PLUGIN_NAME_VERSION 
				: '1.0.0';

		$this->load_dependencies();
		$this->define_public_hooks();
	}


	public function initialize() 
	{
		$this->registration_manager->register();
	}


	private function load_dependencies() 
	{
		$basePath = plugin_dir_path( dirname( __FILE__ ) );
		require_once $basePath . 'includes/wp-hook-registration-manager.php';
		require_once $basePath . 'public/wp-multisite-sharedcontent-public.php';

		$this->registration_manager = new WP_Hook_Registration_Manager();
	}

	private function define_public_hooks() 
	{
		$plugin_public = new WP_Multisite_SharedContent_Public( $this->get_localization_domain(), $this->get_version() );

		//register shortcode to display shared content
		$this->registration_manager->add_shortcode( 'wp_multisite_shared_content', $plugin_public, 'display_content' );
	}

} /* WP_Multisite_SharedContent_Initializer */