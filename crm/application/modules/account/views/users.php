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
            <i class="fa fa-table"></i>List of Users
              <div style="float:right; ">
	            <div style="display:inline-block">
	               <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addUserModal" data-backdrop="static" data-keyboard="false">ADD USERS</button>
	            </div>   
		  </div>
		<!--  -->
		  </div>
          <div class="card-body">
            <div class="alert alert-success"><p></p></div>
          <div class="table-responsive">
            <table class="table table-bordered" id="userdataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Real Name</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th>Usertype</th>
                  <th>Status</th>
                  <th>Signature</th>
                  <th>Date Created/Registered</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if ($users > 0){
                       foreach ($users as $user){
                         
                         echo "<tr>";
                               echo "<td>".$user['real_name']."</td>";
                               echo "<td>".$user['firstname']."</td>";
                               echo "<td>".$user['lastname']."</td>";
                               echo "<td>".$user['emailaddress']."</td>";
                               echo "<td>".$user['contact']."</td>";
                               echo "<td>".$user['usertype']."</td>";
                               echo "<td>".$user['status_user']."</td>";
                               echo "<td><img style='width:100px; height:100px;' src=".base_url('upload_signatures/'. $user['signature'])."></td>";
                               echo "<td>".$user['date_added']."</td>";
                               if($user['status_user'] == 'Deactivate' || $user['usertype'] == 'Admin'){
                                echo "<td><button class='btn btn-primary view_user'data-toggle='modal' data-target='#updateUserModal' data-backdrop='static' data-keyboard='false' data-userid='".$user['user_id']."'>Update</button>
                                         <button class='btn btn-info' disabled>Login As</button></td>";
                               }else{
                               echo "<td><button class='btn btn-primary view_user'data-toggle='modal' data-target='#updateUserModal' data-backdrop='static' data-keyboard='false' data-userid='".$user['user_id']."'>Update</button>
                                         <button id='loginAs' data-email='".$user['emailaddress']."' data-usertype='".$user['usertype']."' class='btn btn-info'>Login As</button></td>";
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
          
         
