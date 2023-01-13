  <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



   class Form_Model extends CI_Model {

      

      function __construct() {

         parent::__construct();

         $this->load->library('encryption');

      }



      public function insert($data) {

         if ($this->db->insert("tblforms", $data)) {

            return true;

         }

      }
      //leave Form
      public function view_forms_user($user_id){

        $this->db->select('*')->from('tblforms ')
        ->where('user_id', $user_id)
  
        ->order_by('date_create','DESC');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();

      }

      //leave Form
      public function view_forms_user_all(){

        $this->db->select('*')->from('tblforms ')
        
        ->order_by('date_create','DESC');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();

      }


      //leave form
      public function view_form($form_id, $user_id) { 

         $this->db->select('*')->from('tblforms as form')
         ->join('tbluser as user', 'user.user_id = form.user_id', 'inner')
         ->where('form_id', $form_id);
        /* ->where('user_id', $user_id);*/

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();


   }

      //leave form
      public function view_form_id($form_id) { 

         $this->db->select('*')->from('tblforms as form')
         ->where('form_id', $form_id);
        /* ->where('user_id', $user_id);*/

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->row_array();

        }
        else{

            return false;

        }

        $this->db->close();


   }
    // get user by form
       public function view_form_user_id($form_id) { 

         $this->db->select('user.*, form.*')->from('tbluser as user')
         ->join('tblforms as form', 'user.user_id = form.user_id', 'inner')
         ->where('form.form_id', $form_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->row_array();

        }
        else{

            return false;

        }

        $this->db->close();


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
       public function select_user_specify_notify_all(){

        $this->db->select('*')->from('tbluser')
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

        $this->db->select('*')->from('tbluser')
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



      public function update_form($data, $form_id) { 

         $this->db->set($data); 

         $this->db->where("form_id", $form_id); 

         $this->db->update("tblforms"); 

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

  