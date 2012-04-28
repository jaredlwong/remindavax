<?php

class LoginController extends Zend_Controller_Action
{
    public function indexAction()
    {
        // login form is special
        $loginForm = new Application_Form_Loginbig();
        $loginForm->setAction('');
        $this->view->loginForm = $loginForm;
        
        // authenticate or render failed message script
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('profile');
        } else { 
            if ($this->getRequest()->isPost() &&
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
        $authAdapter->setTableName('Doctors')
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

