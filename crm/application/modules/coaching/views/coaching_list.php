
          <!-- /top tiles -->
  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-sticky-note-o"></i> Coaching Type
              <div style="float:right; ">
             <div style="float:right; ">
                     <a href="<?=base_url('coaching/coaching_form');?>" style="height: 33px; position: relative;  top: 6px;" class="btn btn-primary fa fa-plus">Create</a>
                  </div>   
             </div>
    <!--  -->
      </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Agent name</th>
                  <th>Signed Status Manager</th>
                  <th>Session Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if ($coaching_users > 0){
                       foreach ($coaching_users as $coaching_user){
                         
                         echo "<tr>";
                               echo "<td>".$coaching_user['agent_name']."</td>";
                               echo "<td>".$coaching_user['sign_status_manager']."</td>";
                               echo "<td>".date('Y/m/d',strtotime($coaching_user['date_session']))."</td>"; ?>
                               <td><a class="btn btn-primary" href="<?php echo base_url('coaching/coaching_detail/'.$coaching_user["coaching_id"].'');?>">View</a></td>
                            
                               <?

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
        
