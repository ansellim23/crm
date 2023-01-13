<style type="text/css">
      #viewattendance_historymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}


</style>
  <!-- page content -->

     <div class="right_col" role="main">

          <!-- top tiles -->

          <!-- <div class="row" style="display: inline-block;" >

          <div class="tile_count">

            

            <div class="col-md-12 col-sm-4  tile_stats_count">

              <span class="count_top"><i class="fa fa-user"></i> Total Call logs</span>

              <div class="count total_call_logs">0.00</div>

            </div>


          </div>

        </div>

           <div class="row ml-3" style="display: inline-block;" >

          <div class="tile_count">

            

            <div class="col-md-12 col-sm-4  tile_stats_count">

              <span class="count_top"><i class="fa fa-user"></i> Total Average Call logs</span>

              <div class="count total_average_call_logs">0.00</div>

            </div>
            

          </div>


        </div>

        <div class="row ml-3" style="display: inline-block;" >

          <div class="tile_count">

            

            <div class="col-md-12 col-sm-4  tile_stats_count">

              <span class="count_top"><i class="fa fa-user"></i> Total Time Call logs</span>

              <div class="count total_time_average_call_logs">0.00</div>

            </div>
            

          </div>


        </div>


        <div class="row ml-5" style="display: inline-block;" >

          <div class="tile_count">

            

            <div class="col-md-12 col-sm-4  tile_stats_count">

              <span class="count_top"><i class="fa fa-user"></i> Average Handling Time Call logs</span>

              <div class="count total_average_handling_call_logs">0.00</div>

            </div>
            

          </div>


        </div>




          <form id="call_logs_form">

             <div class="col-sm-3 inline-block">

                <label for="validationCustom03">Date</label>

                  <div id="call_log_reportrange" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >

                      <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;

                      <span></span> <b class="caret"></b>

                     </div> DEnd ate Picker Input -->            

              <!-- </div>

                   <div class="col-sm-3 inline-block">

                <label for="validationCustom03">Agent/Manager</label>

                      <select class="form-control agent_name" name="user_type" id="user_type">

                       <option selected value="">Please Select an Agent/Manager</option>

                           <?php 

                             if ($all_users > 0){



                                foreach ($all_users as $user){

                                   echo "<option value='".$user['extension_number']."'>".$user['firstname']. ' ' .$user['lastname']. ' - ' .$user['usertype'] ."</option>";

                               }

                            } 

                          ?>

                      </select>
                       <input type="hidden" class="form-control" name="from_date" placeholder="from_date" required="required">
                       <input type="hidden" class="form-control" name="to_date" placeholder="to_date" required="required">

                 </div>

            </form> -->



      <!-- <br>  -->



          <!-- /top tiles -->
    
    <div>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs w-100">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#call_logs">Call Logs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#attendance">Attendance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#sales">Sales</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div id="call_logs" class="container tab-pane active"><br>
          <h3>Call Logs</h3>
          <div class="card mb-3">



          <div class="card-header">



            <i class="fa fa-table"></i>List of Agent Users



              <div style="float:right; ">



      </div>



  </div>



          <div class="card-body">

          <!-- download button -->
          <!-- <div>
            <form id="form_report_call_log" action="<?php echo base_url('dashboard/export_call_log'); ?>"  method="POST">

                <input type="hidden" class="form-control" name="from_date" placeholder="from_date" required="required">

                <input type="hidden" class="form-control" name="to_date" placeholder="to_date" required="required">
                <input type="hidden" class="form-control" name="agent_name" placeholder="agent_name" required="required">
                <div>
                    <button type="submit" name="export" class="btn btn-secondary">Dowload</button>
                                    
                </div>
              
            </form>
          </div> -->
          <div>
            <form id="call_logs_form">

              <div class="col-sm-3 inline-block">

                <label for="validationCustom03">Date</label>

                  <div id="call_log_reportrange" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;">

                      <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;

                      <span></span> <b class="caret"></b>

                      </div><!-- DEnd ate Picker Input -->            

              </div>

              <div class="col-sm-3 inline-block">

                <label for="validationCustom03">Agent/Manager</label>

                      <select class="form-control agent_name" name="user_type" id="user_type">

                        <option selected value="">Please Select an Agent/Manager</option>

                            <?php 

                              if ($all_agents_and_managers_call_logs > 0){
                                foreach ($all_agents_and_managers_call_logs as $user){
                                  echo "<option value='".$user['extension_number']."'>".$user['firstname']. ' ' .$user['lastname']. ' - ' .$user['usertype'] ."</option>";
                                }
                              } 
                            ?>
                      </select>
                        <input type="hidden" class="form-control" name="from_date" placeholder="from_date" required="required">
                        <input type="hidden" class="form-control" name="to_date" placeholder="to_date" required="required">

                </div>

              </form> 

              <div class="row my-4">
                <div class="col-sm-2">
                  <div class="card bg-primary">
                    <div class="card-body">
                      <h5 class="card-title text-white">Working Days: <span class="total_work_call">0</span></h5>
                  </div>
                </div>
                </div>
                <div class="col-sm-2">
                  <div class="card bg-secondary">
                    <div class="card-body">
                      <h5 class="card-title text-white">TCC: <span class="total_call_logs">0</span></h5>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="card bg-warning">
                    <div class="card-body">
                      <h5 class="card-title text-white">THT: <span class="total_time_average_call_logs">
                      00:00:00</span></h5>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="card bg-danger">
                    <div class="card-body">
                      <h5 class="card-title text-white">ACC: <span class="total_call_count">0</span></h5>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="card bg-success">
                    <div class="card-body">
                      <h5 class="card-title text-white">AHT: <span class="total_handling_time">00:00:00</span></h5>
                    </div>
                  </div>
                </div>
            </div>

          </div>

          <div class="table-responsive">
            <table class="table table-bordered" id="call_log_historytable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                     <th>Date</th>
                    <th>Agent Name</th>
                    <th class="sum_of_call_log">Call Count</th>
                    <th class="average_time">Handling Time</th>
                    <th style="display: none;">Handling Time</th>
                  </tr>
                </thead>

                <tbody class="test_table">
                  <?php date_default_timezone_set('America/New_York');?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>


        <div id="attendance" class="container tab-pane fade"><br>
          <h3>Attendance</h3>

          <div class="d-inline-block mr-5">
            <div class="tile_count">
              <div class="tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Hours Worked</span>
                  <div class="count total_hours_work">0.00</div>
              </div>
            </div>
          </div>

          <div class="d-inline-block mr-5">
            <div class="tile_count">
              <div class="tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Points</span>
                  <div class="count total_points">0.00</div>
              </div>
            </div>
          </div>
          
          <div class="d-inline-block mr-5">
            <div class="tile_count">
              <div class="tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Number of Works</span>
                  <div class="count total_number_works">0.00</div>
              </div>
            </div>
          </div> 
         
          <div class="d-inline-block mr-5">
            <div class="tile_count">
              <div class="tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Lates</span>
                  <div class="count total_lates">00:00:00</div>
              </div>
            </div>
          </div> 

          <div class="d-inline-block mr-5">
            <div class="tile_count">
              <div class="tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Excess of Break</span>
                  <div class="count total_excess_break">00:00:00</div>
              </div>
            </div>
          </div>

          <div class="d-inline-block mr-5">
            <div class="tile_count">
              <div class="tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Excess of Lunch</span>
                  <div class="count total_excess_lunch">00:00:00</div>
              </div>
            </div>
          </div>

          <!-- /top tiles -->
          <form id="attendance_agent_form">
            <div class="col-sm-3 inline-block">
              <label for="validationCustom03">Date</label>
              <div id="reportattendancerange" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                <span></span> <b class="caret"></b>
              </div><!-- DEnd ate Picker Input -->            
            </div>
            <div class="col-sm-3 inline-block">
                <label for="validationCustom03">Employee Name</label>
                      <select class="form-control year" name="user_type">
                       <option selected value="0">Please Select an Agent's</option>
                         <?php 
                             if ($all_agents_and_managers > 0){
                                  foreach ($all_agents_and_managers as $attendance_user){
                                   echo "<option value='".$attendance_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype']."'>".$attendance_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype'] ."</option>";
                               }
                            } 
                          ?>
                      </select>
                      <input type="hidden" class="form-control" name="from_date" placeholder="from_date" required="required">
                      <input type="hidden" class="form-control" name="to_date" placeholder="to_date" required="required">
              </div>
              <div class="col-sm-3 inline-block">
                <label for="">Status</label>
                <select class="form-control" id="status_attendance_agent" name="status_attendance_agent">
                  <option selected>Please Select a Status</option>
                  <option value="Present">Present</option>
                  <option value="Late">Late</option>
                  <option value="Excess Break">Excess Break</option> 
                  <option value="Excess Lunch">Excess Lunch</option>
                </select>
              </div>
            </form>

          <br>  
  <div class="card mb-3">
         <div class="card-header">
            <i class="fa fa-table"></i>List of User Time Logs
            <!-- <div style="float:right; "> 
                 <div style="display:inline-block">
                   <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-clock-o" aria-hidden="true" data-toggle="modal" data-target="#dutytimemodal" data-backdrop="static" data-keyboard="false">Add Schedule</button>
               </div>   
             </div> -->
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
                  <th class="excess_lunch_hour">Excess Lunch Break</th>
                  <th class="excess_break_hour">Excess Break</th>
                  <th class="hour_works">Hours Worked</th>
                  <th class="point_works">Points</th>
                   <th>Remark</th>
                  <!-- <th>Edit</th> -->
                  <!-- <th>Action</th> -->
                  <th>No. of Files</th>
                  <th style="display:none;"></th>
                  <th style="display:none;"></th>
                  <th style="display:none;">Remark</th>
                  <th style="display:none;" class="count_lates"></th>
                </tr>
              </thead>
              <tbody>
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
                               else{
                                   echo  $attendance_user['late_minutes'] !=  '00:00' ? "<td>".date('h:i:s a', strtotime($attendance_user['time_in']))." - Late</td>" : "<td>".date('h:i:s a', strtotime($attendance_user['time_in']))."</td>"; 

                               }
                               if($attendance_user['time_in'] == NULL && $attendance_user['time_out'] == NULL){
                                   echo "<td></td>";

                               }
                               elseif(date('H:i:s', strtotime($attendance_user['time_out'])) < date('H:i:s', strtotime($attendance_user['time_out_start'])) && $attendance_user['time_out'] != NULL &&  $attendance_user['approve_status'] == "Declined"){
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


                                if(date("Y-m-d H:i:s", strtotime('+'.$start_time_in.'', strtotime($attendance_user['duty_log']))) <= date("Y-m-d H:i:s") ){                                  
                                   echo "<td>".number_format($get_point_absents + $attendance_user['point_late'] + $lacking_hour_points + $attendance_user['excess_break_point'] + $attendance_user['excess_lunch_point'] , 1) ."</td>";                                  
                               }
                               else{                               
                                    echo "<td>0.0</td>";
                               }
                                echo !empty($attendance_user['remark_attendance']) ? "<td><a href='#' class='view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id'].">".substr($attendance_user['remark_attendance'], 0, 10)."..."."</a></td>" : "<td>"." "."</td>";
                              //  echo "<td><button class='btn btn-primary view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id']."</button>Add/View</td>";
                              //  echo "<td><button type='button' class='btn btn-danger view_employee_attendance_detail' data-toggle='modal' data-target='#updateattendancemodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>Edit</button></td>";   
                              //  if(date('H:i:s', strtotime($attendance_user['time_out'])) < "07:00:00" && $attendance_user['time_out'] != NULL && $attendance_user['approve_status'] == NULL ){
                              //      echo "<td><button type='button' class='btn btn-primary view_employee_attendance_detail' data-toggle='modal' data-target='#updateapprovemodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>Edit</button></td>";   
                              //  }
                              //   elseif($attendance_user['approve_status'] != NULL ){
                              //      echo "<td><button type='button' class='btn btn-success'>".$attendance_user['approve_status']."</button></td>";   
                              //  }
                              //  else{  
                              //      echo "<td><button type='button' class='btn btn-success'>Edit</button><button type='button' class='btn btn-success  view_attendancefile_history' data-toggle='modal' data-target='#viewattendancefile_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>View Files</button></td>";   
                              //  }
                                echo "<td>".modules::run("dashboard/file_attendance",$attendance_user['attendance_id'])."</td>"; 
                                echo "<td style='display:none;'>".$attendance_user['attendance_id']."</td>"; 

                               if($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL || !empty($attendance_user['remark_attendance']) ){
                                   echo "<td style='display: none;'>Present</td>";

                               }

                            else  if(($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL  && $attendance_user['late_minutes'] !=  '00:00' && $attendance_user['excess_break']  !=  '00:00:00'  && $attendance_user['excess_lunch']  !=  '00:00:00') || !empty($attendance_user['remark_attendance'])){
                                     echo "<td style='display:none;'> Present -   Late -  Excess Break - Excess Lunch</td>";

                               }

                               else if(($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL  && $attendance_user['late_minutes']  !=  '00:00:00'  && $attendance_user['excess_break']  !=  '00:00:00') || !empty($attendance_user['remark_attendance'])){
                                     echo "<td style='display:none;'>Present - Late - Excess Break</td>";

                               }
                               else if(($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL  && $attendance_user['late_minutes']  !=  '00:00:00'  && $attendance_user['excess_lunch']  !=  '00:00:00') || !empty($attendance_user['remark_attendance'])){
                                     echo "<td style='display:none;'>Present - Late - Excess Lunch</td>";

                               }
                                  else if(($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL  && $attendance_user['late_minutes']  !=  '00:00') || !empty($attendance_user['remark_attendance']) ){
                                     echo "<td style='display:none;'>Present - Late </td>";

                               }
                                  else if(($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL  && $attendance_user['excess_break']  !=  '00:00:00') || !empty($attendance_user['remark_attendance']) ){
                                     echo "<td style='display:none;'>Present - Excess Break</td>";

                               }
                                 else if(($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL  && $attendance_user['excess_lunch']  !=  '00:00:00') ||!empty($attendance_user['remark_attendance'])){
                                     echo "<td style='display:none;'>Present - Excess Lunch</td>";

                               }

                               else{
                                   echo "<td style='display: none;'></td>";
                               }

                                  echo "<td style='display:none;'>".$attendance_user['remark_attendance']."</td>"; 
                                  echo "<td style='display:none;'>".$attendance_user['late_minutes']."</td>"; 




                          echo "</tr>";

                     }

                  }  
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      

      <!-- <div class="row" style="display: inline-block;">
          <div class="tile_count">
             <div class="col-md-12 col-sm-4  tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Hours Worked</span>
                  <div class="count total_hours_IT_work">0.00</div>
              </div>

          </div>
        </div> -->

        <div class="d-inline-block mr-5">
            <div class="tile_count">
              <div class="tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Hours Worked</span>
                  <div class="count total_hours_IT_work">0.00</div>
              </div>
            </div>
          </div>

   <!--          <div class="d-inline-block mr-5">
              <div class="tile_count">
                <div class="tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Points</span>
                    <div class="count total_points">0.00</div>
                </div>
              </div>
            </div> -->
          
          <div class="d-inline-block mr-5">
            <div class="tile_count">
              <div class="tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Number of Works</span>
                  <div class="count total_number_works_IT">0.00</div>
              </div>
            </div>
          </div> 
         
<!--           <div class="d-inline-block mr-5">
            <div class="tile_count">
              <div class="tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Lates</span>
                  <div class="count total_lates_IT">0.00</div>
              </div>
            </div>
          </div> 
 -->
          <div class="d-inline-block mr-5">
            <div class="tile_count">
              <div class="tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Excess of Break</span>
                  <div class="count total_excess_break_IT">00:00:00</div>
              </div>
            </div>
          </div>

          <div class="d-inline-block mr-5">
            <div class="tile_count">
              <div class="tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Excess of Lunch</span>
                  <div class="count total_excess_lunch_IT">00:00:00</div>
              </div>
            </div>
          </div>

          <form id="attendance_IT_form">
            <div class="col-sm-3 inline-block">
            <label for="validationCustom03">Date</label>
              <div id="reportrangeIT" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                  <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                  <span></span> <b class="caret"></b>
                 </div><!-- DEnd ate Picker Input -->            
          </div>
           <div class="col-sm-3 inline-block">
                <label for="validationCustom03">Employee Name</label>
                      <select class="form-control year" name="user_type">
                       <option selected value="0">Please Select an Employee</option>
                         <?php 
                             if ($all_IT > 0){
                                  foreach ($all_IT as $attendance_user){
                                   echo "<option value='".$attendance_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype']."'>".$attendance_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype'] ."</option>";
                               }
                            } 
                          ?>
                      </select>
                           <input type="hidden" class="form-control" name="from_date" placeholder="from_date" required="required">
                          <input type="hidden" class="form-control" name="to_date" placeholder="to_date" required="required">
                 </div>
               </form>

          <br>  

          <div class="card mb-3">
         <div class="card-header">
            <i class="fa fa-table"></i>List of IT User Time Logs
  <!--           <div style="float:right; "> 
                 <div style="display:inline-block">
                   <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-clock-o" aria-hidden="true" data-toggle="modal" data-target="#dutytimemodal" data-backdrop="static" data-keyboard="false">Add Schedule</button>
               </div>   
             </div> -->
         </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="attendance_IT_dataTable" width="100%" cellspacing="0">
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
                  <th class="excess_lunch_hour_IT">Excess Lunch Break</th>
                  <th class="excess_break_hour_IT">Excess Break</th>
                  <th class="hour_IT_works">Hours Worked</th>
                  <th>Remark</th>
                  <!-- <th>Edit</th>
                  <th>Action</th> -->
                  <th>No. of Files</th>
                  <th style="display:none;"></th>
                  <th style="display:none;">Remark</th>
                  <th style="display:none;" class="count_lates_IT">Late</th>
                  <th style="display:none;"></th>
                </tr>
              </thead>
              <tbody>
              <?php
                         $get_duty_log = '';
                       $get_attendance_id = 0;
                       $get_firstname = '';
                       $get_lastname = '';
                       $get_usertype = '';
                       $get_point_absents = 0;
                       $lacking_hour_points = 0.0;
                  if ($attendance_users_IT > 0){
                       $get_notconsume_hour = 1;
                       $get_notconsume_hour_mins = 1.30;
                       $get_notconsume_mins = 30;
                       $get_excess_lunch= 0;
                       $get_excess_break= 0; 
                       $get_total_of_excess = 0;
                       $get_total_of_work = 0;
                       foreach ($attendance_users_IT as $attendance_user){
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

                               echo !empty($attendance_user['remark_attendance']) ? "<td><a href='#' class='view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id'].">".substr($attendance_user['remark_attendance'], 0, 10)."..."."</a></td>" : "<td>"." "."</td>";      
                               //  echo "<td><button class='btn btn-primary view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id']."</button>Add/View</td>";
                              //  echo "<td><button type='button' class='btn btn-danger view_employee_attendance_detail' data-toggle='modal' data-target='#updateattendancemodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>Edit</button></td>";   
                               // if(date('H:i:s', strtotime($attendance_user['time_out'])) < "06:00:00" && $attendance_user['time_out'] != NULL && $attendance_user['approve_status'] == NULL ){
                               //     echo "<td><button type='button' class='btn btn-primary view_employee_attendance_detail' data-toggle='modal' data-target='#updateapprovemodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>Edit</button></td>";   
                               // }
                               //  elseif($attendance_user['approve_status'] != NULL ){
                               //     echo "<td><button type='button' class='btn btn-success'>".$attendance_user['approve_status']."</button></td>";   
                               // }
                               // else{  
                               //     echo "<td><button type='button' class='btn btn-success'>Edit</button><button type='button' class='btn btn-success  view_attendancefile_history' data-toggle='modal' data-target='#viewattendancefile_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>View Files</button></td>";   
                               // }

                              //  echo "<td><button type='button' class='btn btn-success  view_attendancefile_history' data-toggle='modal' data-target='#viewattendancefile_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$attendance_user['attendance_id']."'>View Files</button></td>";   
                              echo "<td>".modules::run("dashboard/file_attendance",$attendance_user['attendance_id'])."</td>"; 
                              echo "<td style='display:none;'>".$attendance_user['attendance_id']."</td>"; 
                              echo "<td style='display:none;'>".$attendance_user['remark_attendance']."</td>"; 
                              echo "<td style='display:none;'>".$attendance_user['late_minutes']."</td>"; 

                              if($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL || !empty($attendance_user['remark_attendance']) ){
                                   echo "<td style='display: none;'>Present</td>";

                               }

                            else  if(($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL  && $attendance_user['late_minutes'] !=  '00:00' && $attendance_user['excess_break']  !=  '00:00:00'  && $attendance_user['excess_lunch']  !=  '00:00:00') || !empty($attendance_user['remark_attendance'])){
                                     echo "<td style='display:none;'> Present -   Late -  Excess Break - Excess Lunch</td>";

                               }

                               else if(($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL  && $attendance_user['late_minutes']  !=  '00:00:00'  && $attendance_user['excess_break']  !=  '00:00:00') || !empty($attendance_user['remark_attendance'])){
                                     echo "<td style='display:none;'>Present - Late - Excess Break</td>";

                               }
                               else if(($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL  && $attendance_user['late_minutes']  !=  '00:00:00'  && $attendance_user['excess_lunch']  !=  '00:00:00') || !empty($attendance_user['remark_attendance'])){
                                     echo "<td style='display:none;'>Present - Late - Excess Lunch</td>";

                               }
                                  else if(($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL  && $attendance_user['late_minutes']  !=  '00:00') || !empty($attendance_user['remark_attendance']) ){
                                     echo "<td style='display:none;'>Present - Late </td>";

                               }
                                  else if(($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL  && $attendance_user['excess_break']  !=  '00:00:00') || !empty($attendance_user['remark_attendance']) ){
                                     echo "<td style='display:none;'>Present - Excess Break</td>";

                               }
                                 else if(($attendance_user['time_in'] != NULL && $attendance_user['time_out'] != NULL  && $attendance_user['excess_lunch']  !=  '00:00:00') ||!empty($attendance_user['remark_attendance'])){
                                     echo "<td style='display:none;'>Present - Excess Lunch</td>";

                               }

                               else{
                                   echo "<td style='display: none;'></td>";
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

<!--        <div class="col-sm-3" style="float: none !important;">
            <label for="validationCustom03">Date</label>
              <div id="reportrangeidle" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                  <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                  <span></span> <b class="caret"></b>
                 </div><!-- DEnd ate Picker Input -->            
         <!--  </div> -->
<!-- 
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
                  <th>Employee Name</th>
                  <th>Date Idle</th>
                  <th>Time Idle</th>
                </tr>
              </thead>
              <tbody >
              <?php
                  if ($idle_users > 0){
                       foreach ($idle_users as $idle_user){
    
                           echo "<tr>";
                                  echo "<td><a href='#' class='view_attendance_history' data-toggle='modal' data-target='#viewattendance_historymodal' data-backdrop='static' data-keyboard='false' data-attendance_id='".$idle_user['user_id']."'  data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$idle_user['firstname']. ' ' .$attendance_user['lastname']. ' - ' .$attendance_user['usertype']."</td>";
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
 -->
          <br />

          <div class="row">

              </div>
        </div>

        <div id="sales" class="container tab-pane fade"><br>
          <h3>Sales</h3>
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            
            <div class="col-md-12 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Sales</span>
              <div class="count total_sales">$ 0.00</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> From on this Month</span>
            </div>
          </div>
        </div>
          <!-- /top tiles -->
          <form id="sales_lead_agent_form">
             <div class="col-sm-3 inline-block">
                <label for="validationCustom03">Date</label>
                  <div id="reportattendancerange" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                      <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                      <span></span> <b class="caret"></b>
                     </div><!-- DEnd ate Picker Input -->            
              </div>
                   <div class="col-sm-3 inline-block">
                <label for="validationCustom03">User</label>
                      <select class="form-control year" name="agent_type">
                       <option selected value="">Please Select an User in Charge</option>
                         <?php 
                             if ($user_agents > 0){
                                 foreach ($user_agents as $user_agent){
                                   echo "<option value='".ucfirst($user_agent['payment_usercharge'])."'>".ucfirst($user_agent['payment_usercharge']) ."</option>";
                               }
                            } 
                          ?>
                      </select>
                 </div>
            </form>
             <br>

  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>List of Leads
<!--  -->
  </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="salesdataTables" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Lead ID</th>
                  <th>Package Name</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th class="sumamount">Amount Paid</th>
                  <th>Collection Status And Date</th>
                  <th>Approval Status And Date</th>
                  <th>Payment Status and Date</th>
                  <th>Contract Status and Date</th>
                  <th>User Charge</th>
                  <th>UserType</th>
                  <th style='display:none;'></th>
                  <th style='display:none;'></th>
                </tr>
              </thead>
              <tbody class="viewleadactivities">
              <?php
                  $get_count_payment =0;
                  $replace_comma = "";
                  if ($sales_lead > 0){
                       foreach ($sales_lead as $sale_lead){
                         
                         echo "<tr>";
                               echo "<td id='project_id'>".modules::run("dashboard/setindex_Lead_ID",$sale_lead['project_id'])."</td>"; 
                               echo "<td>".$sale_lead['product_name']."</td>";
                               echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$sale_lead['author_name']."' data-project_id=".$sale_lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$sale_lead['author_name']."</td>";
                               echo "<td>".$sale_lead['book_title']."</td>";
                               echo "<td>".$sale_lead['email_address']."</td>";
                               echo "<td>".$sale_lead['contact_number']."</td>";
                               echo "<td class='amount_paid'>$ ".number_format(str_replace(",","",$sale_lead['initial_payment']),2,".",",")."</td>";
                               echo "<td >".$sale_lead['collect_payment_status']. ' - '. date("d/m/Y", strtotime($sale_lead['collection_date']))."</td>";
                               echo "<td><span class='approval_status'>".$sale_lead['approval_status']. '</span>- '. date("d/m/Y", strtotime($sale_lead['date_approve']))."</td>";
                               echo "<td><span class='status_payment'>".$sale_lead['status_payment']. '</span> - '. date("d/m/Y", strtotime($sale_lead['date_paid']))."</td>";
                               echo "<td><span class='status_payment'>".$sale_lead['contractual_status']. '</span> - '. date("d/m/Y", strtotime($sale_lead['date_contract_signed']))."</td>";
                               
                               echo "<td>".ucfirst($sale_lead['payment_usercharge']). "</td>";
                               echo "<td>".$sale_lead['payment_usertype']. "</td>";
                               echo "<td style='display:none'>".date("Y-m-d", strtotime($sale_lead['date_paid'])). "</td>";
                               echo "<td style='display:none'>".date("Y", strtotime($sale_lead['date_paid'])). "</td>";
                          echo "</tr>";
                     }
                  }  
                  ?>
              </tbody>
            </table>
            <div id="sales" style="float:right; margin-right: 220px; float: right; font-size: 20px;"><b>Total Sales</b>  <span class="total_sales" style></span>
          </div>
        </div>
      </div>
    </div>
          <br />

         
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>


  



           </div>



