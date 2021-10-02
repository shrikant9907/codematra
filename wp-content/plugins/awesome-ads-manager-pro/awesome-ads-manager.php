<?php

/*
 * Plugin Name: Awesome Ads Manager Pro
 * Plugin URI: http://demos.wpbugfixers.com/awesome-ads-manager-for-wp
 * Description: This plugin is useful for manage banners and ads in your wordpresss site.
 * Version: 1.0.0
 * Released: 23 Sep 2017
 * Author: Shrikant Yadav
 * Author URI: http://shrikantyadav.com/
 */

/*
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "You Can not access this page directly." );

/*
 * Plugin Directory Path
 */
define( 'AAM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/*
* Plugin directory URL
*/
define( 'AAM_PLUGIN_URL',  plugin_dir_url( __FILE__ ) );

/*
* Plugin file
*/
define( 'AAM_PLUGIN_FILE', __FILE__ );

/*
 * Plugin Name
 */
define( 'AAN_PLUGIN_NAME', 'Awesome Ads Manager' ); 

/*
 * Plugin Slug 
 */
define( 'AAN_PLUGIN_SLUG', 'awesome-ads-manager' ); 

/*
 * Plugin Version
 */
define( 'AAM_PLUGIN_VERSION', '1.0.0'  );

/*
 * Plugin Prefix
 */
define( 'AAM_PLUGIN_PREFIX', 'aam_'  );

/*
 * Text Domain
 */
define( 'AAM_TEXT_DOMAIN', 'wp-bug-fixers'  );

/*
* Plugin Required Files
*/
require_once AAM_PLUGIN_DIR . 'include/class-awesome-ads-manager.php';


/*
 * Plugin Class
 */
//$awesome_ads_manager = new Awesome_Ads_Manager();

/*
 * Plugin Activation Hook
 */
//register_activation_hook( __FILE__, array( $awesome_ads_manager, 'activate' ) );

/*
 * Plugin De-activation Hook
 */
//register_deactivation_hook( __FILE__, array( $awesome_ads_manager, 'deactivate' ) );

