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
    #emailModal .modal-content, #composemailModal .modal-content,  #messageModal .modal-content{padding: 0px 20px; width: 250%; margin-left: -440px;}
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
                  <li><a><i class="fa fa-home"></i> All Leads Bucket <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url("dashboard/dashboard")?>">Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/sold_leads")?>">Sold Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/contract")?>">For Contract Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/collection_lead")?>">For Collection Leads</a></li>
                      <!--<li><a href="<?php echo site_url("account/users")?>">Users</a></li>  -->
                    </ul>
                <!--  <li><a href="<?php echo site_url("dashboard/contract")?>"><i class="fa fa-edit"></i> Contract Leads</a>-->
                <!--  <li><a href="<?php echo site_url("account/users")?>"><i class="fa fa-users"></i> Users</a></li>-->
                <!-- <li><a href="<?php echo site_url("dashboard/email")?>"><i class="fa fa-envelope"></i> Email Authors</a></li>-->
                <!--  <li><a href="<?php echo site_url("dashboard/signature")?>"><i class="fa fa-file"></i>Add Signature</a></li>-->
                <!--  <li><a href="<?php echo site_url("account/assign_user")?>"><i class="fa fa-users"></i> Assign Manager</a></li>-->
                <!--  <li><a><i class="fa fa-users"></i> Transaction Leads <span class="fa fa-chevron-down"></span></a>-->
                <!--     <ul class="nav child_menu">-->
                <!--      <li><a href="<?php echo site_url("dashboard/collection_payment")?>">Collection Payment</a></li>-->
                <!--    </ul>-->

                <!--  </li>-->
                <!--   <li><a><i class="fa fa-history"></i> History Leads <span class="fa fa-chevron-down"></span></a>-->
                <!--     <ul class="nav child_menu">    -->
                <!--       <li><a href="<?php echo site_url("dashboard/lead_history")?>">Leads</a></li>-->
                <!--       <li><a href="<?php echo site_url("dashboard/collection_history")?>">Collection Payment Leads</a></li>-->
                <!--       <li><a href="<?php echo site_url("dashboard/contract_history")?>">Contract Author</a></li>-->
                <!--       <li><a href="<?php echo site_url("dashboard/contract_author_approval_history")?>">Contract Approval Author</a></li>-->
                <!--       <li><a href="<?php echo site_url("dashboard/author_report_history")?>">Report Author Relation</a></li>-->
                <!--       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Email Users</a></li>-->

                <!--    </ul>-->
                <!--       <li><a href="<?php echo site_url("dashboard/report")?>"><i class="fa fa-file"></i> Report </a>-->
                <!--  </li>-->
                <!--</ul>-->
                
                   <li><a href="<?php echo site_url("account/assign_user")?>"><i class="fa fa-users"></i> Assign to Manager</a></li>
                  <li><a href="<?php echo site_url("account/assign_agent")?>"><i class="fa fa-users"></i> Assign to Agent</a></li>
                  <li><a><i class="fa fa-list"></i> Current Transactions Guide <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu">
                         
                    <li><a href="<?php echo site_url("dashboard/collection_payment")?>">Leads Transaction</a></li>
                    
                     <li><a href="<?php echo site_url("dashboard/email_lead")?>">Lead Email</a></li>
                      <li><a href="<?php echo site_url("dashboard/signature")?>">Add Signature</a></li>
                       </ul>
                    <li><a><i class="fa fa-book"></i> Production Department <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                      <li><a href="<?php echo site_url("dashboard/report")?>"> Production Manual </a></li>
                      <li><a href="<?php echo site_url("dashboard/cover_designer")?>"> Cover Designer Report </a></li>
                      <li><a href="<?php echo site_url("dashboard/interior_designer")?>"> Interior Designer Report </a></li>

                  </li>

                </ul>
                 <li><a><i class="fa fa-dollar"></i> Finance Department <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Finance Book</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Overall Quota</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Per Team Quota</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Individual Quota</a></li>

                  </li>

                </ul>
                 <li><a><i class="fa fa-users"></i> Human Resource Department <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu">

                      <li><a href="<?php echo site_url("account/users")?>">All Users</a></li>
                       <li><a href="<?php echo site_url("dashboard/call_log_history")?>">Call Logs</a></li>
                       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Email Users</a></li>
                       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Attendance Masterlist</a></li>
                       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Per Team Pipes</a></li>
                       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Individual Pipes</a></li>


                    </ul>

                  </li>
                 <li><a><i class="fa fa-calendar"></i> Calendar of Activities <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Personal Calendar</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Company Calendar</a></li>

                  </li>

                </ul>
             </div>

            </div>
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
            
          </div>
        </div>
          <!-- /top tiles -->
  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>List of Leads
              <div style="float:right; ">
            <form id="upload_lead_form" enctype="multipart/form-data"> 
              <div class="alert alert-success"><p></p></div> 

            <div style="display:inline-block">
               <a href="<?php echo site_url("dashboard/add_author_subject")?>" target="_blank"><button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus">ADD SUBJECT</button></a>
            </div>   
             <div style="display:inline-block">
               <a href="<?php echo site_url("dashboard/update_author_subject")?>" target="_blank"><button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-secondary fa fa-edit">Update SUBJECT</button></a>
              </div>    
            </form>
      </div>
  </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataTablefixed" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="width:50px;!important">Project ID</th>
                  <th style="width:200px;!important">Author Name</th>
                  <th style="width:200px;!important;">Email Address</th>
                  <th>Contact #</th>
                  <th style="width:100px;!important">Area Code</th>
                  <th>Subject</th>
                  <th style="width:150px;!important">Date Create</th>
                  <th style="width:50px;!important">Send</th>
                  <th style="width:120px;!important">Email History</th>
                </tr>
              </thead>
              <tbody>
             <!--  <?php
                  $get_count_payment =0;
                  $replace_comma = "";
                  if ($leads > 0){
                       foreach ($leads as $lead){
                         $file_name = $lead['file_name'] == '' ? 'Manual Added' :$lead['file_name'];
                         echo "<tr>";
                               echo "<td>".modules::run("dashboard/setindex_prefix",$lead['project_id'])."</td>"; 
                               echo "<td>".$lead['author_name']."</td>";
                               echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['email_address']."</td>";
                               echo "<td>".$lead['contact_number']."</td>";
                               echo "<td>".$lead['area_code']."</td>";
                               echo "<td>".$lead['subject']."</td>";
                               echo "<td>".date("d/m/Y", strtotime($lead  ['date_create']))."</td>";
                               if ($lead['send_status'] == 0){
                                    echo "<td><a type='button' class='btn btn-danger' href='mailto:".$lead['email_address']."?subject=".$lead['subject']."' >Send</a></td>";       
                                 }
                              else{
                                    echo "<td><button type='button' class='btn btn-success'>Sent</button></td>";       

                              }

                          echo "</tr>";
                     }
                  }  
                  ?> -->
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

        <!-- Add Subject Modal -->
         <div class="modal fade" id="addsubjectmodal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="addsubjectform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Add Subject</h2>
                        <p class="hint-text">Create Subject.</p>
                         <div class="form-group">
                           <input type="text" class="form-control" style="height:50px;"  name="subject" placeholder="Subject Name" required>

                           </div> 
                           <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="leaddataTableemail_author" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>Project ID</th>
                                      <th>Package Name</th>
                                      <th>Author Name</th>
                                      <th>Book Title</th>
                                      <th>Email Address</th>
                                      <th>Contact #</th>
                                      <th>Area Code</th>
                                      <th>Date Create</th>
                                      <th><input type='checkbox' id='check_all_author' class='form-check-input' style='position:relative; width:45px;'></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                <!--   <?php
                                      $get_count_payment =0;
                                      $replace_comma = "";
                                      if ($author_emails > 0){
                                           foreach ($author_emails as $author_emails){
                                             $file_name = $author_emails['file_name'] == '' ? 'Manual Added' :$author_emails['file_name'];
                                             echo "<tr>";
                                                   echo "<td>".modules::run("dashboard/setindex_prefix",$author_emails['project_id'])."</td>"; 
                                                   echo "<td>".$author_emails['product_name']."</td>";
                                                   echo "<td>".$author_emails['author_name']."</td>";
                                                   echo "<td>".$author_emails['book_title']."</td>";
                                                   echo "<td>".$author_emails['email_address']."</td>";
                                                   echo "<td>".$author_emails['contact_number']."</td>";
                                                   echo "<td>".$author_emails['area_code']."</td>";
                                                   echo "<td>".date("d/m/Y", strtotime($author_emails['date_create']))."</td>";
                                                   echo "<td style='text-align:center;'><input type='checkbox' name='project_id[]' class='form-check-input project_id' value=".$author_emails['project_id']."></td>";
                                              echo "</tr>";
                                         }
                                      }  
                                      ?> -->
                                  </tbody>
                                </table>
                              </div>
                            </div>
                        <div class="form-group">
                                <button type="button" id="add_subject" class="btn btn-success btn-lg btn-block">Add</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

        <!-- Add Subject Modal -->
         <div class="modal fade" id="updatesubjectmodal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="updatesubjectform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Update Subject</h2>
                        <p class="hint-text">Update Subject.</p>
                         <div class="form-group">
                           <input type="text" class="form-control" style="height:50px;"  name="subject" placeholder="Subject Name" required>

                           </div>
                           <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="leaddataTableemail_author_update" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>Project ID</th>
                                      <th>Package Name</th>
                                      <th>Author Name</th>
                                      <th>Book Title</th>
                                      <th>Email Address</th>
                                      <th>Contact #</th>
                                      <th>Area Code</th>
                                      <th>Date Create</th>
                                      <th><input type='checkbox' id='check_all_author' class='form-check-input' style='position:relative; width:45px;'></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                 <!--  <?php
                                      $get_count_payment =0;
                                      $replace_comma = "";
                                      if ($author_emails_updates > 0){
                                           foreach ($author_emails_updates as $author_emails_update){
                                             $file_name = $author_emails_update['file_name'] == '' ? 'Manual Added' :$author_emails_update['file_name'];
                                             echo "<tr>";
                                                   echo "<td>".modules::run("dashboard/setindex_prefix",$author_emails_update['project_id'])."</td>"; 
                                                   echo "<td>".$author_emails_update['product_name']."</td>";
                                                   echo "<td>".$author_emails_update['author_name']."</td>";
                                                   echo "<td>".$author_emails_update['book_title']."</td>";
                                                   echo "<td>".$author_emails_update['email_address']."</td>";
                                                   echo "<td>".$author_emails_update['contact_number']."</td>";
                                                   echo "<td>".$author_emails_update['area_code']."</td>";
                                                   echo "<td>".date("d/m/Y", strtotime($author_emails_update['date_create']))."</td>";
                                                   echo "<td style='text-align:center;'><input type='checkbox' name='project_id[]' class='form-check-input project_id' value=".$author_emails_update['project_id']."></td>";
                                              echo "</tr>";
                                         }
                                      }  
                                      ?> -->
                                  </tbody>
                                </table>
                              </div>
                            </div>
                        <div class="form-group">
                                <button type="button" id="update_subject" class="btn btn-success btn-lg btn-block">Update</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

      <!-- Email Modal -->
         <div class="modal fade" id="emailModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="emailform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Email Form.</h2>
                        <p class="hint-text">You have 20 the maximum send of emails allowed per 15 minutes.</p>
                            <label for="validationCustom05">Author Email Address</label>
                            <div class="form-group">
                              <input type="text" class="form-control" readonly name="email_address" placeholder="Enter the Email Address" required="required">
                            </div>
                            <label for="validationCustom05">Subject</label>
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" placeholder="Please Enter the subject" required="required">
                              <input type="hidden" class="form-control" name="project_id"  disabled="disabled" placeholder="Please Enter the project_id" required="required">
                            </div>
                              <label for="validationCustom05">Signature</label>
                               <div class="form-group">
                               <select class="form-control signature" name="signature">`
                                 <option value="">Please Select A Signature</option>
                                 <?php 
                                     if ($signatures > 0){
                                         foreach ($signatures as $signature){
                                           echo "<option value='".$signature['signature_id']."'>".$signature['signature']."</option>";
                                       }
                                    } 
                                  ?>
                              </select>
                           </div>
                             <label for="validationCustom05">Message</label>
                            <div class="form-group">
                                <textarea class="form-control message" id="txtEditor" name="message"></textarea>
                            </div>
                        <div class="form-group">
                                <button type="button" id="send_email_author" class="btn btn-danger btn-lg btn-block">Send</button>
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

            <!-- Email Modal -->
         <div class="modal fade" id="composemailModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="composeemailform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Email Form.</h2>
                        <p class="hint-text">Send Email.</p>
                            <label for="validationCustom05">Email Address</label>
                            <div class="form-group">
                              <input type="text" class="form-control"  name="email_address" placeholder="Enter the Email Address" required="required">
                            </div>
                            <label for="validationCustom05">Subject</label>
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" placeholder="Please Enter the subject" required="required">
                            </div>
                             <label for="validationCustom05">Signature</label>
                          <div class="form-group">
                            <select class="form-control signature" name="signature">
                                <option value="">Please Select A Signature</option>
                                 <?php 
                                     if ($signatures > 0){
                                         foreach ($signatures as $signature){
                                           echo "<option value='".$signature['signature_id']."'>".$signature['signature']."</option>";
                                       }
                                    } 
                                  ?>
                              </select>
                           </div>
                            <div class="form-group">
                                <textarea class="form-control message" id="emailEditor" name="message"></textarea>
                            </div>
                        <div class="form-group">
                                <button type="button" id="send_email" class="btn btn-danger btn-lg btn-block">Send</button>
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


      <div class="modal fade" id="addsignaturemodal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="signatureform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Signture Form.</h2>
                        <p class="hint-text">Add Signature.</p>
                            <label for="validationCustom05">Signature Title</label>
                            <div class="form-group">
                              <input type="text" class="form-control" name="signature" placeholder="Please Enter the signature" required="required">
                            </div>
                            <label for="validationCustom05">Description</label>
                            <div class="form-group">
                                <textarea class="form-control message" id="signaturetxtEditor" name="description"></textarea>
                            </div>
                        <div class="form-group">
                                <button type="button" id="add_signature" class="btn btn-danger btn-lg btn-block">Add</button>
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


<!-- The History Lead  Remark-->
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

            <div class="modal fade" id="emailhistoryModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Email History </h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="historyemailtable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>From</th>
                                            <th>Subject</th>
                                            <th>User Type</th>
                                            <th>Date</th>
                                          </tr>
                                        </thead>
                                        <tbody class="view_email_history">
                                        <!--   <?php 
                                              if ($email_history > 0){
                                                 foreach ($email_history as $email_history){
                                                   echo "<tr>";
                                                         echo "<td>".$email_history['from']."</td>";
                                                         echo "<td>".$email_history['to']."</td>";
                                                         echo "<td><button type='button' class='btn btn-primary view_message_detail' data-toggle='modal' data-target='#messageModal' data-backdrop='static' data-keyboard='false' data-history_email_id='".$email_history['history_email_id']."'>View</button></td>";
                                                         echo "<td>".$email_history['email_status']."</td>";
                                                         echo "<td>".date("d/m/Y", strtotime($email_history['date_sent']))."</td>";
                                                    echo "</tr>";
                                               }
                                            }  

                                          ?> -->
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
    <script src="<?php echo base_url('js/ckeditor.js');?>"></script>
    <script src="<?php echo base_url('js/sample.js');?>"></script>



     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>

 <script>  

 $(document).ready(function() {
    initSample();

  });

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
// $('#leaddataTableemail_author').DataTable({
//       "pageLength": 100,
//       "scrollY": 500,
//       "scrollCollapse": true
//    });

// $('#leaddataTableemail_author_update').DataTable({
//    "pageLength": 100,
//    "scrollY": 500,
//    "scrollCollapse": true
//  });
   $.ajax({
        url:   base_url +  "dashboard/email_ajax",       
        method: 'POST',
        dataType: 'json',
        success: function (data) {
             var load_data = []
            for (var i = 0; i < data.length; i++) {
                 load_data.push({
                        'Project ID': setindex_prefix(data[i].project_id),
                        'Author Name': data[i].author_name,
                        'Email Address': data[i].email_address,
                        'Contact #': data[i].contact_number,
                        'Area Code': data[i].area_code,
                        'Subject':  data[i].subject,
                        'Date Create':new Date(data[i].date_create).toLocaleDateString('en-GB'),
                        'Send': "<td><a type='button' class='btn btn-danger send_email_author' data-subject="+data[i].subject+"  data-project_id="+data[i].project_id+" href='mailto:"+data[i].email_address+"?subject="+data[i].author_name+ ': ' +data[i].subject+"' >Send</a></td>",
                        'Email History': "<td><a type='button' class='btn btn-success view_email_history' data-project_id="+data[i].project_id+" aria-hidden='true' data-toggle='modal' data-target='#emailhistoryModal' data-backdrop='static' data-keyboard='false' >View</a></td>"

                    })      
               }

              $('#leaddataTablefixed').DataTable({
                  "processing": true, 
                  data: load_data,
                  deferRender:    true,
                  pageLength: 100,
                  scrollY:        500,
                  scrollCollapse: true,
                  scroller:       true,
                  "columns": [{
                     "data": "Project ID"
                    },{
                      "data": "Author Name"
                    },{
                      "data": "Email Address"
                    },{
                      "data": "Contact #"
                    },{
                      "data": "Area Code"
                    },{
                      "data": "Subject"
                    },{
                      "data": "Date Create"
                    },{
                      "data": "Send"
                    },{
                      "data": "Email History"
                    },
                    ]
                   });
              }
    });


   $.ajax({
        url:   base_url +  "dashboard/lead_email_ajax",       
        method: 'POST',
        dataType: 'json',
        success: function (data) {
             var load_data = []
            for (var i = 0; i < data.length; i++) {
                 load_data.push({
                        'Project ID': setindex_prefix(data[i].project_id),
                        'Package Name': data[i].product_name,
                        'Author Name': data[i].author_name,
                        'Book Title': data[i].book_title,
                        'Email Address': data[i].email_address,
                        'Contact #': data[i].contact_number,
                        'Area Code': data[i].area_code,
                        'Subject':  data[i].subject,
                        'Date Create':new Date(data[i].date_create).toLocaleDateString('en-GB'),
                        "<input type='checkbox' id='check_all_author' class='form-check-input' style='position:relative; width:45px;'>": "<td style='text-align:center;'><input type='checkbox' name='project_id[]' class='form-check-input project_id' value="+data[i].project_id+"></td>"
                    })      
               }

              $('#leaddataTableemail_author').DataTable({
                  data: load_data,
                  deferRender:    true,
                  paging:false,
                  scrollY:        500,
                  scrollCollapse: true,
                  scroller:       true,
                  "columns": [{
                     "data": "Project ID"
                    },{
                      "data": "Package Name"
                    },{
                      "data": "Author Name"
                    },{
                      "data": "Book Title"
                    },{
                      "data": "Email Address"
                    },{
                      "data": "Contact #"
                    },{
                      "data": "Area Code"
                    },{
                      "data": "Date Create"
                    },{
                      "data": "<input type='checkbox' id='check_all_author' class='form-check-input' style='position:relative; width:45px;'>"
                    }
                    ]
                   });
              }
    });



 $("#addsubjectform #check_all_author, #updatesubjectform #check_all_author").click(function () {
     $('#addsubjectform input:checkbox, #updatesubjectform input:checkbox').not(this).prop('checked', this.checked);
 });

</script>
  </body>
</html>
