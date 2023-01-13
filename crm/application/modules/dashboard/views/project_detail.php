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

    <!-- Circular Progressbar Theme Style -->
    <link href="<?php echo base_url('css/circular_progressbar.css');?>" rel="stylesheet">

    <!-- Custom CSS for side Modal -->
    <link href="<?php echo base_url('css/sidemodal.css');?>" rel="stylesheet">

    <!-- Custom CSS for Comment Box -->
    <link href="<?php echo base_url('css/commentbox.css');?>" rel="stylesheet">




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
       #viewfilehistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
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
    <!-- Dropzone -->
         <div class="panel_s project-menu-panel">
          <div class="panel-body">
              <div class="horizontal-scrollable-tabs">
                <div class="scroller arrow-left" style="display: none;"><i class="fa fa-angle-left"></i></div>
                  <div class="scroller arrow-right" style="display: none;"><i class="fa fa-angle-right"></i></div>
                    <div class="horizontal-tabs">
                    <ul class="nav nav-tabs no-margin project-tabs nav-tabs-horizontal" role="tablist">
                    <li class="active project_tab_project_overview">
                    <a data-group="project_overview" role="tab" href="#">
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
                    <a data-group="project_files" role="tab" href="<?=base_url('dashboard/project_timeline/'.$report['project_id'].'/'.$report['report_id']);?>">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    Project Timeline </a>
                    </li>
                    </ul>
                  </div>
                </div>
              </div>
          </div>
     </div>
          <div class="card-header">

  </div>
   <div class="panel_s">
<div class="panel-body">
<div class="row">
<div class="col-md-12 border-right project-overview-left">
<div class="row">
<div class="col-md-12">
  <label>Project</label>
  <select class="form-control" style="max-width: 50%;" onchange="location = this.value;">
    <?
    if($author_reports > 0){
      foreach($author_reports as $row){
        if($row['project_id'] == $report['project_id']){
            echo "<option selected>PROJ".$row['project_id']." - ".$row['book_title']."</option>";
        }else{
            echo "<option value=".site_url('dashboard/project_detail/'.$row['project_id'].'/'.$row['report_id']).">PROJ".$row['project_id']." - ".$row['book_title']."</option>";
         }
      }
    }
    ?>
  </select> </br>
<p class="project-info bold font-size-14"> Overview </p>
</div>
    <div class="col-md-3">
    <table class="table no-margin project-overview-table">
    <tbody>
   <?php foreach ($project_details as $row):?>
    <tr class="project-overview-customer">
    <td class="bold">Author Name</td>
    <td><?=$row['author_name'];?></td>
    </tr>
    <tr class="project-overview-status">
    <td class="bold">Status</td>
    <td><?=$row['status'];?></td>
    </tr>
    <tr class="project-overview-date-created">
    <td class="bold">Date Created</td>
    <td><?=date("d/m/Y", strtotime($row['date_create']));?></td>
    </tr>
    <tr>
    <td class="bold">Date Sold</td>
    <td><?=date("d/m/Y", strtotime($row['date_contract_signed']));?></td>

    </tr>
    <tr>
    <td class="bold">Project ID</td>
    <td><?=modules::run("dashboard/setindex_prefix",$row['project_id'])?></td>
    </tr>
    <tr>
    <td class="bold">Author's Book Count</td>
    <td><?=$row['number_of_books'];?></td>
    </tr>
    <tr>
    <td class="bold">Book Title(s)</td>
    <td><?=$row['book_title'];?></td>
    </tr>
    <tr>
    <td class="bold">Hardcover Format</td>
    <td><?=$row['hard_cover_format'];?></td>
    </tr>
    <tr>
    <td class="bold">About the author</td>
    <td><?=$row['about_author'];?></td>
    </tr>
    <tr>
    <td class="bold">About the book</td>
    <td><?=$row['about_book'];?></td>
    </tr>
    <tr>
    <td class="bold">Audience</td>
    <td><?=$row['audience'];?></td>
    <?php endforeach; ?>
 
    </tbody>
    </table>
</div>
<div class="col-md-5 text-left project-percent-col mtop10">
<div class="col-md-5">
<table class="table no-margin project-overview-table">
  <tbody>
   <?php foreach ($project_details as $row):?>
    <tr class="project-overview-customer">
    <td class="bold">Cover Design Instruction</td>
    <td><?=$row['cover_design_ints'];?></td>
    </tr>
    <tr>
    <td class="bold">Interior Design Instruction</td>
    <td><?=$row['interior_design_ints'];?></td>
    </tr>
    <tr>
    <td class="bold">Publishing Name</td>
    <td><?=$row['publishing_name'];?></td>
    </tr>
    <tr>
    <td class="bold">Author's Picture Status</td>
    <td><?=$row['author_picture'];?></td>
    </tr>
    <tr>
    <td class="bold">Book Size</td>
    <td><?=$row['book_size'];?></td>
    </tr>
    <tr>
    <td class="bold">Paper Color Type</td>
    <td><?=$row['book_colortype'];?></td>
    </tr>
    <tr>
    <td class="bold">Paper Type</td>
    <td><?=$row['book_size'];?></td>
    </tr>
    <tr>
    <td class="bold">Book Color Type</td>
    <td><?=$row['book_color'];?></td>
    </tr>
    <tr>
    <td class="bold">Book Categories</td>
     <td><?=$row['book_categories'];?></td>
    </tr>
    <tr>
    <?php endforeach; ?>
    </tbody>
</table>  
  </div>
</div>

<!-- Circular Progressbar for Project Status -->
<div class="col-md-4 text-left project-percent-col mtop10">
<?php foreach ($project_details as $row):
  if($row['project_status'] == 'For full collection'){
  echo "<div class='progress-circle p20'>";
  echo "<span>20%</span>";
}elseif ($row['project_status'] == 'Pending Approval'){
  echo "<div class='progress-circle p40'>";
  echo "<span>40%</span>";
}elseif ($row['project_status'] == 'Approved for Submission'){
  echo "<div class='progress-circle over50 p60'>";
  echo "<span>60%</span>";
}elseif ($row['project_status'] == 'Submitted'){
  echo "<div class='progress-circle over50 p80'>";
  echo "<span>80%</span>";
}elseif ($row['project_status'] == 'Approved Completion'){
  echo "<div class='progress-circle over50 p100'>";
  echo "<span>100%</span>";
}else{
  echo "<div class='progress-circle over50 p20'>";
  echo "<span>20%</span>";
}
?>
    
    <div class="left-half-clipper">
      <div class="first50-bar"></div>
      <div class="value-bar"></div>
    </div>
  </div>
<!-- End of Circular Progressbar for Project Status -->

<div>
  <span>PROJECT STATUS: 
  <div class="btn-group">
  <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?=$row['project_status']; endforeach; ?>
  </button>
  <div class="dropdown-menu">
    <?php if($histories > 0){ ?>
    <?php foreach ($histories as $row): ?>
      <a class="dropdown-item" href="#"><?echo date("m/d/Y", strtotime($row['date_history']))." - ". $row['status_history']; ?></a>
    <? endforeach; } ?>

  </div>
  </span>
</div>

<!-- Comment Box -->
  <div class="detailBox">
      <div class="titleBox">
        <label>Comment Box</label>
<!--           <button type="button" class="close" aria-hidden="true">&times;</button> -->
      </div>
<!--       <div class="commentBox">          
          <p class="taskDescription">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
      </div> -->
      <div class="actionBox">
          <ul class="commentList">
              <? if($comments > 0){
                foreach($comments as $comment){ ?>               
              <li>
                  <div class="commenterImage">
                    <img src="<?echo site_url('images/user.png');?>" />
                  </div>
                  <div class="commentText">
                      <p class=""><?echo $comment['create_remark'];?></p> <span class="date sub-text"><?echo $comment['firstname'].' '.substr($comment['lastname'], 0, 1).'. '.modules::run("dashboard/time_ago",$comment['date_create_remark']);?></span>

                  </div>
              </li>
              <?}
            }?>
          </ul>
          <form class="form-inline" id="comment_form">
              <div class="form-group">
                <input class="form-control" type="text" name="project_id" value="<?echo $report['project_id'];?>" hidden/>
                <input class="form-control" type="text" name="report_id" value="<?echo $report['report_id'];?>" hidden/>
                <input class="form-control" type="text" placeholder="Your comments" name="remark" id="remark" required/>
              </div>
              <div class="form-group">
                  <button type="button" class="btn btn-secondary btn-sm" id="add_comment"> Add</button>
              </div>
          </form>
      </div>
  </div>
<!-- Comment Box -->


</div></br>
</div>
  <table class="table" style="width:50%;">
  <tbody>
    <tr>
      <td><h5 style="font-weight: bold;">Correction Form</h5></td>
    </tr>
    <tr>
      <!-- <td><button type="button" class="btn btn-outline-success btn-lg" data-toggle='modal' data-target="#sidemodal1">Lines/Words</button></td>
      <td><button type="button" class="btn btn-outline-success btn-lg" data-toggle='modal' data-target="#sidemodal2">Front Cover</button></td>
      <td><button type="button" class="btn btn-outline-success btn-lg" data-toggle='modal' data-target="#sidemodal3">Back Cover</button></td> -->


 <td>
<button type="button" class="btn btn-outline-success btn-lg line_word_details" data-toggle='modal' data-target="#sidemodal1" data-project_id="<?=$report['project_id'];?>">Lines/Words</button>
</td>
<td>
<button type="button" class="btn btn-outline-success btn-lg front_cover_details" data-toggle='modal' data-target="#sidemodal2" data-project_id="<?=$report['project_id'];?>" >Front Cover</button>
</td>  
<td>
<button type="button" class="btn btn-outline-success btn-lg back_cover_details" data-toggle='modal' data-target="#sidemodal3" data-project_id="<?=$report['project_id'];?>">Back Cover</button>
</td> 
<td>
<a href="<?php echo site_url("dashboard/updatereport/".$report['project_id']."/".$report['report_id'])?>" class="btn btn-outline-success btn-lg">Edit</a>
</td>
    </tr>
  </tbody>
</table>
</div>

</div>
</div>
<div class="modal fade" id="add-edit-members" tabindex="-1" role="dialog">
<div class="modal-dialog">
<form action="https://www.horizonsliterary.us/crm/admin/projects/add_edit_members/61" method="post" accept-charset="utf-8">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title">Members</h4>
</div>
<div class="modal-body">
<div class="form-group" app-field-wrapper="project_members[]"><label for="project_members[]" class="control-label">Members</label><div class="dropdown bootstrap-select show-tick bs3" style="width: 100%;"><select id="project_members[]" name="project_members[]" class="selectpicker" multiple="1" data-actions-box="1" data-width="100%" data-none-selected-text="Nothing selected" data-live-search="true" tabindex="-98"><option value="47" selected="">Lourie Sanchez</option><option value="46">earllim D</option><option value="12">Collin Maxwell</option><option value="45">chester D</option></select><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" data-id="project_members[]" title="Lourie Sanchez"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Lourie Sanchez</div></div> </div><span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="combobox" aria-label="Search" aria-controls="bs-select-2" aria-autocomplete="list"></div><div class="bs-actionsbox"><div class="btn-group btn-group-sm btn-block"><button type="button" class="actions-btn bs-select-all btn btn-default">Select All</button><button type="button" class="actions-btn bs-deselect-all btn btn-default">Deselect All</button></div></div><div class="inner open" role="listbox" id="bs-select-2" tabindex="-1" aria-multiselectable="true"><ul class="dropdown-menu inner " role="presentation"></ul></div></div></div></div> </div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-info" autocomplete="off" data-loading-text="Please wait...">Save</button>
</div>
</div>

</form></div>

</div>

<script>
   var project_overview_chart = {"data":{"labels":["28 - Monday","29 - Tuesday","30 - Wednesday","01 - Thursday","02 - Friday","03 - Saturday","04 - Sunday"],"datasets":[{"label":"Billable Hours","data":[0,0,0,0,0,0,0],"backgroundColor":["rgba(3, 169, 244,0.8)","rgba(3, 169, 244,0.8)","rgba(3, 169, 244,0.8)","rgba(3, 169, 244,0.8)","rgba(3, 169, 244,0.8)","rgba(3, 169, 244,0.8)","rgba(3, 169, 244,0.8)"],"borderColor":["rgba(3, 169, 244,1)","rgba(3, 169, 244,1)","rgba(3, 169, 244,1)","rgba(3, 169, 244,1)","rgba(3, 169, 244,1)","rgba(3, 169, 244,1)","rgba(3, 169, 244,1)"],"borderWidth":1},{"label":"Unbilled Hours","data":[0,0,0,0,0,0,0],"backgroundColor":["rgba(252, 45, 66,0.8)","rgba(252, 45, 66,0.8)","rgba(252, 45, 66,0.8)","rgba(252, 45, 66,0.8)","rgba(252, 45, 66,0.8)","rgba(252, 45, 66,0.8)","rgba(252, 45, 66,0.8)"],"borderColor":["rgba(252, 45, 66,1)","rgba(252, 45, 66,1)","rgba(252, 45, 66,1)","rgba(252, 45, 66,1)","rgba(252, 45, 66,1)","rgba(252, 45, 66,1)","rgba(252, 45, 66,1)"],"borderWidth":1}]}};
</script>
</div>
</div>
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


            <!--Lines/Words Side Modal-->
                <div  class="modal fade" id="sidemodal1" data-backdrop="true">
                  <div class="modal-dialog modal-right w-xl">
                    <div class="modal-content h-100 no-radius">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Lines/Words</h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form id="update_lines_form">
                            <div class="alert alert-success"><p></p></div>
                             <input type="hidden" readonly class="form-control" name="project_id" placeholder="Project ID" >
                             <input type="hidden" readonly class="form-control" name="interior_designer" placeholder="Project ID" >
                             <input type="hidden" readonly class="form-control" name="publisher_id" placeholder="Project ID" >
                          <div class="modal-body">
                           <div class="card-body">
                              <div class="table-responsive">
                                <button style="float:right; height:50px; width:10%;" type="button" class="btn btn-primary fa fa-plus" id="add_more_report">ADD MORE</button>
                               <table class="table table-bordered" id="leaddataTableFixed" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>Page Number</th>
                                      <th>Paragraph Number</th>
                                      <th>Line Number</th>
                                      <th>Actual Sentence/Word</th>
                                      <th>Correct Sentence/Word</th>
                                      <th>Remove</th>
                                    </tr>
                                  </thead>
                                  <tbody class="author_report_detail">
<!--                                       <tr>
                                        <td><input class="form-control page_number" name="page_number[]" style="height:50px; width:90px;" id="page_number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="Enter the Page Number"></td>              
                                        <td style="width:100px;"><input type="text" class="form-control paragraph_number" name="paragraph_number[]" style="height:50px;" id="paragraph_number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  placeholder="Enter the Paragraph Number"></td>
                                        <td style="width:100px;"><input type="text" class="form-control line_number" name="line_number[]" style="height:50px;" id="line_number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  placeholder="Enter the Line Number"></td>
                                        <td style="width:520px;"><textarea class="form-control actual_sentence" rows="2" name="actual_sentence[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_sentence" rows="2" name="correct_sentence[]"></textarea></td>
                                      </tr> -->
                                  </tbody>
                                </table>
                                 <button style="float:left; height:50px; width:10%;" type="button" class="btn btn-primary fa fa-edit" id="update_line_word"> Update</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      
                    </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

            <!-- Front Cover Side Modal-->
                <div  class="modal fade" id="sidemodal2" data-backdrop="true">
                  <div class="modal-dialog modal-right w-xl">
                    <div class="modal-content h-100 no-radius">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Front Cover</h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form id="update_front_cover_form">
                            <div class="alert alert-success"><p></p></div>
                            <input type="hidden" readonly class="form-control" name="project_id" placeholder="Project ID" >
                            <input type="hidden" readonly class="form-control" name="report_id" value="<?=$report_id;?>" placeholder="Project ID" >
                             <input type="hidden" readonly class="form-control" name="cover_designer" placeholder="Project ID" >
                             <input type="hidden" readonly class="form-control" name="publisher_id" placeholder="Project ID" >
                              <div class="modal-body">
                                <div class="card-body">
                                  <div class="table-responsive">
                                   <table class="table table-bordered" id="front_coverdataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                                          <th style="display:none;"></th>
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
                                          </tr>
                                           <tr>
                                            <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="By Line" style="height:50px;" id="front_back_cover"  readonly></td>
                                            <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                            <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                          </tr>
                                           <tr>
                                            <td style="width:520px;"><textarea class="form-control front_back_cover" rows="2" name="front_back_cover[]" readonly>Endorsements (Quotes, achievements, certificates, awards, Dedication and etc.)</textarea></td>
                                            <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                            <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                          </tr>
                                           <tr>
                                            <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="Genre" style="height:50px;" id="front_back_cover"  readonly></td>
                                            <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                            <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                          </tr>
                                      </tbody>
                                    </table>
                                    <button style="float:left; height:50px; width:10%;" type="button" class="btn btn-primary fa fa-edit" id="update_front_cover"> Update</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          
                    </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

            <!-- Back Cover Side Modal-->
                <div  class="modal fade" id="sidemodal3" data-backdrop="true">
                  <div class="modal-dialog modal-right w-xl">
                    <div class="modal-content h-100 no-radius">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Back Cover</h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                         <form id="update_back_cover_form">
                            <div class="alert alert-success"><p></p></div>
                          <input type="hidden" readonly class="form-control" name="project_id" placeholder="Project ID" >
                          <input type="hidden" readonly class="form-control" name="report_id" value="<?=$report_id;?>" placeholder="Project ID" >
                           <input type="hidden" readonly class="form-control" name="cover_designer" placeholder="Project ID" >
                           <input type="hidden" readonly class="form-control" name="publisher_id" placeholder="Project ID" >
                          <div class="modal-body">
                            <div class="card-body">
                              <div class="table-responsive">
                               <table class="table table-bordered" id="back_coverdataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th style="display:none;"></th>
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
                                <button style="float:left; height:50px; width:10%;" type="button" class="btn btn-primary fa fa-edit" id="update_back_cover"> Update</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      
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
    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('js/croppie.js');?>"></script>
    <script src="<?php echo base_url('js/croppie.js');?>"></script>


     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>
     <script src="<?php echo base_url('js/dropzone.js');?>"></script>

 <script>  


  $('#leaddataTablefixed').DataTable();

//    $("#download_file").click(function() {
//     var get_files = [];
//     table.column(0,  { search:'applied' } ).data().each(function(value, index) {
//         get_files.push(value);
//     });
//      $.ajax({
//             type:'GET',
//             data: {file_name:get_files},
//             url: base_url +'dashboard/download_file',
//             dataType: 'json',
//             success:function(data){
//                      window.location.href = "https://hlmcrm.site/dashboard/download_file/?file_name%5B%5D=https%3A%2F%2Fhlmcrm.site%2Fuploads%2Fci_dropzone-finish1.zip&file_name%5B%5D=https%3A%2F%2Fhlmcrm.site%2Fuploads%2Fvenancio.jpg";
//             }
//      });
// });

    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#my-dropzone", {
      url: "<?php echo site_url('dashboard/upload') ?>",
      addRemoveLinks: true,
      removedfile: function(file) {
        var name = file.name;

        $.ajax({
          type: "post",
          url: "<?php echo site_url('dashboard/remove') ?>",
          data: { file: name },
          dataType: 'html'
        });

        // remove the thumbnail
        var previewElement;
        return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
      },
      init: function() {
          this.on('success', function(){
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                  location.reload();
            }
            });
        }
    });


    </script>
  </body>
</html>
