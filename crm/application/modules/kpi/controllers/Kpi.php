<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Kpi extends MY_Controller {


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
      $records['kpis']= $this->Kpi_Model->view_kpi_admin();

      $this->load->view('template/kpi_header', $records);
      $this->load->view('template/kpi_sidebar', $records);
      $this->load->view('kpi_list_admin', $records);
      // $this->load->view('evaluation_list_admin', $records);
      $this->load->view('template/kpi_footer', $records);
     
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

  //Create Kpi
  public function createKpi(){

    $records['all_users']= $this->User_Model->select_user_all_active();
    $records['agents']= $this->User_Model->select_user_agent();
    $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
    $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
    $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);


    $this->load->view('template/kpi_header', $records);
    $this->load->view('template/kpi_sidebar', $records);
    $this->load->view('create_kpi', $records);
    $this->load->view('template/kpi_footer', $records);
  }


  public function add_create_kpi(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];


       $this->form_validation->set_rules('name','Name','trim|required|xss_clean');          
       $this->form_validation->set_rules('position','Position','trim|required|xss_clean');
       $this->form_validation->set_rules('status','Status','trim|required|xss_clean');
       $this->form_validation->set_rules('month','Month','trim|required|xss_clean');
       $this->form_validation->set_rules('attendance_score','Attendance Score','trim|required|xss_clean');
       $this->form_validation->set_rules('attendance_subtotal','Attendance Subtotal','trim|required|xss_clean');
       $this->form_validation->set_rules('attendance_total','Attendance Total','trim|required|xss_clean');
       $this->form_validation->set_rules('qa_score','Qa Score','trim|required|xss_clean');
       $this->form_validation->set_rules('qa_subtotal','Qa Subtotal','trim|required|xss_clean');
       $this->form_validation->set_rules('qa_total','Qa Total','trim|required|xss_clean');
       $this->form_validation->set_rules('submission_score','Submission Score','trim|required|xss_clean');
       $this->form_validation->set_rules('submission_subtotal','Submission Subtotal','trim|required|xss_clean');
       $this->form_validation->set_rules('submission_total','Submission Total','trim|required|xss_clean');
       $this->form_validation->set_rules('revenue_score','Revenue Score','trim|required|xss_clean');
       $this->form_validation->set_rules('revenue_subtotal','Revenue Subtotal','trim|required|xss_clean');
       $this->form_validation->set_rules('revenue_total','Revenue Total','trim|required|xss_clean');
      
      if ($this->form_validation->run() == FALSE){
          echo json_encode(array("response" => "error", "message" => validation_errors()));
        }

       else{


        $data = array(

                       'from_user' => $user_charge,
                       'to_user_id' => $this->input->post('name'),
                       'kpi_position' => $this->input->post('position'),
                       'status' => $this->input->post('status'),
                       'month' => $this->input->post('month'),
                       'attendance_score' => $this->input->post('attendance_score'),
                       'attendance_subtotal' => $this->input->post('attendance_subtotal'),
                       'attendance_total' => $this->input->post('attendance_total'),
                       'qa_score' => $this->input->post('qa_score'),
                       'qa_subtotal' => $this->input->post('qa_subtotal'),
                       'qa_total' => $this->input->post('qa_total'),
                       'submission_score' => $this->input->post('submission_score'),
                       'submission_subtotal' => $this->input->post('submission_subtotal'),
                       'submission_total' => $this->input->post('submission_total'),
                       'revenue_score' => $this->input->post('revenue_score'),
                       'revenue_subtotal' => $this->input->post('revenue_subtotal'),
                       'revenue_total' => $this->input->post('revenue_total'),
                       'date_created' => date('Y-m-d H:i:s'),
                          
                  );

   

                  $this->Kpi_Model->insert($data);

   

 echo json_encode(array("response" => "success", "message" => "Create Kpi successfully submitted", "redirect" => base_url('kpi')));
 
 }

}


//View Kpi
  public function view_kpi(){

    $kpi_id = $_GET['id'];

     if($this->session->userdata['userlogin']['usertype'] == "Admin"){
  
         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
         $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         $records['agents']= $this->User_Model->select_user_agent();

          $records['kpis']= $this->Kpi_Model->view_kpi($kpi_id);


    $this->load->view('template/kpi_header', $records);
    $this->load->view('template/kpi_sidebar', $records);
    $this->load->view('view_kpi', $records);
    $this->load->view('template/kpi_footer', $records);

     }   

}


  //Update Kpi
  public function update_kpi(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

        $kpi_id = $this->input->post('kpi_id');

       $this->form_validation->set_rules('name','Name','trim|required|xss_clean');          
       $this->form_validation->set_rules('position','Position','trim|required|xss_clean');
       $this->form_validation->set_rules('status','Status','trim|required|xss_clean');
       $this->form_validation->set_rules('month','Month','trim|required|xss_clean');
       $this->form_validation->set_rules('attendance_score','Attendance Score','trim|required|xss_clean');
       $this->form_validation->set_rules('attendance_subtotal','Attendance Subtotal','trim|required|xss_clean');
       $this->form_validation->set_rules('attendance_total','Attendance Total','trim|required|xss_clean');
       $this->form_validation->set_rules('qa_score','Qa Score','trim|required|xss_clean');
       $this->form_validation->set_rules('qa_subtotal','Qa Subtotal','trim|required|xss_clean');
       $this->form_validation->set_rules('qa_total','Qa Total','trim|required|xss_clean');
       $this->form_validation->set_rules('submission_score','Submission Score','trim|required|xss_clean');
       $this->form_validation->set_rules('submission_subtotal','Submission Subtotal','trim|required|xss_clean');
       $this->form_validation->set_rules('submission_total','Submission Total','trim|required|xss_clean');
       $this->form_validation->set_rules('revenue_score','Revenue Score','trim|required|xss_clean');
       $this->form_validation->set_rules('revenue_subtotal','Revenue Subtotal','trim|required|xss_clean');
       $this->form_validation->set_rules('revenue_total','Revenue Total','trim|required|xss_clean');
      
      if ($this->form_validation->run() == FALSE){
          echo json_encode(array("response" => "error", "message" => validation_errors()));
        }

       else{


        $data = array(

                       'from_user' => $user_charge,
                       'to_user_id' => $this->input->post('name'),
                       'kpi_position' => $this->input->post('position'),
                       'status' => $this->input->post('status'),
                       'month' => $this->input->post('month'),
                       'attendance_score' => $this->input->post('attendance_score'),
                       'attendance_subtotal' => $this->input->post('attendance_subtotal'),
                       'attendance_total' => $this->input->post('attendance_total'),
                       'qa_score' => $this->input->post('qa_score'),
                       'qa_subtotal' => $this->input->post('qa_subtotal'),
                       'qa_total' => $this->input->post('qa_total'),
                       'submission_score' => $this->input->post('submission_score'),
                       'submission_subtotal' => $this->input->post('submission_subtotal'),
                       'submission_total' => $this->input->post('submission_total'),
                       'revenue_score' => $this->input->post('revenue_score'),
                       'revenue_subtotal' => $this->input->post('revenue_subtotal'),
                       'revenue_total' => $this->input->post('revenue_total'),
                       'date_created' => date('Y-m-d H:i:s'),
                          
                  );

   

                  $this->Kpi_Model->update_kpi($data, $kpi_id);

   

 echo json_encode(array("response" => "success", "message" => "Create evaluation successfully submitted", "redirect" => base_url('account')));
 
 }

} 


}

?>