<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class TestController extends MY_Controller {
	function __construct() {

         parent::__construct();



  }

    public function index(){

    	  echo "test";
     }

      public function test($test = ''){

        echo "test";
     }


    public function report(){

         $lead_data = array();

      if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name_exist();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $this->load->view('report', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $this->load->view('report_admin', $records);

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){


          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name();

          $this->load->view('report_admin', $records);

      }


       else if ($this->session->userdata['userlogin']['usertype'] == "Agent"){


          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name();

          $this->load->view('report_admin', $records);

      }




    }

     public function stats_calendar(){

      echo 'test';
      exit();

      if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_history', $records);  

      }



      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_admin();

          $this->load->view('company_calendar', $records);  

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_production', $records);  

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_author_history', $records);  

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_manager_history', $records);  

      }



      else if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history($this->session->userdata['userlogin']['user_id']);

           $this->load->view('company_calendar_agent', $records);  

      }


    }

    function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;

        $mail->Username = 'admin@horizonsliterary.us'; // YOUR gmail email
        $mail->Password = 'thankyouGodlovesUs143@'; // YOUR gmail password

        // $mail->setFrom('admin@horizonsliterary.us', 'Bett Name');
        $mail->Sender ='admin@horizonsliterary.us';
        $mail->SetFrom('ithelpdesk2022143@gmail.com', 'First Last', FALSE);
        $mail->addAddress('ansellim23@gmail.com', 'Receiver Name');
        

        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    }



}

