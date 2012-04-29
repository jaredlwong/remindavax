<?php
class PrescriptionsController extends Zend_Controller_Action
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
        
        if ( $patient->getDoctorId() != $currentUser->getId() ) {
            $this->_redirect('profile');
        }
        
        $this->view->currentUser = $currentUser;
        $this->view->patient = $patient;
        /********** END VALIDATION STATEMENTS **********/
        
        
        $SM = new Application_Model_PrescriptionMapper();
        $entries = $SM->findByPatientId($patient->getId());
        if (sizeof($entries) != 0){
            $prescriptions = $entries;
        } else {
            $prescriptions = Null;
        }
        
        $this->view->prescriptions = $prescriptions;
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
        
        if ( $patient->getDoctorId() != $currentUser->getId() ) {
            $this->_redirect('profile');
        }
        
        $this->view->currentUser = $currentUser;
        $this->view->patient = $patient;
        /********** END VALIDATION STATEMENTS **********/
        
        $this->view->form = new Application_Form_Prescription;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($this->view->form->isValid($formData)) {
                $formData['patientId'] = $patient->getId();
                if ($formData['start'] == Null) {
                    $formData['start'] = '1000-01-01';
                }
                if ($formData['end'] == Null) {
                    $formData['end'] = '9999-12-31';
                }
                
                
                // $formData['xSnotB'] = 0;
                //                 $formData['xSummaryTime'] = 0;
                //                 $formData['xBeforeMins'] = 0;
                //                 $formData['xMedTime'] = 0;
                //                 $formData['xWarningAfterLast'] = 0;
                //                 $formData['xEndTime'] = 0;
                //                 $formData['xDrug'] = 1;
                
                $newPrescription = new Application_Model_Prescription($formData);
                $TM = new Application_Model_PrescriptionMapper();
                // foreach($newPrescription->toArray() as $k => $v) {
                //     echo $k . " " . $v . "<br />";
                // }
                
                $TM->save($newPrescription);
                $this->_redirect('/patients/' . $patient->getId() . '/prescriptions');
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
        
        $TM = new Application_Model_PrescriptionMapper();
        
        $treatmentId = $this->getRequest()->getParam(2);
        if (Null == ($treatment = $TM->findByPid($treatmentId))) {
            $this->_redirect('patients/' . $patient->getId() . '/prescriptions');
        }
        
        if ( $treatment->getOwnerId() != $patient->getId() ) {
            $this->_redirect('patients/' . $patient->getId() . '/prescriptions');
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
        
        if ( $patient->getDoctorId() != $currentUser->getId() ) {
            $this->_redirect('profile');
        }
        
        $TM = new Application_Model_PrescriptionMapper();
        
        $treatmentId = $this->getRequest()->getParam(2);
        if (Null == ($treatment = $TM->findByPid($treatmentId))) {
            $this->_redirect('patients/' . $patient->getId() . '/prescriptions');
        }
        
        if ( $treatment->getOwnerId() != $patient->getId() ) {
            $this->_redirect('patients/' . $patient->getId() . '/prescriptions');
        }
        
        $this->view->currentUser = $currentUser;
        $this->view->patient = $patient;
        $this->view->treatment = $treatment;
        /********** END VALIDATION STATEMENTS **********/
        
        $this->view->form = new Application_Form_Prescription;
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
                
                $newPrescription = new Application_Model_Prescription($formData);
                $TM = new Application_Model_PrescriptionMapper();
                $TM->save($newPrescription);
                $this->_redirect('/patients/' . $patient->getId() . '/prescriptions/' . $treatment->getId());
            } else {
                $this->view->form->populate($formData);
            }
        }
        
        $this->render('edit');
    }
}