<?php
    class CashAdvanceModel extends BaseModel{
        const TABLE = "cashadvance";
        public function getAll($select=['*'],$orderby = [], $limit = [])
        {
            return $this->All(CashAdvanceModel::TABLE, $select,$orderby, $limit);
        }
        public function findByID($id)
        {
            return __METHOD__;
        }
        public function insert($column = [], $data = [], $condition = [])
        {
            return $this->insertdb(CashAdvanceModel::TABLE,$column, $data, $condition);
        }
        public function update($column = [], $data = [], $condition = [])
        {
            return $this->updatedb(CashAdvanceModel::TABLE,$column, $data, $condition);
        }
        public function delete($data = [], $condition = [])
        {
            return $this->deletedb(CashAdvanceModel::TABLE, $data, $condition);
        }
    }
?>