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
            <i class="fa fa-table"></i> Penalty Matrix - List of Users

		<!--  -->
		  </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="agentpenaltydataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Usertype</th>
                  <th>Status</th>
                  <th>Date Created/Registered</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if ($users > 0){
                       foreach ($users as $user){
                         
                         echo "<tr>";
                               echo "<td>".$user['firstname']." ".$user['lastname']."</td>";
                               echo "<td>".$user['username']."</td>";
                               echo "<td>".$user['usertype']."</td>";
                               echo "<td>".$user['status_user']."</td>";
                               echo "<td>".$user['date_added']."</td>"; ?>
                               <input type="hidden" name="userid" value="<?echo $user['user_id'];?>">                           
                               <td> <a class="btn btn-primary" href="<?php echo base_url('dashboard/view_penaltymatrix?id=').$user['user_id'] ?>">View</a></td>
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
          <br />

    
