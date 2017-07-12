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
  });
