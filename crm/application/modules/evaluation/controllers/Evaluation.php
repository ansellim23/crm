<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Evaluation extends MY_Controller {


  function __construct() {

         parent::__construct();

         date_default_timezone_set('Asia/Manila');

         modules::run("account/is_logged_in");

  }
      public function index(){

      modules::run("account/is_logged_in");
      
     if($this->session->userdata['userlogin']['usertype'] == "Admin"){

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['team_evaluations']= $this->Evaluation_Model->view_teamevaluation_admin();

      $this->load->view('template/evaluation_header', $records);
      $this->load->view('template/evaluation_sidebar', $records);
      $this->load->view('evaluation_list_admin', $records);
      $this->load->view('template/evaluation_footer', $records);
     
     }


     else if($this->session->userdata['userlogin']['usertype'] == "Manager"){

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['team_evaluations']= $this->Evaluation_Model->view_teamevaluation_manager($this->session->userdata['userlogin']['user_id']);

      $this->load->view('template/evaluation_header', $records);
      $this->load->view('template/evaluation_sidebar', $records);
      $this->load->view('team_evaluation_list_manager', $records);
      $this->load->view('template/evaluation_footer', $records);
     
     }

     else if($this->session->userdata['userlogin']['usertype'] == "Agent"){

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['team_evaluations']= $this->Evaluation_Model->view_teamevaluation_agent($this->session->userdata['userlogin']['user_id']);

      $this->load->view('team_evaluation_list_agent', $records);

     
     }



    }

  public function createEvaluation(){


    /*$records['fullname'] = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
    $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
    $records['position'] = $this->session->userdata['userlogin']['usertype'];*/

    $records['all_users']= $this->User_Model->select_user_all_active();

    $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
    $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
    $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);


    $this->load->view('template/evaluation_header', $records);
    $this->load->view('template/evaluation_sidebar', $records);
    $this->load->view('create_evaluation', $records);
    $this->load->view('template/evaluation_footer', $records);
  }
  //add create evaluation
  public function add_create_evaluation(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

        $criteria  = $this->input->post('criteria-title') ? $this->input->post('criteria-title') : array();
        $total_points = 0;


        for($x = 0; $x <= count($criteria)-1; $x++) {
        $total_points  = $total_points  + max($this->input->post('criteria-points'.$x));    
        }

        $to_users = $this->input->post('to_user');
        $from_users = $this->input->post('from_user');
            

        $len = $this->input->post('myid');
        
        for ($x = 0; $x < $len; $x++) {
          $this->form_validation->set_rules('level-title'.$x.'[]','Level Title'.($x+1),'trim|required|xss_clean');

          $this->form_validation->set_rules('level-description'.$x.'[]','Level Title'.($x+1),'trim|required|xss_clean');
        }

       //$criteria_title = $this->input->post('criteria-title') ? $this->input->post('criteria-title') : array();

       //$points = $this->input->post('criteria-points') ? $this->input->post('criteria-points') : array();

       //$this->form_validation->set_rules('userid[]','For:','trim|required|xss_clean');

       //$this->form_validation->set_rules('points','Points','trim|required|xss_clean');  

       $this->form_validation->set_rules('title','Title','trim|required|xss_clean');          

       $this->form_validation->set_rules('description','Description','trim|xss_clean|required');  


       $this->form_validation->set_rules('due-date','Due date','trim|required|xss_clean');   

       $this->form_validation->set_rules('form-type','Form type','trim|xss_clean|required');  

       $this->form_validation->set_rules('criteria-title[]','Criterion title','trim|xss_clean|required'); 

       $this->form_validation->set_rules('criteria-description[]','Criterion description','trim|xss_clean|required');   
      
       $get_last_id_criteria = array();
      
      if ($this->form_validation->run() == FALSE){
          echo json_encode(array("response" => "error", "message" => validation_errors()));
        }

       else{

//for class id creation      
        $max_id = $this->Evaluation_Model->select_max_evaluation_id();       
        $class_id = $max_id + 1;

//insert data to tblevaluation
    $values = array();
    
    if($this->input->post('form-type') == 'Employee Evaluation'){
        $values = $to_users;
    }
    else if($this->input->post('form-type') == 'Company Evaluation'){
        $values = $from_users;
    }


       foreach ($values as $a){
        if($this->input->post('form-type') == 'Employee Evaluation'){
        $data = array(

                       'to_user_id' => $a,

                       'from_user_id' => $this->input->post('from_user')[0],

                       'class_id' => $class_id,

                       'form_type' => $this->input->post('form-type'),

                       'title' => $this->input->post('title'),
 
                       'description' => $this->input->post('description'),

                       'points' => $total_points,

                       'due_date' => $this->input->post('due-date'),
                          
                  );

   
    
            }

        else if($this->input->post('form-type') == 'Company Evaluation'){
           $data = array(

                       'to_user_id' => $this->input->post('to_user')[0],

                       'from_user_id' => $a,

                       'class_id' => $class_id,

                       'form_type' => $this->input->post('form-type'),

                       'title' => $this->input->post('title'),
 
                       'description' => $this->input->post('description'),

                       'points' => $total_points,

                       'due_date' => $this->input->post('due-date'),
                       
                  );
            }
                  $this->Evaluation_Model->insert($data);







//insert data to tblcriteria
        $criteria_title = $this->input->post('criteria-title') ? $this->input->post('criteria-title') : array();

        $get_last_id_evaluation = $this->db->insert_id();

        for($x = 0; $x <= count($criteria_title)-1; $x++) {

            $data = array(

                'evaluation_id' => $get_last_id_evaluation,

                'criteria_title' => $this->input->post('criteria-title')[$x],

                'criteria_description' => $this->input->post('criteria-description')[$x],

                'criteria_points' => max($this->input->post('criteria-points'.$x)),
            );

             $this->Evaluation_Model->insert_criteria($data);

            //echo $this->input->post('criteria-title')[$x];

            $get_last_id_criteria = $this->db->insert_id();

            $criteria_points = $this->input->post('criteria-points'.$x) ? $this->input->post('criteria-points'.$x) : array();

//insert data to tblpoints
            for($i = 0; $i <= count($criteria_points)-1; $i++ ){
            
                $data1 = array(

                        'evaluation_id' => $get_last_id_evaluation,

                        'criteria_id' => $get_last_id_criteria,

                        'points' => $this->input->post('criteria-points'.$x)[$i],

                        'title' => $this->input->post('level-title'.$x)[$i],

                        'description' => $this->input->post('level-description'.$x)[$i],
                );

                $this->Evaluation_Model->insert_points($data1);
                  
            }

    }       
                $event_data = array(

                'user_id' => $a,

                'usercharge' => $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'],

                'event_title' => $this->input->post('title'),

                'description' => $this->input->post('description'),

                'event_start' => $this->input->post('due-date'),

                'event_end' => $this->input->post('due-date'),

                'status_event' => 'Task',

                'event_level' => 'Assigned',

                'to_user' => $a,

                'type' => 'Personal',

                );
                
                $this->Fullcalendar_Model->insert_event($event_data);
                   $data_notification = array(

                     'from_user' => $user_charge,
                     'to_user' => 'All',
                     'message' => "Added ".$this->input->post('form-type')."",
                     'unread' => 1,
                     'date_notify' => date('Y-m-d H:i:s'),
                     'link' =>  dirname(base_url(uri_string())),
                     'to_user_id' => $this->input->post('from_user')[0],
                     'from_usertype' => $this->session->userdata['userlogin']['usertype']
                   );
                  $this->Notification_Model->insert($data_notification);
               
         
    }

                 echo json_encode(array("response" => "success", "message" => "Create evaluation successfully submitted", "redirect" => base_url('account')));

          }
    }

  public function view_teamEvaluation(){

    $evaluation_id = $_GET['id'];
    $class_id = $_GET['classid'];

     if($this->session->userdata['userlogin']['usertype'] == "Admin"){
  
         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
         $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         //$records['all_agents']= $this->User_Model->select_user_agent();

          $records['evaluations']= $this->Evaluation_Model->view_evaluation($evaluation_id);
          $records['criterias']= $this->Evaluation_Model->view_criteria($evaluation_id);
          $records['points']= $this->Evaluation_Model->view_points($evaluation_id);

          $records['class_comments']= $this->Evaluation_Model->view_evaluation_class_comments($class_id, 'Class Comment');
          $records['manager_comments']= $this->Evaluation_Model->view_evaluation_comments($evaluation_id, 'Manager Comment');

         $this->load->view('team_evaluation_manager', $records);

     }    
 
     else if($this->session->userdata['userlogin']['usertype'] == "Manager"){
  
         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
         $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         //$records['all_agents']= $this->User_Model->select_user_agent();

          $records['evaluations']= $this->Evaluation_Model->view_evaluation($evaluation_id);
          $records['criterias']= $this->Evaluation_Model->view_criteria($evaluation_id);
          $records['points']= $this->Evaluation_Model->view_points($evaluation_id);

          $records['class_comments']= $this->Evaluation_Model->view_evaluation_class_comments($class_id, 'Class Comment');
          $records['manager_comments']= $this->Evaluation_Model->view_evaluation_comments($evaluation_id, 'Manager Comment');

         $this->load->view('team_evaluation_manager', $records);  

     }

     else if($this->session->userdata['userlogin']['usertype'] == "Agent"){
  
         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
         $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         //$records['all_agents']= $this->User_Model->select_user_agent();

          $records['evaluations']= $this->Evaluation_Model->view_evaluation_agent($evaluation_id);
          $records['criterias']= $this->Evaluation_Model->view_criteria($evaluation_id);
          $records['points']= $this->Evaluation_Model->view_points($evaluation_id);

          $records['class_comments']= $this->Evaluation_Model->view_evaluation_class_comments($class_id, 'Class Comment');
          $records['manager_comments']= $this->Evaluation_Model->view_evaluation_comments($evaluation_id, 'Manager Comment');

         $this->load->view('team_evaluation_agent', $records);

     }


  }


  public function view_companyEvaluation(){

    $evaluation_id = $_GET['id'];

     if($this->session->userdata['userlogin']['usertype'] == "Admin"){
  
         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
         $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         //$records['all_agents']= $this->User_Model->select_user_agent();

          $records['evaluations']= $this->Evaluation_Model->view_evaluation($evaluation_id);
          $records['criterias']= $this->Evaluation_Model->view_criteria($evaluation_id);
          $records['points']= $this->Evaluation_Model->view_points($evaluation_id);

          $records['class_comments']= $this->Evaluation_Model->view_evaluation_comments($evaluation_id, 'Class Comment');
          $records['manager_comments']= $this->Evaluation_Model->view_evaluation_comments($evaluation_id, 'Manager Comment');

         $this->load->view('company_evaluation_agent', $records);

     } 

    else if($this->session->userdata['userlogin']['usertype'] == "Agent"){
  
         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
         $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         //$records['all_agents']= $this->User_Model->select_user_agent();

          $records['evaluations']= $this->Evaluation_Model->view_evaluation($evaluation_id);
          $records['criterias']= $this->Evaluation_Model->view_criteria($evaluation_id);
          $records['points']= $this->Evaluation_Model->view_points($evaluation_id);

          $records['class_comments']= $this->Evaluation_Model->view_evaluation_comments($evaluation_id, 'Class Comment');
          $records['manager_comments']= $this->Evaluation_Model->view_evaluation_comments($evaluation_id, 'Manager Comment');

         $this->load->view('company_evaluation_agent', $records);

     }

     // else if($this->session->userdata['userlogin']['usertype'] == "Agent"){
  
     //     $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
     //     $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
     //     $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
     //     //$records['all_agents']= $this->User_Model->select_user_agent();

     //      $records['evaluations']= $this->Evaluation_Model->view_evaluation($evaluation_id);
     //      $records['criterias']= $this->Evaluation_Model->view_criteria($evaluation_id);
     //      $records['points']= $this->Evaluation_Model->view_points($evaluation_id);

     //      $records['class_comments']= $this->Evaluation_Model->view_evaluation_comments($evaluation_id, 'Class Comment');
     //      $records['manager_comments']= $this->Evaluation_Model->view_evaluation_comments($evaluation_id, 'Manager Comment');

     //     $this->load->view('team_evaluation_agent', $records);

     // }


  }


  public function teamEvaluation(){

     if($this->session->userdata['userlogin']['usertype'] == "Manager"){
  
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['team_evaluations']= $this->Evaluation_Model->view_teamevaluation_manager($this->session->userdata['userlogin']['user_id']);




      $this->load->view('template/evaluation_header', $records);
      $this->load->view('template/evaluation_sidebar', $records);
      $this->load->view('team_evaluation_list_manager', $records);
      $this->load->view('template/evaluation_footer', $records);
     }

     else if($this->session->userdata['userlogin']['usertype'] == "Agent"){
  
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['team_evaluations']= $this->Evaluation_Model->view_teamevaluation_agent($this->session->userdata['userlogin']['user_id']);



      $this->load->view('team_evaluation_list_agent', $records);

     }

  }

  public function companyEvaluation(){


     if($this->session->userdata['userlogin']['usertype'] == "Agent"){
  
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['team_evaluations']= $this->Evaluation_Model->view_companyevaluation_agent($this->session->userdata['userlogin']['user_id']);



      $this->load->view('company_evaluation_list_agent', $records);

     }

  }

    /*public function add_evaluation(){

    
    if($this->session->userdata['userlogin']['usertype'] == "Manager"){
         $from_user_id = $this->session->userdata['userlogin']['user_id'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('to_agent','Agent','trim|required|xss_clean');
         $this->form_validation->set_rules('score1','Clarity','trim|required|xss_clean');  
         $this->form_validation->set_rules('score2','Tone and Enthusiasm','trim|required|xss_clean');
         $this->form_validation->set_rules('score3','Vocabulary','trim|required|xss_clean'); 
         $this->form_validation->set_rules('score4','Uses Complete Sentence','trim|required|xss_clean');  
         $this->form_validation->set_rules('score5','Consistency','trim|required|xss_clean');          



       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

            $data =  array(

                             'from_user_id' => $from_user_id,

                             'to_user_id' => $this->input->post('to_agent'),

                             'score1'  => $this->input->post('score1'),

                             'score2'  => $this->input->post('score2'),

                             'score3'  => $this->input->post('score3'),

                             'score4'  => $this->input->post('score4'),

                             'score5'  => $this->input->post('score5'),

                             'evaluation_type'  => 'Team',

                             // 'evaluation_date_created'  => date('Y-m-d H:i:s'),

                         );

            $this->Evaluation_Model->insert($data);

             echo json_encode(array("response" =>   "success", "message" => "Successfully Added Team Evaluation_Model", "redirect" => base_url('evaluation')));



           }

      }
      
    else if($this->session->userdata['userlogin']['usertype'] == "Agent"){
         $from_user_id = $this->session->userdata['userlogin']['user_id'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('to_agent','Agent','trim|required|xss_clean');
         $this->form_validation->set_rules('score1','Clarity','trim|required|xss_clean');  
         $this->form_validation->set_rules('score2','Tone and Enthusiasm','trim|required|xss_clean');
         $this->form_validation->set_rules('score3','Vocabulary','trim|required|xss_clean'); 
         $this->form_validation->set_rules('score4','Uses Complete Sentence','trim|required|xss_clean');  
         $this->form_validation->set_rules('score5','Consistency','trim|required|xss_clean');          



       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

            $data =  array(

                             'from_user_id' => $from_user_id,

                             'to_user_id' => $this->input->post('to_agent'),

                             'score1'  => $this->input->post('score1'),

                             'score2'  => $this->input->post('score2'),

                             'score3'  => $this->input->post('score3'),

                             'score4'  => $this->input->post('score4'),

                             'score5'  => $this->input->post('score5'),

                             'evaluation_type'  => 'Company',

                             // 'evaluation_date_created'  => date('Y-m-d H:i:s'),

                         );

            $this->Evaluation_Model->insert($data);

             echo json_encode(array("response" =>   "success", "message" => "Successfully Added Team Evaluation_Model", "redirect" => base_url('evaluation/company_evaluation')));



           }

      }


      }


      public function company_evaluation(){

      modules::run("account/is_logged_in");
      
     if($this->session->userdata['userlogin']['usertype'] == "Agent"){

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['team_evaluations']= $this->Evaluation_Model->view_teamevaluation_manager($this->session->userdata['userlogin']['user_id']);

      $this->load->view('company_evaluation_list_agent', $records);
     
     }

     else if($this->session->userdata['userlogin']['usertype'] == "Admin"){

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['team_evaluations']= $this->Evaluation_Model->view_teamevaluation_agent($this->session->userdata['userlogin']['user_id']);

      $this->load->view('team_evaluation_list_agent', $records);

     
     }
    
    }

      public function companyEvaluationform(){

     if($this->session->userdata['userlogin']['usertype'] == "Agent"){
  
         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
         $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         $records['all_agents']= $this->User_Model->select_user_agent();

         $this->load->view('company_evaluation_agent', $records);

     }


  }*/

  //add and/or update evaluation score
  public function add_evaluation_score(){
   $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
    $criterias = $this->input->post('criteria-id') ? $this->input->post('criteria-id') : array();

    $scoresum = $this->input->post('score') ? $this->input->post('score') : array();

    $evaluation_id = $this->input->post('evaluation_id');

    $class_comment = trim($this->input->post('class-comment'));

    $manager_comment = trim($this->input->post('manager-comment'));

    $total_points = $this->input->post('evaluation_points');

    $passing_score = $total_points * 0.8;



       $this->form_validation->set_rules('score[]','Score','trim|xss_clean|required'); 

       $this->form_validation->set_rules('criteria-id[]','Criteria Id','trim|xss_clean|required');   
      
       $get_last_id_criteria = array();
      
      if ($this->form_validation->run() == FALSE){
          echo json_encode(array("response" => "error", "message" => validation_errors()));
        }

       else{

            foreach ($criterias as $criteria => $i) {
                    $data = array(
                                   'score' => $scoresum[$criteria],                                   
                              );

                              $this->Evaluation_Model->update_evaluation_score($data, $i);

                    }
                    
                    $data1 = array(
                       'total_score' => array_sum($scoresum),
                             );
                
                             $this->Evaluation_Model->update_evaluation_totalscore($data1, $evaluation_id); 


            } 
             $user_notify = $this->Evaluation_Model->select_evaluation_id($evaluation_id); 
             $data_notification = array(

                     'from_user' => $user_charge,
                     'to_user' => 'All',
                     'message' => "Evaluated your Score",
                     'unread' => 1,
                     'date_notify' => date('Y-m-d H:i:s'),
                     'link' =>  dirname(base_url(uri_string())),
                     'to_user_id' => $user_notify['to_user_id'],
                     'from_usertype' => $this->session->userdata['userlogin']['usertype']
                   );
                  $this->Notification_Model->insert($data_notification);



            if (array_sum($scoresum) >= $passing_score) {
                
                 echo json_encode(array("response" => "success", "message" => "Evaluate score successfully submitted", "redirect" => base_url('evaluation')));
            }
            else{
                
                echo json_encode(array("response" => "success", "message" => "Evaluate score successfully submitted", "redirect" => base_url('coaching/coaching_form/'.$evaluation_id)));
            }
          
    }

  public function test_rc($id=''){
    date_default_timezone_set('America/New_York');

     $get_extension_number = 0;

        $id = $this->uri->segment(3);
        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['get_id'] = $id;  
      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

     // date_default_timezone_set('America/New_York');
      $attendance = $this->Attendance_Model->view_single_attendance1($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));

      // if($attendance['status_log'] == ''){
      //   attendance($this->session->userdata['userlogin']['user_id']);
      // }
      // else{
         $get_point_absents = 0;
         $lacking_hour_points = 0.0;
         $get_excess_lunch= 0;
         $get_excess_break= 0; 
         $get_total_of_excess = 0;
         $get_total_of_work = 0;
         $data = array();

         //  $get_duty_log = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));
         //  $get_duty_log_yesterday = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d', strtotime("-1 day")));
         //  if($get_duty_log  == false &&  date('H:i:s') >=  "22:30:00"){
         //         $data= array(
         //                       'user_id' => $this->session->userdata['userlogin']['user_id'],
         //                       'duty_log'  =>  date("Y-m-d H:i:s"),  
         //                     );

         //         $this->Attendance_Model->insert($data);

         //   }
         //  elseif($get_duty_log_yesterday == false && $get_duty_log == false){
         //         $data= array(
         //                       'user_id' => $this->session->userdata['userlogin']['user_id'],
         //                       'duty_log'  =>  date('Y/m/d', strtotime("-1 day")),  
         //                     );
         //         $this->Attendance_Model->insert($data);
         // }

          // echo date('Y-m-d');

          require APPPATH.'vendor/autoload.php';

          $RECIPIENT = '+9738142372';

          $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

          $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

          $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';

          $RINGCENTRAL_USERNAME = '+18006915131';

          $RINGCENTRAL_PASSWORD = 'HLMSales2021';

          $RINGCENTRAL_EXTENSION = '101';



          $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);

          $platform = $rcsdk->platform();
          // date_default_timezone_set('America/New_York');

          $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);

         $last_seven_days = date('Y-m-d', strtotime('-7 days'));
          // echo date('Y-m-d');
          // echo date('Y-m-d', strtotime('-1 day'));
         // exit();
         // echo date('Y-m-d');dd
         // $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d'));
         $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d'));
         $resp_prev = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime('-1 days')).'&dateTo='.date('Y-m-d').'&view=Detailed');
         
         //print_r(json_encode($resp));
         //print_r($resp_prev->json()->records);

          // $datetime = new DateTime();
          // $datetime->setTimeZone(new DateTimeZone('Zulu'));
          // $datetime->setTimeZone(new DateTimeZone('UTC'));
          // $date_to = $datetime->format('Y-m-d\TH:i:s.u\Z');
          // $date_from = $datetime->modify('-1 day')->format('Y-m-d\TH:i:s.u\Z');
          // $date_from_prev = $datetime->modify('-1 day')->format('Y-m-d\TH:i:s.u\Z');


          //echo $date_from;



           //$resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$date_from.'&dateTo='.$date_to.'&view=Detailed');

         // $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d').'&dateTo='.date('Y-m-d'),

         //     array(

         //  //   'from' => array('phoneNumber' => $RINGCENTRAL_USERNAME),

          //  //   'to' => array('phoneNumber' => $RECIPIENT),
         //   // 'extensionNumber' => array('105')
         //  ));

           //$resp_prev = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$date_from_prev.'&dateTo='.$date_from.'&view=Detailed');

          $count_call_log = 0;
          $count_call_log_prev = 0;
          $agent_name = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
          $current_date  = date('Y-m-06');
          $adv_date  = date('Y-m-07', strtotime("+ 1 month"));
          $prev_date  = date('Y-m-06', strtotime("- 1 month"));
         

         $get_overall_quota = $this->Payment_Model->sales_lead_qouta_over_all($this->session->userdata['userlogin']['user_id'], date('Y'));
         $attendance_users = $this->Attendance_Model->get_all_totalattendance_point($this->session->userdata['userlogin']['user_id'],date('Y-m-d H:i:s'), date('Y-m-01'), date('Y-m-t'));
         $total_points = 0;
         // if($attendance_users > 0){
         //  foreach ($attendance_users as $attendance_user) {
         //     $get_total_of_excess = $this->CalculateTime($attendance_user['excess_lunch'], $attendance_user['excess_break']);
         //     $total_lunch_start = $attendance_user['total_lunch_start'];
         //     $total_lunch_end =  $attendance_user['total_lunch_end'];
         //     $total_break_in = $attendance_user['total_break_in'];
         //     $total_break_out =  $attendance_user['total_break_out'];
         //     $total_out = $attendance_user['total_out'] > 8 ? "8.00" : (float)$attendance_user['total_out'];


                
         //                 if($attendance_user['time_in'] == NULL  &&  $attendance_user['time_out'] == NULL  &&  $attendance_user['break_in'] == NULL  &&  $attendance_user['break_out'] == NULL  &&  $attendance_user['lunch_start'] == NULL  &&  $attendance_user['lunch_end'] == NULL){
         //                        $get_total_of_work = 0.0;
         //                        $get_point_absents = 1; 

         //                 }
         //                elseif($attendance_user['time_in'] != NULL  &&  $attendance_user['time_out'] == NULL  &&  $attendance_user['break_in'] == NULL  &&  $attendance_user['break_out'] == NULL  &&  $attendance_user['lunch_start'] == NULL  &&  $attendance_user['lunch_end'] == NULL){
         //                        $get_total_of_work = 0.0;
         //                        $get_point_absents = 0; 

         //                 }
         //                elseif($attendance_user['time_in'] != NULL  && $attendance_user['time_out'] != NULL){
         //                        $get_total_of_work = (float)$total_out - (float)$get_total_of_excess;
         //                        $get_point_absents = 0;


         //                 }
         //                elseif($attendance_user['time_in'] != NULL  && $attendance_user['time_out'] == NULL && $attendance_user['break_out'] != NULL){
         //                        $get_total_of_work = (float)$total_break_out - (float)$get_total_of_excess;
         //                        $get_point_absents = 0;


         //                 }
         //                 elseif($attendance_user['time_in'] != NULL  && $attendance_user['break_out'] == NULL && $attendance_user['break_in'] != NULL){
         //                        $get_total_of_work = (float)$total_break_in - (float)$get_total_of_excess;
         //                        $get_point_absents = 0;


         //                 }
         //                 elseif($attendance_user['time_in'] != NULL  &&  $attendance_user['break_in'] == NULL && $attendance_user['lunch_end'] != NULL){
         //                        $get_total_of_work = (float)$total_lunch_end - (float)$get_total_of_excess;
         //                        $get_point_absents = 0;


         //                 }
         //                elseif($attendance_user['time_in'] != NULL  &&  $attendance_user['lunch_end'] == NULL && $attendance_user['lunch_start'] != NULL){
         //                        $get_total_of_work = (float)$total_lunch_start - (float)$get_total_of_excess;
         //                        $get_point_absents = 0;


         //                 }
         //                if($attendance_user['time_in'] != NULL && $attendance_user['time_out'] == NULL){
         //                      $lacking_hour_points = 0.5;
         //                 }
         //                 elseif(date('H:i:s', strtotime($attendance_user['time_out'])) < "07:00:00"  && $attendance_user['time_out'] != NULL &&  $attendance_user['time_in'] != NULL  &&  $attendance_user['approve_status'] == "Declined"){
         //                      $lacking_hour_points = 0.5;
         //                 }
         //                 else{
         //                      $lacking_hour_points = 0.0;
         //                 }
         //         $total_points += $get_point_absents + $attendance_user['point_late'] + $lacking_hour_points + $attendance_user['excess_break_point'] + $attendance_user['excess_lunch_point'];
         //       }
         //   }
          // $key = array_search('OUFYz3SG0MTXzUA', array_column(json_decode($count_call_log), 'id'));
         // $code = json_encode($resp->json(), JSON_PRETTY_PRINT);
         // echo($code);
         // echo json_encode($resp->json());
         // exit();
          foreach ($resp->json()->records as $record ) {

              if (!empty($record->from->name)) {         

                $prevdate = date('Y-m-d', strtotime($record->startTime));

                  if($record->from->name == 'Collin Maxwell'){

                        $get_extension_number = '101';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($record->result == 'Call connected' || $record->result == 'Voicemail' || $record->result == 'Accepted'){
                            $count_call_log += count((array)$record->from->name);  
                          }
                       }

                    }

                     else if($record->from->name == 'Chris Davis'){


                          $get_extension_number = '102';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($record->result == 'Call connected' || $record->result == 'Voicemail' || $record->result == 'Accepted'){
                            $count_call_log += count((array)$record->from->name);  
                          }
                       }

                    }


                      else if($record->from->name == 'Elon Robbins'){



                          $get_extension_number = '103';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($record->result == 'Call connected' || $record->result == 'Voicemail' || $record->result == 'Accepted'){
                            $count_call_log += count((array)$record->from->name);  
                          }
                       }

                    }


                      else if($record->from->name == 'Lourie Sanchez'){
                    
                        $get_extension_number = '104';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($record->result == 'Call connected' || $record->result == 'Voicemail' || $record->result == 'Accepted'){
                            $count_call_log += count((array)$record->from->name);  
                          }
                       }

                    }



                      else if($record->from->name == 'Jade Smith'){

                        $get_extension_number = '105';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($record->result == 'Call connected' || $record->result == 'Voicemail' || $record->result == 'Accepted'){;
                            $count_call_log += count((array)$record->from->name);  
                          }
                       }

                    }



                      else if($record->from->name == 'Blake Williams'){

                        $get_extension_number = '106';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($record->result == 'Call connected' || $record->result == 'Voicemail' || $record->result == 'Accepted'){
                            $count_call_log += count((array)$record->from->name);  
                          }
                       }

                    }

                       else if($record->from->name == 'Ezekiel Wilson'){

                        $get_extension_number = '107';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($record->result == 'Call connected' || $record->result == 'Voicemail' || $record->result == 'Accepted'){
                            $count_call_log += count((array)$record->from->name);  
                          }
                       }

                    }      

              }

              }
        



                     
          foreach ($resp_prev->json()->records as $recordt) {

              if (!empty($recordt->from->name)) {         

                $prevdate = date('Y-m-d', strtotime($recordt->startTime));
                  if($recordt->from->name == 'Collin Maxwell'){

                        $get_extension_number = '101';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($recordt->result == 'Call connected' || $recordt->result == 'Voicemail' || $recordt->result == 'Accepted'){
                            $count_call_log_prev += count((array)$recordt->from->name);  
                          }
                       }

                    }

                     else if($recordt->from->name == 'Chris Davis'){


                          $get_extension_number = '102';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($recordt->result == 'Call connected' || $recordt->result == 'Voicemail' || $recordt->result == 'Accepted'){
                            $count_call_log_prev += count((array)$recordt->from->name);  
                          }
                       }

                    }


                      else if($recordt->from->name == 'Elon Robbins'){



                          $get_extension_number = '103';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($recordt->result == 'Call connected' || $recordt->result == 'Voicemail' || $recordt->result == 'Accepted'){
                            $count_call_log_prev += count((array)$recordt->from->name);  
                          }
                       }

                    }


                      else if($recordt->from->name == 'Lourie Sanchez'){
                    
                        $get_extension_number = '104';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($recordt->result == 'Call connected' || $recordt->result == 'Voicemail' || $recordt->result == 'Accepted'){
                            $count_call_log_prev += count((array)$recordt->from->name);  
                          }
                       }

                    }



                      else if($recordt->from->name == 'Jade Smith'){

                        $get_extension_number = '105';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($recordt->result == 'Call connected' || $recordt->result == 'Voicemail' || $recordt->result == 'Accepted'){;
                            $count_call_log_prev += count((array)$recordt->from->name);  
                          }
                       }

                    }



                      else if($recordt->from->name == 'Blake Williams'){

                        $get_extension_number = '106';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($recordt->result == 'Call connected' || $recordt->result == 'Voicemail' || $recordt->result == 'Accepted'){
                            $count_call_log_prev += count((array)$recordt->from->name);  
                          }
                       }

                    }

                       else if($recordt->from->name == 'Ezekiel Wilson'){

                        $get_extension_number = '107';

                        if ($get_extension_number == $this->session->userdata['userlogin']['extension_number']) {
                           if($recordt->result == 'Call connected' || $recordt->result == 'Voicemail' || $recordt->result == 'Accepted'){
                            $count_call_log_prev += count((array)$recordt->from->name);  
                          }
                       }

                    }      

              }
            }
    
          //print_r($resp_prev->json()->records);
/*          exit();
*/
           // date_default_timezone_set('America/New_York');
         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
            //  if ($count_call_log == 0){
            //       $get_count_call_log = 0;
            //  }
            // else if ($count_call_log == 1){
            //       $get_count_call_log = 1;
            //  }

            //  else{
            //       $get_count_call_log = $count_call_log + 1;
            //  }



          $records['current_activities'] =  $this->Remark_Model->select_count_remarks_agent($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));
          $records['prev_activities'] =  $this->Remark_Model->select_count_remarks_agent($this->session->userdata['userlogin']['user_id'], date('Y-m-d', strtotime('-1 day')));
          $records['leads']= $this->Lead_Model->view_leads_agent($this->session->userdata['userlogin']['user_id']);
          // $records['leads']= $this->Lead_Model->view_leads_agent($this->session->userdata['userlogin']['user_id']);
          $records['current_call_logs'] =  $count_call_log;
          $records['prev_call_logs'] =  $count_call_log_prev;
          $records['current_pipes'] =  $this->Lead_Model->select_count_pipes_agent($user_charge, date('Y-m-d'));
          $records['prev_pipes'] =  $this->Lead_Model->select_count_pipes_agent($user_charge, date('Y-m-d', strtotime('-1 day')));
          $records['current_quota'] =  $this->Payment_Model->sales_lead_qouta_date($user_charge, $current_date, $adv_date);
          $deduction =  $this->Deduction_Model->total_deduction($this->session->userdata['userlogin']['user_id'], $prev_date, $adv_date);
          $records['current_deduction'] =  $deduction['total_deduction'];
          $data =  $this->Payment_Model->sales_lead_qouta_date($user_charge, $current_date, $adv_date);
          $records['current_sales'] =  $data['total_amount'];
          $records['commission_receivable'] =  $data['total_amount'] - $deduction['total_deduction'] - 500;

          //

          $records['prev_quota'] =  $this->Payment_Model->sales_lead_qouta_date($this->session->userdata['userlogin']['user_id'], $prev_date, $current_date);
          $records['over_all_quota'] = $get_overall_quota;  
          $records['total_points'] =  number_format($total_points, 1);  
          $records['notifications']  = $this->Notification_Model->view_notification_user1($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
          $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
          $records['penalties']= $this->Penalty_Model->select_user_penalty($this->session->userdata['userlogin']['user_id']);
          
          //date_default_timezone_set('Asia/Manila');
          //$records['attendance_user']= $this->Attendance_Model->view_single_attendance($this->session->userdata['userlogin']['user_id'], date('Y-m-d H:i:s'));
         
          //modified by marz
          //date_default_timezone_set('America/New_York');
          $records['attendance_user']= $this->Attendance_Model->view_single_attendance1($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));


          $this->load->view('dashboard', $records);

       // }

      }
  }


}

?>