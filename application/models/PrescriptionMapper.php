<?php
class Application_Model_PrescriptionMapper
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
            $this->setDbTable('Application_Model_DbTable_Prescriptions');
        }
        return $this->_dbTable;
    }
    
    public function save(Application_Model_Prescription $prescription) {
        $data = $prescription->toArray();
        $table = $this->getDbTable();

        if (null === ($id = $prescription->getId())) {
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
        $prescriptionRows = $this->getDbTable()->find($id);
        if ($prescriptionRows->count() == 0) {
            return Null;
        }
        $prescriptionData = $prescriptionRows->current()->toArray();
        $prescription = new Application_Model_Prescription($prescriptionData);
        return $prescription;
    }
    
    public function findByPatientId($patientId) {
        $table = $this->getDbtable();
        $selection = $table->select()->where('patientId = ?', $patientId);
        $resultSet = $table->fetchAll($selection);
        $entries = array();
        foreach ($resultSet as $row) {
            $prescription = new Application_Model_Prescription();
            $res = $row->toArray();
            $prescription->populate($res);
            $entries[] = $prescription;
        }
        return $entries;
    }

    public function fetchAll() {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $user = new Application_Model_Prescription();
            $res = $row->toArray();
            $user->populate($res);
            $entries[] = $user;
        }
        return $entries;
    }

}