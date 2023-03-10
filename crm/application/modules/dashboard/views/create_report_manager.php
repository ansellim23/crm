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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
        #addreportModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #updatereportModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
        #viewreportModal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
        #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}
       .signup-form form a{color: #212621 !important;}


    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}

 .signup-form{width: 100%;}
 .signup-form form{overflow: scroll;}
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
    width: 100%;
    display: inline-block;
}
.inline-block{
  margin: 15px 0px auto 0px;
}
label {
    display: inline-block;
    margin-bottom: .5rem;
    color: #000000;
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
                      <li><a href="<?php echo site_url("dashboard/attendance")?>"><i class="fa fa-clock-o"></i> Attendance</a> </li>
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



                      <div class="signup-form">
                      <form id="addreportform" method="post">
                        <h2>Production Manual</h2>
                        <p class="hint-text">Create Report.</p>
                        <span class="col-sm-12">Project Information</span></br></br>
                           <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Project ID</label>                         
                              <select class="form-control project_id selectpicker" name="project_id" data-live-search="true">
                                <option value="">Please Select A Project ID</option>
                                <?php 
                                   if ($author_names > 0){
                                       foreach ($author_names as $author_name){
                                         echo "<option value='".$author_name['project_id']."'>".modules::run("dashboard/setindex_prefix",$author_name['project_id'])."</option>";
                                     }
                                  } 
                                ?>
                              </select>
                           </div>
                          <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Date Sold</label>                         
                              <input class="form-control date_sold" name="date_sold"  id="date_sold" type="text" placeholder="-- -- ----" readonly>
                           </div>
                           <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Project Status</label>                         
                               <select class="form-control project_status" name="project_status" readonly>
                                <option value="">Please Select A Project Status</option>
                                <option value="For full collection">For full collection</option>
                                <option value="Pending Approval">Pending Approval</option>
                                  
                                <option value="Submitted">Submitted</option>
                                <option value="Revisioned">Revisioned</option>
                              </select>
                           </div>
                           <span class="form-group col-sm-12">Book Design and Marketing</span></br></br>
                             <div class="form-group col-sm-4 flex-column d-flex">
                              <label for="validationCustom03">Interior Designer</label>                         
                                 <select class="form-control interior_designer" name="interior_designer" readonly>
                                      <option value="">Please Select An Interior Designer</option>
                                      <?php 
                                         if ($interior_designers > 0){
                                             foreach ($interior_designers as $interior_designer){
                                               echo "<option value='".$interior_designer['user_id']."'>".$interior_designer['firstname'] .' '.$interior_designer['lastname'] ."</option>";
                                           }
                                        } 
                                      ?>
                                  </select>
                            </div>
                             <div class="form-group col-sm-4 flex-column d-flex">
                              <label for="validationCustom03">Cover Designer</label>                         
                                  <select class="form-control cover_designer" name="cover_designer" readonly>
                                      <option value="">Please Select An Interior Designer</option>
                                      <?php 
                                         if ($cover_designers > 0){
                                             foreach ($cover_designers as $cover_designer){
                                               echo "<option value='".$cover_designer['user_id']."'>".$cover_designer['firstname'] .' '.$cover_designer['lastname'] ."</option>";
                                           }
                                        } 
                                      ?>
                                  </select>
                            </div>
                            <div class="form-group col-sm-4 flex-column d-flex">
                              <label for="validationCustom03">Publisher/Marketing</label>                         
                                 <select class="form-control publisher_id" name="publisher_id" readonly>
                                      <option value="">Please Select A Publisher/Marketing</option>
                                      <?php 
                                         if ($publishers > 0){
                                             foreach ($publishers as $publisher){
                                               echo "<option value='".$publisher['user_id']."'>".$publisher['firstname'] .' '.$publisher['lastname'] ."</option>";
                                           }
                                        } 
                                      ?>
                                  </select>
                            </div>
                            <span class="form-group col-sm-12">Author's Information</span></br></br>
                           <div class="form-group col-sm-6 flex-column d-flex">
                            <label for="validationCustom03">Author's Name</label>                         
                              <input class="form-control author_name" readonly name="author_name"  id="author_name" type="text" placeholder="Enter the Author's Name" readonly>
                           </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                              <label for="validationCustom03">Pen Name</label>                         
                               <input class="form-control pen_name" name="pen_name"  id="pen_name" type="text" placeholder="Enter the Pen Name" readonly>
                           </div>

                           <span class="form-group col-sm-12">Book's Information</span></br></br>
                           <div class="form-group col-sm-3 flex-column d-flex">
                              <label for="validationCustom03">Author's Book Count</label>                         
                               <input class="form-control number_of_book" name="number_of_book"  id="number_of_book" type="text" placeholder="Enter the Number of Books" readonly>
                           </div>
                           <div class="form-group col-sm-3 flex-column d-flex">
                            <label for="validationCustom03">Book Categories</label>                         
                               <select class="form-control book_categories selectpicker" name="book_categories" id="book_categories" data-live-search="true">
                                <option value="">Please Select A Book Categories</option>
                                <option value="Art/General">Art/General</option>
                                <option value="Biography & Autobiography">Biography & Autobiography/</option>
                                <option value="Biography & Autobiography/General">Biography & Autobiography/General</option>
                                <option value="Biography & Autobiography/Rich & Famous">Biography & Autobiography/Rich & Famous</option>
                                <option value="Body, Mind & Spirit/Occultism">Body, Mind & Spirit/Occultism</option>
                                <option value="Body, Mind & Spirit/Supernatural">Body, Mind & Spirit/Supernatural</option>
                                <option value="Business & Economics/Careers/General">Business & Economics/Careers/General</option>
                                <option value="Business & Economics/General">Business & Economics/General</option>
                                <option value="Computers/General">Computers/General</option>
                                <option value="Cooking/General">Cooking/General</option>
                                <option value="Education/General">Education/General</option>
                                <option value="Entertainment & Performing Arts">Entertainment & Performing Arts</option>
                                <option value="Family & Relationships/Divorce">Family & Relationships/Divorce</option>
                                <option value="Family & Relationships/General">Family & Relationships/General</option>
                                <option value="Family & Relationships/Marriage">Family & Relationships/Marriage</option>
                                <option value="Family & Relationships/Parent & Adult Child">Family & Relationships/Parent & Adult Child</option>
                                <option value="Family & Relationships/Parenting">Family & Relationships/Parenting</option>
                                <option value="Fiction/Action & Adventure">Fiction/Action & Adventure</option>
                                <option value="Fiction/Classics">Fiction/Classics</option>
                                <option value="Fiction/Erotica">Fiction/Erotica</option>
                                <option value="Fiction/Fantasy/General">Fiction/Fantasy/General</option>
                                <option value="Fiction/Gay">Fiction/Gay</option>
                                <option value="Fiction/General">Fiction/General</option>
                                <option value="Fiction/History ">Fiction/History </option>
                                <option value="Fiction/Horror">Fiction/Horror</option>
                                <option value="Fiction/Lesbian">Fiction/Lesbian</option>
                                <option value="Fiction/Science Fiction/General">Fiction/Science Fiction/General</option>
                                <option value="Fiction/Short Stories (single author)">Fiction/Short Stories (single author)</option>
                                <option value="Fiction/Suspense">Fiction/Suspense</option>
                                <option value="Fiction/Thrillers">Fiction/Thrillers</option>
                                <option value="Fiction/Westerns">Fiction/Westerns</option>
                                <option value="Foreign Languages Study/General">Foreign Languages Study/General</option>
                                <option value="Health & Fitness/General">Health & Fitness/General</option>
                                <option value="Health & Fitness/Sexuality">Health & Fitness/Sexuality</option>
                                <option value="History/General">History/General</option>
                                <option value="History/Military/General">History/Military/General</option>
                                <option value="History/Native American">History/Native American</option>
                                <option value="House & Home/Repair">House & Home/Repair</option>
                                <option value="Humor/General">Humor/General</option>
                                <option value="Juvenile Fiction/General">Juvenile Fiction/General</option>
                                <option value="Juvenile Nonfiction/General">Juvenile Nonfiction/General</option>
                                <option value="Language Arts & Disciplines/General">Language Arts & Disciplines/General</option>
                                <option value="Law/General">Law/General</option>
                                <option value="Literary Collections/General">Literary Collections/General</option>
                                <option value="Mathematics/General">Mathematics/General</option>
                                <option value="Music/General">Music/General</option>
                                <option value="Nature/Animals">Nature/Animals</option>
                                <option value="Nature/General">Nature/General</option>
                                <option value="Performing Arts/General">Performing Arts/General</option>
                                <option value="Pets/General">Pets/General</option>
                                <option value="Philosophy/General">Philosophy/General</option>
                                <option value="Poetry/General">Poetry/General</option>
                                <option value="Political Science/General">Political Science/General</option>
                                <option value="Psychology/General">Psychology/General</option>
                                <option value="Reference/Genealogy">Reference/Genealogy</option>
                                <option value="Reference/General">Reference/General</option>
                                <option value="Reference/Personal & Practical Guides">Reference/Personal & Practical Guides</option>
                                <option value="Religion/Holidays/Christmas">Religion/Holidays/Christmas</option>
                                <option value="Religion/Inspirational">Religion/Inspirational</option>
                                <option value="Religion/Spirituality">Religion/Spirituality</option>
                                <option value="Science/General">Science/General</option>
                                <option value="Self-Help/General">Self-Help/General</option>
                                <option value="Social Science/Ethnic Studies/African-American Studies">Social Science/Ethnic Studies/African-American Studies</option>
                                <option value="Social Science/Ethnic Studies/General">Social Science/Ethnic Studies/General</option>
                                <option value="Social Science/Ethnic Studies/Hispanic-American Studies">Social Science/Ethnic Studies/Hispanic-American Studies</option>
                                <option value="Social Science/Handicapped">Social Science/Handicapped</option>
                                <option value="Social Science/Sociology/General">Social Science/Sociology/General</option>
                                <option value="Social Science/Women???s Studies">Social Science/Women???s Studies</option>
                                <option value="Sports & Recreation/General">Sports & Recreation/General</option>
                                <option value="Sports & Recreation/Martial Arts & Self-Defense">Sports & Recreation/Martial Arts & Self-Defense</option>
                                <option value="Technology/General">Technology/General</option>
                                <option value="Transportation/Automotive/General">Transportation/Automotive/General</option>
                                <option value="Transportation/Aviation/General">Transportation/Aviation/General</option>
                                <option value="Travel/General">Travel/General</option>
                              </select>
                           </div>
                           <div class="form-group col-sm-3 flex-column d-flex">
                            <label for="validationCustom03">Book Color Type</label>                         
                               <select class="form-control book_color" name="book_color" readonly>
                                <option value="">Please Select A Book Color Type</option>
                                <option value="Full Color/Children's Book">Full Color/Children's Book</option>
                                <option value="Black and White">Black and White</option>
                              </select>
                           </div>
                            <div class="form-group col-sm-3 flex-column d-flex">
                            <label for="validationCustom03">Book Size</label>                         
                               <select class="form-control book_size" name="book_size" readonly>
                                <option value="">Please Select A Size</option>
                                <option value="5 x 8">5 x 8</option>
                                <option value="5.5 x 8.5">5.5 x 8.5</option>
                                <option value="6 x 9">6 x 9</option>
                                <option value="8.5 x 8.5">8.5 x 8.5</option>
                                <option value="8.5 x 11">8.5 x 11</option>
                              </select>
                           </div>
                          
                            <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Paper Color Type</label>                         
                               <select class="form-control color_type" name="color_type" readonly>
                                <option value="">Please Select A Paper Color Type</option>
                                <option value="Creme">Creme</option>
                                <option value="White">White</option>
                              </select>
                           </div>
                           <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Hardcover Format (if applicable)</label>                         
                              <select class="form-control hard_cover_format" name="hard_cover_format" readonly>
                                <option value="">Please A Hardcover Format</option>
                                <option value="Dustjacket">Dustjacket</option>
                                <option value="Casebound">Casebound</option>
                              </select>                           
                            </div>
                           <div class="form-group col-sm-4 flex-column d-flex">
                             <label for="validationCustom03">Audience</label>                         
                               <input class="form-control audience" name="audience"  id="audience" type="text" placeholder="Enter the Audience" readonly>
                           </div>
                           <div class="form-group col-sm-4 flex-column d-flex">
                              <label for="validationCustom03">Book Title/s & Sub Title/s</label>                         
                                <textarea class="form-control book_title" readonly rows="2" name="book_title" readonly></textarea>
                           </div>
                            <div class="form-group col-sm-4 flex-column d-flex">
                              <label for="validationCustom03">About the Author</label>                         
                                  <textarea class="form-control about_author" rows="2" name="about_author" readonly></textarea>
                           </div>
                            <div class="form-group col-sm-4 flex-column d-flex">
                              <label for="validationCustom03">About the Book</label>                         
                                  <textarea class="form-control about_book" rows="2" name="about_book" readonly></textarea>
                           </div>
                            <div class="form-group col-sm-3 flex-column d-flex">
                              <label for="validationCustom03">Cover Design Instructions</label>                         
                                <textarea class="form-control cover_design" rows="2" name="cover_design" readonly></textarea>
                            </div>
                            <div class="form-group col-sm-3 flex-column d-flex">
                              <label for="validationCustom03">Interior Design Instructions</label>                         
                                <textarea class="form-control interior_design" rows="2" name="interior_design" readonly></textarea>
                            </div>
                            <div class="form-group col-sm-3 flex-column d-flex">
                              <label for="validationCustom03">Publishing Logo Instructions</label>                         
                                  <textarea class="form-control publishing_logo" rows="2" name="publishing_logo" readonly></textarea>
                            </div>
                             <div class="form-group col-sm-3 flex-column d-flex">
                              <label for="validationCustom03">Mailing Address</label>                         
                                  <textarea class="form-control mailing_address"  rows="2" name="mailing_address" readonly></textarea>
                            </div>
                           <div class="form-group col-sm-4 flex-column d-flex">
                               <label for="validationCustom03">Publishing Name</label>                         
                               <input class="form-control publishing_name" name="publishing_name"  id="publishing_name" type="text" placeholder="Enter the Publishing Name" readonly>
                           </div>
                            <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Author's Picture</label>                         
                              <select class="form-control author_picture" name="author_picture" readonly>
                                <option value="Pending">Pending</option>
                                <option value="Done">Done</option>
                              </select>                           
                            </div>
                             <div class="form-group col-sm-4 flex-column d-flex">
                               <label for="validationCustom03">Package Name</label>                         
                               <input class="form-control service_offered"  readonly name="service_offered"  id="service_offered" type="text" placeholder="Enter the Service Offered" readonly>
                           </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <button style="float:right; height:50px; width:10%;" type="button" class="btn btn-primary fa fa-plus" id="add_more_report">ADD MORE</button>
                               <table class="table table-bordered" id="leaddataTableFixed" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th style="width:100  px;">Page Number</th>
                                      <th>Paragraph Number</th>
                                      <th>Line Number</th>
                                      <th>Actual Sentence/Word</th>
                                      <th>Correct Sentence/Word</th>
                                      <th style="width:130px;">Remove</th>
                                      <th style="display:none;"></th>
                                    </tr>
                                  </thead>
                                  <tbody class="author_report_detail">
                                      <tr>
                                        <td><input class="form-control page_number" name="page_number[]" style="height:50px; width:90px;" id="page_number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="Enter the Page Number"></td>              
                                        <td style="width:100px;"><input type="text" class="form-control paragraph_number" name="paragraph_number[]" style="height:50px;" id="paragraph_number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  placeholder="Enter the Paragraph Number"></td>
                                        <td style="width:100px;"><input type="text" class="form-control line_number" name="line_number[]" style="height:50px;" id="line_number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  placeholder="Enter the Line Number"></td>
                                        <td style="width:520px;"><textarea class="form-control actual_sentence" rows="2" name="actual_sentence[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_sentence" rows="2" name="correct_sentence[]"></textarea></td>
                                        <td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>
                                      </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                               <table class="table table-bordered" id="front_coverdataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>Front Cover Instructions</th>
                                      <th>Actual Cover</th>
                                      <th>Correct Cover</th>
                                      <th style="display:none;"></th>

                                    </tr>
                                  </thead>
                                  <tbody class="front_cover_report_detail">
                                      <tr>
                                        <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="Design Wise" style="height:50px;" id="front_back_cover"  readonly></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="front_cover" style="height:50px;" id="status_cover"  readonly></td>

                                      </tr>
                                       <tr>
                                        <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="By Line" style="height:50px;" id="front_back_cover"  readonly></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="front_cover" style="height:50px;" id="status_cover"  readonly></td>

                                      </tr>
                                       <tr>
                                        <td style="width:520px;"><textarea class="form-control front_back_cover" rows="2" name="front_back_cover[]" readonly>Endorsements (Quotes, achievements, certificates, awards, Dedication and etc.)</textarea></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="front_cover" style="height:50px;" id="status_cover"  readonly></td>

                                      </tr>
                                       <tr>
                                        <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="Genre" style="height:50px;" id="front_back_cover"  readonly></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="front_cover" style="height:50px;" id="status_cover"  readonly></td>

                                      </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                               <table class="table table-bordered" id="back_coverdataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>Back Cover Instructions</th>
                                      <th>Actual Cover</th>
                                      <th>Correct Cover</th>
                                      <th style="display:none;"></th>
                                    </tr>
                                  </thead>
                                  <tbody class="back_cover_report_detail">
                                      <tr>
                                         <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="Design Wise" style="height:50px;" id="front_back_cover"  readonly></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>

                                      </tr>
                                       <tr>
                                         <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="About the author" style="height:50px;" id="front_back_cover"  readonly></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>
                                      </tr>
                                       <tr>
                                         <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="About the book" style="height:50px;" id="front_back_cover"  readonly></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>
                                      </tr>
                                       <tr>
                                        <td style="width:520px;"><textarea class="form-control front_back_cover" readonly rows="2" name="front_back_cover[]">QR code (only for authors with linked website)</textarea></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>
                                      </tr>
                                      <tr>
                                        <td style="width:520px;"><textarea class="form-control front_back_cover" readonly rows="2" name="front_back_cover[]">Endorsements (Quotes, achievements, certificates, awards, Dedication and etc.)</textarea></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>
                                      </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                           <div class="alert alert-success"><p></p></div>
                        <div class="form-group" style="text-align: center;">
                                <button type="button" id="add_report" class="btn btn-success btn-lg btn-block" style="width:10%;">Save</button>
                                <a href="<?php echo site_url("dashboard/report")?>" class="btn btn-primary " style="width:18%; color:#ffffff;">Go back to Production Manual</a>


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

           <!-- Add Report Author -->
         <div class="modal fade" id="addreportModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="addreportform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Production Manual</h2>
                        <p class="hint-text">Create Report.</p>
                          <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Date Sold</label>                         
                              <input class="form-control date_sold" name="date_sold"  id="date_sold" readonly type="text" placeholder="Date Sold">
                           </div>
                           <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Project Status</label>                         
                               <select class="form-control project_status" name="project_status" >
                                <option value="">Please Select A Project Status</option>
                                <option value="For full collection">For full collection</option>
                                <option value="Pending Approval">Pending Approval</option>
                                  
                                <option value="Submitted">Submitted</option>
                                <option value="Revisioned">Revisioned</option>
                              </select>
                           </div>
                           <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Project ID</label>                         
                               <select class="form-control project_id" name="project_id" >
                                <option value="">Please Select A Project ID</option>
                                <?php 
                                   if ($author_names > 0){
                                       foreach ($author_names as $author_name){
                                         echo "<option value='".$author_name['project_id']."'>".modules::run("dashboard/setindex_prefix",$author_name['project_id'])."</option>";
                                     }
                                  } 
                                ?>
                              </select>
                           </div>
                             <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Interior Designer</label>                         
                                 <select class="form-control interior_designer" name="interior_designer" >
                                      <option value="">Please Select An Interior Designer</option>
                                      <?php 
                                         if ($interior_designers > 0){
                                             foreach ($interior_designers as $interior_designer){
                                               echo "<option value='".$interior_designer['user_id']."'>".$interior_designer['firstname'] .' '.$interior_designer['lastname'] ."</option>";
                                           }
                                        } 
                                      ?>
                                  </select>
                            </div>
                             <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Cover Designer</label>                         
                                  <select class="form-control cover_designer" name="cover_designer" >
                                      <option value="">Please Select An Interior Designer</option>
                                      <?php 
                                         if ($cover_designers > 0){
                                             foreach ($cover_designers as $cover_designer){
                                               echo "<option value='".$cover_designer['user_id']."'>".$cover_designer['firstname'] .' '.$cover_designer['lastname'] ."</option>";
                                           }
                                        } 
                                      ?>
                                  </select>
                            </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Publisher/Marketing</label>                         
                                 <select class="form-control publisher_id" name="publisher_id" >
                                      <option value="">Please Select A Publisher/Marketing</option>
                                      <?php 
                                         if ($publishers > 0){
                                             foreach ($publishers as $publisher){
                                               echo "<option value='".$publisher['user_id']."'>".$publisher['firstname'] .' '.$publisher['lastname'] ."</option>";
                                           }
                                        } 
                                      ?>
                                  </select>
                            </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Pen Name</label>                         
                               <input class="form-control pen_name" name="pen_name"  id="pen_name" type="text" placeholder="Enter the Pen Name">
                           </div>
                          <div style="margin:150px 0px 0px 0px;">
                           <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Author's Name</label>                         
                              <input class="form-control author_name" readonly name="author_name"  id="author_name" type="text" placeholder="Enter the Author's Name">
                           </div>
                           <div class="col-sm-1 inline-block">
                              <label for="validationCustom03">Author's Book Count</label>                         
                               <input class="form-control number_of_book" name="number_of_book"  id="number_of_book" type="text" placeholder="Enter the Number of Books">
                           </div>
                           <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Book Title/s & Sub Title/s</label>                         
                                <textarea class="form-control book_title" readonly rows="2" name="book_title"></textarea>
                           </div>
                           <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Book Categories</label>                         
                               <select class="form-control book_categories selectpicker" name="book_categories" data-live-search="true" id="book_categories">
                                <option value="">Please Select A Book Categories</option>
                                <option value="Art/General">Art/General</option>
                                <option value="Biography & Autobiography">Biography & Autobiography/</option>
                                <option value="Biography & Autobiography/General">Biography & Autobiography/General</option>
                                <option value="Biography & Autobiography/Rich & Famous">Biography & Autobiography/Rich & Famous</option>
                                <option value="Body, Mind & Spirit/Occultism">Body, Mind & Spirit/Occultism</option>
                                <option value="Body, Mind & Spirit/Supernatural">Body, Mind & Spirit/Supernatural</option>
                                <option value="Business & Economics/Careers/General">Business & Economics/Careers/General</option>
                                <option value="Business & Economics/General">Business & Economics/General</option>
                                <option value="Computers/General">Computers/General</option>
                                <option value="Cooking/General">Cooking/General</option>
                                <option value="Education/General">Education/General</option>
                                <option value="Entertainment & Performing Arts">Entertainment & Performing Arts</option>
                                <option value="Family & Relationships/Divorce">Family & Relationships/Divorce</option>
                                <option value="Family & Relationships/General">Family & Relationships/General</option>
                                <option value="Family & Relationships/Marriage">Family & Relationships/Marriage</option>
                                <option value="Family & Relationships/Parent & Adult Child">Family & Relationships/Parent & Adult Child</option>
                                <option value="Family & Relationships/Parenting">Family & Relationships/Parenting</option>
                                <option value="Fiction/Action & Adventure">Fiction/Action & Adventure</option>
                                <option value="Fiction/Classics">Fiction/Classics</option>
                                <option value="Fiction/Erotica">Fiction/Erotica</option>
                                <option value="Fiction/Fantasy/General">Fiction/Fantasy/General</option>
                                <option value="Fiction/Gay">Fiction/Gay</option>
                                <option value="Fiction/General">Fiction/General</option>
                                <option value="Fiction/History ">Fiction/History </option>
                                <option value="Fiction/Horror">Fiction/Horror</option>
                                <option value="Fiction/Lesbian">Fiction/Lesbian</option>
                                <option value="Fiction/Science Fiction/General">Fiction/Science Fiction/General</option>
                                <option value="Fiction/Short Stories (single author)">Fiction/Short Stories (single author)</option>
                                <option value="Fiction/Suspense">Fiction/Suspense</option>
                                <option value="Fiction/Thrillers">Fiction/Thrillers</option>
                                <option value="Fiction/Westerns">Fiction/Westerns</option>
                                <option value="Foreign Languages Study/General">Foreign Languages Study/General</option>
                                <option value="Health & Fitness/General">Health & Fitness/General</option>
                                <option value="Health & Fitness/Sexuality">Health & Fitness/Sexuality</option>
                                <option value="History/General">History/General</option>
                                <option value="History/Military/General">History/Military/General</option>
                                <option value="History/Native American">History/Native American</option>
                                <option value="House & Home/Repair">House & Home/Repair</option>
                                <option value="Humor/General">Humor/General</option>
                                <option value="Juvenile Fiction/General">Juvenile Fiction/General</option>
                                <option value="Juvenile Nonfiction/General">Juvenile Nonfiction/General</option>
                                <option value="Language Arts & Disciplines/General">Language Arts & Disciplines/General</option>
                                <option value="Law/General">Law/General</option>
                                <option value="Literary Collections/General">Literary Collections/General</option>
                                <option value="Mathematics/General">Mathematics/General</option>
                                <option value="Music/General">Music/General</option>
                                <option value="Nature/Animals">Nature/Animals</option>
                                <option value="Nature/General">Nature/General</option>
                                <option value="Performing Arts/General">Performing Arts/General</option>
                                <option value="Pets/General">Pets/General</option>
                                <option value="Philosophy/General">Philosophy/General</option>
                                <option value="Poetry/General">Poetry/General</option>
                                <option value="Political Science/General">Political Science/General</option>
                                <option value="Psychology/General">Psychology/General</option>
                                <option value="Reference/Genealogy">Reference/Genealogy</option>
                                <option value="Reference/General">Reference/General</option>
                                <option value="Reference/Personal & Practical Guides">Reference/Personal & Practical Guides</option>
                                <option value="Religion/Holidays/Christmas">Religion/Holidays/Christmas</option>
                                <option value="Religion/Inspirational">Religion/Inspirational</option>
                                <option value="Religion/Spirituality">Religion/Spirituality</option>
                                <option value="Science/General">Science/General</option>
                                <option value="Self-Help/General">Self-Help/General</option>
                                <option value="Social Science/Ethnic Studies/African-American Studies">Social Science/Ethnic Studies/African-American Studies</option>
                                <option value="Social Science/Ethnic Studies/General">Social Science/Ethnic Studies/General</option>
                                <option value="Social Science/Ethnic Studies/Hispanic-American Studies">Social Science/Ethnic Studies/Hispanic-American Studies</option>
                                <option value="Social Science/Handicapped">Social Science/Handicapped</option>
                                <option value="Social Science/Sociology/General">Social Science/Sociology/General</option>
                                <option value="Social Science/Women???s Studies">Social Science/Women???s Studies</option>
                                <option value="Sports & Recreation/General">Sports & Recreation/General</option>
                                <option value="Sports & Recreation/Martial Arts & Self-Defense">Sports & Recreation/Martial Arts & Self-Defense</option>
                                <option value="Technology/General">Technology/General</option>
                                <option value="Transportation/Automotive/General">Transportation/Automotive/General</option>
                                <option value="Transportation/Aviation/General">Transportation/Aviation/General</option>
                                <option value="Travel/General">Travel/General</option>
                              </select>
                           </div>
                           <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Book Color Type</label>                         
                               <select class="form-control book_color" name="book_color" >
                                <option value="">Please Select A Book Color Type</option>
                                <option value="Full Color/Children's Book">Full Color/Children's Book</option>
                                <option value="Black and White">Black and White</option>
                              </select>
                           </div>
                            <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Book Size</label>                         
                               <select class="form-control book_size" name="book_size" >
                                <option value="">Please Select A Size</option>
                                <option value="5 x 8">5 x 8</option>
                                <option value="5.5 x 8.5">5.5 x 8.5</option>
                                <option value="6 x 9">6 x 9</option>
                                <option value="8.5 x 8.5">8.5 x 8.5</option>
                                <option value="8.5 x 11">8.5 x 11</option>
                              </select>
                           </div>
                          </div>
                        <div style="margin:270px 0px 220px 0px;">
                            <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Paper Color Type</label>                         
                               <select class="form-control color_type" name="color_type" >
                                <option value="">Please Select A Paper Color Type</option>
                                <option value="Creme">Creme</option>
                                <option value="White">White</option>
                              </select>
                           </div>
                           <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Hardcover Format (if applicable)</label>                         
                              <select class="form-control hard_cover_format" name="hard_cover_format" >
                                <option value="">Please A Hardcover Format</option>
                                <option value="Dustjacket">Dustjacket</option>
                                <option value="Casebound">Casebound</option>
                              </select>                           
                            </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">About the Author</label>                         
                                  <textarea class="form-control about_author" rows="2" name="about_author"></textarea>
                           </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">About the Book</label>                         
                                  <textarea class="form-control about_book" rows="2" name="about_book"></textarea>
                           </div>
                           <div class="col-sm-2 inline-block">
                             <label for="validationCustom03">Audience</label>                         
                               <input class="form-control audience" name="audience"  id="audience" type="text" placeholder="Enter the Audience">
                           </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Cover Design Instructions</label>                         
                                <textarea class="form-control cover_design" rows="2" name="cover_design"></textarea>
                            </div>
                          </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Interior Design Instructions</label>                         
                                <textarea class="form-control interior_design" rows="2" name="interior_design"></textarea>
                            </div>
                             <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Mailing Address</label>                         
                                  <textarea class="form-control mailing_address"  rows="2" name="mailing_address"></textarea>
                            </div>
                           <div class="col-sm-2 inline-block">
                               <label for="validationCustom03">Publishing Name</label>                         
                               <input class="form-control publishing_name" name="publishing_name"  id="publishing_name" type="text" placeholder="Enter the Publishing Name">
                           </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Publishing Logo Instructions</label>                         
                                  <textarea class="form-control publishing_logo" rows="2" name="publishing_logo"></textarea>
                            </div>
                            <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Author's Picture</label>                         
                              <select class="form-control author_picture" name="author_picture">
                                <option value="Pending">Pending</option>
                                <option value="Done">Done</option>
                              </select>                           
                            </div>
                             <div class="col-sm-2 inline-block">
                               <label for="validationCustom03">Package Name</label>                         
                               <input class="form-control service_offered"  readonly name="service_offered"  id="service_offered" type="text" placeholder="Enter the Service Offered">
                           </div>
                            <div class="card-body">
                              <div class="table-responsive">
                               <table class="table table-bordered" id="back_coverdataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>Back Cover Instructions</th>
                                      <th>Actual Cover</th>
                                      <th>Correct Cover</th>
                                      <th style="display:none;"></th>
                                    </tr>
                                  </thead>
                                  <tbody class="back_cover_report_detail">
                                      <tr>
                                         <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="Design Wise" style="height:50px;" id="front_back_cover"  readonly></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>

                                      </tr>
                                       <tr>
                                         <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="About the author" style="height:50px;" id="front_back_cover"  readonly></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>
                                      </tr>
                                       <tr>
                                         <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="About the book" style="height:50px;" id="front_back_cover"  readonly></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>
                                      </tr>
                                       <tr>
                                        <td style="width:520px;"><textarea class="form-control front_back_cover" readonly rows="2" name="front_back_cover[]">QR code (only for authors with linked website)</textarea></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>
                                      </tr>
                                      <tr>
                                        <td style="width:520px;"><textarea class="form-control front_back_cover" readonly rows="2" name="front_back_cover[]">Endorsements (Quotes, achievements, certificates, awards, Dedication and etc.)</textarea></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>
                                      </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                        <div class="form-group">
                                <button type="button" id="add_report" class="btn btn-success btn-lg btn-block" style="width:10%;">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:10%;">Close</button>
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
<!--                                             <th>Remark</th>
 -->                                          </tr>
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
                <div class="modal fade" id="viewreportModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Report History </h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="historyleadtable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Project ID</th>
                                            <th>Author Name</th>
                                            <th>Email Address</th>
                                            <th>Contact #</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Usertype</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewreporthistory">

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
    >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    <script src="<?php echo base_url('js/croppie.js');?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>

 <script>  
 
 $('#leaddataTable').DataTable();
   $('#historyleadtable').DataTable({"autoWidth": false, columnDefs: [
            { width: '10%', targets: 2 }
        ],
        fixedColumns: true});
    $('#addreportform #front_coverdataTable').DataTable({"autoWidth": false, columnDefs: [
            { width: '15%', targets: 0 }
        ],
        "searching": false,
         "paging": false,
         "info": false,

        fixedColumns: true});
    $('#addreportform #back_coverdataTable').DataTable({"autoWidth": false, columnDefs: [
            { width: '15%', targets: 0 }
        ],
        "searching": false,
         "paging": false,
         "info": false,

        fixedColumns: true});
   $('#leaddataTableselectmanager').DataTable({"autoWidth": false, columnDefs: [
            { width: '10%', targets: 2 }
        ],
        fixedColumns: true});
   $(function () {

    // INITIALIZE DATEPICKER PLUGIN
    $('.datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy"
    });
})
</script>
  </body>
</html>
