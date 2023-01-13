
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
         
            MANAGER DASHBOARD

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
                                 $test = 0;
                                     if ($user_agents > 0){
                                         foreach ($user_agents as $user_agent){
                                           echo "<option value='".ucwords($user_agent['firstname'].' '.$user_agent['lastname'])."'>".ucwords($user_agent['firstname'].' '.$user_agent['lastname'])."  </option>";
                                            $test += array_count_values($user_agent['firstname']);
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
                         $total_sales = 0;
                             if ($agent_sales > 0){
                                  foreach ($agent_sales as $key => $agent_sale) {
                                    # code...
                   
                                    $total_sales = floatval(preg_replace('/[^\d.]/', '', $agent_sale));
                                  }
                                    echo $total_sales.".00"; 
                               }
                               else{
                                  echo $total_sales.".00"; 
                               }
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
                             $count = 0; 
                              echo $number_assign_agents ." Active";
                             ?>

                        </i></h1>
                        <span>Agents</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h1><i class="fa fa-plus">
                              <?=$agent_submissions.".00";?>
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

           <div class="col-sm-3 inline-block">
                <label for="validationCustom03">Agent Name</label>
                  <form id="performance_task_form">
                      <select class="form-control user_id"  id="user_id" name="user_id">
                       <option selected value="">Select an Agent</option>
                         <?php 
                                     if ($all_agents > 0){
                                         foreach ($all_agents as $user_agent){
                                           echo "<option value='".$user_agent['user_id']."'>".ucwords($user_agent['firstname'].' '.$user_agent['lastname'])."  </option>";
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

<!-- /top tiles -->
     <div class="card mb-3">
         <div class="card-header">
            <i class="fa fa-table"></i>List of Leads
         </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leadManagerDashboarddataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Lead ID</th>
                  <th>Package Name</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th>Lead Source</th>
                  <th>Agent Assigned</th>
                  <th>Price</th>
                  <th>Balance</th>
                  <th>Status and Date</th>
                  <th>Date Assigned</th>
                  <th>Contract Status</th>
                  <th>Remark History</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  // $get_count_payment =0;
                  // $replace_comma = "";
                  // if ($leads > 0){
                  //     foreach ($leads as $lead){
                         
                  //        echo "<tr>";
                  //             echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 
                  //             echo "<td>".$lead['product_name']."</td>";
                  //             echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['author_name']."</td>";
                  //             echo "<td>".$lead['book_title']."</td>";
                  //             echo "<td>".$lead['email_address']."</td>";
                  //             echo "<td>".$lead['contact_number']."</td>";
                  //             echo "<td>".$lead['lead_owner']."</td>";
                  //             echo "<td>".$lead['fname']. ' '. $lead['lname']. "</td>";
                  //             echo "<td>$ ".$lead['price']."</td>";
                  //             echo "<td>$ ".$lead['remaining_balance']."</td>";
                  //              if($lead['date_updated'] == NULL){
                  //                 echo "<td>".$lead['status'].  "</td>";

                  //              } 
                  //              else{
                  //                echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead['date_updated'])).  "</td>";

                  //              }
                  //                if($lead['lead_date_agent_assign'] == NULL){
                  //                 echo "<td></td>";
                  //              } 
                  //              else{
                  //                 echo "<td>".date("d/m/Y", strtotime($lead['lead_date_agent_assign']))."</td>";

                  //              }
                  //             echo "<td>".$lead['contractual_status']."</td>";
                  //             echo "<td><button type='button' class='btn btn-outline-info btn-sm viewleadremark_history1' data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id='".$lead['project_id']."'>View</a></td>";
                  //         echo "</tr>";
                  //    }
                  // }  
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

    