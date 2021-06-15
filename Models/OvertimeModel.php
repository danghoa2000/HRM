<?php
    class OvertimeModel extends BaseModel{
        const TABLE = "overtime";
        public function getAll($select=['*'],$orderby = [], $limit = [])
        {
            return $this->All(OvertimeModel::TABLE, $select,$orderby, $limit);
        }
        public function findByID($id, $date, $year)
        {
            $sql = "SELECT* FROM ".self::TABLE." WHERE id_employee = ? and MONTH(date_start) = ? and YEAR(date_start) = ?";
            return (parent::_query($sql,[$id,$date,$year]));
        }
        public function insert($column = [], $data = [], $condition = [])
        {
            return $this->insertdb(OvertimeModel::TABLE,$column, $data, $condition);
        }
        public function update($column = [], $data = [], $condition = [])
        {
            return $this->updatedb(OvertimeModel::TABLE,$column, $data, $condition);
        }
        public function delete($data = [], $condition = [])
        {
            return $this->deletedb(OvertimeModel::TABLE, $data, $condition);
        }
        
    }
?>