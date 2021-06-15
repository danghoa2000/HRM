<?php
    class ScheduleModel extends BaseModel{
        const TABLE = "schedules";
        public function getAll($select=['*'],$orderby = [], $limit = [])
        {
            return $this->All(ScheduleModel::TABLE, $select,$orderby, $limit);
        }
        public function findByID($id)
        {
            return __METHOD__;
        }
        public function insert($column = [], $data = [], $condition = [])
        {
            return $this->insertdb(ScheduleModel::TABLE,$column, $data, $condition);
        }
        public function update($column = [], $data = [], $condition = [])
        {
            return $this->updatedb(ScheduleModel::TABLE,$column, $data, $condition);
        }
        public function delete($data = [], $condition = [])
        {
            return $this->deletedb(ScheduleModel::TABLE, $data, $condition);
        }
    }
?>