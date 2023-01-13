  <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Idle_Model extends CI_Model {
      
      function __construct() {
         parent::__construct();
         $this->load->library('encrypt');
      }

      public function insert($data) {
         if ($this->db->insert("tblidle", $data)) {
            return true;
         }
      }
      public function view_accountype(){
        $this->db->select('DISTINCT(usertype)')->from('tbluser')->where('status', 'Active');
        $query=$this->db->get();

        if ($query->num_rows() == 1){
        	return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }
      public function select_user_idle($user_id){
        $this->db->select('*')->from('tblidle')
        ->where(array('user_id' => $user_id))
        ->order_by('date_idle','DESC');

        $query=$this->db->get();

        if ($query->num_rows() > 0 ){
        	return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }

      public function view_idle_user_admin(){

        $this->db->select('idle.*, user.*')->from('tblidle as idle')

        ->join('tbluser as user', 'idle.user_id = user.user_id', 'inner')

        ->order_by('idle.idle_id','DESC');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
    
      public function select_idle_user($user_id, $idle_time){
        $this->db->select('*')->from('tblidle');
        $this->db->where("status_idle", 1); 
        $this->db->where("idle_time <", $idle_time); 
        $this->db->where("user_id", $user_id); 
        $this->db->limit(1);
        $query=$this->db->get();

        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
        // $this->db->close();
      }

      public function select_idle_user_beep($user_id){
        $this->db->select('*')->from('tblidle');
        $this->db->where("status_idle", 1); 
        $this->db->where("status_idle_user", 'beep'); 
        $this->db->where("user_id", $user_id); 
        $this->db->order_by('idle_id','DESC');
        $this->db->limit(1);
        $query=$this->db->get();

        if ($query->num_rows() == 1){
            return true;
        }
        else{
            return false;
        }
      //   $this->db->close();
      }

      public function select_idle_user_auto($user_id){
        $this->db->select('*')->from('tblidle');
        $this->db->where("status_idle", 1); 
        $this->db->where("status_idle_user", 'auto'); 
        $this->db->where("user_id", $user_id); 
        $this->db->order_by('idle_id','DESC');
        $this->db->limit(1);
        $query=$this->db->get();

        if ($query->num_rows() == 1){
            return  $query->row_array();
        }
        else{
            return false;
        }
      //   $this->db->close();
      }

  public function select_single_user($user_id){
        $this->db->select('*')->from('tbluser')->where("user_id", $user_id);
        $query=$this->db->get();

        if ($query->num_rows() >0  ){
            return  $query->row_array();
        }
        else{
            return false;
        }
      //   $this->db->close();
      }
      public function select_idle_user_auto_update($user_id, $idle_time){



        $this->db->select('*')->from('tblidle')->where(array('user_id ' => $user_id, 'status_idle_user ' => 'auto'))->order_by('idle_id','DESC')->limit(1);

        $query = $this->db->get();

         if ($query->num_rows() > 0){

              $data = $query->row_array();

              return  $this->db->where(array('idle_id ' => $data['idle_id'], 'user_id ' => $data['user_id']))->update('tblidle', array('idle_time' => $idle_time));

        }

        else{

          return false;

        }

        $this->db->close();

      }

      public function update_idle($data, $user_id) { 
         $this->db->set($data); 
         $this->db->where("status_idle", 1); 
         $this->db->where("user_id", $user_id); 
         $this->db->order_by('idle_id','DESC');
         $this->db->limit(1);
         $this->db->update("tblidle"); 
      } 
      public function update_close_webpage($data, $user_id, $date_visit) { 
         $this->db->set("count_url", "count_ur-1", FALSE); 
         $this->db->where("user_id", $user_id); 
         $this->db->where("date_visit", $date_visit); 
         $this->db->update("tbluserexistpage"); 
      } 
       public function update_attempt($email_address) { 
         $this->db->set('attempt', 'attempt-1', FALSE); 
         $this->db->where("email_address", $email_address); 
         $this->db->update("tbluser"); 
      }
      public function update_userlog($email_address, $password) { 
         $this->db->set('log_date', 'NOW()', FALSE); 
         $this->db->set('userlogin', 'login'); 
         $this->db->where("email_address", $email_address);
         $this->db->where("password", $password);
         $this->db->update("tbluser"); 
      } 
  

   }
?>
