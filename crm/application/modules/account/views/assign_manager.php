
      <style type="text/css">

        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}

        #vewleadassign_managermodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -445px;}

        #assignManagerModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #assignManagerVIPModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}

    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}

    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}

    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}


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

            <i class="fa fa-table"></i>List of Managers
            <?php if ($this->session->userdata['userlogin']['usertype'] == 'Admin'): ?>
              <form id="auto_assign_lead_form">
              <div style="float:right; ">

            <!--   <div style="display:inline-block; vertical-align: top; margin: 0px auto;">
                            <select class="selectpicker" id="agent_multiple" name="user_id[]" multiple data-live-search="true">

                            <?php if ($agents_active > 0):?>
                               <?php foreach ($agents_active as $row):?>
                                    <option value="<?php echo $row['user_id']; ?>"><?php echo $row['firstname'] .' '.$row['lastname']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?> 
                            </select>

                            
              </div> -->

	            <div style="display:inline-block">

            <!--   <button style="" type="button" class="btn btn-danger" id="on_off" value="Off">Off</button>
              <input type="text" name="on_off" value="Off"> -->
                <!-- <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-danger">Off</button> -->
                <button style="height: 38px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#assignManagerModal" data-backdrop="static" data-keyboard="false">Assign Manager Regular Leads</button>

                <button style="height: 38px;" type="button" class="btn btn-secondary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#assignManagerVIPModal" data-backdrop="static" data-keyboard="false">Assign Manager Vip/Premium</button>

	            </div>   

              <?php endif;?>

		  </div>
      </form>

		<!--  -->

		  </div>

          <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="leadmanagerdataTable" width="100%" cellspacing="0">

              <thead>

                <tr>

                  <th>First Name</th>

                  <th>Last Name</th>

                  <th>Username</th>

                  <th>Email Address</th>

                  <th>Contact #</th>

                  <th>User Type</th>

                  <th>Date Assign</th>

                  <th>Lead</th>

<!--                   <th>Edit</th>

 -->                </tr>

              </thead>

              <tbody>

              <?php

                  if ($assign_managers > 0){

                       foreach ($assign_managers as $manager){

                         

                         echo "<tr>";

                               echo "<td>".$manager['firstname']."</td>";

                               echo "<td>".$manager['lastname']."</td>";

                               echo "<td>".$manager['username']."</td>";

                               echo "<td>".$manager['emailaddress']."</td>";

                               echo "<td>".$manager['contact']."</td>";
                               echo "<td>".$manager['usertype']."</td>";

                               echo "<td>".date('Y-m-d h:i:s a', strtotime($manager['date_assign']))."</td>";

                               echo "<td><button type='button' class='btn btn-primary view_lead_assign_manager' data-toggle='modal' data-target='#vewleadassign_managermodal' data-backdrop='static' data-keyboard='false' data-assign_user='Manager' data-manager_id='".$manager['user_id']."' data-date_lead_assign='".$manager['date_assign']."'>View</button></td>";

                               // echo "<td><button type='button' class='btn btn-danger view_manager_assign' data-toggle='modal' data-target='#updateleadassign_managermodal' data-backdrop='static' data-keyboard='false' data-manager_id='".$manager['user_id']."' >Edit</button></td>";

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



    

<!-- The Assign Manager-->

                <div class="modal fade" id="vewleadassign_managermodal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Manager Lead</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                                <div class="table-responsive">

                                      <table class="table table-bordered" id="assignmanagerdatatable" width="100%" cellspacing="0">

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

                                            <th>Contract Status</th>

                                            <th>Date Assign</th>

                                          </tr>

                                        </thead>

                                        <tbody class="viewleadassign_manager">



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



           <!-- Add Assign Manager -->

         <div class="modal fade" id="assignManagerModal">

            <div class="modal-dialog">

              <div class="modal-content">

                    <div class="modal-header">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>

                 <div class="modal-body">

                      <div class="signup-form">

                      <form id="addAssignUserform" method="post">

                          <div class="alert alert-success"><p></p></div>

                        <h2>Assign to Manager Regular Leads</h2>

                        <p class="hint-text">Create Manager Assign.</p>

                         <div class="form-group">

                            <select class="form-control manager" name="manager">

                                <option value="">Please Select A Manager</option>

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

                                <table class="table table-bordered" id="assigndataTable" width="100%" cellspacing="0">

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

                                      <th>Agent Assign</th>

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

                                                   echo "<td>$ ".$lead['price']."</td>";

                                                   echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead['date_create'])).  "</td>";

                                                   echo "<td>".$lead['lead_owner']."</td>";

                                                  //  echo "<td>".$lead['contractual_status']."</td>";

                                                   echo "<td>".$lead['firstname'].' '. $lead['lastname']. "</td>";

                                                   echo "<td>".date("d/m/Y", strtotime($lead['date_create']))."</td>";

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

                                <button type="button" id="add_manager" class="btn btn-success btn-lg btn-block">Add</button>

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


  <div class="modal fade" id="assignManagerVIPModal">

            <div class="modal-dialog">

              <div class="modal-content">

                    <div class="modal-header">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>

                 <div class="modal-body">

                      <div class="signup-form">

                      <form id="addAssignUserform" method="post">

                          <div class="alert alert-success"><p></p></div>

                        <h2>Assign to Manager VIP/PREMIUM Leads</h2>

                        <p class="hint-text">Create Manager Assign.</p>

                         <div class="form-group">
                            <select class="form-control manager" name="manager">

                                <option value="">Please Select A Manager</option>

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

                                <table class="table table-bordered" id="assigndatatablevip" width="100%" cellspacing="0">

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

                                      <th>Agent Assign</th>

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

                                                   echo "<td>$ ".$lead['price']."</td>";

                                                   echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead['date_create'])).  "</td>";

                                                   echo "<td>".$lead['income_level']."</td>";

                                                  //  echo "<td>".$lead['contractual_status']."</td>";

                                                   echo "<td>".$lead['firstname'].' '. $lead['lastname']. "</td>";

                                                   echo "<td>".date("d/m/Y", strtotime($lead['date_create']))."</td>";

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

                                <button type="button" id="add_manager" class="btn btn-success btn-lg btn-block">Add</button>

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


           <!-- Update Assign Manager -->

         <div class="modal fade" id="updateleadassign_managermodal">

            <div class="modal-dialog">

              <div class="modal-content">

                    <div class="modal-header">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>

                 <div class="modal-body">

                      <div class="signup-form">

                      <form id="UpdateSignLeadform" method="post">

                          <div class="alert alert-success"><p></p></div>

                        <h2>Assign Lead</h2>

                        <p class="hint-text">Add Assign Lead</p>

                         <div class="form-group">

                             <label>Manager Name</label>

                              <input type="text" disabled class="form-control" value="" name="manager" placeholder="Manager" required="required">

                              <input type="hidden" disabled class="form-control" value="" name="user_id" placeholder="Manager" required="required">

                           </div>

                            <div class="form-group">

                                <label>Number of Leads</label>

                                <input type="text" class="form-control" value="1" name="number_of_lead" placeholder="Enter Number of Leads you want to add" required="required">

                            </div>

                        <div class="form-group">

                                <button type="button" id="add_manager" class="btn btn-success btn-lg btn-block">Add</button>

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

 
