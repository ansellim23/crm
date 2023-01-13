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
   background-color: green;
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

            <?php include 'sidebar_agent.php'; ?>

            <!-- /sidebar menu -->


        <!-- page content -->
        <div class="right_col" role="main" style=" height: 100px; overflow-y: scroll;">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
          </div>
        </div>
          <!-- /top tiles -->
   <button class="fa fa-plus fab" data-toggle='modal' data-target='#todoModal' data-backdrop='static' data-keyboard='false'></button>
  <div class="card mb-3">

  	<!-- page content -->
      <form id="addtodolist" method="post">
        <div class="container mt-3 p-3">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Assigned</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Missing</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Done</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <form id="updatetodoform">
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3>Assigned</h3>
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header list-inline" id="headingOne">
             <p class="list-inline-item">No due date</p>
             <i class="fa fa-chevron-down list-inline-item float-right" aria-hidden="true" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">0</i>
         </div>
         <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <div class="container">
                No event
<!--                                <?
              if($user_events > 0){
                foreach ($user_events as $user_event) {
                  echo "<div class='row border-bottom mt-2'>";
                  echo "<div class='col-md-6 font-weight-bold'><input type='checkbox' class='update_todo_status' value='".$event['event_id']."'> ".$event['event_title']."</div>";
                  echo "<div class='col-md-6 text-right font-weight-bold'>".date('D', strtotime($attendance_user['time_in']))."</div>";
                  echo "</div>";
                }
              }
           ?> -->
                
              </div>
            </div>
          </div>
        </div>
        <div class="card">
            <div class="card-header list-inline" id="headingTwo">
               <p class="list-inline-item">This week</p>
               <i class="fa fa-chevron-down list-inline-item float-right" aria-hidden="true" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><?= $this_week_events > 0 ? count($this_week_events) : '0';?></i>
           </div>
           <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <div class="container">
                  <?
                    if($this_week_events > 0){
                      foreach ($this_week_events as $event) {
                        $disable = $event['user_id'] != $event['to_user']? 'disabled="disabled"' : '';
                        echo "<div class='row border-bottom mt-2'>";
                        echo "<div class='col-md-6 font-weight-bold'><input type='checkbox' class='update_todo_status' value='".$event['event_id']."'".$disable."> <a href='#' class='my_event' data-toggle='modal' data-target='#viewtodoModal' data-backdrop='static' data-keyboard='false' data-event_id='".$event['event_id']."'>".$event['event_title']."</a></div>";
                        echo "<div class='col-md-6 text-right font-weight-bold'>".date('D, h:i a', strtotime($event['event_start']))." - ".date('h:i a', strtotime($event['event_end']))."</div>";
                        echo "</div>";
                      }
                    }else{
                      echo "No event";
                    }
                  ?>              
                </div>
              </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header list-inline" id="headingThree">
               <p class="list-inline-item">Next week</p>
               <i class="fa fa-chevron-down list-inline-item float-right" aria-hidden="true" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><?= $next_week_events > 0 ? count($next_week_events) : '0';?></i>
           </div>
           <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <div class="container">
                  <?
                    if($next_week_events > 0){
                      foreach ($next_week_events as $event) {
                        $disable = $event['user_id'] != $event['to_user']? 'disabled="disabled"' : '';
                        echo "<div class='row border-bottom mt-2'>";
                        echo "<div class='col-md-6 font-weight-bold'><input type='checkbox' class='update_todo_status' value='".$event['event_id']."'".$disable."> <a href='#' class='my_event' data-toggle='modal' data-target='#viewtodoModal' data-backdrop='static' data-keyboard='false' data-event_id='".$event['event_id']."'>".$event['event_title']."</a></div>";
                        echo "<div class='col-md-6 text-right font-weight-bold'>".date('D, h:i a', strtotime($event['event_start']))." - ".date('h:i a', strtotime($event['event_end']))."</div>";
                        echo "</div>";
                      }
                    }else{
                      echo "No event";
                    }
                  ?>              
                </div>
              </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header list-inline" id="headingFour">
               <p class="list-inline-item">Later</p>
               <i class="fa fa-chevron-down list-inline-item float-right" aria-hidden="true" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><?= $later_events > 0 ? count($later_events) : '0';?></i>
           </div>
           <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
              <div class="card-body">
                <div class="container">
                  <?
                    if($later_events > 0){
                      foreach ($later_events as $event) {
                        $disable = $event['user_id'] != $event['to_user']? 'disabled="disabled"' : '';
                        echo "<div class='row border-bottom mt-2'>";
                        echo "<div class='col-md-6 font-weight-bold'><input type='checkbox' class='update_todo_status' value='".$event['event_id']."'".$disable."> <a href='#' class='my_event' data-toggle='modal' data-target='#viewtodoModal' data-backdrop='static' data-keyboard='false' data-event_id='".$event['event_id']."'>".$event['event_title']."</a></div>";
                        echo "<div class='col-md-6 text-right font-weight-bold'>Today, ".date('h:i a', strtotime($event['event_start']))." - ".date('h:i a', strtotime($event['event_end']))."</div>";
                        echo "</div>";
                      }
                    }else{
                      echo "No event";
                    }
                  ?>              
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3>Missing</h3>
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header list-inline" id="headingOne">
             <p class="list-inline-item">All time</p>
             <i class="fa fa-chevron-down list-inline-item float-right" aria-hidden="true" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?= $missing_events > 0 ? count($missing_events) : '0';?></i>
         </div>
         <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="container">
                  <?
                    if($missing_events > 0){
                      foreach ($missing_events as $event) {
                        $disable = $event['user_id'] != $event['to_user']? 'disabled="disabled"' : '';
                        echo "<div class='row border-bottom mt-2'>";
                        echo "<div class='col-md-6 font-weight-bold'><input type='checkbox' class='update_todo_status' value='".$event['event_id']."'".$disable."> <a href='#' class='my_event' data-toggle='modal' data-target='#viewtodoModal' data-backdrop='static' data-keyboard='false' data-event_id='".$event['event_id']."'>".$event['event_title']."</a></div>";
                        echo "<div class='col-md-6 text-right font-weight-bold'>".date('F j, Y, h:i a', strtotime($event['event_start']))." - ".date('h:i a', strtotime($event['event_end']))."</div>";
                        echo "</div>";
                      }
                    }else{
                      echo "No event";
                    }
                  ?>              
                </div>
            </div>
          </div>
        </div>      
      </div>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Done</h3>
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header list-inline" id="headingOne">
             <p class="list-inline-item">No due date</p>
             <i class="fa fa-chevron-down list-inline-item float-right" aria-hidden="true" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">0</i>
         </div>
         <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
             No event
            </div>
          </div>
        </div>
        <div class="card">
            <div class="card-header list-inline" id="headingTwo">
               <p class="list-inline-item"> Done Early</p>
               <i class="fa fa-chevron-down list-inline-item float-right" aria-hidden="true" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><?= $done_early_events > 0 ? count($done_early_events) : '0';?></i>
           </div>
           <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <div class="container">
                  <?
                    if($done_early_events > 0){
                      foreach ($done_early_events as $event) {
                        $disable = $event['user_id'] != $event['to_user']? 'disabled="disabled"' : '';
                        echo "<div class='row border-bottom mt-2'>";
                        echo "<div class='col-md-6 font-weight-bold'><input type='checkbox' class='update_todo_status' value='".$event['event_id']."'".$disable."> <a href='#' class='my_event' data-toggle='modal' data-target='#viewtodoModal' data-backdrop='static' data-keyboard='false' data-event_id='".$event['event_id']."'>".$event['event_title']."</a></div>";
                        echo "<div class='col-md-6 text-right font-weight-bold'>".date('F j, h:i a', strtotime($event['event_start']))." - ".date('h:i a', strtotime($event['event_end']))."</div>";
                        echo "</div>";
                      }
                    }else{
                      echo "No event";
                    }
                  ?>              
                </div>
              </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header list-inline" id="headingThree">
               <p class="list-inline-item"> This week</p>
               <i class="fa fa-chevron-down list-inline-item float-right" aria-hidden="true" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><?= $this_week_events1 > 0 ? count($this_week_events1) : '0';?></i>
           </div>
           <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <div class="container">
                  <?
                    if($this_week_events1 > 0){
                      foreach ($this_week_events1 as $event) {
                        $disable = $event['user_id'] != $event['to_user']? 'disabled="disabled"' : '';
                        echo "<div class='row border-bottom mt-2'>";
                        echo "<div class='col-md-6 font-weight-bold'><input type='checkbox' class='update_todo_status' value='".$event['event_id']."'".$disable."> <a href='#' class='my_event' data-toggle='modal' data-target='#viewtodoModal' data-backdrop='static' data-keyboard='false' data-event_id='".$event['event_id']."'>".$event['event_title']."</a></div>";
                        echo "<div class='col-md-6 text-right font-weight-bold'>".date('D, h:i a', strtotime($event['event_start']))." - ".date('h:i a', strtotime($event['event_end']))."</div>";
                        echo "</div>";
                      }
                    }else{
                      echo "No event";
                    }
                  ?>              
                </div>
              </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header list-inline" id="headingFour">
               <p class="list-inline-item">Last Week</p>
               <i class="fa fa-chevron-down list-inline-item float-right" aria-hidden="true" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><?= $last_week_events1 > 0 ? count($last_week_events1) : '0';?></i>
           </div>
           <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
              <div class="card-body">
                <div class="container">
                  <?
                    if($last_week_events1 > 0){
                      foreach ($last_week_events1 as $event) {
                        $disable = $event['user_id'] != $event['to_user']? 'disabled="disabled"' : '';
                        echo "<div class='row border-bottom mt-2'>";
                        echo "<div class='col-md-6 font-weight-bold'><input type='checkbox' class='update_todo_status' value='".$event['event_id']."'".$disable."> <a href='#' class='my_event' data-toggle='modal' data-target='#viewtodoModal' data-backdrop='static' data-keyboard='false' data-event_id='".$event['event_id']."'>".$event['event_title']."</a></div>";
                        echo "<div class='col-md-6 text-right font-weight-bold'>".date('D, h:i a', strtotime($event['event_start']))." - ".date('h:i a', strtotime($event['event_end']))."</div>";
                        echo "</div>";
                      }
                    }else{
                      echo "No event";
                    }
                  ?>              
                </div>
              </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header list-inline" id="headingFive">
               <p class="list-inline-item"> Earlier</p>
               <i class="fa fa-chevron-down list-inline-item float-right" aria-hidden="true" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"><?= $earlier_events > 0 ? count($earlier_events) : '0';?></i>
           </div>
           <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
              <div class="card-body">
                <div class="container">
                  <?
                    if($earlier_events > 0){
                      foreach ($earlier_events as $event) {
                        $disable = $event['user_id'] != $event['to_user']? 'disabled="disabled"' : '';
                        echo "<div class='row border-bottom mt-2'>";
                        echo "<div class='col-md-6 font-weight-bold'><input type='checkbox' class='update_todo_status' value='".$event['event_id']."'".$disable."> <a href='#' class='my_event' data-toggle='modal' data-target='#viewtodoModal' data-backdrop='static' data-keyboard='false' data-event_id='".$event['event_id']."'>".$event['event_title']."</a></div>";
                        echo "<div class='col-md-6 text-right font-weight-bold'>Today, ".date('h:i a', strtotime($event['event_start']))." - ".date('h:i a', strtotime($event['event_end']))."</div>";
                        echo "</div>";
                      }
                    }else{
                      echo "No event";
                    }
                  ?>              
                </div>
              </div>
            </div>
        </div>
    </div>
    </div>
  
</div>

  </form>

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


        <!-- Add Todo -->
         <div class="modal fade" id="todoModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="addtodoform" method="post" enctype="multipart/form-data">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Add todo</h2>
                            <div class="form-group">
<!--                               <select name="user_id" class="form-control">
                                 <?
                                  if($all_agents > 0){
                                    foreach($all_agents as $user){
                                      echo "<option value='".$user['user_id']."'>".$user['firstname']." ".$user['lastname']." - ".$user['usertype']."</option>";
                                    }
                                  }
                                ?>
                              </select> -->
                              <input type="hidden" name="user_id" value="<?=$user_id?>">
                            </div>
                            <div class="form-group">
                              <select class="form-control" name="status_event">
                                <option value="Task">Task</option>
                                <option value="Reminder">Reminder</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="reason" placeholder="Title" required="required">
                            </div>
                            <div class="form-group">
                              <textarea class="form-control" name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                              <label>Start</label>
                              <input type="datetime-local" name="start" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>End</label>
                              <input type="datetime-local" name="end" class="form-control">
                            </div>
                           
                        <div class="form-group">
                                <button type="button" id="add_todo" class="btn btn-success btn-lg btn-block">Add</button>
                            </div>
                        </form>
                    </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
          </div>
      </div>
      <!--end Add Todo-->


        <!-- Add Todo -->
      <div class="modal fade" id="viewtodoModal">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Todo details</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success"><p></p></div>
                      <div class="form-group">
                        <label>Title:</label>
                        <div class="form-control title"></div>
                        <label>Description:</label>
                        <div class="form-control desc"></div>
                        <label>Start date:</label>
                        <div class="form-control start"></div>
                        <label>Due date:</label>
                        <div class="form-control end"></div>
                        <label>Status:</label>
                        <div class="form-control status"></div>
                        <label>Origin:</label>
                        <div class="form-control origin"></div>
                        <label>Type:</label>
                        <div class="form-control type"></div>
                        <label>Assigned by:</label>
                        <div class="form-control user_from"></div>
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
          </div>
      </div>
      <!--end Add Todo-->



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

 <script>  
           $(function () {
             $('#datetimepicker1').datetimepicker();
         });
 
 $('#leaddataTable').DataTable();
</script>
  </body>
</html>
