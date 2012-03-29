<?php

class MainUserTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    
    public function testEmailExists() {
        // $MUM = new Application_Model_MainUserMapper();
        // if( $MUM->emailExists("amphibiousahi@gmail.com") ) {
        //     echo "something";
        // } else {
        //     echo "else";
        // }
    }
}