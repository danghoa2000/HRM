<?php
    class EmployeeModel extends BaseModel{
        const TABLE = "employee";
        public function getAll($select=['*'],$orderby = [], $limit = [])
        {
            return $this->All(EmployeeModel::TABLE, $select,$orderby, $limit);
        }
        public function findByID($id)
        {
            $sql = "SELECT * FROM " . self::TABLE . " where id_employee = ?";
            return (parent::_query($sql,[$id]));
        }
        public function insert($column = [], $data = [], $condition = [])
        {
            return $this->insertdb(EmployeeModel::TABLE,$column, $data, $condition);
        }
        public function update($column = [], $data = [], $condition = [])
        {
            return $this->updatedb(EmployeeModel::TABLE,$column, $data, $condition);
        }
        public function search($name, $limit = [])
        {
            $limit = implode(',',$limit);
            $sql = "SELECT * FROM " . self::TABLE . " where name like ?";
            if($limit)
            {
                $sql = $sql . "LIMIT " . $limit;
            }
            return (parent::_query($sql,["%".$name."%"]));
        }
        public function account($email, $id)
        {
            $sql = "SELECT * FROM " . self::TABLE . " where email = ? and id_employee = ?";
            return (parent::_query($sql,[$email, $id]));
        }
        public function check($email, $limit = [])
        {
            $limit = implode(',',$limit);
            $sql = "SELECT email FROM " . self::TABLE . " where email like ?";
            if($limit)
            {
                $sql = $sql . "LIMIT " . $limit;
            }
            return (parent::_query($sql,["%".$email."%"]));
        }
        public function find_sheet($id)
        {
            $sql ="SELECT* FROM " . self::TABLE . "  LEFT JOIN schedules ON schedules.id_schedule = employee.id_schedule WHERE employee.id_employee = ?";
            return (parent::_query($sql,[$id]));
        }

    }
?>