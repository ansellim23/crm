
<div class="right_col" role="main">

          <!-- top tiles -->

          <div class="row" style="display: inline-block;" >

          <div class="tile_count">

            

          </div>

        </div>


          <!-- /top tiles -->

  <div class="card mb-3">

          <div class="card-header">

            <i class="fa fa-table"></i>List of Leads

              <div style="float:right; ">

            <form id="upload_lead_form" enctype="multipart/form-data"> 

              <div class="alert alert-success"><p></p></div> 

              <div style="display:inline-block">

               <button style="height: 33px; position: relative;  top: 6px;" type="button"  id="import_lead" class="btn btn-secondary fa fa-upload" aria-hidden="true">Upload</button>

              </div>    

              <div style="display:inline-block; margin-right:20px;">

                  <div class="custom-file">

                     <input type="file" name="uploadsignature" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput">

                     <label class="custom-file-label" for="customFileInput">Select file</label>

                  </div>

              </div>

            <div style="display:inline-block">

               <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addleadmodal" data-backdrop="static" data-keyboard="false">ADD LEAD</button>

            </div>   

            </form>

      </div>

  </div>

          <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="allleadadminDatatable" width="100%" cellspacing="0">

              <thead>

                <tr>

                  <th>Lead ID</th>

                  <th>Package Name</th>

                  <th style="width:45px;!important">Author Name</th>

                  <th>Book Title</th>

                  <th style="width:200px;!important;">Email Address</th>

                  <th>Contact #</th>

                  <th>Lead Source</th>
                 <th>Income Level</th>

                  <th>Price</th>

                  <th>Lead Type</th>

                  <th>Contract Status</th>

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

                  //              echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 

                  //              echo "<td>".$lead['product_name']."</td>";

                  //              echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['author_name']."</td>";

                  //              echo "<td>".$lead['book_title']."</td>";

                  //              echo "<td>".$lead['email_address']."</td>";

                  //              echo "<td>".$lead['contact_number']."</td>";

                  //              echo "<td>".$lead['lead_owner']."</td>";

                  //              echo "<td>".$lead['income_level']."</td>";

                  //              echo "<td>$ ".$lead['price']."</td>";

                  //              if($lead['date_updated'] == NULL){
                  //                 echo "<td>".$lead['status'].  "</td>";

                  //              } 
                  //              else{
                  //                echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead['date_updated'])).  "</td>";
                                 
                  //              }

                  //              echo "<td>".$lead['contractual_status']."</td>";
                  //               if($lead['lead_date_agent_assign'] == NULL){
                  //                 echo "<td></td>";

                  //              } 
                  //              else{
                  //                 echo "<td>".date("d/m/Y", strtotime($lead['lead_date_agent_assign']))."</td>";

                  //              }


                  //              echo "<td><button type='button' class='btn btn-danger view_update_leaddetail' data-toggle='modal' data-target='#updateleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='".$lead['project_id']."'>Edit</button></td>";                             



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
