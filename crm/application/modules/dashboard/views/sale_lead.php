  <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            
            <div class="col-md-12 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Sales</span>
              <div class="count total_sales">$ 0.00</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> From on this Month</span>
            </div>
          </div>
        </div>
          <!-- /top tiles -->
          <form id="sales_lead_agent_form">
             <div class="col-sm-3 inline-block">
                <label for="validationCustom03">Date</label>
                  <div id="reportrange" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                      <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                      <span></span> <b class="caret"></b>
                     </div><!-- DEnd ate Picker Input -->            
              </div>
                   <div class="col-sm-3 inline-block">
                <label for="validationCustom03">User</label>
                      <select class="form-control year" name="agent_type">
                       <option selected value="">Please Select an User in Charge</option>
                         <?php 
                             if ($user_agents > 0){
                                 foreach ($user_agents as $user_agent){
                                   echo "<option value='".ucfirst($user_agent['payment_usercharge'])."'>".ucfirst($user_agent['payment_usercharge']) ."</option>";
                               }
                            } 
                          ?>
                      </select>
                 </div>
            </form>
             <br>

  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>List of Leads
<!--  -->
  </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="salesdataTables" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Lead ID</th>
                  <th>Package Name</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th class="sumamount">Amount Paid</th>
                  <th>Collection Status And Date</th>
                  <th>Approval Status And Date</th>
                  <th>Payment Status and Date</th>
                  <th>Contract Status and Date</th>
                  <th>User Charge</th>
                  <th>UserType</th>
                  <th style='display:none;'></th>
                  <th style='display:none;'></th>
                </tr>
              </thead>
              <tbody class="viewleadactivities">
              <?php
                  $get_count_payment =0;
                  $replace_comma = "";
                  if ($sales_lead > 0){
                       foreach ($sales_lead as $sale_lead){
                         
                         echo "<tr>";
                               echo "<td id='project_id'>".modules::run("dashboard/setindex_Lead_ID",$sale_lead['project_id'])."</td>"; 
                               echo "<td>".$sale_lead['product_name']."</td>";
                               echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$sale_lead['author_name']."' data-project_id=".$sale_lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$sale_lead['author_name']."</td>";
                               echo "<td>".$sale_lead['book_title']."</td>";
                               echo "<td>".$sale_lead['email_address']."</td>";
                               echo "<td>".$sale_lead['contact_number']."</td>";
                               echo "<td class='amount_paid'>$ ".number_format(str_replace(",","",$sale_lead['initial_payment']),2,".",",")."</td>";
                               echo "<td >".$sale_lead['collect_payment_status']. ' - '. date("d/m/Y", strtotime($sale_lead['collection_date']))."</td>";
                               echo "<td><span class='approval_status'>".$sale_lead['approval_status']. '</span>- '. date("d/m/Y", strtotime($sale_lead['date_approve']))."</td>";
                               echo "<td><span class='status_payment'>".$sale_lead['status_payment']. '</span> - '. date("d/m/Y", strtotime($sale_lead['date_paid']))."</td>";
                               echo "<td><span class='status_payment'>".$sale_lead['contractual_status']. '</span> - '. date("d/m/Y", strtotime($sale_lead['date_contract_signed']))."</td>";
                               
                               echo "<td>".ucfirst($sale_lead['payment_usercharge']). "</td>";
                               echo "<td>".$sale_lead['payment_usertype']. "</td>";
                               echo "<td style='display:none'>".date("Y-m-d", strtotime($sale_lead['date_paid'])). "</td>";
                               echo "<td style='display:none'>".date("Y", strtotime($sale_lead['date_paid'])). "</td>";
                          echo "</tr>";
                     }
                  }  
                  ?>
              </tbody>
            </table>
            <div id="sales" style="float:right; margin-right: 220px; float: right; font-size: 20px;"><b>Total Sales</b>  <span class="total_sales" style></span>
          </div>
        </div>
      </div>
    </div>
          <br />

         
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
  </body>
</html>
