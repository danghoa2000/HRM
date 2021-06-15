<?php
    class ScheduleListController extends controller
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
            $rs = $this->ScheduleModel->getAll();
            $staff = $this->EmployeeModel->getAll();
            $this->View('Admin.Schedule_L.index',["list"=>$rs, "staff"=>$staff]);
        }
        public function edit()
        {
            $id = $_POST["id"];
            $id_staff = $_POST["id_staff"];
            $rs = $this->EmployeeModel->update(["id_schedule"],[$id,$id_staff],["id_employee"]);
            echo json_encode(($rs));
        }
        
    }
?>