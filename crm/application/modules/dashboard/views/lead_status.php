 <!-- page content -->
<style type="text/css">

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

    #assignAgentModal .modal-content{padding: 0px 20px; width: 375%; margin-left: -660px;}
    #addAssignUserform .btn-light {
     width: 100% !important;
    }


</style>
        <div class="right_col" role="main">

          <!-- top tiles -->

          <div class="row" style="display: inline-block;" >

          <div class="tile_count">

            

          </div>

        </div>


 <!-- Performance tracker tiles -->
        <div class="card mb-3">
        <div class="card-header">
            Recycled/Dead Leads
          </div>

          <div id="loader" class="center"></div>
          <form id="status_lead_form" class="mt-3">
              <div class="alert alert-success"><p></p></div> 
<!--             <div class="col-sm-3 inline-block">
               <select class="form-control status_lead" name="status_lead">
                   <option selected="" value="">Please Select a Status </option>
                   <option value="Recycled">Recycled</option>
                   <option value="Dead">Dead</option>
                </select>
              </div> -->
              <div style="float:right; ">
              <button type="button" id="recyle_lead" class="btn btn-info">Recyled Lead</button>

            <!--   <button style="height: 38px;" type="button" class="btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#assignAgentModal" data-backdrop="static" data-keyboard="false">Recyle Lead</button> -->
              </div>

            
            </form>
          <div class="card-body">
         

              <div class="content-wrapper">
                <div class="row">
                 
                </div>            
              </div>

        </div>

      </div>
 <!-- End of Performance tracker tiles -->



          <!-- /top tiles -->

  <div class="card mb-3">

          <div class="card-header">

            <i class="fa fa-table"></i>List of Leads

              <div style="float:right; ">

            <form id="upload_lead_form" enctype="multipart/form-data"> 

              <div class="alert alert-success"><p></p></div> 


            </form>

      </div>

  </div>

          <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="statusleadDatatable" width="100%" cellspacing="0">

              <thead>

                <tr>

                  <th>Lead ID</th>

                  <th>Package Name</th>

                  <th style="width:45px;!important">Author Name</th>

                  <th>Book Title</th>

                  <th style="width:200px;!important;">Email Address</th>

                  <th>Contact #</th>

<!--                   <th>Area Code</th>
 -->
                  <th>Price</th>

                  <th>Last Agent Assigned</th>
                  <th>Lead Type</th>

                  <th>Contract Status</th>

                  <th>Date Created</th>
                  <th>Date Assigned</th>

                  <th>Update</th>

                </tr>

              </thead>

              <tbody>
              <?php

                  // $get_count_payment =0;

                  // $replace_comma = "";

                  // if ($leads > 0){

                  //      foreach ($leads as $lead){

                  //        // $file_name = $lead['file_name'] == '' ? 'Manual Added' :$lead['file_name'];

                  //        echo "<tr>";

                  //              echo "<td>".modules::run("dashboard/setindex_prefix",$lead['project_id'])."</td>"; 

                  //              echo "<td>".$lead['product_name']."</td>";

                  //              echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['author_name']."</td>";

                  //              echo "<td>".$lead['book_title']."</td>";

                  //              echo "<td>".$lead['email_address']."</td>";

                  //              echo "<td>".$lead['contact_number']."</td>";

                  //              echo "<td>".$lead['area_code']."</td>";

                  //              echo "<td>$ ".$lead['price']."</td>";
                  //              echo "<td>".$lead['firstname']. ' ' .$lead['lastname']."</td>";


                  //              echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead  ['date_create'])).  "</td>";

                  //              echo "<td>".$lead['contractual_status']."</td>";

                  //              echo "<td>".date("d/m/Y", strtotime($lead  ['date_create']))."</td>";

                  //              echo "<td><button type='button' class='btn btn-danger view_update_leaddetail' data-toggle='modal' data-target='#updateleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='".$lead['project_id']."'>Edit</button></td>";     
                  //              echo "<td style='display:none;'>".$lead['status']."</td>";
                        



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

                        <h2>List of agents for no activities.</h2>


                         <div class="form-group">

  
                            <div id="reportrangeleadstatus" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc; width: 20%;display: inline-block;" >
                                    <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                                    <span></span> <b class="caret"></b>
                                </div><!-- DEnd ate Picker Input -->   
           
                             <select class="agent selectpicker" name="agent" data-live-search="true" style="margin: 0px 35px;">
                                <option  value="0">Please Select An Agent</option>
                                  <?php 
                                     if ($assign_users > 0){
                                         foreach ($assign_users as $assign_user){
                                           echo "<option value='".$assign_user['user_id']."'>".ucfirst($assign_user['firstname']) .' '.ucfirst($assign_user['lastname']).  "</option>";

                                        }

                                    } 

                                  ?>
                              </select> 
                                <input type="hidden" name="from_date">
                                <input type="hidden" name="to_date">
                           </div>
                              <div class="card-body">

                              <div class="table-responsive">

                                <table class="table table-bordered" id="leaddataTableselectagent" width="100%" cellspacing="0">

                                  <thead>

                                    <tr>

                                      <th >Project ID</th>

                                      <th>Package Name</th>

                                      <th>Author Name</th>

                                      <th>Book Title</th>

                                      <th>Email Address</th>

                                      <th>Contact #</th>

                                      <th>Price</th>

                                      <th>Lead Type</th>

                                      <th>Income Level</th>


                                      <th>Agent Assigned</th>
                                      <th>Date Assign</th>
                                      <th>Remark</th>
                                      <th>Date Remark</th>zall_lead' class='form-check-input' style='position:relative; width:45px;'></th>


                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

                                      // $get_count_payment =0;

                                      // $replace_comma = "";

                                      // if ($lead_status_remarks > 0){

                                      //      foreach ($lead_status_remarks as $lead_status_remark){

                                      //        $file_name = $lead_status_remark['file_name'] == '' ? 'Manual Added' :$lead_status_remark['file_name'];

                                      //        echo "<tr>";

                                      //              echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead_status_remark['project_id'])."</td>"; 

                                      //              echo "<td>".$lead_status_remark['product_name']."</td>";

                                      //              echo "<td>".$lead_status_remark['author_name']."</td>";

                                      //              echo "<td>".$lead_status_remark['book_title']."</td>";

                                      //              echo "<td>".$lead_status_remark['email_address']."</td>";

                                      //              echo "<td>".$lead_status_remark['contact_number']."</td>";


                                      //              if($lead_status_remark['price'] == ''){
                                      //                  echo "<td>$ 0.00</td>";

                                      //              }
                                      //              else{
                                      //                echo "<td>$ ".$lead_status_remark['price']."</td>";
                                      //              }


                                      //              echo "<td>".$lead_status_remark['status']. ' - '. date("d/m/Y", strtotime($lead_status_remark['date_create'])).  "</td>";

                                      //              echo "<td>".$lead_status_remark['income_level']."</td>";

                                      //             echo "<td>".$lead_status_remark['firstname']. ' ' .$lead_status_remark['lastname']."</td>";

                                                                                                                                                                                                                                                                                                                                      
                                      //              echo "<td>".date("d/m/Y h:i:s a", strtotime($lead_status_remark['lead_date_agent_assign']))."</td>";

                                      //              echo "<td>".$lead_status_remark['create_remark']."</td>";
                                      //              if($lead_status_remark['date_create_remark'] == NULL){
                                      //                  echo "<td>No Remark Activities</td>";
                                      //              }
                                      //              else{
                                      //                   echo "<td>".date("d/m/Y h:i:s a", strtotime($lead_status_remark['date_create_remark']))."</td>";

                                      //              }

                                      //              echo "<td style='text-align:center;'><input type='checkbox' name='project_id[]' class='form-check-input project_id' value=".$lead_status_remark['project_id']."></td>";
                                      //             echo "<td style='display:none;'>".date("Y-m-d", strtotime($lead_status_remark['date_create_remark']))."</td>";
                                      //             echo "<td style='display:none;'>".date("Y-m-d", strtotime($lead_status_remark['lead_date_agent_assign']))."</td>";

                                      //         echo "</tr>";

                                      //    }

                                      // }  

                                      ?>

                                  </tbody>

                                </table>

                              </div>

                            </div>

                        <div class="form-group">
                                      
                                <!-- preloader -->
                                <div id="loader_1" class="center_1"></div>

                                <button type="button" id="recyle_lead" class="btn btn-success btn-lg btn-block">Save</button>

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