// Make one element to get all the available height
function spreadHeight($el2spread) {
  var el2spread_height = $el2spread.height(),
    $parent = $el2spread.parent(),
    parent_height = $parent.height(),
    $siblings = $el2spread.siblings().not('.modal'),
    siblings_height = 0,
    available_height = 0;

  if ($siblings.length > 0 ) {
    $siblings.each(function() {
      siblings_height += $(this).outerHeight(true);
    });
  }
  available_height = parent_height - siblings_height;
  if(available_height > el2spread_height ){
    $el2spread.outerHeight(available_height);
  }
};

// Apply spreadHeight in html of discopower and consent
function resizeAll() {
  // If there is an element with the particular selector, do the resizing
  if($('.js-spread').length > 0) {
    var $spread_els = $('.js-spread');
    $spread_els.each(function() {
      spreadHeight($(this));
    });
  }
};

$(document).ready(function() {
  resizeAll();
  // loader for discopower view
  $('#loader').delay(300).fadeOut('slow', function() {
    $('#favourite-modal').modal('show');
  });

  // hide modal smoothly
  $('.js-close-custom').click(function() {
    $modal = $(this).closest('.modal.fade');
    $modal.slideUp(450, function() {
      $modal.modal('hide');
    });
  });

  $(window).resize(function() {
    resizeAll();
  });
});
