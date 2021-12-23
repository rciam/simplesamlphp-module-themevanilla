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
  $el2spread.height(available_height);
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

// Hide Top Bar notification
function closeNoty(element) {
  $(element).parent().hide()
}

$(document).ready(function() {
  if (!Cookies.get('cookies_accepted')) {
    $('#cookies').show();
  };

  resizeAll();
  // loader for discopower view
  $('.loader-container').delay(300).fadeOut('slow', function() {
    $('#favourite-modal').modal('show');
  });
  $("#yesbutton").on("click", function(){
    $(".loader-container").show();
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
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });

  $('#js-accept-cookies').click(function(e){
    e.preventDefault();
    $('#cookies').hide();
    Cookies.set('cookies_accepted', true);
  })
});
