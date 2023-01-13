

    <style type="text/css">

        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}

    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}

        #vewleadassign_agentmodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -445px;}

        #assignAgentModal .modal-content{padding: 0px 20px; width: 375%; margin-left: -660px;}
        #assignAgentVIPModal .modal-content{padding: 0px 20px; width: 375%; margin-left: -660px;}

    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    #addAssignUserform .bootstrap-select{width: 100% !important;}
    #addAssignUserform .btn-light{width: 100% !important;}
    #addAssignUserform .dropdown-menu{width: 100% !important;}

    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}

    #hide_table{

      display: none;

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

            <i class="fa fa-table"></i>List of Assign Agents
            <?php if ($this->session->userdata['userlogin']['usertype'] == 'Admin'): ?>
              <form id="auto_assign_lead_form">
                  <div style="float:right; ">

            <!--               <div style="display:inline-block; vertical-align: top; margin: 0px auto;">
                              <select class="selectpicker" id="agent_multiple" name="user_id[]" multiple data-live-search="true">

                            <?php if ($agents_active > 0):?>
                               <?php foreach ($agents_active as $row):?>
                                    <option value="<?php echo $row['user_id']; ?>"><?php echo $row['firstname'] .' '.$row['lastname']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?> 
                            </select>

                            
                          </div> -->

       <!--      	            <div style="display:inline-block">
                            <input type="text" class="form-control d-inline" style="width:25%;" name="quantity" value="50">
                            <button type="button" class="btn btn-danger" id="Add" value="Add">Add</button> -->

            	              <button style="height: 38px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#assignAgentModal" data-backdrop="static" data-keyboard="false">Assign Agent Regular Leads</button>
                            <button style="height: 38px;" type="button" class="btn btn-secondary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#assignAgentVIPModal" data-backdrop="static" data-keyboard="false">Assign Agent VIP/Premium Leads</button>

<!--             	            </div>   
 -->
                        <?php endif;?>

            		  </div>
         </form>

		<!--  -->

		  </div>

          <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="leadagentdataTable" width="100%" cellspacing="0">

              <thead>

                <tr>

                  <th>First Name</th>

                  <th>Last Name</th>

                  <th>Username</th>

                  <th>Email Address</th>

                  <th>Contact #</th>

                  <th>Status</th>

                  <th>Date Assign</th>

                  <th>Lead</th>

                </tr>

              </thead>

              <tbody>

              <?php

                  if ($assign_agents > 0){

                       foreach ($assign_agents as $agent){

                         

                         echo "<tr>";

                               echo "<td>".$agent['firstname']."</td>";

                               echo "<td>".$agent['lastname']."</td>";

                               echo "<td>".$agent['username']."</td>";

                               echo "<td>".$agent['emailaddress']."</td>";

                               echo "<td>".$agent['contact']."</td>";

                               echo "<td>".$agent['usertype']."</td>";

                               echo "<td>".date('Y/m/d h:i:s a', strtotime($agent['date_assign']))."</td>";

                               echo "<td><button type='button' class='btn btn-primary view_lead_assign_agent' data-toggle='modal' data-target='#vewleadassign_agentmodal' data-backdrop='static' data-keyboard='false' data-agent_id='".$agent['user_id']."' data-assign_user='Agent' data-date_create='".date('Y-m-d H:i:s', strtotime($agent['date_assign']))."'>View</button></td>";

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



        <footer>

          <div class="pull-right">

            Horizons <a href="https://colorlib.com"></a>

          </div>

          <div class="clearfix"></div>

        </footer>

        <!-- /footer content -->

      </div>



   <!-- The Assign Agent Modal-->

                <div class="modal fade" id="vewleadassign_agentmodal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Agent Lead</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                                <div class="table-responsive">

                                      <table class="table table-bordered" id="historyleadtable_agent_assign" width="100%" cellspacing="0">

                                        <thead>

                                          <tr>

                                            <th>Project ID</th>

                                            <th>Package Name</th>

                                            <th>Author Name</th>

                                            <th>Book Title</th>

                                            <th>Email Address</th>

                                            <th>Contact #</th>

                                            <th>Area Code</th>

                                            <th>Price</th>

                                            <th>Lead Type and Date</th>

                                            <th>Contract Status</th>

                                            <th>Date Assign</th>

                                          </tr>

                                        </thead>

                                        <tbody class="viewleadassign_agent">



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

           <!-- Add Assign aGENT -->

         <div class="modal fade" id="assignAgentModal">

            <div class="modal-dialog">

              <div class="modal-content">

                    <div class="modal-header">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>

                 <div class="modal-body">

                      <div class="signup-form">

                      <form id="addAssignUserform" class="addAssignUserform_Regular" method="post">

                          <div class="alert alert-success"><p></p></div>

                        <h2>Assign to Agent Regular Lead</h2>

                        <p class="hint-text">Create Agent to Assign.</p>

                         <div class="form-group">

                            <select class="agent selectpicker" name="agent" data-live-search="true">

                                <option value="">Please Select An Agent</option>

                                <?php 

                                   if ($assign_users > 0){

                                       foreach ($assign_users as $assign_user){

                                         echo "<option value='".$assign_user['user_id']."'>".ucfirst($assign_user['firstname']) .' '.ucfirst($assign_user['lastname']).  "</option>";

                                     }

                                  } 

                                ?>

                              </select>

                           </div>
                              <div class="card-body">

                              <div class="table-responsive">

                                <table class="table table-bordered" id="leaddataTableselectagent" width="100%" cellspacing="0">

                                  <thead>

                                    <tr>

                                      <th>Project ID</th>

                                      <th>Package Name</th>

                                      <th>Author Name</th>

                                      <th>Book Title</th>

                                      <th>Email Address</th>

                                      <th>Contact #</th>

                                      <th>Area Code</th>

                                      <th>Price</th>

                                      <th>Lead Type</th>
                                      <th>Lead Owner</th>

                                      <!-- <th>Contract Status</th> -->

                                      <th>Date Added</th>
                                      <th><input type='checkbox' id='check_all_lead' class='form-check-input' style='position:relative; width:45px;'></th>

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

                                                   echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 

                                                   echo "<td>".$lead['product_name']."</td>";

                                                   echo "<td>".$lead['author_name']."</td>";

                                                   echo "<td>".$lead['book_title']."</td>";

                                                   echo "<td>".$lead['email_address']."</td>";

                                                   echo "<td>".$lead['contact_number']."</td>";

                                                   echo "<td>".$lead['area_code']."</td>";

                                                   if($lead['price'] == ''){
                                                       echo "<td>$ 0.00</td>";

                                                   }
                                                   else{
                                                     echo "<td>$ ".$lead['price']."</td>";
                                                   }


                                                   echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead  ['date_create'])).  "</td>";

                                                   echo "<td>".$lead['lead_owner']."</td>";
                                                  //  echo "<td>".$lead['contractual_status']."</td>";

                                                   echo "<td>".date("d/m/Y h:i:s a", strtotime($lead  ['date_create']))."</td>";

                                                   echo "<td style='text-align:center;'><input type='checkbox' name='project_id[]' class='form-check-input project_id' value=".$lead['project_id']."></td>";

                                              echo "</tr>";

                                         }

                                      }  

                                      ?>

                                  </tbody>

                                </table>

                              </div>

                            </div>

                        <div class="form-group">
                                      
                                <!-- preloader -->
                                <div id="loader_1" class="center_1"></div>

                                <button type="button" id="add_agent" class="btn btn-success btn-lg btn-block">Add</button>

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


      <div class="modal fade" id="assignAgentVIPModal">

            <div class="modal-dialog">

              <div class="modal-content">

                    <div class="modal-header">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>

                 <div class="modal-body">

                      <div class="signup-form">

                      <form id="addAssignUserform" class="addAssignUserform" method="post">

                          <div class="alert alert-success"><p></p></div>

                        <h2>Assign to Agent VIP or VIP Premium Leads</h2>

                        <p class="hint-text">Create Agent to Assign.</p>

                         <div class="form-group">

                            <select class="agent selectpicker" name="agent" data-live-search="true">

                                <option value="">Please Select An Agent</option>

                                <?php 

                                   if ($assign_users > 0){

                                       foreach ($assign_users as $assign_user){

                                         echo "<option value='".$assign_user['user_id']."'>".ucfirst($assign_user['firstname']) .' '.ucfirst($assign_user['lastname']).  "</option>";

                                     }

                                  } 

                                ?>

                              </select>

                           </div>
                              <div class="card-body">

                              <div class="table-responsive">

                                <table class="table table-bordered" id="leaddataTableselectagentvip" width="100%" cellspacing="0">

                                  <thead>

                                    <tr>

                                      <th>Project ID</th>

                                      <th>Package Name</th>

                                      <th>Author Name</th>

                                      <th>Book Title</th>

                                      <th>Email Address</th>

                                      <th>Contact #</th>

                                      <th>Area Code</th>

                                      <th>Price</th>

                                      <th>Lead Type</th>
                                      <th>Income Level</th>

                                      <!-- <th>Contract Status</th> -->

                                      <th>Date Added</th>
                                      <th><input type='checkbox' id='check_all_lead' class='form-check-input' style='position:relative; width:45px;'></th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

                                      $get_count_payment =0;

                                      $replace_comma = "";

                                      if ($leads_vip > 0){

                                           foreach ($leads_vip as $lead){

                                             $file_name = $lead['file_name'] == '' ? 'Manual Added' :$lead['file_name'];

                                             echo "<tr>";

                                                   echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 

                                                   echo "<td>".$lead['product_name']."</td>";

                                                   echo "<td>".$lead['author_name']."</td>";

                                                   echo "<td>".$lead['book_title']."</td>";

                                                   echo "<td>".$lead['email_address']."</td>";

                                                   echo "<td>".$lead['contact_number']."</td>";

                                                   echo "<td>".$lead['area_code']."</td>";

                                                   if($lead['price'] == ''){
                                                       echo "<td>$ 0.00</td>";

                                                   }
                                                   else{
                                                     echo "<td>$ ".$lead['price']."</td>";
                                                   }


                                                   echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead  ['date_create'])).  "</td>";

                                                   echo "<td>".$lead['income_level']."</td>";
                                                  //  echo "<td>".$lead['contractual_status']."</td>";

                                                   echo "<td>".date("d/m/Y h:i:s a", strtotime($lead  ['date_create']))."</td>";

                                                   echo "<td style='text-align:center;'><input type='checkbox' name='project_id[]' class='form-check-input project_id' value=".$lead['project_id']."></td>";

                                              echo "</tr>";

                                         }

                                      }  

                                      ?>

                                  </tbody>

                                </table>

                              </div>

                            </div>

                        <div class="form-group">
                                <!-- preloader -->
                                <div id="loader_2" class="center_2"></div>
                                <button type="button" id="add_agent" class="btn btn-success btn-lg btn-block">Add</button>

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








