jQuery(document).ready(function($) {

  //show error message when lenses pd range is bigger than saved to product
  $( '.filter-inputs-error' ).on( "mouseover", function() {

      var  filt_left_os_sph = $('#quest-left-os-sph option:selected').val();
      var  filt_right_od_sph = $('#quest-right-od-sph option:selected').val();
      var  filt_right_od_pd = $('#quest-right-od-pd option:selected').val();
      var  filt_left_os_pd = $('#quest-left-os-pd option:selected').val();
      var  filt_right_od_cyl = $('#quest-right-od-cyl option:selected').val();
      var  filt_left_os_cyl = $('#quest-left-os-cyl option:selected').val();
      var  filt_single_pd = $('#quest-single-pd option:selected').val();


      if(  filt_left_os_sph >= $('#quest-left-os-sph').data( 'max' ) ||  $('#quest-left-os-sph').data( 'min' ) >= filt_left_os_sph ) {
        $("#display").html("<error-message>This frame is recommended for prescriptions LEFT SPH from " + $('#quest-left-os-sph').data( 'min' ) + " to " + $('#quest-left-os-sph').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
       if(  filt_right_od_sph >= $('#quest-right-od-sph').data( 'max' ) ||  $('#quest-right-od-sph').data( 'min' ) >= filt_right_od_sph ) {
        $("#display").html("<error-message>This frame is recommended for prescriptions RIGHT SPH from " + $('#quest-right-od-sph').data( 'min' ) + " to " + $('#quest-right-od-sph').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
       if(  filt_right_od_pd >= $('#quest-right-od-pd').data( 'max' ) ||  $('#quest-right-od-pd').data( 'min' ) >= filt_right_od_pd ) {
        $("#display").html("<error-message>This frame is recommended for prescriptions RIGHT PD from " + $('#quest-right-od-pd').data( 'min' ) + " to " + $('#quest-right-od-pd').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
       if(  filt_left_os_pd >= $('#quest-left-os-pd').data( 'max' ) ||  $('#quest-left-os-pd').data( 'min' ) >= filt_left_os_pd ) {
        $("#display").html("<error-message>This frame is recommended for prescriptions LEFT PD from " + $('#quest-left-os-pd').data( 'min' ) + " to " + $('#quest-left-os-pd').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
       if(  filt_right_od_cyl >= $('#quest-right-od-cyl').data( 'max' ) ||  $('#quest-right-od-cyl').data( 'min' ) >= filt_right_od_cyl ) {
        $("#display").html("<error-message>This frame is recommended for prescriptions RIGHT CYL from " + $('#quest-right-od-cyl').data( 'min' ) + " to " + $('#quest-right-od-cyl').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
       if(  filt_left_os_cyl >= $('#quest-left-os-cyl').data( 'max' ) ||  $('#quest-left-os-cyl').data( 'min' ) >= filt_left_os_cyl ) {
        $("#display").html("<error-message>This frame is recommended for prescriptions LEFT CYL from " + $('#quest-left-os-cyl').data( 'min' ) + " to " + $('#quest-left-os-cyl').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
  /*
      if(  filt_single_pd >= $('#single-pd').data( 'max' ) ||  $('#single-pd').data( 'min' ) >= filt_single_pd ) {
        $("#display").html("<error-message>This frame is recommended for prescriptions Single PD from " + $('#single-pd').data( 'min' ) + " to " + $('#single-pd').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
  */

    });

  //show error message when lenses pd range is bigger than saved to product
  $( '.filter-inputs-error' ).on( "mouseover", function() {

      var  filt_left_os_sph = $('#left-os-sph option:selected').val();
      var  filt_right_od_sph = $('#right-od-sph option:selected').val();
      var  filt_right_od_pd = $('#right-od-pd option:selected').val();
      var  filt_left_os_pd = $('#left-os-pd option:selected').val();
      var  filt_right_od_cyl = $('#right-od-cyl option:selected').val();
      var  filt_left_os_cyl = $('#left-os-cyl option:selected').val();
      var  filt_single_pd = $('#single-pd option:selected').val();


      if(  filt_left_os_sph >= $('#left-os-sph').data( 'max' ) ||  $('#left-os-sph').data( 'min' ) >= filt_left_os_sph ) {
        $("#display").fadeOut(4000).html("<error-message>This frame is recommended for prescriptions LEFT SPH from " + $('#left-os-sph').data( 'min' ) + " to " + $('#left-os-sph').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
       if(  filt_right_od_sph >= $('#right-od-sph').data( 'max' ) ||  $('#right-od-sph').data( 'min' ) >= filt_right_od_sph ) {
        $("#display").fadeOut(4000).html("<error-message>This frame is recommended for prescriptions RIGHT SPH from " + $('#right-od-sph').data( 'min' ) + " to " + $('#right-od-sph').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
       if(  filt_right_od_pd >= $('#right-od-pd').data( 'max' ) ||  $('#right-od-pd').data( 'min' ) >= filt_right_od_pd ) {
        $("#display").fadeOut(4000).html("<error-message>This frame is recommended for prescriptions RIGHT PD from " + $('#right-od-pd').data( 'min' ) + " to " + $('#right-od-pd').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
       if(  filt_left_os_pd >= $('#left-os-pd').data( 'max' ) ||  $('#left-os-pd').data( 'min' ) >= filt_left_os_pd ) {
        $("#display").fadeOut(4000).html("<error-message>This frame is recommended for prescriptions LEFT PD from " + $('#left-os-pd').data( 'min' ) + " to " + $('#left-os-pd').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
       if(  filt_right_od_cyl >= $('#right-od-cyl').data( 'max' ) ||  $('#right-od-cyl').data( 'min' ) >= filt_right_od_cyl ) {
        $("#display").fadeOut(4000).html("<error-message>This frame is recommended for prescriptions RIGHT CYL from " + $('#right-od-cyl').data( 'min' ) + " to " + $('#right-od-cyl').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
       if(  filt_left_os_cyl >= $('#left-os-cyl').data( 'max' ) ||  $('#left-os-cyl').data( 'min' ) >= filt_left_os_cyl ) {
        $("#display").fadeOut(4000).html("<error-message>This frame is recommended for prescriptions LEFT CYL from " + $('#left-os-cyl').data( 'min' ) + " to " + $('#left-os-cyl').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
  /*
      if(  filt_single_pd >= $('#single-pd').data( 'max' ) ||  $('#single-pd').data( 'min' ) >= filt_single_pd ) {
        $("#display").html("<error-message>This frame is recommended for prescriptions Single PD from " + $('#single-pd').data( 'min' ) + " to " + $('#single-pd').data( 'max' ) + " Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>");
        //$( '#display' ).fadeOut(3000).html( 'oled homo' );
      }
  */

    });



   $('.save-this-options').on( "click", function() {


        var mydata = {

            action: "prescription_cool_options",
            right_od_sph: $('#right-od-sph option:selected').val(),
            right_od_cyl: $('#right-od-cyl option:selected').val(),
            right_od_axis: $('#right-od-axis option:selected').val(),
            right_od_add: $('#right-od-add option:selected').val(),
            right_od_pd: $('#right-od-pd option:selected').val(),
            left_os_sph: $('#left-os-sph option:selected').val(),
            left_os_cyl: $('#left-os-cyl option:selected').val(),
            left_os_axis: $('#left-os-axis option:selected').val(),
            left_os_add: $('#left-os-add option:selected').val(),
            left_os_pd: $('#left-os-pd option:selected').val(),
            single_pd: $('#single-pd option:selected').val(),
            quest_right_od_sph: $('#quest-right-od-sph option:selected').val(),
            quest_right_od_cyl: $('#quest-right-od-cyl option:selected').val(),
            quest_right_od_axis: $('#quest-right-od-axis option:selected').val(),
            quest_right_od_add: $('#quest-right-od-add option:selected').val(),
            quest_right_od_pd: $('#quest-right-od-pd option:selected').val(),
            quest_left_os_sph: $('#quest-left-os-sph option:selected').val(),
            quest_left_os_cyl: $('#quest-left-os-cyl option:selected').val(),
            quest_left_os_axis: $('#quest-left-os-axis option:selected').val(),
            quest_left_os_add: $('#quest-left-os-add option:selected').val(),
            quest_left_os_pd: $('#quest-left-os-pd option:selected').val(),
            quest_single_pd: $('#quest-single-pd option:selected').val(),


        };


        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php

        $.ajax({
            type: "POST",
            url: ajaxurl,

            dataType: "json",
            data: mydata,

            success: function (data, textStatus, jqXHR) {
                if(data === true)
                    var tag = $('#displays')
                    tag.fadeOut(1000).html('<p class="front-end-lenses-next" >Options Saved!</p>');

            },

            error: function (errorMessage) {

                console.log(errorMessage);
            }

        });


    });




});
