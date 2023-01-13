<?php date_default_timezone_set('Asia/Manila');?>
            <!-- sidebar menu -->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">

                <ul class="nav side-menu">

                  <li><a><i class="fa fa-home"></i> All Leads Bucket <span class="fa fa-chevron-down"></span></a>

                    <ul class="nav child_menu">

                      <li><a href="<?php echo site_url("dashboard/dashboard")?>">Leads</a></li>
<!--                       <li><a href="<?php echo site_url("dashboard/lead_status")?>">Recycled/Dead Leads </a></li>  -->

                      <li><a href="<?php echo site_url("dashboard/sold_leads")?>">Sold Leads</a></li>

                      <li><a href="<?php echo site_url("dashboard/contract")?>">Contract Update</a></li>

                      <li><a href="<?php echo site_url("dashboard/collection_lead")?>">Collection View</a></li>

                      <!--<li><a href="<?php echo site_url("account/users")?>">All Users</a></li>  -->
                    </ul>
                      
                      </li>

                    
                 


                   <li><a><i class="fa fa-list"></i> Current Transactions Guide <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu">    

                       <li><a href="<?php echo site_url("dashboard/collection_payment")?>">Leads Transaction</a></li>
                       <!--<li><a href="<?php echo site_url("dashboard/email_lead")?>">Lead Email</a></li>
                       <li><a href="<?php echo site_url("dashboard/signature")?>">Add Signature</a></li>-->
                     </ul>
                   </li>

                   <li><a><i class="fa fa-fire"></i> Performance Task <span class="fa fa-chevron-down"></span></0>
                     <ul class="nav child_menu">
                       <li><a href="<?php echo site_url("dashboard/attendance")?>"><i class="fa fa-clock-o"></i> Attendance</a> </li>    
                       <!-- <li><a href="<?php echo site_url("dashboard/time_nanosleep(seconds, nanoseconds)")?>"><i class="fa fa-clock-o"></i> Time In/Out</a> </li>
                       <li><a href="<?php echo site_url("dashboard/time_nanosleep(seconds, nanoseconds)")?>"><i class="fa fa-clock-o"></i> Lunch In/End</a> </li>
                       <li><a href="<?php echo site_url("dashboard/time_nanosleep(seconds, nanoseconds)")?>"><i class="fa fa-clock-o"></i> Break In/End</a> </li> -->
                     </ul>
                   </li>

                   <li><a><i class="fa fa-dollar"></i> Finance Department <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Finance Book</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Overall Quota</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Per Team Quota</a></li>
                      <li><a href="<?php echo site_url("dashboard/email_user_history")?>">Individual Quota</a></li>

                    </ul>

                  </li>

                

                    <li><a><i class="fa fa-calendar"></i> Calendar of Activities <span class="fa fa-chevron-down"></span></a>

                     <ul class="nav child_menu"> 

                     <li><a href="<?php echo site_url("dashboard/timeline_calendar")?>">TimeLine Calendar</a></li>
                     <li><a href="<?php echo site_url("dashboard/company_calendar")?>">Company Calendar</a></li>
                     <li><a href="<?php echo site_url("dashboard/personal_calendar")?>">Personal Calendar</a></li>
                   </ul>

                  </li>

                </ul>
                
             </div>



            </div>

            <!-- /sidebar menu -->



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
                                <a class="dropdown-item">
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

        <!-- /top navigation -->
