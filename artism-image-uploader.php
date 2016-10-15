<?php

function artism_images_metaboxes() {
    add_meta_box(
      'artism-images',
      'Artwork Uploader',
      'artism_images_uploader_callback',
      'artwork',
      'side'
    );
}

// REGISTER METABOXES ------------------------------------------------------------------------

add_action( 'add_meta_boxes', 'artism_images_metaboxes' );

// PRIMARY IMAGE -----------------------------------------------------------------------------

function artism_images_uploader_callback( $post_id ) {
  wp_nonce_field( basename( __FILE__), 'artism_images_nonce' );
  ?><div class="image_wrap">
      <div class="artism__imagewrapper">
        <img id="primary-image-tag" />
        <input type="hidden" id="primary-image-hidden-field" name="image" />
        <input type="button" id="primary-image-upload-button" value="Add Image" />
        <input type="button" id="primary-image-delete-button" value="Remove Image" />
      </div>
      <div class="artism__imagewrapper">
        <img id="secondary-image-tag" />
        <input type="hidden" id="secondary-image-hidden-field" name="secondaryImage" />
        <input type="button" id="secondary-image-upload-button" value="Add Image" />
        <input type="button" id="secondary-image-delete-button" value="Remove Image" />
      </div>
  </div>
  <?php
}
function artism_save_images( $post_id ) {
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'artism_images_nonce' ] ) && wp_verify_nonce( $_POST[ 'artism_images_nonce' ], basename( __FILE__ )));

  // exits script depnding on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
    return;
  }

  if (isset( $_POST[ 'image' ])) {
      $primary_image_data = json_decode( stripslashes( $_POST[ 'image' ]));
      if ( is_object( $primary_image_data[0] ) ) {
  			$primary_image_data = (esc_url_raw( $primary_image_data[0]->url ));
        update_post_meta( $post_id, 'image', $primary_image_data );
    	} else {
        $primary_image_data = [];
      }
  }

  if (isset( $_POST[ 'secondaryImage' ])) {
      $secondary_image_data = json_decode( stripslashes( $_POST[ 'secondaryImage' ]));
      if ( is_object( $secondary_image_data[0] ) ) {
  			$secondary_image_data = (esc_url_raw( $secondary_image_data[0]->url ));
        update_post_meta( $post_id, 'secondaryImage', $secondary_image_data );
    	} else {
        $secondary_image_data = [];
      }
  }
}

add_action( 'save_post', 'artism_save_images' );
