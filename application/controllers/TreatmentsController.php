<?php
class TreatmentsController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function indexAction() {
        /********** VALIDATION STATEMENTS **********/
        if (Null == ($currentUser = CurrentUser::get())) {
            $this->_redirect('');
        }
        
        $PM = new Application_Model_PatientsMapper();
        
        $patientId = $this->getRequest()->getParam(1);
        if (Null == ($patient = $PM->findByPid($patientId))) {
            $this->_redirect('patients');
        }
        
        if ( $patient->getOwnerId() != $currentUser->getId() ) {
            $this->_redirect('profile');
        }
        
        $this->view->currentUser = $currentUser;
        $this->view->patient = $patient;
        /********** END VALIDATION STATEMENTS **********/
        
        
        $SM = new Application_Model_TreatmentMapper();
        $entries = $SM->findByOwnerId($patient->getId());
        if (sizeof($entries) != 0){
            $treatments = $entries;
        } else {
            $treatments = Null;
        }
        
        $this->view->treatments = $treatments;
        $this->render('index');
    }
    
    public function newAction() {
        /********** VALIDATION STATEMENTS **********/
        if (Null == ($currentUser = CurrentUser::get())) {
            $this->_redirect('');
        }
        
        $PM = new Application_Model_PatientsMapper();
        
        $patientId = $this->getRequest()->getParam(1);
        if (Null == ($patient = $PM->findByPid($patientId))) {
            $this->_redirect('patients');
        }
        
        if ( $patient->getOwnerId() != $currentUser->getId() ) {
            $this->_redirect('profile');
        }
        
        $this->view->currentUser = $currentUser;
        $this->view->patient = $patient;
        /********** END VALIDATION STATEMENTS **********/
        
        $this->view->form = new Application_Form_Treatment;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($this->view->form->isValid($formData)) {
                $formData['ownerId'] = $patient->getId();
                if ($formData['startDate'] == Null) {
                    $formData['startDate'] = '1000-01-01';
                }
                if ($formData['endDate'] == Null) {
                    $formData['endDate'] = '9999-12-31';
                }
                
                $newTreatment = new Application_Model_Treatment($formData);
                $TM = new Application_Model_TreatmentMapper();
                $TM->save($newTreatment);
                $this->_redirect('/patients/' . $patient->getId() . '/treatments');
            } else {
                $this->view->form->populate($formData);
            }
        }
        
        $this->render('new');
    }
    
    public function summaryAction() {
        /********** VALIDATION STATEMENTS **********/
        if (Null == ($currentUser = CurrentUser::get())) {
            $this->_redirect('');
        }
        
        $PM = new Application_Model_PatientsMapper();
        
        $patientId = $this->getRequest()->getParam(1);
        if (Null == ($patient = $PM->findByPid($patientId))) {
            $this->_redirect('patients');
        }
        
        if ( $patient->getOwnerId() != $currentUser->getId() ) {
            $this->_redirect('profile');
        }
        
        $TM = new Application_Model_TreatmentMapper();
        
        $treatmentId = $this->getRequest()->getParam(2);
        if (Null == ($treatment = $TM->findByPid($treatmentId))) {
            $this->_redirect('patients/' . $patient->getId() . '/treatments');
        }
        
        if ( $treatment->getOwnerId() != $patient->getId() ) {
            $this->_redirect('patients/' . $patient->getId() . '/treatments');
        }
        
        $this->view->currentUser = $currentUser;
        $this->view->patient = $patient;
        $this->view->treatment = $treatment;
        /********** END VALIDATION STATEMENTS **********/
        
        $this->render('summary');
        
    }
    
    public function editAction() {
        /********** VALIDATION STATEMENTS **********/
        if (Null == ($currentUser = CurrentUser::get())) {
            $this->_redirect('');
        }
        
        $PM = new Application_Model_PatientsMapper();
        
        $patientId = $this->getRequest()->getParam(1);
        if (Null == ($patient = $PM->findByPid($patientId))) {
            $this->_redirect('patients');
        }
        
        if ( $patient->getOwnerId() != $currentUser->getId() ) {
            $this->_redirect('profile');
        }
        
        $TM = new Application_Model_TreatmentMapper();
        
        $treatmentId = $this->getRequest()->getParam(2);
        if (Null == ($treatment = $TM->findByPid($treatmentId))) {
            $this->_redirect('patients/' . $patient->getId() . '/treatments');
        }
        
        if ( $treatment->getOwnerId() != $patient->getId() ) {
            $this->_redirect('patients/' . $patient->getId() . '/treatments');
        }
        
        $this->view->currentUser = $currentUser;
        $this->view->patient = $patient;
        $this->view->treatment = $treatment;
        /********** END VALIDATION STATEMENTS **********/
        
        $this->view->form = new Application_Form_Treatment;
        $this->view->form->populate($treatment->toArray());
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($this->view->form->isValid($formData)) {
                $formData['id'] = $treatment->getId();
                $formData['ownerId'] = $patient->getId();
                if ($formData['startDate'] == Null) {
                    $formData['startDate'] = '1000-01-01';
                }
                if ($formData['endDate'] == Null) {
                    $formData['endDate'] = '9999-12-31';
                }
                
                $newTreatment = new Application_Model_Treatment($formData);
                $TM = new Application_Model_TreatmentMapper();
                $TM->save($newTreatment);
                $this->_redirect('/patients/' . $patient->getId() . '/treatments/' . $treatment->getId());
            } else {
                $this->view->form->populate($formData);
            }
        }
        
        $this->render('edit');
    }
}