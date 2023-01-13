

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            
          </div>
        </div>
 <!-- Performance tracker tiles -->
        <div class="card mb-3">
        <div class="card-header">
         
            ADMIN DASHBOARD

          </div>
          <div class="card-body">
         


              <div class="content-wrapper">
                  <form id="sales_total_form">
                     <div class="col-sm-3 inline-block">
                        <label for="validationCustom03">Date</label>
                          <div id="sales_report_range" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                              <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                              <span></span> <b class="caret"></b>
                             </div><!-- DEnd ate Picker Input -->            
                      </div>
                           <div class="col-sm-3 inline-block">
                        <label for="validationCustom03">User</label>
                              <select class="form-control agent_type" name="agent_type">
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
                          <input type="hidden" class="form-control" name="from_date" placeholder="from_date" required="required">
                          <input type="hidden" class="form-control" name="to_date" placeholder="to_date" required="required">
                 </form></br>
                <div class="row">
                  <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                      <h1><i class="fa fa-dollar total_sales">
                      <?php
                         $total = 0;
                             if ($mysales > 0){
                                  foreach ($mysales as $sale){
                                    $amount_paid = floatval(preg_replace('/[^\d.]/', '', $sale['amount_paid']));
                                    $total += $amount_paid;
                               }
                            }
                            echo $total.".00"; 
                          ?>
                      </i></h1>
                        <span>Total Sales</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h1><i class="fa fa-user">
                          <?php 
                             $active = 0;
                             // $inactive = 0;
                             if ($users > 0){
                              foreach ($users as $user)
                              {
                                  if($user['status_user'] == 'Active'){
                                    $active++;

                                  // }else if($user['status_user'] == 'Deactivate'){
                                  //   $inactive++;
                                  }
                                }
                              }
                              echo $active." Active ";
                              // echo $inactive." Inactive";
                             ?>

                        </i></h1>
                        <span>Users</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h1><i class="fa fa-plus">
                              <?php $counts = 0; 
                                if ($submissions > 0){
                                  foreach($submissions as $submission){ 
                                    if(date("m", strtotime($submission['collection_date'])) == date("m"))
                                       {
                                        $counts++;
                                       }     
                                }
                              }
                                echo $counts.".00";
                                ?>
                        </i></h1>
                        <span>Submissions</span>
                      </div>
                    </div>
                  </div>
                </div>            
              </div> </br>

<!--               <div class="content-wrapper">
                <div class="row">
                  <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>                  
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>                           
                      </div>
                    </div>
                  </div>
                </div>            
              </div> -->

        </div>

      </div>
      <!-- End of Performance tracker tiles -->
      
      <!-- Performance tracker tiles -->
        <div class="card mb-3">
         
          <div class="card-header">
         
            <i class="fa fa-eye"></i>Performance Tracker/per agent
                     
          </div>

          <div class="card-body">
         

              <div class="content-wrapper">
                <div class="row">
                  <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
<!-- 
                       <div class="col-sm-3 inline-block">
                         <label for="validationCustom03">Date</label>
                          <div id="sales_report_range" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                              <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                              <span></span> <b class="caret"></b>
                          </div><!-- DEnd ate Picker Input -->            
<!--                       </div>
 -->
           <div class="col-sm-3 inline-block">

                <label for="validationCustom03">Agent Name</label>
                  <form id="performance_task_form">
                      <select class="form-control user_id"  id="user_id" name="user_id">
                       <option selected value="">Select an Agent</option>
                         <?php 
                             if ($all_agents > 0){
                                  foreach ($all_agents as $agent){
                                   echo "<option value='".$agent['user_id']."'>".$agent['firstname']. ' ' .$agent['lastname']. ' - ' .$agent['usertype'] ."</option>";
                               }
                            } 
                          ?>
                      </select>
                    </form>
                 </div>

                        <h4 class="card-title"></h4>
                        <table class="table">
                          <tr class="table-light">
                            <td>Time in : <span class="time_in"><?=$attendance_user['time_in'] != NULL ?  date('h:i:s a', strtotime($attendance_user['time_in'])) : "00:00:00";?></span></td>
                            <td>Call logs: <span class="current_call_logs"><?=$current_call_logs;?>/50</td>
                            <td>Pipes: <span class="current_pipes"><?=$current_pipes;?>/5</span></td>
                            <td>Current Qouta:$ <span class="current_qouta"><?=$current_quota['total_amount'] != NULL ? number_format(str_replace(",","",$current_quota['total_amount']),2,".",",") :  '0.00';?></span></td>
                          </tr>
                          <tr class="table-light">
                            <td>Over Break : <span class="excess_break"><?=$attendance_user['excess_break'] != NULL ?  $attendance_user['excess_break'] : "00:00:00";?></span></td>

                            <td>Prev. Call logs: <span class="prev_call_logs"><?=$prev_call_logs;?>/50</span></td>
                            <td>Prev. Pipes: <span class="prev_pipes"><?=$prev_pipes;?>/5</span></td>
                            <td>Last Calendar Qouta:$ <span class="prev_qouta"><?=$prev_quota['total_amount'] != NULL ? number_format(str_replace(",","",$prev_quota['total_amount']),2,".",",") :  '0.00';?></span></td>
                          </tr>
                          <tr class="table-light">
                            <td>Over Lunch : <span class="excess_lunch"><?=$attendance_user['excess_lunch'] != NULL ?  $attendance_user['excess_lunch'] : "00:00:00";?></span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr class="table-light">
                            <td>Time out : <span class="time_out"><?=$attendance_user['time_out'] != NULL ?  date('h:i:s a', strtotime($attendance_user['time_out'])) : "00:00:00";?></span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
<!--                   <div class="col-lg-3 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <canvas id="lineChart" height="200"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <canvas id="bar-chart-grouped" height="200"></canvas>
                      </div>
                    </div>
                  </div> -->
                </div>            
              </div>

        </div>

      </div>
 <!-- End of Performance tracker tiles -->
</div>

    
        <!-- /page content -->

                  <!-- The Add Lead Modal -->