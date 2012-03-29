<?php
class LoginoldController extends Zend_Controller_Action
{
    
    
    // snipping indexAction()...
 
    public function getForm()
    {
        // create form as above
        $form = new Application_Form_Login();
        $form->setAction('/login/auth');
        return $form;
    }
        
    public function indexAction()
    {
        $this->view->form = $this->getForm();
        $this->render($form);
    }
    
    public function preDispatch()
    {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            // If the user is logged in, we don't want to show the login form;
            // however, the logout action should still be available
            if ('logout' != $this->getRequest()->getActionName()) {
                $this->_helper->redirector('index', 'profile');
            }
        } else {
            // If they aren't, they can't logout, so that action should 
            // redirect to the login form
            if ('logout' == $this->getRequest()->getActionName()) {
                $this->_helper->redirector('index');
            }
        }
    }
            
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
   
   public function logoutAction()
   {
       Zend_Auth::getInstance()->clearIdentity();
       //$this->_redirect('dev/login/index');
   }
}
