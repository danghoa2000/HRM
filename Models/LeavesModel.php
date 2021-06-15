<?php
    class LeavesModel extends BaseModel{
        const TABLE = "leaves";
        public function getAll($select=['*'],$orderby = [], $limit = [])
        {
            return $this->All(LeavesModel::TABLE, $select,$orderby, $limit);
        }
        public function findByID($id)
        {
            $sql = "SELECT* FROM ".self::TABLE." WHERE id_employee = ?";
            return (parent::_query($sql,[$id]));

        }
        public function insert($column = [], $data = [], $condition = [])
        {
            return $this->insertdb(LeavesModel::TABLE,$column, $data, $condition);
        }
        public function update($column = [], $data = [], $condition = [])
        {
            return $this->updatedb(LeavesModel::TABLE,$column, $data, $condition);
        }
        public function delete($data = [], $condition = [])
        {
            return $this->deletedb(LeavesModel::TABLE, $data, $condition);
        }
    }
?>