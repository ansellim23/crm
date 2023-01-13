 <?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Account extends MY_Controller {



  function __construct() {

         parent::__construct();

         date_default_timezone_set('Asia/Manila');

          $this->load->library('email');
          $this->load->library('user_agent');
          $this->load->library('phpmailer_lib');

           $this->email->initialize(
            array(
                  'charset' =>'utf-8',
                  'wordwrap'  => TRUE,
                  'mailtype'  => 'html',
                  'protocol'  => 'sendmail'
             )); 

         $get_remark_project = false;

       // $recycle_leads = $this->Lead_Model->select_recyle_lead();

     // if($recycle_leads > 0){
     //    foreach ($recycle_leads as $recycle_lead){
     //        $get_remark_project = $this->Lead_Model->select_all_remark($recycle_lead['project_id']);
     //             $get_two_months =  date('Y-m-d', strtotime($recycle_lead['date_create'].'+1 months'));
     //             $get_lead_date_progress  = $recycle_lead['date_updated'] == NULL ? $recycle_lead['date_create'] : $recycle_lead['date_updated'];
     //          if ($get_lead_date_progress > $get_two_months  && $get_remark_project == false ){
     //               $this->Lead_Model->update_lead(array('user_id'=> 0, 'status' => 'Recycled'), $recycle_lead['project_id']);
 
     //        }
     //    }
     //  }
    }

  public function index(){

    $this->load->view('login');

  }

 public function get_two_months($date1, $date2)
  {
    $begin = new DateTime( $date1 );
    $end = new DateTime( $date2 );
    $end = $end->modify( '+1 month' );

    $interval = DateInterval::createFromDateString('1 month');

    $period = new DatePeriod($begin, $interval, $end);
    $counter = 0;
    foreach($period as $dt) {
        $counter++;
    }

    return $counter;
}

  public function agent_no_activities(){

      $date_now = date('Y-m-d');



      $assign_user_leads = $this->Lead_Model->select_agent_assign_lead();
          foreach ($assign_user_leads as $key => $assign_user_lead) {

            $get_remark = $this->Lead_Model->select_all_remark($assign_user_lead['project_id']);

            $get_two_months = $this->get_two_months($assign_user_lead['date_assign'], $date_now);
            $get_two_remark = $this->get_two_months($assign_user_lead['date_create_remark'], $date_now);

            if ($get_two_months > 3 && $get_remark == false){
                  $this->Lead_Model->update_lead(array('user_id'=> 0, 'status' => 'Recycled', 'lead_assign' => 0, 'check_lead' => 0), $assign_user_lead['project_id']);
            }

           else if ($get_two_months > 3 && $get_two_remark > 3){
                  $this->Lead_Model->update_lead(array('user_id'=> 0, 'status' => 'Recycled', 'lead_assign' => 0, 'check_lead' => 0), $get_remark['project_id']);
            }


       }

  }


  public function user_activities(){

        $get_extension_number = 0;

        $get_point_absents = 0;
         $lacking_hour_points = 0.0;
         $get_excess_lunch= 0;
         $get_excess_break= 0; 
         $get_total_of_excess = 0;
         $get_total_of_work = 0;
         $data = array();

          $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
          $current_date  = date('Y-m-06');
          $adv_date  = date('Y-m-07', strtotime("+ 1 month"));
          $prev_date  = date('Y-m-06', strtotime("- 1 month"));

         

         $get_overall_quota = $this->Payment_Model->sales_lead_qouta_over_all($this->session->userdata['userlogin']['user_id'], date('Y'));
         date_default_timezone_set('Asia/Manila');
         $attendance_users = $this->Attendance_Model->get_all_totalattendance_point($this->session->userdata['userlogin']['user_id'],date('Y-m-d H:i:s'), date('Y-m-01'), date('Y-m-t'));
         $total_points = 0;
         if($attendance_users > 0){
          foreach ($attendance_users as $attendance_user) {
             $get_total_of_excess = $this->CalculateTime($attendance_user['excess_lunch'], $attendance_user['excess_break']);
             $total_lunch_start = $attendance_user['total_lunch_start'];
             $total_lunch_end =  $attendance_user['total_lunch_end'];
             $total_break_in = $attendance_user['total_break_in'];
             $total_break_out =  $attendance_user['total_break_out'];
             $total_out = $attendance_user['total_out'] > 8 ? "8.00" : (float)$attendance_user['total_out'];


                
                         if($attendance_user['time_in'] == NULL  &&  $attendance_user['time_out'] == NULL  &&  $attendance_user['break_in'] == NULL  &&  $attendance_user['break_out'] == NULL  &&  $attendance_user['lunch_start'] == NULL  &&  $attendance_user['lunch_end'] == NULL){
                                $get_total_of_work = 0.0;
                                $get_point_absents = 1; 

                         }
                        elseif($attendance_user['time_in'] != NULL  &&  $attendance_user['time_out'] == NULL  &&  $attendance_user['break_in'] == NULL  &&  $attendance_user['break_out'] == NULL  &&  $attendance_user['lunch_start'] == NULL  &&  $attendance_user['lunch_end'] == NULL){
                                $get_total_of_work = 0.0;
                                $get_point_absents = 0; 

                         }
                        elseif($attendance_user['time_in'] != NULL  && $attendance_user['time_out'] != NULL){
                                $get_total_of_work = (float)$total_out - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                        elseif($attendance_user['time_in'] != NULL  && $attendance_user['time_out'] == NULL && $attendance_user['break_out'] != NULL){
                                $get_total_of_work = (float)$total_break_out - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                         elseif($attendance_user['time_in'] != NULL  && $attendance_user['break_out'] == NULL && $attendance_user['break_in'] != NULL){
                                $get_total_of_work = (float)$total_break_in - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                         elseif($attendance_user['time_in'] != NULL  &&  $attendance_user['break_in'] == NULL && $attendance_user['lunch_end'] != NULL){
                                $get_total_of_work = (float)$total_lunch_end - (float)$get_total_of_excess; 
                                $get_point_absents = 0;


                         }
                        elseif($attendance_user['time_in'] != NULL  &&  $attendance_user['lunch_end'] == NULL && $attendance_user['lunch_start'] != NULL){
                                $get_total_of_work = (float)$total_lunch_start - (float)$get_total_of_excess;
                                $get_point_absents = 0;


                         }
                        if($attendance_user['time_in'] != NULL && $attendance_user['time_out'] == NULL){
                              $lacking_hour_points = 0.5;
                         }
                         elseif(date('H:i:s', strtotime($attendance_user['time_out'])) < "07:00:00"  && $attendance_user['time_out'] != NULL &&  $attendance_user['time_in'] != NULL  &&  $attendance_user['approve_status'] == "Declined"){
                              $lacking_hour_points = 0.5;
                         }
                         else{
                              $lacking_hour_points = 0.0;
                         }
                       $total_points += $get_point_absents + $attendance_user['point_late'] + $lacking_hour_points + $attendance_user['excess_break_point'] + $attendance_user['excess_lunch_point'];
               }
           }
          // $key = array_search('OUFYz3SG0MTXzUA', array_column(json_decode($count_call_log), 'id'));

        

          //print_r($resp_prev->json()->records);
/*          exit();
*/
         //    date_default_timezone_set('America/New_York');
         // $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
         //     if ($count_call_log == 0){
         //          $get_count_call_log = 0;
         //     }
         //    else if ($count_call_log == 1){
         //          $get_count_call_log = 1;
         //     }

         //     else{
         //          $get_count_call_log = $count_call_log + 1;
         //     }



          $current_activities =  $this->Remark_Model->select_count_remarks_agent($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));
          $prev_activities =  $this->Remark_Model->select_count_remarks_agent($this->session->userdata['userlogin']['user_id'], date('Y-m-d', strtotime('-1 day')));
          $leads = $this->Lead_Model->view_leads_agent($this->session->userdata['userlogin']['user_id']);
          // $current_call_logs =  $get_count_call_log;
          // $prev_call_logs =  $count_call_log_prev;
          $current_pipes =  $this->Lead_Model->select_count_pipes_agent($user_charge, date('Y-m-d'));
          $prev_pipes =  $this->Lead_Model->select_count_pipes_agent($user_charge, date('Y-m-d', strtotime('-1 day')));
          $current_quota =  $this->Payment_Model->sales_lead_qouta_date($user_charge, $current_date, $adv_date);
          $deduction =  $this->Deduction_Model->total_deduction($this->session->userdata['userlogin']['user_id'], $prev_date, $adv_date);
          $current_deduction =  $deduction['total_deduction'];
          $data =  $this->Payment_Model->sales_lead_qouta_date($user_charge, $current_date, $adv_date);
          $current_sales =  $data['total_amount'];
          $commission_receivable =  $data['total_amount'] - $deduction['total_deduction'] - 500;

          //

          $prev_quota =  $this->Payment_Model->sales_lead_qouta_date($this->session->userdata['userlogin']['user_id'], $prev_date, $current_date);
          $over_all_quota = $get_overall_quota;  
          $total_points =  number_format($total_points, 1);  
          $notifications  = $this->Notification_Model->view_notification_user1($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
          $count_notifications = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
          $penalties = $this->Penalty_Model->select_user_penalty($this->session->userdata['userlogin']['user_id']);
          
          //date_default_timezone_set('Asia/Manila');
          //$records['attendance_user']= $this->Attendance_Model->view_single_attendance($this->session->userdata['userlogin']['user_id'], date('Y-m-d H:i:s'));
         
          //modified by marz
          date_default_timezone_set('America/New_York');
          $attendance_user= $this->Attendance_Model->view_single_attendance1($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));
          $attendance_user_prev= $this->Attendance_Model->view_single_attendance_prev($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));


          // $this->load->view('dashboard', $records);


         $row = $this->User_Model->select_user_activity($this->session->userdata['userlogin']['user_id']);
          if ($row['lacking_status'] == 1){
               if ($attendance_user!=false && $attendance_user_prev==false){
                  if ($attendance_user['excess_break'] != NULL || $attendance_user['excess_lunch'] != NULL  || $attendance_user['late_minutes'] !=NULL || $current_activities < 50){
                       echo json_encode(array("lates" => $attendance_user['late_minutes'], "time_out" => "N/A", "excess_break" => $attendance_user['excess_break'], "excess_lunch" => $attendance_user['excess_lunch'],  "current_activities" => $current_activities, "time_out_start" => $row['time_out_start'], "user_id" => $this->session->userdata['userlogin']['user_id'], "response" => "Lacking")); 
                  }
               else if ($attendance_user['excess_break'] == NULL && $attendance_user['excess_lunch'] == NULL || $attendance_user['late_minutes'] ==NULL &&  $current_activities >= 50){
                       echo json_encode(array("lates" => $attendance_user['late_minutes'], "time_out" => "N/A", "excess_break" => "00:00:00", "excess_lunch" => "00:00:00",  "current_activities" => "Completed", "time_out_start" => "00:00:00", "user_id" => $this->session->userdata['userlogin']['user_id'], "response" => "Congratulation")); 
                  }
              }
              else if ($attendance_user!=false && $attendance_user_prev!=false){
                  if ($attendance_user_prev['time_out'] != NULL){
                       echo json_encode(array("lates" => $attendance_user['late_minutes'], "time_out" => "N/A", "excess_break" => $attendance_user['excess_break'], "excess_lunch" => $attendance_user['excess_lunch'],  "current_activities" => $current_activities, "time_out_start" => $row['time_out_start'], "user_id" => $this->session->userdata['userlogin']['user_id'], "response" => "Lacking")); 
                  }
                  else if ($attendance_user_prev['time_out'] == NULL){
                       echo json_encode(array("lates" => $attendance_user['late_minutes'], "time_out" => "No Time Out", "excess_break" => $attendance_user['excess_break'], "excess_lunch" => $attendance_user['excess_lunch'],  "current_activities" => $current_activities, "time_out_start" => $row['time_out_start'], "user_id" => $this->session->userdata['userlogin']['user_id'], "response" => "Lacking")); 
                  }
              }
               else{
                     echo json_encode(array("lates" => "00:00:00", "time_out" => "N/A", "excess_break" => "00:00:00", "excess_lunch" => "00:00:00",  "current_activities" => "Completed", "time_out_start" => "00:00:00", "user_id" => $this->session->userdata['userlogin']['user_id'], "response" => "Done")); 

                }
             }
        else{
                echo json_encode(array("lates" => "00:00:00", "time_out" => "N/A", "excess_break" => "00:00:00", "excess_lunch" => "00:00:00",  "current_activities" => "Completed", "time_out_start" => "00:00:00", "user_id" => $this->session->userdata['userlogin']['user_id'], "response" => "Done")); 
        }


  }


  public function session_id(){
      $attendance_user= $this->Attendance_Model->view_single_attendance1($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));
      $attendance_user_prev= $this->Attendance_Model->view_single_attendance_prev($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));

      if ($attendance_user!=false && $attendance_user_prev !=false ){
              echo "Exist";
      }
      else{
        echo "No Data";
      }
          // $user_id =  $this->session->userdata['userlogin']['user_id'];
          // $data= array(
          //                  'user_id' => $user_id,
          //                  'status_idle' => 1,
          //                  'status_idle_user' => "auto",
          //                  'date_idle'  =>  date("Y-m-d 01:00:00"),   

          //                );
          // $this->Idle_Model->insert($data);
          // echo $user_id;
          // return;


    }

      public function session_id2(){
          $user_id =  $this->session->userdata['userlogin']['user_id'];
          $data= array(
                           'user_id' => $user_id,
                           'status_idle' => 1,
                           'status_idle_user' => "auto",
                           'date_idle'  =>  date("Y-m-d"),   
                           'idle_time'  =>  date("01:00:00 "),   

                         );
          $this->Idle_Model->insert($data);

          $row =  $this->Idle_Model->select_single_user($this->session->userdata['userlogin']['user_id']);
           $get_attempt_idle = $row['attempt_idle'];
           $number_of_idle = $row['number_idle'];
          //  $this->User_Model->update_profile(array("attempt_idle" => $get_attempt_idle+1, "number_idle" => $number_of_idle+1 ), $user_id);

           if($row['attempt_idle'] >=2){
              // $this->User_Model->update_profile(array("idle_code" => $this->generateRandomString()), $user_id);

           }
            echo $user_id;

    }

       public function update_user_activities(){
             $this->User_Model->update_profile(array("lacking_status" => 0), $this->session->userdata['userlogin']['user_id']);
    }


     function CalculateTime($time1, $time2) {
      $time1 = date('H:i:s',strtotime($time1));
      $time2 = date('H:i:s',strtotime($time2));
      $times = array($time1, $time2);
      $seconds = 0;
      foreach ($times as $time)
      {
        list($hour,$minute,$second) = explode(':', $time);
        $seconds += $hour*3600;
        $seconds += $minute*60;
        $seconds += $second;
      }
      $hours = floor($seconds/3600);
      $seconds -= $hours*3600;
      $minutes  = floor($seconds/60);
      $seconds -= $minutes*60;
      if($seconds < 9)
      {
      $seconds = "0".$seconds;
      }
      if($minutes < 9)
      {
      $minutes = "0".$minutes;
      }
        if($hours < 9)
      {
      $hours = "0".$hours;
      }
      return "{$hours}.{$minutes}.{$seconds}";
    }
    

         public function update_idle_auto(){
           date_default_timezone_set('Asia/Manila');
            $user_id =  $this->session->userdata['userlogin']['user_id'];
    
            $get_idle_time =  date('H:i:s', strtotime($this->input->get('idleTime')));

            $this->Idle_Model->select_idle_user_auto_update($user_id, date('H:i:s', strtotime($get_idle_time)));


    }



         public function session_id_hide(){
          $user_id =  $this->session->userdata['userlogin']['user_id'];
          // $data= array(
          //                  'user_id' => $user_id,
          //                  'status_idle' => 1,
          //                  'status_idle_user' => "auto",
          //                  'date_idle'  =>  date("Y-m-d"),   
          //                  'idle_time'  =>  date("01:00:00")
          //                );
          //  $this->Idle_Model->insert($data);

            echo $user_id;

    }


  function generateRandomString($length = 20) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
   }


    public function users(){

      modules::run("account/is_logged_in");
      
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['users']= $this->User_Model->view_alluser();

      $this->load->view('template/header_admin', $records);
      $this->load->view('template/sidebar_admin', $records);
      $this->load->view('users', $records);
      $this->load->view('template/footer_admin', $records);

    }

  public function view_user_profile($userid) { 

       $data=array();

       $userid =$this->User_Model->select_user_id($this->input->get('user_id')); 

       $data = $userid;

       echo json_encode($data);             

    }

  public function assign_user(){

        modules::run("account/is_logged_in");
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

    if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          //$data = array_merge($this->Lead_Model->select_not_assign_manager());
          $data = $this->Lead_Model->select_lead_exist_assign_manager_regular();
          $data_vip = $this->Lead_Model->select_lead_exist_assign_manager_vip();


          $records['leads']= $data;
          $records['leads_vip']= $data_vip;

          $records['assign_users']= $this->User_Model->select_user_manager();

          $records['lead_date_creates']= $this->Lead_Model->select_create_date_manager();

          $records['lead_availables']= $this->Lead_Model->select_count_existingleadadmin($this->session->userdata['userlogin']['user_id']);

          $records['assign_managers']= $this->User_Model->view_assign_user($this->session->userdata['userlogin']['user_id']);

              $this->load->view('template/header_admin', $records);
              $this->load->view('template/sidebar_admin', $records);
              $this->load->view('assign_manager', $records);     
              $this->load->view('template/footer_admin', $records);
      }
     else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $data = array_merge($this->Lead_Model->select_lead_existassign_manager($this->session->userdata['userlogin']['user_id']));

          $records['leads']= $data;

          $records['assign_users']= $this->User_Model->select_user_agent();

          $records['lead_date_creates']= $this->Lead_Model->select_create_date_agent($this->session->userdata['userlogin']['user_id']);

          $records['assign_agents']= $this->User_Model->view_assign_user($this->session->userdata['userlogin']['user_id']);

          $this->load->view('template/header_manager', $records);
          $this->load->view('template/sidebar_manager', $records);
          $this->load->view('assign_agent', $records); 
          $this->load->view('template/footer_manager', $records);     

       }

    }
      public function assign_agent(){

        modules::run("account/is_logged_in");

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

    if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          // $data = array_merge($this->Lead_Model->select_lead_assign_admin());
          $data = $this->Lead_Model->select_lead_assign_agent_regular();
          $data_vip = $this->Lead_Model->select_lead_assign_agent_vip();

          $records['leads']= $data;
          $records['leads_vip']= $data_vip;

          $records['assign_users']= $this->User_Model->select_user_agent();

          $records['lead_date_creates']= $this->Lead_Model->select_create_date_agent($this->session->userdata['userlogin']['user_id']);

          $records['assign_agents']= $this->User_Model->view_assign_agent($this->session->userdata['userlogin']['user_id']);
          $records['agents_active']= $this->User_Model->select_user_agent();

           $this->load->view('template/header_admin', $records);
           $this->load->view('template/sidebar_admin', $records);
           $this->load->view('assign_agent', $records);      
           $this->load->view('template/footer_admin', $records);

         }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $data = array_merge($this->Lead_Model->select_lead_existassign_manager($this->session->userdata['userlogin']['user_id']));

          $records['leads']= $data;


          $records['assign_users']= $this->User_Model->select_user_agent();

          $records['lead_date_creates']= $this->Lead_Model->select_create_date_agent($this->session->userdata['userlogin']['user_id']);

          $records['assign_agents']= $this->User_Model->view_assign_user($this->session->userdata['userlogin']['user_id']);

          
           $this->load->view('template/header_admin', $records);
           $this->load->view('template/sidebar_admin', $records);
           $this->load->view('assign_agent', $records);      
           $this->load->view('template/footer_admin', $records);   

         }

    }

  public function register(){



       $this->form_validation->set_rules('firstname','Full Name','trim|required|xss_clean');            

       $this->form_validation->set_rules('lastname','Last Name','trim|xss_clean|required');       

       $this->form_validation->set_rules('username','UserName','trim|xss_clean|required');  

       $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required|valid_email|is_unique[tbluser.email_address]');

       $this->form_validation->set_rules('password','Password','trim|xss_clean|required|min_length[8]');       

       $this->form_validation->set_rules('confirmpassword','Confirmation Password','trim|xss_clean|matches[password]');       



       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{



         $hash = md5(uniqid(rand(), true));

         $key = $this->config->item('encryption_key');

         $salt1 = hash('sha512', $key . $this->input->post('password'));

         $salt2 = hash('sha512', $this->input->post('password') . $key);

         $hashed_password = hash('sha512', $salt1 . $this->input->post('password') . $salt2);

        

         $data = array(

                       'firstname' => $this->input->post('firstname'),

                       'lastname' => $this->input->post('lastname'),

                       'username' => $this->input->post('username'),

                       'password' => $hashed_password,

                       'emailaddress' => $this->input->post('email_address'),

                       'status_user'  => 'Active', 

                       'userlogin' =>  1,

                       'attempt' => 3,

                       'usertype' => 'Agent'

                     );



          $this->User_Model->insert($data);

          echo json_encode(array("response" => "success", "message" => "You are successfully registered account", "redirect" => base_url('account')));

        }

    }

    public function add_user(){

        $configUpload['upload_path'] = FCPATH.'upload_signatures/';

        $configUpload['allowed_types'] = 'gif|png|jpg';

        $configUpload['file_name'] = 'images' .uniqid() . '_' . date('Y-m-d');


        $configUpload['max_size'] = 2000;

        $configUpload['max_width'] = 1500;

         $configUpload['max_height'] = 1500;

         $this->load->library('upload', $configUpload);

       $this->form_validation->set_rules('real_name','Real Name','trim|required|xss_clean');            
       $this->form_validation->set_rules('firstname','First Name','trim|required|xss_clean');            


       $this->form_validation->set_rules('lastname','Last Name','trim|xss_clean|required');       

       $this->form_validation->set_rules('username','UserName','trim|xss_clean|required');  

       $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required|valid_email');

       $this->form_validation->set_rules('contact','Contact Number','trim|required|xss_clean');    

       $this->form_validation->set_rules('agreement','Agreement and Policy','trim|xss_clean|required');  



       // $this->form_validation->set_rules('password','Password','trim|xss_clean|required|min_length[8]');       

       // $this->form_validation->set_rules('confirmpassword','Confirmation Password','trim|xss_clean|matches[password]');       


       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 
       else if (!empty($_FILES['uploadsignature']['name'])) {
           if (!$this->upload->do_upload('uploadsignature')){

                 echo json_encode(array("response" => "error", "message" => $this->upload->display_errors('','')));  

            }
          else{

            $get_file_name = $this->upload->data();

             $inputFileName = $get_file_name['file_name'];


             $random = $this->input->post('firstname') .''. $this->input->post('lastname');

             $get_random = substr(str_shuffle($random), 0, 7);

             $hash = md5(uniqid(rand(), true));

             $key = $this->config->item('encryption_key');

             $salt1 = hash('sha512', $key . $get_random);

             $salt2 = hash('sha512', $get_random . $key);

             $hashed_password = hash('sha512', $salt1 . $get_random . $salt2);



         $data = array(

                       'firstname' => $this->input->post('firstname'),

                       'lastname' => $this->input->post('lastname'),

                       'username' => $this->input->post('username'),

                       'password' => $hashed_password,

                       'emailaddress' => $this->input->post('email_address'),

                       'contact' => $this->input->post('contact'),

                       'status_user'  => 'Active', 

                       'userlogin' =>  1,

                       'attempt' => 3,

                       'usertype' => $this->input->post('usertype'),
                       'schedule_status' => $this->input->post('schedule_type'),
                       'time_in_start' => date('H:i:s', strtotime($this->input->post('start_time'))),
                       'time_out_start' => date('H:i:s', strtotime($this->input->post('end_time'))),
                       'signature' => $inputFileName,

                     );



                  $this->User_Model->insert($data);



                  $subject = 'TEMPORARY PASSWORD';

                  $url= base_url("account");

                  $message =  '<h1>Temporary Password</h1>';

                  $message .= '<p>Hi '. ucfirst($this->input->post('firstname')) . ' '.ucfirst($this->input->post('lastname')). '</p>';

                  $message .= '<p>This is Your Email <b>'. $this->input->post('email_address').'</b> And </p>';

                  $message .= '<p>Your Tempory Password <b>'.$get_random.'</b>  was trying to put your password and after login your account, you can change your password after login your account on setting.</p>';

                  $message .= '<p>Click this link to login your account <a href="'.$url.'">Click Here</a></p>';



                  $this->email->set_newline("\r\n");

                  $this->email->set_header('MIME-Version', '1.0; charset=utf-8');



                  $this->email->from('admin@horizonsliterary.us');

                  $this->email->to($this->input->post('email_address'));

                  $this->email->subject($subject);

                  $this->email->message($message);

        

                 //Send mail

                if($this->email->send()){

                      echo json_encode(array("response" => "success", "message" => "You are successfully added account", "redirect" => base_url('account')));

                  }

                else{

                    echo json_encode(array("response" => "errorsend", "message" => "Failure: Email was not sent"));

                  }


           }


   }          

       else{


         $random = $this->input->post('firstname') .''. $this->input->post('lastname');

         $get_random = substr(str_shuffle($random), 0, 7);

         $hash = md5(uniqid(rand(), true));

         $key = $this->config->item('encryption_key');

         $salt1 = hash('sha512', $key . $get_random);

         $salt2 = hash('sha512', $get_random . $key);

         $hashed_password = hash('sha512', $salt1 . $get_random . $salt2);





         $data = array(

                       'firstname' => $this->input->post('firstname'),

                       'lastname' => $this->input->post('lastname'),

                       'username' => $this->input->post('username'),

                       'password' => $hashed_password,

                       'emailaddress' => $this->input->post('email_address'),

                       'contact' => $this->input->post('contact'),

                       'status_user'  => 'Active', 

                       'userlogin' =>  1,

                       'attempt' => 3,

                       'usertype' => $this->input->post('usertype'),
                       'schedule_status' => $this->input->post('schedule_type'),
                       'time_in_start' => date('H:i:s', strtotime($this->input->post('start_time'))),
                       'time_out_start' => date('H:i:s', strtotime($this->input->post('end_time'))),

                     );



                  $this->User_Model->insert($data);



                  $subject = 'TEMPORARY PASSWORD';

                  $url= base_url("account");

                  $message =  '<h1>Temporary Password</h1>';

                  $message .= '<p>Hi '. ucfirst($this->input->post('firstname')) . ' '.ucfirst($this->input->post('lastname')). '</p>';

                  $message .= '<p>This is Your Email <b>'. $this->input->post('email_address').'</b> And </p>';

                  $message .= '<p>Your Tempory Password <b>'.$get_random.'</b>  was trying to put your password and after login your account, you can change your password after login your account on setting.</p>';

                  $message .= '<p>Click this link to login your account <a href="'.$url.'">Click Here</a></p>';



                  $this->email->set_newline("\r\n");

                  $this->email->set_header('MIME-Version', '1.0; charset=utf-8');



                  $this->email->from('admin@horizonsliterary.us');

                  $this->email->to($this->input->post('email_address'));

                  $this->email->subject($subject);

                  $this->email->message($message);

        

                 //Send mail

                if($this->email->send()){

                      echo json_encode(array("response" => "success", "message" => "You are successfully added account", "redirect" => base_url('account')));

                  }

                else{

                    echo json_encode(array("response" => "errorsend", "message" => "Failure: Email was not sent"));

                  }
           }
    }

      //Update User

      public function update_user(){

        $configUpload['upload_path'] = FCPATH.'upload_signatures/';

        $configUpload['allowed_types'] = 'gif|png|jpg';

        $configUpload['file_name'] = 'images' .uniqid() . '_' . date('Y-m-d');


        $configUpload['max_size'] = 2000;

        $configUpload['max_width'] = 1500;

        $configUpload['max_height'] = 1500;
         
         $this->load->library('upload', $configUpload);

      $user_id = $this->input->post('userid');

       $this->form_validation->set_rules('real_name','Real Name','trim|required|xss_clean');            

       $this->form_validation->set_rules('firstname','Full Name','trim|required|xss_clean');            

       $this->form_validation->set_rules('lastname','Last Name','trim|xss_clean|required');       

       $this->form_validation->set_rules('username','UserName','trim|xss_clean|required');  

       $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required|valid_email');

       $this->form_validation->set_rules('contact','Contact Number','trim|required|xss_clean');    

       $this->form_validation->set_rules('usertype','Usertype','trim|xss_clean|required');

       $this->form_validation->set_rules('status','Status','trim|xss_clean|required');

         
       // $this->form_validation->set_rules('password','Password','trim|xss_clean|required|min_length[8]');       

       // $this->form_validation->set_rules('confirmpassword','Confirmation Password','trim|xss_clean|matches[password]');       



       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       }    
       else if (!empty($_FILES['uploadsignature']['name'])) {
           if (!$this->upload->do_upload('uploadsignature')){

                 echo json_encode(array("response" => "error", "message" => $this->upload->display_errors('','')));  

            }
          else{

            $get_file_name = $this->upload->data();

             $inputFileName = $get_file_name['file_name'];


             $random = $this->input->post('firstname') .''. $this->input->post('lastname');

             $get_random = substr(str_shuffle($random), 0, 7);

             $hash = md5(uniqid(rand(), true));

             $key = $this->config->item('encryption_key');

             $salt1 = hash('sha512', $key . $get_random);

             $salt2 = hash('sha512', $get_random . $key);

             $hashed_password = hash('sha512', $salt1 . $get_random . $salt2);



         $data = array(
                      
                       'real_name' => $this->input->post('real_name'),

                       'firstname' => $this->input->post('firstname'),

                       'lastname' => $this->input->post('lastname'),

                       'username' => $this->input->post('username'),

                       'password' => $hashed_password,

                       'emailaddress' => $this->input->post('email_address'),

                       'contact' => $this->input->post('contact'),

                       'status_user'  => 'Active', 

                       'userlogin' =>  1,

                       'attempt' => 3,

                       'usertype' => $this->input->post('usertype'),
                       'schedule_status' => $this->input->post('schedule_type'),
                       'time_in_start' => date('H:i:s', strtotime($this->input->post('start_time'))),
                       'time_out_start' => date('H:i:s', strtotime($this->input->post('end_time'))),
                       'signature' => $inputFileName,

                     );


                  $this->User_Model->update_profile($data, $this->input->post('userid'));
               

             }
               echo json_encode(array("response" => "success", "message" => "Successfully updated account", "redirect" => base_url('account')));

         }          
    
       else{



        $data = array(

                      'real_name' => $this->input->post('real_name'),
          
                      'firstname' => $this->input->post('firstname'),

                       'lastname' => $this->input->post('lastname'),

                       'username' => $this->input->post('username'),

                       'emailaddress' => $this->input->post('email_address'),

                       'contact' => $this->input->post('contact'),

                       'status_user'  => $this->input->post('status'),

                       'usertype' => $this->input->post('usertype'),
                       'schedule_status' => $this->input->post('schedule_type'),
                       'time_in_start' => date('H:i:s', strtotime($this->input->post('start_time'))),
                       'time_out_start' => date('H:i:s', strtotime($this->input->post('end_time'))),

                     );



                  $this->User_Model->update_profile($data, $this->input->post('userid'));


                   echo json_encode(array("response" => "success", "message" => "Successfully updated account", "redirect" => base_url('account')));

                 
           }
      }


       public function loginAs(){

        $emailaddress = $this->input->get('emailaddress');

        $usertype = $this->input->get('usertype');
      //   exit();
      //  $data =$this->User_Model->select_user_id($userid); 


      // // echo json_encode($data);  
      //  // print_r($data);
      //  // echo "</br>". $data[0]['username'];

      //   $emailaddress = $data[0]['emailaddress'];

      //   $usertype = $data[0]['usertype'];


      

            // $emailaddress = strtolower($this->input->post('email_address'));

            // $password = $this->input->post('password');
            // $usertype = $this->input->post('usertype');

            $user = $this->User_Model->loginAs($emailaddress, $usertype);
            

            if ($user){

                foreach ($user as  $result) {

                  $sessiondata=array( 'username' => ucfirst($result->username),

                                      'user_id' => $result->user_id,
                                      'extension_number' => $result->extension_number,

                                      'real_name' => ucfirst($result->real_name),
                                      'sub_name' => ucfirst($result->sub_name),
                                      'firstname' => ucfirst($result->firstname),

                                      'lastname' => ucfirst($result->lastname),

                                      'emailaddress' =>$result->emailaddress,

                                      'contact_number' =>$result->contact,

                                      'avatar' =>$result->avatar,

                                      'position' =>$result->position,

                                      'usertype' =>$result->usertype,

                                      'commission_rate' =>$result->commission_rate,

                              );

                   $data = array(

                       'user_id' => $result->user_id,

                       'login_status' => 'login',

                       'log_date' =>  date('Y-m-d h:i:s a'),

                     );

                   $this->session->set_userdata('userlogin',$sessiondata);

                  if ($result->status_user == 'Active'){

                    

                      //$this->User_Model->update_userlog($emailaddress, $password);

                      $this->User_Model->insert_userlog($data);
                         if ($result->usertype == 'Cover Designer' || $result->usertype == 'Interior Designer' ){
                              $this->Lead_Model->update_date_received_designer($result->user_id);


                         }

                      // $this->User_Model->update_userlog($emailaddress, $password);
                       echo json_encode(array("response" => "success", "message" => "You have successfully logged in!", 'userlogin' => $this->session->userdata['userlogin']['usertype'], "redirect" => base_url("dashboard")));
                       $this->User_Model->update_profile(array('lacking_status'  => 1), $this->session->userdata['userlogin']['user_id']);

                      }

                  else if ($result->attempt <= 0){

                      echo json_encode(array("response" => "error", "message" => "Account has been locked, please contact the Administrator."));



                  }

                  else{

                       echo json_encode(array("response" => "error", "message" => "Account has been disabled, please contact the Administrator."));

                      }

                  }

              }

        else{

              $this->User_Model->update_attempt($this->input->post('email_address'));

              echo json_encode(array("response" => "error", "message" => "Incorrect your Email Address, Password or User type"));

            }
    }

    public function update_profile(){



       // $this->form_validation->set_rules('real_name','Real Namer','trim|required|xss_clean');            
       $this->form_validation->set_rules('firstname','Full Name','trim|required|xss_clean');            

       $this->form_validation->set_rules('lastname','Last Name','trim|xss_clean|required');       

       $this->form_validation->set_rules('username','UserName','trim|xss_clean|required');  

       $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required|valid_email|is_unique[tbluser.email_address]');

       $this->form_validation->set_rules('contact','Contact Number','trim|required|xss_clean'); 

       if($this->input->post('email_address')  == $this->input->post('email_address_confirm')){

         $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required|valid_email');

       }

       else{

          $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required|valid_email|is_unique[tbluser.email_address]');



       }

       // $this->form_validation->set_rules('password','Password','trim|xss_clean|required|min_length[8]');       

       // $this->form_validation->set_rules('confirmpassword','Confirmation Password','trim|xss_clean|matches[password]');       



       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{



         $data = array(

                       'firstname' => $this->input->post('firstname'),

                       'lastname' => $this->input->post('lastname'),

                       'username' => $this->input->post('username'),

                       'emailaddress' => $this->input->post('email_address'),

                       'contact' => $this->input->post('contact'),

                       'status_user'  => 'Active', 

                       'userlogin' =>  1,

                       'attempt' => 3,

                       'usertype' => $this->session->userdata['userlogin']['usertype'] == 'Admin' ? $this->input->post('usertype') : $this->session->userdata['userlogin']['usertype']

                     );



                  $this->User_Model->update_profile($data, $this->session->userdata['userlogin']['user_id']);



            echo json_encode(array("response" => "success", "message" => "You Account Successfully Updated", "redirect" => base_url('account')));

        }

    }

     public function login_user(){



       $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required');

       $this->form_validation->set_rules('password','Password','trim|xss_clean|required');
       $this->form_validation->set_rules('usertype','User Type','trim|xss_clean|required');



       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       }
       elseif ($this->agent->is_mobile() && $this->input->post('usertype') !="IT")  {
             echo json_encode(array("response" => "error", "message" => "You can't enable login by using Phone Device. Please  Contact the Administrator"));
        }

       else{

            $emailaddress = strtolower($this->input->post('email_address'));

            $password = $this->input->post('password');
            $usertype = $this->input->post('usertype');

            $user = $this->User_Model->login($emailaddress, $password, $usertype);
      
            if ($user){

                foreach ($user as  $result) {

                  $sessiondata=array( 'username' => ucfirst($result->username),

                                      'user_id' => $result->user_id,

                                      'extension_number' => $result->extension_number,

                                      'real_name' => ucfirst($result->real_name),
                                      'sub_name' => ucfirst($result->sub_name),

                                      'firstname' => ucfirst($result->firstname),

                                      'lastname' => ucfirst($result->lastname),

                                      'emailaddress' =>$result->emailaddress,

                                      'contact_number' =>$result->contact,

                                      'avatar' =>$result->avatar,

                                      'position' =>$result->position,

                                      'usertype' =>$result->usertype,

                                      'commission_rate' =>$result->commission_rate,

                              );

                   $data = array(
                       'user_id' => $result->user_id,
                       'login_status' => 'login',
                       'log_date' =>  date('Y-m-d h:i:s a'),
                       // 'attempt_activities' =>  1,

                     );

                   $this->session->set_userdata('userlogin',$sessiondata);

                  if ($result->status_user == 'Active' && $result->attempt_idle <=2){

                    

                      // $this->User_Model->update_userlog($emailaddress, $password);

                     $this->User_Model->insert_userlog($data);
                         if ($result->usertype == 'Cover Designer' || $result->usertype == 'Interior Designer' ){
                              $this->Lead_Model->update_date_received_designer($result->user_id);

                         }

                       echo json_encode(array("response" => "success", "message" => "You have successfully logged in!", 'userlogin' => $this->session->userdata['userlogin']['usertype'], "redirect" => base_url("dashboard")));
                       $this->User_Model->update_profile(array('lacking_status'  => 1), $this->session->userdata['userlogin']['user_id']);


                      }
                 else if ($result->attempt <= 0){
                      echo json_encode(array("response" => "error", "message" => "Account has been locked, please contact the Administrator."));
                  }

                 else if ($result->attempt_idle >= 3){
                      echo json_encode(array("response" => "idle_error", "message" => "Account has been locked, Please enter your code.", 'user_id' => $this->session->userdata['userlogin']['user_id']));

                  }

                  else{
                       echo json_encode(array("response" => "error", "message" => "Account has been disabled, please contact the Administrator."));
                      }

                  }

              }

        else{

              $this->User_Model->update_attempt($this->input->post('email_address'));

              echo json_encode(array("response" => "error", "message" => "Incorrect your Email Address, Password or User type"));

            }

        }

    }



     public function forgot_password(){

        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|xss_clean|valid_email');



        $user = $this->User_Model->get_emailaddress($this->input->post('email_address'));



        if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

        }

        else if ($user){

                foreach ($user as  $result) {

                  $subject = 'Activate Your Email';

                  $url= base_url("account/reset_password/".urlencode($this->input->post('email_address'))."");

                  $message =  '<h1>Forgot Password</h1>';

                  $message .= '<p>Hi '. $result->firstname . ' ' .$result->lastname . '</p>';

                    $message .= '<p>This Email '. $this->input->post('email_address') .' was trying to reset your password</p>';

                  $message .= '<p>Click this link to reset your password <a href="'.$url.'">Click Here</a></p>';



                  $this->email->set_newline("\r\n");

                  $this->email->set_header('MIME-Version', '1.0; charset=utf-8');



                  $this->email->from('admin@horzonsliterary.us');

                  $this->email->to($this->input->post('email_address'));

                  $this->email->subject($subject);

                  $this->email->message($message);

                 }

       //Send mail

              if($this->email->send()){

                   echo json_encode(array("response" => "success", "message" => "A reset password has been sent"));

                }

              else{

                    echo json_encode(array("response" => "errorsend", "message" => "Failure: Email was not sent"));

                  }

             }

       else{

          echo json_encode(array("response" => "errorsend", "message" => "Your Email address  doesnt Exist."));

          }

     }

     public function reset_password(){

          $records['emailaddress'] = utf8_decode(urldecode(strtolower($this->uri->segment(3))));

          $user = $this->User_Model->get_emailaddress(utf8_decode(urldecode(strtolower($this->uri->segment(3)))));



          if ($user){

                   $this->load->view('resetpassword', $records);

          }

          else{

                   $this->load->view('login');



          }



      }

  //  change password

     public function update_password() {

      $this->form_validation->set_rules('current_password','Current Password', 'trim|required|xss_clean');

      $this->form_validation->set_rules('new_password','New Password', 'trim|required|xss_clean|min_length[8]');

      $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[new_password]');



      if ($this->form_validation->run() == FALSE){

          echo json_encode(array("response" => "error", "message" => validation_errors()));

      }

      else{

           $hash = md5(uniqid(rand(), true));

           $key = $this->config->item('encryption_key');

           $salt1 = hash('sha512', $key . $this->input->post('new_password'));

           $salt2 = hash('sha512', $this->input->post('new_password') . $key);

           $hashed_password = hash('sha512', $salt1 . $this->input->post('new_password') . $salt2);



            $user = $this->User_Model->change_password($this->session->userdata['userlogin']['user_id'], $this->input->post('current_password'), $hashed_password);



             if ($user){

                  echo json_encode(array("response" => "success",  "message" => "Password has been changed. <a href='".base_url('account/login_user')."'>Click here to Login</a>"));

              }

              else{

                  echo json_encode(array("response" => "error", "message" => "Password could not be reset"));

           }

        }

    }


 //  change password manager

     public function update_password_mgr() {

      $this->form_validation->set_rules('current_password','Current Password', 'trim|required|xss_clean');

      $this->form_validation->set_rules('new_password','New Password', 'trim|required|xss_clean|min_length[8]');

      $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[new_password]');



      if ($this->form_validation->run() == FALSE){

          echo json_encode(array("response" => "error", "message" => validation_errors()));

      }

      else{

           $hash = md5(uniqid(rand(), true));

           $key = $this->config->item('encryption_key');

           $salt1 = hash('sha512', $key . $this->input->post('new_password'));

           $salt2 = hash('sha512', $this->input->post('new_password') . $key);

           $hashed_password = hash('sha512', $salt1 . $this->input->post('new_password') . $salt2);



            $user = $this->User_Model->change_password($this->session->userdata['userlogin']['user_id'], $this->input->post('current_password'), $hashed_password);



             if ($user){

                  echo json_encode(array("response" => "success",  "message" => "Password has been changed. <a href='".base_url('account/login_user')."'>Click here to Login</a>"));

              }

              else{

                  echo json_encode(array("response" => "error", "message" => "Password could not be reset"));

           }

        }

    }





public function update_password_homepage() {

      $this->form_validation->set_rules('newpassword','New Password', 'trim|required|xss_clean|min_length[8]');

      $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|xss_clean|matches[newpassword]');



      if ($this->form_validation->run() == FALSE){

          echo json_encode(array("response" => "error", "message" => validation_errors()));

      }

      else{



          $hash = md5(uniqid(rand(), true));

           $key = $this->config->item('encryption_key');

           $salt1 = hash('sha512', $key . $this->input->post('newpassword'));

           $salt2 = hash('sha512', $this->input->post('newpassword') . $key);

           $hashed_password = hash('sha512', $salt1 . $this->input->post('newpassword') . $salt2);



            $user = $this->User_Model->reset_password($this->input->post('email_address'), $hashed_password);



             if ($user){

                  echo json_encode(array("response" => "success", "message" => "Password has been changed. <a href='".base_url('account/login_user')."'>Click here to Login</a>"));

              }

              else{

                  echo json_encode(array("response" => "error", "message" => "Password could not be reset"));

           }

        }

    }



  public function add_assign_user(){

       $date_assign = date('Y-m-d H:i:s');

       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       // $this->form_validation->set_rules('manager','Assign Agent','trim|required|xss_clean');            

       $this->form_validation->set_rules('manager','Assign Manager','trim|required|xss_clean'); 

       $project_id = $this->input->post('project_id') ? $this->input->post('project_id') : array();

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{



          foreach ($project_id as $value) {

              $this->Lead_Model->update_lead_assign(array('manager_id' => $this->input->post('manager'), 'lead_assign' => 1, 'check_lead' => 1, 'lead_date_assign' => $date_assign), $value);

           }

                $data = array(

                           'user_id_assign' => $this->session->userdata['userlogin']['user_id'],

                           'user_id' => $this->input->post('manager'),

                           'date_assign' => $date_assign,

                         );

                 $data_notification= array(

                                   'from_user' => $user_charge,
                                   'to_user' => 'Manager',
                                   'message' => $user_charge." assigned you a new lead/s",
                                   'unread' => 1,
                                   'date_notify' => date('Y-m-d H:i:s'),
                                   'link' =>  dirname(base_url(uri_string())),
                                   'to_user_id' => $this->input->post('manager'),
                                   'from_usertype' => $this->session->userdata['userlogin']['usertype'],
                                 );
               $this->Notification_Model->insert($data_notification);

              $this->User_Model->insert_assign_user($data);

             echo json_encode(array("response" => "success", "message" => "Successfully Assign Manager", "redirect" => base_url('account')));





        }

    }

     public function add_assign_agent(){

       $date_assign = date('Y-m-d H:i:s');

       $this->form_validation->set_rules('agent','Assign Agent','trim|required|xss_clean');            

       // $this->form_validation->set_rules('date_lead_assign','Assign Date Lead','trim|required|xss_clean');            

       $project_id = $this->input->post('project_id') ? $this->input->post('project_id') : array();

       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{



          foreach ($project_id as $value) {

              $this->Lead_Model->update_lead_agent(array('user_id' => $this->input->post('agent'), 'lead_assign' => 1, 'status' => 'Assigned Low', 'check_lead' => 1, 'lead_date_agent_assign' => $date_assign), $value);

          }



         $data = array(
                       'user_id_assign' => $this->session->userdata['userlogin']['user_id'],

                       'user_id' => $this->input->post('agent'),

                       'date_assign' => date('Y-m-d H:i:s'),
                     );
           $data_notification= array(

                                   'from_user' => $user_charge,
                                   'to_user' => 'Agent',
                                   'message' => $user_charge." assigned you a new lead/s",
                                   'unread' => 1,
                                   'date_notify' => date('Y-m-d H:i:s'),
                                   'link' =>  dirname(base_url(uri_string())),
                                   'to_user_id' => $this->input->post('agent'),
                                   'from_usertype' => $this->session->userdata['userlogin']['usertype'],
                                 );
           $this->Notification_Model->insert($data_notification);

           $this->User_Model->insert_assign_user($data);


              echo json_encode(array("response" => "success", "message" => "Successfully Assign Agent", "redirect" => base_url('account')));

    

      }

    }

   public function view_lead_assign(){
     $last = end($this->uri->segments);

      if ($this->session->userdata['userlogin']['usertype'] == "Admin" && $this->input->get('assign_user') =='Manager'){

             $assign_lead_managers = $this->Lead_Model->select_lead_assign_manager($this->input->get('manager_id'), $this->input->get('date_lead_assign'));
           echo json_encode($assign_lead_managers);  

      }
      else if ($this->session->userdata['userlogin']['usertype'] == "Admin" && $this->input->get('assign_user') =='Agent'){

           $assign_lead_agents = $this->Lead_Model->select_lead_assign_agent($this->input->get('agent_id'), $this->input->get('date_create'));

           echo json_encode($assign_lead_agents);   

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

           $assign_lead_agents = $this->Lead_Model->select_lead_assign_agent($this->input->get('agent_id'), $this->input->get('date_create'));

           echo json_encode($assign_lead_agents);       



      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

         // $records['leads']= $this->Lead_Model->all_leads();

         // $this->load->view('transaction_payment', $records);

      }



    }



    public function view_available_lead(){

      if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

           $assign_lead_managers = $this->Lead_Model->select_lead_assign_manager($this->input->get('manager_id'), $this->input->get('date_lead_assign'));

           echo json_encode($assign_lead_managers);       



      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

           $assign_lead_agents = $this->Lead_Model->select_count_existingleadmanager($this->session->userdata['userlogin']['user_id'], $this->input->post('date_lead_assign'));

           echo json_encode($assign_lead_agents);       



      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

         // $records['leads']= $this->Lead_Model->all_leads();

         // $this->load->view('transaction_payment', $records);

      }



    }







       public function store_image(){



           $data = $this->input->post('image');



             $image_array_1 = explode(";", $data);



             $image_array_2 = explode(",", $image_array_1[1]);



             $data = base64_decode($image_array_2[1]);



             $imageName = time() . '.png';



             file_put_contents(FCPATH.'images/'.$imageName, $data);



            echo  json_encode(array("response" => "success", "get_image" => $imageName));

          

     }

    public function upload_file(){



         $configUpload['upload_path'] = FCPATH.'images/';

         $configUpload['allowed_types'] = 'gif|png|jpg';

         $configUpload['overwrite'] = TRUE;



         $configUpload['file_name'] = 'images' .uniqid() . '_' . date('Y-m-d');

         $this->load->library('upload', $configUpload);

         $config['max_size'] = 2000;

         $config['max_width'] = 1500;

         $config['max_height'] = 1500;



          if (!$this->upload->do_upload('file')){

              echo json_encode(array("response" => "error", "message" => "format is invalid. It must be an Gif, Jpeg or Png."));  

         } 

         else{



              $get_file_name = $this->upload->data();

              $inputFileName = $get_file_name['file_name'];

               $data = array(

                       'avatar'     => $inputFileName,

                     );



                $this->User_Model->update_profile($data, $this->session->userdata['userlogin']['user_id']);

                echo json_encode(array("response" => "success", "message" => "successfully uploader", "data" => $data));  



         } 

     }



public function take_screenshot(){

     $data = $this->input->post('image');



     $image_array_1 = explode(";", $data);



     $image_array_2 = explode(",", $image_array_1[1]);



     $data = base64_decode($image_array_2[1]);



     $imageName = time() . '.png';



     file_put_contents(FCPATH.'screenshot/'.$imageName, $data);



    echo  json_encode(array("response" => "success", "get_image" => $imageName));

     }



    function is_logged_in(){

        $is_logged_in = $this->session->userdata('userlogin');

        if(!isset($is_logged_in) || $is_logged_in != true){

             redirect('account');

          exit();

        }

    }

    function time(){

    $ci = &get_instance();

    $SessTimeLeft    = 0;

    $SessExpTime     = $ci->config->config["sess_expiration"];

    echo $SessExpTime;

    }

    function expire_login(){

        $is_logged_in = $this->session->userdata('userlogin');

        if(!isset($is_logged_in) || $is_logged_in != true){

             $data = $this->input->post('image');



             $image_array_1 = explode(";", $data);



             $image_array_2 = explode(",", $image_array_1[1]);



             $data = base64_decode($image_array_2[1]);



             $imageName = time() . '.png';



             file_put_contents(FCPATH.'screenshots/'.$imageName, $data);



             echo  json_encode(array("response" => $this->session->userdata['userlogin']['user_id'], "redirect" => base_url('account/logout')));

        }

        else{

            echo  json_encode(array("response" => "login", "get_image" => $imageName));

        }

    }


    public function select_accountype(){

          $data = array();

          $user_list = $this->User_Model->select_user($this->input->post('user_type'));

          if ($user_list > 0) {

              $data = $user_list;

              echo json_encode($data);

         }

         else{

            echo json_encode($data);

         }

    }

    public function logout(){

        $this->session->userdata('userlogin');

        $this->session->sess_destroy();

        redirect('account'); 

      }


     function idle_user($get_idle){
      $get_idle =  date("H:i:s", strtotime($this->input->get('idleTime')));
       if ($this->session->userdata('userlogin') == true && $this->session->userdata['userlogin']['usertype'] == 'Agent'){
             $user_log = $this->Idle_Model->select_idle_user($this->session->userdata['userlogin']['user_id'], $get_idle);
             $user_attendance = $this->Attendance_Model->select_exist_attendance($this->session->userdata['userlogin']['user_id']);
             $data = array(

                       'user_id' => $this->session->userdata['userlogin']['user_id'],
                       'idle_time' => date("H:i:s", strtotime($this->input->get('idleTime'))),
                       'date_idle' => date('Y-m-d'),
                       'status_idle' => 1,

                     );
                if ($user_attendance == true){
                      echo json_encode("success");          
                      if ($user_log == true){

                           $this->Idle_Model->update_idle($data, $this->session->userdata['userlogin']['user_id']);
                      }
                      else{
                         $this->Idle_Model->insert($data);
                        }
                  }
                else{
                   echo json_encode("failed");
                }
              }

      else{
              echo json_encode("No Exist");   
        }
    }


      function idle_user_beep($get_idle){
         $get_idle =  date("H:i:s", strtotime($this->input->get('idleTime')));
       if ($this->session->userdata('userlogin') == true && $this->session->userdata['userlogin']['usertype'] == 'Agent'){
             $data = array(

                       'user_id' => $this->session->userdata['userlogin']['user_id'],
                       'idle_time' => date("H:i:s", strtotime($this->input->get('idleTime'))),
                       'date_idle' => date('Y-m-d'),

                     );

                     $this->Idle_Model->update_idle($data, $this->session->userdata['userlogin']['user_id']);
                  }


      else{
              echo json_encode("No Exist");   
        }
    }


     function update_idle_status(){
       if ($this->session->userdata('userlogin')){
             if ($this->session->userdata['userlogin']['usertype'] == 'Agent'){
               $this->Idle_Model->update_idle(array('status_idle' => 0), $this->session->userdata['userlogin']['user_id']);
        }
      }
    }
     function update_idle_manual(){
          $this->Idle_Model->update_idle(array('status_idle' => 0), $this->input->post('user_id'));
          echo json_encode(array("response" => "success", "message" => "You are successfully updated Idle", "redirect" => base_url('account')));

    }



 public function calculator(){
      modules::run("account/is_logged_in");
      $this->load->view('calculator');

    }

//     public function recent_activities(){
//       date_default_timezone_set('America/New_York');

//   modules::run("account/is_logged_in");
  
//   $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
//   $user_id = $this->session->userdata['userlogin']['user_id'];
//   $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
//   $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
//   //$records['users']= $this->User_Model->view_alluser();
//   $records['users']= $this->Remark_Model->user_remarks($this->session->userdata['userlogin']['user_id']);
//   $records['current_activities'] =  $this->Remark_Model->select_count_remarks_agent($user_id, date('Y-m-d'));

//   $this->load->view('template/header_admin', $records);
//   $this->load->view('template/sidebar_admin', $records);
//   $this->load->view('activities', $records);
//   $this->load->view('template/footer_admin', $records);

// }
 //account add leave
  public function add_leave(){
       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       $this->form_validation->set_rules('leavepay','Leave Pay','trim|required|xss_clean');          

       $this->form_validation->set_rules('leavetype','Leave Type','trim|xss_clean|required');  

       $this->form_validation->set_rules('position','Position','trim|required|xss_clean');  

       $this->form_validation->set_rules('inclusive-date','Inclusive date','trim|required|xss_clean');   

       $this->form_validation->set_rules('comment','Reasons for Leave','trim|xss_clean|required');  
       $this->form_validation->set_rules('agent_signature','Signature','trim|xss_clean|required'); 

       // if(empty($this->input->post('agent_signature'))){
       //         $this->form_validation->set_rules('agent_signature','Signature','trim|xss_clean|required'); 

       // }
       //  else if(empty($this->input->post('hr_signature'))){
       //         $this->form_validation->set_rules('hr_signature','Signature','trim|xss_clean|required'); 

       // }
      
 

       if ($this->form_validation->run() == FALSE){
          echo json_encode(array("response" => "error", "message" => validation_errors()));
        } 
       else{

        $date = explode(" - ", $this->input->post('inclusive-date'));
        $from = $date[0];
        $to = $date[1];

        $leave = "Leave Form";

        $data = array(

                       'user_id' => $this->input->post('userid'),
                       'employee_name' => $this->session->userdata['userlogin']['real_name'],

                       'position' => $this->input->post('position'),

                       'reason' => $this->input->post('comment'),
 
                       'requested_leave_type' => $this->input->post('leavetype'),

                       'requested_leave_pay' => $this->input->post('leavepay'),

                       'inclusive_from' => $from,

                       'inclusive_to' => $to,
                       'approval_status' => 'Pending',
                       'approval_status_manager' => 'Pending',
                       'notice_status_hr' => 'Pending',
                       'leave_type_others' => $this->input->post('others'),

                       'form_type' => $leave,
                       'agent_signature' => $this->input->post('agent_signature'),
                       'agent_transaction_code' => $this->input->post('transaction_code')
                    );
                  $this->Form_Model->insert($data);

                       $data['link'] = 'http://143.44.162.253/bba_crm/crm/dashboard/view_forms?id='.$this->db->insert_id().'';

                        $mail = $this->phpmailer_lib->load();
                        
                        // SMTP configuration
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = "ssl";
                        $mail->Port = 465;

                        $mail->Username = 'admin@horizonsliterary.us'; // YOUR gmail email
                        $mail->Password = 'thankyouGodlovesUs143@'; // YOUR gmail password
                        
                        // Sender and recipient settings
                         $mail->SetFrom('admin@horizonsliterary.us', $this->session->userdata['userlogin']['real_name']);
                         $mail->AddReplyTo($this->session->userdata['userlogin']['emailaddress'], $this->session->userdata['userlogin']['real_name']);
                         $mail->addAddress('paul.anderson@betterboundhouse.com', 'Sandra Lauder');
                         $mail->addCC('admin@bbadvtg.com', 'Better Bound House');

                    
                    // // Add a recipient
                    // $mail->addAddress('john.doe@gmail.com');
                    
                    // // Add cc or bcc 
                    // $mail->addBCC('bcc@example.com');
                    
                    // Email subject
                        $mail->Subject = 'SEND REQUEST FOR LEAVE APPLICATION';
                        
                        // Set email format to HTML
                        $mail->isHTML(true);
                        
                        // Email body content
                        $mail->Body =  $this->load->view('dashboard/email_template',$data,true);

                        $mail->send();

                        // if(!$mail->send()){
                        //     echo 'Message could not be sent.';
                        //     echo 'Mailer Error: ' . $mail->ErrorInfo;
                        // }else{
                        //     echo 'Message has been sent';
                        // }


                   $receive_user_notify_form = $this->User_Model->select_user_notify_form($this->session->userdata['userlogin']['user_id']);
  
                  foreach ($receive_user_notify_form as $value) {
                                  $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Sent request of Leave',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                       }



                  echo json_encode(array("response" => "success", "message" => "Leave Form successfully submitted", "redirect" => base_url('account')));

                  
           }
    }



    //account add official business leave
    public function add_obl(){
       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       $config["upload_path"]   = FCPATH.'upload_forms/';
       $config["allowed_types"] = "gif|jpg|png|zip|xls|txt|xlsx|doc|docx|ppt|pptx|pdf|csv";
       $this->load->library('upload', $config);

       $this->form_validation->set_rules('position','Position','trim|required|xss_clean');  

       $this->form_validation->set_rules('inclusive-date','Inclusive date','trim|required|xss_clean');

       $this->form_validation->set_rules('typetravel','Type of Travel','trim|required|xss_clean'); 

       $this->form_validation->set_rules('departingcity','Departing City','trim|required|xss_clean');

       $this->form_validation->set_rules('arrivingcity','Arriving City','trim|required|xss_clean');

       $this->form_validation->set_rules('accompaniedby','Accompanied By','trim|required|xss_clean'); 

       $this->form_validation->set_rules('expenses','Estimated Expenses','trim|xss_clean|required');

       $this->form_validation->set_rules('remarks','Remarks','trim|xss_clean|required');

      if ($this->form_validation->run() == FALSE){
          echo json_encode(array("response" => "error", "message" => validation_errors()));
        }

        elseif (!$this->upload->do_upload("file")) {
            echo json_encode(array("response" => "error", "message" => 'Transportation Details is Required'));
            }

        elseif (!$this->upload->do_upload("purpose")) {
            echo json_encode(array("response" => "error", "message" => 'Purpose of Travel is Required'));
            }   
        

        else{

        $date = explode(" - ", $this->input->post('inclusive-date'));
        $from = $date[0];
        $to = $date[1];

        $obl = "OBL";
        $this->upload->do_upload("file");
        $transportation_detail = $this->upload->data();
        $this->upload->do_upload("purpose");
        $reason = $this->upload->data();
        $location = './upload_forms/'.$transportation_detail['file_name'];
        $location_reason = './upload_forms/'.$reason['file_name'];


        $data = array(

                       'user_id' => $this->input->post('userid'),
                       'employee_name' => $this->session->userdata['userlogin']['real_name'],

                       'position' => $this->input->post('position'),

                       'travel_type' => $this->input->post('typetravel'),

                       'departing_city' => $this->input->post('departingcity'),

                       'arriving_city' => $this->input->post('arrivingcity'),

                       'accompanied' => $this->input->post('accompaniedby'),

                       'estimated_expenses' => $this->input->post('expenses'),

                       'travel_remarks' =>$this->input->post('remarks'),

                       'inclusive_from' => $from,

                       'inclusive_to' => $to,

                       'form_type' => $obl,

                       'approval_status' => 'Pending',
                       'approval_status_manager' => 'Pending',
                       'notice_status_hr' => 'Pending',

                       'transportation_details' => $transportation_detail['file_name'],

                       'reason' => $this->input->post('remarks'),
                       'agent_signature' => $this->input->post('agent_signature'),
                       'agent_transaction_code' => $this->input->post('transaction_code'),
                    );



                  $this->Form_Model->insert($data);


                  $data['link'] = 'http://bba.com/crm/dashboard/view_forms?id='.$this->db->insert_id().'';

                   $mail = $this->phpmailer_lib->load();
                        
                        // SMTP configuration
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = "ssl";
                        $mail->Port = 465;

                        $mail->Username = 'admin@horizonsliterary.us'; // YOUR gmail email
                        $mail->Password = 'thankyouGodlovesUs143@'; // YOUR gmail password
                        
                        // Sender and recipient settings
                         $mail->SetFrom('admin@horizonsliterary.us', $this->session->userdata['userlogin']['real_name']);
                         $mail->AddReplyTo($this->session->userdata['userlogin']['emailaddress'], $this->session->userdata['userlogin']['real_name']);
                         $mail->addAddress('paul.anderson@betterboundhouse.com', 'Sandra Lauder');
                         $mail->addCC('admin@bbadvtg.com', 'Better Bound House');
                    
                    // // Add a recipient
                    // $mail->addAddress('john.doe@gmail.com');
                    
                    // // Add cc or bcc 
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                    
                    // Email subject
                        $mail->Subject = 'SEND REQUEST FOR OFFICIAL BUSINESS LEAVE';
                        $mail->addAttachment($location, $transportation_detail['file_name']); 
                        $mail->addAttachment($location_reason, $reason['file_name']); 

                        
                        // Set email format to HTML
                        $mail->isHTML(true);
                        
                        // Email body content
                        $mail->Body =  $this->load->view('dashboard/email_template',$data,true);
                        // $mail->Body = " <p>Hi Sir/Mam,</p></br></br>". $this->input->post('comment');

                        $mail->send();


                   $receive_user_notify_form = $this->User_Model->select_user_notify_form($this->session->userdata['userlogin']['user_id']);
  
                  foreach ($receive_user_notify_form as $value) {
                                  $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Sent request of Official Business Leave',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                       }


                  echo json_encode(array("response" => "success", "message" => "Official Business Leave Form successfully submitted", "redirect" => base_url('account')));

                  
           }
    }
    //account add undertime
    public function add_undertime(){

      /*echo $this->input->post('duration');
      exit();*/
       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       $this->form_validation->set_rules('position','Position','trim|required|xss_clean');  

       $this->form_validation->set_rules('inclusive-date','Inclusive date','trim|required|xss_clean');   

       $this->form_validation->set_rules('comment','Reasons for Undertime','trim|xss_clean|required');

       $this->form_validation->set_rules('duration','Duration for Undertime','trim|xss_clean|required');    

       if ($this->form_validation->run() == FALSE){
          echo json_encode(array("response" => "error", "message" => validation_errors()));
        } 
       else{

        $time = explode(" - ", $this->input->post('duration'));
        $from = strtotime($time[0]);
        $to = strtotime($time[1]);

        $timeDiff = $to - $from;

        $undertime = "Undertime Form";

        $data = array(

                       'user_id' => $this->input->post('userid'),
                       'employee_name' => $this->session->userdata['userlogin']['real_name'],

                       'position' => $this->input->post('position'),

                       'reason' => $this->input->post('comment'),

                       'inclusive_from' => $this->input->post('inclusive-date'),

                       'inclusive_to' => $this->input->post('inclusive-date'),

                       'duration' => $this->input->post('duration'),

                       'total_hours' => gmdate("H:i:s", $timeDiff),

                       'form_type' => $undertime,
                       'approval_status' => 'Pending',
                       'approval_status_manager' => 'Pending',
                       'notice_status_hr' => 'Pending',
                       'agent_signature' => $this->input->post('agent_signature'),
                       'agent_transaction_code' => $this->input->post('transaction_code')


                    );



                  $this->Form_Model->insert($data);

                 $data['link'] = 'http://143.44.162.253/bba_crm/crm/dashboard/view_forms?id='.$this->db->insert_id().'';

                   $mail = $this->phpmailer_lib->load();
                        
                        // SMTP configuration
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = "ssl";
                        $mail->Port = 465;

                        $mail->Username = 'admin@horizonsliterary.us'; // YOUR gmail email
                        $mail->Password = 'thankyouGodlovesUs143@'; // YOUR gmail password
                        
                        // Sender and recipient settings
                         $mail->SetFrom('admin@horizonsliterary.us', $this->session->userdata['userlogin']['real_name']);
                         $mail->AddReplyTo($this->session->userdata['userlogin']['emailaddress'], $this->session->userdata['userlogin']['real_name']);
                         $mail->addAddress('admin@bbadvtg.com', 'Better Bound House');
                         $mail->addCC('paul.anderson@betterboundhouse.com', 'Sandra Lauder');
                    
                    // // Add a recipient
                    // $mail->addAddress('john.doe@gmail.com');
                    
                    // // Add cc or bcc 
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                    
                    // Email subject
                        $mail->Subject = 'SEND REQUEST FOR UNDERTIME';
                        
                        // Set email format to HTML
                        $mail->isHTML(true);
                        
                        // Email body content
                        $mail->Body =  $this->load->view('dashboard/email_template',$data,true);
                        // $mail->Body = " <p>Hi Sir/Mam,</p></br></br>". $this->input->post('comment');

                        $mail->send();


                 $receive_user_notify_form = $this->User_Model->select_user_notify_form($this->session->userdata['userlogin']['user_id']);
  
                  foreach ($receive_user_notify_form as $value) {
                                  $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Sent request of Undertime',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                       }


                  echo json_encode(array("response" => "success", "message" => "Undertime Form successfully submitted", "redirect" => base_url('account')));

                  
           }
    }
    
   public function approve_form(){
  /*echo $this->input->post('leavepay');
  exit();*/
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $get_user = $this->Form_Model->view_form_user_id($this->input->post('form_id'));
       if ($this->session->userdata['userlogin']['usertype'] == "Manager"){
            $data = array(

                           'manager_name' => $this->session->userdata['userlogin']['real_name'],
                           'approval_status_manager' => 'Approved',
                           'manager_signature' => $this->input->post('manager_signature'),
                           'manager_transaction_code' => $this->input->post('manager_transaction_code'),
                           'travel_remarks' => $this->input->post('remarks'),
                           'requested_leave_type' => $this->input->post('leavetype'),
                           'requested_leave_pay' => $this->input->post('leavepay'),
                           'leave_type_others' => $this->input->post('others'),
                           'employee_name' => $get_user['real_name']

                        );
  

            }
        else{
              $data = array(

                           'hr_name' => $this->session->userdata['userlogin']['real_name'],
                           'notice_status_hr' => 'Approved',
                           'hr_signature' => $this->input->post('hr_signature'),
                           'hr_transaction_code' => $this->input->post('hr_transaction_code'),
                           'hr_remarks' => $this->input->post('hr_remarks'),
                           'requested_leave_type' => $this->input->post('leavetype'),
                           'requested_leave_pay' => $this->input->post('leavepay'),
                           'leave_type_others' => $this->input->post('others'),
                           'employee_name' => $get_user['real_name']

                        );

        }
                  $this->Form_Model->update_form($data, $this->input->post('form_id'));

                     $data['link'] = 'http://bba.com/crm/dashboard/view_forms?id='.$this->input->post('form_id').'';

                   $mail = $this->phpmailer_lib->load();
                        
                        // SMTP configuration
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = "ssl";
                        $mail->Port = 465;

                        $mail->Username = 'admin@horizonsliterary.us'; // YOUR gmail email
                        $mail->Password = 'thankyouGodlovesUs143@'; // YOUR gmail password
                        
                        // Sender and recipient settings
                         $mail->SetFrom('admin@horizonsliterary.us', $this->session->userdata['userlogin']['real_name']);
                         $mail->AddReplyTo($this->session->userdata['userlogin']['emailaddress'], $this->session->userdata['userlogin']['real_name']);
                         $mail->addAddress($get_user['emailaddress'], $get_user['real_name']);
                    
                    // // Add a recipient
                    // $mail->addAddress('john.doe@gmail.com');
                    
                    // // Add cc or bcc 
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                    
                    // Email subject
                        $mail->Subject = 'APPROVED YOUR APPLICATION LEAVE.';
                        
                        // Set email format to HTML
                        $mail->isHTML(true);
                        
                        // Email body content
                        $mail->Body =  $this->load->view('dashboard/email_template_manager',$data,true);

                        $mail->send();


                 $receive_user_notify_form = $this->User_Model->select_user_notify_form($this->session->userdata['userlogin']['user_id']);
                 $receive_user_notify_form_single = $this->Form_Model->view_form_id($this->input->post('form_id'));
  
                  // foreach ($receive_user_notify_form as $value) {
                  //                 $data_notification= array(
                  //                      'from_user' => $user_charge,
                  //                      'to_user' => 'All',
                  //                      'message' => 'Request has been approved',
                  //                      'unread' => 1,
                  //                      'date_notify' => date('Y-m-d H:i:s'),
                  //                      'link' =>  dirname(base_url(uri_string())),
                  //                      'to_user_id' => $value['user_id'],
                  //                      'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                  //                    );
                  //          $this->Notification_Model->insert($data_notification);
                  //      }

                  //   $receive_user_notify_form_single= array(
                  //                    'from_user' => $user_charge,
                  //                    'to_user' => 'All',
                  //                      'message' => 'Request has been approved',
                  //                    'unread' => 1,
                  //                    'date_notify' => date('Y-m-d H:i:s'),
                  //                    'link' =>  dirname(base_url(uri_string())),
                  //                    'to_user_id' => $receive_user_notify_form_single['user_id'],
                  //                    'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
                  //       );
                  //    $this->Notification_Model->insert($agent_notification);  



                  echo json_encode(array("response" => "success", "message" => "Successfully Approved Form", "redirect" => base_url('account')));
    }


       public function decline_form(){
         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
         $get_user = $this->Form_Model->view_form_user_id($this->input->post('form_id'));

       if ($this->session->userdata['userlogin']['usertype'] == "Manager"){
            $data = array(
                           'manager_name' => $this->session->userdata['userlogin']['real_name'],
                           'approval_status_manager' => 'Declined',
                           'travel_remarks' => $this->input->post('remarks'),
                           'employee_name' => $get_user['real_name']

                        );

            }
        else{
              $data = array(
                           'manager_name' => $this->session->userdata['userlogin']['real_name'],
                           'notice_status_hr' => 'Declined',
                           'hr_remarks' => $this->input->post('hr_remarks'),
                           'employee_name' => $get_user['real_name']
                        );

        }
                  $this->Form_Model->update_form($data, $this->input->post('form_id'));
                    $data['link'] = 'http://bba.com/crm/dashboard/view_forms?id='.$this->input->post('form_id').'';

                        $mail = $this->phpmailer_lib->load();
                        
                        // SMTP configuration
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = "ssl";
                        $mail->Port = 465;

                        $mail->Username = 'admin@horizonsliterary.us'; // YOUR gmail email
                        $mail->Password = 'thankyouGodlovesUs143@'; // YOUR gmail password
                        
                        // Sender and recipient settings
                         $mail->SetFrom('admin@horizonsliterary.us', $this->session->userdata['userlogin']['real_name']);
                         $mail->AddReplyTo($this->session->userdata['userlogin']['emailaddress'], $this->session->userdata['userlogin']['real_name']);
                         $mail->addAddress($get_user['emailaddress'], $get_user['real_name']);
                    
                    // // Add a recipient
                    // $mail->addAddress('john.doe@gmail.com');
                    
                    // // Add cc or bcc 
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                    
                    // Email subject
                        $mail->Subject = 'DECLINED OF YOUR REQUEST APPLICATION LEAVE.';
                        
                        // Set email format to HTML
                        $mail->isHTML(true);
                        
                        // Email body content
                        $mail->Body =  $this->load->view('dashboard/email_template_manager',$data,true);

                        $mail->send();

        


                 $receive_user_notify_form = $this->User_Model->select_user_notify_form($this->session->userdata['userlogin']['user_id']);
                 $receive_user_notify_form_single = $this->Form_Model->view_form_id($this->input->post('form_id'));
  
                  foreach ($receive_user_notify_form as $value) {
                                  $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Request has been declined',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                       }

                    $receive_user_notify_form_single= array(
                                     'from_user' => $user_charge,
                                     'to_user' => 'All',
                                       'message' => 'Request has been declined',
                                     'unread' => 1,
                                     'date_notify' => date('Y-m-d H:i:s'),
                                     'link' =>  dirname(base_url(uri_string())),
                                     'to_user_id' => $receive_user_notify_form_single['user_id'],
                                     'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
                        );
                  echo json_encode(array("response" => "success", "message" => "Successfully Declined Form", "redirect" => base_url('account')));
    }
     public function login_code(){

           $this->form_validation->set_rules('idle_code','Code','trim|required|xss_clean');  

           if ($this->form_validation->run() == FALSE){
              echo json_encode(array("response" => "error", "message" => validation_errors()));
            } 
           else{
                 $check_user = $this->User_Model->select_code_user($this->session->userdata['userlogin']['user_id'], $this->input->post('idle_code'));
                  if($check_user == true){
                       echo json_encode(array("response" => "success", "message" => "You have successfully logged in!", 'userlogin' => $this->session->userdata['userlogin']['usertype'], "redirect" => base_url("dashboard")));
                       $this->User_Model->update_profile(array("attempt_idle" => 0), $this->session->userdata['userlogin']['user_id']);

                 }
                 else{
                       echo json_encode(array("response" => "error", "message" => "Your Code is invalid"));  

                 }     
               }
          }

    public function update_user_auto_assign(){
         date_default_timezone_set('Asia/Manila');


               $this->form_validation->set_rules('user_id[]','Employee Name','trim|required|xss_clean'); 


               $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : array();
               $remark = $this->input->post('remark')? $this->input->post('remark') : null;

               if ($this->form_validation->run() == FALSE){
                    echo json_encode(array("response" => "error", "message" => $user_id));
               } 

               else{

                      for ($i=0; $i <= $this->input->post('quantity') ; $i++) { 
                            // code...
                      }

                     // foreach ($user_id as $index => $value) {
                     //        $this->User_Model->update_profile(array("user_assign" =>  $this->input->post('description')[$index]), $value);
                     // }  

                             //  foreach ($project_id as $value) {

                             //      $this->Lead_Model->update_lead_agent(array('user_id' => $this->input->post('agent'), 'lead_assign' => 1, 'status' => 'Assigned Low', 'check_lead' => 1, 'lead_date_agent_assign' => $date_assign), $value);

                             //  }



                             // $data = array(
                             //               'user_id_assign' => $this->session->userdata['userlogin']['user_id'],

                             //               'user_id' => $this->input->post('agent'),

                             //               'date_assign' => date('Y-m-d H:i:s'),
                             //             );
                             //   $data_notification= array(

                             //                           'from_user' => $user_charge,
                             //                           'to_user' => 'Agent',
                             //                           'message' => $user_charge." assigned you a new lead/s",
                             //                           'unread' => 1,
                             //                           'date_notify' => date('Y-m-d H:i:s'),
                             //                           'link' =>  dirname(base_url(uri_string())),
                             //                           'to_user_id' => $this->input->post('agent'),
                             //                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],
                             //                         );
                             //   $this->Notification_Model->insert($data_notification);

                             //   $this->User_Model->insert_assign_user($data);



                     echo json_encode(array("response" =>   "success", "message" => $this->input->post('on_off'), "redirect" => base_url('dashboard')));
    
            }
       }



}
