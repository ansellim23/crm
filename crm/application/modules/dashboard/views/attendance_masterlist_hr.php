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
    <link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />




    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}
    .input-group-append {margin-left: -1px;height: 43px !important;}
    #viewattendance_historymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}
    #viewattendancefile_historymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}
    .inline-block{ display: inline-block;}

    /* preloader */
    #loader_12 {border: 12px solid #f3f3f3; border-radius: 50%; border-top: 12px solid #444444; width: 70px; height: 70px; animation: spin 1s linear infinite;}
    @keyframes spin {100% {transform: rotate(360deg);}}
    .center_12 {position: absolute; top: 0; bottom: 0; left: 0; right: 0; margin: auto;}
    #loader_13 {border: 12px solid #f3f3f3; border-radius: 50%; border-top: 12px solid #444444; width: 70px; height: 70px; animation: spin 1s linear infinite;}
    @keyframes spin {100% {transform: rotate(360deg);}}
    .center_13 {position: absolute; top: 0; bottom: 0; left: 0; right: 0; margin: auto;}



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
                <li><a><i class="fa fa-fire"></i> Performance Task <span class="fa fa-chevron-down"></span></0>
                   <ul class="nav child_menu">
                     <li><a href="<?php echo site_url("dashboard/attendance")?>"><i class="fa fa-clock-o"></i> Attendance</a> </li>                  
                   </ul>
                </li>
                <li><a><i class="fa fa-users"></i> Human Resource Department <span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child_menu">
                     <li><a href="<?php echo site_url("dashboard/schedule_attendance")?>">Individual Attendance Sheet</a></li>
                     <li><a href="<?php echo site_url("dashboard/call_log_history")?>">Individual Call Logs</a></li>
                     <li><a href="<?php echo site_url("dashboard/SubmittedFormsall")?>">Submitted Forms</a></li>  
                   </ul>
                </li>
                <li><a><i class="fa fa fa-wpforms"></i>Forms<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu"> 
                        <li><a href="<?php echo site_url("dashboard/leaveForm")?>">Leave Request Form</a></li>
                        <li><a href="<?php echo site_url("dashboard/officialBusinessLeaveForm")?>">OBL Request Form</a></li>
                        <li><a href="<?php echo site_url("dashboard/undertimeForm")?>">Undertime Request Form</a></li>
                      </ul>
                </li>
                <li><a href="<?php echo site_url("dashboard/SubmittedForms")?>"><i class="fa fa-paper-plane"></i>Submitted Form</a></li>
              </ul>
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

                  <a href="javascript:;" class="dropdown-toggle info-number number_of_notification" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">

                    <i class="fa fa-envelope-o"></i>

                    <span class="badge bg-green count_notification"><?=$count_notifications == 0 ? '': $count_notifications;?></span>

                  </a>

                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                     <?php if($notifications > 0):?>
                         <?php foreach($notifications as $notification):?>
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  <span>
                                    <span><?=$notification['from_user'];?></span>
                                    <span class="time"><?=modules::run("dashboard/time_ago",$notification['date_notify']);?></span>
                                  </span>
                                  <span class="message">
                                     <?=$notification['message'];?>
                                  </span>
                                </a>
                            </li>
                       <?php endforeach;?>
                    <?php endif;?>

                   <?php if($notifications > 0):?>
                           <li class="nav-item">
                              <div class="text-center">
                                <a class="dropdown-item">
                                  <strong>See All Alerts</strong>
                                  <i class="fa fa-angle-right"></i>
                                </a>
                              </div>
                          </li>
                    <?php endif;?>

     
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
                <label for="validationCustom03">Employee Name</label>
                      <select class="form-control year" name="user_type">
                       <option selected value="0">Please Select an Agent's</option>
                         <?php 
                             if ($all_agents_and_managers > 0){
                                  foreach ($all_agents_and_managers as $attendance_user){
                                   echo "<option value='".$attendance_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype']."'>".$attendance_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype'] ."</option>";
                               }
                            } 
                          ?>
                      </select>
                          <input type="hidden" class="form-control" name="from_date" placeholder="from_date" required="required">
                          <input type="hidden" class="form-control" name="to_date" placeholder="to_date" required="required">

                 </div>
               </form>

          <br>  
  <div class="card mb-3">
         <div class="card-header">
            <i class="fa fa-table"></i>List of User Time Logs
          <!--   <div style="float:right; "> 
                 <div style="display:inline-block">
                   <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-clock-o" aria-hidden="true" data-toggle="modal" data-target="#dutytimemodal" data-backdrop="static" data-keyboard="false">Add Schedule</button>
               </div>   
             </div> -->
         </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="attendancesubdataTable" width="100%" cellspacing="0">
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
                  <th>Action</th>
                  <th>No. of Files</th>
                  <th style="display:none;"></th>
                  <th style="display:none;">Remark</th>
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
                               // echo "<td><button class='btn btn-primary view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id']."</button>Add/View</td>";
                               echo "<td><button type='button' class='btn btn-danger view_employee_attendance_detail' data-toggle='modal' data-target='#updateattendancemodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>Edit</button></td>";   
                               if(date('H:i:s', strtotime($attendance_user['time_out'])) < "07:00:00" && $attendance_user['time_out'] != NULL && $attendance_user['approve_status'] == NULL ){
                                   echo "<td><button type='button' class='btn btn-primary view_employee_attendance_detail' data-toggle='modal' data-target='#updateapprovemodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>Edit</button></td>";   
                               }
                                elseif($attendance_user['approve_status'] != NULL ){
                                   echo "<td><button type='button' class='btn btn-success'>".$attendance_user['approve_status']."</button></td>";   
                               }
                               else{  
                                   echo "<td><button type='button' class='btn btn-success'>Edit</button><button type='button' class='btn btn-success  view_attendancefile_history' data-toggle='modal' data-target='#viewattendancefile_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>View Files</button></td>";   
                               }
                                echo "<td>".modules::run("dashboard/file_attendance",$attendance_user['attendance_id'])."</td>"; 
                                echo "<td style='display:none;'>".$attendance_user['attendance_id']."</td>"; 
                                echo "<td style='display:none;'>".$attendance_user['remark_attendance']."</td>"; 



                          echo "</tr>";

                     }

                  }  
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row" style="display: inline-block;">
          <div class="tile_count">
             <div class="col-md-12 col-sm-4  tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Hours Worked</span>
                  <div class="count total_hours_IT_work">0.00</div>
              </div>

          </div>
        </div>

          <form id="attendance_IT_form">
            <div class="col-sm-3 inline-block">
            <label for="validationCustom03">Date</label>
              <div id="reportrangeIT" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                  <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                  <span></span> <b class="caret"></b>
                 </div><!-- DEnd ate Picker Input -->            
          </div>
           <div class="col-sm-3 inline-block">
                <label for="validationCustom03">Employee Name</label>
                      <select class="form-control year" name="user_type">
                       <option selected value="0">Please Select an Employee</option>
                         <?php 
                             if ($all_IT > 0){
                                  foreach ($all_IT as $attendance_user){
                                   echo "<option value='".$attendance_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype']."'>".$attendance_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype'] ."</option>";
                               }
                            } 
                          ?>
                      </select>
                           <input type="hidden" class="form-control" name="from_date" placeholder="from_date" required="required">
                          <input type="hidden" class="form-control" name="to_date" placeholder="to_date" required="required">
                 </div>
               </form>

          <br>  

          <div class="card mb-3">
         <div class="card-header">
            <i class="fa fa-table"></i>List of IT User Time Logs
  <!--           <div style="float:right; "> 
                 <div style="display:inline-block">
                   <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-clock-o" aria-hidden="true" data-toggle="modal" data-target="#dutytimemodal" data-backdrop="static" data-keyboard="false">Add Schedule</button>
               </div>   
             </div> -->
         </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="attendancesub_IT_dataTable" width="100%" cellspacing="0">
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
                  <th class="hour_IT_works">Hours Worked</th>
                  <th>Remark</th>
                  <th>Edit</th>
                  <th>Action</th>
                  <th>No. of Files</th>
                  <th style="display:none;"></th>
                  <th style="display:none;">Remark</th>
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
                  if ($attendance_users_IT > 0){
                       $get_notconsume_hour = 1;
                       $get_notconsume_hour_mins = 1.30;
                       $get_notconsume_mins = 30;
                       $get_excess_lunch= 0;
                       $get_excess_break= 0; 
                       $get_total_of_excess = 0;
                       $get_total_of_work = 0;
                       foreach ($attendance_users_IT as $attendance_user){
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
                              else if($attendance_user['schedule_status'] == 'Flexible'){
                                   echo  "<td>".date('h:i:s a', strtotime($attendance_user['time_in']))."</td>"; 

                               }
                               else{
                                   echo  $attendance_user['late_minutes'] !=  '00:00' ? "<td>".date('h:i:s a', strtotime($attendance_user['time_in']))." - Late</td>" : "<td>".date('h:i:s a', strtotime($attendance_user['time_in']))."</td>"; 

                               }
                               if($attendance_user['time_in'] == NULL && $attendance_user['time_out'] == NULL){
                                   echo "<td></td>";

                               }
                               elseif(date('H:i:s', strtotime($attendance_user['time_out'])) < date('H:i:s', strtotime($attendance_user['time_out_start'])) && $attendance_user['time_out'] != NULL){
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

                                   echo !empty($attendance_user['remark_attendance']) ? "<td><a href='#' class='view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id'].">".substr($attendance_user['remark_attendance'], 0, 10)."..."."</a></td>" : "<td>"." "."</td>";      

                               // echo "<td><button class='btn btn-primary view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id']."</button>Add/View</td>";
                               echo "<td><button type='button' class='btn btn-danger view_employee_attendance_detail' data-toggle='modal' data-target='#updateattendancemodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>Edit</button></td>";   
                               // if(date('H:i:s', strtotime($attendance_user['time_out'])) < "06:00:00" && $attendance_user['time_out'] != NULL && $attendance_user['approve_status'] == NULL ){
                               //     echo "<td><button type='button' class='btn btn-primary view_employee_attendance_detail' data-toggle='modal' data-target='#updateapprovemodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>Edit</button></td>";   
                               // }
                               //  elseif($attendance_user['approve_status'] != NULL ){
                               //     echo "<td><button type='button' class='btn btn-success'>".$attendance_user['approve_status']."</button></td>";   
                               // }
                               // else{  
                               //     echo "<td><button type='button' class='btn btn-success'>Edit</button><button type='button' class='btn btn-success  view_attendancefile_history' data-toggle='modal' data-target='#viewattendancefile_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>View Files</button></td>";   
                               // }

                               echo "<td><button type='button' class='btn btn-success  view_attendancefile_history' data-toggle='modal' data-target='#viewattendancefile_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>View Files</button></td>";   
                              echo "<td>".modules::run("dashboard/file_attendance",$attendance_user['attendance_id'])."</td>"; 
                              echo "<td style='display:none;'>".$attendance_user['attendance_id']."</td>"; 
                              echo "<td style='display:none;'>".$attendance_user['remark_attendance']."</td>"; 


                          echo "</tr>";
                     }
                  }  
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

<!--        <div class="col-sm-3" style="float: none !important;">
            <label for="validationCustom03">Date</label>
              <div id="reportrangeidle" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                  <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                  <span></span> <b class="caret"></b>
                 </div><!-- DEnd ate Picker Input -->            
         <!--  </div> -->
<!-- 
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
 -->
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
                                 <div id="loader_13" class="center_13"></div>
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


                         <!-- Update Attendance-->
                <div class="modal fade" id="updateapprovemodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Employee Approve Early Out</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            <form id="update_status_form">
                               <div class="alert alert-success"><p></p></div>
                                <div class="form-group">
                                   <select class="form-control approve_status" name="approve_status">
                                      <option value="">Please Select Status</option>
                                      <option value="Approved">Approve</option>
                                      <option value="Declined">Declined</option>
                                    </select>
                                 </div>
                                <div class="form-group">
                                      <input type="hidden" class="form-control" id="attendance_id" readonly name="attendance_id"/>
                                 </div>
                               <!--   <div class="col mb-3">
                                       <label for="validationCustom05">Remark</label>
                                       <textarea class="form-control remark"  rows="3"  name="remark"></textarea>
                                 </div> -->
                                  <div class="modal-footer">
                                      <button class="btn btn-primary" id="update_status" type="button">Update</button>
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
                                        <div id="loader_12" class="center_12"></div>
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

                             <!-- The History Leas  Remark-->
                <div class="modal fade" id="viewattendancefile_historymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Attendance Files </h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="attendance_fileDataTable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>From User</th>
                                            <th>File Name</th>
                                            <th>Date Uploaded</th>
                                            <th>Download Files</th>
                                            
                                          </tr>
                                        </thead>
                                        <tbody class="view_attendancefile_detail">

                                        </tbody>
                                      </table>
                              </div>
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

        <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>  
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>  
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>  

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

var  attendancetable = $('#attendancesubdataTable').DataTable({
     dom: 'Bfrtip',
        buttons: [
            {
                  extend: 'copyHtml5',
                   title: 'Attendance',
                   filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,17]
                  }
              },
               {
                extend: 'csvHtml5',
                   title: 'Attendance',
                   filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 17]
                  }
              },
              {
                  extend: 'excelHtml5',
                   title: 'Attendance',
                   filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,17]
                  }
              },
              {
                  extend: 'pdfHtml5',
                   title: 'Attendance',
                   filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,17]
                  }
              },
                {
                  extend: 'print',
                   title: 'Attendance',
                   filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,17]
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

var  attendancetable_IT = $('#attendancesub_IT_dataTable').DataTable({
   dom: 'Bfrtip',
        buttons: [
            {
                   extend: 'copyHtml5',
                   title: 'Attendance',
                   filename: 'Attendance',
                   exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,16]
                  }
              },
               {
                  extend: 'csvHtml5',
                  title: 'Attendance',
                  filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,16]
                  }
              },
              {
                  extend: 'excelHtml5',
                  title: 'Attendance',
                  filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,16]
                  }
              },
              {
                   extend: 'pdfHtml5',
                   title: 'Attendance',
                   filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,16]
                  }
              },
                {
                  extend: 'print',
                  title: 'Attendance',
                  filename: 'Attendance',
                  exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,16]
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

$('#attendance_agent_form [name="user_type"]').on('change', function () {
       attendancetable.columns(1).search($(this).val()).draw() ;

 $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date($('#attendance_agent_form [name="from_date"]').val());
      var max = new Date($('#attendance_agent_form [name="to_date"]').val());
      var startDate = new Date(data[0]);
      var agent_user = data[1];
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
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

})



$('#attendance_IT_form [name="user_type"]').on('change', function () {
       attendancetable_IT.columns(1).search($(this).val()).draw() ;

  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date($('#attendance_IT_form [name="from_date"]').val());
      var max = new Date($('#attendance_IT_form [name="to_date"]').val());
      var startDate = new Date(data[0]);
      var agent_user = data[1];
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
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

       var api = attendancetable.api();

            // Total over all pages
       api.columns(".hour_works").each(function (index) {
         var column = api.column(index,{page:'current'});

           var sum = column 
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

        $('.tile_stats_count .total_hours_work').text(sum.toFixed(2));
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

       var api = attendancetable.api();

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
  }
  catch (e) {
        console.log('Error in CalculateAttendance_TableSummary');
        console.log(e)
    }
}

var idletable =  $('#idledataTable').DataTable({"order": [[ 1, "desc" ]]});

  $(function () {
   var start = moment().subtract(29, 'days');
    var end = moment();

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
   $('#attendance_agent_form [name="user_type"]').prop('selectedIndex',0);

   var start = picker.startDate.format('YYYY/MM/DD');
   var end = picker.endDate.format('YYYY/MM/DD');

     $('#attendance_agent_form [name="from_date"]').val(start);
     $('#attendance_agent_form [name="to_date"]').val(end);

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
   $('#attendance_IT_form [name="user_type"]').prop('selectedIndex',0);

   var start = picker.startDate.format('YYYY/MM/DD');
   var end = picker.endDate.format('YYYY/MM/DD');

     $('#attendance_IT_form [name="from_date"]').val(start);
     $('#attendance_IT_form [name="to_date"]').val(end);

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


// First Date Of the month 
var startDateFrom =  moment().subtract(29, 'days');
// Last Date Of the Month 
var startDateTo = moment();
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
  attendancetable_IT.draw();
    $.fn.dataTable.ext.search.pop();

</script>
<script>
        $(window).on('load', function() {
          $("#loader_12").css("display", "none"); 
          $("#loader_13").css("display", "none"); 
      });
   </script>
  </body>
</html>
