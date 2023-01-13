<style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
        #addreportModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #updatereportModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
        #viewreportModal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
        #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}

    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}

 .signup-form{width: 100%;}
 .signup-form form{height: 2755px; overflow: scroll;}
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
    width: 100%;
    display: inline-block;
}
.inline-block{
  margin: 15px 0px auto 0px;
}
label {
    display: inline-block;
    margin-bottom: .5rem;
    color: #000000;
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
            <i class="fa fa-table"></i>List of Report
    <!--  -->
      </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="productiondataTable" width="100%" cellspacing="0">
              <thead>
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

    
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Horizons <a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
            <!-- end of Remark modal -->

        <!-- The History Leas  Remark-->
                <div class="modal fade" id="viewreportModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Report History </h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="historyleadtable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Project ID</th>
                                            <th>Author Name</th>
                                            <th>Email Address</th>
                                            <th>Contact #</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Usertype</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewreporthistory">

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
