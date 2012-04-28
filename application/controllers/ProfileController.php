<?php

class ProfileController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function getForm()
    {
        // create form as above
        $form = new Application_Form_Logout();
        //$form->setAction('/profile/logout');
        return $form;
    }
        
    public function indexAction()
    {
        if (Null == ($currentUser = CurrentUser::get())) {
            $this->_redirect('');
        }
        
        $this->view->currentUser = $currentUser;
        
        $PM = new Application_Model_PatientsMapper();
        $patients = $PM->findByDoctorId($currentUser->getId());
        $this->view->patients = $patients;
        
        $logout = new Application_Form_Logout();
        $logout->setAction('profile/logout');
        $this->view->logout = $logout;
        
        $this->render('index');
        
        // $this->render('userpage');
        // $this->render('instructions');
        
        
        
        
        
        // $this->view->patientForms = array();
        // $PM = new Application_Model_PatientsMapper();
        // $patients = $PM->findByOwnerId($currentUser->getId());
        // foreach($patients as $patient) {
        //     $data = $patient->toArray();
        //     $splitSched = split(" ", $data["sched"]);
        //     unset($data["sched"]);
        //     $formData = array_merge($data, $splitSched);
        //     
        //     $patForm = new Application_Form_Patient();
        //     $patForm->populate($formData);
        //     $this->view->patientForms[] = $patForm;
        //     //echo $patForm;
        // }
        // 
        // $newForm = new Application_Form_NewPatient();
        // $this->view->patientForms[] = $newForm;
        // //echo $newForm;
        // $this->render('patientforms');
        // 
        
        // 
        // if ($this->getRequest()->isPost()) {
        //     $request = $this->getRequest();
        //     $patientData = $request->getParams();
        //     if( $request->getParam("schedule") === "Update") {
        //         $patient = new Application_Model_Patient($patientData);
        //         $PM = new Application_Model_PatientsMapper();
        //         $PM->save($patient);
        //         $this->_redirect('profile');
        //     } elseif ($request->getParam("Patient") === "Add New Patient") {
        //         $patientData['owner_id'] = $currentUser->getId();
        //         $patient = new Application_Model_Patient($patientData);
        //         $PM = new Application_Model_PatientsMapper();
        //         $PM->save($patient);
        //         $this->_redirect('profile');
        //     }
        // }
        
        
    }
    
    protected function mashSchedule($postData) {
        $min = $postData[0];
        $hour = $postData[1];
        $day = $postData[2];
        $month = $postData[3];
        $week = $postData[4];
        $sched = "";
        if ($min == "") {$sched  = $sched . "*";
        } else {$sched  = $sched . $min;}
        $sched  = $sched . " ";
        if ($hour == "") {$sched  = $sched . "*";
        } else {$sched  = $sched . $hour;}
        $sched  = $sched . " ";
        if ($day == "") {$sched  = $sched . "*";
        } else {$sched  = $sched . $day;}
        $sched  = $sched . " ";
        if ($month == "") {$sched  = $sched . "*";
        } else {$sched  = $sched . $month;}
        $sched  = $sched . " ";
        if ($week == "") {$sched  = $sched . "*";
        } else {$sched  = $sched . $week;}
        return $sched;
    }
    
    protected function getCurrentUser() {
        $auth = Zend_Auth::getInstance(); 
        $auth_user = $auth->getIdentity();
        $MUM = new Application_Model_DoctorsMapper();
        $user = $MUM->findByEmail($auth_user);
        return $user;
    }
    
    public function getPatients() {
        $PM = new Application_Model_PatientsMapper();
        $patients = $PM->fetchAll();
        foreach($patients as $patient) {
            $data = $patient->toArray();
            foreach($data as $k => $v) {
                echo $k . " " . $v . "<br />";
            }
            echo "<br />";
        }
    }
    
    
    public function logoutAction() {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('');
    }
    
    public function settingsAction() {
        $this->render('settingspage');
        
        $auth = Zend_Auth::getInstance(); 
        $auth_user = $auth->getIdentity();
        $MUM = new Application_Model_DoctorsMapper();
        $user = $MUM->findByEmail($auth_user);
        
        $settingForm = new Application_Form_Settings();
        $settingForm->populate($user->toArray());
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($settingForm->isValid($formData)) {
                $MUM = new Application_Model_DoctorsMapper();
                $this->addIntoDatabase($user->getId(),$formData, $MUM);
                $this->authUser($formData);
            }
        }
        
        echo $settingForm;
    }
    
    protected function addIntoDatabase($uid, $post, $MUM) {
        $idArray = array( "id" => $uid );
        $fulluser = array_merge($idArray,$post );
        $user = new Application_Model_Doctors($fulluser);
        $MUM->save($user);
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

