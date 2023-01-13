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
             <i class="fa fa-table"></i>List of Collections

  </div>
   <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leadManagerdataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Lead ID</th> 
                  <th>Package Name</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th>Income Level</th>
                  <th>Agent Assign</th>
                  <th>Price</th>
                  <th>Status and Date</th>
                  <th>Contract Status</th>
                  <th>Special Note</th>
                  <th>Date Assigned</th>
<!--                   <th>Last Contact Date</th>
 -->                  <th>Remark History</th>
                  <th>Collection</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  // $get_count_payment =0;
                  // $replace_comma = "";
                  // if ($leads > 0){
                  //      foreach ($leads as $lead){
                  //         // if($lead['status'] != 'In Progress' || $lead['payment_status'] == 'Pending' || $lead['contractual_status'] == 'Pending' &&  $lead['collect_payment_status'] == 'Full Payment'  || $lead['collect_payment_status'] == ""  || $lead['collect_payment_status'] == "Partial collect_payment_statusQ"){
                  //        echo "<tr>";
                  //              echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 
                  //              echo "<td>".$lead['product_name']."</td>"; 
                  //              echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['author_name']."</td>";
                  //              echo "<td><a href='http://google.com/search?q=".$lead['author_name']."+".$lead['book_title']."' target='blank'>".$lead['book_title']."</a></td>";
                  //              echo "<td>".$lead['email_address']."</td>";
                  //              echo "<td><a href='callto:".$lead['contact_number']."'>".$lead['contact_number']."</a></td>";
                  //              echo "<td>".$lead['income_level']."</td>";
                  //              echo "<td>".$lead['lead_owner']."</td>";
                               
                  //              //echo "<td>".$lead['fname'].' '. $lead['lname']."</td>";
                  //              //echo "<td>$ ".number_format(str_replace(",","",$lead['price']),2,".",",")."</td>";
                  //              echo "<td>$ ".$lead['price']."</td>";
                  //                 if($lead['date_updated'] == NULL){
                  //                 echo "<td>".$lead['status'].  "</td>";

                  //              } 
                  //              else{
                  //                echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead['date_updated'])).  "</td>";

                  //              }

                  //              echo "<td>".$lead['contractual_status']."</td>";
                  //                echo '<td class="text-center"><textarea data-author_name="'.$lead['author_name'].'" data-project_id="'.$lead['project_id'].'" data-userid="'.$this->session->userdata['userlogin']['user_id'].'" class="form-control exampleFormControlTextarea"  style="width:130px;"  name="special_note"  rows="2">'.$lead['create_remark'].'</textarea><span class="badge badge-success">Date: '.$lead['date_create_remark'].'</span></td>';
                               
                  //               if($lead['lead_date_agent_assign'] == NULL){
                  //                 echo "<td></td>";

                  //              } 
                  //              else{
                  //                 echo "<td>".date("d/m/Y", strtotime($lead['lead_date_agent_assign']))."</td>";

                  //              }

                  //              //get last contact date
                  //              if ($activities > 0){
                  //               $count = 0;
                  //               foreach ($activities as $activity){                                  
                  //                  if($lead['project_id'] == $activity['project_id']){
                  //                   echo"<td>".date("m/d/Y", strtotime($activity['date_create_remark']))."</td>";
                  //                   $count++;
                  //                   break;
                  //                  }
                               
                  //               }
                  //                  if($count == 0){
                  //                   echo "<td></td>";
                  //                   }
                  //              }
                  //              //  echo "<td>".modules::run("dashboard/lead_remark",$lead['author_name'])."</td>";
                  //             echo "<td><button type='button' class='btn btn-outline-info viewleadremark_history1' data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id='".$lead['project_id']."'>View</a></td>";
                  //              // echo "<td><button type='button' class='btn btn-danger view_update_leaddetail' data-toggle='modal' data-target='#updateleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='".$lead['project_id']."'>Edit</button></td>";
                             
                  //               if($lead['status'] == 'In Progress'){
                  //                 echo "<td><button type='button' style='color:#ffffff !important;' class='btn btn-warning view_pay_leaddetail' data-toggle='modal' data-target='#payleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='".$lead['project_id']."'>Collect</button></td>";
                  //               }
                  //               else{
                  //                echo "<td><button type='button' class='btn btn-success'>Collect</button></td>";

                  //               }


                  //         echo "</tr>";
                  //       }
                   
                  // }  
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
  </body>
</html>
