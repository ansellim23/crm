<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url().'images/HORIZONS-LOGO-2.png';?>" type="image/ico" />

    <title>Better Bound House</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('bootstrap/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?php echo base_url('bootstrap/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('bootstrap/vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('bootstrap/vendors/iCheck/skins/flat/green.css');?>" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('bootstrap/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css');?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url('bootstrap/vendors/jqvmap/dist/jqvmap.min.css');?>" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.css');?>" rel="stylesheet">
    <link href="<?php echo base_url(); ?>datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('bootstrap/build/css/custom.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('css/croppie.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('css/editor.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('datepicker/css/bootstrap-datepicker.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #approvalhistorymodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -445px;}
    #payleadmodal .modal-content{ width: 320% !important; margin-left: -510px !important;}
    #viewleadhistorymodal .modal-content, #emailhistoryModal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}
    #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}
    #addsubjectmodal .modal-content, #updatesubjectmodal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
    #emailModal .modal-content, #composeemailModal .modal-content,  #messageModal .modal-content{padding: 0px 20px; width: 250%; margin-left: -440px;}
    #addsignaturemodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -440px;}
    .Editor-container{
      background: #ffffff;
    } 
     .signup-form{width: 100%;}
     .signup-form input[type="checkbox"] {
        margin-top: 3px;
        text-align: center;
        margin: 0px auto;
    }
    .signup-form .btn {
        font-size: 16px;
        font-weight: bold;
        min-width: 111px;
        outline: none !important;
        width: 10%;
        display: inline-block;
    }
    .fc-row .fc-content-skeleton tbody td, .fc-row .fc-helper-skeleton tbody td{
      color: #ffffff;
      font-size: 16px;
      text-align: center;
    }
    .inline-block{
      display: inline-block !important;
      margin: 20px 30px;
      font-size: 18px;
    }
    .inline-block-calendar{
      display: inline-block !important;
      margin: 20px 30px;
      font-size: 18px;
    }
    .inline-block:nth-child(2){
      display: inline-block !important;
      margin: 20px 0px 0px 0px;
      font-size: 18px;
      width: 65%;
    }
    .inline-block:nth-child(2) .form-check-label{
      margin: 0px 20px !important;
      }
     .block{
      display: block !important;;
      font-size: 18px;
    }
   .fc-day-grid-event .fc-time{
      display: none !important;
    }
    .fc-day-grid-event .fc-content {
      white-space: normal !important;
   }


.company_background { 
   width: 15px;
   height: 15px;
   background: #3414ca; 
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
   float: right;
   position: relative;
   top:5px;
   left: 5px;

}
.event_backgrond { 
   width: 15pux;
   height: 15px;
   background: green; 
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
   float: right;
   position: relative;
   top:5px;
   left: 5px;

}
.call_log_background { 
   width: 15px;
   height: 15px;
   background: #b39318; 
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
   float: right;
   position: relative;
   top:5px;
   left: 5px;

}
.pipe_background { 
   width: 15px;
   height: 15px;
   background: #222d48; 
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
   float: right;
   position: relative;
   top:5px;
   left: 5px;

}


.collin_background{ 
   width: 15px;
   height: 15px;
   background: rgb(94, 91, 80);
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
   float: right;
   position: relative;
   top:5px;
   left: 5px;

}
.ava_background{ 
   width: 15px;
   height: 15px;
   background: #e87cd2;
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
   float: right;
   position: relative;
   top:5px;
   left: 5px;

}
.charlie_background{ 
   width: 15px;
   height: 15px;
   background: #fbab7a;
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
   float: right;
   position: relative;
   top:5px;
   left: 5px;
}
.charlie_background{ 
   width: 15px;
   height: 15px;
   background: #fbab7a;
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
   float: right;
   position: relative;
   top:5px;
   left: 5px;

}
.jessica_background{ 
   width: 15px;
   height: 15px;
   background: #bf45a7;
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
   float: right;
   position: relative;
   top:5px;
   left: 5px;

}
.chris_background{ 
   width: 15px;
   height: 15px;
   background: #dd572e;
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
   float: right;
   position: relative;
   top:5px;
   left: 5px;

}
.cyril_background{ 
   width: 15px;
   height: 15px;
   background: #33fbcc;
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
   float: right;
   position: relative;
   top:5px;
   left: 5px;

}
.personal_background { 
   width: 15px;
   height: 15px;
   background: #c14eaa; 
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
   float: right;
   position: relative;
   top:5px;
   left: 5px;

}
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url().'dashboard/';?>" class="site_title"><div class="image"> <span>Better Bound House</div></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
          <!--      <form id="uploadForm"  method="POST" enctype="multipart/form-data">
                  <div class="profile_pic">
                    <img id="image_preview" style="width: 150px; height: 150px; margin: 20px auto;" src="<?=(!empty($this->session->userdata['userlogin']['avatar']) ? base_url('images/'.$this->session->userdata["userlogin"]["avatar"].''): 'test') ; ?>"  alt="..." class="img-circle profile_img">
                  </div>
                     <div style="clear: both; margin: 128px 0px 0px 0px; text-align: center;">
                       <input type="file" id="uploadfile" name="file" style="margin:20px auto;" />
                       <button type="button" id="upload" class="btn btn-primary" >Upload</button>
                     </div>
                </form> -->
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=ucfirst($this->session->userdata['userlogin']['firstname']) .' '. ucfirst($this->session->userdata['userlogin']['lastname']);?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->

            <?php include 'sidebar_agent.php'; ?>

            <!-- /sidebar menu -->

        
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            
          </div>
        </div>

    
          <!-- /top tiles -->
  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>Personal Calendar
              <div style="float:right; ">
      </div>
  </div>
      <div class="container">
              <div class="form-check inline-block personal_timeline">
                <label class="form-check-label">
                  <div class="charlie_background"></div>
                  <input type="radio" class="form-check-input type"  value="Personal" checked name="type">Stats
                </label>
                <label class="form-check-label block">
                  <div class="call_log_background"></div>
                      <input type="checkbox" class="form-check-input status_event" checked  value="Call log" name="status_event">Call log
                   </label>
                   <label class="form-check-label block">
                     <div class="pipe_background"></div>
                      <input type="checkbox" class="form-check-input status_event" checked  value="Pipe" name="status_event">Pipe
                   </label>
              </div>

      </div>
        <div id="calendar"></div>
    </div>
      </div>
       <br />

    
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Horizons <a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>



         <!-- Edit User -->
         <div class="modal fade" id="editUserModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="editUserform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Your Profile</h2>
                        <p class="hint-text">Edit your account.</p>
                            <div class="form-group">
                              <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="username" placeholder="User Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="email" class="form-control" name="email_address" placeholder="Email Address" required="required">
                            </div>
                            <div class="form-group">
                              <input type="hidden" class="form-control" name="email_address_confirm" placeholder="Email Address" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="contact" placeholder="Contact Number" required="required">
                            </div>

                         <div class="form-group">
                            <select class="form-control usertype" name="usertype">
                                <option value="">Please Select An UserType</option>
                                <option value="Admin">Admin</option>
                                <option value="IT">IT</option>
                                <option value="Manager">Manager</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Finance">Finance</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Agent">Agent</option>
                              </select>
                           </div>

                        <div class="form-group">
                                <button type="button" id="update_account" class="btn btn-success btn-lg btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                  </div>
               </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
          </div>
      </div>

<!-- Password User -->
         <div class="modal fade" id="editUserPasswordModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="editUserPasswordform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Change Password</h2>
                        <p class="hint-text">Change your password.</p>
                            <div class="form-group">
                              <input type="password" class="form-control" name="current_password" placeholder="Enter your Current Password" required="required">
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" name="new_password" placeholder="Enter your New Password" required="required">
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" name="confirm_password" placeholder="Enter your Confirm your Password" required="required">
                            </div>
                        <div class="form-group">
                                <button type="button" id="change_password" class="btn btn-success btn-lg btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                  </div>
               </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
          </div>
      </div>

          <!-- Email History Modal -->
         <div class="modal fade" id="messageModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Email Form.</h2>
                        <p class="hint-text">Email History</p>
                            <label for="validationCustom05">Email Address</label>
                            <div class="form-group">
                              <input type="text" class="form-control" disabled name="email_address" placeholder="Enter the Email Address" required="required">
                            </div>
                            <label for="validationCustom05">Subject</label>
                            <div class="form-group">
                              <input type="text" class="form-control" disabled name="subject" placeholder="Please Enter the subject" required="required">
                            </div>
                             <label for="validationCustom05">Message</label>
                            <div class="form-group">
                                <textarea class="form-control message" disabled id="messagetxtEditor" name="message"></textarea>
                            </div>

                    </div>
                  </div>
               </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
          </div>
      </div>



    <!-- The Modal -->
      <div class="modal fade" id="persoanalcallendarModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Personal Calendar</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="addpersonalform" method="post">
            <!-- Modal body -->
            <div class="modal-body">
                 <div class="alert alert-success"><p></p></div>
                <div class="inline-block-calendar">
                <label for="validationCustom03">Date</label>
                  <div id="reportrangeevent" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                      <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                      <span></span> <b class="caret"></b>
                     </div><!-- DEnd ate Picker Input -->            
              </div>

              <div class="form-check inline-block-calendar">
                <label class="form-check-label">
                     <div class="reminder_background"></div>
                  <input type="radio" class="form-check-input" value="Reminder" name="status_event">Reminder
                </label>
              </div>
                <div class="form-check inline-block-calendar">
                <label class="form-check-label">
                    <div class="task_background"></div>
                  <input type="radio" class="form-check-input" value="Task" name="status_event">Task
                </label>
              </div>
               <div class="form-group">
                     <textarea class="form-control title" name="title" required></textarea>
                     <input type="hidden" class="form-control" readonly name="start">
                     <input type="hidden" class="form-control" readonly name="end">

               </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" id="add_personal_event" class="btn btn-success">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </form>

            
          </div>
        </div>
      </div>
     <script>var base_url = "<?php echo base_url(); ?>";</script>
    <!-- jQuery -->
    <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('datepicker/js/bootstrap-datepicker.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('bootstrap/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('bootstrap/vendors/nprogress/nprogress.js');?>"></script>
    <!-- Chart.js');?> -->
    <script src="<?php echo base_url('bootstrap/vendors/Chart.js/dist/Chart.min.js');?>"></script>
    <!-- gauge.js');?> -->
    <script src="<?php echo base_url('bootstrap/vendors/gauge.js/dist/gauge.min.js');?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js');?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('bootstrap/vendors/iCheck/icheck.min.js');?>"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url('bootstrap/vendors/skycons/skycons.js');?>"></script>
    <!-- Flot -->
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.pie.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.time.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.stack.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.resize.js');?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url('bootstrap/vendors/flot.orderbars/js/jquery.flot.orderBars.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/flot-spline/js/jquery.flot.spline.min.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/flot.curvedlines/curvedLines.js');?>"></script>
    <script src="<?php echo base_url(); ?>datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>datatables/dataTables.bootstrap4.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url('bootstrap/vendors/DateJS/build/date.js');?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/dist/jquery.vmap.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/dist/maps/jquery.vmap.world.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js');?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('bootstrap/vendors/moment/min/moment.min.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>


    <!-- Custom Theme Scripts -->
    >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    <script src="<?php echo base_url('js/croppie.js');?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>
     <script src="<?php echo base_url('js/validatecalendar.js');?>"></script>

<script>
$(document).ready(function(){
        var calendar = $('#calendar').fullCalendar({
            editable:false,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            eventColor: 'rgb(94, 91, 80)',
           eventRender: function(event, element) {
                if(event.type == "Personal" && event.status_event == 'Call log'){
                    element.css('background-color', '#b39318')
                }
                else if(event.type == "Personal" && event.status_event == 'Pipe'){
                    element.css('background-color', '#222d48');
                } 

            },
            dayRender: function (date, cell) {
               var d =  new Date(date);
               var today = new Date("2021-01-07");
               var end = new Date();
                // end.setDate(today.getDate()+7);
                if (d.getDate() === today.getDate()) {
                       var dateString = moment(today).format('D');
                        $("#calendar  .fc-day-number").filter(function() { 
                            return $(this).text() === dateString;
                            }).css('background-color', '#4d2222');
                }

                // if(date > today && date <= end) {
                //     cell.css("background-color", "yellow");
                // }
          },
            events:"<?php echo base_url(); ?>dashboard/load_personal_calendar_stats_agent",
            selectable:true,
            selectHelper:true,
            // select:function(start, end, allDay)
            // { 

            //   $("#persoanalcallendarModal").modal({ show: true });

            //     // var title = prompt("Gwapo Ka Sir?");
            //     // if(title)
            //     // {
            //         var start = $.fullCalendar.formatDate(start, 'MMMM D, YYYY h:mm A');
            //         var end = $.fullCalendar.formatDate(end, 'MMMM D, YYYY h:mm A');
            //         $('#reportrangeevent span').html(start + ' - ' + end);
            //         $("#addpersonalform input[name='start']").val(start);
            //         $("#addpersonalform input[name='end']").val(end);

            //         $('#reportrangeevent').daterangepicker({
            //           startDate:  start,
            //           endDate:  end,
            //           timePicker: true,
            //           locale: {
            //             format: 'MMMM D, YYYY h:mm A'
            //           },
            //           ranges: {
            //              'Today': [moment(), moment()],
            //              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            //              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            //              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            //              'This Month': [moment().startOf('month'), moment().endOf('month')],
            //              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            //           }
            //       }, cb);

                      
            // },
            editable:false,
         });
      

    });
      
                    

    function cb(start, end) {
        $('#reportrangeevent span').html(start.format('MMMM D, YYYY  h:mm A') + ' - ' + end.format('MMMM D, YYYY YYYY h:mm A'));
        $("#addpersonalform input[name='start']").val(start.format('MMMM D, YYYY  h:mm A'));
        $("#addpersonalform input[name='end']").val(end.format('MMMM D, YYYY  h:mm A'));
    }

        $('.type').change(function() {

           var get_type = $(this).val();
           $('#calendar').fullCalendar('removeEventSources');

          $('.personal_timeline input[type=checkbox][value="Call log"]').prop('checked', true);
          $('.personal_timeline input[type=checkbox][value="Pipe"]').prop('checked', true);

          $('.personal_user input[type=checkbox]').prop('checked', true);


           var get_event = new Array();
            $(".personal_timeline  input[name='status_event']:checked").each(function() {
                get_event.push($(this).val());
            });

            var get_user = new Array();
            $(".personal_user  input[name='user_id']:checked").each(function() {  
                get_user.push($(this).val());
            });

              // dataEdit = 'type='+get_type+'&status_event='+ $('.company_timeline .status_event:checked').val();
          var start_source1 = {
                type:'GET',
                data: {type:get_type, status_event:get_event, user_id:get_user},
                url: base_url +'dashboard/view_status_event/',
           }
           $('#calendar').fullCalendar('addEventSource', start_source1);

        
    });
    $('.personal_timeline .status_event,  .personal_user .check_user').change(function() {
        // $("#calendar").fullCalendar("refetchEvents", filter_status_event);

         $('#calendar').fullCalendar('removeEventSources');

           var get_event = new Array();
            $(".personal_timeline  input[name='status_event']:checked").each(function() {
                get_event.push($(this).val());
            }); 
           var get_user = new Array();
            $(".personal_user  input[name='user_id']:checked").each(function() {  
                get_user.push($(this).val());
            });

           var start_source1 = {
                type:'GET',
                data: {type:$("input[name='type']:checked").val(), status_event:get_event, user_id:"<?=$this->session->userdata['userlogin']['user_id'];?>"},
                url: base_url +'dashboard/view_status_event/'
           }
           $('#calendar').fullCalendar('addEventSource', start_source1);
    });



   // function filter(calEvent) {
   //    var vals = ['quarterly', 'Event'];
   //    $('input:checkbox.calFilter:checked').each(function() {
   //      vals.push($(this).val());
   //    });
   //    return vals.indexOf(calEvent.status_event) !== -1;
   //  }   


// $("#filter2").change(function () {
//     $("#calendar").fullCalendar("removeEvents", filter2);
// });

// function filter(event) {
//     return $("#filter > option:selected").attr("id") === event.id;
// }

  $(".nav-toggle-leads").click(function(){
    $(".slideup-leads").slideDown();
    $(".slideup-calendar").slideUp();
    $(".slideup-hrresource").slideUp();
    $(".slideup-finance").slideUp();
    $(".slideup-production").slideUp();
    $(".slideup-transaction").slideUp();
    $(".slideup-attendance").slideUp();
  });
  $(".nav-toggle-calendar").click(function(){
    $(".slideup-leads").slideUp();
    $(".slideup-calendar").slideDown();
    $(".slideup-hrresource").slideUp();
    $(".slideup-finance").slideUp();
    $(".slideup-production").slideUp();
    $(".slideup-transaction").slideUp();
    $(".slideup-attendance").slideUp();
  });
   $(".nav-toggle-performance").click(function(){
    $(".slideup-leads").slideUp();
    $(".slideup-calendar").slideUp();
    $(".slideup-attendance").slideDown();
    $(".slideup-finance").slideUp();
    $(".slideup-production").slideUp();
    $(".slideup-transaction").slideUp();
  });
   $(".nav-toggle-finance").click(function(){
    $(".slideup-leads").slideUp();
    $(".slideup-calendar").slideUp();
    $(".slideup-hrresource").slideUp();
    $(".slideup-finance").slideDown();
    $(".slideup-production").slideUp();
    $(".slideup-transaction").slideUp();
  });
   $(".nav-toggle-production").click(function(){
    $(".slideup-leads").slideDown();
    $(".slideup-calendar").slideDown();
    $(".slideup-hrresource").slideDown();
    $(".slideup-finance").slideDown();
    $(".slideup-production").slideUp();
    $(".slideup-transaction").slideDown();
  });
   $(".nav-toggle-transaction").click(function(){
    $(".slideup-leads").slideUp();
    $(".slideup-calendar").slideUp();
    $(".slideup-hrresource").slideUp();
    $(".slideup-finance").slideUp();
    $(".slideup-production").slideUp();
    $(".slideup-transaction").slideDown();
  });
   


             
</script>
  </body>
</html>
