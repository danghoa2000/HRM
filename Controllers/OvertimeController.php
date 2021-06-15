<?php
    class OvertimeController extends controller
    {
        public $OvertimeModel;
        public $EmployeeModel;
        public $LoginModel;
        function __construct()
        {
            $this->loadModel("OvertimeModel");
            $this->OvertimeModel = new OvertimeModel;
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
           $rs = $this->OvertimeModel->getAll();
           $staff = $this->EmployeeModel->getAll();
           $this->View('Admin.Overtime.index',["list"=>$rs, "staff"=>$staff]);
        }
        public function add()
        {  
            $id = $_POST["id"];
            $hour = $_POST["hour"];
            $start = $_POST["start"];
            $finish = $_POST["finish"];
            $rate = $_POST["rate"];
            if(strtotime($finish) - strtotime($start) >=0)
            {
                $rs = $this->OvertimeModel->insert(["id_employee","hour","date_start","date_finish","rate"],[$id,$hour,$start,$finish,$rate]);
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
            $hour = $_POST["hour"];
            $start = $_POST["start"];
            $finish = $_POST["finish"];
            $rate = $_POST["rate"];
            if(strtotime($finish) - strtotime($start) >=0)
            {
                $rs = $this->OvertimeModel->update(["hour","date_start","date_finish","rate"],[$hour,$start,$finish,$rate, $id],["id_overtime"]);
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
            $rs = $this->OvertimeModel->delete([$id],["id_overtime"]);
            echo json_encode(($rs));
        }
    }
?>