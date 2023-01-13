

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
<!--memo--> 
<style type="text/css">
  .logo-img{
    margin: 0 auto;
    text-align: center;
  }
  .logo-img img{
    width: auto;
    height: 120px;
    margin: 0 0 -35px 0;
  }
  .memo{
      margin-left:-4.3pt;margin-right:0pt;line-height:150%;font-size:48pt;margin-top:0pt;margin-bottom:20pt;padding: 1pt 4pt;text-align: center;
  }
  .memo span{
      font-family:Calibri;font-size:20pt;color:#595959;letter-spacing:-0.5pt;
  }
  table{
      width:100%;border-collapse:collapse;
  }
  table tr{
    height:14.4pt;
  }
  table tr td{
    vertical-align:top;
  }
  .td-p-span p{
    margin-left:0pt;margin-right:0pt;line-height:107.916666666667%;font-size:9pt;margin-top:0pt;margin-bottom:0pt;
  }
  .td-p-span p span{
    font-family:Calibri;font-size:12pt;
  }
  .border-style{
    border-top-color:#A6A6A6;border-top-style:solid;border-top-width:0.75pt;padding-top:7.2pt;vertical-align:top;
  }
   .border-style1 p{
    margin-left:0pt;margin-right:0pt;line-height:115%;font-size:9pt;margin-top:0pt;margin-bottom:0pt;font-family:Calibri;font-size:12pt;text-align: justify;
   }
  
 </style>



        <!-- page content -->
        <div class="right_col" role="main" style=" height: 100px; overflow-y: scroll;">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
          </div>
        </div>
          <!-- /top tiles -->
        <div class="card mb-3" style="width: 45%; margin: 0 auto;">


        <?php if ($memos > 0){
        foreach ($memos as $memo){ ?>
        <form id="announcement_form">
        <div style="margin:10px">
          <div class="logo-img">
            <a href="index.html"><img src="<?php echo base_url('images/HORIZONS-LOGO-2.png');?>" alt="logo"></a>
            <p class="memo"><span>Better Bound House</span></p>
         </div>  
        
        <table>
          <colgroup>
            <col style="width:576px"/>
          </colgroup>
          <tr>
            <td>
              <p style="margin-left:0pt;margin-right:0pt;margin-top:0pt;margin-bottom:15pt;">
              <span style="font-family:Calibri;font-size:25pt;font-weight: bold;">Memorandum</span>
              </p>
            </td>
          </tr>
          </table>
          <table>
            <colgroup>
              <col style="width:73px"/>
              <col style="width:502px"/>
            </colgroup>
            <tr>
              <td class="td-p-span">
                <p><span class="font-weight-bold">To:</span></p>
              </td>
              <td class="td-p-span">
                <p><span><?echo $memo['firstname']." ".$memo['lastname'];?></span>
              </td>
            </tr>
            <tr>
              <td class="td-p-span">
                <p><span class="font-weight-bold">From:</span></p>
              </td>
              <td class="td-p-span">
                <p><span><?echo $memo['from_user'];?></span></p>
              </td>
            </tr>
            <tr>
              <td class="td-p-span">
                <p><span class="font-weight-bold">Date:</span></p>
              </td>
              <td class="td-p-span">
                <p><span><?echo date('F d, Y',strtotime($memo['date_notify']));?></span></p>
              </td>
            </tr>
            <tr>
              <td class="td-p-span">
                <p><span class="font-weight-bold">Re:</span></p>
              </td>
              <td class="td-p-span">
                <p><span><?echo $memo['subject'];?></span></p>
              </td>
            </tr>
            <tr>
              <td class="border-style">
                <p><span class="font-weight-bold">Comments:</span></p>
              </td>
              <td class="border-style">
                <p><span></span></p>
              </td>
            </tr>
          </table>
            <div class="border-style1">
              <p><?echo $memo['body'];?></p>
            </div>
          <p style="margin-left:0pt;margin-right:0pt;line-height:107.916666666667%;font-size:9pt;margin-top:0pt;margin-bottom:6pt;padding: 1pt 4pt;">
            <span>&#xa0;</span>
          </p>
          </div>
         
          <hr/>
      <div class="form-group">
        <div class="col-auto">
          <!-- Button to invoke the modal -->
          <span class="text-info"><?echo "<a href='".base_url('upload_memo/'. $memo['attached_file'])."' download>"."<i class='fa fa-download' aria-hidden='true'>".$memo['attached_file']."</i>"."</a>"?></span>
          <input type="text" name="user_id" value="<?echo $memo['to_user_id'];?>" hidden>
          <button type="button" class="btn btn-primary btn-sm float-right confirmItem" id="btnConfirm">Confirm</button>
          <span class="float-right confirmText" id="txtConfirm" style="display: none;">Confirmed</span>
          
          <!--<span style="font-size:15px;"><?echo $notification['firstname']." ".$notification['lastname'];?></span>-->
        </div>
      </div>
    </form>
  
    <?}
          }?>
    
      </div>
    </div>


          <br />

    
        <!-- /page content -->

       
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





  