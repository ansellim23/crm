<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coaching extends MY_Controller {



  function __construct() {

         parent::__construct();

         date_default_timezone_set('Asia/Manila');

         modules::run("account/is_logged_in");

  }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		  // $records['fullname'] = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
    //       $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
    //       $records['position'] = $this->session->userdata['userlogin']['usertype'];

  	  // $user_charge = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
     //  $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
     //  $records['count_notificatiovns']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
     //  $records['coaching_user'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
     //  $records['transaction_code'] = $this->generateRandomString();
      $user_charge = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
      $coaching_user = $this->session->userdata['userlogin']['real_name'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['coaching_users'] =$this->Coaching_Model->select_coaching_list($coaching_user);


       if ($this->session->userdata['userlogin']['usertype'] == "Agent"){


          $records['coaching_users'] =$this->Coaching_Model->select_coaching_list($coaching_user);
          $this->load->view('template/coaching_header', $records);
          $this->load->view('template/coaching_sidebar', $records);
          $this->load->view('coaching_list', $records);
          $this->load->view('template/coaching_footer', $records);

        }
       else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['coaching_users'] =$this->Coaching_Model->view_forms_coaching();
          $this->load->view('template/header_manager', $records);
          $this->load->view('template/sidebar_manager', $records);
          $this->load->view('coaching_list_manager', $records);
          $this->load->view('template/footer_manager', $records);


        }
	}

    public function coaching_form($id='')
  {

    if($this->session->userdata['userlogin']['usertype'] == "Agent"){

      $user_charge = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notificatiovns']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['coaching_user'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
      $records['transaction_code'] = $this->generateRandomString();

          $this->load->view('template/coaching_header', $records);
          $this->load->view('template/coaching_sidebar', $records);
          $this->load->view('coaching_form', $records);
          $this->load->view('template/coaching_footer', $records);
      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){
          $evaluation_id =  $this->uri->segment(3);
          // echo $evaluation_id;
          // exit();
          $records['evaluations']= $this->Evaluation_Model->view_evaluation_coaching($evaluation_id);
          $user_charge = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
          $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
          $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
          $records['coaching_user'] =$this->Coaching_Model->select_coaching_id($this->uri->segment(3));
          $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
          $records['transaction_code'] = $this->generateRandomString();
          $records['coaching_users'] =$this->Coaching_Model->view_forms_coaching();

          $this->load->view('template/header_manager', $records);
          $this->load->view('template/sidebar_manager', $records);
          $this->load->view('coaching_form_manager', $records);
          $this->load->view('template/coaching_footer', $records);


        }
  }


    function generateRandomString($length = 20) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
   }



    public function coaching_detail()
  {
      // $records['fullname'] = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
    //       $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
    //       $records['position'] = $this->session->userdata['userlogin']['usertype'];

      $user_charge = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['coaching_user'] =$this->Coaching_Model->select_coaching_id($this->uri->segment(3));
      $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
      $records['transaction_code'] = $this->generateRandomString();



       if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
      
          $this->load->view('template/coaching_header', $records);
          $this->load->view('template/coaching_sidebar', $records);
          $this->load->view('coaching_detail', $records);
          $this->load->view('template/coaching_footer', $records);


        }
       else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['coaching_users'] =$this->Coaching_Model->view_forms_coaching();

          $this->load->view('template/header_manager', $records);
          $this->load->view('template/sidebar_manager', $records);
          $this->load->view('coaching_detail_manager', $records);
          $this->load->view('template/coaching_footer', $records);


        }
  }


    public function coaching_list()
  {
      // $records['fullname'] = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
    //       $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
    //       $records['position'] = $this->session->userdata['userlogin']['usertype'];
      $user_charge = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
      $coaching_user = $this->session->userdata['userlogin']['real_name'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){


          $records['coaching_users'] =$this->Coaching_Model->select_coaching_list($coaching_user);
          $this->load->view('template/coaching_header', $records);
          $this->load->view('template/coaching_sidebar', $records);
          $this->load->view('coaching_list', $records);
          $this->load->view('template/coaching_footer', $records);

        }
       else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['coaching_users'] =$this->Coaching_Model->view_forms_coaching();
          $this->load->view('template/header_manager', $records);
          $this->load->view('template/sidebar_manager', $records);
          $this->load->view('coaching_list_manager', $records);
          $this->load->view('template/footer_manager', $records);


        }
  }


	  public function add_coaching(){



       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       $this->form_validation->set_rules('line_item','Line Item','trim|required|xss_clean'); 
       $this->form_validation->set_rules('line_item_review','Line Item Review','trim|required|xss_clean'); 
       $this->form_validation->set_rules('experience','Experience/review/reflect','trim|required|xss_clean'); 
       $this->form_validation->set_rules('interpretation','Interpretation','trim|required|xss_clean'); 
       $this->form_validation->set_rules('look_forward','Look Forward','trim|required|xss_clean'); 
       $this->form_validation->set_rules('plan_ahead','Plan Ahead','trim|required|xss_clean'); 
       $this->form_validation->set_rules('action_plan','Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('how_action_plan','How Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('when_action_plan','When Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('anything_action_plan','Anything Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('agent_signature','Signature','trim|required|xss_clean'); 


       $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : array();
       // $remark = $this->input->post('remark')? $this->input->post('remark') : null;

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

             $data= array(
                 'user_id' => $this->session->userdata['userlogin']['user_id'],
                 'agent_name' => $this->session->userdata['userlogin']['real_name'],
                 'line_item' => $this->input->post('line_item'),
                 'line_item_review' => $this->input->post('line_item_review'),
                 'experience' => $this->input->post('experience'),
                 'interpretation' => $this->input->post('interpretation'),
                 'look_forward'  =>  $this->input->post('look_forward'),   
                 'plan_ahead'  =>  $this->input->post('plan_ahead'),   
                 'action_plan'  =>  $this->input->post('action_plan'),   
                 'how_action_plan'  =>  $this->input->post('how_action_plan'),   
                 'when_action_plan'  =>  $this->input->post('when_action_plan'),   
                 'anything_action_plan'  => $this->input->post('anything_action_plan'),   
                 'transaction_code'  => $this->input->post('transaction_code'),   
                 'agent_signature'  => $this->input->post('agent_signature'),   
                 'sign_status' => "Signed",
                 'sign_status_manager' => "Pending",
                 'date_session' => date('Y-m-d H:i:s', strtotime($this->input->post('session_date')))

               );


              $this->Coaching_Model->insert($data);
                  $receive_user_notify_form = $this->User_Model->select_user_notify_coaching_form($this->session->userdata['userlogin']['user_id']);
  
                  foreach ($receive_user_notify_form as $value) {
                                  $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Added Coaching Form',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                       }

 

             echo json_encode(array("response" =>   "success", "message" => "Successfully Fill up Coaching Form"));

           }


        
      }



    public function add_coaching_manager(){

       $user_charge = $this->input->post('full_name');

       $this->form_validation->set_rules('line_item','Line Item','trim|required|xss_clean'); 
       $this->form_validation->set_rules('line_item_review','Line Item Review','trim|required|xss_clean'); 
       $this->form_validation->set_rules('experience','Experience/review/reflect','trim|required|xss_clean'); 
       $this->form_validation->set_rules('interpretation','Interpretation','trim|required|xss_clean'); 
       $this->form_validation->set_rules('look_forward','Look Forward','trim|required|xss_clean'); 
       $this->form_validation->set_rules('plan_ahead','Plan Ahead','trim|required|xss_clean'); 
       $this->form_validation->set_rules('action_plan','Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('how_action_plan','How Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('when_action_plan','When Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('anything_action_plan','Anything Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('manager_signature','Signature','trim|required|xss_clean'); 


       $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : array();
       // $remark = $this->input->post('remark')? $this->input->post('remark') : null;

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

             $data= array(
                 'user_id' => $this->input->post('user_id'),
                 'agent_name' => $this->input->post('full_name'),
                 'line_item' => $this->input->post('line_item'),
                 'line_item_review' => $this->input->post('line_item_review'),
                 'experience' => $this->input->post('experience'),
                 'interpretation' => $this->input->post('interpretation'),
                 'look_forward'  =>  $this->input->post('look_forward'),   
                 'plan_ahead'  =>  $this->input->post('plan_ahead'),   
                 'action_plan'  =>  $this->input->post('action_plan'),   
                 'how_action_plan'  =>  $this->input->post('how_action_plan'),   
                 'when_action_plan'  =>  $this->input->post('when_action_plan'),   
                 'anything_action_plan'  => $this->input->post('anything_action_plan'),   
                 'sign_status' => "Pending",
                 'sign_status_manager' => "Signed",
                 'manager_name' => $this->input->post('manager_name'),
                 'manager_signature' => $this->input->post('manager_signature'),
                 'manager_transaction_code' => $this->input->post('manager_transaction_code'),
                 'date_session' => date('Y-m-d H:i:s', strtotime($this->input->post('session_date')))

               );


              $this->Coaching_Model->insert($data);
                  $receive_user_notify_form = $this->User_Model->select_user_notify_coaching_form($this->input->post('user_id'));
  
                  foreach ($receive_user_notify_form as $value) {
                                  $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Added Coaching form_validation',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                       }

 

             echo json_encode(array("response" =>   "success", "message" => "Successfully Fill up Coaching Form"));

           }


        
      }

    public function update_coaching(){
       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       $this->form_validation->set_rules('line_item','Line Item','trim|required|xss_clean'); 
       $this->form_validation->set_rules('line_item_review','Line Item Review','trim|required|xss_clean'); 
       $this->form_validation->set_rules('experience','Experience/review/reflect','trim|required|xss_clean'); 
       $this->form_validation->set_rules('interpretation','Interpretation','trim|required|xss_clean'); 
       $this->form_validation->set_rules('look_forward','Look Forward','trim|required|xss_clean'); 
       $this->form_validation->set_rules('plan_ahead','Plan Ahead','trim|required|xss_clean'); 
       $this->form_validation->set_rules('action_plan','Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('how_action_plan','How Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('when_action_plan','When Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('anything_action_plan','Anything Action Plan','trim|required|xss_clean'); 


       $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : array();
       // $remark = $this->input->post('remark')? $this->input->post('remark') : null;

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

             $data= array(
                 'line_item' => $this->input->post('line_item'),
                 'line_item_review' => $this->input->post('line_item_review'),
                 'experience' => $this->input->post('experience'),
                 'interpretation' => $this->input->post('interpretation'),
                 'look_forward'  =>  $this->input->post('look_forward'),   
                 'plan_ahead'  =>  $this->input->post('plan_ahead'),   
                 'action_plan'  =>  $this->input->post('action_plan'),   
                 'how_action_plan'  =>  $this->input->post('how_action_plan'),   
                 'when_action_plan'  =>  $this->input->post('when_action_plan'),   
                 'anything_action_plan'  => $this->input->post('anything_action_plan'),
                 'transaction_code'  => $this->input->post('transaction_code'),   
                 'agent_signature'  => $this->input->post('agent_signature'),   
                 'sign_status' => "Signed",
                 'date_session' => date('Y-m-d H:i:s', strtotime($this->input->post('session_date')))

               );


              $this->Coaching_Model->update_coaching($data,$this->input->post('coaching_id'));

                $receive_user_notify_form = $this->User_Model->select_user_notify_coaching_form($this->session->userdata['userlogin']['user_id']);
  
                  foreach ($receive_user_notify_form as $value) {
                                  $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Updated Coaching Form',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                       }

 
 

             echo json_encode(array("response" =>   "success", "message" => "Successfully Updated Coaching Form"));

           }


        
      }

   public function sign_coaching(){

       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
       $this->form_validation->set_rules('line_item','Line Item','trim|required|xss_clean'); 
       $this->form_validation->set_rules('line_item_review','Line Item Review','trim|required|xss_clean'); 
       $this->form_validation->set_rules('experience','Experience/review/reflect','trim|required|xss_clean'); 
       $this->form_validation->set_rules('interpretation','Interpretation','trim|required|xss_clean'); 
       $this->form_validation->set_rules('look_forward','Look Forward','trim|required|xss_clean'); 
       $this->form_validation->set_rules('plan_ahead','Plan Ahead','trim|required|xss_clean'); 
       $this->form_validation->set_rules('action_plan','Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('how_action_plan','How Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('when_action_plan','When Action Plan','trim|required|xss_clean'); 
       $this->form_validation->set_rules('anything_action_plan','Anything Action Plan','trim|required|xss_clean'); 


       $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : array();
       // $remark = $this->input->post('remark')? $this->input->post('remark') : null;

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

           $data= array(
                           'line_item' => $this->input->post('line_item'),
                           'line_item_review' => $this->input->post('line_item_review'),
                           'experience' => $this->input->post('experience'),
                           'interpretation' => $this->input->post('interpretation'),
                           'look_forward'  =>  $this->input->post('look_forward'),   
                           'plan_ahead'  =>  $this->input->post('plan_ahead'),   
                           'action_plan'  =>  $this->input->post('action_plan'),   
                           'how_action_plan'  =>  $this->input->post('how_action_plan'),   
                           'when_action_plan'  =>  $this->input->post('when_action_plan'),   
                           'anything_action_plan'  => $this->input->post('anything_action_plan'),   
                           'sign_status' => "Signed",
                           'manager_name' => $this->input->post('manager_name'),
                           'manager_signature' => $this->input->post('manager_signature'),
                           'manager_transaction_code' => $this->input->post('manager_transaction_code'),

                         );

          $this->Coaching_Model->update_coaching($data,$this->input->post('coaching_id'));

          $receive_user_notify_form = $this->Coaching_Model->select_coaching_id($this->input->post('coaching_id'));
  
                      $data_notification= array(
                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => 'Signed Coaching Form',
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'to_user_id' => $receive_user_notify_form['user_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],
    
                               );
                     $this->Notification_Model->insert($data_notification);
                


         echo json_encode(array("response" =>   "success", "message" => "Successfully Signed Coaching Form"));
       }



        
      }

      public function SubmittedCoachingForms(){

        /*$records['fullname'] = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
        $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
        $records['position'] = $this->session->userdata['userlogin']['usertype'];*/

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

        modules::run("account/is_logged_in");

        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['users'] = $this->User_Model->select_user_all();

        $records['coaching_users'] = $this->Coaching_Model->view_forms_coaching($user_charge);

        $this->load->view('submitted_coaching_manager', $records); 
  
      }

      public function coaching_detail_manager()
  {
      // $records['fullname'] = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
    //       $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
    //       $records['position'] = $this->session->userdata['userlogin']['usertype'];

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notificatiovns']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['coaching_user'] =$this->Coaching_Model->select_coaching_id($this->uri->segment(3));

      $this->load->view('coaching_manager_detail', $records); 
  }

}
