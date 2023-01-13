
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
            <i class="fa fa-table"></i>List of Report
              <div style="float:right; ">
	            <div style="display:inline-block">
	               <!-- <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addreportModal" data-backdrop="static" data-keyboard="false">Add Report</button> -->
                 <a href="<?echo base_url('dashboard/create_report');?>" style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true">Add Report</a>
	            </div>   
		  </div>
		<!--  -->
		  </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Submission IDs</th>
                  <th>Book Title</th>
                  <th>Author's Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if ($submissions > 0){
                       foreach ($submissions as $submission){
                         
                         echo "<tr>";
                               echo "<td>".modules::run("dashboard/setindex_Submission_ID",$submission['project_id'])."</td>";
                               echo "<td>".$submission['book_title1']."</td>";
                               echo "<td>".$submission['submitted_by']."</td>";
                               if($submission['report_status'] == "Approved"){
                                   echo "<td>".$submission['report_status']."</td>";
                                 }
                               else{ 
                                   echo "<td>Pending</td>";
                               }
                               // echo "<td><button class='btn btn-success' data-toggle='modal' data-target='#submisionModal'>Update</button></td>";
                               if($submission['report_status'] == "Approved"){
                               echo "<td><button class='btn btn-success disabled'>Edit</button></td>"; 
                                 }
                               else{ 
                               echo "<td><a href=".base_url('dashboard/updatesubmission/'.$submission['report_id'].'')." class='btn btn-info '>Edit</a></td>"; 
                               }
                               // echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$report['author_name']."' data-project_id=".$report['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$report['author_name']."</td>";
                               // echo "<td>".$report['book_title']."</td>";
                               // echo "<td>".$report['collect_payment_status']."</td>";
                               // echo "<td>".$report['project_status']."</td>";
                               // echo "<td>".$report['email_address']."</td>";
                               // echo "<td>".$report['contact_number']."</td>";
                               //echo "<td>Not yet</td>";
                               // echo "<td><button type='button' class='btn btn-danger view_report_author' data-toggle='modal' data-target='#updatereportModal' data-backdrop='static' data-keyboard='false' data-report_id='".$report['report_id']."' data-project_id='".$report['project_id']."' data-project_status='".$report['project_status']."'>Edit</button></td>";
                               // echo "<td><a href=".base_url('dashboard/updatereport/'.$submission['project_id'].'/'.$submission['report_id'].'')." class='btn btn-danger view_report_author' data-report_id='".$submission['report_id']."' data-project_id='".$submission['project_id']."' data-project_status='".$submission['project_status']."'>Edit</a></td>";
                               // echo "<td><button type='button' class='btn btn-success view_report_author_history' data-toggle='modal' data-target='#viewreportModal' data-backdrop='static' data-keyboard='false' data-project_id='".$report['project_id']."'>View</button></td>";
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

       <!-- Add Memo -->
         <div class="modal fade" id="submisionModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <span>Assign to a Project</span>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form id="memo_form" class="upload_file_form">
                      <div class="alert alert-success"><p></p></div>
                      <div class="modal-body">
                        <div class="memo-form">
                           <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Project ID</label>                         
                                <select class="form-control project_id selectpicker" name="project_id" data-live-search="true">
                                <option value="">Please Select A Project ID</option>
                                <?php 
                                   if ($author_names > 0){
                                       foreach ($author_names as $author_name){
                                         echo "<option value='".$author_name['project_id']."'>".modules::run("dashboard/setindex_prefix",$author_name['project_id'])."</option>";
                                     }
                                  } 
                                ?>
                              </select>
                        </div>
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
      