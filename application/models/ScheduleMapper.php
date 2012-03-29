<?php
class Application_Model_ScheduleMapper
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Schedules');
        }
        return $this->_dbTable;
    }
    
    public function save(Application_Model_Schedule $schedule) {
        $data = $schedule->toArray();
        $table = $this->getDbTable();
        // foreach( $data as $k => $v ){
        //     if ($v == Null){
        //         unset($data[$k]);
        //     }
        // }

        if (null === ($id = $schedule->getId())) {
            // do this for new data with no pid
            unset($data['id']);
            $table->insert($data);
        } else {
            // otherwise go and update current entry
            $table->update($data, array('id = ?' => $id));
        }
    }

    public function findByPid($id)
    {
        $scheduleRows = $this->getDbTable()->find($id);
        if ($scheduleRows->count() == 0) {
            return Null;
        }
        $scheduleData = $scheduleRows->current()->toArray();
        $schedule = new Application_Model_Schedule($scheduleData);
        return $schedule;
    }
    
    public function findByOwnerId($ownerId) {
        $table = $this->getDbtable();
        $selection = $table->select()->where('ownerId = ?', $ownerId);
        $resultSet = $table->fetchAll($selection);
        $entries = array();
        foreach ($resultSet as $row) {
            $schedule = new Application_Model_Schedule();
            $res = $row->toArray();
            $schedule->populate($res);
            $entries[] = $schedule;
        }
        return $entries;
    }

    public function fetchAll() {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $user = new Application_Model_MainUser();
            $res = $row->toArray();
            $user->populate($res);
            $entries[] = $user;
        }
        return $entries;
    }

}