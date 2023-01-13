
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
            <table class="table table-bordered" id="leaddataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Lead ID</th>
                  <th>Package Name</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th>Price</th>
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
                               echo "<td>".$lead['author_name']."</td>";
                               echo "<td>".$lead['book_title']."</td>";
                               echo "<td>".$lead['email_address']."</td>";
                               echo "<td>".$lead['contact_number']."</td>";
                               echo "<td>$ ".number_format(str_replace(",","",$lead['price']),2,".",",")."</td>";
                               echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead  ['date_create'])).  "</td>";
                               echo "<td>$ ".number_format(str_replace(",","",$lead['remaining_balance']),2,".",",")."</td>";
                             
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

    