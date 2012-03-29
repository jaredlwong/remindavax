<?php
class Application_Model_TreatmentMapper
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
            $this->setDbTable('Application_Model_DbTable_Treatments');
        }
        return $this->_dbTable;
    }
    
    public function save(Application_Model_Treatment $treatment) {
        $data = $treatment->toArray();
        $table = $this->getDbTable();

        if (null === ($id = $treatment->getId())) {
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
        $treatmentRows = $this->getDbTable()->find($id);
        if ($treatmentRows->count() == 0) {
            return Null;
        }
        $treatmentData = $treatmentRows->current()->toArray();
        $treatment = new Application_Model_Treatment($treatmentData);
        return $treatment;
    }
    
    public function findByOwnerId($ownerId) {
        $table = $this->getDbtable();
        $selection = $table->select()->where('ownerId = ?', $ownerId);
        $resultSet = $table->fetchAll($selection);
        $entries = array();
        foreach ($resultSet as $row) {
            $treatment = new Application_Model_Treatment();
            $res = $row->toArray();
            $treatment->populate($res);
            $entries[] = $treatment;
        }
        return $entries;
    }

    public function fetchAll() {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $user = new Application_Model_Treatment();
            $res = $row->toArray();
            $user->populate($res);
            $entries[] = $user;
        }
        return $entries;
    }

}