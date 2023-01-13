
  <style type="text/css">
        #addleadmodal .modal-content, #update_coverdesignermodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
        #addreportModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #updatereportModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
        #viewreport_designermodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
        #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}
        #update_designer_report_modal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}


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

        <!-- /top navigation -->

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
                  <th>Project ID</th>
                  <th>Author's Name</th>
                  <th>Book Title</th>
                  <th>Date Received</th>
                  <th>Project Status</th>
                  <th>Date Delivered</th>
                  <th>Status of Payment</th>
                  <th>Total Amount Charged</th>
                  <th>Date Completed</th>
                  <th>Edit</th>
                  <th>History</th>

                </tr>
              </thead>
              <tbody>
              <?php
                if ($author_reports > 0){
                       foreach ($author_reports as $report){
                         
                         echo "<tr>";
                                echo "<td>".modules::run("dashboard/setindex_prefix",$report['project_id'])."</td>"; 
                                echo "<td><a href='#' class='view_designerhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$report['author_name']."' data-project_id=".$report['project_id']." data-designer_id=".$report['cover_user_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$report['author_name']." </td>";                               echo "<td>".$report['book_title']."</td>";
                              if ($report['date_received'] == NULL){
                                    echo "<td>Not Yet</td>";

                               }
                              else if (empty($report['lead_project_id']) || $report['cover_user_id'] != $report['designer_user_id']){
                                    echo "<td>Not Yet</td>";
                               }
                               else{
                                   echo "<td>".date("d/m/Y", strtotime($report['date_received']))."</td>";

                               }
                               if (empty($report['lead_project_id']) || $report['cover_user_id'] != $report['designer_user_id']){
                                    echo "<td>Not Yet</td>";
                               }
                               else{
                                     echo "<td>".$report['project_status_designer']."</td>";
                               }
                               
                               if ($report['date_delivered'] == NULL){
                                    echo "<td>Not Yet</td>";

                               }
                               else if (empty($report['lead_project_id']) || $report['cover_user_id'] != $report['designer_user_id']){
                                    echo "<td>Not Yet</td>";
                               }
                               else{
                               echo "<td>".date("d/m/Y", strtotime($report['date_delivered']))."</td>";   
                               }                         
                               if (empty($report['status_payment'])){
                                 echo "<td>Pending</td>";
                               }
                               else if (empty($report['lead_project_id']) || $report['cover_user_id'] != $report['designer_user_id']){
                                  echo "<td>Pending</td>";
                               }
                               else{
                                  echo "<td>".$report['status_payment']."</td>";

                               }
                               if (empty($report['lead_project_id']) || $report['cover_user_id'] != $report['designer_user_id']){
                                    echo "<td>Php :</td>";
                               }
                               else{
                                   echo "<td>Php : ".$report['total_amount']."</td>"; 
                               }
                               if ($report['date_completed'] == NULL){
                                    echo "<td>Not Yet</td>";

                               }
                               else if (empty($report['lead_project_id']) || $report['cover_user_id'] != $report['designer_user_id']){
                                    echo "<td>Not Yet</td>";
                               }
                               else{
                                   echo "<td>".date("d/m/Y", strtotime($report['date_completed']))."</td>";   
                               } 

                             
                             if (empty($report['lead_project_id']) || $report['cover_user_id'] != $report['designer_user_id']){
                                   echo "<td><button type='button' class='btn btn-danger view_designeradmin_report' data-toggle='modal' data-target='#update_designer_report_modal' data-backdrop='static' data-keyboard='false' data-report_id='".$report['report_id']."' data-project_id='".$report['project_id']."' data-project_status='".$report['project_status']."' data-designer_report_id=''  data-user_id='".$report['cover_user_id']."'>Edit</button></td>";
                               }
                               else{
                                  echo "<td><button type='button' class='btn btn-danger view_designeradmin_report' data-toggle='modal' data-target='#update_designer_report_modal' data-backdrop='static' data-keyboard='false' data-report_id='".$report['report_id']."' data-project_id='".$report['lead_project_id']."' data-project_status='".$report['project_status']."' data-designer_report_id='".$report['designer_report_id']."'  data-user_id='".$report['cover_user_id']."'>Edit</button></td>";
                               } 
                               
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

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Horizons <a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>

  <!-- Update Report -->
         <div class="modal fade" id="update_designer_report_modal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="updatedesignerreportform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Cover Designer Manual</h2>
                        <p class="hint-text">Create Report.</p>
                           <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Project Status</label>                         
                                  <select class="form-control project_status" name="project_status">
                                  <option value="">Please Select a Project Status</option>
                                  <option value="Pending">Pending</option>
                                  <option value="Done Initial">Done Initial</option>
                                  <option value="Approved For Completion">Approved For Completion</option>
                                </select>                         
                            </div>
                            <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Status Payment</label>                         
                                <select class="form-control status_payment" name="status_payment" style="height:50px;">
                                    <option value="">Please Select a Status Payment</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Payment Inprocess">Payment Inprocess</option>
                                    <option value="Payment Inprocess">Payment Inprocess</option>
                                    <option value="Payment Confirmed">Payment Confirmed</option>
                                    <option value="Payment Not Accepted">Payment Not Accepted</option>
                                  </select>                        
                            </div>
                              <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Date Delivered</label>                         
                                  <div class="form-group mb-4" style="margin-bottom:-30px !important;">
                                <div class="datepicker date input-group p-0 shadow-sm">
                                    <input type="text" placeholder="Choose a date" name="date_delivered" class="form-control py-4 px-4 reservationDate">
                                    <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span></div>
                                </div>

                            </div>                     
                            </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Pen Name</label>                         
                               <input class="form-control pen_name" name="pen_name" readonly  id="pen_name" type="text" placeholder="Enter the Pen Name">
                          <input type="hidden" class="form-control" style="height:50px;" readonly  name="project_id"  placeholder="Project ID" aria-describedby="inputGroupPrepend" required>
                          <input type="hidden" class="form-control" style="height:50px;" readonly  name="report_id"  placeholder="Report ID" aria-describedby="inputGroupPrepend" required>
                          <input type="hidden" class="form-control" style="height:50px;" readonly  name="user_id"  placeholder="User Id" aria-describedby="inputGroupPrepend" required>                       
                          <input type="hidden" class="form-control" style="height:50px;" readonly  name="designer_report_id"  placeholder="User Id" aria-describedby="inputGroupPrepend" required>                       
                              </div>
                           <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Author's Name</label>                         
                              <input class="form-control author_name" readonly name="author_name"  id="author_name" type="text" placeholder="Enter the Author's Name">
                           </div>

                           <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">  Book Title &/Book Subtitle (if any)&/*Series Subtitle (if any)</label>                         
                                <textarea class="form-control book_title" readonly rows="2" name="book_title"></textarea>
                           </div>
                           <div class="col-sm-2 inline-block">
                                  <label for="validationCustom03">Category</label>                         

                               <input class="form-control book_categories" readonly name="book_categories"  id="book_categories" type="text" placeholder="">
                           </div>
                        <div style="margin:200px 0px 0px 0px;">
                           <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Book Size</label>                         
                              <input class="form-control book_size" readonly name="book_size"  id="book_size" type="text" placeholder="">

                           </div>
                            <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Paper Color Type</label>                         
                             <input class="form-control color_type" readonly name="color_type"  id="color_type" type="text" placeholder="">

                           </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">About the Author</label>                         
                                  <textarea class="form-control about_author" readonly rows="2" name="about_author"></textarea>
                           </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">About the Book</label>                         
                                  <textarea class="form-control about_book" readonly rows="2" name="about_book"></textarea>
                           </div>

                           <div class="col-sm-2 inline-block">
                               <label for="validationCustom03">Publishing Name</label>                         
                               <textarea class="form-control publishing_name" rows="2"  readonly name="publishing_name"></textarea>

                           </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Publishing Logo Instructions</label>                         
                                  <textarea class="form-control publishing_logo" rows="2"  readonly name="publishing_logo"></textarea>
                            </div>
                          </div>
                          <br>
                          <br>
                          <br>
                           <div class="card-body" style="margin:75px 0px 0px 0px;">
                              <div class="table-responsive">
                               <button style="float:right; height:50px; width:10%;" type="button" class="btn btn-primary fa fa-plus" id="add_more_reportdesigner">ADD MORE</button>
                               <table class="table table-bordered" id="leaddataTableFixed" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th style="display:none;"></th>
                                      <th style="width:120px;">Charge Occured</th>
                                      <th>Remark</th>
                                      <th style="width:100px">Remove</th>
                                    </tr>
                                  </thead>
                                  <tbody class="author_reportdesigner_detail">
<!--                                       <tr>
                                        <td><input class="form-control charge_occured" name="charge_occured[]" style="height:50px; " id="charge_occured" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="Enter the Page Number"></td>              
                                        <td><textarea class="form-control remark" rows="2" name="remark[]"></textarea></td>
                                        <td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>
                                      </tr> -->
                                  </tbody>
                                </table>  
                                    <div style="float:right"><span style="font-size:20px;">Total Amount :</span><input class="form-control total_amount" readonly name="total_amount" style="height:50px; display: inline-block; width: 160px;" readoly onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="Total Amount"></td>              

                              </div>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                               <table class="table table-bordered" id="front_coverdataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th style="display:none;"></th>
                                      <th>Front Cover Instructions</th>
                                      <th>Actual Cover</th>
                                      <th>Correct Cover</th>
                                      <th style="display:none;"></th>
                                    </tr>
                                  </thead>
                                  <tbody class="front_cover_report_detail">
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                               <table class="table table-bordered" id="back_coverdataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th style="display:none;"></th>
                                      <th>Back Cover Instructions</th>
                                      <th>Actual Cover</th>
                                      <th>Correct Cover</th>
                                      <th style="display:none;"></th>
                                    </tr>
                                  </thead>
                                  <tbody class="back_cover_report_detail">

                                  </tbody>
                                </table>
                              </div>
                            </div>
                        <div class="form-group">
                                <button type="button" id="update_report_designer" class="btn btn-success btn-lg btn-block" style="width:10%;">Update</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:10%;">Close</button>
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

        
        <!-- The History Leas  Remark-->
                <div class="modal fade" id="viewreport_designermodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Covers Report History </h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="historydesignertable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Author Name</th>
                                            <th>Book Title</th>
                                            <th>Cover Designer Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>UserType</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewreportdesignerhistory">

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


         <!-- Add User -->
         <div class="modal fade" id="addUserModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="adduserform" method="post" enctype="multipart/form-data">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Add User</h2>
                        <p class="hint-text">Create user account.</p>
                           <div class="form-group">
                              <input type="text" class="form-control" name="real_name" placeholder="Real Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="username" placeholder="User Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="email" class="form-control" name="email_address" placeholder="Email Address" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="contact" placeholder="Contact Number" required="required">
                            </div>
                         <div class="form-group">
                            <select class="form-control usertype" name="usertype">
                                <option value="">Please Select An UserType</option>
                                <option value="Admin">Admin</option>
                                <option value="IT">IT</option>
                                <option value="Manager">Manager</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Production">Production</option>
                                <option value="Finance">Finance</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Author Relation">Author Relation</option>
                                <option value="Agent">Agent</option>
                              </select>
                           </div>
                              <div class="form-group">
                              <select class="form-control schedule_type" name="schedule_type">
                                <option value="">Please Select a Schedule Type</option>
                                <option value="Regular">Regular</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Flexible">Flexible</option>
                              </select>
                           </div>

                          <div class="form-group">
                                <div class="input-group date" id="datetimepicker_start_time" data-target-input="nearest">
                                    <input type="text" name="start_time" class="form-control datetimepicker-input" data-target="#datetimepicker_start_time"/>
                                    <div class="input-group-append" data-target="#datetimepicker_start_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                    </div>
                                </div>
                           </div>

                                <div class="form-group">
                                <div class="input-group date" id="datetimepicker_end_time" data-target-input="nearest">
                                    <input type="text" name="end_time" class="form-control datetimepicker-input" data-target="#datetimepicker_end_time"/>
                                    <div class="input-group-append" data-target="#datetimepicker_end_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                    </div>
                                </div>
                           </div>

                             <div class="form-group">
                               <div class="custom-file">

                                 <input type="file" name="uploadsignature" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput">

                                 <label class="custom-file-label" for="customFileInput">Upload Signature</label>

                              </div>

                               <div class="form-group text-center mt-2" >

                                    <img src="<?php echo base_url("images/No_image_available.png"); ?>" id="image_preview" alt="No image Available" width="100" height="100">

                              </div>

                           </div>
                           <div class="form-group">
                             <label class="form-check-label"><input type="checkbox" name="agreement" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                           </div>
                        <div class="form-group">
                                <button type="button" id="add_user" class="btn btn-success btn-lg btn-block">Add</button>
                            </div>
                        </form>
                    </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
          </div>
      </div>
      <!--end Add User-->
         <!-- Add Deduction -->
         <div class="modal fade" id="addDeductionModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="adddeductionform" method="post" enctype="multipart/form-data">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Create Employee Deduction</h2>
                            <div class="form-group">
                              <select name="user_id" class="form-control">
                                <?
                                  if($all_users > 0){
                                    foreach($all_users as $user){
                                      echo "<option value='".$user['user_id']."'>".$user['firstname']." ".$user['lastname']." - ".$user['usertype']."</option>";
                                    }
                                  }
                                ?>
                                <option>aw</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="reason" placeholder="Reason" required="required">
                            </div>
                            <div class="form-group">
                              <input type="number" class="form-control" name="amount" placeholder="Amount" required="required">
                            </div>
                           
                        <div class="form-group">
                                <button type="button" id="add_deduction" class="btn btn-success btn-lg btn-block">Add</button>
                            </div>
                        </form>
                    </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
          </div>
      </div>
      <!--end Add Deduction-->
      <!--Update User-->
      <div class="modal fade" id="updateUserModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="updateuserform" method="post" enctype="multipart/form-data">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Update User</h2>
                        <p class="hint-text">Update user account.</p>
                         <div class="form-group">
                              <input type="text" class="form-control" name="real_name" placeholder="Real Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="username" placeholder="User Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="email" class="form-control" name="email_address" placeholder="Email Address" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="contact" placeholder="Contact Number" required="required">
                            </div>
                         <div class="form-group">
                            <select class="form-control usertype" name="usertype">
                                <option value="">Please Select An UserType</option>
                                <option value="Admin">Admin</option>
                                <option value="IT">IT</option>
                                <option value="Manager">Manager</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Production">Production</option>
                                <option value="Finance">Finance</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Author Relation">Author Relation</option>
                                <option value="Agent">Agent</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <select class="form-control status" name="status">
                                <option value="">Please Select a Status</option>
                                <option value="Active">Active</option>
                                <option value="Deactivate">Deactivate</option>
                              </select>
                           </div>

                           <div class="form-group">
                              <select class="form-control schedule_type" name="schedule_type">
                                <option value="">Please Select a Schedule Type</option>
                                <option value="Regular">Regular</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Flexible">Flexible</option>
                              </select>
                           </div>

                          <div class="form-group">
                                <div class="input-group date" id="datetimepicker_start_time" data-target-input="nearest">
                                    <input type="text" name="start_time" class="form-control datetimepicker-input" data-target="#datetimepicker_start_time"/>
                                    <div class="input-group-append" data-target="#datetimepicker_start_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                    </div>
                                </div>
                           </div>

                                <div class="form-group">
                                <div class="input-group date" id="datetimepicker_end_time" data-target-input="nearest">
                                    <input type="text" name="end_time" class="form-control datetimepicker-input" data-target="#datetimepicker_end_time"/>
                                    <div class="input-group-append" data-target="#datetimepicker_end_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                    </div>
                                </div>
                           </div>

                             <div class="form-group">
                               <div class="custom-file">

                                 <input type="file" name="uploadsignature" class="custom-file-input" id="customFileInputupdate" aria-describedby="customFileInput">

                                 <label class="custom-file-label" for="customFileInput">Upload Signature</label>

                              </div>

                              <div class="form-group text-center mt-2" >

                                    <img src="<?php echo base_url("images/No_image_available.png"); ?>" id="image_preview" alt="No image Available" width="100" height="100">

                              </div>


                            </div>


                          <input type="hidden" name="userid">
                           
                           <div class="form-group">
                                <button type="button" id="update_user" class="btn btn-success btn-lg btn-block">Update</button>
                           </div>
                        </form>
                    </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
          </div>
      </div>
      <!--end Update User-->

                  <!-- The Add Lead Modal -->

                    <div class="modal fade" id="addleadmodal">

                      <div class="modal-dialog">

                        <div class="modal-content">

                          <!-- Modal Header -->

                          <div class="modal-header">

                            <h4 class="modal-title">Add Lead</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>

                          <!-- Modal body -->

                          <div class="modal-body">

                           <form class="needs-validation"  id="lead_form" novalidate>

                              <div class="alert alert-success"><p></p></div>

                              <div class="form-row">


                                <div class="col mb-3">

                                  <label for="validationCustom02">Package Name</label>

                                  <input type="text" class="form-control" style="height:50px;"  name="product_name" placeholder="Package Name" required>

                                </div>

                                <div class="col mb-3">

                                  <label for="validationCustomUsername">Author Name</label>

                                   <input type="text" class="form-control" style="height:50px;"  name="author_name" placeholder="Author Name" aria-describedby="inputGroupPrepend" required>

                                </div>

                                <div class="col mb-3">

                                   <label for="validationCustomUsername">Book Title</label>

                                    <input type="text" class="form-control" style="height:50px;"  name="title_name"  placeholder="Title Name" aria-describedby="inputGroupPrepend" required>

                                </div>

                              </div>

                              <div class="form-row">                             

                                  <div class="col mb-3">

                                    <label for="validationCustom02">Parent Id</label>

                                  <input type="text" class="form-control" style="height:50px;"  name="parent_id" placeholder="Parent Id" required>

                                </div>

                                <div class="col mb-3">

                                  <label for="validationCustom03">Status</label>

                                        <select class="form-control status" name="status" style="height:50px;">

                                          <option value="">Please Select a Tag</option>

                                          <option value="In Progress">In Progress</option>

                                          <option value="Assigned Low">Assigned Low</option>
                                          <option value="Assigned Mid">Assigned Mid</option>
                                          <option value="Assigned High">Assigned High</option>

                                          <option value="Recycled">Recycled</option>

                                          <option value="Dead">Dead</option>

                                        </select>

                                   </div>

                                   <div class="col mb-3">

                                      <label for="validationCustom05">Installment Term</label>

                                       <select class="form-control installment_term" name="installment_term" style="height:50px;" >

                                          <option value="">Please Select a Month</option>

                                          <option value="One Month">One Month</option>

                                          <option value="Two Months">Two Months</option>

                                          <option value="Three Months">Three Months</option>

                                          <option value="Four Months">Four Months</option>

                                          <option value="Five Months">Five Months</option>

                                          <option value="Six Months">Six Months</option>

                                        </select>                                   

                                   </div>

                                </div>

                                <div class="form-row">

                                  <div class="col mb-3">

                                      <label for="validationCustom05">Lead Owner</label>

                                      <select class="form-control installment_term" name="lead_owner" style="height:50px;" >

                                          <option value="Company">Company</option>

                                          <option value="Agent">Agent</option>

                                        </select> 

                                   </div>

                                  <div class="col mb-3">

                                      <label for="validationCustom05">Price</label>

                                      <input type="text" class="form-control" style="height:50px;" name="amount_paid"  placeholder="Price" required>

                                   </div>

                                   <div class="col mb-3">

                                      <label for="validationCustom03">Email Address</label>

                                    <input type="text" class="form-control" style="height:50px;"  name="email_address" placeholder="Email Address" required><a  class ="email_address" href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true" style="position: absolute;top: 25px; right: 6px; font-size:4em;"></i></a>

                                </div>

                                </div>

                                 <div class="form-row">

                                <div class="col mb-3">

                                  <label for="validationCustom04">Contact Number</label>

                                   <input type="text" id="contact_number" class="form-control" style="height:50px;"  name="contact_number" placeholder="Contact Number" required><a  class ="contact_number" href="#"><i class="fa fa-phone fa-3x" style="position: absolute;top: 25px; right: 6px; font-size:4em;" aria-hidden="true"></i></a>

                                </div>

                                <div class="col mb-3">

                                  <label for="validationCustom04">Area Code</label>

                                   <input type="text" id="area_code" class="form-control" style="height:50px;"  name="area_code" placeholder="Area Code" required>

                                </div>

                                </div>

                                 <div class="form-row">

                                <div class="col mb-3">

                                         <label for="validationCustom05">Address </label>

                                        <textarea class="form-control address" rows="3"  name="address"></textarea>

                                  </div>

                                  <div class="col mb-3">

                                         <label for="validationCustom05">Remark</label>

                                        <textarea class="form-control remark" rows="3"  name="remark"></textarea>

                                  </div>

                              </div>



                              <button class="btn btn-primary" id="add_lead" type="button">Save</button>

                            </form>

                          </div>
                          <!-- Modal footer -->

                          <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                          </div>

                          

                        </div>

                      </div>

                    </div>

      <!-- end of add lead modal -->

  





      <!-- The Update Lead Modal -->

        <div class="modal fade" id="updateleadmodal">

          <div class="modal-dialog">

            <div class="modal-content">

              <!-- Modal Header -->

              <div class="modal-header">

                <h4 class="modal-title">Update Lead </h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>

              <!-- Modal body -->

              <div class="modal-body">

               <form class="needs-validation"  id="update_lead_form" novalidate>

                  <div class="alert alert-success"><p></p></div>

                  <div class="form-row">

                      <div class="col mb-3">

                        <label for="validationCustom02">Package Name</label>

                        <input type="text" class="form-control" style="height:50px;"  name="product_name" placeholder="Package Name" required>

                      </div>

                      <div class="col mb-3">

                        <label for="validationCustomUsername">Author Name</label>

                         <input type="text" class="form-control" style="height:50px;"  name="author_name" placeholder="Author Name" aria-describedby="inputGroupPrepend" required>

                      </div>

                      <div class="col mb-3">

                         <label for="validationCustomUsername">Book Title</label>

                          <input type="text" class="form-control" style="height:50px;"  name="title_name"  placeholder="Title Name" aria-describedby="inputGroupPrepend" required>

                      </div>

                    </div>

                    <div class="form-row">

                      <div class="col mb-3">

                        <label for="validationCustom03">Status</label>

                              <select class="form-control status" name="status" style="height:50px;">

                                <option value="">Please Select a Tag</option>

                                <option value="In Progress">In Progress</option>

                                <option value="Assigned Low">Assigned Low</option>
                                <option value="Assigned Mid">Assigned Mid</option>
                               <option value="Assigned High">Assigned High</option>

                                <option value="Recycled">Recycled</option>

                                <option value="Dead">Dead</option>

                              </select>

                             <input type="hidden" class="form-control" style="height:50px;"  name="project_id"  placeholder="Title Name" aria-describedby="inputGroupPrepend" required>

                         </div>

                         <div class="col mb-3">

                            <label for="validationCustom05">Installment Term</label>

                             <select class="form-control installment_term" name="installment_term" style="height:50px;" >

                                <option value="">Please Select a Month</option>

                                <option value="One Month">One Month</option>

                                <option value="Two Months">Two Months</option>

                                <option value="Three Months">Three Months</option>

                                <option value="Four Months">Four Months</option>

                                <option value="Five Months">Five Months</option>

                                <option value="Six Months">Six Months</option>

                              </select>                                   

                         </div>

                      </div>

                      <div class="form-row">

                        <div class="col mb-3">

                            <label for="validationCustom05">Price</label>

                            <input type="text" class="form-control" style="height:50px;" name="amount_paid"  placeholder="Price" required>

                         </div>

                         <div class="col mb-3">

                            <label for="validationCustom03">Email Address</label>

                          <input type="text" class="form-control" style="height:50px;"  name="email_address" placeholder="Email Address" required><a  class ="email_address" href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true" style="position: absolute;top: 25px; right: 6px; font-size:4em;"></i></a>

                      </div>

                      </div>

                       <div class="form-row">

                      <div class="col mb-3">

                        <label for="validationCustom04">Contact Number</label>

                         <input type="text" id="contact_number" class="form-control" style="height:50px;"  name="contact_number" placeholder="Contact Number" required><a  class ="contact_number" href="#"><i class="fa fa-phone fa-3x" style="position: absolute;top: 25px; right: 6px; font-size:4em;" aria-hidden="true"></i></a>

                      </div>

                      <div class="col mb-3">

                        <label for="validationCustom04">Area Code</label>

                         <input type="text" id="area_code" class="form-control" style="height:50px;"  name="area_code" placeholder="Area Code" required>

                      </div>

                      </div>

                       <div class="form-row">

                      <div class="col mb-3">

                               <label for="validationCustom05">Address </label>

                              <textarea class="form-control address" rows="3"  name="address"></textarea>

                        </div>

                        <div class="col mb-3">

                               <label for="validationCustom05">Remark</label>

                              <textarea class="form-control remark" rows="3"  name="remark"></textarea>

                        </div>

                    </div>

                  <button class="btn btn-success" id="update_lead" type="button">Update</button>

                </form>

              </div>

    

              <!-- Modal footer -->

              <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

              </div>

              

            </div>

          </div>

        </div>

      <!-- end of upste lead modal -->

    

    <!-- The Pay Lead Modal -->

          <div class="modal fade" id="payleadmodal">

            <div class="modal-dialog">

              <div class="modal-content">

                <!-- Modal Header -->

                <div class="modal-header">

                  <h4 class="modal-title">Collection Lead</h4>

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                

                <!-- Modal body -->

                <div class="modal-body">

                 <form class="needs-validation"  id="pay_lead_form" novalidate>

                    <div class="alert alert-success"><p></p></div>

                    <div class="form-row">

                      <div class="col mb-3">

                        <label for="validationCustom02">Package Name</label>

                        <input type="text" readonly class="form-control" style="height:50px;"  name="product_name" placeholder="Package Name" required>

                      </div>

                      <div class="col mb-3">

                        <label for="validationCustomUsername">Author Name</label>

                         <input type="text" readonly class="form-control" style="height:50px;"  name="author_name" placeholder="Author Name" aria-describedby="inputGroupPrepend" required>

                      </div>

                      <div class="col mb-3">

                        <label for="validationCustomUsername">Book Title</label>

                         <input type="text" readonly class="form-control" style="height:50px;"  name="title_name"  placeholder="Title Name" aria-describedby="inputGroupPrepend" required>

                      </div>

                    </div>

                    <div class="form-row">

                      <div class="col mb-3">

                        <label for="validationCustom03">Collection Payment</label>

                              <select class="form-control status" name="status"   style="height:50px;">

                                

                               <!--  <option value="Refund Payment">Refund Payment</option> -->

                            </select>

                         </div>

                      <div class="col mb-3">

                        <label for="validationCustom03">Email Address</label>

                        <input type="text" readonly class="form-control" style="height:50px;"  name="email_address" placeholder="Email Address" required><a  class ="email_address" href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true" style="position: absolute;top: 25px; right: 6px; font-size:4em;"></i></a>

                      </div>

                      <div class="col mb-3">

                        <label for="validationCustom04">Contact Number</label>

                        <input type="text" readonly class="form-control" style="height:50px;"  name="contact_number" placeholder="Contact Number" required><i class="fa fa-phone fa-3x" style="position: absolute;top: 25px; right: 6px; font-size:4em;" aria-hidden="true"></i>

                      </div>



                        <div class="hide_amount_paid">

                            <div class="col mb-3">

                               <label for="validationCustom05">Price</label>

                               <input type="text" readonly class="form-control" style="height:50px;" name="amount_paid"  placeholder="Price" required>

                             </div>

                       </div>

                       </div>

                       <div class="hide_initialpayment">

                      <div class="form-row">

                       <div class="col mb-3">

                          <label for="validationCustom05" class="change_status">Initial Payment</label>

                         <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" style="height:50px;" id="initial_payment" value="0.00" name="initial_payment" placeholder="Initial Payment" required>

                       </div>

                      <div class="col mb-3">

                        <label for="validationCustom05">Collection Date</label>

                         <div class="form-group mb-4" style="margin-bottom:-30px !important;">

                                <div class="datepicker date input-group p-0 shadow-sm">

                                    <input type="text" placeholder="Choose a date" name="collection_date" class="form-control py-4 px-4 reservationDate">

                                    <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span></div>

                                </div>

                            </div>

                      </div>



                               <input type="hidden" placeholder="Project Id" name="project_id" value="" class="form-control py-4 px-4">

                               <input type="hidden" placeholder="Project Id" name="collection_id" value="" class="form-control py-4 px-4">

                               <input type="hidden" placeholder="Project Id" name="status_payment" value="" class="form-control py-4 px-4">

                               <input type="hidden" placeholder="Project Id" name="approved_status" value="" class="form-control py-4 px-4">

                               <input type="hidden" placeholder="Project Id" name="previous_amount" value="" class="form-control py-4 px-4">

                               <input type="hidden" placeholder="Project Id" name="previous_collect_status" value="" class="form-control py-4 px-4">

                               <input type="hidden" placeholder="Project Id" name="payment_id" value="" class="form-control py-4 px-4">

                               <input type="hidden" placeholder="Project Id" name="previous_collect_date" value="" class="form-control py-4 px-4">

                               <input type="hidden" placeholder="Project Id" name="get_previous_balance" value="" class="form-control py-4 px-4">

                        <div class="col mb-3">

                          <label for="validationCustom04">Remaining Balance <span id="get_balance"></span></label>

                          <input type="text" readonly class="form-control" name="remain_balance" style="height:50px;" value="Php 0.00" id="remain_balance" placeholder="Remaining Balance" required>

                        </div>



                      </div>

                      </div>

                      <div class="form-row">

                      <div class="col mb-3">

                               <label for="validationCustom05">Address </label>

                              <textarea class="form-control address" readonly rows="3"  name="address"></textarea>

                        </div>

                        <div class="col mb-3">

                               <label for="validationCustom05">Remark</label>

                              <textarea class="form-control remark" rows="3"  name="remark"></textarea>

                        </div>

                    </div>



                    <button class="btn btn-danger" id="pay_lead" type="button">Collect</button>

                    <button class="btn btn-success" id="update_pay_lead" type="button">Update</button>

                    <button class="btn btn-secondary view_approval_history" id="view_approval_history" data-project_id='' data-toggle='modal' data-target='#approvalhistorymodal' data-backdrop='static' data-keyboard='false'  type="button">View Approval Payment History</button>

<!--                     <button class="btn btn-secondary view_confirmpayment_history" id="view_payment_history" data-project_id='' data-toggle='modal' data-target='#approvalhistorymodal' data-backdrop='static' data-keyboard='false'  type="button">View Payment History</button>

 -->                  </form>

                </div>

                 <div class="card-body">

                    <div class="table-responsive display_table">

                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>

                          <tr>

                            <th>Amount Paid</th>

                            <th>Colllection Date</th>

                            <th>Collection Status</th>

                            <th>Approval Status and Date</th>

                            <th>Payment Status and Date</th>

                            <th>User Charge</th>

                            <th>User Type</th>

                            <th>Remark</th>

                            <th>Approval</th>

                            <th>Remark</th>

                          </tr>

                        </thead>

                        <tbody class="view_all_lead">

                       </table>

                    </div>

                    <div id ="display_balance" style="float: right; margin-right: 100px;font-size: 16px;"><b><span>REMAINING BALANCE:</span> <p id="balance" style="display:inline-block;"><p></b></div>

                  </div>

                <!-- Modal footer -->

                <div class="modal-footer">

                  <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>

                </div>

                

              </div>

            </div>

          </div>

      <!-- end of upste lead modal -->

              <!-- The Approval payment -->

                <div class="modal fade" id="viewlead_approval_modal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Approval Payment</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                            <form id="update_approval_lead_form">

                               <div class="alert alert-success"><p></p></div>

                                 <div class="col mb-3">

                                       <label for="validationCustom05">Approval Status</label>

                                       <select class="form-control approval_status" name="approval_status" style="height:50px;" >

                                          <option value="">Please Select a Approval Status</option>

                                          <option value="Approved">Approved</option>

                                          <option value="Declined">Declined</option>

                                        </select>



                                 </div>

                                  <div class="col mb-3">

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="payment_id"  placeholder="Price" required>

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>

                                      <button class="btn btn-warning" id="update_approval" type="button">Save</button>

                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                   </div>

                            </form>

                          </div>

                          

                    </div>

                  </div>

                </div>

            <!-- end of Approval modal -->



              <!-- The Author Payment -->

                <div class="modal fade" id="viewlead_payment_modal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Process Payment</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                            <form id="update_payment_lead_form">

                               <div class="alert alert-success"><p></p></div>

                                 <div class="col mb-3">

                                       <label for="validationCustom05">Payment Status</label>

                                       <select class="form-control payment_status" name="payment_status" style="height:50px;" >

                                          <option value="">Please Select a Payment Status</option>

                                          <option value="Pending">Pending</option>

                                          <option value="Paid">Paid</option>

                                          <option value="Refunded">Refunded</option>

                                          <option value="Cancelled">Cancelled</option>

                                        </select>



                                 </div>

                                  <div class="col mb-3">

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="payment_id"  placeholder="Price" required>

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="get_previous_balance"  placeholder="Price" required>

                                      <button class="btn btn-warning" id="update_lead_payment" type="button">Save</button>

                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                   </div>

                            </form>

                          </div>

                          

                    </div>

                 </div>

                </div>

            <!-- end of Author Payment modal -->



              <!-- The Contractual Author -->

                <div class="modal fade" id="viewlead_contractual_modal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Author Contract</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                            <form id="update_contract_lead_form">

                               <div class="alert alert-success"><p></p></div>

                                 <div class="col mb-3">

                                       <label for="validationCustom05">Contract Status</label>

                                       <select class="form-control contract_status" name="contract_status" style="height:50px;" >

                                          <option value="">Please Select a Contract Status</option>

                                          <option value="Pending">Pending Contract</option>

                                          <option value="Endorsed">Endorsement Contract</option>

                                          <option value="Signed">Signed Contract</option>

                                          <option value="Cancelled">Cancelled Contract</option>

                                        </select>



                                 </div>

                                  <div class="col mb-3">

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>

                                      <button class="btn btn-warning" id="update_lead_contract" type="button">Save</button>

                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                   </div>

                            </form>

                          </div>

                          

                    </div>

                  </div>

                </div>

            <!-- end of Author Payment modal -->



                    <!-- The Contractual Author -->

                <div class="modal fade" id="viewlead_contractualinvestment_modal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Author Contract Investment</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                            <form id="update_contractinnvestment_lead_form">

                               <div class="alert alert-success"><p></p></div>

                                 <div class="col mb-3">

                                       <label for="validationCustom05">Contract Investment</label>

                                       <select class="form-control contract_investment" name="contract_investment" style="height:50px;" >

                                          <option value="">Please Select a Contract Investment Status</option>

                                          <option value="Pending - Investment not received/Contract not signed">Pending - Investment not received/Contract not signed</option>

                                          <option value="Pending - Investment not received/Contract signed">Pending - Investment not received/Contract signed</option>

                                          <option value="Pending - Investment received/Contract not signed">Pending - Investment received/Contract not signed</option>

                                          <option value="Refunded">Refunded</option>

                                          <option value="Sold">Solds</option>

                                        </select>



                                 </div>

                                  <div class="col mb-3">

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>

                                      <button class="btn btn-warning" id="update_lead_contractinvestment" type="button">Save</button>

                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                   </div>

                            </form>

                          </div>

                          

                    </div>

                  </div>

                </div>

            <!-- end of Author Payment modal -->



            <!-- The payment  Remark-->

                <div class="modal fade" id="viewlead_paymentremark_modal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">View Remark</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                               <div class="alert alert-success"><p></p></div>

                                 <div class="col mb-3">

                                       <label for="validationCustom05">Remark</label>

                                         <textarea class="form-control remark"  disabled rows="3"  name="remark"></textarea>



                                 </div>

                                  <div class="modal-footer">

                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                  </div>

                          </div>

                          

                    </div>

                  </div>

                </div>

            <!-- end of Remark modal -->

   <!-- The History Approval-->

                <div class="modal fade" id="approvalhistorymodal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Approval Payment History</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                                <div class="table-responsive">

                                      <table class="table table-bordered" id="" width="100%" cellspacing="0">

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

                                            <th>Approval Status and Date</th>

                                            <th>User Charge</th>

                                            <th>User Type</th>

                                          </tr>

                                        </thead>

                                        <tbody class="viewapproval_payment">

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





         <!-- Edit User -->

         <div class="modal fade" id="editUserModal">

            <div class="modal-dialog">

              <div class="modal-content">

                    <div class="modal-header">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>

                 <div class="modal-body">

                      <div class="signup-form">

                      <form id="editUserform" method="post">

                          <div class="alert alert-success"><p></p></div>

                        <h2>Your Profile</h2>

                        <p class="hint-text">Edit your account.</p>

                            <div class="form-group">

                              <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required">

                            </div>

                            <div class="form-group">

                              <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required">

                            </div>

                            <div class="form-group">

                              <input type="text" class="form-control" name="username" placeholder="User Name" required="required">

                            </div>

                            <div class="form-group">

                              <input type="email" class="form-control" name="email_address" placeholder="Email Address" required="required">

                            </div>

                            <div class="form-group">

                              <input type="hidden" class="form-control" name="email_address_confirm" placeholder="Email Address" required="required">

                            </div>

                            <div class="form-group">

                              <input type="text" class="form-control" name="contact" placeholder="Contact Number" required="required">

                            </div>



                         <div class="form-group">

                            <select class="form-control usertype" name="usertype">

                                <option value="">Please Select An UserType</option>

                                <option value="Admin">Admin</option>

                                <option value="IT">IT</option>

                                <option value="Production">Production</option>

                                <option value="Manager">Manager</option>

                                <option value="Supervisor">Supervisor</option>

                                <option value="Finance">Finance</option>

                                <option value="Human Resources">Human Resources</option>

                                <option value="Agent">Agent</option>

                              </select>

                           </div>



                        <div class="form-group">

                                <button type="button" id="update_account" class="btn btn-success btn-lg btn-block">Update</button>

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



<!-- Password User -->

         <div class="modal fade" id="editUserPasswordModal">

            <div class="modal-dialog">

              <div class="modal-content">

                    <div class="modal-header">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>

                 <div class="modal-body">

                      <div class="signup-form">

                      <form id="editUserPasswordform" method="post">

                          <div class="alert alert-success"><p></p></div>

                        <h2>Change Password</h2>

                        <p class="hint-text">Change your password.</p>

                            <div class="form-group">

                              <input type="password" class="form-control" name="current_password" placeholder="Enter your Current Password" required="required">

                            </div>

                            <div class="form-group">

                              <input type="password" class="form-control" name="new_password" placeholder="Enter your New Password" required="required">

                            </div>

                            <div class="form-group">

                              <input type="password" class="form-control" name="confirm_password" placeholder="Enter your Confirm your Password" required="required">

                            </div>

                        <div class="form-group">

                                <button type="button" id="change_password" class="btn btn-success btn-lg btn-block">Update</button>

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

<!-- The History Leas  Remark-->

                <!-- The History Leas  Remark-->
                <div class="modal fade" id="viewleadhistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Your Lead History </h4> 
                           <a  class="btn btn-success btn-block viewleadremark_history" style="width: 220px; margin-left:50px; color:#ffffff;" data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name="">Lead Communications</a>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="historyleadtable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Project ID</th>
                                            <th>Package Name</th>
                                            <th>Author Name</th>
                                            <th>Book Title</th>
                                            <th>Email Address</th>
                                            <th>Contact #</th>
                                            <th>Lead Type</th>
                                            <th>Status and Date</th>
                                            
                                          </tr>
                                        </thead>
                                        <tbody class="viewleadhistory">

                                        </tbody>
                                      </table>
                              </div>
                                <form id="leadremarkform">
                                  <div class="col mb-1 w-50 p-3 align-middle" style="margin:0px auto;">
                                        <div class="alert alert-success"><p></p></div>
                                        <input type="hidden" readonly class="form-control" name="project_id" placeholder="Project ID" required="required">
                                        <input type="hidden" readonly class="form-control" name="author_name" placeholder="Author Name" required="required">
                                        <label for="validationCustom05">Add Remark</label>
                                        <textarea class="form-control remark" rows="4" name="remark"></textarea>
                                          <div class="form-group" style='margin-top:10px;'>
                                            <button type="button" id="add_remark" class="btn btn-success btn-lg btn-block">Save</button>
                                          </div>
                                    </div>
                                </form> 
                            </div>
                               <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

             <!-- The History Leas  Remark-->
                <div class="modal fade" id="viewleadremarkhistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Remark History </h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="historyleadtable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>From User</th>
                                            <th>User Type</th>
                                            <th>Remark</th>
                                            <th>Date Remark</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewleadremarkhistory">

                                        </tbody>
                                      </table>
                              </div>
                              <h4 class="modal-title">Activities History </h4> 

                                   <div class="table-responsive">
                                      <table class="table table-bordered" id="historylead_assigntable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Agent Name</th>
                                            <th>Status</th>
                                            <th>Date Activities</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewlead_status_history">

                                        </tbody>
                                      </table>
                              </div>
                            </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

            <!-- end of Remark modal -->



             <!-- The History Leas  Remark-->

                <div class="modal fade" id="viewleadremarkhistorymodal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Remark History </h4> 

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                                <div class="table-responsive">

                                      <table class="table table-bordered" id="historyremarkleadtable" width="100%" cellspacing="0">

                                        <thead>

                                          <tr>

                                            <th>From User</th>

                                            <th>User Type</th>

                                            <th>Remark</th>

                                            <th>Date Remark</th>

                                          </tr>

                                        </thead>

                                        <tbody class="viewleadremarkhistory">



                                        </tbody>

                                      </table>

                              </div>

                            </div>

                          </div>

                          

                    </div>

                  </div>

                </div>

            <!-- end of Remark modal -->

              <!-- The Contractual Author -->
                <div class="modal fade" id="viewlead_contractual_modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Signing Contract Author</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            <form id="update_approval_contract_form">
                               <div class="alert alert-success"><p></p></div>
                                 <div class="col mb-3">
                                       <label for="validationCustom05">Sign Contract</label>
                                       <select class="form-control contract_status" name="contract_status" style="height:50px;" >
                                          <option value="">Please Select a Sign Contract</option>
                                          <option value="Pending">Pending</option>
                                          <option value="Signed">Signed</option>
                                          <option value="Cancelled">Cancelled</option>
                                        </select>

                                 </div>
                                  <div class="col mb-3">
                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>
                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="contract_approval"  placeholder="Price" required>
                                      <button class="btn btn-warning" id="update_approval_contract" type="button">Save</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                   </div>
                            </form>
                          </div>
                          
                    </div>
                  </div>
                </div>


                     <!-- Idle  USER-->
                <div class="modal fade" id="addidleModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Employee's Idle</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                              <form id="idle_user_form">
                               <div class="alert alert-success"><p></p></div>

                                 <div class="col mb-3">
                                    <label for="validationCustom05">Please Select the Employee's for Idle</label>
                                    <?php foreach ($users as $user):?>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input check_user" name="user_id[]" value="<?php echo $user['user_id']; ?>"><b><?php echo $user['firstname'] .' '.$user['lastname'] .' - ' .$user['usertype']; ?></b>
                                          </label>
                                        </div>
                                       <?php endforeach; ?>
                                       <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input " name="check_all" id="check_all" value="all"><b>All</b>
                                          </label>
                                        </div>  
                                          <div class="form-check">
                                             <label for="sel1">Select Number attempt Idle (select one):</label>
                                                  <select class="form-control" id="attempt_idle" name="attempt_idle">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                  </select>                                         
                                           </label>
                                        </div>
                                  <div class="modal-footer">
                                      <button class="btn btn-primary" id="add_idle" type="button">Add</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                          </div>
                          
                          </form>
                    </div>
                  </div>
                </div>







     <script>var base_url = "<?php echo base_url(); ?>";</script>
    <!-- jQuery -->
    <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('datepicker/js/bootstrap-datepicker.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('bootstrap/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('bootstrap/vendors/nprogress/nprogress.js');?>"></script>
    <!-- Chart.js');?> -->
    <script src="<?php echo base_url('bootstrap/vendors/Chart.js/dist/Chart.min.js');?>"></script>
    <!-- gauge.js');?> -->
    <script src="<?php echo base_url('bootstrap/vendors/gauge.js/dist/gauge.min.js');?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js');?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('bootstrap/vendors/iCheck/icheck.min.js');?>"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url('bootstrap/vendors/skycons/skycons.js');?>"></script>
    <!-- Flot -->
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.pie.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.time.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.stack.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.resize.js');?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url('bootstrap/vendors/flot.orderbars/js/jquery.flot.orderBars.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/flot-spline/js/jquery.flot.spline.min.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/flot.curvedlines/curvedLines.js');?>"></script>
    <script src="<?php echo base_url(); ?>datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>datatables/dataTables.bootstrap4.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url('bootstrap/vendors/DateJS/build/date.js');?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/dist/jquery.vmap.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/dist/maps/jquery.vmap.world.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js');?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('bootstrap/vendors/moment/min/moment.min.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('bootstrap/build/js/custom.min.js'); ?>"></script>
    >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    <script src="<?php echo base_url('js/croppie.js');?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>
     <script type="text/javascript">

     </script>
  </body>

</html>



