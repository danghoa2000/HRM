<?php
   class DB extends PDO{
        const dsn        = "mysql:host=127.0.0.1:3306; dbname=hrmdb; charset=utf8;";
        const username   = "root";
        const password   = "";
        private $conn;

    public function connect()
    {
        $this->conn = new PDO(self::dsn,self::username,self::password);
        $this->conn->exec("SET NAMES UTF8");
        return $this->conn;
    }

}

?>