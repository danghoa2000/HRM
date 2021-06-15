<?php
    class AttendanceController extends controller
    {
        public $AttendanceModel;
        public $EmployeeModel;
        public $LoginModel;
        function __construct()
        {
            $this->loadModel("AttendanceModel");
            $this->AttendanceModel = new AttendanceModel;
            $this->loadModel("EmployeeModel");
            $this->EmployeeModel = new EmployeeModel;
            $this->loadModel("LoginModel");
            $this->LoginModel = new LoginModel;
            if(!isset($_SESSION["id"]) && !isset($_SESSION["role"]))
            {
                header('Location: http://localhost/HRM/login/');
            }
            require("./Core/validate.php");
        }
        public function index()
        {
        
           $staffs = $this->EmployeeModel->getAll();
           $arr = [];
           foreach($staffs as $staff)
           {
            $rs = $this->AttendanceModel->getbyID($staff["id_employee"]);
            $arr[] = ["id_employee"=>$staff["id_employee"], "name"=>$staff["name"], "inf"=>$rs];
           }
           $this->View('Admin.Attendance.index',["list"=>json_encode($arr)]);
        }
        public function add()
        {  
            $id = $_POST["id"];
            $id_sheet = $this->EmployeeModel->find_sheet($id);
            $date = $_POST["date"];
            $time_in = $_POST["time_in"];
            $time_out = $id_sheet[0]["time_out"];
            if(strtotime($time_in) > strtotime($id_sheet[0]["time_in"]))
            {
                $status = 1;
            }
            else
            {
                $status = 2;
            }
            if($status == 1)
            {
                $num =  ((strtotime($time_out) - strtotime($time_in))/(60 * 60));
            }
            else
            {
                 $num =  (strtotime($time_out) - strtotime($id_sheet[0]["time_in"]))/(60 * 60);
            }
            if($num < 1)
            {
                $num = 0;
            }
            if($this->getinf($id, $date) == [])
            {
            $rs = $this->AttendanceModel->insert(["id_employee","date","time_in","time_out","status","num_hr"],[$id, $date, $time_in, $time_out,$status,$num]);
            echo json_encode(($rs));
            }
            else
            {
                echo json_encode(0);
            }
        }
        public function check()
        {
            $id = $_POST["id"];
            $date = $_POST["date"];
            $rs = $this->AttendanceModel->find($id,$date);
            if(count($rs) > 0)
            {
                echo json_encode(1);
            }
            else
            {
                echo json_encode(0);
            }
        }
        public function getinf($id, $date)
        {
            $rs = $this->AttendanceModel->find($id,$date);
            if(count($rs) > 0)
            {
               return $rs;
            }
        }
        public function edit()
        {
            $id = $_POST["id"];
            $id_sheet = $this->EmployeeModel->find_sheet($id);
            $date = $_POST["date"];
            $time_in = $_POST["time_in"];
            $inf = $this->getinf($id, $date);
            if(strtotime($time_in) > strtotime($id_sheet[0]["time_out"]))
            {
                $time_in = $id_sheet[0]["time_out"];
            }
            $num =  ((strtotime($time_in) - strtotime($inf[0]["time_in"]))/(60 * 60));
            if($num < 1)
            {
                $num = 0;
            }
            $rs = $this->AttendanceModel->update(["time_out","num_hr"],[$time_in,$num,$id,$date],["id_employee","date"]);
            echo json_encode(($rs));
        }

        public function delete()
        {
            $id = $_POST["id"];
            $rs = $this->AttendanceModel->delete([$id],["id_attendance"]);
            echo json_encode(($rs));
        }
        public function update()
        {
            $id = $_POST["id"];
            $id_staff = $_POST["id_staff"];
            $time_in = $_POST["time_in"];
            $time_out = $_POST["time_out"];
            $id_sheet = $this->EmployeeModel->find_sheet($id_staff);
            if((strtotime($time_in) > strtotime($id_sheet[0]["time_in"])))
            {
                $status = 1;
            }
            else
            {
                $status = 2;
            }
            if($status == 1)
            {
                $num =  (strtotime($time_out) - strtotime($time_in))/(60 * 60);
            }
            else
            {
                $num =  (strtotime($time_out) - strtotime($id_sheet[0]["time_in"]))/(60 * 60);
            }
            if($num < 1)
            {
                $num = 0;
            }
            $rs = $this->AttendanceModel->update(["time_in","time_out","status","num_hr"],[$time_in,$time_out, $status,$num,$id],["id_attendance"]);
            echo json_encode(($rs));
        }
        public function getdata()
        {
            $name = $_POST["name"];
            $date = $_POST["date"];
            $index = 1;
           
            if(isset($_POST["index"]))
            {
                $index = $_POST["index"];
            }
            $total = ($this->EmployeeModel->search($name));
            $staffs = $this->EmployeeModel->search($name,[($index-1)*5,5]);
            $arr = [];
            foreach($staffs as $staff)
            {
                if($date == "")
                {
                    $rs = $this->AttendanceModel->getbyID($staff["id_employee"]);
                }
                else
                {
                    $rs = $this->AttendanceModel->find($staff["id_employee"], $date);
                }
            
             $arr[] = ["id_employee"=>$staff["id_employee"], "name"=>$staff["name"], "inf"=>$rs];
            }
            echo json_encode(["data" =>$arr,"count"=>count($total)]);
        }
        
    }
?>