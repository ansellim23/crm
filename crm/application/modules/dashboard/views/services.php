<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url().'images/HORIZONS-LOGO-2.png';?>" type="image/png" />

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
    <link href='<?= base_url() ?>css/dropzone.css' type='text/css' rel='stylesheet'>
    <link href="<?php echo base_url('css/services.css');?>" rel="stylesheet">


    <style type="text/css">
      .dz-message{
        text-align: center;
        font-size: 28px;
      }
      .content{
          width: 100%;
          padding: 5px;
          margin: 0 auto;
        }
       .content span{
          width: 250px;
        }
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}
       #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}
       #viewfilehistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
       .shrinkToFit{margin: 0px auto !important; text-align:  center !important;}
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url().'dashboard/';?>" class="site_title">
                   <div class="image">
                        <!--<img src="images/logodashboard1.png" alt="Company Logo" style="width:151px;"/>-->
                        <span>Better Bound House</span>
                        </div>
                        </a>
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
                  <li><a><i class="fa fa-home"></i> All Leads Bucket <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url("dashboard/dashboard")?>">Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/sold_leads")?>">Sold Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/contract")?>">For Contract Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/collection_lead")?>">For Collection Leads</a></li>
                    </ul>
                    
                     <li><a><i class="fa fa-fire"></i> Performance Task <span class="fa fa-chevron-down"></span></0>
                     <ul class="nav child_menu">    
                       <li><a href="<?php echo site_url("dashboard/time_nanosleep(seconds, nanoseconds)")?>"><i class="fa fa-clock-o"></i> Time In/Out</a> </li>
                       <li><a href="<?php echo site_url("dashboard/time_nanosleep(seconds, nanoseconds)")?>"><i class="fa fa-clock-o"></i> Lunch In/End</a> </li>
                       <li><a href="<?php echo site_url("dashboard/time_nanosleep(seconds, nanoseconds)")?>"><i class="fa fa-clock-o"></i> Break In/End</a> </li>
                     

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
                <li><a><i class="fa fa-calendar"></i> Calendar of Activities <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                     <li><a href="<?php echo site_url("dashboard/timeline_calendar")?>">TimeLine Calendar</a></li>
                     <li><a href="<?php echo site_url("dashboard/company_calendar")?>">Company Calendar</a></li>
                     <li><a href="<?php echo site_url("dashboard/personal_calendar")?>">Personal Calendar</a></li>

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
                <!--    <li><a href="<?php echo site_url("dashboard/report")?>"><i class="fa fa-file"></i> Report </a>-->
                <!--     <li><a href="<?php echo site_url("dashboard/cover_designer")?>"><i class="fa fa-file"></i> Cover Designer Report </a></li>-->
                <!--    <li><a href="<?php echo site_url("dashboard/interior_designer")?>"><i class="fa fa-file"></i> Interior Designer Report </a></li>-->
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

     <div class='content'>
         <div class="panel_s project-menu-panel">
          <div class="panel-body">
              <div class="horizontal-scrollable-tabs">
                <div class="scroller arrow-left" style="display: none;"><i class="fa fa-angle-left"></i></div>
                  <div class="scroller arrow-right" style="display: none;"><i class="fa fa-angle-right"></i></div>
                    <div class="horizontal-tabs">
                    <ul class="nav nav-tabs no-margin project-tabs nav-tabs-horizontal" role="tablist">
                    <li class="active project_tab_project_overview">
                    <a data-group="project_overview" role="tab" href="javascript:history.back()">
                    <i class="fa fa-th" aria-hidden="true"></i>
                    Project Overview </a>
                    </li>
                    <li class="project_tab_project_files">
                    <a data-group="project_files" role="tab" href="<?=base_url('dashboard/files/'.$project_id.'');?>">
                    <i class="fa fa-files-o" aria-hidden="true"></i>
                    Files </a>
                    </li>
                    <li class="project_tab_project_files">
                    <a data-group="project_files" role="tab" href="<?=base_url('dashboard/services/'.$report['project_id'].'/'.$report['report_id']);?>">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    Services </a>
                    </li>
                    <li>
                    <a data-group="project_files" role="tab" href="<?=base_url('dashboard/project_timeline/'.$project_id.'');?>">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    Project Timeline </a>
                    </li>
                    </ul>
                  </div>
                </div>
              </div>
          </div>
     </div>
    <!-- Dropzone
       <form class="dropzone" id="my-dropzone">
       </form>  -->
     </div>
          <!-- <div class="card-header">
           <i class="fa fa-table"></i>List of Leads

  </div> -->
  <form method="post" id="projects_form">
	<div class="row">
        <div class="col-md-12 mb-5">
            <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add New Projects</button>
        </div>
    </div>
    <!-- <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
            <select class="browser-default form-control border border-warning" onchange="location = this.value;">
                    <? if($books > 0){
                        echo "<option disabled> Select a book</option>";
                        foreach ($books as $book) {
                            if($book['book_id'] == $book_id){
                                 echo "<option value='".base_url('projects/details/'.$book['book_id'])."' selected>".$book['book_title']."</option>";
                            }else{
                           echo "<option value='".base_url('projects/details/'.$book['book_id'])."'>".$book['book_title']."</option>";
                            }
                        }
                    }?>
            </select>
        </div>
    </div> -->
  
	<? if($services_details > 0){ 
        foreach ($services_details as $row) { ?>
    <!-- <div class="border-top border-bottom mb-5 text-center">
        <h4><input class="text-center" type="text" value="<?=$row['project_name'];?>" name="project"></h4>
    </div> -->

    <input type="hidden" name="project_id" value="<?=$row['project_id']?>">

    <div class="row">
        <div class="col-md-12">
            <table id="dt-basic-checkbox" class="table table-striped table-bordered" cellspacing="0" width="100%" id="filesdataTable">
            <? if($report['report_id'] == $row['book_id'] ) {?>
              <thead>
                <tr>
                  <th class="th-sm text-center">Projects</th>
                  <th class="th-sm text-center">Stages</th>
                  <!-- <th class="th-sm">Action</th> -->
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td class="td"><?=$row['project_name'];?></td>
                    <td data-toggle="modal" data-target="#myModalinfo" id="view_project" data-projectid="<?=$row['project_id'];?>">
                        <div class="stepper-wrapper">
                        <? if ($stages > 0) {
                        foreach ($stages as $stage ) { 
                            if($row['project_id'] == $stage['project_id']){?>
                          <div class="stepper-item <?=($stage['status'] == 'completed') ? 'completed' : ''?>">
                            <div class="step-counter"><?=$stage['description'];?></div>
                            <!-- <div class="step-name"><input class="text-center" type="text" value="<?=$stage['description'];?>" name="description"></div> -->
                        </div>
                    <?}
                        }
                    } ?>

                    </div>
                    </td>
                  </tr>
                </tbody>
                <?}
              ?>
            </table>
        </div>
    </div>
      <? }
    } ?>
    <!-- <div class="row">
        <div class="col-md-12 text-center mb-3">
            <div class="alert alert-success"><p></p></div>
            <button type="button" class="btn btn-warning text-white font-weight-bold" id="update_projects">Update</button>
        </div>
    </div> -->

    </form>	 
      </div>
    </div>
          <br />

          <div class="row">


    
                </div>
                <!-- end of weather widget -->
              </div>
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
          <!-- services modal -->
          <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">ADD SERVICES</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="add_project_form" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="font-weight-bold">Projects</label>
                                <!-- <input class="text-center" type="text" name="services"> -->
                                <div>
                                <input type="hidden" name="report_id" value="<?=$report_id?>">
                                <select class="browser-default form-control" name="project_name">
                                    <option selected >Select Services</option>
                                    <option value="Publishing">Publishing</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Book Management">Book Management</option>
                                    <option value="Book Return Insurance">Book Return Insurance</option>
                                    <option value="Custom Illustration">Custom Illustration</option>
                                    <option value="Hard Cover Upgrade">Hard Cover Upgrade</option>
                                    <option value="Cover Customization">Cover Customization</option>
                                    <option value="Content Editing">Content Editing</option>
                                </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <label class="font-weight-bold">Book Title</label>
                                <div>
                                <select class="browser-default form-control" name="book_title" style="width:350px; border:1px solid orange;">
                                    <option value=''>Select a book.....   </option>
                                    <option value=''>Book Title</option>
                                </select>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <button  type="button" class="btn btn-default text-warning float-right" onclick="addDescription()"><i class="fa fa-plus"></i> Add Description</button>
                            </div>
                        </div>
                        <div id="description">
                            <label>Description</label>
                            <input class="form-control" type="text" name="description[]">
                        </div>
                        <div id="add_description"></div>
                        <div class="text-center mt-2">
                            <button type="button" class="btn btn-warning" id="add_project">Save</button>
                        </div>
                        <div class="alert alert-success"><p></p></div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-warning" id="add_project">Save</button> -->
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal" id="myModalinfo">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">UPDATE PROJECT</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="update_project_form" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Project Name</label>
                                <!-- <input class="text-center" type="text" name="services"> -->
                                <div>
                                <select id="project_name" class="browser-default form-control" name="project_name">
                                    <option disabled >Select Services</option>
                                    <option value="Publishing">Publishing</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Book Management">Book Management</option>
                                    <option value="Book Return Insurance">Book Return Insurance</option>
                                    <option value="Custom Illustration">Custom Illustration</option>
                                    <option value="Hard Cover Upgrade">Hard Cover Upgrade</option>
                                    <option value="Cover Customization">Cover Customization</option>
                                    <option value="Content Editing">Content Editing</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="details_stage">
                            <!-- <label>Description</label>
                            <input type="text" value="status" name="description[]"> -->
                        </div>
                        <div class="text-center mt-2">
                            <button type="button" class="btn btn-warning" id="update_project">Update</button>
                        </div>
                        <div class="alert alert-success mt-2"><p></p></div>
                        
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-warning" id="update_project">Update</button> -->
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
          <!-- end of services modal -->
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

          <!-- The payment  Remark-->
                <div class="modal fade" id="vewleadreamarkmodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Remark</h4>
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
            <!-- The History Leas  Remark-->
                <div class="modal fade" id="viewfilehistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                       <div class="modal-header">
                            <h4 class="modal-title">FileS History</h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                            <div class="modal-body">
                         <form id="file_form">
                            <div class="alert alert-success"><p></p></div>
                            <div class="row">
                            <div class="col-md-12 border-right project_file_area" style="height: 694.5px;">
                              <input type="hidden" id="file_id" name="file_id" class="form-control" readonly value="">
                              <iframe class="iframe" src="" frameBorder="0" scrolling="auto"
                                    height="30%"
                                    width="100%"
                                ></iframe>
                               <div class="form-group" app-field-wrapper="file_subject"><label for="file_subject" class="control-label">Subject</label><input type="text" id="file_subject" name="file_name" class="form-control" readonly value=""></div> 
                            <div class="form-group" app-field-wrapper="file_description"><label for="file_description" class="control-label">Remark</label><textarea id="file_description" name="remark" class="form-control"  rows="4"></textarea></div> <hr>
                             <div class="table-responsive" style="height:215px;">
                                      <table class="table table-bordered" id="historyfileTable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>User Charge</th>
                                            <th>Remark</th>
                                            <th>Time Ago</th>
                                            <th>Date Remark</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewfilehistory">

                                 </tbody>
                              </table>
                              </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" id="add_file" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                  </div>
                    </form>
                </div>
            <!-- end of Remark modal -->

     <script>var base_url = "<?php echo base_url(); ?>";</script>
    <!-- jQuery -->
    <!-- <script src="<?php echo base_url('js/jquery.min.js');?>"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    
    <!-- DateJS -->
    <script src="<?php echo base_url('bootstrap/vendors/DateJS/build/date.js');?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/dist/jquery.vmap.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/dist/maps/jquery.vmap.world.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js');?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('bootstrap/vendors/moment/min/moment.min.js');?>"></script>
    <script src="<?php echo base_url('js/jquery.timeago.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('bootstrap/build/js/custom.min.js'); ?>"></script>
    <!-- <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script> -->
    <!-- <script src="<?php echo base_url('js/croppie.js');?>"></script> -->
    <script src="<?php echo base_url('js/croppie.js');?>"></script>
    <script src="<?php echo base_url('js/services.js');?>"></script>


     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>

  </body>
</html>
