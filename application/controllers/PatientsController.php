<?php

class PatientsController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
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
        
        $this->render('index');
    }
    
    public function newAction()
    {
        if (Null == ($currentUser = CurrentUser::get())) {
            $this->_redirect('');
        }
        
        $form = new Application_Form_Patient();
        $this->view->patientsignupform = $form;
        
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $PM = new Application_Model_PatientsMapper();
                $formData['doctorId'] = $currentUser->getId();
                $user = new Application_Model_Patient($formData);
                $PM->save($user);
                $this->_redirect('patients');
            } else {
                $this->view->patientsignupform->populate($formData);
            }
        }
        
        $this->render('newpatientform');
    }
    
    public function profileAction() {
        if (Null == ($currentUser = CurrentUser::get())) {
            $this->_redirect('patients');
        }
        
        $patientId = $this->getRequest()->getParam(1);
        $PM = new Application_Model_PatientsMapper();
        if (Null == ($patient = $PM->findByPid($patientId))) {
            $this->_redirect('patients');
        }
        
        if ($currentUser->getId() != $patient->getDoctorId()) {
            $this->_redirect('patients');
        }
        
        $this->view->patient = $patient;
        $this->render('profile');
    }
    
    public function editAction() {
        if (Null == ($currentUser = CurrentUser::get())) {
            $this->_redirect('patients');
        }
        
        $patientId = $this->getRequest()->getParam(1);
        $PM = new Application_Model_PatientsMapper();
        if (Null == ($patient = $PM->findByPid($patientId))) {
            $this->_redirect('patients');
        }
        
        if ($currentUser->getId() != $patient->getDoctorId()) {
            $this->_redirect('patients');
        }
        
        $this->view->currentUser = $currentUser;
        $this->view->patient = $patient;
        
        $form = new Application_Form_Patient();
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $postData = $this->getRequest()->getPost();
            if ($form->isValid($postData)) {
                $PM = new Application_Model_PatientsMapper();
                $postData['doctorId'] = $currentUser->getId();
                $postData['id'] = $patient->getId();
                $patient->populate($postData);
                $PM->save($patient);
                $this->_redirect('patients/' . $patient->getId());
            } else {
                $patient->populate($postData);
            }
        }
        
        $this->view->form->populate($patient->toArray());
        $this->render('edit');
    }
}