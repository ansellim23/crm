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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/disablehighlightning.css');?>">

    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
        #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}0

      table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
      #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
      .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}
      .inline-block{ display: inline-block;}


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
            
            <div class="col-md-12 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Sales</span>
              <div class="count total_sales">$ 0.00</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> From on this Month</span>
            </div>
          </div>
        </div>
          <!-- /top tiles -->
            <form id="sales_lead_agent_form">
              <div class="col-sm-3 inline-block">
                <label for="validationCustom03">Date</label>
                  <div id="reportrange" style="background: #fff; cursor: pointer; padding: 10px 15px; border: 1px solid #ccc;" >
                      <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                      <span></span> <b class="caret"></b>
                     </div><!-- DEnd ate Picker Input -->            
              </div>
        <!--     <div class="col-sm-3 inline-block">
                <label for="validationCustom03">User</label>
                     <select class="form-control year" name="agent_type">
                       <option selected value="">Please Select an User in Charge</option>
                         <?php 
                             if ($user_agents > 0){
                                 foreach ($user_agents as $user_agent){
                                   echo "<option value='".ucfirst($user_agent['payment_usercharge'])."'>".ucfirst($user_agent['payment_usercharge']) ."</option>";
                               }
                            } 
                          ?>
                      </select>             
                  </div> -->
            </form>

             <br>

  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>List of Leads
<!--  -->
  </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="salesdataTables" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Lead ID</th>
                  <th>Package Name</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th>Lead Source</th>
                  <th class="sumamount">Total Amount Paid</th>
                  <th>Date Paid</th>
<!--                   <th>Collection Status And Date</th>
                  <th>Approval Status And Date</th>
                  <th>Payment Status and Date</th>
                  <th>User Charge</th>
                  <th>UserType</th>
                  <th>Remark History</th> -->
                  <th style='display:none;'></th>
                  <th style='display:none;'></th>
                </tr>
              </thead>
              <tbody class="viewleadactivities">
              <?php
                  $get_count_payment =0;
                  $replace_comma = "";
                  if ($sales_lead > 0){
                       foreach ($sales_lead as $sale_lead){
                         echo "<tr>";
                               echo "<td id='project_id'>".modules::run("dashboard/setindex_Lead_ID",$sale_lead['project_id'])."</td>"; 
                               echo "<td>".$sale_lead['product_name']."</td>";
                               echo "<td><a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='".$sale_lead['author_name']."' data-project_id=".$sale_lead['project_id']." data-userid=".$this->session->userdata['userlogin']['user_id']."</a>".$sale_lead['author_name']."</td>";
                               echo "<td>".$sale_lead['book_title']."</td>";
                               echo "<td>".$sale_lead['email_address']."</td>";
                               echo "<td>".$sale_lead['contact_number']."</td>";
                               echo "<td>".$sale_lead['lead_owner']."</td>";
                               echo "<td class='amount_paid'>$ ".number_format(str_replace(",","",$sale_lead['total']),2,".",",")."</td>";
                                 echo "<td>".date("Y-m-d", strtotime($sale_lead['date_paid'])). "</td>";

                               // echo "<td >".$sale_lead['collect_payment_status']. ' - '. date("d/m/Y", strtotime($sale_lead['collection_date']))."</td>";
                               // echo "<td><span class='approval_status'>".$sale_lead['approval_status']. '</span>- '. date("d/m/Y", strtotime($sale_lead['date_approve']))."</td>";
                               // echo "<td><span class='status_payment'>".$sale_lead['status_payment']. '</span> - '. date("d/m/Y", strtotime($sale_lead['date_paid']))."</td>";
                               // echo "<td>".ucfirst($sale_lead['payment_usercharge']). "</td>";
                               // echo "<td>".$sale_lead['payment_usertype']. "</td>";
                               // echo "<td><button type='button' class='btn btn-outline-info btn-sm viewleadremark_history1' data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-project_id='".$sale_lead['project_id']."'>View</a></td>";
                               echo "<td style='display:none'>".date("Y-m-d", strtotime($sale_lead['date_paid'])). "</td>";
                               echo "<td style='display:none'>".date("Y", strtotime($sale_lead['date_paid'])). "</td>";
                          echo "</tr>";
                     }
                  }  
                  ?>
              </tbody>
            </table>

            <div id="sales" style="float:right; margin-right: 220px; float: right; font-size: 20px;"><b>Total Sales</b>  <span class="total_sales" style></span>
          </div>
        </div>
      </div>
    </div>
          <br />

         
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
                                            <th>Amount Paid</th>
                                            <th>Remark History</th>
                                            
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
                                        <input type="hidden" readonly class="form-control" name="parent_id" placeholder="Parent ID" required="required">
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

    <script src="<?php echo base_url('js/croppie.js');?>"></script>
    <script src="<?php echo base_url('js/jquery.idle.js');?>"></script>
    <script src="<?php echo base_url('js/html2canvas.min.js');?>"></script>


     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>
     <script src="<?php echo base_url('js/notification.js');?>"></script>

 <script>  
var map = {};
$('#sales_lead_agent_form select option').each(function () {
    if (map[this.value]) {
        $(this).remove()
    }
    map[this.value] = true;
})

  var otable = $("#salesdataTables").DataTable({
   "initComplete": function (settings, json) {
     var api = this.api();
     CalculateTableSummary(this);
    },
    "drawCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;  
        CalculateTableSummary(this);
        return ;   
      }
});
$('#sales_lead_agent_form [name="agent_type"]').on('change', function () {
       otable.columns(10).search($(this).val()).draw() ;

});
function CalculateTableSummary(otable) {
    try {

        var intVal = function (i) {
            return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
        };

        var api = otable.api();

            // Total over all pages
         api.columns(".sumamount").each(function (index) {
         var column = api.column(index,{page:'current'});

           var sum = column 
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


        $('#sales .total_sales, .tile_stats_count .total_sales').text('$ ' + sum.toLocaleString("en")+'.00');
      });
  }
  catch (e) {
        console.log('Error in CalculateTableSummary');
        console.log(e)
    }
}


  $(function () {
   var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);


  $('#reportrange').on('apply.daterangepicker', function(ev, picker) {

   var start = picker.startDate.format('YYYY-MM-DD');
   var end = picker.endDate.format('YYYY-MM-DD');
    
  

  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = new Date(start);
      var max = new Date(end);
      var startDate = new Date(data[9]);
      console.log(startDate +  " <= " + max  + " --- "  + (startDate <= max));
      
      if (min == null && max == null) {
        return true;
      }
      if (min == null && startDate <= max) {
        return true;
      }
      if (max == null && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      return false;
    }
  );
  otable.draw();
    $.fn.dataTable.ext.search.pop();

  });
});


</script>
  </body>
</html>
