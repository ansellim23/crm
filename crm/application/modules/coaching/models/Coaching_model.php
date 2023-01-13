  <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



   class Coaching_Model extends CI_Model {

      

      function __construct() {

         parent::__construct();

         $this->load->library('encryption');

      }



      public function insert($data) {

         if ($this->db->insert("tblcoaching", $data)) {

            return true;

         }

      }

      public function view_forms_coaching(){

        $this->db->select('*')->from('tblcoaching ')
      
        ->order_by('date_session','DESC');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();

      }

       public function insert_userlog($data) {

         if ($this->db->insert("tblcoachinglog", $data)) {

            return true;

         }

      }

      public function insert_assign_user($data) {

         if ($this->db->insert("tblassignuser", $data)) {

            return true;

         }

      }

      public function login($emailaddress, $password, $usertype){

        $key = $this->config->item('encryption_key');

        $salt1 = hash('sha512', $key . $password);

        $salt2 = hash('sha512', $password . $key);

        $hashed_password = hash('sha512', $salt1 . $password . $salt2);

       

        $this->db->select('*')->from('tblcoaching')->where(array('emailaddress' => $emailaddress, 'password' => $hashed_password, 'usertype' => $usertype));

        

        $query=$this->db->get();



        if ($query->num_rows() == 1){

            return $query->result();

        }

        else{

            return false;

        }



        $this->db->close();

      }



        public function loginAs($emailaddress, $usertype){


       

        $this->db->select('*')->from('tblcoaching')->where(array('emailaddress' => $emailaddress, 'usertype' => $usertype));

        

        $query=$this->db->get();



        if ($query->num_rows() == 1){

            return $query->result();

        }

        else{

            return false;

        }



        $this->db->close();

      }



      public function view_accountype(){

        $this->db->select('DISTINCT(usertype)')->from('tblcoaching')->where('status', 'Active');

        $query=$this->db->get();



        if ($query->num_rows() == 1){

        	return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_user($usertype){

        $this->db->select('*')->from('tblcoaching')->where(array('usertype ' => $usertype, 'status' => 'Active'));

        $query=$this->db->get();



        if ($query->num_rows() == 1){

        	return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
      public function select_user_coverdesigner(){

        $this->db->select('*')->from('tblcoaching')->where(array('usertype ' => 'Cover Designer', 'status_user' => 'Active'));

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
       public function select_user_publisher(){

        $this->db->select('*')->from('tblcoaching')->where(array('usertype ' => "Publishing/Marketing", 'status_user' => 'Active'));

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
       public function select_user_all(){

        $this->db->select('*')->from('tblcoaching')
        ->where('usertype !=', 'Admin')
        ->where('status_user', 'Active');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
      public function select_user_admin(){

        $this->db->select('*')->from('tblcoaching')
        ->where('usertype', 'Admin')
        ->where('status_user', 'Active');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
      public function select_user_specify_notify(){

        $this->db->select('*')->from('tblcoaching')
        ->where_in('usertype', array('Production', 'Manager', 'Author Relation'))
        ->where('status_user', 'Active');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
       public function select_user_specify_notify_all(){

        $this->db->select('*')->from('tblcoaching')
        ->where_in('usertype', array('Production', 'Manager', 'Author Relation', 'Admin'))
        ->where('status_user', 'Active');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_user_specify_notify_remark(){

        $this->db->select('*')->from('tblcoaching')
        ->where_in('usertype', array('Production', 'Manager', 'Author Relation', 'Admin', 'Agent'))
        ->where('status_user', 'Active');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

        public function all_attendance_user(){

        $this->db->select('*')->from('tblcoaching')
        ->where_in('usertype', array('Manager', 'Human Resources', 'IT'))
        ->where('status_user', 'Active');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }




      public function select_user_agent_and_manager(){

        $this->db->select('*')->from('tblcoaching')
        ->where_in('usertype', array('Agent', 'Manager'))
        ->where('status_user', 'Active');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

       public function select_user_IT(){

        $this->db->select('*')->from('tblcoaching')
        ->where_in('usertype', array('IT'))
        ->where('status_user', 'Active');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_user_interiordesigner(){

        $this->db->select('*')->from('tblcoaching')->where(array('usertype ' => 'Interior Designer', 'status_user' => 'Active'));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }


      public function select_user_agent(){

        $this->db->distinct()->select('*')->from('tblcoaching')->where(array('usertype ' => 'Agent', 'status_user' => 'Active'));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

         public function select_user_agent_manager(){

        $this->db->distinct()->select('*')->from('tblcoaching')->where('usertype', 'Manager')->or_where('usertype ','Agent')
        ->where('status_user', 'Active')->order_by('firstname', 'asc');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

       public function select_user_agent_sales(){

        $this->db->distinct()->select('*')->from('tblcoaching')->where(array('usertype ' => 'Agent', 'status_user' => 'Active'));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_coaching_list($agent_name){

        $this->db->select('*')->from('tblcoaching')->where('agent_name', $agent_name);

        $query=$this->db->get();


        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function view_assign_user($user_id){

        $this->db->select('user.*, assign_user.*')->from('tblcoaching as user')

        ->join('tblassignuser as assign_user', 'user.user_id = assign_user.user_id', 'inner')

        ->where('assign_user.user_id_assign', $user_id)
        ->where('user.usertype', 'Manager')

        ->order_by('assign_user.date_assign','ASC');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

         public function view_assign_agent($user_id){

        $this->db->select('user.*, assign_user.*')->from('tblcoaching as user')

        ->join('tblassignuser as assign_user', 'user.user_id = assign_user.user_id', 'inner')

        ->where('assign_user.user_id_assign', $user_id)
        ->where('user.usertype', 'Agent')

        ->order_by('assign_user.date_assign','ASC');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

       public function select_user_id($user_id){

        $this->db->select('*')->from('tblcoaching')->where(array('user_id ' => $user_id));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
     public function select_coaching_user($agent_name){

        $this->db->select('*')->from('tblcoaching')->where(array('agent_name ' => $agent_name))->order_by('coaching_id','DESC')->limit(1);


        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
      public function select_coaching_id($coaching_id){

        $this->db->select('*')->from('tblcoaching')->where(array('coaching_id ' => $coaching_id));


        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
      public function select_code_user($user_id, $idle_code){

        $this->db->select('*')->from('tblcoaching')->where(array('user_id ' => $user_id, 'idle_code' => $idle_code));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return true;

        }

        else{

            return false;

        }

        $this->db->close();

      }
      public function select_userassign_id($user_id){

        $this->db->select('*')->from('tblassignuser')->where(array('user_id ' => $user_id));

        $query=$this->db->get();



        if ($query->num_rows() == 1){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_log_agent_history($user_id){

        $this->db->select('*')->from('tblcoachinglog')->where(array('user_id ' => $user_id));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_duty_agent($user_id){

        $this->db->select('*')->from('tbltracker')->where(array('user_id ' => $user_id));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function change_password($user_id, $password, $new_password){

        $key = $this->config->item('encryption_key');

        $salt1 = hash('sha512', $key . $password);

        $salt2 = hash('sha512', $password . $key);

        $hashed_password = hash('sha512', $salt1 . $password . $salt2);

        $this->db->select('*')->from('tblcoaching')->where(array('user_id ' => $user_id, 'password' => $hashed_password));

        $query = $this->db->get();

         if ($query->num_rows() > 0){

              return  $this->db->where(array('user_id ' => $user_id, 'password' => $hashed_password))->update('tblcoaching', array('password' => $new_password));

        }

        else{

          return false;

        }

        $this->db->close();

      }

      public function view_alluser(){

        $this->db->select('*')->from('tblcoaching');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }



      public function update_coaching($data, $coaching_id) { 

         $this->db->set($data); 

         $this->db->where("coaching_id", $coaching_id); 

         $this->db->update("tblcoaching"); 

      } 

       public function update_attempt($emailaddress) { 

         $this->db->set('attempt', 'attempt-1', FALSE); 

         $this->db->where("emailaddress", $emailaddress); 

         $this->db->update("tblcoaching"); 

      }

      public function update_userlog($emailaddress, $password) { 

         $this->db->set('log_date', 'NOW()', FALSE); 

         $this->db->set('userlogin', 'login'); 

         $this->db->where("emailaddress", $emailaddress);

         $this->db->where("password", $password);

         $this->db->update("tblcoaching"); 

      } 

      public function all_users(){

        $this->db->select('*')->from('tblcoaching');

        $query=$this->db->get();



        if ($query->num_rows() == 1){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

       public function get_emailaddress($emailaddress){

        $this->db->select('*')->from('tblcoaching')->where('emailaddress', $emailaddress);

        $query = $this->db->get();



        if ($query->num_rows() > 0){

            return $query->result();

        }

        else{

            return false;

        }

        $this->db->close();



      }

      public function reset_password($emailaddress, $password){

        $this->db->select('*')->from('tblcoaching')->where('emailaddress', $emailaddress);

        $query = $this->db->get();

         if ($query->num_rows() > 0){

              return  $this->db->where('emailaddress', $emailaddress)->update('tblcoaching', array('password' => $password));

        }

        else{

          return false;

        }

        $this->db->close();



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

        public function select_user_emailaddress($user_id){

        $this->db->select('emailaddress')->from('tblcoaching')->where('user_id', $user_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }
    }


   }

?>

