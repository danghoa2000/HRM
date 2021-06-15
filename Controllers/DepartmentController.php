<?php
    class DepartmentController extends controller
    {
        public $DepartmentModel;
        public $EmployeeModel;
        public $LoginModel;
        function __construct()
        {
            $this->loadModel("DepartmentModel");
            $this->DepartmentModel = new DepartmentModel;
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
            if(isset($_SESSION["role"]) == "user")
            {
                $data = $this->EmployeeModel->findByID($_SESSION["id"]);
            }

           $rs = $this->DepartmentModel->getAll(["id_department","name"],[]);
           $this->View('Admin.Department.index',["list"=>$rs,"data"=>$data]);
        }
        public function add()
        {  
            $name = $_POST["name"];
            if(Isempty($name)==1)
            {
                $rs = $this->DepartmentModel->insert(["name"],[$name]);
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
            if(Isempty($name)==1)
            {
                $rs = $this->DepartmentModel->update(["name"],[$name, $id],["id_department"]);
                echo json_encode(($rs));
            }
            else
            {
                echo 0;
            }
        }
    }
?>