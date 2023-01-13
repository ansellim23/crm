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
           <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Monitoring Leads <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url("dashboard/dashboard")?>">Lead</a></li>
                      <li><a href="<?php echo site_url("dashboard/sold_leads")?>">Sold Lead</a></li>
                      <li><a href="<?php echo site_url("dashboard/contract")?>">Contract Author</a></li>
                      <li><a href="<?php echo site_url("dashboard/collection_lead")?>">Collection Lead</a></li>
                    </ul>
                  <?php if ($this->session->userdata['userlogin']['usertype'] == 'Admin'): ?>
                    <li><a href="<?php echo site_url("account/users")?>"><i class="fa fa-users"></i> Users</a></li>
                  <?php endif; ?>
                    <li><a href="<?php echo site_url("dashboard/email")?>"><i class="fa fa-envelope"></i> Email Authors</a></li>
                    <li><a href="<?php echo site_url("dashboard/signature")?>"><i class="fa fa-file"></i>Add Signature</a></li>
                    <li><a href="<?php echo site_url("account/assign_user")?>"><i class="fa fa-users"></i> Assign Agent</a></li>
                  </li>
                   <li><a><i class="fa fa-history"></i> History Leads <span class="fa fa-chevron-down"></span></a>
                     <ul class="nav child_menu">    
                       <li><a href="<?php echo site_url("dashboard/lead_history")?>">Leads</a></li>
                       <li><a href="<?php echo site_url("dashboard/collection_history")?>">Collection Payment Leads</a></li>
                       <li><a href="<?php echo site_url("dashboard/contract_history")?>">Contract Author</a></li>
                       <li><a href="<?php echo site_url("dashboard/contract_author_approval_history")?>">Contract Approval Author</a></li>
                       <li><a href="<?php echo site_url("dashboard/author_report_history")?>">Report Author Relation</a></li>
                       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Email Users</a></li>

                    </ul>
                      <li><a href="<?php echo site_url("dashboard/report")?>"><i class="fa fa-file"></i> Report </a>

                  </li>
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
          <!-- /top tiles -->
  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>List of Leads
              <div style="float:right; ">
            <form id="upload_lead_form" enctype="multipart/form-data"> 
              <div class="alert alert-success"><p></p></div> 
                 <div style="display:inline-block">
               <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-success fa fa-envelope" aria-hidden="true" data-toggle="modal" data-target="#emailhistoryModal" data-backdrop="static" data-keyboard="false">EMAIL HISTORY</button>
            </div>   
            <div style="display:inline-block">
               <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addsubjectmodal" data-backdrop="static" data-keyboard="false">ADD SUBJECT</button>
            </div>   
             <div style="display:inline-block">
               <button style="height: 33px; position: relative;  top: 6px;" type="button"  class="btn btn-secondary fa fa-edit" aria-hidden="true" data-toggle="modal" data-target="#updatesubjectmodal" data-backdrop="static" data-keyboard="false">UPDATE SUBJECT</button>
              </div>  
            <!--  <div style="display:inline-block">
                 <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-warning fa fa-pencil" aria-hidden="true" data-toggle='modal' data-target='#composemailModal' data-backdrop='static' data-keyboard='false'>COMPOSE</button>
              </div>    -->
            </form>
      </div>
  </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataTablefixed" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="width:50px;!important">Author Name</th>
                  <th style="width:200px;!important">Author Name</th>
                  <th style="width:200px;!important;">Email Address</th>
                  <th>Contact #</th>
                  <th style="width:100px;!important">Area Code</th>
                  <th>Subject</th>
                  <th style="width:150px;!important">Date Create</th>
                  <th style="width:50px;!important">Send</th>
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
                               echo "<td>".modules::run("dashboard/setindex_prefix",$lead['project_id'])."</td>"; 
                               echo "<td>".$lead['author_name']."</td>";
                               echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['email_address']."</td>";
                               echo "<td>".$lead['contact_number']."</td>";
                               echo "<td>".$lead['area_code']."</td>";
                               echo "<td>".$lead['subject']."</td>";
                               echo "<td>".date("d/m/Y", strtotime($lead  ['date_create']))."</td>";
                               if ($lead['send_status'] == 0){
                                    echo "<td><button type='button' class='btn btn-danger view_email_detail' data-toggle='modal' data-target='#emailModal' data-backdrop='static' data-keyboard='false' data-project_id='".$lead['project_id']."'>Send</button></td>";       
                                 }
                              else{
                                    echo "<td><button type='button' class='btn btn-success'>Sent</button></td>";       

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
                                  <?php
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
                                      ?>
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
                                  <?php
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
                                      ?>
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
                        <p class="hint-text">Send Email.</p>
                            <label for="validationCustom05">Author Email Address</label>
                            <div class="form-group">
                              <input type="text" class="form-control" readonly name="email_address" placeholder="Enter the Email Address" required="required">
                            </div>
                            <label for="validationCustom05">Subject</label>
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" placeholder="Please Enter the subject" required="required">
                              <input type="hidden" class="form-control" name="project_id"  disabled="disabled" placeholder="Please Enter the project_id" required="required">
                            </div>
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
                                            <th>To</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
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

                                          ?>
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
    <script src="<?php echo base_url('js/editor.js');?>"></script>
 <script src="https://cdn.tiny.cloud/1/gevdmjms0xw6o6lgzwa72r2exfdzlnj6o286c81ijqsubgvu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>

 <script>  

 $(document).ready(function() {
tinymce.init({
      selector: 'textarea#txtEditor',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker image imagetools save',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table image save',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      image_title: true,
      height: 400,
  automatic_uploads: true,

  file_picker_types: 'image',
          setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
  /* and here's our custom image picker*/
  file_picker_callback: function (cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.onchange = function () {
      var file = this.files[0];

      var reader = new FileReader();
      reader.onload = function () {

        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };

    input.click();
  },
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'

   });
tinymce.init({
      selector: 'textarea#messagetxtEditor',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker image imagetools save',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table image save',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      image_title: true,
      height: 400,
  automatic_uploads: true,
    readonly : 1,

  file_picker_types: 'image',
          setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
  /* and here's our custom image picker*/
  file_picker_callback: function (cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.onchange = function () {
      var file = this.files[0];

      var reader = new FileReader();
      reader.onload = function () {

        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };

    input.click();
  },
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'

   });


  });

 $('#leaddataTablefixed').DataTable({"autoWidth": false, columnDefs: [
            { width: '1%', targets: 1,
             width: '10%', targets: 2,
             width: '10%', targets: 3
           }
      
        ],
        fixedColumns: true});
$('#leaddataTableemail_author').DataTable({"autoWidth": false, columnDefs: [
            { width: '10%', targets: 2 }
        ],
        "paging": false,
        fixedColumns: true});
$('#leaddataTableemail_author_update').DataTable({"autoWidth": false, columnDefs: [
            { width: '10%', targets: 2},
            { width: '1%', targets: 4}
        ],
        "paging": false,
        fixedColumns: true});
 $("#addsubjectform #check_all_author, #updatesubjectform #check_all_author").click(function () {
     $('#addsubjectform input:checkbox, #updatesubjectform input:checkbox').not(this).prop('checked', this.checked);
 });

</script>
  </body>
</html>
