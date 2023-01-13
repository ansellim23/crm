
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Horizons <a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

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

          <!-- The payment  Remark-->
                <div class="modal fade" id="vewleadreamarkmodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Remark</h4>
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
                            </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

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
                                
                         <input type="text" readonly class="form-control" style="height:50px;"  name="status"  placeholder="Collection Paymeny" aria-describedby="inputGroupPrepend" required>
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
                         <input type="text" readonly onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" style="height:50px;" id="initial_payment" value="0.00" name="initial_payment" placeholder="Initial Payment" required>
                       </div>
                      <div class="col mb-3">
                        <label for="validationCustom05">Collection Date</label>
                         <div class="form-group mb-4" style="margin-bottom:-30px !important;">
                                <div class="datepicker date input-group p-0 shadow-sm">
                                    <input type="text" disabled placeholder="Choose a date" name="collection_date" class="form-control py-4 px-4 reservationDate">
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
                              <textarea class="form-control readonly remark" rows="3"  name="remark"></textarea>
                        </div>
                    </div>

                  </form>
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

    <!-- <script src="<?php echo base_url('bootstrap/vendors/Chart.js/dist/Chart.min.js');?>"></script> -->


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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment-with-locales.min.js" integrity="sha512-EATaemfsDRVs6gs1pHbvhc6+rKFGv8+w4Wnxk4LmkC0fzdVoyWb+Xtexfrszd1YuUMBEhucNuorkf8LpFBhj6w==" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('bootstrap/vendors/moment/moment-timezone-with-data.js');?>"></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>


    <script src="<?php echo base_url('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
         <script src="<?php echo base_url('js/tempusdominus-bootstrap-4.js');?>"></script>


<script type="text/javascript">
 var pageURL = $(location).attr("href");
  var script = document.createElement('script');
  if (pageURL == 'https://hlmcrm.site/dashboard/schedule_attendance'){
     script.src = 'https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js';
    document.write(script.outerHTML);
  }

</script>

        <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>  
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>  
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>  



    <!-- Custom Theme Scripts -->

    <script src="<?php echo base_url('bootstrap/build/js/custom.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>

    <script src="<?php echo base_url('js/croppie.js');?>"></script>



     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>
     <script src="<?php echo base_url('js/validateattendance.js');?>"></script>
     <script src="<?php echo base_url('js/notification.js');?>"></script>
     <script src="<?php echo base_url('js/validatenotification.js');?>"></script>
     <script src="<?php echo base_url('js/validategala.js');?>"></script>
     <script src="<?php echo base_url('js/datatablerowgroup.js');?>"></script>



 <script>  

  $(function () {
     $('#adduserform #datetimepicker_start_time').datetimepicker({
         format: 'LT'
     });
  })
    $(function () {
     $('#adduserform #datetimepicker_end_time').datetimepicker({
         format: 'LT'
     });
  })

   $(function () {
     $('#updateuserform #datetimepicker_start_time').datetimepicker({
         format: 'LT'
     });
  })
    $(function () {
     $('#updateuserform #datetimepicker_end_time').datetimepicker({
         format: 'LT'
     });
  })

 $('#memodataTable').DataTable({
        "order": [[ 3, "desc" ]]
    });
 $('#collectiondatatable').DataTable();
 $('#assigndataTable').DataTable();
 $('#leadmanagerdataTable').DataTable();
 $('#leadagentdataTable').DataTable();
 $('#productiondataTable').DataTable();
 $('#coverdesignerdatatable').DataTable();
 $('#interiordesignerdatatable').DataTable();
 $('#userdataTable').DataTable();
 $('#agentpenaltydataTable').DataTable();


 $('#leaddataTablefixed').DataTable({
    "paging": false,
    "info": false,
     columnDefs: [
            { width: '10%', targets: 2,
              width: '15%', targets: 3
            } 
          ],
         fixedColumns: true,
     });

 var leaddataTable =  $('#leaddataTablefixed').DataTable({
     columnDefs: [
            { width: '10%', targets: 2,
              width: '15%', targets: 3
            }
          ],
         fixedColumns: true,
     });

$('#contractdataTablefixed').DataTable({"autoWidth": false, columnDefs: [
            { width: '10%', targets: 2 }
        ],
        fixedColumns: true});

$('#status_lead_form [name="status_lead"]').on('change', function () {
       leaddataTable.columns(12).search($(this).val()).draw() ;

});



$('#galadataTable').DataTable();

   

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

var map = {};
$('#sales_lead_agent_form select option, #sales_total_form select option').each(function () {
    if (map[this.value]) {
        $(this).remove()
    }
    map[this.value] = true;
})

 var otable = $("#salesdataTables").DataTable({
   "initComplete": function (settings, json) {
     var api = this.api();
     CalculateTableSummary(this);
    },
    "drawCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;  
        CalculateTableSummary(this);
        return ;   
      }
});
$('#sales_lead_agent_form [name="agent_type"]').on('change', function () {
       otable.columns(11).search($(this).val()).draw() ;

});
function CalculateTableSummary(otable) {
    try {

        var intVal = function (i) {
            return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
        };

        var api = otable.api();

            // Total over all pages
         api.columns(".sumamount").each(function (index) {
         var column = api.column(index,{page:'current'});

           var sum = column 
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


        $('#sales .total_sales, .tile_stats_count .total_sales').text('$ ' + sum.toLocaleString("en")+'.00');
      });
  }
  catch (e) {
        console.log('Error in CalculateTableSummary');
        console.log(e)
    }
}


  $(function () {
   var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);


  $('#reportrange').on('apply.daterangepicker', function(ev, picker) {

   var start = picker.startDate.format('YYYY-MM-DD');
   var end = picker.endDate.format('YYYY-MM-DD');

  

  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date(start);
      var max = new Date(end);
      var startDate = new Date(data[13]);
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null) {
        return true;
      }
      if (min == null && startDate <= max) {
        return true;
      }
      if (max == null && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  otable.draw();
    $.fn.dataTable.ext.search.pop();

});
});
    $('#assigndatatable').DataTable({"autoWidth": false, columnDefs: [

            { width: '10%', targets: 2 }

        ],
        "lengthMenu": [[10, 25, 50, 100, 250, 500, 1000, -1], [10, 25, 50,100, 250, 500, 1000, "All"]],

        fixedColumns: true});

    $('#leaddataTableselectagent').DataTable(
            {"autoWidth": false, columnDefs: [
            { width: '10%', targets: 2 }

        ],
        "lengthMenu": [[10, 25, 50, 100, 250, 500, 1000, -1], [10, 25, 50,100, 250, 500, 1000, "All"]],

        fixedColumns: true});

     $('#collectiondataTable').DataTable({"autoWidth": false, columnDefs: [
            { width: '5%', targets: 2 },
            { width: '10%', targets: 4 }
        ],
        "lengthMenu": [[10, 25, 50, 100, 250, 500, 1000, -1], [10, 25, 50,100, 250, 500, 1000, "All"]],
        fixedColumns: true});
  $("#addAssignUserform #check_all_lead, #updatesubjectform #check_all_lead").click(function () {
     $('#addAssignUserform input:checkbox, #updatesubjectform input:checkbox').not(this).prop('checked', this.checked);
 });

var map = {};
$('#updatereportform .project_status  option, #updatereportform .interior_designer option, #updatereportform .cover_designer option, #updatereportform .publisher_id option,  #updatereportform .book_color option, #updatereportform .book_size option, #updatereportform .color_type option, #updatereportform .hard_cover_format option, #updatereportform .author_picture option, #updatereportform .book_categories option').each(function () {
    if (map[this.value]) {
        $(this).remove()
    }
    map[this.value] = true;
});
   $('#historyleadtable').DataTable({"autoWidth": false, columnDefs: [
            { width: '10%', targets: 2 }
        ],
        fixedColumns: true});
    $('#addreportform #front_coverdataTable').DataTable({"autoWidth": false, columnDefs: [
            { width: '15%', targets: 0 }
        ],
        "searching": false,
         "paging": false,
         "info": false,

        fixedColumns: true});
    $('#addreportform #back_coverdataTable').DataTable({"autoWidth": false, columnDefs: [
            { width: '15%', targets: 0 }
        ],
        "searching": false,
         "paging": false,
         "info": false,

        fixedColumns: true});
   $('#leaddataTableselectmanager').DataTable({"autoWidth": false, columnDefs: [
            { width: '10%', targets: 2 }
        ],
        fixedColumns: true});

       $('#call_log_historytable').DataTable( {
        order: [[6, 'asc']],
        scrollY:"480px",
        scrollCollapse: true,
        paging: false,
        scrollX: true,
        info: true,
        dom: 'Bfrtip',
        select: true,
        rowGroup: {
            startRender: null,
            endRender: function ( rows, group ) {

              return  '<b style="color:white; background: green;">' + group +' ('+rows.count()+')' + '</b>';

            },
            dataSrc: 6
        }
    } );

 function formatPhoneNumber(phoneNumber = '') {

          var phoneNumber = phoneNumber.replace('/[^0-9]/','');



          if(phoneNumber.length > 10) {

              var countryCode = phoneNumber.substr(0, phoneNumber.length-10);

              var areaCode = phoneNumber.substr(-10, 3);

              var nextThree = phoneNumber.substr(-7, 3);

              var lastFour = phoneNumber.substr(-4, 4);



              phoneNumber = '('+areaCode+') '+nextThree+'-'+lastFour;

          }

          else if(phoneNumber.length == 10) {

              var areaCode = phoneNumber.substr(0, 3);

              var nextThree = phoneNumber.substr(3, 3);

              var lastFour = phoneNumber.substr(6, 4);



              phoneNumber = '('+areaCode+') '+nextThree+'-'+lastFour;

          }

          else if(phoneNumber.length == 7) {

              var nextThree = phoneNumber.substr(0, 3);

              var lastFour = phoneNumber.substr(3, 4);



              phoneNumber = nextThree+'-'+lastFour;

          }



          return phoneNumber;

      }





      function convertHMS(value) {

          const sec = parseInt(value, 10); // convert value to number if it's string

          let hours   = Math.floor(sec / 3600); // get hours

          let minutes = Math.floor((sec - (hours * 3600)) / 60); // get minutes

          let seconds = sec - (hours * 3600) - (minutes * 60); //  get seconds

          // add 0 if value < 10; Example: 2 => 02

          if (hours   < 10) {hours   = "0"+hours;}

          if (minutes < 10) {minutes = "0"+minutes;}

          if (seconds < 10) {seconds = "0"+seconds;}

          return hours+':'+minutes+':'+seconds; // Return is HH : MM : SS

      }



    $.fn.dataTable.moment('YYYY-MM-DD h:mm A');

     var table_call_logs =   $('#call_log_historytable').DataTable( {

               "pageLength": 20,

                "order": [[ 5, "desc" ]]

          } );

      var numRows = table_call_logs.rows().count();

      $('.tile_stats_count .total_call_logs').text(numRows.toLocaleString("en")+'.00');

       $(function () {



         var start = moment().subtract(6, 'days')

         var end = moment();



          function cb(start, end) {

              $('#call_log_reportrange span').html(start.tz('America/New_York').format('MMMM D, YYYY') + ' - ' + end.tz('America/New_York').format('MMMM D, YYYY'));

          }

          $('#call_log_reportrange').daterangepicker({

              startDate: start,

              endDate: end,

              ranges: {

                 'Today': [moment().tz('America/New_York'), moment().tz('America/New_York')],

                 'Yesterday': [moment().subtract(1, 'days').tz('America/New_York'), moment().subtract(1, 'days').tz('America/New_York')],

                 'Last 7 Days': [moment().subtract(6, 'days').tz('America/New_York'), moment().tz('America/New_York')],

                 'Last 30 Days': [moment().subtract(29, 'days').tz('America/New_York'), moment().tz('America/New_York')],

                 'This Month': [moment().startOf('month'), moment().endOf('month')],

                 'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

              }

          }, cb);



          cb(start, end);

// alert(myDatetimeString);


// JS for call logs
        $('#call_log_reportrange').on('apply.daterangepicker', function(ev, picker) {

         $('#user_type').prop('selectedIndex',0);



         var start = picker.startDate.format('YYYY-MM-DD');

         var end = picker.endDate.format('YYYY-MM-DD');

          $('#call_logs_form [name="from_date"]').val(start);
          $('#call_logs_form [name="to_date"]').val(end);

        $.fn.dataTable.moment('YYYY-MM-DD H:mm A');

 



   var test_table =   $('#call_log_historytable').DataTable( {

              "processing": true,

              "serverSide": false,

              "destroy": true,

             
              scrollY:"480px",
              scrollCollapse: true,
              paging: false,
              scrollX: true,
              info: true,
              dom: 'Bfrtip',
              select: true,
              "columnDefs": [
            {
                "targets": [ 6 ],
                "visible": false,
                "searchable": false
            }],

              "ajax": {

                  "url":   base_url +  "dashboard/select_call_log_history",

                  "type": "POST",

                  "dataSrc":"",

                   "data": { 

                           "start": start,"end": end     

                      },

              },
         

           columns: [
              { data: 'type'},
              { data: 'from_Phonenumber'},
              { data: 'to_Phonenumber'},
              { data: 'extension_number'},
              { data: 'location'},
              { data: 'startTime'},
              { data: 'date'},
              { data: 'action'},
              { data: 'result'},
              { data: 'duration'},

           ],


            order: [[6, 'asc']],
            rowGroup: {
            startRender: null,
            endRender: function ( rows, group ) {
                return  '<b style="color:white; background: green;">' + group +' ('+rows.count()+')' + '</b>';
            },
            dataSrc: 'date'
        }, 
        
        });




            test_table.on( 'draw', function () {

               var numRows = test_table.rows( {search:'applied'} ).count();

                $('.tile_stats_count .total_call_logs').text(numRows.toLocaleString("en")+'.00');

            });

            $('#call_logs_form [name="user_type"]').on('change', function () {

             test_table.columns(3).search($(this).val()).draw() ;



             var numRows = test_table.rows( {search:'applied'} ).count();

            $('.tile_stats_count .total_call_logs').text(numRows.toLocaleString("en")+'.00');

        });

            

      });



      });



$('#call_logs_form [name="user_type"]').on('change', function () {

       table_call_logs.columns(3).search($(this).val()).draw() ;
       var numRows = table_call_logs.rows( {search:'applied'} ).count();

      $('.tile_stats_count .total_call_logs').text(numRows.toLocaleString("en")+'.00');


 $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date($('#call_logs_form [name="from_date"]').val());
      var max = new Date($('#call_logs_form [name="to_date"]').val());
      var startDate = new Date(data[0]);
      var agent_user = data[3];
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null &&  $(this).val() == agent_user) {
        return true;
      }
      if (min == null && startDate <= max && $(this).val() == agent_user) {
        return true;
      }
      if (max == null && startDate >= min && $(this).val() == agent_user) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  otable.draw();
    $.fn.dataTable.ext.search.pop();


});

$(function () {

    // INITIALIZE DATEPICKER PLUGIN
    var dateToday = new Date(); 

    $('#lead_form .datepicker').datepicker({

        clearBtn: true,

        format: "dd/mm/yyyy",

        startDate: dateToday,

    }).datepicker("setDate", dateToday);

    

});
 document.querySelector('#adduserform .custom-file-input').addEventListener('change', function (e) {

      var name = document.getElementById("#adduserform customFileInput").files[0].name;

      var nextSibling = e.target.nextElementSibling

      nextSibling.innerText = name

       });
 
 document.querySelector('#updateuserform .custom-file-input').addEventListener('change', function (e) {

      var name = document.getElementById("customFileInputupdate").files[0].name;

      var nextSibling = e.target.nextElementSibling

      nextSibling.innerText = name

    });


 document.querySelector('.custom-file-input').addEventListener('change', function (e) {

      var name = document.getElementById("customFileInput").files[0].name;

      var nextSibling = e.target.nextElementSibling

      nextSibling.innerText = name

    });

  </script>

  </body>

</html>

