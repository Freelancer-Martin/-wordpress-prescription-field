jQuery(document).ready(function($) {


// controls to show one pd field or two pd field in front end, under my accound and select lenses
  $( '.quest-prescription-button' ).on( "click", function() {
      $( '.quest-front-end-prescription-container' ).css( 'display', 'none');
      $( '.front-end-prescription-container' ).css( 'display', '');

  });

  $( '.prescription-button' ).on( "click", function() {
      $( '.quest-front-end-prescription-container' ).css( 'display', '');
      $( '.front-end-prescription-container' ).css( 'display', 'none');

  });


  $( '.field-2pd-second' ).click(function()
  {
    $( '#field-2pd-hide' ).css( 'display', 'none');
    $( '.field-2pd-hide' ).css( 'display', 'none');
    $( '.field-1pd-second' ).css( 'display', '');
    $( '.left-field-show' ).css( 'display', '');
  });


  $( '.field-1pd-second' ).click(function()
  {
    $( '#field-2pd-hide' ).css( 'display', '');
    $( '.field-2pd-hide' ).css( 'display', '');
    $( '.field-2pd-second' ).css( 'display', '');
    $( '.field-1pd-second' ).css( 'display', 'none');
    $( '.left-field-show' ).css( 'display', 'none');

  });


  $( '.field-2pd' ).click(function()
  {
    $( '.single-one-pd-show' ).css( 'display', '');
    $( '.field-1pd' ).css( 'display', '');
    $( '.hide-two-pd-field' ).css( 'display', 'none');

  });


  $( '.field-1pd' ).click(function()
  {
    $( '.single-one-pd-show' ).css( 'display', 'none' )
    $( '.field-2pd' ).css( 'display', '');
    $( '.field-1pd' ).css( 'display', 'none');
    $( '.hide-two-pd-field' ).css( 'display', '');

  });
 // show
  $('.front-end-lenses-next').mousemove(function()
  {
     if( $('#right-od-add').val() < 0.1 || $('#left-os-add').val() < 0.1 ) {
        $( '.front-end-lenses-next' ).attr( 'href', '#one');
        $( '#lense-style' ).css( 'display', 'none');
        $( '#great-leap-back' ).attr( 'href', '#start' )
      } else {
        $( '.front-end-lenses-next' ).attr( 'href', '#zero');
        $( '#lense-style' ).css( 'display', 'block');
      }
  });

  // show only digital all standard lenses type
  $('#lense-type-digital').click(function(){
      $('#lense-type').val( 'lense-type-digital' );
  });

  $('#lense-type-standard').click(function(){
      $('#lense-type').val( 'lense-type-standard' );
  });


  $('#lense-style-distance').click(function(){
      $('#lense-style-new').val( 'lense-style-distance' );
  });

  $('#lense-style-reading').click(function(){
      $('#lense-style-new').val( 'lense-style-reading' );
  });

  $('.lenses-type-standard').click(function()
  {
      if( $( '.lenses-type-standard' ).val( 'standard-lenses' ) ) {
        $( '.standard-lenses' ).css( 'display', 'block');
        $( '.digital-lenses' ).css( 'display', 'none');
      }

  });

  $('.lenses-type-digital').click(function()
  {
      if ($( '.lenses-type-digital' ).val( 'digital-lenses' )) {
        $( '.digital-lenses' ).css( 'display', 'block');
        $( '.standard-lenses' ).css( 'display', 'none');
      }
  });

 // gives all lenses input fields 0 value
$( '.clear-all-fields' ).on("click", function(){
  $( ".select-input" ).each(function(index) {
        $( this  ).val( '0' );
        //console.log($( this ).val( '0' ));
  });
});

 //$( ".add-lenses-button:eq( 0 )" ).css( "display", "none" );


 // over mouseenter event after lenses are filtered it add new value every time to class="receive-lense-price" to save price value
  $( ".get-lense-price" ).each(function(index) {
    $(this).on("mouseenter", function(){
          var price = $( this ).data( 'price' );
          $( '.receive-lense-price' ).val( price )
        console.log( $( this ).data( 'price' ) );
    });
  });

  // saves  after lenses are filtered selected lense value
  $('.save-lense-price').on( "mouseup", function() {


       var mydata = {

             action: "lenses_price_options",
             lenses_final_name: $('.lenses-final-name').val(),
             lense_price: $('.receive-lense-price').val(),

         };


         // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php

         $.ajax({
             type: "POST",
             url: ajaxurl,

             dataType: "json",
             data: mydata,

             success: function (data, textStatus, jqXHR) {
                 if(data === true)
                     var tag = $('#displayss')
                     tag.fadeOut(1000).html('<p class="front-end-lenses-next" >Options Saved!</p>');
             },

             error: function (errorMessage) {

                 console.log(errorMessage);
             }

         });


     });



     // saves  after lenses are filtered selected lense value
     $('.save-lense-type').on( "click", function() {


          var mydata = {

              action: "lenses_type_options",
              lenses_type: $('#lense-type').val(),
              lense_style_new: $('#lense-style-new').val(),

          };


          // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php

          $.ajax({
              type: "POST",
              url: ajaxurl,

              dataType: "json",
              data: mydata,

              success: function (data, textStatus, jqXHR) {
                  if(data === true)
                      var tag = $('#displayss')
                      tag.fadeOut(1000).html('<p class="front-end-lenses-next" >Options Saved!</p>');
              },

              error: function (errorMessage) {

                  console.log(errorMessage);
              }

          });


      });




  // owl carousel settings
  $('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    dots: true,
    dotsEach: true,
    singleItem: true, transitionStyle: "fade",
    autoplay:false,
    autoplayHoverPause:false,
    touchDrag  : false,
    mouseDrag  : false,
    URLhashListener: true,
    startPosition: 'URLHash',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
 });



});
