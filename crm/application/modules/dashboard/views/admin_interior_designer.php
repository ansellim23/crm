 <style type="text/css">
        #addleadmodal .modal-content, #update_interiordesignermodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
        #addreportModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #updatereportModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #update_designer_report_modal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
        #viewreportModal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
        #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}
        #viewreport_designermodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}


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
                               echo "<td><a href='#' class='view_designerhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$report['author_name']."' data-project_id=".$report['project_id']." data-designer_id=".$report['interior_user_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$report['author_name']." </td>";                          
                               echo "<td>".$report['book_title']."</td>";
                               echo "<td>".$report['firstname']. ' '. $report['lastname']."</td>";
                               if ($report['date_received'] == NULL){
                                    echo "<td>Not Yet</td>";

                               }
                              else if (empty($report['lead_project_id']) || $report['interior_user_id'] != $report['designer_user_id']){
                                    echo "<td>Not Yet</td>";
                               }
                               else{
                                   echo "<td>".date("d/m/Y", strtotime($report['date_received']))."</td>";

                               }
                               if (empty($report['lead_project_id']) || $report['interior_user_id'] != $report['designer_user_id']){
                                    echo "<td>Not Yet</td>";
                               }
                               else{
                                     echo "<td>".$report['project_status_designer']."</td>";
                               }
                               
                               if ($report['date_delivered'] == NULL){
                                    echo "<td>Not Yet</td>";

                               }
                               else if (empty($report['lead_project_id']) || $report['interior_user_id'] != $report['designer_user_id']){
                                    echo "<td>Not Yet</td>";
                               }
                               else{
                               echo "<td>".date("d/m/Y", strtotime($report['date_delivered']))."</td>";   
                               }                         
                               if (empty($report['status_payment'])){
                                 echo "<td>Pending</td>";
                               }
                               else if (empty($report['lead_project_id']) || $report['interior_user_id'] != $report['designer_user_id']){
                                  echo "<td>Pending</td>";
                               }
                               else{
                                  echo "<td>".$report['status_payment']."</td>";

                               }
                               if (empty($report['lead_project_id']) || $report['interior_user_id'] != $report['designer_user_id']){
                                    echo "<td>Php :</td>";
                               }
                               else{
                                   echo "<td>Php : ".$report['total_amount']."</td>"; 
                               }
                               if ($report['date_completed'] == NULL){
                                    echo "<td>Not Yet</td>";

                               }
                               else if (empty($report['lead_project_id']) || $report['interior_user_id'] != $report['designer_user_id']){
                                    echo "<td>Not Yet</td>";
                               }
                               else{
                                   echo "<td>".date("d/m/Y", strtotime($report['date_completed']))."</td>";   
                               } 

                              if (empty($report['lead_project_id']) || $report['interior_user_id'] != $report['designer_user_id']){
                                echo "<td><button type='button' class='btn btn-danger view_designer_report' data-toggle='modal' data-target='#update_designer_report_modal' data-backdrop='static' data-keyboard='false' data-report_id='".$report['report_id']."' data-project_id='".$report['lead_project_id']."' data-usertype='".$report['usertype']."' data-project_status='".$report['project_status']."'   data-designer_report_id='' data-user_id='".$report['interior_user_id']."'>Edit</button></td>";
                               }
                               else{
                                echo "<td><button type='button' class='btn btn-danger view_designer_report' data-toggle='modal' data-target='#update_designer_report_modal' data-backdrop='static' data-keyboard='false' data-report_id='".$report['report_id']."' data-project_id='".$report['lead_project_id']."' data-usertype='".$report['usertype']."' data-project_status='".$report['project_status']."'    data-designer_report_id='".$report['designer_report_id']."' data-user_id='".$report['interior_user_id']."'>Edit</button></td>";
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
                        <h2>Interior Designer Manual</h2>
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
                              <label for="validationCustom03">Author's Book Count</label>                         
                               <input class="form-control number_of_book" name="number_of_book" readonly  id="number_of_book" type="text" placeholder="Enter the Number of Books">
                           </div>

                        <div style="margin:160px 0px 0px 0px;">
                          <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">  Book Title &/Book Subtitle (if any)&/*Series Subtitle (if any)</label>                         
                                <textarea class="form-control book_title" readonly rows="2" name="book_title"></textarea>
                           </div>
                           <div class="col-sm-2 inline-block">
                               <label for="validationCustom03">Category</label>                         
                               <input class="form-control book_categories" readonly name="book_categories"  id="book_categories" type="text" placeholder="">
                           </div>
                           <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Book Color Type</label>                         
                             <input class="form-control book_size" readonly name="book_color"  id="book_color" type="text" placeholder="">
                           </div>

                           <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Book Size</label>                         
                              <input class="form-control book_size" readonly name="book_size"  id="book_size" type="text" placeholder="">
                           </div>
                            <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Paper Color Type</label>                         
                             <input class="form-control color_type" readonly name="color_type"  id="color_type" type="text" placeholder="">
                           </div>
                            <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Hardcover Format (if applicable)</label>                         
                              <input class="form-control hard_cover_format" readonly name="hard_cover_format"  id="hard_cover_format" type="text" placeholder="">
                         
                            </div>
                          </div>
                         <div style="margin:330px 0px 0px 0px;">
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">About the Author</label>                         
                                  <textarea class="form-control about_author" readonly rows="2" name="about_author"></textarea>
                           </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">About the Book</label>                         
                                  <textarea class="form-control about_book" readonly rows="2" name="about_book"></textarea>
                           </div>
                            <div class="col-sm-2 inline-block">
                               <label for="validationCustom03">Audience</label>                         
                               <input class="form-control audience" name="audience"  readonly id="audience" type="text" placeholder="Enter the Audience">
                           </div>
                           <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Cover Design Instructions</label>                         
                                <textarea class="form-control cover_design" readonly rows="2" name="cover_design"></textarea>
                            </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Interior Design Instructions</label>                         
                                <textarea class="form-control interior_design" readonly rows="2" name="interior_design"></textarea>
                            </div>
                           <div class="col-sm-2 inline-block">
                               <label for="validationCustom03">Publishing Name</label>                         
                               <textarea class="form-control publishing_name" rows="2"  readonly name="publishing_name"></textarea>
                           </div>
                            <div class="col-sm-2 inline-block">
                              <label for="validationCustom03">Publishing Logo Instructions</label>                         
                                  <textarea class="form-control publishing_logo" rows="2"  readonly name="publishing_logo"></textarea>
                            </div>
                            <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Author's Picture</label>                         
                               <input class="form-control author_picture" name="author_picture"  readonly id="author_picture" type="text" placeholder="">
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
                               <table class="table table-bordered" id="leaddataTableFixed" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>Page Number</th>
                                      <th>Paragraph Number</th>
                                      <th>Line Number</th>
                                      <th>Actual Sentence/Word</th>
                                      <th>Correct Sentence/Word</th>
                                    </tr>
                                  </thead>
                                  <tbody class="author_report_detail">
<!--                                       <tr>
                                        <td><input class="form-control page_number" name="page_number[]" style="height:50px; width:90px;" id="page_number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="Enter the Page Number"></td>              
                                        <td style="width:100px;"><input type="text" class="form-control paragraph_number" name="paragraph_number[]" style="height:50px;" id="paragraph_number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  placeholder="Enter the Paragraph Number"></td>
                                        <td style="width:100px;"><input type="text" class="form-control line_number" name="line_number[]" style="height:50px;" id="line_number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  placeholder="Enter the Line Number"></td>
                                        <td style="width:520px;"><textarea class="form-control actual_sentence" rows="2" name="actual_sentence[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_sentence" rows="2" name="correct_sentence[]"></textarea></td>
                                      </tr> -->
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
                </div>
              </div>
          </div>
      </div>

      <!-- end of update lead modal -->

      <!-- The History Leas  Remark-->
                <div class="modal fade" id="viewreport_designermodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Interior Report History </h4> 
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
                                            <th>Interior Designer Name</th>
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
                                <option value="Manager">Manager</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Finance">Finance</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Author Relation">Author Relation</option>
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
   <!-- End Edit User -->
       

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

  </body>
</html>
