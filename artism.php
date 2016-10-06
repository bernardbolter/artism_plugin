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
require_once ( plugin_dir_path(__FILE__) . 'artism-image-uploader.php');

function artism_admin_enqueue_scripts() {
    global $pagenow, $typenow;

    if ( ( $pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'artwork') {
      wp_enqueue_media();
      wp_enqueue_style( 'artism-admin', plugins_url( 'css/artism.css', __FILE__ ) );
      wp_enqueue_script( 'artism-js', plugins_url( 'js/artism.js', __FILE__ ), array( 'jquery', 'media-upload', 'jquery-ui-datepicker' ), '20160808' );
      wp_localize_script( 'artism-js', 'customUploads', array( 'imageData' => get_post_meta( get_the_ID(), 'custom_image_data', true ) ) );
      wp_enqueue_style( 'artism-datepicker-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
    }
}

add_action( 'admin_enqueue_scripts', 'artism_admin_enqueue_scripts' );

?>
