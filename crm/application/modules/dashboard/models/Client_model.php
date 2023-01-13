<?php 
   class Client_Model extends CI_Model {
      function __construct() {
         parent::__construct();

         $this->load->library('encrypt');
      }

      public function insert($data) {
         if ($this->db->insert("tblclient", $data)) {
            return true;
         }
      }
      public function login($emailaddress, $password){
        $key = $this->config->item('encryption_key');
        $salt1 = hash('sha512', $key . $password);
        $salt2 = hash('sha512', $password . $key);
        $hashed_password = hash('sha512', $salt1 . $this->input->post('password') . $salt2);
       
        $this->db->select('*')->from('tblclient')->where(array('emailaddress' => $emailaddress, 'password' => $hashed_password));
        
        $query=$this->db->get();

        if ($query->num_rows() == 1){
            return $query->result();
        }
        else{
            return false;
        }

        $this->db->close();
      }

   }
?>
