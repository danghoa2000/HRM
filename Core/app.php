<?php
    class app{
        protected $controller = "HomeController";
        protected $action ="index"; 
        protected $param=[];

        function __construct()
        {
            $arr = $this->geturl();
            if(isset($arr[0]))
            {
                $arr[0] = (($arr[0]).'Controller');
                if (file_exists("./Controllers/".$arr[0].".php")) {
                    $this->controller = $arr[0];
                    unset($arr[0]);
                }
            }

            require_once("./Controllers/".$this->controller.".php");
            $this->controller = new $this->controller;

            if(isset($arr[1])){
                if(method_exists($this->controller, $arr[1]))
                {
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
            $this->param = isset($arr)?array_values($arr):[];
            call_user_func_array([$this->controller, $this->action], $this->param);
        }
        
        function geturl()
        {
            if(isset($_GET["controller"]))
            return explode("/",filter_var(trim($_GET["controller"]))); 
        }
    }
?>