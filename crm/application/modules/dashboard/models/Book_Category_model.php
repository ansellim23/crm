<?php 
   class Signature_Model extends CI_Model {
      function __construct() {
         parent::__construct();

      }

      public function insert($data) {
         if ($this->db->insert("tblsignature", $data)) {
            return true;
         }
      }
       public function insert_email_history($data) {
         if ($this->db->insert("tblemail_history", $data)) {
            return true;
         }
      }
     public function view_signature($user_id){
        $this->db->select('*')->from('tblsignature')
        ->where('user_id', $user_id);
        $query=$this->db->get();

        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }
        public function select_signature_exist($user_id, $signature){
        $this->db->select('*')->from('tblsignature')
        ->where('user_id', $user_id)
        ->where('signature', $signature);
        $query=$this->db->get();

        if ($query->num_rows() > 0){
          return true;
        }
        else{
            return false;
        }
        $this->db->close();
      }
       public function view_email_history(){
        $this->db->select('*')->from('tblemail_history');
        $query=$this->db->get();

        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }
        public function view_email_history_admin(){
        $this->db->select('*')->from('tblemail_history')
        ->where('usertype !=', 'Agent');
        $query=$this->db->get();

        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }
      public function view_email_message($history_email_id){
        $this->db->select('*')->from('tblemail_history')
        ->where('history_email_id', $history_email_id);
        $query=$this->db->get();

        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }
     public function select_signature($signature_id){
        $this->db->select('*')->from('tblsignature')
        ->where('signature_id', $signature_id);
        $query=$this->db->get();

        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }
      public function update($data, $signature_id) { 
         $this->db->set($data); 
         $this->db->where("signature_id", $signature_id); 
         $this->db->update("tblsignature"); 
      } 

   }
?>
