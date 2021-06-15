<?php

    function Isempty($a)
    {
        if(preg_match("/^[A-Za-z]+([\ A-Za-z]+)$/",$a))
        {
            return 1;
        }
        return 0;
    }
    function floatnumber($a)
    {
        if(preg_match("/^[0-9]+\.[0-9]+$/",$a))
        {
            return 1;
        }
        return 0;
    }
    function hour($a)
    {
        if(preg_match("/^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/",$a))
        {
            return 1;
        }
        return 0;
    }

    function def($a)
    {
        if(preg_match("/^\d+$/",$a))
        {
            return 1;
        }
        return 0;
    }

    function option($a)
    {
        if($a == "default")
        {
            return 0;
        }
        return 1;
    }
    function val_phone($a)
    {
        if(preg_match("/^0[1-9]\d{8,9}$/", $a))
        {
            return 1;
        }
        return 0;
    }
    function val_mail($a)
    {
        if(preg_match("/^\w+([\.\-]?\w+)*@\w+(\.\w+){1,3}$/", $a))
        {
            return 1;
        }
        return 0;
    }

    function uploadfile($file)
    {
        $err = [];
        $success= array("jpeg","jpg","png","gif");
        $arr = explode('.', $file["name"]);
        $type = strtolower(end($arr));
        if(in_array($type, $success) == false)
        {
            $err[] = "Invalid type file";
        }
        if(count($err) > 0)
        {
            return 1;
        }
        return 0;
    }
  
?>
    