<?php
    class BaseModel extends DB{
        protected $conn;
        protected $exc;
        public function __construct()
        { 
            $this->conn = $this->connect();;
        }
        public function All($table, $select=['*'], $orderby = [], $limit = [])
        {
            $limit = implode(',',$limit);
            $select = implode(',',$select);
            $orderby = implode(' ',$orderby);
            if($orderby)
            {
                $sql = "SELECT ". $select . " FROM " . $table ." ORDER BY " . $orderby ;
            }
            else
            {
                $sql = "SELECT ". $select . " FROM " . $table;
            }

            if($limit)
            {
                $sql = $sql . " Limit " .$limit;
            }
            $query = $this->_query($sql);
            return $query;
        }
        public function insertdb($table, $column = [], $data = [], $condition = [])
        {
            if($column)
            {
                $value = [];
                for ($i = 0; $i< count($data); $i++)
                {
                        $value[]="?";
                }
                $value = implode(',',$value);
                $column = implode(',',$column);
                $sql = "INSERT INTO " . $table . " (". $column . ") VALUE (" . $value . ")";
            }
            else
            {
                $value = [];
                for ($i = 0; $i< count($data); $i++)
                {
                        $value[]="?";
                }
                $value = implode(',',$value);
                $sql = "INSERT INTO " . $table . " VALUE ( " . $value . ")" ;
            }
            $query = $this->_query_1($sql,$data);
            return ($query);

        }

        public function updatedb($table, $column = [], $data = [], $condition = [])
        {
            $value = [];
            for ($i = 0; $i< count($column); $i++)
            {
                
                $value[]="$column[$i] = ?";
            }
            $value = implode(',',$value);
            $column = implode(',',$column);
            for ($i = 0; $i< count($condition); $i++)
            {
                
                $condition[$i]="$condition[$i] = ?";
            }
            
            $condition = implode(" AND ",$condition);
            $sql = "UPDATE " . $table .  " SET " . $value . " WHERE  ".$condition;
            $query = $this->_query_1($sql,$data);
            return $query;
        }
        public function deletedb($table, $data = [], $condition = [])
        {
            for ($i = 0; $i< count($condition); $i++)
            {
                
                $condition[$i]="$condition[$i] = ?";
            }
            
            $condition = implode(" AND ",$condition);
            $sql = "DELETE FROM " . $table . " WHERE  ".$condition;
            $query = $this->_query_1($sql,$data);
            return ($query);
        }
        public function _query($sql,$data=[])
        {
            $this->exc = $this->conn->prepare($sql);
            $this->exc->execute($data);
            return  $this->exc->fetchAll(PDO::FETCH_ASSOC);
        }

        public function _query_1($sql,$data=[])
        {
            $rs = false;
            $this->exc = $this->conn->prepare($sql);
            if ($this->exc->execute($data))
            {
                $rs = true;
            }
            return $rs;
        }
    }
?>