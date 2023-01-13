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
    <link href="<?php echo base_url('datepicker/css/bootstrap-datepicker.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}
    .input-group-append {margin-left: -1px;height: 43px !important;}
    #viewattendance_historymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}0
    .inline-block{ display: inline-block;}
    /* preloader */
    #loader_8 {border: 12px solid #f3f3f3; border-radius: 50%; border-top: 12px solid #444444; width: 70px; height: 70px; animation: spin 1s linear infinite;}
    @keyframes spin {100% {transform: rotate(360deg);}}
    .center_8 {position: absolute; top: 0; bottom: 0; left: 0; right: 0; margin: auto;}
    #loader_9 {border: 12px solid #f3f3f3; border-radius: 50%; border-top: 12px solid #444444; width: 70px; height: 70px; animation: spin 1s linear infinite;}
    @keyframes spin {100% {transform: rotate(360deg);}}
    .center_9 {position: absolute; top: 0; bottom: 0; left: 0; right: 0; margin: auto;}

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
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Team Leads Bucket <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url("dashboard/dashboard")?>">Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/sold_leads")?>">Sold Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/contract")?>">For Contract Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/collection_lead")?>">For Collection Leads</a></li>
                    </ul>
                  <!--<?php if ($this->session->userdata['userlogin']['usertype'] == 'Admin'): ?>-->
                  <!--  <li><a href="<?php echo site_url("account/users")?>"><i class="fa fa-users"></i> Users</a></li>-->
                  <!--<?php endif; ?>-->
                    <!--<li><a href="<?php echo site_url("dashboard/email")?>"><i class="fa fa-envelope"></i> Email Authors</a></li>-->
                    <!--<li><a href="<?php echo site_url("dashboard/signature")?>"><i class="fa fa-file"></i>Add Signature</a></li>-->
                    <li><a href="<?php echo site_url("account/assign_user")?>"><i class="fa fa-users"></i> Assign to Agent</a></li>
                  </li>
                  <!--<li><a href="<?php echo site_url("dashboard/collection_payment")?>"><i class="fa fa-dollar"></i>Create New Sale</a></li>-->
                   <li><a><i class="fa fa-list"></i> Current Transactions Guide <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu">
                         
                    <li><a href="<?php echo site_url("dashboard/collection_payment")?>">Leads Transaction</a></li>
                    
                     <li><a href="<?php echo site_url("dashboard/email")?>">Email Authors</a></li>
                      <li><a href="<?php echo site_url("dashboard/signature")?>">Add Signature</a></li>
                       </ul>
                  <li><a><i class="fa fa-fire"></i> Performance Task <span class="fa fa-chevron-down"></span></0>
                     <ul class="nav child_menu">    
                       <li><a href="<?php echo site_url("dashboard/attendance")?>"><i class="fa fa-clock-o"></i> Attendance</a> </li>
                       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Quota</a></li>
                       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Quota</a></li>
                       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Pipeline</a></li>
                       <li><a href="<?php echo site_url("dashboard/call_log_history")?>">Call Logs</a></li>
                       

                    </ul>

                  </li>
                  <li><a><i class="fa fa-book"></i> Production Department <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                      <li><a href="<?php echo site_url("dashboard/report")?>"> Production Manual </a></li>
                      <li><a href="<?php echo site_url("dashboard/cover_designer")?>"> Cover Designer Report </a></li>
                      <li><a href="<?php echo site_url("dashboard/interior_designer")?>"> Interior Designer Report </a></li>
                      <li><a href="<?php echo site_url("dashboard/project")?>">Projects</a></li>

                      
                      </li>

                </ul>
                <li><a><i class="fa fa-dollar"></i> Finance Department <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 
                     
                     <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Individual Quota</a></li>

                  </li>

                </ul>
                <li><a><i class="fa fa-users"></i> Human Resource Department <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu">
                         <li><a href="<?php echo site_url("dashboard/schedule_attendance")?>">Individual Attendance Sheet</a></li>
                       <li><a href="<?php echo site_url("dashboard/call_log_history")?>">Individual Call Logs</a></li>
                       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Individual Pipes</a></li>


                    </ul>

                  </li>
                  
                   <li><a><i class="fa fa-calendar"></i> Calendar of Activities <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Personal Calendar</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Team Calendar</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Company Calendar</a></li>

                  </li>

                </ul>
                <!--   <li><a><i class="fa fa-history"></i> History Leads <span class="fa fa-chevron-down"></span></a>-->
                <!--     <ul class="nav child_menu">    -->
                <!--       <li><a href="<?php echo site_url("dashboard/lead_history")?>">Leads</a></li>-->
                <!--       <li><a href="<?php echo site_url("dashboard/collection_history")?>">Collection Payment Leads</a></li>-->
                <!--       <li><a href="<?php echo site_url("dashboard/contract_history")?>">Contract Author</a></li>-->
                <!--       <li><a href="<?php echo site_url("dashboard/contract_author_approval_history")?>">Contract Approval Author</a></li>-->
                <!--       <li><a href="<?php echo site_url("dashboard/author_report_history")?>">Report Author Relation</a></li>-->
                <!--       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Email Users</a></li>-->
                <!--    </ul>-->
                <!--      <li><a href="<?php echo site_url("dashboard/report")?>"><i class="fa fa-file"></i> Report </a>-->
                <!--  </li>-->
                <!--</ul>-->
             </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=site_url('account/logout');?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <?=ucfirst($this->session->userdata['userlogin']['firstname']) .' '. ucfirst($this->session->userdata['userlogin']['lastname']);?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item view_accountprofile" aria-hidden="true" data-toggle="modal" data-target="#editUserModal" data-backdrop="static" data-keyboard="false" data-userid=<?=ucfirst($this->session->userdata['userlogin']['user_id']);?>> Profile</a>
                    <a class="dropdown-item view_account_password" aria-hidden="true" data-toggle="modal" data-target="#editUserPasswordModal" data-backdrop="static" data-keyboard="false" data-userid=<?=ucfirst($this->session->userdata['userlogin']['user_id']);?>> Change Password</a>
                    <a class="dropdown-item"  href="<?=site_url('account/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
      <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">


             <div class="col-md-12 col-sm-4  tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Hours Worked</span>
                  <div class="count total_hours_work">0.00</div>
              </div>

          </div>
        </div>

         <div class="row" style="display: inline-block; margin:0px 125px" >
          <div class="tile_count">


             <div class="col-md-12 col-sm-4  tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Points</span>
                  <div class="count total_points">0.00</div>
              </div>
              
          </div>
        </div>  

        <div class="row" style="display: inline-block; font-size: 15px; font-weight: bold;" >
             <div class="col-md-12 col-sm-4  tile_stats_count">
                **** POINTING SYSTEM ****  30% commission deduction monthly if reaches 2.5 points (late: 0.5, absent: 1, overbreak/overlunch: 0.5, fail to logout: 0.5)
            </div>
         </div>  

          <!-- /top tiles -->
          <form id="attendance_agent_form">
            <div class="col-sm-3 inline-block">
            <label for="validationCustom03">Date</label>
              <div id="reportrange" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                  <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                  <span></span> <b class="caret"></b>
                 </div><!-- DEnd ate Picker Input -->            
          </div>
           <div class="col-sm-3 inline-block">
                <label for="validationCustom03">Agent Name</label>
                      <select class="form-control year" name="user_type">
                       <option selected value="">Please Select an Agent Name</option>
                         <?php 
                             if ($all_agents > 0){
                                  foreach ($all_agents as $attendance_user){
                                   echo "<option value='".$attendance_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype']."'>".$attendance_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype'] ."</option>";
                               }
                            } 
                          ?>
                      </select>
                 </div>
               </form>

          <br>  
  <div class="card mb-3">
         <div class="card-header">
            <i class="fa fa-table"></i>List of User Time Logs
           <!--  <div style="float:right; "> 
                 <div style="display:inline-block">
                   <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-clock-o" aria-hidden="true" data-toggle="modal" data-target="#dutytimemodal" data-backdrop="static" data-keyboard="false">Add Schedule</button>
                 </div>   
             </div> -->
         </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="attendancedataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Date Log</th>
                  <th>Employee Name</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Lunch Start</th>
                  <th>Lunch End</th>
                  <th>Break In</th>
                  <th>Break Out</th>
                  <th>Excess Lunch Break</th>
                  <th>Excess Break</th>
                  <th class="hour_works">Hours Worked</th>
                  <th class="point_works">Points</th>
                  <th>Remark</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
              <?php
                       $get_duty_log = '';
                       $get_attendance_id = 0;
                       $get_firstname = '';
                       $get_lastname = '';
                       $get_usertype = '';
                       $get_point_absents = 0;
                       $lacking_hour_points = 0.0;
                  if ($attendance_users > 0){
                       $get_notconsume_hour = 1;
                       $get_notconsume_hour_mins = 1.30;
                       $get_notconsume_mins = 30;
                       $get_excess_lunch= 0;
                       $get_excess_break= 0; 
                       $get_total_of_excess = 0;
                       $get_total_of_work = 0;
                      foreach ($attendance_users as $attendance_user){
                          $start_time_in = date('H:i:s', strtotime("-15 minutes", strtotime($attendance_user['time_in_start'])));

                          $current_date =  date('Y/m/d H:i:s');



                         $get_duty_log = date('Y/m/d', strtotime($attendance_user['duty_log']));
                         $get_firstname = $attendance_user['firstname'];
                         $get_lastname =  $attendance_user['lastname'];
                         $get_usertype =  $attendance_user['usertype'];
                         $get_total_of_excess = modules::run("dashboard/CalculateTime",$attendance_user['excess_lunch'], $attendance_user['excess_break']);
                         $total_lunch_start = $attendance_user['total_lunch_start'];
                         $total_lunch_end =  $attendance_user['total_lunch_end'];
                         $total_break_in = $attendance_user['total_break_in'];
                         $total_break_out =  $attendance_user['total_break_out'];
                         $total_out = $attendance_user['total_out'] > 8 ? "8.00" : (float)$attendance_user['total_out'];

                         $get_excess_work = new DateTime($get_total_of_excess) ;

                         if($attendance_user['time_in'] == NULL  &&  $attendance_user['time_out'] == NULL  &&  $attendance_user['break_in'] == NULL  &&  $attendance_user['break_out'] == NULL  &&  $attendance_user['lunch_start'] == NULL  &&  $attendance_user['lunch_end'] == NULL){
                                $get_total_of_work = 0.0;
                                $get_point_absents = 1; 

                         }
                        elseif($attendance_user['time_in'] != NULL  &&  $attendance_user['time_out'] == NULL  &&  $attendance_user['break_in'] == NULL  &&  $attendance_user['break_out'] == NULL  &&  $attendance_user['lunch_start'] == NULL  &&  $attendance_user['lunch_end'] == NULL){
                                $get_total_of_work = 0.0;
                                $get_point_absents = 0; 

                         }
                        elseif($attendance_user['time_in'] != NULL  && $attendance_user['time_out'] != NULL){
                                $get_total_of_work = (float)$total_out - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                        elseif($attendance_user['time_in'] != NULL  && $attendance_user['time_out'] == NULL && $attendance_user['break_out'] != NULL){
                                $get_total_of_work = (float)$total_break_out - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                         elseif($attendance_user['time_in'] != NULL  && $attendance_user['break_out'] == NULL && $attendance_user['break_in'] != NULL){
                                $get_total_of_work = (float)$total_break_in - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                         elseif($attendance_user['time_in'] != NULL  &&  $attendance_user['break_in'] == NULL && $attendance_user['lunch_end'] != NULL){
                                $get_total_of_work = (float)$total_lunch_end - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                        elseif($attendance_user['time_in'] != NULL  &&  $attendance_user['lunch_end'] == NULL && $attendance_user['lunch_start'] != NULL){
                                $get_total_of_work = (float)$total_lunch_start - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                        if($attendance_user['time_in'] != NULL && $attendance_user['time_out'] == NULL && date("Y-m-d 21:45:00", strtotime($attendance_user['duty_log'])) >= date("Y-m-d H:i:s")){
                              $lacking_hour_points = 0.5;
                         }
                         elseif(date('H:i:s', strtotime($attendance_user['time_out'])) < "07:00:00"  && $attendance_user['time_out'] != NULL &&  $attendance_user['time_in'] != NULL  &&  $attendance_user['approve_status'] == "Declined"){
                              $lacking_hour_points = 0.5;
                         }
                         else{
                              $lacking_hour_points = 0.0;
                         }

                               echo "<tr>";
                               echo "<td>".date('Y/m/d', strtotime($attendance_user['duty_log']))."</td>";
                               echo "<td><a href='#' class='view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$attendance_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype']."</td>";
                               if($attendance_user['time_in'] == NULL){
                                   echo "<td></td>";

                               }
                               elseif(date('H:i:s', strtotime($attendance_user['time_in'])) < date('H:i:s', strtotime($attendance_user['time_in_start'])) && date('Y/m/d', strtotime($attendance_user['time_in'])) == date('Y/m/d', strtotime($attendance_user['duty_log']))){
                                   echo  "<td>".date('h:i:s a', strtotime($attendance_user['time_in']))."</td>"; 

                               }
                               else{
                                   echo  $attendance_user['late_minutes'] !=  '00:00' ? "<td>".date('h:i:s a', strtotime($attendance_user['time_in']))." - Late</td>" : "<td>".date('h:i:s a', strtotime($attendance_user['time_in']))."</td>"; 

                               }
                               if($attendance_user['time_in'] == NULL && $attendance_user['time_out'] == NULL){
                                   echo "<td></td>";

                               }
                               elseif(date('H:i:s', strtotime($attendance_user['time_out'])) < date('H:i:s', strtotime($attendance_user['time_out_start'])) && $attendance_user['time_out'] != NULL &&  $attendance_user['approve_status'] == "Declined"){
                                   echo  "<td>".date('h:i:s a', strtotime($attendance_user['time_out']))." - Early Out</td>"; 

                               }
                               elseif($attendance_user['time_in'] != NULL && $attendance_user['time_out'] == NULL){
                                   echo  "<td>Not Yet</td>"; 
 
                               }
                               elseif($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL){
                                   echo  "<td>".date('h:i:s a', strtotime($attendance_user['time_out']))."</td>"; 
 
                               }
                               else{
                                   echo "<td></td>";
                               }

                               if($attendance_user['lunch_start'] == NULL){
                                   echo "<td></td>";

                               }
                               else{
                                   echo "<td>".date('h:i:s a', strtotime($attendance_user['lunch_start']))."</td>";

                               }
                               if($attendance_user['lunch_end'] == NULL){
                                   echo "<td></td>";

                               }
                               else{
                                   echo  $attendance_user['excess_lunch'] !=  '00:00:00' ? "<td>".date('h:i:s a', strtotime($attendance_user['lunch_end']))." - Over Lunch</td>" : "<td>".date('h:i:s a', strtotime($attendance_user['lunch_end']))."</td>"; 

                               }
                               if($attendance_user['break_in'] == NULL){
                                   echo "<td></td>";

                               }
                               else{
                                 echo "<td>".date('h:i:s a', strtotime($attendance_user['break_in']))."</td>"; 

                               }

                               if($attendance_user['break_out'] == NULL){
                                   echo "<td></td>";

                               }
                               else{
                                  echo  $attendance_user['excess_break'] !=  '00:00:00' ? "<td>".date('h:i:s a', strtotime($attendance_user['break_out']))." - Over Break</td>" : "<td>".date('h:i:s a', strtotime($attendance_user['break_out']))."</td>"; 

                               }
                               echo "<td>".$attendance_user['excess_lunch']."</td>";
                               echo "<td>".$attendance_user['excess_break']."</td>";
                               echo "<td>".$get_total_of_work ."</td>";


                                if(date("Y-m-d H:i:s", strtotime('+'.$start_time_in.'', strtotime($attendance_user['duty_log']))) <= date("Y-m-d H:i:s") ){                                  
                                   echo "<td>".number_format($get_point_absents + $attendance_user['point_late'] + $lacking_hour_points + $attendance_user['excess_break_point'] + $attendance_user['excess_lunch_point'] , 1) ."</td>";                                  
                               }
                               else{                               
                                    echo "<td>0.0</td>";
                                  }
                                  echo !empty($attendance_user['remark_attendance']) ? "<td><a href='#' class='view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id'].">".substr($attendance_user['remark_attendance'], 0, 10)."..."."</a></td>" : "<td>"." "."</td>";      

                             //  echo "<td>".$attendance_user['remark_attendance']."</td>";
                             // echo "<td><button class='btn btn-primary view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id']."</button>Add/View</td>";                              
                                if ($attendance_user['usertype'] == 'Agent'){
                                     echo "<td><button type='button' class='btn btn-danger view_employee_attendance_detail' data-toggle='modal' data-target='#updateattendancemodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>Edit</button></td>";                             
                                }
                                else{
                                   echo "<td><button type='button' class='btn btn-success'>Edit</button></td>";                             
                                }

                          echo "</tr>";
                     }
                  }  
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

       <div class="col-sm-3" style="float: none !important;">
            <label for="validationCustom03">Date</label>
              <div id="reportrangeidle" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                  <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                  <span></span> <b class="caret"></b>
                 </div><!-- DEnd ate Picker Input -->            
          </div>

      <div class="card mb-3">
         <div class="card-header">
            <i class="fa fa-table"></i>Your Idle Log
            <div style="float:right; "> 
                 <div style="display:inline-block">
                 </div>   
             </div>
         </div>
          <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="idledataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Employee Name</th>
                  <th>Date Idle</th>
                  <th>Time Idle</th>
                </tr>
              </thead>
              <tbody >
              <?php
                  if ($idle_users > 0){
                       foreach ($idle_users as $idle_user){
    
                           echo "<tr>";
                                  echo "<td><a href='#' class='view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$idle_user['user_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$idle_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype']."</td>";
                               echo "<td>".date("Y/m/d",strtotime($idle_user['date_idle']))."</td>";
                               echo "<td>".date("H:i:s a",strtotime($idle_user['idle_time']))."</td>";

                          echo "</tr>";
                     }
                  }  
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

          <br />

          <div class="row">

              </div>
          </div>
        </div>
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


              <!-- The payment  Remark-->
                <div class="modal fade" id="dutytimemodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Employee Attendance</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                              <form id="attendance_form">
                               <div class="alert alert-success"><p></p></div>
                                 <div class="col mb-3">
                                    <label for="validationCustom05">Schedule Date</label>
                                     <div class="form-group mb-4">
                                           <input class="form-control" id="datepicker" name="duty_log"/>
                                        </div>
                                  </div>
                                 <div class="col mb-3">
                                    <label for="validationCustom05">Please Select the Employee's for Schedule Duty</label>
                                    <?php foreach ($all_users as $row):?>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input check_user" name="user_id[]" value="<?php echo $row['user_id']; ?>"><b><?php echo $row['firstname'] .' '.$row['lastname'] .' - ' .$row['usertype']; ?></b>
                                          </label>
                                        </div>
                                       <?php endforeach; ?>
                                       <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input " name="check_all" id="check_all" value="all"><b>All</b>
                                          </label>
                                        </div>
                                   </div>
                                  <div class="modal-footer">
                                      <button class="btn btn-primary" id="add_attendance" type="button">Add</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                          </div>
                          
                          </form>
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

             <!-- Update Attendance-->
                <div class="modal fade" id="updateattendancemodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Edit Employee Time Log Attendance</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            <form id="update_employee_attendance_form">
                               <div class="alert alert-success"><p></p></div>
                                <div class="form-group">
                                   <select class="form-control duty" name="status_log">
                                      <option value="">Please Select Status Log</option>
                                      <option value="Time In">Time In</option>
                                      <option value="Break In">Break In</option>
                                      <option value="Break Out">Break Out</option>
                                      <option value="Lunch Start">Lunch Start</option>
                                      <option value="Lunch End">Lunch End</option>
                                     <option value="Time Out">Time Out</option>
                                    </select>
                                 </div>
                                <div class="form-group">
                                      <input type="text" class="form-control" id="timepicker" name="duty_time"/>
                                      <input type="hidden" class="form-control" id="attendance_id" readonly name="attendance_id"/>
                                 </div>
                               <!--   <div class="col mb-3">
                                       <label for="validationCustom05">Remark</label>
                                       <textarea class="form-control remark"  rows="3"  name="remark"></textarea>
                                 </div> -->
                                 <div id="loader_9" class="center_9"></div>
                                  <div class="modal-footer">
                                      <button class="btn btn-primary" id="update_employee_attendance" type="button">Update</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                          </div>
                        </form>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

             <!-- The History Leas  Remark-->
                <div class="modal fade" id="viewattendance_historymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Attendance Concerns </h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="attendance_remarkDataTable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>From User</th>
                                            <th>User Type</th>
                                            <th>Remark</th>
                                            <th>Date Remark</th>
                                            
                                          </tr>
                                        </thead>
                                        <tbody class="view_attendance_detail">

                                        </tbody>
                                      </table>
                              </div>
                                <form id="attendance_remarkform">
                                  <div class="col mb-1 w-50 p-3 align-middle" style="margin:0px auto;">
                                        <div class="alert alert-success"><p></p></div>
                                        <input type="hidden" readonly class="form-control" name="attendance_id" placeholder="Attendance ID" required="required">
                                        <input type="hidden" readonly class="form-control" name="author_name" placeholder="Author Name" required="required">
                                        <label for="validationCustom05">Add Remark</label>
                                        <textarea class="form-control remark" rows="4" name="remark"></textarea>
                                        <div id="loader_8" class="center_8"></div>
                                          <div class="form-group" style='margin-top:10px;'>
                                            <button type="button" id="add_remark" class="btn btn-success btn-lg btn-block">Save</button>
                                          </div>
                                    </div>
                                </form> 
                            </div>
                               <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

     <script>var base_url = "<?php echo base_url(); ?>";</script>
    <!-- jQuery -->
    <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
    <script scr="<?php echo base_url('bootstrap/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js');?>"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('bootstrap/build/js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('js/croppie.js');?>"></script>


     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>
     <script src="<?php echo base_url('js/validateattendance.js');?>"></script>

 <script>  
 


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

var  attendancetable = $('#attendancedataTable').DataTable({
       columnDefs: [ {
              targets: 11,
              render: function ( data, type, row ) {
                      return type === 'display' && data.length > 10 ?
                          data.substr( 0, 10 ) +'…' :
                          data;
                  }
          } ],
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
    } );
$('#attendance_agent_form [name="user_type"]').on('change', function () {
       attendancetable.columns(1).search($(this).val()).draw() ;

});

function CalculateAttendance_TableSummary(attendancetable) {
    try {

        var intVal = function (i) {
            return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
        };

       var api = attendancetable.api();

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


        $('.tile_stats_count .total_points').text(sum_point.toLocaleString("en")+'.00');
      });
  }
  catch (e) {
        console.log('Error in CalculateAttendance_TableSummary');
        console.log(e)
    }
}

var idletable =  $('#idledataTable').DataTable({"order": [[ 1, "desc" ]]});

  $(function () {
   var start = moment().startOf('month');
    var end = moment().endOf('month');

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
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


  $('#reportrange').on('apply.daterangepicker', function(ev, picker) {

   var start = picker.startDate.format('YYYY/MM/DD');
   var end = picker.endDate.format('YYYY/MM/DD');

  

  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date(start);
      var max = new Date(end);
      var startDate = new Date(data[0]);
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
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

  $(function () {

   var start = moment().subtract(29, 'days');
    var end = moment();

    console.log(start);

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
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
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
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
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



</script>
 <!-- preloader -->
 <script>
        $(window).on('load', function() {
          $("#loader_8").css("display", "none"); 
          $("#loader_9").css("display", "none");         
      });
   </script>
  </body>
</html>
