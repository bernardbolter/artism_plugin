<?php

function artism_images_metaboxes() {
    add_meta_box(
      'artism-images',
      'Primary Artwork Image Uploader',
      'artism_images_uploader_callback',
      'artism',
      'side',
      'high'
    );
}

// REGISTER METABOXES ------------------------------------------------------------------------

add_action( 'add_meta_boxes', 'artism_images_metaboxes' );

// PRIMARY IMAGE -----------------------------------------------------------------------------

function artism_images_uploader_callback( $post_id ) {
  wp_nonce_field( basename( __FILE__), 'artism_images_nonce' );
  ?>
      <div class="artism__imagewrapper">
        <h4 class="artism__uploader--headline">Choose an image of the artwork, bigger artwork files will be saved by Wordpress into smaller versions with correlating API declarations.</h4>
        <h5 class="artism__uploader--subheadline">SIZES(api): thumbnailUrl, mediumImage, largeImage, image</h5>
        <img id="primary-image-tag" />
        <input type="hidden" id="primary-image-hidden-field" name="image" />
        <input class="artism__button" type="button" id="primary-image-upload-button" value="Add Image" />
        <input class="artism__button" type="button" id="primary-image-delete-button" value="Remove Image" />
      </div>
  <?php
}

// SAVE IMAGES ---------------------------------------------------------------------------------

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
      $attachment_id = ($primary_image_data[0]->id);
      update_post_meta( $post_id, '_thumbnail_id', $attachment_id);
  		$image_data = (esc_url_raw( $primary_image_data[0]->url ));
      update_post_meta( $post_id, 'image', $image_data );
      $thumbnail_image_data = (esc_url_raw( $primary_image_data[0]->thumbnailUrl ));
      update_post_meta( $post_id, 'thumbnailUrl', $thumbnail_image_data );
      $medium_image_data = (esc_url_raw( $primary_image_data[0]->mediumUrl ));
      update_post_meta( $post_id, 'imageMedium', $medium_image_data );
      $large_image_data = (esc_url_raw( $primary_image_data[0]->largeUrl ));
      update_post_meta( $post_id, 'imageLarge', $large_image_data );
    	} else {
        $primary_image_data = [];
      }
  }
}

add_action( 'save_post', 'artism_save_images' );
