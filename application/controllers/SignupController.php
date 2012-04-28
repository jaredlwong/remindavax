<?php

class SignupController extends Zend_Controller_Action
{
    protected $errors = array();
    
    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function indexAction()
    {
        $this->render('title');
        $this->render('forminfo');
        
        $form = new Application_Form_SignUp();
        $form->setAction('');
        $this->view->signupform = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $MUM = new Application_Model_DoctorsMapper();
                if( $MUM->emailExists($formData["email"]) ) {
                    $this->render('emailerror');
                } else {
                    $this->addIntoDatabase($formData, $MUM);
                    $this->_redirect('');
                }
            } else {
                $this->view->signupform->populate($formData);
            }
        }
        
        $this->render('signupform');
    }
    
    protected function addIntoDatabase($post, $MUM) {
        $user = new Application_Model_Doctors($post);
        if( !$MUM->emailExists($post["email"])) {
            $MUM->save($user);
        }
        $this->authUser($post);
    }
    
    protected function authUser($post) {
        $auth = Zend_Auth::getInstance();
        
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
        $authAdapter->setTableName('Doctors')
                    ->setIdentityColumn('email')
                    ->setCredentialColumn('password');
        
        // Set the input credential values
        $email = $post['email'];
        $password = $post['password'];
        $authAdapter->setIdentity($email);
        $authAdapter->setCredential($password);

        // Perform the authentication query, saving the result
        $result = $auth->authenticate($authAdapter);
    }
}