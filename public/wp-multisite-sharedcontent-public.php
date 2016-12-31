<?php

class WP_Multisite_SharedContent_Public 
{
	private $localization_domain;
	private $version;


	public function __construct( $localization_domain, $version ) 
	{
		$this->localization_domain = $localization_domain;
		$this->version = $version;
	}
	

	//shortcode that displays content from another blog
	public function display_content($atts)
	{
		$requested_blog_id =    $atts['blog'];
		$requested_content_id = $atts['id'];

		switch_to_blog($requested_blog_id);

		$page = get_post($requested_content_id);
		$content = do_shortcode($page->post_content);

		restore_current_blog();

		return $content;
	}

}//WP_Multisite_SharedContent_Public
