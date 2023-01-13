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

    <!-- Custom CSS for disabling copy/paste -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/disablehighlightning.css');?>">



    <style type="text/css">

        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}

    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}

    #approvalhistorymodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -445px;}

    #payleadmodal .modal-content{ width: 320% !important; margin-left: -510px !important;}

    #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}

    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}

/*    #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}
    div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    display: none;
}
*/


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

          <!--      <form id="uploadForm"  method="POST" enctype="multipart/form-data">

                  <div class="profile_pic">

                    <img id="image_preview" style="width: 150px; height: 150px; margin: 20px auto;" src="<?=(!empty($this->session->userdata['userlogin']['avatar']) ? base_url('images/'.$this->session->userdata["userlogin"]["avatar"].''): 'test') ; ?>"  alt="..." class="img-circle profile_img">

                  </div>

                     <div style="clear: both; margin: 128px 0px 0px 0px; text-align: center;">

                       <input type="file" id="uploadfile" name="file" style="margin:20px auto;" />

                       <button type="button" id="upload" class="btn btn-primary" >Upload</button>

                     </div>

                </form> -->

              <div class="profile_info">

                <span>Welcome,</span>

                <h2><?=ucfirst($this->session->userdata['userlogin']['firstname']) .' '. ucfirst($this->session->userdata['userlogin']['lastname']);?></h2>

              </div>

            </div>

            <!-- /menu profile quick info -->



            <br />



            <!-- sidebar menu -->

            <?php include 'sidebar_agent.php'; ?>

            <!-- /sidebar menu -->



            <!-- /menu footer buttons -->




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
    <!--         <div class="input-group" style="width: 30%; margin:0 auto;">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-search"></i></div>
              </div>
                <input type="text" class='search-box-dataTable form-control' value="" placeholder="Type here then hit enter!">
            </div> -->
          
          <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="datatableleadcheck_agent" width="100%" cellspacing="0">

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

                  <button class="btn btn-success" id="update_lead" type="button">Update</button>

                </form>

              </div>

    

              <!-- Modal footer -->

              <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

              </div>

              

            </div>

          </div>

        </div>

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

                              <textarea class="form-control address" readonly rows="3"  name="address"></textarea>

                        </div>

                        <div class="col mb-3">

                               <label for="validationCustom05">Remark</label>

                              <textarea class="form-control remark" rows="3"  name="remark"></textarea>

                        </div>

                    </div>



                    <button class="btn btn-danger" id="pay_lead" type="button">Collect</button>

                    <button class="btn btn-success" id="update_pay_lead" type="button">Update</button>

                    <button class="btn btn-secondary view_approval_history" id="view_approval_history" data-project_id='' data-toggle='modal' data-target='#approvalhistorymodal' data-backdrop='static' data-keyboard='false'  type="button">View Approval Payment History</button>

<!--                     <button class="btn btn-secondary view_confirmpayment_history" id="view_payment_history" data-project_id='' data-toggle='modal' data-target='#approvalhistorymodal' data-backdrop='static' data-keyboard='false'  type="button">View Payment History</button>

 -->                  </form>

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

                            <th>Approval</th>

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

              <!-- The Approval payment -->

                <div class="modal fade" id="viewlead_approval_modal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Approval Payment</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                            <form id="update_approval_lead_form">

                               <div class="alert alert-success"><p></p></div>

                                 <div class="col mb-3">

                                       <label for="validationCustom05">Approval Status</label>

                                       <select class="form-control approval_status" name="approval_status" style="height:50px;" >

                                          <option value="">Please Select a Approval Status</option>

                                          <option value="Approved">Approved</option>

                                          <option value="Declined">Declined</option>

                                        </select>



                                 </div>

                                  <div class="col mb-3">

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="payment_id"  placeholder="Price" required>

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>

                                      <button class="btn btn-warning" id="update_approval" type="button">Save</button>

                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                   </div>

                            </form>

                          </div>

                          

                    </div>

                  </div>

                </div>

            <!-- end of Approval modal -->



              <!-- The Author Payment -->

                <div class="modal fade" id="viewlead_payment_modal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Process Payment</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                            <form id="update_payment_lead_form">

                               <div class="alert alert-success"><p></p></div>

                                 <div class="col mb-3">

                                       <label for="validationCustom05">Payment Status</label>

                                       <select class="form-control payment_status" name="payment_status" style="height:50px;" >

                                          <option value="">Please Select a Payment Status</option>

                                          <option value="Pending">Pending</option>

                                          <option value="Paid">Paid</option>

                                          <option value="Refunded">Refunded</option>

                                          <option value="Cancelled">Cancelled</option>

                                        </select>



                                 </div>

                                  <div class="col mb-3">

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="payment_id"  placeholder="Price" required>

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="get_previous_balance"  placeholder="Price" required>

                                      <button class="btn btn-warning" id="update_lead_payment" type="button">Save</button>

                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                   </div>

                            </form>

                          </div>

                          

                    </div>

                  </div>

                </div>

            <!-- end of Author Payment modal -->



              <!-- The Contractual Author -->

                <div class="modal fade" id="viewlead_contractual_modal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Author Contract</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                            <form id="update_contract_lead_form">

                               <div class="alert alert-success"><p></p></div>

                                 <div class="col mb-3">

                                       <label for="validationCustom05">Contract Status</label>

                                       <select class="form-control contract_status" name="contract_status" style="height:50px;" >

                                          <option value="">Please Select a Contract Status</option>

                                          <option value="Pending">Pending Contract</option>

                                          <option value="Endorsed">Endorsement Contract</option>

                                          <option value="Cancelled">Cancelled Contract</option>

                                        </select>



                                 </div>

                                  <div class="col mb-3">

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>

                                      <button class="btn btn-warning" id="update_lead_contract" type="button">Save</button>

                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                   </div>

                            </form>

                          </div>

                          

                    </div>

                  </div>

                </div>

            <!-- end of Author Payment modal -->



                    <!-- The Contractual Author -->

                <div class="modal fade" id="viewlead_contractualinvestment_modal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Author Contract Investment</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                            <form id="update_contractinnvestment_lead_form">

                               <div class="alert alert-success"><p></p></div>

                                 <div class="col mb-3">

                                       <label for="validationCustom05">Contract Investment</label>

                                       <select class="form-control contract_investment" name="contract_investment" style="height:50px;" >

                                          <option value="">Please Select a Contract Investment Status</option>

                                          <option value="Pending - Investment not received/Contract not signed">Pending - Investment not received/Contract not signed</option>

                                          <option value="Pending - Investment not received/Contract signed">Pending - Investment not received/Contract signed</option>

                                          <option value="Pending - Investment received/Contract not signed">Pending - Investment received/Contract not signed</option>

                                          <option value="Refunded">Refunded</option>

                                          <option value="Sold">Solds</option>

                                        </select>



                                 </div>

                                  <div class="col mb-3">

                                    <input type="hidden" readonly class="form-control" style="height:50px;" name="project_id"  placeholder="Price" required>

                                      <button class="btn btn-warning" id="update_lead_contractinvestment" type="button">Save</button>

                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                   </div>

                            </form>

                          </div>

                          

                    </div>

                  </div>

                </div>

            <!-- end of Author Payment modal -->



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

                                      <table class="table table-bordered" id="" width="100%" cellspacing="0">

                                        <thead>

                                          <tr>

                                            <th>Project ID</th>

                                            <th>Package Name</th>

                                            <th>Author Name</th>

                                            <th>Book Title</th>

                                            <th>Email Address</th>

                                            <th>Contact #</th>

                                            <th>Area Code</th>

                                            <th>Price</th>

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
                                        <div class="alert alert-success"><p></p></div>
                                        <input type="hidden" readonly class="form-control" name="project_id" placeholder="Project ID" required="required">
                                        <input type="hidden" readonly class="form-control" name="author_name" placeholder="Author Name" required="required">
                                        <label for="validationCustom05">Add Remark</label>
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
                <div class="modal fade" id="viewleadremarkhistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
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
                                            <th>From User</th>
                                            <th>User Type</th>
                                            <th>Remark</th>
                                            <th>Date Remark</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewleadremarkhistory">

                                        </tbody>
                                      </table>
                              </div>
                            </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

            <!-- end of Remark modal -->



             <!-- The History Leas  Remark-->

                <div class="modal fade" id="viewleadremarkhistorymodal">

                  <div class="modal-dialog">

                    <div class="modal-content">

                    

                      <!-- Modal Header -->

                           <div class="modal-header">

                            <h4 class="modal-title">Remark History </h4> 

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                                <div class="table-responsive">

                                      <table class="table table-bordered" id="historyremarkleadtable" width="100%" cellspacing="0">

                                        <thead>

                                          <tr>

                                            <th>From User</th>

                                            <th>User Type</th>

                                            <th>Remark</th>

                                            <th>Date Remark</th>

                                          </tr>

                                        </thead>

                                        <tbody class="viewleadremarkhistory">



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

     var userlogin = "<?=isset($this->session->userdata['userlogin']) ? 1: 0 ;?>"
     var user_type = "<?=$this->session->userdata['userlogin']['usertype'];?>";
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

    <script src="<?php echo base_url('js/croppie.js');?>"></script>
    <script src="<?php echo base_url('js/jquery.idle.js');?>"></script>
    <script src="<?php echo base_url('js/html2canvas.min.js');?>"></script>


     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>
     <script src="<?php echo base_url('js/notification.js');?>"></script>



 <script>  

 function setindex_prefix(index_assigned)
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
            
          return "PROJ"+ new_index_assigned;
    }

    $('#datatableleadcheck_agent').DataTable({
                 "processing": true, //Feature control the processing indicator.
                 "serverSide": true, //Feature control DataTables' server-side processing mode.

              // Load data for the table's content from an Ajax source
                  "ajax": {

                      "url": base_url +  "dashboard/check_lead_admin_limit",
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
                                      return setindex_prefix(data);                          
                                    }
                         },
                     { data: 'author_name' },
                       { data: null,
                      "render" : function( data, type, row, full ) {
                                  return row.firstname +' '+ row.lastname;                          
                              }
                       },
                        { data: 'lead_date_agent_assign',
                      "render" : function( data, type, row, full ) {
                                  var lead_date_agent_assign = data == '0000-00-00 00:00:00'? ' Not Yet': new Date(data).toLocaleDateString('en-GB');
                                  return lead_date_agent_assign;                          
                              }
                       },
                       { data: 'date_create',
                      "render" : function( data, type, row, full ) {
                                  var date_create = data == null ? '': new Date(data).toLocaleDateString('en-GB');
                                  return date_create;                          
                              }
                       },
                     ]
                   });


     // $.ajax({
         //      url:   base_url +  "dashboard/load_check_lead",       
         //      method: 'POST',
         //      dataType: 'json',
         //      success: function (data) {
         //           var load_data = []
         //          for (var i = 0; i < data.length; i++) {
         //               load_data.push({
         //                      'Project ID': setindex_prefix(data[i].project_id)
         //                  })      
         //             }
         //    $('#leaddataTablefixed').DataTable( {
         //                data: load_data,
         //                paging:false,
         //                deferRender:    true,
         //                scrollY:        500,
         //                scrollCollapse: true,
         //                scroller:       true,
         //                "columns": [{
         //                   "data": "Project ID"
         //                  }]
         //                 });
         //            }
         //  });


</script>






  </body>

</html>

