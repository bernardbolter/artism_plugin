<?php

function artism_add_custom_metabox() {
  add_meta_box(
    'artism_meta',
    'Artwork Medium',
    'artism_meta_callback',
    'artwork'
  );
}

add_action( 'add_meta_boxes', 'artism_add_custom_metabox' );

function artism_meta_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'artism_artwork_nonce');
  $artism_stored_meta = get_post_meta( $post->ID );
  ?>
    <div class="artism__row">
        <div class="artism__th">
            <label for="artism-medium" class="artism__row--title">Artwork Medium</label>
        </div>
        <div class="artism__td">
            <input type="text" name="artMedium" id="artMedium" value="<?php if ( ! empty ( $artism_stored_meta['artMedium'] ) ) echo esc_attr( $artism_stored_meta['artMedium'][0] ); ?>" />
        </div>
    </div>
    <div class="artism__row">
        <div class="artism_th">
            <span>Artwork Description</span>
        </div>
      </div>
    <div class="artism__editor">
    <?php

    $content = get_post_meta( $post->ID, 'artwork_description', true);
    $editor = 'artwork_description';
    $settings = array(
      'textarea_rows' => 5,
      'media_buttons' => false
    );

    wp_editor( $content, $editor, $settings);

    ?>
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
}

add_action( 'save_post', 'artism_meta_save');

?>
