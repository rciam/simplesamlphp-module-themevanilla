$(document).ready(function() {
  $('#favourite-modal').modal('show');
  $('.js-close-custom').click(function() {
    $modal = $(this).closest('.modal.fade');
    $modal.slideUp(450, function() {
      $modal.modal('hide');
    });
  });
});
