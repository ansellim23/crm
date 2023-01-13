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
    <link href="<?php echo base_url('css/editor.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('datepicker/css/bootstrap-datepicker.css');?>" rel="stylesheet">

    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #approvalhistorymodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -445px;}
    #payleadmodal .modal-content{ width: 320% !important; margin-left: -510px !important;}
    #viewleadhistorymodal .modal-content, #emailhistoryModal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}
    #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}
    #addsubjectmodal .modal-content, #updatesubjectmodal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
    #emailModal .modal-content, #composemailModal .modal-content,  #messageModal .modal-content{padding: 0px 20px; width: 250%; margin-left: -440px;}
    #addsignaturemodal .modal-content{padding: 0px 20px; width: 300%; margin-left: -440px;}
    .Editor-container{
      background: #ffffff;
    } 
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
        width: 10%;
        display: inline-block;
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

              <?php include 'sidebar_agent.php'; ?>


        <!-- page content -->                     
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            
          </div>
        </div>
          <!-- /top tiles -->
  <form id="updatesubjectform"> 
  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>List Email Leads
         <div style="float:right; "> 
              <div class="alert alert-success"><p></p></div> 
                  <div class="form-group" style="display:inline-block">
                      <input type="text" class="form-control"  name="subject" style="width:300px;" placeholder="Subject Name" required>
                 </div>
            <div style="display:inline-block">
               <button style="height: 33px; position: relative;  top: 6px;" type="button" id="update_subject" class="btn btn-danger fa fa-edit">Update</button>
            </div>   

      </div>
  </div>
          <div class="card-body">
          <div class="table-responsive">
               <table class="table table-bordered" id="leaddataTableemail_author_update" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Project ID</th>
                    <th>Package Name</th>
                    <th>Author Name</th>
                    <th>Book Title</th>
                    <th>Email Address</th>
                    <th>Contact #</th>
                    <th>Area Code</th>
                    <th>Date Create</th>
                    <th>Date Assigned</th>
                    <th><input type='checkbox' id='check_all_author' class='form-check-input' style='position:relative; width:45px;'></th>
                  </tr>
                </thead>
                <tbody>
<!--                  <?php
                    $get_count_payment =0;
                    $replace_comma = "";
                    if ($author_emails > 0){
                         foreach ($author_emails as $author_emails){
                           $file_name = $author_emails['file_name'] == '' ? 'Manual Added' :$author_emails['file_name'];
                           echo "<tr>";
                                 echo "<td>".modules::run("dashboard/setindex_prefix",$author_emails['project_id'])."</td>"; 
                                 echo "<td>".$author_emails['product_name']."</td>";
                                 echo "<td>".$author_emails['author_name']."</td>";
                                 echo "<td>".$author_emails['book_title']."</td>";
                                 echo "<td>".$author_emails['email_address']."</td>";
                                 echo "<td>".$author_emails['contact_number']."</td>";
                                 echo "<td>".$author_emails['area_code']."</td>";
                                 echo "<td>".date("d/m/Y", strtotime($author_emails['date_create']))."</td>";
                                 echo "<td>".date("d/m/Y", strtotime($author_emails['lead_date_agent_assign']))."</td>";
                                 echo "<td style='text-align:center;'><input type='checkbox' name='project_id[]' class='form-check-input project_id' value=".$author_emails['project_id']."></td>";
                            echo "</tr>";
                       }
                    }  
                    ?> -->
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
</form>
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

      <!-- Email Modal -->
         <div class="modal fade" id="emailModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="emailform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Email Form.</h2>
                        <p class="hint-text">You have 20 the maximum send of emails allowed per 15 minutes.</p>
                            <label for="validationCustom05">Author Email Address</label>
                            <div class="form-group">
                              <input type="text" class="form-control" readonly name="email_address" placeholder="Enter the Email Address" required="required">
                            </div>
                            <label for="validationCustom05">Subject</label>
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" placeholder="Please Enter the subject" required="required">
                              <input type="hidden" class="form-control" name="project_id"  disabled="disabled" placeholder="Please Enter the project_id" required="required">
                            </div>
                              <label for="validationCustom05">Signature</label>
                               <div class="form-group">
                               <select class="form-control signature" name="signature">`
                                 <option value="">Please Select A Signature</option>
                                 <?php 
                                     if ($signatures > 0){
                                         foreach ($signatures as $signature){
                                           echo "<option value='".$signature['signature_id']."'>".$signature['signature']."</option>";
                                       }
                                    } 
                                  ?>
                              </select>
                           </div>
                             <label for="validationCustom05">Message</label>
                            <div class="form-group">
                                <textarea class="form-control message" id="txtEditor" name="message"></textarea>
                            </div>
                        <div class="form-group">
                                <button type="button" id="send_email_author" class="btn btn-danger btn-lg btn-block">Send</button>
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

            <!-- Email Modal -->
         <div class="modal fade" id="composemailModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="composeemailform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Email Form.</h2>
                        <p class="hint-text">Send Email.</p>
                            <label for="validationCustom05">Email Address</label>
                            <div class="form-group">
                              <input type="text" class="form-control"  name="email_address" placeholder="Enter the Email Address" required="required">
                            </div>
                            <label for="validationCustom05">Subject</label>
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" placeholder="Please Enter the subject" required="required">
                            </div>
                             <label for="validationCustom05">Signature</label>
                          <div class="form-group">
                            <select class="form-control signature" name="signature">
                                <option value="">Please Select A Signature</option>
                                 <?php 
                                     if ($signatures > 0){
                                         foreach ($signatures as $signature){
                                           echo "<option value='".$signature['signature_id']."'>".$signature['signature']."</option>";
                                       }
                                    } 
                                  ?>
                              </select>
                           </div>
                            <div class="form-group">
                                <textarea class="form-control message" id="emailEditor" name="message"></textarea>
                            </div>
                        <div class="form-group">
                                <button type="button" id="send_email" class="btn btn-danger btn-lg btn-block">Send</button>
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


      <div class="modal fade" id="addsignaturemodal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                      <form id="signatureform" method="post">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Signture Form.</h2>
                        <p class="hint-text">Add Signature.</p>
                            <label for="validationCustom05">Signature Title</label>
                            <div class="form-group">
                              <input type="text" class="form-control" name="signature" placeholder="Please Enter the signature" required="required">
                            </div>
                            <label for="validationCustom05">Description</label>
                            <div class="form-group">
                                <textarea class="form-control message" id="signaturetxtEditor" name="description"></textarea>
                            </div>
                        <div class="form-group">
                                <button type="button" id="add_signature" class="btn btn-danger btn-lg btn-block">Add</button>
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


<!-- The History Lead  Remark-->
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

            <div class="modal fade" id="emailhistoryModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Email History </h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                                <div class="table-responsive">
                                      <table class="table table-bordered" id="historyemailtable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                            <th>From</th>
                                            <th>Subject</th>
                                            <th>User Type</th>
                                            <th>Date</th>
                                          </tr>
                                        </thead>
                                        <tbody class="view_email_history">
                                        <!--   <?php 
                                              if ($email_history > 0){
                                                 foreach ($email_history as $email_history){
                                                   echo "<tr>";
                                                         echo "<td>".$email_history['from']."</td>";
                                                         echo "<td>".$email_history['to']."</td>";
                                                         echo "<td><button type='button' class='btn btn-primary view_message_detail' data-toggle='modal' data-target='#messageModal' data-backdrop='static' data-keyboard='false' data-history_email_id='".$email_history['history_email_id']."'>View</button></td>";
                                                         echo "<td>".$email_history['email_status']."</td>";
                                                         echo "<td>".date("d/m/Y", strtotime($email_history['date_sent']))."</td>";
                                                    echo "</tr>";
                                               }
                                            }  

                                          ?> -->
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

          <!-- Email History Modal -->
         <div class="modal fade" id="messageModal">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                 <div class="modal-body">
                      <div class="signup-form">
                          <div class="alert alert-success"><p></p></div>
                        <h2>Email Form.</h2>
                        <p class="hint-text">Email History</p>
                            <label for="validationCustom05">Email Address</label>
                            <div class="form-group">
                              <input type="text" class="form-control" disabled name="email_address" placeholder="Enter the Email Address" required="required">
                            </div>
                            <label for="validationCustom05">Subject</label>
                            <div class="form-group">
                              <input type="text" class="form-control" disabled name="subject" placeholder="Please Enter the subject" required="required">
                            </div>
                             <label for="validationCustom05">Message</label>
                            <div class="form-group">
                                <textarea class="form-control message" disabled id="messagetxtEditor" name="message"></textarea>
                            </div>

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
    <script src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url('bootstrap/vendors/DateJS/build/date.js');?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/dist/jquery.vmap.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/dist/maps/jquery.vmap.world.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js');?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('bootstrap/vendors/moment/min/moment.min.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>

        <script src="<?php echo base_url('js/select.js');?>"></script>
        <script src="<?php echo base_url('js/dataTables.select.min.js');?>"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('bootstrap/build/js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('js/croppie.js');?>"></script>
    <script src="<?php echo base_url('js/ckeditor.js');?>"></script>
    <script src="<?php echo base_url('js/sample.js');?>"></script>



     <script src="<?php echo base_url('js/validateuser.js');?>"></script>
     <script src="<?php echo base_url('js/validatelead.js');?>"></script>

 <script>  

 $(document).ready(function() {
    initSample();

  });

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
// $('#leaddataTableemail_author').DataTable({
//       "pageLength": 100,
//       "scrollY": 500,
//       "scrollCollapse": true
//    });

// $('#leaddataTableemail_author_update').DataTable({
//    "pageLength": 100,
//    "scrollY": 500,
//    "scrollCollapse": true
//  });
   // $.ajax({
   //      url:   base_url +  "dashboard/lead_email_update_ajax1",       
   //      method: 'POST',
   //      dataType: 'json',
   //      success: function (data) {
   //           var load_data = []
   //          for (var i = 0; i < data.length; i++) {
   //               load_data.push({
   //                      'Project ID': setindex_prefix(data[i].project_id),
   //                      'Package Name': data[i].product_name,
   //                      'Author Name': data[i].author_name,
   //                      'Book Title': data[i].book_title,
   //                      'Email Address': data[i].email_address,
   //                      'Contact #': data[i].contact_number,
   //                      'Area Code': data[i].area_code,
   //                      'Subject':  data[i].subject,
   //                      'Date Create':new Date(data[i].date_create).toLocaleDateString('en-GB'),
   //                      'Date Ass':new Date(data[i].lead_date_agent_assign).toLocaleDateString('en-GB'),
   //                      "<input type='checkbox' id='check_all_author' class='form-check-input' style='position:relative; width:45px;'>": "<td style='text-align:center;'><input type='checkbox' name='project_id[]' class='form-check-input project_id' style='position:relative; width:45px;' value="+data[i].project_id+"></td>"
   //                  })      
   //             }

   //            $('#leaddataTableemail_author_update').DataTable({
   //                processing: true,
   //                language: {
   //                  processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>'
   //                },
   //                data: load_data,
   //                deferRender:    true,
   //                paging:false,
   //                scrollY:        500,
   //                scrollX: true,
   //                scrollCollapse: true,
   //                scroller: {
   //                    loadingIndicator: true
   //                 },
   //                "columns": [{
   //                   "data": "Project ID"
   //                  },{
   //                    "data": "Package Name"
   //                  },{
   //                    "data": "Author Name"
   //                  },{
   //                    "data": "Book Title"
   //                  },{
   //                    "data": "Email Address"
   //                  },{
   //                    "data": "Contact #"
   //                  },{
   //                    "data": "Area Code"
   //                  },{
   //                    "data": "Date Create"
   //                  },{
   //                    "data": "Date Assigned"
   //                  },{
   //                    "data": "<input type='checkbox' id='check_all_author' class='form-check-input' style='position:relative; width:45px;'>"
   //                  }
   //                  ]
   //                 });
   //            }
   //  });

            $('#leaddataTableemail_author_update').DataTable({
                 "processing": true, //Feature control the processing indicator.
                 "serverSide": true, //Feature control DataTables' server-side processing mode.

              // Load data for the table's content from an Ajax source
                  "ajax": {

                      "url": base_url +  "dashboard/lead_email_update_ajax1",
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
                     { data: 'product_name' },
                     { data: 'email_address' },
                     { data: 'contact_number' },
                     { data: 'area_code' },
                     { data: 'subject' },
                     { data: 'date_create',
                      "render" : function( data, type, row, full ) {
                                  var date_create = data == null ? '': new Date(data).toLocaleDateString('en-GB');
                                  return date_create;                          
                              }
                       },
                        { data: 'lead_date_agent_assign',
                      "render" : function( data, type, row, full ) {
                                  var lead_date_agent_assign = data == null ? '': new Date(data).toLocaleDateString('en-GB');
                                  return lead_date_agent_assign;                          
                              }
                       },
                       { data: null,
                      "render" : function( data, type, row, full ) {
                                  return "<input type='checkbox' name='project_id[]' class='form-check-input project_id' style='position:relative; width:45px;' value="+row.project_id+">";                          
                              }
                       },
                     ]
                   });


 $("#addsubjectform #check_all_author, #updatesubjectform #check_all_author").click(function () {
     $('#addsubjectform input:checkbox, #updatesubjectform input:checkbox').not(this).prop('checked', this.checked);
 });

</script>
  </body>
</html>