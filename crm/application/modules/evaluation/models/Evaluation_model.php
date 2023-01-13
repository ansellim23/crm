  <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



   class Evaluation_Model extends CI_Model {

      

      function __construct() {

         parent::__construct();

         $this->load->library('encryption');

      }



      public function insert($data) {

         if ($this->db->insert("tblevaluation", $data)) {

            return true;

         }

      }
      //tblcriteria
      public function insert_criteria($data) {

         if ($this->db->insert("tblcriteria", $data)) {

            return true;

         }

      }

      //tblpoints
      public function insert_points($data) {

         if ($this->db->insert("tblpoints", $data)) {

            return true;

         }

      }


      public function view_teamevaluation_manager($manager_id){

         $this->db->select('evaluation.*, user.*')->from('tblevaluation as evaluation')

        ->join('tbluser as user', 'evaluation.to_user_id = user.user_id', 'inner')
        ->where(array('evaluation.from_user_id' => $manager_id, 'evaluation.form_type' => 'Employee Evaluation'));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function view_companyevaluation_agent($agent_id){

         $this->db->select('evaluation.*, user.*')->from('tblevaluation as evaluation')

        ->join('tbluser as user', 'evaluation.from_user_id = user.user_id', 'inner')
        ->where(array('evaluation.from_user_id' => $agent_id, 'evaluation.form_type' => 'Company Evaluation'));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function view_teamevaluation_admin(){

         $this->db->select('evaluation.*, user.*')->from('tblevaluation as evaluation')

        ->join('tbluser as user', 'evaluation.to_user_id = user.user_id', 'inner');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

        public function select_max_evaluation_id(){ 

         $this->db->select('class_id')->from('tblevaluation')
        ->order_by('class_id','DESC')
        ->limit(1);

        $query=$this->db->get();

       if ($query->num_rows() > 0){

            $row = $query->row(); 
            return $row->class_id;
        }

        else{
            return 0;
        }

        $this->db->close();

      }




      public function view_teamevaluation_agent($agent_id){

         $this->db->select('evaluation.*, user.*')->from('tblevaluation as evaluation')

        ->join('tbluser as user', 'evaluation.to_user_id = user.user_id', 'inner')
        ->where(array('to_user_id' => $agent_id, 'form_type' => 'Employee Evaluation', 'total_score !=' => '0'));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function view_teamevaluation_detail($evaluation_id){

        $this->db->select('*')->from('tblevaluation')
      
        ->where('evaluation_id',$evaluation_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();

      }

      public function select_evaluation_id($evaluation_id){

        $this->db->select('*')->from('tblevaluation')
      
        ->where('evaluation_id',$evaluation_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->row_array();

        }
        else{

            return false;

        }

        $this->db->close();

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

       public function insert_evaluation_comment($data) {

         if ($this->db->insert("tblevaluationcomment", $data)) {

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

      public function view_evaluation_comments($evaluation_id, $comment_type){

        $this->db->select('*')
        ->from('tblevaluationcomment')
        ->where(array('evaluation_id' => $evaluation_id, 'comment_type' => $comment_type));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function view_evaluation_class_comments($class_id, $comment_type){

        $this->db->select('*')
        ->from('tblevaluationcomment')
        ->where(array('comment_type' => $comment_type, "class_id" => $class_id))
        //->group_by('class_id')
        ->order_by('evaluation_id','desc');;

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

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

      public function update_evaluation_score($data, $criteria_id) { 

         $this->db->set($data); 

         $this->db->where("criteria_id", $criteria_id); 

         $this->db->update("tblcriteria"); 

      }

      public function update_evaluation_totalscore($data, $evaluation_id) { 

         $this->db->set($data); 

         $this->db->where("evaluation_id", $evaluation_id); 

         $this->db->update("tblevaluation"); 

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


      //  public function view_evaluation($evaluation_id){ 

      //   $this->db->select('evaluation.*, criteria.*, points.*')->from('tblevaluation as evaluation')

      //   ->join('tblcriteria as criteria', 'evaluation.evaluation_id = criteria.evaluation_id', 'inner')
      //   ->join('tblpoints as points', 'evaluation.evaluation_id = points.evaluation_id', 'inner')
      //   ->where('evaluation.evaluation_id', $evaluation_id);
      //   // ->order_by('collection.collection_id','DESC');

      //   $query=$this->db->get();

      //   if ($query->num_rows() > 0){

      //      return $query->result_array();

      //   }
      //   else{

      //       return 'false';

      //   }

      //   $this->db->close();

      // }


       public function view_evaluation($evaluation_id){ 

        $this->db->select('*')->from('tblevaluation as evaluation')

        ->join('tbluser as user', 'evaluation.to_user_id = user.user_id', 'inner')

        ->where('evaluation_id', $evaluation_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

           return $query->result_array();

        }
        else{

            return 'false';

        }

        $this->db->close();

      }

        public function view_evaluation_coaching($evaluation_id){ 

        $this->db->select('*')->from('tblevaluation as evaluation')

        ->join('tbluser as user', 'evaluation.to_user_id = user.user_id', 'inner')

        ->where('evaluation_id', $evaluation_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

           return $query->row_array();

        }
        else{

            return 'false';

        }

        $this->db->close();

      }

       public function view_evaluation_agent($evaluation_id){ 

        $this->db->select('*')->from('tblevaluation as evaluation')

        ->join('tbluser as user', 'evaluation.from_user_id = user.user_id', 'inner')

        ->where('evaluation_id', $evaluation_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

           return $query->result_array();

        }
        else{

            return 'false';

        }

        $this->db->close();

      }

       public function view_criteria($evaluation_id){ 

        $this->db->select('*')->from('tblcriteria')

        ->where('evaluation_id', $evaluation_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

           return $query->result_array();

        }
        else{

            return 'false';

        }

        $this->db->close();

      }

       public function view_points($evaluation_id){ 

        $this->db->select('*')->from('tblpoints as points')

        ->join('tblcriteria as criteria', 'criteria.criteria_id = points.criteria_id', 'inner')

        ->where('criteria.evaluation_id', $evaluation_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){ 

           return $query->result_array();

        }
        else{

            return 'false';

        }

        $this->db->close();

      }

   }

?>

