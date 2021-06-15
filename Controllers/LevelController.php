<?php
    class LevelController extends controller
    {
        public $LevelModel;
        public $EmployeeModel;
        public $LoginModel;
        function __construct()
        {
            $this->loadModel("LevelModel");
            $this->LevelModel = new LevelModel;
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
           $rs = $this->LevelModel->getAll(["id_level","name","rate"]);
           $this->View('Admin.Level.index',["list"=>$rs]);
        }
        public function add()
        {  
            $name = $_POST["name"];
            $rate = $_POST["rate"];
            if(Isempty($name)==1 && floatnumber($rate)==1)
            {
                $rs = $this->LevelModel->insert(["name","rate"],[$name, $rate]);
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
                $rs = $this->LevelModel->update(["name","rate"],[$name, $rate, $id],["id_level"]);
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
            $rs = $this->LevelModel->delete([$id],["id_level"]);
            echo json_encode(($rs));
        }
    }
?>