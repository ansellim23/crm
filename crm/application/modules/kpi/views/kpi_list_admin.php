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
            <i class="fa fa-table"></i>KPI Masterlist
            <a href="<?=base_url('kpi/createkpi')?>" class="fa fa-plus btn-primary btn-lg float-right">Add</a>
		<!--  -->
		  </div>
          <div class="card-body">
            <div class="alert alert-success"><p></p></div>
          <div class="table-responsive">
            <table class="table table-bordered" id="kpidataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Agent Name</th>
                  <th>Created by</th>
                  <th>Month of</th>
                  <th>Date Created</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if ($kpis > 0){
                       foreach ($kpis as $kpi){
                         
                         echo "<tr>";
                               echo "<td>".$kpi['firstname']." ".$kpi['lastname']."</td>";
                               echo "<td>".$kpi['from_user']."</td>";
                               echo "<td>".$kpi['month']."</td>";                               
                               echo "<td>".$kpi['date_created']."</td>"; 
                               echo "<td><a class='btn btn-primary' href='".base_url('kpi/view_kpi?id=').$kpi['kpi_id']."'>View</a></td>";
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
          
         
