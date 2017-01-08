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
require_once ( plugin_dir_path(__FILE__) . 'artism-description.php');
require_once ( plugin_dir_path(__FILE__) . 'artism-primary-image-uploader.php');
require_once ( plugin_dir_path(__FILE__) . 'artism-complementary-images-uploader.php');
require_once ( plugin_dir_path(__FILE__) . 'artism-fields.php');

require_once ( plugin_dir_path(__FILE__) . 'artism-template-functions.php');

function artism_admin_enqueue_scripts() {
    global $pagenow, $typenow;

    if ( ( $pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'artism') {
      wp_enqueue_media();
      wp_enqueue_style( 'artism-admin', plugins_url( 'css/artism.css', __FILE__ ) );
      wp_enqueue_style( 'artism-single', plugins_url( 'css/artism-single.css', __FILE__ ) );
      wp_enqueue_script( 'artism-js', plugins_url( 'js/artism.js', __FILE__ ), array( 'jquery', 'media-upload', 'jquery-ui-datepicker' ), '20170103' );
      wp_localize_script( 'artism-js', 'artismImageUpload', array(
         'primaryImageData' => get_post_meta( get_the_ID(), 'image', true),
         'complementaryImageData' => get_post_meta( get_the_ID(), 'complementaryImage', true),
         'secondComplementaryImageData' => get_post_meta( get_the_ID(), 'secondComplementaryImage', true)
         ) );
      wp_enqueue_style( 'artism-datepicker-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
    }
}

add_action( 'admin_enqueue_scripts', 'artism_admin_enqueue_scripts' );

function artism_index_enqueue_scripts() {
      wp_enqueue_style( 'artism-index', plugins_url( 'css/artism-index.css', __FILE__ ), '20170104' );
}

add_action( 'wp_enqueue_scripts', 'artism_index_enqueue_scripts' );

add_theme_support( 'post-thumbnails' );


?>
