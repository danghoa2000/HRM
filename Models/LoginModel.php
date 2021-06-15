<?php
    class LoginModel extends BaseModel{
        const TABLE = "admin";
        public function getAll($select=['*'],$orderby = [], $limit = [])
        {
            return $this->All(LoginModel::TABLE, $select,$orderby, $limit);
        }
        public function signin($username, $password)
        {
           $sql ="SELECT* FROM ".self::TABLE." where user =? and pass =?";
           $rs = $this->conn->prepare($sql);
           $rs->execute([$username, $password]);
           return $rs->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>