


 function renderMediaUploader($)
 {
  'use strict';

  var file_frame, image_data, json;

   /**
     * If an instance of file_frame already exists, then we can open it
     * rather than creating a new instance.
     */

     if ( undefined !== file_frame) {
      file_frame.open();
      return;
     }

     /**
     * If we're this far, then an instance does not exist, so we need to
     * create our own.
     *
     * Here, use the wp.media library to define the settings of the Media
     * Uploader. We're opting to use the 'post' frame which is a template
     * defined in WordPress core and are initializing the file frame
     * with the 'insert' state.
     *
     * We're also not allowing the user to select more than one image.
     */

     file_frame = wp.media.frames.file_frame = wp.media({
      frame: 'post',
      state: 'insert',
      multiple: false
     });

     /**
     * Setup an event handler for what to do when an image has been
     * selected.
     *
     * Since we're using the 'view' state when initializing
     * the file_frame, we need to make sure that the handler is attached
     * to the insert event.
     */

     file_frame.on('insert', function() {
      // Read the JSON data returned from the Media Uploader
      json = file_frame.state().get('selection').first().toJSON();
      
      //First, make sure that we have the URL of an image to display
      if ( 0 > $.trim( json.url.length ) )
      {
        return;
      }

      //After that, set the properties of the image and display it
      $( '#featured-footer-image-container' )
          .children( 'img ')
            .attr( 'src', json.url )
            .attr( 'alt', json.caption )
            .attr( 'title', json.title)
                  .show()
          .parent()
          .removeClass('hidden');

          // Next, hide the anchor responsible for allowing the user to select an image
          $( '#featured-footer-image-container' )
            .prev()
            .hide();

          //Display the anchor for the removing the featured image
          $ ('#featured-footer-image-container')
            .next()
            .show();

          //Store the image's information into the meta data fields
          $( '#footer-thumbnail-src' ).val( json.url );
          $( '#footer-thumbnail-title' ).val(json.title);
          $( '#footer-thumbnail-alt' ).val(json.caption);

     });

     

     // Now display the actual file_frame
     file_frame.open();
  }


/**
 * Callback function for the 'click' event of the 'Remove Footer Image'
 * anchor in its meta box.
 *
 * Resets the meta box by hiding the image and by hiding the 'Remove
 * Footer Image' container.
 *
 * @param    object    $    A reference to the jQuery object
 * @since    0.2.0
 */



 function resetUploadForm( $ ) {
  'use strict';

  //Hide image
  $('#featured-footer-image-container')
    .children( 'img' )
    .hide();

  //Display the previous container
  $('#featured-footer-image-container')
    .prev()
    .show();

  //Add the 'hidden' class back to this anchor's parent
  $( '#featured-footer-image-container' )
    .next()
    .hide()
    .addClass('hidden');

  //Reset the meta data input
    $( '#featured-footer-image-info' )
      .children()
      .val( '' ); 
 }

function renderFeaturedImage( $ ) {
  if ('' !== $.trim( $('#footer-thumbnail-src').val() ) ) {
    $('#featured-footer-image-container').removeClass('hidden');

    $('#set-footer-thumbnail')
      .parent()
      .hide();

    $('#remove-footer-thumbnail')
      .parent()
      .removeClass('hidden');
  }
}

 (function( $ ) {
  'use strict';

  $(function() {

    renderFeaturedImage( $ );
          
    
    $( '#set-footer-thumbnail' ).on('click', function( evt ) {
      //Stop the anchor's default behavior
      evt.preventDefault();

      //Display the media uploader
      renderMediaUploader($);
    });
          

    $( '#remove-footer-thumbnail').on('click', function( evt ){
        evt.preventDefault();

        resetUploadForm( $ );

      });
  });
 })( jQuery );


function sectionThreeImage($)
{
     'use strict';

     var file_frame, image_data, json;

     if (undefined !== file_frame)
     {
          file_frame.open();
          return;
     }



     file_frame = wp.media.frames.file_frame = wp.media({
          frame: 'post',
          state: 'insert',
          multiple: false
     });


     file_frame.on('insert', function() {
          // Read the JSON data returned from the Media Uploader
          json = file_frame.state().get('selection').first().toJSON();
          
          //First, make sure that we have the URL of an image to display
          if ( 0 > $.trim( json.url.length ) )
          {
               return;
          }

          //After that, set the properties of the image and display it
          $( '#featured-section-three-image-container' )
              .children( 'img')
               .attr( 'src', json.url )
               .attr( 'alt', json.caption )
               .attr( 'title', json.title )
                              .show()
              .parent()
              .removeClass('hidden');

              // Next, hide the anchor responsible for allowing the user to select an image
              $( '#featured-section-three-image-container' )
               .prev()
               .hide();

              //Display the anchor for the removing the featured image
              $ ('#featured-section-three-image-container')
               .next()
               .show();

              //Store the image's information into the meta data fields
              $( '#section-three-thumbnail-src' ).val( json.url );
              $( '#section-three-thumbnail-title' ).val(json.title);
              $( '#section-three-thumbnail-alt' ).val(json.caption);

     });

     
     file_frame.open();

}


function resetSectionThreeImage( $ )
{
  'use strict';


  //Hide image
  $('#featured-section-three-image-container')
    .children( 'img ' )
    .hide();

  //Display the previous container
  $('#featured-section-three-image-container')
    .prev()
    .show();

  //Add the 'hidden' class back to this anchor's parent
  $( '#featured-section-three-image-container' )
    .next()
    .hide()
    .addClass('hidden');

  //Reset the meta data input
    $( '#featured-section-three-image-info' )
      .children()
      .val( '' ); 
}


function renderSectionThreeImage( $ )
{
     if ('' !== $.trim( $('#section-three-thumbnail-src').val() ) ) {
          $('#featured-section-three-image-container').removeClass('hidden');

          $('#set-section-three-image')
               .parent()
               .hide();

          $('#remove-section-three-image')
               .parent()
               .removeClass('hidden');
     }
}





 (function( $ ) {
  'use strict';

  $(function() {

          renderSectionThreeImage( $ );

          $( '#set-section-three-image').on('click', function(evt){

               evt.preventDefault();

               sectionThreeImage($);
          });

          $( '#remove-section-three-image').on('click', function( evt ){
            evt.preventDefault();

            resetSectionThreeImage( $ )

          });

          
  });
 })( jQuery );

//SECTION FIND LOCAL FOOD


function renderSectionFourMediaUploader($)
 {
  'use strict';

  var file_frame, image_data, json;

   /**
     * If an instance of file_frame already exists, then we can open it
     * rather than creating a new instance.
     */

     if ( undefined !== file_frame) {
      file_frame.open();
      return;
     }

     /**
     * If we're this far, then an instance does not exist, so we need to
     * create our own.
     *
     * Here, use the wp.media library to define the settings of the Media
     * Uploader. We're opting to use the 'post' frame which is a template
     * defined in WordPress core and are initializing the file frame
     * with the 'insert' state.
     *
     * We're also not allowing the user to select more than one image.
     */

     file_frame = wp.media.frames.file_frame = wp.media({
      frame: 'post',
      state: 'insert',
      multiple: false
     });

     /**
     * Setup an event handler for what to do when an image has been
     * selected.
     *
     * Since we're using the 'view' state when initializing
     * the file_frame, we need to make sure that the handler is attached
     * to the insert event.
     */

     file_frame.on('insert', function() {
      // Read the JSON data returned from the Media Uploader
      json = file_frame.state().get('selection').first().toJSON();
      
      //First, make sure that we have the URL of an image to display
      if ( 0 > $.trim( json.url.length ) )
      {
        return;
      }

      //After that, set the properties of the image and display it
      $( '#featured-section-four-image-container' )
          .children( 'img ')
            .attr( 'src', json.url )
            .attr( 'alt', json.caption )
            .attr( 'title', json.title)
                  .show()
          .parent()
          .removeClass('hidden');

          // Next, hide the anchor responsible for allowing the user to select an image
          $( '#featured-section-four-image-container' )
            .prev()
            .hide();

          //Display the anchor for the removing the featured image
          $ ('#featured-section-four-image-container')
            .next()
            .show();

          //Store the image's information into the meta data fields
          $( '#section-four-thumbnail-src' ).val( json.url );
          $( '#section-four-thumbnail-title' ).val(json.title);
          $( '#section-four-thumbnail-alt' ).val(json.caption);

     });

     

     // Now display the actual file_frame
     file_frame.open();
  }


/**
 * Callback function for the 'click' event of the 'Remove Footer Image'
 * anchor in its meta box.
 *
 * Resets the meta box by hiding the image and by hiding the 'Remove
 * Footer Image' container.
 *
 * @param    object    $    A reference to the jQuery object
 * @since    0.2.0
 */



 function resetSectionFourUploadForm( $ ) {
  'use strict';

  //Hide image
  $('#featured-section-four-image-container')
    .children( 'img' )
    .hide();

  //Display the previous container
  $('#featured-section-four-image-container')
    .prev()
    .show();

  //Add the 'hidden' class back to this anchor's parent
  $( '#featured-section-four-image-container' )
    .next()
    .hide()
    .addClass('hidden');

  //Reset the meta data input
    $( '#featured-section-four-image-info' )
      .children()
      .val( '' ); 
 }

function renderSectionFourFeaturedImage( $ ) {
  if ('' !== $.trim( $('#section-four-thumbnail-src').val() ) ) {
    $('#featured-section-four-image-container').removeClass('hidden');

    $('#set-section-four-thumbnail')
      .parent()
      .hide();

    $('#remove-section-four-thumbnail')
      .parent()
      .removeClass('hidden');
  }
}

 (function( $ ) {
  'use strict';

  $(function() {

    renderSectionFourFeaturedImage( $ );
          
    
    $( '#set-section-four-thumbnail' ).on('click', function( evt ) {
      //Stop the anchor's default behavior
      evt.preventDefault();

      //Display the media uploader
      renderSectionFourMediaUploader($);
    });
          

    $( '#remove-section-four-thumbnail').on('click', function( evt ){
        evt.preventDefault();

        resetSectionFourUploadForm( $ );

      });
  });
 })( jQuery );

 //Note that above only displays the Media Library. It doesn't actually do anything after we've uploaded and/or selected an image.



//SECTION CITATION


function sectionFiveImage($)
{
     'use strict';

     var file_frame, image_data, json;

     if (undefined !== file_frame)
     {
          file_frame.open();
          return;
     }



     file_frame = wp.media.frames.file_frame = wp.media({
          frame: 'post',
          state: 'insert',
          multiple: false
     });


     file_frame.on('insert', function() {
          // Read the JSON data returned from the Media Uploader
          json = file_frame.state().get('selection').first().toJSON();
          
          //First, make sure that we have the URL of an image to display
          if ( 0 > $.trim( json.url.length ) )
          {
               return;
          }

          //After that, set the properties of the image and display it
          $( '#featured-section-five-image-container' )
              .children( 'img')
               .attr( 'src', json.url )
               .attr( 'alt', json.caption )
               .attr( 'title', json.title )
                              .show()
              .parent()
              .removeClass('hidden');

              // Next, hide the anchor responsible for allowing the user to select an image
              $( '#featured-section-five-image-container' )
               .prev()
               .hide();

              //Display the anchor for the removing the featured image
              $ ('#featured-section-five-image-container')
               .next()
               .show();

              //Store the image's information into the meta data fields
              $( '#section-five-thumbnail-src' ).val( json.url );
              $( '#section-five-thumbnail-title' ).val(json.title);
              $( '#section-five-thumbnail-alt' ).val(json.caption);

     });

     
     file_frame.open();

}


function resetSectionFiveImage( $ )
{
  'use strict';


  //Hide image
  $('#featured-section-five-image-container')
    .children( 'img ' )
    .hide();

  //Display the previous container
  $('#featured-section-five-image-container')
    .prev()
    .show();

  //Add the 'hidden' class back to this anchor's parent
  $( '#featured-section-five-image-container' )
    .next()
    .hide()
    .addClass('hidden');

  //Reset the meta data input
    $( '#featured-section-five-image-info' )
      .children()
      .val( '' ); 
}


function renderSectionFiveImage( $ )
{
     if ('' !== $.trim( $('#section-five-thumbnail-src').val() ) ) {
          $('#featured-section-five-image-container').removeClass('hidden');

          $('#set-section-five-image')
               .parent()
               .hide();

          $('#remove-section-five-image')
               .parent()
               .removeClass('hidden');
     }
}





 (function( $ ) {
  'use strict';

  $(function() {


          renderSectionFiveImage( $ );
    
   
          

          $( '#set-section-five-image').on('click', function(evt){

               evt.preventDefault();

               sectionFiveImage($);
          });

          $( '#remove-section-five-image').on('click', function( evt ){
            evt.preventDefault();

            resetSectionFiveImage( $ )

          });

          
  });
 })( jQuery );



//SECTION FOOTER IMAGE


function sectionSixImage($)
{
     'use strict';

     var file_frame, image_data, json;

     if (undefined !== file_frame)
     {
          file_frame.open();
          return;
     }



     file_frame = wp.media.frames.file_frame = wp.media({
          frame: 'post',
          state: 'insert',
          multiple: false
     });


     file_frame.on('insert', function() {
          // Read the JSON data returned from the Media Uploader
          json = file_frame.state().get('selection').first().toJSON();
          
          //First, make sure that we have the URL of an image to display
          if ( 0 > $.trim( json.url.length ) )
          {
               return;
          }

          //After that, set the properties of the image and display it
          $( '#featured-section-six-image-container' )
              .children( 'img')
               .attr( 'src', json.url )
               .attr( 'alt', json.caption )
               .attr( 'title', json.title )
                              .show()
              .parent()
              .removeClass('hidden');

              // Next, hide the anchor responsible for allowing the user to select an image
              $( '#featured-section-six-image-container' )
               .prev()
               .hide();

              //Display the anchor for the removing the featured image
              $ ('#featured-section-six-image-container')
               .next()
               .show();

              //Store the image's information into the meta data fields
              $( '#section-six-thumbnail-src' ).val( json.url );
              $( '#section-six-thumbnail-title' ).val(json.title);
              $( '#section-six-thumbnail-alt' ).val(json.caption);

     });

     
     file_frame.open();

}


function resetSectionSixImage( $ )
{
  'use strict';


  //Hide image
  $('#featured-section-six-image-container')
    .children( 'img ' )
    .hide();

  //Display the previous container
  $('#featured-section-six-image-container')
    .prev()
    .show();

  //Add the 'hidden' class back to this anchor's parent
  $( '#featured-section-six-image-container' )
    .next()
    .hide()
    .addClass('hidden');

  //Reset the meta data input
    $( '#featured-section-six-image-info' )
      .children()
      .val( '' ); 
}


function renderSectionSixImage( $ )
{
     if ('' !== $.trim( $('#section-six-thumbnail-src').val() ) ) {
          $('#featured-section-six-image-container').removeClass('hidden');

          $('#set-section-six-image')
               .parent()
               .hide();

          $('#remove-section-six-image')
               .parent()
               .removeClass('hidden');
     }
}





 (function( $ ) {
  'use strict';

  $(function() {


          renderSectionSixImage( $ );
    
   
          

          $( '#set-section-six-image').on('click', function(evt){

               evt.preventDefault();

               sectionSixImage($);
          });

          $( '#remove-section-six-image').on('click', function( evt ){
            evt.preventDefault();

            resetSectionSixImage( $ )

          });

          
  });
 })( jQuery );