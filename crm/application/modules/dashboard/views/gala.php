

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
           <i class="fa fa-table"></i>List of Galley

  </div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="galadataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Author's name</th>
                  <th>File Name</th>
                  <th>Date Upload</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody >
              <?php

                  if ($galas > 0){
                    foreach ($galas as $key => $gala) {
                       echo "<tr>";
                         echo "<td>".ucwords($gala['first_name']. ' '.$gala['last_name'])."</td>";
                         if(!empty($gala['gala_file'])){
                             echo "<td><a href='".base_url()."/upload_galley/".$gala['gala_file']."' download>".$gala['gala_file']."</a></td>";
                             echo "<td>".date('Y-m-d h:i:s', strtotime($gala['date_uploaded']))."</td>";
                       }
                       else{
                            echo "<td>Not Yet</td>";
                            echo "<td>Not Yet</td>";
                       }   
                         echo "<td><button type='button' class='btn btn-success  view_gala_detail' data-toggle='modal' data-target='#uploadgalamodal' data-backdrop='static' data-keyboard='false' data-report_id='".$gala['report_id']."' data-project_id='".$gala['project_id']."' data-gala_file='".$gala['gala_file']."'>Add File</button> </td>";                       

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

          <div class="row">


    
                </div>
                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

                           <!-- The History Leas  Remark-->
                <div class="modal fade" id="uploadgalamodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Add Galley File </h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- Modal body -->
                          <form id='upload_gala_form' enctype='multipart/form-data'>
                              <div class="alert alert-success"><p></p></div>
                                  <input type='file' class='gala_file' name='gala_file'> 
                                  <input type='hidden' id='report_id' readonly name='report_id'>
                                  <input type='hidden' id='project_id' readonly  name='project_id'>
                                  <div class="modal-footer">
                                      <button type="button" id="add_gala" class="btn btn-success">Upload</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                             </div>
                         </form>
                    </div>
                  </div>
                </div>
     <!-- end of Remark modal -->