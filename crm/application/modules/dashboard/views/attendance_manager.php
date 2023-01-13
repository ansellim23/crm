   <style type="text/css">
      #viewattendance_historymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}


</style>
   <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">


             <div class="col-md-12 col-sm-4  tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Hours Worked</span>
                  <div class="count total_hours_work"></div>
              </div>

          </div>
        </div>
<!-- 
         <div class="row" style="display: inline-block; margin:0px 125px" >
          <div class="tile_count">


             <div class="col-md-12 col-sm-4  tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Points</span>
                  <div class="count total_points"><? echo '3'; ?></div>
              </div>
              
          </div>
        </div> -->

          <!-- /top tiles -->

       <div class="col-sm-3" style="float: none !important;">
            <label for="validationCustom03">Date</label>
              <div id="reportrange" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                  <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                  <span></span> <b class="caret"></b>
                 </div><!-- DEnd ate Picker Input -->            
          </div>
          <br>
      <div class="card mb-3">
         <div class="card-header">
            <i class="fa fa-table"></i>Your Time Log
            <div style="float:right; "> 
                 <div style="display:inline-block">
                 </div>   
             </div>
         </div>
          <div class="card-body">
            <div class="table-responsive">
             <table class="table table-bordered" id="attendancedataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Date Log</th>
                  <th>Employee Name</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Lunch Start</th>
                  <th>Lunch End</th>
                  <th>Break In</th>
                  <th>Break Out</th>
                  <th>Excess Lunch Break</th>
                  <th>Excess Break In</th>
                  <th class="hour_works">Hours Worked</th>
                  <th>Remark</th>
                  <th><i class="fa fa-clock-o"></i></th>
                  <th>Action</th>
                  <th>No. of Files</th>
                </tr>
              </thead>
              <tbody >
              <?php
                       $get_duty_log = '';
                       $get_attendance_id = 0;
                       $get_firstname = '';
                       $get_lastname = '';
                       $get_usertype = '';
                       $get_point_absents = 0;
                       $lacking_hour_points = 0.0;
                  if ($attendance_users > 0){
                       $get_notconsume_hour = 1;
                       $get_notconsume_hour_mins = 1.30;
                       $get_notconsume_mins = 30;
                       $get_excess_lunch= 0;
                       $get_excess_break= 0; 
                       $get_total_of_excess = 0;
                       $get_total_of_work = 0;
                      foreach ($attendance_users as $attendance_user){
                          $start_time_in = date('H:i:s', strtotime("-15 minutes", strtotime($attendance_user['time_in_start'])));

                          $current_date =  date('Y/m/d H:i:s');



                         $get_duty_log = date('Y/m/d', strtotime($attendance_user['duty_log']));
                         $get_firstname = $attendance_user['firstname'];
                         $get_lastname =  $attendance_user['lastname'];
                         $get_usertype =  $attendance_user['usertype'];
                         $get_total_of_excess = modules::run("dashboard/CalculateTime",$attendance_user['excess_lunch'], $attendance_user['excess_break']);
                         $total_lunch_start = $attendance_user['total_lunch_start'];
                         $total_lunch_end =  $attendance_user['total_lunch_end'];
                         $total_break_in = $attendance_user['total_break_in'];
                         $total_break_out =  $attendance_user['total_break_out'];
                         $total_out = $attendance_user['total_out'] > 8 ? "8.00" : (float)$attendance_user['total_out'];

                         $get_excess_work = new DateTime($get_total_of_excess) ;

                         if($attendance_user['time_in'] == NULL  &&  $attendance_user['time_out'] == NULL  &&  $attendance_user['break_in'] == NULL  &&  $attendance_user['break_out'] == NULL  &&  $attendance_user['lunch_start'] == NULL  &&  $attendance_user['lunch_end'] == NULL){
                                $get_total_of_work = 0.0;
                                $get_point_absents = 1; 

                         }
                        elseif($attendance_user['time_in'] != NULL  &&  $attendance_user['time_out'] == NULL  &&  $attendance_user['break_in'] == NULL  &&  $attendance_user['break_out'] == NULL  &&  $attendance_user['lunch_start'] == NULL  &&  $attendance_user['lunch_end'] == NULL){
                                $get_total_of_work = 0.0;
                                $get_point_absents = 0; 

                         }
                        elseif($attendance_user['time_in'] != NULL  && $attendance_user['time_out'] != NULL){
                                $get_total_of_work = (float)$total_out - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                        elseif($attendance_user['time_in'] != NULL  && $attendance_user['time_out'] == NULL && $attendance_user['break_out'] != NULL){
                                $get_total_of_work = (float)$total_break_out - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                         elseif($attendance_user['time_in'] != NULL  && $attendance_user['break_out'] == NULL && $attendance_user['break_in'] != NULL){
                                $get_total_of_work = (float)$total_break_in - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                         elseif($attendance_user['time_in'] != NULL  &&  $attendance_user['break_in'] == NULL && $attendance_user['lunch_end'] != NULL){
                                $get_total_of_work = (float)$total_lunch_end - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                        elseif($attendance_user['time_in'] != NULL  &&  $attendance_user['lunch_end'] == NULL && $attendance_user['lunch_start'] != NULL){
                                $get_total_of_work = (float)$total_lunch_start - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                        if($attendance_user['time_in'] != NULL && $attendance_user['time_out'] == NULL && date("Y-m-d 21:45:00", strtotime($attendance_user['duty_log'])) >= date("Y-m-d H:i:s")){
                              $lacking_hour_points = 0.5;
                         }
                         elseif(date('H:i:s', strtotime($attendance_user['time_out'])) < "07:00:00"  && $attendance_user['time_out'] != NULL &&  $attendance_user['time_in'] != NULL  &&  $attendance_user['approve_status'] == "Declined"){
                              $lacking_hour_points = 0.5;
                         }
                         else{
                              $lacking_hour_points = 0.0;
                         }

                               echo "<tr>";
                               echo "<td>".date('Y/m/d', strtotime($attendance_user['duty_log']))."</td>";
                               echo "<td><a href='#' class='view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$attendance_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype']."</td>";
                               if($attendance_user['time_in'] == NULL){
                                   echo "<td></td>";

                               }
                               elseif(date('H:i:s', strtotime($attendance_user['time_in'])) < date('H:i:s', strtotime($attendance_user['time_in_start'])) && date('Y/m/d', strtotime($attendance_user['time_in'])) == date('Y/m/d', strtotime($attendance_user['duty_log']))){
                                   echo  "<td>".date('h:i:s a', strtotime($attendance_user['time_in']))."</td>"; 

                               }
                              else if($attendance_user['schedule_status'] == 'Flexible'){
                                   echo  "<td>".date('h:i:s a', strtotime($attendance_user['time_in']))."</td>"; 

                               }
                               else{
                                   echo  $attendance_user['late_minutes'] !=  '00:00' ? "<td>".date('h:i:s a', strtotime($attendance_user['time_in']))." - Late</td>" : "<td>".date('h:i:s a', strtotime($attendance_user['time_in']))."</td>"; 

                               }
                               if($attendance_user['time_in'] == NULL && $attendance_user['time_out'] == NULL){
                                   echo "<td></td>";

                               }
                               elseif(date('H:i:s', strtotime($attendance_user['time_out'])) < date('H:i:s', strtotime($attendance_user['time_out_start'])) && $attendance_user['time_out'] != NULL){
                                   echo  "<td>".date('h:i:s a', strtotime($attendance_user['time_out']))." - Early Out</td>"; 

                               }
                               elseif($attendance_user['time_in'] != NULL && $attendance_user['time_out'] == NULL){
                                   echo  "<td>Not Yet</td>"; 
 
                               }
                               elseif($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL){
                                   echo  "<td>".date('h:i:s a', strtotime($attendance_user['time_out']))."</td>"; 
 
                               }
                               else{
                                   echo "<td></td>";
                               }

                               if($attendance_user['lunch_start'] == NULL){
                                   echo "<td></td>";

                               }
                               else{
                                   echo "<td>".date('h:i:s a', strtotime($attendance_user['lunch_start']))."</td>";

                               }
                               if($attendance_user['lunch_end'] == NULL){
                                   echo "<td></td>";

                               }
                               else{
                                   echo  $attendance_user['excess_lunch'] !=  '00:00:00' ? "<td>".date('h:i:s a', strtotime($attendance_user['lunch_end']))." - Over Lunch</td>" : "<td>".date('h:i:s a', strtotime($attendance_user['lunch_end']))."</td>"; 

                               }
                               if($attendance_user['break_in'] == NULL){
                                   echo "<td></td>";

                               }
                               else{
                                 echo "<td>".date('h:i:s a', strtotime($attendance_user['break_in']))."</td>"; 

                               }

                               if($attendance_user['break_out'] == NULL){
                                   echo "<td></td>";

                               }
                               else{
                                  echo  $attendance_user['excess_break'] !=  '00:00:00' ? "<td>".date('h:i:s a', strtotime($attendance_user['break_out']))." - Over Break</td>" : "<td>".date('h:i:s a', strtotime($attendance_user['break_out']))."</td>"; 

                               }
                               echo "<td>".$attendance_user['excess_lunch']."</td>";
                               echo "<td>".$attendance_user['excess_break']."</td>";
                               echo "<td>".$get_total_of_work ."</td>";

                                echo !empty($attendance_user['remark_attendance']) ? "<td>".substr($attendance_user['remark_attendance'], 0, 10)."..."."</td>" : "<td>"." "."</td>";
                               if(date('Y/m/d', strtotime($attendance_user['duty_log'])) > date('Y/m/d', strtotime('-2 day'))){
                                  echo "<td><button type='button' class='btn btn-primary fa fa-plus view_attendance_detail' data-toggle='modal' data-target='#dutytimemodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'></button></td>";

                               } 
                               else{
                                  echo "<td></td>";

                               }     
                                  echo "<td><form id='upload_attendance_form' enctype='multipart/form-data'><input type='file' id='attendance_file' name='attendance_file' multiple> <input type='hidden' id='attendance_id' name='attendance_id' value='".$attendance_user['attendance_id']."'></form>
                                 <button type='button' class='btn btn-success  view_attendancefile_history' data-toggle='modal' data-target='#viewattendancefile_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>View Files</button> </td>";                       
                                  echo "<td>".modules::run("dashboard/file_attendance",$attendance_user['attendance_id'])."</td>"; 

                         echo "</tr>";

                  
                     } 
                     
                  } 
            
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

        <div class="col-sm-3" style="float: none !important;">
            <label for="validationCustom03">Date</label>
              <div id="reportrangeidle" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                  <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                  <span></span> <b class="caret"></b>
                 </div><!-- DEnd ate Picker Input -->            
          </div>

      <div class="card mb-3">
         <div class="card-header">
            <i class="fa fa-table"></i>Your Idle Log
            <div style="float:right; "> 
                 <div style="display:inline-block">
                 </div>   
             </div>
         </div>
          <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="idledataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Date Idle</th>
                  <th>Time Idle</th>
                </tr>
              </thead>
              <tbody >
              <?php
                  if ($idle_users > 0){
                       foreach ($idle_users as $idle_user){
    
                           echo "<tr>";
   
                               echo "<td>".date("Y/m/d",strtotime($idle_user['date_idle']))."</td>";
                               echo "<td>".date("H:i:s a",strtotime($idle_user['idle_time']))."</td>";

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

          <div class="row">

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

              <!-- The payment  Remark-->
                <div class="modal fade" id="dutytimemodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Employee Time Log</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                             <form id="update_attendance_form">
                               <div class="alert alert-success"><p></p></div>
                                <div class="form-group">
                                  <select class="form-control status_log" name="status_log">
                                      <option value="">Please Select A Log</option>
                                      <option value="Time In">Time In</option>
                                      <option value="Break In">Break In</option>
                                      <option value="Break Out">Break Out</option>
                                      <option value="Lunch Start">Lunch Start</option>
                                      <option value="Lunch End">Lunch End</option>
                                      <option value="Time Out">Time Out</option>
                                    </select>
                               </div>
                                <input type="hidden" class="form-control" id="attendance_id" readonly name="attendance_id"/>
                                <input type="hidden" class="form-control" id="duty_log" readonly name="duty_log"/>

                                <div id="loader_7" class="center_7"></div>

                                  <div class="modal-footer">

                                      <button type="button" id="update_time_log" class="btn btn-success">Update</button>

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
                <div class="modal fade" id="viewattendance_historymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Attendance Concerns </h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="attendance_remarkDataTable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>From User</th>
                                            <th>User Type</th>
                                            <th>Remark</th>
                                            <th>Date Remark</th>
                                            
                                          </tr>
                                        </thead>
                                        <tbody class="view_attendance_detail">

                                        </tbody>
                                      </table>
                              </div>
                                <form id="attendance_remarkform">
                                  <div class="col mb-1 w-50 p-3 align-middle" style="margin:0px auto;">
                                        <div class="alert alert-success"><p></p></div>
                                        <input type="hidden" readonly class="form-control" name="attendance_id" placeholder="Attendance ID" required="required">
                                        <input type="hidden" readonly class="form-control" name="author_name" placeholder="Author Name" required="required">
                                        <label for="validationCustom05">Add Remark</label>
                                        <textarea class="form-control remark" rows="4" name="remark"></textarea>
                                        <div id="loader_6" class="center_6"></div>
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

          <!-- The Warning Modal -->
                <div class="modal fade" id="warningModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Idle </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      
                      <!-- Modal body -->
                      <div class="modal-body">
                        <form method="post" action="">


                           
                           <span class="idle_start"> User has been warned of impending logoff.....</span>
                      </div>
                      
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Close</button>
                      </div>
                    </form>
                      
                    </div>
                  </div>
                </div>



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
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('bootstrap/build/js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('js/croppie.js');?>"></script>
    <script src="<?php echo base_url('js/jquery.idle.min.js');?>"></script>
    <script src="<?php echo base_url('js/jquery.idle.js');?>"></script>



     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>
     <script src="<?php echo base_url('js/validateattendance.js');?>"></script>

 <script>  

var idletable =  $('#idledataTable').DataTable({
        "order": [[ 0, "desc" ]]
    } );

var  attendancetable = $('#attendancedataTable').DataTable({
     "lengthMenu": [[100, 150, 200, -1], [100, 150, 200, "All"]],
     "order": [[ 0, "desc" ]], 
    "initComplete": function (settings, json) {
     var api = this.api();
     CalculateAttendance_TableSummary(this);
    },
    "drawCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;  
        CalculateAttendance_TableSummary(this);
        return ;   
      }
    } );

function CalculateAttendance_TableSummary(attendancetable) {
    try {

        var intVal = function (i) {
            return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
        };

        var api = attendancetable.api();

            // Total over all pages
         api.columns(".hour_works").each(function (index) {
         var column = api.column(index,{page:'current'});

           var sum = column 
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

        $('.tile_stats_count .total_hours_work').text(sum.toLocaleString("en")+'.00');
      });

       api.columns(".point_works").each(function (index) {
         var column_point = api.column(index,{page:'current'});

           var sum_point = column_point 
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


        $('.tile_stats_count .total_points').text(sum_point.toLocaleString("en")+'.00');
      

      });
  }
  catch (e) {
        console.log('Error in CalculateAttendance_TableSummary');
        console.log(e)
    }
}

  $(function () {
   var start = moment().subtract(29, 'days');
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

   var start = picker.startDate.format('YYYY/MM/DD');
   var end = picker.endDate.format('YYYY/MM/DD');

  

  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date(start);
      var max = new Date(end);
      var startDate = new Date(data[0]);
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null) {
        return true;
      }
      if (min == null && startDate <= max) {
        return true;
      }
      if (max == null && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  attendancetable.draw();
    $.fn.dataTable.ext.search.pop();

});
});

  $(function () {
   var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrangeidle span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrangeidle').daterangepicker({
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


  $('#reportrangeidle').on('apply.daterangepicker', function(ev, picker) {

   var start = picker.startDate.format('YYYY/MM/DD');
   var end = picker.endDate.format('YYYY/MM/DD');

  

  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date(start);
      var max = new Date(end);
      var startDate = new Date(data[0]);
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null) {
        return true;
      }
      if (min == null && startDate <= max) {
        return true;
      }
      if (max == null && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  idletable.draw();
    $.fn.dataTable.ext.search.pop();

});
});

var currentTime = new Date();
// First Date Of the month 
var startDateFrom = new Date(currentTime.getFullYear(),currentTime.getMonth(),1);
// Last Date Of the Month 
var startDateTo = new Date(currentTime.getFullYear(),currentTime.getMonth() +1,0);
  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = startDateFrom;
      var max = startDateTo;
      var startDate = new Date(data[0]);
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null) {
        return true;
      }
      if (min == null && startDate <= max) {
        return true;
      }
      if (max == null && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  attendancetable.draw();
    $.fn.dataTable.ext.search.pop();

</script>
 <!-- preloader -->
 <script>
        $(window).on('load', function() {
          $("#loader_6").css("display", "none");
          $("#loader_7").css("display", "none");       
      });
   </script>
  </body>
</html>
