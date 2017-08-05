$("#btn-login").click(function(){
  $("#log").toggle();
});


$('#notif').mouseenter(function(){
  // $('#notifikasi').toggle();
  $('#notifikasi').css("opacity", "1");
});
$('#notif').mouseleave(function(){
  // $('#notifikasi').toggle();
  $('#notifikasi').css("opacity", "0");
});

$('[data-toggle="tooltip"]').click(function(){
  $(this).tooltip('hide');
});

$('[data-toggle="tooltip"]').tooltip();

// $(window).scroll(function() {
//   var scrollUp = $(window).scrollTop();
//   var kate_position = $('.kategori').offset().top;
//   if(scroll >= kate_position ){
//     $('.kategori').css("zIndex", "1");
//   }
//   else{
//     $('.kategori').removeClass('.over');
//   }
// });

