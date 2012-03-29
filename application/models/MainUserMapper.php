<?php
class Application_Model_MainUserMapper
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
          $this->setDbTable('Application_Model_DbTable_MainUsers');
        }
        return $this->_dbTable;
    }
    
    public function save(Application_Model_MainUser $user) {
        $data = $user->toArray();
        $table = $this->getDbTable();

        if (null === ($id = $user->getId())) {
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
        $userData = $this->getDbTable()->find($id)->current()->toArray();
        $user = new Application_Model_MainUser($userData);
        return $user;
    }
    
    public function findByPhone($phone) {
        $table = $this->getDbtable();
        $selection = $table->select()->where('phone = ?', $phone);
        $resultSet = $table->fetchAll($selection);
        $entries = array();
        foreach ($resultSet as $row) {
            $user = new Application_Model_MainUser();
            $res = $row->toArray();
            $user->populate($res);
            $entries[] = $user;
        }
        return $entries;
    }
    
    public function findByEmail($email) {
        $table = $this->getDbtable();
        $selection = $table->select()->where('email = ?', $email);
        $resultSet = $table->fetchAll($selection);
        $entries = array();
        foreach ($resultSet as $row) {
            $user = new Application_Model_MainUser();
            $res = $row->toArray();
            $user->populate($res);
            $entries[] = $user;
        }
        return array_shift(array_values($entries));;
    }
    
    public function emailExists($email) {
        $emails = $this->findByEmail($email);
        $count = count($emails);
        if( $count > 0 ) {
            return True;
        } else {
            return False;
        }
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