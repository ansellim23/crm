<?php 
   class Penalty_Model extends CI_Model {
      function __construct() {
         parent::__construct();

      }

      public function insert($data) {
         if ($this->db->insert("tblpenalty", $data)) {
            return true;
        }
     }


        public function select_user_penalty($user_id){
        $this->db->select('*')->from('tblpenalty')->where('user_id', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }

      public function update_penalty($data, $penalty_id) { 

         $this->db->set($data); 

         $this->db->where("penalty_id", $penalty_id); 

         $this->db->update("tblpenalty"); 
     
        

      } 


        public function select_user_id($user_id){

        $this->db->select('*')->from('tblpenalty')->where(array('user_id ' => $user_id));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

   }
?>
