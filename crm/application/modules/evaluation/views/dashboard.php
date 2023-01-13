<!DOCTYPE html>
<?php  date_default_timezone_set('Asia/Manila');?>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/disablehighlightning.css');?>">

    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
        #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}0

      table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
      #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
      .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}
      .inline-block{ display: inline-block;}


    </style>
        <script type="text/javascript">
  window.onload = function () {
    var current_sales = <?=$current_quota['total_amount'] != NULL ? number_format(str_replace(",","",$current_quota['total_amount']),2,".",",") :  '0.00';?>;

    var lineChart = new CanvasJS.Chart("lineChart", {

      title:{
      text: "Sales Performance" 
      },
      axisX: {
        valueFormatString: "MMM",
        interval:1,
        intervalType: "month"
      },
       data: [
      {
        type: "line",

        dataPoints: [
        { x: new Date(2022, 00, 1), y: current_sales },
        { x: new Date(2022, 01, 1), y: 0 },
        { x: new Date(2022, 02, 1), y: 0 },
        { x: new Date(2022, 03, 1), y: 0 },
        { x: new Date(2022, 04, 1), y: 0 },
        { x: new Date(2022, 05, 1), y: 0 },
        { x: new Date(2022, 06, 1), y: 0 },
        { x: new Date(2022, 07, 1), y: 0 },
        { x: new Date(2022, 08, 1), y: 0 },
        { x: new Date(2022, 09, 1), y: 0 },
        { x: new Date(2022, 10, 1), y: 0 },
        { x: new Date(2022, 11, 1), y: 0 }
        ]
    }
    // ,{
    //     type: "line",

    //     dataPoints: [
    //     { x: new Date(2022, 00, 1), y: 0 },
    //     { x: new Date(2022, 01, 1), y: 0 },
    //     { x: new Date(2022, 02, 1), y: 0 },
    //     { x: new Date(2022, 03, 1), y: 0 },
    //     { x: new Date(2022, 04, 1), y: 0 },
    //     { x: new Date(2022, 05, 1), y: 0 },
    //     { x: new Date(2022, 06, 1), y: 0 },
    //     { x: new Date(2022, 07, 1), y: 0 },
    //     { x: new Date(2022, 08, 1), y: 0 },
    //     { x: new Date(2022, 09, 1), y: 0 },
    //     { x: new Date(2022, 10, 1), y: 0 },
    //     { x: new Date(2022, 11, 1), y: 0 }
    //     ]
    //   }
      ]
      });

    lineChart.render();

      var call_log = <?=$current_call_logs;?>;
      
      var current_activities = <?=$current_activities;?>;

      var current_pipe = <?=$current_pipes;?>;

      var barChart = new CanvasJS.Chart("barChart", {

          title:{
        text: "Your Stats"              
      },

      data: [  //array of dataSeries     
      { //dataSeries - first quarter
   /*** Change type "column" to "bar", "area", "line" or "pie"***/        
       type: "column",
       name: "Qouta",
       dataPoints: [
       { label: "Target", y: 50 },
       { label: "Target", y: 50 },
       { label: "Target", y: 3 }
       ]
     },
     { //dataSeries - second quarter

      type: "column",
      name: "Current",                
      dataPoints: [
      { label: "Call log", y: call_log },
      { label: "Lead Activity", y: current_activities },
      { label: "Pipe", y: current_pipe }
      ]
    }
    ]
  });

    barChart.render();
  }
  </script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  </head>

<!--     <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}
    </style>
  </head> -->

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
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            
          </div>
        </div>

      <!-- Performance tracker tiles -->
        <div class="card mb-3">
         
          <div class="card-header">
         
            <i class="fa fa-eye"></i> PERFORMANCE TRACKER
            

            
          <span style="float: right;" data-toggle="tooltip" data-placement="bottom" title="**** POINTING SYSTEM ****  30% commission deduction monthly if reaches 2.5 points (late: 0.5, absent: 1, overbreak/overlunch: 0.5, fail to logout: 0.5)" id="total_points">PENALTY WARNING
            <? if($penalties > 0 ){
              foreach($penalties as $penalty){
                if($penalty['warning_level'] == '')
                  {echo "<i class='fa fa-flag fa-lg' style='color:green'></i>";}
                else if($penalty['warning_level'] == 'Low')
                  {echo "<i class='fa fa-flag fa-lg' style='color:green'></i>";}
                else if($penalty['warning_level'] == 'Mid')
                  {echo "<i class='fa fa-flag fa-lg' style='color:orange'></i>";}
                else if($penalty['warning_level'] == 'High')
                  {echo "<i class='fa fa-flag fa-lg' style='color:red'></i>";}

              }
            }?>
            &nbsp Points:<?=$total_points;?></span>       

           </br>
           <?
            if($attendance_user['attendance_id'] != NULL){ ?>
            <div class="btn-group" style="float: right;">&nbsp
              <button type="button" class="btn btn-primary btn-sm view_attendance_detail1" data-toggle="modal" data-target="#dutytimemodal" data-backdrop="static" data-keyboard="false" data-attendance_id="<?=$attendance_user['attendance_id']; ?>" data-duty_log="<?=$attendance_user['duty_log']; ?>">Time in/out</button> 
            </div>


          <?if($attendance_user['status_log'] == "Break In"){
             $user_time  = date("Y-m-d H:i:s", strtotime($attendance_user['time_log']) + 1800);
            }
            else if($attendance_user['status_log'] == "Lunch Start"){
             $user_time  = date("Y-m-d H:i:s", strtotime($attendance_user['time_log']) + 3600);
             echo "<input type='hidden' value='".$user_time."' id='time_in'>";
            }
            else{
            $user_time  = date("Y-m-d H:i:s");
            }

           echo "<input type='hidden' value='".$user_time."' id='time_in'>";
           echo "<input type='hidden' value='".$attendance_user['status_log']."' id='statuslog'>";
           echo "<input type='hidden' value='".$attendance_user['time_log']."' id='time_log'>";
           echo "<span style='float: right;' class='mt-2' id='attendance_timer'></span>&nbsp";
}
            ?>
          </div>



          <div class="card-body">
         

              <div class="content-wrapper">
                <div class="row">
                  <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title"></h4>
                        <table class="table">
                          <tr class="table-light">
                            <td>Time in : <?=$attendance_user['time_in'] != NULL ?  date('h:i:s a', strtotime($attendance_user['time_in'])) : "00:00:00";?></td>
                            <td>Call logs: <?=$current_call_logs;?>/50</td>
                            <td>Pipes: <?=$current_pipes;?>/2</td>
                            <td>Current Qouta:$ <?=$current_quota['total_amount'] != NULL ? number_format(str_replace(",","",$current_quota['total_amount']),2,".",",") :  '0.00';?> </td>
                          </tr>
                          <tr class="table-light">
                            <td>Over Break : <?=$attendance_user['excess_break'] != NULL ?  $attendance_user['excess_break'] : "00:00:00";?></td>

                            <td>Prev. Call logs: <?=$prev_call_logs;?>/50</td>
                            <td>Prev. Pipes: <?=$prev_pipes;?>/2</td>
                            <td>Last Calendar Qouta:$ <?=$prev_quota['total_amount'] != NULL ? number_format(str_replace(",","",$prev_quota['total_amount']),2,".",",") :  '0.00';?> </td>
                          </tr>
                          <tr class="table-light">
                            <td>Over Lunch : <?=$attendance_user['excess_lunch'] != NULL ?  $attendance_user['excess_lunch'] : "00:00:00";?></td>
                            <td><a href="<?=site_url('dashboard/activities');?>" style="color: black;">Lead Activities: <?=$current_activities;?></a></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr class="table-light">
                            <td>Time out : <?=$attendance_user['time_out'] != NULL ?  date('h:i:s a', strtotime($attendance_user['time_out'])) : "00:00:00";?></td>
                            <td><a href="<?=site_url('dashboard/activities');?>" style="color: black;">Prev. Lead Activities: <?=$prev_activities;?> </a></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div id="lineChart" style="height: 200px; width: 100%;"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div id="barChart" style="height: 200px; width: 100%;"></div>
                      </div>
                    </div>
                  </div>
                </div>            
              </div>

        </div>

      </div>
 <!-- End of Performance tracker tiles -->
 
      
<!-- Commission dashboard tiles -->
   <form id="sales_total_form">
                     <div class="col-sm-3 inline-block">
                        <label for="validationCustom03">Date</label>
                          <div id="sales_report_range" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                              <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                              <span></span> <b class="caret"></b>
                             </div><!-- DEnd ate Picker Input -->            
                      </div>
              
                          <input type="hidden" class="form-control" name="from_date" placeholder="from_date" required="required">
                          <input type="hidden" class="form-control" name="to_date" placeholder="to_date" required="required">
                 </form>
                 <br>
        <div class="card mb-3">
         
          <div class="card-header">
         
            <i class="fa fa-dollar"></i> COMMISSION
         
          </div>

          <div class="card-body">

              <div class="content-wrapper">
                <div class="row">
                  <div class="col-lg-2 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h7 class="card-title">Sales Amount</h7>
                        <h1 style="color: black;" ><i class="fa fa-dollar"></i><b class="total_sales"><?=number_format($current_sales,2,".",",");?></b></h1>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-2 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h7 class="card-title">(Threshold)</h7>

                        <h1 style="color: black;"><b>$500.00</b></h1>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-2 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h7 class="card-title">Commission Rate</h7>
                        <input type="hidden" id="commission-rate" value="20">
                        <h1 style="color: black;"><b class="commission_rate"><?=$this->session->userdata['userlogin']['commission_rate']?></b><i class="fa fa-percent"></i></h1>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-2 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h7 class="card-title">Total Commission
                        <h1 style="color: black;"><b class="total_commission"><?echo "₱" . $current_sales * 0.2 . ".00";?></b></h1>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-2 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h7 class="card-title deduction_detail"  data-toggle='modal' data-target='#deductionmodal' data-backdrop='static' data-keyboard='false'>Total Deductions</h7>
                        <h1 style="color: black;"><b class="commission_deduction"><?echo '₱'.($current_deduction != "" ? $current_deduction .'.00' : '0.00'); ?></b></h1>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-2 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h7 class="card-title">Estimated Commission Receivable</h7>
                        <h1 style="color: black;"><b class="commission_receivable"><?echo '₱'.($commission_receivable > 0 ? $commission_receivable .'.00' : '0.00'); ?></b></h1>
                      </div>
                    </div>
                  </div>

                </div>            
              </div>

        </div>

      </div>
<!-- End of Commission dashboard tiles -->




<!-- /top tiles -->
     <div class="card mb-3">
         <div class="card-header">
            <i class="fa fa-table"></i>List of Leads
         </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="leaddataTableagents" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Lead ID</th>
                  <th>Package Name</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th>Income Level</th>
                  <th>Price</th>
                  <th>Balance</th>
                  <th>Status and Date</th>
                  <th>Date Assigned</th>
                  <th>Contract Status</th>
                  <th>Remark History</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $get_count_payment =0;
                  $replace_comma = "";
                  if ($leads > 0){
                      foreach ($leads as $lead){
                         
                         echo "<tr>";
                              echo "<td>".modules::run("dashboard/setindex_Lead_ID",$lead['project_id'])."</td>"; 
                              echo "<td>".$lead['product_name']."</td>";
                              echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id=".$lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$lead['author_name']."</td>";
                              echo "<td>".$lead['book_title']."</td>";
                              echo "<td>".$lead['email_address']."</td>";
                              echo "<td>".$lead['contact_number']."</td>";
                              echo "<td>".$lead['income_level']."</td>";
                              echo "<td>$ ".$lead['price']."</td>";
                              echo "<td>$ ".$lead['remaining_balance']."</td>";
                              // echo "<td>$ ".number_format(str_replace(",","",$lead['price']),2,".",",")."</td>";
                              // echo "<td>$ ".number_format(str_replace(",","",$lead['remaining_balance']),2,".",",")."</td>";
                               if($lead['date_updated'] == NULL){
                                  echo "<td>".$lead['status'].  "</td>";

                               } 
                               else{
                                 echo "<td>".$lead['status']. ' - '. date("d/m/Y", strtotime($lead['date_updated'])).  "</td>";

                               }
                               if($lead['lead_date_agent_assign'] == NULL){
                                  echo "<td></td>";
                               } 
                               else{
                                  echo "<td>".date("d/m/Y", strtotime($lead['lead_date_agent_assign']))."</td>";

                               }
                              echo "<td>".$lead['contractual_status']."</td>";

                              echo "<td><button type='button' class='btn btn-outline-info btn-sm viewleadremark_history1' data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$lead['author_name']."' data-project_id='".$lead['project_id']."'>View</a></td>";
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

<!-- The History Lead  Remark-->
                <div class="modal fade" id="viewleadhistorymodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Your Lead History </h4> 
                           <a  class="btn btn-success btn-block viewleadremark_history" style="width: 220px; margin-left:50px; color:#ffffff;" data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name=""  data-project_id="">Lead Communications</a>
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
                                        <select class="form-control" id="pre_suggestion">
                                          <option>Please Select</option>
                                          <option value="Sent Voicemail">Sent Voicemail</option>
                                          <option value="Not in Service">Not in Service</option>
                                          <option value="Mailbox Full">Mailbox Full</option>
                                          <option value="No Voicemail Set">No Voicemail Set</option>
                                          <option value="Wrong Number">Wrong Number</option>
                                          <option value="Inactive Email">Inactive Email</option>
                                          <option value="Sent Email">Sent Email</option>
                                          <option value="Dropped Call">Dropped Call</option>
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
                      <!-- end of Remark modal -->

<!-- Duty Modal -->

                <div class="modal fade" id="dutytimemodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Employee Time Log</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                             <form id="update_attendance_form">
                               <div class="alert alert-success"><p></p></div>
                                <div class="form-group">
                                  <select class="form-control status_log" name="status_log">
                                      <option value="">Please Select A Log</option>
                                      <option value="Time In">Time In</option>
                                      <option value="Break In">Break In</option>
                                      <option value="Break Out">Break Out</option>
                                      <option value="Lunch Start">Lunch Start</option>
                                      <option value="Lunch End">Lunch End</option>
                                      <option value="Time Out">Time Out</option>
                                    </select>
                               </div>
                                <input type="hidden" class="form-control" id="attendance_id" name="attendance_id"/>
                                <input type="hidden" class="form-control" id="duty_log" name="duty_log"/>

                                  <div class="modal-footer">

                                      <button type="button" id="update_time_log" class="btn btn-success">Update</button>

                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                                </form>
                          </div>
                          
                    </div>
                  </div>
                </div>
            

<!-- Deduction Modal -->

                <div class="modal fade" id="deductionmodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Your Deductions</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                               <div class="alert alert-success"><p></p></div>
                                <div class="table-responsive" style="height:350px;">

                                 <table class="table table-bordered" id="deductiontable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>Reason</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                          </tr>
                                        </thead>
                                        <tbody class="viewdeduction">

                                        </tbody>
                                      </table>
                                  
                               </div>
                                <input type="hidden" class="form-control" id="attendance_id" readonly name="attendance_id"/>
                                <input type="hidden" class="form-control" id="duty_log" readonly name="duty_log"/>

                                  <div class="modal-footer">

                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                          </div>
                          
                    </div>
                  </div>
                </div>





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

    <script src="<?php echo base_url('js/croppie.js');?>"></script>
    <script src="<?php echo base_url('js/jquery.idle.js');?>"></script>
    <!-- <script src="<?php echo base_url('js/html2canvas.min.js');?>"></script> -->



     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/idle-timer.js');?>"></script>
     <script src="<?php echo base_url('js/validateidle.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>
     <script src="<?php echo base_url('js/notification.js');?>"></script>
     <script src="<?php echo base_url('js/validateattendance.js');?>"></script>
     <script src="<?php echo base_url('js/dashboardattendance.js');?>"></script>


 <script>  
 
 $('#leaddataTable').DataTable();
$(function () {
    var start = new Date();
    //default is based on sales calendar
    var start = moment().startOf('month').add(5, 'days');
    var end = moment().endOf('month').add(7, 'days');

    var get_user_id = 0;
    $("#sales_total_form input[name='from_date']").val(start.format('YYYY-MM-DD'));
    $("#sales_total_form input[name='end_date']").val(end.format('YYYY-MM-DD'));
    function cb(start, end) {
        $('#sales_report_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $("#sales_total_form input[name='from_date']").val(start.format('YYYY-MM-DD'));
        $("#sales_total_form input[name='end_date']").val(end.format('YYYY-MM-DD'));
    }

    // $('#sales_report_range').daterangepicker({
    //     startDate: start,
    //     endDate: end,
    //     ranges: {
    //        'Today': [moment(), moment()],
    //        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    //        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
    //        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
    //        'This Month': [moment().startOf('month'), moment().endOf('month')],
    //        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    //     }
    // }, cb);

    // cb(start, end);


     //  $('#sales_report_range').on('apply.daterangepicker', function(ev, picker) {

     //     var start = picker.startDate.format('YYYY-MM-DD');
     //     var end = picker.endDate.format('YYYY-MM-DD');
     //     $("#sales_total_form input[name='from_date']").val(start);
     //     $("#sales_total_form input[name='to_date']").val(end);
     //     $.ajax({
     //               type: "POST",
     //               url: base_url +  "dashboard/select_total_sales",
     //               dataType: 'json',
     //               data: $("#sales_total_form").serialize(),
     //               success: function(data) {

     //                 if (data == null){
     //                       $(".total_sales").text('0.00');

     //                 }
     //                 else{
     //                  //alert(data.d);
     //                  var commission_rate = document.getElementById("commission-rate").value;
     //                  var total_commission = commission_rate / 100 * data.total_amount * 46;

     //                  $(".total_sales").text(parseFloat(data.total_amount.replace(",","")).toLocaleString("en")+'.00');                     
     //                  $(".total_commission").text('₱'+total_commission+'.00');
     //                  $(".commission_receivable").text('₱'+(total_commission-500-data.deduction)+'.00');
     //                  $(".commission_deduction").text('₱'+ data.deduction + '.00');

     //                 }
                  
     //               },
     //          });

     // });
  });


$(function () {

    // INITIALIZE DATEPICKER PLUGIN
    var dateToday = new Date(); 
    $('#lead_form .datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy",
        startDate: dateToday,
    }).datepicker("setDate", dateToday);
    
})

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

    $('#leaddataTableagents').DataTable( {
       "oSearch": {"sSearch": ""},
        "pageLength": 100,
        "scrollY": 500,
        "scrollX": true,
        "autoWidth": false,
        columnDefs: [
            { width: '10%', targets: 2,
              width: '15%', targets: 3
            }

        ],
         fixedColumns: true
     }) ;   


    //     let stats_label = <?php $stats_label = array("Call logs", "Pipes", "Qouta"); echo json_encode($stats_label); ?>;
    //     var  test = <?php echo json_encode($over_all_quota); ?>;
    // //Line Chart
    // new Chart(document.getElementById("lineChart"), {
    //   type: 'line',
    //   data: {
    //     labels: ['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov', 'Dec'],
    //     datasets: [{ 
    //         data: [0,0,0,0,0,0,0,0,0],
    //         label:  new Date().getFullYear(),
    //         borderColor: "#3e95cd",
    //         fill: false
    //       }, { 
    //         data: [0,0,0,0,0,0,0,0,0,0,0,0],
    //         label: new Date().getFullYear() - 1,
    //         borderColor: "#FFA500",
    //         fill: false
    //       }
    //     ]
    //   },
    //   options: {
    //   title: {
    //     display: true,
    //     text: 'Sales Performance'
    //     }
    //   }
    // });


    // // Grouped chart
    // var call_log = <?=$current_call_logs;?>;
    // var current_pipe = <?=$current_pipes;?>;
    // var current_qouta = <?=$current_quota['total_amount'] != NULL ? number_format(str_replace(",","",$current_quota['total_amount']),2,".",",") :  '0.00';?>;


    // new Chart(document.getElementById("bar-chart-grouped"), {
    //     type: 'bar',
    //     data: {
    //       labels: stats_label,
    //       datasets: [
    //         {
    //           label: "Qouta",
    //           backgroundColor: "#3e95cd",
    //           data: [50,5,4]
    //         }, {
    //           label: "Current",
    //           backgroundColor: "#FFA500",
    //           data: [call_log,current_pipe,current_qouta]
    //         }
    //       ]
    //     },
    //     options: {
    //       title: {
    //         display: true,
    //         text: 'Your Stats'
    //       }
    //     }
    // });    
</script>


  </body>
</html>