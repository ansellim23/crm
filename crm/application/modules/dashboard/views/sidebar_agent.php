<style type="text/css">
.no_time_out{display: none;}
</style>         

       <div class="modal fade warning_activitiesModal" id="warning_activitiesModal_<?php echo $this->session->userdata['userlogin']['user_id'];?>"  style="background:#080708;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Your Late/Over Lunch/Previous Time Out/Over Break and lacking Activities</h5>
                      </div>
                      <div class="modal-body">
                          <p>Late :<span class="late">00:00:00</span></p>
                          <p>Over Lunch :<span class="over_lunch">00:00:00</span></p>
                          <p>Over Break :<span class="over_break">00:00:00</span></p>
                          <p>Total Activities :<span class="total_activities">0</span></p>
                          <div class="no_time_out">
                             <p>No Previous Time Out :<span class="time_out">N/A</span></p>
                          </div>
                      </div>
                        <div class="modal-footer">
                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                               <button type="button" id="update_user_activities" class="btn btn-close">OK</button>

                      </div>
                  </div>
              </div>
          </div>



       <div class="modal fade congratulation_activitiesModal" id="congratulation_activitiesModal_<?php echo $this->session->userdata['userlogin']['user_id'];?>"  style="background:#080708;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Congratulations: You have completed activities and Attendance Today</h5>
                      </div>
                      <div class="modal-body">
                      </div>
                        <div class="modal-footer">
                               <button type="button" id="update_user_activities" class="btn btn-danger">Close</button>

                      </div>
                  </div>
              </div>
          </div>





                      
          <div class="modal fade" id="warningModal_<?php echo $this->session->userdata['userlogin']['user_id'];?>" style="background:#080708;" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title"> Automatic Logout </h4>
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
                           <span class="idle_start">We noticed that your session has been idled for some time.</span></br>
                           <span class="idle_start">You'll be logout in <strong id="time"></strong> second(s) unless we detect some activity.</span>
                      </div>
                      
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" id="update_idle" class="btn btn-info">STAY LOGGED IN</button>
                        <a  id="logout" class="btn btn-light" href="<?=site_url('account/logout');?>">LOGOUT</a>

                      </div>
                    </form>
                      
                    </div>
                  </div>
                </div>

            <!-- end of manual modal -->

              <div class="modal fade session_expired" id="mdlLoggedOut_<?php echo $this->session->userdata['userlogin']['user_id'];?>"  style="background:#080708;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">You have been logged out</h5>
                      </div>
                      <div class="modal-body">
                          <p>Your session has expired.</p>
                      </div>
                        <div class="modal-footer">
                           <a  id="logout" class="btn btn-light" href="<?=site_url('account/logout');?>">LOGOUT</a>
                      </div>
                  </div>
              </div>
          </div>


           <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Leads Bucket <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url("dashboard/dashboard")?>">Dashboard</a></li>
                      <li><a href="<?php echo site_url("dashboard/sold_leads")?>">Sold Leads</a></li>
                      <li><a href="<?php echo site_url("dashboard/contract")?>">Contract Update</a></li>
                      <li><a href="<?php echo site_url("dashboard/collection_lead")?>">Collection View</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_lead")?>">Lead Email</a></li>
                      <li><a href="<?php echo site_url("dashboard/check_lead")?>">Check Lead</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo site_url("dashboard/collection_payment")?>"><i class="fa fa-dollar"></i>Create New Sale</a></li>
                  <li><a><i class="fa fa-fire"></i> Performance Task <span class="fa fa-chevron-down"></span></0>
                     <ul class="nav child_menu">    
                       <li><a href="<?php echo site_url("dashboard/attendance")?>"><i class="fa fa-clock-o"></i> Attendance</a> </li>
                       <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Quota</a></li>
                        <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Pipeline</a></li>
                       <li><a href="<?php echo site_url("dashboard/call_log_history")?>">Call Logs</a></li>
                        <li><a href="<?php echo site_url("dashboard/activities")?>">Lead Activities</a></li>
                       <li><a href="<?php echo site_url("dashboard/view_penaltymatrix_agent")?>">Penalty Matrix Guidelines</a></li>

                    </ul>

                  </li>

                    <li><a><i class="fa fa-book"></i> Production Department <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

<!--                       <li><a href="<?php echo site_url("dashboard/report")?>"> Production Manual </a></li>
                      <li><a href="<?php echo site_url("dashboard/cover_designer")?>"> Cover Designer Report </a></li>
                      <li><a href="<?php echo site_url("dashboard/interior_designer")?>"> Interior Designer Report </a></li> -->
                      <li><a href="<?php echo site_url("dashboard/project")?>">Projects</a></li>

                    </ul>

                  </li>

                   <li><a><i class="fa fa-calendar"></i> Calendar of Activities <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                      <li><a href="<?php echo site_url("dashboard/personal_calendar")?>">Personal Calendar</a></li>
                      <li><a href="<?php echo site_url("dashboard/company_calendar")?>">Company Calendar</a></li>
                      <li><a href="<?php echo site_url("dashboard/stats_calendar")?>">Stats Calendar</a></li>
                      </ul>
                  </li>

                  <li><a><i class="fa fa fa-wpforms"></i>Forms<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu"> 
                        <li><a href="<?php echo site_url("dashboard/leaveForm")?>">Leave Request Form</a></li>
                        <li><a href="<?php echo site_url("dashboard/officialBusinessLeaveForm")?>">OBL Request Form</a></li>
                        <li><a href="<?php echo site_url("dashboard/undertimeForm")?>">Undertime Request Form</a></li>
                      </ul>
                  </li>

                  <li><a href="<?php echo site_url("dashboard/SubmittedForms")?>"><i class="fa fa-paper-plane"></i>Submitted Form</a></li>

                  <li><a href="<?php echo site_url("dashboard/memos")?>"><i class="fa fa-sticky-note-o"></i>Memos & Incentives</a></li>
                  

                   <li><a><i class="fa fa-trophy"></i> Awards and Advancements <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                      <li><a href="<?php echo site_url("dashboard/personal_calendar")?>">Awards</a></li>
                      <li><a href="<?php echo site_url("dashboard/company_calendar")?>">Advancements</a></li>
                      </ul>
                  </li>

                   <li><a href="<?php echo site_url("dashboard/collection_payment")?>"><i class="fa fa-dollar"></i>Commission Statement</a></li>

                   <li><a><i class="fa fa-file-text-o"></i>  General Evaluation <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                      <li><a href="<?php echo site_url("coaching")?>">Coaching Form</a></li>
                      <!-- <li><a href="<?php echo site_url("dashboard/company_calendar")?>">Peer Evaluation</a></li> -->
                      <li><a href="<?php echo site_url("evaluation/teamEvaluation")?>">Employee Evaluation</a></li>
                      <li><a href="<?php echo site_url("evaluation/companyEvaluation")?>">Company Evaluation</a></li>
                      </ul>
                  </li>
                   <li><a href="<?php echo site_url("todolist")?>"><i class="fa fa-tasks"></i> To-Do List</a></li>
                   <li><a href="http://ithelp.hlmcrm.site/" target="_blank"><i class="fa fa-question"></i> Helpdesk Support</a></li>
                </ul>

             </div>

            </div>

                    <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=site_url('account/logout');?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <?=ucfirst($this->session->userdata['userlogin']['firstname']) .' '. ucfirst($this->session->userdata['userlogin']['lastname']);?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item view_accountprofile" aria-hidden="true" data-toggle="modal" data-target="#editUserModal" data-backdrop="static" data-keyboard="false" data-userid=<?=ucfirst($this->session->userdata['userlogin']['user_id']);?>> Profile</a>
                    <a class="dropdown-item view_account_password" aria-hidden="true" data-toggle="modal" data-target="#editUserPasswordModal" data-backdrop="static" data-keyboard="false" data-userid=<?=ucfirst($this->session->userdata['userlogin']['user_id']);?>> Change Password</a>
                    <a class="dropdown-item"  href="<?=site_url('account/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                
                <li role="presentation" class="nav-item dropdown open">

                  <a href="javascript:;" class="dropdown-toggle info-number number_of_notification" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">

                    <i class="fa fa-envelope-o"></i>

                    <span class="badge bg-green count_notification"><?=$count_notifications == 0 ? '': $count_notifications;?></span>

                  </a>

                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                     <?php if($notifications > 0):?>
                         <?php foreach($notifications as $notification):?>
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  <span>
                                    <span><?=$notification['from_user'];?></span>
                                    <span class="time"><?=modules::run("dashboard/time_ago",$notification['date_notify']);?></span>
                                  </span>
                                  <span class="message">
                                     <?=$notification['message'];?>
                                  </span>
                                </a>
                            </li>
                       <?php endforeach;?>
                    <?php endif;?>

                   <?php if($notifications > 0):?>
                           <li class="nav-item">
                              <div class="text-center">
                                <a  href="<?=site_url('dashboard/view_notification');?>" class="dropdown-item">
                                  <strong>See All Alerts</strong>
                                  <i class="fa fa-angle-right"></i>
                                </a>
                              </div>
                          </li>
                    <?php endif;?>

     
                  </ul>

                </li>

              </ul>
            </nav>
          </div>
        </div>