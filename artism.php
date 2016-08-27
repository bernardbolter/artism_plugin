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

function artism_admin_enqueue_scripts() {
    global $pagenow, $typenow;

    if ( ( $pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'artwork') {
      wp_enqueue_style( 'artism-admin', plugins_url( 'css/admin-artism.css', __FILE__ ) );
      wp_enqueue_script( 'artism-admin-js', plugins_url( 'js/admin-artism.js', __FILE__ ), array( 'jquery', 'jquery-ui-datepicker' ), '20160808' );
    }

}

add_action( 'admin_enqueue_scripts', 'artism_admin_enqueue_scripts' );

?>
