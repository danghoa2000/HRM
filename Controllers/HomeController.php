<?php
    class HomeController extends controller
    {
        public $EmployeeModel;
        public $LoginModel;
        public $AttendanceModel;
        public $LeavesModel;
        function __construct()
        {
            $this->loadModel("EmployeeModel");
            $this->EmployeeModel = new EmployeeModel;
            $this->loadModel("LoginModel");
            $this->LoginModel = new LoginModel;
            $this->loadModel("AttendanceModel");
            $this->AttendanceModel = new AttendanceModel;
            $this->loadModel("LeavesModel");
            $this->LeavesModel = new LeavesModel;
            if(!isset($_SESSION["id"]))
            {
                header('Location: http://localhost/HRM/login/');
            }
        }
        public function index()
        { 
            $rs = $this->EmployeeModel->getAll();   
            $this->view('Admin.Home.index',["list"=>$rs]);
        }
        public function show()
        {
            echo __METHOD__;
        }
        public function load_att($id)
        {
            $list_att = $this->AttendanceModel->getbyID($id);
            return $list_att;
        }
        public function load_event()
        {
            $id = $_POST["id"];
            $list_att = $this->load_att($id);
            if($list_att!= [])
            {
                foreach($list_att as $index)
                {
                    if($index["status"] == 1)
                    {
                        $color = "#ffc107";
                    }
                    else
                    {
                        $color = "#007bff";
                    }
                    $data[] = [
                    "title" => "Time In: " . $index["time_in"] . "<br> Time Out: " . $index["time_out"],
                    "start" => $index["date"],
                    "allday" => "true",
                    "backgroundColor" => $color,
                    "borderColor" => $color,
                    ];
                }
            }
            $list_dayoff = $this->LeavesModel->findByID($id);
            foreach($list_dayoff as $index)
            {
                $index["date_finish"]  = date('Y-m-d', strtotime($index["date_finish"].' + 1 days'));
                $data[]= [
                    "title"=>$index["info"],
                    "display"=>"background",
                    "start" => $index["date_start"],
                    "end" => $index["date_finish"],
                    "allday" => "true",
                    'backgroundColor'=>'red',
                    "borderColor" => "red",
                    ];
            }
            echo json_encode($data);
        }
    }
?>