<?php
/*
 * @wordpress-plugin
 * Plugin Name:       WP Mutlisite Shared Content
 * Description:       Wordpress plugin to share content (pages, posts, custom posts) from one blog to another
 * Version:           0.0.1
 * Author:            Justin Wiens
 * Author URI:        https://github.com/justinwiens/wp-multisite-shared-content
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt 
 * Text Domain:       wp-multisite-shared-content
 * Domain Path:       /languages 
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) 
{
	die;
}
define( 'WP_MULTISITE_SHARED_CONTENT_VERSION', '0.0.1' );
define( 'WP_MULTISITE_SHARED_CONTENT_LOCALIZATION_DOMAIN', 'wp-multisite-shared-content' );

require plugin_dir_path( __FILE__ ) . 'includes/plugin-initializer.php';

function run_wp_multisite_shared_content() 
{
	$plugin = new WP_Multisite_SharedContent_Initializer();
	$plugin->initialize();
}
run_wp_multisite_shared_content();