<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url().'images/HORIZONS-LOGO-2.png';?>" type="image/ico" />

    <title>Better Bound House</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('bootstrap/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?php echo base_url('bootstrap/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('bootstrap/vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('bootstrap/vendors/iCheck/skins/flat/green.css');?>" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('bootstrap/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css');?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url('bootstrap/vendors/jqvmap/dist/jqvmap.min.css');?>" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.css');?>" rel="stylesheet">
    <link href="<?php echo base_url(); ?>datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('bootstrap/build/css/custom.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('css/croppie.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('datepicker/css/bootstrap-datepicker.css');?>" rel="stylesheet">

    <!-- Custom CSS for side Remark History -->
    <link href="<?php echo base_url('css/remarkhistory.css');?>" rel="stylesheet">

    <!-- Custom CSS for disabling copy/paste -->
<!--     <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/disablehighlightning.css');?>">
 -->
    <style type="text/css">
      /* .dataTables_filter{display: none;} */
      #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
      #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
      table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
      #approvalhistorymodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -445px;}
      #confirmationhistorymodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -445px;}
      #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
      .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}

      /* loader */
      #loader {border: 12px solid #f3f3f3; border-radius: 50%; border-top: 12px solid #444444; width: 70px; height: 70px; animation: spin 1s linear infinite;}
      @keyframes spin {100% {transform: rotate(360deg);}}
      .center {position: absolute; top: 0; bottom: 0; left: 0; right: 0; margin: auto;}

      #loader_1 {border: 12px solid #f3f3f3; border-radius: 50%; border-top: 12px solid #444444; width: 70px; height: 70px; animation: spin 1s linear infinite;}
      @keyframes spin {100% {transform: rotate(360deg);}}
      .center_1 {position: absolute; top: 0; bottom: 0; left: 0; right: 0; margin: auto;}

      #loader_2 {border: 12px solid #f3f3f3; border-radius: 50%; border-top: 12px solid #444444; width: 70px; height: 70px; animation: spin 1s linear infinite;}
      @keyframes spin {100% {transform: rotate(360deg);}}
      .center_2 {position: absolute; top: 0; bottom: 0; left: 0; right: 0; margin: auto;}
    </style>
  </head>

  <body class="nav-md unselectable">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url().'dashboard/';?>" class="site_title"><div class="image"> <span>Better Bound House</div></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
            <!-- <form id="uploadForm"  method="POST" enctype="multipart/form-data">
                  <div class="profile_pic">
                    <img id="image_preview" style="width: 150px; height: 150px; margin: 20px auto;" src="<?=(!empty($this->session->userdata['userlogin']['avatar']) ? base_url('images/'.$this->session->userdata["userlogin"]["avatar"].''): 'test') ; ?>"  alt="..." class="img-circle profile_img">
                  </div>
                     <div style="clear: both; margin: 128px 0px 0px 0px; text-align: center;">
                       <input type="file" id="uploadfile" name="file" style="margin:20px auto;" />
                       <button type="button" id="upload" class="btn btn-primary" >Upload</button>
                     </div>
                </form> -->
              <div class="profile_info">
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->

            <?php include 'sidebar_agent.php'; ?>

            <!-- /sidebar menu -->

  
        <!-- top navigation -->
    
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
            <i class="fa fa-table"></i> Recent Activities
            <div style="float:right; "> 
                 <div style="display:inline-block">
                 </div>   
             </div>
         </div>
          <div class="card-body">
            <div class="alert alert-success"><p></p></div>
          <div class="table-responsive">
            <table class="table table-bordered" id="activitydataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Date Created</th>
                  <th>Project Id</th>
                  <th>Author's Name</th>
                  <th>Activity</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if ($activities > 0){
                       foreach ($activities as $activity){
                         
                         echo "<tr>";
                               echo "<td>".date("Y/m/d h:i:s A", strtotime($activity['date_create_remark']))."</td>";
                               echo "<td>".$activity['project_id']."</td>";
                               echo "<td>".$activity['author_name']."</td>";
                               echo "<td>".$activity['create_remark']."</td>";
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
            <i class="fa fa-table"></i>List of Leads
              <div style="float:right; "> 
                 <div style="display:inline-block">
                   <!-- <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addleadmodal" data-backdrop="static" data-keyboard="false">ADD LEAD</button> -->
               </div>   
          </div>
<!--  -->
  </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataSalesTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Lead ID</th> 
                  <th>Package Name</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th>Lead Owner</th>
                  <th>Status and Date</th>
                  <th>Contract Status</th>
                  <th>Special Note</th>
                  <th>Date Assigned</th>
<!--                   <th>Last Contact Date</th>
 -->                  <th>Remark History</th>
                  <th>Update</th>
                  <th>Collection</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  // $get_count_payment =0;
                  // $replace_comma = "";
                  // if ($leads > 0){
                  //      foreach ($leads as $lead){
                  //         if($lead['status'] != 'In Progress' || $lead['status_payment'] == 'Pending' || $lead['contractual_status'] == 'Pending' || $lead['contractual_status'] == 'Cancelled'  || $lead['contractual_status'] == 'Processing'  &&  $lead['collect_payment_status'] == 'Full Payment'  || $lead['collect_payment_status'] == ""  || $lead['collect_payment_status'] == "Partial Payment"){
                  //        echo "<tr class='selected'>";
                  //              echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 
                  //              echo "<td>".$lead['product_name']."</td>"; 
                  //              echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['author_name']."</td>";
                  //              echo "<td><a href='http://google.com/search?q=".$lead['author_name']."+".$lead['book_title']."' target='blank'>".$lead['book_title']."</a></td>";
                  //              echo "<td>".$lead['email_address']."</td>";
                  //              echo "<td><a href='callto:".$lead['contact_number']."'>".$lead['contact_number']."</a></td>";
                  //              //echo "<td>$ ".number_format(str_replace(",","",$lead['price']),2,".",",")."</td>";
                  //              echo "<td>$ ".$lead['price']."</td>";
                  //                 if($lead['date_updated'] == NULL){
                  //                 echo "<td>".$lead['status'].  "</td>";

                  //              } 
                  //              else{
                  //                echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead['date_updated'])).  "</td>";

                  //              }

                  //              echo "<td>".$lead['contractual_status']."</td>";
                  //              echo '<td class="text-center"><textarea data-author_name="'.$lead['author_name'].'" data-project_id="'.$lead['project_id'].'" data-userid="'.$this->session->userdata['userlogin']['user_id'].'" class="form-control exampleFormControlTextarea"  style="width:130px;"  name="special_note"  rows="2">'.$lead['create_remark'].'</textarea><span class="badge badge-success">Date: '.$lead['date_create_remark'].'</span></td>';
                               
                  //               if($lead['lead_date_agent_assign'] == NULL){
                  //                 echo "<td></td>";

                  //              } 
                  //              else{
                  //                 echo "<td>".date("m/d/Y", strtotime($lead['lead_date_agent_assign']))."</td>";

                  //              }

                  //              //get last contact date
                  //              // if ($activities > 0){
                  //              //  $count = 0;
                  //              //  foreach ($activities as $activity){                                  
                  //              //     if($lead['project_id'] == $activity['project_id']){
                  //              //      echo"<td>".date("m/d/Y", strtotime($activity['date_create_remark']))."</td>";
                  //              //      $count++;
                  //              //      break;
                  //              //     }
                               
                  //              //  }
                  //              //     if($count == 0){
                  //              //      echo "<td></td>";
                  //              //      }
                  //              // }

                  //              //  echo "<td>".modules::run("dashboard/lead_remark",$lead['author_name'])."</td>";
                  //             echo "<td><button type='button' class='btn btn-outline-info viewleadremark_history1' data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id='".$lead['project_id']."'>View</a></td>";
                  //              echo "<td><button type='button' class='btn btn-danger view_update_leaddetail' data-toggle='modal' data-target='#updateleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='".$lead['project_id']."'>Edit</button></td>";
                             
                  //               if($lead['status'] == 'In Progress'){
                  //                 echo "<td><button type='button' style='color:#ffffff !important;' class='btn btn-warning view_pay_leaddetail' data-toggle='modal' data-target='#payleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='".$lead['project_id']."'>Collect</button></td>";
                  //               }
                  //               else{
                  //                echo "<td><button type='button' class='btn btn-success'>Collect</button></td>";

                  //               }


                  //         echo "</tr>";
                  //       }
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

          <div class="row">


                </div>
                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Horizons <a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

            <!-- The Add Lead Modal -->
                    <div class="modal fade" id="addleadmodal">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Add Lead</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- Modal body -->
                          <div class="modal-body">
                           <form class="needs-validation"  id="lead_form" novalidate>
                              <div class="alert alert-success"><p></p></div>
                              <div class="form-row">
                                <div class="col mb-3">
                                  <label for="validationCustom02">Package Name</label>
                                  <input type="text" class="form-control" style="height:50px;"  name="product_name" placeholder="Package Name" required>
                                </div>
                                <div class="col mb-3">
                                  <label for="validationCustomUsername">Author Name</label>
                                   <input type="text" class="form-control" style="height:50px;"  name="author_name" placeholder="Author Name" aria-describedby="inputGroupPrepend" required>
                                </div>
                                <div class="col mb-3">
                                   <label for="validationCustomUsername">Book Title</label>
                                    <input type="text" class="form-control" style="height:50px;"  name="title_name"  placeholder="Title Name" aria-describedby="inputGroupPrepend" required>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="col mb-3">
                                  <label for="validationCustom03">Status</label>
                                        <select class="form-control status" name="status" style="height:50px;">
                                          <option value="">Please Select a Tag</option>
                                          <option value="In Progress">In Progress</option>
                                          <option value="Assigned Low">Assigned Low</option>
                                          <option value="Assigned Mid">Assigned Mid</option>
                                          <option value="Assigned High">Assigned High</option>
                                          <option value="Recycled">Recycled</option>
                                          <option value="Dead">Dead</option>
                                        </select>
                                   </div>
                                   <div class="col mb-3">
                                      <label for="validationCustom05">Installment Term</label>
                                       <select class="form-control installment_term" name="installment_term" style="height:50px;" >
                                          <option value="">Please Select a Month</option>
                                          <option value="One Month">One Month</option>
                                          <option value="Two Months">Two Months</option>
                                          <option value="Three Months">Three Months</option>
                                          <option value="Four Months">Four Months</option>
                                          <option value="Five Months">Five Months</option>
                                          <option value="Six Months">Six Months</option>
                                        </select>                                   
                                   </div>
                                </div>
                                <div class="form-row">
                                  <div class="col mb-3">
                                      <label for="validationCustom05">Price</label>
                                      <input type="text" class="form-control" style="height:50px;" name="amount_paid"  placeholder="Price" required>
                                   </div>
                                   <div class="col mb-3">
                                      <label for="validationCustom03">Email Address</label>
                                    <input type="text" class="form-control" style="height:50px;"  name="email_address" placeholder="Email Address" required><a  class ="email_address" href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true" style="position: absolute;top: 25px; right: 6px; font-size:4em;"></i></a>
                                </div>
                                </div>
                                 <div class="form-row">
                                <div class="col mb-3">
                                  <label for="validationCustom04">Contact Number</label>
                                   <input type="text" id="contact_number" class="form-control" style="height:50px;"  name="contact_number" placeholder="Contact Number" required><a  class ="contact_number" href="#"><i class="fa fa-phone fa-3x" style="position: absolute;top: 25px; right: 6px; font-size:4em;" aria-hidden="true"></i></a>
                                </div>
                                <div class="col mb-3">
                                  <label for="validationCustom04">Area Code</label>
                                   <input type="text" id="area_code" class="form-control" style="height:50px;"  name="area_code" placeholder="Area Code" required>
                                </div>
                                </div>
                                 <div class="form-row">
                                <div class="col mb-3">
                                         <label for="validationCustom05">Address </label>
                                        <textarea class="form-control address" rows="3"  name="address"></textarea>
                                  </div>
                                  <div class="col mb-3">
                                         <label for="validationCustom05">Remark</label>
                                        <textarea class="form-control remark" rows="3"  name="remark"></textarea>
                                  </div>
                              </div>

                              <button class="btn btn-primary" id="add_lead" type="button">Save</button>
                            </form>
                          </div>
                          
                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                          
                        </div>
                      </div>
                    </div>
      <!-- end of add lead modal -->
  
      <!-- The Update Lead Modal -->
        <div class="modal fade" id="updateleadmodal">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Update Lead </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
               <form class="needs-validation"  id="update_lead_form" novalidate>
                 <div id="loader_2" class="center_2"></div>
                  <div class="alert alert-success"><p></p></div>
                  <div class="form-row">
                      <div class="col mb-3">
                        <label for="validationCustom02">Package Name</label>
                        <input type="text" class="form-control" style="height:50px;" readonly  name="product_name" placeholder="Package Name" required>
                      </div>
                      <div class="col mb-3">
                        <label for="validationCustomUsername">Author Name</label>
                         <input type="text" class="form-control" style="height:50px;" readonly  name="author_name" placeholder="Author Name" aria-describedby="inputGroupPrepend" required>
                      </div>
                      <div class="col mb-3">
                         <label for="validationCustomUsername">Book Title</label>
                          <input type="text" class="form-control" style="height:50px;" readonly name="title_name"  placeholder="Title Name" aria-describedby="inputGroupPrepend" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col mb-3">
                        <label for="validationCustom03">Status</label>
                              <select class="form-control status" name="status" style="height:50px;">
                                <option value="">Please Select a Tag</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Assigned Low">Assigned Low</option>
                                <option value="Assigned Mid">Assigned Mid</option>
                                <option value="Assigned High">Assigned High</option>
                                <option value="Recycled">Recycle</option>
                                <option value="Dead">Dead</option>
                              </select>
                             <input type="hidden" class="form-control" style="height:50px;"  name="project_id"  placeholder="Title Name" aria-describedby="inputGroupPrepend" required>
                         </div>
                         <div class="col mb-3">
                            <label for="validationCustom05">Installment Term</label>
                             <select class="form-control installment_term" name="installment_term" style="height:50px;" >
                                <option value="">Please Select a Month</option>
                                <option value="One Month">One Month</option>
                                <option value="Two Months">Two Months</option>
                                <option value="Three Months">Three Months</option>
                                <option value="Four Months">Four Months</option>
                                <option value="Five Months">Five Months</option>
                                <option value="Six Months">Six Months</option>
                              </select>                                   
                         </div>
                      </div>
                      <div class="form-row">
                        <div class="col mb-3">
                            <label for="validationCustom05">Price</label>
                            <input type="text" class="form-control" style="height:50px;"  name="amount_paid"  placeholder="Price" required>
                         </div>
                         <div class="col mb-3">
                            <label for="validationCustom03">Email Address</label>
                          <input type="text" class="form-control" style="height:50px;" readonly name="email_address" placeholder="Email Address" required><a  class ="email_address" href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true" style="position: absolute;top: 25px; right: 6px; font-size:4em;"></i></a>
                      </div>
                      </div>
                       <div class="form-row">
                      <div class="col mb-3">
                        <label for="validationCustom04">Contact Number</label>
                         <input type="text" id="contact_number" class="form-control" readonly style="height:50px;"  name="contact_number" placeholder="Contact Number" required><a  class ="contact_number call" href="#"><i class="fa fa-phone fa-3x" style="position: absolute;top: 25px; right: 6px; font-size:4em;" aria-hidden="true"></i></a>
                      </div>
                      <div class="col mb-3">
                        <label for="validationCustom04">Area Code</label>
                         <input type="text" id="area_code" class="form-control" style="height:50px;"  name="area_code" placeholder="Area Code" required>
                      </div>
                      </div>
                       <div class="form-row">
                      <div class="col mb-3">
                               <label for="validationCustom05">Address </label>
                              <textarea class="form-control address" rows="3" name="address"></textarea>
                        </div>
                        <div class="col mb-3">
                               <label for="validationCustom05">Remark</label>
                              <textarea class="form-control remark" rows="3"  name="remark"></textarea>
                        </div>
                    </div>
                  <button class="btn btn-success" id="update_lead" type="button">Update</button>
                </form>
              </div>
    
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              
            </div>
          </div>
        </div>s
      <!-- end of upste lead modal -->
    
    <!-- The Pay Lead Modal -->
          <div class="modal fade" id="payleadmodal">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Collection Lead</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                 <form class="needs-validation"  id="pay_lead_form" novalidate>
                    <div class="alert alert-success"><p></p></div>
                    <div class="form-row">
                      <div class="col mb-3">
                        <label for="validationCustom02">Package Name</label>
                        <input type="text" readonly class="form-control" style="height:50px;"  name="product_name" placeholder="Package Name" required>
                      </div>
                      <div class="col mb-3">
                        <label for="validationCustomUsername">Author Name</label>
                         <input type="text" readonly class="form-control" style="height:50px;"  name="author_name" placeholder="Author Name" aria-describedby="inputGroupPrepend" required>
                      </div>
                      <div class="col mb-3">
                        <label for="validationCustomUsername">Book Title</label>
                         <input type="text" readonly class="form-control" style="height:50px;"  name="title_name"  placeholder="Title Name" aria-describedby="inputGroupPrepend" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col mb-3">
                        <label for="validationCustom03">Collection Payment</label>
                              <select class="form-control status" name="status"   style="height:50px;">
                                
                               <!--  <option value="Refund Payment">Refund Payment</option> -->
                            </select>
                         </div>
                      <div class="col mb-3">
                        <label for="validationCustom03">Email Address</label>
                        <input type="text" readonly class="form-control" style="height:50px;"  name="email_address" placeholder="Email Address" required><a  class ="email_address" href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true" style="position: absolute;top: 25px; right: 6px; font-size:4em;"></i></a>
                      </div>
                      <div class="col mb-3">
                        <label for="validationCustom04">Contact Number</label>
                        <input type="text" readonly class="form-control" style="height:50px;"  name="contact_number" placeholder="Contact Number" required><i class="fa fa-phone fa-3x" style="position: absolute;top: 25px; right: 6px; font-size:4em;" aria-hidden="true"></i>
                      </div>

                        <div class="hide_amount_paid">
                            <div class="col mb-3">
                               <label for="validationCustom05">Price</label>
                               <input type="text" readonly class="form-control" style="height:50px;" name="amount_paid"  placeholder="Price" required>
                             </div>
                       </div>
                       </div>
                       <div class="hide_initialpayment">
                      <div class="form-row">
                       <div class="col mb-3">
                          <label for="validationCustom05" class="change_status">Initial Payment</label>
                         <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" style="height:50px;" id="initial_payment" value="0.00" name="initial_payment" placeholder="Initial Payment" required>
                       </div>
                      <div class="col mb-3">
                        <label for="validationCustom05">Collection Date</label>
                         <div class="form-group mb-4" style="margin-bottom:-30px !important;">
                                <div class="datepicker date input-group p-0 shadow-sm">
                                    <input type="text" placeholder="Choose a date" name="collection_date" class="form-control py-4 px-4 reservationDate">
                                    <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span></div>
                                </div>
                            </div>
                      </div>

                               <input type="hidden" placeholder="Project Id" name="project_id" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="collection_id" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="status_payment" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="approved_status" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="previous_amount" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="previous_collect_status" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="payment_id" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="previous_collect_date" value="" class="form-control py-4 px-4">
                               <input type="hidden" placeholder="Project Id" name="get_previous_balance" value="" class="form-control py-4 px-4">
                        <div class="col mb-3">
                          <label for="validationCustom04">Remaining Balance <span id="get_balance"></span></label>
                          <input type="text" readonly class="form-control" name="remain_balance" style="height:50px;" value="Php 0.00" id="remain_balance" placeholder="Remaining Balance" required>
                        </div>

                      </div>
                      </div>
                      <div class="form-row">
                      <div class="col mb-3">
                               <label for="validationCustom05">Address </label>
                              <textarea class="form-control address"  rows="3"  name="address"></textarea>
                        </div>
                        <div class="col mb-3">
                               <label for="validationCustom05">Remark</label>
                              <textarea class="form-control remark" rows="3"  name="remark"></textarea>
                        </div>
                    </div>

                    <button class="btn btn-danger" id="pay_lead" type="button">Collect</button>
                    <button class="btn btn-success" id="update_pay_lead" type="button">Update</button>
                    <button class="btn btn-secondary view_approval_history" id="view_approval_history" data-project_id='' data-toggle='modal' data-target='#approvalhistorymodal' data-backdrop='static' data-keyboard='false'  type="button">View Approval Payment History</button>
                    <button class="btn btn-secondary view_confirmpayment_history" id="view_confirmpayment_history" data-project_id='' data-toggle='modal' data-target='#confirmationhistorymodal' data-backdrop='static' data-keyboard='false'  type="button">View Payment History</button>
                  </form>
                </div>
                 <div class="card-body">
                    <div class="table-responsive display_table">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Amount Paid</th>
                            <th>Colllection Date</th>
                            <th>Collection Status</th>
                            <th>Approval Status and Date</th>
                            <th>Payment Status and Date</th>
                            <th>User Charge</th>
                            <th>User Type</th>
                            <th>Remark</th>
                          </tr>
                        </thead>
                        <tbody class="view_all_lead">
                       </table>
                    </div>
                    <div id ="display_balance" style="float: right; margin-right: 100px;font-size: 16px;"><b><span>REMAINING BALANCE:</span> <p id="balance" style="display:inline-block;"><p></b></div>
                  </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
                </div>
                
              </div>
            </div>
          </div>
      <!-- end of upste lead modal -->

            <!-- The payment  Remark-->
                <div class="modal fade" id="viewlead_paymentremark_modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">View Remark</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                               <div class="alert alert-success"><p></p></div>
                                 <div class="col mb-3">
                                       <label for="validationCustom05">Remark</label>
                                         <textarea class="form-control remark"  disabled rows="3"  name="remark"></textarea>

                                 </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

         <!-- Edit User -->
         <div class="modal fade" id="editUserModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="editUserform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Your Profile</h2>
                        <p class="hint-text">Edit your account.</p>
                            <div class="form-group">
                              <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="username" placeholder="User Name" required="required">
                            </div>
                            <div class="form-group">
                              <input type="email" class="form-control" name="email_address" placeholder="Email Address" required="required">
                            </div>
                            <div class="form-group">
                              <input type="hidden" class="form-control" name="email_address_confirm" placeholder="Email Address" required="required">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="contact" placeholder="Contact Number" required="required">
                            </div>

                         <div class="form-group">
                            <select class="form-control usertype" name="usertype">
                                <option value="">Please Select An UserType</option>
                                <option value="Admin">Admin</option>
                                <option value="IT">IT</option>
                                <option value="Manager">Manager</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Finance">Finance</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Agent">Agent</option>
                              </select>
                           </div>

                        <div class="form-group">
                                <button type="button" id="update_account" class="btn btn-success btn-lg btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                  </div>
               </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
          </div>
      </div>

<!-- Password User -->
         <div class="modal fade" id="editUserPasswordModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="editUserPasswordform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Change Password</h2>
                        <p class="hint-text">Change your password.</p>
                            <div class="form-group">
                              <input type="password" class="form-control" name="current_password" placeholder="Enter your Current Password" required="required">
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" name="new_password" placeholder="Enter your New Password" required="required">
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" name="confirm_password" placeholder="Enter your Confirm your Password" required="required">
                            </div>
                        <div class="form-group">
                                <button type="button" id="change_password" class="btn btn-success btn-lg btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                  </div>
               </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
          </div>
      </div>

   <!-- The History Approval-->
                <div class="modal fade" id="approvalhistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Approval Payment History</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="approvalhistoryDatatable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Project ID</th>
                                            <th>Package Name</th>
                                            <th>Author Name</th>
                                            <th>Book Title</th>
                                            <th>Email Address</th>
                                            <th>Contact #</th>
                                            <th>Area Code</th>
                                            <th>Amount Paid</th>
                                            <th>Approval Status and Date</th>
                                            <th>User Charge</th>
                                            <th>User Type</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewapproval_payment">
                                        </tbody>
                                      </table>
                              </div>
                            </div>
                               <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

          <!-- The Confimation Payment-->
                <div class="modal fade" id="confirmationhistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Approval Payment History</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="confirmationpaymenthistory" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Project ID</th>
                                            <th>Package Name</th>
                                            <th>Author Name</th>
                                            <th>Book Title</th>
                                            <th>Email Address</th>
                                            <th>Contact #</th>
                                            <th>Area Code</th>
                                            <th>Amount Paid</th>
                                            <th>Payment Status and Date</th>
                                            <th>User Charge</th>
                                            <th>User Type</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewconfirm_payment">
                                        </tbody>
                                      </table>
                              </div>
                            </div>
                               <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->
                <!-- The History Leas  Remark-->
                               <!-- The History Leas  Remark-->
                <div class="modal fade" id="viewleadhistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Your Lead History </h4> 
                           <a  class="btn btn-success btn-block viewleadremark_history" style="width: 220px; margin-left:50px; color:#ffffff;" data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name="">Lead Communications</a>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="historyleadtable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Project ID</th>
                                            <th>Package Name</th>
                                            <th>Author Name</th>
                                            <th>Book Title</th>
                                            <th>Email Address</th>
                                            <th>Contact #</th>
                                            <th>Lead Type</th>
                                            <th>Status and Date</th>
                                            
                                          </tr>
                                        </thead>
                                        <tbody class="viewleadhistory">

                                        </tbody>
                                      </table>
                              </div>
                                <form id="leadremarkform">
                                  <div class="col mb-1 w-50 p-3 align-middle" style="margin:0px auto;">
                                        <div id="loader_1" class="center_1"></div>  
                                        <div class="alert alert-success"><p></p></div>
                                        <input type="hidden" readonly class="form-control" name="project_id" placeholder="Project ID" required="required">
                                        <input type="hidden" readonly class="form-control" name="author_name" placeholder="Author Name" required="required">
                                        <label for="validationCustom05">Add Remark</label>
                                        <select class="form-control" id="pre_suggestion">
                                          <option>Please Select</option>
                                          <option value="Sent Voicemail">Sent Voicemail</option>
                                          <option value="Not in Service">Not in Service</option>
                                          <option value="Mailbox Full">Mailbox Full</option>
                                          <option value="Voicemail Not Set">Voicemail Not Set</option>
                                          <option value="Wrong Number">Wrong Number</option>
                                          <option value="Inactive Email">Inactive Email</option>
                                          <option value="Sent Email">Sent Email</option>
                                          <option value="Dropped Call">Dropped Call</option>
                                          <option value="Wrong Book Info">Wrong Book Info</option>
                                          <option value="Wrong Author's Name">Wrong Author's Name</option>
                                        </select>
                                        <textarea class="form-control remark" rows="4" name="remark"></textarea>
                                          <div class="form-group" style='margin-top:10px;'>
                                            <button type="button" id="add_remark" class="btn btn-success btn-lg btn-block">Save</button>
                                          </div>
                                    </div>
                                </form> 
                            </div>
                               <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

 <!-- The History Leas  Remark-->
                <div  class="modal fade" id="viewleadremarkhistorymodal" data-backdrop="true">
                  <div class="modal-dialog modal-right w-xl">
                    <div class="modal-content h-100 no-radius">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Remark History </h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="historyleadtable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>From Users</th>
                                            <th>User Type</th>
                                            <th>Remark</th>
                                            <th>Date Remark</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewleadremarkhistory">

                                        </tbody>
                                      </table>
                              </div>
                            <h4 class="modal-title">Activities History </h4> 

                                   <div class="table-responsive">
                                      <table class="table table-bordered" id="historylead_assigntable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Agent Name</th>
                                            <th>Status</th>
                                            <th>Date Activities</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewlead_status_history">

                                        </tbody>
                                      </table>
                              </div>
                            </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

                      
          <div class="modal fade" id="warningModal_<?php echo $this->session->userdata['userlogin']['user_id'];?>" style="background:#080708;" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title"> WARNING IDLE  FORM </h4>
                      </div>
                      
                      <!-- Modal body -->
                     <form  id="update_user_idle_form">
                        <div class="alert alert-success"><p></p></div>
                      <div class="modal-body">
                             <input type="hidden" class="form-control" id="user_id" readonly name="user_id"/>

                      <audio>
                               <source src="<?php echo base_url();?>/audio/Purge_Siren_Sound_Effect.mp3"></source>
                               <source src="<?php echo base_url();?>/Purge_Siren_Sound_Effect.ogg"></source>
                      </audio>
                           
                           <span class="idle_start"><h3>The management has noticed that you have been idled. Plase click the go back button to get back to your dashboard...</h3></span>
                      </div>
                      
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" id="update_idle" class="btn btn-danger">Close</button>
                      </div>
                    </form>
                      
                    </div>
                  </div>
                </div>

                </div>
            <!-- end of Remark modal -->

 





     <script>
     var base_url = "<?php echo base_url(); ?>";

     var userlogin = "<?=isset($this->session->userdata['userlogin']) ? 1: 0 ;?>";
     var user_type = "<?=$this->session->userdata['userlogin']['usertype'];?>";
     var session_user_id = "<?=isset($this->session->userdata['userlogin']) ? $this->session->userdata['userlogin']['user_id']: 0 ;?>";
     </script>

     </script>
    <!-- jQuery -->
    <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('datepicker/js/bootstrap-datepicker.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('bootstrap/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('bootstrap/vendors/nprogress/nprogress.js');?>"></script>


    <!-- gauge.js');?> -->
    <script src="<?php echo base_url('bootstrap/vendors/gauge.js/dist/gauge.min.js');?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js');?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('bootstrap/vendors/iCheck/icheck.min.js');?>"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url('bootstrap/vendors/skycons/skycons.js');?>"></script>
    <!-- Flot -->
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.pie.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.time.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.stack.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/Flot/jquery.flot.resize.js');?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url('bootstrap/vendors/flot.orderbars/js/jquery.flot.orderBars.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/flot-spline/js/jquery.flot.spline.min.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/flot.curvedlines/curvedLines.js');?>"></script>
    <script src="<?php echo base_url(); ?>datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>datatables/dataTables.bootstrap4.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url('bootstrap/vendors/DateJS/build/date.js');?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/dist/jquery.vmap.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/dist/maps/jquery.vmap.world.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js');?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('bootstrap/vendors/moment/min/moment.min.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('bootstrap/build/js/custom.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/select.js');?>"></script>
        <script src="<?php echo base_url('js/dataTables.select.min.js');?>"></script>
        <script src="<?php echo base_url('js/fnReloadAjax.js');?>"></script>

    <script src="<?php echo base_url('js/croppie.js');?>"></script>
    <script src="<?php echo base_url('js/jquery.idle.js');?>"></script>
    <script src="<?php echo base_url('js/html2canvas.min.js');?>"></script>


     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>

 <script>  
 var  activitydatatable = $('#activitydataTable').DataTable({
      "sPaginationType": "listbox",
     "pageLength": 5,
     "order": [[ 0, "desc" ]]
    } );

 // var table = $('#leaddataSalesTable').DataTable({
 //  "aaSorting": [[10,'desc']],
 //  "sPaginationType": "listbox",
 //   select: true
 //      // columnDefs: [ {
 //      //         targets: 10,
 //      //         render: function ( data, type, row ) {
 //      //                 return type === 'display' && data.length > 10 ?
 //      //                     data.substr( 0, 10 ) +'…' :
 //      //                     data;
 //      //             }
 //      //     } ]

 //  });
 function setindex_prefix_lead(index_assigned)
          {
                  switch(index_assigned.length)
                  {
                      case 1:
                          var new_index_assigned = "000"+  index_assigned;
                          break;
                      case 2:
                          var new_index_assigned = "00"+  index_assigned;
                      break;
                      case 3:
                          var new_index_assigned = "0"+  index_assigned;
                          break;
                      default:
                          var new_index_assigned =  index_assigned;
                  }
                  
                return "LEAD"+ new_index_assigned;
          }

   var table = $('#leaddataSalesTable').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        "ajax": {

            "url": base_url +  "dashboard/load_data_collection_payment",
            "type": "POST",
        },

        //Set column definition initialisation properties.
        "sPaginationType": "listbox",
          "order": [], //Initial no order.
          columns: [
              { data: 'project_id',
                    "render" : function( data, type, full ) {
                            // you could prepend a dollar sign before returning, or do it
                            // in the formatNumber method itself
                            return setindex_prefix_lead(data);                          
                          }
               },
              { data: 'product_name' },
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name="+row.author_name+" data-project_id="+row.project_id+" data-userid='"+session_user_id+"'>"+row.author_name+"</a>"; 
                        }
               }, 
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='http://google.com/search?q="+row.author_name+"+"+row.book_title+"' target='blank'>"+row.book_title+"</a>"; 
                        }
               }, 
              { data: 'email_address' },
              { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='callto:"+row.contact_number+"'>"+row.contact_number+"</a>"; 
                        }
               }, 
              { data: 'lead_owner' },
              { data: null,
                "render" : function( data, type, row, full ) {
                            var status = row.date_approve == null ? row.status: row.status +' - '+ new Date(row.date_approve).toLocaleDateString('en-GB');
                            return "<span class='approval_status'>"+status+'</span> ';                          
                        }
               },
               { data: 'contractual_status'},
               { data: null,
                "render" : function( data, type, row, full ) {

                            var create_remark = row.create_remark == null ? '': row.create_remark ;
                            var date_create_remark = row.date_create_remark == null ? '': row.date_create_remark ;

                            return '<td class="text-center"><textarea data-author_name="'+row.author_name+'" data-project_id="'+row.project_id+'" data-userid="'+session_user_id+'" class="form-control exampleFormControlTextarea"  style="width:130px;"  name="special_note"  rows="2">'+create_remark+'</textarea><span class="badge badge-success">Date: '+date_create_remark+'</span></td>'; 
                        }
               }, 
                { data: 'lead_date_agent_assign',
                "render" : function( data, type, row, full ) {
                            var lead_date_agent_assign = data == null ? '': new Date(data).toLocaleDateString('en-GB');
                            return lead_date_agent_assign;                          
                        }
               },
               //  { data: 'date_create_remark',
               //      "render" : function( data, type, full ) {
               //              // you could prepend a dollar sign before returning, or do it
               //              // in the formatNumber method itself
               //              var date_create_remark = data == null ? '': data ;
               //              return date_create_remark;                          
               //            }
               // },
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<button type='button' class='btn btn-outline-info viewleadremark_history1' data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='"+row.author_name+"' data-project_id='"+row.project_id+"'>View</a>"; 
                        }
               },
                 { data: null,
                "render" : function( data, type, row, full ) {
                            return "<button type='button' class='btn btn-danger view_update_leaddetail' data-toggle='modal' data-target='#updateleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='"+row.project_id+"'>Edit</button>"; 
                        }
               },
              { data: null,
                "render" : function( data, type, row, full ) {
                             if(row.status == 'In Progress'){
                                  return "<button type='button' style='color:#ffffff !important;' class='btn btn-warning view_pay_leaddetail' data-toggle='modal' data-target='#payleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='"+row.project_id+"'>Collect</button></td>";
                                }
                                else{
                                 return "<button type='button' class='btn btn-success'>Collect</button>";

                                }                         
                        }
               },
           ],
        "columnDefs": [
         { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });


      $(document).on('blur','.exampleFormControlTextarea',function(e) {
          var id = $(this).val();
          console.log(id);
        });

//   function add_note(){
//     $(".use-address").click(function() {
//     var id = $(this).closest("tr").find(".nr").text();
//     $("#resultas").append(id);
// });
//            var data = table.rows('.selected').data().$('.exampleFormControlTextarea').serialize();
//              alert(row.nodes().to$().find('.exampleFormControlTextarea'));
//           return false;
//     };

$(function () {

    // INITIALIZE DATEPICKER PLUGIN
    var dateToday = new Date(); 
    $('#lead_form .datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy",
        startDate: '01/01/2020',
    }).datepicker("setDate", dateToday);
    
})
</script>
<!-- preloader -->
<script>
        $(window).on('load', function() {
          $("#loader").css("display", "none");  
          $("#loader_1").css("display", "none");  
          $("#loader_2").css("display", "none");
     });

    </script>
  </body>
</html>
