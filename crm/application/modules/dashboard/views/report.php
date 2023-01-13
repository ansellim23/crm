
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
              <thead>X
                <tr>
                  <th>Project ID</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Collection Status</th>
                  <th>Project Status</th>
                  <th>Email Address</th>
                  <th>Contact Number</th>
                  <th>Assigned To</th>
                  <th>Update</th>
                  <th>History</th>
<!--                   <th>Edit</th>
 -->                </tr>
              </thead>
              <tbody>
              <?php
                  if ($author_reports > 0){
                       foreach ($author_reports as $report){
                         
                         echo "<tr>";
                               echo "<td>".modules::run("dashboard/setindex_prefix",$report['project_id'])."</td>"; 
                               echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$report['author_name']."' data-project_id=".$report['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$report['author_name']."</td>";
                               echo "<td>".$report['book_title']."</td>";
                               echo "<td>".$report['collect_payment_status']."</td>";
                               echo "<td>".$report['project_status']."</td>";
                               echo "<td>".$report['email_address']."</td>";
                               echo "<td>".$report['contact_number']."</td>";
                               echo "<td>Not yet</td>";
                               // echo "<td><button type='button' class='btn btn-danger view_report_author' data-toggle='modal' data-target='#updatereportModal' data-backdrop='static' data-keyboard='false' data-report_id='".$report['report_id']."' data-project_id='".$report['project_id']."' data-project_status='".$report['project_status']."'>Edit</button></td>";
                               echo "<td><a href=".base_url('dashboard/updatereport/'.$report['project_id'].'/'.$report['report_id'].'')." class='btn btn-danger view_report_author' data-report_id='".$report['report_id']."' data-project_id='".$report['project_id']."' data-project_status='".$report['project_status']."'>Edit</a></td>";
                               echo "<td><button type='button' class='btn btn-success view_report_author_history' data-toggle='modal' data-target='#viewreportModal' data-backdrop='static' data-keyboard='false' data-project_id='".$report['project_id']."'>View</button></td>";
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

    
      