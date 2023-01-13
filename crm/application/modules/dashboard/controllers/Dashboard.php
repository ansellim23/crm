<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends MY_Controller {
private $upload_path = "./uploads";
  
  function __construct() {

         parent::__construct();

         date_default_timezone_set('Asia/Manila');

         // $this->load->model("account/User_Model");

         $this->load->model("dashboard/Lead_Model");

         modules::run("account/is_logged_in");

       $this->load->library('email');

           $this->email->initialize(
            array(
                  'charset' =>'utf-8',
                  'wordwrap'  => TRUE,
                  'mailtype'  => 'html',
             )); 

        $this->load->library('CIPhoneNumber');
        $this->load->library('phpmailer_lib');
        $this->load->library('zip');
        $this->get_quarterly();  


    // Very simple way to load the LIBRARY

      $this->load->helper('CIPhoneNumber');
         $this->load->library('user_agent');

        if ($this->agent->is_mobile() && $this->session->userdata['userlogin']['usertype'] != "IT")  {
             $this->output->set_status_header('404');
             $this->load->view('404');
        }


    //  $get_two_months =   date('Y-m-t', strtotime('+1 month'));
    //  $get_remark_project = false;

    //  if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
    //    $recycle_leads = $this->Lead_Model->select_recyle_lead($this->session->userdata['userlogin']['user_id']);
    //    if($recycle_leads > 0){
    //     foreach ($recycle_leads as $recycle_lead){
    //         $get_remark_project = $this->Lead_Model->select_all_remark($recycle_lead['project_id']);
    //         if ($get_two_months == date('Y-m-d') && $get_remark_project == false ){
    //                $this->Lead_Model->update_lead(array('user_id'=> 0, 'status' => 'Recycled'), $recycle_lead['project_id']);
 
    //         }
    //     }
    //           // $get_remark_project_id = $this->lead->select_recyle($rec)

    //      }

    // }


  }


public function test_ring_central(){
        require APPPATH.'vendor/autoload.php';

          $RECIPIENT = '+18882248399';

          // $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

          // $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

          // $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';

          // $RINGCENTRAL_USERNAME = '+18882248399';

          // $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

          // $RINGCENTRAL_EXTENSION = '101';

        
          $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

          $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

          $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';

          $RINGCENTRAL_USERNAME = '+18882248399';

          $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

          $RINGCENTRAL_EXTENSION = '101';





          $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);

          $platform = $rcsdk->platform();
          // date_default_timezone_set('America/New_York');
      // $resp = $platform->get('/account/~/extension/~/call-log?page=1&dateFrom='.$last_seven_days.'&dateTo='.date('Y-m-d').'&view=Detailed&page=1&perPage=100',

          $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);
          $resp = $platform->get('/account/~/extension/~/call-log?',
                   array(
                       'extensionNumber' => 106,
                       'phoneNumber' => "+7323614239",
                        ));

            // page=1&dateFrom='.date('Y-m-23').'&dateTo='.date('Y-m-25').'&view=Detailed&page=1&perPage=100');





// Create a CSV file to log the records
      echo "<pre>";
      print_r($resp->json()->records);
      echo "</pre>";
      exit();

                        $status = "Success";
                        $dir = date('Y-m-d');
                        $fname = "recordings_${dir}.csv";
                        $fdir = "Recordings/${dir}";

                        if (is_dir($fdir) === false)
                        {
                          mkdir($fdir, 0755, true);
                        }

                        $file = fopen($fname,'w');

                        $fileHeaders = array("RecordingID","ContentURI","Filename","DownloadStatus");

                        fputcsv($file, $fileHeaders);

                        $fileContents = array();


                        $timePerRecording = 6;

                        foreach ($callLogRecords as $i => $callLogRecord) {

                          $id = $callLogRecord->recording->id;


                          $uri = $callLogRecord->recording->contentUri;


                          // $apiResponse2 = $platform->get($callLogRecord->recording->id);
                          // print_r($apiResponse2->response());
                          $apiResponse = $platform->get($callLogRecord->recording->contentUri);

                          $ext = ($apiResponse->response()->getHeader('Content-Type')[0] == 'audio/mpeg')
                            ? 'mp3' : 'wav';

                          $start = microtime(true);

                          file_put_contents("${fdir}/recording_${id}.${ext}", $apiResponse->raw());

                          $filename = "recording_${id}.${ext}";

                          if(filesize("${fdir}/recording_${id}.${ext}") == 0) {
                              $status = "failure";
                          }

                          file_put_contents("${fdir}/recording_${id}.json", json_encode($callLogRecord));

                          $end=microtime(true);

                          // Check if the recording completed wihtin 6 seconds.
                          $time = ($end*1000 - $start * 1000);
                          if($time < $timePerRecording) {
                            sleep($timePerRecording-$time);
                          }

                          $fileContents = array($id, $uri, $filename, $status);
                          fputcsv($file, $fileContents);

                        }

                        fclose($file);
                      }

        public function test_email(){

                  $subject = 'TEMPORARY PASSWORD';

                  $url= base_url("account");

                  $message =  '<h1>Temporary Password</h1>';

                  // $message .= '<p>Hi '. ucfirst($this->input->post('firstname')) . ' '.ucfirst($this->input->post('lastname')). '</p>';

                  // $message .= '<p>This is Your Email <b>'. $this->input->post('email_address').'</b> And </p>';

                  // $message .= '<p>Your Tempory Password <b>'.$get_random.'</b>  was trying to put your password and after login your account, you can change your password after login your account on setting.</p>';

                  // $message .= '<p>Click this link to login your account <a href="'.$url.'">Click Here</a></p>';



                  $this->email->set_newline("\r\n");

                  $this->email->set_header('MIME-Version', '1.0; charset=utf-8');



                  $this->email->from('hlmcrmsi@sv99.ifastnet.com');

                  $this->email->to("ansellim23@gmail.com");

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


function currencyConverter($amount){ 
  $fromCurrency = urlencode("USD");
  $toCurrency = urlencode("PHP"); 
  $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  $get = file_get_contents($url);
  $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  $exhangeRate = (float) substr($data[1],0,7);
  $convertedAmount = $amount*$exhangeRate;
  //echo $exhangeRate . " -> " .$convertedAmount;
 //  $data = array( 'exhangeRate' => $exhangeRate, 'convertedAmount' =>$convertedAmount,
 // 'fromCurrency' => strtoupper($fromCurrency), 'toCurrency' => strtoupper($toCurrency));
 //  echo json_encode( $data );
return $convertedAmount;
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
    


  function sumTime($initialHour, $finalHour) {
      $h = date('H', strtotime($finalHour));
      $m = date('i', strtotime($finalHour));
      $s = date('s', strtotime($finalHour));
      $tmp = $h." hour ".$m." min ".$s." second";
      $sumHour = $initialHour." + ".$tmp;
      $newTime = date('H:i:s ', strtotime($sumHour));
      return $newTime;
    }



function formatPhoneNumber($phoneNumber) {

    $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);



    if(strlen($phoneNumber) > 10) {

        $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);

        $areaCode = substr($phoneNumber, -10, 3);

        $nextThree = substr($phoneNumber, -7, 3);

        $lastFour = substr($phoneNumber, -4, 4);



        $phoneNumber = '('.$areaCode.') '.$nextThree.'-'.$lastFour;

    }

    else if(strlen($phoneNumber) == 10) {

        $areaCode = substr($phoneNumber, 0, 3);

        $nextThree = substr($phoneNumber, 3, 3);

        $lastFour = substr($phoneNumber, 6, 4);



        $phoneNumber = '('.$areaCode.') '.$nextThree.'-'.$lastFour;

    }

    else if(strlen($phoneNumber) == 7) {

        $nextThree = substr($phoneNumber, 0, 3);

        $lastFour = substr($phoneNumber, 3, 4);



        $phoneNumber = $nextThree.'-'.$lastFour;

    }



    return $phoneNumber;

}



public function get_phone(){

     echo $this->formatPhoneNumber('+18882248399');

}

    // $this->_data['items'] = $items;



    // Load view example for demo

    // $this->load->view('ciphonenumber-example', $this->_data);

  



   function setindex_prefix($index_assigned)

    {

            switch(strlen($index_assigned))

            {

                case 1:

                    $new_index_assigned = "000".$index_assigned;

                    break;

                case 2:

                    $new_index_assigned = "00".$index_assigned;

                break;

                case 3:

                    $new_index_assigned = "0".$index_assigned;

                    break;

                default:

                    $new_index_assigned = $index_assigned;

            }

            

          return "PROJ".$new_index_assigned;

    }


   function setindex_Lead_ID($index_assigned)

    {

            switch(strlen($index_assigned))

            {

                case 1:

                    $new_index_assigned = "000".$index_assigned;

                    break;

                case 2:

                    $new_index_assigned = "00".$index_assigned;

                break;

                case 3:

                    $new_index_assigned = "0".$index_assigned;

                    break;

                default:

                    $new_index_assigned = $index_assigned;

            }

            

          return "LEAD".$new_index_assigned;

    }

   function setindex_Submission_ID($index_assigned)

    {

            switch(strlen($index_assigned))

            {

                case 1:

                    $new_index_assigned = "000".$index_assigned;

                    break;

                case 2:

                    $new_index_assigned = "00".$index_assigned;

                break;

                case 3:

                    $new_index_assigned = "0".$index_assigned;

                    break;

                default:

                    $new_index_assigned = $index_assigned;

            }

            

          return "SUB".$new_index_assigned;

    }

    public function test(){
       phpinfo();
    }
 


      public function call_log_test(){
     

      require APPPATH.'vendor/autoload.php';



      $RECIPIENT = '+18882248399';

      $RINGCENTRAL_CLIENTID = 'x0HrZ3kaQA-5AEUPEFZ4cA';

      $RINGCENTRAL_CLIENTSECRET = 'SG_bm_6oRF6uCCn_PeLldA_JMSVWvUSyagPrpNDwBQSA';

      $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';



      $RINGCENTRAL_USERNAME = '+18882248399';

      $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

      $RINGCENTRAL_EXTENSION = '101';



      $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);



      $platform = $rcsdk->platform();



      $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);

     $last_seven_days = date('Y-m-d', strtotime('-7 days'));



      $resp = $platform->get('/account/~/extension/~/call-log?page=1&dateFrom='.$last_seven_days.'&dateTo='.date('Y-m-d').'&view=Detailed&page=1&perPage=100',

          array(

          //   'from' => array('phoneNumber' => $RINGCENTRAL_USERNAME),

          //   'to' => array('phoneNumber' => $RECIPIENT),

            'extensionNumber' => array('101','102', '103', '104', '105', '106', '107')

          ));

              echo "<pre>";

                 print_r($resp->json()->records);

              echo "</pre>";



//       foreach ($resp->json()->records as $record) {



//          $apiResponse = $platform->post('/number-parser/parse',

//           array(

//             'originalStrings' => array($record->from->phoneNumber)

//           ));

//              foreach ($apiResponse->json()->phoneNumbers as $test) {



//               $data = array();



//            echo "<pre>";

//              print_r ($test->areaCode);

//            echo "</pre>";

//       }

// }

      exit();

       if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_history', $records);  

      }



      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          $records['call_log_histories'] = $resp->json()->records;

          $this->load->view('call_logs_history', $records);  

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_production', $records);  

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

          $records['call_log_history']= $this->Signature_Model->view_email_history_all();

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

          $this->load->view('email_authors_agent_history', $records);  

      }

     }

  public function call_log_history(){

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $user_charge2 = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
       date_default_timezone_set('America/New_York');
       // echo  date("Y-m-d h:i:s");
       // exit();

      require APPPATH.'vendor/autoload.php';

       $data = array();

      $RECIPIENT = '+18882248399';

      $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

      $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

      $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';



      $RINGCENTRAL_USERNAME = '+18882248399';

      $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

      $RINGCENTRAL_EXTENSION = '101';



      $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);



      $platform = $rcsdk->platform();



      $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);
       date_default_timezone_set('America/New_York');

      
       $last_seven_days = date('Y-m-d', strtotime('-6 days'));
       // echo $last_seven_days;
       // exit();
 // date_default_timezone_set('America/New_York');
 //         $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d').'&view=Detailed');
 //         $resp_prev = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime('-1 days')).'&dateTo='.date('Y-m-d').'&view=Detailed');

      $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$last_seven_days.'&dateTo='.date('Y-m-d'),

             array(

          //   'from' => array('phoneNumber' => $RINGCENTRAL_USERNAME),

          //   'to' => array('phoneNumber' => $RECIPIENT),
           // 'extensionNumber' => array('105')
          ));

      //$resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d'));





       if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_history', $records);  

      }



      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){
         date_default_timezone_set('America/New_York');

          $records['all_users']= $this->User_Model->select_user_agent_manager();
          $records['call_log_histories'] = $resp->json()->records;


          $this->load->view('template/header_admin', $records);
          $this->load->view('template/sidebar_admin', $records);
          $this->load->view('call_logs_history', $records);  
          $this->load->view('template/footer_admin', $records);

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_production', $records);  

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

          $records['call_log_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_author_history', $records);  

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){
         date_default_timezone_set('America/New_York');

          $records['all_users']= $this->User_Model->select_user_agent_manager();
          $records['call_log_histories'] = $resp->json()->records;


          $this->load->view('template/header_admin', $records);
          $this->load->view('template/sidebar_admin', $records);
          $this->load->view('call_logs_history', $records);  
          $this->load->view('template/footer_admin', $records); 

      }

            else if ($this->session->userdata['userlogin']['usertype'] == "Human Resources"){
         date_default_timezone_set('America/New_York');

          $records['all_users']= $this->User_Model->select_user_agent_manager();
          $records['call_log_histories'] = $resp->json()->records;


          $this->load->view('template/header_admin', $records);
          $this->load->view('template/sidebar_hr', $records);
          $this->load->view('call_logs_history', $records);  
          $this->load->view('template/footer_admin', $records); 

      }



      else if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
        date_default_timezone_set('America/New_York');

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history($this->session->userdata['userlogin']['user_id']);

          $records['call_log_histories'] = $resp->json()->records;

          $this->load->view('template/header_agent', $records);
          $this->load->view('template/sidebar_agent', $records);
          $this->load->view('call_log_history_agent', $records);  
          $this->load->view('template/footer_agent', $records); 

      }

     }

     //report metric
      public function report_metrics(){
        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
       date_default_timezone_set('America/New_York');
       // echo  date("Y-m-d h:i:s");
       // exit();

      require APPPATH.'vendor/autoload.php';

       $data = array();

      $RECIPIENT = '+18882248399';

      $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

      $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

      $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';



      $RINGCENTRAL_USERNAME = '+18882248399';

      $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

      $RINGCENTRAL_EXTENSION = '101';



      $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);



      $platform = $rcsdk->platform();



      $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);
       date_default_timezone_set('America/New_York');

      
       $last_seven_days = date('Y-m-d', strtotime('-6 days'));
       // echo $last_seven_days;
       // exit();
 // date_default_timezone_set('America/New_York');
 //         $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d').'&view=Detailed');
 //         $resp_prev = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime('-1 days')).'&dateTo='.date('Y-m-d').'&view=Detailed');

      $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$last_seven_days.'&dateTo='.date('Y-m-d'),

             array(

          //   'from' => array('phoneNumber' => $RINGCENTRAL_USERNAME),

          //   'to' => array('phoneNumber' => $RECIPIENT),
           // 'extensionNumber' => array('105')
          ));



      //$resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d'));
        if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          //Call Logs
          $records['all_users']= $this->User_Model->select_user_agent_manager();

          //Attendance Masterlist
          $records['all_users']= $this->User_Model->select_user_all();
          $records['all_IT']= $this->User_Model->all_attendance_user();
          // $records['all_agents_and_managers']= $this->User_Model->select_user_agent_and_manager();
          $records['all_agents_and_managers']= $this->User_Model->select_user_agent();
          $records['all_agents_and_managers_call_logs']= $this->User_Model->select_user_agent_manager();
          $records['attendance_users']= $this->Attendance_Model->view_attendance_admin();
          $records['attendance_users_IT']= $this->Attendance_Model->view_attendance_all();
          $records['idle_users']= $this->Idle_Model->view_idle_user_admin();
          
          //Sales
          $records['sales_lead']= $this->Payment_Model->sales_lead();
          $records['user_agents']= $this->Payment_Model->sales_lead();

          $this->load->view('template/header_admin', $records);
          $this->load->view('template/sidebar_admin', $records);
          $this->load->view('report_metric', $records);  
          $this->load->view('template/footer_admin_metric', $records);

        }
         if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          //Call Logs
          $records['all_users']= $this->User_Model->select_user_agent_manager();

          //Attendance Masterlist
          $records['all_users']= $this->User_Model->select_user_all();
          $records['all_IT']= $this->User_Model->all_attendance_user();
          // $records['all_agents_and_managers']= $this->User_Model->select_user_agent_and_manager();
          $records['all_agents_and_managers']= $this->User_Model->select_user_agent();
          $records['all_agents_and_managers_call_logs']= $this->User_Model->select_user_agent_manager();
          $records['attendance_users']= $this->Attendance_Model->view_attendance_admin();
          $records['attendance_users_IT']= $this->Attendance_Model->view_attendance_all();
          $records['idle_users']= $this->Idle_Model->view_idle_user_admin();
          
          //Sales
          $records['sales_lead']= $this->Payment_Model->sales_lead();
          $records['user_agents']= $this->Payment_Model->sales_lead();

          $this->load->view('template/header_manager', $records);
          $this->load->view('template/sidebar_manager', $records);
          $this->load->view('report_metric', $records);
          $this->load->view('template/footer_admin_metric', $records);

        }
      
      }


       public function call_log_history_test(){

       date_default_timezone_set('America/New_York');
       // echo  date("Y-m-d h:i:s");
       // exit();

       // $start = $month = date('2020-01-01');
       // $end = date('Y-m-d');

      require APPPATH.'vendor/autoload.php';

       $data = array();

      $RECIPIENT = '+18882248399';

      $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

      $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

      $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';



      $RINGCENTRAL_USERNAME = '+18882248399';

      $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

      $RINGCENTRAL_EXTENSION = '101';



      $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);



      $platform = $rcsdk->platform();



      $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);



       $last_seven_days = date('Y-m-d', strtotime('-5 days'));

       $get_all_data= array();


      // $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$last_seven_days.'&dateTo='.date('Y-m-d', strtotime('+5 days')));

       // $month = strtotime('2020-01-01');
       // $end = strtotime('today');
       //              $timePerApiCall = 1.2;
       //  while($month < $end)
       //  {
       //       $first_day_month =  date('Y-m-01', $month);
       //       $ten_days_month =  date('Y-m-10', $month);
       //       $eleven_days_month =  date('Y-m-11', $month);
       //       $twenty_days_month =  date('Y-m-20', $month);
       //       $twentyone_days_month =  date('Y-m-21', $month);
       //       $last_day_month = date('Y-m-t', $month);

     
       //        sleep(10);
       //        $get_tendays_month = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.$first_day_month.'&dateTo='.$ten_days_month);
       //        $get_twentydays_month = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.$eleven_days_month.'&dateTo='.$twenty_days_month);
       //        $get_thirtydays_month = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.$twentyone_days_month.'&dateTo='.$last_day_month);

       //        $get_all_data[] = array_merge((array) $get_tendays_month->json()->records, (array) $get_twentydays_month->json()->records, (array) $get_thirtydays_month->json()->records);


       //    $month = strtotime("+1 month", $month);
     
              $get_tendays_jan = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-01-01').'&dateTo='.date('Y-01-10'));
              $get_twentydays_jan = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-01-11').'&dateTo='.date('Y-01-20'));
              $get_thi0rtydays_jan = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-01-21').'&dateTo='.date('Y-m-t'), strtotime('Y-01-01'));

              $get_tendays_feb = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-02-01').'&dateTo='.date('Y-02-10'));
              $get_twentydays_feb = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-02-11').'&dateTo='.date('Y-02-20'));
              $get_thirtydays_feb = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-02-21').'&dateTo='.date('Y-m-t'), strtotime('Y-02-01'));

              $get_tendays_march = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-03-01').'&dateTo='.date('Y-03-10'));
              $get_twentydays_march = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-03-11').'&dateTo='.date('Y-03-20'));
              $get_thirtydays_march = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-03-21').'&dateTo='.date('Y-m-t'), strtotime('Y-03-01'));


              $get_tendays_april = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-04-01').'&dateTo='.date('Y-04-10'));
              $get_twentydays_april = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-04-11').'&dateTo='.date('Y-04-20'));
              $get_thirtydays_april = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-04-21').'&dateTo='.date('Y-m-t'), strtotime('Y-04-01'));
              sleep(20);
              $get_tendays_may = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-05-01').'&dateTo='.date('Y-05-10'));
              $get_twentydays_may = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-05-11').'&dateTo='.date('Y-05-20'));
              $get_thirtydays_may = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-05-21').'&dateTo='.date('Y-m-t'), strtotime('Y-05-01'));

              $get_tendays_jun = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-06-01').'&dateTo='.date('Y-06-10'));
              $get_twentydays_jun = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-06-11').'&dateTo='.date('Y-06-20'));
              $get_thirtydays_jun = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-06-21').'&dateTo='.date('Y-m-t'), strtotime('Y-06-01'));

              $get_tendays_july = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-07-01').'&dateTo='.date('Y-07-10'));
              $get_twentydays_july = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-07-11').'&dateTo='.date('Y-07-20'));
              $get_thirtydays_july = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-07-21').'&dateTo='.date('Y-m-t'), strtotime('Y-07-01'));

              $get_tendays_aug = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-08-01').'&dateTo='.date('Y-08-10'));
              $get_twentydays_aug = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-08-11').'&dateTo='.date('Y-08-20'));
              $get_thirtydays_aug = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-08-21').'&dateTo='.date('Y-m-t'), strtotime('Y-08-01'));

              $get_tendays_sept = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-09-01').'&dateTo='.date('Y-09-10'));
              $get_twentydays_sept = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-09-11').'&dateTo='.date('Y-09-20'));
              $get_thirtydays_sept = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-09-21').'&dateTo='.date('Y-m-t'), strtotime('Y-09-01'));

              $get_tendays_oct = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-10-01').'&dateTo='.date('Y-10-10'));
              $get_twentydays_oct = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-10-11').'&dateTo='.date('Y-10-20'));
              $get_thirtydays_oct = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-10-21').'&dateTo='.date('Y-m-t'), strtotime('Y-10-01'));

              $get_tendays_nov = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-11-01').'&dateTo='.date('Y-11-10'));
              $get_twentydays_nov = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-11-11').'&dateTo='.date('Y-11-20'));
              $get_thirtydays_nov = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-11-21').'&dateTo='.date('Y-m-t'), strtotime('Y-11-01'));

              $get_tendays_dec = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-12-01').'&dateTo='.date('Y-12-10'));
              $get_twentydays_dec = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-12-11').'&dateTo='.date('Y-12-20'));
              $get_thirtydays_dec = $platform->get('/account/~/call-log?page=1&perPage=1000&dateFrom='.date('Y-12-21').'&dateTo='.date('Y-m-t'), strtotime('Y-12-01'));




              $get_all_data = array_merge(
                (array) $get_tendays_jan->json()->records, (array) $get_twentydays_jan->json()->records, (array) $get_thirtydays_jan->json()->records, (array) $get_thirtydays_jan->json()->records, 
                (array) $get_thirtydays_feb->json()->records,(array) $get_thirtydays_feb->json()->records,(array) $get_thirtydays_feb->json()->records,
                (array) $get_thirtydays_march->json()->records,(array) $get_thirtydays_march->json()->records,(array) $get_thirtydays_march->json()->records,
                (array) $get_thirtydays_april->json()->records,(array) $get_thirtydays_april->json()->records,(array) $get_thirtydays_april->json()->records,
                (array) $get_thirtydays_may->json()->records,(array) $get_thirtydays_may->json()->records,(array) $get_thirtydays_may->json()->records,
                (array) $get_thirtydays_june->json()->records,(array) $get_thirtydays_june->json()->records,(array) $get_thirtydays_june->json()->records,
                (array) $get_thirtydays_july->json()->records,(array) $get_thirtydays_july->json()->records,(array) $get_thirtydays_july->json()->records,
                (array) $get_thirtydays_aug->json()->records,(array) $get_thirtydays_aug->json()->records,(array) $get_thirtydays_aug->json()->records,
                (array) $get_thirtydays_sept->json()->records,(array) $get_thirtydays_sept->json()->records,(array) $get_thirtydays_sept->json()->records,
                (array) $get_thirtydays_oct->json()->records,(array) $get_thirtydays_oct->json()->records,(array) $get_thirtydays_oct->json()->records,
                (array) $get_thirtydays_nov->json()->records,(array) $get_thirtydays_nov->json()->records,(array) $get_thirtydays_nov->json()->records,
                (array) $get_thirtydays_dec->json()->records,(array) $get_thirtydays_dec->json()->records,(array) $get_thirtydays_dec->json()->records);

        //    $headers= $get_all_data->response()->getHeaders();
        //    $limit = strval($headers['X-Rate-Limit-Limit'][0]);
        //    $remaining = strval($headers['X-Rate-Limit-Remaining'][0]);
        //    $window = strval($headers['X-Rate-Limit-Window'][0]);

        // echo count($get_all_data);

      exit();
       if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_history', $records);  

      }



      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){
               date_default_timezone_set('America/New_York');

          $records['all_users']= $this->User_Model->select_user_agent_manager();

          $records['call_log_histories'] = $resp->json()->records;

          $this->load->view('call_logs_history', $records);  

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_production', $records);  

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

          $records['call_log_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_author_history', $records);  

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){
         date_default_timezone_set('America/New_York');
         $records['all_users']= $this->User_Model->select_user_agent_manager();
         $records['call_log_histories'] = $resp->json()->records;


          $this->load->view('call_logs_history_manager', $records);  

      }



      else if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history($this->session->userdata['userlogin']['user_id']);

          $this->load->view('call_logs_history', $records);  

      }

     }




    function unique_multi_array($array, $key) { 

        $temp_array = array(); 

        $i = 0; 

        $key_array = array(); 

        

        foreach($array as $val) { 

            if (!in_array($val[$key], $key_array)) { 

                $key_array[$i] = $val[$key]; 

                $temp_array[$i] = $val; 

            } 

            $i++; 

        } 

        return $temp_array; 

      }

      public function get_recycle_lead(){
              $recycle_leads = $this->Lead_Model->select_all_remark_date();
              if($recycle_leads > 0){
                foreach ($recycle_leads as $recycle_lead){
                           $this->Lead_Model->update_lead(array('user_id'=> 0, 'check_lead' => 0, 'status' => 'Recycled', 'remark' => 'No activities Log in One Month', 'last_assign_user'=> $recycle_lead['from_user']), $recycle_lead['project_id']);
         
                    }
                          echo json_encode(array("response" =>   "success", "message" => "Successfully Recycled Lead", "redirect" => base_url('dashboard')));
                }

             else{
                      echo json_encode(array("response" =>   "error", "message" => "No Exist Recycled Lead", "redirect" => base_url('dashboard')));
  
               }
    
      }

     public function index($id=''){
       
             $get_extension_number = 0;

        $id = $this->uri->segment(3);
        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $user_charge2 = $this->session->userdata['userlogin']['sub_name'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['get_id'] = $id;  
      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

         $get_point_absents = 0;
         $lacking_hour_points = 0.0;
         $get_excess_lunch= 0;
         $get_excess_break= 0; 
         $get_total_of_excess = 0;
         $get_total_of_work = 0;
         $data = array();

          require APPPATH.'vendor/autoload.php';

          $RECIPIENT = '+18882248399';

          $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

          $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

          $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';

          $RINGCENTRAL_USERNAME = '+18882248399';

          $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

          $RINGCENTRAL_EXTENSION = '101';



          $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);

          $platform = $rcsdk->platform();
          // date_default_timezone_set('America/New_York');

          $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);

         $last_seven_days = date('Y-m-d', strtotime('-7 days'));
         // echo date('Y-m-d');dd
         // $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d'));
         // $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d\TH:i:s\Z'));

          $datetime = new DateTime();
          $datetime->setTimeZone(new DateTimeZone('Zulu'));
          $date_to = $datetime->format('Y-m-d\TH:i:s.u\Z');
          $date_from = $datetime->modify('-1 day')->format('Y-m-d\TH:i:s.u\Z');
          $date_from_prev = $datetime->modify('-1 day')->format('Y-m-d\TH:i:s.u\Z');

         date_default_timezone_set('America/New_York');
         $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d').'&view=Detailed');
         $resp_prev = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime('-1 days')).'&dateTo='.date('Y-m-d').'&view=Detailed');

           // $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$date_to.'&view=Detailed');
           // $resp_prev = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateto='.$date_from.'&view=Detailed');

         // $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d').'&dateTo='.date('Y-m-d'),

         //     array(

         //  //   'from' => array('phoneNumber' => $RINGCENTRAL_USERNAME),

          //  //   'to' => array('phoneNumber' => $RECIPIENT),
         //   // 'extensionNumber' => array('105')
         //  ));

           

          $count_call_log = 0;
          $count_call_log_prev = 0;
          $agent_name = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
          $agent_name2 = $this->session->userdata['userlogin']['sub_name'];
          $current_date  = date('Y-m-06');
          $adv_date  = date('Y-m-07', strtotime("+ 1 month"));
          $prev_date  = date('Y-m-06', strtotime("- 1 month"));
         

         $get_overall_quota = $this->Payment_Model->sales_lead_qouta_over_all($this->session->userdata['userlogin']['user_id'], date('Y'));
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
    

          foreach ($resp->json()->records as $record ) {

              if (!empty($record->from->name)) {         

                $prevdate = date('Y-m-d', strtotime($record->startTime));

                  if($record->from->name == $user_charge2){

                        $get_extension_number = $this->session->userdata['userlogin']['extension_number'];

                           if($record->result == 'Call connected' || $record->result == 'Voicemail' || $record->result == 'Accepted'){
                            $count_call_log += count((array)$record->from->name);  
                   
                       }

                    }   

                }

              }
        



                     
          foreach ($resp_prev->json()->records as $recordt) {

              if (!empty($recordt->from->name)) {         

                $prevdate = date('Y-m-d', strtotime($recordt->startTime));
                  if($recordt->from->name == $user_charge2){

                        $get_extension_number = $this->session->userdata['userlogin']['extension_number'];

                           if($recordt->result == 'Call connected' || $recordt->result == 'Voicemail' || $recordt->result == 'Accepted'){
                            $count_call_log_prev += count((array)$recordt->from->name);  
                          }
                       }
    
                }
            }


          $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
          
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
          date_default_timezone_set('America/New_York');
          $records['attendance_user']= $this->Attendance_Model->view_single_attendance1($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));


          $this->load->view('dashboard', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

        $records['notifications']  = $this->Notification_Model->view_notification_user1($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

          $this->load->view('template/header_finance', $records);
          $this->load->view('template/sidebar_finance', $records);
          $this->load->view('dashboard-finance', $records);
          $this->load->view('template/footer_finance', $records);


      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

        // if ($this->uri->segment(3) && $this->uri->segment(3)!="") {
        //           $page_no = $this->uri->segment(3);
        //     } else {
        //         $page_no = 1;
        //      }


        //         $records['page_no'] = $page_no; 
        //         $total_records_per_page = 100;
        //         $offset = ($page_no-1) * $total_records_per_page;
        //         $records['previous_page'] = $page_no - 1;
        //         $records['next_page'] = $page_no + 1;
        //         $records['adjacents'] = "2"; 

        //         $total_records = $this->Lead_Model->select_total_lead();
        //         $records['total_records'] = $this->Lead_Model->select_total_lead();
        //         $total_no_of_pages= ceil($total_records / $total_records_per_page);
        //         $records['total_no_of_pages'] = ceil($total_records / $total_records_per_page);
        //         $records['second_last'] = $total_no_of_pages - 1; // total page minus 1
        //         $records['leads']  = $this->Lead_Model->select_merge_data($offset, $total_records_per_page);

             //      $this->load->view('template/header_production', $records);
             // $this->load->view('template/sidebar_production', $records);
             // $this->load->view('dashboard-production', $records);
             // $this->load->view('template/footer_production', $records);

              $records['author_reports']= $this->Lead_Model->report_lead();

              $records['author_names']= $this->Lead_Model->select_author_name_exist();
              $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
              $records['publishers']= $this->User_Model->select_user_publisher();
              $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

              $this->load->view('template/header_production', $records);
              $this->load->view('template/sidebar_production', $records);
              $this->load->view('report', $records);
              $this->load->view('template/footer_production', $records);  

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){
             $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

          // $data = $this->Lead_Model->select_lead_admin_data();

          //   $records['leads']= $data;

            if ($this->uri->segment(3) && $this->uri->segment(3)!="") {
                  $page_no = $this->uri->segment(3);
            } else {
                $page_no = 1;
             }

               date_default_timezone_set('America/New_York');
          // echo date('Y-m-d');

          require APPPATH.'vendor/autoload.php';

          $RECIPIENT = '+18882248399';

          $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

          $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

          $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';

          $RINGCENTRAL_USERNAME = '+18882248399';

          $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

          $RINGCENTRAL_EXTENSION = '101';



          $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);

          $platform = $rcsdk->platform();

          $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);

         $last_seven_days = date('Y-m-d', strtotime('-7 days'));

         $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateTo'.date('Y-m-d'));
         $resp_prev = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateTo='.date('Y-m-d', strtotime('- 1 days')));

          date_default_timezone_set('America/New_York');

          $count_call_log = 0;
          $count_call_log_prev = 0;
          $agent_name = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
          $agent_name2 = $this->session->userdata['userlogin']['sub_name'];
          $current_date  = date('Y-m-06');
          $adv_date  = date('Y-m-07', strtotime("+ 1 month"));
          $prev_date  = date('Y-m-06', strtotime("- 1 month"));

         $get_overall_quota = $this->Payment_Model->sales_lead_qouta_over_all(0, date('Y'));
          // $key = array_search('OUFYz3SG0MTXzUA', array_column(json_decode($count_call_log), 'id'));
          foreach ($resp->json()->records as $record) {

            if (!empty($record->from->name)) {
                if($record->from->name == $agent_name2){
                     $count_call_log += count((array)$record->from->name);
                 }


              }
          }

          
            foreach ($resp_prev->json()->records as $recordt) {

            if (!empty($recordt->from->name)) {
                $prevdate = date('Y-m-d', strtotime($recordt->startTime));
                if($recordt->from->name == $agent_name &&  $prevdate == date('Y-m-d', strtotime('- 1 days'))){
                     $count_call_log_prev += count((array)$recordt->from->name);
                     //echo $recordt->from->name."</br>"; 
                 }
              }
          }

          $records['attendance_user']= $this->Attendance_Model->view_single_attendance(0, date('Y-m-d H:i:s'));
          $records['all_agents']= $this->User_Model->select_user_agent();
          $records['current_call_logs'] =  0;
          $records['prev_call_logs'] =  0;
          $records['current_pipes'] =  $this->Lead_Model->select_count_pipes_agent(0, date('Y-m-d'));
          $records['prev_pipes'] =  $this->Lead_Model->select_count_pipes_agent(0, date('Y-m-d', strtotime('-1 day')));
          $records['current_quota'] =  $this->Payment_Model->sales_lead_qouta_date(0, $current_date, $adv_date);
          $records['prev_quota'] =  $this->Payment_Model->sales_lead_qouta_date(0, $prev_date, $current_date);
          $records['over_all_quota'] = $get_overall_quota;
          $records['mysales'] = $this->Payment_Model->select_monthly_sales();
          $records['submissions'] = $this->Payment_Model->select_monthly_submission();
          $records['user_agents']= $this->Payment_Model->sales_lead();


                $records['page_no'] = $page_no; 
                $total_records_per_page = 100;
                $offset = ($page_no-1) * $total_records_per_page;
                $records['previous_page'] = $page_no - 1;
                $records['next_page'] = $page_no + 1;
                $records['adjacents'] = "2"; 

                $total_records = $this->Lead_Model->select_total_lead();
                $records['total_records'] = $this->Lead_Model->select_total_lead();
                $total_no_of_pages= ceil($total_records / $total_records_per_page);
                $records['total_no_of_pages'] = ceil($total_records / $total_records_per_page);
                $records['second_last'] = $total_no_of_pages - 1; // total page minus 1
                $records['leads']  = $this->Lead_Model->select_lead_admin_data($total_records_per_page, $offset);
                $records['users']  = $this->User_Model->view_alluser();
                $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
                $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);


                $this->load->view('template/header_admin', $records);
                $this->load->view('template/sidebar_admin', $records);
                $this->load->view('dashboard_admin', $records);   
                $this->load->view('template/footer_admin', $records); 
               // echo json_encode($data); 

         }

      else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){


          $this->load->view('dashboard-author');     

         } 

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          // $records['leads']= $this->Lead_Model->select_lead_manager($this->session->userdata['userlogin']['user_id']);
          $records['leads']= $this->Lead_Model->select_lead_manager_all_lead();

   date_default_timezone_set('America/New_York');
          // echo date('Y-m-d');

          require APPPATH.'vendor/autoload.php';

          $RECIPIENT = '+18882248399';

          $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

          $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

          $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';

          $RINGCENTRAL_USERNAME = '+18882248399';

          $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

          $RINGCENTRAL_EXTENSION = '101';



          $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);

          $platform = $rcsdk->platform();

          $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);

         $last_seven_days = date('Y-m-d', strtotime('-7 days'));

         $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateTo'.date('Y-m-d'));
         $resp_prev = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateTo='.date('Y-m-d', strtotime('- 1 days')));

          date_default_timezone_set('America/New_York');

          $count_call_log = 0;
          $count_call_log_prev = 0;
          $agent_name = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
          $agent_name2 = $this->session->userdata['userlogin']['sub_name'];
          $current_date  = date('Y-m-06');
          $adv_date  = date('Y-m-07', strtotime("+ 1 month"));
          $prev_date  = date('Y-m-06', strtotime("- 1 month"));

         $get_overall_quota = $this->Payment_Model->sales_lead_qouta_over_all(0, date('Y'));
          // $key = array_search('OUFYz3SG0MTXzUA', array_column(json_decode($count_call_log), 'id'));
          foreach ($resp->json()->records as $record) {

            if (!empty($record->from->name)) {
                if($record->from->name == $agent_name2){
                     $count_call_log += count((array)$record->from->name);
                 }


              }
          }

          
            foreach ($resp_prev->json()->records as $recordt) {

            if (!empty($recordt->from->name)) {
                $prevdate = date('Y-m-d', strtotime($recordt->startTime));
                if($recordt->from->name == $agent_name &&  $prevdate == date('Y-m-d', strtotime('- 1 days'))){
                     $count_call_log_prev += count((array)$recordt->from->name);
                     //echo $recordt->from->name."</br>"; 
                 }
              }
          }

          $records['attendance_user']= $this->Attendance_Model->view_single_attendance(0, date('Y-m-d H:i:s'));
          $records['all_agents']= $this->User_Model->select_user_agent();
          $records['current_call_logs'] =  0;
          $records['prev_call_logs'] =  0;
          $records['current_pipes'] =  $this->Lead_Model->select_count_pipes_agent("", date('Y-m-d'));
          $records['prev_pipes'] =  $this->Lead_Model->select_count_pipes_agent("", date('Y-m-d', strtotime('-1 day')));
          $records['current_quota'] =  $this->Payment_Model->sales_lead_qouta_date("", $current_date, $adv_date);
          $records['prev_quota'] =  $this->Payment_Model->sales_lead_qouta_date("", $prev_date, $current_date);
          $records['over_all_quota'] = $get_overall_quota;
          $records['mysales'] = $this->Payment_Model->select_monthly_sales();
          $records['agent_sales'] = $this->Payment_Model->select_monthly_sales_agent(date('m'), date('Y'), $this->session->userdata['userlogin']['user_id']);
          $records['submissions'] = $this->Payment_Model->select_monthly_submission();
          $records['agent_submissions'] = $this->Payment_Model->select_monthly_submission_agent(date('m'), date('Y'), $this->session->userdata['userlogin']['user_id']);
          $records['user_agents']= $this->Payment_Model->select_agent_assign($this->session->userdata['userlogin']['user_id']);
          $records['number_assign_agents']= $this->Payment_Model->select_number_agent_assign($this->session->userdata['userlogin']['user_id']);


          $this->load->view('template/header_manager', $records);
          $this->load->view('template/sidebar_manager', $records);
          $this->load->view('dashboard_manager', $records);
          $this->load->view('template/footer_manager', $records);
          // $this->load->view('template/sidebar_manager', $records);

    
            



         }


          else if ($this->session->userdata['userlogin']['usertype'] == "Human Resources"){
                  $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

        $records['notifications']  = $this->Notification_Model->view_notification_user1($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

          $records['leads']= $this->Lead_Model->select_lead_manager($this->session->userdata['userlogin']['user_id']);

            date_default_timezone_set('America/New_York');
          // echo date('Y-m-d');

          require APPPATH.'vendor/autoload.php';

          $RECIPIENT = '+18882248399';

          $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

          $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

          $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';

          $RINGCENTRAL_USERNAME = '+18882248399';

          $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

          $RINGCENTRAL_EXTENSION = '101';



          $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);

          $platform = $rcsdk->platform();

          $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);

         $last_seven_days = date('Y-m-d', strtotime('-7 days'));

         $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateTo'.date('Y-m-d'));
         $resp_prev = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateTo='.date('Y-m-d', strtotime('- 1 days')));

          date_default_timezone_set('America/New_York');

          $count_call_log = 0;
          $count_call_log_prev = 0;
          $agent_name = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
          $agent_name2 = $this->session->userdata['userlogin']['sub_name'];
          $current_date  = date('Y-m-06');
          $adv_date  = date('Y-m-07', strtotime("+ 1 month"));
          $prev_date  = date('Y-m-06', strtotime("- 1 month"));

         $get_overall_quota = $this->Payment_Model->sales_lead_qouta_over_all(0, date('Y'));
          // $key = array_search('OUFYz3SG0MTXzUA', array_column(json_decode($count_call_log), 'id'));
          foreach ($resp->json()->records as $record) {

            if (!empty($record->from->name)) {
                if($record->from->name == $agent_name2){
                     $count_call_log += count($record->from->name);
                 }


              }
          }

          
            foreach ($resp_prev->json()->records as $recordt) {

            if (!empty($recordt->from->name)) {
                $prevdate = date('Y-m-d', strtotime($recordt->startTime));
                if($recordt->from->name == $agent_name &&  $prevdate == date('Y-m-d', strtotime('- 1 days'))){
                     $count_call_log_prev += count($recordt->from->name);
                     //echo $recordt->from->name."</br>"; 
                 }
              }
          }

          $records['attendance_user']= $this->Attendance_Model->view_single_attendance(0, date('Y-m-d H:i:s'));
          $records['all_agents']= $this->User_Model->select_user_agent();
          $records['current_call_logs'] =  0;
          $records['prev_call_logs'] =  0;
          $records['current_pipes'] =  $this->Lead_Model->select_count_pipes_agent(0, date('Y-m-d'));
          $records['prev_pipes'] =  $this->Lead_Model->select_count_pipes_agent(0, date('Y-m-d', strtotime('-1 day')));
          $records['current_quota'] =  $this->Payment_Model->sales_lead_qouta_date(0, $current_date, $adv_date);
          $records['prev_quota'] =  $this->Payment_Model->sales_lead_qouta_date(0, $prev_date, $current_date);
          $records['over_all_quota'] = $get_overall_quota;
          $records['mysales'] = $this->Payment_Model->select_monthly_sales();
          $records['submissions'] = $this->Payment_Model->select_monthly_submission();



          $this->load->view('dashboard-hr', $records);

         }

         
      else if ($this->session->userdata['userlogin']['usertype'] == "Cover Designer"){
           $this->Lead_Model->update_date_received_designer($this->session->userdata['userlogin']['user_id']);

           $records['author_reports']= $this->Lead_Model->report_cover_designer_user_id($this->session->userdata['userlogin']['user_id']);

           $records['author_names']= $this->Lead_Model->select_author_name();

           $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

           $this->load->view('dashboard-coverdesigner', $records);    

         }
       else if ($this->session->userdata['userlogin']['usertype'] == "Interior Designer"){
        
          $this->Lead_Model->update_date_received_designer($this->session->userdata['userlogin']['user_id']);

           $records['author_reports']= $this->Lead_Model->report_interior_designer_user_id($this->session->userdata['userlogin']['user_id']);

          $records['author_names']= $this->Lead_Model->select_author_name();

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

          $this->load->view('dashboard-interiordesigner', $records);    

         }

      else if ($this->session->userdata['userlogin']['usertype'] == "Publishing/Marketing"){

           // $this->Lead_Model->update_date_received_designer_usertype();

           // $records['author_reports']= $this->Lead_Model->report_publisher_user_id($this->session->userdata['userlogin']['user_id']);

           // $records['author_names']= $this->Lead_Model->select_author_name_user_id($this->session->userdata['userlogin']['user_id']);

        $records['author_reports']= $this->Lead_Model->report_lead_publisher_user_id($this->session->userdata['userlogin']['user_id']);
          $records['author_names']= $this->Lead_Model->select_author_name();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['publishers']= $this->Lead_Model->select_author_name_user_id($this->session->userdata['userlogin']['user_id']);

          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

           $this->load->view('template/header_publisher', $records);
           $this->load->view('template/sidebar_publisher', $records);
           $this->load->view('project-publishing', $records);
           $this->load->view('template/footer_publisher', $records);


         }

     else if ($this->session->userdata['userlogin']['usertype'] == "IT"){
             $records['attendance_users']= $this->Attendance_Model->view_attendance_employee_IT($this->session->userdata['userlogin']['user_id'], date('Y-m-d H:i:s'));
             $records['idle_users']= $this->Idle_Model->select_user_idle($this->session->userdata['userlogin']['user_id']);
             $this->load->view('template/header_it', $records);
             $this->load->view('template/sidebar_it', $records);
             $this->load->view('attendance_IT', $records);
             $this->load->view('template/footer_it', $records); 

         } 

    }


function searchForId($name, $array) {
   foreach ($array as $key => $val) {
       if ($val['name'] === $name) {
           return $key;
       }
   }
   return null;
}

// // foreach ($resp->json()->records as $record) {

      // //   if (!empty($record->from->name)) {

      // //       echo "<pre>";

      // //        print_r ($record->from->name);

      // //      echo "</pre>";



      // //     }

   public function performance_task(){

          date_default_timezone_set('America/New_York');
          // echo date('Y-m-d');

          require APPPATH.'vendor/autoload.php';

          $RECIPIENT = '+18882248399';

          $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

          $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

          $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';

          $RINGCENTRAL_USERNAME = '+18882248399';

          $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

          $RINGCENTRAL_EXTENSION = '101';



          $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);

          $platform = $rcsdk->platform();

          $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);

         $last_seven_days = date('Y-m-d', strtotime('-7 days'));

         $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d'));
         $resp_prev = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime('- 1 days')));



          date_default_timezone_set('America/New_York');
          $count_call_log = 0;
          $count_call_log_prev = 0;
          $agent_name = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
          $agent_name2 = $this->session->userdata['userlogin']['sub_name'];
          $current_date  = date('Y-m-06');
          $adv_date  = date('Y-m-07', strtotime("+ 1 month"));
          $prev_date  = date('Y-m-06', strtotime("- 1 month"));

         $get_overall_quota = $this->Payment_Model->sales_lead_qouta_over_all($this->session->userdata['userlogin']['user_id'], date('Y'));
          // $key = array_search('OUFYz3SG0MTXzUA', array_column(json_decode($count_call_log), 'id'));
          foreach ($resp->json()->records as $record) {

            if (!empty($record->from->name)) {
                if($record->from->name == $agent_name2){
                     $count_call_log += count($record->from->name);
                 }


              }
          }

           foreach ($resp_prev->json()->records as $recordt) {

            if (!empty($recordt->from->name)) {
                $prevdate = date('Y-m-d', strtotime($recordt->startTime));
                if($recordt->from->name == $agent_name &&  $prevdate == date('Y-m-d', strtotime('- 1 days'))){
                     $count_call_log_prev += count($recordt->from->name);
                     //echo $recordt->from->name."</br>"; 
                 }
              }
          }

              //  echo $recordt->from->name.", ";
          //     echo $count_call_log_prev.",".$count_call_log; exit();  
                     

          
       // echo  "<pre>";
       // print_r($get_overall_quota);
       // echo  "</pre>";
       // exit();

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
          // print_r(explode(",",$get_overall_quota));
          // exit();
          $records['attendance_user']= $this->Attendance_Model->view_single_attendance($this->session->userdata['userlogin']['user_id'], date('Y-m-d H:i:s'));
          $records['leads']= $this->Lead_Model->view_leads_agent($this->session->userdata['userlogin']['user_id']);
          $records['current_call_logs'] =  $count_call_log;
          $records['prev_call_logs'] =  $count_call_log_prev;
          $records['current_pipes'] =  $this->Lead_Model->select_count_pipes_agent($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));
          $records['prev_pipes'] =  $this->Lead_Model->select_count_pipes_agent($this->session->userdata['userlogin']['user_id'], date('Y-m-d', strtotime('-1 day')));
          $records['current_quota'] =  $this->Payment_Model->sales_lead_qouta_date($this->session->userdata['userlogin']['user_id'], $current_date, $adv_date);
          $records['prev_quota'] =  $this->Payment_Model->sales_lead_qouta_date($this->session->userdata['userlogin']['user_id'], $prev_date, $current_date);
          $records['over_all_quota'] = $get_overall_quota;

          // $test =  $this->Payment_Model->sales_lead_qouta_date($this->session->userdata['userlogin']['user_id'], $current_date, $adv_date);
          // echo "<pre>";
          // print_r($test);
          // echo "</pre>";
 

    
          $this->load->view('performance_tracker', $records);
            

      }
    }

 public function select_performance_task(){

          // echo date('Y-m-d');
          // exit();

          require APPPATH.'vendor/autoload.php';

          $RECIPIENT = '+18882248399';

          $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

          $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

          $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';

          $RINGCENTRAL_USERNAME = '+18882248399';

          $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

          $RINGCENTRAL_EXTENSION = '101';



          $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);

          $platform = $rcsdk->platform();

          $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);

         $last_seven_days = date('Y-m-d', strtotime('-7 days'));
          date_default_timezone_set('America/New_York');

          $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d').'&view=Detailed');
         $resp_prev = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime('-1 days')).'&dateTo='.date('Y-m-d').'&view=Detailed');

          $count_call_log = 0;
          $count_call_log_prev = 0;
          $users =    $this->User_Model->select_performance_user_id($this->input->post('user_id'));
          $agent_name = $users['firstname'] .' '. $users['lastname'];
          $current_date  = date('Y-m-06');
          $adv_date  = date('Y-m-07', strtotime("+ 1 month"));
          $prev_date  = date('Y-m-06', strtotime("- 1 month"));

         $get_overall_quota = $this->Payment_Model->sales_lead_qouta_over_all($this->input->post('user_id'), date('Y'));
          // $key = array_search('OUFYz3SG0MTXzUA', array_column(json_decode($count_call_log), 'id'));fdf
          // foreach ($resp->json()->records as $record) {

          //   if (!empty($record->from->name)) {
          //       if($record->from->name == $agent_name2){
          //            $count_call_log += count((array)$record->from->name);
          //        }


          //     }
          // }


         foreach ($resp->json()->records as $record ) {

              if (!empty($record->from->name)) {         

                $prevdate = date('Y-m-d', strtotime($record->startTime));

                  if($record->from->name == $agent_name2){

                        $get_extension_number = $this->session->userdata['userlogin']['extension_number'];

                           if($record->result == 'Call connected' || $record->result == 'Voicemail' || $record->result == 'Accepted' || $record->result == 'No Answer'){
                            $count_call_log += count((array)$record->from->name);  
                   
                       }

                    }   

                }

           }
        
          foreach ($resp_prev->json()->records as $recordt) {

              if (!empty($recordt->from->name)) {         

                $prevdate = date('Y-m-d', strtotime($recordt->startTime));
                  if($recordt->from->name == $agent_name){

                        $get_extension_number = $this->session->userdata['userlogin']['extension_number'];

                           if($recordt->result == 'Call connected' || $recordt->result == 'Voicemail' || $recordt->result == 'Accepted' || $recordt->result == 'No Answer'){
                            $count_call_log_prev += count((array)$recordt->from->name);  
                          }
                       }
    
                }
            }

          
       // echo  "<pre>";
       // print_r($get_overall_quota);
       // echo  "</pre>";
       // exit();

          // print_r(explode(",",$get_overall_quota));
          // exit();
          $attendance_user = $this->Attendance_Model->view_single_attendance($this->input->post('user_id'), date('Y-m-d H:i:s'));
          $leads = $this->Lead_Model->view_leads_agent($this->input->post('user_id'));
          $current_call_logs  =  $count_call_log;
          $prev_call_logs  =  $count_call_log_prev;
          $current_pipes  =  $this->Lead_Model->select_count_pipes_agent($this->input->post('user_id'), date('Y-m-d'));
          $prev_pipes  =  $this->Lead_Model->select_count_pipes_agent($this->input->post('user_id'), date('Y-m-d', strtotime('-1 day')));
          $current_quota  =  $this->Payment_Model->sales_lead_qouta_date($this->input->post('user_id'), $current_date, $adv_date);
          $prev_quota  =  $this->Payment_Model->sales_lead_qouta_date($this->input->post('user_id'), $prev_date, $current_date);
          $over_all_quota  = $get_overall_quota;

          // $test =  $this->Payment_Model->sales_lead_qouta_date($this->session->userdata['userlogin']['user_id'], $current_date, $adv_date);
          // echo "<pre>";
          // print_r($test);
          // echo "</pre>";


    
           echo json_encode(array("time_in" => $attendance_user['time_in'], "time_out" => $attendance_user['time_out'], "excess_break" => $attendance_user['excess_break'], "excess_lunch" => $attendance_user['excess_lunch'],  "leads" => $leads, "current_call_logs" => $current_call_logs, "prev_call_logs" => $prev_call_logs , "current_pipes" => $current_pipes,  "prev_pipes" => $prev_pipes,  "current_quota" => $current_quota,  "prev_quota" => $prev_quota)); 
            

      
    }

    public function  cover_designer_report(){

           $this->Lead_Model->update_date_received_designer_usertype();

           $records['author_reports']= $this->Lead_Model->report_publisher_cover_designer_user_id($this->session->userdata['userlogin']['user_id']);

          $records['author_names']= $this->Lead_Model->select_author_name();

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

          $this->load->view('cover-report', $records);   

    }
     public function  interior_designer_report(){
          $this->Lead_Model->update_date_received_designer($this->session->userdata['userlogin']['user_id']);
          $records['author_reports']= $this->Lead_Model->report_publisher_interior_designer_user_id($this->session->userdata['userlogin']['user_id']);
          $records['author_names']= $this->Lead_Model->select_author_name();

          $records['leads'] = $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);


          $this->load->view('interior-report', $records);   

    }
    public function load_data(){ 
        if ($this->session->userdata['userlogin']['usertype'] == "Admin"){
              $total_lead = $this->Lead_Model->select_total_lead();
              $max_project_id = $this->Lead_Model->select_max_project_id();
              $last_id = $this->Lead_Model->select_last_data($max_project_id); 
               if($last_id){
                    foreach ($last_id as  $result) {
                        $prev_id = $result->project_id;
                    }
                  }


                $page_no = 1;

                $total_records_per_page = 100;
                $offset = ($page_no-1) * $total_records_per_page;
                $previous_page = $page_no - 1;
                $next_page = $page_no + 1;
                $adjacents = "2"; 

                $total_records = $this->Lead_Model->select_total_lead();
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total page minus 1
                $data = $this->Lead_Model->select_lead_admin_data($total_records_per_page, $offset);

              echo json_encode(array("test" => $data)); 



         }
       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $data =  $this->Lead_Model->select_merge_data();

          $data = $data == false ?  array() : $data ;

          $unique =  $this->unique_multi_array($data, 'project_id');


          echo json_encode($data); 

         }
         else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $admin_data =  $this->Lead_Model->select_collection_all_admin();

          $manager_data = $this->Lead_Model->select_collection_all_manager();

          $agent_data= $this->Lead_Model->select_collection_all();

          $agent_data = $agent_data == false ?  array() : $agent_data ;

          $manager_data = $manager_data == false ?  array() : $manager_data ;

          $admin_data = $admin_data == false ?  array() : $admin_data ;   
          $data = array_merge($admin_data, $manager_data, $agent_data);
          $unique =  $this->unique_multi_array($data, 'project_id');

           echo json_encode($data); 
         }

         else if ($this->session->userdata['userlogin']['usertype'] == "Production"){
          $admin_data =  $this->Lead_Model->select_collection_all_admin();

          $manager_data = $this->Lead_Model->select_collection_all_manager();

          $agent_data= $this->Lead_Model->select_collection_all();

          $agent_data = $agent_data == false ?  array() : $agent_data ;

          $manager_data = $manager_data == false ?  array() : $manager_data ;

          $admin_data = $admin_data == false ?  array() : $admin_data ;   
          $data = array_merge($admin_data, $manager_data, $agent_data);
          $unique =  $this->unique_multi_array($data, 'project_id');

           echo json_encode($data); 
         }
         else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $admin_data =  $this->Lead_Model->select_collection_all_admin();

          $manager_data = $this->Lead_Model->select_collection_all_manager();

          $agent_data= $this->Lead_Model->select_collection_all();

          $agent_data = $agent_data == false ?  array() : $agent_data ;

          $manager_data = $manager_data == false ?  array() : $manager_data ;

          $admin_data = $admin_data == false ?  array() : $admin_data ;   
          $data = array_merge($admin_data, $manager_data, $agent_data);
          $unique =  $this->unique_multi_array($data, 'project_id');

           echo json_encode($data); 

         }
          else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

              $admin_data =  $this->Lead_Model->select_collection_all_admin();

              $manager_data = $this->Lead_Model->select_collection_all_manager();

              $agent_data= $this->Lead_Model->select_collection_all();

              $agent_data = $agent_data == false ?  array() : $agent_data ;

              $manager_data = $manager_data == false ?  array() : $manager_data ;

              $admin_data = $admin_data == false ?  array() : $admin_data ;   
              $data = array_merge($admin_data, $manager_data, $agent_data);
              $unique =  $this->unique_multi_array($data, 'project_id');

               echo json_encode($data); 

         }
         
          else if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
              $data = $this->Lead_Model->view_leads_agent($this->session->userdata['userlogin']['user_id']);
              echo json_encode($data); 


         }


    }

     public function select_per_lead() { 
             $data = array();
             $next_id ='';
             $prev_id ='';
             $last_id = '';
             $first_id = '';

             $total_lead = $this->Lead_Model->select_total_lead();
     

              $next_page = $this->Lead_Model->select_greater_than_project_id($this->input->get('project_id')); 
              $prev_page = $this->Lead_Model->select_less_than_project_id($this->input->get('project_id')); 
             

                  $data = $this->Lead_Model->select_last_data($this->input->get('project_id')); 


             if($this->input->get('project_id') && is_numeric($this->input->get('project_id'))){
                    $project_id = filter_var($this->input->get('project_id'), FILTER_SANITIZE_NUMBER_INT);
                }else{
                    $project_id=0;
                }
                 if($next_page){
                    foreach ($next_page as  $result) {
                        $next_id = $result->project_id;

                    }
                }
         
               if($prev_page){
                    foreach ($prev_page as  $result) {
                        $prev_id = $result->project_id;
                    }
                  }
                // if($first_page){
                //     foreach ($next_page as  $result) {
                //         $next_id = $result->project_id;
                //         $first_id = $result->project_id;
                //     }
                // }
                // if($last_page){
                //     foreach ($prev_page as  $result) {
                //         $last_id = $result->project_id;
                //     }
                // }
                echo json_encode(array("test" => $data, "next_page" => $next_id, "prev_page" => $prev_id, "recordsTotal" => $total_lead));       
    } 

     public function select_last_lead() { 
             $data = array();
             $next_id ='';
             $prev_id ='';
             $last_id = '';
             $first_id = '';

             $total_lead = $this->Lead_Model->select_total_lead();
                $max_project_id = $this->Lead_Model->select_max_project_id();
            $last_id = $this->Lead_Model->select_less_than_project_id($total_lead); 
               if($last_id){
                    foreach ($last_id as  $result) {
                        $prev_id = $result->project_id;
                    }
                  }
              $next_page = $this->Lead_Model->select_greater_than_project_id($this->input->get('project_id')); 
              $prev_page = $this->Lead_Model->select_less_than_project_id($max_project_id); 
             


             $data = $this->Lead_Model->select_greater_lead_project($this->input->get('project_id')); 
             if($this->input->get('project_id') && is_numeric($this->input->get('project_id'))){
                    $project_id = filter_var($this->input->get('project_id'), FILTER_SANITIZE_NUMBER_INT);
                }else{
                    $project_id=0;
                }
                 if($next_page){
                    foreach ($next_page as  $result) {
                        $next_id = 0;

                    }
                }
         
               if($prev_page){
                    foreach ($prev_page as  $result) {
                        $prev_id = $result->project_id;
                    }
                  }
                // if($first_page){
                //     foreach ($next_page as  $result) {
                //         $next_id = $result->project_id;
                //         $first_id = $result->project_id;
                //     }
                // }
                // if($last_page){
                //     foreach ($prev_page as  $result) {
                //         $last_id = $result->project_id;
                //     }
                // }
                echo json_encode(array("test" => $data, "next_page" => $next_id, "prev_page" => $prev_id, "recordsTotal" => $total_lead));       
    } 
       public function select_first_lead() { 
             $data = array();
             $next_id ='';
             $prev_id ='';
             $last_id = '';
             $first_id = '';

             $total_lead = $this->Lead_Model->select_total_lead();

              $next_page = $this->Lead_Model->select_greater_than_project_id($this->input->get('project_id')); 
              $prev_page = $this->Lead_Model->select_less_than_project_id($this->input->get('project_id')); 
             


             $data = $this->Lead_Model->select_greater_lead_project($this->input->get('project_id')); 
             if($this->input->get('project_id') && is_numeric($this->input->get('project_id'))){
                    $project_id = filter_var($this->input->get('project_id'), FILTER_SANITIZE_NUMBER_INT);
                }else{
                    $project_id=0;
                }
                 if($next_page){
                    foreach ($next_page as  $result) {
                        $next_id = $result->project_id;

                    }
                }
         
               if($prev_page){
                    foreach ($prev_page as  $result) {
                        $prev_id = 0;
                    }
                  }
                // if($first_page){
                //     foreach ($next_page as  $result) {
                //         $next_id = $result->project_id;
                //         $first_id = $result->project_id;
                //     }
                // }
                // if($last_page){
                //     foreach ($prev_page as  $result) {
                //         $last_id = $result->project_id;
                //     }
                // }
                echo json_encode(array("test" => $data, "next_page" => $next_id, "prev_page" => $prev_id, "recordsTotal" => $total_lead));       
    } 

    //  public function select_first_last() { 
    //          $data = array();
    //          $next_id ='';
    //          $prev_id ='';
    //          $total_lead = $this->Lead_Model->select_total_lead();
    //          $first_page = $this->Lead_Model->select_greater_than_project_id(0); 
    //          $last_page = $this->Lead_Model->select_less_than_project_id($this->input->get('project_id')); 
    //          $data = $this->Lead_Model->select_greater_lead_project($total_lead); 
    //          if($this->input->get('project_id') && is_numeric($this->input->get('project_id'))){
    //                 $project_id = filter_var($this->input->get('project_id'), FILTER_SANITIZE_NUMBER_INT);
    //             }else{
    //                 $project_id=0;
    //             }
    //             if($next_page){
    //                 foreach ($first_page as  $result) {
    //                     $first_id = $result->project_id;
    //                 }
    //             }
    //             if($prev_page){
    //                 foreach ($last_page as  $result) {
    //                     $last_id = $result->project_id;
    //                 }
    //             }
    //             echo json_encode(array("test" => $data, "next_page" => $first_id, "prev_page" => $last_id, "recordsTotal" => $total_lead));       
    // } 




        public function email_ajax(){
           if ($this->session->userdata['userlogin']['usertype'] == "Admin"){
                   echo json_encode($this->Lead_Model->select_lead_admin());
            }
          else if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

              $rowperpage = 100;
      // Row position
               $rowno = $_POST['start'];

                  $list = $this->Lead_Model->view_leads_agent_limit($this->session->userdata['userlogin']['user_id'],$rowno,$rowperpage,$_POST['search']['value']);
                  $data = array();
              
                  foreach ($list as $lead) {
                         $data[]= $lead;
                  }
                  $query = $this->Lead_Model->getrecord_LeadCount($this->session->userdata['userlogin']['user_id'],$_POST['search']['value']);


                  $output = array(
                                  "draw" => $_POST['draw'],
                                  "recordsTotal" => $query['count'],
                                  "recordsFiltered" => $query['num_rows'],
                                  "data" => $data,
                          );
                  //output to json format
                    echo json_encode($output);
               }
          else if ($this->session->userdata['userlogin']['usertype'] == "Production"){
            $admin_data =  $this->Lead_Model->select_collection_all_admin();

            $manager_data = $this->Lead_Model->select_collection_all_manager();

            $agent_data = $agent_data == false ?  array() : $agent_data ;

            $manager_data = $manager_data == false ?  array() : $manager_data ;

            $admin_data = $admin_data == false ?  array() : $admin_data ;   
            $data = array_merge($admin_data, $manager_data, $agent_data);
                echo json_encode($data);
            }

        }
        public function lead_email_ajax(){
        

        if ($this->session->userdata['userlogin']['usertype'] == "Admin"){
             echo json_encode($this->Lead_Model->select_author_email());
            }
          else if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
                   echo json_encode($this->Lead_Model->select_author_email_agent($this->session->userdata['userlogin']['user_id']));
            }
          else if ($this->session->userdata['userlogin']['usertype'] == "Production"){
              $admin_data =  $this->Lead_Model->select_collection_all_admin();

              $manager_data = $this->Lead_Model->select_collection_all_manager();

              $agent_data= $this->Lead_Model->select_collection_all();

              $agent_data = $agent_data == false ?  array() : $agent_data ;

              $manager_data = $manager_data == false ?  array() : $manager_data ;

              $admin_data = $admin_data == false ?  array() : $admin_data ;   
              $data = array_merge($admin_data, $manager_data, $agent_data);
                echo json_encode($data);
            }
        }
         public function lead_email_update_ajax(){
        
              echo json_encode($this->Lead_Model->select_author_email_not_empty());

             // $rowperpage = 100;
             //   $rowno = $_POST['start'];

           
             //      $list = $this->Lead_Model->select_author_email_not_empty_limit();
             //      $data = array();
              
             //      foreach ($list as $lead) {
             //             $data[]= $lead;
             //      }
             //        $query = $this->Lead_Model->getrecord_Email_Author();


             //      $output = array(
             //                      "draw" => $_POST['draw'],
             //                      "recordsTotal" => $query['count'],
             //                      "recordsFiltered" => $query['num_rows'],
             //                      "data" => $data,
             //              );
             //      //output to json format
             //      echo json_encode($output);
        }

        // public function lead_email_update_agent_ajax(){
        // $id = $this->session->userdata['userlogin']['user_id']);
        //      //echo json_encode($this->Lead_Model->select_author_email_not_empty());
        // }
     public function status_lead(){
  

              $rowperpage = 100;
      // Row position
               $rowno = $_POST['start'];

                  $list = $this->Lead_Model->select_status_lead_admin_limit($rowno,$rowperpage,$_POST['search']['value']);
                  $data = array();
                 
                  foreach ($list as $lead) {
                         $data[]= $lead;
                  }
                  $query = $this->Lead_Model->getrecord_CountStatus_Lead($_POST['search']['value']);


                  $output = array(
                                  "draw" => $_POST['draw'],
                                  "recordsTotal" => $query['count'],
                                  "recordsFiltered" => $query['num_rows'],
                                  "data" => $data,
                          );
                   echo json_encode($output);

                
                  //output to json format

        }
        public function lead_email_update_ajax1(){
            $id = $this->session->userdata['userlogin']['user_id'];

         //    $id = $this->session->userdata['userlogin']['user_id']);
        
              $rowperpage = 100;
               $rowno = $_POST['start'];

           
                  $list = $this->Lead_Model->select_author_email_agent_not_empty_limit($id,$rowno,$rowperpage,$_POST['search']['value']);
                  $data = array();
              
                  foreach ($list as $lead) {
                         $data[]= $lead;
                  }
                    $query = $this->Lead_Model->getrecord_Email_NotEmpty_Author($id, $_POST['search']['value']);


                  $output = array(
                                  "draw" => $_POST['draw'],
                                  "recordsTotal" => $query['count'],
                                  "recordsFiltered" => $query['num_rows'],
                                  "data" => $data,
                          );
                  //output to json format
                  echo json_encode($output);
        }


    public function email_lead(){

   $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
       $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
       $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

           $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history($this->session->userdata['userlogin']['user_id']);

          $this->load->view('email_authors_agent', $records);  

      }
    }


    public function idle_users(){

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
         $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
         $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['users']= $this->User_Model->select_user_agent();

      if ($this->session->userdata['userlogin']['usertype'] == "Admin"){


          $records['idle_users']= $this->Idle_Model->view_idle_user_admin();
          $records['users']= $this->User_Model->select_user_agent();


           $this->load->view('template/header_admin', $records);
           $this->load->view('template/sidebar_admin', $records);
           $this->load->view('idle_user', $records); 
           $this->load->view('template/footer_admin', $records); 

      }


    }

     public function signature(){



      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

         $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $this->load->view('signature_agent', $records); 

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

         $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $this->load->view('signature_finance', $records); 

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $admin_data =  $this->Lead_Model->select_collection_all_admin();

          $manager_data = $this->Lead_Model->select_collection_all_manager();

          $agent_data= $this->Lead_Model->select_collection_all();

          $agent_data = $agent_data == false ?  array() : $agent_data ;

          $manager_data = $manager_data == false ?  array() : $manager_data ;

          $admin_data = $admin_data == false ?  array() : $admin_data ;



          $leads = array_merge($admin_data, $manager_data, $agent_data);

          $records['leads']= $this->unique_multi_array($leads, 'project_id');

          $this->load->view('dashboard-production', $records);



      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $this->load->view('signature', $records);     

         }

      else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

          $admin_data =  $this->Lead_Model->select_collection_all_admin();

          $manager_data = $this->Lead_Model->select_collection_all_manager();

          $agent_data= $this->Lead_Model->select_collection_all();

          $agent_data = $agent_data == false ?  array() : $agent_data ;

          $manager_data = $manager_data == false ?  array() : $manager_data ;

          $admin_data = $admin_data == false ?  array() : $admin_data ;



          $leads = array_merge($admin_data, $manager_data, $agent_data);

          $unique =  $this->unique_multi_array($leads, 'project_id');



          $records['leads']= $unique;          

          $this->load->view('dashboard-author', $records);     

         } 

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $this->load->view('signature_manager', $records);           

        }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $this->load->view('signature_finance', $records);           

        }

    }

    public function cover_designer(){

       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
       $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
       $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      if ($this->session->userdata['userlogin']['usertype'] == "Admin"){
          $records['author_reports']= $this->Lead_Model->report_cover_designer();

          $records['author_names']= $this->Lead_Model->select_author_name();

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

           $this->load->view('template/header_admin', $records);
           $this->load->view('template/sidebar_admin', $records);
           $this->load->view('admin_cover_designer', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['author_reports']= $this->Lead_Model->report_cover_designer();

          $records['author_names']= $this->Lead_Model->select_author_name();

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

          $this->load->view('template/header_production', $records);
          $this->load->view('template/sidebar_production', $records);
          $this->load->view('production_cover_designer', $records);
          $this->load->view('template/footer_production', $records);



      }
      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['author_reports']= $this->Lead_Model->report_cover_designer();

          $records['author_names']= $this->Lead_Model->select_author_name();

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

          $this->load->view('manager_cover_designer', $records);



      }


    }

   public function interior_designer(){

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      if ($this->session->userdata['userlogin']['usertype'] == "Admin"){
          $records['author_reports']= $this->Lead_Model->report_interior_designer();

          $records['author_names'] = $this->Lead_Model->select_author_name();

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);


          $this->load->view('template/header_admin', $records);
          $this->load->view('template/sidebar_admin', $records);
          $this->load->view('admin_interior_designer', $records);
          $this->load->view('template/footer_admin', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['author_reports']= $this->Lead_Model->report_interior_designer();

          $records['author_names']= $this->Lead_Model->select_author_name();

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

          $this->load->view('template/header_production', $records);
          $this->load->view('template/sidebar_production', $records);
          $this->load->view('production_interior_designer', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['author_reports']= $this->Lead_Model->report_interior_designer();

          $records['author_names']= $this->Lead_Model->select_author_name();

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

          $this->load->view('manager_interior_designer', $records);

      }


    }




    public function attendance($id=""){

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

     if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
            $records['attendance_users']= $this->Attendance_Model->view_attendance_employee($this->session->userdata['userlogin']['user_id'], date('Y-m-d H:i:s'));
            $records['idle_users']= $this->Idle_Model->select_user_idle($this->session->userdata['userlogin']['user_id']);
            $get_duty_log = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d H:i:s'));
            $get_duty_log_yesterday = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d', strtotime("-1 day")));
           //  if($get_duty_log  == false &&  date('H:i:s') >=  "22:30:00"){
           //         $data= array(
           //                       'user_id' => $this->session->userdata['userlogin']['user_id'],
           //                       'duty_log'  =>  date("Y-m-d H:i:s"),  
           //                     );

           //         $this->Attendance_Model->insert($data);

           //   }
           //   elseif($get_duty_log_yesterday == false && $get_duty_log == false){
           //         $data= array(
           //                       'user_id' => $this->session->userdata['userlogin']['user_id'],
           //                       'duty_log'  =>  date('Y/m/d', strtotime("-1 day")),  
           //                     );

           //         $this->Attendance_Model->insert($data);
           // } 
           
            $this->load->view('attendance', $records);     
          }

     else if ($this->session->userdata['userlogin']['usertype'] == "Human Resources"){
            $records['attendance_users']= $this->Attendance_Model->view_attendance_HR($this->session->userdata['userlogin']['user_id']);
            $records['idle_users']= $this->Idle_Model->select_user_idle($this->session->userdata['userlogin']['user_id']);
            $get_duty_log = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d H:i:s'));
            $get_duty_log_yesterday = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d', strtotime("-1 day")));
           
            $this->load->view('attendance_HR', $records);     
          }
     else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){
  
            $records['attendance_users']= $this->Attendance_Model->view_attendance_employee_manager($this->session->userdata['userlogin']['user_id'], date('Y-m-d H:i:s'));
            $records['idle_users']= $this->Idle_Model->select_user_idle($this->session->userdata['userlogin']['user_id']);
            $get_duty_log = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));
            $get_duty_log_yesterday = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d', strtotime("-1 day")));
           //  if($get_duty_log  == false &&  date('H:i:s') >=  "22:30:00"){
           //         $data= array(
           //                       'user_id' => $this->session->userdata['userlogin']['user_id'],
           //                       'duty_log'  =>  date("Y-m-d H:i:s"),    
           //                     );

           //         $this->Attendance_Model->insert($data);

           //   }
           //   elseif($get_duty_log_yesterday == false && $get_duty_log == false){
           //         $data= array(
           //                       'user_id' => $this->session->userdata['userlogin']['user_id'],
           //                       'duty_log'  =>  date('Y/m/d', strtotime("-1 day")),  
           //                     );

           //         $this->Attendance_Model->insert($data);
           // } 
           
             $this->load->view('template/header_manager', $records);
             $this->load->view('template/sidebar_manager', $records);
             $this->load->view('attendance_manager', $records);     

       }

    }

    public function attendance_test(){
      date_default_timezone_set('Asia/Manila');

     if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
            $records['attendance_users']= $this->Attendance_Model->view_attendance_employee_test($this->session->userdata['userlogin']['user_id'], date('Y-m-d H:i:s'));
            $records['idle_users']= $this->Idle_Model->select_user_idle($this->session->userdata['userlogin']['user_id']);
            $get_duty_log = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d H:i:s'));
            $get_duty_log_yesterday = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d', strtotime("-1 day")));
           //  if($get_duty_log  == false &&  date('H:i:s') >=  "22:30:00"){
           //         $data= array(
           //                       'user_id' => $this->session->userdata['userlogin']['user_id'],
           //                       'duty_log'  =>  date("Y-m-d H:i:s"),  
           //                     );

           //         $this->Attendance_Model->insert($data);

           //   }
           //   elseif($get_duty_log_yesterday == false && $get_duty_log == false){
           //         $data= array(
           //                       'user_id' => $this->session->userdata['userlogin']['user_id'],
           //                       'duty_log'  =>  date('Y/m/d', strtotime("-1 day")),  
           //                     );

           //         $this->Attendance_Model->insert($data);
           // } 
           
            $this->load->view('attendance_test', $records);     
          }

     else if ($this->session->userdata['userlogin']['usertype'] == "Human Resources"){
            $records['attendance_users']= $this->Attendance_Model->view_attendance_employee($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));
            $records['idle_users']= $this->Idle_Model->select_user_idle($this->session->userdata['userlogin']['user_id']);
            $get_duty_log = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d H:i:s'));
            $get_duty_log_yesterday = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d', strtotime("-1 day")));
           
            $this->load->view('attendance_HR', $records);     
          }
     else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){
  
            $records['attendance_users']= $this->Attendance_Model->view_attendance_employee($this->session->userdata['userlogin']['user_id'], date('Y-m-d H:i:s'));
            $records['idle_users']= $this->Idle_Model->select_user_idle($this->session->userdata['userlogin']['user_id']);
            $get_duty_log = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d'));
            $get_duty_log_yesterday = $this->Attendance_Model->select_duty_log($this->session->userdata['userlogin']['user_id'], date('Y-m-d', strtotime("-1 day")));
           //  if($get_duty_log  == false &&  date('H:i:s') >=  "22:30:00"){
           //         $data= array(
           //                       'user_id' => $this->session->userdata['userlogin']['user_id'],
           //                       'duty_log'  =>  date("Y-m-d H:i:s"),    
           //                     );

           //         $this->Attendance_Model->insert($data);

           //   }
           //   elseif($get_duty_log_yesterday == false && $get_duty_log == false){
           //         $data= array(
           //                       'user_id' => $this->session->userdata['userlogin']['user_id'],
           //                       'duty_log'  =>  date('Y/m/d', strtotime("-1 day")),  
           //                     );

           //         $this->Attendance_Model->insert($data);
           // } 
           
            $this->load->view('attendance_manager', $records);     

       }

    }

     public function schedule_attendance($id=""){
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          $records['all_users']= $this->User_Model->select_user_all();
          $records['all_IT']= $this->User_Model->all_attendance_user();
          // $records['all_agents_and_managers']= $this->User_Model->select_user_agent_and_manager();
          $records['all_agents_and_managers']= $this->User_Model->select_user_agent();
          $records['attendance_users']= $this->Attendance_Model->view_attendance_admin();
          $records['attendance_users_IT']= $this->Attendance_Model->view_attendance_all();
          $records['idle_users']= $this->Idle_Model->view_idle_user_admin();
          // echo "<pre>";
          // print_r($this->User_Model->select_user_agent_sales());
          // echo "</pre>";

          $this->load->view('attendance_masterlist', $records);     
         }

      if ($this->session->userdata['userlogin']['usertype'] == "Human Resources"){

       
          $records['all_users']= $this->User_Model->select_user_all();
          $records['all_IT']= $this->User_Model->all_attendance_user();
          // $records['all_agents_and_managers']= $this->User_Model->select_user_agent_and_manager();
          $records['all_agents_and_managers']= $this->User_Model->select_user_agent();
          $records['attendance_users']= $this->Attendance_Model->view_attendance_admin();
          $records['attendance_users_IT']= $this->Attendance_Model->view_attendance_all();
          $records['idle_users']= $this->Idle_Model->view_idle_user_admin();
          // echo "<pre>";
          // print_r($this->User_Model->select_user_agent_sales());
          // echo "</pre>";

          $this->load->view('attendance_masterlist_hr', $records);     
         }

       elseif($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['all_users']= $this->User_Model->select_user_all();
          $records['attendance_users']= $this->Attendance_Model->view_attendance_manager(date('Y-m-d H:i:s'));
          $records['idle_users']= $this->Idle_Model->view_idle_user_admin();
          $records['all_agents']= $this->User_Model->select_user_agent();
      //      foreach ($this->User_Model->select_user_agent_sales() as $index => $value) {
      //         $get_duty_log = $this->Attendance_Model->select_duty_log($value['user_id'], date('Y-m-d'));
      //         $get_duty_log_yesterday = $this->Attendance_Model->select_duty_log($value['user_id'], date('Y-m-d', strtotime("-1 day")));
      //          if($get_duty_log  == false &&  date('H:i:s') >=  "22:30:00"){
      //                $data= array(
      //                      'user_id' => $value['user_id'],
      //                      'duty_log'  =>  date("Y-m-d H:i:s"),   

      //                    );
      //                  // echo "test";
      //                  //  exit();
      //                $this->Attendance_Model->insert($data);

      //      }
      //         elseif($get_duty_log_yesterday == false && $get_duty_log  == false){
      //               $data= array(
      //                      'user_id' => $value['user_id'],
      //                      'duty_log'  =>  date("Y-m-d H:i:s "),   

      //                    );
        
      //                 $this->Attendance_Model->insert($data);
      //      } 
      // }

               $this->load->view('attendance_masterlist_manager', $records);     

         }

    }


   

    public function lead_history(){



      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $records['leads']= $this->Lead_Model->select_collection_agent($this->session->userdata['userlogin']['user_id']);

          $this->load->view('lead_history_agent', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          // $admin_data =  $this->Lead_Model->select_collection_all_admin_history();

          // $manager_data = $this->Lead_Model->select_collection_all_manager_history();

          $agent_data= $this->Lead_Model->select_collection_all_history();

          $agent_data = $agent_data == false ?  array() : $agent_data ;

          $manager_data = $manager_data == false ?  array() : $manager_data ;

          $admin_data = $admin_data == false ?  array() : $admin_data ;



          $leads = array_merge($admin_data, $manager_data, $agent_data);

          $records['leads']= $agent_data;

          $this->load->view('lead_history', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          $admin_data =  $this->Lead_Model->select_collection_all_admin_history();

          $manager_data = $this->Lead_Model->select_collection_all_manager_history();

          $agent_data= $this->Lead_Model->select_collection_all_history();

          $agent_data = $agent_data == false ?  array() : $agent_data ;

          $manager_data = $manager_data == false ?  array() : $manager_data ;

          $admin_data = $admin_data == false ?  array() : $admin_data ;



          $leads = array_merge($admin_data, $manager_data, $agent_data);

          $records['leads']= $agent_data;

          $this->load->view('lead_history', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['leads']= $this->Lead_Model->select_collection_all();

          $this->load->view('lead_history', $records);

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

          $records['leads']= $this->Lead_Model->select_collection_all();

          $this->load->view('lead_history_author', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['leads']= $this->Lead_Model->select_collection_all();

          $this->load->view('lead_history_production', $records);

      }



    }

   public function author_report_history(){

    if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->all_leads();

          $this->load->view('author_report_historyall', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->all_leads();

          $this->load->view('author_report_historyall', $records);



        }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->all_leads();

          $this->load->view('author_report_historyall', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->all_leads();

          $this->load->view('author_report_history', $records);

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

         $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->all_leads();

          $this->load->view('author_report_production_history', $records);

      }

    }

    public function email_user_history(){

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

          $this->load->view('email_authors_history', $records);  

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

          $this->load->view('email_authors_agent_history', $records);  

      }


    }

     public function personal_calendar(){
           $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

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
          $records['all_users']= $this->User_Model->select_user_all();


          $this->load->view('personal_calendar', $records);  

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('template/header_production', $records);
          $this->load->view('template/sidebar_production', $records);
          $this->load->view('personal_calendar_production', $records);  

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


           $records['all_users']= $this->User_Model->select_user_all();


          $this->load->view('personal_calendar_agent', $records);  

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Publishing/Marketing"){


           $records['all_users']= $this->User_Model->select_user_all();


          $this->load->view('personal_calendar_publishing', $records);  

      }


    }


     public function timeline_calendar(){
       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);


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
         $records['all_users']= $this->User_Model->select_user_all();


           $this->load->view('timeline_calendar', $records);  

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('timeline_calendar', $records);  

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

          $records['email_history']= $this->Signature_Model->view_email_history_admin();
         $records['all_users']= $this->User_Model->select_user_all();


          $this->load->view('timeline_calendar', $records);  

      }



      else if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history($this->session->userdata['userlogin']['user_id']);

          $this->load->view('email_authors_agent_history', $records);  

      }


    }
     public function company_calendar(){
        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
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

      else if ($this->session->userdata['userlogin']['usertype'] == "Publishing/Marketing"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history($this->session->userdata['userlogin']['user_id']);

           $this->load->view('company_calendar_publishing', $records);  

      }



    }

         public function stats_calendar(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']); 
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

           $this->load->view('stats_calendar_agent', $records);  

      }


    }


     public function collection_history(){

         $lead_data = array();

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $lead_data = $this->Payment_Model->sales_leadhistory_useragent($this->session->userdata['userlogin']['user_id']);

          $records['sales_lead']= $lead_data;

          $records['user_agents']= $this->unique_multi_array($lead_data, 'payment_usercharge');

          $this->load->view('collection_history_agent', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $lead_data = $this->Payment_Model->sales_lead_history();

          $records['sales_lead']= $lead_data;

          $records['user_agents']= $lead_data;

          $this->load->view('collection_history', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          $lead_data = $this->Payment_Model->sales_lead_history();

          $records['sales_lead']= $lead_data;

          $records['user_agents']= $lead_data;

          $this->load->view('collection_history', $records);

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $lead_data = $this->Payment_Model->sales_leadhistory_manager($this->session->userdata['userlogin']['user_id']);

          $records['sales_lead']= $lead_data;

          $records['user_agents']= $lead_data;

          $this->load->view('collection_history', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

          $lead_data = $this->Payment_Model->sales_lead_history();

          $records['sales_lead']= $lead_data;

          $records['user_agents']= $lead_data;

          $this->load->view('collection_history', $records);

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $lead_data = $this->Payment_Model->sales_lead_history();

          $records['sales_lead']= $lead_data;

          $records['user_agents']= $lead_data;

          $this->load->view('collection_history_production', $records);

      }


    }


     public function collection_payment($id=""){
        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['activities']= $this->Remark_Model->user_remarks($this->session->userdata['userlogin']['user_id']);
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          // $records['leads']= $this->Lead_Model->view_lead_collection_contract($this->session->userdata['userlogin']['user_id']);

         $this->load->view('transaction_payment_agent', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

         $records['leads']= $this->Lead_Model->all_leads();

         $this->load->view('template/header_finance', $records);
         $this->load->view('template/sidebar_finance', $records);
         $this->load->view('transaction_payment', $records);
         $this->load->view('template/footer_finance', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          $data = array_merge($this->Lead_Model->select_lead_admin_inprocess());

          $records['leads']= $data;

              $this->load->view('template/header_admin', $records);
              $this->load->view('template/sidebar_admin', $records);
              $this->load->view('transaction_payment_admin', $records);
              $this->load->view('template/footer_admin', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          // $records['leads']= $this->Lead_Model->select_lead_manager($this->session->userdata['userlogin']['user_id']);
          // $records['leads']= $this->Lead_Model->view_lead_collection_contract_manager($this->session->userdata['userlogin']['user_id']);fdff
          $records['leads']= $this->Lead_Model->select_lead_manager_all_lead();
          // $records['user_details']= $this->Lead_Model->select_lead_manager_all_lead();

            $this->load->view('template/header_manager', $records);
            $this->load->view('template/sidebar_manager', $records);
            $this->load->view('transaction_payment', $records);
            $this->load->view('template/footer_manager', $records);

         }


    }


    public function load_data_user(){

     //    $data =array();
     //    $get_author_name= $this->Lead_Model->select_lead_manager_all_lead();
     //      foreach ($get_author_name as $value) {

     //        $data[] = $value['author_name'] ;
     //    }

     //    echo #


     echo json_encode($this->Lead_Model->select_lead_manager_all_lead()); 

    }

        public function load_data_user_limit(){

     //    $data =array();
     //    $get_author_name= $this->Lead_Model->select_lead_manager_all_lead();
     //      foreach ($get_author_name as $value) {

     //        $data[] = $value['author_name'] ;
     //    }

     //    echo #
         $rowperpage = 100;
        // Row position
         $rowno = $_POST['start'];

     
            $list = $this->Lead_Model->select_lead_manager_all_lead_limit($rowno,$rowperpage,$_POST['search']['value']);
            $data = array();
        
            foreach ($list as $lead) {
                   $data[]= $lead;
            }
              $query = $this->Lead_Model->getrecordLead_ManagerCount($_POST['search']['value']);


            $output = array(
                            "draw" => $_POST['draw'],
                            "recordsTotal" => $query['count'],
                            "recordsFiltered" => $query['num_rows'],
                            "data" => $data,
                    );

            echo json_encode($output);


    }

    public function load_data_collection_payment(){

     $rowperpage = 10;
    // Row position
     $rowno = $_POST['start'];

 
        $list = $this->Lead_Model->view_lead_collection_contract($this->session->userdata['userlogin']['user_id'],$rowno,$rowperpage,$_POST['search']['value']);
        $data = array();
    
        foreach ($list as $lead) {
               $data[]= $lead;
        }
          $query = $this->Lead_Model->getrecordCount($this->session->userdata['userlogin']['user_id'],$_POST['search']['value']);


        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $query['count'],
                        "recordsFiltered" => $query['num_rows'],
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);

    }


    public function load_data_lead(){

     $rowperpage = 100;
    // Row position
     $rowno = $_POST['start'];

 
        $list = $this->Lead_Model->view_leads_agent_limit($this->session->userdata['userlogin']['user_id'],$rowno,$rowperpage,$_POST['search']['value']);
        $data = array();
    
        foreach ($list as $lead) {
               $data[]= $lead;
        }
          $query = $this->Lead_Model->getrecord_LeadCount($this->session->userdata['userlogin']['user_id'],$_POST['search']['value']);


        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $query['count'],
                        "recordsFiltered" => $query['num_rows'],
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);

    }





    public function collection_lead($id=""){
     $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

          $this->load->view('collection_lead_agent', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $records['leads']= $this->Lead_Model->all_leads_inprocess();

          $this->load->view('template/header_finance', $records);
          $this->load->view('template/sidebar_finance', $records);
          $this->load->view('collection_lead', $records);
          $this->load->view('template/footer_finance', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          $records['leads']= $this->Lead_Model->all_leads_inprocess();

               
          $this->load->view('template/header_admin', $records);
          $this->load->view('template/sidebar_admin', $records);
          $this->load->view('collection_lead', $records);
          $this->load->view('template/footer_admin', $records);


      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);
          $records['leads']= $this->Lead_Model->select_lead_admin();

           $this->load->view('template/header_manager', $records);
           $this->load->view('template/sidebar_manager', $records);
           $this->load->view('collection_lead', $records);
           $this->load->view('template/footer_manager', $records);

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

          $records['leads']= $this->Lead_Model->all_leads_inprocess();

          $this->load->view('collection_lead_author', $records);

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['leads']= $this->Lead_Model->all_leads_inprocess();

          $this->load->view('template/header_production', $records);
          $this->load->view('template/sidebar_production', $records);
          $this->load->view('collection_lead_production', $records);
          $this->load->view('template/footer_production', $records);

      }

    }

    public function lead_activities(){

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $records['lead_activities']= $this->Lead_Model->select_collection_byid($this->session->userdata['userlogin']['user_id']);

          $this->load->view('lead_activity', $records);



      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $records['lead_activities']= $this->Lead_Model->viewall_collection();

           $this->load->view('lead_activity', $records);

      }

    }

    public function collection_activities(){

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $records['collection_activities']= $this->Payment_Model->collection_activities_byid($this->session->userdata['userlogin']['user_id']);

          $this->load->view('collection_activity', $records);



      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $records['collection_activities']= $this->Payment_Model->collection_activities();

          $this->load->view('collection_activity', $records);

      }

    }


    public function select_sales_date(){

       $data = array();

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $data = $this->Payment_Model->sales_lead_date($this->session->userdata['userlogin']['user_id'], $this->input->post('month'),$this->input->post('year'));

           echo  json_encode($data);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          

          $data = $this->Payment_Model->sales_lead_date_useragent($this->input->post('agent_type'), $this->input->post('month'),$this->input->post('year'));

           echo  json_encode($data);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          

          $data = $this->Payment_Model->sales_lead_date_useragent($this->input->post('agent_type'), $this->input->post('month'),$this->input->post('year'));

           echo  json_encode($data);

      }

  }

  public function select_total_sales(){
       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
       $user_id = $this->session->userdata['userlogin']['user_id'];
       $deduction = 0;
       $data = array();
         if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
            $data = $this->Payment_Model->sales_totals($user_charge, $this->input->post('from_date'),$this->input->post('to_date'));
            $deduction = $this->Deduction_Model->total_deduction($user_id, $this->input->post('from_date'),$this->input->post('to_date'));

          }
          else{
            $data = $this->Payment_Model->sales_totals($this->input->post('agent_type'), $this->input->post('from_date'),$this->input->post('to_date'));

          }
          
         // echo  json_encode($data['total_amount']);

          echo json_encode(array("total_amount" =>  $data['total_amount'], "deduction" => $deduction['total_deduction']));

    }

    function array_group_by(array $array, $key)
    {
        if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key) ) {
            trigger_error('array_group_by(): The key should be a string, an integer, or a callback', E_USER_ERROR);
            return null;
        }

        $func = (!is_string($key) && is_callable($key) ? $key : null);
        $_key = $key;

        // Load the new array, splitting by the target key
        $grouped = [];
        foreach ($array as $value) {
            $key = null;

            if (is_callable($func)) {
                $key = call_user_func($func, $value);
            } elseif (is_object($value) && property_exists($value, $_key)) {
                $key = $value->{$_key};
            } elseif (isset($value[$_key])) {
                $key = $value[$_key];
            }

            if ($key === null) {
                continue;
            }

            $grouped[$key][] = $value;
        }

        // Recursively build a nested grouping if more parameters are supplied
        // Each grouped array value is grouped according to the next sequential key
        if (func_num_args() > 2) {
            $args = func_get_args();

            foreach ($grouped as $key => $value) {
                $params = array_merge([ $value ], array_slice($args, 2, func_num_args()));
                $grouped[$key] =  call_user_func_array(array($this, 'array_group_by'), $params);
            }
        }

        return $grouped;
    }

       public function select_call_log_history(){

           // echo $this->input->post('start');
           // exit();

         require APPPATH.'vendor/autoload.php';

          date_default_timezone_set('America/New_York');


          $RECIPIENT = '+18882248399';

          $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

          $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

          $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';



          $RINGCENTRAL_USERNAME = '+18882248399';

          $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

          $RINGCENTRAL_EXTENSION = '101';



          $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);



          $platform = $rcsdk->platform();



          $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);
         $data = array();
         $get_extension_number = 0;


         // echo date($this->input->post('end'), strtotime('+2 day'));
         // exit();
          $datetime = new DateTime();
          $datetime->setTimeZone(new DateTimeZone('Zulu'));
          $date_to = $datetime->format('Y-m-d\TH:i:s.u\Z');
          $date_from = $datetime->modify('-1 day')->format('Y-m-d\TH:i:s.u\Z');
          $date_from_prev = $datetime->modify('-1 day')->format('Y-m-d\TH:i:s.u\Z');

         date_default_timezone_set('America/New_York');
         $yesterday = date('Y-m-d', strtotime('-1 days'));

           if($this->input->post('start') == date('Y-m-d') &&  $this->input->post('end') == date('Y-m-d')){

               $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d').'&view=Detailed');
                         // echo "a";

          }
          else if($this->input->post('start') == date('Y-m-d') &&  $this->input->post('end') == $yesterday){
 
             $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime('-1 days')).'&dateTo='.date('Y-m-d').'&view=Detailed'); 
                            // echo "b";

          }
           else if($this->input->post('start') == $yesterday &&  $this->input->post('end') == date('Y-m-d')){
 
             $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime('-1 days')).'&dateTo='.date('Y-m-d').'&view=Detailed'); 
                                     // echo "c";

          }
        
         // else if($this->input->post('start') != $this->input->post('end')){

         //     $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$this->input->post('start').'&dateTo='.$this->input->post('end').'&view=Detailed');
         //            // echo "c";

         //  }

          else{
             $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$this->input->post('start').'&dateTo='.date('Y-m-d', strtotime($this->input->post('end').'+1 day')).'&view=Detailed');
                                  // echo "d";

          }
           // exit();
         //  if($this->input->post('start') == date('Y-m-d') &&  $this->input->post('end') == date('Y-m-d')){

         //       $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d'));
         //  }
         //  else if($this->input->post('start') == $yesterday &&  $this->input->post('end') == $yesterday){
 
         //     $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$this->input->post('start').'&dateTo='.date('Y-m-d', strtotime($this->input->post('end').'+1 days')).'&view=Detailed');
         //  }
         // else if($this->input->post('start') != $this->input->post('end')){

         //     $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$this->input->post('start').'&dateTo='.$this->input->post('end').'&view=Detailed');
         //  }

         //  else{
         //     $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$this->input->post('start').'&dateTo='.date('Y-m-d', strtotime($this->input->post('end').'+1 days')).'&view=Detailed');

         //  }

                  
                       foreach ($resp->json()->records as $call_log_history){

                                 if (!empty($call_log_history->from->name)) {         


                                          $from_name = !empty($call_log_history->from->name) ? $call_log_history->from->name: "";



                                          $to_name = !empty($call_log_history->to->name)? $call_log_history->to->name: "";



                                          $to_location= !empty($call_log_history->to->location)? $call_log_history->to->location: "";



                                          $to_Phonenumber = !empty($call_log_history->to->phoneNumber)? modules::run("dashboard/formatPhoneNumber",($call_log_history->to->phoneNumber)): "";



                                          $from_Phonenumber = !empty($call_log_history->from->phoneNumber)? modules::run("dashboard/formatPhoneNumber",($call_log_history->from->phoneNumber)): "";



                                          if($call_log_history->action == 'Incoming Fax'){


                                              $get_type = 'Incoming Fax';

                                          }

                                          else if($call_log_history->result == 'Missed'){

                                              $get_type = 'Missed Voice Call';

                                          }

                                          else{

                                              $get_type = $call_log_history->direction." Voice Call";

                                          }
                        
                                          if($from_name == 'Warren Walton'){

                                              $get_extension_number = 101;
                                               if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted" || $call_log_history->result == "No Answer"){
                                                      $data[] = array(
                                                          "type" => $get_type,
                                                          "from_Phonenumber" => $from_Phonenumber,
                                                          "to_Phonenumber" => $to_Phonenumber,
                                                          "extension_number" => $get_extension_number,
                                                          "location" => $to_location,
                                                          "startTime" => date('Y-m-d g:i A', strtotime($call_log_history->startTime)),
                                                          "date" => date('Y-m-d', strtotime($call_log_history->startTime)),
                                                          "action" => $call_log_history->action,
                                                          "result" => $call_log_history->result,
                                                          "duration" => gmdate("H:i:s", $call_log_history->duration),
                                                     );

                                             }


                                          }

                                         else if($from_name == 'Andrew Paige'){

                                              $get_extension_number = 102;
                                               if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted" || $call_log_history->result == "No Answer"){
                                                      $data[] = array(
                                                          "type" => $get_type,
                                                          "from_Phonenumber" => $from_Phonenumber,
                                                          "to_Phonenumber" => $to_Phonenumber,
                                                          "extension_number" => $get_extension_number,
                                                          "location" => $to_location,
                                                          "startTime" => date('Y-m-d g:i A', strtotime($call_log_history->startTime)),
                                                          "date" => date('Y-m-d', strtotime($call_log_history->startTime)),
                                                          "action" => $call_log_history->action,
                                                          "result" => $call_log_history->result,
                                                          "duration" => gmdate("H:i:s", $call_log_history->duration),
                                                     );

                                             }


                                          }

                                          else if($from_name == 'Alex Morgan'){

                                               $get_extension_number = 103;
                                                if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted" || $call_log_history->result == "No Answer"){
                                                      $data[] = array(
                                                          "type" => $get_type,
                                                          "from_Phonenumber" => $from_Phonenumber,
                                                          "to_Phonenumber" => $to_Phonenumber,
                                                          "extension_number" => $get_extension_number,
                                                          "location" => $to_location,
                                                          "startTime" => date('Y-m-d g:i A', strtotime($call_log_history->startTime)),
                                                          "date" => date('Y-m-d', strtotime($call_log_history->startTime)),
                                                          "action" => $call_log_history->action,
                                                          "result" => $call_log_history->result,
                                                          "duration" => gmdate("H:i:s", $call_log_history->duration),
                                                     );

                                             }


                                          }

                                         else if($from_name == 'The Greendot Films2'){

                                              $get_extension_number = 104;
                                               if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted" || $call_log_history->result == "No Answer"){
                                                      $data[] = array(
                                                          "type" => $get_type,
                                                          "from_Phonenumber" => $from_Phonenumber,
                                                          "to_Phonenumber" => $to_Phonenumber,
                                                          "extension_number" => $get_extension_number,
                                                          "location" => $to_location,
                                                          "startTime" => date('Y-m-d g:i A', strtotime($call_log_history->startTime)),
                                                          "date" => date('Y-m-d', strtotime($call_log_history->startTime)),
                                                          "action" => $call_log_history->action,
                                                          "result" => $call_log_history->result,
                                                          "duration" => gmdate("H:i:s", $call_log_history->duration),
                                                     );

                                             }


                                          }

                                          else if($from_name == 'The Greendot Films'){

                                              $get_extension_number = 105;

                                               if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted" || $call_log_history->result == "No Answer"){
                                                      $data[] = array(
                                                          "type" => $get_type,
                                                          "from_Phonenumber" => $from_Phonenumber,
                                                          "to_Phonenumber" => $to_Phonenumber,
                                                          "extension_number" => $get_extension_number,
                                                          "location" => $to_location,
                                                          "startTime" => date('Y-m-d g:i A', strtotime($call_log_history->startTime)),
                                                          "date" => date('Y-m-d', strtotime($call_log_history->startTime)),
                                                          "action" => $call_log_history->action,
                                                          "result" => $call_log_history->result,
                                                          "duration" => gmdate("H:i:s", $call_log_history->duration),
                                                     );

                                             }


                                          }


                                          else if($from_name == 'Sandra Lauder'){

                                              $get_extension_number = 106;
                                               if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted" || $call_log_history->result == "No Answer"){
                                                      $data[] = array(
                                                          "type" => $get_type,
                                                          "from_Phonenumber" => $from_Phonenumber,
                                                          "to_Phonenumber" => $to_Phonenumber,
                                                          "extension_number" => $get_extension_number,
                                                          "location" => $to_location,
                                                          "startTime" => date('Y-m-d g:i A', strtotime($call_log_history->startTime)),
                                                          "date" => date('Y-m-d', strtotime($call_log_history->startTime)),
                                                          "action" => $call_log_history->action,
                                                          "result" => $call_log_history->result,
                                                          "duration" => gmdate("H:i:s", $call_log_history->duration),
                                                     );

                                             }

                                          }

                                          else if($from_name == 'Ezekiel Wilson'){


                                              $get_extension_number = 107;
                                               if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted" || $call_log_history->result == "No Answer"){
                                                      $data[] = array(
                                                          "type" => $get_type,
                                                          "from_Phonenumber" => $from_Phonenumber,
                                                          "to_Phonenumber" => $to_Phonenumber,
                                                          "extension_number" => $get_extension_number,
                                                          "location" => $to_location,
                                                          "startTime" => date('Y-m-d g:i A', strtotime($call_log_history->startTime)),
                                                          "date" => date('Y-m-d', strtotime($call_log_history->startTime)),
                                                          "action" => $call_log_history->action,
                                                          "result" => $call_log_history->result,
                                                          "duration" => gmdate("H:i:s", $call_log_history->duration),
                                                     );

                                             }


                                          }

                                          else if($from_name == 'Emma Harper'){


                                              $get_extension_number = 108;
                                               if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted" || $call_log_history->result == "No Answer"){
                                                      $data[] = array(
                                                          "type" => $get_type,
                                                          "from_Phonenumber" => $from_Phonenumber,
                                                          "to_Phonenumber" => $to_Phonenumber,
                                                          "extension_number" => $get_extension_number,
                                                          "location" => $to_location,
                                                          "startTime" => date('Y-m-d g:i A', strtotime($call_log_history->startTime)),
                                                          "date" => date('Y-m-d', strtotime($call_log_history->startTime)),
                                                          "action" => $call_log_history->action,
                                                          "result" => $call_log_history->result,
                                                          "duration" => gmdate("H:i:s", $call_log_history->duration),
                                                     );

                                             }


                                          }
                                          else if($from_name == 'Randy Williams'){


                                              $get_extension_number = 109;
                                               if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted" || $call_log_history->result == "No Answer"){
                                                      $data[] = array(
                                                          "type" => $get_type,
                                                          "from_Phonenumber" => $from_Phonenumber,
                                                          "to_Phonenumber" => $to_Phonenumber,
                                                          "extension_number" => $get_extension_number,
                                                          "location" => $to_location,
                                                          "startTime" => date('Y-m-d g:i A', strtotime($call_log_history->startTime)),
                                                          "date" => date('Y-m-d', strtotime($call_log_history->startTime)),
                                                          "action" => $call_log_history->action,
                                                          "result" => $call_log_history->result,
                                                          "duration" => gmdate("H:i:s", $call_log_history->duration),
                                                     );

                                             }


                                          }

                                           else if($from_name == 'Kylie Summers'){

                                              $get_extension_number = 110;
                                               if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted" || $call_log_history->result == "No Answer"){
                                                      $data[] = array(
                                                          "type" => $get_type,
                                                          "from_Phonenumber" => $from_Phonenumber,
                                                          "to_Phonenumber" => $to_Phonenumber,
                                                          "extension_number" => $get_extension_number,
                                                          "location" => $to_location,
                                                          "startTime" => date('Y-m-d g:i A', strtotime($call_log_history->startTime)),
                                                          "date" => date('Y-m-d', strtotime($call_log_history->startTime)),
                                                          "action" => $call_log_history->action,
                                                          "result" => $call_log_history->result,
                                                          "duration" => gmdate("H:i:s", $call_log_history->duration),
                                                     );

                                             }


                                          }
  
                                       }
                                     }
                                     $result = array();
                                    
                                     array_multisort(array_column($data, 'date'), SORT_ASC,
                                            array_column($data, 'duration'),      SORT_DESC,
                                            $data);

                                          foreach ($data as $value) {
                                                 if ($this->searchDuplicate($result, $value) === false) {
                                                        $result[] = $value;
                                                 }
                                          }
                                            
                                        echo json_encode($result);

    }

    function searchDuplicate($arr, $obj) {
            foreach ($arr as $value) {
                if ($value['to_Phonenumber'] == $obj['to_Phonenumber'] && $value['extension_number'] == $obj['extension_number'] && $value['date'] == $obj['date'] ) {
                    return true; //duplicate
                }
            }
            return false;
     }
   function array_flatten($array = null) {
            $result = array();

            if (!is_array($array)) {
                $array = func_get_args();
            }

            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $result = array_merge($result, $this->array_flatten($value));
                } else {
                    $result = array_merge($result, array($key => $value));
                }
            }

            return $result;
}

    public function select_call_log_history_agent(){

           // echo $this->input->post('start');
           // exit();
        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $user_charge2 = $this->session->userdata['userlogin']['sub_name'];
         require APPPATH.'vendor/autoload.php';



          $RECIPIENT = '+18882248399';

          $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

          $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

          $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';



          $RINGCENTRAL_USERNAME = '+18882248399';

          $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

          $RINGCENTRAL_EXTENSION = '101';



          $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);



          $platform = $rcsdk->platform();



          $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);
         $data = array();
         $get_extension_number = 0;

          $datetime = new DateTime();
          $datetime->setTimeZone(new DateTimeZone('Zulu'));
          $date_to = $datetime->format('Y-m-d\TH:i:s.u\Z');
          $date_from = $datetime->modify('-1 day')->format('Y-m-d\TH:i:s.u\Z');
          $date_from_prev = $datetime->modify('-1 day')->format('Y-m-d\TH:i:s.u\Z');

         date_default_timezone_set('America/New_York');
         $yesterday = date('Y-m-d', strtotime('-1 days'));

           if($this->input->post('start') == date('Y-m-d') &&  $this->input->post('end') == date('Y-m-d')){

               $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d').'&view=Detailed');
                         // echo "a";

          }
          else if($this->input->post('start') == date('Y-m-d') &&  $this->input->post('end') == $yesterday){
 
             $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime('-1 days')).'&dateTo='.date('Y-m-d').'&view=Detailed'); 
                            // echo "b";

          }
           else if($this->input->post('start') == $yesterday &&  $this->input->post('end') == date('Y-m-d')){
 
             $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime('-1 days')).'&dateTo='.date('Y-m-d').'&view=Detailed'); 
                                     // echo "c";

          }
        
          else{
             $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$this->input->post('start').'&dateTo='.date('Y-m-d', strtotime($this->input->post('end').'+1 day')).'&view=Detailed');
                                  // echo "d";

          }
          // exit();

                  
                     foreach ($resp->json()->records as $call_log_history){

                                 if (!empty($call_log_history->from->name)) {         

                                          $from_name = !empty($call_log_history->from->name) ? $call_log_history->from->name: "";



                                          $to_name = !empty($call_log_history->to->name)? $call_log_history->to->name: "";



                                          $to_location= !empty($call_log_history->to->location)? $call_log_history->to->location: "";



                                          $to_Phonenumber = !empty($call_log_history->to->phoneNumber)? modules::run("dashboard/formatPhoneNumber",($call_log_history->to->phoneNumber)): "";



                                          $from_Phonenumber = !empty($call_log_history->from->phoneNumber)? modules::run("dashboard/formatPhoneNumber",($call_log_history->from->phoneNumber)): "";



                                          if($call_log_history->action == 'Incoming Fax'){


                                              $get_type = 'Incoming Fax';

                                          }

                                          else if($call_log_history->result == 'Missed'){

                                              $get_type = 'Missed Voice Call';

                                          }

                                          else{

                                              $get_type = $call_log_history->direction." Voice Call";

                                          }

                                          if($from_name == $user_charge2){

                                              $get_extension_number = $this->session->userdata['userlogin']['extension_number'];
                                               if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted"){

                                                   $data[] = array(
                                                                "type" => $get_type,
                                                                "from_Phonenumber" => $from_Phonenumber,
                                                                "to_Phonenumber" => $to_Phonenumber,
                                                                "extension_number" => $get_extension_number,
                                                                "location" => $to_location,
                                                                "startTime" => date('Y-m-d g:i A', strtotime($call_log_history->startTime)),
                                                                "action" => $call_log_history->action,
                                                                "result" => $call_log_history->result,
                                                                "duration" => gmdate("H:i:s", $call_log_history->duration),
                                                  );
                                             }
                                        }
                                     }
                                  }
                              

                                echo  json_encode($data);

      
    }


       public function select_call_log_user(){

           // echo $this->input->post('start');
           // exit();

         require APPPATH.'vendor/autoload.php';



          $RECIPIENT = '+18882248399';

          $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

          $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

          $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';



          $RINGCENTRAL_USERNAME = '+18882248399';

          $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

          $RINGCENTRAL_EXTENSION = '101';



          $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);



          $platform = $rcsdk->platform();



          $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);

         // $last_seven_days = date('Y-m-d', strtotime('-7 days'));

         // if($this->input->post('start') != $this->input->post('end')){

         //     $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$this->input->post('start').'&dateTo='.$this->input->post('end').'&view=Detailed');
         //  }
         //  else{
         //     $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$this->input->post('start').'&view=Detailed');

         //  }
         $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateTo='.date('Y-m-d'),

             array(
             'extensionNumber' => $this->session->userdata['userlogin']['extension_number']
          ));

               // $data =  array('action'  => "Ansel",   

               //              );
                  date_default_timezone_set('America/New_York');


                echo  json_encode(count($resp->json()->records));

    }



     public function select_saleshistory_date(){

       $data = array();

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $data = $this->Payment_Model->sales_leadhistory_date($this->session->userdata['userlogin']['user_id'], $this->input->post('month'),$this->input->post('year'));

           echo  json_encode($data);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          

          $data = $this->Payment_Model->sales_lead_date_useragenthistory($this->input->post('agent_type'), $this->input->post('month'),$this->input->post('year'));

           echo  json_encode($data);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){         

          $data = $this->Payment_Model->sales_lead_date_useragenthistory($this->input->post('agent_type'), $this->input->post('month'),$this->input->post('year'));

           echo  json_encode($data);

      }

    }



    public function contract($id=""){
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
       if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

            $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

            $this->load->view('contract_agent', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){
             $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

             $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
             $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

             $records['leads']= $this->Lead_Model->all_leads();

             $this->load->view('template/header_finance', $records);
             $this->load->view('template/sidebar_finance', $records);
             $this->load->view('contract', $records);
             $this->load->view('template/footer_finance', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){
             $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

             $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
             $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
             $records['leads']= $this->Lead_Model->all_leads_inprocess();

             $this->load->view('template/header_admin', $records);
             $this->load->view('template/sidebar_admin', $records);
             $this->load->view('contract', $records);
             $this->load->view('template/footer_admin', $records);


      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){
             $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

            $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
            $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

            $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

             $this->load->view('template/header_manager', $records);
             $this->load->view('template/sidebar_manager', $records);
             $this->load->view('contract', $records);
             $this->load->view('template/footer_manager', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

             $records['leads']= $this->Lead_Model->all_leads_inprocess();

             $this->load->view('contract_author', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

             $records['leads']= $this->Lead_Model->all_leads();

             $this->load->view('template/header_production', $records);
             $this->load->view('template/sidebar_production', $records);
             $this->load->view('contract_production', $records);
             $this->load->view('template/footer_production', $records);

      }



    }

     public function contract_author(){

       if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

            $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

            $this->load->view('contract_agent', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

             $records['leads']= $this->Lead_Model->all_leads();

             $this->load->view('contract', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

             $records['leads']= $this->Lead_Model->all_leads();

             $this->load->view('contract', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

             $records['leads']= $this->Lead_Model->all_leads_inprocess();

             $this->load->view('contract_sign', $records);

      }



    }

    public function contract_history(){

       if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

            $records['leads']= $this->Lead_Model->view_contract_history_agent($this->session->userdata['userlogin']['user_id']);

            $this->load->view('contract_history_agent', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

             $records['leads']= $this->Lead_Model->view_contract_history_finance();

             $this->load->view('contract_history', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

             $records['leads']= $this->Lead_Model->view_contract_history_finance();

             $this->load->view('contract_history', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

             $records['leads']= $this->Lead_Model->view_contract_history_finance();

             $this->load->view('contract_history', $records);

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

             $records['leads']= $this->Lead_Model->view_contract_history_finance();

             $this->load->view('contract_history_author', $records);

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

             $records['leads']= $this->Lead_Model->view_contract_history_finance();

             $this->load->view('contract_history_production', $records);

      }





    }

      public function contract_author_approval_history(){

       if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

            $records['leads']= $this->Lead_Model->view_author_approval_agent_history($this->session->userdata['userlogin']['user_id']);

            $this->load->view('contract_approval_history_agent', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

             $records['leads']= $this->Lead_Model->view_author_approval_history();

             $this->load->view('contract_approval_history', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

             $records['leads']= $this->Lead_Model->view_author_approval_history();

             $this->load->view('contract_approval_history', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

             $records['leads']= $this->Lead_Model->view_author_approval_history();

             $this->load->view('contract_approval_history', $records);

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

             $records['leads']= $this->Lead_Model->view_author_approval_history();

             $this->load->view('contract_approval_history_author', $records);

      }

        else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

             $records['leads']= $this->Lead_Model->view_author_approval_history();

             $this->load->view('contract_approval_history_production', $records);

      }





    }

    public function view_lead_history($project_id){

         $history_agent=array();

         $remark_history=array();

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('project_id'));

           $remark_history = $this->Lead_Model->select_lead_history($this->input->get('project_id'));

           //                 $this->Payment_Model->sales_lead_byid($this->session->userdata['userlogin']['user_id']);

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent,$get_remark));       

      }

        else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

         $history_agent = $this->Lead_Model->view_lead_history($this->input->get('project_id'));

           $remark_history = $this->Lead_Model->select_lead_history($this->input->get('project_id'));

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent,$get_remark));       



      }       

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('project_id'));

           $remark_history = $this->Lead_Model->select_lead_history($this->input->get('project_id'));

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent,$get_remark));       

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

            $history_agent = $this->Lead_Model->view_lead_history($this->input->get('project_id'));

           $remark_history = $this->Lead_Model->select_lead_history($this->input->get('project_id'));

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent,$get_remark));       

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

            $history_agent = $this->Lead_Model->view_lead_history($this->input->get('project_id'));

           $remark_history = $this->Lead_Model->select_lead_history($this->input->get('project_id'));

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent,$get_remark));       

      }
       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

         $history_agent = $this->Lead_Model->view_lead_history($this->input->get('project_id'));

           $remark_history = $this->Lead_Model->select_lead_history($this->input->get('project_id'));

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent,$get_remark));       

      }


    }

     public function view_lead_remark_history($project_id){

         $history_agent=array();

         $remark_history=array();

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('project_id'));

           $remark_history = $this->Lead_Model->select_lead_history($this->input->get('project_id'));

           $lead_history = $this->Lead_Model->view_lead_status_history($this->input->get('project_id'));

           $get_lead_history =  $lead_history == 'false'?  array() : $lead_history;


           //                 $this->Payment_Model->sales_lead_byid($this->session->userdata['userlogin']['user_id']);

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent, $get_remark, $lead_history));       

      }

        else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('project_id'));

           $remark_history = $this->Lead_Model->select_lead_history($this->input->get('project_id'));

           $lead_history = $this->Lead_Model->view_lead_status_history($this->input->get('project_id'));

           $get_lead_history =  $lead_history == 'false'?  array() : $lead_history;


           //                 $this->Payment_Model->sales_lead_byid($this->session->userdata['userlogin']['user_id']);

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent, $get_remark, $lead_history));      



      }       

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('project_id'));

           $remark_history = $this->Lead_Model->select_lead_history($this->input->get('project_id'));

           $lead_history = $this->Lead_Model->view_lead_status_history($this->input->get('project_id'));

           $get_lead_history =  $lead_history == 'false'?  array() : $lead_history;


           //                 $this->Payment_Model->sales_lead_byid($this->session->userdata['userlogin']['user_id']);

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent, $get_remark, $lead_history));      

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('project_id'));

           $remark_history = $this->Lead_Model->select_lead_history($this->input->get('project_id'));

           $lead_history = $this->Lead_Model->view_lead_status_history($this->input->get('project_id'));

           $get_lead_history =  $lead_history == 'false'?  array() : $lead_history;


           //                 $this->Payment_Model->sales_lead_byid($this->session->userdata['userlogin']['user_id']);

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent, $get_remark, $lead_history));      

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('project_id'));

           $remark_history = $this->Lead_Model->select_lead_history($this->input->get('project_id'));

           $lead_history = $this->Lead_Model->view_lead_status_history($this->input->get('project_id'));

           $get_lead_history =  $lead_history == 'false'?  array() : $lead_history;


           // $this->Payment_Model->sales_lead_byid($this->session->userdata['userlogin']['user_id']);

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent, $get_remark, $lead_history));      

      }
       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('project_id'));

           $remark_history = $this->Lead_Model->select_lead_history($this->input->get('project_id'));

           $lead_history = $this->Lead_Model->view_lead_status_history($this->input->get('project_id'));

           $get_lead_history =  $lead_history == 'false'?  array() : $lead_history;


           //                 $this->Payment_Model->sales_lead_byid($this->session->userdata['userlogin']['user_id']);

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent, $get_remark, $lead_history));      

      }


    }

     public function view_designer_history($author_name){

         $history_agent=array();

         $remark_history=array();



      if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('author_name'));

           $remark_history = $this->Lead_Model->select_designer_history($this->input->get('author_name'), $this->input->get('designer_id'));

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent,$get_remark));       

      }


       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){
           
           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('author_name'));

           $remark_history = $this->Lead_Model->select_designer_history($this->input->get('author_name'), $this->input->get('designer_id'));

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent,$get_remark));       

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Cover Designer"){

           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('author_name'));

           $remark_history = $this->Lead_Model->select_designer_history($this->input->get('author_name'), $this->input->get('designer_id'));

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent,$get_remark));       

      }
       else if ($this->session->userdata['userlogin']['usertype'] == "Interior Designer"){

           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('author_name'));

           $remark_history = $this->Lead_Model->select_designer_history($this->input->get('author_name'), $this->input->get('designer_id'));

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent,$get_remark));       

      }
      else if ($this->session->userdata['userlogin']['usertype'] == "Publishing/Marketing"){

           $history_agent = $this->Lead_Model->view_lead_history($this->input->get('author_name'));

           $remark_history = $this->Lead_Model->select_designer_history($this->input->get('author_name'), $this->input->get('designer_id'));

           $get_remark =  $remark_history == 'false' ? array() : $remark_history;

           echo json_encode(array_merge($history_agent,$get_remark));       

      }


    }

     public function view_project_history($project_id){


      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

           //$history_agent = $this->Lead_Model->view_lead_history($this->input->get('author_name'));

          $data = $this->Lead_Model->view_history_report($this->input->get('project_id'));
           //print_r($this->input->get('project_id'));
          echo json_encode($data);       

      }

  }

  public function view_file_remark(){
        $remark_file_history=array();

        $remark_file_history = $this->File_Model->select_remark_file($this->input->get('file_id'));

       echo json_encode($remark_file_history);       

      }

    public function add_remark_leadhistory(){
 
            
         $history_agent=array();

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('remark','Remark','trim|required|xss_clean');        


       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{
             $receive_user_notify = $this->User_Model->select_user_specify_notify_remark($this->session->userdata['userlogin']['user_id']);
             $receive_agent_notification = $this->Lead_Model->select_project_id($this->input->post('project_id'));
             $receive_publisher_notification = $this->Lead_Model->select_publisher_project_id($this->input->post('project_id'));



            $data =  array(

                             'project_id' => $this->input->post('project_id'),

                             'author_name' => $this->input->post('author_name'),

                             'user_id' => $this->session->userdata['userlogin']['user_id'],

                             'create_remark'  => $this->input->post('remark'),

                             'from_user'  => $user_charge,

                             'from_usertype'  => $usertype,

                             'date_create_remark' => date("Y-m-d H:i:s"),

                         );

            $this->Lead_Model->insert_lead_remark($data);


                foreach ($receive_user_notify as $value) {

                      $data_notification = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => "Added Remark on Lead's",
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->post('project_id'),
                           'to_user_id' => $value['user_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
                   $this->Notification_Model->insert($data_notification);
           }
              
               if ($this->session->userdata['userlogin']['usertype'] != "Agent"){

                    $data_notification_agent = array(

                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => "Added Remark on Lead's",
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'id' => $this->input->post('project_id'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'to_user_id' => $receive_agent_notification['user_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                               );
                         $this->Notification_Model->insert($data_notification_agent);

               }
              if ($this->session->userdata['userlogin']['usertype'] != "Publishing/Marketing"){
                
                if($receive_publisher_notification !=false){
                    $data_notification_publisher = array(

                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => "Added Remark on Lead's",
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'to_user_id' => $receive_publisher_notification['publisher_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                               );
                     $this->Notification_Model->insert($data_notification_publisher);
                   }

               }
             echo json_encode(array("response" =>   "success", "message" => "Successfully Added Remark", "redirect" => base_url('dashboard')));

           }

      }

        public function lead_remark($author_name){
               echo $this->Lead_Model->view_lead_remark($author_name);

        }

          public function view_lead_remark_date($author_name){
               echo $this->Lead_Model->view_lead_remark_date($author_name);

        }

         public function add_remark_leadhistory_auto(){
 
            
         $history_agent=array();

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

             $receive_user_notify = $this->User_Model->select_user_specify_notify_remark($this->session->userdata['userlogin']['user_id']);
             $receive_agent_notification = $this->Lead_Model->select_project_id($this->input->post('project_id'));
             $receive_publisher_notification = $this->Lead_Model->select_publisher_project_id($this->input->post('project_id'));

        if (!empty($this->input->get('remark'))){
              $data =  array(

                             'project_id' => $this->input->get('project_id'),

                             'author_name' => $this->input->get('author_name'),

                             'user_id' => $this->session->userdata['userlogin']['user_id'],

                             'create_remark'  => $this->input->get('remark'),

                             'from_user'  => $user_charge,

                             'from_usertype'  => $usertype,

                             'date_create_remark' => date("Y-m-d H:i:s"),

                         );

            $this->Lead_Model->insert_lead_remark($data);


                foreach ($receive_user_notify as $value) {

                      $data_notification = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => "Added Remark on Lead's",
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->get('project_id'),
                           'to_user_id' => $value['user_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
                   $this->Notification_Model->insert($data_notification);
           }
              
               if ($this->session->userdata['userlogin']['usertype'] != "Agent"){

                    $data_notification_agent = array(

                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => "Added Remark on Lead's",
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'id' => $this->input->get('project_id'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'to_user_id' => $receive_agent_notification['user_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                               );
                         $this->Notification_Model->insert($data_notification_agent);

               }
              if ($this->session->userdata['userlogin']['usertype'] != "Publishing/Marketing"){
                
                if($receive_publisher_notification !=false){
                    $data_notification_publisher = array(

                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => "Added Remark on Lead's",
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'to_user_id' => $receive_publisher_notification['publisher_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                               );
                     $this->Notification_Model->insert($data_notification_publisher);
                   }

               }
            // $records= $this->Lead_Model->view_lead_collection_contract($this->session->userdata['userlogin']['user_id']);
             echo json_encode(array("response" =>   "success"));
         }

      }

    public function add_file_reamrk(){

         $history_agent=array();

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('remark','Remark','trim|required|xss_clean');        



       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

            $data =  array(

                             'file_id' => $this->input->post('file_id'),


                             'user_id' => $this->session->userdata['userlogin']['user_id'],

                             'comment'  => $this->input->post('remark'),

                             'from_user'  => $user_charge,

                             'date_comment' => date("Y-m-d h:i:s"),

                         );

            $this->File_Model->insert_remark_file($data);

             echo json_encode(array("response" =>   "success", "message" => "Successfully Added Comment", "redirect" => base_url('dashboard')));



           }

      }

          public function add_remark_desginerhistory(){

         $history_agent=array();

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('remark','Remark','trim|required|xss_clean');        



       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

            $data =  array(

                             'project_id' => $this->input->post('project_id'),

                             'author_name' => $this->input->post('author_name'),
                             'designer_id' => $this->input->post('designer_id'),

                             'user_id' => $this->session->userdata['userlogin']['user_id'],

                             'create_remark'  => $this->input->post('remark'),

                             'from_user'  => $user_charge,

                             'from_usertype'  => $usertype,

                             'date_create_remark' => date("Y-m-d h:i:s"),

                         );

            $this->Lead_Model->insert_designer_remark($data);

             echo json_encode(array("response" =>   "success", "message" => "Successfully Added Remark", "redirect" => base_url('dashboard')));



           }

      }


      function count_payment($payment_id){

         return $this->Payment_Model->select_count_payment($payment_id);

    }

      public function get_balance_payment($project_id){

         return $this->Payment_Model->select_balance($project_id);

      }

      public function view_report_history(){

         $history_report_author=array();



       if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $history_report_author = $this->Lead_Model->view_report_history($this->input->get('project_id'));

          echo json_encode($history_report_author);      

      }       

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

           $history_report_author = $this->Lead_Model->view_report_history($this->input->get('project_id'));

          echo json_encode($history_report_author);    



      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

            $history_report_author = $this->Lead_Model->view_report_history($this->input->get('project_id'));

            echo json_encode($history_report_author);   

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

            $history_report_author = $this->Lead_Model->view_report_history($this->input->get('project_id'));

            echo json_encode($history_report_author);       

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

            $history_report_author = $this->Lead_Model->view_report_history($this->input->get('project_id'));

            echo json_encode($history_report_author);       


      }

    }
    public function view_reportdesigner_history(){

         $history_report_designer=array();



      if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

           $history_report_designer = $this->Lead_Model->report_cover_designer_history_id($this->input->get('project_id'), $this->input->get('user_id'));

          echo json_encode($history_report_designer);    


      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Cover Designer"){


           $history_report_designer = $this->Lead_Model->report_cover_designer_history_id($this->input->get('project_id'), $this->input->get('user_id'));

            echo json_encode($history_report_designer);   

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Interior Designer"){

           $history_report_designer = $this->Lead_Model->report_cover_designer_history_id($this->input->get('project_id'), $this->input->get('user_id'));

            echo json_encode($history_report_designer);       

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

           $history_report_designer = $this->Lead_Model->report_cover_designer_history_id($this->input->get('project_id'), $this->input->get('user_id'));

            echo json_encode($history_report_designer);       


      }

    }


     public function view_report_coverdesigner(){

         $cover_designer_report=array();
   

      if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

           $cover_designer_report = $this->Lead_Model->report_cover_designer_id($this->input->get('project_id'));

          echo json_encode($cover_designer_report);    


      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Cover Designer"){

            $cover_designer_report = $this->Lead_Model->view_report_history($this->input->get('project_id'));

            echo json_encode($cover_designer_report);   

      }


      else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

            $cover_designer_report = $this->Lead_Model->view_report_history($this->input->get('project_id'));

            echo json_encode($cover_designer_report);       


      }

    }

     public function view_report_interiordesigner(){

         $interior_designer_report=array();
   

      if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

           $interior_designer_report = $this->Lead_Model->report_interior_designer_id($this->input->get('project_id'));

          echo json_encode($interior_designer_report);    


      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Interior Designer"){

            $interior_designer_report = $this->Lead_Model->report_interior_designer_id($this->input->get('project_id'));

            echo json_encode($interior_designer_report);   

      }


      else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

            $interior_designer_report = $this->Lead_Model->report_interior_designer_id($this->input->get('project_id'));

            echo json_encode($interior_designer_report);       


      }

    }





      public function add_lead(){

         $commitment_date = null;

         $get_last_id = 0;

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         // $this->form_validation->set_rules('product_name','Product Name','trim|xss_clean|required');       

         $this->form_validation->set_rules('author_name','Author Name','trim|xss_clean|required');       

         // $this->form_validation->set_rules('title_name','Book Title','trim|xss_clean|required');       

         // $this->form_validation->set_rules('status','Status','trim|xss_clean|required');      

         // $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required|valid_email|is_unique[tbllead.email_address]');

         // $this->form_validation->set_rules('contact_number','Contact Number','trim|required|xss_clean|is_unique[tbllead.contact_number]');  

         // $this->form_validation->set_rules('area_code','Area Code','trim|required|xss_clean');  

         // $this->form_validation->set_rules('amount_paid','Price','trim|required|xss_clean');    

         // $this->form_validation->set_rules('installment_term','Installment Term','trim|required|xss_clean');

         // $this->form_validation->set_rules('amount_paid','Price','trim|required|xss_clean'); 

         // $this->form_validation->set_rules('address','Address','trim|required|xss_clean');        

        $get_exist_lead = $this->Lead_Model->select_exist_lead($this->input->post('author_name'), $this->input->post('email_address'));

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 
       else if($get_exist_lead == true){
           echo json_encode(array("response" => "error", "message" => "This Lead is already assigned ", "redirect" => base_url('account')));

       }

       else{

             if ($this->session->userdata['userlogin']['usertype'] == 'Admin'){

                $userid  = 'admin_id';

            }

            else if ($this->session->userdata['userlogin']['usertype'] == 'Manager'){

                $userid  = 'manager_id';

            }

             else if ($this->session->userdata['userlogin']['usertype'] == 'Agent'){

                $userid  = 'user_id';

            }


             $data =  array(

                             'product_name' => $this->input->post('product_name'),

                             'author_name' => $this->input->post('author_name'),

                             'book_title' => $this->input->post('title_name'),

                             'parent_id' => $this->input->post('parent_id'),

                             'email_address' => $this->input->post('email_address'),

                             'contact_number'  => $this->input->post('contact_number'),   

                             'address'  => $this->input->post('address'),   

                             'status'  => $this->input->post('status'),

                             'area_code'  => $this->input->post('area_code'),

                             'installment_term'  => $this->input->post('installment_term'),

                             'price'  => str_replace("$","",$this->input->post('amount_paid')),

                             'remaining_balance'  => str_replace("$","",$this->input->post('amount_paid')),

                             'remark'  => $this->input->post('remark'),

                             'date_create' => date("Y-m-d H:i:s"),

                             'payment_status' => 'Pending',

                             'lead_assign' => 1,

                             'check_lead' => 0,

                             'lead_date_assign' => date("Y-m-d H:i:s"),

                             'contractual_status' => 'Pending',

                             'lead_owner'  => $this->input->post('lead_owner'),
                             'income_level'  => $this->input->post('income_level'),

                             $userid => $this->session->userdata['userlogin']['user_id']

          

                         );



             $this->Lead_Model->insert($data);

             $get_last_id = $this->db->insert_id();

             $receive_user_notify = $this->User_Model->select_user_specify_notify();

             // $this->Lead_Model->insert_history_lead(array('project_id' => $this->db->insert_id(), 'alter_lead_status' => 'Added', 'alter_lead_date' => 'Added', 'alter_lead_date' => date("Y-m-d h:i:s"), 'alter_lead_remark' => $this->input->post('remark')));

             $this->Contractual_Model->insert(array('project_id' =>  $get_last_id, 'lead_contractual_status' => 'Pending', 'alter_contractual_status' => 'Added', 'alter_contractual_date' => date("Y-m-d h:i:s")));

             $this->Lead_Model->insert_collection(array('project_id' => $get_last_id, 'collection_status' => $this->input->post('status'), 'collection_remark' => $this->input->post('remark'), 'alter_collection_status' => 'Added','collection_user_charge' => $user_charge, 'collection_usertype' => $usertype, 'alter_date_commitment' => date("Y-m-d H:i:s")));

           // foreach ($receive_user_notify as $value) {

           //            $data_notification= array(

           //                 'from_user' => $user_charge,
           //                 'to_user' => 'All',
           //                 'message' => 'Added Lead',
           //                 'unread' => 1,
           //                 'to_user_id' => $value['user_id'],
           //                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],

           //               );
           //         $this->Notification_Model->insert($data_notification);
           // }

             echo json_encode(array("response" =>   "success", "message" => "Successfully Added Lead", "redirect" => base_url('dashboard')));

        }

    } 

  

     public function update_lead(){

         date_default_timezone_set('America/New_York');

         $payment_status = '';

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         // $this->form_validation->set_rules('product_name','Product Name','trim|xss_clean|required');       

         $this->form_validation->set_rules('author_name','Author Name','trim|xss_clean|required');       

           // $this->form_validation->set_rules('title_name','Book Title','trim|xss_clean|required');       

         $this->form_validation->set_rules('status','Status','trim|xss_clean|required');      

         // $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required|valid_email');

         // $this->form_validation->set_rules('contact_number','Contact Number','trim|required|xss_clean');  

         // $this->form_validation->set_rules('area_code','Area Code','trim|required|xss_clean');  

         // $this->form_validation->set_rules('installment_term','Installment Term','trim|required|xss_clean');

         $this->form_validation->set_rules('amount_paid','Price','trim|required|xss_clean');    

         // $this->form_validation->set_rules('address','Address','trim|required|xss_clean');        

    



         if ($this->form_validation->run() == FALSE){

              echo json_encode(array("response" => "error", "message" => validation_errors()));

         } 

         else{


              if($this->input->post('status') == "Dead" || $this->input->post('status') == "Recycled"){

                  $data =    array(

                                   'status'  => $this->input->post('status'),

                                   'remark'  => $this->input->post('remark'),

                                   'project_id' => $this->input->post('project_id'),
                                   'user_id' => 0,
                                   'check_lead' => 0,
                                   'date_updated' => date("Y-m-d H:i:s")
                               );

                }
            else{
                  $data =    array(

                                   'product_name' => $this->input->post('product_name'),

                                   'author_name' => $this->input->post('author_name'),

                                   'book_title' => $this->input->post('title_name'),

                                   'email_address' => $this->input->post('email_address'),

                                   'contact_number'  => $this->input->post('contact_number'),   

                                   'address'  => $this->input->post('address'),   

                                   'status'  => $this->input->post('status'),

                                   'price'  => str_replace("$","",$this->input->post('amount_paid')),

                                   'remaining_balance'  => str_replace("$","",$this->input->post('amount_paid')),

                                   'remark'  => $this->input->post('remark'),

                                   'installment_term'  => $this->input->post('installment_term'),

                                   'project_id' => $this->input->post('project_id'),

                                   'area_code' => $this->input->post('area_code'),

                                   'income_level'  => $this->input->post('income_level'),
                                   
                                   'date_updated' => date("Y-m-d H:i:s")

                               );
                    }

             $receive_user_notify = $this->User_Model->select_user_specify_notify_all($this->session->userdata['userlogin']['user_id']);
             $receive_agent_notification = $this->Lead_Model->select_project_id($this->input->post('project_id'));
             $receive_publisher_notification = $this->Lead_Model->select_publisher_project_id($this->input->post('project_id'));

              $this->Lead_Model->update_lead($data, $data['project_id']);

              $this->Lead_Model->insert_collection(array('project_id' => $this->input->post('project_id'), 'collection_status' => $this->input->post('status'), 'collection_remark' => $this->input->post('remark'), 'alter_collection_status' => 'Updated', 'collection_user_charge' => $user_charge, 'collection_usertype' => $usertype, 'alter_date_commitment' => date("Y-m-d H:i:s")));

                 foreach ($receive_user_notify as $value) {

                      $data_notification = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => "Updated on Lead's",
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->post('project_id'),
                           'to_user_id' => $value['user_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
                   $this->Notification_Model->insert($data_notification);
           }
        
         if ($this->session->userdata['userlogin']['usertype'] != "Agent"){

              $data_notification_agent = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => "Updated  on Lead's",
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->post('project_id'),
                           'to_user_id' => $receive_agent_notification['user_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
                   $this->Notification_Model->insert($data_notification_agent);

         }
        if ($this->session->userdata['userlogin']['usertype'] != "Publishing/Marketing"){
            if($receive_publisher_notification !=false){
                $data_notification_publisher = array(

                             'from_user' => $user_charge,
                             'to_user' => 'All',
                             'message' => "Updated  on Lead's",
                             'unread' => 1,
                             'date_notify' => date('Y-m-d H:i:s'),
                             'link' =>  dirname(base_url(uri_string())),
                             'id' =>  $this->input->post('project_id'),
                             'to_user_id' => $receive_publisher_notification['publisher_id'],
                             'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                           );
                 $this->Notification_Model->insert($data_notification_publisher);
              }

         }
                // }
                // else if($this->session->userdata['userlogin']['usertype'] == 'Agent'){
                //       foreach ($receive_user_notify_all as $value) {
                //                 $data_notification= array(
                //                      'from_user' => $user_charge,
                //                      'to_user' => 'All',
                //                      'message' => 'Updated Lead',
                //                      'unread' => 1,
                //                      'to_user_id' => $value['user_id'],
                //                      'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
                //                    );
                //          $this->Notification_Model->insert($data_notification);
                //      }
                // }
          
              echo json_encode(array("response" =>   "success", "message"  => "Successfully Updated Lead", "redirect" => base_url('dashboard')));

        }

    }



public function pay_lead(){

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('product_name','Product Name','trim|xss_clean|required');       

         $this->form_validation->set_rules('author_name','Author Name','trim|xss_clean|required');       

         // $this->form_validation->set_rules('title_name','Book Title','trim|xss_clean|required');       

         $this->form_validation->set_rules('status','Tag','trim|xss_clean|required');       

         $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required|valid_email');

         $this->form_validation->set_rules('contact_number','Contact Number','trim|required|xss_clean');    

         // $this->form_validation->set_rules('address','Address','trim|required|xss_clean');   

         $this->form_validation->set_rules('initial_payment','Initial Payment','trim|required|xss_clean');      

         $this->form_validation->set_rules('collection_date','Collection Date','trim|required|xss_clean');

         $this->form_validation->set_rules('amount_paid','Price','trim|required|xss_clean');    



       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

              $data = array(

                     'project_id' => $this->input->post('project_id'),

                     'collection_id' => $this->input->post('collection_id'),

                     'initial_payment'  => str_replace(['$',','],"",$this->input->post('initial_payment')),   

                     'collection_date'  =>  date("Y-m-d h:i:s", strtotime(str_replace('/', '-', $this->input->post('collection_date')))),   

                     'collect_payment_status'  => $this->input->post('status'),

                     'status_payment'  =>     ($this->input->post('status_payment') == "" ? 'Pending': $this->input->post('status_payment')),

                     'amount_paid'  => str_replace("$","",$this->input->post('amount_paid')),

                     'payment_remark'  => $this->input->post('remark'),

                     'payment_usercharge'  => $user_charge,

                     'payment_usertype'  => $usertype,

                     'date_paid' => $this->input->post('status_payment') == "" ? null: date("Y-m-d h:i:s"),

                     'approval_status'  => ($this->input->post('status_payment') == "" ? 'Pending': $this->input->post('approved_status')),

                     'user_id' =>  $this->session->userdata['userlogin']['user_id'],             

                     'user_refund' => ($this->input->post('status') == "Refund Payment" ? $this->session->userdata['userlogin']['user_id']: 0),             

               );    





             $this->Payment_Model->insert($data);

             $this->Lead_Model->update_lead(array('payment_status' => ($this->input->post('status_payment') == "" ? 'Pending': $this->input->post('status_payment'))), $data['project_id']);
             

            $receive_user_notify = $this->User_Model->select_user_specify_notify_all($this->session->userdata['userlogin']['firstname']);

             $receive_agent_notification = $this->Lead_Model->select_project_id($this->input->post('project_id'));
             $receive_publisher_notification = $this->Lead_Model->select_publisher_project_id($this->input->post('project_id'));


             foreach ($receive_user_notify as $value) {

                      $data_notification = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => 'Added Collection Payment',
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->post('project_id'),
                           'to_user_id' => $value['user_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
                   $this->Notification_Model->insert($data_notification);
           }
        
               if ($this->session->userdata['userlogin']['usertype'] != "Agent"){

                    $data_notification_agent = array(

                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => 'Added Collection Payment',
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'id' =>  $this->input->post('project_id'),
                                 'to_user_id' => $receive_agent_notification['user_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                               );
                         $this->Notification_Model->insert($data_notification_agent);

               }
              if ($this->session->userdata['userlogin']['usertype'] != "Publishing/Marketing"){
                if($receive_publisher_notification !=false){
                    $data_notification_publisher = array(

                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => 'Added Collection Payment',
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'to_user_id' => $receive_publisher_notification['publisher_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                               );
                     $this->Notification_Model->insert($data_notification_publisher);
                   }

               }

             echo json_encode(array("response" =>   "success", "message" => "Successfully Added Collection lead", "redirect" => base_url('dashboard')));

        }

    }

public function update_pay_lead(){

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('product_name','Product Name','trim|xss_clean|required');       

         $this->form_validation->set_rules('author_name','Author Name','trim|xss_clean|required');       

         $this->form_validation->set_rules('title_name','Book Title','trim|xss_clean|required');       

         $this->form_validation->set_rules('status','Tag','trim|xss_clean|required');       

         $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required|valid_email');

         $this->form_validation->set_rules('contact_number','Contact Number','trim|required|xss_clean');    

         // $this->form_validation->set_rules('address','Address','trim|required|xss_clean');   

         $this->form_validation->set_rules('initial_payment','Initial Payment','trim|required|xss_clean');      

         $this->form_validation->set_rules('collection_date','Collection Date','trim|required|xss_clean');

         $this->form_validation->set_rules('amount_paid','Price','trim|required|xss_clean');    



       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

              $data = array(

                     'payment_id' => $this->input->post('payment_id'),

                     'previous_amount' => $this->input->post('previous_amount'),

                     'current_amount'  => str_replace("$","",$this->input->post('initial_payment')),   

                     'previous_collect_status' => $this->input->post('previous_collect_status'),

                     'current_collect_status' => $this->input->post('status'),

                     'previous_collect_date'  =>  date("Y-m-d h:i:s", strtotime($this->input->post('previous_collect_date'))),   

                     'current_collect_date'  => date("Y-m-d h:i:s", strtotime(str_replace('/', '-', $this->input->post('collection_date')))),

                     'date_change'  => date("Y-m-d h:i:s"),

                     'history_remark'  => $this->input->post('remark'),

                     'payment_usercharge'  => $user_charge,

                     'payment_usertype'  => $usertype,



               );





             $this->Payment_Model->insert_payment_history($data);


             $this->Payment_Model->update_payment(array('initial_payment' => str_replace(['$',','],"",$this->input->post('initial_payment')), "collect_payment_status" => $this->input->post('status'), "collection_date" => date("Y-m-d h:i:s", strtotime(str_replace('/', '-', $this->input->post('collection_date')))), "payment_remark" => $this->input->post('remark'), 'payment_usercharge'  => $user_charge,'payment_usertype'  => $usertype), $data['payment_id']);
            

           $receive_user_notify = $this->User_Model->select_user_specify_notify_all($this->session->userdata['userlogin']['user_id']);

           
             foreach ($receive_user_notify as $value) {
                      $data_notification= array(
                                     'from_user' => $user_charge,
                                     'to_user' => 'All',
                                     'message' => 'Updated Collection Payment',
                                     'unread' => 1,
                                     'date_notify' => date('Y-m-d H:i:s'),
                                     'link' =>  dirname(base_url(uri_string())),
                                     'id' =>  $this->input->post('project_id'),
                                     'to_user_id' => $value['user_id'],
                                     'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
                                   );
                        $this->Notification_Model->insert($data_notification);
                     }

            echo json_encode(array("response" =>   "success", "message" => "Successfully Updated Collection", "redirect" => base_url('dashboard')));

        }

    }



    public function update_approval(){

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('approval_status','Approval Status','trim|required|xss_clean');            

    

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

              $data = array(

                     'payment_id' => $this->input->post('payment_id'),

                     'project_id' => $this->input->post('project_id'),

                     'approval_status' => $this->input->post('approval_status'),

                     'date_approve'  => date("Y-m-d H:i:s"),

                     // 'date_contract_approved' => date("Y-m-d h:i:s")

               );



              $data_approval_history = array(

                     'payment_id' => $this->input->post('payment_id'),

                     'project_id' => $this->input->post('project_id'),

                     'approval_usercharge' => $user_charge,

                     'approval_usertype' => $usertype,

                     'approval_status_history' => $this->input->post('approval_status'),

                     'approval_date_history'  => date("Y-m-d H:i:s"),

                );


               

           $payment =  $this->Payment_Model->update_approval_status($data, $data['payment_id'], $data['project_id']);

           $this->Payment_Model->insert_approval_history($data_approval_history);
            $receive_user_notify = $this->User_Model->select_user_specify_notify_remark($this->session->userdata['userlogin']['user_id']);
            $receive_agent_notification = $this->Lead_Model->select_project_id($this->input->post('project_id'));
             $receive_publisher_notification = $this->Lead_Model->select_publisher_project_id($this->input->post('project_id'));




             foreach ($receive_user_notify as $value) {

                      $data_notification = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => 'Changed Approval Status as '.$this->input->post('approval_status').' ',
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->post('project_id'),
                           'to_user_id' => $value['user_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
                   $this->Notification_Model->insert($data_notification);
           }
        
         if ($this->session->userdata['userlogin']['usertype'] != "Agent"){

              $data_notification_agent = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => 'Changed Approval Status as '.$this->input->post('approval_status').' ',
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->post('project_id'),
                           'to_user_id' => $receive_agent_notification['user_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
                   $this->Notification_Model->insert($data_notification_agent);

         }
        if ($this->session->userdata['userlogin']['usertype'] != "Publishing/Marketing"){
          if($receive_publisher_notification !=false){
              $data_notification_publisher = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => 'Changed Approval Status as '.$this->input->post('approval_status').' ',
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->post('project_id'),
                           'to_user_id' => $receive_publisher_notification['publisher_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
               $this->Notification_Model->insert($data_notification_publisher);
             }

         }
          echo json_encode(array("response" =>   "success", "message" => "Successfully Updated Approval Status", "payment" => $payment));

        }

    }

       public function update_lead_payment(){

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('payment_status','Payment Status','trim|required|xss_clean');            



       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

              $data = array(

                     'payment_id' => $this->input->post('payment_id'),

                     'project_id' => $this->input->post('project_id'),

                     'status_payment' => $this->input->post('payment_status'),

                     'date_paid'  => date("Y-m-d h:i:s"),

               );

               $data_paymentapproval_history = array(

                     'payment_id' => $this->input->post('payment_id'),

                     'project_id' => $this->input->post('project_id'),

                     'payment_usercharge' => $user_charge,

                     'payment_usertype' => $usertype,

                     'approval_payment_status' => $this->input->post('payment_status'),

                     'payment_date_charge'  => date("Y-m-d H:i:s"),

                );

             // $payment = $this->Payment_Model->select_payment($this->input->post('project_id')); 

 

           $payment =  $this->Payment_Model->update_approval_status($data, $data['payment_id'], $data['project_id']);

           $this->Payment_Model->insert_paymentapproval_history($data_paymentapproval_history);

           if($this->input->post('payment_status') == "Refunded"){

              $this->Lead_Model->update_lead(array('remaining_balance'  => str_replace("$","",$this->input->post('get_previous_balance'))), $this->input->post('project_id'));

           }

           else if($this->input->post('payment_status') == "Paid"){

              $this->Lead_Model->update_lead(array('remaining_balance'  => str_replace("$","",$this->input->post('get_previous_balance'))), $this->input->post('project_id'));

           }  

           $receive_user_notify = $this->User_Model->select_user_specify_notify_all($this->session->userdata['userlogin']['user_id']);

           $receive_agent_notification = $this->Lead_Model->select_project_id($this->input->post('project_id'));

            foreach ($receive_user_notify as $value) {
                          $data_notification= array(
                                     'from_user' => $user_charge,
                                     'to_user' => 'All',
                                     'message' => 'Processed Payment as '.$this->input->post('payment_status').'  ',
                                     'unread' => 1,
                                     'date_notify' => date('Y-m-d H:i:s'),
                                     'id' =>  $this->input->post('project_id'),
                                     'link' =>  dirname(base_url(uri_string())),
                                     'to_user_id' => $value['user_id'],
                                     'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
                                   );
                         $this->Notification_Model->insert($data_notification);
             }
            if ($this->session->userdata['userlogin']['usertype'] != 'Agent'){
                 $agent_notification= array(
                                           'from_user' => $user_charge,
                                           'to_user' => 'All',
                                           'message' => 'Processed Payment as '.$this->input->post('payment_status').'  ',
                                           'unread' => 1,
                                           'date_notify' => date('Y-m-d H:i:s'),
                                           'link' =>  dirname(base_url(uri_string())),
                                           'id' =>  $this->input->post('project_id'),
                                           'to_user_id' => $receive_agent_notification['user_id'],
                                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],
              
                                         );
                  $this->Notification_Model->insert($agent_notification);
            }


          echo json_encode(array("response" =>   "success", "message" => "Successfully Updated Payment Status", "payment" => $payment));

        }

    }

public function update_lead_contract(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];


         $this->form_validation->set_rules('contract_status','Contract Status','trim|required|xss_clean');            

    

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

              $data = array(

                     'project_id' => $this->input->post('project_id'),

                     'lead_contractual_status' => $this->input->post('contract_status'),

                     'alter_contractual_status' => 'Changed',

                     'date_signed'  => date("Y-m-d h:i:s"),

                     'alter_contractual_date'  => date("Y-m-d h:i:s"),

               );

            $this->Contractual_Model->insert($data);

            $this->Lead_Model->update_lead(array('contractual_status' => $this->input->post('contract_status'), "date_contract_signed" => date("Y-m-d h:i:s")), $data['project_id']);

           $receive_user_notify = $this->User_Model->select_user_specify_notify_all($this->session->userdata['userlogin']['user_id']);

           $receive_agent_notification = $this->Lead_Model->select_project_id($this->input->post('project_id'));

            foreach ($receive_user_notify as $value) {
                          $data_notification= array(
                                     'from_user' => $user_charge,
                                     'to_user' => 'All',
                                     'message' => 'Changed Contract Status as '.$this->input->post('contract_status').'  ',                                     
                                     'unread' => 1,
                                     'date_notify' => date('Y-m-d H:i:s'),
                                     'link' =>  dirname(base_url(uri_string())),
                                     'id' =>  $this->input->post('project_id'),
                                     'to_user_id' => $value['user_id'],
                                     'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
                                   );
                         $this->Notification_Model->insert($data_notification);
             }
             if ($this->session->userdata['userlogin']['usertype'] != 'Agent'){
                $agent_notification= array(
                                         'from_user' => $user_charge,
                                         'to_user' => 'All',
                                         'message' => 'Changed Contract Status as '.$this->input->post('contract_status').'  ',                                     
                                         'unread' => 1,
                                         'date_notify' => date('Y-m-d H:i:s'),
                                         'link' =>  dirname(base_url(uri_string())),
                                         'id' =>  $this->input->post('project_id'),
                                         'to_user_id' => $receive_agent_notification['user_id'],
                                         'from_usertype' => $this->session->userdata['userlogin']['usertype'],
            
                                       );
                $this->Notification_Model->insert($agent_notification);
              }


             echo json_encode(array("response" =>   "success", "message" => "Successfully Updated Contract Author Sign"));

        }

    }

public function update_authorsign_contract(){
        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

        $usertype = $this->session->userdata['userlogin']['usertype'];

       $this->form_validation->set_rules('contract_status','Contract Sign','trim|required|xss_clean');            

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

              $data = array(

                     'project_id' => $this->input->post('project_id'),

                     'lead_contractual_status' => $this->input->post('contract_status'),

                     'alter_contractual_status' => 'Changed',

                     'date_signed'  => date("Y-m-d h:i:s"),

                     'alter_contractual_date'  => date("Y-m-d h:i:s"),

               );



           $this->Contractual_Model->insert($data);

           $this->Lead_Model->update_lead(array('contractual_status' => $this->input->post('contract_status'), "date_contract_signed" => date("Y-m-d h:i:s")), $data['project_id']);
             

           $receive_user_notify = $this->User_Model->select_user_specify_notify_all($this->session->userdata['userlogin']['user_id']);

           $receive_agent_notification = $this->Lead_Model->select_project_id($this->input->post('project_id'));

            foreach ($receive_user_notify as $value) {
                          $data_notification= array(
                                     'from_user' => $user_charge,
                                     'to_user' => 'All',
                                     'message' => 'Changed Contract Status as '.$this->input->post('contract_status').'  ',                                    
                                     'unread' => 1,
                                     'to_user_id' => $value['user_id'],
                                     'date_notify' => date('Y-m-d H:i:s'),
                                     'link' =>  dirname(base_url(uri_string())),
                                     'id' =>  $this->input->post('project_id'),
                                     'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
                                   );
                         $this->Notification_Model->insert($data_notification);
             }
             if ($this->session->userdata['userlogin']['usertype'] != 'Agent'){
                  $agent_notification= array(
                                           'from_user' => $user_charge,
                                           'to_user' => 'All',
                                           'unread' => 1,
                                           'message' => 'Changed Contract Status as '.$this->input->post('contract_status').'  ',
                                           'to_user_id' => $receive_agent_notification['user_id'],
                                           'date_notify' => date('Y-m-d H:i:s'),
                                           'id' =>  $this->input->post('project_id'),
                                           'link' =>  dirname(base_url(uri_string())),
                                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],
              
                                         );
                  $this->Notification_Model->insert($agent_notification);
            }


             echo json_encode(array("response" =>   "success", "message" => "Successfully Updated Approval Contract Author"));

        }

    }



    public function update_lead_contract_investment(){

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];
    

         $this->form_validation->set_rules('contract_investment','Contract Investment','trim|required|xss_clean');            

    

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

              $data = array(

                     'project_id' => $this->input->post('project_id'),

                     'contract_status' => $this->input->post('contract_investment'),

                     'alter_contractual_status' => 'Changed',

                     'date_create'  => date("Y-m-d H:i:s"),

               );



            $this->Contractual_Model->insert_contractual_investment($data);

            $receive_user_notify = $this->User_Model->select_user_specify_notify_all($this->session->userdata['userlogin']['user_id']);

            $receive_agent_notification = $this->Lead_Model->select_project_id($this->input->post('project_id'));

            foreach ($receive_user_notify as $value) {
                          $data_notification= array(
                                     'from_user' => $user_charge,
                                     'to_user' => 'All',
                                     'message' => 'Changed Investment Status as '.$this->input->post('contract_investment').'  ',
                                     'unread' => 1,
                                     'to_user_id' => $value['user_id'],
                                     'date_notify' => date('Y-m-d H:i:s'),
                                     'link' =>  dirname(base_url(uri_string())),
                                     'id' =>  $this->input->post('project_id'),
                                     'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
                                   );
                         $this->Notification_Model->insert($data_notification);
             }
             if ($this->session->userdata['userlogin']['usertype'] != 'Agent'){
                  $agent_notification= array(
                                           'from_user' => $user_charge,
                                           'to_user' => 'All',
                                           'unread' => 1,
                                     'message' => 'Changed Investment Status as '.$this->input->post('contract_investment').'  ',
                                           'to_user_id' => $receive_agent_notification['user_id'],
                                           'date_notify' => date('Y-m-d H:i:s'),
                                           'link' =>  dirname(base_url(uri_string())),
                                           'id' =>  $this->input->post('project_id'),
                                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],
              
                                         );
                  $this->Notification_Model->insert($agent_notification);
            }




            echo json_encode(array("response" =>   "success", "message" => "Successfully Updated Contractual Investment Status"));

        }

    }



//import Lead



     public function import_lead(){

         $get_last_id = 0;

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $configUpload['upload_path'] = FCPATH.'leads/';

         $configUpload['allowed_types'] = 'csv';

         $configUpload['file_name'] = 'Lead' .uniqid() . '_' . date('Y-m-d');

         $this->load->library('upload', $configUpload);



          if (!$this->upload->do_upload('uploadsignature')){

              echo json_encode(array("response" => "error", "message" => $this->upload->display_errors('','')));  

            }           

          else{

            $media = $this->upload->data();

            $inputFileName = './leads/'.$media['file_name'];

             $receive_user_notify = $this->User_Model->select_user_specify_notify();


            $handle = fopen($inputFileName, "r");

                $c = 0;//

                while(($filesop = fgetcsv($handle, 1000, ",")) !== false)

                {

                            $data =  array(

                             'product_name' => $filesop[0],

                             'author_name' => $filesop[1],

                             'book_title' => $filesop[2],

                             'contact_number'  => $filesop[3],   

                             'email_address' => $filesop[4],

                             'area_code'  => $filesop[5],   

                             'price'  => $filesop[6] == ""? "0.00" :  str_replace("$","",$filesop[6]),

                             'address'  => $filesop[7],   

                             'remark'  => $filesop[8], 

                             'status'  => 'Assigned Low',

                             'installment_term'  => 'Six Months',

                             'date_create' => date("Y-m-d H:i:s"),

                             'payment_status' => 'Pending',

                             'contractual_status' => 'Pending',

                             'lead_owner' => $filesop[9],
                             'income_level' => $filesop[10],

                             'lead_assign' => 1,
                             'file_name' => $media['file_name'],

                             'remaining_balance' => $filesop[6] == ""? "0.00" :  str_replace("$","",$filesop[6]),

                             'admin_id' => $this->session->userdata['userlogin']['user_id'],



                         );
                // $get_exist_lead = $this->Lead_Model->select_exist_lead($filesop[1], $filesop[4]);

                  if($c<>0){          //SKIP THE FIRST ROW
                  
                    // if ($get_exist_lead == false)


                        $this->Lead_Model->insert($data);

                        $get_last_id = $this->db->insert_id();

                 // $this->Lead_Model->insert_history_lead(array('project_id' => $this->db->insert_id(), 'alter_lead_status' => 'Added', 'alter_lead_date' => 'Added', 'alter_lead_date' => date("Y-m-d h:i:s"), 'alter_lead_remark' => $this->input->post('remark')));

                        $this->Contractual_Model->insert(array('project_id' =>  $get_last_id, 'lead_contractual_status' => 'Pending', 'alter_contractual_status' => 'Added', 'alter_contractual_date' => date("Y-m-d h:i:s")));

                        $this->Lead_Model->insert_collection(array('project_id' => $get_last_id, 'collection_status' => 'Assigned', 'collection_remark' => $filesop[8], 'alter_collection_status' => 'Added', 'collection_user_charge' => $user_charge, 'collection_usertype' => $usertype, 'alter_date_commitment' => date("Y-m-d h:i:s")));                   }

                         $c = $c + 1;

                    }

              } 

                       // foreach ($receive_user_notify as $value) {
              
                       //          $data_notification= array(

                       //               'from_user' => $user_charge,
                       //               'to_user' => 'All',
                       //               'message' => 'import Leads',
                       //               'unread' => 1,
                       //               'to_user_id' => $value['user_id'],
                       //               'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        

                       //             );
                       //       $this->Notification_Model->insert($data_notification);
                       // }

                  echo json_encode(array("response" => "success", "message" => "Successfully to Import Lead"));           


        }   

    



      public function report($id=""){

       $lead_data = array();
       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
       $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name_exist();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $this->load->view('template/header_production', $records);
          $this->load->view('template/sidebar_production', $records);
          $this->load->view('report', $records);
          $this->load->view('template/footer_production', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();


          $this->load->view('template/header_admin', $records);
          $this->load->view('template/sidebar_admin', $records);
          $this->load->view('report_admin', $records);
          $this->load->view('template/footer_admin', $records);

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $lead_data = array();

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name();

          $this->load->view('report_manager', $records);

      }



    }


      public function submission($id=""){

       $lead_data = array();
       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
       $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['submissions']= $this->Lead_Model->submission_lead();


          // print_r($this->Lead_Model->submission_lead());

          // exit();

          $records['author_names']= $this->Lead_Model->select_author_name_exist();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $this->load->view('template/header_production', $records);
          $this->load->view('template/sidebar_production', $records);
          $this->load->view('submission', $records);
          $this->load->view('template/footer_production', $records);

      }

  }

      public function create_report(){

         $lead_data = array();

      if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name_exist();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();
          $records['user_authors']= $this->User_Model->select_author_user();

          $this->load->view('create_report', $records);

      }


       else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

           $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name_exist();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $this->load->view('create_report_manager', $records);

      }

    }

          public function project_detail($project_id, $report_id){
          // $records['project_details'] = $this->Lead_Model->view_report($this->uri->segment(3)); 
          // $records['project_id'] = $this->uri->segment(3);
          // $records['histories'] = $this->Lead_Model->view_history_report($this->uri->segment(3));  
          //  // $last = $this->uri->total_segments();
          //  //  $record_num = $this->uri->segment($last);
          // // print_r($this->Lead_Model->view_history_report($this->uri->segment(3)));

   
          // $this->load->view('project_detail', $records); 
           $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
           $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
           $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']); 

          if ($this->session->userdata['userlogin']['usertype'] == "Production"){

              $records['project_details'] = $this->Lead_Model->view_report($this->uri->segment(3)); 
              $records['author_reports']= $this->Lead_Model->report_lead();
              $records['histories'] = $this->Lead_Model->view_history_report($this->uri->segment(3));  
              $records['project_id'] = $this->uri->segment(3);

              $records['author_names']= $this->Lead_Model->select_author_name_exist();
              $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
              $records['publishers']= $this->User_Model->select_user_publisher();
              $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

              $project_id = $this->uri->segment(3);
              $report_id = $this->uri->segment(4);
             // $remarks[] =$this->Remark_Model->select_remarks($project_id);
              
              $records['report'] =$this->Lead_Model->view_report_detail($project_id, $report_id); 
              $records['data_interior_designer'] =$this->Lead_Model->view_interior_designer_single($project_id, $report_id); 
              $records['data_cover_designer'] =$this->Lead_Model->view_cover_designer_single($project_id, $report_id); 
              $records['data_front_cover_designer'] =$this->Lead_Model->view_front_cover_designer($project_id); 
              $records['data_back_cover_designer'] =$this->Lead_Model->view_back_cover_designer($project_id); 

              $records['comments'] = $this->Lead_Model->select_remarks($project_id, $report_id);


              $this->load->view('project_detail', $records);

        }

          else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

              $records['project_details'] = $this->Lead_Model->view_report($this->uri->segment(3)); 
              $records['author_reports']= $this->Lead_Model->report_lead();
              $records['histories'] = $this->Lead_Model->view_history_report($this->uri->segment(3));  
              $records['project_id'] = $this->uri->segment(3);

              $records['author_names']= $this->Lead_Model->select_author_name_exist();
              $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
              $records['publishers']= $this->User_Model->select_user_publisher();
              $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

              $project_id = $this->uri->segment(3);
              $report_id = $this->uri->segment(4);
              $records['report'] =$this->Lead_Model->view_report_detail($project_id, $report_id); 
              $records['data_interior_designer'] =$this->Lead_Model->view_interior_designer_single($project_id, $report_id); 
              $records['data_cover_designer'] =$this->Lead_Model->view_cover_designer_single($project_id, $report_id); 
              $records['data_front_cover_designer'] =$this->Lead_Model->view_front_cover_designer($project_id); 
              $records['data_back_cover_designer'] =$this->Lead_Model->view_back_cover_designer($project_id); 

              $records['report_id'] = $this->uri->segment(4);

               $records['comments'] = $this->Lead_Model->select_remarks($project_id);


               $this->load->view('project_detail', $records);

      }

          else if ($this->session->userdata['userlogin']['usertype'] == "Publishing/Marketing"){

              $records['project_details'] = $this->Lead_Model->view_report($this->uri->segment(3)); 
             // $records['author_reports']= $this->Lead_Model->report_lead();
              $records['author_reports']= $this->Lead_Model->report_lead_publisher_user_id($this->session->userdata['userlogin']['user_id']);
              $records['histories'] = $this->Lead_Model->view_history_report($this->uri->segment(3));  
              $records['project_id'] = $this->uri->segment(3);

              $records['author_names']= $this->Lead_Model->select_author_name_exist();
              $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
              $records['publishers']= $this->User_Model->select_user_publisher();
              $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

              $project_id = $this->uri->segment(3);
              $report_id = $this->uri->segment(4);
              $records['report'] =$this->Lead_Model->view_report_detail($project_id, $report_id); 
              $records['data_interior_designer'] =$this->Lead_Model->view_interior_designer_single($project_id, $report_id); 
              $records['data_cover_designer'] =$this->Lead_Model->view_cover_designer_single($project_id, $report_id); 
              $records['data_front_cover_designer'] =$this->Lead_Model->view_front_cover_designer($project_id); 
              $records['data_back_cover_designer'] =$this->Lead_Model->view_back_cover_designer($project_id); 

              $records['report_id'] = $this->uri->segment(4);

              $records['comments'] = $this->Lead_Model->select_remarks($project_id, $report_id);

            $this->load->view('project_detail_publisher', $records);


      }


     }

    public function updatereport($project_id, $report_id){

         $lead_data = array();
         $data=array();
    
    $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
    $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
    $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

      if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name_exist();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $project_id = $this->uri->segment(3);
          $report_id = $this->uri->segment(4);
          $records['report'] =$this->Lead_Model->view_report_detail($project_id, $report_id); 
          $records['data_interior_designer'] =$this->Lead_Model->view_interior_designer_single($project_id, $report_id); 
          $records['data_cover_designer'] =$this->Lead_Model->view_cover_designer_single($project_id, $report_id); 
          $records['data_front_cover_designer'] =$this->Lead_Model->view_front_cover_designer($project_id); 
          $records['data_back_cover_designer'] =$this->Lead_Model->view_back_cover_designer($project_id); 
          $records['user_authors']= $this->User_Model->select_author_user();
          $records['user_author_single']= $this->Lead_Model->view_author_id($project_id, $report_id);
          $records['report_id'] = $this->uri->segment(4);


          $this->load->view('update_report', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

         
          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name_exist();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $project_id = $this->uri->segment(3);
          $report_id = $this->uri->segment(4);
          $records['report'] =$this->Lead_Model->view_report_detail($project_id, $report_id); 
          $records['data_interior_designer'] =$this->Lead_Model->view_interior_designer_single($project_id, $report_id); 
          $records['data_cover_designer'] =$this->Lead_Model->view_cover_designer_single($project_id, $report_id); 
          $records['data_front_cover_designer'] =$this->Lead_Model->view_front_cover_designer($project_id); 
          $records['data_back_cover_designer'] =$this->Lead_Model->view_back_cover_designer($project_id); 
          $records['user_authors']= $this->User_Model->select_author_user();
          $records['user_author_single']= $this->Lead_Model->view_author_id($project_id, $report_id);
          $records['report_id'] = $this->uri->segment(4);

              $this->load->view('template/header_admin', $records);
              $this->load->view('template/sidebar_admin', $records);
              $this->load->view('update_report_admin', $records);
              $this->load->view('template/footer_admin', $records);


      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

         
         
          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name_exist();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $project_id = $this->uri->segment(3);
          $report_id = $this->uri->segment(4);
          $records['report'] =$this->Lead_Model->view_report_detail($project_id, $report_id); 
          $records['data_interior_designer'] =$this->Lead_Model->view_interior_designer_single($project_id, $report_id); 
          $records['data_cover_designer'] =$this->Lead_Model->view_cover_designer_single($project_id, $report_id); 
          $records['data_front_cover_designer'] =$this->Lead_Model->view_front_cover_designer($project_id); 
          $records['data_back_cover_designer'] =$this->Lead_Model->view_back_cover_designer($project_id); 
          $records['user_authors']= $this->User_Model->select_author_user();
          $records['user_author_single']= $this->Lead_Model->view_author_id($project_id, $report_id);
          $records['report_id'] = $this->uri->segment(4);

          $this->load->view('update_report_manager', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Publishing/Marketing"){

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name_exist();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $project_id = $this->uri->segment(3);
          $report_id = $this->uri->segment(4);
          $records['report'] =$this->Lead_Model->view_report_detail($project_id, $report_id); 
          $records['data_interior_designer'] =$this->Lead_Model->view_interior_designer_single($project_id, $report_id); 
          $records['data_cover_designer'] =$this->Lead_Model->view_cover_designer_single($project_id, $report_id); 
          $records['data_front_cover_designer'] =$this->Lead_Model->view_front_cover_designer($project_id); 
          $records['data_back_cover_designer'] =$this->Lead_Model->view_back_cover_designer($project_id); 

          $records['report_id'] = $this->uri->segment(4);


          $this->load->view('update_report', $records);

      }

    }

      


      public function book_categories(){

       $lead_data = array();

          if ($this->session->userdata['userlogin']['usertype'] == "Production"){

              $lead_data = 

              $records['author_reports']= $this->Lead_Model->report_lead();

              $records['author_names']= $this->Lead_Model->select_author_name();

              $this->load->view('book_category', $records);

        }



    }



      public function add_report(){
        // echo $this->input->post('service_offered');
        // exit();
       $date_report = date('Y-m-d H:i:s');

       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       $usertype = $this->session->userdata['userlogin']['usertype'];

       $this->form_validation->set_rules('project_status','Project Status','trim|required|xss_clean'); 

      $this->form_validation->set_rules('publisher_id','Publisher User ','trim|required|xss_clean'); 

       $this->form_validation->set_rules('project_id','Project ID','trim|required|xss_clean'); 

       $this->form_validation->set_rules('pen_name','Pen Name','trim|required|xss_clean'); 

       $this->form_validation->set_rules('number_of_book','Number of Book','trim|required|xss_clean'); 

       $this->form_validation->set_rules('book_categories','Book Categories','trim|required|xss_clean'); 

       $this->form_validation->set_rules('book_color','Book Color','trim|required|xss_clean'); 

       $this->form_validation->set_rules('book_size','Book Size','trim|required|xss_clean'); 

       $this->form_validation->set_rules('color_type','Paper Color Type','trim|required|xss_clean'); 

       $this->form_validation->set_rules('about_author','','trim|required|xss_clean'); 

       $this->form_validation->set_rules('mailing_address','Mailing Address','trim|required|xss_clean'); 

       $this->form_validation->set_rules('author_picture','Author"s Picture','trim|required|xss_clean'); 
       $this->form_validation->set_rules('author_id','Author"s User','trim|required|xss_clean'); 

       $page_number = $this->input->post('page_number') ? $this->input->post('page_number') : array();
       $front_back_cover = $this->input->post('front_back_cover') ? $this->input->post('front_back_cover') : null;
       $select_cover_designer = $this->Lead_Model->select_cover_designer_id($this->input->post('project_id'));
       $select_report = $this->Lead_Model->select_cover_designer_id($this->input->post('project_id'));
       // $remark = $this->input->post('remark')? $this->input->post('remark') : null;

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

      
               $data = array(

                           // 'activity' => $value,

                           'project_id' => $this->input->post('project_id'),
                           'author_id' => $this->input->post('author_id'),

                           'project_status' => $this->input->post('project_status'),

                           'pen_name' => $this->input->post('pen_name'),

                           'number_of_books' => $this->input->post('number_of_book'),

                           'book_categories' => $this->input->post('book_categories'),

                           'book_size' => $this->input->post('book_size'),

                           'book_colortype' => $this->input->post('color_type'),

                           'book_color' => $this->input->post('book_color'),

                           'hard_cover_format' => $this->input->post('hard_cover_format'),

                           'about_author' => $this->input->post('about_author'),

                           'about_book' => $this->input->post('about_book'),

                           'audience' => $this->input->post('audience'),

                           'cover_design_ints' => $this->input->post('cover_design'),

                           'interior_design_ints' => $this->input->post('interior_design'),

                           'cover_designer' => $this->input->post('cover_designer'),

                           'interior_designer' => $this->input->post('interior_designer'),

                           'mailing_address' => $this->input->post('mailing_address'),

                           'publishing_name' => $this->input->post('publishing_name'),

                           'publishing_logo_ints' => $this->input->post('publishing_logo'),

                           'author_picture' => $this->input->post('author_picture'),

                           'services_offered' => $this->input->post('service_offered'),
                           'publisher_id' => $this->input->post('publisher_id'),
                           'create_user' => 'production',
                           'report_status' => 'Approved',


                           // 'due_date' => date("Y-m-d h:i:s", strtotime(str_replace('/', '-', $this->input->post('due_date')[$index]))),

                           // 'bud_get' => $this->input->post('bud_get')[$index],

                           // 'percentage' => $this->input->post('percentage')[$index],

                           // 'remark' => $this->input->post('remark')[$index],

                           'date_report' => $date_report,

                         );

                $this->Lead_Model->insert_author_report($data);

                $get_last_id = $this->db->insert_id();

                foreach ($page_number as $index => $value) {

                      $data_interior_designer= array(

                           'page_no' => $value,
                           'interior_user_id' => $this->input->post('interior_designer'),
                           'publisher_id' => $this->input->post('publisher_id'),
                           'report_id' => $get_last_id,
                           'project_id' => $this->input->post('project_id'),
                           'paragraph_no' => $this->input->post('paragraph_number')[$index],
                           'line_no' => $this->input->post('line_number')[$index],
                           'actual_sentence' => $this->input->post('actual_sentence')[$index],
                           'correct_sentence' => $this->input->post('correct_sentence')[$index],

                         );
                      // if(empty($data_interior_designer)){
                      //     echo "false";
                      // }
                      // else{
                      //     echo "true";
                      // }
                      // exit();
                   $this->Lead_Model->insert_interior_designer($data_interior_designer);
           }

          foreach ($front_back_cover as $index => $value) {

               $data_cover_designer= array(
                           'front_back_cover' => $value,
                           'cover_user_id' => $this->input->post('cover_designer'),
                           'publisher_id' => $this->input->post('publisher_id'),
                           'report_id' => $get_last_id,
                           'project_id' => $this->input->post('project_id'),
                           'actual_cover' => $this->input->post('actual_cover')[$index],
                           'correct_cover' => $this->input->post('correct_cover')[$index],
                           'status_cover' => $this->input->post('status_cover')[$index],

                         );
                if ($select_cover_designer == true){
                    $this->Lead_Model->insert_cover_designer($data_cover_designer);
                  }
            }
                   $receive_user_notify = $this->User_Model->select_user_specify_notify_remark($this->session->userdata['userlogin']['user_id']);


                     $data_report_history = array(

                           'project_id' => $this->input->post('project_id'),

                           'status_history' => $user_charge .' has changed' .' '. $this->input->post('project_status') .' project status'  ,

                           'date_history' => date('Y-m-d h:i:s a'),

                           'user_charge' => $user_charge,

                           'usertype' => $usertype,

                         );

                      $this->Lead_Model->insert_history_author_report($data_report_history);

                     $this->Lead_Model->update_lead(array('used' => 1), $this->input->post('project_id') );




                foreach ($receive_user_notify as $value) {
                      $data_notification = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => 'Added Report',
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->post('project_id'),
                           'to_user_id' => $value['user_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
                   $this->Notification_Model->insert($data_notification);
             }

                    $data_notification_publisher = array(
                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => 'Added Report',
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'id' =>  $this->input->post('project_id'),
                           'link' =>  dirname(base_url(uri_string())),
                           'to_user_id' => $this->input->post('publisher_id'),
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],
                         );
                      $this->Notification_Model->insert($data_notification_publisher);


                   $data_notification_author = array(
                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => 'Added Author Milestone',
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'id' =>  $this->input->post('project_id'),
                           'link' =>  dirname(base_url(uri_string())),
                           'to_user_id' => $this->input->post('author_id'),
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],
                         );

                         $this->Notification_Model->insert_author_notification($data_notification_author);



             echo json_encode(array("response" => "success", "message" => "Successfully Added Report", "redirect" => base_url('account')));





        }

    }

// public function update_report(){


//        $date_report = date('Y-m-d h:i:s a');

//        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

//        $usertype = $this->session->userdata['userlogin']['usertype'];

//        $this->form_validation->set_rules('project_status','Project Status','trim|required|xss_clean'); 

//        $this->form_validation->set_rules('project_id','Project ID','trim|required|xss_clean'); 

//        // $this->form_validation->set_rules('pen_name','Pen Name','trim|required|xss_clean'); 

//        // $this->form_validation->set_rules('number_of_book','Number of Book','trim|required|xss_clean'); 

//        // $this->form_validation->set_rules('book_categories','Book Categories','trim|required|xss_clean'); 

//        // $this->form_validation->set_rules('book_color','Book Color','trim|required|xss_clean'); 

//        // $this->form_validation->set_rules('book_size','Book Size','trim|required|xss_clean'); 

//        // $this->form_validation->set_rules('color_type','Paper Color Type','trim|required|xss_clean'); 

//        // $this->form_validation->set_rules('about_author','','trim|required|xss_clean'); 

//        // $this->form_validation->set_rules('mailing_address','Mailing Address','trim|required|xss_clean'); 

//        $page_number = $this->input->post('page_number') ? $this->input->post('page_number') : array();
//        $front_back_cover = $this->input->post('front_back_cover') ? $this->input->post('front_back_cover') : null;

//        // $remark = $this->input->post('remark')? $this->input->post('remark') : null;

//        if ($this->form_validation->run() == FALSE){

//             echo json_encode(array("response" => "error", "message" => validation_errors()));

//        } 

//        else{

      
//                $data = array(

//                            // 'activity' => $value,

//                            'project_status' => $this->input->post('project_status'),

//                            'pen_name' => $this->input->post('pen_name'),

//                            'number_of_books' => $this->input->post('number_of_book'),

//                            'book_categories' => $this->input->post('book_categories'),

//                            'book_size' => $this->input->post('book_size'),

//                            'book_colortype' => $this->input->post('color_type'),

//                            'book_color' => $this->input->post('book_color'),

//                            'hard_cover_format' => $this->input->post('hard_cover_format'),

//                            'about_author' => $this->input->post('about_author'),

//                            'about_book' => $this->input->post('about_book'),

//                            'audience' => $this->input->post('audience'),

//                            'cover_design_ints' => $this->input->post('cover_design'),

//                            'interior_design_ints' => $this->input->post('interior_design'),

//                            'cover_designer' => $this->input->post('cover_designer'),

//                            'interior_designer' => $this->input->post('interior_designer'),

//                            'mailing_address' => $this->input->post('mailing_address'),

//                            'publishing_name' => $this->input->post('publishing_name'),

//                            'publishing_logo_ints' => $this->input->post('publishing_logo'),

//                            'author_picture' => $this->input->post('author_picture'),

//                            'services_offered' => $this->input->post('service_offered'),

//                            // 'due_date' => date("Y-m-d h:i:s", strtotime(str_replace('/', '-', $this->input->post('due_date')[$index]))),

//                            // 'bud_get' => $this->input->post('bud_get')[$index],

//                            // 'percentage' => $this->input->post('percentage')[$index],

//                            // 'remark' => $this->input->post('remark')[$index],

//                            'date_report' => $date_report,

//                          );

//                 $this->Lead_Model->update_report($data, $this->input->post('report_id'));

//                 // $get_last_id = $this->db->insert_id();

//                 foreach ($page_number as $index => $value) {

//                       $data_interior_designer= array(

//                            'page_no' => $value,
//                            'interior_user_id' => $this->input->post('interior_designer'),
//                            'report_id' => $this->input->post('report_id'),
//                            'project_id' => $this->input->post('project_id2'),
//                            'publisher_id' => $this->input->post('publisher_id'),
//                            'paragraph_no' => $this->input->post('paragraph_number')[$index],
//                            'line_no' => $this->input->post('line_number')[$index],
//                            'actual_sentence' => $this->input->post('actual_sentence')[$index],
//                            'correct_sentence' => $this->input->post('correct_sentence')[$index],

//                          );
//                    $get_interior = $this->Lead_Model->select_interior_id($this->input->post('interior_id')[$index]);

//                    if($get_interior == true){
//                          $this->Lead_Model->update_interior_designer($data_interior_designer, $this->input->post('interior_id')[$index]);
//                    }
//                    else{
//                          $this->Lead_Model->insert_interior_designer($data_interior_designer);
//                    }
//            }

//           foreach ($front_back_cover as $index => $value) {

//                $data_cover_designer= array(
//                            'front_back_cover' => $value,
//                            'cover_user_id' => $this->input->post('cover_designer'),
//                            'publisher_id' => $this->input->post('publisher_id'),
//                            'report_id' => $this->input->post('report_id'),
//                            'project_id' => $this->input->post('project_id2'),
//                            'actual_cover' => $this->input->post('actual_cover')[$index],
//                            'correct_cover' => $this->input->post('correct_cover')[$index],
//                            'status_cover' => $this->input->post('status_cover')[$index],


//                          );
//                  $this->Lead_Model->update_cover_designer($data_cover_designer, $this->input->post('designer_id')[$index]);
//            }

//                      $data_report_history = array(

//                            'project_id' => $this->input->post('project_id'),

//                            'status_history' => $user_charge .' has changed' .' '. $this->input->post('project_status') .' project status'  ,

//                            'date_history' => date('Y-m-d h:i:s a'),

//                            'user_charge' => $user_charge,

//                            'usertype' => $usertype,

//                          );

//                       $this->Lead_Model->insert_history_author_report($data_report_history);


//              echo json_encode(array("response" => "success", "message" => "Successfully Added Report", "redirect" => base_url('account')));





//         }

//     }


public function update_report(){

     // echo $this->input->post('book_categories');
     // exit();
       $date_report = date('Y-m-d H:i:s');

       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       $usertype = $this->session->userdata['userlogin']['usertype'];

       $this->form_validation->set_rules('project_status','Project Status','trim|required|xss_clean'); 

       $this->form_validation->set_rules('project_id','Project ID','trim|required|xss_clean'); 

       // $this->form_validation->set_rules('pen_name','Pen Name','trim|required|xss_clean'); 

       // $this->form_validation->set_rules('number_of_book','Number of Book','trim|required|xss_clean'); 

       // $this->form_validation->set_rules('book_categories','Book Categories','trim|required|xss_clean'); 

       // $this->form_validation->set_rules('book_color','Book Color','trim|required|xss_clean'); 

       // $this->form_validation->set_rules('book_size','Book Size','trim|required|xss_clean'); 

       // $this->form_validation->set_rules('color_type','Paper Color Type','trim|required|xss_clean'); 

       // $this->form_validation->set_rules('about_author','','trim|required|xss_clean'); 

       // $this->form_validation->set_rules('mailing_address','Mailing Address','trim|required|xss_clean'); 

       $page_number = $this->input->post('page_number') ? $this->input->post('page_number') : array();
       $front_back_cover = $this->input->post('front_back_cover') ? $this->input->post('front_back_cover') : null;

       // $remark = $this->input->post('remark')? $this->input->post('remark') : null;

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

      
               $data = array(

                           // 'activity' => $value,

                           'project_status' => $this->input->post('project_status'),
                           'publisher_id' => $this->input->post('publisher_id'),


                           'pen_name' => $this->input->post('pen_name'),

                           'number_of_books' => $this->input->post('number_of_book'),

                           'book_categories' => $this->input->post('book_categories'),

                           'book_size' => $this->input->post('book_size'),

                           'book_colortype' => $this->input->post('color_type'),

                           'book_color' => $this->input->post('book_color'),

                           'hard_cover_format' => $this->input->post('hard_cover_format'),

                           'about_author' => $this->input->post('about_author'),

                           'about_book' => $this->input->post('about_book'),

                           'audience' => $this->input->post('audience'),

                           'cover_design_ints' => $this->input->post('cover_design'),

                           'interior_design_ints' => $this->input->post('interior_design'),

                           'cover_designer' => $this->input->post('cover_designer'),

                           'interior_designer' => $this->input->post('interior_designer'),

                           'mailing_address' => $this->input->post('mailing_address'),

                           'publishing_name' => $this->input->post('publishing_name'),

                           'publishing_logo_ints' => $this->input->post('publishing_logo'),

                           'author_picture' => $this->input->post('author_picture'),

                           'services_offered' => $this->input->post('service_offered'),
                           'author_id' => $this->input->post('author_id'),

                           // 'due_date' => date("Y-m-d h:i:s", strtotime(str_replace('/', '-', $this->input->post('due_date')[$index]))),

                           // 'bud_get' => $this->input->post('bud_get')[$index],

                           // 'percentage' => $this->input->post('percentage')[$index],

                           // 'remark' => $this->input->post('remark')[$index],

                           'date_report' => $date_report,

                         );
                $this->Lead_Model->update_report($data, $this->input->post('report_id'));



                $data_interior_designer= array(
                           'interior_user_id' => $this->input->post('publisher_id'),
                           'report_id' => $this->input->post('report_id'),
                           'project_id' => $this->input->post('project_id'),
                           'publisher_id' => $this->input->post('publisher_id'),

                         );

  
               $get_interior_designer =$this->Lead_Model->view_interior_designer_single($this->input->post('project_id'), $this->input->post('report_id')); 

               if ($get_interior_designer == false){
                     $this->Lead_Model->insert_interior_designer($data_interior_designer);

               }
               else{
                   $this->Lead_Model->update_interior_designer_report_id($data_interior_designer, $this->input->post('report_id'));
               }


  
                $data_cover_designer= array(
                           'cover_user_id' => $this->input->post('publisher_id'),
                           'publisher_id' => $this->input->post('publisher_id'),
                           'report_id' => $this->input->post('report_id'),
                           'project_id' => $this->input->post('project_id'),


                         );

               $get_cover_designer=$this->Lead_Model->view_cover_designer_single($this->input->post('project_id'), $this->input->post('report_id')); 
             if ($get_cover_designer == "false"){
                    $this->Lead_Model->insert_cover_designer($data_cover_designer);

               }
               else{
                 $this->Lead_Model->update_cover_designer_report_id($data_cover_designer, $this->input->post('report_id'));
               }

 
                     $data_report_history = array(

                           'project_id' => $this->input->post('project_id'),

                           'status_history' => $user_charge .' has changed' .' '. $this->input->post('project_status') .' project status'  ,

                           'date_history' => date('Y-m-d h:i:s a'),

                           'user_charge' => $user_charge,

                           'usertype' => $usertype,

                         );

                      $this->Lead_Model->insert_history_author_report($data_report_history);

                      $receive_user_notify_report = $this->User_Model->select_user_report($this->session->userdata['userlogin']['user_id']);
                      $receive_publisher_notification = $this->Lead_Model->select_publisher_project_id($this->input->post('project_id'));

                         foreach ($receive_user_notify_report as $value) {
                                  $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Updated Report',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'id' =>  $this->input->post('project_id'),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                       }

                           $data_notification_publisher = array(
                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => "Updated Report",
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'id' =>  $this->input->post('project_id'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'to_user_id' => $this->input->post('publisher_id'),
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                               );
                              $this->Notification_Model->insert($data_notification_publisher);


                      $data_notification_author = array(
                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => 'Updated Author Milestone',
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'id' =>  $this->input->post('project_id'),
                           'link' =>  dirname(base_url(uri_string())),
                           'to_user_id' => $this->input->post('author_id'),
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],
                         );

                         $this->Notification_Model->insert_author_notification($data_notification_author);
     


             echo json_encode(array("response" => "success", "message" => "Successfully updated Report", "redirect" => base_url('account')));



        }

    }


    public function update_line_word(){

     // echo $this->input->post('book_categories');
     // exit();
       $date_report = date('Y-m-d H:i:s');

       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       $usertype = $this->session->userdata['userlogin']['usertype'];


       $page_number = $this->input->post('page_number') ? $this->input->post('page_number') : array();
       // $front_back_cover = $this->input->post('front_back_cover') ? $this->input->post('front_back_cover') : null;


          foreach ($page_number as $index => $value) {

                $data_interior_designer= array(

                     'page_no' => $value,
                     'project_id' => $this->input->post('project_id'),
                     'paragraph_no' => $this->input->post('paragraph_number')[$index],
                     'line_no' => $this->input->post('line_number')[$index],
                     'actual_sentence' => $this->input->post('actual_sentence')[$index],
                     'correct_sentence' => $this->input->post('correct_sentence')[$index],

                   );
             $get_interior = $this->Lead_Model->select_interior_id($this->input->post('interior_id')[$index]);

             if($get_interior == true){
                   $this->Lead_Model->update_interior_designer($data_interior_designer, $this->input->post('interior_id')[$index]);
             }
             else{
                   $this->Lead_Model->insert_interior_designer($data_interior_designer);
             }
           }
          

          // foreach ($front_back_cover as $index => $value) {

          //      $data_cover_designer= array(
          //                  'front_back_cover' => $value,
          //                  'cover_user_id' => $this->input->post('cover_designer'),
          //                  'publisher_id' => $this->input->post('publisher_id'),
          //                  'report_id' => $this->input->post('report_id'), 
          //                  'project_id' => $this->input->post('project_id2'),
          //                  'actual_cover' => $this->input->post('actual_cover')[$index],
          //                  'correct_cover' => $this->input->post('correct_cover')[$index],
          //                  'status_cover' => $this->input->post('status_cover')[$index],


          //                );
          //        $this->Lead_Model->update_cover_designer($data_cover_designer, $this->input->post('designer_id')[$index]);
          //  }

                     $data_report_history = array(

                           'project_id' => $this->input->post('project_id'),

                           'status_history' => $user_charge .' has changed' .'  Lines Words'  ,

                           'date_history' => date('Y-m-d h:i:s a'),

                           'user_charge' => $user_charge,

                           'usertype' => $usertype,

                         );

                      $this->Lead_Model->insert_history_author_report($data_report_history);

                     $receive_user_notify_report = $this->User_Model->select_user_report($this->session->userdata['userlogin']['user_id']);
                      $receive_publisher_notification = $this->Lead_Model->select_publisher_project_id($this->input->post('project_id'));

                       foreach ($receive_user_notify_report as $value) {
                                  $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Updated Lines/Words',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'id' =>  $this->input->post('project_id'),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                       }

                        if($receive_publisher_notification !=false){
                           $data_notification_publisher = array(
                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => 'Updated Lines/Words',
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'id' =>  $this->input->post('project_id'),
                                 'to_user_id' => $receive_publisher_notification['publisher_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                               );
                              $this->Notification_Model->insert($data_notification_publisher);
                        }
     




             echo json_encode(array("response" => "success", "message" => "Successfully updated Lines/Words", "redirect" => base_url('account')));



        }




   public function update_front_cover(){

     // echo $this->input->post('book_categories');
     // exit();
       $date_report = date('Y-m-d H:i:s');

       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       $usertype = $this->session->userdata['userlogin']['usertype'];

       $front_back_cover = $this->input->post('front_back_cover') ? $this->input->post('front_back_cover') : null;

          $get_cover_designer=$this->Lead_Model->view_cover_designer_single($this->input->post('project_id'), $this->input->post('report_id')); 


          foreach ($front_back_cover as $index => $value) {

               $data_cover_designer= array(
                           'front_back_cover' => $value,
                           'project_id' => $this->input->post('project_id'),
                           'report_id' => $this->input->post('report_id'),
                           'actual_cover' => $this->input->post('actual_cover')[$index],
                           'correct_cover' => $this->input->post('correct_cover')[$index],
                           'status_cover' => 'front_cover'


                         );
               if($get_cover_designer == "false"){
                     $this->Lead_Model->insert_cover_designer($data_cover_designer);

              }
              else{
                $this->Lead_Model->update_cover_designer($data_cover_designer, $this->input->post('designer_id')[$index]);


              }

           }

                     $data_report_history = array(

                           'project_id' => $this->input->post('project_id'),

                           'status_history' => $user_charge .' has changed' .'  Lines Words'  ,

                           'date_history' => date('Y-m-d H:i:s'),

                           'user_charge' => $user_charge,

                           'usertype' => $usertype,

                         );

                      $this->Lead_Model->insert_history_author_report($data_report_history);

                     $receive_user_notify_report = $this->User_Model->select_user_report($this->session->userdata['userlogin']['user_id']);
                     $receive_publisher_notification = $this->Lead_Model->select_publisher_project_id($this->input->post('project_id'));
                     $receive_author_notification = $this->Lead_Model->select_author_report_id($this->input->post('report_id'));

                       foreach ($receive_user_notify_report as $value) {
                                  $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Updated Front Cover',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'id' =>  $this->input->post('project_id'),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                       }

                        if($receive_publisher_notification !=false){
                           $data_notification_publisher = array(
                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => 'Updated Front Cover',
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'id' =>  $this->input->post('project_id'),
                                 'to_user_id' => $receive_publisher_notification['publisher_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                               );
                              $this->Notification_Model->insert($data_notification_publisher);
                        }

                     if($receive_author_notification !=false){
                             $data_notification_author = array(
                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => 'Updated Front Cover',
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'id' =>  $this->input->post('project_id'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'to_user_id' => $receive_author_notification['author_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],
                               );

                           $this->Notification_Model->insert_author_notification($data_notification_author);
                    }



             echo json_encode(array("response" => "success", "message" => "Successfully updated Front Cover", "redirect" => base_url('account')));

    }
        public function update_back_cover(){

     // echo $this->input->post('book_categories');
     // exit();
       $date_report = date('Y-m-d H:i:s');

       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

       $usertype = $this->session->userdata['userlogin']['usertype'];

       $front_back_cover = $this->input->post('front_back_cover') ? $this->input->post('front_back_cover') : null;
       $get_cover_designer=$this->Lead_Model->view_back_cover_designer_single($this->input->post('project_id'), $this->input->post('report_id')); 


          foreach ($front_back_cover as $index => $value) {

               $data_cover_designer= array(
                           'front_back_cover' => $value,
                           'project_id' => $this->input->post('project_id'),
                           'report_id' => $this->input->post('report_id'),
                           'actual_cover' => $this->input->post('actual_cover')[$index],
                           'correct_cover' => $this->input->post('correct_cover')[$index],
                           'status_cover' => 'back_cover',

                         );
             if($get_cover_designer == "false"){
                  $this->Lead_Model->insert_cover_designer($data_cover_designer);

              }
              else{
                 $this->Lead_Model->update_cover_designer($data_cover_designer, $this->input->post('designer_id')[$index]);

              }
           }

                     $data_report_history = array(

                           'project_id' => $this->input->post('project_id'),

                           'status_history' => $user_charge .' has changed' .'  Lines Words'  ,

                           'date_history' => date('Y-m-d H:i:s'),

                           'user_charge' => $user_charge,

                           'usertype' => $usertype,

                         );

                      $this->Lead_Model->insert_history_author_report($data_report_history);

                     $receive_user_notify_report = $this->User_Model->select_user_report($this->session->userdata['userlogin']['user_id']);
                     $receive_publisher_notification = $this->Lead_Model->select_publisher_project_id($this->input->post('project_id'));
                     $receive_author_notification = $this->Lead_Model->select_author_report_id($this->input->post('report_id'));

                       foreach ($receive_user_notify_report as $value) {
                                  $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Updated Back Cover',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'id' =>  $this->input->post('project_id'),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                       }
                       if($receive_publisher_notification !=false){
                           $data_notification_publisher = array(
                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => 'Updated Back Cover',
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'id' =>  $this->input->post('project_id'),
                                 'to_user_id' => $receive_publisher_notification['publisher_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                               );
                              $this->Notification_Model->insert($data_notification_publisher);
                        }

                        if($receive_author_notification !=false){
                             $data_notification_author = array(
                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => 'Updated Back Cover',
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'id' =>  $this->input->post('project_id'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'to_user_id' => $receive_author_notification['author_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],
                               );

                            $this->Notification_Model->insert_author_notification($data_notification_author);
                  }

             echo json_encode(array("response" => "success", "message" => "Successfully updated Back Cover", "redirect" => base_url('account')));

        }



     public function delete_report() { 



      $date_report = date('Y-m-d h:i:s a');

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

      $usertype = $this->session->userdata['userlogin']['usertype'];

      $count = $this->Lead_Model->select_count_report($this->input->get('project_id')); 

      if ($count > 1){

           $this->Lead_Model->delete_report($this->input->get('report_id')); 



             if ($this->input->get('access') == 1){

                    $data_report_history = array(

                           'project_id' => $this->input->get('project_id'),

                           'status_history' => 'Deleted Activities',

                           'date_history' => date('Y-m-d h:i:s a'),

                           'user_charge' => $user_charge,

                           'usertype' => $usertype,

                         );

                 $this->Lead_Model->insert_history_author_report($data_report_history);





          }



           echo json_encode(array("response" => "success", "message" => "Successfully Deleted Report", "redirect" => base_url('account')));

      }

      else{

           echo json_encode(array("response" => "error", "message" => "Can't Deleted Report", "redirect" => base_url('account')));

      }


      }

     public function delete_line_words() { 


      $date_report = date('Y-m-d H:i:s');

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

      $usertype = $this->session->userdata['userlogin']['usertype'];


      $this->Lead_Model->delete_line_word($this->input->get('interior_id')); 


                    $data_report_history = array(

                           'project_id' => $this->input->get('project_id'),

                           'status_history' => 'Deleted Activities',

                           'date_history' => date('Y-m-d h:i:s a'),

                           'user_charge' => $user_charge,

                           'usertype' => $usertype,

                         );

        echo json_encode(array("response" => "success", "message" => "Successfully Deleted Report", "redirect" => base_url('account')));

      }


     public function update_cover_designer_report(){

         $payment_status = '';

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('status_payment','Status Payment','trim|xss_clean|required');       

    

         if ($this->form_validation->run() == FALSE){

              echo json_encode(array("response" => "error", "message" => validation_errors()));

         } 

         else{

            $data =    array(

                             'report_id' => $this->input->post('report_id'),

                             'project_id' => $this->input->post('project_id'),

                             'user_id' => $this->input->post('user_id'),

                             'status_payment' => $this->input->post('status_payment'),

                             'cover_user_charge'  => $user_charge,   

                             'cover_user_type'  => $usertype,   

                         );


              $this->Lead_Model->insert_data_designer($data);

               $data_report_designer_history = array(

                           'project_id' => $this->input->post('project_id'), 

                           'report_id' => $this->input->post('report_id'),

                           'user_id' => $this->input->post('user_id'),

                           'status_history_designer' => $user_charge .' has changed' .' '. $this->input->post('status_payment') .' Status Payment',

                           'date_history_designer' => date('Y-m-d h:i:s a'),

                           'user_charge' => $user_charge,

                           'user_type' => $usertype,

                         );

                      $this->Lead_Model->insert_designer_history($data_report_designer_history);
              echo json_encode(array("response" =>   "success", "message"  => "Successfully Updated Status Payment", "redirect" => base_url('dashboard')));

        }

    }

     public function update_interior_designer_report(){

         $payment_status = '';

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('status_payment','Status Payment','trim|xss_clean|required');       

    

         if ($this->form_validation->run() == FALSE){

              echo json_encode(array("response" => "error", "message" => validation_errors()));

         } 

         else{

            $data =    array(

                             'report_id' => $this->input->post('report_id'),

                             'project_id' => $this->input->post('project_id'),

                             'user_id' => $this->input->post('user_id'),

                             'status_payment' => $this->input->post('status_payment'),

                             'cover_user_charge'  => $user_charge,   

                             'cover_user_type'  => $usertype,   

                         );




              $this->Lead_Model->insert_data_designer($data);

                   $data_report_designer_history = array(

                           'project_id' => $this->input->post('project_id'), 

                           'report_id' => $this->input->post('report_id'),

                           'user_id' => $this->input->post('user_id'),

                           'status_history_designer' => $user_charge .' has changed' .' '. $this->input->post('status_payment') .' Status Payment',

                           'date_history_designer' => date('Y-m-d h:i:s a'),

                           'user_charge' => $user_charge,

                           'user_type' => $usertype,

                         );

                $this->Lead_Model->insert_designer_history($data_report_designer_history);

              echo json_encode(array("response" =>   "success", "message"  => "Successfully Updated Status Payment", "redirect" => base_url('dashboard')));

        }

    }

       public function update_report_designer_transaction(){

         $payment_status = '';
         $transaction_payment_designer = array();
         $designer_report = array();

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];
         $charge_incurred = $this->input->post('charge_incurred') ? $this->input->post('charge_incurred') : array();
         $remark = $this->input->post('remark') ? $this->input->post('remark') : array();


         $this->form_validation->set_rules('project_status','Project Status','trim|xss_clean');       
         $this->form_validation->set_rules('status_payment','Status Payment','trim|xss_clean');       
         $this->form_validation->set_rules('date_delivered','Date Delivered','trim|xss_clean');       

    

         if ($this->form_validation->run() == FALSE){

              echo json_encode(array("response" => "error", "message" => validation_errors()));

         } 

         else{

            $data =   array(

                             'report_id' => $this->input->post('report_id'),

                             'project_id' => $this->input->post('project_id'),

                             'designer_user_id' => $this->input->post('user_id'),

                             'status_payment' => $this->input->post('status_payment'),
                             'total_amount' =>  str_replace("Php :","",$this->input->post('total_amount')),
                             'date_delivered' => $this->input->post('date_delivered') == "" ? NULL : date("Y-m-d h:i:s", strtotime(str_replace('/', '-', $this->input->post('date_delivered')))),
                             'date_completed' => $this->input->post('project_status') != "Approved For Completion" ? NULL : date("Y-m-d h:i:s", strtotime(str_replace('/', '-', $this->input->post('date_delivered')))),

                             'project_status_designer' => $this->input->post('project_status'),

                             'cover_user_charge'  => $user_charge,   

                             'cover_user_type'  => $usertype,   

                         );
                    $designer_report = $this->Lead_Model->select_report_designer($this->input->post('designer_report_id'), $this->input->post('designer_report_id'));
                         if ($designer_report == true){
                               $this->Lead_Model->update_report_designer($data, $this->input->post('designer_report_id'));
                         }
                         else{
                             $this->Lead_Model->insert_data_designer($data);

                         }


                foreach ($charge_incurred as $index => $value) {

                            $data_designer_transaction = array(

                                 'charge_incurred' => $value,
                                 'report_id' => $this->input->post('report_id'),
                                 'project_id' => $this->input->post('project_id'),
                                 'user_id' => $this->input->post('user_id'),
                                 'transaction_id' => $this->input->post('transaction_id')[$index],
                                 'remarktr_designer' => $remark[$index]

                               );


                       $transaction_payment_designer = $this->Lead_Model->select_designer_transaction($data_designer_transaction['transaction_id']);
                         if ($transaction_payment_designer == true){
                              $this->Lead_Model->update_report_transaction($data_designer_transaction, $data_designer_transaction['transaction_id']);
                         }
                         else{
                            $this->Lead_Model->insert_designer_transaction($data_designer_transaction);

                         }
                 }
              

               $data_report_designer_history = array(

                           'project_id' => $this->input->post('project_id'), 

                           'report_id' => $this->input->post('report_id'),

                           'user_id' => $this->input->post('user_id'),

                           'status_history_designer' => $user_charge .' has changed' .' '. $this->input->post('status_payment') .' Status Payment',

                           'date_history_designer' => date('Y-m-d h:i:s a'),

                           'user_charge' => $user_charge,

                           'user_type' => $usertype,

                         );

               $this->Lead_Model->insert_designer_history($data_report_designer_history);
              echo json_encode(array("response" =>   "success", "message"  => "Successfully Updated Status Payment", "redirect" => base_url('dashboard')));

        }

    }






  public function add_subject(){

       $date_assign = date('Y-m-d h:i:s a');

       $this->form_validation->set_rules('subject','Subject Name','trim|required|xss_clean'); 

       $project_id = $this->input->post('project_id') ? $this->input->post('project_id') : array();

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{



          foreach ($project_id as $value) {



              $this->Lead_Model->update_lead_assign(array('subject' => $this->input->post('subject')), $value);

           }

              //   $data = array(

              //              'user_id_assign' => $this->session->userdata['userlogin']['user_id'],

              //              'user_id' => $this->input->post('manager'),

              //              'date_assign' => $date_assign,

              //            );



              // $this->User_Model->insert_assign_user($data);
              $receive_agent_notification = $this->Lead_Model->select_project_id($project_id);

                   $agent_notification= array(
                                     'from_user' => $user_charge,
                                     'to_user' => 'All',
                                     'message' => 'Added Subject',
                                     'unread' => 1,
                                     'date_notify' => date('Y-m-d H:i:s'),
                                     'link' =>  dirname(base_url(uri_string())),
                                     'to_user_id' => $receive_agent_notification['user_id'],
                                     'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
                                   );
               $this->Notification_Model->insert($agent_notification);
             echo json_encode(array("response" => "success", "message" => "Successfully Added  Subject", "redirect" => base_url('account')));

        }

    }



      public function update_subject(){

       $date_assign = date('Y-m-d h:i:s a');

       $this->form_validation->set_rules('subject','Subject Name','trim|required|xss_clean'); 

       $project_id = $this->input->post('project_id') ? $this->input->post('project_id') : array();

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{



          foreach ($project_id as $value) {



              $this->Lead_Model->update_lead_assign(array('subject' => $this->input->post('subject')), $value);

           }

              //   $data = array(

              //              'user_id_assign' => $this->session->userdata['userlogin']['user_id'],

              //              'user_id' => $this->input->post('manager'),

              //              'date_assign' => $date_assign,

              //            );



              // $this->User_Model->insert_assign_user($data);
               $receive_agent_notification = $this->Lead_Model->select_project_id($project_id);

                   $agent_notification= array(
                                     'from_user' => $user_charge,
                                     'to_user' => 'All',
                                     'message' => 'Updated Subject',
                                     'unread' => 1,
                                     'date_notify' => date('Y-m-d H:i:s'),
                                     'link' =>  dirname(base_url(uri_string())),
                                     'to_user_id' => $receive_agent_notification['user_id'],
                                     'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
                                   );
               $this->Notification_Model->insert($agent_notification);

             echo json_encode(array("response" => "success", "message" => "Successfully Added  Subject", "redirect" => base_url('account')));

        }

    }



    public function add_signature(){

      $signature_exist = $this->Signature_Model->select_signature_exist($this->session->userdata['userlogin']['user_id'], $this->input->post('signature'));

        

       if($signature_exist){

          $this->form_validation->set_rules('signature','Signature','trim|xss_clean|required|is_unique[tblsignature.signature]');

       }

       else{

          $this->form_validation->set_rules('signature','Signature','trim|xss_clean');



       }

      

      $this->form_validation->set_rules('description','Discription','trim|required');            

    

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       }



       else{

              $data = array(

                     'signature' => $this->input->post('signature'),

                     'user_id' => $this->session->userdata['userlogin']['user_id'],

                     'description' => $this->input->post('description'),

               );



            $this->Signature_Model->insert($data);



             echo json_encode(array("response" =>   "success", "message" => "Successfully Added Signature"));

        }

    }



    public function update_signature(){

      

      // echo $this->input->post('description');

      // exit();

        $signature_exist = $this->Signature_Model->select_signature_exist($this->session->userdata['userlogin']['user_id'], $this->input->post('signature'));



      if($signature_exist == true && $this->input->post('signature')  == $this->input->post('signature_exist')){

         $this->form_validation->set_rules('signature','Signature','trim|xss_clean|required');

       }

      else{

          $this->form_validation->set_rules('signature','Signature','trim|xss_clean|required|is_unique[tblsignature.signature]');

       }

      

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

              $data = array(

                     'signature' => $this->input->post('signature'),

                     'signature_id' => $this->input->post('signature_id'),

                     'description' => $this->input->post('description'),

               );



            $this->Signature_Model->update($data, $data['signature_id']);



             echo json_encode(array("response" =>   "success", "message" => "Successfully Updated Signature"));

        }

    }



  // public function add_category(){

  //      $date_create = date('Y-m-d h:i:s a');

  //      $book_category = $this->input->post('book_category') ? $this->input->post('book_category') : array();

  //      $book_size = $this->input->post('book_size') ? $this->input->post('book_size') : array();

  //      if ($this->form_validation->run() == FALSE){

  //           echo json_encode(array("response" => "error", "message" => validation_errors()));

  //      } 

  //      else{



  //         foreach ($book_category as $index => $value) {



  //              $data = array(

  //                          'book_category' => $value,

  //                          'book_size' => $book_size[$index],

  //                        );

  //            if (!empty($data['book_category']) && !empty($data['book_size'])){

  //                 $this->Lead_Model->insert_author_report($data);

  //             }



  //          }

  //             //   $data = array(

  //             //              'user_id_assign' => $this->session->userdata['userlogin']['user_id'],

  //             //              'user_id' => $this->input->post('manager'),

  //             //              'date_assign' => $date_assign,

  //             //            );



  //             // $this->User_Model->insert_assign_user($data);

  //            echo json_encode(array("response" => "success", "message" => "Successfully Added  Subject", "redirect" => base_url('account')));

  //       }

  //   }



public function email_template(){

      $this->load->view('email_template');



}





public function send_email(){



       $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required|valid_email');       

       $this->form_validation->set_rules('subject','Subject Name','trim|xss_clean|required');  

       $this->form_validation->set_rules('description','Description','trim|required');





       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

              $subject = $this->input->post('subject');

                 

              $data = array(

                     'description' => $this->input->post('description'),

                     'agent_name' => ucfirst($this->session->userdata['userlogin']['firstname']) .' '. ucfirst($this->session->userdata['userlogin']['lastname']),

                     'agent_email' => $this->session->userdata['userlogin']['emailaddress'],

                     'phone_number' => $this->session->userdata['userlogin']['contact_number'],

                     'position' => $this->session->userdata['userlogin']['position'],

               );



               $data_emailhistory = array(

                     'subject' => $this->input->post('subject'),

                     'message' => $this->input->post('description'),

                     'from' => $this->session->userdata['userlogin']['emailaddress'],

                     'to' => $this->input->post('email_address'),

                     'user_id' => $this->session->userdata['userlogin']['user_id'],

                     'usertype' => $this->session->userdata['userlogin']['usertype'],

                     'email_status' => 'Sent Email'

               );



                  $this->email->set_newline("\r\n");

                  $this->email->set_header('MIME-Version', '1.0; charset=utf-8');





                  $this->email->from('anselim2019@gmail.com');

                  $this->email->to('ansellim23@gmail.com');

                  $this->email->subject($subject);

                  $this->email->message($this->load->view('dashboard/email_template',$data,true)); 

        

                 //Send mail

                if($this->email->send()){

                      $this->Signature_Model->insert_email_history($data_emailhistory);



                      echo json_encode(array("response" => "success", "message" => "You are successfully sent email", "redirect" => base_url('account')));

                  }

                else{

                    echo json_encode(array("response" => "errorsend", "message" => "Failure: Email was not sent"));

                  }

            }



    }



// public function send_email_author(){



//        $this->form_validation->set_rules('email_address','Email Address','trim|xss_clean|required|valid_email');       

//        $this->form_validation->set_rules('subject','Subject Name','trim|required');  

//        $this->form_validation->set_rules('description','Description','trim|required');





//        if ($this->form_validation->run() == FALSE){

//             echo json_encode(array("response" => "error", "message" => validation_errors()));

//        } 

//        else{

//               $subject = $this->input->post('subject');

                 

//               $data = array(

//                      'description' => $this->input->post('description'),

//                      'agent_name' => ucfirst($this->session->userdata['userlogin']['firstname']) .' '. ucfirst($this->session->userdata['userlogin']['lastname']),

//                      'agent_email' => $this->session->userdata['userlogin']['emailaddress'],

//                      'phone_number' => $this->session->userdata['userlogin']['contact_number'],

//                      'position' => $this->session->userdata['userlogin']['position'],

//                );

//                 $data_emailhistory = array(

//                      'subject' => $this->input->post('subject'),

//                      'message' => $this->input->post('description'),

//                      'from' => $this->session->userdata['userlogin']['emailaddress'],

//                      'to' => $this->input->post('email_address'),

//                      'user_id' => $this->session->userdata['userlogin']['user_id'],

//                      'email_status' => 'Sent Email',

//                      'usertype' => $this->session->userdata['userlogin']['usertype']



//                );





//                   $this->email->set_newline("\r\n");

//                   $this->email->set_header('MIME-Version', '1.0; charset=utf-8');



//                   $this->email->from('anselim2019@gmail.com');

//                   $this->email->to('ansellim23@gmail.com');

//                   $this->email->subject($subject);

//                   $this->email->message($this->load->view('dashboard/email_template',$data,true)); 

        

//                  //Send mail

//                 if($this->email->send()){

//                       $this->Lead_Model->update_lead(array('send_status' => 1), $this->input->post('project_id'));

//                       $this->Signature_Model->insert_email_history($data_emailhistory);

//                       echo json_encode(array("response" => "success", "message" => "You are successfully sent email", "redirect" => base_url('account')));

//                   }

//                 else{

//                     echo json_encode(array("response" => "errorsend", "message" => "Failure: Email was not sent"));

//                   }

//             }



//     }

public function send_email_author(){

        $data_emailhistory = array(
             'subject' => $this->input->get('subject'),
             'project_id' => $this->input->get('project_id'),
             'from' => $this->session->userdata['userlogin']['emailaddress'],
             'user_id' => $this->session->userdata['userlogin']['user_id'],
             'email_status' => 'Sent Email',
             'usertype' => $this->session->userdata['userlogin']['usertype'],
             'date_sent' => date("Y-m-d h:i:s")
       ); 
        $this->Signature_Model->insert_email_history($data_emailhistory);
        echo json_encode("success");

    }


    public function view_email_history(){

       $data =  $this->Signature_Model->view_email_history($this->input->get('project_id'));
       echo json_encode($data);
    
    }



         // view item

    public function view_lead($project_id) { 

             $data=array();

             $data_collection=array();

             $project_id =$this->Lead_Model->select_lead($this->input->get('project_id')); 

             $payment =$this->Payment_Model->select_payment($this->input->get('project_id')); 

             $get_last_row =$this->Lead_Model->select_count_lead($this->input->get('project_id')); 

             $data = $project_id;

             $data_collection = $get_last_row;

             echo json_encode(array("get_data" => $data, "number_of_row" => $get_last_row, 'usertype' => $this->session->userdata['userlogin']['usertype'], 'user_id' => $this->session->userdata['userlogin']['user_id'], "get_payment_data" => array_merge($data, $payment) ));       

    } 

    public function view_approvalpayment_history() { 

             $data=array();

             $data =$this->Payment_Model->select_payment_approval($this->input->get('project_id')); 

             echo json_encode($data);             

    } 

    // public function view_email_history() { 

    //          $data=array();

    //          $data =$this->Signature_Model->view_email_history(); 

    //          echo json_encode($data);             

    // } 



    public function select_email() { 

             $data=array();

             $data =$this->Lead_Model->select_project($this->input->get('project_id')); 

             echo json_encode($data);             

    }

     public function select_mesage() { 

             $data=array();

             $data =$this->Signature_Model->view_email_message($this->input->get('history_email_id')); 

             echo json_encode($data);             

    } 

    // view signature

    public function select_signature() { 

             $data=array();

             $data =$this->Signature_Model->select_signature($this->input->get('signature_id')); 

             echo json_encode($data);             

    } 

    // view signature

    public function select_signature_email() { 

             $data=array();

             $data =$this->Signature_Model->select_signature($this->input->post('signature')); 

             echo json_encode($data);             

    }

     public function select_author_name() { 

             $data=array();
             $select_report = $this->Lead_Model->select_report_projectid($this->input->post('project_id'));
             $select_exist_author = $this->Lead_Model->view_author_exist($this->input->post('project_id'));


             if ($select_report == true){
                 $data = $this->Lead_Model->view_report($this->input->post('project_id')); 
                 $data_interior_designer =$this->Lead_Model->view_interior_designer($this->input->post('project_id')); 
                 $data_cover_designer =$this->Lead_Model->view_cover_designer($this->input->post('project_id')); 

             }
             else{
                 $data =$this->Lead_Model->select_author_name_project($this->input->post('project_id'));
                 $data_interior_designer =$this->Lead_Model->view_interior_designer(0); 
                 $data_cover_designer =$this->Lead_Model->view_cover_designer(0); 
             }


                echo json_encode(array("report" => $data, "data_interior_designer" => $data_interior_designer, "data_cover_designer" => $data_cover_designer, "author_data" => $select_exist_author));             

                // echo json_encode($data);             

    } 

     public function view_confirmationpayment_history() { 

             $data=array();

             $data =$this->Payment_Model->select_payment_confirmation($this->input->get('project_id')); 

             echo json_encode($data);             

    } 



          // view item

    public function view_collection_remark($collection_id) { 

             $data=array();

             $collection_id =$this->Lead_Model->select_collection($this->input->get('collection_id')); 

             $data = $collection_id;

             echo json_encode($data);             

    }   

    public function view_payment_remark($payment_id) { 

             $data=array();

             $payment_id =$this->Payment_Model->select_payment_id($this->input->get('payment_id')); 

             $data = $payment_id;

             echo json_encode($data);             

    } 

     public function view_author_report() { 

             $data=array();
             // echo $this->input->get('project_id');
             // exit();
             $data =$this->Lead_Model->view_report($this->input->get('project_id')); 
             $data_interior_designer =$this->Lead_Model->view_interior_designer($this->input->get('project_id')); 
             $data_cover_designer =$this->Lead_Model->view_cover_designer($this->input->get('project_id')); 
             $data_front_cover_designer =$this->Lead_Model->view_front_cover_designer($this->input->get('project_id')); 
             $data_back_cover_designer =$this->Lead_Model->view_back_cover_designer($this->input->get('project_id')); 

             echo json_encode(array("report" => $data, "data_interior_designer" => $data_interior_designer, "data_cover_designer" => $data_cover_designer, "data_front_cover_designer" => $data_front_cover_designer, "data_back_cover_designer" =>$data_back_cover_designer, 'usertype' => $this->session->userdata['userlogin']['usertype']));             

    } 

     public function view_designer_report() { 

      $data=array();
       if ($this->session->userdata['userlogin']['usertype'] == "Cover Designer"  || $this->input->get('usertype')  == "Cover Designer" ){

             $data =$this->Lead_Model->view_report_designer($this->input->get('project_id'), $this->input->get('designer_report_id')); 
             $data_transaction_designer =$this->Lead_Model->view_transaction_designer($this->input->get('project_id'), $this->input->get('user_id')); 
             $data_interior_designer =$this->Lead_Model->view_interior_designer($this->input->get('project_id')); 
             $data_occured_total =$this->Lead_Model->view_occured_total($this->input->get('project_id'), $this->input->get('user_id')); 
             // $data_interior_designer =$this->Lead_Model->view_interior_designer($this->input->get('project_id')); 
             // $data_cover_designer =$this->Lead_Model->view_cover_designer($this->input->get('project_id')); 
             $data_front_cover_designer =$this->Lead_Model->view_front_cover_designer($this->input->get('project_id')); 
             $data_back_cover_designer =$this->Lead_Model->view_back_cover_designer($this->input->get('project_id')); 

             echo json_encode(array("report" => $data, "data_front_cover_designer" => $data_front_cover_designer, "data_back_cover_designer" =>$data_back_cover_designer, "data_transaction_designer" =>  $data_transaction_designer,  "data_interior_designer" =>$data_interior_designer, "data_occured_total"  => $data_occured_total));

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Interior Designer" || $this->input->get('usertype')  == "Interior Designer"){

             $data =$this->Lead_Model->view_report_designer($this->input->get('project_id'), $this->input->get('designer_report_id')); 
             $data_transaction_designer =$this->Lead_Model->view_transaction_designer($this->input->get('project_id'), $this->input->get('user_id')); 
              $data_interior_designer =$this->Lead_Model->view_interior_designer($this->input->get('project_id')); 
             // $data_cover_designer =$this->Lead_Model->view_cover_designer($this->input->get('project_id')); 
             // $data_front_cover_designer =$this->Lead_Model->view_front_cover_designer($this->input->get('project_id')); 
             // $data_back_cover_designer =$this->Lead_Model->view_back_cover_designer($this->input->get('project_id')); 
              $data_front_cover_designer =$this->Lead_Model->view_front_cover_designer($this->input->get('project_id')); 
             $data_back_cover_designer =$this->Lead_Model->view_back_cover_designer($this->input->get('project_id')); 

             echo json_encode(array("report" => $data,  "data_interior_designer" =>$data_interior_designer, "data_transaction_designer" =>  $data_transaction_designer, "data_front_cover_designer" => $data_front_cover_designer, "data_back_cover_designer" =>$data_back_cover_designer));

      }

    } 

    public function view_publishing_cover_report() { 

      $data=array();

             $data =$this->Lead_Model->view_report_designer($this->input->get('project_id'), $this->input->get('user_id')); 
             $data_transaction_designer =$this->Lead_Model->view_transaction_designer($this->input->get('project_id'), $this->input->get('user_id')); 
             // $data_interior_designer =$this->Lead_Model->view_interior_designer($this->input->get('project_id')); 
             // $data_cover_designer =$this->Lead_Model->view_cover_designer($this->input->get('project_id')); 
             $data_front_cover_designer =$this->Lead_Model->view_front_cover_designer($this->input->get('project_id')); 
             $data_back_cover_designer =$this->Lead_Model->view_back_cover_designer($this->input->get('project_id')); 

             echo json_encode(array("report" => $data, "data_front_cover_designer" => $data_front_cover_designer, "data_back_cover_designer" =>$data_back_cover_designer, "data_transaction_designer" =>  $data_transaction_designer));

    } 



     public function view_designercover_report() { 

      $data=array();
             $data =$this->Lead_Model->report_cover_designer_id($this->input->get('project_id'), $this->input->get('designer_report_id')); 
             $data_transaction_designer =$this->Lead_Model->view_transaction_designer($this->input->get('project_id'), $this->input->get('user_id')); 
             // $data_interior_designer =$this->Lead_Model->view_interior_designer($this->input->get('project_id')); 
             // $data_cover_designer =$this->Lead_Model->view_cover_designer($this->input->get('project_id')); 
             $data_front_cover_designer =$this->Lead_Model->view_front_cover_designer($this->input->get('project_id')); 
             $data_back_cover_designer =$this->Lead_Model->view_back_cover_designer($this->input->get('project_id')); 

             echo json_encode(array("report" => $data, "data_front_cover_designer" => $data_front_cover_designer, "data_back_cover_designer" =>$data_back_cover_designer, "data_transaction_designer" =>  $data_transaction_designer));


    } 

  public function view_designerinterior_report() { 

      $data=array();

              $data =$this->Lead_Model->report_interior_designer_id($this->input->get('project_id'), $this->input->get('designer_report_id')); 
              $data_transaction_designer =$this->Lead_Model->view_transaction_designer($this->input->get('project_id'), $this->input->get('user_id')); 
              $data_interior_designer =$this->Lead_Model->view_interior_designer($this->input->get('project_id')); 
             // $data_cover_designer =$this->Lead_Model->view_cover_designer($this->input->get('project_id')); 
             // $data_front_cover_designer =$this->Lead_Model->view_front_cover_designer($this->input->get('project_id')); 
             // $data_back_cover_designer =$this->Lead_Model->view_back_cover_designer($this->input->get('project_id')); 

             echo json_encode(array("report" => $data,  "data_interior_designer" =>$data_interior_designer, "data_transaction_designer" =>  $data_transaction_designer));

    } 

 function load()
    {
      $event_data = $this->Fullcalendar_Model->fetch_all_event();
      foreach($event_data->result_array() as $row)
      {
        $data[] = array(
          'id'  =>  $row['event_id'],
          'title' =>  $row['type'] != 'TimeLine' ? $row['event_title'] .' at '. date("h:i:s A", strtotime($row['event_start'])) .' to '. date("h:i:s A", strtotime($row['event_end'])) .' Added by '. $row['usercharge'] : $row['event_title'] ,
          'start' =>  $row['event_start'],
          'end' =>  $row['event_end'],
          'status_event' => $row['status_event'],
          'type' => $row['type'],
          'user_id' => $row['user_id'],

        );
      }
      echo json_encode($data);
  }
  function view_status(){
           $type = $this->input->get('type') ? $this->input->get('type') : array();
           $status_event = $this->input->get('status_event') ? $this->input->get('status_event') : array();
           $user_id = $this->input->get('user_id') ? $this->input->get('user_id') : 0;
           $get_event = array();
           if ($type == 'Company'){
                 $get_event = $this->Fullcalendar_Model->view_event($type, $status_event);
                  
                  
                   foreach($get_event->result_array() as $row)
                    {
                      $data[] = array(
                        'id'  =>  $row['event_id'],
                        'title' =>  $row['type'] != 'TimeLine' ? $row['event_title'] .' at '. date("h:i:s A", strtotime($row['event_start'])) .' to '. date("h:i:s A", strtotime($row['event_end'])) .' Added by '. $row['usercharge'] : $row['event_title'] ,
                        'start' =>  $row['event_start'],
                        'end' =>  $row['event_end'],
                        'status_event' => $row['status_event'],
                        'type' => $row['type'],
                        'user_id' => $row['user_id'],

                      );
                    }
                     echo json_encode($data);
           }
           else if ($type == 'Personal'){
                 $get_event = $this->Fullcalendar_Model->view_event_user($type, $status_event, $user_id);
                  
                  
                   foreach($get_event->result_array() as $row)
                    {
                      $data[] = array(
                        'id'  =>  $row['event_id'],
                        'title' =>  $row['type'] != 'TimeLine' ? $row['event_title'] .' at '. date("h:i:s A", strtotime($row['event_start'])) .' to '. date("h:i:s A", strtotime($row['event_end'])) .' Added by '. $row['usercharge'] : $row['event_title'] ,
                        'start' =>  $row['event_start'],
                        'end' =>  $row['event_end'],
                        'status_event' => $row['status_event'],
                        'type' => $row['type'],
                        'user_id' => $row['user_id'],

                      );
                    }
                        echo json_encode($data);
           }               
                
      }

  function view_status_event(){
           $type = $this->input->get('type') ? $this->input->get('type') : array();
           $status_event = $this->input->get('status_event') ? $this->input->get('status_event') : array();
           $user_id = $this->input->get('user_id') ? $this->input->get('user_id') : 0;
           $get_event = array();
           if ($type == 'Company'){
                 $get_event = $this->Fullcalendar_Model->view_status_event($type, $status_event);                                    
                   foreach($get_event->result_array() as $row)
                    {
                      $data[] = array(
                        'id'  =>  $row['event_id'],
                        'title' =>  $row['type'] != 'TimeLine' ? $row['event_title'] .' at '. date("h:i:s A", strtotime($row['event_start'])) .' to '. date("h:i:s A", strtotime($row['event_end'])) .' Added by '. $row['usercharge'] : $row['event_title'] ,
                        'start' =>  $row['event_start'],
                        'end' =>  $row['event_end'],
                        'status_event' => $row['status_event'],
                        'type' => $row['type'],
                        'user_id' => $row['user_id'],

                      );
                    }
                     echo json_encode($data);
           }
           else if ($type == 'Personal'){
                 $get_event = $this->Fullcalendar_Model->view_status_event_user($type, $status_event, $user_id);
                  
                          
                   foreach($get_event->result_array() as $row)
                    {
                        if($row['status_event'] == 'Call log' || $row['status_event'] == 'Pipe'){
                      $data[] = array(
                        'id'  =>  $row['event_id'],
                        'title' =>  $row['status_event'] != 'TimeLine' ? $row['status_event'] .' - '. $row['event_title'] : $row['event_title'] ,
                        'start' =>  $row['event_start'],
                        'end' =>  $row['event_end'],
                        'status_event' => $row['status_event'],
                        'type' => $row['type'],
                        'user_id' => $row['user_id'],

                      );
                    }else{
                        $data[] = array(
                        'id'  =>  $row['event_id'],
                        'title' =>  $row['status_event'] != 'TimeLine' ? $row['event_title'] .' at2 '. date("h:i:s A", strtotime($row['event_start'])) .' to '. date("h:i:s A", strtotime($row['event_end'])) .' Added by '. $row['usercharge'] : $row['event_title'] ,
                        'start' =>  $row['event_start'],
                        'end' =>  $row['event_end'],
                        'status_event' => $row['status_event'],
                        'type' => $row['type'],
                        'user_id' => $row['user_id'],

                      );

                    }
                }
      
      // else{
      //   $get_event = $this->Fullcalendar_Model->view_status_event_user($type, $status_event, $user_id);
      //              foreach($get_event->result_array() as $row)
      //               {
      //                 $data[] = array(
      //                   'id'  =>  $row['event_id'],
      //                   'title' =>  $row['type'] != 'TimeLine' ? $row['event_title'] .' at2 '.$type. date("h:i:s A", strtotime($row['event_start'])) .' to '. date("h:i:s A", strtotime($row['event_end'])) .' Added by '. $row['usercharge'] : $row['event_title'] ,
      //                   'start' =>  $row['event_start'],
      //                   'end' =>  $row['event_end'],
      //                   'status_event' => $row['status_event'],
      //                   'type' => $row['type'],
      //                   'user_id' => $row['user_id'],

      //                 );
      //               }
      //           }
                        echo json_encode($data);
           }

                
      }

  function load_company_calendar()
    {

      $event_data = $this->Fullcalendar_Model->fetch_all_company();
      foreach($event_data->result_array() as $row)
      {
        $data[] = array(
          'id'  =>  $row['event_id'],
          'title' =>  $row['event_title'] .' at '. date("h:i:s A", strtotime($row['event_start'])) .' to '. date("h:i:s A", strtotime($row['event_end'])) .' Added by '. $row['usercharge'] ,
          'start' =>  $row['event_start'],
          'end' =>  $row['event_end'],
          'status_event' => $row['status_event'],
          'type' => $row['type']
        );
      }
      echo json_encode($data);
    }

      function load_stats_calendar_agent()
    {

      $event_data = $this->Fullcalendar_Model->fetch_stats_agent($this->session->userdata['userlogin']['user_id']);
      foreach($event_data->result_array() as $row)
      {
        $data[] = array(
          'id'  =>  $row['event_id'],
          'title' =>  $row['event_title'] .' at '. date("h:i:s A", strtotime($row['event_start'])) .' to '. date("h:i:s A", strtotime($row['event_end'])) .' Added by '. $row['usercharge'] ,
          'start' =>  $row['event_start'],
          'end' =>  $row['event_end'],
          'status_event' => $row['status_event'],
          'type' => $row['type']
        );
      }
      echo json_encode($data);
    }



  function load_personal_calendar()
    {
      $event_data = $this->Fullcalendar_Model->fetch_all_personal();
      foreach($event_data->result_array() as $row)
      {
        $data[] = array(
          'id'  =>  $row['event_id'],
          'title' =>  $row['event_title'] .' at '. date("h:i:s A", strtotime($row['event_start'])) .' to '. date("h:i:s A", strtotime($row['event_end'])) .' Added by '. $row['usercharge'] ,
          'start' =>  $row['event_start'],
          'end' =>  $row['event_end'],
          'status_event' => $row['status_event'],
          'type' => $row['type'],
            'user_id' => $row['user_id']
        );
      }
      echo json_encode($data);
    }

  function load_personal_calendar_agent()
    {
      $event_data = $this->Fullcalendar_Model->fetch_personal_agent($this->session->userdata['userlogin']['user_id']);
      foreach($event_data->result_array() as $row)
      {
        if($row['status_event'] != 'Call log' && $row['status_event'] != 'Pipe'){
        $data[] = array(
          'id'  =>  $row['event_id'],
          'title' =>  $row['event_title'] .' at '. date("h:i:s A", strtotime($row['event_start'])) .' to '. date("h:i:s A", strtotime($row['event_end'])),
          'start' =>  $row['event_start'],
          'end' =>  $row['event_end'],
          'status_event' => $row['status_event'],
          'type' => $row['type'],
           'user_id' => $row['user_id']
            );  
        }
      }
      echo json_encode($data);
    }

  function load_personal_calendar_stats_agent()
    {
      $event_data = $this->Fullcalendar_Model->fetch_personal_agent($this->session->userdata['userlogin']['user_id']);
      foreach($event_data->result_array() as $row)
      {
        if($row['status_event'] == 'Call log' || $row['status_event'] == 'Pipe'){
        $data[] = array(
          'id'  =>  $row['event_id'],
          'title' => $row['status_event'].' - '.$row['event_title'],
          'start' =>  $row['event_start'],
          'end' =>  $row['event_end'],
          'status_event' => $row['status_event'],
          'type' => $row['type'],
           'user_id' => $row['user_id']
        );
      }
    }
      echo json_encode($data);
    }

    function insert()
    {
      if($this->input->post('title'))
      {
        $data = array(
          'event_title'   =>  $this->input->post('title'),
          'event_start'=>  date("Y-m-d H:i:s", strtotime($this->input->post('start'))),
          'event_end' =>   date("Y-m-d H:i:s", strtotime($this->input->post('end'))),
          'status_event' =>  $this->input->post('status_event'),
          'user_id' => $this->session->userdata['userlogin']['user_id'],
          'type' =>  'TimeLine',
          'usercharge' =>  $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'],
          'user_id' => $this->session->userdata['userlogin']['user_id']

        );
        $this->Fullcalendar_Model->insert_event($data);
      }
    }

 function insert_company_calendar()
    {
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      if($this->input->post('title'))
      {
        $data = array(
          'event_title'   =>  $this->input->post('title'),
          'event_start'=>  date("Y-m-d H:i:s", strtotime($this->input->post('start'))),
          'event_end' =>   date("Y-m-d H:i:s", strtotime($this->input->post('end'))),
          'status_event' =>  $this->input->post('status_event'),
          'user_id' => $this->session->userdata['userlogin']['user_id'],
          'type' =>  'Company',
          'usercharge' =>  $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'],
          'user_id' => $this->session->userdata['userlogin']['user_id']

        );
        $this->Fullcalendar_Model->insert_event($data);
            $receive_user_notify = $this->User_Model->select_user_all_notify($this->session->userdata['userlogin']['user_id']);
             foreach ($receive_user_notify as $value) {
                        $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Added Remark on Company Calendar',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                       $this->Notification_Model->insert($data_notification);
                       }


         echo json_encode(array("response" => "success", "message" => "Successfully added Company Event/Reminder", "redirect" => base_url('account')));

      }
      else{
          echo json_encode(array("response" => "error", "message" => "Title is required"));

      }
    }

   function insert_personal_calendar()
    {
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      if($this->input->post('title'))
      {
        $data = array(
          'event_title'   =>  $this->input->post('title'),
          'event_start'=>  date("Y-m-d H:i:s", strtotime($this->input->post('start'))),
          'event_end' =>   date("Y-m-d H:i:s", strtotime($this->input->post('end'))),
          'status_event' =>  $this->input->post('status_event'),
          'user_id' => $this->session->userdata['userlogin']['user_id'],
          'type' =>  'Personal',
          'event_level' => 'Assigned',
          'usercharge' =>  $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'],
          'to_user' => $this->session->userdata['userlogin']['user_id']

        );
        $this->Fullcalendar_Model->insert_event($data);
        $receive_user_notify_admin = $this->User_Model->select_user_admin();
            $agent_notification= array(
                                     'from_user' => $user_charge,
                                     'to_user' => 'All',
                                     'message' => 'Added Remark on Personal Calendar',
                                     'unread' => 1,
                                     'date_notify' => date('Y-m-d H:i:s'),
                                     'link' =>  dirname(base_url(uri_string())),
                                     'to_user_id' => $receive_user_notify_admin['user_id'],
                                     'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
                                   );
                     $this->Notification_Model->insert($agent_notification);
         echo json_encode(array("response" => "success", "message" => "Successfully added Personal Reminder/Task", "redirect" => base_url('account')));

      }
      else{
          echo json_encode(array("response" => "error", "message" => "Title is required"));

      }
    }

  function insert_time_line()
    {
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      if($this->input->post('title'))
      {
        $data = array(
          'event_title'   =>  $this->input->post('title'),
          'event_start'=>  date("Y-m-d H:i:s", strtotime($this->input->post('start'))),
          'event_end' =>   date("Y-m-d H:i:s", strtotime($this->input->post('end'))),
          'status_event' =>  $this->input->post('status_event'),
          'type' =>  'TimeLine',
          'usercharge' =>  $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'],
          'user_id' => $this->session->userdata['userlogin']['user_id']
        );
         $this->Fullcalendar_Model->insert_event($data);
           echo json_encode(array("response" => "success", "message" => "Successfully added TimeLine", "redirect" => base_url('account')));

      }
      else{
          echo json_encode(array("response" => "error", "message" => "Title is required"));

      }
    }

    function update()
    {
      if($this->input->post('id'))
      {
        $data = array(
          'event_start'=>  date("Y-m-d H:i:s", strtotime($this->input->post('start'))),
          'event_end' =>   date("Y-m-d H:i:s", strtotime($this->input->post('end')))
        );

        $this->Fullcalendar_Model->update_event($data, $this->input->post('id'));
      }
    }
   function update_company_calendar()
    {
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      if($this->input->post('id'))
      {
        $data = array(
          'event_title'     =>  $this->input->post('title'),  
          'event_start' =>  $this->input->post('start'),
          'event_end'   =>  $this->input->post('end')
        );

         $this->Fullcalendar_Model->update_event($data, $this->input->post('id'));
          $receive_user_notify = $this->User_Model->select_user_all_notify($this->session->userdata['userlogin']['user_id']);
             foreach ($receive_user_notify as $value) {
                        $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Updated Company Calendar',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'to_user_id' => $value['user_id'],
                                       'id' =>  $this->input->post('id'),
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                $this->Notification_Model->insert($data_notification);
            }
         }
    }


    function delete()
    {
      if($this->input->post('id'))
      {
        $this->Fullcalendar_Model->delete_event($this->input->post('id'));
      }
  }

   public function add_attendance(){

       date_default_timezone_set('Asia/Manila');

       $this->form_validation->set_rules('duty_log','Schedule Duty','trim|required|xss_clean'); 

       $this->form_validation->set_rules('user_id[]','Employee Name','trim|required|xss_clean'); 


       $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : array();
       // $remark = $this->input->post('remark')? $this->input->post('remark') : null;

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

      
                foreach ($user_id as $index => $value) {
                      $data= array(
                           'user_id' => $value,
                           'duty_log'  =>  date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $this->input->post('duty_log')))),   

                         );
                     $this->Attendance_Model->insert($data);
             }

             echo json_encode(array("response" =>   "success", "message" => "Successfully Added Schedule Attendance", "redirect" => base_url('dashboard')));


          }
      }


  function generateRandomString($length = 20) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
   }
 
  public function add_idle_user(){

       date_default_timezone_set('Asia/Manila');


       $this->form_validation->set_rules('user_id[]','Employee Name','trim|required|xss_clean'); 


       $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : array();
       // $remark = $this->input->post('remark')? $this->input->post('remark') : null;

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

      
                foreach ($user_id as $index => $value) {
                      $data= array(
                           'user_id' => $value,
                           'status_idle' => 1,
                           'status_idle_user' => "beep",
                           'date_idle'  =>  date("Y-m-d"),   
                           'idle_time'  =>  date("00:00:00"),   

                         );

                       $row =  $this->Idle_Model->select_single_user($value);
                       $get_attempt_idle = $row['attempt_idle'];
                       $total_number_of_idle = $this->input->post('attempt_idle') + $row['number_idle'];

                       
                       if($this->input->post('attempt_idle') >=3){
                           $this->User_Model->update_profile(array("attempt_idle" => $this->input->post('attempt_idle'), "number_idle" => $total_number_of_idle, "idle_code" => $this->generateRandomString()), $value);

                        }
                      else{
                            $this->User_Model->update_profile(array("attempt_idle" => $this->input->post('attempt_idle'), "number_idle" => $total_number_of_idle), $value);
                      }
                        
                $this->Idle_Model->insert($data);
       }

             echo json_encode(array("response" =>   "success", "message" => "Successfully Added Employee's Idle", "redirect" => base_url('dashboard')));


          }
      }

      public function view_attendance(){
         $data=array();
         $data = $this->Attendance_Model->select_attendance_id($this->input->get('attendance_id'));
         echo json_encode($data);

      }
         public function beep_idle(){
         $data=array();
         $userid = 0;
         $data = $this->Idle_Model->select_idle_user_beep($this->session->userdata('userlogin') == true ? $this->session->userdata['userlogin']['user_id'] : 0);

         if ($data == true){
             echo json_encode($this->session->userdata['userlogin']['user_id']);
          }
        else{
           echo json_encode(0);
 
        }

      }
        public function view_remark_attendance(){
         $data=array();
         $data = $this->Attendance_Model->select_attendance_remark($this->input->get('attendance_id'));
         echo json_encode($data);

      }
         public function view_file_attendance(){
         $data=array();
         $data = $this->Attendance_Model->select_attendancefile_id($this->input->get('attendance_id'));
         echo json_encode($data);

      }
        public function view_time_log() { 

             $data=array();
             date_default_timezone_set('Asia/Manila');

             if ($this->input->post('status_log') == "Time In"){
                  $data = $this->Attendance_Model->select_attendance_time_in($this->input->post('attendance_id'));

             }
             else if ($this->input->post('status_log') == "Time Out"){
                  $data = $this->Attendance_Model->select_attendance_time_out($this->input->post('attendance_id'));
             } 
             else if ($this->input->post('status_log') == "Break In"){
                  $data = $this->Attendance_Model->select_attendance_break_in($this->input->post('attendance_id'));

             }
             else if ($this->input->post('status_log') == "Break Out"){
                 $data = $this->Attendance_Model->select_attendance_break_out($this->input->post('attendance_id'));

             }
             else if ($this->input->post('status_log') == "Lunch Start"){
                  $data = $this->Attendance_Model->select_attendance_lunch_start($this->input->post('attendance_id'));
             }
            else if ($this->input->post('status_log') == "Lunch End"){

                 $data = $this->Attendance_Model->select_attendance_lunch_end($this->input->post('attendance_id'));

             }
             if ($data == null ){
                       echo json_encode(date("d/m/Y h:i:s a"));             


             }
             else{
                  echo json_encode(date("d/m/Y h:i:s a", strtotime($data)));             

             }

    }

     public function update_timelog(){

       date_default_timezone_set('Asia/Manila');

       $this->form_validation->set_rules('status_log','Status Log','trim|required|xss_clean'); 

       $this->form_validation->set_rules('duty_time','Time Log','trim|required|xss_clean'); 


       $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : array();
       // $remark = $this->input->post('remark')? $this->input->post('remark') : null;

       if ($this->form_validation->run() == FALSE){
 
              echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 
       else if($this->input->post('attendance_id') == 0){
                    $data= array(
                           'user_id' => $this->session->userdata['userlogin']['user_id'],
                           'duty_log'  =>  date("Y-m-d H:i:s"),
                           'time_in' => date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $this->input->post('duty_time'))))  

                         );
                     $this->Attendance_Model->insert($data);
       }

       else{

             if ($this->input->post('status_log') == "Time In"){
                  $this->Attendance_Model->update_time_log(array("time_in" => date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $this->input->post('duty_time'))))),$this->input->post('attendance_id'));

             }
             else if ($this->input->post('status_log') == "Time Out"){
                  $this->Attendance_Model->update_time_log(array("time_out" => date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $this->input->post('duty_time'))))),$this->input->post('attendance_id'));
             } 
             else if ($this->input->post('status_log') == "Break In"){
                  $this->Attendance_Model->update_time_log(array("break_in" => date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $this->input->post('duty_time'))))),$this->input->post('attendance_id'));

             }
             else if ($this->input->post('status_log') == "Break Out"){
                  $this->Attendance_Model->update_time_log(array("break_out" => date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $this->input->post('duty_time'))))),$this->input->post('attendance_id'));

             }
             else if ($this->input->post('status_log') == "Lunch Start"){
                  $this->Attendance_Model->update_time_log(array("lunch_start" => date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $this->input->post('duty_time'))))),$this->input->post('attendance_id'));
             }
            else if ($this->input->post('status_log') == "Lunch End"){
                 $this->Attendance_Model->update_time_log(array("lunch_end" => date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $this->input->post('duty_time'))))),$this->input->post('attendance_id'));

             }
               echo json_encode(array("response" =>   "success", "message" => "Successfully Updated Time Log", "redirect" => base_url('dashboard')));
          }
      }


    public function update_attendance_status(){

       date_default_timezone_set('Asia/Manila');

       $this->form_validation->set_rules('approve_status','Status','trim|required|xss_clean'); 


       if ($this->form_validation->run() == FALSE){
 
              echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 
       else{
             $data= array(
                           'attendance_id' => $this->input->post('attendance_id'),
                           'approve_status'  =>  $this->input->post('approve_status')

                         );
                 $this->Attendance_Model->update_time_log($data, $this->input->post('attendance_id'));
                echo json_encode(array("response" =>   "success", "message" => "Successfully Updated Status", "redirect" => base_url('dashboard')));
          }
     }

      



    //update time log user
     public function update_timelog_user(){

       date_default_timezone_set('Asia/Manila');

       $this->form_validation->set_rules('status_log','Status Log','trim|required|xss_clean'); 

       // $remark = $this->input->post('remark')? $this->input->post('remark') : null;

       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 
       else if($this->input->post('attendance_id') == 0){
             $data= array(
                           'user_id' => $this->session->userdata['userlogin']['user_id'],
                           'duty_log'  =>  date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $this->input->post('duty_log')))),  
                           "time_in" => date("Y-m-d H:i:s"),
                           "status_log" => $this->input->post("status_log")
                         );

             $this->Attendance_Model->insert($data);
          echo json_encode(array("response" =>   "success", "message" => "Successfully Updated Time Log", "redirect" => base_url('dashboard')));

       }
       else{

         if ($this->input->post('status_log') == "Time In"){
                  //$this->Attendance_Model->update_time_log(array("status_log" => $this->input->post("status_log"),"time_in" => date("Y-m-d H:i:s")),$this->input->post('attendance_id'));
            
                  $this->Attendance_Model->update_time_log(array("status_log" => $this->input->post("status_log"),"time_in" => date("Y-m-d H:i:s"),"time_log" => date("Y-m-d H:i:s")),$this->input->post('attendance_id'));

             }
             else if ($this->input->post('status_log') == "Time Out"){
                  $this->Attendance_Model->update_time_log(array("status_log" => $this->input->post("status_log"),"time_out" => date("Y-m-d H:i:s"),"time_log" => date("Y-m-d H:i:s")),$this->input->post('attendance_id'));
             } 
             else if ($this->input->post('status_log') == "Break In"){
                  $this->Attendance_Model->update_time_log(array("status_log" => $this->input->post("status_log"),"break_in" => date("Y-m-d H:i:s"),"time_log" => date("Y-m-d H:i:s")),$this->input->post('attendance_id'));

             }
             else if ($this->input->post('status_log') == "Break Out"){
                  $this->Attendance_Model->update_time_log(array("status_log" => $this->input->post("status_log"),"break_out" => date("Y-m-d H:i:s"),"time_log" => date("Y-m-d H:i:s")),$this->input->post('attendance_id'));

             }
             else if ($this->input->post('status_log') == "Lunch Start"){
                  $this->Attendance_Model->update_time_log(array("status_log" => $this->input->post("status_log"),"lunch_start" => date("Y-m-d H:i:s"),"time_log" => date("Y-m-d H:i:s")),$this->input->post('attendance_id'));
             }
            else if ($this->input->post('status_log') == "Lunch End"){
                 $this->Attendance_Model->update_time_log(array("status_log" => $this->input->post("status_log"),"lunch_end" => date("Y-m-d H:i:s"),"time_log" => date("Y-m-d H:i:s")),$this->input->post('attendance_id'));

             }
               echo json_encode(array("response" =>   "success", "message" => "Successfully Updated Time Log", "redirect" => base_url('dashboard')));
          }
      }


      public function add_remark_attendance(){

         $history_agent=array();

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('remark','Remark','trim|required|xss_clean');        



       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

            $data =  array(

                             'attendance_id' => $this->input->post('attendance_id'),

                             'remark'  => $this->input->post('remark'),

                             'from_user'  => $user_charge,

                             'from_usertype'  => $usertype,

                             'date_create' => date("Y-m-d H:i:s"),

                         );

            $this->Attendance_Model->insert_attendance($data);
            $attendance_history = $this->Attendance_Model->select_attendance_remark($this->input->post('attendance_id'));
            $this->Attendance_Model->update_time_log(array("remark_attendance" => $this->input->post('remark')),$this->input->post('attendance_id'));
             $receive_user_notify_all = $this->User_Model->select_user_notify_attendance();
             $receive_agent_notification = $this->User_Model->select_attendance_id($this->input->post('attendance_id'));
        

          if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
               foreach ($receive_user_notify_all as $value) {
                            $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Added Remarks on Attendance',
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'id' =>  $this->input->post('attendance_id'),
                                       'unread' => 1,
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                 }
          }
          else{

             $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Added Remarks on Attendance',
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'id' =>  $this->input->post('attendance_id'),
                                       'unread' => 1,
                                       'to_user_id' => $receive_agent_notification['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);

          }


             echo json_encode(array("response" =>   "success", "message" => "Successfully Added Remark", "attendance_data" => $attendance_history));



           }

      }

      public function get_quarterly(){

          $current_month = date('m');
          $current_year = date('Y');
          $select_date = array();;
          if($current_month>=1 && $current_month<=3)
          {
            $start_date = date('Y-m-d', strtotime('1-January-'.$current_year));  // timestamp or 1-Januray 12:00:00 AM
            $end_date = date('Y-m-d', strtotime('6-April-'.$current_year));  // timestamp or 1-April 12:00:00 AM means end of 31 March
            $event_title = "First Quarter";
            // echo $start_date .' - '. $end_date;
          }
          else  if($current_month>=4 && $current_month<=6)
          {
            $start_date = date('Y-m-d', strtotime('7-April-'.$current_year));  // timestamp or 1-April 12:00:00 AM
            $end_date = date('Y-m-d', strtotime('6-July-'.$current_year));  // timestamp or 1-July 12:00:00 AM means end of 30 June
            $event_title = "Second Quarter";
             // echo $start_date .' - '. $end_date;
          }
          else  if($current_month>=7 && $current_month<=9)
          {
            $start_date = date('Y-m-d', strtotime('7-July-'.$current_year));  // timestamp or 1-July 12:00:00 AM
            $end_date = date('Y-m-d', strtotime('6-October-'.$current_year));  // timestamp or 1-October 12:00:00 AM means end of 30 September
            $event_title = "Third Quarter";

             // echo $start_date .' - '. $end_date;
          }
          else  if($current_month>=10 && $current_month<=12)
          {
            $start_date = date('Y-m-d', strtotime('7-October-'.$current_year));  // timestamp or 1-October 12:00:00 AM
            $end_date = date('Y-m-d', strtotime('6-January-'.($current_year+1)));  // timestamp or 1-January Next year 12:00:00 AM means end of 31 December this year
            $event_title = "Fourth Quarter";

            // echo $start_date .' - '. $end_date;
          }

          $select_date = $this->Fullcalendar_Model->select_exist_datequater($start_date, $end_date, $event_title);

           if ($select_date == false){
                $data = array(
                    'event_title'   =>  $event_title,
                    'event_start'=> $start_date,
                    'event_end' =>  $end_date,
                    'status_event' => 'quarterly',
                    'type' =>  'TimeLine',
                    'usercharge' =>  $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'],
                    'user_id' => $this->session->userdata['userlogin']['user_id']
                  );
                 $this->Fullcalendar_Model->insert_event($data);
           }


      }
     public function project($id=""){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
       if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['author_reports']= $this->Lead_Model->report_lead();
          $records['author_names']= $this->Lead_Model->select_author_name();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

            $this->load->view('template/header_production', $records);
             $this->load->view('template/sidebar_production', $records);
             $this->load->view('project', $records);
             $this->load->view('template/footer_production', $records);
                

       }

      else if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

        $user_id = $this->session->userdata['userlogin']['user_id'];

          $records['author_reports']= $this->Lead_Model->report_lead_agent($user_id);
          $records['author_names']= $this->Lead_Model->select_author_name();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $records['histories'] = $this->Lead_Model->viewall_history_report();

          $this->load->view('project_agent', $records);
                

       }

       else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

          $records['author_reports']= $this->Lead_Model->report_lead();
          $records['author_names']= $this->Lead_Model->select_author_name();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $this->load->view('project', $records);
                

       }

      else if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $records['author_reports']= $this->Lead_Model->report_lead();
          $records['author_names']= $this->Lead_Model->select_author_name();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $this->load->view('project_agent', $records);
                

       }

         else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $records['author_reports']= $this->Lead_Model->report_lead();
          $records['author_names']= $this->Lead_Model->select_author_name();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $this->load->view('project', $records);
                

       }

        else if ($this->session->userdata['userlogin']['usertype'] == "Publishing/Marketing"){

          $records['author_reports']= $this->Lead_Model->report_lead_publisher_user_id($this->session->userdata['userlogin']['user_id']);
          $records['author_names']= $this->Lead_Model->select_author_name();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['publishers']= $this->Lead_Model->select_author_name_user_id($this->session->userdata['userlogin']['user_id']);

          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $this->load->view('template/header_publisher', $records);
          $this->load->view('template/sidebar_publisher', $records);
          $this->load->view('project-publishing', $records);
          $this->load->view('template/footer_publisher', $records);
                

       }


     }
     public function files(){
        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

        if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
          $records['files']= $this->File_Model->view_file_agent($this->uri->segment(3),$this->session->userdata['userlogin']['user_id']);
          $records['get_project_id'] = $this->uri->segment(3); 
          $records['project_id'] = $this->uri->segment(3); 
          $this->load->view('file_agent', $records);  
        }
        else if ($this->session->userdata['userlogin']['usertype'] == "Publishing/Marketing"){
          $records['files']= $this->File_Model->view_file($this->uri->segment(3));
          $records['get_project_id'] = $this->uri->segment(3); 
          $records['project_id'] = $this->uri->segment(3); 

          $this->load->view('template/header_publisher', $records);
          $this->load->view('template/sidebar_publisher', $records);
          $this->load->view('file_publisher', $records);  
          $this->load->view('template/footer_publisher', $records);
                
        }
        else{
          $records['files']= $this->File_Model->view_file($this->uri->segment(3));
          $records['get_project_id'] = $this->uri->segment(3); 
          $records['project_id'] = $this->uri->segment(3); 
          $this->load->view('file', $records);  
        }
     }

     //services 
     public function services(){
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
        $records['files']= $this->File_Model->view_file_agent($this->uri->segment(3),$this->session->userdata['userlogin']['user_id']);
        $records['get_project_id'] = $this->uri->segment(3); 
        $records['project_id'] = $this->uri->segment(3); 
        $this->load->view('file_agent', $records);  
      }
      else if ($this->session->userdata['userlogin']['usertype'] == "Publishing/Marketing"){
        $records['files']= $this->File_Model->view_file($this->uri->segment(3));
        $records['get_project_id'] = $this->uri->segment(3); 
        $records['project_id'] = $this->uri->segment(3); 

        $this->load->view('template/header_publisher', $records);
        $this->load->view('template/sidebar_publisher', $records);
        $this->load->view('file_publisher', $records);  
        $this->load->view('template/footer_publisher', $records);
              
      }
      else{
        $records['files']= $this->File_Model->view_file($this->uri->segment(3));
        $records['get_project_id'] = $this->uri->segment(3); 
        $records['project_id'] = $this->uri->segment(3); 
        // $records['book_id'] = $book_id;
        $records['author_reports']= $this->Lead_Model->report_lead();
        $records['report'] =$this->Lead_Model->view_report_detail($this->uri->segment(3),$this->uri->segment(4)); 
        $records['report_id'] =$this->uri->segment(4); 
        $records['services_details'] = $this->Fulfillment_Model->view_project_details();
        // $records['books'] = $this->Author_Model->view_books_manager();
        $records['stages'] = $this->Fulfillment_Model->view_project_stages();
        $this->load->view('services', $records);  
      }
     }

     //services 
     public function project_timeline(){
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
        $records['files']= $this->File_Model->view_file_agent($this->uri->segment(3),$this->session->userdata['userlogin']['user_id']);
        $records['get_project_id'] = $this->uri->segment(3); 
        $records['project_id'] = $this->uri->segment(3); 
        $this->load->view('file_agent', $records);  
      }
      else if ($this->session->userdata['userlogin']['usertype'] == "Publishing/Marketing"){
        $records['files']= $this->File_Model->view_file($this->uri->segment(3));
        $records['get_project_id'] = $this->uri->segment(3); 
        $records['project_id'] = $this->uri->segment(3); 

        $this->load->view('template/header_publisher', $records);
        $this->load->view('template/sidebar_publisher', $records);
        $this->load->view('file_publisher', $records);  
        $this->load->view('template/footer_publisher', $records);
              
      }
      else{
        $records['files']= $this->File_Model->view_file($this->uri->segment(3));
        $records['get_project_id'] = $this->uri->segment(3); 
        $records['project_id'] = $this->uri->segment(3); 
        // $records['book_id'] = $book_id;
        $records['author_reports']= $this->Lead_Model->report_lead();
        $records['report'] =$this->Lead_Model->view_report_detail($this->uri->segment(3),$this->uri->segment(4)); 
        $records['report_id'] =$this->uri->segment(4); 
        $records['services_details'] = $this->Fulfillment_Model->view_project_details();
        // $records['books'] = $this->Author_Model->view_books_manager();
        $records['stages'] = $this->Fulfillment_Model->view_project_stages();
        $this->load->view('timeline', $records);  
      }
     }

     public function get_project_details(){ 
      $data = array();
      // $book_id = $this->input->get('project_id');
       $data =$this->Fulfillment_Model->view_project($project_id);
       echo json_encode($data);
        }
   
  
    //add projects
    public function add_project(){

      //  $this->hlm = $this->load->database('hlm', TRUE);

       $this->form_validation->set_rules('project_name',"Project",'trim|required|xss_clean'); 
       $this->form_validation->set_rules('description[]','Desccription','trim|required|xss_clean');
      
       $description = $this->input->post('description') ? $this->input->post('description') : array();

       if ($this->form_validation->run() == FALSE){
    
          echo json_encode(array("response" => "error", "message" => validation_errors()));
    
       } 
 
      else{
               $data= array(
             'project_name' => $this->input->post('project_name'),
             'book_id' => $this->input->post('report_id'),

           );
                    $this->Fulfillment_Model->insert($data);
                    $get_last_project_id = $this->db->insert_id();

                  // echo $get_last_project_id;
                  // exit();
                 foreach ($description as $index => $value) {
                     $data_stage= array(
               'project_id' => $get_last_project_id,
               'description' => $this->input->post('description')[$index],

             );
      
              $this->Fulfillment_Model->insert_stage($data_stage);
            }
            
    
           echo json_encode(array("response" =>   "success", "message" => "Successfully Added Project"));
    
         }

        
      }
    //update project 
    public function update_project(){

       $project_id = $this->input->post('project_id');
  
       $stage_id = $this->input->post('stage_id') ? $this->input->post('stage_id') : array();

         $this->form_validation->set_rules('project_name',"Projects",'trim|required|xss_clean'); 
       $this->form_validation->set_rules('description[]','Desccription','trim|required|xss_clean');
      
      if ($this->form_validation->run() == FALSE){
  
        echo json_encode(array("response" => "error", "message" => validation_errors()));
  
       } 
  
       else{
  
  
       $data = array(
  
        'project_name' => $this->input->post('project_name'),
        // 'description' => $this->input->post('description[]')
      );
    
  
        $this->Fulfillment_Model->update_services($data, $project_id);

        foreach ($stage_id as $index => $value) {
          $data_stage= array(
            'stage_id' => $value,
            'description' => $this->input->post('description')[$index],
            'status' => $this->input->post('status')[$index],

            );
     
             $this->Fulfillment_Model->update_stages($data_stage, $this->input->post('stage_id')[$index]);
           }

        echo json_encode(array("response" => "success", "message" => "Successfully Updated Project", "redirect" => base_url('account')));
  
      }
  
    }

    public function view_project_details($projectid) { 

      $data=array();
   
      $projectid =$this->Fulfillment_Model->select_project_id($this->input->get('project_id')); 
   
      $data = $projectid;
   
      echo json_encode($data);             
   
     }

    //  public function view_service_details() { 

    //  $data=array();
   
    //  $serviceid =$this->Fulfillment_Model->select_service_id($this->input->get('service_id')); 
   
    //  $data = $serviceid;

   
    //  echo json_encode($data);             
   
    //  }


    //  public function view_subservice_details() { 

    //  $data=array();
   
    //  $subserviceid =$this->Fulfillment_Model->select_subservice_id($this->input->get('subservice_id')); 
   
    //  $data = $subserviceid;

   
    //  echo json_encode($data);             
   
    //  }

// //add service
//    public function add_service(){

      
//       $this->form_validation->set_rules('service_title',"Service Title",'trim|required|xss_clean');
//       $this->form_validation->set_rules('service_desc',"Service Desccription",'trim|required|xss_clean'); 
//       $this->form_validation->set_rules('stage_title[]',"Stage Title",'trim|required|xss_clean');
//       $this->form_validation->set_rules('stage_desc[]',"Stage Desccription",'trim|required|xss_clean');
//       $this->form_validation->set_rules('stage_time[]',"Estimate Time of Completion",'trim|required|xss_clean');
      
//       $stage = $this->input->post('stage_title') ? $this->input->post('stage_title') : array();

//       if ($this->form_validation->run() == FALSE){
    
//          echo json_encode(array("response" => "error", "message" => validation_errors()));
    
//       } 
 
//      else{
//                $data= array(
//             'service_title' => $this->input->post('service_title'),
//             'service_desc' => $this->input->post('service_desc'),

//           );
//                     $this->Projects_Model->insert_service($data);
//                     $get_last_project_id = $this->db->insert_id();

              
//                 foreach ($stage as $index => $value) {
//                     $data_stage= array(
//               'service_id' => $get_last_project_id,
//               'stage_title' => $this->input->post('stage_title')[$index],
//               'stage_desc' => $this->input->post('stage_desc')[$index],
//               'stage_time' => $this->input->post('stage_time')[$index],
//               'stage_delay' => $this->input->post('stage_delay')[$index],

//             );
      
//              $this->Projects_Model->insert_service_stage($data_stage);
//            }
            
    
//           echo json_encode(array("response" =>   "success", "message" => "Successfully Added Service"));
    
//         }

        
//      }


// //add sub service
//    public function add_sub_service(){

//       $this->form_validation->set_rules('service_id',"Service Title",'trim|required|xss_clean');
//       $this->form_validation->set_rules('service_title',"Service Title",'trim|required|xss_clean');
//       $this->form_validation->set_rules('service_desc',"Service Desccription",'trim|required|xss_clean'); 
//       $this->form_validation->set_rules('stage_title[]',"Stage Title",'trim|required|xss_clean');
//       $this->form_validation->set_rules('stage_desc[]',"Stage Desccription",'trim|required|xss_clean');
//       $this->form_validation->set_rules('stage_time[]',"Estimate Time of Completion",'trim|required|xss_clean');
      
//       $stage = $this->input->post('stage_title') ? $this->input->post('stage_title') : array();

//       if ($this->form_validation->run() == FALSE){
    
//          echo json_encode(array("response" => "error", "message" => validation_errors()));
    
//       } 
 
//      else{
//                $data= array(
//                       'service_id' => $this->input->post('service_id'),
//             'subservice_title' => $this->input->post('service_title'),
//             'subservice_desc' => $this->input->post('service_desc'),

//           );
//                     $this->Projects_Model->insert_subservice($data);
//                     $get_last_project_id = $this->db->insert_id();

              
//                 foreach ($stage as $index => $value) {
//                     $data_stage= array(
//               'subservice_id' => $get_last_project_id,
//               'stage_title' => $this->input->post('stage_title')[$index],
//               'stage_desc' => $this->input->post('stage_desc')[$index],
//               'stage_time' => $this->input->post('stage_time')[$index],
//               'stage_delay' => $this->input->post('stage_delay')[$index],

//             );
      
//              $this->Projects_Model->insert_subservice_stage($data_stage);
//            }
            
    
//           echo json_encode(array("response" =>   "success", "message" => "Successfully Added Sub Service"));
    
//         }

        
//      }

//    public function delete_service($service_id) {  

//      $this->Projects_Model->delete_services($service_id);
//      $this->Projects_Model->delete_subservices($service_id);
//      echo json_encode(array("response" => "success", "message" => "Successfully Deleted a Service", "redirect" => base_url('projects')));
//    }

//    public function delete_subservice($subservice_id) {  

//      $this->Projects_Model->delete_subservice_only($subservice_id);
//      echo json_encode(array("response" => "success", "message" => "Successfully Deleted a Sub Service", "redirect" => base_url('projects')));
//    }


//    //update service 
//    public function update_service(){

//       $project_id = $this->input->post('service_id');
  
//       $stage_id = $this->input->post('stage_id') ? $this->input->post('stage_id') : array();

//         $this->form_validation->set_rules('service_title',"Service Name",'trim|required|xss_clean');
//         $this->form_validation->set_rules('service_desc',"Service Desccription",'trim|required|xss_clean');
//       $this->form_validation->set_rules('stage_title[]','Stage Title','trim|required|xss_clean');
//       $this->form_validation->set_rules('stage_desc[]','Stage Desccription','trim|required|xss_clean');
//       $this->form_validation->set_rules('stage_time[]',"Estimate Time of Completion",'trim|required|xss_clean');
      
//      if ($this->form_validation->run() == FALSE){
  
//        echo json_encode(array("response" => "error", "message" => validation_errors()));
  
//       } 
  
//       else{
  
  
//       $data = array(
  
//        'service_title' => $this->input->post('service_title'),
//        'service_desc' => $this->input->post('service_desc')
//      );
    
  
//        $this->Projects_Model->update_service($data, $project_id);

//        foreach ($stage_id as $index => $value) {
//          if($value == 0){
//          $data_stage= array(
//            'service_id' => $this->input->post('service_id'),
//            'stage_title' => $this->input->post('stage_title')[$index],
//            'stage_desc' => $this->input->post('stage_desc')[$index],
//            'stage_time' => $this->input->post('stage_time')[$index],
//            'stage_delay' => $this->input->post('stage_delay')[$index]

//            );
     
//             $this->Projects_Model->insert_service_stage($data_stage);

//          }else{
//          $data_stage= array(
//            // 'service_stage_id' => $value,
//            // 'service_id' => $this->input->post('service_id'),
//            'stage_title' => $this->input->post('stage_title')[$index],
//            'stage_desc' => $this->input->post('stage_desc')[$index],
//            'stage_time' => $this->input->post('stage_time')[$index],
//            'stage_delay' => $this->input->post('stage_delay')[$index]

//            );
     
//             $this->Projects_Model->update_service_stages($data_stage, $this->input->post('stage_id')[$index]);
//           }

//          }

//        echo json_encode(array("response" => "success", "message" => "Successfully Updated Service", "redirect" => base_url('account')));
  
//      }
  
//    }


//    //update subservice 
//    public function update_subservice(){

//       $project_id = $this->input->post('subservice_id');
  
//       $stage_id = $this->input->post('stage_id') ? $this->input->post('stage_id') : array();

//         $this->form_validation->set_rules('subservice_title',"Service Name",'trim|required|xss_clean');
//         $this->form_validation->set_rules('subservice_desc',"Service Desccription",'trim|required|xss_clean');
//       $this->form_validation->set_rules('stage_title[]','Stage Title','trim|required|xss_clean');
//       $this->form_validation->set_rules('stage_desc[]','Stage Desccription','trim|required|xss_clean');
//       $this->form_validation->set_rules('stage_time[]',"Estimate Time of Completion",'trim|required|xss_clean');
      
//      if ($this->form_validation->run() == FALSE){
  
//        echo json_encode(array("response" => "error", "message" => validation_errors()));
  
//       } 
  
//       else{
  
  
//       $data = array(
  
//        'subservice_title' => $this->input->post('subservice_title'),
//        'subservice_desc' => $this->input->post('subservice_desc')
//      );
    
  
//        $this->Projects_Model->update_subservice($data, $project_id);

//        foreach ($stage_id as $index => $value) {
//          if($value == 0){
//          $data_stage= array(
//            'subservice_id' => $this->input->post('subservice_id'),
//            'stage_title' => $this->input->post('stage_title')[$index],
//            'stage_desc' => $this->input->post('stage_desc')[$index],
//            'stage_time' => $this->input->post('stage_time')[$index],
//            'stage_delay' => $this->input->post('stage_delay')[$index]

//            );
     
//             $this->Projects_Model->insert_subservice_stage($data_stage, $this->input->post('stage_id')[$index]);           
//          }
//          else{
//          $data_stage= array(
//            // 'service_stage_id' => $value,
//            // 'service_id' => $this->input->post('service_id'),
//            'stage_title' => $this->input->post('stage_title')[$index],
//            'stage_desc' => $this->input->post('stage_desc')[$index],
//            'stage_time' => $this->input->post('stage_time')[$index],
//            'stage_delay' => $this->input->post('stage_delay')[$index]

//            );
     
//             $this->Projects_Model->update_subservice_stages($data_stage, $this->input->post('stage_id')[$index]);
//           }
//        }
//        echo json_encode(array("response" => "success", "message" => "Successfully Updated Service", "redirect" => base_url('account')));
  
//      }
  
//    }

    //end services


     public function upload_file(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
          if ( ! empty($_FILES)) 
          {
            $config["upload_path"]   = $this->upload_path;
            $config["allowed_types"] = "gif|jpg|png|zip|xls|doc|docx|ppt|pptx|pdf|csv";
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("file")) {
                 echo "failed to upload file(s)";
            }
            else{
                $media = $this->upload->data();

            $data =  array(

                             'project_id' =>  $this->input->post('project_id'),

                             'user_id' => $this->session->userdata['userlogin']['user_id'],

                             'file_name' =>  $media['file_name'],

                             'extension' =>  pathinfo($media['file_name'],PATHINFO_EXTENSION),

                             'upload_user'  => $user_charge,

                             'date_uploaded' => date("Y-m-d h:i:s"),

                           );
                    $this->File_Model->insert($data);

            }
          }

          $receive_user_notify = $this->User_Model->select_user_specify_notify_remark($this->session->userdata['userlogin']['user_id']);
           $receive_publisher_notification = $this->Lead_Model->select_publisher_project_id($this->input->post('project_id'));
                foreach ($receive_user_notify as $value) {

                      $data_notification = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => "Uploaded File's",
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->post('project_id'),
                           'to_user_id' => $value['user_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
                   $this->Notification_Model->insert($data_notification);
           }


               if($receive_publisher_notification !=false){
                           $data_notification_publisher = array(
                                 'from_user' => $user_charge,
                                 'to_user' => 'All',
                                 'message' => "Uploaded File's",
                                 'unread' => 1,
                                 'date_notify' => date('Y-m-d H:i:s'),
                                 'link' =>  dirname(base_url(uri_string())),
                                 'id' =>  $this->input->post('project_id'),
                                 'to_user_id' => $receive_publisher_notification['publisher_id'],
                                 'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                               );
                  $this->Notification_Model->insert($data_notification_publisher);
                }
     

        }

        public function upload_memo_file(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
          if ( ! empty($_FILES)) 
          {
             $config['upload_path'] = FCPATH.'upload_memo/';
            $config["upload_path"]   = $this->upload_path;
            $config["allowed_types"] = "gif|jpg|png|zip|xls|doc|docx|ppt|pptx|pdf|csv";
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("add_file")) {
                 echo "failed to upload file(s)";
            }
            else{
                $media = $this->upload->data();

            /*$data =  array(

                             'project_id' =>  $this->input->post('project_id'),

                             'file_name' =>  $media['file_name'],

                             'extension' =>  pathinfo($media['file_name'],PATHINFO_EXTENSION),

                             'upload_user'  => $user_charge,

                             'date_uploaded' => date("Y-m-d h:i:s"),

                           );*/
                    $data = array('attach_file' => $this->upload->data());
                    $this->Notification_model->insert($data);

            }
          }
        }

        public function remove()
        {
          $file = $this->input->post("file");
          if ($file && file_exists($this->upload_path . "/" . $file)) {
            unlink($this->upload_path . "/" . $file);
          }
        }

        public function list_files()
        {
          $this->load->helper("file");
          $files = get_filenames($this->upload_path);
          // we need name and size for dropzone mockfile
          foreach ($files as &$file) {
            $file = array(
              'name' => $file,
              'size' => filesize($this->upload_path . "/" . $file)
            );
          }

          header("Content-type: text/json");
          header("Content-type: application/json");
          echo json_encode($files);
        }

               
       public function download_file(){
          $files_name = $this->input->post('file_name');
             foreach($files_name as $file_name)
             {
              $this->zip->read_file($file_name);
             }
             $this->zip->download(''.time().'.zip');

             

        }




   function time_ago($datetime, $full = false) {
        //date_default_timezone_set('America/New_York');
         $now = new DateTime;
          $ago = new DateTime($datetime);
          $diff = $now->diff($ago);

          $diff->w = floor($diff->d / 7);
          $diff->d -= $diff->w * 7;

          $string = array(
              'y' => 'year',
              'm' => 'month',
              'w' => 'week',
              'd' => 'day',
              'h' => 'hour',
              'i' => 'minute',
              's' => 'second',
          );
          foreach ($string as $k => &$v) {
              if ($diff->$k) {
                  $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
              } else {
                  unset($string[$k]);
              }
          }

          if (!$full) $string = array_slice($string, 0, 1);
          return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

     public function add_author_subject(){
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

              
          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history($this->session->userdata['userlogin']['user_id']);

          $this->load->view('add_subject_agent', $records);  


      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

                
          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history($this->session->userdata['userlogin']['user_id']);

          $this->load->view('add_subject', $records);  

      }
          

      }

     public function update_author_subject(){
         
       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

              
          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email_agent($this->session->userdata['userlogin']['user_id']);

          $records['email_history']= $this->Signature_Model->view_email_history($this->session->userdata['userlogin']['user_id']);

          $this->load->view('update_subject_agent', $records);  

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

                
          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history($this->session->userdata['userlogin']['user_id']);

          $this->load->view('update_subject', $records);  


      }
          

          
      }

    public function sold_leads($id=""){

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);


      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $records['sales_lead']= $this->Payment_Model->sales_lead_byid($this->session->userdata['userlogin']['user_id']);

          $records['user_agents']= $this->Payment_Model->sales_lead_byid($this->session->userdata['userlogin']['user_id']);


          $this->load->view('sale_lead_agent', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

          $records['sales_lead']= $this->Payment_Model->sales_lead();

          $records['user_agents']= $this->Payment_Model->sales_lead();

          $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
          $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

          $this->load->view('template/header_finance', $records);
          $this->load->view('template/sidebar_finance', $records);
          $this->load->view('sale_lead', $records);
          $this->load->view('template/footer_finance', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){
          $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

          $records['sales_lead']= $this->Payment_Model->sales_lead();

          $records['user_agents']= $this->Payment_Model->sales_lead();

          $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
          $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
            
          $this->load->view('template/header_admin', $records);
          $this->load->view('template/sidebar_admin', $records);
          $this->load->view('sale_lead', $records);
          $this->load->view('template/footer_admin', $records);


      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

          $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

          $records['sales_lead']= $this->Payment_Model->sales_lead_by_managerid($this->session->userdata['userlogin']['user_id']);

          $records['user_agents']= $this->Payment_Model->sales_lead();

          $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
           $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

            $this->load->view('template/header_manager', $records);
            $this->load->view('template/sidebar_manager', $records);
            $this->load->view('sale_lead', $records);
            $this->load->view('template/footer_manager', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

          $records['sales_lead']= $this->Payment_Model->sales_lead();

          $records['user_agents']= $this->Payment_Model->sales_lead();

          $this->load->view('sale_lead_author', $records);

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['sales_lead']= $this->Payment_Model->sales_lead();

          $records['user_agents']= $this->Payment_Model->sales_lead();

             $this->load->view('template/header_production', $records);
             $this->load->view('template/sidebar_production', $records);
             $this->load->view('sale_lead_production', $records);
             $this->load->view('template/footer_production', $records);

      }

    }

    public function users_penalty_matrix($id=""){

    echo   modules::run("account/is_logged_in");

    exit();
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

      $records['users']= $this->User_Model->view_alluser();

      $this->load->view('template/header_admin', $records);
      $this->load->view('template/sidebar_admin', $records);
      $this->load->view('users_penalty_matrix', $records);
      $this->load->view('template/footer_admin', $records);

    }

      public function update_penalty(){

     x("account/is_logged_in");

      $penalty_id = $_POST['penalty_id'];

      $warning_level = $_POST['warning_level'];

      $data = array('penalty_id' => $penalty_id, 'warning_level' => $warning_level);
      
      for($i = 1; $i<=233; $i++){
        
        $data['field_'.$i]= $this->input->post('field'.$i);
        
        }

      $this->Penalty_Model->update_penalty($data, $penalty_id);

      header('Location: https://hlmcrm.site/dashboard/users_penalty_matrix');


    }


      public function create_penalty($user_id){

      modules::run("account/is_logged_in");


      $data = array('user_id' => $user_id );
      

      $this->Penalty_Model->insert($data);

      header('Location: https://hlmcrm.site/dashboard/users_penalty_matrix');

    }

    public function create_penalty_agent(){

      modules::run("account/is_logged_in");

      $user_id = $this->session->userdata['userlogin']['user_id'];


      $data = array('user_id' => $user_id );
      

      $this->Penalty_Model->insert($data);

      header('Location: https://hlmcrm.site/dashboard/view_penaltymatrix_agent');

    }

    public function view_penaltymatrix(){

     modules::run("account/is_logged_in");
   
    // echo '<script>alert('.$user_id.')</script>';

    $id = $_GET['id'];
    
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['penalties']= $this->Penalty_Model->select_user_penalty($id);

     $records['users']= $this->User_Model->select_user_id($id);


      $this->load->view('template/header_admin', $records);
      $this->load->view('template/sidebar_admin', $records);
      $this->load->view('penalty_matrix', $records);
      $this->load->view('template/footer_admin', $records);

    }

    public function view_penaltymatrix_agent(){

     modules::run("account/is_logged_in");
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
     $id = $this->session->userdata['userlogin']['user_id'];

     $records['penalties']= $this->Penalty_Model->select_user_penalty($id);

      $this->load->view('penalty_matrix_agent', $records);


    }

    public function check_lead($id=""){

      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      // modules::run("account/is_logged_in");

        if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

            $admin_data =  $this->Lead_Model->select_collection_all_admin();

            $manager_data = $this->Lead_Model->select_collection_all_manager();

            $agent_data= $this->Lead_Model->select_collection_all();

            $agent_data = $agent_data == false ?  array() : $agent_data ;

            $manager_data = $manager_data == false ?  array() : $manager_data ;

            $admin_data = $admin_data == false ?  array() : $admin_data ;   
            
            $records['leads'] = array_merge($admin_data, $manager_data, $agent_data);
            // $unique =  $this->unique_multi_array($data, 'project_id');
            $this->load->view('check_lead_agent', $records); 
          }

          else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){
            
            $admin_data =  $this->Lead_Model->select_collection_all_admin();

            $manager_data = $this->Lead_Model->select_collection_all_manager();

            $agent_data= $this->Lead_Model->select_collection_all();

            $agent_data = $agent_data == false ?  array() : $agent_data ;

            $manager_data = $manager_data == false ?  array() : $manager_data ;

            $admin_data = $admin_data == false ?  array() : $admin_data ;   
            
            $records['leads'] = array_merge($admin_data, $manager_data, $agent_data);
            // $unique =  $this->unique_multi_array($data, 'project_id');
            $this->load->view('template/header_admin', $records);
            $this->load->view('template/sidebar_admin', $records);
            $this->load->view('check_lead_admin', $records);   
            $this->load->view('template/footer_admin', $records);  
          }

       }
            public function check_lead_admin_limit(){

              $rowperpage = 100;
              $output = array();
      // Row position
               $rowno = $_POST['start'];

                if($_POST['search']['value'] !=''){
                  $list = $this->Lead_Model->select_collection_all_admin_limit($rowno,$rowperpage,$_POST['search']['value']);
                  $data = array();
              
                  foreach ($list as $lead) {
                         $data[]= $lead;
                  }
                  $query = $this->Lead_Model->getrecord_checkleadCount($_POST['search']['value']);


                  $output = array(
                                  "draw" => $_POST['draw'],
                                  "recordsTotal" => $query['count'],
                                  "recordsFiltered" => $query['num_rows'],
                                  "data" => $data,
                          );
                                      echo json_encode($output);

                }
                  //output to json format

        }
         public function all_lead_admin(){

              $rowperpage = 100;
      // Row position
               $rowno = $_POST['start'];

                  $list = $this->Lead_Model->select_lead_admin_data_limit($rowno,$rowperpage,$_POST['search']['value']);
                  $data = array();
              
                  foreach ($list as $lead) {
                         $data[]= $lead;
                  }
                  $query = $this->Lead_Model->getrecord_AllLead($_POST['search']['value']);


                  $output = array(
                                  "draw" => $_POST['draw'],
                                  "recordsTotal" => $query['count'],
                                  "recordsFiltered" => $query['num_rows'],
                                  "data" => $data,
                          );
                   echo json_encode($output);

                
                  //output to json format

        }
      //     public function all_lead_admin(){

      //         $rowperpage = 100;
      // // Row position
      //          $rowno = $_POST['start'];

      //             $list = $this->Lead_Model->select_lead_admin_data_limit($rowno,$rowperpage,$_POST['search']['value']);
      //             $data = array();
              
      //             foreach ($list as $lead) {
      //                    $data[]= $lead;
      //             }
      //             $query = $this->Lead_Model->getrecord_AllLead($_POST['search']['value']);


      //             $output = array(
      //                             "draw" => $_POST['draw'],
      //                             "recordsTotal" => $query['count'],
      //                             "recordsFiltered" => $query['num_rows'],
      //                             "data" => $data,
      //                     );
      //              echo json_encode($output);

                
      //             //output to json format

      //   }
            public function status_lead_no_activities(){
  
              $rowperpage = 100;
              $rowno = $_POST['start'];

                  $list = $this->Lead_Model->select_all_remark_date($rowno,$rowperpage,$_POST['search']['value'], $this->input->post('start_date'), $this->input->post('end_date'), $this->input->post('agent_name'));
                  $data = array();
                  $output = array();

                 if(!empty($list) || $list != ""){
                    foreach ($list as $lead) {
                           $data[]= $lead;
                    }
                    $query = $this->Lead_Model->getrecord_CountNoactivities_Lead($_POST['search']['value']);


                    $output = array(
                                    "draw" => $_POST['draw'],
                                    "recordsTotal" => $query['count'],
                                    "recordsFiltered" => $query['num_rows'],
                                    "data" => $data,
                            );
                  echo json_encode($output);
                }
  

        }
        public function load_check_lead(){

          $admin_data =  $this->Lead_Model->select_collection_all_admin();

          $manager_data = $this->Lead_Model->select_collection_all_manager();

          $agent_data= $this->Lead_Model->select_collection_all();

          $agent_data = $agent_data == false ?  array() : $agent_data ;

          $manager_data = $manager_data == false ?  array() : $manager_data ;

          $admin_data = $admin_data == false ?  array() : $admin_data ;   

          $data = array_merge($admin_data, $manager_data, $agent_data);
          $unique =  $this->unique_multi_array($data, 'project_id');

          echo json_encode($data);

      }


       public function my_test(){


       date_default_timezone_set('America/New_York');
       // echo  date("Y-m-d h:i:s");
       // exit();

      require APPPATH.'vendor/autoload.php';

       $data = array();

      $RECIPIENT = '+18882248399';

      $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

      $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

      $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';



      $RINGCENTRAL_USERNAME = '+18882248399';

      $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

      $RINGCENTRAL_EXTENSION = '101';



      $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);



      $platform = $rcsdk->platform();



      $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);

       $last_seven_days = date('Y-m-d', strtotime('-365 days'));


      $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$last_seven_days.'&dateTo='.date('Y-m-d', strtotime('+5 days')));



       if ($this->session->userdata['userlogin']['usertype'] == "Finance"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_history', $records);  

      }



      else if ($this->session->userdata['userlogin']['usertype'] == "Admin"){
               date_default_timezone_set('America/New_York');

          $records['all_users']= $this->User_Model->select_user_agent_manager();

          $records['call_log_histories'] = $resp->json()->records;

          $this->load->view('call_logs_history', $records);  

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_production', $records);  

      }

       else if ($this->session->userdata['userlogin']['usertype'] == "Author Relation"){

          $records['call_log_history']= $this->Signature_Model->view_email_history_all();

          $this->load->view('email_authors_author_history', $records);  

      }

      else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){
         date_default_timezone_set('America/New_York');
         $records['all_users']= $this->User_Model->select_user_agent_manager();
         $records['call_log_histories'] = $resp->json()->records;


          $this->load->view('call_logs_history_manager_test', $records);  

      }



      else if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $records['signatures']= $this->Signature_Model->view_signature($this->session->userdata['userlogin']['user_id']);

          $records['author_emails_updates']= $this->Lead_Model->select_author_email_not_empty();

          $records['author_emails']= $this->Lead_Model->select_author_email();

          $records['email_history']= $this->Signature_Model->view_email_history($this->session->userdata['userlogin']['user_id']);

          $this->load->view('call_logs_history', $records);  

      }

     }

     public function lead_status(){
          $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
         if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

           $records['leads']= $this->Lead_Model->select_status_lead_admin();
          $records['assign_users']= $this->User_Model->select_user_agent();

           $records['author_names']= $this->Lead_Model->select_author_name();
           // $records['lead_status_remarks'] = $this->Lead_Model->select_all_remark_date();

           $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
           $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
               
            $this->load->view('template/header_admin', $records);
            $this->load->view('template/sidebar_admin', $records);
            $this->load->view('lead_status', $records);    
            $this->load->view('template/footer_admin', $records);

         }
     }



     public function upload_attendance_file(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
          if ( ! empty($_FILES)) 
          {
            // $config["upload_path"]   = $this->upload_path;
            $config['upload_path'] = FCPATH.'attendance_files/';

            $config["allowed_types"] = "gif|jpg|png|zip|xls|xlsx|doc|docx|ppt|pptx|pdf|csv";
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("attendance_file")) {
               echo json_encode(array("response" =>   "error", "message" => "Failed to upload file(s)", "redirect" => base_url('dashboard')));

            }
            else{
                $media = $this->upload->data();

            $data =  array(

                             'from_user' =>  $user_charge,
                             'file_name' =>  $media['file_name'],
                             'attendance_id' =>  $this->input->post('attendance_id'),

                             'extension' =>  pathinfo($media['file_name'],PATHINFO_EXTENSION),

                             'date_uploaded' => date("Y-m-d H:i:s"),

                           );
                    $this->Attendance_Model->insert_attendance_file($data);

                 $attendance_files = $this->Attendance_Model->select_attendancefile_id($this->input->post('attendance_id'));    
                $receive_user_notify = $this->User_Model->select_user_notify_attendance();
                 $receive_agent_notification = $this->User_Model->select_attendance_id($this->input->post('attendance_id'));

           if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
               foreach ($receive_user_notify_all as $value) {
                            $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Added File on Attendance',
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'id' =>  $this->input->post('attendance_id'),
                                       'unread' => 1,
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                 }
          }
          else{

             $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Added File on Attendance',
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'id' =>  $this->input->post('attendance_id'),
                                       'unread' => 1,
                                       'to_user_id' => $receive_agent_notification['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);

          }

                echo json_encode(array("response" =>   "success", "message" => "Successfully Added File", "attendance_files" => $attendance_files));


            }
          }
        }

        public function lead(){
        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

             if ($this->session->userdata['userlogin']['usertype'] == "Admin"){

            if ($this->uri->segment(3) && $this->uri->segment(3)!="") {
                  $page_no = $this->uri->segment(3);
            } else {
                $page_no = 1;
             }


                $records['page_no'] = $page_no; 
                $total_records_per_page = 100;
                $offset = ($page_no-1) * $total_records_per_page;
                $records['previous_page'] = $page_no - 1;
                $records['next_page'] = $page_no + 1;
                $records['adjacents'] = "2"; 

                $total_records = $this->Lead_Model->select_total_lead();
                $records['total_records'] = $this->Lead_Model->select_total_lead();
                $total_no_of_pages= ceil($total_records / $total_records_per_page);
                $records['total_no_of_pages'] = ceil($total_records / $total_records_per_page);
                $records['second_last'] = $total_no_of_pages - 1; // total page minus 1
                $records['leads']  = $this->Lead_Model->select_lead_admin_data($total_records_per_page, $offset);


                $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
                $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);


                $this->load->view('template/header_admin', $records);
                $this->load->view('template/sidebar_admin', $records);
                $this->load->view('dashboard-admin', $records);    
                $this->load->view('template/footer_admin', $records);


         }

       }

           public function view_notification() { 
              $data=array();

              $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

              $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
              $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

              $this->Notification_Model->update_notification($this->session->userdata['userlogin']['user_id'],$user_charge, $this->session->userdata['userlogin']['usertype']); 
             //echo json_encode('success');
               if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

                      $this->load->view('template/header_agent', $records);
                      $this->load->view('template/sidebar_agent', $records);
                      $this->load->view('notifications', $records);            
                      $this->load->view('template/footer_agent', $records);
               }
              else if ($this->session->userdata['userlogin']['usertype'] == "Manager"){

                      $this->load->view('template/header_manager', $records);
                      $this->load->view('template/sidebar_manager', $records);
                      $this->load->view('notifications', $records);            
                      $this->load->view('template/footer_manager', $records);
               }
                else if ($this->session->userdata['userlogin']['usertype'] == "Production"){

                      $this->load->view('template/header_production', $records);
                      $this->load->view('template/sidebar_production', $records);
                      $this->load->view('notifications', $records);            
                      $this->load->view('template/footer_production', $records);
               }
                else if ($this->session->userdata['userlogin']['usertype'] == "Publishing/Marketing"){

                      $this->load->view('template/header_publisher', $records);
                      $this->load->view('template/sidebar_publisher', $records);
                      $this->load->view('notifications', $records);            
                      $this->load->view('template/footer_publisher', $records);
               }

               else{
                      $this->load->view('template/header_admin', $records);
                      $this->load->view('template/sidebar_admin', $records);
                      $this->load->view('notifications', $records);            
                      $this->load->view('template/footer_admin', $records);

               }
      } 
        public function view_notification_all_user() { 
              $data=array();

              $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

              $data_notification  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

              $this->Notification_Model->update_notification($this->session->userdata['userlogin']['user_id'],$user_charge, $this->session->userdata['userlogin']['usertype']); 
              echo json_encode($data_notification);


            // $this->load->view('notifications', $records);            
      }


   public function memos($id=""){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      modules::run("account/is_logged_in");

      $user_id = $this->session->userdata['userlogin']['user_id'];

      $records['users'] = $this->User_Model->select_user_all();

      $records['notifications'] = $this->Notification_Model->select_user_memos($user_id);

      $this->load->view('memos_agent', $records);

    }

    public function memosHr(){

      modules::run("account/is_logged_in");

      $user_id = $this->session->userdata['userlogin']['user_id'];
      $from_user = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

      $records['users'] = $this->User_Model->select_user_all();

     // $records['memos'] = $this->Notification_Model->select_user_memos($user_id);
      $records['memos'] = $this->Notification_Model->select_user_memos1($from_user, $user_id);
      
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

      $this->load->view('template/header_admin', $records);
      $this->load->view('template/sidebar_admin', $records);
      $this->load->view('memos_hr', $records);
      $this->load->view('template/footer_admin', $records);


    }

    public function view_memo(){

     modules::run("account/is_logged_in");
   

    $memo_id = $_GET['id'];
    
    $user_id = $this->session->userdata['userlogin']['user_id'];

    $records['notifications']= $this->Notification_Model->view_memo($memo_id, $user_id);

    $this->load->view('memo_detail', $records);

    }

    public function view_memoHr(){

     modules::run("account/is_logged_in");
   

     $memo_id = $_GET['id'];
    
     //$user_id = $this->session->userdata['userlogin']['user_id'];

     $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
     $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
     $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);



     $records['memos']= $this->Notification_Model->view_memo1($memo_id, $user_charge);

    

     $this->load->view('template/header_admin', $records);
     $this->load->view('template/sidebar_admin', $records);
     $this->load->view('memo_detailHr', $records);
     $this->load->view('template/footer_admin', $records);


    }




    public function add_announcement(){
        date_default_timezone_set('America/New_York');
        $values = $this->input->post('sendto');
        //array_push($values, $this->session->userdata['userlogin']['emailaddress']);
        //array_push($values, 'ranelmelgo@gmail.com');
        $media['file_name'] = "";
        


/*Form validation for required fields*/
        if(count($values) < 1){
            $this->form_validation->set_rules('sendto','To:','trim|required|xss_clean');           
        }
        $this->form_validation->set_rules('subject','Re:','trim|required|xss_clean');
        $this->form_validation->set_rules('message','Message Section','trim|required|xss_clean');



       if ($this->form_validation->run() == FALSE){
            echo json_encode(array("response" => "error", "message" => validation_errors()));
       } 

       else{

/*Upload the attached file*/
            $config["upload_path"]   = FCPATH.'upload_memo/';
            $config["allowed_types"] = "gif|jpg|png|zip|xls|txt|xlsx|doc|docx|ppt|pptx|pdf|csv";
            $this->load->library('upload', $config);

            $this->upload->do_upload("file");

            $media = $this->upload->data();


/*Insert data to database*/        
             foreach ($values as $a){

                         $data =  array(

                                         'title' => $this->input->post('title'),

                                         'from_user' => $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'],

                                         'to_user' => 'All',

                                         'message' => 'Added Memo',

                                         'subject' => $this->input->post('subject'),

                                         'body' => $this->input->post('message'),

                                         'to_user_id' => $a,

                                         'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                                         'attached_file' => $media['file_name'],

                                         'unread' => 1,
                                         'link' => dirname(base_url(uri_string())),

                                         'date_notify' => date("Y-m-d H:i:s")

                                     );

                                    $this->Notification_Model->insert($data);            
                             


/*Send email*/
         $msgsection = $this->input->post('message');

        $result = $this->User_Model->select_user_emailaddress($a);

        if($result > 0){
        $email_address = $result[0]['emailaddress'];

                 $subject = 'Memo/Incentive Copy';

                  $message =  '<p>User '.$email_address.' please see attach file.</p>';

                  $message .= '<p> Message:'.''. $msgsection.'</p>';

                  


                  $this->email->set_newline("\r\n");

                  $this->email->set_header('MIME-Version', '1.0; charset=utf-8');

                  $this->email->from('admin@horizonsliterary.us');

                  $this->email->to($email_address);

                  //$recipients = Array('ranelmelgo@gmail.com');

                 // $this->email->to($mail_id, $recipients);

                  $this->email->subject($subject);

                  $this->email->message($message);



                  

                  if($_FILES['file']['size'] != 0) {

                    $attched_file= $_SERVER["DOCUMENT_ROOT"]."/upload_memo/".$media['file_name'];

                    $this->email->attach($attched_file);
                  
                  }
                

                $this->email->send();
             //}         
           }
                
        }
        echo json_encode(array("response" =>   "success", "message" => "Successfully Added Memo", "redirect" => base_url('dashboard')));
      
     }

}


    public function add_production_remark(){

         $history_agent=array();

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $usertype = $this->session->userdata['userlogin']['usertype'];

         $this->form_validation->set_rules('remark','Remark','trim|required|xss_clean');        


       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{
             $receive_user_notify = $this->User_Model->select_user_specify_notify_remark($this->session->userdata['userlogin']['user_id']);
             $receive_agent_notification = $this->Lead_Model->select_project_id($this->input->post('project_id'));
             $receive_author_notification = $this->Lead_Model->select_author_report_id($this->input->post('report_id'));
             $receive_publisher_notification = $this->Lead_Model->select_publisher_project_id($this->input->post('project_id'));


            if($receive_author_notification !=false){
                $data =  array(

                                 'project_id' => $this->input->post('project_id'),
                                 'report_id' => $this->input->post('report_id'),
                                 'author_user_id' => $receive_author_notification['author_id'],

                                 'user_id' => $this->session->userdata['userlogin']['user_id'],

                                 'create_remark'  => $this->input->post('remark'),

                                 'from_user'  => $user_charge,

                                 'from_usertype'  => $usertype,

                                 'date_create_remark' => date("Y-m-d H:i:s"),
                                 'unread' => 1,

                             );
              }
          else{
            $data =  array(

                                 'project_id' => $this->input->post('project_id'),
                                 'report_id' => $this->input->post('report_id'),

                                 'user_id' => $this->session->userdata['userlogin']['user_id'],

                                 'create_remark'  => $this->input->post('remark'),

                                 'from_user'  => $user_charge,

                                 'from_usertype'  => $usertype,

                                 'date_create_remark' => date("Y-m-d H:i:s"),
                                 'unread' => 1,

                             );

          }

            $this->Lead_Model->insert_production_remark($data);


             foreach ($receive_user_notify as $value) {

                      $data_notification = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => "Added Remark on Lead's",
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->post('project_id'),
                           'to_user_id' => $value['user_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
                   $this->Notification_Model->insert($data_notification);
           }
        


        if ($this->session->userdata['userlogin']['usertype'] != "Publishing/Marketing"){
          if($receive_publisher_notification !=false){
              $data_notification_publisher = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => "Added Remark on Lead's",
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->post('project_id'),
                           'to_user_id' => $receive_publisher_notification['publisher_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
               $this->Notification_Model->insert($data_notification_publisher);
             }

         }

            if($receive_author_notification !=false){
              $data_notification_author = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => "Added Comment on Author Milestone",
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'to_user_id' => $receive_author_notification['author_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
               $this->Notification_Model->insert_author_notification($data_notification_author);
             }





             echo json_encode(array("response" =>   "success", "message" => "Successfully Added Remark", "redirect" => base_url('dashboard')));

           }

      }

    public function update_contract_status($project_id) {

            $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

            $project_id = $this->uri->segment(3);

            $contractual_status = '';

            $row = $this->Lead_Model->select_project_id($project_id); 
               if ($row['contractual_status'] == 'Pending'){
                    $this->Lead_Model->update_lead(array('contractual_status' => 'Processing',  'date_contract_signed' => date("Y-m-d H:i:s")), $project_id);
                    $contractual_status  =  "Processing";

                }
              else if ($row['contractual_status'] == 'Processing'){
                     $this->Lead_Model->update_lead(array('contractual_status' => 'Pending',  'date_contract_signed' => date("Y-m-d H:i:s")), $project_id);
                     $contractual_status = "Pending";


                }
              else{
                      $contractual_status = $row['contractual_status'];
                }


                  $data2 = array(

                     'project_id' => $project_id,

                     'lead_contractual_status' => $contractual_status,

                     'alter_contractual_status' => 'Changed',

                     'date_signed'  => date("Y-m-d h:i:s"),

                     'alter_contractual_date'  => date("Y-m-d h:i:s"),

                    );
          
                   $this->Contractual_Model->insert($data2);


           $receive_user_notify = $this->User_Model->select_user_specify_notify_all($this->session->userdata['userlogin']['user_id']);

           $receive_agent_notification = $this->Lead_Model->select_project_id($project_id);

            foreach ($receive_user_notify as $value) {
                          $data_notification= array(
                                     'from_user' => $user_charge,
                                     'to_user' => '`All',
                                     'message' => 'Changed Contract Status as '.$contractual_status.'  ',                                     
                                     'unread' => 1,
                                     'to_user_id' => $value['user_id'],
                                     'link' => dirname(base_url(uri_string())),
                                     'id' => $project_id,
                                     'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
                                   );
                         $this->Notification_Model->insert($data_notification);
             }

            // $agent_notification= array(
            //                          'from_user' => $user_charge,
            //                          'to_user' => 'All',
            //                          'message' => 'Changed Contract Status as '.$contractual_status.'  ',                                     
            //                          'unread' => 1,
            //                          'to_user_id' => $receive_agent_notification['user_id'],
            //                          'from_usertype' => $this->session->userdata['userlogin']['usertype'],
        
            //                        );
            // $this->Notification_Model->insert($agent_notification);
            $records['leads']= $this->Lead_Model->view_leads($this->session->userdata['userlogin']['user_id']);
             $this->load->view('contract_agent', $records);
           }




      public function confirm_announcement()
      {

        $id = $this->input->post('user_id');

        $result = $this->User_Model->select_user_emailaddress($id);

        if($result > 0){
        $email_address = $result[0]['emailaddress'];
        echo $email_address;

        

                  $subject = 'User Memo Confirmation';

                  $url= base_url("account");

                  $message =  '<p>User '.$email_address.' confirmed that he/she have read the document and have fully understood its contents.</p>';

                  // $message .= '<p>Hi '. ucfirst($this->input->post('firstname')) . ' '.ucfirst($this->input->post('lastname')). '</p>';

                  // $message .= '<p>This is Your Email <b>'. $this->input->post('email_address').'</b> And </p>';

                  // $message .= '<p>Your Tempory Password <b>'.$get_random.'</b>  was trying to put your password and after login your account, you can change your password after login your account on setting.</p>';

                  // $message .= '<p>Click this link to login your account <a href="'.$url.'">Click Here</a></p>';



                  $this->email->set_newline("\r\n");

                  $this->email->set_header('MIME-Version', '1.0; charset=utf-8');



                  $this->email->from('admin@horizonsliterary.us');

                  $this->email->to($email_address);

                  $this->email->subject($subject);

                  $this->email->message($message);

        

                 //Send mail

                if($this->email->send()){

                      echo json_encode(array("response" => "success", "message" => "You are successfully added account"));

                  }

                else{

                    echo json_encode(array("response" => "errorsend", "message" => "Failure: Email was not sent"));

                  }

            }
      }




    public function activities($id=""){
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

     if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
            $user_id = $this->session->userdata['userlogin']['user_id'];
            $records['activities']= $this->Remark_Model->user_remarks($this->session->userdata['userlogin']['user_id']);
           $records['current_activities'] =  $this->Remark_Model->select_count_remarks_agent($user_id, date('Y-m-d'));
           $this->load->view('template/header_agent', $records);
           $this->load->view('template/sidebar_agent', $records);
           $this->load->view('activities', $records);     


          }

        }

      //funciton of forms
      //leave form
      public function leaveForm(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
          $records['fullname'] = $this->session->userdata['userlogin']['real_name'];
          $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
          $records['position'] = $this->session->userdata['userlogin']['usertype'];
          $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
          $records['transaction_code'] = $this->generateRandomString();

          $this->load->view('leave_form', $records);

        } 

         elseif ($this->session->userdata['userlogin']['usertype'] == "IT"){
              $records['fullname'] = $this->session->userdata['userlogin']['real_name'];
              $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
              $records['position'] = $this->session->userdata['userlogin']['usertype'];
              $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
              $records['transaction_code'] = $this->generateRandomString();

              $this->load->view('leave_form_IT', $records);

        } 


        elseif ($this->session->userdata['userlogin']['usertype'] == "Human Resources") {
          
          $records['fullname'] = $this->session->userdata['userlogin']['real_name'];
          $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
          $records['position'] = $this->session->userdata['userlogin']['usertype'];
          $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
          $records['transaction_code'] = $this->generateRandomString();


          $this->load->view('leave_form_hr', $records);

         } elseif ($this->session->userdata['userlogin']['usertype'] == "Manager") {

          $records['fullname'] = $this->session->userdata['userlogin']['real_name'];
          $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
          $records['position'] = $this->session->userdata['userlogin']['usertype'];
          $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
          $records['transaction_code'] = $this->generateRandomString();


          $this->load->view('leave_form_manager', $records);
         }
       }
      //Official business leave form
      public function officialBusinessLeaveForm(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          $records['fullname'] = $this->session->userdata['userlogin']['real_name'];
          $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
          $records['position'] = $this->session->userdata['userlogin']['usertype'];
          $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
          $records['transaction_code'] = $this->generateRandomString();

         
          $this->load->view('official_business_leave_form', $records);

        } 

      elseif ($this->session->userdata['userlogin']['usertype'] == "IT"){

          $records['fullname'] = $this->session->userdata['userlogin']['real_name'];
          $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
          $records['position'] = $this->session->userdata['userlogin']['usertype'];
          $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
          $records['transaction_code'] = $this->generateRandomString();

         
          $this->load->view('official_business_leave_form_IT', $records);

        } 



        elseif ($this->session->userdata['userlogin']['usertype'] == "Human Resources") {
 
          $records['fullname'] = $this->session->userdata['userlogin']['real_name'];
          $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
          $records['position'] = $this->session->userdata['userlogin']['usertype'];
          $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
          $records['transaction_code'] = $this->generateRandomString();
         
          $this->load->view('official_business_leave_formhr', $records);

        } elseif ($this->session->userdata['userlogin']['usertype'] == "Manager") {

          $records['fullname'] = $this->session->userdata['userlogin']['real_name'];
          $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
          $records['position'] = $this->session->userdata['userlogin']['usertype'];
          $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
          $records['transaction_code'] = $this->generateRandomString();
         
          $this->load->view('official_business_leave_manager_form', $records);
        }
      }
      //undertime form
      public function undertimeForm(){


        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

         $records['fullname'] = $this->session->userdata['userlogin']['real_name'];
         $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
         $records['position'] = $this->session->userdata['userlogin']['usertype'];
         $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
         $records['transaction_code'] = $this->generateRandomString();
         
         $this->load->view('undertime_form', $records);
        } 
         elseif ($this->session->userdata['userlogin']['usertype'] == "IT"){

         $records['fullname'] = $this->session->userdata['userlogin']['real_name'];
         $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
         $records['position'] = $this->session->userdata['userlogin']['usertype'];
         $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
         $records['transaction_code'] = $this->generateRandomString();
         
         $this->load->view('undertime_form_IT', $records);
        } 


        elseif ($this->session->userdata['userlogin']['usertype'] == "Human Resources") {

         $records['fullname'] = $this->session->userdata['userlogin']['real_name'];
         $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
         $records['position'] = $this->session->userdata['userlogin']['usertype'];
         $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
         $records['transaction_code'] = $this->generateRandomString();

         $this->load->view('undertime_form_hr', $records);

       } elseif ($this->session->userdata['userlogin']['usertype'] == "Manager") {
         
         $records['fullname'] = $this->session->userdata['userlogin']['real_name'];
         $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
         $records['position'] = $this->session->userdata['userlogin']['usertype'];
         $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
         $records['transaction_code'] = $this->generateRandomString();

         $this->load->view('undertime_form_manager', $records);
       }
      }
      //submitted Forms all
      public function SubmittedFormsall(){

        /*$records['fullname'] = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
        $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
        $records['position'] = $this->session->userdata['userlogin']['usertype'];*/

        modules::run("account/is_logged_in");

        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['users'] = $this->User_Model->select_user_all();

        $records['forms'] = $this->Form_Model->view_forms_user_all();

        $this->load->view('submitted_forms_hr', $records); 
  
      }
      //submitted Forms
      public function SubmittedForms($id=""){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

        if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

          modules::run("account/is_logged_in");

          $user_id = $this->session->userdata['userlogin']['user_id'];

          $records['users'] = $this->User_Model->select_user_all();

          $records['forms'] = $this->Form_Model->view_forms_user($user_id);

          $this->load->view('submitted_forms', $records); 
  
         } 

        elseif ($this->session->userdata['userlogin']['usertype'] == "IT"){

          modules::run("account/is_logged_in");

          $user_id = $this->session->userdata['userlogin']['user_id'];

          $records['users'] = $this->User_Model->select_user_all();

          $records['forms'] = $this->Form_Model->view_forms_user($user_id);

          $this->load->view('submitted_forms_IT', $records); 
  
         } 

         elseif ($this->session->userdata['userlogin']['usertype'] == "Human Resources") {

           modules::run("account/is_logged_in");

           $user_id = $this->session->userdata['userlogin']['user_id'];

           $records['users'] = $this->User_Model->select_user_all();

           $records['forms'] = $this->Form_Model->view_forms_user($user_id);

           $this->load->view('submitted_forms_hr', $records); 

         } elseif ($this->session->userdata['userlogin']['usertype'] == "Manager") {

           modules::run("account/is_logged_in");

           $user_id = $this->session->userdata['userlogin']['user_id'];

           $records['users'] = $this->User_Model->select_user_all();

           $records['forms'] = $this->Form_Model->view_forms_user($user_id);

           $this->load->view('submitted_forms_manager', $records); 
         }
        }

      //leave form view detail
      public function view_forms(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

         $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
         $records['transaction_code'] = $this->generateRandomString();
         $records['fullname'] = $this->session->userdata['userlogin']['real_name'];


        if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

        modules::run("account/is_logged_in");
   
        $form_id = $_GET['id'];
    
        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['forms']= $this->Form_Model->view_form($form_id, $user_id);

        $this->load->view('leave_form_detail', $records);

       } 
        elseif ($this->session->userdata['userlogin']['usertype'] == "IT"){

        modules::run("account/is_logged_in");
   
        $form_id = $_GET['id'];
    
        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['forms']= $this->Form_Model->view_form($form_id, $user_id);

        $this->load->view('leave_form_IT_detail', $records);

       }

       elseif ($this->session->userdata['userlogin']['usertype'] == "Human Resources") {
        
        modules::run("account/is_logged_in");
   
        $form_id = $_GET['id'];
    
        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['forms']= $this->Form_Model->view_form($form_id, $user_id);

        $this->load->view('leave_form_hr_detail', $records);

       } elseif ($this->session->userdata['userlogin']['usertype'] == "Manager") {
         
        modules::run("account/is_logged_in");
   
        $form_id = $_GET['id'];
    
        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['forms']= $this->Form_Model->view_form($form_id, $user_id);

        $this->load->view('leave_form_manager_detail', $records);

       }
     }

     //OBL form view detail
    public function view_forms_obl(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

         $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
         $records['transaction_code'] = $this->generateRandomString();
         $records['fullname'] = $this->session->userdata['userlogin']['real_name'];

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){
     
        modules::run("account/is_logged_in");
   
        $form_id = $_GET['id'];
    
        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['forms']= $this->Form_Model->view_form($form_id, $user_id);

        $this->load->view('obl_form_detail_IT', $records);

      }

      if ($this->session->userdata['userlogin']['usertype'] == "IT"){
     
        modules::run("account/is_logged_in");
   
        $form_id = $_GET['id'];
    
        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['forms']= $this->Form_Model->view_form($form_id, $user_id);

        $this->load->view('obl_form_detail', $records);

      }

       elseif ($this->session->userdata['userlogin']['usertype'] == "Human Resources") {
        
        modules::run("account/is_logged_in");
   
        $form_id = $_GET['id'];
    
        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['forms']= $this->Form_Model->view_form($form_id, $user_id);

        $this->load->view('obl_form_detail_hr', $records);

      } elseif ($this->session->userdata['userlogin']['usertype'] == "Manager") {

        modules::run("account/is_logged_in");
   
        $form_id = $_GET['id'];
    
        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['forms']= $this->Form_Model->view_form($form_id, $user_id);

        $this->load->view('obl_form_detail_manager', $records);
             
      }
    }

    //undertime form view detail
    public function view_forms_undertime(){

        $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
        $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
        $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

         $records['user_signature'] =$this->User_Model->select_performance_user_id($this->session->userdata['userlogin']['user_id']);
         $records['transaction_code'] = $this->generateRandomString();
         $records['fullname'] = $this->session->userdata['userlogin']['real_name'];

      if ($this->session->userdata['userlogin']['usertype'] == "Agent"){

        modules::run("account/is_logged_in");
   
        $form_id = $_GET['id'];
    
        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['forms']= $this->Form_Model->view_form($form_id, $user_id);

        $this->load->view('undertime_form_detail', $records);

      } 
      elseif ($this->session->userdata['userlogin']['usertype'] == "IT"){

        modules::run("account/is_logged_in");
   
        $form_id = $_GET['id'];
    
        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['forms']= $this->Form_Model->view_form($form_id, $user_id);

        $this->load->view('undertime_form_IT_detail', $records);

      } 



      elseif ($this->session->userdata['userlogin']['usertype'] == "Human Resources") {
         
        modules::run("account/is_logged_in");
   
        $form_id = $_GET['id'];
    
        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['forms']= $this->Form_Model->view_form($form_id, $user_id);

        $this->load->view('undertime_form_hr_detail', $records);

      } elseif ($this->session->userdata['userlogin']['usertype'] == "Manager") {

        modules::run("account/is_logged_in");
   
        $form_id = $_GET['id'];
    
        $user_id = $this->session->userdata['userlogin']['user_id'];

        $records['forms']= $this->Form_Model->view_form($form_id, $user_id);

        $this->load->view('undertime_form_manager_detail', $records);
      }
     }
     //coaching
     public function coaching(){

          $records['fullname'] = $this->session->userdata['userlogin']['firstname']. ' ' . $this->session->userdata['userlogin']['lastname'];
          $records['user_id'] = $this->session->userdata['userlogin']['user_id'];
          $records['position'] = $this->session->userdata['userlogin']['usertype'];

          $this->load->view('coaching_agent', $records);
    }
    public function test_view(){

      $this->load->view('test');  

    }

    public function view_user_deductions(){
         $current_date  = date('Y-m-06');
         $adv_date  = date('Y-m-06', strtotime("+ 1 month"));
         $prev_date  = date('Y-m-06', strtotime("- 1 month"));
         $data=array();
         $data = $this->Deduction_Model->select_user_deduction($this->session->userdata['userlogin']['user_id'],$prev_date,$adv_date);
         echo json_encode($data);

      }

    public function users_deduction(){

      modules::run("account/is_logged_in");
      
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['deductions']= $this->Deduction_Model->view_all_deductions();

      $records['all_users']= $this->User_Model->select_user_all();

      $this->load->view('template/header_admin', $records);
      $this->load->view('template/sidebar_admin', $records);
      $this->load->view('deductions', $records);
      $this->load->view('template/footer_admin', $records);

    }

    public function add_deduction(){
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];


       $this->form_validation->set_rules('user_id','Employee','trim|required|xss_clean');            

       $this->form_validation->set_rules('reason','Reason','trim|xss_clean|required');       

       $this->form_validation->set_rules('amount','Amount','trim|xss_clean|required');


       


       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 
       else{



         $data = array(

                       'user_id' => $this->input->post('user_id'),

                       'deduction_type' => $this->input->post('reason'),

                       'amount' => $this->input->post('amount'),
            
                       'deduction_date' => date('Y-m-d H:i:s'),

                     );



                  $this->Deduction_Model->insert($data);

              $receive_user_notify_all = $this->User_Model->select_user_all($this->session->userdata['userlogin']['user_id']);

               foreach ($receive_user_notify_all as $value) {
                                  $data_notification= array(
                                       'from_user' => $user_charge,
                                       'to_user' => 'All',
                                       'message' => 'Added Deduction',
                                       'unread' => 1,
                                       'date_notify' => date('Y-m-d H:i:s'),
                                       'link' =>  dirname(base_url(uri_string())),
                                       'to_user_id' => $value['user_id'],
                                       'from_usertype' => $this->session->userdata['userlogin']['usertype'],
          
                                     );
                           $this->Notification_Model->insert($data_notification);
                       }



                      echo json_encode(array("response" => "success", "message" => "You are successfully added account", "redirect" => base_url('account')));


           }
       }

 public function updatesubmission($report_id){

         $lead_data = array();
         $data=array();
    
    $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
    $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
    $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

      if ($this->session->userdata['userlogin']['usertype'] == "Production"){

          $records['author_reports']= $this->Lead_Model->report_lead();

          $records['author_names']= $this->Lead_Model->select_author_name_exist();
          $records['cover_designers']= $this->User_Model->select_user_coverdesigner();
          $records['publishers']= $this->User_Model->select_user_publisher();
          $records['interior_designers']= $this->User_Model->select_user_interiordesigner();

          $project_id = $this->uri->segment(4);
          $report_id = $this->uri->segment(3);
          $records['report'] =$this->Lead_Model->select_author_report_id($report_id);
          $row=$this->Lead_Model->select_author_report_id($report_id);
          $records['author_names'] =$this->Lead_Model->view_author_exist_project_id($row['author_id']);
          $records['data_interior_designer'] =$this->Lead_Model->view_interior_designer_single($project_id, $report_id); 
          $records['data_cover_designer'] =$this->Lead_Model->view_cover_designer_single($project_id, $report_id); 
          $records['data_front_cover_designer'] =$this->Lead_Model->view_front_cover_designer($project_id); 
          $records['data_back_cover_designer'] =$this->Lead_Model->view_back_cover_designer($project_id); 

          $records['report_id'] = $this->uri->segment(3);


          $this->load->view('update_report_submission', $records);

      }






    }


public function update_submission(){

      $date_report = date('Y-m-d H:i:s');

       $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
       $this->form_validation->set_rules('project_id','Project ID','trim|required|xss_clean'); 
       $this->form_validation->set_rules('publisher_id','Publisher User','trim|required|xss_clean'); 


       if ($this->form_validation->run() == FALSE){

            echo json_encode(array("response" => "error", "message" => validation_errors()));

       } 

       else{

      
               $data = array(

                           'project_id' => $this->input->post('project_id'),
                           'publisher_id' => $this->input->post('publisher_id'),
                           'report_status' => 'Approved',

                         );
                $this->Lead_Model->update_report($data, $this->input->post('report_id'));
                $this->Lead_Model->update_lead(array('used' => 1), $this->input->post('project_id') );



                 $data_notification_publisher = array(
                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => 'Approved Submission',
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'id' =>  $this->input->post('project_id'),
                           'link' =>  dirname(base_url(uri_string())),
                           'to_user_id' => $this->input->post('publisher_id'),
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],
                         );
                      $this->Notification_Model->insert($data_notification_publisher);


                   $data_notification_author = array(
                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => 'Approved Submission',
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'id' =>  $this->input->post('project_id'),
                           'link' =>  dirname(base_url(uri_string())),
                           'to_user_id' => $this->input->post('author_id'),
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],
                         );

                         $this->Notification_Model->insert_author_notification($data_notification_author);


             echo json_encode(array("response" => "success", "message" => "Successfully approved submission", "redirect" => base_url('dashboard/submission')));



        }

    }

   public function galley($id=""){
      $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];
      $records['notifications']  = $this->Notification_Model->view_notification_user($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);
      $records['count_notifications']  = $this->Notification_Model->select_count_notification($this->session->userdata['userlogin']['user_id'], $user_charge, $this->session->userdata['userlogin']['usertype']);

            if ($this->session->userdata['userlogin']['usertype'] == "Production"){
                 $records['galas']= $this->Lead_Model->view_gala();
                 $this->load->view('template/header_production', $records);
                 $this->load->view('template/sidebar_production', $records);
                 $this->load->view('gala', $records);
                 $this->load->view('template/footer_production', $records);
           }
            else if ($this->session->userdata['userlogin']['usertype'] == "Publishing/Marketing"){
                 $records['galas']= $this->Lead_Model->view_gala_publisher_id($this->session->userdata['userlogin']['user_id']);
                 $this->load->view('template/header_publisher', $records);
                 $this->load->view('template/sidebar_publisher', $records);
                 $this->load->view('gala_publishing', $records);
                 $this->load->view('template/footer_production', $records);
           }



          }


   
   public function upload_gala(){

         $user_charge = $this->session->userdata['userlogin']['firstname'] .' '. $this->session->userdata['userlogin']['lastname'];

         $configUpload['upload_path'] = FCPATH.'upload_galley/';

         $configUpload['allowed_types'] = 'pdf';

         $configUpload['file_name'] = 'Galley' .uniqid() . '_' . date('Y-m-d');


         $this->load->library('upload', $configUpload);


          if (!$this->upload->do_upload('gala_file')){

              echo json_encode(array("response" => "error", "message" => "format is invalid. It must be an PDF."));  
         } 

         else{

              $get_file_name = $this->upload->data();
              

              $inputFileName = $get_file_name['file_name'];



               $data = array(
                       'gala_file'     => $inputFileName,
                       'date_uploaded'     => date('Y-m-d H:i:s'), 
                     );

                $this->Lead_Model->update_report($data, $this->input->post('report_id'));


                $source = 'upload_galley/'.$inputFileName;

                //Load codeigniter FTP class
                $this->load->library('ftp');

                //FTP configuration
                $ftp_config['hostname'] = 'ftp.hlmcrm.site'; 
                $ftp_config['username'] = 'horizonsliterary@horizonsliterary.us';
                $ftp_config['password'] = 'GodlovesUs143';
                $ftp_config['debug']    = TRUE;

                //Connect to the remote server
                $this->ftp->connect($ftp_config);

                //File upload path of remote server
                $destination = '/author/upload_galley/'.$inputFileName;

                //Upload file to the remote server
                $this->ftp->upload($source,".".$destination);

                //Close FTP connection
                $this->ftp->close();
                 echo json_encode(array("response" => "success", "message" => "successfully upload Galley"));  


             $receive_user_notify = $this->User_Model->select_user_report($this->session->userdata['userlogin']['user_id']);
             $receive_author_notification = $this->Lead_Model->select_author_report_id($this->input->post('report_id'));
             $receive_publisher_notification = $this->Lead_Model->select_publisher_project_id($this->input->post('project_id'));




             foreach ($receive_user_notify as $value) {

                      $data_notification = array(

                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => "Added Galley on Author Milestone",
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'link' =>  dirname(base_url(uri_string())),
                           'id' =>  $this->input->post('project_id'),
                           'to_user_id' => $value['user_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],

                         );
                   $this->Notification_Model->insert($data_notification);
           }
        
          // if($receive_publisher_notification !=false){
          //     $data_notification_publisher = array(

          //                  'from_user' => $user_charge,
          //                  'to_user' => 'All',
          //                  'message' => "Added Gala on Author Milestone ",
          //                  'unread' => 1,
          //                  'date_notify' => date('Y-m-d H:i:s'),
          //                  'link' =>  dirname(base_url(uri_string())),
          //                  'id' =>  $this->input->post('project_id'),
          //                  'to_user_id' => $receive_publisher_notification['publisher_id'],
          //                  'from_usertype' => $this->session->userdata['userlogin']['usertype'],

          //                );
          //      $this->Notification_Model->insert($data_notification_publisher);
          //    }

                if($receive_author_notification !=false){
                       $data_notification_author = array(
                           'from_user' => $user_charge,
                           'to_user' => 'All',
                           'message' => 'Added Galley on Author Milestone',
                           'unread' => 1,
                           'date_notify' => date('Y-m-d H:i:s'),
                           'id' =>  $this->input->post('project_id'),
                           'link' =>  dirname(base_url(uri_string())),
                           'to_user_id' => $receive_author_notification['author_id'],
                           'from_usertype' => $this->session->userdata['userlogin']['usertype'],
                         );

                         $this->Notification_Model->insert_author_notification($data_notification_author);
                  }
            } 
     }

        public function cellColor($cells,$color){
          $this->load->library('excel');
           $objPHPExcel = new PHPExcel();

            $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => array(
                     'rgb' => $color
                )
            ));
        }

    public function convert_object_to_array($data) {

            if (is_object($data)) {
                $data = get_object_vars($data);
            }

            if (is_array($data)) {
                return array_map(__FUNCTION__, $data);
            }
          else {
                return $data;
            }
        }

        function AddPlayTime($times) {
              $all_seconds=0;

            foreach ($times as $time) {
                    list($hour, $minute, $second) = explode(':', $time);
                    $all_seconds += $hour * 3600;
                    $all_seconds += $minute * 60;
                    $all_seconds += $second;

                }

               $total_minutes = floor($all_seconds/60);
               $seconds = $all_seconds % 60;
               $hours = floor($total_minutes / 60); 
               $minutes = $total_minutes % 60;

                // returns the time already formatted
                echo sprintf('%02d:%02d:%02d', $hours, $minutes,$seconds);
            }

            function convertStringToNumSeconds($string) {
                        list($hours, $minutes, $seconds) = explode(":", $string, 3);
                        $totalSeconds = 0;
                        $totalSeconds += $hours * 3600; // There are 3600 seconds in an hour
                        $totalSeconds += $minutes * 60; // There are 60 seconds in a minute
                        $totalSeconds += $seconds; // There is 1 second in a second
                        return $totalSeconds;
                    }

         function secondsToString($seconds) {
                $hours = (int) floor($seconds / 3600);
                $seconds -= $hours * 3600;
                $minutes = (int) floor($seconds / 60);
                $seconds -= $minutes * 60;
                return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
            }

     public function export_call_log(){
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $date= date("Y-m-d");
        $nowyear = date('Y', strtotime($date));
        $nowmonth = date('m', strtotime($date));
        $m = date('F', strtotime($date));
        $datenow = $nowyear ."-". $nowmonth; 
        $date2 = $year ."-". $month; 
        $m2 = date('F', strtotime($date2));

       // echo  date("Y-m-d h:i:s");
       // exit();

              require APPPATH.'vendor/autoload.php';

               $data = array();

              $RECIPIENT = '+18882248399';

              $RINGCENTRAL_CLIENTID = 'iEbMxA7gQs6izB6AvBDVHQ';

              $RINGCENTRAL_CLIENTSECRET = '7WIxpzSLSDuG0oyQ2JO2Lg65BSRTBuSuOHD3S1umuAkQ';

              $RINGCENTRAL_SERVER = 'https://platform.ringcentral.com';



              $RINGCENTRAL_USERNAME = '+18882248399';

              $RINGCENTRAL_PASSWORD = 'GodlovesUs143@';

              $RINGCENTRAL_EXTENSION = '101';



              $rcsdk = new RingCentral\SDK\SDK($RINGCENTRAL_CLIENTID, $RINGCENTRAL_CLIENTSECRET, $RINGCENTRAL_SERVER);



              $platform = $rcsdk->platform();



              $platform->login($RINGCENTRAL_USERNAME, $RINGCENTRAL_EXTENSION, $RINGCENTRAL_PASSWORD);

               date_default_timezone_set('America/New_York');

               $last_seven_days = date('Y-m-d', strtotime('-6 days'));
               $yesterday = date('Y-m-d', strtotime('-1 days'));

               if(date('Y-m-d', strtotime($this->input->post('start')))  == date('Y-m-d') &&  date('Y-m-d', strtotime($this->input->post('end'))) == date('Y-m-d')){

                       $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d').'&view=Detailed');
                                 // echo "a";

                  }
                  else if(date('Y-m-d', strtotime($this->input->post('start'))) == date('Y-m-d') &&  date('Y-m-d', strtotime($this->input->post('end'))) == $yesterday){
         
                     $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime('-1 days')).'&dateTo='.date('Y-m-d').'&view=Detailed'); 
                                    // echo "b";

                  }
                   else if(date('Y-m-d', strtotime($this->input->post('start'))) == $yesterday &&  date('Y-m-d', strtotime($this->input->post('end'))) == date('Y-m-d')){
         
                     $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime('-1 days')).'&dateTo='.date('Y-m-d').'&view=Detailed'); 
                                             // echo "c";

                  }
        
         // else if($this->input->post('start') != $this->input->post('end')){

         //     $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.$this->input->post('start').'&dateTo='.$this->input->post('end').'&view=Detailed');
         //            // echo "c";

         //  }

              else{
                 $resp = $platform->get('/account/~/call-log?page=1&perPage=1000000000&dateFrom='.date('Y-m-d', strtotime($this->input->post('start'))).'&dateTo='.date('Y-m-d', strtotime($this->input->post('end').'+1 day')).'&view=Detailed');
                                      // echo "d";

              }


        // $set_data = $this->session->userdata('userlogin'); //session data
        // $noweemployee = $this->Attendance_Model->viewattendanceemployee($set_data['clientID'], $datenow);
        // $selectattendance = $this->Attendance_Model->filterattendance($set_data['clientID'], $month, $year); 

        $this->load->library('excel');
        // $objPHPExcel = new PHPExcel();
        //  //change the font size
        // $objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setSize(20);
        // //make the font become bold
        // $objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
        // $objPHPExcel->getActiveSheet()->getStyle('A2:AG2')->getFont()->setBold(true);
        // $objPHPExcel->getActiveSheet()->getStyle('A3:AG3')->getFont()->setBold(true);
        // //merge cell A1 until D1
        // $objPHPExcel->getActiveSheet()->mergeCells('G1:O1');
        // //set aligment to center for that merged cell (A1 to D1)
        // $objPHPExcel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $objPHPExcel->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $objPHPExcel->getActiveSheet()->getStyle('D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $objPHPExcel->getActiveSheet()->getStyle('E2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $objPHPExcel->getActiveSheet()->getStyle('F2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $objPHPExcel->getActiveSheet()->getStyle('G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $objPHPExcel->getActiveSheet()->getStyle('H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $objPHPExcel->getActiveSheet()->getStyle('I2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $objPHPExcel->setActiveSheetIndex(0);
        // $objPHPExcel->getActiveSheet()->setCellValue('A2', 'DATE')->getStyle('A2')->getFill()->getStartColor()->setRGB('B4C6E7');;
        // $objPHPExcel->getActiveSheet()->setCellValue('B2', 'CALL COUNT');
        // $objPHPExcel->getActiveSheet()->setCellValue('C2', 'HANDLING TIME');
        // $objPHPExcel->getActiveSheet()->setCellValue('D2', '   ');
        // $objPHPExcel->getActiveSheet()->setCellValue('E2', 'WORKING DAYS');
        // $objPHPExcel->getActiveSheet()->setCellValue('F2', 'TCC');
        // $objPHPExcel->getActiveSheet()->setCellValue('G2', 'THT');
        // $objPHPExcel->getActiveSheet()->setCellValue('H2', 'ACC');
        // $objPHPExcel->getActiveSheet()->setCellValue('I2', 'AHT');



        // $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);

        // $objPHPExcel->getActiveSheet()->getCell('A2')->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('B4C6E7');
        // $objPHPExcel->getActiveSheet()->getCell('B2')->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('B4C6E7');
        // $objPHPExcel->getActiveSheet()->getCell('C2')->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('B4C6E7');
        // $objPHPExcel->getActiveSheet()->getCell('E2')->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('B4C6E7');
        // $objPHPExcel->getActiveSheet()->getCell('F2')->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('B4C6E7');
        // $objPHPExcel->getActiveSheet()->getCell('G2')->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('B4C6E7');
        // $objPHPExcel->getActiveSheet()->getCell('H2')->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('B4C6E7');
        // $objPHPExcel->getActiveSheet()->getCell('I2')->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('B4C6E7');


        // $objPHPExcel->getProperties()->setTitle("CALL LOGS REPORT")->setDescription("CALL LOGS REPORT");
        // $objPHPExcel->getActiveSheet()->setCellValue('G1', 'CALL LOGS REPORT');
         $row = 3;
         $call_log_history = 0;
         $agent_name = $this->input->post('agent_name');
         $data = array();
         $get_call_logs =array();
         $total_time = 0;
         $totalWork = 0;


         $unique_numbers = [];
                     foreach ($resp->json()->records as $call_log_history){
                           if (!empty($call_log_history->from->name)) {         
                              $from_name = !empty($call_log_history->from->name) ? $call_log_history->from->name: "";
                                     if($from_name == trim($agent_name)){
                                               if($call_log_history->result == "Voicemail"  || $call_log_history->result == "Call connected" || $call_log_history->result == "Accepted" || $call_log_history->result == "No Answer"){

                                                            // Explode by separator :
                                                             $handle =  gmdate("H:i:s", $call_log_history->duration);
                                                             $totalWork = $this->convertStringToNumSeconds($handle);

                                                                
                                                          $data[] = array(
                                                              "agent_name" =>  $agent_name,
                                                              "startTime" => date('Y-m-d', strtotime($call_log_history->startTime)),
                                                              "handling_time" => $call_log_history->duration,
                                                              "total"=> count((array) date('Y-m-d', strtotime($call_log_history->startTime)))
                                            
                                                           );
                                                    }
                                            }
                                    }
                              }




           // $unique =  $this->unique_multi_array($data, 'startTime');

                $issetArray = array();
                $tes = array();

                foreach ($data as $key => $value) {
                    if(isset($issetArray[$value['startTime']]))
                    {
                                
          
                        $issetArray[$value['startTime']]['total'] += $value['total'];
                        $issetArray[$value['startTime']]['handling_time'] +=  $value['handling_time'];
                    }
                    else
                    {
                        $issetArray[$value['startTime']] = array();
                        $issetArray[$value['startTime']] = $value;
                    }
                }

                $result = array();
                foreach ($issetArray as $key => $value) {
                       $value['handling_time'] = gmdate("H:i:s", $value['handling_time']);
                       array_push($result, $value);
                }

                  echo json_encode($result);




    }

}


  