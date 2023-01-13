  <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Attendance_Model extends CI_Model {
      
      function __construct() {
         parent::__construct();

      }

      public function insert($data) {
         if ($this->db->insert("tblattendance", $data)) {
            return true;
         }
      }
      public function insert_attendance($data) {
         if ($this->db->insert("tblremarkattendance", $data)) {
            return true;
         }
      }
      public function insert_attendance_file($data) {
         if ($this->db->insert("tblattendancefile", $data)) {
            return true;
         }
      }
      // public function view_attendance_admin(){

      //   $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,attendance.status_log,
      //     IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
      //     IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
      //     IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
      //     IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
      //     IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2)) AS total_out,
      //     IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
      //     IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
      //     IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
      //     IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
      //     IF(time(time_in) > "22:00:00" && time(time_in) > "00:00:00"  OR time(time_in) <= "07:00:00", TIMEDIFF(time(attendance.time_in), time("22:00:00")) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
      //     IF(time(time_in) > "22:00:00" && time(time_in) > "00:00:00" OR time(time_in) <= "07:00:00", "0.5", "0") AS point_late, remark_attendance, approve_status,
      //         user.*')
      //     ->FROM('tblattendance as attendance')
      //     ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')->where_in('usertype', array('Agent', 'Manager', 'Human Resources'))

      //      ->order_by('attendance.duty_log','ASC');

      //    $query=$this->db->get();


      //   if ($query->num_rows() > 0){

      //     return $query->result_array();

      //   }

      //   else{ 

      //       return false;

      //   }

      //   $this->db->close();

      // }

       public function view_attendance_admin(){

        $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,attendance.status_log,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(IF(user.time_in_start ="00:00:00", "24:00:00",user.time_in_start))), TIMEDIFF(time(attendance.time_in), time(user.time_in_start)) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(IF(user.time_in_start ="00:00:00", "24:00:00",user.time_in_start))), "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')
          ->FROM('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')->where('user.status_user', 'Active')->where_in('usertype', array('Agent'))

           ->order_by('attendance.duty_log','ASC');

         $query=$this->db->get();


        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{ 

            return false;

        }

        $this->db->close();

      }
       public function view_attendance_all(){

        $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(user.time_in_start)), TIMEDIFF(time(attendance.time_in), time(user.time_in_start)) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(user.time_in_start)), "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')
          ->FROM('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')->where_in('usertype', array('IT', 'Admin', 'Manager', 'Human Resources'))

           ->order_by('attendance.duty_log','ASC');

         $query=$this->db->get();


        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{ 

            return false;

        }

        $this->db->close();

      }


        public function view_attendance_IT(){

        $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 21:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 21:00:00"), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 21:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 21:00:00"), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 21:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 21:00:00"), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 21:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 21:00:00"), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 21:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 21:00:00"), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2)) AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
          IF(time(time_in) > "21:00:00" && time(time_in) > "00:00:00"  OR time(time_in) <= "06:00:00", TIMEDIFF(time(attendance.time_in), time("21:00:00")) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time(time_in) > "21:00:00" && time(time_in) > "00:00:00" OR time(time_in) <= "06:00:00", "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')
          ->FROM('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')->where_in('usertype', array('IT'))

           ->order_by('attendance.duty_log','ASC');

         $query=$this->db->get();


        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{ 

            return false;

        }

        $this->db->close();

      }
       public function view_attendance_manager($date_now){

         $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(IF(user.time_in_start ="00:00:00", "24:00:00",user.time_in_start))), TIMEDIFF(time(attendance.time_in), time(user.time_in_start)) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(IF(user.time_in_start ="00:00:00", "24:00:00",user.time_in_start))), "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')
          ->FROM('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')
          ->where("IF(user.schedule_status = 'Flexible', DATE_FORMAT(attendance.duty_log, '%Y-%m-%d 00:00:00') <='".$date_now."', ADDTIME(DATE_FORMAT(attendance.duty_log, '%Y-%m-%d %H:%i:%s'), SUBTIME(IF(TIME(user.time_in_start) >= '01:00:00', TIME('24:40:00'), TIME(user.time_in_start)), TIME('00:15:00'))) <='".$date_now."')")
          ->where_in('usertype', array('Agent'))->order_by('attendance.duty_log','ASC');

         $query=$this->db->get();


        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{ 

            return false;

        }

        $this->db->close();
      }
      public function view_attendance_employee($user_id, $date_now){

         $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(IF(user.time_in_start ="00:00:00", "24:00:00",user.time_in_start))), TIMEDIFF(time(attendance.time_in), time(user.time_in_start)) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(IF(user.time_in_start ="00:00:00", "24:00:00",user.time_in_start))), "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')->FROM('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')
          ->where('attendance.user_id', $user_id)
          ->where("IF(user.schedule_status = 'Flexible', DATE_FORMAT(attendance.duty_log, '%Y-%m-%d 20:30:00') <='".$date_now."', ADDTIME(DATE_FORMAT(attendance.duty_log, '%Y-%m-%d %H:%i:%s'), SUBTIME(IF(TIME(user.time_in_start) >= '01:00:00', TIME('20:40:00'), TIME(user.time_in_start)), TIME('00:15:00'))) <='".$date_now."')")
          ->order_by('attendance.duty_log','ASC');

             $query=$this->db->get();


            if ($query->num_rows() > 0){

              return $query->result_array();

            }

            else{

                return false;

            }

            $this->db->close();

          }

          public function view_attendance_employee_manager($user_id, $date_now){

         $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(IF(user.time_in_start ="00:00:00", "24:00:00",user.time_in_start))), TIMEDIFF(time(attendance.time_in), time(user.time_in_start)) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(IF(user.time_in_start ="00:00:00", "24:00:00",user.time_in_start))), "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')->FROM('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')
          ->where('attendance.user_id', $user_id)
          ->where("IF(user.schedule_status = 'Flexible', DATE_FORMAT(attendance.duty_log, '%Y-%m-%d 00:00:00') <='".$date_now."', ADDTIME(DATE_FORMAT(attendance.duty_log, '%Y-%m-%d %H:%i:%s'), SUBTIME(IF(TIME(user.time_in_start) >= '01:00:00', TIME('24:40:00'), TIME(user.time_in_start)), TIME('00:15:00'))) <='".$date_now."')")
          ->order_by('attendance.duty_log','ASC');

             $query=$this->db->get();


            if ($query->num_rows() > 0){

              return $query->result_array();

            }

            else{

                return false;

            }

            $this->db->close();

          }

         public function view_attendance_HR($user_id){
           $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
                    IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(IF(user.time_in_start ="00:00:00", "24:00:00",user.time_in_start))), TIMEDIFF(time(attendance.time_in), time(user.time_in_start)) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(IF(user.time_in_start ="00:00:00", "24:00:00",user.time_in_start))), "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')->FROM('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')
          ->where('attendance.user_id', $user_id)
          ->order_by('attendance.duty_log','ASC');

             $query=$this->db->get();


            if ($query->num_rows() > 0){

              return $query->result_array();

            }

            else{

                return false;

            }

            $this->db->close();

          }


      public function view_attendance_employee_test($user_id, $date_now){

        $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
                    IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(IF(user.time_in_start ="00:00:00", "24:00:00",user.time_in_start))), TIMEDIFF(time(attendance.time_in), time(user.time_in_start)) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(IF(user.time_in_start ="00:00:00", "24:00:00",user.time_in_start))), "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')
          ->FROM('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')
          ->where('attendance.user_id', $user_id)
          ->where("ADDTIME(DATE_FORMAT(attendance.duty_log, '%Y-%m-%d %H:%i:%s'), SUBTIME(TIME(user.time_in_start), TIME('00:15:00'))) <='".$date_now."'")
          ->order_by('attendance.duty_log','ASC');

             $query=$this->db->get();


            if ($query->num_rows() > 0){

              return $query->result_array();

            }

            else{

                return false;

            }

            $this->db->close();

          }



      public function view_attendance_employee_IT($user_id, $date_now){

           $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(user.time_in_start)), TIMEDIFF(time(attendance.time_in), time(user.time_in_start)) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(user.time_in_start)), "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')->FROM('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')
          ->where('attendance.user_id', $user_id)
          ->where("IF(user.schedule_status = 'Flexible', DATE_FORMAT(attendance.duty_log, '%Y-%m-%d 00:00:00') <='".$date_now."', ADDTIME(DATE_FORMAT(attendance.duty_log, '%Y-%m-%d %H:%i:%s'), SUBTIME(IF(TIME(user.time_in_start) >= '01:00:00', TIME('24:40:00'), TIME(user.time_in_start)), TIME('00:15:00'))) <='".$date_now."')")
          ->order_by('attendance.duty_log','ASC');

             $query=$this->db->get();


            if ($query->num_rows() > 0){

              return $query->result_array();

            }

            else{

                return false;

            }

            $this->db->close();

          }
       public function view_single_attendance($user_id, $date_now){
      
            $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(user.time_in_start)), TIMEDIFF(time(attendance.time_in), time(user.time_in_start)) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(user.time_in_start)), "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')->FROM('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')
          ->where('attendance.user_id', $user_id)
          ->where("IF(user.schedule_status = 'Flexible', DATE_FORMAT(attendance.duty_log, '%Y-%m-%d') <='".$date_now."', ADDTIME(DATE_FORMAT(attendance.duty_log, '%Y-%m-%d %H:%i:%s'), SUBTIME(IF(TIME(user.time_in_start) >= '01:00:00', TIME('24:40:00'), TIME(user.time_in_start)), TIME('00:15:00'))) <='".$date_now."')")
          ->order_by('attendance.duty_log','DESC')->limit(1);

         $query=$this->db->get();


        if ($query->num_rows() > 0){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }


       public function view_single_attendance1($user_id, $date_now){
      
          $this->db->select('attendance.time_log, attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,attendance.status_log,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(user.time_in_start)), TIMEDIFF(time(attendance.time_in), time(user.time_in_start)) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(user.time_in_start)), "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')
          ->from('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')
          ->where('attendance.user_id', $user_id)
          ->where("DATE_FORMAT(attendance.duty_log, '%Y-%m-%d') ='".$date_now."'")
          ->order_by('attendance.duty_log','DESC')->limit(1);

         $query=$this->db->get();


        if ($query->num_rows() > 0){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }


       public function view_single_attendance_prev($user_id, $date_now){
      
          $this->db->select('attendance.time_log, attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,attendance.status_log,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), ROUND(TIMESTAMPDIFF(MINUTE, ADDTIME(DATE_FORMAT(attendance.duty_log, "%Y-%m-%d %H:%i:%s"), TIME(user.time_in_start)), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(user.time_in_start)), TIMEDIFF(time(attendance.time_in), time(user.time_in_start)) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time_in > ADDTIME(DATE_FORMAT(attendance.time_in, "%Y-%m-%d 00:00:00"), TIME(user.time_in_start)), "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')
          ->from('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')
          ->where('attendance.user_id', $user_id)
          ->where("DATE_FORMAT(attendance.duty_log, '%Y-%m-%d') < '".$date_now."'")
          ->order_by('attendance.duty_log','DESC')->limit(1);

         $query=$this->db->get();


        if ($query->num_rows() > 0){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }


      public function view_user_attendance($user_id, $date_now){
      
          $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,attendance.status_log,
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
          IF(time(time_in) > "22:00:00" && time(time_in) > "00:00:00"  OR time(time_in) <= "07:00:00", TIMEDIFF(time(attendance.time_in), time("22:00:00")) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time(time_in) > "22:00:00" && time(time_in) > "00:00:00" OR time(time_in) <= "07:00:00", "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')
          ->from('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')
          ->where('attendance.user_id', $user_id)
          ->where("DATE_FORMAT(attendance.duty_log, '%Y-%m-%d 21:45:00') <='".$date_now."'");

         $query=$this->db->get();


        if ($query->num_rows() == 1){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

       public function get_all_totalattendance_point($user_id, $date_now, $start_date_month, $last_date_month){
      
          $this->db->select('attendance.time_in, attendance.time_out, attendance.lunch_start, attendance.lunch_end,attendance.break_in, attendance.break_out, attendance.duty_log, attendance.attendance_id,attendance.status_log,
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), lunch_start)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_start)/60, 2)) AS total_lunch_start,  
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), lunch_end)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, lunch_end)/60, 2)) AS total_lunch_end,
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), break_in)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_in)/60, 2)) AS total_break_in,
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), break_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, break_out)/60, 2)) AS total_break_out,
          IF(time_in < DATE_FORMAT(duty_log, "%Y-%m-%d 22:00:00"), ROUND(TIMESTAMPDIFF(MINUTE, DATE_FORMAT(time_in, "%Y-%m-%d 22:00:00"), time_out)/60, 2), ROUND(TIMESTAMPDIFF(MINUTE, time_in, time_out)/60, 2))  AS total_out,
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) - INTERVAL 30 MINUTE, "00:00:00") AS excess_break,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) - INTERVAL 60 MINUTE, "00:00:00") as excess_lunch, 
          IF(TIMEDIFF(time(attendance.break_out), time(attendance.break_in)) > "00:30:00", "0.5", "0") AS excess_break_point,
          IF(TIMEDIFF(time(attendance.lunch_end), time(attendance.lunch_start)) > "01:00:00", "0.5", "0") as excess_lunch_point, 
          IF(time(time_in) > "22:00:00" && time(time_in) > "00:00:00"  OR time(time_in) <= "07:00:00", TIMEDIFF(time(attendance.time_in), time("22:00:00")) - INTERVAL 1 MINUTE, "00:00") AS late_minutes,
          IF(time(time_in) > "22:00:00" && time(time_in) > "00:00:00" OR time(time_in) <= "07:00:00", "0.5", "0") AS point_late, remark_attendance, approve_status,
              user.*')
          ->from('tblattendance as attendance')
          ->join('tbluser as user', 'attendance.user_id = user.user_id', 'inner')
          ->where('attendance.user_id', $user_id)
          ->where("DATE_FORMAT(attendance.duty_log, '%Y-%m-%d 21:45:00') < NOW() ")
          ->where("DATE_FORMAT(attendance.duty_log, '%Y-%m-%d') BETWEEN '".$start_date_month."'  AND  '".$last_date_month."'");
 
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
          
          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_attendancefile_id($attendance_id){
        $this->db->select('*')->from('tblattendancefile')
        ->where('attendance_id', $attendance_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){
          
          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
       public function select_exist_attendance($user_id){
        $this->db->select('*')->from('tblattendance');
        $this->db->where("status_log", 'Time In'); 
        $this->db->or_where("status_log", 'Lunch End'); 
        $this->db->or_where("status_log", 'Break Out'); 
        $this->db->order_by('attendance_id','DESC');
        $this->db->limit(1);
        $query=$this->db->get();

        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
        $this->db->close();
      }
        public function select_duty_log($user_id, $duty_log){
        $this->db->select('*')->from('tblattendance');
        $this->db->where("user_id", $user_id); 
        $this->db->where("DATE_FORMAT(duty_log, '%Y-%m-%d') ='".$duty_log."'");
        $query=$this->db->get();

        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
        $this->db->close();
      }
       public function select_attendance_remark($attendance_id){
        $this->db->select('*')->from('tblremarkattendance')
        ->where('attendance_id', $attendance_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){
          
          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
      public function select_attendance_time_in($attendance_id){
        $this->db->select('time_in')->from('tblattendance')
        ->where('attendance_id', $attendance_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){
          
          
           $row = $query->row(); 
           return $row->time_in;

        }

        else{

            return false;

        }

        $this->db->close();

      }
       public function select_attendance_time_out($attendance_id){
        $this->db->select('time_out')->from('tblattendance')
        ->where('attendance_id', $attendance_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){
          
           $row = $query->row(); 
            return $row->time_out;
        }

        else{

            return false;

        }

        $this->db->close();

      }
       public function select_attendance_break_in($attendance_id){
          $this->db->select('break_in')->from('tblattendance')
          ->where('attendance_id', $attendance_id);

          $query=$this->db->get();

          if ($query->num_rows() > 0){
            
            $row = $query->row(); 
            return $row->break_in;

          }

        else{

            return false;

        }

        $this->db->close();

      }
       public function select_attendance_break_out($attendance_id){
        $this->db->select('break_out')->from('tblattendance')
        ->where('attendance_id', $attendance_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){
          
           $row = $query->row(); 
            return $row->break_out;

        }

        else{

            return false;

        }

        $this->db->close();

      }
      public function select_attendance_lunch_start($attendance_id){
        $this->db->select('lunch_start')->from('tblattendance')
        ->where('attendance_id', $attendance_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){
          
          
           $row = $query->row(); 
           return $row->lunch_start;

        }

        else{

            return false;

        }

        $this->db->close();

      }
      public function select_attendance_lunch_end($attendance_id){
        $this->db->select('lunch_end')->from('tblattendance')
        ->where('attendance_id', $attendance_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){
          
          
           $row = $query->row(); 
            return $row->lunch_end;

        }

        else{

            return false;

        }

        $this->db->close();

      }
      public function update_time_log($data, $attendance_id) { 

         $this->db->set($data); 

         $this->db->where("attendance_id", $attendance_id); 

         $this->db->update("tblattendance"); 

      } 


   }
?>
