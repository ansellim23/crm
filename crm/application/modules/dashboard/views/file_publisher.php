
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">

          </div>
        </div>
          <!-- /top tiles -->

  <div class="card mb-3">

     <div class='content'>
         <div class="panel_s project-menu-panel">
          <div class="panel-body">
              <div class="horizontal-scrollable-tabs">
                <div class="scroller arrow-left" style="display: none;"><i class="fa fa-angle-left"></i></div>
                  <div class="scroller arrow-right" style="display: none;"><i class="fa fa-angle-right"></i></div>
                    <div class="horizontal-tabs">
                    <ul class="nav nav-tabs no-margin project-tabs nav-tabs-horizontal" role="tablist">
<!--                     <li class="active project_tab_project_overview">
                    <a data-group="project_overview" role="tab" href="javascript:history.back()">
                    <i class="fa fa-th" aria-hidden="true"></i>
                    Project Overview </a>
                    </li> -->
                    <li class="project_tab_project_files">
                    <a data-group="project_files" role="tab" href="<?=base_url('dashboard/files/'.$project_id.'');?>">
                    <i class="fa fa-files-o" aria-hidden="true"></i>
                    Files </a>
                    </li>
                    <li class="project_tab_project_files">
                    <a data-group="project_files" role="tab" href="<?=base_url('dashboard/files/'.$project_id.'');?>">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    Services </a>
                    </li>
                    </ul>
                  </div>
                </div>
              </div>
          </div>
     </div>
    <!-- Dropzone -->

     </div>
          <div class="card-header">
           <i class="fa fa-table"></i>List of Leads

  </div>
      <form method='POST' action='<?=base_url()?>dashboard/download_file'>
       <!--<a href="./uploads" download="proposed_file_name" class="btn btn-primary" style="width:10%; position:relative; top: 60px; left: 205px; z-index: 999;">Download All</a>-->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataTablefixed" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="display:none;"></th>
                  <th>File Name</th>
                  <th>Last Activity</th>
                  <th>Total Comments</th>
                  <th>Uploaded By</th>
                  <th>Date Uploaded</th>
                </tr>
              </thead>
              <tbody class="file_details">
          <?php

                  if ($files > 0){
                       foreach ($files as $file){

                         echo "<tr>";
                               // echo "<td class='project_id'>".modules::run("dashboard/setindex_prefix",$lead['project_id'])."</td>";\
                              echo "<td style='display:none;'><input type='checkbox' name='file_name[]' checked style='text-align:center; margin:0px auto;' class='form-check-input project_id' value=".'uploads/'.$file['file_name']."></td>";
                            if ($file['extension'] !="gif" && $file['extension'] !="jpg" && $file['extension'] !="png"  && $file['extension'] !="jpeg"){
                                echo "<td><a href='#' class='view_filehistory' data-toggle='modal' data-target='#viewfilehistorymodal' data-backdrop='static' data-keyboard='false'  data-project_id=".$file['project_id']." data-file_id=".$file['file_id']."  data-file_name=".$file['file_name']."  data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$file['file_name']."</td>";
                             }
                             else{
                                 echo "<td><a href='#' class='view_filehistory' data-toggle='modal' data-target='#viewfilehistorymodal' data-backdrop='static' data-keyboard='false'  data-project_id=".$file['project_id']." data-file_id=".$file['file_id']."  data-file_name=".$file['file_name']."   data-userid=".$this->session->userdata['userlogin']['user_id']."</a><img style='width:100px; height:100px;' src=".base_url('uploads/'. $file['file_name'])."></td>";
                             }
                               echo "<td>".modules::run("dashboard/time_ago",$file['date_uploaded'])."</td>"; 
                               echo "<td>".modules::run("dashboard/file_remark",$file['file_id'])."</td>"; 
                               echo "<td>".$file['upload_user']."</td>";
                               echo "<td>".date("d/m/Y", strtotime($file['date_uploaded']))."</td>";
                               //echo "<td><button type='button' class='btn btn-primary'>Download</button></td>";
                               // echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewfilehistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['author_name']."</td>";
                               // echo "<td>".$lead['book_title']."</td>";
                               // echo "<td>".$lead['email_address']."</td>";
                               // echo "<td>".$lead['contact_number']."</td>";
                               // echo "<td>$ ".number_format(str_replace(",","",$lead['price']),2,".",",")."</td>";
                               // echo "<td>".$lead['status']."</td>";
                               // echo "<td>".$lead['contractual_status']."</td>";
                               // echo "<td>$ ".number_format(str_replace(",","",$lead['remaining_balance']),2,".",",")."</td>";
                               // echo "<td>".date("d/m/Y", strtotime($lead  ['date_create']))."</td>";
                               // echo "<td>".ucfirst($lead['firstname']). ' '. ucfirst($lead['lastname']). "</td>";
                          echo "</tr>";
                     }
                  }  
              ?>
              </tbody>
            </table>

            </div> 
        </div>
      </form>
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

       