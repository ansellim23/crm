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
         <div class="modal fade" id="detail_designer_report_modal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form  id="viewdetails" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Cover Designer Details</h2>
                        <p class="hint-text">Details Report.</p>
                           <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Project Status</label>                         
                                  <select class="form-control project_status" disabled name="project_status">
                                  <option value="">Please Select a Project Status</option>
                                  <option value="Pending">Pending</option>
                                  <option value="Done Initial">Done Initial</option>
                                  <option value="Done Initial/Correction">Done Initial/Correction</option>
                                  <option value="Approval For Completion">Approval For Completion</option>
                                </select>                         
                            </div>
                            <div class="col-sm-2 inline-block">
                            <label for="validationCustom03">Status Payment</label>                         
                                <select class="form-control status_payment" disabled name="status_payment" style="height:50px;">
                                    <option value="">Please Select a Status Payment</option>
                                    <option value="Payment Received">Payment  Received</option>
                                    <option value="Payment Not Received">Payment Not Received</option>
                                  </select>                        
                            </div>
                            <div class="col-sm-2 inline-block">
                                <label for="validationCustom03">Date Delivered</label>                         
                                      <div class="form-group mb-4" style="margin-bottom:-30px !important;">
                                    <div class="datepicker date input-group p-0 shadow-sm">
                                        <input type="text" disabled placeholder="Choose a date" name="date_delivered" class="form-control py-4 px-4 reservationDate">
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
                           <div class="col-sm-3 inline-block">
                            <label for="validationCustom03">Project Status</label>                         
                                  <select class="form-control project_status" name="project_status">
                                  <option value="">Please Select a Project Status</option>
                                  <option value="Pending">Pending</option>
                                  <option value="Done Initial">Done Initial</option>
                                  <option value="Done Initial/Correction">Done Initial/Correction</option>
                                  <option value="Approval For Completion">Approval For Completion</option>
                                </select>                         
                            </div>
                            <div class="col-sm-3 inline-block">
                            <label for="validationCustom03">Status Payment</label>                         
                                <select class="form-control status_payment" name="status_payment" style="height:50px;">
                                    <option value="">Please Select a Status Payment</option>
                                    <option value="Payment Received">Payment  Received</option>
                                    <option value="Payment Not Received">Payment Not Received</option>
                                  </select> 
                          <input type="hidden" class="form-control" style="height:50px;" readonly  name="project_id"  placeholder="Project ID" aria-describedby="inputGroupPrepend" required>
                          <input type="hidden" class="form-control" style="height:50px;" readonly  name="report_id"  placeholder="Report ID" aria-describedby="inputGroupPrepend" required>
                          <input type="hidden" class="form-control" style="height:50px;" readonly  name="user_id"  placeholder="User Id" aria-describedby="inputGroupPrepend" required>                       
                          <input type="hidden" class="form-control" style="height:50px;" readonly  name="designer_report_id"  placeholder="User Id" aria-describedby="inputGroupPrepend" required>                                      
                            </div>
                            <div class="col-sm-3 inline-block">
                                <label for="validationCustom03">Date Delivered</label>                         
                                      <div class="form-group mb-4" style="margin-bottom:-30px !important;">
                                    <div class="datepicker date input-group p-0 shadow-sm">
                                        <input type="text"  placeholder="Choose a date" name="date_delivered" class="form-control py-4 px-4 reservationDate">
                                        <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span></div>
                                    </div>

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
                <div class="modal fade" id="viewleadhistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Your Lead History </h4> 
                            <a  class="btn btn-success btn-block viewdesignerremark_history" style="width: 220px; margin-left:50px; color:#ffffff;" data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name="" data-designer_id="">Lead Communications</a>

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
                                            <th>Lead Type</th>
                                            <th>Status and Date</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewdesignerhistory">

                                        </tbody>
                                      </table>
                              </div>
                                <form id="designerremarkform">
                                  <div class="col mb-1 w-50 p-3 align-middle" style="margin:0px auto;">
                                        <div class="alert alert-success"><p></p></div>
                                        <input type="hidden" readonly class="form-control" name="project_id" placeholder="Project ID" required="required">
                                         <input type="hidden" readonly class="form-control" name="author_name" placeholder="Project ID" required="required">
                                          <input type="hidden" readonly class="form-control" name="designer_id" placeholder="DesigneID ID" required="required">
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
                                        <tbody class="viewdesignerremarkhistory">

                                        </tbody>
                                      </table>
                              </div>
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
          <script src="<?php echo base_url('js/notification.js');?>"></script>
    <script src="<?php echo base_url('js/validategala.js');?>"></script>

 <script>  
 $('#galadataTable').DataTable();
 $('#leaddataTable').DataTable();
   $('#historyleadtable').DataTable({"autoWidth": false, columnDefs: [
            { width: '10%', targets: 2 }
        ],
        fixedColumns: true});
   $('#leaddataTableselectmanager').DataTable({"autoWidth": false, columnDefs: [
            { width: '10%', targets: 2 }
        ],
        fixedColumns: true});
   $(function () {

    // INITIALIZE DATEPICKER PLUGIN
    $('.datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy"
    });
})
</script>
  </body>
</html>
