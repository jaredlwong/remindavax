<?php
class Application_Form_PatientDepracated extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        
        $firstName = $this->createElement('text', 'firstName');
        $firstName->setRequired(true)
                  ->addErrorMessage("First name required.")
                  ->setLabel("First Name");
        
        $lastName = $this->createElement('text', 'lastName');
        $lastName->setRequired(true)
                 ->addErrorMessage("Last name required.")
                 ->setLabel("Last Name");
        
        $phone = $this->createElement('text', 'phone');
        $phone->setRequired(true)
              ->addErrorMessage("Phone number required.")
              ->setLabel("Phone Number");
                      
        $email = $this->createElement('text', 'email');
        $email->addValidator(new Zend_Validate_EmailAddress())
              ->addErrorMessage("Not a valid email.")
              ->setLabel("Email");
        
        $schedule = $this->createElement('text', 'sched');
        $schedule->setRequired(true)
              ->addErrorMessage("Schedule required.")
              ->setLabel("Schedule");
        
        $id = $this->createElement('hidden','id');
        
        
        
        // Add elements to form:
        $this->addElement($id)
             ->addElement($firstName)
             ->addElement($lastName)
             ->addElement($phone)
             ->addElement($email);
             
             
         $repeats = $this->createElement('select','repeats');//, array('onChange' => 'Javascript: repeatsChange();')
         $repeats ->setLabel('Repeats:')
                  ->addMultiOptions(array('Daily','Weekly','Monthly'));//,'Yearly'

         $range = range(1,30);

         $repeatsEvery = new Zend_Form_Element_Select('repeatsEvery');
         $repeatsEvery ->setLabel('Repeats Every:')
                       ->addMultiOptions($range);

         $startDate = $this->createElement('text', 'startDate');
         $startDate->addValidator( new Zend_Validate_Date() )
                   ->setLabel("Start Date - format as yyyy-mm-dd");

         $endDate = $this->createElement('text', 'endDate');
         $endDate->addValidator( new Zend_Validate_Date() )
                 ->setLabel("End Date - format as yyyy-mm-dd");

         $repeatOn = $this->createElement('multiCheckbox', 'repeatOn');
         $repeatOn->setLabel('Repeat On: (If none specified then field is ignored)')
                  ->addMultiOptions(array('S','M','T','W','T','F','S'));

         $this->addElement($repeats)
              ->addElement($repeatsEvery)
              //->addElement($repeatOn)
              ->addElement($startDate)
              ->addElement($endDate)
              ->addElement('submit', 'schedule', array('label' => 'Update'));

    }
}