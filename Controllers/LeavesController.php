<?php
    class LeavesController extends controller
    {
        public $LeavesModel;
        public $EmployeeModel;
        public $LoginModel;
        function __construct()
        {
            $this->loadModel("LeavesModel");
            $this->LeavesModel = new LeavesModel;
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
           $rs = $this->LeavesModel->getAll();
           $staff = $this->EmployeeModel->getAll();
           $this->View('Admin.Leaves.index',["list"=>$rs, "staff"=>$staff]);
        }
        public function add()
        {  
            $id = $_POST["id"];
            $start = $_POST["start"];
            $finish = $_POST["finish"];
            $info = $_POST["info"];
            if(strtotime($finish) - strtotime($start) >=0)
            {
                $rs = $this->LeavesModel->insert(["id_employee","date_start","date_finish","info"],[$id,$start,$finish,$info]);
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
            $start = $_POST["start"];
            $finish = $_POST["finish"];
            $info = $_POST["info"];
            if(strtotime($finish) - strtotime($start) >=0)
            {
                $rs = $this->LeavesModel->update(["date_start","date_finish","info"],[$start,$finish,$info, $id],["id_leaves"]);
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
            $rs = $this->LeavesModel->delete([$id],["id_leaves"]);
            echo json_encode(($rs));
        }
    }
?>