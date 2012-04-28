<?php
class Application_Form_Patient extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        
        $firstName  = $this->createElement('text', 'firstName');
        $firstName  ->setRequired(true)
                    ->addErrorMessage("First name required.")
                    ->setLabel("* First Name");
        
        $lastName   = $this->createElement('text', 'lastName');
        $lastName   ->setRequired(true)
                    ->addErrorMessage("Last name required.")
                    ->setLabel("* Last Name");
        
        $phone      = $this->createElement('text', 'phone');
        $phone      ->setRequired(true)
                    ->addErrorMessage("Phone number required.")
                    ->setLabel("* Phone Number");
                 
        $email      = $this->createElement('text', 'email');
        $email      ->addValidator(new Zend_Validate_EmailAddress())
                    ->addErrorMessage("Not a valid email.")
                    ->setLabel("* Email")
                    ->setRequired(true);
        
        $timeslots = array(
                    '00:00:00' => '12:00 AM','00:30:00' => '12:30 AM',
                    '01:00:00' => '1:00 AM','01:30:00' => '1:30 AM',
                    '02:00:00' => '2:00 AM','02:30:00' => '2:30 AM',
                    '03:00:00' => '3:00 AM','03:30:00' => '3:30 AM',
                    '04:00:00' => '4:00 AM','04:30:00' => '4:30 AM',
                    '05:00:00' => '5:00 AM','05:30:00' => '5:30 AM',
                    '06:00:00' => '6:00 AM','06:30:00' => '6:30 AM',
                    '07:00:00' => '7:00 AM','07:30:00' => '7:30 AM',
                    '08:00:00' => '8:00 AM','08:30:00' => '8:30 AM',
                    '09:00:00' => '9:00 AM','09:30:00' => '9:30 AM',
                    '10:00:00' => '10:00 AM','10:30:00' => '10:30 AM',
                    '11:00:00' => '11:00 AM','11:30:00' => '11:30 AM',
                    '12:00:00' => '12:00 PM','12:30:00' => '12:30 PM',
                    '13:00:00' => '1:00 PM','13:30:00' => '1:30 PM',
                    '14:00:00' => '2:00 PM','14:30:00' => '2:30 PM',
                    '15:00:00' => '3:00 PM','15:30:00' => '3:30 PM',
                    '16:00:00' => '4:00 PM','16:30:00' => '4:30 PM',
                    '17:00:00' => '5:00 PM','17:30:00' => '5:30 PM',
                    '18:00:00' => '6:00 PM','18:30:00' => '6:30 PM',
                    '19:00:00' => '7:00 PM','19:30:00' => '7:30 PM',
                    '20:00:00' => '8:00 PM','20:30:00' => '8:30 PM',
                    '21:00:00' => '9:00 PM','21:30:00' => '9:30 PM',
                    '22:00:00' => '10:00 PM','22:30:00' => '10:30 PM',
                    '23:00:00' => '11:00 PM','23:30:00' => '11:30 PM',
                    
                    );

        $earlyReminderTime = $this->createElement('select','earlyReminderTime');
        $earlyReminderTime -> setLabel('Patient\'s preferred time of the day to get first reminder:')
                           -> addMultiOptions($timeslots)
                           -> setValue('08:00:00')
                           -> setRequired(true);

        $primaryResponseTime = $this->createElement('select','primaryResponseTime');
        $primaryResponseTime -> setLabel('Patient\'s preferred time of the day to take their medication:')
                             -> addMultiOptions($timeslots)
                             -> setValue('13:00:00')
                             -> setRequired(true);
              
        $this  ->addElement($firstName)
               ->addElement($lastName)
               ->addElement($phone)
               ->addElement($email)
               // ->addElement($earlyReminderTime)
               // ->addElement($primaryResponseTime)
               ->addElement('submit', 'schedule', array('label' => 'Update'));
    }
}