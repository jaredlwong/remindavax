<?php
class ScheduleController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function indexAction() {
        if (Null === ($currentUser = CurrentUser::get())) {
            $this->_redirect('');
        }
        
        $formQuery = $this->getRequest()->getQuery();
        $PM = new Application_Model_PatientsMapper();
        if (Null === ($patient = $PM->findByPid($formQuery["id"]))) {
            $this->_redirect('profile');
        }
        if ( $patient->getOwnerId() != $currentUser->getId() ) {
            $this->_redirect('profile');
        }
        
        $this->view->patient = $patient;
        
        $SM = new Application_Model_ScheduleMapper();
        $entries = $SM->findByOwnerId($patient->getId());
        if (sizeof($entries) != 0){
            $this->view->schedules = $entries;
        } else {
            $this->view->schedules = Null;
        }
        $this->render('index');
    }
    
    public function newAction() {
        if (Null === ($currentUser = CurrentUser::get())) {
            $this->_redirect('');
        }
        
        $formQuery = $this->getRequest()->getQuery();
        $PM = new Application_Model_PatientsMapper();
        if (Null === ($patient = $PM->findByPid($formQuery["id"]))) {
            $this->_redirect('schedule');
        }
        
        $this->view->schedule = new Application_Form_Schedule;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($this->view->schedule->isValid($formData)) {
                $formData['ownerId'] = $patient->getId();
                $newSchedule = new Application_Model_Schedule($formData);
                $SM = new Application_Model_ScheduleMapper();
                $SM->save($newSchedule);
                $this->_redirect('schedule?id=' . $patient->getId());
            } else {
                $this->view->schedule->populate($formData);
            }
        }

        if ( $patient->getOwnerId() != $currentUser->getId() ) {
            $this->view->error = "You do not have permission to view this schedule.";
            $this->render('error');
        } else {
            $this->view->patient = $patient;
            $this->render('newschedule');
        }
    }
    
    public function editAction()
    {
        if (Null === ($currentUser = CurrentUser::get())) {
            $this->_redirect('');
        }
        $formData = $this->getRequest()->getQuery();
        $PM = new Application_Model_PatientsMapper();
        if (Null === ($patient = $PM->findByPid($formData["id"]))) {
            $this->_redirect('profile');
        }
        if ($patient->getOwnerId() != $currentUser->getId()) {
            $this->_redirect('profile');
        }
        $SM = new Application_Model_ScheduleMapper();
        if (Null === ($schedule = $SM->findByPid($formData["sid"]))) {
            $this->_redirect('schedule?id=' . $patient->getId());
        }
        if ($schedule->getOwnerId() != $patient->getId()) {
            $this->_redirect('schedule?id=' . $patient->getId());
        }
        
        $this->view->patient = $patient;
        $form = new Application_Form_Schedule();

        
        if ($schedule    !== Null and
            $patient     !== Null and
            $currentUser !== Null and
            $currentUser->getId() == $patient->getOwnerId() and
            $patient->getId() == $schedule->getOwnerId()) {
                if ($this->getRequest()->isPost()) {
                    $postData = $this->getRequest()->getPost();
                    $schedule = new Application_Model_Schedule();
                    if ($form->isValid($postData)) {
                        $postData['ownerId'] = $patient->getId();
                        $postData['id'] = $formData['sid'];
                        $schedule->populate($postData);
                        $SM->save($schedule);
                        $this->_redirect('schedule?id=' . $patient->getId());
                    } else {
                        $schedule->populate($postData);
                    }
                }
                
                $form->populate($schedule->toArray());
                $this->view->schedule = $form;
                $this->render('schedule');
        } else {
             $this->_redirect('');
        }   
    }
}