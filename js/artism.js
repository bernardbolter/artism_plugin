jQuery(document).ready(function() {
    jQuery( '.datepicker' ).datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      yearRange: "-200:+0"
    });

    var addButton = document.getElementById( 'primary-image-upload-button');
    var addButtonSecond = document.getElementById( 'secondary-image-upload-button');

    var deleteButton = document.getElementById( 'primary-image-delete-button');
    var deleteButtonSecond = document.getElementById( 'secondary-image-delete-button');

    var img = document.getElementById( 'primary-image-tag');
    var imgSecond = document.getElementById( 'secondary-image-tag');

    var hidden = document.getElementById( 'primary-image-hidden-field');
    var hiddenSecond = document.getElementById( 'secondary-image-hidden-field');

    var primaryImageUploader = wp.media({
      title: 'Select a Primary Image',
      button: {
        text: 'Use this Image'
      },
      multiple: 'false'
    });
    var secondaryImageUploader = wp.media({
      title: 'Select a Secondary Image',
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

    primaryImageUploader.on( 'select', function() {
        var attachment = primaryImageUploader.state().get('selection').first().toJSON();
        console.log(attachment);
        img.setAttribute( 'src', attachment.url );
        hidden.setAttribute( 'value', JSON.stringify( [{ id: attachment.id, url: attachment.url }]) );
        toggleVisibility( 'ADD' );
    });

    secondaryImageUploader.on( 'select', function() {
        var attachmentSecond = secondaryImageUploader.state().get('selection').first().toJSON();
        console.log(attachmentSecond);
        imgSecond.setAttribute( 'src', attachmentSecond.url );
        hiddenSecond.setAttribute( 'value', JSON.stringify( [{ id: attachmentSecond.id, url: attachmentSecond.url }]) );
        toggleVisibilitySecond( 'ADD' );
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


});
