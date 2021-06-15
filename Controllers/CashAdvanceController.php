<?php
    class CashAdvanceController extends controller
    {
        public $CashAdvanceModel;
        public $EmployeeModel;
        public $LoginModel;
        function __construct()
        {
            $this->loadModel("CashAdvanceModel");
            $this->CashAdvanceModel = new CashAdvanceModel;
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
           $rs = $this->CashAdvanceModel->getAll();
           $staff = $this->EmployeeModel->getAll();
           $this->View('Admin.CashAdvance.index',["list"=>$rs, "staff"=>$staff]);
        }
        public function add()
        {  
            $id = $_POST["id"];
            $amount = $_POST["amount"];
            $date = date("Y-m-d");
            $rs = $this->CashAdvanceModel->insert(["id_employee","amount","date"],[$id, $amount, $date]);
            echo json_encode(($rs));
            
           
        }
        public function edit()
        {
            $id = $_POST["id"];
            $amount = $_POST["amount"];
            $date = date("Y-m-d");
            $rs = $this->CashAdvanceModel->update(["amount","date"],[$amount,$date, $id],["id_cashadvance"]);
            echo json_encode(($rs));
        }

        public function delete()
        {
            $id = $_POST["id"];
            $rs = $this->CashAdvanceModel->delete([$id],["id_cashadvance"]);
            echo json_encode(($rs));
        }
        
    }
?>