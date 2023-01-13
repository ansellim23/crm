         

       <div class="modal fade" id="warning_activitiesModal_<?php echo $this->session->userdata['userlogin']['user_id'];?>"  style="background:#080708;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Your Late/Over Lunch/Over Break and lacking Activities</h5>
                      </div>
                      <div class="modal-body">
                          <p>Late :<span class="late"></span></p>
                          <p>Over Lunch :<span class="over_lunch"></span></p>
                          <p>Over Break :<span class="over_break"></span></p>
                          <p>Total Activities :<span class="total_activities"></span></p>
                      </div>
                        <div class="modal-footer">
                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                      <li><a href="<?php echo site_url("coaching/coaching_list")?>">Coaching View</a></li>
                      <!-- <li><a href="<?php echo site_url("dashboard/company_calendar")?>">Peer Evaluation</a></li> -->
                      <li><a href="<?php echo site_url("evaluation")?>">Team Evaluation</a></li>
                      <li><a href="<?php echo site_url("evaluation/company_evaluation")?>">Company Evaluation</a></li>
                      </ul>
                  </li>
                   <li><a href="<?php echo site_url("todolist")?>"><i class="fa fa-tasks"></i> To-Do List</a></li>
                    
                </ul>

             </div>

            </div>

        