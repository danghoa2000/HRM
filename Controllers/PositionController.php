<?php
    class PositionController extends controller
    {
        public $PositionModel;
        public $LoginModel;
        public $EmployeeModel;
        function __construct()
        {
            $this->loadModel("PositionModel");
            $this->PositionModel = new PositionModel;
            $this->loadModel("LoginModel");
            $this->LoginModel = new LoginModel;
            $this->loadModel("EmployeeModel");
            $this->EmployeeModel = new EmployeeModel;
            if(!isset($_SESSION["id"]))
            {
                header('Location: http://localhost/HRM/login/');
            }
            require("./Core/validate.php");
        }
        public function index()
        {
           $rs = $this->PositionModel->getAll(["id_position","name","rate"]);
           $this->View('Admin.Position.index',["list"=>$rs]);
        }
        public function add()
        {  
            $name = $_POST["name"];
            $rate = $_POST["rate"];
            if(Isempty($name)==1 && floatnumber($rate)==1)
            {
                $rs = $this->PositionModel->insert(["name","rate"],[$name, $rate]);
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
            $name = $_POST["name"];
            $rate = $_POST["rate"];
            if(Isempty($name)==1 && floatnumber($rate)==1)
            {
                $rs = $this->PositionModel->update(["name","rate"],[$name, $rate, $id],["id_position"]);
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
            $rs = $this->PositionModel->delete([$id],["id_position"]);
            echo json_encode(($rs));
        }
    }
?>