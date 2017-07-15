/**
 * File theme.js.
 *
 * Arbitrary JavaScript for use in the theme.
 *
 */
  jQuery(document).ready(function($){

    //hide all inputs except the first one
    $('div.hide-file').not(':eq(0)').hide();

    //functionality for add-file link
    $('a.add-file').on('click', function(e){
      //show by click the first one from hidden inputs
      $('div.hide-file:not(:visible):first').show('slow');
      e.preventDefault();
    });

    //functionality for del-file link
    $('a.del-file').on('click', function(e){
      //var init
      var input_parent = $(this).parent();
      var input_wrap = input_parent.find('span');
      //reset field value
      input_wrap.html(input_wrap.html());
      //hide by click
      input_parent.hide('slow');
      e.preventDefault();
    });

    //jQuery for page scrolling feature - requires jQuery Easing plugin
    $('.menu-item > a').addClass('page-scroll')
    $(function() {
        $(document).on('click', 'a.page-scroll', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });

    /*
      By Osvaldas Valutis, www.osvaldas.info
      Available for use under the MIT License
    */

    'use strict';

    ;( function( window, document, undefined )
    {
      $( '#contact-file01' ).each( function()
      {
        var $input	 = $( this ),
          $label	 = $( 'span.wpcf7-form-control-wrap' ).next( 'label[for="contact-file01"]' ),
          labelVal = $label.html();

        $input.on( 'change', function( e )
        {
          var fileName = '';

          if( e.target.value )
            fileName = e.target.value.split( '\\' ).pop();

          if( fileName )
            $label.find( 'span' ).html( fileName );
          else
            $label.html( labelVal );
        });

        // Firefox bug fix
        $input
        .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
        .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
      });
    })( jQuery, window, document );

    ;( function( window, document, undefined )
    {
      $( '#contact-file02' ).each( function()
      {
        var $input	 = $( this ),
          $label	 = $( 'span.wpcf7-form-control-wrap' ).next( 'label[for="contact-file02"]' ),
          labelVal = $label.html();

        $input.on( 'change', function( e )
        {
          var fileName = '';

          if( e.target.value )
            fileName = e.target.value.split( '\\' ).pop();

          if( fileName )
            $label.find( 'span' ).html( fileName );
          else
            $label.html( labelVal );
        });

        // Firefox bug fix
        $input
        .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
        .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
      });
    })( jQuery, window, document );

    ;( function( window, document, undefined )
    {
      $( '#contact-file03' ).each( function()
      {
        var $input	 = $( this ),
          $label	 = $( 'span.wpcf7-form-control-wrap' ).next( 'label[for="contact-file03"]' ),
          labelVal = $label.html();

        $input.on( 'change', function( e )
        {
          var fileName = '';

          if( e.target.value )
            fileName = e.target.value.split( '\\' ).pop();

          if( fileName )
            $label.find( 'span' ).html( fileName );
          else
            $label.html( labelVal );
        });

        // Firefox bug fix
        $input
        .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
        .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
      });
    })( jQuery, window, document );

    ;( function( window, document, undefined )
    {
      $( '#contact-file04' ).each( function()
      {
        var $input	 = $( this ),
          $label	 = $( 'span.wpcf7-form-control-wrap' ).next( 'label[for="contact-file04"]' ),
          labelVal = $label.html();

        $input.on( 'change', function( e )
        {
          var fileName = '';

          if( e.target.value )
            fileName = e.target.value.split( '\\' ).pop();

          if( fileName )
            $label.find( 'span' ).html( fileName );
          else
            $label.html( labelVal );
        });

        // Firefox bug fix
        $input
        .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
        .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
      });
    })( jQuery, window, document );

    ;( function( window, document, undefined )
    {
      $( '#contact-file05' ).each( function()
      {
        var $input	 = $( this ),
          $label	 = $( 'span.wpcf7-form-control-wrap' ).next( 'label[for="contact-file05"]' ),
          labelVal = $label.html();

        $input.on( 'change', function( e )
        {
          var fileName = '';

          if( e.target.value )
            fileName = e.target.value.split( '\\' ).pop();

          if( fileName )
            $label.find( 'span' ).html( fileName );
          else
            $label.html( labelVal );
        });

        // Firefox bug fix
        $input
        .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
        .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
      });
    })( jQuery, window, document );

    ;( function( window, document, undefined )
    {
      $( '#contact-file06' ).each( function()
      {
        var $input	 = $( this ),
          $label	 = $( 'span.wpcf7-form-control-wrap' ).next( 'label[for="contact-file06"]' ),
          labelVal = $label.html();

        $input.on( 'change', function( e )
        {
          var fileName = '';

          if( e.target.value )
            fileName = e.target.value.split( '\\' ).pop();

          if( fileName )
            $label.find( 'span' ).html( fileName );
          else
            $label.html( labelVal );
        });

        // Firefox bug fix
        $input
        .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
        .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
      });
    })( jQuery, window, document );

    ;( function( window, document, undefined )
    {
      $( '#contact-file07' ).each( function()
      {
        var $input	 = $( this ),
          $label	 = $( 'span.wpcf7-form-control-wrap' ).next( 'label[for="contact-file07"]' ),
          labelVal = $label.html();

        $input.on( 'change', function( e )
        {
          var fileName = '';

          if( e.target.value )
            fileName = e.target.value.split( '\\' ).pop();

          if( fileName )
            $label.find( 'span' ).html( fileName );
          else
            $label.html( labelVal );
        });

        // Firefox bug fix
        $input
        .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
        .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
      });
    })( jQuery, window, document );

    ;( function( window, document, undefined )
    {
      $( '#contact-file08' ).each( function()
      {
        var $input	 = $( this ),
          $label	 = $( 'span.wpcf7-form-control-wrap' ).next( 'label[for="contact-file08"]' ),
          labelVal = $label.html();

        $input.on( 'change', function( e )
        {
          var fileName = '';

          if( e.target.value )
            fileName = e.target.value.split( '\\' ).pop();

          if( fileName )
            $label.find( 'span' ).html( fileName );
          else
            $label.html( labelVal );
        });

        // Firefox bug fix
        $input
        .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
        .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
      });
    })( jQuery, window, document );

  });
