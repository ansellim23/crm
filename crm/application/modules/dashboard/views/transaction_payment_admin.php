
    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #approvalhistorymodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -445px;}
    #confirmationhistorymodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -445px;}
    #payleadmodal .modal-content{ width: 320% !important; margin-left: -510px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}
    #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
    #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}

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
            <i class="fa fa-table"></i>List of Leads
  </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="collectiondataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Project ID</th>
                  <th>Package Name</th>
                  <th style="width:45px;!important">Author Name</th>
                  <th>Book Title</th>
                  <th style="width:200px;!important;">Email Address</th>
                  <th>Contact #</th>
                  <th>Area Code</th>
                  <th>Price</th>
                  <th>Lead Type</th>
                  <th>Contract Status</th>
                  <th>Date Assigned</th>
                  <th>Collection</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $get_count_payment =0;
                  $replace_comma = "";
                  if ($leads > 0){
                       foreach ($leads as $lead){
                         $file_name = $lead['file_name'] == '' ? 'Manual Added' :$lead['file_name'];
                         echo "<tr>";
                               echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 
                               echo "<td>".$lead['product_name']."</td>";
                              echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['author_name']."</td>";
                               echo "<td>".$lead['book_title']."</td>";
                               echo "<td>".$lead['email_address']."</td>";
                               echo "<td>".$lead['contact_number']."</td>";
                               echo "<td>".$lead['area_code']."</td>";
                               echo "<td>$ ".number_format(str_replace(",","",$lead['price']),2,".",",")."</td>";
                                  if($lead['date_updated'] == NULL){
                                  echo "<td>".$lead['status'].  "</td>";

                               } 
                               else{
                                 echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead['date_updated'])).  "</td>";

                               }

                               echo "<td>".$lead['contractual_status']."</td>";
                                if($lead['lead_date_agent_assign'] == NULL){
                                  echo "<td></td>";

                               } 
                               else{
                                  echo "<td>".date("d/m/Y", strtotime($lead['lead_date_agent_assign']))."</td>";

                               }

                                if($lead['status'] == 'In Progress'){
                                  echo "<td><button type='button' style='color:#ffffff !important;' class='btn btn-warning view_pay_leaddetail' data-toggle='modal' data-target='#payleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='".$lead['project_id']."'>Collect</button></td>";
                                }
                                else{
                                 echo "<td><button type='button' class='btn btn-success'>Collect</button></td>";

                                }

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
            Horizon <a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

                  
    
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
                    <button class="btn btn-secondary view_confirmpayment_history" id="view_confirmpayment_history" data-project_id='' data-toggle='modal' data-target='#confirmationhistorymodal' data-backdrop='static' data-keyboard='false'  type="button">View Payment History</button>
                  </form>
                </div>
                 <div class="card-body">
                    <div class="table-responsive display_table">
                      <table class="table table-bordered" id="collectiondataTable" width="100%" cellspacing="0">
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
                    
                      <!-- Modal Header -->1
                           <div class="modal-header">
                            <h4 class="modal-title">Approval Payment History</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="approvalhistoryDatatable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Project ID</th>
                                            <th>Package Name</th>
                                            <th>Author Name</th>
                                            <th>Book Title</th>
                                            <th>Email Address</th>
                                            <th>Contact #</th>
                                            <th>Area Code</th>
                                            <th>Amount Paid</th>
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

               <!-- The History Approval-->
                <div class="modal fade" id="confirmationhistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Payment History</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="confirmationpaymenthistory" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Project ID</th>
                                            <th>Package Name</th>
                                            <th>Author Name</th>
                                            <th>Book Title</th>
                                            <th>Email Address</th>
                                            <th>Contact #</th>
                                            <th>Area Code</th>
                                            <th>Amount Paid</th>
                                            <th>Payment Status and Date</th>
                                            <th>User Charge</th>
                                            <th>User Type</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewconfirm_payment">
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




