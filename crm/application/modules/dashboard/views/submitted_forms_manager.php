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

    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}
    /*.attach_file>input{
      display: none;
      }*/
    .attach_file{
      height: 27px;
      padding: 0px 5px 0px 5px;
     }
     .custom-file-input:lang(en) ~ .custom-file-label::after{
      content: "attach file";
     }
     .custom-file {
      position: relative;
      display: inline-block;
      width: 28%;
      height: calc(1.5em + .75rem + 2px);
      margin-bottom: -1px;
      top: -3px;
      bottom: 20px;
      vertical-align: top;
      height: 37px;
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
              <div class="profile_info">
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
                   <li><a href="<?php echo site_url("dashboard/collection_payment")?>"><i class="fa fa-dollar"></i>Create New Sale</a></li>

<!--                     <li><a href="<?php echo site_url("account/assign_user")?>"><i class="fa fa-users"></i> Assign to Agent</a></li>
 -->                  </li>
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
                       <li><a href="<?php echo site_url("dashboard/SubmittedFormsall")?>">Submitted Forms</a></li>

                    </ul>

                  </li>
                  
                   <li><a><i class="fa fa-calendar"></i> Calendar of Activities <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Personal Calendar</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Team Calendar</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Company Calendar</a></li>

                  </li>

                </ul>
                <li><a><i class="fa fa fa-wpforms"></i>Forms<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu"> 
                        <li><a href="<?php echo site_url("dashboard/leaveForm")?>">Leave Request Form</a></li>
                        <li><a href="<?php echo site_url("dashboard/officialBusinessLeaveForm")?>">OBL Request Form</a></li>
                        <li><a href="<?php echo site_url("dashboard/undertimeForm")?>">Undertime Request Form</a></li>
                      </ul>
                  </li>
                  <li><a href="<?php echo site_url("dashboard/SubmittedForms")?>"><i class="fa fa-paper-plane"></i>Submitted Form</a></li>
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
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            
          </div>
        </div>
          <!-- /top tiles -->
  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-sticky-note-o"></i> Form Type
              <div style="float:right; ">
              <div style="display:inline-block">
<!--                 <a href="<?=site_url('dashboard/create_memo');?>" style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" >Add</a> -->
                 <!-- <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addMemoModal" data-backdrop="static" data-keyboard="false">Create</button> -->
              </div>   
      </div>
    <!--  -->
      </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="formdatatable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Employee's Name</th>
                  <th>Position</th>
                  <th>Form Type</th>
                  <th>Immediate Supervisor</th>
                  <th>Human Resource</th>
                   <th>Date Applied</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if ($forms > 0){
                       foreach ($forms as $form){
                         
                         echo "<tr>";
                               echo "<td>".$form['employee_name']."</td>";
                               echo "<td>".$form['position']."</td>";
                               echo "<td>".$form['form_type']."</td>";
                               echo "<td>".$form['approval_status_manager']."</td>";
                               echo "<td>".$form['notice_status_hr']."</td>";
                               echo "<td>".date('F d, Y',strtotime($form['date_create']))."</td>"; ?>

                               <?php if ($form['form_type'] == 'Leave Form'):?>
                               <td> <a class="btn btn-primary" href="<?php echo base_url('dashboard/view_forms?id=').$form['form_id'] ?>">View</a></td>
                               <?php elseif ($form['form_type'] == 'Undertime Form') :?> 
                               <td> <a class="btn btn-primary" href="<?php echo base_url('dashboard/view_forms_undertime?id=').$form['form_id'] ?>">View</a></td>
                               <?php else:?>
                               <td> <a class="btn btn-primary" href="<?php echo base_url('dashboard/view_forms_obl?id=').$form['form_id'] ?>">View</a></td>
                               <?php endif;?>
                             
                               <?

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
         <!-- Add User -->
         <div class="modal fade" id="addUserModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="adduserform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Add User</h2>
                        <p class="hint-text">Create user account.</p>
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
                                <option value="Author Relation">Author Relation</option>
                                <option value="Agent">Agent</option>
                              </select>
                           </div>
                           <div class="form-group">
                             <label class="form-check-label"><input type="checkbox" name="agreement" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                           </div>
                        <div class="form-group">
                                <button type="button" id="add_user" class="btn btn-success btn-lg btn-block">Add</button>
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

       <!-- Add Memo -->
         <div class="modal fade" id="addMemoModal">
            <div class="modal-dialog" style="max-width: 60%;">
              <div class="modal-content">
                    <div class="modal-header">
                      <span>Create Memos & Incentives</span>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form id="memo_form" class="upload_file_form">
                      <div class="alert alert-success"><p></p></div>
                      <div class="modal-body">
                        <div class="memo-form">
                          <div class="form-group">
                            <div class="col-auto">
                              <label for="exampleFormControlTextarea1">Document Title</label>
                              <select class="form-control" name="title">
                                <option value="Memo">Memo</option>
                                <option value="Incentive">Incentive</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-auto">
                              <label for="exampleFormControlTextarea1">Heading Section</label>
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Date:</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" name="date" value="<?php echo date('F d, Y');?>" readOnly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-auto">
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">From:</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" name="from" value="<? echo $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];?>" readOnly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-auto">
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">To:  &nbsp;  &nbsp;</div>
                                </div>
                                <select class="form-control" id="exampleFormControlSelect2" name="sendto[]" multiple>
                                  <? foreach ($users as $user) { ?>                                 
                                  <option value="<?echo $user['user_id'];?>"><? echo $user['firstname']." ".$user['lastname']." - ".$user['usertype']; ?></option>                    
                                  <?}?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-auto">
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Re:  &nbsp;  &nbsp;</div>
                                </div>
                                <input type="text" class="form-control" name="subject" id="subject">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-auto">
                              <label for="exampleFormControlTextarea1">Message Section</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="9" name="message"></textarea>
                          </div>
                          </div>

                          <div class="form-group">
                            <div class="col-auto">
                              <button type="button" class="btn btn-outline-primary fa fa-paper-plane" id="add_memo">Send</button>        
                              <button type="button" class="btn btn-outline-danger fa fa-trash" data-dismiss="modal">Discard</button>
                              <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" multiple>
                                <label class="custom-file-label" for="customFileInput">Select file</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
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
                                <option value="Author Relation">Author Relation</option>
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
   <!-- End Edit User -->

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
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('bootstrap/build/js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('js/croppie.js');?>"></script>


     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>
     <script src="<?php echo base_url('js/validatenotification.js');?>"></script>

 <script>  
 
 $('#formdatatable').DataTable();


 document.querySelector('.custom-file-input').addEventListener('change', function (e) {

      var name = document.getElementById("customFileInput").files[0].name;

      var nextSibling = e.target.nextElementSibling

      nextSibling.innerText = name

    });

</script>
  </body>
</html>
