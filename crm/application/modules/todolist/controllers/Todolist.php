<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Todolist extends MY_Controller {

//Todolist index
	public function index(){
    date_default_timezone_set('Asia/Manila');
    $this_week_start = date("Y-m-d H:i:s", strtotime('monday this week'));
    $this_week_end = date("Y-m-d H:i:s", strtotime('sunday this week'));
    $next_week_start = date("Y-m-d H:i:s", strtotime('monday next week'));
    $next_week_end = date("Y-m-d H:i:s", strtotime('sunday next week'));
    $last_week_start = date("Y-m-d H:i:s", strtotime('monday last week'));
    $last_week_end = date("Y-m-d H:i:s", strtotime('sunday last week'));
    $now = date('Y-m-d H:i:s');
    $start = date('Y-m-d 00:00:01');
    $end = date('Y-m-d 23:59:59');
    $start_date = date('2000-01-01 00:00:01'); //oldest date for comparison
    $future_date = date('2100-12-12 11:59:59'); //future date for comparison


    $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
    $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
    $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

//Assigned events
    $records['this_week_events'] = $this->Fullcalendar_Model->select_user_events($this->session->userdata['userlogin']['user_id'],$now,$this_week_end,'Assigned');
    $records['next_week_events'] = $this->Fullcalendar_Model->select_user_events($this->session->userdata['userlogin']['user_id'],$next_week_start,$next_week_end,'Assigned');
    $records['later_events'] = $this->Fullcalendar_Model->select_user_events($this->session->userdata['userlogin']['user_id'],$now,$end,'Assigned');


//Done events
    $records['this_week_events1'] = $this->Fullcalendar_Model->select_user_events($this->session->userdata['userlogin']['user_id'],$this_week_start,$this_week_end,'Done');
    $records['last_week_events1'] = $this->Fullcalendar_Model->select_user_events($this->session->userdata['userlogin']['user_id'],$next_week_start,$next_week_end,'Done');
    $records['earlier_events'] = $this->Fullcalendar_Model->select_user_events($this->session->userdata['userlogin']['user_id'],$start,$now,'Done');
    $records['done_early_events'] = $this->Fullcalendar_Model->select_user_events($this->session->userdata['userlogin']['user_id'],$now,$future_date,'Done');

//Missing events
    $records['missing_events'] = $this->Fullcalendar_Model->select_user_events($this->session->userdata['userlogin']['user_id'],$start_date,$now,'Assigned');

    $records['all_agents']= $this->User_Model->select_user_agent();
    $records['user_id']= $this->session->userdata['userlogin']['user_id'];



    if($this->session->userdata['userlogin']['usertype'] == 'Agent'){
    
        $this->load->view('todo_list_agent', $records);
    
    }

    
    elseif ($this->session->userdata['userlogin']['usertype'] == 'Manager') {
    
           $this->load->view('todo_list_manager', $records);
    
    }	
    

  }



//Add todo
  public function add_todo(){

       $this->form_validation->set_rules('reason','Reason','trim|required|xss_clean');

       $this->form_validation->set_rules('status_event','Type','trim|required|xss_clean'); 

       $this->form_validation->set_rules('start','Start date and time','trim|required|xss_clean'); 

       $this->form_validation->set_rules('end','End date and time','trim|required|xss_clean');  


       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

      
                      $data= array(
                           'user_id' => $this->session->userdata['userlogin']['user_id'],
                           'to_user' => $this->input->post('user_id'),
                           'usercharge' => $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'],
                           'event_title' => $this->input->post('reason'),
                           'description' => $this->input->post('description'),
                           'status_event'  =>  $this->input->post('status_event'),   
                           'event_start'  =>  $this->input->post('start'),
                           'event_level'  =>  'Assigned',
                           'event_end'  =>  $this->input->post('end'),
                           'type'  =>  'Personal',        

                         );

                        
                $this->Fullcalendar_Model->insert_event($data);
       

             echo json_encode(array("response" =>   "success", "message" => "Successfully Added todo", "redirect" => base_url('dashboard')));


          }
      }



//Update todo status to done
      public function update_todo_status($event_id){

              $event_id = $this->input->get('event_id');
    

              $data = array(

                     'event_level' => 'Done',

               );


              $this->Fullcalendar_Model->update_event($data, $event_id);


             echo json_encode(array("data" => $event_id, "response" => "success", "message" => "Successfully updated event", "redirect" => base_url('account')));


    }




//Update todo status to assigned
      public function update_todo_status1($event_id){

              $event_id = $this->input->get('event_id');
    

              $data = array(

                     'event_level' => 'Assigned',

               );


              $this->Fullcalendar_Model->update_event($data, $event_id);


             echo json_encode(array("data" => $event_id, "response" => "success", "message" => "Successfully updated event", "redirect" => base_url('account')));


    }




//View todo details
      public function view_todo_details($event_id){

       $data=array();

       $event_id = $this->Fullcalendar_Model->select_event_id($this->input->get('event_id')); 

       $data = $event_id;

       echo json_encode($data);   


    }

 

 }

?>