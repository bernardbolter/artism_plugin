<?php
/**
* Plugin Name: Artism
* Plugin URI: http://artism.org
* Description: A plugin to manage and artwork that conforms to schema.org's Visual Artwork schema
* Author: Bernard John Bolter IV
* Author URI: http://bernardbolter.com
* Version: 0.0.1
* License: GPLv2
*/

if ( ! defined( 'ABSPATH') ) {
  exit;
}

require_once ( plugin_dir_path(__FILE__) . 'artism-cpt.php');
require_once ( plugin_dir_path(__FILE__) . 'artism-render-admin.php');
require_once ( plugin_dir_path(__FILE__) . 'artism-fields.php');


?>
