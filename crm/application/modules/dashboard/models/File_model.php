<?php 
   class File_Model extends CI_Model {
      function __construct() {
         parent::__construct();

      }

      public function insert($data) {
         if ($this->db->insert("tblfile", $data)) {
            return true;
         }
      }

       public function insert_remark_file($data) {
         if ($this->db->insert("tblremark_files", $data)) {
            return true;
         }
      }


     public function view_file($project_id){
        $this->db->select('*')->from('tblfile')
        ->where('project_id', $project_id);
        $query=$this->db->get();

        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }


    public function view_file_agent($project_id, $user_id){
        $this->db->select('*')->from('tblfile')
        ->where('user_id', $user_id)
        ->where('project_id', $project_id);
        $query=$this->db->get();

        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }

        public function select_remark_file($file_id){ 

        $this->db->select('file.*, remark_file.*')->from('tblfile as file')

        ->join('tblremark_files as remark_file', 'file.file_id = remark_file.file_id', 'inner')
        ->where('file.file_id', $file_id)

        ->order_by('remark_file.date_comment','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }
     public function select_count_file($file_id){ 

        $this->db->select('*')->from('tblremark_files')->where('file_id', $file_id);

        $query=$this->db->get();

        return $query->num_rows();

        $db->close();

      }
      public function select_count_file_attendance($attendance_id){ 

        $this->db->select('*')->from('tblattendancefile')->where('attendance_id', $attendance_id);

        $query=$this->db->get();

        return $query->num_rows();

        $db->close();

      }

        public function view_email_history_admin(){
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
      public function view_email_history_all(){
        $this->db->select('*')->from('tblemail_history')
         ->where('usertype !=', 'Admin');
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
