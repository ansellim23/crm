<!DOCTYPE html>

<html lang="en">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="<?php echo base_url().'images/HORIZONS-LOGO-2.png';?>" type="image/ico" />



    <title>Horizons Literary  Management| </title>



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
    <link href="<?php echo base_url('css/sidemodal.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/editor.css');?>" rel="stylesheet">

    <style type="text/css">

        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}

    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}

    #approvalhistorymodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -445px;}

    #payleadmodal .modal-content{ width: 320% !important; margin-left: -510px !important;}

    #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}

    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}

    #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}0

    </style>
    <!-- evaluation -->
    <style>
        .fa-plus-circle{
            position: relative;
            top: 70px;
            left: 7px;
        }
    </style>

  </head>



  <body class="nav-md">

    <div class="container body">

      <div class="main_container">

        <div class="col-md-3 left_col">

          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">

              <a href="<?php echo base_url().'evaluation/';?>" class="site_title"><div class="image"> <span>Horizons Literary Management</div></a>

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

