  <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



   class Kpi_Model extends CI_Model {

      

      function __construct() {

         parent::__construct();

         $this->load->library('encryption');

      }



      public function insert($data) {

         if ($this->db->insert("tblkpi", $data)) {

            return true;

         }

      }


      public function view_kpi_admin(){

         $this->db->select('kpi.*, user.*')->from('tblkpi as kpi')

        ->join('tbluser as user', 'kpi.to_user_id = user.user_id', 'inner');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

       public function view_kpi($kpi_id){ 

        $this->db->select('*')->from('tblkpi as kpi')

        ->join('tbluser as user', 'kpi.to_user_id = user.user_id', 'inner')

        ->where('kpi_id', $kpi_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

           return $query->result_array();

        }
        else{

            return 'false';

        }

        $this->db->close();

      }

      public function update_kpi($data, $kpi_id) { 

         $this->db->set($data); 

         $this->db->where("kpi_id", $kpi_id); 

         $this->db->update("tblkpi"); 

      }
    

   }

?>

