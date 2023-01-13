
  

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
            <i class="fa fa-sticky-note-o"></i> List of Agent's    <!--  -->
      </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Employee's Name</th>
                  <th>Email Address</th>
                  <th>Contact</th>
                  <th>No. of Idle</th>
                  <th>Idle Code</th>
                </tr>
              </thead>
              <tbody>
              <?php
                      if ($users > 0){
                       foreach ($users as $user){
                         
                         echo "<tr>";
                               echo "<td>".$user['firstname']. ' ' .$user['lastname']."</td>";
                               echo "<td>".$user['emailaddress']."</td>";
                               echo "<td>".$user['contact']."</td>";
                               echo "<td>".$user['number_idle']."</td>";
                               echo "<td>".$user['idle_code']."</td>";

                          echo "</tr>";
                     }
                  }  
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>       
  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-sticky-note-o"></i> Agent's Idle
              <div style="float:right; ">
              <div style="display:inline-block">
              <!--<a href="<?=site_url('dashboard/create_memo');?>" style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" >Add</a> -->
                 <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addidleModal" data-backdrop="static" data-keyboard="false">Away From Keyboard</button> 
              </div>   
      </div>
    <!--  -->
      </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Agent's Name</th>
                  <th>Date Idle</th>
                  <th>Time Idle</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if ($idle_users > 0){
                       foreach ($idle_users as $idle){
                         
                         echo "<tr>";
                               echo "<td>".$idle['firstname']." ".$idle['lastname']."</td>";
                               echo "<td>".date('Y-m-d',strtotime($idle['date_idle']))."</td>"; 
                               echo "<td>".$idle['idle_time']."</td>"; 
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

    
        <!-- /page content -->

        
      </div>
    </div>

     
 
 



      