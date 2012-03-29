<?php

class IndexController extends Zend_Controller_Action
{
    /**
     * $writer = new Zend_Log_Writer_Stream(APPLICATION_PATH . '/../logs/errors.log');
     * $logger = new Zend_Log($writer);
     * $logger->log('bla');
     * @return void
     * @author Jared Wong
     */
    public function indexAction()
    {
        // create login form
        $loginForm = new Application_Form_Login();
        $loginForm->setAction('');
        $this->view->loginForm = $loginForm;
        
        // authenticate or render failed message script
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('profile');
        } else {
            $request = $this->getRequest();
            if ($request->isPost() && 
                $request->getParam('email') != '' &&
                $request->getParam('password') != ''
            ) {
                $result = $this->authenticate();
                if ($result->isValid()) {
                    $this->_redirect('patients');
                } else {
                    $this->render('failed-login');
                }
            }
            $this->render('index');
        }
    }
    
    public function authenticate() 
    {
        $request   = $this->getRequest();
        $auth = Zend_Auth::getInstance();
        
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
        $authAdapter->setTableName('MainUsers')
                    ->setIdentityColumn('email')
                    ->setCredentialColumn('password');
        
        // Set the input credential values
        $email = $request->getParam('email');
        $password = $request->getParam('password');
        
        $authAdapter->setIdentity($email);
        $authAdapter->setCredential($password);
        
        // Perform the authentication query, saving the result
        $result = $auth->authenticate($authAdapter);
        return $result;
    }
}

