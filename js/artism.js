jQuery(document).ready(function() {
    jQuery( '.datepicker' ).datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      yearRange: "-200:+0"
    });

    var addButton = document.getElementById( 'primary-image-upload-button');
    var addButtonSecond = document.getElementById( 'secondary-image-upload-button');
    var addButtonThird = document.getElementById( 'tertiary-image-upload-button');

    var deleteButton = document.getElementById( 'primary-image-delete-button');
    var deleteButtonSecond = document.getElementById( 'secondary-image-delete-button');
    var deleteButtonThird = document.getElementById( 'tertiary-image-delete-button');

    var img = document.getElementById( 'primary-image-tag');
    var imgSecond = document.getElementById( 'secondary-image-tag');
    var imgThird = document.getElementById( 'tertiary-image-tag');

    var hidden = document.getElementById( 'primary-image-hidden-field');
    var hiddenSecond = document.getElementById( 'secondary-image-hidden-field');
    var hiddenThird = document.getElementById( 'tertiary-image-hidden-field');

    var primaryImageUploader = wp.media({
      title: 'Select a Primary Image',
      button: {
        text: 'Use this Image'
      },
      multiple: 'false'
    });
    var secondaryImageUploader = wp.media({
      title: 'Select a Second Image',
      button: {
        text: 'Use this Image'
      },
      multiple: 'false'
    });
    var tertiaryImageUploader = wp.media({
      title: 'Select a Third Image',
      button: {
        text: 'Use this Image'
      },
      multiple: 'false'
    });

    addButton.addEventListener( 'click', function() {
        if ( primaryImageUploader ) {
          primaryImageUploader.open();
        }
    });

    addButtonSecond.addEventListener( 'click', function() {
        if ( secondaryImageUploader ) {
          secondaryImageUploader.open();
        }
    });
    addButtonThird.addEventListener( 'click', function() {
        if ( tertiaryImageUploader ) {
          tertiaryImageUploader.open();
        }
    });


    primaryImageUploader.on( 'select', function() {
        var attachment = primaryImageUploader.state().get('selection').first().toJSON();
        console.log(attachment);
        img.setAttribute( 'src', attachment.url );
        if (attachment.sizes.thumbnail == null) {
          hidden.setAttribute( 'value', JSON.stringify( [{ id: attachment.id, url: attachment.url }]) );
        } else if (attachment.sizes.medium == null) {
          hidden.setAttribute( 'value', JSON.stringify( [{ id: attachment.id, url: attachment.url, thumbnailUrl: attachment.sizes.thumbnail.url }]) );
        }  else if (attachment.sizes.large == null) {
          hidden.setAttribute( 'value', JSON.stringify( [{ id: attachment.id, url: attachment.url, thumbnailUrl: attachment.sizes.thumbnail.url, mediumUrl: attachment.sizes.medium.url }]) );
        } else {
          hidden.setAttribute( 'value', JSON.stringify( [{ id: attachment.id, url: attachment.url, thumbnailUrl: attachment.sizes.thumbnail.url, mediumUrl: attachment.sizes.medium.url, largeUrl: attachment.sizes.large.url }]) );
        }
        toggleVisibility( 'ADD' );
    });

    secondaryImageUploader.on( 'select', function() {
        var attachmentSecond = secondaryImageUploader.state().get('selection').first().toJSON();
        console.log(attachmentSecond);
        imgSecond.setAttribute( 'src', attachmentSecond.url );
        if (attachmentSecond.sizes.thumbnail == null) {
          hiddenSecond.setAttribute( 'value', JSON.stringify( [{ id: attachmentSecond.id, url: attachmentSecond.url }]) );
        } else if (attachmentSecond.sizes.medium == null) {
          hiddenSecond.setAttribute( 'value', JSON.stringify( [{ id: attachmentSecond.id, url: attachmentSecond.url, thumbnailUrl: attachmentSecond.sizes.thumbnail.url }]) );
        }  else if (attachmentSecond.sizes.large == null) {
          hiddenSecond.setAttribute( 'value', JSON.stringify( [{ id: attachmentSecond.id, url: attachmentSecond.url, thumbnailUrl: attachmentSecond.sizes.thumbnail.url, mediumUrl: attachmentSecond.sizes.medium.url }]) );
        } else {
          hiddenSecond.setAttribute( 'value', JSON.stringify( [{ id: attachmentSecond.id, url: attachmentSecond.url, thumbnailUrl: attachmentSecond.sizes.thumbnail.url, mediumUrl: attachmentSecond.sizes.medium.url, largeUrl: attachmentSecond.sizes.large.url }]) );
        }
        toggleVisibilitySecond( 'ADD' );
    });

    tertiaryImageUploader.on( 'select', function() {
        var attachmentThird = tertiaryImageUploader.state().get('selection').first().toJSON();
        console.log(attachmentThird);
        imgThird.setAttribute( 'src', attachmentThird.url );
        if (attachmentThird.sizes.thumbnail == null) {
          hiddenThird.setAttribute( 'value', JSON.stringify( [{ id: attachmentThird.id, url: attachmentThird.url }]) );
        } else if (attachmentThird.sizes.medium == null) {
          hiddenThird.setAttribute( 'value', JSON.stringify( [{ id: attachmentThird.id, url: attachmentThird.url, thumbnailUrl: attachmentThird.sizes.thumbnail.url }]) );
        }  else if (attachmentThird.sizes.large == null) {
          hiddenThird.setAttribute( 'value', JSON.stringify( [{ id: attachmentThird.id, url: attachmentThird.url, thumbnailUrl: attachmentThird.sizes.thumbnail.url, mediumUrl: attachmentThird.sizes.medium.url }]) );
        } else {
          hiddenThird.setAttribute( 'value', JSON.stringify( [{ id: attachmentThird.id, url: attachmentThird.url, thumbnailUrl: attachmentThird.sizes.thumbnail.url, mediumUrl: attachmentThird.sizes.medium.url, largeUrl: attachmentThird.sizes.large.url }]) );
        }
        toggleVisibilityThird( 'ADD' );
    });

    deleteButton.addEventListener( 'click', function() {
        img.removeAttribute( 'src' );
        hidden.removeAttribute( 'value' );
        toggleVisibility( 'DELETE' );
    });

    deleteButtonSecond.addEventListener( 'click', function() {
        imgSecond.removeAttribute( 'src' );
        hiddenSecond.removeAttribute( 'value' );
        toggleVisibilitySecond( 'DELETE' );
    });

    deleteButtonThird.addEventListener( 'click', function() {
        imgThird.removeAttribute( 'src' );
        hiddenThird.removeAttribute( 'value' );
        toggleVisibilityThird( 'DELETE' );
    });

    var toggleVisibility = function( action ) {
        if ( 'ADD' === action ) {
            addButton.style.display = 'none';
            deleteButton.style.display = '';
            img.setAttribute( 'style', 'max-width: 400px; width: 100%' );
        }

        if ( 'DELETE' === action ) {
            addButton.style.display = '';
            deleteButton.style.display = 'none';
            img.removeAttribute('style');
        }
    };

    var toggleVisibilitySecond = function( action ) {
        if ( 'ADD' === action ) {
            addButtonSecond.style.display = 'none';
            deleteButtonSecond.style.display = '';
            imgSecond.setAttribute( 'style', 'max-width: 400px; width: 100%' );
        }

        if ( 'DELETE' === action ) {
            addButtonSecond.style.display = '';
            deleteButtonSecond.style.display = 'none';
            imgSecond.removeAttribute('style');
        }
    };

    var toggleVisibilityThird = function( action ) {
        if ( 'ADD' === action ) {
            addButtonThird.style.display = 'none';
            deleteButtonThird.style.display = '';
            imgThird.setAttribute( 'style', 'max-width: 400px; width: 100%' );
        }

        if ( 'DELETE' === action ) {
            addButtonThird.style.display = '';
            deleteButtonThird.style.display = 'none';
            imgThird.removeAttribute('style');
        }
    };

    window.addEventListener( 'DOMContentLoaded', function() {
      if ( "" === artismImageUpload.primaryImageData || 0 === artismImageUpload.primaryImageData.length) {
        toggleVisibility( 'DELETE' );
    } else {
        img.setAttribute( 'src', artismImageUpload.primaryImageData );
        hidden.setAttribute( 'value', JSON.stringify([ artismImageUpload.primaryImageData ]) );
        toggleVisibility( 'ADD' );
    }
  });

    window.addEventListener( 'DOMContentLoaded', function() {
        if ( "" === artismImageUpload.secondaryImageData || 0 === artismImageUpload.secondaryImageData.length) {
          toggleVisibilitySecond( 'DELETE' );
      } else {
          imgSecond.setAttribute( 'src', artismImageUpload.secondaryImageData );
          hiddenSecond.setAttribute( 'value', JSON.stringify([ artismImageUpload.secondaryImageData ]) );
          toggleVisibilitySecond( 'ADD' );
      }
    });

    window.addEventListener( 'DOMContentLoaded', function() {
        if ( "" === artismImageUpload.tertiaryImageData || 0 === artismImageUpload.tertiaryImageData.length) {
          toggleVisibilityThird( 'DELETE' );
      } else {
          imgThird.setAttribute( 'src', artismImageUpload.tertiaryImageData );
          hiddenThird.setAttribute( 'value', JSON.stringify([ artismImageUpload.tertiaryImageData ]) );
          toggleVisibilityThird( 'ADD' );
      }
    });


});
