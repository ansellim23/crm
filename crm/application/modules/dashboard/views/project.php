
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
           <i class="fa fa-table"></i>List of Leads

  </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataTablefixed" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Project ID</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Collection Status</th>
                  <th>Project Status</th>
                  <th>Email Address</th>
                  <th>Contact Number</th>

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
                               echo "<td><a href=".base_url('dashboard/project_detail/'.$report['project_id'].'/'.$report['report_id'].'')." data-report_id='".$report['report_id']."' data-project_id='".$report['project_id']."' data-project_status='".$report['project_status']."'>".$report['book_title']."</a></td>";
                               echo "<td>".$report['collect_payment_status']."</td>";
                               echo "<td>".$report['project_status']."</td>";
                               echo "<td>".$report['email_address']."</td>";
                               echo "<td>".$report['contact_number']."</td>";
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

          <div class="row">


    
                </div>
                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->