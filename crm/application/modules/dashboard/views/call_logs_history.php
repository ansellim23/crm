
  <!-- page content -->

     <div class="right_col" role="main">

          <!-- top tiles -->

          <div class="row" style="display: inline-block;" >

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

                     </div><!-- DEnd ate Picker Input -->            

              </div>

                   <div class="col-sm-3 inline-block">

                <label for="validationCustom03">Agent/Manager</label>

                      <select class="form-control year" name="user_type" id="user_type">

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

            </form>



      <br>



          <!-- /top tiles -->



  <div class="card mb-3">



          <div class="card-header">



            <i class="fa fa-table"></i>List of Agent Users



              <div style="float:right; ">



      </div>



  </div>



          <div class="card-body">



          <div class="table-responsive">



            <table class="table table-bordered" id="call_log_historytable" width="100%" cellspacing="0">



                    <thead>



                      <tr>



                        <th>Type</th>



                        <th>From</th>



                        <th>To</th>



                        <th>Ext</th>



                        <th>Area</th>



                        <th>Date/Time</th>


                        <th style="display: none;">Date</th>


                        <th>Action</th>



                        <th>Result</th>



                        <th class="average_time">Length</th>



                      </tr>



                    </thead>



                    <tbody class="test_table">



                      <?php 

       date_default_timezone_set('America/New_York');


                          if ($call_log_histories > 0){



                            $from_name = array();



                            $to_name = array();



                            $get_extension_number = '';



                            $get_type = array();


                             foreach ($call_log_histories as $call_log_history){

                                       if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted" || $call_log_history->result == "No Answer"){


                                          $from_name = !empty($call_log_history->from->name) ? $call_log_history->from->name: "";



                                          $to_name = !empty($call_log_history->to->name)? $call_log_history->to->name: "";



                                          $to_location= !empty($call_log_history->to->location)? $call_log_history->to->location: "";



                                          $to_Phonenumber = !empty($call_log_history->to->phoneNumber)? modules::run("dashboard/formatPhoneNumber",($call_log_history->to->phoneNumber)): "";



                                          $from_Phonenumber = !empty($call_log_history->from->phoneNumber)? modules::run("dashboard/formatPhoneNumber",($call_log_history->from->phoneNumber)): "";



                                          if($call_log_history->action == 'Incoming Fax'){



                                              $get_type = 'Incoming Fax';



                                          }



                                          else if($call_log_history->result == 'Missed'){



                                              $get_type = 'Missed Voice Call';



                                          }



                                          else{



                                              $get_type = $call_log_history->direction." Voice Call";



                                          }



                                          if($from_name == 'Warren Walton'){



                                              $get_extension_number = '101';



                                          }



                                         else if($from_name == 'Andrew Paige'){



                                              $get_extension_number = '102';



                                          }


                                           else if($from_name == 'Alex Morgan'){

                                                  $get_extension_number = '103';

                                              }




                                          else if($from_name == 'Lourie Sanchez'){



                                              $get_extension_number = '104';



                                          }



                                          else if($from_name == 'Jade Smith'){



                                              $get_extension_number = '105';



                                          }



                                          else if($from_name == 'Sandra Luuder'){



                                              $get_extension_number = '106';



                                          }

                                           else if($from_name == 'Amanda Martinez'){

                                              $get_extension_number = '107';

                                          }
                                          else if($from_name == 'Emma Hyper'){


                                              $get_extension_number = '108';

                                          }
                                          else if($from_name == 'Randy Williams'){


                                              $get_extension_number = '109';

                                          }






                                           echo "<tr>";



                                                 echo "<td>".$get_type."</td>";



                                                 echo "<td>".$from_Phonenumber."</td>";



                                                 echo "<td>".$to_Phonenumber."</td>";



                                                 echo "<td>".$get_extension_number."</td>";



                                                 echo "<td>".$to_location."</td>";



                                                 echo "<td >".date('Y-m-d g:i A', strtotime($call_log_history->startTime))."</td>";


                                                echo "<td style='display: none;''>".date('Y-m-d', strtotime($call_log_history->startTime))."</td>";


                                                 echo "<td>".$call_log_history->action."</td>";



                                                 echo "<td>".$call_log_history->result."</td>";



                                                 echo "<td>".gmdate("H:i:s", $call_log_history->duration)."</td>";

                                                 



                                            echo "</tr>";



                                       }
                                  }

                         }



                      ?>



                    </tbody>



                  </table>


                 </div>



                </div>



              </div>



           </div>



