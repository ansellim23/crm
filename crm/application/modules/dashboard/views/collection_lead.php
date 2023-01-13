  <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            
                     </div>
        </div>
        <form id="collection_lead_form">
 <!--              <div class="col-sm-6 inline-block">
                <label for="validationCustom03">Month</label>
                      <select class="form-control month" name="month">
                       <option selected value="">Please Select a Month</option>
                      <?php
                            for ($i = 0; $i < 12; $i++) {
                                $time = strtotime(sprintf('%d months', $i));   
                                $label = date('F', $time);   
                                $value = date('n', $time);
                                echo "<option value='$value'>$label</option>";
                              }
                            ?>
                      </select>
                 </div>

              <div class="col-sm-6 inline-block">
                <label for="validationCustom03">Year</label>
                      <select class="form-control year" name="year">
                       <option selected value="">Please Select a Year</option>

                        <?php 
                             for($i = 2018 ; $i <= date('Y'); $i++){
                                echo "<option value='$i'>$i</option>";
                             }
                          ?>
                      </select>
                 </div> -->
            </form>
            <br>
          <!-- /top tiles -->
  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>List of Collections
  </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="collectiondatatable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Lead ID</th>
                  <th>Package Name</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th>Price</th>
                  <th>Contract Status and Date</th>
                  <th>Status and Date</th>
                  <th>Remaining Balance</th>
                  <th>Collection</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $get_count_payment =0;
                  $replace_comma = "";
                  if ($leads > 0){
                       foreach ($leads as $lead){
                         
                         echo "<tr>";
                               echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 
                               echo "<td>".$lead['product_name']."</td>";
                               echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['author_name']."</td>";
                               echo "<td>".$lead['book_title']."</td>";
                               echo "<td>".$lead['email_address']."</td>";
                               echo "<td>".$lead['contact_number']."</td>";
                               echo "<td>$ ".$lead['price']."</td>";
                               echo "<td>".$lead['contractual_status']. '- <span class="date_contract_signed">'.$lead['date_contract_signed']."</span></td>";
                               echo "<td>".$lead['status']. ' - '. date("d/m/Y h:i:s a", strtotime($lead['date_create'])).  "</td>";
                               echo "<td>$ ".$lead['remaining_balance']."</td>";
                             
                                if($lead['status'] == 'In Progress'){
                                  echo "<td><button type='button' style='color:#ffffff !important;' class='btn btn-primary monitor_pay_leaddetail' data-toggle='modal' data-target='#payleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='".$lead['project_id']."'>View</button></td>";
                                }
                                else{
                                 echo "<td><button type='button' class='btn btn-success'>View</button></td>";

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

          <div class="row">


        
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- <footer>
          <div class="pull-right">
            Horizons <a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer> -->
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
                      <table class="table table-bordered" id="collectiondataTable" width="100%" cellspacing="0">
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
