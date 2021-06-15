<?php
    class LoginController extends controller
    {
        public $LoginModel;
        public $EmployeeModel;
        function __construct()
        {
            $this->loadModel("LoginModel");
            $this->LoginModel = new LoginModel;
            $this->loadModel("EmployeeModel");
            $this->EmployeeModel = new EmployeeModel;
            require("./Core/validate.php");
        }
        public function index()
        {
            $rs = $this->LoginModel->getAll();
           $this->View('Admin.Login.index',["list"=>$rs]);
        }
        public function signin()
        {  
            $username = $_POST["username"];
            $password = $_POST["password"];
            $role = $_POST["role"];
            if($role == 1)
            {
                $rs = $this->LoginModel->signin($username,$password);
                if(count($rs) > 0)
                {
                    $_SESSION["role"] = "admin";
                    $_SESSION["id"] = $username;
                    $_SESSION["pass"] = $password;
                    echo json_encode(true);
                }
                else
                {
                    echo json_encode(false);
                }
            }
            else
            {
                $rs = $this->EmployeeModel->account($username,$password);
                if(count($rs) > 0)
                {
                    $_SESSION["role"] = "user";
                    $_SESSION["id"] =  $rs[0]["id_employee"];
                    echo json_encode(true);
                }
                else
                {
                    echo json_encode(false);
                }
            }
        }
    }
?>