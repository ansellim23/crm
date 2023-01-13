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
                  <th>Product Name</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Contract Status and Date</th>
                  <th>Remaining Balance</th>
                  <th>Assigned User</th>
                </tr>
              </thead>
              <tbody>
               <!--  <?php
                    $get_count_payment =0;
                    $get_payments = 0;
                    $get_total_paid = 0;
                    $get_total_refunded = 0;
                    $get_total_fullpayment = 0;
                    if ($leads > 0){
                         foreach ($leads as $lead){

                           echo "<tr>";
                                 echo "<td class='project_id'>".modules::run("dashboard/setindex_prefix",$lead['project_id'])."</td>"; 
                                 echo "<td>".$lead['product_name']."</td>";
                                 echo "<td>".$lead['author_name']."</td>";
                                 echo "<td>".$lead['book_title']."</td>";
                                 echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['email_address']."</td>";
                                 echo "<td>".$lead['contact_number']."</td>";
                                 echo "<td>$ ".number_format(str_replace(",","",$lead['price']),2,".",",")."</td>";
                                 echo "<td>".$lead['status']. '- <span class="date_contract_signed">'.$lead['date_create']."</span></td>";
                                 echo "<td>".$lead['contractual_status']. '- <span class="date_contract_signed">'.$lead['date_contract_signed']."</span></td>";
                                 echo "<td>$ ".number_format(str_replace(",","",$lead['remaining_balance']),2,".",",")."</td>";
                                 echo "<td>".ucfirst($lead['firstname']). ' '. ucfirst($lead['lastname']). "</td>";
                            echo "</tr>";
                       }
                    }  
                    ?> -->
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

  </body>
</html>
