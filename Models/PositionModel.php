<?php
    class PositionModel extends BaseModel{
        const TABLE = "position";
        public function getAll($select=['*'],$orderby = [], $limit = [])
        {
            return $this->All(PositionModel::TABLE, $select,$orderby, $limit);
        }
        public function findByID($id)
        {
            $sql = "SELECT* FROM ".self::TABLE." WHERE id_position = ?";
            return (parent::_query($sql,[$id]));
        }
        public function insert($column = [], $data = [], $condition = [])
        {
            return $this->insertdb(PositionModel::TABLE,$column, $data, $condition);
        }
        public function update($column = [], $data = [], $condition = [])
        {
            return $this->updatedb(PositionModel::TABLE,$column, $data, $condition);
        }
        public function delete($data = [], $condition = [])
        {
            return $this->deletedb(PositionModel::TABLE, $data, $condition);
        }
    }
?>