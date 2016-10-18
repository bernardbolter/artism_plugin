<?php

function artism_appended_images_metaboxes() {
    add_meta_box(
      'artism-appeneded-images',
      'Appended Artwork Image Uploader',
      'artism_appended_images_callback',
      'artwork',
      'side',
      'low'
    );
}

// REGISTER METABOXES ------------------------------------------------------------------------

add_action( 'add_meta_boxes', 'artism_appended_images_metaboxes' );

// APPENDED IMAGES -----------------------------------------------------------------------------

function artism_appended_images_callback( $post ) {
  wp_nonce_field( basename( __FILE__), 'artism_appended_images_nonce' );
  $artism_appended_image_meta = get_post_meta( $post->ID );
  ?><div class="image_wrap">

    <?php /* SECONDARY ARTWORK */ ?>
      <div class="artism__imagewrapper">
        <h3 class="artism__uploader--title">Secondary Artwork Image Uploader</h3>
        <h5 class="artism__uploader--subheadline">SIZES(api): secondaryThumbnailUrl, secondaryMediumImage, secondaryLargeImage, secondaryImage</h5>
        <img id="secondary-image-tag" />
        <input type="hidden" id="secondary-image-hidden-field" name="secondaryImage" />
        <input class="artism__button" type="button" id="secondary-image-upload-button" value="Add Image" />
        <input class="artism__button" type="button" id="secondary-image-delete-button" value="Remove Image" />

        <?php /* SECONDARY ARTWORK TITLE */ ?>

        <div class="artism__input">
            <label for="secondaryArtworkTitle" class="artism__input--title">Title <span class="artism__input--property"> - property | secondaryArtworkTitle</span></label>
            <input type="text" class="artism__input--field" name="secondaryArtworkTitle" id="secondaryArtworkTitle" value="<?php if ( ! empty ( $artism_appended_image_meta['secondaryArtworkTitle'] ) ) echo esc_attr( $artism_appended_image_meta['secondaryArtworkTitle'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Title of the Secondary Artwork image</h4>
        </div>

        <?php /* SECONDARY ART MEDIUM */ ?>

        <div class="artism__input">
            <label for="secondaryArtMedium" class="artism__input--title">Medium <span class="artism__input--property"> - property | secondaryArtMedium</span></label>
            <input type="text" class="artism__input--field" name="secondaryArtMedium" id="secondaryArtMedium" value="<?php if ( ! empty ( $artism_appended_image_meta['secondaryArtMedium'] ) ) echo esc_attr( $artism_appended_image_meta['secondaryArtMedium'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Medium of the Secondary Artwork</h4>
        </div>

        <?php /* SECONDARY ARTWORK YEAR */ ?>

        <div class="artism__input">
            <label for="secondaryArtworkYear" class="artism__input--title">Year <span class="artism__input--property"> - property | secondaryArtworkYear</span></label>
            <input type="text" class="artism__input--field" name="secondaryArtworkYear" id="secondaryArtworkYear" value="<?php if ( ! empty ( $artism_appended_image_meta['secondaryArtworkYear'] ) ) echo esc_attr( $artism_appended_image_meta['secondaryArtworkYear'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Year Secondary Artwork was created</h4>
        </div>

        <?php /* SECONDARY ARTWORK LINK */ ?>

        <div class="artism__input">
            <label for="secondaryArtworkLink" class="artism__input--title">Link <span class="artism__input--property"> - property | secondaryArtworkLink</span></label>
            <input type="text" class="artism__input--field" name="secondaryArtworkLink" id="secondaryArtworkLink" value="<?php if ( ! empty ( $artism_appended_image_meta['secondaryArtworkLink'] ) ) echo esc_attr( $artism_appended_image_meta['secondaryArtworkLink'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Link to the Secondary Artwork</h4>
        </div>
      </div>

      <?php /* TERTIARY ARTWORK */ ?>
      <div class="artism__imagewrapper">
        <h3 class="artism__uploader--title">Tertiary Artwork Image Uploader</h3>
        <h5 class="artism__uploader--subheadline">SIZES(api): tertiaryThumbnailUrl, tertiaryMediumImage, tertiaryLargeImage, tertiaryImage</h5>
        <img id="tertiary-image-tag" />
        <input type="hidden" id="tertiary-image-hidden-field" name="tertiaryImage" />
        <input class="artism__button" type="button" id="tertiary-image-upload-button" value="Add Image" />
        <input class="artism__button" type="button" id="tertiary-image-delete-button" value="Remove Image" />

        <?php /* TERTIARY ARTWORK TITLE */ ?>

        <div class="artism__input">
            <label for="tertiaryArtworkTitle" class="artism__input--title">Title <span class="artism__input--property"> - property | tertiaryArtworkTitle</span></label>
            <input type="text" class="artism__input--field" name="tertiaryArtworkTitle" id="tertiaryArtworkTitle" value="<?php if ( ! empty ( $artism_appended_image_meta['tertiaryArtworkTitle'] ) ) echo esc_attr( $artism_appended_image_meta['tertiaryArtworkTitle'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Title of the Tertiary Artwork image</h4>
        </div>

        <?php /* TERTIARY ART MEDIUM */ ?>

        <div class="artism__input">
            <label for="tertiaryArtMedium" class="artism__input--title">Medium <span class="artism__input--property"> - property | tertiaryArtMedium</span></label>
            <input type="text" class="artism__input--field" name="tertiaryArtMedium" id="tertiaryArtMedium" value="<?php if ( ! empty ( $artism_appended_image_meta['tertiaryArtMedium'] ) ) echo esc_attr( $artism_appended_image_meta['tertiaryArtMedium'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Medium of the Tertiary Artwork</h4>
        </div>

        <?php /* TERTIARY ARTWORK YEAR */ ?>

        <div class="artism__input">
            <label for="tertiaryArtworkYear" class="artism__input--title">Year <span class="artism__input--property"> - property | tertiaryArtworkYear</span></label>
            <input type="text" class="artism__input--field" name="tertiaryArtworkYear" id="tertiaryArtworkYear" value="<?php if ( ! empty ( $artism_appended_image_meta['tertiaryArtworkYear'] ) ) echo esc_attr( $artism_appended_image_meta['tertiaryArtworkYear'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Year Tertiary Artwork was created</h4>
        </div>

        <?php /* TERTIARY ARTWORK LINK */ ?>

        <div class="artism__input">
            <label for="tertiaryArtworkLink" class="artism__input--title">Link <span class="artism__input--property"> - property | tertiaryArtworkLink</span></label>
            <input type="text" class="artism__input--field" name="tertiaryArtworkLink" id="tertiaryArtworkLink" value="<?php if ( ! empty ( $artism_appended_image_meta['tertiaryArtworkLink'] ) ) echo esc_attr( $artism_appended_image_meta['tertiaryArtworkLink'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Link to the Tertiary Artwork</h4>
        </div>
      </div>
  </div>
  <?php
}

// SAVE IMAGES ---------------------------------------------------------------------------------

function artism_save_appended_images( $post_id ) {
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'artism_appended_images_nonce' ] ) && wp_verify_nonce( $_POST[ 'artism_appended_images_nonce' ], basename( __FILE__ )));

  // exits script depnding on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
    return;
  }

  if (isset( $_POST[ 'secondaryImage' ])) {
      $secondary_image_data = json_decode( stripslashes( $_POST[ 'secondaryImage' ]));
      if ( is_object( $secondary_image_data[0] ) ) {
  		$image_data_second = (esc_url_raw( $secondary_image_data[0]->url ));
      update_post_meta( $post_id, 'secondaryImage', $image_data_second );
      $thumbnail_image_data_second = (esc_url_raw( $secondary_image_data[0]->thumbnailUrl ));
      update_post_meta( $post_id, 'secondaryThumbnailUrl', $thumbnail_image_data_second );
      $medium_image_data_second = (esc_url_raw( $secondary_image_data[0]->mediumUrl ));
      update_post_meta( $post_id, 'secondaryImageMedium', $medium_image_data_second );
      $large_image_data_second = (esc_url_raw( $secondary_image_data[0]->largeUrl ));
      update_post_meta( $post_id, 'secondaryImageLarge', $large_image_data_second );
    	} else {
        $secondary_image_data = [];
      }
  }

  if (isset( $_POST[ 'tertiaryImage' ])) {
      $tertiary_image_data = json_decode( stripslashes( $_POST[ 'tertiaryImage' ]));
      if ( is_object( $tertiary_image_data[0] ) ) {
  		$image_data_third = (esc_url_raw( $tertiary_image_data[0]->url ));
      update_post_meta( $post_id, 'tertiaryImage', $image_data_third );
      $thumbnail_image_data_third = (esc_url_raw( $tertiary_image_data[0]->thumbnailUrl ));
      update_post_meta( $post_id, 'tertiaryThumbnailUrl', $thumbnail_image_data_third );
      $medium_image_data_third = (esc_url_raw( $tertiary_image_data[0]->mediumUrl ));
      update_post_meta( $post_id, 'tertiaryImageMedium', $medium_image_data_third );
      $large_image_data_third = (esc_url_raw( $tertiary_image_data[0]->largeUrl ));
      update_post_meta( $post_id, 'tertiaryImageLarge', $large_image_data_third );
    	} else {
        $tertiary_image_data = [];
      }
  }

  if ( isset( $_POST['secondaryArtworkTitle'] ) ) {
    update_post_meta($post_id, 'secondaryArtworkTitle', sanitize_text_field($_POST['secondaryArtworkTitle']) );
  }

  if ( isset( $_POST['secondaryArtworkYear'] ) ) {
    update_post_meta($post_id, 'secondaryArtworkYear', sanitize_text_field($_POST['secondaryArtworkYear']) );
  }

  if ( isset( $_POST['secondaryArtMedium'] ) ) {
    update_post_meta($post_id, 'secondaryArtMedium', sanitize_text_field($_POST['secondaryArtMedium']) );
  }

  if ( isset( $_POST['secondaryArtworkLink'] ) ) {
    update_post_meta($post_id, 'secondaryArtworkLink', sanitize_text_field($_POST['secondaryArtworkLink']) );
  }

  if ( isset( $_POST['tertiaryArtworkTitle'] ) ) {
    update_post_meta($post_id, 'tertiaryArtworkTitle', sanitize_text_field($_POST['tertiaryArtworkTitle']) );
  }

  if ( isset( $_POST['tertiaryArtworkYear'] ) ) {
    update_post_meta($post_id, 'tertiaryArtworkYear', sanitize_text_field($_POST['tertiaryArtworkYear']) );
  }

  if ( isset( $_POST['tertiaryArtMedium'] ) ) {
    update_post_meta($post_id, 'tertiaryArtMedium', sanitize_text_field($_POST['tertiaryArtMedium']) );
  }

  if ( isset( $_POST['tertiaryArtworkLink'] ) ) {
    update_post_meta($post_id, 'tertiaryArtworkLink', sanitize_text_field($_POST['tertiaryArtworkLink']) );
  }
}

add_action( 'save_post', 'artism_save_appended_images' );
