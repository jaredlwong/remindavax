<?php
class AuthenticateUser extends Zend_Controller_Action{
    public function authAction() {
        $request   = $this->getRequest();
        $auth = Zend_Auth::getInstance();

        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
        $authAdapter->setTableName('MainUsers')
                  ->setIdentityColumn('email')
                  ->setCredentialColumn('password');

              // Set the input credential values
        $uname = $request->getParam('email');
        $paswd = $request->getParam('password');
        $authAdapter->setIdentity($uname);
        $authAdapter->setCredential($paswd);

        // Perform the authentication query, saving the result
        $result = $auth->authenticate($authAdapter);

        if($result->isValid()){
          $this->_helper->redirector('index', 'profile');
        } else {
            $this->_helper->redirector('index', 'index');
        }
    }
}
