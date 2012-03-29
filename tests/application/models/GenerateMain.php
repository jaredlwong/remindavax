<?php

class GenerateMainTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    
    public function testSome()
    {
        $pTable = new Application_Model_PatientsMapper();
        $pAll = $pTable->fetchAll();
        echo "something";
        foreach($pAll as $patient ) {
            foreach($patient->toArray() as $key => $value ){
                echo $key . " " . $value . "\n";
            }
        }
    }


}

