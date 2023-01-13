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
    <!-- <link href="<?php echo base_url('css/forms.css');?>" rel="stylesheet"> -->
    <link href="<?php echo base_url('datepicker/css/bootstrap-datepicker.css');?>" rel="stylesheet">

    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}


    </style>
    <style type="text/css">
  select {
    border: none;
    background: transparent;
    font-size: 11.1px;

}
</style>
<style type="text/css">
  .fab {
   width: 70px;
   height: 70px;
   background-color: red;
   border-radius: 50%;
   box-shadow: 0 6px 10px 0 #666;
   transition: all 0.1s ease-in-out;
 
 
   color: white;
   text-align: center;
   line-height: 70px;
 
   position: fixed;
   right: 50px;
   bottom: 50px;
}
 
.fab:hover {
   box-shadow: 0 6px 14px 0 #666;
   transform: scale(1.05);
}
</style>
<!--under request form-->
<style type="text/css">
table, td{border: 1px solid black;border-collapse: collapse;text-align: left;height: 30px;}
.container-1{text-align: center;margin:0 auto;width:50%;
  background: url('<?php echo base_url().'images/FormBackground.png';?>') center no-repeat;
  background-size: 70%;
  font-family: calibri;
  font-size: 16px;
  color: #000;
}
.imgLogo img{width: 40%;}
input[type="text"],input[type="date"],input[type="number"],input[type="time"]{border: none; outline: none;background: transparent;}
.divp{display: inline-block;margin: 100px 50px 20px 0;}
.divp p{margin: 0; text-align: center;}
.divp input{text-align: center;}
.divp p{margin: 0;}
.approval{margin-left: 30px;margin-top: -35px;}
.divp .borderbot{border-top: 1px solid #000;}
.alignleft{text-align:left;}
.alignright{text-align: right;}
textarea{-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;width: 100%;background: transparent;}
/*responsive*/
  @media only screen and (max-width: 1785px){
    .approval{margin-left: 25px;}
  } 
  @media only screen and (max-width: 1775px){
    .divp{display: block;width: 200px;margin: 15px auto;}
    .approval{margin: 40px 0 20px 0;}
    h3{font-size: 25px;}
  }
  @media only screen and (max-width : 1060px){
    table{width: 100% !important;}
   .table-div{width: 100%;overflow-x: scroll;}
   .imgLogo img{width: 65%}
   h3{font-size: 23px;}
  }
  @media only screen and (max-width: 970px){
    .imgLogo img{width: 70%}
  }
  @media only screen and (max-width: 734px){
    .imgLogo img{width: 80%}
    h3{font-size:25px}
  }
  @media only screen and (max-width: 600px){
    .container-1{background: none}
    .imgLogo img{width: 90%}
    h3{font-size: 24px;}
  }
  @media only screen and (max-width: 500px){
    .imgLogo img{width: 100%;}
    h3{font-size: 20px;}
    .container-1{background:none;}
    .divp{margin: 5px 0px 15px -10px;}
    .approval{margin-left: 30px;margin-top: 0;}
  }
  @media only screen and (max-width: 375px){
    textarea{margin-bottom: 25px;}
    .approval{margin-left: 0;}
 }
</style>
<style type="text/css">
<!--
span.cls_002{font-family:"Calibri Bold",serif;font-size:11.1px;color:rgb(244,244,244);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_002{font-family:"Calibri Bold",serif;font-size:11.1px;color:rgb(244,244,244);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_003{font-family:"Calibri Bold",serif;font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_003{font-family:"Calibri Bold",serif;font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_004{font-family:"Calibri",serif;font-size:11.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_004{font-family:"Calibri",serif;font-size:11.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_005{font-family:"Calibri",serif;font-size:11.1px;color:rgb(255,255,255);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_005{font-family:"Calibri",serif;font-size:11.1px;color:rgb(255,255,255);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_006{font-family:Arial,serif;font-size:10.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_006{font-family:Arial,serif;font-size:10.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
-->
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
                  <!--<li><a><i class="fa fa-home"></i> Leads Bucket <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url("dashboard/dashboard")?>">Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/sold_leads")?>">Sold Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/contract")?>">For Contract Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/collection_lead")?>">For Collection Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_lead")?>">Lead Email</a></li>
                      <li><a href="<?php echo site_url("dashboard/check_lead")?>">Check Lead</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo site_url("dashboard/collection_payment")?>"><i class="fa fa-dollar"></i>Create New Sale</a></li>-->
                  <li><a><i class="fa fa-fire"></i> Performance Task <span class="fa fa-chevron-down"></span></0>
                     <ul class="nav child_menu">    
                       <li><a href="<?php echo site_url("dashboard/")?>"><i class="fa fa-clock-o"></i> Attendance</a> </li>
                       <li><a href="<?php echo site_url("dashboard/SubmittedForms")?>">Submitted Forms</a></li>
                       <!-- <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Quota</a></li>
                        <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Pipeline</a></li>
                       <li><a href="<?php echo site_url("dashboard/call_log_history")?>">Call Logs</a></li> -->
                       <li><a href="<?php echo site_url("dashboard/view_penaltymatrix_agent")?>">Penalty Matrix Guidelines</a></li>

                    </ul>

                  </li>
                    <li><a><i class="fa fa fa-wpforms"></i>Forms<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu"> 
                        <li><a href="<?php echo site_url("dashboard/leaveForm")?>">Leave Request Form</a></li>
                        <li><a href="<?php echo site_url("dashboard/officialBusinessLeaveForm")?>">OBL Request Form</a></li>
                        <li><a href="<?php echo site_url("dashboard/undertimeForm")?>">Undertime Request Form</a></li>
                      </ul>
                  </li>
                   <!--<li><a><i class="fa fa-calendar"></i> Calendar of Activities <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                      <li><a href="<?php echo site_url("dashboard/personal_calendar")?>">Personal Calendar</a></li>
                      <li><a href="<?php echo site_url("dashboard/company_calendar")?>">Company Calendar</a></li>
                      <li><a href="<?php echo site_url("dashboard/stats_calendar")?>">Stats Calendar</a></li>
                  </li>

                </ul>-->
                  
                   <!--<li><a href="<?php echo site_url("dashboard/email")?>"><i class="fa fa-envelope"></i> Email Authors</a></li>-->
                   <!--<li><a href="<?php echo site_url("dashboard/signature")?>"><i class="fa fa-file"></i>Add Signature</a></li>-->
                   
                  <!--<li><a><i class="fa fa-users"></i> Transaction Leads <span class="fa fa-chevron-down"></span></a>-->
                  <!--   <ul class="nav child_menu">-->
                  <!--    <li><a href="<?php echo site_url("dashboard/collection_payment")?>">Collection</a></li>-->
                  <!--  </ul>-->

                  <!--</li>-->
                  <!--<li><a href="<?php echo site_url("dashboard/time_nanosleep(seconds, nanoseconds)")?>"><i class="fa fa-clock-o"></i> Time In/Out</a> </li>-->
                  <!-- <li><a><i class="fa fa-history"></i> History Leads <span class="fa fa-chevron-down"></span></0>-->
                  <!--   <ul class="nav child_menu">    -->
                  <!--     <li><a href="<?php echo site_url("dashboard/lead_history")?>">Leads</a></li>-->
                  <!--     <li><a href="<?php echo site_url("dashboard/collection_history")?>">Collection Payment Leads</a></li>-->
                  <!--     <li><a href="<?php echo site_url("dashboard/contract_history")?>">Contract Author</a></li>-->
                  <!--     <li><a href="<?php echo site_url("dashboard/contract_author_approval_history")?>">Contract Approval Author</a></li>-->
                  <!--     <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Email Users</a></li>-->

                  <!--  </ul>-->

                  <!--</li>-->
                </ul>

             </div>

            </div>
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
                                <a  href="<?=site_url('dashboard/view_notification');?>" class="dropdown-item">
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

     <!-- /sidebar menu -->


        <!-- page content -->
        <div class="right_col" role="main" style=" height: 100px; overflow-y: scroll;">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
          </div>
        </div>
          <!-- /top tiles -->
  <div class="card mb-3">
    <!-- page content -->
  <form id="addundertimeform" method="post">
    <div class="alert alert-success"><p></p></div>
    <div class="container-1">
      <div class="imgLogo">
        <img src="<?php echo base_url().'images/FormLogo.png';?>" alt="logo">
      </div>

      <h3>Undertime Request Form</h3>

      <?php if ($forms > 0 ){
        foreach ($forms as $form) {?>

      <p class="alignright">Date:<input type="text" name="date" value=" <?php echo $form['date_create'];?>" readonly></p>
      <div style="width:100%" class="table-div">
      <table style="width:100%">
        <tr>
          <td colspan="2">Name:<input type="text" name="name" value=" <?php echo $form['firstname'] . " " . $form['lastname'];?>" readonly><input type="hidden" name="userid" value="<?echo $form['user_id'];?>"></td>
          <td >Department/Position:<input type="text" name="position" value=" <?php echo $form['usertype'];?>" readonly></td>
        </tr>
        <tr>
          <td>Inclusive date:<input type="text" name="inclusive-date" value=" <? echo $form['inclusive_from'] . " " . $form['inclusive_to'];?>" readonly></td>
          <td>Duration (Time):<input type="text" name="duration" value="<?php echo $form['duration'];?>" readonly></td>
          <td>Total Number of hours:<input type="text" name="number-hours" id="number-hours" value="<?php echo $form['total_hours'];?>" readonly> </td>
        </tr>
      </table>
      </div>
      <p class="alignleft">Reason/s for Undertime:</p>
      <textarea rows="5" cols="99" name="comment" readonly><?php echo $form['reason'];?></textarea>
      <p class="alignleft">Remarks for Manager:</p>
       <textarea rows="5" cols="99" name="remarks" readonly><?php echo $form['travel_remarks'];?></textarea>
      <p class="alignleft">Remarks for Human Resources:</p>
       <textarea rows="5" cols="99" name="hr_remarks" readonly><?php echo $form['hr_remarks'];?></textarea>
      <div class="approval">
        <div class="divp">
            <div style="position:relative; top:0">
                <span class="d-block" style="position: relative; bottom: 0px;"><?=$form['agent_transaction_code'];?></span>
                 <img style='width:100px; height: auto; position:relative; top:0px;' src="<?php echo base_url('upload_signatures/'.$form['agent_signature'])?>">
           </div>
               <input type="text" name="name" value="<?=$form['employee_name'];?>">
            <p class="borderbot">Requested by:</p>
          <p>Employee</p>
        </div>
        <div class="divp">
         <?php if($form['manager_transaction_code'] != ''):?>
            <div style="position:relative; top:0">
                <img style='width:150px; height:150px; position:relative; top:120px; left:60px;' src="<?php echo base_url('upload_signatures/'.$form['manager_signature'])?>">
                 <span class="d-block"><?=$form['manager_transaction_code'];?></span>
           </div>
               <input type="text" name="name" value="<?=$form['manager_name'];?>">
           <?php endif;?>
          <p class="borderbot">Approved by:</p>
          <p>Supervisor/Manager</p>
        </div>
        <div class="divp">
         <?php if($form['hr_signature'] != ''):?>
            <div style="position:relative; top:0">
                <img style='width:150px; height:150px; position:relative; top:120px; left:60px;' src="<?php echo base_url('upload_signatures/'.$form['hr_signature'])?>">
                 <span class="d-block"><?=$form['hr_transaction_code'];?></span>
           </div>
               <input type="text" name="name" value="<?=$form['hr_name'];?>">
          <?php endif;?>
          <p class="borderbot">Noted by:</p>
          <p>Human Resource Department</p>
        </div>
      </div>
      <!-- <div class="buttons">
          <button type="button" class="btn btn-success" id="add_undertime">Submit</button>
          <button type="button" class="btn btn-primary" id="add_memo">Print</button> 
          <button type="button" class="btn btn-default" id="add_memo">Download</button>    
      </div> -->
       <?php }
      } ?>
    </div>

  </form>

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
     <script src="<?php echo base_url('js/validateform.js');?>"></script>

 <script>  
 
 $('#leaddataTable').DataTable();
</script>
<script type="text/javascript">
  $('input[name="duration"]').daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 1,
            locale: {
                format: 'HH:mm'
            }
        }).on('show.daterangepicker', function (ev, picker) {
            picker.container.find(".calendar-table").hide();
            $('input[name="duration"]').on('change', function(){
              $('#number-hours').val(picker.endDate.diff(picker.startDate, "hours", "minutes").toFixed(2)); 
            });
            
        });
</script>
  </body>
</html>
