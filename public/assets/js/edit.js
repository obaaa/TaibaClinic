$(function () {
  $('.edit').prop('disabled', true);
  $('#toggle-btn').toggleClass('open');

  $('.edits').click(function () {
    $('html').addClass('active');
    $('#toggle-detail').fadeToggle();
    $('.edit').prop('disabled', false);
  });

  // $('.save').click(function () {
  //   $('html').removeClass('active');
  //   $('input').prop('disabled', true);
  // });


// function resizeInput() {
//   $(this).attr('size', $(this).val().length + 2);
// }

// $('input')
//   .keyup(resizeInput)
//   .each(resizeInput);
});
// function toggleDetail() {
//   $('#toggle-btn').toggleClass('open');
//   $('#toggle-detail').fadeToggle();
