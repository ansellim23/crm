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


<?php if ($penalties > 0){
 foreach ($penalties as $penalty){ ?>
  
<form id="penaltyMatrixform">

<div style="position:absolute;left:50%;margin-left:-420px;top:0px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background01.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:83.04px;top:15px" class="cls_002"><span class="cls_003">Employee Name:</span></div>
<div style="position:absolute;left:502.99px;top:15px" class="cls_002"><span class="cls_003">Position:</span></div>
<div style="position:absolute;left:414.41px;top:115.14px" class="cls_002"><span class="cls_002">PENALTIES</span></div>
<div style="position:absolute;left:502.99px;top:130.86px" class="cls_002"><span class="cls_002">1st</span></div>
<div style="position:absolute;left:588.43px;top:130.86px" class="cls_002"><span class="cls_002">2nd</span></div>
<div style="position:absolute;left:669.10px;top:130.86px" class="cls_002"><span class="cls_002">3rd</span></div>
<div style="position:absolute;left:748.90px;top:130.86px" class="cls_002"><span class="cls_002">4th</span></div>
<div style="position:absolute;left:83.04px;top:145.62px" class="cls_003"><span class="cls_003">A. OFFENSES AGAINST STANDARD OPERATING PROCEDURES</span></div>
<div style="position:absolute;left:100.44px;top:176.58px" class="cls_004"><span class="cls_004">I. Attendance and Punctuality</span></div>
<div style="position:absolute;left:100.44px;top:191.85px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:124.92px;top:191.85px" class="cls_004"><span class="cls_004">Tardiness</span></div>
<div style="position:absolute;left:124.92px;top:208.17px" class="cls_005"><span class="cls_005">*</span></div>
<div style="position:absolute;left:143.04px;top:208.17px" class="cls_005"><span class="cls_005">Employee is further disqualified of the attendance incentive</span></div>
<div style="position:absolute;left:124.92px;top:246.93px" class="cls_004"><span class="cls_004">a</span></div>
<div style="position:absolute;left:143.04px;top:246.93px" class="cls_004"><span class="cls_004">Exceeding the accumulated 30 minutes allowable tardy per month</span></div>
<div style="position:absolute;left:501.91px;top:246.93px" class="cls_004"><span class="cls_004"><?echo $penalty['field_1'];?></span></div>
<div style="position:absolute;left:587.35px;top:246.93px" class="cls_004"><span class="cls_004"><?echo $penalty['field_2'];?></span></div>
<div style="position:absolute;left:668.98px;top:246.93px" class="cls_004"><span class="cls_004"><?echo $penalty['field_3'];?></span></div>
<div style="position:absolute;left:753.10px;top:246.93px" class="cls_004"><span class="cls_004"><?echo $penalty['field_4'];?></span></div>
<div style="position:absolute;left:143.04px;top:284.01px" class="cls_004"><span class="cls_004">Failure to notify the immediate supervisor 30 minutes before the start</span></div>
<div style="position:absolute;left:124.92px;top:291.21px" class="cls_004"><span class="cls_004">b</span></div>
<div style="position:absolute;left:500.11px;top:291.21px" class="cls_004"><span class="cls_004"><?echo $penalty['field_5'];?></span></div>
<div style="position:absolute;left:589.27px;top:291.21px" class="cls_004"><span class="cls_004"><?echo $penalty['field_6'];?></span></div>
<div style="position:absolute;left:673.42px;top:291.21px" class="cls_004"><span class="cls_004"><?echo $penalty['field_7'];?></span></div>
<div style="position:absolute;left:143.04px;top:298.55px" class="cls_004"><span class="cls_004">of the shift</span></div>
<div style="position:absolute;left:100.44px;top:328.31px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:124.92px;top:327.83px" class="cls_004"><span class="cls_004">Absence</span></div>
<div style="position:absolute;left:124.92px;top:347.87px" class="cls_005"><span class="cls_005">*</span></div>
<div style="position:absolute;left:143.04px;top:347.87px" class="cls_005"><span class="cls_005">Employee is further disqualified of the attendance incentive</span></div>
<div style="position:absolute;left:124.92px;top:382.79px" class="cls_004"><span class="cls_004">a</span></div>
<div style="position:absolute;left:143.04px;top:382.79px" class="cls_004"><span class="cls_004">Authorized Absence</span></div>
<div style="position:absolute;left:501.91px;top:382.79px" class="cls_004"><span class="cls_004"><?echo $penalty['field_8'];?></span></div>
<div style="position:absolute;left:587.35px;top:382.79px" class="cls_004"><span class="cls_004"><?echo $penalty['field_9'];?></span></div>
<div style="position:absolute;left:668.98px;top:382.79px" class="cls_004"><span class="cls_004"><?echo $penalty['field_10'];?></span></div>
<div style="position:absolute;left:753.10px;top:382.79px" class="cls_004"><span class="cls_004"><?echo $penalty['field_11'];?></span></div>
<div style="position:absolute;left:124.92px;top:398.03px" class="cls_004"><span class="cls_004">*</span><?echo $penalty['field_12'];?></div>
<div style="position:absolute;left:143.04px;top:398.03px" class="cls_004"><span class="cls_004">Exceeding the 2days allowable absence per month</span></div>
<div style="position:absolute;left:143.04px;top:420.50px" class="cls_004"><span class="cls_004">Absence due to health reasons - warning will be waved once medical</span></div>
<div style="position:absolute;left:124.92px;top:427.82px" class="cls_004"><span class="cls_004">*</span></div>
<div style="position:absolute;left:143.04px;top:435.02px" class="cls_004"><span class="cls_004">certificate will be provided but doesn't supersede KPI score</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:605px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background02.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:143.04px;top:55.36px" class="cls_004"><span class="cls_004">Unauthorized absence/unscheduled leaves that are not approved -</span></div>
<div style="position:absolute;left:143.04px;top:69.88px" class="cls_004"><span class="cls_004">failure to formally notify the immediate supervisor at least 2 hours</span></div>
<div style="position:absolute;left:124.92px;top:84.42px" class="cls_004"><span class="cls_004">b</span></div>
<div style="position:absolute;left:143.04px;top:84.42px" class="cls_004"><span class="cls_004">before the start of the shift when unable to report for work, except on</span></div>
<div style="position:absolute;left:500.11px;top:84.42px" class="cls_004"><span class="cls_004"><?echo $penalty['field_13'];?></span></div>
<div style="position:absolute;left:589.27px;top:84.42px" class="cls_004"><span class="cls_004"><?echo $penalty['field_14'];?></span></div>
<div style="position:absolute;left:673.42px;top:84.42px" class="cls_004"><span class="cls_004"><?echo $penalty['field_15'];?></span></div>
<div style="position:absolute;left:143.04px;top:98.94px" class="cls_004"><span class="cls_004">emergency cases where the explanation is made upon reporting back</span></div>
<div style="position:absolute;left:143.04px;top:113.46px" class="cls_004"><span class="cls_004">for work.</span></div>
<div style="position:absolute;left:124.92px;top:155.22px" class="cls_004"><span class="cls_004">Unauthorized and/or frequent under time, overtime or extension of break</span></div>
<div style="position:absolute;left:100.44px;top:170.22px" class="cls_004"><span class="cls_004">3</span></div>
<div style="position:absolute;left:124.92px;top:169.74px" class="cls_004"><span class="cls_004">periods; leaving work assignment or the company premises during</span></div>
<div style="position:absolute;left:500.11px;top:170.22px" class="cls_004"><span class="cls_004"><?echo $penalty['field_16'];?></span></div>
<div style="position:absolute;left:589.27px;top:170.22px" class="cls_004"><span class="cls_004"><?echo $penalty['field_17'];?></span></div>
<div style="position:absolute;left:673.42px;top:170.22px" class="cls_004"><span class="cls_004"><?echo $penalty['field_18'];?></span></div>
<div style="position:absolute;left:124.92px;top:184.26px" class="cls_004"><span class="cls_004">working hours without permission from the immediate supervisor.</span></div>
<div style="position:absolute;left:124.92px;top:210.57px" class="cls_004"><span class="cls_004">*</span></div>
<div style="position:absolute;left:143.04px;top:217.17px" class="cls_004"><span class="cls_004">The company is not held liable for any accident that the employee</span></div>
<div style="position:absolute;left:143.04px;top:231.69px" class="cls_004"><span class="cls_004">may encounter out of such unauthorized transactions. Employees</span></div>
<div style="position:absolute;left:143.04px;top:246.21px" class="cls_004"><span class="cls_004">should secure an email approval from the immediate head should</span></div>
<div style="position:absolute;left:143.04px;top:260.73px" class="cls_004"><span class="cls_004">there be emergencies he/she is needed to respond to outside the</span></div>
<div style="position:absolute;left:143.04px;top:275.25px" class="cls_004"><span class="cls_004">company premises</span></div>
<div style="position:absolute;left:100.44px;top:310.91px" class="cls_004"><span class="cls_004">4</span></div>
<div style="position:absolute;left:124.92px;top:310.43px" class="cls_004"><span class="cls_004">Unauthorized extension of leaves</span></div>
<div style="position:absolute;left:500.11px;top:310.91px" class="cls_004"><span class="cls_004"><?echo $penalty['field_19'];?></span></div>
<div style="position:absolute;left:589.27px;top:310.91px" class="cls_004"><span class="cls_004"><?echo $penalty['field_20'];?></span></div>
<div style="position:absolute;left:673.42px;top:310.91px" class="cls_004"><span class="cls_004"><?echo $penalty['field_21'];?></span></div>
<div style="position:absolute;left:124.92px;top:325.43px" class="cls_004"><span class="cls_004">*</span></div>
<div style="position:absolute;left:143.04px;top:334.55px" class="cls_004"><span class="cls_004">This includes failure to board on time on the employees' departure</span></div>
<div style="position:absolute;left:143.04px;top:349.07px" class="cls_004"><span class="cls_004">due to causes other than bad weather conditions. Official cancellation</span></div>
<div style="position:absolute;left:143.04px;top:363.59px" class="cls_004"><span class="cls_004">of trip as ordered by competent authority is required.</span></div>
<div style="position:absolute;left:100.44px;top:402.11px" class="cls_004"><span class="cls_004">5</span></div>
<div style="position:absolute;left:124.92px;top:401.63px" class="cls_004"><span class="cls_004">On log IN /log OUT:</span></div>
<div style="position:absolute;left:124.92px;top:417.38px" class="cls_004"><span class="cls_004">a.  Improper log in and log out.</span></div>
<div style="position:absolute;left:500.11px;top:417.38px" class="cls_004"><span class="cls_004"><?echo $penalty['field_22'];?></span></div>
<div style="position:absolute;left:589.27px;top:417.38px" class="cls_004"><span class="cls_004"><?echo $penalty['field_23'];?></span></div>
<div style="position:absolute;left:673.42px;top:417.38px" class="cls_004"><span class="cls_004"><?echo $penalty['field_24'];?></span></div>
<div style="position:absolute;left:124.92px;top:447.86px" class="cls_004"><span class="cls_004">*</span></div>
<div style="position:absolute;left:143.04px;top:447.98px" class="cls_004"><span class="cls_004">three (3) instances and above in a payroll period.</span></div>
<div style="position:absolute;left:143.04px;top:466.94px" class="cls_004"><span class="cls_004">If the same scenario arises on the next payroll period, after the</span></div>
<div style="position:absolute;left:124.92px;top:479.42px" class="cls_004"><span class="cls_004">*</span></div>
<div style="position:absolute;left:143.04px;top:481.46px" class="cls_004"><span class="cls_004">issuance of the disciplinary sanction on the first violation, the graver</span></div>
<div style="position:absolute;left:143.04px;top:495.98px" class="cls_004"><span class="cls_004">penalty shall be imposed with due process.</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:1210px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background03.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:124.92px;top:56.80px" class="cls_004"><span class="cls_004">b.</span></div>
<div style="position:absolute;left:143.04px;top:56.80px" class="cls_004"><span class="cls_004">Making entries on another employee's</span></div>
<div style="position:absolute;left:500.11px;top:56.80px" class="cls_004"><span class="cls_004"><?echo $penalty['field_25'];?></span></div>
<div style="position:absolute;left:589.27px;top:56.80px" class="cls_004"><span class="cls_004"><?echo $penalty['field_26'];?></span></div>
<div style="position:absolute;left:673.42px;top:56.80px" class="cls_004"><span class="cls_004"><?echo $penalty['field_27'];?></span></div>
<div style="position:absolute;left:124.92px;top:90.42px" class="cls_004"><span class="cls_004">c. Unauthorized altering or tampering of ID</span></div>
<div style="position:absolute;left:500.11px;top:90.90px" class="cls_004"><span class="cls_004"><?echo $penalty['field_28'];?></span></div>
<div style="position:absolute;left:589.27px;top:90.90px" class="cls_004"><span class="cls_004"><?echo $penalty['field_29'];?></span></div>
<div style="position:absolute;left:673.42px;top:90.90px" class="cls_004"><span class="cls_004"><?echo $penalty['field_30'];?></span></div>
<div style="position:absolute;left:100.44px;top:122.82px" class="cls_004"><span class="cls_004">6</span></div>
<div style="position:absolute;left:124.92px;top:122.34px" class="cls_004"><span class="cls_004">Wasting time or loitering and/or sleeping on company time.</span></div>
<div style="position:absolute;left:503.83px;top:122.82px" class="cls_004"><span class="cls_004"><?echo $penalty['field_31'];?></span></div>
<div style="position:absolute;left:587.35px;top:122.82px" class="cls_004"><span class="cls_004"><?echo $penalty['field_32'];?></span></div>
<div style="position:absolute;left:668.98px;top:122.82px" class="cls_004"><span class="cls_004"><?echo $penalty['field_33'];?></span></div>
<div style="position:absolute;left:753.10px;top:122.82px" class="cls_004"><span class="cls_004"><?echo $penalty['field_34'];?></span></div>
<div style="position:absolute;left:100.44px;top:168.54px" class="cls_004"><span class="cls_004">II. Work Performance</span></div>
<div style="position:absolute;left:100.44px;top:183.78px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:124.92px;top:183.78px" class="cls_004"><span class="cls_004">Failure to pass monthly KPI</span></div>
<div style="position:absolute;left:501.91px;top:183.78px" class="cls_004"><span class="cls_004"><?echo $penalty['field_35'];?></span></div>
<div style="position:absolute;left:587.35px;top:183.78px" class="cls_004"><span class="cls_004"><?echo $penalty['field_36'];?></span></div>
<div style="position:absolute;left:668.98px;top:183.78px" class="cls_004"><span class="cls_004"><?echo $penalty['field_37'];?></span></div>
<div style="position:absolute;left:753.10px;top:183.78px" class="cls_004"><span class="cls_004"><?echo $penalty['field_38'];?></span></div>
<div style="position:absolute;left:100.44px;top:229.53px" class="cls_004"><span class="cls_004">III. ID/ Office Attire Requirements</span></div>
<div style="position:absolute;left:100.44px;top:253.77px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:124.92px;top:253.29px" class="cls_004"><span class="cls_004">Intermittent failure to wear ID (more than once within the same month)</span></div>
<div style="position:absolute;left:501.91px;top:253.77px" class="cls_004"><span class="cls_004"><?echo $penalty['field_39'];?></span></div>
<div style="position:absolute;left:587.35px;top:253.77px" class="cls_004"><span class="cls_004"><?echo $penalty['field_40'];?></span></div>
<div style="position:absolute;left:668.98px;top:253.77px" class="cls_004"><span class="cls_004"><?echo $penalty['field_41'];?></span></div>
<div style="position:absolute;left:753.10px;top:253.77px" class="cls_004"><span class="cls_004"><?echo $penalty['field_42'];?></span></div>
<div style="position:absolute;left:100.44px;top:293.37px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:124.92px;top:292.89px" class="cls_004"><span class="cls_004">Failure to observe prescribed office attire (smart casual attire) during</span></div>
<div style="position:absolute;left:501.91px;top:293.37px" class="cls_004"><span class="cls_004"><?echo $penalty['field_43'];?></span></div>
<div style="position:absolute;left:587.35px;top:293.37px" class="cls_004"><span class="cls_004"><?echo $penalty['field_44'];?></span></div>
<div style="position:absolute;left:668.98px;top:293.37px" class="cls_004"><span class="cls_004"><?echo $penalty['field_45'];?></span></div>
<div style="position:absolute;left:753.10px;top:293.37px" class="cls_004"><span class="cls_004"><?echo $penalty['field_46'];?></span></div>
<div style="position:absolute;left:100.44px;top:324.59px" class="cls_004"><span class="cls_004">3</span></div>
<div style="position:absolute;left:124.92px;top:324.11px" class="cls_004"><span class="cls_004">Failure to report a lost or destroyed ID</span></div>
<div style="position:absolute;left:501.91px;top:324.59px" class="cls_004"><span class="cls_004"><?echo $penalty['field_47'];?></span></div>
<div style="position:absolute;left:587.35px;top:324.59px" class="cls_004"><span class="cls_004"><?echo $penalty['field_48'];?></span></div>
<div style="position:absolute;left:668.98px;top:324.59px" class="cls_004"><span class="cls_004"><?echo $penalty['field_49'];?></span></div>
<div style="position:absolute;left:753.10px;top:324.59px" class="cls_004"><span class="cls_004"><?echo $penalty['field_50'];?></span></div>
<div style="position:absolute;left:100.44px;top:371.03px" class="cls_004"><span class="cls_004">IV. Health, Safety and Security of Confidential Information</span></div>
<div style="position:absolute;left:124.92px;top:390.11px" class="cls_004"><span class="cls_004">Willful refusal to undergo company-required physical and medical</span></div>
<div style="position:absolute;left:100.44px;top:397.91px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:500.11px;top:397.91px" class="cls_004"><span class="cls_004"><?echo $penalty['field_51'];?></span></div>
<div style="position:absolute;left:589.27px;top:397.91px" class="cls_004"><span class="cls_004"><?echo $penalty['field_52'];?></span></div>
<div style="position:absolute;left:673.42px;top:397.91px" class="cls_004"><span class="cls_004"><?echo $penalty['field_53'];?></span></div>
<div style="position:absolute;left:124.92px;top:404.63px" class="cls_004"><span class="cls_004">examinations and drug testing</span></div>
<div style="position:absolute;left:124.92px;top:442.82px" class="cls_004"><span class="cls_004">Failure to turn off electronic devices after use. (i.e. computer and its</span></div>
<div style="position:absolute;left:100.44px;top:450.62px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:501.91px;top:450.62px" class="cls_004"><span class="cls_004"><?echo $penalty['field_54'];?></span></div>
<div style="position:absolute;left:587.35px;top:450.62px" class="cls_004"><span class="cls_004"><?echo $penalty['field_55'];?></span></div>
<div style="position:absolute;left:668.98px;top:450.62px" class="cls_004"><span class="cls_004"><?echo $penalty['field_56'];?></span></div>
<div style="position:absolute;left:753.10px;top:450.62px" class="cls_004"><span class="cls_004"><?echo $penalty['field_57'];?></span></div>
<div style="position:absolute;left:124.92px;top:457.34px" class="cls_004"><span class="cls_004">accessories at the day's end)</span></div>
<div style="position:absolute;left:124.92px;top:498.38px" class="cls_004"><span class="cls_004">Transmittion of confidential company information without any authority</span></div>
<div style="position:absolute;left:100.44px;top:506.18px" class="cls_004"><span class="cls_004">3</span></div>
<div style="position:absolute;left:506.59px;top:506.18px" class="cls_004"><span class="cls_004"><?echo $penalty['field_58'];?></span></div>
<div style="position:absolute;left:124.92px;top:512.90px" class="cls_004"><span class="cls_004">and proper security clearance</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:1815px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background04.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:124.92px;top:72.64px" class="cls_004"><span class="cls_004">Disclosure or misuse of confidential company information and/or records</span></div>
<div style="position:absolute;left:124.92px;top:87.18px" class="cls_004"><span class="cls_004">of confidential and classified information officially known to him by reason</span></div>
<div style="position:absolute;left:100.44px;top:102.18px" class="cls_004"><span class="cls_004">4</span></div>
<div style="position:absolute;left:124.92px;top:101.70px" class="cls_004"><span class="cls_004">of his office or as a result of an investigation and not available to the</span></div>
<div style="position:absolute;left:506.59px;top:102.18px" class="cls_004"><span class="cls_004"><?echo $penalty['field_59'];?></span></div>
<div style="position:absolute;left:124.92px;top:116.22px" class="cls_004"><span class="cls_004">public, to further his  private interest or give undue advantage to anyone</span></div>
<div style="position:absolute;left:124.92px;top:130.74px" class="cls_004"><span class="cls_004">or to prejudice the public interest.</span></div>
<div style="position:absolute;left:100.44px;top:168.66px" class="cls_004"><span class="cls_004">5</span></div>
<div style="position:absolute;left:124.92px;top:168.18px" class="cls_004"><span class="cls_004">Taking out company records without prior approval</span></div>
<div style="position:absolute;left:506.59px;top:168.66px" class="cls_004"><span class="cls_004"><?echo $penalty['field_60'];?></span></div>
<div style="position:absolute;left:124.92px;top:203.73px" class="cls_004"><span class="cls_004">Failure to secure office records or protect or classify sensitive information</span></div>
<div style="position:absolute;left:100.44px;top:218.73px" class="cls_004"><span class="cls_004">6</span></div>
<div style="position:absolute;left:124.92px;top:218.25px" class="cls_004"><span class="cls_004">where the user is the custodian and person responsible for its</span></div>
<div style="position:absolute;left:506.59px;top:218.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_61'];?></span></div>
<div style="position:absolute;left:124.92px;top:232.77px" class="cls_004"><span class="cls_004">safekeeping.</span></div>
<div style="position:absolute;left:124.92px;top:265.05px" class="cls_004"><span class="cls_004">Unauthorized disclosure and/or sharing or using another employee's</span></div>
<div style="position:absolute;left:100.44px;top:272.73px" class="cls_004"><span class="cls_004">7</span></div>
<div style="position:absolute;left:502.03px;top:272.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_62'];?></span></div>
<div style="position:absolute;left:593.71px;top:272.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_63'];?></span></div>
<div style="position:absolute;left:124.92px;top:279.57px" class="cls_004"><span class="cls_004">password for whatever reason.</span></div>
<div style="position:absolute;left:100.44px;top:310.91px" class="cls_004"><span class="cls_004">V. Reporting of Violation</span></div>
<div style="position:absolute;left:124.92px;top:329.99px" class="cls_004"><span class="cls_004">(Penalty will depend upon the damage caused, if the failure of the</span></div>
<div style="position:absolute;left:124.92px;top:344.51px" class="cls_004"><span class="cls_004">Supervisor involves amounts which greatly affects the property and image</span></div>
<div style="position:absolute;left:100.44px;top:352.31px" class="cls_004"><span class="cls_004">*</span></div>
<div style="position:absolute;left:124.92px;top:359.03px" class="cls_004"><span class="cls_004">of the company, the penalty should be imposed in its heavier period</span></div>
<div style="position:absolute;left:124.92px;top:373.55px" class="cls_004"><span class="cls_004">regardless of the number of occurrence)</span></div>
<div style="position:absolute;left:124.92px;top:418.34px" class="cls_004"><span class="cls_004">Failure to report a known violation of any provision of the Company's</span></div>
<div style="position:absolute;left:100.44px;top:426.02px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:502.03px;top:426.02px" class="cls_004"><span class="cls_004"><?echo $penalty['field_64'];?></span></div>
<div style="position:absolute;left:593.71px;top:426.02px" class="cls_004"><span class="cls_004"><?echo $penalty['field_65'];?></span></div>
<div style="position:absolute;left:124.92px;top:432.86px" class="cls_004"><span class="cls_004">Personnel Conduct Policy and standard operating procedure.</span></div>
<div style="position:absolute;left:100.44px;top:476.18px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:124.92px;top:475.70px" class="cls_004"><span class="cls_004">Malicious reporting or accusation to the detriment of another.</span></div>
<div style="position:absolute;left:502.03px;top:476.18px" class="cls_004"><span class="cls_004"><?echo $penalty['field_66'];?></span></div>
<div style="position:absolute;left:593.71px;top:476.18px" class="cls_004"><span class="cls_004"><?echo $penalty['field_67'];?></span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:2420px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background05.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:124.92px;top:52.00px" class="cls_004"><span class="cls_004">Failure of the Supervisor/Manager/Head to submit a report of an injury or</span></div>
<div style="position:absolute;left:100.44px;top:67.00px" class="cls_004"><span class="cls_004">3</span></div>
<div style="position:absolute;left:124.92px;top:66.52px" class="cls_004"><span class="cls_004">damage to employees or company property inside and outside the</span></div>
<div style="position:absolute;left:502.03px;top:67.00px" class="cls_004"><span class="cls_004"><?echo $penalty['field_68'];?></span></div>
<div style="position:absolute;left:593.71px;top:67.00px" class="cls_004"><span class="cls_004"><?echo $penalty['field_69'];?></span></div>
<div style="position:absolute;left:124.92px;top:81.04px" class="cls_004"><span class="cls_004">company premises.</span></div>
<div style="position:absolute;left:100.44px;top:125.10px" class="cls_004"><span class="cls_004">VI. Information Security</span></div>
<div style="position:absolute;left:124.92px;top:139.14px" class="cls_004"><span class="cls_004">Concealing one's identity or masquerading as another user to access the</span></div>
<div style="position:absolute;left:100.44px;top:154.14px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:124.92px;top:153.66px" class="cls_004"><span class="cls_004">information resource, send/receive, process, modify or store data on the</span></div>
<div style="position:absolute;left:506.59px;top:154.14px" class="cls_004"><span class="cls_004"><?echo $penalty['field_70'];?></span></div>
<div style="position:absolute;left:124.92px;top:168.18px" class="cls_004"><span class="cls_004">IT resources.</span></div>
<div style="position:absolute;left:124.92px;top:202.65px" class="cls_004"><span class="cls_004">Disclosure of any login account credentials or making the credentials</span></div>
<div style="position:absolute;left:100.44px;top:217.65px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:124.92px;top:217.17px" class="cls_004"><span class="cls_004">available to others without permission or authorization in accordance with</span></div>
<div style="position:absolute;left:502.03px;top:217.65px" class="cls_004"><span class="cls_004"><?echo $penalty['field_71'];?></span></div>
<div style="position:absolute;left:593.71px;top:217.65px" class="cls_004"><span class="cls_004"><?echo $penalty['field_72'];?></span></div>
<div style="position:absolute;left:124.92px;top:231.69px" class="cls_004"><span class="cls_004">existing policies/guidelines.</span></div>
<div style="position:absolute;left:100.44px;top:282.69px" class="cls_004"><span class="cls_004">VII. Intrusion</span></div>
<div style="position:absolute;left:100.44px;top:297.93px" class="cls_004"><span class="cls_004">*</span></div>
<div style="position:absolute;left:124.92px;top:297.45px" class="cls_004"><span class="cls_004">(Penalty will depend upon the damage caused.)</span></div>
<div style="position:absolute;left:124.92px;top:314.51px" class="cls_004"><span class="cls_004">Attempts to disable, defeat or circumvent any security controls in place,</span></div>
<div style="position:absolute;left:100.44px;top:322.19px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:506.59px;top:322.19px" class="cls_004"><span class="cls_004"><?echo $penalty['field_73'];?></span></div>
<div style="position:absolute;left:124.92px;top:329.03px" class="cls_004"><span class="cls_004">successful or otherwise.</span></div>
<div style="position:absolute;left:100.44px;top:361.79px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:124.92px;top:361.31px" class="cls_004"><span class="cls_004">Committing security breaches such as, but not limited to, unauthorized</span></div>
<div style="position:absolute;left:506.59px;top:361.79px" class="cls_004"><span class="cls_004"><?echo $penalty['field_74'];?></span></div>
<div style="position:absolute;left:100.44px;top:392.27px" class="cls_004"><span class="cls_004">3</span></div>
<div style="position:absolute;left:124.92px;top:391.79px" class="cls_004"><span class="cls_004">Intentional propagation of malicious codes into the network. (Monetary</span></div>
<div style="position:absolute;left:506.59px;top:392.27px" class="cls_004"><span class="cls_004"><?echo $penalty['field_75'];?></span></div>
<div style="position:absolute;left:100.44px;top:438.02px" class="cls_004"><span class="cls_004">VIII. Physical Security</span></div>
<div style="position:absolute;left:124.92px;top:453.86px" class="cls_004"><span class="cls_004">(Penalty may be imposed on its higher period regardless of occurrence</span></div>
<div style="position:absolute;left:100.44px;top:468.86px" class="cls_004"><span class="cls_004">*</span></div>
<div style="position:absolute;left:124.92px;top:468.38px" class="cls_004"><span class="cls_004">provided that damage caused to the company</span></div>
<div style="position:absolute;left:124.92px;top:482.90px" class="cls_004"><span class="cls_004">is material.)</span></div>
<div style="position:absolute;left:100.44px;top:499.70px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:124.92px;top:499.70px" class="cls_004"><span class="cls_004">Unauthorized entry to restricted areas.</span></div>
<div style="position:absolute;left:500.11px;top:499.70px" class="cls_004"><span class="cls_004"><?echo $penalty['field_76'];?></span></div>
<div style="position:absolute;left:589.27px;top:499.70px" class="cls_004"><span class="cls_004"><?echo $penalty['field_77'];?></span></div>
<div style="position:absolute;left:673.42px;top:499.70px" class="cls_004"><span class="cls_004"><?echo $penalty['field_78'];?></span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:3025px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background06.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:100.44px;top:60.40px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:124.92px;top:60.40px" class="cls_004"><span class="cls_004">Allowing unauthorized personnel to restricted areas</span></div>
<div style="position:absolute;left:500.11px;top:60.40px" class="cls_004"><span class="cls_004"><?echo $penalty['field_79'];?></span></div>
<div style="position:absolute;left:589.27px;top:60.40px" class="cls_004"><span class="cls_004"><?echo $penalty['field_80'];?></span></div>
<div style="position:absolute;left:673.42px;top:60.40px" class="cls_004"><span class="cls_004"><?echo $penalty['field_81'];?></span></div>
<div style="position:absolute;left:124.92px;top:99.18px" class="cls_004"><span class="cls_004">Unauthorized use or tampering of security devices, CCTV, and other</span></div>
<div style="position:absolute;left:100.44px;top:106.98px" class="cls_004"><span class="cls_004">3</span></div>
<div style="position:absolute;left:506.59px;top:106.98px" class="cls_004"><span class="cls_004"><?echo $penalty['field_82'];?></span></div>
<div style="position:absolute;left:124.92px;top:113.70px" class="cls_004"><span class="cls_004">Company equipment.</span></div>
<div style="position:absolute;left:124.92px;top:146.82px" class="cls_004"><span class="cls_004">Tampering or unauthorized removal of equipment identification,</span></div>
<div style="position:absolute;left:100.44px;top:161.82px" class="cls_004"><span class="cls_004">4</span></div>
<div style="position:absolute;left:124.92px;top:161.34px" class="cls_004"><span class="cls_004">inventory tags, signages, safety warnings, etc. that could cause injury or</span></div>
<div style="position:absolute;left:502.03px;top:161.82px" class="cls_004"><span class="cls_004"><?echo $penalty['field_83'];?></span></div>
<div style="position:absolute;left:593.71px;top:161.82px" class="cls_004"><span class="cls_004"><?echo $penalty['field_84'];?>/span></div>
<div style="position:absolute;left:124.92px;top:175.86px" class="cls_004"><span class="cls_004">undue harm to other users.</span></div>
<div style="position:absolute;left:100.44px;top:206.49px" class="cls_004"><span class="cls_004">5</span></div>
<div style="position:absolute;left:124.92px;top:206.49px" class="cls_004"><span class="cls_004">Unauthorized removal of storage media and computer equipment.</span></div>
<div style="position:absolute;left:502.03px;top:206.49px" class="cls_004"><span class="cls_004"><?echo $penalty['field_85'];?></span></div>
<div style="position:absolute;left:593.71px;top:206.49px" class="cls_004"><span class="cls_004"><?echo $penalty['field_86'];?></span></div>
<div style="position:absolute;left:100.44px;top:242.73px" class="cls_004"><span class="cls_004">6</span></div>
<div style="position:absolute;left:124.92px;top:242.73px" class="cls_004"><span class="cls_004">Unauthorized use of internal or external storage media in any form.</span></div>
<div style="position:absolute;left:502.03px;top:242.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_87'];?></span></div>
<div style="position:absolute;left:593.71px;top:242.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_88'];?></span></div>
<div style="position:absolute;left:124.92px;top:279.33px" class="cls_004"><span class="cls_004">Unauthorized transfer, pullout or disposal of company equipment and</span></div>
<div style="position:absolute;left:100.44px;top:287.01px" class="cls_004"><span class="cls_004">7</span></div>
<div style="position:absolute;left:502.03px;top:287.01px" class="cls_004"><span class="cls_004"><?echo $penalty['field_89'];?></span></div>
<div style="position:absolute;left:593.71px;top:287.01px" class="cls_004"><span class="cls_004"><?echo $penalty['field_90'];?></span></div>
<div style="position:absolute;left:124.92px;top:293.85px" class="cls_004"><span class="cls_004">peripherals.</span></div>
<div style="position:absolute;left:124.92px;top:326.87px" class="cls_004"><span class="cls_004">Untidy workstations or computing environments that invite rodent or</span></div>
<div style="position:absolute;left:100.44px;top:334.55px" class="cls_004"><span class="cls_004">8</span></div>
<div style="position:absolute;left:501.91px;top:334.55px" class="cls_004"><span class="cls_004"><?echo $penalty['field_91'];?></span></div>
<div style="position:absolute;left:587.35px;top:334.55px" class="cls_004"><span class="cls_004"><?echo $penalty['field_92'];?></span></div>
<div style="position:absolute;left:668.98px;top:334.55px" class="cls_004"><span class="cls_004"><?echo $penalty['field_93'];?></span></div>
<div style="position:absolute;left:753.10px;top:334.55px" class="cls_004"><span class="cls_004"><?echo $penalty['field_94'];?></span></div>
<div style="position:absolute;left:124.92px;top:341.39px" class="cls_004"><span class="cls_004">insect infestation that can damage company equipment.</span></div>
<div style="position:absolute;left:124.92px;top:377.27px" class="cls_004"><span class="cls_004">Bringing of food or beverages inside restricted areas where such are</span></div>
<div style="position:absolute;left:100.44px;top:385.07px" class="cls_004"><span class="cls_004">9</span></div>
<div style="position:absolute;left:501.91px;top:385.07px" class="cls_004"><span class="cls_004"><?echo $penalty['field_95'];?></span></div>
<div style="position:absolute;left:587.35px;top:385.07px" class="cls_004"><span class="cls_004"><?echo $penalty['field_96'];?></span></div>
<div style="position:absolute;left:668.98px;top:385.07px" class="cls_004"><span class="cls_004"><?echo $penalty['field_97'];?></span></div>
<div style="position:absolute;left:753.10px;top:385.07px" class="cls_004"><span class="cls_004"><?echo $penalty['field_98'];?></span></div>
<div style="position:absolute;left:124.92px;top:391.79px" class="cls_004"><span class="cls_004">explicitly prohibited.</span></div>
<div style="position:absolute;left:124.92px;top:436.22px" class="cls_004"><span class="cls_004">Holding unofficial and non-business related meetings within the company</span></div>
<div style="position:absolute;left:100.44px;top:443.90px" class="cls_004"><span class="cls_004">10</span></div>
<div style="position:absolute;left:501.91px;top:443.90px" class="cls_004"><span class="cls_004"><?echo $penalty['field_99'];?></span></div>
<div style="position:absolute;left:587.35px;top:443.90px" class="cls_004"><span class="cls_004"><?echo $penalty['field_100'];?></span></div>
<div style="position:absolute;left:668.98px;top:443.90px" class="cls_004"><span class="cls_004"><<?echo $penalty['field_101'];?></span></div>
<div style="position:absolute;left:753.10px;top:443.90px" class="cls_004"><span class="cls_004"><?echo $penalty['field_102'];?></span></div>
<div style="position:absolute;left:124.92px;top:450.74px" class="cls_004"><span class="cls_004">premises without previous written permission from the Manager.</span></div>
<div style="position:absolute;left:100.44px;top:507.14px" class="cls_004"><span class="cls_004">IX. Changes to Standard System Configurations</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:3630px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background07.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:124.92px;top:55.96px" class="cls_004"><span class="cls_004">Alteration of network, application or system configuration (e.g. IP address,</span></div>
<div style="position:absolute;left:100.44px;top:63.64px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:502.03px;top:63.64px" class="cls_004"><span class="cls_004"><?echo $penalty['field_103'];?></span></div>
<div style="position:absolute;left:593.71px;top:63.64px" class="cls_004"><span class="cls_004"><?echo $penalty['field_104'];?></span></div>
<div style="position:absolute;left:124.92px;top:70.48px" class="cls_004"><span class="cls_004">configuration files, etc.) without proper authorization.</span></div>
<div style="position:absolute;left:124.92px;top:106.74px" class="cls_004"><span class="cls_004">Intentionally disabling the anti-malware system, lockdown procedures or</span></div>
<div style="position:absolute;left:100.44px;top:114.54px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:506.59px;top:114.54px" class="cls_004"><span class="cls_004"><?echo $penalty['field_105'];?></span></div>
<div style="position:absolute;left:124.92px;top:121.26px" class="cls_004"><span class="cls_004">other security controls in place.</span></div>
<div style="position:absolute;left:124.92px;top:161.58px" class="cls_004"><span class="cls_004">Unauthorized installation of system and application bug fixes or patches,</span></div>
<div style="position:absolute;left:100.44px;top:169.38px" class="cls_004"><span class="cls_004">3</span></div>
<div style="position:absolute;left:502.03px;top:169.38px" class="cls_004"><span class="cls_004"><?echo $penalty['field_106'];?></span></div>
<div style="position:absolute;left:593.71px;top:169.38px" class="cls_004"><span class="cls_004"><?echo $penalty['field_107'];?></span></div>
<div style="position:absolute;left:124.92px;top:176.10px" class="cls_004"><span class="cls_004">or use of personal or third party systems/application/ programs/ utilities.</span></div>
<div style="position:absolute;left:100.44px;top:228.21px" class="cls_004"><span class="cls_004">X. Email and Communications</span></div>
<div style="position:absolute;left:124.92px;top:248.37px" class="cls_004"><span class="cls_004">Posting the company email on personal web logs, mailing lists and other</span></div>
<div style="position:absolute;left:100.44px;top:256.17px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:502.03px;top:256.17px" class="cls_004"><span class="cls_004"><?echo $penalty['field_108'];?></span></div>
<div style="position:absolute;left:593.71px;top:256.17px" class="cls_004"><span class="cls_004"><?echo $penalty['field_109'];?></span></div>
<div style="position:absolute;left:124.92px;top:262.89px" class="cls_004"><span class="cls_004">internet resources for personal purposes.</span></div>
<div style="position:absolute;left:124.92px;top:299.99px" class="cls_004"><span class="cls_004">Creating, forwarding or sending unsolicited email messages in bulk (i.e.</span></div>
<div style="position:absolute;left:100.44px;top:314.99px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:124.92px;top:314.51px" class="cls_004"><span class="cls_004">email spam, jokes, chain mail or other forms of junk mail) or other</span></div>
<div style="position:absolute;left:502.03px;top:314.99px" class="cls_004"><span class="cls_004"><?echo $penalty['field_110'];?></span></div>
<div style="position:absolute;left:593.71px;top:314.99px" class="cls_004"><span class="cls_004"><?echo $penalty['field_111'];?></span></div>
<div style="position:absolute;left:124.92px;top:329.03px" class="cls_004"><span class="cls_004">advertisment material (i.e. 'pyramid' schemes of any type.)</span></div>
<div style="position:absolute;left:124.92px;top:363.47px" class="cls_004"><span class="cls_004">Any form of harassment through email, telephone, paging, or SMS</span></div>
<div style="position:absolute;left:100.44px;top:378.47px" class="cls_004"><span class="cls_004">3</span></div>
<div style="position:absolute;left:124.92px;top:377.99px" class="cls_004"><span class="cls_004">systems, whether through language, frequency, solicitation, size of</span></div>
<div style="position:absolute;left:506.59px;top:378.47px" class="cls_004"><span class="cls_004"><?echo $penalty['field_112'];?></span></div>
<div style="position:absolute;left:124.92px;top:392.51px" class="cls_004"><span class="cls_004">messages, etc.</span></div>
<div style="position:absolute;left:124.92px;top:428.18px" class="cls_004"><span class="cls_004">Unauthorized use of attempt to forge email header information or</span></div>
<div style="position:absolute;left:100.44px;top:435.86px" class="cls_004"><span class="cls_004">4</span></div>
<div style="position:absolute;left:502.03px;top:435.86px" class="cls_004"><span class="cls_004"><?echo $penalty['field_113'];?></span></div>
<div style="position:absolute;left:593.71px;top:435.86px" class="cls_004"><span class="cls_004"><?echo $penalty['field_114'];?></span></div>
<div style="position:absolute;left:124.92px;top:442.70px" class="cls_004"><span class="cls_004">messages, or attempt to disguise one's identity when sending mail.</span></div>
<div style="position:absolute;left:124.92px;top:478.22px" class="cls_004"><span class="cls_004">Unauthorized broadcasting of email messages leading to unnecessary</span></div>
<div style="position:absolute;left:100.44px;top:486.02px" class="cls_004"><span class="cls_004">5</span></div>
<div style="position:absolute;left:506.59px;top:486.02px" class="cls_004"><span class="cls_004"><?echo $penalty['field_115'];?></span></div>
<div style="position:absolute;left:124.92px;top:492.74px" class="cls_004"><span class="cls_004">network bottlenecks and slowdown.</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:4235px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background08.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:124.92px;top:56.68px" class="cls_004"><span class="cls_004">Conduct private business activities via email for personal business and</span></div>
<div style="position:absolute;left:100.44px;top:64.36px" class="cls_004"><span class="cls_004">6</span></div>
<div style="position:absolute;left:502.03px;top:64.36px" class="cls_004"><span class="cls_004"><?echo $penalty['field_116'];?></span></div>
<div style="position:absolute;left:593.71px;top:64.36px" class="cls_004"><span class="cls_004"><?echo $penalty['field_117'];?></span></div>
<div style="position:absolute;left:124.92px;top:71.20px" class="cls_004"><span class="cls_004">financial gain.</span></div>
<div style="position:absolute;left:124.92px;top:104.58px" class="cls_004"><span class="cls_004">Sending profane, obscene, harassing, discriminatory, other threatening e-</span></div>
<div style="position:absolute;left:100.44px;top:119.58px" class="cls_004"><span class="cls_004">7</span></div>
<div style="position:absolute;left:124.92px;top:119.10px" class="cls_004"><span class="cls_004">mail or otherwise offensive matters that may or may not promote</span></div>
<div style="position:absolute;left:506.59px;top:119.58px" class="cls_004"><span class="cls_004"><?echo $penalty['field_118'];?></span></div>
<div style="position:absolute;left:124.92px;top:133.62px" class="cls_004"><span class="cls_004">criminal behavior.</span></div>
<div style="position:absolute;left:100.44px;top:164.94px" class="cls_004"><span class="cls_004">8</span></div>
<div style="position:absolute;left:124.92px;top:164.46px" class="cls_004"><span class="cls_004">Unauthorized use of another user's email account.</span></div>
<div style="position:absolute;left:502.03px;top:164.94px" class="cls_004"><span class="cls_004"><?echo $penalty['field_119'];?></span></div>
<div style="position:absolute;left:593.71px;top:164.94px" class="cls_004"><span class="cls_004"><?echo $penalty['field_120'];?></span></div>
<div style="position:absolute;left:124.92px;top:195.33px" class="cls_004"><span class="cls_004">Erroneous sending of emails containing internal or confidential material to</span></div>
<div style="position:absolute;left:100.44px;top:203.01px" class="cls_004"><span class="cls_004">9</span></div>
<div style="position:absolute;left:502.03px;top:203.01px" class="cls_004"><span class="cls_004"><?echo $penalty['field_121'];?></span></div>
<div style="position:absolute;left:593.71px;top:203.01px" class="cls_004"><span class="cls_004"><?echo $penalty['field_122'];?></span></div>
<div style="position:absolute;left:124.92px;top:209.85px" class="cls_004"><span class="cls_004">unintended recipients.</span></div>
<div style="position:absolute;left:100.44px;top:245.85px" class="cls_004"><span class="cls_004">10</span></div>
<div style="position:absolute;left:124.92px;top:245.85px" class="cls_004"><span class="cls_004">Deletion of internal/external email communication</span></div>
<div style="position:absolute;left:502.03px;top:245.85px" class="cls_004"><span class="cls_004"><?echo $penalty['field_123'];?></span></div>
<div style="position:absolute;left:593.71px;top:245.85px" class="cls_004"><span class="cls_004"><?echo $penalty['field_124'];?></span></div>
<div style="position:absolute;left:100.44px;top:296.37px" class="cls_004"><span class="cls_004">XI. Abuse of Internet Privileges</span></div>
<div style="position:absolute;left:124.92px;top:316.55px" class="cls_004"><span class="cls_004">Unauthorized downloading of software, programs or media files from the</span></div>
<div style="position:absolute;left:100.44px;top:324.35px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:502.03px;top:324.35px" class="cls_004"><span class="cls_004"><?echo $penalty['field_125'];?></span></div>
<div style="position:absolute;left:593.71px;top:324.35px" class="cls_004"><span class="cls_004"><?echo $penalty['field_126'];?></span></div>
<div style="position:absolute;left:124.92px;top:331.07px" class="cls_004"><span class="cls_004">Internet.</span></div>
<div style="position:absolute;left:124.92px;top:372.47px" class="cls_004"><span class="cls_004">Using ISP accounts and dial-up lines and the like to access the Internet</span></div>
<div style="position:absolute;left:100.44px;top:380.27px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:502.03px;top:380.27px" class="cls_004"><span class="cls_004"><?echo $penalty['field_127'];?></span></div>
<div style="position:absolute;left:593.71px;top:380.27px" class="cls_004"><span class="cls_004"><<?echo $penalty['field_128'];?></span></div>
<div style="position:absolute;left:124.92px;top:386.99px" class="cls_004"><span class="cls_004">through Company's resources without authorization.</span></div>
<div style="position:absolute;left:124.92px;top:430.94px" class="cls_004"><span class="cls_004">Setting up of personal websites or other channels within the office</span></div>
<div style="position:absolute;left:100.44px;top:438.74px" class="cls_004"><span class="cls_004">3</span></div>
<div style="position:absolute;left:502.03px;top:438.74px" class="cls_004"><span class="cls_004"><?echo $penalty['field_129'];?></span></div>
<div style="position:absolute;left:593.71px;top:438.74px" class="cls_004"><span class="cls_004"><?echo $penalty['field_130'];?></span></div>
<div style="position:absolute;left:124.92px;top:445.46px" class="cls_004"><span class="cls_004">network for personal business use or gain.</span></div>
<div style="position:absolute;left:124.92px;top:486.50px" class="cls_004"><span class="cls_004">Use of Internet to view, download or share inappropriate or offensive</span></div>
<div style="position:absolute;left:100.44px;top:501.50px" class="cls_004"><span class="cls_004">4</span></div>
<div style="position:absolute;left:124.92px;top:501.02px" class="cls_004"><span class="cls_004">material, such as pornography, discrimination, inappropriate behavior,</span></div>
<div style="position:absolute;left:502.03px;top:501.50px" class="cls_004"><span class="cls_004"><?echo $penalty['field_131'];?></span></div>
<div style="position:absolute;left:593.71px;top:501.50px" class="cls_004"><span class="cls_004"><?echo $penalty['field_132'];?></span></div>
<div style="position:absolute;left:124.92px;top:515.56px" class="cls_004"><span class="cls_004">malware, etc.</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:4840px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background09.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:124.92px;top:69.04px" class="cls_004"><span class="cls_004">Use of Internet to view, download, or share unauthorized activities such</span></div>
<div style="position:absolute;left:100.44px;top:84.06px" class="cls_004"><span class="cls_004">5</span></div>
<div style="position:absolute;left:124.92px;top:83.58px" class="cls_004"><span class="cls_004">as gambling, personal business, misrepresentation of the company to</span></div>
<div style="position:absolute;left:506.59px;top:84.06px" class="cls_004"><span class="cls_004"><?echo $penalty['field_133'];?></span></div>
<div style="position:absolute;left:124.92px;top:98.10px" class="cls_004"><span class="cls_004">public or private, etc.</span></div>
<div style="position:absolute;left:124.92px;top:135.78px" class="cls_004"><span class="cls_004">Use of the Internet to disclose internal company information that could or</span></div>
<div style="position:absolute;left:100.44px;top:143.58px" class="cls_004"><span class="cls_004">6</span></div>
<div style="position:absolute;left:506.59px;top:143.58px" class="cls_004"><span class="cls_004"><?echo $penalty['field_134'];?></span></div>
<div style="position:absolute;left:124.92px;top:150.30px" class="cls_004"><span class="cls_004">have resulted in reputational or financial losses for the company.</span></div>
<div style="position:absolute;left:124.92px;top:190.26px" class="cls_004"><span class="cls_004">Unauthorized use of and access to personal webmails, personal blog sites,</span></div>
<div style="position:absolute;left:100.44px;top:205.29px" class="cls_004"><span class="cls_004">7</span></div>
<div style="position:absolute;left:124.92px;top:204.81px" class="cls_004"><span class="cls_004">shopping sites, and other sites prohibited by the Company Internet usage</span></div>
<div style="position:absolute;left:502.03px;top:205.29px" class="cls_004"><span class="cls_004"><?echo $penalty['field_135'];?></span></div>
<div style="position:absolute;left:593.71px;top:205.29px" class="cls_004"><span class="cls_004"><?echo $penalty['field_136'];?></span></div>
<div style="position:absolute;left:124.92px;top:219.33px" class="cls_004"><span class="cls_004">policies.</span></div>
<div style="position:absolute;left:124.92px;top:254.97px" class="cls_004"><span class="cls_004">Unauthorized participation in online discussion groups, chat rooms, blog</span></div>
<div style="position:absolute;left:100.44px;top:269.97px" class="cls_004"><span class="cls_004">8</span></div>
<div style="position:absolute;left:124.92px;top:269.49px" class="cls_004"><span class="cls_004">sites, and other online community sites. (i.e. logging into facebook,</span></div>
<div style="position:absolute;left:502.03px;top:269.97px" class="cls_004"><span class="cls_004"><?echo $penalty['field_137'];?></span></div>
<div style="position:absolute;left:593.71px;top:269.97px" class="cls_004"><span class="cls_004"><?echo $penalty['field_138'];?></span></div>
<div style="position:absolute;left:124.92px;top:284.01px" class="cls_004"><span class="cls_004">twitter, etc. accounts during office hours)</span></div>
<div style="position:absolute;left:124.92px;top:317.51px" class="cls_004"><span class="cls_004">Unauthorized advertisement, promotion, presentation or statements</span></div>
<div style="position:absolute;left:100.44px;top:332.51px" class="cls_004"><span class="cls_004">9</span></div>
<div style="position:absolute;left:124.92px;top:332.03px" class="cls_004"><span class="cls_004">about company products and services in internet online communities or</span></div>
<div style="position:absolute;left:502.03px;top:332.51px" class="cls_004"><span class="cls_004"><?echo $penalty['field_139'];?></span></div>
<div style="position:absolute;left:593.71px;top:332.51px" class="cls_004"><span class="cls_004"><?echo $penalty['field_140'];?></span></div>
<div style="position:absolute;left:124.92px;top:346.55px" class="cls_004"><span class="cls_004">social networking sites.</span></div>
<div style="position:absolute;left:100.44px;top:392.39px" class="cls_004"><span class="cls_004">XII. Malware</span></div>
<div style="position:absolute;left:124.92px;top:410.06px" class="cls_004"><span class="cls_004">Intentional installation of malware or malicious programs (i.e. viruses,</span></div>
<div style="position:absolute;left:100.44px;top:425.06px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:124.92px;top:424.58px" class="cls_004"><span class="cls_004">worms, Trojan horses, spyware, etc.) into the network, servers,</span></div>
<div style="position:absolute;left:506.59px;top:425.06px" class="cls_004"><span class="cls_004"><?echo $penalty['field_141'];?></span></div>
<div style="position:absolute;left:124.92px;top:439.10px" class="cls_004"><span class="cls_004">workstations or any computer systems.</span></div>
<div style="position:absolute;left:124.92px;top:474.02px" class="cls_004"><span class="cls_004">Writing, compiling, copying, propagating, executing or attempting to</span></div>
<div style="position:absolute;left:124.92px;top:488.54px" class="cls_004"><span class="cls_004">introduce any computer code with semblance to malicious software that</span></div>
<div style="position:absolute;left:100.44px;top:496.34px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:506.59px;top:496.34px" class="cls_004"><span class="cls_004"><?echo $penalty['field_142'];?></span></div>
<div style="position:absolute;left:124.92px;top:503.06px" class="cls_004"><span class="cls_004">is designed to damage or otherwise hinder the performance of any</span></div>
<div style="position:absolute;left:124.92px;top:517.60px" class="cls_004"><span class="cls_004">information system</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:5445px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background10.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:100.44px;top:85.14px" class="cls_004"><span class="cls_004">XIII. Data Security and Document Handling</span></div>
<div style="position:absolute;left:124.92px;top:115.50px" class="cls_004"><span class="cls_004">Unauthorized copying, distribution, and/or modification of the compay's</span></div>
<div style="position:absolute;left:100.44px;top:123.30px" class="cls_004"><span class="cls_004">1</span><?echo $penalty['field_143'];?></div>
<div style="position:absolute;left:506.59px;top:123.30px" class="cls_004"><span class="cls_004"><?echo $penalty['field_144'];?></span></div>
<div style="position:absolute;left:124.92px;top:130.02px" class="cls_004"><span class="cls_004">licensed programs, proprietary applications and source codes.</span></div>
<div style="position:absolute;left:100.44px;top:176.70px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:124.92px;top:176.22px" class="cls_004"><span class="cls_004">Actions that violate company / local/ international copyright, trade secret,</span></div>
<div style="position:absolute;left:506.59px;top:176.70px" class="cls_004"><span class="cls_004"><?echo $penalty['field_145'];?></span></div>
<div style="position:absolute;left:124.92px;top:208.29px" class="cls_004"><span class="cls_004">a</span></div>
<div style="position:absolute;left:143.04px;top:210.33px" class="cls_004"><span class="cls_004">The installation or distribution of pirated or other software products</span></div>
<div style="position:absolute;left:143.04px;top:224.85px" class="cls_004"><span class="cls_004">that are not appropriately licensed  for use by the company;</span></div>
<div style="position:absolute;left:143.04px;top:256.77px" class="cls_004"><span class="cls_004">Use of digital versions of copyrighted photographs from magazines,</span></div>
<div style="position:absolute;left:124.92px;top:270.45px" class="cls_004"><span class="cls_004">b</span></div>
<div style="position:absolute;left:143.04px;top:271.29px" class="cls_004"><span class="cls_004">books or music, movies without the company's written permission</span></div>
<div style="position:absolute;left:143.04px;top:285.81px" class="cls_004"><span class="cls_004">from the owners/authors; and</span></div>
<div style="position:absolute;left:124.92px;top:332.15px" class="cls_004"><span class="cls_004">c</span></div>
<div style="position:absolute;left:143.04px;top:333.71px" class="cls_004"><span class="cls_004">Exporting software, technical information, encryption software or</span></div>
<div style="position:absolute;left:143.04px;top:348.23px" class="cls_004"><span class="cls_004">technology in violation of international or regional exports control law</span></div>
<div style="position:absolute;left:124.92px;top:379.55px" class="cls_004"><span class="cls_004">Unauthorized use of external back-up equipment, including portable</span></div>
<div style="position:absolute;left:100.44px;top:394.55px" class="cls_004"><span class="cls_004">3</span></div>
<div style="position:absolute;left:124.92px;top:394.07px" class="cls_004"><span class="cls_004">storage media such as USB disks, thumb drives, and other memory based</span></div>
<div style="position:absolute;left:502.03px;top:394.55px" class="cls_004"><span class="cls_004"><?echo $penalty['field_146'];?></span></div>
<div style="position:absolute;left:593.71px;top:394.55px" class="cls_004"><span class="cls_004"><?echo $penalty['field_147'];?></span></div>
<div style="position:absolute;left:124.92px;top:408.62px" class="cls_004"><span class="cls_004">devices, for personal back-up use.</span></div>
<div style="position:absolute;left:100.44px;top:456.26px" class="cls_004"><span class="cls_004">XIV. Network Security</span></div>
<div style="position:absolute;left:124.92px;top:476.78px" class="cls_004"><span class="cls_004">Disruption of network and system processes/communications that may</span></div>
<div style="position:absolute;left:100.44px;top:484.58px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:502.03px;top:484.58px" class="cls_004"><span class="cls_004"><?echo $penalty['field_148'];?></span></div>
<div style="position:absolute;left:593.71px;top:484.58px" class="cls_004"><span class="cls_004"><?echo $penalty['field_149'];?></span></div>
<div style="position:absolute;left:124.92px;top:491.30px" class="cls_004"><span class="cls_004">lead to the disruption of company processes and operations</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:6050px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background11.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:124.92px;top:54.16px" class="cls_004"><span class="cls_004">Using any program/ script/ command or sending messages of any kind,</span></div>
<div style="position:absolute;left:100.44px;top:69.16px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:124.92px;top:68.68px" class="cls_004"><span class="cls_004">with the intent to interfere with, or disable, a user's terminal session,</span></div>
<div style="position:absolute;left:506.59px;top:69.16px" class="cls_004"><span class="cls_004">><?echo $penalty['field_150'];?></span></div>
<div style="position:absolute;left:124.92px;top:83.22px" class="cls_004"><span class="cls_004">through any means, locally or through the Internet.</span></div>
<div style="position:absolute;left:100.44px;top:121.74px" class="cls_004"><span class="cls_004">3</span></div>
<div style="position:absolute;left:124.92px;top:121.26px" class="cls_004"><span class="cls_004">Using the corporate network or computer to play games.</span></div>
<div style="position:absolute;left:502.03px;top:121.74px" class="cls_004"><span class="cls_004"><?echo $penalty['field_151'];?></span></div>
<div style="position:absolute;left:593.71px;top:121.74px" class="cls_004"><span class="cls_004"><?echo $penalty['field_152'];?></span></div>
<div style="position:absolute;left:100.44px;top:159.90px" class="cls_004"><span class="cls_004">4</span></div>
<div style="position:absolute;left:124.92px;top:159.42px" class="cls_004"><span class="cls_004">System Access / User IDs</span></div>
<div style="position:absolute;left:143.04px;top:183.18px" class="cls_004"><span class="cls_004">Failure or negligence to discharge official functions and responsibilities</span></div>
<div style="position:absolute;left:124.92px;top:197.73px" class="cls_004"><span class="cls_004">a</span></div>
<div style="position:absolute;left:143.04px;top:197.73px" class="cls_004"><span class="cls_004">relative to system access, or, purposely deprive an authorized user of</span></div>
<div style="position:absolute;left:502.03px;top:197.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_153'];?></span></div>
<div style="position:absolute;left:593.71px;top:197.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_154'];?></span></div>
<div style="position:absolute;left:143.04px;top:212.25px" class="cls_004"><span class="cls_004">access to any company application or resource.</span></div>
<div style="position:absolute;left:143.04px;top:253.77px" class="cls_004"><span class="cls_004">Revealing account password of company resources to others or</span></div>
<div style="position:absolute;left:124.92px;top:266.73px" class="cls_004"><span class="cls_004">b</span></div>
<div style="position:absolute;left:143.04px;top:268.29px" class="cls_004"><span class="cls_004">allowing use of the account by others. This includes family and other</span></div>
<div style="position:absolute;left:502.03px;top:266.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_155'];?></span></div>
<div style="position:absolute;left:593.71px;top:266.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_156'];?></span></div>
<div style="position:absolute;left:143.04px;top:282.81px" class="cls_004"><span class="cls_004">househould members when work is being done at home.</span></div>
<div style="position:absolute;left:143.04px;top:315.47px" class="cls_004"><span class="cls_004">Abuse of user credentials assigned to him with the intent to sabotage</span></div>
<div style="position:absolute;left:124.92px;top:328.79px" class="cls_004"><span class="cls_004">c</span></div>
<div style="position:absolute;left:143.04px;top:329.99px" class="cls_004"><span class="cls_004">or disrupt systems, steal sensitive information, compromise accounts</span></div>
<div style="position:absolute;left:506.59px;top:328.79px" class="cls_004"><span class="cls_004"><?echo $penalty['field_157'];?></span></div>
<div style="position:absolute;left:143.04px;top:344.51px" class="cls_004"><span class="cls_004">and other malicious purposes.</span></div>
<div style="position:absolute;left:143.04px;top:377.87px" class="cls_004"><span class="cls_004">Unauthorized use and/or abuse of Admistrator-level accounts or IDs,</span></div>
<div style="position:absolute;left:124.92px;top:390.83px" class="cls_004"><span class="cls_004">d</span></div>
<div style="position:absolute;left:143.04px;top:392.39px" class="cls_004"><span class="cls_004">or creation of secret/ undisclosed/ rogue User IDs and passwords with</span></div>
<div style="position:absolute;left:502.03px;top:390.83px" class="cls_004"><span class="cls_004"><?echo $penalty['field_158'];?></span></div>
<div style="position:absolute;left:593.71px;top:390.83px" class="cls_004"><span class="cls_004"><?echo $penalty['field_159'];?></span></div>
<div style="position:absolute;left:143.04px;top:406.94px" class="cls_004"><span class="cls_004">special system privileges.</span></div>
<div style="position:absolute;left:124.92px;top:437.66px" class="cls_004"><span class="cls_004">e</span></div>
<div style="position:absolute;left:143.04px;top:438.26px" class="cls_004"><span class="cls_004">Unauthorized sharing of network folders</span></div>
<div style="position:absolute;left:502.03px;top:437.66px" class="cls_004"><span class="cls_004"><?echo $penalty['field_160'];?></span></div>
<div style="position:absolute;left:593.71px;top:437.66px" class="cls_004"><span class="cls_004"><?echo $penalty['field_161'];?></span></div>
<div style="position:absolute;left:83.04px;top:468.02px" class="cls_003"><span class="cls_003">B. OFFENSES AGAINST MORAL VALUES AND PROPER CONDUCT / WORK ETHICS</span></div>
<div style="position:absolute;left:100.44px;top:498.98px" class="cls_004"><span class="cls_004">I.</span></div>
<div style="position:absolute;left:124.92px;top:498.98px" class="cls_004"><span class="cls_004">Insubordination</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:6655px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background12.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:124.92px;top:62.92px" class="cls_004"><span class="cls_004">a)</span></div>
<div style="position:absolute;left:143.04px;top:62.92px" class="cls_004"><span class="cls_004">Insubordination or willfull refusal to carry out verbal or written orders.</span></div>
<div style="position:absolute;left:502.03px;top:62.92px" class="cls_004"><span class="cls_004"><?echo $penalty['field_162'];?></span></div>
<div style="position:absolute;left:593.71px;top:62.92px" class="cls_004"><span class="cls_004"><?echo $penalty['field_163'];?></span></div>
<div style="position:absolute;left:124.92px;top:101.82px" class="cls_004"><span class="cls_004">b)</span></div>
<div style="position:absolute;left:143.04px;top:101.82px" class="cls_004"><span class="cls_004">Willful Insubordination</span></div>
<div style="position:absolute;left:502.03px;top:101.82px" class="cls_004"><span class="cls_004"><?echo $penalty['field_164'];?></span></div>
<div style="position:absolute;left:593.71px;top:101.82px" class="cls_004"><span class="cls_004"><?echo $penalty['field_165'];?></span></div>
<div style="position:absolute;left:143.04px;top:133.74px" class="cls_004"><span class="cls_004">1) Willful refusal to cooperate, for no valid reason, during an</span></div>
<div style="position:absolute;left:143.04px;top:148.26px" class="cls_004"><span class="cls_004">investigation conducted by the Company.</span></div>
<div style="position:absolute;left:143.04px;top:183.78px" class="cls_004"><span class="cls_004">2) Willful refusal to company-mandated medical examination</span></div>
<div style="position:absolute;left:143.04px;top:220.05px" class="cls_004"><span class="cls_004">3) Failure to report for overtime without good reason, after being</span></div>
<div style="position:absolute;left:143.04px;top:234.57px" class="cls_004"><span class="cls_004">scheduled to work according to overtime policy.</span></div>
<div style="position:absolute;left:143.04px;top:269.37px" class="cls_004"><span class="cls_004">Disrespect, insult or use of foul language towards any superior, officer,</span></div>
<div style="position:absolute;left:124.92px;top:276.57px" class="cls_004"><span class="cls_004">c)</span></div>
<div style="position:absolute;left:502.03px;top:276.57px" class="cls_004"><span class="cls_004"><?echo $penalty['field_166'];?></span></div>
<div style="position:absolute;left:593.71px;top:276.57px" class="cls_004"><span class="cls_004"><?echo $penalty['field_167'];?></span></div>
<div style="position:absolute;left:143.04px;top:283.89px" class="cls_004"><span class="cls_004">staff, agency, contractual personnel or client.</span></div>
<div style="position:absolute;left:143.04px;top:323.03px" class="cls_004"><span class="cls_004">Unruly and disorderly behavior within the Company premises and any</span></div>
<div style="position:absolute;left:124.92px;top:330.35px" class="cls_004"><span class="cls_004">d)</span></div>
<div style="position:absolute;left:502.03px;top:330.35px" class="cls_004"><span class="cls_004"><?echo $penalty['field_168'];?></span></div>
<div style="position:absolute;left:593.71px;top:330.35px" class="cls_004"><span class="cls_004"><?echo $penalty['field_169'];?></span></div>
<div style="position:absolute;left:143.04px;top:337.55px" class="cls_004"><span class="cls_004">conduct which causes unnecessary disruption of Company operations.</span></div>
<div style="position:absolute;left:124.92px;top:374.63px" class="cls_004"><span class="cls_004">e)</span></div>
<div style="position:absolute;left:143.04px;top:374.63px" class="cls_004"><span class="cls_004">Acts of negligence that may or may not result in losses.</span></div>
<div style="position:absolute;left:502.03px;top:374.63px" class="cls_004"><span class="cls_004"><?echo $penalty['field_170'];?></span></div>
<div style="position:absolute;left:593.71px;top:374.63px" class="cls_004"><span class="cls_004"><?echo $penalty['field_171'];?></span></div>
<div style="position:absolute;left:143.04px;top:404.39px" class="cls_004"><span class="cls_004">Acts of gross negligence that may or may not result in losses; acts of</span></div>
<div style="position:absolute;left:143.04px;top:418.94px" class="cls_004"><span class="cls_004">gross negligence resulting in substancial losses. (penalty may be</span></div>
<div style="position:absolute;left:124.92px;top:426.14px" class="cls_004"><span class="cls_004">f)</span></div>
<div style="position:absolute;left:502.03px;top:426.14px" class="cls_004"><span class="cls_004"><?echo $penalty['field_172'];?></span></div>
<div style="position:absolute;left:593.71px;top:426.14px" class="cls_004"><span class="cls_004"><?echo $penalty['field_173'];?></span></div>
<div style="position:absolute;left:143.04px;top:433.46px" class="cls_004"><span class="cls_004">accelarated to higher penalty as may be provided under the</span></div>
<div style="position:absolute;left:143.04px;top:447.98px" class="cls_004"><span class="cls_004">circumstances)</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:7260px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background13.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:143.04px;top:65.20px" class="cls_004"><span class="cls_004">Failure or refusal to attend company mandated and paid trainings,</span></div>
<div style="position:absolute;left:124.92px;top:79.72px" class="cls_004"><span class="cls_004">g)</span></div>
<div style="position:absolute;left:143.04px;top:79.72px" class="cls_004"><span class="cls_004">seminars and activities that are considered vital to the operaton of the</span></div>
<div style="position:absolute;left:502.03px;top:79.72px" class="cls_004"><span class="cls_004"><?echo $penalty['field_174'];?></span></div>
<div style="position:absolute;left:593.71px;top:79.72px" class="cls_004"><span class="cls_004"><?echo $penalty['field_175'];?></span></div>
<div style="position:absolute;left:143.04px;top:94.26px" class="cls_004"><span class="cls_004">company. (penalty: based on actual training fee cost)</span></div>
<div style="position:absolute;left:143.04px;top:135.30px" class="cls_004"><span class="cls_004">Refusing to accept assigned tasks as provided in the memorandum</span></div>
<div style="position:absolute;left:143.04px;top:149.82px" class="cls_004"><span class="cls_004">issued to employees transferring the latter to any offices of the</span></div>
<div style="position:absolute;left:124.92px;top:157.02px" class="cls_004"><span class="cls_004">h)</span></div>
<div style="position:absolute;left:502.03px;top:157.02px" class="cls_004"><span class="cls_004"><?echo $penalty['field_176'];?></span></div>
<div style="position:absolute;left:593.71px;top:157.02px" class="cls_004"><span class="cls_004"><?echo $penalty['field_177'];?></span></div>
<div style="position:absolute;left:143.04px;top:164.34px" class="cls_004"><span class="cls_004">company, when employees' skills is highly needed, unless refusal is</span></div>
<div style="position:absolute;left:143.04px;top:178.86px" class="cls_004"><span class="cls_004">justified.</span></div>
<div style="position:absolute;left:100.44px;top:224.61px" class="cls_004"><span class="cls_004">II.</span></div>
<div style="position:absolute;left:124.92px;top:224.61px" class="cls_004"><span class="cls_004">BRIBERY</span></div>
<div style="position:absolute;left:124.92px;top:239.85px" class="cls_004"><span class="cls_004">(penalty would depend upon the seriousness of the offense)</span></div>
<div style="position:absolute;left:502.03px;top:296.49px" class="cls_004"><span class="cls_004"><?echo $penalty['field_178'];?></span></div>
<div style="position:absolute;left:143.04px;top:289.29px" class="cls_004"><span class="cls_004">Accepting anything in exchange for a job, work assignment, work</span></div>
<div style="position:absolute;left:124.92px;top:296.49px" class="cls_004"><span class="cls_004">a)</span></div>
<div style="position:absolute;left:143.04px;top:303.83px" class="cls_004"><span class="cls_004">location of favorable condition of employment.</span></div>
<div style="position:absolute;left:502.03px;top:408.50px" class="cls_004"><span class="cls_004"><?echo $penalty['field_179'];?></span></div>
<div style="position:absolute;left:143.04px;top:393.95px" class="cls_004"><span class="cls_004">Asking or accepting any consideration, financial or in kind, when</span></div>
<div style="position:absolute;left:124.92px;top:408.50px" class="cls_004"><span class="cls_004">b)</span></div>
<div style="position:absolute;left:143.04px;top:408.50px" class="cls_004"><span class="cls_004">facilitating a transaction with the Company.</span></div>
<div style="position:absolute;left:143.04px;top:423.02px" class="cls_004"><span class="cls_004">(consistent with Sec. 26 (a) (3) of R.A. 7353)</span></div>
<div style="position:absolute;left:143.04px;top:486.50px" class="cls_004"><span class="cls_004">Acceptance of cash gifts valued from clients/suppliers and the failure</span></div>
<div style="position:absolute;left:124.92px;top:493.82px" class="cls_004"><span class="cls_004">c)</span></div>
<div style="position:absolute;left:506.59px;top:493.82px" class="cls_004"><span class="cls_004"><?echo $penalty['field_180'];?></span></div>
<div style="position:absolute;left:143.04px;top:501.02px" class="cls_004"><span class="cls_004">to report such to proper Company authorities.</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:7865px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background14.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:143.04px;top:55.00px" class="cls_004"><span class="cls_004">Unauthorized collections or solicitation of funds either directly or</span></div>
<div style="position:absolute;left:124.92px;top:69.52px" class="cls_004"><span class="cls_004">d)</span></div>
<div style="position:absolute;left:143.04px;top:69.52px" class="cls_004"><span class="cls_004">indirectly, unless there is prior written approval from the</span></div>
<div style="position:absolute;left:506.59px;top:69.52px" class="cls_004"><span class="cls_004"><?echo $penalty['field_181'];?></span></div>
<div style="position:absolute;left:143.04px;top:84.06px" class="cls_004"><span class="cls_004">management.</span></div>
<div style="position:absolute;left:143.04px;top:114.54px" class="cls_004"><span class="cls_004">Using position in order to acquire funds forcefully regardless of the</span></div>
<div style="position:absolute;left:143.04px;top:129.06px" class="cls_004"><span class="cls_004">intention of the solicitation, whether it benefited all the employees or</span></div>
<div style="position:absolute;left:124.92px;top:136.26px" class="cls_004"><span class="cls_004">e)</span></div>
<div style="position:absolute;left:506.59px;top:136.26px" class="cls_004"><span class="cls_004"><?echo $penalty['field_182'];?></span></div>
<div style="position:absolute;left:143.04px;top:143.58px" class="cls_004"><span class="cls_004">not, provided that the employee solicited cannot refuse due to moral</span></div>
<div style="position:absolute;left:143.04px;top:158.10px" class="cls_004"><span class="cls_004">influence and ascendary over the employee.</span></div>
<div style="position:absolute;left:100.44px;top:203.49px" class="cls_004"><span class="cls_004">III.</span></div>
<div style="position:absolute;left:124.92px;top:203.01px" class="cls_004"><span class="cls_004">Engaging in any activity that is in violation of common decency and</span></div>
<div style="position:absolute;left:124.92px;top:218.73px" class="cls_004"><span class="cls_004">1)</span></div>
<div style="position:absolute;left:143.04px;top:218.73px" class="cls_004"><span class="cls_004">Wearing of revealing clothes.</span></div>
<div style="position:absolute;left:503.83px;top:218.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_183'];?></span></div>
<div style="position:absolute;left:587.35px;top:218.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_184'];?></span></div>
<div style="position:absolute;left:668.98px;top:218.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_185'];?></span></div>
<div style="position:absolute;left:753.10px;top:218.73px" class="cls_004"><span class="cls_004"><?echo $penalty['field_186'];?></span></div>
<div style="position:absolute;left:143.04px;top:250.65px" class="cls_004"><span class="cls_004">Use of defamatory and/or offensive words during conversations with</span></div>
<div style="position:absolute;left:124.92px;top:257.85px" class="cls_004"><span class="cls_004">2)</span></div>
<div style="position:absolute;left:502.03px;top:257.85px" class="cls_004"><span class="cls_004"><?echo $penalty['field_187'];?></span></div>
<div style="position:absolute;left:593.71px;top:257.85px" class="cls_004"><span class="cls_004"><?echo $penalty['field_188'];?></span></div>
<div style="position:absolute;left:143.04px;top:265.17px" class="cls_004"><span class="cls_004">clients;</span></div>
<div style="position:absolute;left:143.04px;top:299.27px" class="cls_004"><span class="cls_004">Abusive or rude behavior toward the company or its customers or and</span></div>
<div style="position:absolute;left:124.92px;top:306.47px" class="cls_004"><span class="cls_004">3)</span></div>
<div style="position:absolute;left:502.03px;top:306.47px" class="cls_004"><span class="cls_004"><?echo $penalty['field_189'];?></span></div>
<div style="position:absolute;left:593.71px;top:306.47px" class="cls_004"><span class="cls_004"><?echo $penalty['field_190'];?></span></div>
<div style="position:absolute;left:143.04px;top:313.79px" class="cls_004"><span class="cls_004">acquiantance of the Company.</span></div>
<div style="position:absolute;left:143.04px;top:349.31px" class="cls_004"><span class="cls_004">Love affair with married man or woman. (Adultery and concubinage as</span></div>
<div style="position:absolute;left:124.92px;top:356.63px" class="cls_004"><span class="cls_004">4)</span></div>
<div style="position:absolute;left:502.03px;top:356.63px" class="cls_004"><span class="cls_004"><?echo $penalty['field_191'];?></span></div>
<div style="position:absolute;left:593.71px;top:356.63px" class="cls_004"><span class="cls_004"><?echo $penalty['field_192'];?></span></div>
<div style="position:absolute;left:143.04px;top:363.83px" class="cls_004"><span class="cls_004">provided under the RPC)</span></div>
<div style="position:absolute;left:143.04px;top:402.35px" class="cls_004"><span class="cls_004">Love affair with co-workers regardless of gender, sexual orientation or</span></div>
<div style="position:absolute;left:124.92px;top:409.70px" class="cls_004"><span class="cls_004">5)</span></div>
<div style="position:absolute;left:502.03px;top:409.70px" class="cls_004"><span class="cls_004"><?echo $penalty['field_193'];?></span></div>
<div style="position:absolute;left:593.71px;top:409.70px" class="cls_004"><span class="cls_004"><?echo $penalty['field_194'];?></span></div>
<div style="position:absolute;left:143.04px;top:416.90px" class="cls_004"><span class="cls_004">other protected characteristics</span></div>
<div style="position:absolute;left:100.44px;top:454.58px" class="cls_006"><span class="cls_006">IV.   Breach of Conflict-of-Interest Policy</span></div>
<div style="position:absolute;left:502.03px;top:452.54px" class="cls_004"><span class="cls_004"><?echo $penalty['field_195'];?></span></div>
<div style="position:absolute;left:593.71px;top:452.54px" class="cls_004"><span class="cls_004"><?echo $penalty['field_196'];?></span></div>
<div style="position:absolute;left:100.44px;top:498.26px" class="cls_004"><span class="cls_004">V.</span></div>
<div style="position:absolute;left:124.92px;top:498.26px" class="cls_004"><span class="cls_004">Alcoholism:</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:8470px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background15.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:143.04px;top:57.16px" class="cls_004"><span class="cls_004">Drinking any alcoholic beverages within the premises of the company</span></div>
<div style="position:absolute;left:124.92px;top:64.36px" class="cls_004"><span class="cls_004">a)</span></div>
<div style="position:absolute;left:502.03px;top:64.36px" class="cls_004"><span class="cls_004"><?echo $penalty['field_197'];?></span></div>
<div style="position:absolute;left:593.71px;top:64.36px" class="cls_004"><span class="cls_004"><?echo $penalty['field_198'];?></span></div>
<div style="position:absolute;left:143.04px;top:71.68px" class="cls_004"><span class="cls_004">unless on authorized occasions.</span></div>
<div style="position:absolute;left:143.04px;top:105.42px" class="cls_004"><span class="cls_004">Unauthorized bringing and drinking of alcoholic beverages inside the</span></div>
<div style="position:absolute;left:124.92px;top:112.62px" class="cls_004"><span class="cls_004">b)</span></div>
<div style="position:absolute;left:502.03px;top:112.62px" class="cls_004"><span class="cls_004"><?echo $penalty['field_199'];?></span></div>
<div style="position:absolute;left:593.71px;top:112.62px" class="cls_004"><span class="cls_004"><?echo $penalty['field_200'];?></span></div>
<div style="position:absolute;left:143.04px;top:119.94px" class="cls_004"><span class="cls_004">workplace,</span></div>
<div style="position:absolute;left:143.04px;top:150.06px" class="cls_004"><span class="cls_004">Reporting to work under the influence of alcohol. This may also</span></div>
<div style="position:absolute;left:124.92px;top:164.58px" class="cls_004"><span class="cls_004">c)</span></div>
<div style="position:absolute;left:143.04px;top:164.58px" class="cls_004"><span class="cls_004">include reporting to work after a previous night's heavy intake of</span></div>
<div style="position:absolute;left:502.03px;top:164.58px" class="cls_004"><span class="cls_004"><?echo $penalty['field_201'];?></span></div>
<div style="position:absolute;left:593.71px;top:164.58px" class="cls_004"><span class="cls_004"><?echo $penalty['field_202'];?></span></div>
<div style="position:absolute;left:143.04px;top:179.10px" class="cls_004"><span class="cls_004">alcohol, in which the performance of the employee is affected.</span></div>
<div style="position:absolute;left:143.04px;top:209.61px" class="cls_004"><span class="cls_004">Possession, sale and distribution of alcoholic beverages within the</span></div>
<div style="position:absolute;left:124.92px;top:216.81px" class="cls_004"><span class="cls_004">d)</span></div>
<div style="position:absolute;left:502.03px;top:216.81px" class="cls_004"><span class="cls_004"><?echo $penalty['field_203'];?></span></div>
<div style="position:absolute;left:593.71px;top:216.81px" class="cls_004"><span class="cls_004"><?echo $penalty['field_204'];?></span></div>
<div style="position:absolute;left:143.04px;top:224.13px" class="cls_004"><span class="cls_004">company premises.</span></div>
<div style="position:absolute;left:100.44px;top:270.93px" class="cls_004"><span class="cls_004">VI.</span></div>
<div style="position:absolute;left:124.92px;top:270.93px" class="cls_004"><span class="cls_004">Prohibited Drugs</span></div>
<div style="position:absolute;left:143.04px;top:287.61px" class="cls_004"><span class="cls_004">Sale, use, possession and distribution of prohibited and regulated</span></div>
<div style="position:absolute;left:502.03px;top:294.81px" class="cls_004"><span class="cls_004"><?echo $penalty['field_205'];?></span></div>
<div style="position:absolute;left:124.92px;top:302.15px" class="cls_004"><span class="cls_004">a)</span></div>
<div style="position:absolute;left:143.04px;top:302.15px" class="cls_004"><span class="cls_004">drugs, and other related paraphernalias which are considered illegal in</span></div>
<div style="position:absolute;left:143.04px;top:316.67px" class="cls_004"><span class="cls_004">accordance with law.</span></div>
<div style="position:absolute;left:502.03px;top:350.75px" class="cls_004"><span class="cls_004"><?echo $penalty['field_206'];?></span></div>
<div style="position:absolute;left:124.92px;top:357.95px" class="cls_004"><span class="cls_004">b)</span></div>
<div style="position:absolute;left:143.04px;top:357.95px" class="cls_004"><span class="cls_004">Entering workplace under the influence of prohibited drugs</span></div>
<div style="position:absolute;left:502.03px;top:401.51px" class="cls_004"><span class="cls_004"><?echo $penalty['field_207'];?></span></div>
<div style="position:absolute;left:124.92px;top:408.86px" class="cls_004"><span class="cls_004">c)</span></div>
<div style="position:absolute;left:143.04px;top:408.86px" class="cls_004"><span class="cls_004">Laboratory findings of use of prohibited drugs</span></div>
<div style="position:absolute;left:124.92px;top:455.90px" class="cls_004"><span class="cls_004">Unauthorized carrying of firearms and/or discharge of other deadly</span></div>
<div style="position:absolute;left:100.44px;top:463.70px" class="cls_004"><span class="cls_004">VII.</span></div>
<div style="position:absolute;left:502.03px;top:463.70px" class="cls_004"><span class="cls_004"><?echo $penalty['field_208'];?></span></div>
<div style="position:absolute;left:593.71px;top:463.70px" class="cls_004"><span class="cls_004"><?echo $penalty['field_209'];?></span></div>
<div style="position:absolute;left:124.92px;top:470.42px" class="cls_004"><span class="cls_004">weapons within Company premises or during official company functions.</span></div>
<div style="position:absolute;left:100.44px;top:522.88px" class="cls_004"><span class="cls_004">VIII.</span></div>
<div style="position:absolute;left:124.92px;top:522.88px" class="cls_004"><span class="cls_004">Gambling: shall include but not limited to the following:</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:9075px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background16.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:143.04px;top:61.12px" class="cls_004"><span class="cls_004">Gambling, taking part in lottery or any other game of chance during</span></div>
<div style="position:absolute;left:124.92px;top:68.44px" class="cls_004"><span class="cls_004">1)</span></div>
<div style="position:absolute;left:502.03px;top:68.44px" class="cls_004"><span class="cls_004"><?echo $penalty['field_210'];?></span></div>
<div style="position:absolute;left:593.71px;top:68.44px" class="cls_004"><span class="cls_004"><?echo $penalty['field_211'];?></span></div>
<div style="position:absolute;left:143.04px;top:75.64px" class="cls_004"><span class="cls_004">working hours.</span></div>
<div style="position:absolute;left:143.04px;top:114.54px" class="cls_004"><span class="cls_004">Gambling, taking part in lottery or any other game of chance beyond</span></div>
<div style="position:absolute;left:124.92px;top:121.74px" class="cls_004"><span class="cls_004">2)</span></div>
<div style="position:absolute;left:502.03px;top:121.74px" class="cls_004"><span class="cls_004"><?echo $penalty['field_212'];?></span></div>
<div style="position:absolute;left:593.71px;top:121.74px" class="cls_004"><span class="cls_004"><?echo $penalty['field_213'];?></span></div>
<div style="position:absolute;left:143.04px;top:129.06px" class="cls_004"><span class="cls_004">working hours but within company premises.</span></div>
<div style="position:absolute;left:124.92px;top:161.34px" class="cls_004"><span class="cls_004">3)</span></div>
<div style="position:absolute;left:143.04px;top:161.34px" class="cls_004"><span class="cls_004">Illegal gambling, at anytime. (under Art. 195-199 of the RPC)</span></div>
<div style="position:absolute;left:502.03px;top:161.34px" class="cls_004"><span class="cls_004"><?echo $penalty['field_214'];?></span></div>
<div style="position:absolute;left:593.71px;top:161.34px" class="cls_004"><span class="cls_004"><?echo $penalty['field_215'];?></span></div>
<div style="position:absolute;left:100.44px;top:207.09px" class="cls_004"><span class="cls_004">IX.</span></div>
<div style="position:absolute;left:124.92px;top:206.61px" class="cls_004"><span class="cls_004">Use of and bringing home of Company's equipment, office materials,</span></div>
<div style="position:absolute;left:124.92px;top:229.53px" class="cls_004"><span class="cls_004">a)</span></div>
<div style="position:absolute;left:143.04px;top:229.53px" class="cls_004"><span class="cls_004">Bringing home of company property without prior written approval.</span></div>
<div style="position:absolute;left:502.03px;top:229.53px" class="cls_004"><span class="cls_004"><<?echo $penalty['field_216'];?></span></div>
<div style="position:absolute;left:593.71px;top:229.53px" class="cls_004"><span class="cls_004"><?echo $penalty['field_217'];?></span></div>
<div style="position:absolute;left:124.92px;top:267.33px" class="cls_004"><span class="cls_004">*</span></div>
<div style="position:absolute;left:143.04px;top:267.45px" class="cls_004"><span class="cls_004">and the like, the penalty asprovided will be imposed.</span></div>
<div style="position:absolute;left:124.92px;top:297.81px" class="cls_004"><span class="cls_004">*</span></div>
<div style="position:absolute;left:143.04px;top:297.93px" class="cls_004"><span class="cls_004">be imposed on its higher period regardless of occurrence.</span></div>
<div style="position:absolute;left:143.04px;top:331.91px" class="cls_004"><span class="cls_004">Unauthorized bringing of company properties outside the company</span></div>
<div style="position:absolute;left:124.92px;top:339.23px" class="cls_004"><span class="cls_004">b)</span></div>
<div style="position:absolute;left:502.03px;top:339.23px" class="cls_004"><span class="cls_004"><?echo $penalty['field_218'];?></span></div>
<div style="position:absolute;left:593.71px;top:339.23px" class="cls_004"><span class="cls_004"><?echo $penalty['field_219'];?></span></div>
<div style="position:absolute;left:143.04px;top:346.43px" class="cls_004"><span class="cls_004">premises without permission.</span></div>
<div style="position:absolute;left:100.44px;top:380.63px" class="cls_004"><span class="cls_004">X.</span></div>
<div style="position:absolute;left:124.92px;top:380.15px" class="cls_004"><span class="cls_004">Accepting outside employment or engaging in businesss activities without</span></div>
<div style="position:absolute;left:143.04px;top:411.86px" class="cls_004"><span class="cls_004">Working with other institutions or Company which is directly or</span></div>
<div style="position:absolute;left:124.92px;top:426.38px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:143.04px;top:426.38px" class="cls_004"><span class="cls_004">indirectly similar to the business of Better Bound Advertising while still</span></div>
<div style="position:absolute;left:506.59px;top:426.38px" class="cls_004"><span class="cls_004"><?echo $penalty['field_220'];?></span></div>
<div style="position:absolute;left:143.04px;top:440.90px" class="cls_004"><span class="cls_004">employed.</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:9680px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background17.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:143.04px;top:55.60px" class="cls_004"><span class="cls_004">Accepting part-time jobs which directly affects the employees work</span></div>
<div style="position:absolute;left:143.04px;top:70.12px" class="cls_004"><span class="cls_004">schedule in the company. In cases, there are company related</span></div>
<div style="position:absolute;left:124.92px;top:84.06px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:143.04px;top:84.66px" class="cls_004"><span class="cls_004">activities beyond the working schedule of the employee and the</span></div>
<div style="position:absolute;left:502.03px;top:84.06px" class="cls_004"><span class="cls_004"><?echo $penalty['field_221'];?></span></div>
<div style="position:absolute;left:593.71px;top:84.06px" class="cls_004"><span class="cls_004"><?echo $penalty['field_222'];?></span></div>
<div style="position:absolute;left:143.04px;top:99.18px" class="cls_004"><span class="cls_004">latter's presence is highly needed, company's work should be given</span></div>
<div style="position:absolute;left:143.04px;top:113.70px" class="cls_004"><span class="cls_004">preference.</span></div>
<div style="position:absolute;left:100.44px;top:144.06px" class="cls_004"><span class="cls_004">XI.</span></div>
<div style="position:absolute;left:124.92px;top:143.58px" class="cls_004"><span class="cls_004">Inducing another to commit a wrong violation</span></div>
<div style="position:absolute;left:506.59px;top:144.06px" class="cls_004"><span class="cls_004"><?echo $penalty['field_223'];?></span></div>
<div style="position:absolute;left:124.92px;top:158.82px" class="cls_004"><span class="cls_004">* The violation referred to could either be against company policies or</span></div>
<div style="position:absolute;left:502.03px;top:237.33px" class="cls_004"><span class="cls_004"><?echo $penalty['field_224'];?></span></div>
<div style="position:absolute;left:124.92px;top:215.13px" class="cls_004"><span class="cls_004">Performing acts and/or making pronouncements binding upon, or in</span></div>
<div style="position:absolute;left:100.44px;top:230.13px" class="cls_004"><span class="cls_004">XII.</span></div>
<div style="position:absolute;left:124.92px;top:229.65px" class="cls_004"><span class="cls_004">representation of the Company, directors, co-employees and clients</span></div>
<div style="position:absolute;left:124.92px;top:244.17px" class="cls_004"><span class="cls_004">without proper authority.</span></div>
<div style="position:absolute;left:100.44px;top:316.19px" class="cls_004"><span class="cls_004">XIII.</span></div>
<div style="position:absolute;left:124.92px;top:315.71px" class="cls_004"><span class="cls_004">Acting in such a manner that puts the Company in a position considered to</span></div>
<div style="position:absolute;left:143.04px;top:345.23px" class="cls_004"><span class="cls_004">Acts or omissions resulting to or may result in material loss or</span></div>
<div style="position:absolute;left:133.80px;top:359.75px" class="cls_004"><span class="cls_004">1</span></div>
<div style="position:absolute;left:143.04px;top:359.75px" class="cls_004"><span class="cls_004">damage, or abnormal risk or danger to the safety, stability, liquidity, or</span></div>
<div style="position:absolute;left:506.59px;top:359.75px" class="cls_004"><span class="cls_004"><?echo $penalty['field_225'];?></span></div>
<div style="position:absolute;left:143.04px;top:374.27px" class="cls_004"><span class="cls_004">solvency of the company, creditors, investors/stockholders;</span></div>
<div style="position:absolute;left:143.04px;top:421.70px" class="cls_004"><span class="cls_004">Acts or omissions causing any undue injury, or have given any</span></div>
<div style="position:absolute;left:143.04px;top:436.22px" class="cls_004"><span class="cls_004">unwarranted benefits, advantage of preference to the Company or</span></div>
<div style="position:absolute;left:133.80px;top:449.06px" class="cls_004"><span class="cls_004">2</span></div>
<div style="position:absolute;left:143.04px;top:450.74px" class="cls_004"><span class="cls_004">any party in the discharge by the employee of his duties and</span></div>
<div style="position:absolute;left:506.59px;top:449.06px" class="cls_004"><span class="cls_004"><?echo $penalty['field_226'];?></span></div>
<div style="position:absolute;left:143.04px;top:465.26px" class="cls_004"><span class="cls_004">responsibilities through manifest partiality, evident bad faith or gross</span></div>
<div style="position:absolute;left:143.04px;top:479.78px" class="cls_004"><span class="cls_004">inexcusable negligence;</span></div>
</div>
<div style="position:absolute;left:50%;margin-left:-420px;top:10285px;width:841px;height:595px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="<?php echo base_url('images/penaltymatrix/background18.jpg')?>" width=841 height=595></div>
<div style="position:absolute;left:143.04px;top:56.92px" class="cls_004"><span class="cls_004">Those acts involving entering into any contract or transaction</span></div>
<div style="position:absolute;left:133.80px;top:70.24px" class="cls_004"><span class="cls_004">3</span></div>
<div style="position:absolute;left:143.04px;top:71.44px" class="cls_004"><span class="cls_004">manifestly and grossly disadvantageous to the Company, whether or</span></div>
<div style="position:absolute;left:506.59px;top:70.24px" class="cls_004"><span class="cls_004"><?echo $penalty['field_227'];?></span></div>
<div style="position:absolute;left:143.04px;top:85.98px" class="cls_004"><span class="cls_004">not the employee profited or will not profit thereby.</span></div>
<div style="position:absolute;left:124.92px;top:133.98px" class="cls_004"><span class="cls_004">Using the Company, its premises, or its properties for illegal and/or</span></div>
<div style="position:absolute;left:100.44px;top:141.78px" class="cls_004"><span class="cls_004">XIV.</span></div>
<div style="position:absolute;left:506.59px;top:141.78px" class="cls_004"><span class="cls_004"><?echo $penalty['field_228'];?></span></div>
<div style="position:absolute;left:124.92px;top:148.50px" class="cls_004"><span class="cls_004">immoral activities.</span></div>
<div style="position:absolute;left:100.44px;top:197.73px" class="cls_004"><span class="cls_004">XV.</span></div>
<div style="position:absolute;left:124.92px;top:197.25px" class="cls_004"><span class="cls_004">Using Company's time, materials, tools, machines, equipment, vehicles for</span></div>
<div style="position:absolute;left:124.92px;top:212.97px" class="cls_004"><span class="cls_004">a)</span></div>
<div style="position:absolute;left:143.04px;top:212.97px" class="cls_004"><span class="cls_004">The use of company computers and other office device for fun.</span></div>
<div style="position:absolute;left:502.03px;top:212.97px" class="cls_004"><span class="cls_004"><?echo $penalty['field_229'];?></span></div>
<div style="position:absolute;left:593.71px;top:212.97px" class="cls_004"><span class="cls_004"><?echo $penalty['field_230'];?></span></div>
<div style="position:absolute;left:143.04px;top:252.09px" class="cls_004"><span class="cls_004">Use of computer in playing games as a means to unwind during break</span></div>
<div style="position:absolute;left:124.92px;top:259.41px" class="cls_004"><span class="cls_004">b)</span></div>
<div style="position:absolute;left:502.03px;top:259.41px" class="cls_004"><span class="cls_004"><?echo $penalty['field_231'];?></span></div>
<div style="position:absolute;left:593.71px;top:259.41px" class="cls_004"><span class="cls_004"><?echo $penalty['field_232'];?></span></div>
<div style="position:absolute;left:143.04px;top:266.61px" class="cls_004"><span class="cls_004">time.</span></div>
<div style="position:absolute;left:100.44px;top:321.11px" class="cls_004"><span class="cls_004">XVI.</span></div>
<div style="position:absolute;left:124.92px;top:321.11px" class="cls_004"><span class="cls_004">Dishonesty</span></div>
<div style="position:absolute;left:143.04px;top:339.95px" class="cls_004"><span class="cls_004">Theft of the property of the Company, its employees, or its clients.</span></div>
<div style="position:absolute;left:124.92px;top:347.27px" class="cls_004"><span class="cls_004">a)</span></div>
<div style="position:absolute;left:506.59px;top:347.27px" class="cls_004"><span class="cls_004"><?echo $penalty['field_233'];?></span></div>
<div style="position:absolute;left:143.04px;top:354.47px" class="cls_004"><span class="cls_004">(under Art. 308-311 of the RPC)</span></div>
</div>

<!-- <input type="hidden" name="penalty_id" value="<?echo $penalty['penalty_id'];?>">

<button id="update_penalty" class="fab">Save</button> -->
<?php }
}else{ ?>
  <a href="<?echo base_url('dashboard/create_penalty_agent');?>" class="fab1 btn btn-primary" style="margin: 0 auto; float: none; margin-bottom: 10px;">Create Penalty Matrix template for this user</a>
<? } ?>

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

 <script>  
 
 $('#leaddataTable').DataTable();
</script>
  </body>
</html>
