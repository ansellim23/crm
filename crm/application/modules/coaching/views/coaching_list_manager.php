     <div class="right_col" role="main" style=" height: 100px; overflow-y: scroll;">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
          </div>
        </div>
          <!-- /top tiles -->
  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-sticky-note-o"></i> Coaching Type
              <div style="float:right; ">
              <div style="display:inline-block">
<!--                 <a href="<?=site_url('dashboard/create_memo');?>" style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" >Add</a> -->
                 <!-- <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addMemoModal" data-backdrop="static" data-keyboard="false">Create</button> -->
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
                  <th>Sign Status Agent</th>
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
                               echo "<td>".$coaching_user['sign_status']."</td>";
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
        
