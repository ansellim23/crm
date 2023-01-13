<!DOCTYPE html>
<?php date_default_timezone_set('Asia/Manila');?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="icon" href="images/Horizons-favicons-1.png" type="image/ico" />-->
 <link rel="shortcut icon" href="images/Horizons-favicons-1.png" type="image/x-icon" />
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

    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #approvalhistorymodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -445px;}
    #payleadmodal .modal-content{ width: 320% !important; margin-left: -510px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}
       #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}
       #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}

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
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            
          </div>
        </div>

              <!-- Performance tracker tiles -->
        <div class="card mb-3">
         
          <div class="card-header">
         
            <i class="fa fa-eye"></i>PERFORMANCE TRACKER
            
          <span style="float: right;" data-toggle="tooltip" data-placement="bottom" title="**** POINTING SYSTEM ****  30% commission deduction monthly if reaches 2.5 points (late: 0.5, absent: 1, overbreak/overlunch: 0.5, fail to logout: 0.5)">Pointers:0.5</span>

         
          </div>

          <div class="card-body">
         

              <div class="content-wrapper">
                <div class="row">
                  <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">

           <div class="col-sm-3 inline-block">
                <label for="validationCustom03">Agent Name</label>
                  <form id="performance_task_form">
                      <select class="form-control user_id"  id="user_id" name="user_id">
                       <option selected value="">Select an Agent</option>
                         <?php 
                             if ($all_agents > 0){
                                  foreach ($all_agents as $agent){
                                   echo "<option value='".$agent['user_id']."'>".$agent['firstname']. ' ' .$agent['lastname']. ' - ' .$agent['usertype'] ."</option>";
                               }
                            } 
                          ?>
                      </select>
                    </form>
                 </div>

                        <h4 class="card-title"></h4>
                        <table class="table">
                          <tr class="table-light">
                            <td>Time in : <span class="time_in"><?=$attendance_user['time_in'] != NULL ?  date('h:i:s a', strtotime($attendance_user['time_in'])) : "00:00:00";?></span></td>
                            <td>Call logs: <span class="current_call_logs"><?=$current_call_logs;?>/50</td>
                            <td>Pipes: <span class="current_pipes"><?=$current_pipes;?>/5</span></td>
                            <td>Current Qouta:$ <span class="current_qouta"><?=$current_quota['total_amount'] != NULL ? number_format(str_replace(",","",$current_quota['total_amount']),2,".",",") :  '0.00';?></span></td>
                          </tr>
                          <tr class="table-light">
                            <td>Over Break : <span class="excess_break"><?=$attendance_user['excess_break'] != NULL ?  $attendance_user['excess_break'] : "00:00:00";?></span></td>

                            <td>Prev. Call logs: <span class="prev_call_logs"><?=$prev_call_logs;?>/50</span></td>
                            <td>Prev. Pipes: <span class="prev_pipes"><?=$prev_pipes;?>/5</span></td>
                            <td>Last Calendar Qouta:$ <span class="prev_qouta"><?=$prev_quota['total_amount'] != NULL ? number_format(str_replace(",","",$prev_quota['total_amount']),2,".",",") :  '0.00';?></span></td>
                          </tr>
                          <tr class="table-light">
                            <td>Over Lunch : <span class="excess_lunch"><?=$attendance_user['excess_lunch'] != NULL ?  $attendance_user['excess_lunch'] : "00:00:00";?></span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr class="table-light">
                            <td>Time out : <span class="time_out"><?=$attendance_user['time_out'] != NULL ?  date('h:i:s a', strtotime($attendance_user['time_out'])) : "00:00:00";?></span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
<!--                   <div class="col-lg-3 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <canvas id="lineChart" height="200"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <canvas id="bar-chart-grouped" height="200"></canvas>
                      </div>
                    </div>
                  </div> -->
                </div>            
              </div>

        </div>

      </div>
 <!-- End of Performance tracker tiles -->
          <!-- /top tiles -->
<!--   <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>List of Leads
              <div style="float:right; ">

            <div style="display:inline-block">
               <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addleadmodal" data-backdrop="static" data-keyboard="false">ADD LEAD</button>
            </div>   
      </div>
  </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataTablefixed" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Project ID</th>
                  <th>Package Name</th>
                  <th style="width:45px;!important">Author Name</th>
                  <th>Book Title</th>
                  <th style="width:200px;!important;">Email Address</th>
                  <th>Contact #</th>
                  <th>Area Code</th>
                  <th>Price</th>
                  <th>Lead Type</th>
                  <th>Contract Status</th>
                  <th>Date Create</th>
                  <th>Update</th>
                  <th>Collection</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $get_count_payment =0;
                  $replace_comma = "";
                  if ($leads > 0){
                       foreach ($leads as $lead){
                         $file_name = $lead['file_name'] == '' ? 'Manual Added' :$lead['file_name'];
                         echo "<tr>";
                               echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 
                               echo "<td>".$lead['product_name']."</td>";
                               echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['author_name']."</td>";
                               echo "<td>".$lead['book_title']."</td>";
                               echo "<td>".$lead['email_address']."</td>";
                               echo "<td>".$lead['contact_number']."</td>";
                               echo "<td>".$lead['area_code']."</td>";
                               echo "<td>$ ".number_format(str_replace(",","",$lead['price']),2,".",",")."</td>";
                               echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead  ['date_create'])).  "</td>";
                               echo "<td>".$lead['contractual_status']."</td>";
                               echo "<td>".date("d/m/Y", strtotime($lead  ['date_create']))."</td>";
                               echo "<td><button type='button' class='btn btn-danger view_update_leaddetail' data-toggle='modal' data-target='#updateleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='".$lead['project_id']."'>Edit</button></td>";                             
                                if($lead['status'] == 'In Progress'){
                                  echo "<td><button type='button' style='color:#ffffff !important;' class='btn btn-warning view_pay_leaddetail' data-toggle='modal' data-target='#payleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='".$lead['project_id']."'>Collect</button></td>";
                                }
                                else{
                                 echo "<td><button type='button' class='btn btn-success'>Collect</button></td>";

                                }

                          echo "</tr>";
                     }
                  }  
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div> -->
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

                  <!-- The Add Lead Modal -->
                    <div class="modal fade" id="addleadmodal">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Add Lead</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- Modal body -->
                          <div class="modal-body">
                           <form class="needs-validation"  id="lead_form" novalidate>
                              <div class="alert alert-success"><p></p></div>
                              <div class="form-row">
                                <div class="col mb-3">
                                  <label for="validationCustom02">Package Name</label>
                                  <input type="text" class="form-control" style="height:50px;"  name="product_name" placeholder="Package Name" required>
                                </div>
                                <div class="col mb-3">
                                  <label for="validationCustomUsername">Author Name</label>
                                   <input type="text" class="form-control" style="height:50px;"  name="author_name" placeholder="Author Name" aria-describedby="inputGroupPrepend" required>
                                </div>
                                <div class="col mb-3">
                                   <label for="validationCustomUsername">Book Title</label>
                                    <input type="text" class="form-control" style="height:50px;"  name="title_name"  placeholder="Title Name" aria-describedby="inputGroupPrepend" required>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="col mb-3">
                                  <label for="validationCustom03">Status</label>
                                        <select class="form-control status" name="status" style="height:50px;">
                                          <option value="">Please Select a Tag</option>
                                          <option value="In Progress">In Progress</option>
                                          <option value="Assigned Low">Assigned Low</option>
                                          <option value="Assigned Mid">Assigned Mid</option>
                                          <option value="Assigned High">Assigned High</option>
                                          <option value="Recycled">Recycled</option>
                                          <option value="Dead">Dead</option>
                                        </select>
                                   </div>
                                   <div class="col mb-3">
                                      <label for="validationCustom05">Installment Term</label>
                                       <select class="form-control installment_term" name="installment_term" style="height:50px;" >
                                          <option value="">Please Select a Month</option>
                                          <option value="One Month">One Month</option>
                                          <option value="Two Months">Two Months</option>
                                          <option value="Three Months">Three Months</option>
                                          <option value="Four Months">Four Months</option>
                                          <option value="Five Months">Five Months</option>
                                          <option value="Six Months">Six Months</option>
                                        </select>                                   
                                   </div>
                                </div>
                                <div class="form-row">
                                  <div class="col mb-3">
                                      <label for="validationCustom05">Price</label>
                                      <input type="text" class="form-control" style="height:50px;" name="amount_paid"  placeholder="Price" required>
                                   </div>
                                   <div class="col mb-3">
                                      <label for="validationCustom03">Email Address</label>
                                    <input type="text" class="form-control" style="height:50px;"  name="email_address" placeholder="Email Address" required><a  class ="email_address" href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true" style="position: absolute;top: 25px; right: 6px; font-size:4em;"></i></a>
                                </div>
                                </div>
                                 <div class="form-row">
                                <div class="col mb-3">
                                  <label for="validationCustom04">Contact Number</label>
                                   <input type="text" id="contact_number" class="form-control" style="height:50px;"  name="contact_number" placeholder="Contact Number" required><a  class ="contact_number" href="#"><i class="fa fa-phone fa-3x" style="position: absolute;top: 25px; right: 6px; font-size:4em;" aria-hidden="true"></i></a>
                                </div>
                                <div class="col mb-3">
                                  <label for="validationCustom04">Area Code</label>
                                   <input type="text" id="area_code" class="form-control" style="height:50px;"  name="area_code" placeholder="Area Code" required>
                                </div>
                                </div>
                                 <div class="form-row">
                                <div class="col mb-3">
                                         <label for="validationCustom05">Address </label>
                                        <textarea class="form-control address" rows="3"  name="address"></textarea>
                                  </div>
                                  <div class="col mb-3">
                                         <label for="validationCustom05">Remark</label>
                                        <textarea class="form-control remark" rows="3"  name="remark"></textarea>
                                  </div>
                              </div>

                              <button class="btn btn-primary" id="add_lead" type="button">Save</button>
                            </form>
                          </div>
                          
                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                          
                        </div>
                      </div>
                    </div>
      <!-- end of add lead modal -->
  


      <!-- The Update Lead Modal -->
        <div class="modal fade" id="updateleadmodal">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Update Lead </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
               <form class="needs-validation"  id="update_lead_form" novalidate>
                  <div class="alert alert-success"><p></p></div>
                  <div class="form-row">
                      <div class="col mb-3">
                        <label for="validationCustom02">Package Name</label>
                        <input type="text" class="form-control" style="height:50px;"  name="product_name" placeholder="Package Name" required>
                      </div>
                      <div class="col mb-3">
                        <label for="validationCustomUsername">Author Name</label>
                         <input type="text" class="form-control" style="height:50px;"  name="author_name" placeholder="Author Name" aria-describedby="inputGroupPrepend" required>
                      </div>
                      <div class="col mb-3">
                         <label for="validationCustomUsername">Book Title</label>
                          <input type="text" class="form-control" style="height:50px;"  name="title_name"  placeholder="Title Name" aria-describedby="inputGroupPrepend" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col mb-3">
                        <label for="validationCustom03">Status</label>
                              <select class="form-control status" name="status" style="height:50px;">
                                <option value="">Please Select a Tag</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Assigned Low">Assigned Low</option>
                                <option value="Assigned Mid">Assigned Mid</option>
                               <option value="Assigned High">Assigned High</option>
                                <option value="Recycled">Recycled</option>
                                <option value="Dead">Dead</option>
                              </select>
                             <input type="hidden" class="form-control" style="height:50px;"  name="project_id"  placeholder="Title Name" aria-describedby="inputGroupPrepend" required>
                         </div>
                         <div class="col mb-3">
                            <label for="validationCustom05">Installment Term</label>
                             <select class="form-control installment_term" name="installment_term" style="height:50px;" >
                                <option value="">Please Select a Month</option>
                                <option value="One Month">One Month</option>
                                <option value="Two Months">Two Months</option>
                                <option value="Three Months">Three Months</option>
                                <option value="Four Months">Four Months</option>
                                <option value="Five Months">Five Months</option>
                                <option value="Six Months">Six Months</option>
                              </select>                                   
                         </div>
                      </div>
                      <div class="form-row">
                        <div class="col mb-3">
                            <label for="validationCustom05">Price</label>
                            <input type="text" class="form-control" style="height:50px;" name="amount_paid"  placeholder="Price" required>
                         </div>
                         <div class="col mb-3">
                            <label for="validationCustom03">Email Address</label>
                          <input type="text" class="form-control" style="height:50px;"  name="email_address" placeholder="Email Address" required><a  class ="email_address" href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true" style="position: absolute;top: 25px; right: 6px; font-size:4em;"></i></a>
                      </div>
                      </div>
                       <div class="form-row">
                      <div class="col mb-3">
                        <label for="validationCustom04">Contact Number</label>
                         <input type="text" id="contact_number" class="form-control" style="height:50px;"  name="contact_number" placeholder="Contact Number" required><a  class ="contact_number" href="#"><i class="fa fa-phone fa-3x" style="position: absolute;top: 25px; right: 6px; font-size:4em;" aria-hidden="true"></i></a>
                      </div>
                      <div class="col mb-3">
                        <label for="validationCustom04">Area Code</label>
                         <input type="text" id="area_code" class="form-control" style="height:50px;"  name="area_code" placeholder="Area Code" required>
                      </div>
                      </div>
                       <div class="form-row">
                      <div class="col mb-3">
                               <label for="validationCustom05">Address </label>
                              <textarea class="form-control address" rows="3"  name="address"></textarea>
                        </div>
                        <div class="col mb-3">
                               <label for="validationCustom05">Remark</label>
                              <textarea class="form-control remark" rows="3"  name="remark"></textarea>
                        </div>
                    </div>
                  <button class="btn btn-success" id="update_lead" type="button">Update</button>
                </form>
              </div>
    
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              
            </div>
          </div>
        </div>s
      <!-- end of upste lead modal -->
    
    <!-- The Pay Lead Modal -->
          <div class="modal fade" id="payleadmodal">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Collection Lead</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                 <form class="needs-validation"  id="pay_lead_form" novalidate>
                    <div class="alert alert-success"><p></p></div>
                    <div class="form-row">
                      <div class="col mb-3">
                        <label for="validationCustom02">Package Name</label>
                        <input type="text" readonly class="form-control" style="height:50px;"  name="product_name" placeholder="Package Name" required>
                      </div>
                      <div class="col mb-3">
                        <label for="validationCustomUsername">Author Name</label>
                         <input type="text" readonly class="form-control" style="height:50px;"  name="author_name" placeholder="Author Name" aria-describedby="inputGroupPrepend" required>
                      </div>
                      <div class="col mb-3">
                        <label for="validationCustomUsername">Book Title</label>
                         <input type="text" readonly class="form-control" style="height:50px;"  name="title_name"  placeholder="Title Name" aria-describedby="inputGroupPrepend" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col mb-3">
                        <label for="validationCustom03">Collection Payment</label>
                              <select class="form-control status" name="status"   style="height:50px;">
                                
                               <!--  <option value="Refund Payment">Refund Payment</option> -->
                            </select>
                         </div>
                      <div class="col mb-3">
                        <label for="validationCustom03">Email Address</label>
                        <input type="text" readonly class="form-control" style="height:50px;"  name="email_address" placeholder="Email Address" required><a  class ="email_address" href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true" style="position: absolute;top: 25px; right: 6px; font-size:4em;"></i></a>
                      </div>
                      <div class="col mb-3">
                        <label for="validationCustom04">Contact Number</label>
                        <input type="text" readonly class="form-control" style="height:50px;"  name="contact_number" placeholder="Contact Number" required><i class="fa fa-phone fa-3x" style="position: absolute;top: 25px; right: 6px; font-size:4em;" aria-hidden="true"></i>
                      </div>

                        <div class="hide_amount_paid">
                            <div class="col mb-3">
                               <label for="validationCustom05">Price</label>
                               <input type="text" readonly class="form-control" style="height:50px;" name="amount_paid"  placeholder="Price" required>
                             </div>
                       </div>
                       </div>
                       <div class="hide_initialpayment">
                      <div class="form-row">
                       <div class="col mb-3">
                          <label for="validationCustom05" class="change_status">Initial Payment</label>
                         <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" style="height:50px;" id="initial_payment" value="0.00" name="initial_payment" placeholder="Initial Payment" required>
                       </div>
                      <div class="col mb-3">
                        <label for="validationCustom05">Collection Date</label>
                         <div class="form-group mb-4" style="margin-bottom:-30px !important;">
                                <div class="datepicker date input-group p-0 shadow-sm">
                                    <input type="text" placeholder="Choose a date" name="collection_date" class="form-control py-4 px-4 reservationDate">
                                    <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span></div>
                                </div>
                            </div>
                      </div>

                               <input type="hidden" placeholder="Project Id" name="project_id" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="collection_id" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="status_payment" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="approved_status" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="previous_amount" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="previous_collect_status" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="payment_id" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="previous_collect_date" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="get_previous_balance" value="" class="form-control py-4 px-4">
                        <div class="col mb-3">
                          <label for="validationCustom04">Remaining Balance <span id="get_balance"></span></label>
                          <input type="text" readonly class="form-control" name="remain_balance" style="height:50px;" value="Php 0.00" id="remain_balance" placeholder="Remaining Balance" required>
                        </div>

                      </div>
                      </div>
                      <div class="form-row">
                      <div class="col mb-3">
                               <label for="validationCustom05">Address </label>
                              <textarea class="form-control address" readonly rows="3"  name="address"></textarea>
                        </div>
                        <div class="col mb-3">
                               <label for="validationCustom05">Remark</label>
                              <textarea class="form-control remark" rows="3"  name="remark"></textarea>
                        </div>
                    </div>

                    <button class="btn btn-danger" id="pay_lead" type="button">Collect</button>
                    <button class="btn btn-success" id="update_pay_lead" type="button">Update</button>
                    <button class="btn btn-secondary view_approval_history" id="view_approval_history" data-project_id='' data-toggle='modal' data-target='#approvalhistorymodal' data-backdrop='static' data-keyboard='false'  type="button">View Approval Payment History</button>
<!--                     <button class="btn btn-secondary view_confirmpayment_history" id="view_payment_history" data-project_id='' data-toggle='modal' data-target='#approvalhistorymodal' data-backdrop='static' data-keyboard='false'  type="button">View Payment History</button>
 -->                  </form>
                </div>
                 <div class="card-body">
                    <div class="table-responsive display_table">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Amount Paid</th>
                            <th>Colllection Date</th>
                            <th>Collection Status</th>
                            <th>Approval Status and Date</th>
                            <th>Payment Status and Date</th>
                            <th>User Charge</th>
                            <th>User Type</th>
                            <th>Remark</th>
                            <th>Approval</th>
                            <th>Remark</th>
                          </tr>
                        </thead>
                        <tbody class="view_all_lead">
                       </table>
                    </div>
                    <div id ="display_balance" style="float: right; margin-right: 100px;font-size: 16px;"><b><span>REMAINING BALANCE:</span> <p id="balance" style="display:inline-block;"><p></b></div>
                  </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
                </div>
                
              </div>
            </div>
          </div>
      <!-- end of upste lead modal -->
              <!-- The Approval payment -->
                <div class="modal fade" id="viewlead_approval_modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Approval Payment</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            <form id="update_approval_lead_form">
                               <div class="alert alert-success"><p></p></div>
                                 <div class="col mb-3">
                                       <label for="validationCustom05">Approval Status</label>
                                       <select class="form-control approval_status" name="approval_status" style="height:50px;" >
                                          <option value="">Please Select a Approval Status</option>
                                          <option value="Approved">Approved</option>
                                          <option value="Declined">Declined</option>
                                        </select>

                                 </div>
                                  <div class="col mb-3">
                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="payment_id"  placeholder="Price" required>
                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>
                                      <button class="btn btn-warning" id="update_approval" type="button">Save</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                   </div>
                            </form>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Approval modal -->

              <!-- The Author Payment -->
                <div class="modal fade" id="viewlead_payment_modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Process Payment</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            <form id="update_payment_lead_form">
                               <div class="alert alert-success"><p></p></div>
                                 <div class="col mb-3">
                                       <label for="validationCustom05">Payment Status</label>
                                       <select class="form-control payment_status" name="payment_status" style="height:50px;" >
                                          <option value="">Please Select a Payment Status</option>
                                          <option value="Pending">Pending</option>
                                          <option value="Paid">Paid</option>
                                          <option value="Refunded">Refunded</option>
                                          <option value="Cancelled">Cancelled</option>
                                        </select>

                                 </div>
                                  <div class="col mb-3">
                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="payment_id"  placeholder="Price" required>
                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>
                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="get_previous_balance"  placeholder="Price" required>
                                      <button class="btn btn-warning" id="update_lead_payment" type="button">Save</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                   </div>
                            </form>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Author Payment modal -->

              <!-- The Contractual Author -->
                <div class="modal fade" id="viewlead_contractual_modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Author Contract</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            <form id="update_contract_lead_form">
                               <div class="alert alert-success"><p></p></div>
                                 <div class="col mb-3">
                                       <label for="validationCustom05">Contract Status</label>
                                       <select class="form-control contract_status" name="contract_status" style="height:50px;" >
                                          <option value="">Please Select a Contract Status</option>
                                          <option value="Pending">Pending Contract</option>
                                          <option value="Endorsed">Endorsement Contract</option>
                                          <option value="Cancelled">Cancelled Contract</option>
                                        </select>

                                 </div>
                                  <div class="col mb-3">
                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>
                                      <button class="btn btn-warning" id="update_lead_contract" type="button">Save</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                   </div>
                            </form>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Author Payment modal -->

                    <!-- The Contractual Author -->
                <div class="modal fade" id="viewlead_contractualinvestment_modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Author Contract Investment</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            <form id="update_contractinnvestment_lead_form">
                               <div class="alert alert-success"><p></p></div>
                                 <div class="col mb-3">
                                       <label for="validationCustom05">Contract Investment</label>
                                       <select class="form-control contract_investment" name="contract_investment" style="height:50px;" >
                                          <option value="">Please Select a Contract Investment Status</option>
                                          <option value="Pending - Investment not received/Contract not signed">Pending - Investment not received/Contract not signed</option>
                                          <option value="Pending - Investment not received/Contract signed">Pending - Investment not received/Contract signed</option>
                                          <option value="Pending - Investment received/Contract not signed">Pending - Investment received/Contract not signed</option>
                                          <option value="Refunded">Refunded</option>
                                          <option value="Sold">Solds</option>
                                        </select>

                                 </div>
                                  <div class="col mb-3">
                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>
                                      <button class="btn btn-warning" id="update_lead_contractinvestment" type="button">Save</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                   </div>
                            </form>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Author Payment modal -->

            <!-- The payment  Remark-->
                <div class="modal fade" id="viewlead_paymentremark_modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">View Remark</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                               <div class="alert alert-success"><p></p></div>
                                 <div class="col mb-3">
                                       <label for="validationCustom05">Remark</label>
                                         <textarea class="form-control remark"  disabled rows="3"  name="remark"></textarea>

                                 </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->
   <!-- The History Approval-->
                <div class="modal fade" id="approvalhistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Approval Payment History</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Project ID</th>
                                            <th>Package Name</th>
                                            <th>Author Name</th>
                                            <th>Book Title</th>
                                            <th>Email Address</th>
                                            <th>Contact #</th>
                                            <th>Area Code</th>
                                            <th>Price</th>
                                            <th>Approval Status and Date</th>
                                            <th>User Charge</th>
                                            <th>User Type</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewapproval_payment">
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
                                <button type="button" id="change_password_mgr" class="btn btn-success btn-lg btn-block">Update</button>
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


    <!-- The History Leas  Remark-->
                <div class="modal fade" id="viewleadhistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Your Lead History </h4> 
                           <a  class="btn btn-success btn-block viewleadremark_history" style="width: 220px; margin-left:50px; color:#ffffff;" data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name="">Lead Communications</a>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="historyleadtable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Project ID</th>
                                            <th>Package Name</th>
                                            <th>Author Name</th>
                                            <th>Book Title</th>
                                            <th>Email Address</th>
                                            <th>Contact #</th>
                                            <th>Lead Type</th>
                                            <th>Status and Date</th>
                                            
                                          </tr>
                                        </thead>
                                        <tbody class="viewleadhistory">

                                        </tbody>
                                      </table>
                              </div>
                                <form id="leadremarkform">
                                  <div class="col mb-1 w-50 p-3 align-middle" style="margin:0px auto;">
                                        <div class="alert alert-success"><p></p></div>
                                        <input type="hidden" readonly class="form-control" name="project_id" placeholder="Project ID" required="required">
                                        <input type="hidden" readonly class="form-control" name="author_name" placeholder="Author Name" required="required">
                                        <label for="validationCustom05">Add Remark</label>
                                        <textarea class="form-control remark" rows="4" name="remark"></textarea>
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
                <div class="modal fade" id="viewleadremarkhistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Remark History </h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="historyleadtable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>From User</th>
                                            <th>User Type</th>
                                            <th>Remark</th>
                                            <th>Date Remark</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewleadremarkhistory">

                                        </tbody>
                                      </table>
                              </div>
                            </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->


     <script>
     var base_url = "<?php echo base_url(); ?>";

     var userlogin = "<?=isset($this->session->userdata['userlogin']) ? 1: 0 ;?>"
     var user_type = "<?=$this->session->userdata['userlogin']['usertype'];?>";
     </script>

     </script>
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

    <script src="<?php echo base_url('js/charts/Chart.min.js');?>"></script>

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

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('bootstrap/build/js/custom.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/croppie.js');?>"></script>
    <script src="<?php echo base_url('js/jquery.idle.js');?>"></script>
    <script src="<?php echo base_url('js/html2canvas.min.js');?>"></script>


     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>

 <script>  
 
 $('#leaddataTable').DataTable();


$(function () {

    // INITIALIZE DATEPICKER PLUGIN
    var dateToday = new Date(); 
    $('#lead_form .datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy",
        startDate: dateToday,
    }).datepicker("setDate", dateToday);
    
})

function setindex_prefix(index_assigned)
    {
            switch(index_assigned.length)
            {
                case 1:
                    var new_index_assigned = "000"+  index_assigned;
                    break;
                case 2:
                    var new_index_assigned = "00"+  index_assigned;
                break;
                case 3:
                    var new_index_assigned = "0"+  index_assigned;
                    break;
                default:
                    var new_index_assigned =  index_assigned;
            }
            
          return "PROJ"+ new_index_assigned;
    }

    $('#leaddataTableagents').DataTable( {
        "pageLength": 100,
        "scrollY": 500,
        "scrollX": true,
        "autoWidth": false,
        columnDefs: [
            { width: '10%', targets: 2,
              width: '15%', targets: 3
            }

        ],
         fixedColumns: true
     }) ;    

        let stats_label = <?php $stats_label = array("Call logs", "Pipes", "Qouta"); echo json_encode($stats_label); ?>;
        var  test = <?php echo json_encode($over_all_quota); ?>;
    //Line Chart
    new Chart(document.getElementById("lineChart"), {
      type: 'line',
      data: {
        labels: ['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov', 'Dec'],
        datasets: [{ 
            data: [0,0,0,0,0,0,0,0,0],
            label:  new Date().getFullYear(),
            borderColor: "#3e95cd",
            fill: false
          }, { 
            data: [0,0,0,0,0,0,0,0,0,0,0,0],
            label: new Date().getFullYear() - 1,
            borderColor: "#FFA500",
            fill: false
          }
        ]
      },
      options: {
      title: {
        display: true,
        text: 'Sales Performance'
        }
      }
    });


    // Grouped chart
    var call_log = <?=$current_call_logs;?>;
    var current_pipe = <?=$current_pipes;?>;
    var current_qouta = <?=$current_quota['total_amount'] != NULL ? number_format(str_replace(",","",$current_quota['total_amount']),2,".",",") :  '0.00';?>;


    new Chart(document.getElementById("bar-chart-grouped"), {
        type: 'bar',
        data: {
          labels: stats_label,
          datasets: [
            {
              label: "Qouta",
              backgroundColor: "#3e95cd",
              data: [50,5,4]
            }, {
              label: "Current",
              backgroundColor: "#FFA500",
              data: [call_log,current_pipe,current_qouta]
            }
          ]
        },
        options: {
          title: {
            display: true,
            text: 'Your Stats'
          }
        }
    });    

</script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>



  </body>
</html>