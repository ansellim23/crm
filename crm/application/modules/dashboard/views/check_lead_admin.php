<!-- <style>
  /* check lead css */
  div.dataTables_wrapper div.dataTables_filter {text-align: right; display: none;}
</style>
 -->
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

          <i class="fa fa-table"></i> Check Lead

            <div style="float:right; ">

    </div>

</div>
<div></br></div>

  <label class="sr-only" for="inlineFormInputGroupUsername2">Search</label>
<!--   <div class="input-group" style="width: 30%; margin:0 auto;">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-search"></i></div>
    </div>
      <input type="text" class='search-box-dataTable form-control' value="" placeholder="Type here then hit enter!">
  </div> -->

<div class="card-body">

<div class="table-responsive">

  <table class="table table-bordered" id="leadcheaklead_admin" width="100%" cellspacing="0">

    <thead>

      <tr>

        <th>Lead ID</th>

        <th>Author Name</th>


        <th>Assigned to</th>

        <th>Date Assigned</th>

        <th>Date Created</th>

      </tr>

    </thead>

    <tbody>
<?php

        // $get_count_payment =0;

        // $replace_comma = "";

        // if ($leads > 0){

        //      foreach ($leads as $lead){

        //        // $file_name = $lead['file_name'] == '' ? 'Manual Added' :$lead['file_name'];

        //        echo "<tr>";

        //              echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 

        //              echo "<td>".$lead['author_name']."</td>";


        //              echo "<td>".$lead['firstname']." ".$lead['lastname']."</td>";

        //              echo "<td>".date("d/m/Y", strtotime($lead['lead_date_agent_assign']))."</td>";

        //              echo "<td>".date("d/m/Y", strtotime($lead  ['date_create']))."</td>";
                 



        //         echo "</tr>";

        //    }

        // }  

   ?>

    </tbody>

  </table>


</div>

</div>

</div>

</div>

<br />

<!-- /page content -->
