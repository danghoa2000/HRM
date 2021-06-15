<?php
    class LevelModel extends BaseModel{
        const TABLE = "level";
        public function getAll($select=['*'],$orderby = [], $limit = [])
        {
            return $this->All(LevelModel::TABLE, $select,$orderby, $limit);
        }
        public function findByID($id)
        {
            $sql = "SELECT* FROM ".self::TABLE." WHERE id_level = ?";
            return (parent::_query($sql,[$id]));
        }
        public function insert($column = [], $data = [], $condition = [])
        {
            return $this->insertdb(LevelModel::TABLE,$column, $data, $condition);
        }
        public function update($column = [], $data = [], $condition = [])
        {
            return $this->updatedb(LevelModel::TABLE,$column, $data, $condition);
        }
        public function delete($data = [], $condition = [])
        {
            return $this->deletedb(LevelModel::TABLE, $data, $condition);
        }
    }
?>