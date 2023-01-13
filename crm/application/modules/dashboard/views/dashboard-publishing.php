
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
            <i class="fa fa-table"></i>List of Cover Designer Report
            
		<!--  -->
		  </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                  <th>Author's Name</th>
                  <th>Book Title</th>
                  <th>Designer Name</th>
                  <th>Date Received</th>
                  <th>Project Status</th>
                  <th>Date Delivered</th>
                  <th>Status of Payment</th>
                  <th>Total Amonut Charged</th>
                  <th>Date Completed</th>
                  <th>Edit</th>
                  <th>Details</th>
                  <th>History</th>

                </tr>
              </thead>
              <tbody>
              <?php
                if ($author_reports > 0){
                       foreach ($author_reports as $report){
                         
                         echo "<tr>";
                               echo "<td><a href='#' class='view_designercover_interiorhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$report['author_name']."' data-project_id=".$report['project_id']." data-designer_id=".$report['publisher_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$report['author_name']." </td>";                            
                                  echo "<td>".$report['book_title']."</td>";
                               echo "<td>".$report['firstname']. ' '. $report['lastname']."</td>";
                                if ($report['date_received'] == NULL){
                                    echo "<td>Not Yet</td>";

                               }
                              else if (empty($report['lead_project_id']) || $report['publisher_id'] != $report['designer_user_id']){
                                    echo "<td>Not Yet</td>";
                               }
                               else{
                                   echo "<td>".date("d/m/Y", strtotime($report['date_received']))."</td>";

                               }
                               if (empty($report['lead_project_id']) || $report['publisher_id'] != $report['designer_user_id']){
                                    echo "<td>Not Yet</td>";
                               }
                               else{
                                     echo "<td>".$report['project_status_designer']."</td>";
                               }
                               
                               if ($report['date_delivered'] == NULL){
                                    echo "<td>Not Yet</td>";

                               }
                               else if (empty($report['lead_project_id']) || $report['publisher_id'] != $report['designer_user_id']){
                                    echo "<td>Not Yet</td>";
                               }
                               else{
                               echo "<td>".date("d/m/Y", strtotime($report['date_delivered']))."</td>";   
                               }                         
                               if (empty($report['status_payment'])){
                                 echo "<td>Pending</td>";
                               }
                               else if (empty($report['lead_project_id']) || $report['publisher_id'] != $report['designer_user_id']){
                                  echo "<td>Pending</td>";
                               }
                               else{
                                  echo "<td>".$report['status_payment']."</td>";

                               }
                               if (empty($report['lead_project_id']) || $report['publisher_id'] != $report['designer_user_id']){
                                    echo "<td>Php :</td>";
                               }
                               else{
                                   echo "<td>Php : ".$report['total_amount']."</td>"; 
                               }
                               if ($report['date_completed'] == NULL){
                                    echo "<td>Not Yet</td>";

                               }
                               else if (empty($report['lead_project_id']) || $report['publisher_id'] != $report['designer_user_id']){
                                    echo "<td>Not Yet</td>";
                               }
                               else{
                                   echo "<td>".date("d/m/Y", strtotime($report['date_completed']))."</td>";   
                               } 

                              if (empty($report['lead_project_id']) || $report['publisher_id'] != $report['designer_user_id']){

                                   echo "<td><button type='button' class='btn btn-danger view_designer_report' data-toggle='modal' data-target='#update_designer_report_modal' data-backdrop='static' data-user_id='".$report['publisher_id']."' data-keyboard='false' data-report_id='".$report['report_id']."' data-project_id='".$report['project_id']."' data-usertype='".$report['usertype']."' data-project_status='".$report['project_status']."' data-designer_report_id=''>Edit</button></td>";
                               }
                               else{
                                   echo "<td><button type='button' class='btn btn-danger view_designer_report' data-toggle='modal' data-target='#update_designer_report_modal' data-backdrop='static' data-user_id='".$report['publisher_id']."' data-keyboard='false' data-report_id='".$report['report_id']."' data-project_id='".$report['lead_project_id']."' data-usertype='".$report['usertype']."' data-project_status='".$report['project_status']."' data-designer_report_id='".$report['designer_report_id']."'>Edit</button></td>";
                               } 
                               

                               echo "<td><button type='button' class='btn btn-primary view_designer_detail' data-toggle='modal' data-target='#detail_designer_report_modal' data-backdrop='static' data-keyboard='false' data-project_id='".$report['project_id']."' data-usertype='".$report['usertype']."' data-project_status='".$report['project_status']."' data-designer_report_id='".$report['designer_report_id']."'>View</button></td>";

                               echo "<td><button type='button' class='btn btn-success view_report_designer_history' data-toggle='modal' data-target='#viewreport_designermodal' data-backdrop='static' data-keyboard='false' data-project_id='".$report['project_id']."' data-user_id='".$report['user_id']."'>View</button></td>";
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

    
        <!-- /page content -->

