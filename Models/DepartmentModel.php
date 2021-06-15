<?php
    class DepartmentModel extends BaseModel{
        const TABLE = "department";
        public function getAll($select=['*'],$orderby = [], $limit = [])
        {
            return $this->All(DepartmentModel::TABLE, $select,$orderby, $limit);
        }
        public function findByID($id)
        {
            return __METHOD__;
        }
        public function insert($column = [], $data = [], $condition = [])
        {
            return $this->insertdb(DepartmentModel::TABLE,$column, $data, $condition);
        }
        public function update($column = [], $data = [], $condition = [])
        {
            return $this->updatedb(DepartmentModel::TABLE,$column, $data, $condition);
        }
    }
?>