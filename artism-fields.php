<?php

// REGISTER CUSTOM FIELDS WITH THE WORDPRESS API

add_action( 'rest_api_init', 'artism_register_custom_fields');

function artism_register_custom_fields() {
  register_rest_field(
    'artism',
    'artMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'artworkSurface',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'artform',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'dateCreated',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'width',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'height',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'depth',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'artEdition',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'headline',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'about',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'text',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'creator',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'contributor',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'copyrightHolder',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'copyrightYear',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'contentLocation',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'locationCreated',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'genre',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'keywords',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'name',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'url',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'description',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'series',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'image',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'thumbnailUrl',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'imageMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'imageLarge',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'complementaryArtworkTitle',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'complementaryArtMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'complementaryArtworkYear',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'complementaryArtworkLink',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'complementaryImage',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'complementaryThumbnailUrl',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'complementaryImageMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'complementaryImageLarge',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'secondComplementaryArtworkTitle',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'secondComplementaryArtMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'secondComplementaryArtworkYear',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'secondComplementaryArtworkLink',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'secondComplementaryImage',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'secondComplementaryThumbnailUrl',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'secondComplementaryImageMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artism',
    'secondComplementaryImageLarge',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
}

function artism_show_fields($object, $field_name, $request) {
  return get_post_meta($object['id'], $field_name, true);
}

?>
