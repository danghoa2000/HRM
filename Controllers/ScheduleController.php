<?php
    class ScheduleController extends controller
    {
        public $ScheduleModel;
        public $EmployeeModel;
        public $LoginModel;
        function __construct()
        {
            $this->loadModel("ScheduleModel");
            $this->ScheduleModel = new ScheduleModel;
            $this->loadModel("EmployeeModel");
            $this->EmployeeModel = new EmployeeModel;
            $this->loadModel("LoginModel");
            $this->LoginModel = new LoginModel;

            if(!isset($_SESSION["id"]))
            {
                header('Location: http://localhost/HRM/login/');
            }
            require("./Core/validate.php");
        }
        public function index()
        {
           $rs = $this->ScheduleModel->getAll(["id_schedule","time_in","time_out"]);
           $this->View('Admin.Schedule.index',["list"=>$rs]);
        }
        public function main()
        {
           $rs = $this->ScheduleModel->getAll();
           $staff = $this->EmployeeModel->getAll();
           $this->View('Admin.Schedule.main',["list"=>$rs, "staff"=>$staff]);
        }
        public function add()   
        {  
            $time_in = $_POST["time_in"];
            $time_out = $_POST["time_out"];
            if(hour($time_in)==1 && hour($time_out)==1)
            {
                $rs = $this->ScheduleModel->insert(["time_in","time_out"],[$time_in, $time_out]);
                echo json_encode(($rs));
            }
            else
            {
                echo 0;
            }
           
        }
        public function edit()
        {
            $id = $_POST["id"];
            $time_in = $_POST["time_in"];
            $time_out = $_POST["time_out"];
            if(hour($time_in)==1 && hour($time_out)==1)
            {
                $rs = $this->ScheduleModel->update(["time_in","time_out"],[$time_in, $time_out, $id],["id_schedule"]);
                echo json_encode(($rs));
            }
            else
            {
                echo 0;
            }
        }
        public function delete()
        {
            $id = $_POST["id"];
            $rs = $this->ScheduleModel->delete([$id],["id_schedule"]);
            echo json_encode(($rs));
        }
    }
?>