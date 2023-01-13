// Addd attendance form
$(document).on('click','#attendance_form #add_attendance',function(e) {
  $.ajax({
         type: "POST",
         url: base_url +  "dashboard/add_attendance",
         dataType: 'json',
         data: $("#attendance_form").serialize(),
         success: function(res) {
        if (res.response=="success"){
            $("#attendance_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
            $("#attendance_form .alert-success").css("display", "block");
            $("#attendance_form .alert-success p").html(res.message);
            setTimeout(function(){
                         location.reload();
                },1000);

        }
         else{
            $("#attendance_form .alert-success").removeClass("alert-success").addClass("alert-danger");
            $("#attendance_form .alert-danger").css("display", "block");
            $("#attendance_form .alert-danger p").html(res.message);
            setTimeout(function(){
                    $("#attendance_form .alert-danger").css("display", "none");
                },3000);

       }
    },
  });
 });
// update attendance by admin
$(document).on('click','#update_employee_attendance_form #update_employee_attendance',function(e) {
  $.ajax({
         type: "POST",
         url: base_url +  "dashboard/update_timelog",
         dataType: 'json',
         data: $("#update_employee_attendance_form").serialize(),
         success: function(res) {
        if (res.response=="success"){
            $("#update_employee_attendance_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
            $("#update_employee_attendance_form .alert-success").css("display", "block");
            $("#update_employee_attendance_form .alert-success p").html(res.message);
            setTimeout(function(){
                         location.reload();
                },1000);

        }
         else{
            $("#update_employee_attendance_form .alert-success").removeClass("alert-success").addClass("alert-danger");
            $("#update_employee_attendance_form .alert-danger").css("display", "block");
            $("#update_employee_attendance_form .alert-danger p").html(res.message);
            setTimeout(function(){
                    $("#update_employee_attendance_form .alert-danger").css("display", "none");
                },3000);


       }
    },
  });
 });


//update approve status attendance
$(document).on('click','#update_status_form #update_status',function(e) {
  $.ajax({
         type: "POST",
         url: base_url +  "dashboard/update_attendance_status",
         dataType: 'json',
         data: $("#update_status_form").serialize(),
         success: function(res) {
        if (res.response=="success"){
            $("#update_status_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
            $("#update_status_form .alert-success").css("display", "block");
            $("#update_status_form .alert-success p").html(res.message);
            setTimeout(function(){
                         location.reload();
                },1000);

        }
         else{
            $("#update_status_form .alert-success").removeClass("alert-success").addClass("alert-danger");
            $("#update_status_form .alert-danger").css("display", "block");
            $("#update_status_form .alert-danger p").html(res.message);
            setTimeout(function(){
                    $("#update_status_form .alert-danger").css("display", "none");
                },3000);


       }
    },
  });
 });


// update attendance by users
$(document).on('click','#update_attendance_form #update_time_log',function(e) {
  $.ajax({
         type: "POST",
         url: base_url + "dashboard/update_timelog_user",
         dataType: 'json',
         data: $("#update_attendance_form").serialize(),
         success: function(res) {
        if (res.response=="success"){
            $("#update_attendance_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
            $("#update_attendance_form .alert-success").css("display", "block");
            $("#update_attendance_form .alert-success p").html(res.message);
            setTimeout(function(){
                         location.reload();
                },1000);

        }
         else{
            $("#update_attendance_form .alert-success").removeClass("alert-success").addClass("alert-danger");
            $("#update_attendance_form .alert-danger").css("display", "block");
            $("#update_attendance_form .alert-danger p").html(res.message);
            setTimeout(function(){
                    $("#update_attendance_form .alert-danger").css("display", "none");
                },3000);


       }
    },
  });
 });



$(document).on('click','#attendancedataTable .view_attendance_detail',function(e) {

      var attendance_id= $(this).data('attendance_id');

      dataEdit = 'attendance_id='+ attendance_id;
      $('#update_attendance_form [name="attendance_id"]').val(attendance_id);
      $('#update_attendance_form [name="duty_log"]').val($(this).data('duty_log'));

       $("#update_attendance_form :input").attr("disabled", false);

      var tr= '';
            $.ajax({
            type:'GET',
            data:dataEdit,
            url: base_url +'dashboard/view_attendance/',
            dataType: 'json',
            success:function(data){
              if (data.length > 0 ){
                  for (var i = 0; i < data.length; i++) {
                       // $("#update_payment_lead_form  .payment_status option[value='Pending']").remove(); 
                   if (data[i].lunch_start != null && data[i].lunch_end != null){
                        $("#update_attendance_form  .status_log option[value='Lunch Start']").remove(); 
                        $("#update_attendance_form  .status_log option[value='lunch_end']").remove(); 
                    }
                    else if (data[i].break_in != null && data[i].break_out != null){
                        $("#update_attendance_form  .status_log option[value='Break In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break Out']").remove(); 
                    }


                    if (data[i].status_log == null || data[i].status_log == '' || typeof data[i].status_log  == 'undefined'){
                        $("#update_attendance_form option:not(:first, :eq(1)) ").remove(); 

                    }
                    else if (data[i].status_log == "Time In"){
                        $("#update_attendance_form  .status_log option[value='"+data[i].status_log+"']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Lunch End']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break Out']").remove(); 

                    }
                    else if (data[i].status_log == "Break In"){
                        $("#update_attendance_form  .status_log option[value='"+data[i].status_log+"']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Time In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Lunch Start']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Lunch End']").remove(); 

                    }
                    else if (data[i].status_log == "Break Out"){
                        $("#update_attendance_form  .status_log option[value='"+data[i].status_log+"']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Time In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break In']").remove(); 

                    }
                     else if (data[i].status_log == "Lunch Start"){
                        $("#update_attendance_form  .status_log option[value='"+data[i].status_log+"']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Time In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break Out']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break In']").remove(); 


                    }
                     else if (data[i].status_log == "Lunch End"){
                        $("#update_attendance_form  .status_log option[value='"+data[i].status_log+"']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Time In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Lunch Start']").remove(); 


                    }
                    else if (data[i].status_log == "Time Out"){
                        $("#update_attendance_form .status_log option[value='"+data[i].status_log+"']").attr('selected', 'selected').text(data[i].status_log).change();
                        $("#update_attendance_form  .status_log option[value='Time In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break Out']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Lunch Start']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Lunch End']").remove(); 
                        $("#update_attendance_form :input").attr("disabled", true);

                    }

               }
             }
              else{
                    $("#update_attendance_form option:not(:first, :eq(1)) ").remove(); 
              }

            }
     });
 });

//attendance detail in dashboard

$(document).on('click','.view_attendance_detail1',function(e) {
      var attendance_id= $(this).data('attendance_id');
      var duty_log = $(this).data('duty_log');


      dataEdit = 'attendance_id='+ attendance_id;
      $('#update_attendance_form [name="attendance_id"]').val(attendance_id);
      $('#update_attendance_form [name="duty_log"]').val(duty_log);

       $("#update_attendance_form :input").attr("disabled", false);

      var tr= '';
            $.ajax({
            type:'GET',
            data:dataEdit,
            url: base_url +'dashboard/view_attendance/',
            dataType: 'json',
            success:function(data){
              if (data.length > 0 ){
                  for (var i = 0; i < data.length; i++) {
                       // $("#update_payment_lead_form  .payment_status option[value='Pending']").remove(); 
                   if (data[i].lunch_start != null && data[i].lunch_end != null){
                        $("#update_attendance_form  .status_log option[value='Lunch Start']").remove(); 
                        $("#update_attendance_form  .status_log option[value='lunch_end']").remove(); 
                    }
                    else if (data[i].break_in != null && data[i].break_out != null){
                        $("#update_attendance_form  .status_log option[value='Break In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break Out']").remove(); 
                    }


                    if (data[i].status_log == null || data[i].status_log == '' || typeof data[i].status_log  == 'undefined'){
                        $("#update_attendance_form option:not(:first, :eq(1)) ").remove(); 

                    }
                    else if (data[i].status_log == "Time In"){
                        $("#update_attendance_form  .status_log option[value='"+data[i].status_log+"']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Lunch End']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break Out']").remove(); 

                    }
                    else if (data[i].status_log == "Break In"){
                        $("#update_attendance_form  .status_log option[value='"+data[i].status_log+"']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Time In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Lunch Start']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Lunch End']").remove();
                        $("#update_attendance_form  .status_log option[value='Time Out']").remove();  

                    }
                    else if (data[i].status_log == "Break Out"){
                        $("#update_attendance_form  .status_log option[value='"+data[i].status_log+"']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Time In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break In']").remove();
                        $("#update_attendance_form  .status_log option[value='Lunch End']").remove(); 

                    }
                     else if (data[i].status_log == "Lunch Start"){
                        $("#update_attendance_form  .status_log option[value='"+data[i].status_log+"']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Time In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break Out']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Time Out']").remove();  

                    }
                     else if (data[i].status_log == "Lunch End"){
                        $("#update_attendance_form  .status_log option[value='"+data[i].status_log+"']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Time In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Lunch Start']").remove(); 


                    }
                    else if (data[i].status_log == "Time Out"){
                        $("#update_attendance_form .status_log option[value='"+data[i].status_log+"']").attr('selected', 'selected').text(data[i].status_log).change();
                        $("#update_attendance_form  .status_log option[value='Time In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break Out']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Break In']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Lunch Start']").remove(); 
                        $("#update_attendance_form  .status_log option[value='Lunch End']").remove(); 
                        $("#update_attendance_form :input").attr("disabled", true);

                    }

               }
             }
              else{
                    $("#update_attendance_form option:not(:first, :eq(1)) ").remove(); 
              }

            }
     });
 });



$(document).on('click','.view_employee_attendance_detail',function(e) {
      var attendance_id= $(this).data('attendance_id');
      $('#update_employee_attendance_form [name="attendance_id"]').val(attendance_id);
      $('#update_status_form [name="attendance_id"]').val(attendance_id);


 });
      var  datetimepicker = $('#update_employee_attendance_form #timepicker').datetimepicker({
                      uiLibrary: 'bootstrap4',
                      format: 'dd/mm/yyyy hh:MM:ss tt',
                      footer:true,
                  });


  $('#update_employee_attendance_form [name="status_log"]').on('change', function () {
    
            $.ajax({
            type:'POST',
            url: base_url +'dashboard/view_time_log' ,
            data:$("#update_employee_attendance_form").serialize(),
            dataType: 'json',
            success:function(data){
                  $('#update_employee_attendance_form [name="duty_time"]').val(data);

            }

     });

 });

$(document).on('click','#attendance_remarkform #add_remark',function(e) {
        saveToDB();
});

function saveToDB()
{
  var tr ='';
  $.ajax({
    url: base_url +'dashboard/add_remark_attendance',
    type: "POST",
    data: $("#attendance_remarkform").serialize(), // serializes the form's elements.
    dataType: 'json',
    success: function(res) {
         var data = res.attendance_data;
        if (res.response=="success"){
            $("#attendance_remarkform .alert-danger").removeClass("alert-danger").addClass("alert-success");
            $("#attendance_remarkform .alert-success").css("display", "block");
            $("#attendance_remarkform .alert-success p").html(res.message);
            for (var i = 0; i < data.length; i++) {
                     $('#attendance_remarkform [name="remark"]').val(data[i].remark);

                  tr += '<tr>'+
                            '<td>'+data[i].from_user+'</td>'+
                            '<td>'+data[i].from_usertype+'</td>'+
                            '<td>'+data[i].remark+'</td>'+
                            '<td>'+new Date(data[i].date_create).toLocaleString([], { hour12: true})+'</td>'+
                         '</tr>'; 
                   }
                  $('#viewattendance_historymodal .view_attendance_detail').html(tr);
                  $(".view_attendance_detail td").filter(function() {
                          return $(this).text() == 'undefined';
                      }).closest("tr").remove();
                   $('#attendance_remarkDataTable').DataTable();
            setTimeout(function(){
                    $("#attendance_remarkform .alert-success").css("display", "none");
                },1000);


        }
         else{
            $("#attendance_remarkform .alert-success").removeClass("alert-success").addClass("alert-danger");
            $("#attendance_remarkform .alert-danger").css("display", "block");
            $("#attendance_remarkform .alert-danger p").html(res.message);
            setTimeout(function(){
                    $("#attendance_remarkform .alert-danger").css("display", "none");
                },3000);


       }
    },
  });
}


  $(document).on('click','.view_attendance_history',function(e) {
      var attendance_id= $(this).data('attendance_id');
      $('#attendance_remarkform [name="attendance_id"]').val(attendance_id);

      dataEdit = 'attendance_id='+ attendance_id;

      var tr= '';
            $.ajax({
            type:'GET',
            data:dataEdit,
            url: base_url +'dashboard/view_remark_attendance/',
            dataType: 'json',
            success:function(data){
                for (var i = 0; i < data.length; i++) {
                     $('#attendance_remarkform [name="remark"]').val(data[i].remark);

                  tr += '<tr>'+
                            '<td>'+data[i].from_user+'</td>'+
                            '<td>'+data[i].from_usertype+'</td>'+
                            '<td>'+data[i].remark+'</td>'+
                            '<td>'+new Date(data[i].date_create).toLocaleString([], { hour12: true})+'</td>'+
                         '</tr>'; 
                   }
                  $('#viewattendance_historymodal .view_attendance_detail').html(tr);
                  $(".view_attendance_detail td").filter(function() {
                          return $(this).text() == 'undefined';
                      }).closest("tr").remove();
                   $('#attendance_remarkDataTable').DataTable();

            }
     });
 });

  $(document).on('click','.view_attendancefile_history',function(e) {
      var attendance_id= $(this).data('attendance_id');

      $('.upload_attendance_form [name="attendance_id"]').val(attendance_id);

      dataEdit = 'attendance_id='+ attendance_id;


      var tr= '';
            $.ajax({
            type:'GET',
            data:dataEdit,
            url: base_url +'dashboard/view_file_attendance/',
            dataType: 'json',
            success:function(data){
                for (var i = 0; i < data.length; i++) {

                  tr += '<tr>'+
                            '<td>'+data[i].from_user+'</td>'+
                            '<td>'+data[i].file_name+'</td>'+
                            '<td>'+new Date(data[i].date_uploaded).toLocaleString([], { hour12: true})+'</td>'+
                             '<td><a class="btn btn-success" style="color:#ffffff;" href="'+base_url+'attendance_files/'+data[i].file_name+'" download>Download</a></td>'+
                         '</tr>'; 
                   }
                  $('#viewattendancefile_historymodal .view_attendancefile_detail').html(tr);
                  $(".view_attendancefile_detail td").filter(function() {
                          return $(this).text() == 'undefined';
                      }).closest("tr").remove();
                   $('#attendance_fileDataTable').DataTable();

            }
     });
 });
$(".upload_attendance_form .attendance_file").change(function() { 
      var data = new FormData($('.upload_attendance_form')[0]);
      var tr="";
    $.ajax({
       url: base_url +'dashboard/upload_attendance_file/',
        type: "POST",   
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: data,
        success: function(res) {
          var attendance_files = res.attendance_files;
            if(res.response == "success") {
                 $(".upload_attendance_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $(".upload_attendance_form .alert-success").css("display", "block");
                  $(".upload_attendance_form .alert-success p").html(res.message);
                  setTimeout(function(){
                    for (var i = 0; i < attendance_files.length; i++) {
                      tr += '<tr>'+
                                '<td>'+attendance_files[i].from_user+'</td>'+
                                '<td>'+attendance_files[i].file_name+'</td>'+
                                '<td>'+new Date(attendance_files[i].date_uploaded).toLocaleString([], { hour12: true})+'</td>'+
                                 '<td><a class="btn btn-success" style="color:#ffffff;" href="'+base_url+'attendance_files/'+attendance_files[i].file_name+'" download>Download</a></td>'+
                             '</tr>'; 
                       }
                      $('#viewattendancefile_historymodal .view_attendancefile_detail').html(tr);
                      $(".view_attendancefile_detail td").filter(function() {
                              return $(this).text() == 'undefined';
                          }).closest("tr").remove();
                       $('#attendance_fileDataTable').DataTable();
                 },1000);
            } 
            else{

                $(".upload_attendance_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                $(".upload_attendance_form .alert-danger").css("display", "block");
                $(".upload_attendance_form .alert-danger p").html(res.message);
               setTimeout(function(){
                    $(".upload_attendance_form .alert-danger").css("display", "none");
                },3000);

            }
        }
    });   
});

$(function () {
    // INITIALIZE DATEPICKER PLUGIN
    $('#attendance_form #datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy",
        footer:true,

    });
    
})
    var dateToday = new Date(); 

    $('#update_employee_attendance_form #timepicker').datetimepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd/mm/yyyy hh:MM:ss tt',
            footer:true,
        });
$(document).on('click','#attendance_form #check_all',function () {
     $('.check_user').not(this).prop('checked', this.checked);
 });

    $('#attendance_agent_form [name="user_type"]').on('change', function () {
       attendancetable.columns(1).search($(this).val()).draw() ;

         $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
              var min = new Date($('#attendance_agent_form [name="from_date"]').val());
              var max = new Date($('#attendance_agent_form [name="to_date"]').val());
              var startDate = new Date(data[0]);
              var agent_user = data[1];
                  
              
              if (min == null && max == null &&  $(this).val() == agent_user) {
                return true;
              }
              if (min == null && startDate <= max && $(this).val() == agent_user) {
                return true;
              }
              if (max == null && startDate >= min && $(this).val() == agent_user) {
                return true;
              }
              if (startDate <= max && startDate >= min) {
                return true;
              }
              return false;
            }
          );
      attendancetable.draw();
        $.fn.dataTable.ext.search.pop();

     });


$('#attendance_IT_form [name="user_type"]').on('change', function () {
       attendancetable_IT.columns(1).search($(this).val()).draw() ;

         $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                      var min = new Date($('#attendance_IT_form [name="from_date"]').val());
                      var max = new Date($('#attendance_IT_form [name="to_date"]').val());
                      var startDate = new Date(data[0]);
                      var agent_user = data[1];
                          
                      
                      if (min == null && max == null &&  $(this).val() == agent_user) {
                        return true;
                      }
                      if (min == null && startDate <= max && $(this).val() == agent_user) {
                        return true;
                      }
                      if (max == null && startDate >= min && $(this).val() == agent_user) {
                        return true;
                      }
                      if (startDate <= max && startDate >= min) {
                        return true;
                      }
                      return false;
                    }
                  );
              attendancetable_IT.draw();
                $.fn.dataTable.ext.search.pop();

     });

function CalculateAttendance_TableSummary(attendancetable) {
    try {

        var intVal = function (i) {
            return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
        };

         var timeVal = function ( i ) {
                  return i != null ? moment.duration(i).asSeconds() : 0;
              };
        //convert seconds to hour:minute:seconds
        var secondsToHms = function(d) {
          d = Number(d);
          var h = Math.floor(d / 3600);
          return h;
        };

       var api = attendancetable.api();
             var total_of_works = api.column(14, {search: 'applied'}) 
            .data()
            .filter( function (value, index) {
                  return value="Present" ? true : false;
            }).length;

             $('.total_number_works').text(total_of_works.toLocaleString("en")+'.00');

            // Total over all pages
       api.columns(".hour_works").each(function (index) {
         var column = api.column(index,{page:'current'});

           var sum = column 
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

        $('.tile_stats_count .total_hours_work').text(sum.toLocaleString("en")+'.00');
      });

       api.columns(".point_works").each(function (index) {
         var column_point = api.column(index,{page:'current'});

           var sum_point = column_point 
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


        $('.tile_stats_count .total_points').text(sum_point);
      });

        api.columns(".excess_break_hour").each(function (index) {
         var column_point = api.column(index,{page:'current'});

             var sum_excess_break_estimated = column_point 
                .data()
                .reduce( function (a, b) {
                    var total = timeVal(a) + timeVal(b);
                    var totalFormatted = [
                        parseInt(total / 60 / 60),
                        parseInt(total / 60 % 60),
                        parseInt(total % 60)
                    ].join(":").replace(/\b(\d)\b/g, "0$1");
                    return totalFormatted;
                }, 0 );

        $('.tile_stats_count .total_excess_break').text(sum_excess_break_estimated);
      });

      api.columns(".excess_lunch_hour").each(function (index) {
         var column_point = api.column(index,{page:'current'});

             var sum_lunch_estimated = column_point 
                .data()
                .reduce( function (a, b) {
                    var total = timeVal(a) + timeVal(b);
                    var totalFormatted = [
                        parseInt(total / 60 / 60),
                        parseInt(total / 60 % 60),
                        parseInt(total % 60)
                    ].join(":").replace(/\b(\d)\b/g, "0$1");
                    return totalFormatted;
                }, 0 );

        $('.tile_stats_count .total_excess_lunch').text(sum_lunch_estimated);
      });
          api.columns(".count_lates").each(function (index) {
         var column_point = api.column(index,{page:'current'});

             var sum_lates_estimated = column_point 
                .data()
                .reduce( function (a, b) {
                    var total = timeVal(a) + timeVal(b);
                    var totalFormatted = [
                        parseInt(total / 60 / 60),
                        parseInt(total / 60 % 60),
                        parseInt(total % 60)
                    ].join(":").replace(/\b(\d)\b/g, "0$1");
                    return totalFormatted;
                }, 0 );

        $('.tile_stats_count .total_lates').text(sum_lates_estimated);
      });

  }
  catch (e) {
        console.log('Error in CalculateAttendance_TableSummary');
        console.log(e)
    }
}

function CalculateAttendanceIT_TableSummary(attendancetable) {
    try {

        var intVal = function (i) {
            return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
        };

         var timeVal = function ( i ) {
                  return i != null ? moment.duration(i).asSeconds() : 0;
              };
        //convert seconds to hour:minute:seconds
        var secondsToHms = function(d) {
          d = Number(d);
          var h = Math.floor(d / 3600);
          return h;
        };

       var api = attendancetable.api();

 
        var total_of_works = api.column(16, {search: 'applied'}) 
            .data()
            .filter( function (value, index) {
                  return value="Present" ? true : false;
            }).length;

             $('.total_number_works_IT').text(total_of_works.toLocaleString("en")+'.00');
            // Total over all pages
       api.columns(".hour_IT_works").each(function (index) {
         var column = api.column(index,{page:'current'});

           var sum = column 
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

        $('.tile_stats_count .total_hours_IT_work').text(sum.toLocaleString("en")+'.00');
      });

       api.columns(".excess_break_hour_IT").each(function (index) {
         var column_point = api.column(index,{page:'current'});

             var sum_excess_break_estimated = column_point 
                .data()
                .reduce( function (a, b) {
                    var total = timeVal(a) + timeVal(b);
                    var totalFormatted = [
                        parseInt(total / 60 / 60),
                        parseInt(total / 60 % 60),
                        parseInt(total % 60)
                    ].join(":").replace(/\b(\d)\b/g, "0$1");
                    return totalFormatted;
                }, 0 );

        $('.tile_stats_count .total_excess_break_IT').text(sum_excess_break_estimated);
      });

      api.columns(".excess_lunch_hour_IT").each(function (index) {
         var column_point = api.column(index,{page:'current'});

             var sum_lunch_estimated = column_point 
                .data()
                .reduce( function (a, b) {
                    var total = timeVal(a) + timeVal(b);
                    var totalFormatted = [
                        parseInt(total / 60 / 60),
                        parseInt(total / 60 % 60),
                        parseInt(total % 60)
                    ].join(":").replace(/\b(\d)\b/g, "0$1");
                    return totalFormatted;
                }, 0 );

        $('.tile_stats_count .total_excess_lunch_IT').text(sum_lunch_estimated);
      });
          api.columns(".count_lates_IT").each(function (index) {
         var column_point = api.column(index,{page:'current'});

             var sum_lates_estimated = column_point 
                .data()
                .reduce( function (a, b) {
                    var total = timeVal(a) + timeVal(b);
                    var totalFormatted = [
                        parseInt(total / 60 / 60),
                        parseInt(total / 60 % 60),
                        parseInt(total % 60)
                    ].join(":").replace(/\b(\d)\b/g, "0$1");
                    return totalFormatted;
                }, 0 );

        $('.tile_stats_count .total_lates_IT').text(sum_lates_estimated);
      });
  }
  catch (e) {
        console.log('Error in CalculateAttendance_TableSummary');
        console.log(e)
    }
}
var  attendancetable = $('#attendancedataTable').DataTable({
     dom: 'Bfrtip',
        buttons: [
            {
                  extend: 'copyHtml5',
                   title: 'Attendance',
                   filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,16]
                  }
              },
               {
                extend: 'csvHtml5',
                   title: 'Attendance',
                   filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,16]
                  }
              },
              {
                  extend: 'excelHtml5',
                   title: 'Attendance',
                   filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,16]
                  }
              },
              {
                  extend: 'pdfHtml5',
                   title: 'Attendance',
                   filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,16]
                  }
              },
                {
                  extend: 'print',
                   title: 'Attendance',
                   filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,16]
                  }
              },
              'colvis'
          ],
         "pageLength":40,
        "order": [[ 0, "desc" ]],
    "initComplete": function (settings, json) {
     var api = this.api();
     CalculateAttendance_TableSummary(this);
    },
    "drawCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;  
        CalculateAttendance_TableSummary(this);
        return ;   
      }
    });

 $('#status_attendance_agent').on('change', function(){
      attendancetable.columns(15).search(this.value).draw();


         $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
              var min = new Date($('#attendance_agent_form [name="from_date"]').val());
              var max = new Date($('#attendance_agent_form [name="to_date"]').val());
              var startDate = new Date(data[0]);
              var agent_user = data[1];
              var status = data[15];
                  
              
              if (min == null && max == null &&  $(this).val() == agent_user && $(this).val() == status) {
                return true;
              }
              if (min == null && startDate <= max && $(this).val() == agent_user && $(this).val() == status) {
                return true;
              }
              if (max == null && startDate >= min && $(this).val() == agent_user && $(this).val() == status) {
                return true;
              }
              if (startDate <= max && startDate >= min) {
                return true;
              }
              return false;
            }
          );
      attendancetable.draw();
        $.fn.dataTable.ext.search.pop();

     });


var  attendancetable_IT = $('#attendance_IT_dataTable').DataTable({
   dom: 'Bfrtip',
        buttons: [
            {
                   extend: 'copyHtml5',
                   title: 'Attendance',
                   filename: 'Attendance',
                   exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,14]
                  }
              },
               {
                  extend: 'csvHtml5',
                  title: 'Attendance',
                  filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,14]
                  }
              },
              {
                  extend: 'excelHtml5',
                  title: 'Attendance',
                  filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,14]
                  }
              },
              {
                   extend: 'pdfHtml5',
                   title: 'Attendance',
                   filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,14]
                  }
              },
                {
                  extend: 'print',
                  title: 'Attendance',
                  filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,14]
                  }
              },
              'colvis'
          ], 
          "pageLength":40,
        "order": [[ 0, "desc" ]],
    "initComplete": function (settings, json) {
     var api = this.api();
     CalculateAttendanceIT_TableSummary(this);
    },
    "drawCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;  
        CalculateAttendanceIT_TableSummary(this);
        return ;   
      }
    });



var idletable =  $('#idledataTable').DataTable({"order": [[ 1, "desc" ]]});

  $(function () {
   var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportattendancerange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportattendancerange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);


  $('#reportattendancerange').on('apply.daterangepicker', function(ev, picker) {

   var start = picker.startDate.format('YYYY/MM/DD');
   var end = picker.endDate.format('YYYY/MM/DD');

        $('#attendance_agent_form [name="from_date"]').val(start);
      $('#attendance_agent_form [name="to_date"]').val(end);

  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date(start);
      var max = new Date(end);
      var startDate = new Date(data[0]);
      // console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null) {
        return true;
      }
      if (min == null && startDate <= max) {
        return true;
      }
      if (max == null && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  attendancetable.draw();
    $.fn.dataTable.ext.search.pop();

});
});

// IT date ranges

  $(function () {
   var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrangeIT span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrangeIT').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);


  $('#reportrangeIT').on('apply.daterangepicker', function(ev, picker) {

   var start = picker.startDate.format('YYYY/MM/DD');
   var end = picker.endDate.format('YYYY/MM/DD');


      $('#attendance_IT_form [name="from_date"]').val(start);
      $('#attendance_IT_form [name="to_date"]').val(end);


  

  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date(start);
      var max = new Date(end);
      var startDate = new Date(data[0]);
      // console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null) {
        return true;
      }
      if (min == null && startDate <= max) {
        return true;
      }
      if (max == null && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  attendancetable_IT.draw();
    $.fn.dataTable.ext.search.pop();

});
});


  $(function () {
   var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrangeidle span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrangeidle').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);


  $('#reportrangeidle').on('apply.daterangepicker', function(ev, picker) {

   var start = picker.startDate.format('YYYY/MM/DD');
   var end = picker.endDate.format('YYYY/MM/DD');

  

  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date(start);
      var max = new Date(end);
      var startDate = new Date(data[1]);
      // console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null) {
        return true;
      }
      if (min == null && startDate <= max) {
        return true;
      }
      if (max == null && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  idletable.draw();
    $.fn.dataTable.ext.search.pop();

});
});


var currentTime = new Date();
// First Date Of the month 
var startDateFrom = new Date(currentTime.getFullYear(),currentTime.getMonth(),1);
// Last Date Of the Month 
var startDateTo = new Date(currentTime.getFullYear(),currentTime.getMonth() +1,0);
  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = startDateFrom;
      var max = startDateTo;
      var startDate = new Date(data[0]);
      // console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null) {
        return true;
      }
      if (min == null && startDate <= max) {
        return true;
      }
      if (max == null && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  attendancetable.draw();
  attendancetable_IT.draw();
    $.fn.dataTable.ext.search.pop();


