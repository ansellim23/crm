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
                       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Quota</a></li>
                       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Pipeline</a></li>
                        <li><a href="<?php echo site_url("dashboard/call_log_history")?>">Call Logs</a></li>
                       

                    </ul>

                  </li>
                  <li><a><i class="fa fa-book"></i> Production Department <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                      <li><a href="<?php echo site_url("dashboard/report")?>"> Production Manual </a></li>
                      
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

            <!-- /sidebar menu -->

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
            
            <div class="col-md-12 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Call logs</span>
              <div class="count total_call_logs">0.00</div>
            </div>
          </div>
        </div>


          <form id="call_logs_form">
            <div class="col-sm-3 inline-block">
                <label for="validationCustom03">Date</label>
                  <div id="call_log_reportrange" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                      <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                      <span></span> <b class="caret"></b>
                      </div>           
              </div>
                   <div class="col-sm-3 inline-block">
                <label for="validationCustom03">Agent/Manager</label>
                     <select class="form-control agent-filter" name="user_type" id="agent">
                      <label for="validationCustom03">Agent/Manager></label>
                       <option selected value="">Please Select an Agent/Manager</option>
                           <?php 
                             if ($all_users > 0){

                                foreach ($all_users as $user){
                                   echo "<option value='".$user['extension_number']."'>".$user['firstname']. ' ' .$user['lastname']. ' - ' .$user['usertype'] ."</option>";
                               }
                            } 
                          ?>
                      </select>
                 </div>


                                                              
                      <h2 id="start" hidden="true">JavaScript can Change HTML</h2>
                      <h2 id="end" hidden="true">JavaScript can Change HTML</h2>
                          
                              
                           
                        
            </form>

      <br>

          <!-- /top tiles -->

  <div class="card mb-3">

          <div class="card-header">

            <i class="fa fa-table"></i>List of Agent Users

              <div style="float:right; ">

      </div>

  </div>




          <div class="card-body">

          <div class="table-responsive">

              <table class="table table-bordered" id="call_log_historytable" width="100%" cellspacing="0">

                    <thead>

                      <tr>

                        <th>Type</th>

                        <th>From</th>

                        <th>To</th>

                        <th>Ext</th>

                        <th>Area</th>

                        <th>Date</th>

                        <th>Time</th>

                        <th>Action</th>

                        <th>Result</th>

                        <th>Length</th>

                      </tr>

                    </thead>

                    <tbody class="test_table">

                      <?php 

                          if ($call_log_histories > 0){

                            $from_name = array();

                            $to_name = array();

                            $get_extension_number = '';

                            $get_type = array();

                             foreach ($call_log_histories as $call_log_history){

                              $from_name = !empty($call_log_history->from->name) ? $call_log_history->from->name: "";

                              $to_name = !empty($call_log_history->to->name)? $call_log_history->to->name: "";

                              $to_location= !empty($call_log_history->to->location)? $call_log_history->to->location: "";

                              $to_Phonenumber = !empty($call_log_history->to->phoneNumber)? modules::run("dashboard/formatPhoneNumber",($call_log_history->to->phoneNumber)): "";

                              $from_Phonenumber = !empty($call_log_history->from->phoneNumber)? modules::run("dashboard/formatPhoneNumber",($call_log_history->from->phoneNumber)): "";

                                

                              if($call_log_history->action == 'Incoming Fax'){

                                  $get_type = 'Incoming Fax';

                              }

                              else if($call_log_history->result == 'Missed'){

                                  $get_type = 'Missed Voice Call';

                              }

                              else{

                                  $get_type = $call_log_history->direction." Voice Call";

                              }

                              if($from_name == 'Collin Maxwell'){

                                  $get_extension_number = '101';

                              }

                             else if($from_name == 'Chris Davis'){

                                  $get_extension_number = '102';

                              }

                              else if($from_name == 'Alexander Montgomery'){

                                  $get_extension_number = '103';

                              }

                              else if($from_name == 'Lourie Sanchez'){

                                  $get_extension_number = '104';

                              }

                              else if($from_name == 'Jade Smith'){

                                  $get_extension_number = '105';

                              }

                              else if($from_name == 'Blake Williams'){

                                  $get_extension_number = '106';

                              }
                               else if($from_name == 'Amanda Martinez'){

                                  $get_extension_number = '107';

                              }

                              else if($from_name == 'Anna Mae Morgan'){

                                  $get_extension_number = '103';

                              }


                               echo "<tr>";

                                     echo "<td>".$get_type."</td>";

                                     echo "<td>".$from_Phonenumber."</td>";

                                     echo "<td>".$to_Phonenumber."</td>";

                                     echo "<td>".$get_extension_number."</td>";

                                     echo "<td>".$to_location."</td>";

                                     echo "<td >".date('Y-m-d', strtotime($call_log_history->startTime))."</td>"; //g:i A

                                     echo "<td >".date('g:i A', strtotime($call_log_history->startTime))."</td>"; //g:i A

                                     echo "<td>".$call_log_history->action."</td>";

                                     echo "<td>".$call_log_history->result."</td>";

                                     echo "<td>".gmdate("H:i:s", $call_log_history->duration)."</td>";
                                     

                                echo "</tr>";

                           }

                         }



                      ?>


                    </tbody>

                  </table>






<!-- <div class="panel-body">
                <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th></th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">
                            <td>Name</td>
                            <td>06/06/2017</td>
                            <td>6:31:43 PM</td>
                            <td>CDT</td>
                            <td>All Systems Normal</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>Name</td>
                            <td>06/05/2017</td>
                            <td>1:22:33 PM</td>
                            <td>CDT</td>
                            <td><font color="red"> LOW Voltage</font></td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>Name</td>
                            <td>06/04/2017</td>
                            <td>6:11:25 AM</td>
                            <td>CDT</td>
                            <td><font color="red">Main Power Failure</font></td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>Name</td>
                            <td>06/03/2017</td>
                            <td>5:31:43 PM</td>
                            <td>CDT</td>
                            <td><font color="red">Main Power Failure <br> LOW DC Voltage</font></td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>Name</td>
                            <td>06/02/2017</td>
                            <td>2:20:43 PM</td>
                            <td>CDT</td>
                            <td>All Systems Normal</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>Name</td>
                            <td>06/01/2017</td>
                            <td>3:50:21 AM</td>
                            <td>CDT</td>
                            <td><font color="red">Digital Input 1</font></td>
                        </tr>

                    </tbody>
                </table>
            </div> -->



                 </div>

                </div>

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

    <script src="<?php echo base_url('bootstrap/vendors/moment/min/moment.min.js');?>"></script>

    <script src="<?php echo base_url('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>D
    <script src="https://cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>D



    <!-- Custom Theme Scripts -->

    <script src="<?php echo base_url('bootstrap/build/js/custom.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>

    <script src="<?php echo base_url('js/croppie.js');?>"></script>


     <script src="<?php echo base_url('js/validateuser.js');?>"></script>

     <script src="<?php echo base_url('js/validatelead.js');?>"></script>

     <script src="<?php echo base_url('bootstrap/vendors/moment/moment-timezone-with-data.js');?>"></script>
<!--  <script type="text/javascript">


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
        function formatPhoneNumber(phoneNumber = '') {
          var phoneNumber = phoneNumber.replace('/[^0-9]/','');

          if(phoneNumber.length > 10) {
              var countryCode = phoneNumber.substr(0, phoneNumber.length-10);
              var areaCode = phoneNumber.substr(-10, 3);
              var nextThree = phoneNumber.substr(-7, 3);
              var lastFour = phoneNumber.substr(-4, 4);

              phoneNumber = '('+areaCode+') '+nextThree+'-'+lastFour;
          }
          else if(phoneNumber.length == 10) {
              var areaCode = phoneNumber.substr(0, 3);
              var nextThree = phoneNumber.substr(3, 3);
              var lastFour = phoneNumber.substr(6, 4);

              phoneNumber = '('+areaCode+') '+nextThree+'-'+lastFour;
          }
          else if(phoneNumber.length == 7) {
              var nextThree = phoneNumber.substr(0, 3);
              var lastFour = phoneNumber.substr(3, 4);

              phoneNumber = nextThree+'-'+lastFour;
          }

          return phoneNumber;
      }


      function convertHMS(value) {
          const sec = parseInt(value, 10); // convert value to number if it's string
          let hours   = Math.floor(sec / 3600); // get hours
          let minutes = Math.floor((sec - (hours * 3600)) / 60); // get minutes
          let seconds = sec - (hours * 3600) - (minutes * 60); //  get seconds
          // add 0 if value < 10; Example: 2 => 02
          if (hours   < 10) {hours   = "0"+hours;}
          if (minutes < 10) {minutes = "0"+minutes;}
          if (seconds < 10) {seconds = "0"+seconds;}
          return hours+':'+minutes+':'+seconds; // Return is HH : MM : SS
      }

    $.fn.dataTable.moment('YYYY-MM-DD h:mm A');
     var table_call_logs =   $('#call_log_historytable').DataTable( {
               "pageLength": 20,
                "order": [[ 5, "desc" ]]
          } );
      var numRows = table_call_logs.rows().count();
      $('.tile_stats_count .total_call_logs').text(numRows.toLocaleString("en")+'.00');
       $(function () {

         var start = moment().subtract(6, 'days');
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
         var start = picker.startDate.format('YYYY-MM-DD');
         var end = picker.endDate.format('YYYY-MM-DD');
        $.fn.dataTable.moment('YYYY-MM-DD h:mm A');
 

   var test_table =   $('#call_log_historytable').DataTable( {
              "processing": true,
              "serverSide": false,
              "destroy": true,
              "pageLength": 20,
              "order": [[ 5, "desc" ]],
              "ajax": {
                  "url":   base_url +  "dashboard/select_call_log_history",
                  "type": "POST",
                  "dataSrc":"",
                   "data": { 
                           "start": start,"end": end     
                      },

              },            
           columns: [
               { data: null,
                    "render" : function( data, type, row, full ) {
                       var get_type = '';
                          if(row.action == 'Incoming Fax'){
                              get_type = 'Incoming Fax';
                               }
                          else if(row.result == 'Missed'){
                                get_type = 'Missed Voice Call';
                           }
                           else{
                                get_type = row.direction +" Voice Call";
                              }

                            return get_type;                          
                          }
               },
                { data: "from.phoneNumber",
                    "render" : function( data, type, row, full ) {
                            return formatPhoneNumber(data);                          
                          }
               },
                { data: "to.phoneNumber",
                    "render" : function( data, type, row, full ) {
                            return formatPhoneNumber(data);    
                          }
               },
                { data: 'from.name',
                    "render" : function( data, type, row, full ) {
                       var from_name = data;
                       var get_extension_number = '';
                            if(from_name == 'Collin Maxwell'){

                                  get_extension_number = '101';

                              }

                             else if(from_name == 'Chris Davis'){

                                  get_extension_number = '102';

                              }

                              else if(from_name == 'Alexander Montgomery'){

                                  get_extension_number = '103';

                              }

                              else if(from_name == 'Lourie Sanchez'){

                                  get_extension_number = '104';

                              }

                              else if(from_name == 'Jade Smith'){

                                  get_extension_number = '105';

                              }

                              else if(from_name == 'Mark Anderson'){

                                  get_extension_number = '106';

                              }
                               else if(from_name == 'Amanda Martinez'){

                                  get_extension_number = '107';

                              }

                              else if(from_name == 'Anna Mae Morgan'){

                                  get_extension_number = '103';

                              }

                            return get_extension_number;                          
                          }
               },
               { data: null,
                    "render" : function( data, type, row, full ) {
                            to_location = [];
                            to_location = row.to.location;
                            return to_location;    
                          }
               },
                { data: "startTime",
                    "render" : function( data, type, row, full ) {

                            return  moment(data).format("YYYY-MM-DD h:mm A");                          
                          }
               },
              { data: 'action'},
              { data: 'result'},
              { data: 'duration',
                 "render" : function( data, type, row, full ) {

                            return convertHMS(data);    
                          }
               },

           ], 

        });
            test_table.on( 'draw', function () {
               var numRows = test_table.rows( {search:'applied'} ).count();
                $('.tile_stats_count .total_call_logs').text(numRows.toLocaleString("en")+'.00');
            });
            $('#call_logs_form [name="user_type"]').on('change', function () {
             test_table.columns(3).search($(this).val()).draw() ;

             var numRows = test_table.rows( {search:'applied'} ).count();
            $('.tile_stats_count .total_call_logs').text(numRows.toLocaleString("en")+'.00');
        });
            
      });

      });

$('#call_logs_form [name="user_type"]').on('change', function () {
       table_call_logs.columns(3).search($(this).val()).draw() ;

       var numRows = table_call_logs.rows( {search:'applied'} ).count();
      $('.tile_stats_count .total_call_logs').text(numRows.toLocaleString("en")+'.00');

});


 </script>
 -->
<script>
$(document).ready(function() {
  $('#call_log_historytable').DataTable( {
    "pageLength": 20,
    "order": [[ 5, "desc" ]],
    responsive: true
} );

var table = $('#call_log_historytable').DataTable();
var numRows = table.rows().count();
$('.tile_stats_count .total_call_logs').text(numRows.toLocaleString("en")+'.00');


var start = moment().subtract(7, 'days');
var end = moment();

function cb(start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    document.getElementById("start").innerHTML = start.format('MM-DD-YYYY');
    document.getElementById("end").innerHTML = end.format('MM-DD-YYYY');
}



$('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
       'Today': [moment(), moment()],
       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
       'Last 30 Days': [moment().subtract(31, 'days'), moment()],
       'This Month': [moment().startOf('month'), moment().endOf('month')],
       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
}, cb);

//cb(start, end);
cb(moment(start).tz('America/New_York'), moment(end).tz('America/New_York'));

$.fn.dataTable.ext.search.push(
  function(settings, data, dataIndex) {
     var start = $('#start').html();
     var end = $('#end').html();
     //alert(start);

     //alert(start)

    var createdAt = data[5] || 5; // Our date column in the table

    if (
      (start == "" || end == "") ||
      (moment(createdAt).isSameOrAfter(start) && moment(createdAt).isSameOrBefore(end))
    ) {
      return true;
    }
    return false;
  }
);

$.fn.dataTable.ext.search.push(
  function(settings, data, dataIndex) {
    var agent = $('#agent').val();
    var ext = data[3] || 3;

    

    if (
      (agent == "") ||
      (ext == agent)
    ) {
      return true;
    }
    return false;
  }
);


  table.on( 'draw', function () {
    var numRows = table.rows( {search:'applied'} ).count();
    $('.tile_stats_count .total_call_logs').text(numRows.toLocaleString("en")+'.00');
    });

  $('#reportrange').on('apply.daterangepicker', function(ev, picker){
    var numRows = table.rows( {search:'applied'} ).count();
      $('.tile_stats_count .total_call_logs').text(numRows.toLocaleString("en")+'.00');
      table.draw();
  });

  $('.agent-filter').change(function() {
    var numRows = table.rows( {search:'applied'} ).count();
    $('.tile_stats_count .total_call_logs').text(numRows.toLocaleString("en")+'.00');
    table.draw();
    });
});
</script>
  </body>

</html>

