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
            <i class="fa fa-table"></i>Evaluation Masterlist
		<!--  -->
		  </div>
          <div class="card-body">
            <div class="alert alert-success"><p></p></div>
          <div class="table-responsive">
            <table class="table table-bordered" id="evaluationdataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Type</th>
                  <th>Evaluatee</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if ($team_evaluations > 0){
                       foreach ($team_evaluations as $evaluation){
                         
                         echo "<tr>";
                               echo "<td><i class='fa fa-file'></i> ".$evaluation['title']."</td>";
                               echo "<td>".$evaluation['form_type']."</td>";
                               echo "<td>".$evaluation['firstname']." ".$evaluation['lastname']."</td>";
                               echo "<td>".$evaluation['date_created']."</td>"; 
                               if($evaluation['form_type'] == "Employee Evaluation"){?>
                               <td> <a class="btn btn-primary" href="<?php echo base_url('evaluation/view_teamEvaluation?id=').$evaluation['evaluation_id']."&classid=".$evaluation['class_id']?>">View</a></td>
                               <?}else if($evaluation['form_type'] == "Company Evaluation"){?>
                                <td> <a class="btn btn-success" href="<?php echo base_url('evaluation/view_companyEvaluation?id=').$evaluation['evaluation_id']."&classid=".$evaluation['class_id']?>">View</a></td>
                         <? } echo "</tr>";
                     }
                  }  
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
          
         
