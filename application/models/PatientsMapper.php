<?php
class Application_Model_PatientsMapper
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
          $this->setDbTable('Application_Model_DbTable_Patients');
        }
        return $this->_dbTable;
    }
  
    public function save(Application_Model_Patient $patient) {
        $data = $patient->toArray();
        $table = $this->getDbTable();

        if (null === ($id = $patient->getId())) {
            // do this for new data with no pid
            unset($data['id']);
            $table->insert($data);
        } else {
            unset($data['owner_id']);
            $table->update($data, array('id = ?' => $id));
        }
    }

    public function findByPid($id)
    {
        $patientRows = $this->getDbTable()->find($id);
        if ($patientRows->count() == 0) {
            return Null;
        }
        $patientData = $patientRows->current()->toArray();
        $patient = new Application_Model_Patient($patientData);
        return $patient;
    }
    
    public function findByPhone($phone) {
        $table = $this->getDbtable();
        $selection = $table->select()->where('phone = ?', $phone);
        $resultSet = $table->fetchAll($selection);
        $entries = array();
        foreach ($resultSet as $row) {
            $patient = new Application_Model_Patient();
            $res = $row->toArray();
            $patient->populate($res);
            $entries[] = $patient;
        }
        return $entries;
    }
    
    public function findByDoctorId($doctorId) {
        $table = $this->getDbtable();
        $selection = $table->select()->where('doctorId = ?', $doctorId);
        $resultSet = $table->fetchAll($selection);
        $entries = array();
        foreach ($resultSet as $row) {
            $patient = new Application_Model_Patient();
            $res = $row->toArray();
            $patient->populate($res);
            $entries[] = $patient;
        }
        return $entries;
    }

    public function fetchAll() {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $patient = new Application_Model_Patient();
            $res = $row->toArray();
            $patient->populate($res);
            $entries[] = $patient;
        }
        return $entries;
    }
}