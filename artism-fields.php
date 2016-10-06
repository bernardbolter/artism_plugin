<?php

function artism_add_custom_metabox() {
  add_meta_box(
    'artism_meta',
    'Artwork',
    'artism_meta_callback',
    'artwork'
  );
}

add_action( 'add_meta_boxes', 'artism_add_custom_metabox' );

function artism_meta_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'artism_artwork_nonce');
  $artism_stored_meta = get_post_meta( $post->ID );
  ?>
    <div class="artism__properties">
      <p>Properties from <a href="https://schema.org/VisualArtwork" target="_blank">VisualArtwork</a></p>
    </div>
    <div class="artism__input">
        <label for="artMedium" class="artism__input--title">Artwork Medium <span class="artism__input--property"> - property</span></label>
        <input type="text" class="artism__input--field" name="artMedium" id="artMedium" value="<?php if ( ! empty ( $artism_stored_meta['artMedium'] ) ) echo esc_attr( $artism_stored_meta['artMedium'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Integer or URL</h3>
        <h4 class="artism__description--content">Description: The material used. (e.g. Oil, Watercolour, Acrylic, Linoprint, Marble, Cyanotype, Digital, Lithograph, DryPoint, Intaglio, Pastel, Woodcut, Pencil, Mixed Media, etc.) Supersedes material.</h4>
    </div>
    <div class="artism__input">
        <label for="artform" class="artism__input--title">Artwork Form</label>
        <input type="text" name="artform" id="artform" value="<?php if ( ! empty ( $artism_stored_meta['artform'] ) ) echo esc_attr( $artism_stored_meta['artform'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Integer or Text</h3>
        <h4 class="artism__description--content">Description: The material used. (e.g. Oil, Watercolour, Acrylic, Linoprint, Marble, Cyanotype, Digital, Lithograph, DryPoint, Intaglio, Pastel, Woodcut, Pencil, Mixed Media, etc.) Supersedes material.</h4>
    </div>
    <div class="artism__row">
        <label for="dateCreated" class="artism__input--title">Artwork Date Created</label>
        <input type="text" class="artism__row--content datepicker" name="dateCreated" id="dateCreated" value="<?php if ( ! empty ( $artism_stored_meta['dateCreated'] ) ) echo esc_attr( $artism_stored_meta['dateCreated'][0] ); ?>" />
    </div>

<?php
}

function artism_meta_save( $post_id ) {
  // Check save status
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'artism_artwork_nonce' ]) && wp_verify_nonce( $_POST['artism_artwork_nonce'], basename(__FILE__) ) ) ? 'true' : 'false';

  if ( $is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

  if ( isset( $_POST['artMedium'] ) ) {
    update_post_meta($post_id, 'artMedium', sanitize_text_field($_POST['artMedium']) );
  }

  if ( isset( $_POST['artform'] ) ) {
    update_post_meta($post_id, 'artform', sanitize_text_field($_POST['artform']) );
  }

  if ( isset( $_POST['dateCreated'] ) ) {
    update_post_meta($post_id, 'dateCreated', sanitize_text_field($_POST['dateCreated']) );
  }
}

add_action( 'save_post', 'artism_meta_save');

// REGISTER CUSTOM FIELDS WITH THE WORDPRESS API

add_action( 'rest_api_init', 'artism_register_custom_fields');

function artism_register_custom_fields() {
  register_rest_field(
    'artwork',
    'artMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'artform',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'dateCreated',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'custom_image_data',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
}

function artism_show_fields($object, $field_name, $request) {
  return get_post_meta($object['id'], $field_name, true);
}

?>
