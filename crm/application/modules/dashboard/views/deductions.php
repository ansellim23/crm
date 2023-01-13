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
	               <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addDeductionModal" data-backdrop="static" data-keyboard="false">ADD DEDUCTION</button>
	            </div>   
		  </div>
		<!--  -->
		  </div>
          <div class="card-body">
            <div class="alert alert-success"><p></p></div>
          <div class="table-responsive">
            <table class="table table-bordered" id="deductiondataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Reason</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if ($deductions > 0){
                       foreach ($deductions as $deduction){
                         
                         echo "<tr>";
                               echo "<td>".$deduction['deduction_type']."</td>";
                               echo "<td>₱".number_format($deduction['amount'],2,".",",")."</td>";
                               echo "<td>".$deduction['deduction_date']."</td>";
                               echo "<td><button class='btn btn-warning'>Update</button><button class='btn btn-danger'>Delete</button></td>";
                               

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
          
         
