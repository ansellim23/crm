

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

                  <th>Lead ID</th>

                  <th>Package Name</th>

                  <th style="width:45px;!important">Author Name</th>

                  <th>Book Title</th>

                  <th style="width:200px;!important;">Email Address</th>

                  <th>Contact #</th>

                  <th>Lead Source</th>

                  <th>Price</th>

                  <th>Lead Type</th>

                  <th>Contract Status</th>

                  <th>Date Assigned</th>

<!--                   <th>Update</th> -->

                </tr>

              </thead>

              <tbody>
              <?php

                  $get_count_payment =0;

                  $replace_comma = "";

                  if ($leads > 0){

                       foreach ($leads as $lead){

                         // $file_name = $lead['file_name'] == '' ? 'Manual Added' :$lead['file_name'];

                         echo "<tr>";

                               echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 

                               echo "<td>".$lead['product_name']."</td>";

                               echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['author_name']."</td>";

                               echo "<td>".$lead['book_title']."</td>";

                               echo "<td>".$lead['email_address']."</td>";

                               echo "<td>".$lead['contact_number']."</td>";

                               echo "<td>".$lead['lead_owner']."</td>";

                               echo "<td>$ ".$lead['price']."</td>";

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


                               // echo "<td><button type='button' class='btn btn-danger view_update_leaddetail' data-toggle='modal' data-target='#updateleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='".$lead['project_id']."'>Edit</button></td>";                             



                          echo "</tr>";

                     }

                  }  

             ?>

              </tbody>

            </table>
<!--                          <div style="margin:25px auto;">

            <div class="dataTables_info" role="status" aria-live="polite" style="float:left;">Showing <?php echo $page_no; ?> to <span id="count_row"><?php echo $total_no_of_pages; ?></span> of  <span id="total_row"><?php echo number_format(str_replace(",","",$total_records),2,".",","); ?></span> entries</div>
                      <ul class="pagination justify-content-end">
                        <?php // if($page_no > 1){ echo "<li><a  href='".base_url()."dashboard/1'>First Page</a></li>"; } ?>
    
                            <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                            <a class='page-link per_page' <?php if($page_no > 1){ echo " href='".base_url()."dashboard/index/$previous_page'"; } ?>>Previous</a>
                            </li>
                                 
                              <?php 
                            if ($total_no_of_pages <= 10){     
                              for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                if ($counter == $page_no) {
                                     echo "<li class='page-item active'><a class='page-link per_page'>$counter</a></li>";  
                                  }else{
                                     echo "<li class='page-item'><a class='page-link per_page'  href='".base_url()."dashboard/index/$counter'>$counter</a></li>";
                                  }
                                  }
                            }
                            elseif($total_no_of_pages > 10){
                              
                            if($page_no <= 4) {     
                             for ($counter = 1; $counter < 8; $counter++){     
                                if ($counter == $page_no) {
                                 echo "<li class='page-item active'><a class='page-link per_page'>$counter</a></li>";  
                                  }else{
                                     echo "<li class='page-item'><a class='page-link per_page'  href='".base_url()."dashboard/index/$counter'>$counter</a></li>";
                                  }
                                  }
                              echo "<li class='page-item'><a class='page-link per_page'>...</a></li>";
                              echo "<li class='page-item'><a class='page-link per_page'  href='".base_url()."dashboard/index/$second_last'>$second_last</a></li>";
                              echo "<li class='page-item'><a class='page-link per_page'  href='".base_url()."dashboard/index/$total_no_of_pages'>$total_no_of_pages</a></li>";
                              }

                             elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
                                 echo "<li class='page-item'><a class='page-link per_page'  href='".base_url()."dashboard/index/1'>1</a></li>";
                                   echo "<li class='page-item'><a class='page-link per_page'  href='".base_url()."dashboard/index/2'>2</a></li>";
                                  echo "<li class='page-item'><a class='page-link per_page'>...</a></li>";
                                  for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
                                     if ($counter == $page_no) {
                                 echo "<li class='class='page-item' active'><a class='page-link per_page'>$counter</a></li>";  
                                  }else{
                                     echo "<li class='page-item'><a class='page-link per_page'  href='".base_url()."dashboard/index/$counter'>$counter</a></li>";
                                  }                  
                                 }
                                 echo "<li class='page-item'><a class='page-link per_page'>...</a></li>";
                               echo "<li class='page-item'><a class='page-link per_page'  href='".base_url()."dashboard/index/$second_last'>$second_last</a></li>";
                               echo "<li class='page-item'><a class='page-link per_page'  href='".base_url()."dashboard/index/$total_no_of_pages'>$total_no_of_pages</a></li>";      
                                      }
                              
                              else {
                                  echo "<li class='page-item'><a class='page-link per_page'  href='".base_url()."dashboard/index/1'>1</a></li>";
                                  echo "<li class='page-item'><a class='page-link per_page'  href='".base_url()."dashboardindex/2'>2</a></li>";
                                  echo "<li class='page-item'><a class='page-link per_page'>...</a></li>";

                                  for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                    if ($counter == $page_no) {
                                 echo "<li class='class='page-item' active'><a class='page-link per_page'>$counter</a></li>";  
                                  }else{
                                     echo "<li class='page-item'><a class='page-link per_page'  href='".base_url()."dashboard/index/$counter'>$counter</a></li>";
                                  }                   
                                          }
                                      }
                            }
                          ?>
                              
                            <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                            <a class='page-link per_page' <?php if($page_no < $total_no_of_pages) { echo " href='".base_url()."dashboard/index/$next_page'"; } ?>>Next</a>
                            </li>
                              <?php if($page_no < $total_no_of_pages){
                              echo "<li><a class='page-link per_page'  href='".base_url()."dashboard/index/$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                              } ?>
                          </ul>      
                 </div> -->
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
