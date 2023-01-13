<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/Horizons-favicons-1.png" type="image/x-icon" />

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
       <!-- Circular Progressbar Theme Style -->
    <link href="<?php echo base_url('css/circular_progressbar.css');?>" rel="stylesheet">

    <!-- Custom CSS for side Modal -->
    <link href="<?php echo base_url('css/sidemodal.css');?>" rel="stylesheet">

    <!-- Custom CSS for Comment Box -->
    <link href="<?php echo base_url('css/commentbox.css');?>" rel="stylesheet">


    <style type="text/css">
        .dz-message{
        text-align: center;
        font-size: 28px;
      }
      .content{
          width: 100%;
          padding: 5px;
          margin: 0 auto;
        }
       .content span{
          width: 250px;
        }
        #addleadmodal .modal-content, #update_coverdesignermodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
        #addreportModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #update_designer_report_modal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #detail_designer_report_modal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
        #viewreport_designermodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
        #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}

    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}

 .signup-form{width: 100%;}
 .signup-form input[type="checkbox"] {
    margin-top: 3px;
    text-align: center;
    margin: 0px auto;
}
.signup-form .btn {
    font-size: 16px;
    font-weight: bold;
    min-width: 111px;
    outline: none !important;
    width: 100%;
    display: inline-block;
}
.inline-block{
  margin: 15px 0px auto 0px;
}
label {
    display: inline-block;
    margin-bottom: .5rem;
    color: #000000;
}


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