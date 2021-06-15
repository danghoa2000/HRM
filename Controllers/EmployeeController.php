<?php
    class EmployeeController extends controller
    {
        public $EmployeeModel;
        public $PositionModel;
        public $LevelModel;
        public $DepartmentModel;
        public $ScheduleModel;
        public $LoginModel;
        const Upload = "Views/Admin/Employee/Upload/";
        function __construct()
        {
            $this->loadModel("EmployeeModel");
            $this->EmployeeModel = new EmployeeModel;
            $this->loadModel("PositionModel");
            $this->PositionModel = new PositionModel;
            $this->loadModel("LevelModel");
            $this->LevelModel = new LevelModel;
            $this->loadModel("DepartmentModel");
            $this->DepartmentModel = new DepartmentModel;
            $this->loadModel("ScheduleModel");
            $this->ScheduleModel = new ScheduleModel;
            $this->loadModel("LoginModel");
            $this->LoginModel = new LoginModel;
            if(!isset($_SESSION["id"]))
            {
                header('Location: http://localhost/HRM/login/');
            }
            require_once("./Core/validate.php");
        }
        public function index()
        { 
            
            $this->view('Admin.Employee.index');
           
        }
        public function show()
        { 
            $index = 1;
            if(isset($_POST["index"]))
            {
                $index = $_POST["index"];
            }
            $rs = $this->EmployeeModel->getAll(["*"],[],[($index-1)*5,5]);
            $total = $this->EmployeeModel->getAll();
            echo json_encode(["count"=>count($total), "data"=>$rs]);
        }
        public function add()
        {
            $department = $this->DepartmentModel->getAll();
            $position = $this->PositionModel->getAll();
            $level = $this->LevelModel->getAll();
            $schedule = $this->ScheduleModel->getAll();
            $this->view('Admin.Employee.add',[
                "department"=>$department,
                "position"=>$position,
                "level"=>$level,
                "schedule"=>$schedule
                ]);
            // $this->View('Admin.Employee.detail');
        }
        public function insert()
        {
            $name = $_POST["name"];
            $gender = $_POST["gender"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $status = $_POST["status"];
            $schedule = $_POST["schedule"];
            $position = $_POST["position"];
            $department = $_POST["department"];
            $level = $_POST["level"];
            $avatar = "";
            $err = [];
            if(isset($_FILES["avatar"]))
            {
                $avatar = $_FILES["avatar"];
                if(uploadfile($avatar) == 1)
                {
                    $err[] = "file";
                }
            }
            else
            {
                $avatar = "demo.jpg";
            }

            if($name =="")
            {   
                $err[] = "name";
            }
            if($address =="")
            {   
                $err[] = "address";
            }
            if(option($gender) == 0)
            {   
                $err[]= "gender";
            }
            if(val_phone($phone) == 0)
            {   
                $err[]= "phone";
            }
            if(option($status) == 0)
            {   
                $err[] = "status";
            }
            if(option($level) == 0)
            {   
                $err[] = "level";
            }
            if(option($schedule) == 0)
            {   
                $err[] = "schedule";
            }
            if(option($position) == 0)
            {   
                $err[] = "position";
            }
            if(option($department) == 0)
            {   
                $err[] = "department";
            }

            if(val_mail($email) == 0)
            {
                $err[] = "email";
            }
            if(count($err)>0)
            {
               echo json_encode($err);
            }
            else
            {
                $date = date("Y-m-d");
                $rs = $this->EmployeeModel->insert(
                    ['name','avatar','gender','email','address','phone','status','create_on','id_position','id_department','id_schedule','id_level'],
                    [$name,$avatar["name"],$gender,$email,$address,$phone,$status,$date, $position, $department, $schedule, $level]);
                if($rs == true)
                {
                    if(isset($_FILES["avatar"]))
                    {
                        move_uploaded_file($avatar["tmp_name"],self::Upload . $avatar["name"]);
                        echo 1;
                    }
                    else
                    echo 0;
                }
                else
                echo 2;

            }
            
        }
        public function delete()
        {
            $id = $_POST["id"];
            $type = $_POST["type"];
            $rs = $this->EmployeeModel->update(["status"],[$type,$id],["id_employee"]);
            echo json_encode(($rs));
        }
        public function search()
        {
            $name = $_POST["name"];
            $index = 1;
            if(isset($_POST["index"]))
            {
                $index = $_POST["index"];
            }
            $total = ($this->EmployeeModel->search($name));
            $rs = $this->EmployeeModel->search($name,[($index-1)*5,5]);
            echo json_encode(["count"=>count($total), "data"=>$rs]);
            
        }
        
        public function checkemail()
        {
            $email = $_POST["email"];
            $rs = $this->EmployeeModel->check($email);
            if(count($rs) > 0)
            {
                echo json_encode("This email has already");
            }
            else
            {
                echo json_encode("");
            }
        }
        public function detail($id)
        {
            $rs = $this->EmployeeModel->findByID($id);
            $department = $this->DepartmentModel->getAll();
            $position = $this->PositionModel->getAll();
            $level = $this->LevelModel->getAll();
            $schedule = $this->ScheduleModel->getAll();
            $this->View("Admin.Employee.detail",["data"=>$rs,
            "department"=>$department,
            "position"=>$position,
            "level"=>$level,
            "schedule"=>$schedule]);
        }
        
        public function update1($id)
        {
            $name = $_POST["name"];
            $gender = $_POST["gender"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $level = $_POST["level"];
            $status= $_POST["status"];
            $err = [];
            if($name =="")
            {   
                $err[] = "name";
            }
            if($address =="")
            {   
                $err[] = "address";
            }
            if(option($gender) == 0)
            {   
                $err[]= "gender";
            }
            if(val_phone($phone) == 0)
            {   
                $err[]= "phone";
            }
            if(option($level) == 0)
            {   
                $err[] = "level";
            }
            if(val_mail($email) == 0)
            {
                $err[] = "email";
            }
            if(option($status) == 0)
            {   
                $err[] = "status";
            }
            if(count($err)>0)
            {
               echo json_encode(false,"22");
            }
            else
            {
                $rs = $this->EmployeeModel->update(['name','gender','email','address','phone','status','id_level'],
                [$name, $gender,$email,$address,$phone,$status, $level, $id],["id_employee"]);
                echo json_encode($rs);
            }
        }
        public function update2($id)
        {
            $schedule = $_POST["schedule"];
            $position = $_POST["position"];
            $department = $_POST["department"];
            $err = [];
            if(option($schedule) == 0)
            {   
                $err[] = "schedule";
            }
            if(option($position) == 0)
            {   
                $err[] = "position";
            }
            if(option($department) == 0)
            {   
                $err[] = "department";
            }
            if(count($err)>0)
            {
               echo json_encode(false);
            }
            else
            {
                $rs = $this->EmployeeModel->update(['id_department','id_position','id_schedule'],
                [$department, $position,$schedule,$id],["id_employee"]);
                echo json_encode($rs);
            }
        }
        public function find_sheet($id)
        {
            $rs = $this->EmployeeModel->find_sheet($id);
            return $rs;
        }
    }
?>