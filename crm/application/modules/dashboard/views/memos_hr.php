
    <style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}
    /*.attach_file>input{
      display: none;
      }*/
    .attach_file{
      height: 27px;
      padding: 0px 5px 0px 5px;
     }
     .custom-file-input:lang(en) ~ .custom-file-label::after{
      content: "attach file";
     }
     .custom-file {
      position: relative;
      display: inline-block;
      width: 28%;
      height: calc(1.5em + .75rem + 2px);
      margin-bottom: -1px;
      top: -3px;
      bottom: 20px;
      vertical-align: top;
      height: 37px;
      }

    </style>


  

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
            <i class="fa fa-sticky-note-o"></i> Memos & Incentives
              <div style="float:right; ">
              <div style="display:inline-block">
              <!--<a href="<?=site_url('dashboard/create_memo');?>" style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" >Add</a> -->
                 <button style="height: 33px; position: relative;  top: 6px;" type="button" class="btn btn-primary fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addMemoModal" data-backdrop="static" data-keyboard="false">Create</button> 
              </div>   
      </div>
    <!--  -->
      </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="memodataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>To</th>
                  <th>Type</th>
                  <th>Subject</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if ($memos > 0){
                       foreach ($memos as $memo){
                         
                         echo "<tr>";
                               echo "<td>".$memo['firstname']." ".$memo['lastname']."</td>";
                               echo "<td>".$memo['title']."</td>";
                               echo "<td>".$memo['subject']."</td>";
                               echo "<td>".date('F d, Y h:i:s A',strtotime($memo['date_notify']))."</td>"; ?>
                               <td> <a class="btn btn-primary" href="<?php echo base_url('dashboard/view_memoHr?id=').$memo['notification_id'] ?>">View</a></td>
                               <?

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

       <!-- Add Memo -->
         <div class="modal fade" id="addMemoModal">
            <div class="modal-dialog" style="max-width: 60%;">
              <div class="modal-content">
                    <div class="modal-header">
                      <span>Create Memos & Incentives</span>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form id="memo_form" class="upload_file_form">
                      <div class="alert alert-success"><p></p></div>
                      <div class="modal-body">
                        <div class="memo-form">
                          <div class="form-group">
                            <div class="col-auto">
                              <label for="exampleFormControlTextarea1">Document Title</label>
                              <select class="form-control" name="title">
                                <option value="Memo">Memo</option>
                                <option value="Incentive">Incentive</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-auto">
                              <label for="exampleFormControlTextarea1">Heading Section</label>
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Date:</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" name="date" value="<?php echo date('F d, Y');?>" readOnly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-auto">
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">From:</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" name="from" value="<? echo $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];?>" readOnly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-auto">
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">To:  &nbsp;  &nbsp;</div>
                                </div>
                                <select class="form-control" id="exampleFormControlSelect2" name="sendto[]" multiple>
                                  <? foreach ($users as $user) { ?>                                 
                                  <option value="<?echo $user['user_id'];?>"><? echo $user['firstname']." ".$user['lastname']." - ".$user['usertype']; ?></option>                    
                                  <?}?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-auto">
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Re:  &nbsp;  &nbsp;</div>
                                </div>
                                <input type="text" class="form-control" name="subject" id="subject">
                                <input type="text" name="user_id" value="<?echo $user['user_id'];?>" hidden>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-auto">
                              <label for="exampleFormControlTextarea1">Message Section</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="9" name="message"></textarea>
                          </div>
                          </div>

                          <div class="form-group">
                            <div class="col-auto">
                              <button type="button" class="btn btn-outline-primary fa fa-paper-plane" id="add_memo">Send</button>        
                              <button type="button" class="btn btn-outline-danger fa fa-trash" data-dismiss="modal">Discard</button>
                              <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" multiple>
                                <label class="custom-file-label" for="customFileInput">Select file</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
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

     
 
 



      