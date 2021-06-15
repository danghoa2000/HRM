<?php
    class AccountModel extends BaseModel{
        const TABLE = "admin";
        public function getAll($select=['*'],$orderby = [], $limit = [])
        {
            return $this->All(AccountModel::TABLE, $select,$orderby, $limit);
        }
        public function findByID($id)
        {
            return __METHOD__;
        }
        public function insert($column = [], $data = [], $condition = [])
        {
            return $this->insertdb(AccountModel::TABLE,$column, $data, $condition);
        }
        public function update($column = [], $data = [], $condition = [])
        {
            return $this->updatedb(AccountModel::TABLE,$column, $data, $condition);
        }
        public function delete($data = [], $condition = [])
        {
            return $this->deletedb(AccountModel::TABLE, $data, $condition);
        }
    }
?>