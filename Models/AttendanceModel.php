<?php
    class AttendanceModel extends BaseModel{
        const TABLE = "attendance";
        public function getAll($select=['*'],$orderby = [], $limit = [])
        {
            return $this->All(AttendanceModel::TABLE, $select,$orderby, $limit);
        }
        public function findByID($id)
        {
            return __METHOD__;
        }
        public function insert($column = [], $data = [], $condition = [])
        {
            return $this->insertdb(AttendanceModel::TABLE,$column, $data, $condition);
        }
        public function update($column = [], $data = [], $condition = [])
        {
            return $this->updatedb(AttendanceModel::TABLE,$column, $data, $condition);
        }
        public function delete($data = [], $condition = [])
        {
            return $this->deletedb(AttendanceModel::TABLE, $data, $condition);
        }
        public function find($id, $date)
        {
            $sql = "SELECT* FROM ".self::TABLE." WHERE id_employee = ? and date = ? order by date DESC";
            return (parent::_query($sql,[$id,$date]));
        }
        public function findhour($id, $date, $year)
        {
            $sql = "SELECT SUM(num_hr) as tong FROM ".self::TABLE." WHERE id_employee = ? and MONTH(date) = ? and YEAR(date) = ?";
            return (parent::_query($sql,[$id,$date,$year]));
        }
        public function getbyID($id)
        {
            $sql = "SELECT* FROM ".self::TABLE." WHERE id_employee = ? order by date DESC";
            return (parent::_query($sql,[$id]));
        }
    }
?>