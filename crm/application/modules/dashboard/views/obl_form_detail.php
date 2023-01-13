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
    <!--<link href="<?php echo base_url('css/forms.css');?>" rel="stylesheet">-->
    <link href="<?php echo base_url('datepicker/css/bootstrap-datepicker.css');?>" rel="stylesheet">

    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}


    </style>
    <style type="text/css">
  select {
    border: none;
    background: transparent;
    font-size: 11.1px;

}
</style>
<style type="text/css">
  .fab {
   width: 70px;
   height: 70px;
   background-color: red;
   border-radius: 50%;
   box-shadow: 0 6px 10px 0 #666;
   transition: all 0.1s ease-in-out;
 
 
   color: white;
   text-align: center;
   line-height: 70px;
 
   position: fixed;
   right: 50px;
   bottom: 50px;
}
 
.fab:hover {
   box-shadow: 0 6px 14px 0 #666;
   transform: scale(1.05);
}
</style>
<!--official business leave style-->
<style>
	.page-content{
		text-align: center;
		margin: 0 auto;
		width: 50%;
		background: url('<?php echo base_url().'images/FormBackground.png';?>') center no-repeat;
		background-size: 70%;
		font-family: calibri;
		font-size: 16px;
		color: #000;
		}
	 table, th, td {border: 1px solid black;border-collapse: collapse;text-align: left;height: 30px;}
	 h3{font-size: 20px;font-weight: bold;}
	 .imglogo img{width: 35%;margin-top: 10px;}
	 .pdate{text-align: right;margin-bottom: 5px;}
	 .divp{display: inline-block;margin: 0px 50px 0 0;width: 200px;}
	 .divp p{margin: 0;}
   .divp input{text-align: center;}
	 .approval{margin-left: 30px;margin-bottom: 10px;margin-top: -25px;}
   .divp .borderbot{border-top: 1px solid #000;}
	 .trans{height: 90px;}
	 .purpose{height: 105px;}
	 .remark{height: 115px;}
	 input[type="text"],input[type="date"],input[type="number"]{border: none;outline: none;background: transparent;}
	 .input{width: 100%;}
	 .trans span, .purpose span {font-style: italic;}
   textarea{width: 100%;border:none;background: transparent;resize: none;outline: none;}
  /* responsive*/
  @media only screen and (max-width: 1846px){
    .divp {margin: 30px 50px 0 0;}
    .approval{margin-top: 0}
  }
  @media only screen and (max-width: 1340px){
   .divp {margin: 30px 50px 0 0;}
   .approval{margin-top: 0}
   .imglogo img{width: 49%;}
  }
  @media only screen and (max-width: 970px){
    .imglogo img{width: 60%}
  }
  @media only screen and (max-width: 734px){
    .imglogo img{width: 75%}
    table{width: 100% !important;}
   .table-div2{width: 100%;overflow-x: scroll;}
  }
  @media only screen and (max-width: 600px){
    .page-content{background: none}
    .imglogo img{width: 80%}
  }
  @media only screen and (max-width: 500px){
    .imglogo img{width: 90%}
    .approval{margin-left: 15px}
  }
  @media only screen and (max-width: 375px){
    .imglogo img{width: 100%}
    .approval{margin-left: 0}
  }
</style>
<style type="text/css">
<!--
span.cls_002{font-family:"Calibri Bold",serif;font-size:11.1px;color:rgb(244,244,244);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_002{font-family:"Calibri Bold",serif;font-size:11.1px;color:rgb(244,244,244);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_003{font-family:"Calibri Bold",serif;font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_003{font-family:"Calibri Bold",serif;font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_004{font-family:"Calibri",serif;font-size:11.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_004{font-family:"Calibri",serif;font-size:11.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_005{font-family:"Calibri",serif;font-size:11.1px;color:rgb(255,255,255);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_005{font-family:"Calibri",serif;font-size:11.1px;color:rgb(255,255,255);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_006{font-family:Arial,serif;font-size:10.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_006{font-family:Arial,serif;font-size:10.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
-->
</style>
  </head>

  <body class="nav-md">
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
              <div class="profile_info">
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->

            <?php include 'sidebar_agent.php'; ?>

            <!-- /sidebar menu -->

        <!-- page content -->
        <div class="right_col" role="main" style=" height: 100px; overflow-y: scroll;">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
          </div>
        </div>
          <!-- /top tiles -->
  <div class="card mb-3">
  	<!-- page content -->
    <form id="addoblform" method="post" enctype="multipart/form-data">
      <div class="alert alert-success"><p></p></div>
    <div class="page-content">
	<div class="imglogo">
		<img src="<?php echo base_url().'images/FormLogo.png';?>" alt="logo">
	</div>

	<h3>Official Business Leave Request Form</h3>
  <?php if ($forms > 0 ){
        foreach ($forms as $form) {?>
	<p class="pdate">Date:<input type="text" name="date" value=" <? echo $form['date_create'];?>" readonly></p>
  <div class="table-div2">
	<table style="width:100%">
  		<tr>
    		<td colspan="2">Name:<input type="text" name="name" value=" <? echo $form['firstname'] . "  " . $form['lastname'];?>" readonly><input type="hidden" name="userid" value="<?echo $form['user_id'];?>"></td>
    		<td>Department/Position:<input type="text" name="position" value=" <?php echo $form['usertype'];?>" readonly></td>
    	</tr>
  		<tr>
    		<td colspan="3">Inclusive Travel date:<input type="text" name="inclusive-date" value="<? echo $form['inclusive_from'] . " " . $form['inclusive_to'];?>"></td>
    	</tr>
    	<tr>
    		<td>Type of Travel:</td>
        <div class="travel-type">
    		<td><input type="checkbox" name="typetravel" value="<?echo $form['travel_type'];?>" <? echo ($form['travel_type'] == 'domestic' ? 'checked' :'');?>>Domestic Travel</td>
    		<td><input type="checkbox" name="typetravel" value="<?echo $form['travel_type'];?>" <? echo ($form['travel_type'] == 'international' ? 'checked' :'');?>>International Travel</td>
        </div>
    	</tr>
    	<tr>
    		<td colspan="2">Departing City/Country:<input type="text" name="departingcity" value="<? echo $form['departing_city'];?>"></td>
    		<td>Arriving City/Country:<input type="text" name="arrivingcity" value="<? echo $form['arriving_city'];?>"></td>
    	</tr>
    	<tr>
    		<td colspan="3" class="trans" valign="top">Transportation Details: <span>(please attach a copy of the itinerary)</span>
          <!-- <input type="file" id="myFile" name="file" multiple></td> -->
          <div style="border: 1px solid black; height: 100px">
              <a href="<?php echo base_url("upload_forms/".$form['transportation_details']."");?>" download><?php echo $form['transportation_details'];?></a>
          </div> 
    	</tr>
    	<tr>
    		<td colspan="3">Accompanied by:<input type="text" name="accompaniedby" value="<? echo $form['accompanied'];?>"></td>	
    	</tr>
    	<tr>
    		<td colspan="3" class="purpose" valign="top">Purpose of Travel: <span>(please attach a copy of the itinerary)</span>
        <!-- <input type="file" id="myFile" name="purpose" multiple></td> -->
        <div style="border: 1px solid black; height: 100px">
            <a href="<?php echo base_url("upload_forms/".$form['reason']."");?>" download><?php echo $form['reason'];?></a>
        </div> 
    	</tr>
    	<tr>
    		<td colspan="3">Estimated Expenses:<input type="number" name="expenses" value="<? echo $form['estimated_expenses'];?>"></td>
    	</tr>
    	<tr>
    		<td colspan="3" class="remark" valign="top">Remarks:<textarea rows="2" cols="99" name="remarks" readonly><? echo $form['travel_remarks'];?></textarea></td>
    	</tr>			
	</table>
  </div>

		<div class="approval">
			<div class="divp">
            <div style="position:relative; top:0">
                <img style='width:150px; height:150px; position:relative; top:120px; left:60px;' src="<?php echo base_url('upload_signatures/'.$form['agent_signature'])?>">
                 <span class="d-block"><?=$form['agent_transaction_code'];?></span>
           </div>
               <input type="text" name="name" value="<?=$form['employee_name'];?>">
            <p class="borderbot">Requested by:</p>
          <p>Employee</p>
        </div>
        <div class="divp">
           <?php if($form['manager_transaction_code'] != ''):?>
            <div style="position:relative; top:0">
                <img style='width:150px; height:150px; position:relative; top:120px; left:60px;' src="<?php echo base_url('upload_signatures/'.$form['manager_signature'])?>">
                 <span class="d-block"><?=$form['manager_transaction_code'];?></span>
           </div>
               <input type="text" name="name" value="<?=$form['manager_name'];?>">
           <?php endif;?>
          <p class="borderbot">Approved by:</p>
          <p>Supervisor/Manager</p>
        </div>
        <div class="divp">
         <?php if($form['hr_signature'] != ''):?>
            <div style="position:relative; top:0">
                <img style='width:150px; height:150px; position:relative; top:120px; left:60px;' src="<?php echo base_url('upload_signatures/'.$form['hr_signature'])?>">
                 <span class="d-block"><?=$form['hr_transaction_code'];?></span>
           </div>
               <input type="text" name="name" value="<?=$form['hr_name'];?>">
          <?php endif;?>
          <p class="borderbot">Noted by:</p>
          <p>Human Resource Department</p>
        </div>
      </div>
    <!-- <div class="buttons">
          <button type="button" class="btn btn-success" id="add_obl">Submit</button>
          <button type="button" class="btn btn-primary" id="add_memo">Print</button> 
          <button type="button" class="btn btn-default" id="add_memo">Download</button>    
      </div> -->
      <?php }
      } ?>
	</div>
	</form>

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
         <!-- Add User -->
         <div class="modal fade" id="addUserModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="adduserform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Add User</h2>
                        <p class="hint-text">Create user account.</p>
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
                                <option value="Author Relation">Author Relation</option>
                                <option value="Agent">Agent</option>
                              </select>
                           </div>
                           <div class="form-group">
                             <label class="form-check-label"><input type="checkbox" name="agreement" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                           </div>
                        <div class="form-group">
                                <button type="button" id="add_user" class="btn btn-success btn-lg btn-block">Add</button>
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
                                <option value="Author Relation">Author Relation</option>
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
   <!-- End Edit User -->

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





     <script>var base_url = "<?php echo base_url(); ?>";</script>
    <!-- jQuery -->
    <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('datepicker/js/bootstrap-datepicker.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('bootstrap/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('bootstrap/vendors/nprogress/nprogress.js');?>"></script>
    <!-- Chart.js');?> -->
    <script src="<?php echo base_url('bootstrap/vendors/Chart.js/dist/Chart.min.js');?>"></script>
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
    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('js/croppie.js');?>"></script>


     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>
     <script src="<?php echo base_url('js/validateform.js');?>"></script>

 <script>  
 
 $('#leaddataTable').DataTable();
</script>
<script type="text/javascript">
  $(function(){
    $('input[name="inclusive-date"]').daterangepicker({
  autoUpdateInput: false}, (from_date, to_date) => {
  console.log(from_date.toDate(), to_date.toDate());
  $('input[name="inclusive-date"]').val(from_date.format('YYYY/MM/DD') + ' - ' + to_date.format('YYYY/MM/DD'));
  });
});

  $(document).on('click', '.travel-type input[type="checkbox"]', function() {      
    $('.travel-type input[type="checkbox"]').not(this).prop('checked', false);      
});
</script>
  </body>
</html>
