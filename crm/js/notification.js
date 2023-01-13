$(document).on('click','.number_of_notification',function(e) {
  $('.count_notification').text('');

  $.get(base_url + 'dashboard/view_notification', function(data) {
        console.log(data);
   }); 
 
});

if ($('.dropdown-menu  .nav-item ').length > 10){
   $('.dropdown-menu').css({'padding':'5px 0px 0px 0px !important','height': '300px', 'overflow-y': 'scroll'});
}
else if ($('.dropdown-menu  .nav-item ').length == 0){
    $('.dropdown-menu  .nav-item ').html("No notification Found");
}
