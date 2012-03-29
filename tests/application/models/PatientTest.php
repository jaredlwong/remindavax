<?php

class PatientCrapTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testDatabaseConnection() 
    {
        $resource = $this->bootstrap->getBootstrap()->getPluginResource('db');
        $db = $resource->getDbAdapter();
        
        $sql = 'SELECT * FROM Patients WHERE owner_id = ?';
        
        $result = $db->fetchAll($sql, 2);
        //$result = $db->fetchAll();
        
        //echo gettype($result);
        // foreach($result as $object) {
        //     foreach($object as $subob) {
        //         if ($subob !== Null) {
        //             echo $subob . "\n";
        //         } else {
        //             echo "Null" . "\n";
        //         }
        //         
        //     }
        //     
        // }
        //echo get_class($db)  . " shit";
    }
    
    public function testDbTableAdapter()
    {
        $PT = new Application_Model_DbTable_Patients();
        $PM = new Application_Model_PatientsMapper();
        // $resultSet = $PT->fetchAll();
        //         foreach ($resultSet as $result) {
        //             $patient = new Application_Model_Patient();
        //             $res = $result->toArray();
        //             // foreach( $res as $r => $value) {
        //             //                 echo $r . "\n";
        //             //             }
        //             $patient->populate($res);
        //             $patient->getAll();
        //             echo "\n";
        //             echo "&&&&&&&&&&&&&&&\n";
        //         }
        $this->assertEquals($PT, $PM->getDbTable());
    }
    
    public function testFetchAll() {
        // $PM = new Application_Model_PatientsMapper();
        // $patients = $PM->fetchAll();
        // foreach( $patients as $patient ) {
        //     $patient->getAll();
        // }
        $patient = new Application_Model_Patient();
        $PM = new Application_Model_PatientsMapper();
        $table = $PM->getDbTable();
        $row = $table->find(1)->current()->toArray();
        $patient->populate($row);
        $res = $patient->toArray();
    }
    
    public function testSave() {
        $PM = new Application_Model_PatientsMapper();
        $patients = $PM->fetchAll();
        // foreach($patients as $patient) {
        //     $data = $patient->toArray();
        //     foreach($data as $k => $v) {
        //         echo $k . " " . $v . "\n";
        //     }
        // }
    }
    
    public function testFindByPid() {
        $PM = new Application_Model_PatientsMapper();
        $patient = $PM->findByPid(2);
        $patData = $patient->toArray();
    }
    
    public function testFindByOwnerId() {
        $PM = new Application_Model_PatientsMapper();
        $patients = $PM->findByOwnerId(1);
        // foreach($patients as $patient) {
        //     $data = $patient->toArray();
        //     foreach($data as $k => $v) {
        //         echo $k . " " . $v . "\n";
        //     }
        // }
    }
    
    public function testFindByPhone() {
        $PM = new Application_Model_PatientsMapper();
        $patients = $PM->findByPhone("4088960767");
        // foreach($patients as $patient) {
        //     $data = $patient->toArray();
        //     foreach($data as $k => $v) {
        //         echo $k . " " . $v . "\n";
        //     }
        // }
    }
    
    public function testSome()
    {
        $fileHandle = fopen('/Users/jaredlwong/Documents/workspace/remindavax/src/data/MainListing.txt', 'w+');
        $result = 
        
        // [* * * * * * *][+14088960767][Jared][Wong][Message]
        $pTable = new Application_Model_PatientsMapper();
        $pAll = $pTable->fetchAll();
        echo "something";
        foreach($pAll as $patient ) {
            $data = $patient->toArray();
            $str = "";
            if ( $data["repeats"] == 0 ) {
                $str .= "[0 0 * * *]";
            } elseif ( $data["repeats"] == 1 ) {
                $str .= "[0 0 0 * *]";
            } elseif ( $data["repeats"] == 2 ) {
                $str .= "[0 0 0 0 *]";
            }
            $str .= "[" . $data["phone"] . "]";
            $str .= "[" . $data["firstName"] . "]";
            $str .= "[" . $data["lastName"] . "]";
            $str .= "[message]";
            fwrite ($fileHandle, $str . "\n");
        }
        
        fclose($fileHandle);
    }

}
?>