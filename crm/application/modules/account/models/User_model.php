  <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



   class User_Model extends CI_Model {

      

      function __construct() {

         parent::__construct();

         $this->load->library('encryption');
         $this->hlm = $this->load->database('hlm', TRUE);  

      }



      public function insert($data) {

         if ($this->db->insert("tbluser", $data)) {

            return true;

         }

      }

       public function insert_userlog($data) {

         if ($this->db->insert("tbluserlog", $data)) {

            return true;

         }

      }

      public function insert_assign_user($data) {

         if ($this->db->insert("tblassignuser", $data)) {

            return true;

         }

      }

      // insert auto assign user
        public function insert_auto_assign($data) {

         if ($this->db->insert("tbl_autoassign_user", $data)) {

            return true;

         }

      }

      public function login($emailaddress, $password, $usertype){

        $key = $this->config->item('encryption_key');

        $salt1 = hash('sha512', $key . $password);

        $salt2 = hash('sha512', $password . $key);

        $hashed_password = hash('sha512', $salt1 . $password . $salt2);

       

        $this->db->select('*')->from('tbluser')->where(array('emailaddress' => $emailaddress, 'password' => $hashed_password, 'usertype' => $usertype));

        

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


       

        $this->db->select('*')->from('tbluser')->where(array('emailaddress' => $emailaddress, 'usertype' => $usertype));

        

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

      public function select_user($usertype){

        $this->db->select('*')->from('tbluser')->where(array('usertype ' => $usertype, 'status' => 'Active'));

        $query=$this->db->get();



        if ($query->num_rows() == 1){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

        public function select_author_user(){

          $sql = "SELECT wpju_users.ID, wpju_users.user_login, wpju_users.user_email, firstmeta.meta_value as first_name, lastmeta.meta_value as last_name, role.meta_value as role_type FROM wpju_users left join wpju_usermeta as firstmeta on wpju_users.ID = firstmeta.user_id and firstmeta.meta_key = 'first_name' left join wpju_usermeta as lastmeta on wpju_users.ID = lastmeta.user_id and lastmeta.meta_key = 'last_name' INNER join wpju_usermeta as role on wpju_users.ID = role.user_id and role.meta_key = 'wpju_capabilities' where role.meta_value like '%subscriber%'";
          $query=$this->hlm->query($sql);

          if ($query->num_rows() > 0){

            return $query->result_array();

          }
          else{

              return false;
          }

          $this->hlm->close();

        }
            

      public function select_user_coverdesigner(){

        $this->db->select('*')->from('tbluser')->where(array('usertype ' => 'Cover Designer', 'status_user' => 'Active'));

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

        $this->db->select('*')->from('tbluser')->where(array('usertype ' => "Publishing/Marketing", 'status_user' => 'Active'));

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

        $this->db->select('*')->from('tbluser')
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

        public function select_user_all_active(){

        $this->db->select('*')->from('tbluser')
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

        $this->db->select('*')->from('tbluser')
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

        $this->db->select('*')->from('tbluser')
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
       public function select_user_specify_notify_all($user_id){

        $this->db->select('*')->from('tbluser')
        ->where_in('usertype', array('Production', 'Manager', 'Author Relation', 'Admin', 'Finance'))
        ->where_not_in('user_id', $user_id)
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
       public function select_user_notify_attendance(){

        $this->db->select('*')->from('tbluser')
        ->where_in('usertype', array('Human Resources', 'Admin', 'Manager'))
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
         public function select_attendance_id($attendance_id){
        $this->db->select('*')->from('tblattendance')
        ->where('attendance_id', $attendance_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){
          
          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
    public function select_user_all_notify($user_id){

        $this->db->select('*')->from('tbluser')
        ->where_in('usertype', array('Production', 'Manager', 'Author Relation', 'Admin', 'Agent'))
        ->where_not_in('user_id', $user_id)
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

    public function select_valuation_user($user_id){

        $this->db->select('*')->from('tbluser')->where(array('user_id ' => $user_id));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }


     public function select_user_notify_form($user_id){

        $this->db->select('*')->from('tbluser')
        ->where_in('usertype', array('Human Resources', 'Manager'))
        ->where_not_in('user_id', $user_id)
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

    public function select_user_notify_coaching_form($user_id){

        $this->db->select('*')->from('tbluser')
        ->where_in('usertype', array('Manager'))
        ->where_not_in('user_id', $user_id)
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


       public function select_user_report($user_id){

        $this->db->select('*')->from('tbluser')
        ->where_in('usertype', array('Production', 'Manager', 'Author Relation', 'Publishing/Marketing'))
        ->where_not_in('user_id', $user_id)
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

      public function select_user_specify_notify_remark($user_id){

        $this->db->select('*')->from('tbluser')
        ->where_in('usertype', array('Production', 'Manager', 'Author Relation', 'Admin'))
        ->where_not_in('user_id', $user_id)
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

        $this->db->select('*')->from('tbluser')
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

        $this->db->select('*')->from('tbluser')
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

        $this->db->select('*')->from('tbluser')
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

        $this->db->select('*')->from('tbluser')->where(array('usertype ' => 'Interior Designer', 'status_user' => 'Active'));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      // agent active 
      public function select_user_agent(){

        $this->db->distinct()->select('*')->from('tbluser')->where(array('usertype ' => 'Agent', 'status_user' => 'Active'));

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

        $this->db->distinct()->select('*')->from('tbluser')->where('usertype', 'Manager')->or_where('usertype ','Agent')
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

        $this->db->distinct()->select('*')->from('tbluser')->where(array('usertype ' => 'Agent', 'status_user' => 'Active'));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }  
      // manager assign

      public function select_user_manager(){

        $this->db->select('*')->from('tbluser')->where(array('usertype ' => 'Manager', 'status_user' => 'Active'));

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

        $this->db->select('user.*, assign_user.*')->from('tbluser as user')

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

        $this->db->select('user.*, assign_user.*')->from('tbluser as user')

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

        $this->db->select('*')->from('tbluser')->where(array('user_id ' => $user_id));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
     public function select_performance_user_id($user_id){

        $this->db->select('*')->from('tbluser')->where(array('user_id ' => $user_id));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_user_activity($user_id){

        $this->db->select('*')->from('tbluser')->where(array('user_id ' => $user_id, 'usertype' => "Agent"));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

       public function select_user_status_log($user_id){

        $this->db->select('attempt_activites')->from('tbluserlog')->where(array('user_id ' => $user_id))->order_by('user_id', 'desc')->limit(1);

        $query=$this->db->get();

        if ($query->num_rows() == 1){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
      public function select_code_user($user_id, $idle_code){

        $this->db->select('*')->from('tbluser')->where(array('user_id ' => $user_id, 'idle_code' => $idle_code));

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

        $this->db->select('*')->from('tbluserlog')->where(array('user_id ' => $user_id));

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

        $this->db->select('*')->from('tbluser')->where(array('user_id ' => $user_id, 'password' => $hashed_password));

        $query = $this->db->get();

         if ($query->num_rows() > 0){

              return  $this->db->where(array('user_id ' => $user_id, 'password' => $hashed_password))->update('tbluser', array('password' => $new_password));

        }

        else{

          return false;

        }

        $this->db->close();

      }

      public function view_alluser(){

        $this->db->select('*')->from('tbluser');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }


     // update user profile
      public function update_profile($data, $user_id) { 

         $this->db->set($data); 

         $this->db->where("user_id", $user_id); 

         $this->db->update("tbluser"); 

      } 

       public function update_attempt($emailaddress) { 

         $this->db->set('attempt', 'attempt-1', FALSE); 

         $this->db->where("emailaddress", $emailaddress); 

         $this->db->update("tbluser"); 

      }

      public function update_userlog($emailaddress, $password) { 

         $this->db->set('log_date', 'NOW()', FALSE); 

         $this->db->set('userlogin', 'login'); 

         $this->db->where("emailaddress", $emailaddress);

         $this->db->where("password", $password);

         $this->db->update("tbluser"); 

      } 

      public function all_users(){

        $this->db->select('*')->from('tbluser');

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

        $this->db->select('*')->from('tbluser')->where('emailaddress', $emailaddress);

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

        $this->db->select('*')->from('tbluser')->where('emailaddress', $emailaddress);

        $query = $this->db->get();

         if ($query->num_rows() > 0){

              return  $this->db->where('emailaddress', $emailaddress)->update('tbluser', array('password' => $password));

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

        $this->db->select('emailaddress')->from('tbluser')->where('user_id', $user_id);

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

