

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
            <i class="fa fa-table"></i>List of Contracts
  </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataTablefixed" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Lead ID</th>
                  <th>Product Name</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th>Price</th>
                  <th>Balance</th>
                  <th>Contract Status and Confirmation</th>
                  <th>Date Create</th>

                </tr>
              </thead>
              <tbody>
              <?php
                  $get_count_payment =0;
                  $get_payments = 0;
                  $get_total_paid = 0;
                  $get_total_refunded = 0;
                  $get_total_fullpayment = 0;
                  if ($leads > 0){
                       foreach ($leads as $lead){
                        $approval_status = $lead['contract_approval'] == ''? 'Not Yet' : $lead['contract_approval'];

                         echo "<tr>";
                               echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 
                               echo "<td>".$lead['product_name']."</td>";
                                 echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['email_address']."</td>";
                               echo "<td>".$lead['book_title']."</td>";
                               echo "<td>".$lead['email_address']."</td>";
                               echo "<td>".$lead['contact_number']."</td>";
                               echo "<td>$ ".number_format(str_replace(",","",$lead['price']),2,".",",")."</td>";
                               echo "<td>$ ".number_format(str_replace(",","",$lead['remaining_balance']),2,".",",")."</td>";
                               echo "<td>".$lead['contractual_status']. '- <span class="contract_approval">'.$approval_status."</span></td>";
                               echo "<td>".date("d/m/Y", strtotime($lead['date_create']))."</td>";                        


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



                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

      