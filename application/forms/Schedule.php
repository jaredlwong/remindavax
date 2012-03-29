<?php

class Application_Form_Schedule extends Zend_Form

{
    public function init()
    {
        $this->setMethod('post');
        
        $dateValidator = new Zend_Validate_Date();
        $dateValidator->isValid('mm/dd/yyyy');

        $startDate = new Zend_Dojo_Form_Element_DateTextBox('startDate');
        $startDate -> setLabel('Start Date:')
                   -> addValidator( $dateValidator );

        $endDate = new Zend_Dojo_Form_Element_DateTextBox('endDate');
        $endDate -> setLabel('End Date:')
                 -> addValidator( $dateValidator );

        $repeatPeriod = $this->createElement('select','repeatPeriod');
        $repeatPeriod -> setLabel('Repeat:')
        -> addMultiOptions(array('Daily','Weekly','Monthly','Yearly'))
        -> setRequired(true);

        $range = array(
                 1 => 1, 2 => 2, 3 => 3, 4 => 4, 
                 5 => 5, 6 => 6, 7 => 7, 8 => 8, 
                 9 => 9, 10 => 10, 11 => 11, 12 => 12, 
                 13 => 13, 14 => 14, 15 => 15, 16 => 16, 
                 17 => 17, 18 => 18, 19 => 19, 20 => 20, 
                 21 => 21, 22 => 22, 23 => 23, 24 => 24, 
                 25 => 25, 26 => 26, 27 => 27, 28 => 28, 
                 29 => 29, 30 => 30, 31 => 31,
                 );
        $repeatInterval = $this->createElement('select','repeatInterval');
        $repeatInterval -> setLabel('Every how many (Days, Weeks, Months, Years) will this patient be taking their medication?')
                        -> addMultiOptions($range)
                        -> setValue(1)
                        -> setRequired(true);

        $timeslots = array(
                    '00:00' => '12:00 AM','00:30' => '12:30 AM',
                    '1:00' => '1:00 AM','1:30' => '1:30 AM',
                    '2:00' => '2:00 AM','2:30' => '2:30 AM',
                    '3:00' => '3:00 AM','3:30' => '3:30 AM',
                    '4:00' => '4:00 AM','4:30' => '4:30 AM',
                    '5:00' => '5:00 AM','5:30' => '5:30 AM',
                    '6:00' => '6:00 AM','6:30' => '6:30 AM',
                    '7:00' => '7:00 AM','7:30' => '7:30 AM',
                    '8:00' => '8:00 AM','8:30' => '8:30 AM',
                    '9:00' => '9:00 AM','9:30' => '9:30 AM',
                    '10:00' => '10:00 AM','10:30' => '10:30 AM',
                    '11:00' => '11:00 AM','11:30' => '11:30 AM',
                    '12:00' => '12:00 PM','12:30' => '12:30 PM',
                    '13:00' => '1:00 PM','13:30' => '1:30 PM',
                    '14:00' => '2:00 PM','14:30' => '2:30 PM',
                    '15:00' => '3:00 PM','15:30' => '3:30 PM',
                    '16:00' => '4:00 PM','16:30' => '4:30 PM',
                    '17:00' => '5:00 PM','17:30' => '5:30 PM',
                    '18:00' => '6:00 PM','18:30' => '6:30 PM',
                    '19:00' => '7:00 PM','19:30' => '7:30 PM',
                    '20:00' => '8:00 PM','20:30' => '8:30 PM',
                    '21:00' => '9:00 PM','21:30' => '9:30 PM',
                    '22:00' => '10:00 PM','22:30' => '10:30 PM',
                    '23:00' => '11:00 PM','23:30' => '11:30 PM',
                    );
        
        $preferredTime = $this->createElement('select','preferredTime');
        $preferredTime -> setLabel('Patient\'s preferred time of the day to take their medication:')
                       -> addMultiOptions($timeslots)
                       -> setValue('12:00')
                       -> setRequired(true);

        $preferredInitialTime = $this->createElement('text','preferredInitialTime');
        $preferredInitialTime -> setLabel('Minutes before preferred time that a reminder message is sent:')
                              -> setValue(120)
                              -> addValidator(new Zend_Validate_Between(array('min' => 0, 'max' => 1440)));

        $preferredWarnings = $this->createElement('text','preferredWarnings');
        $preferredWarnings -> setLabel('Maximum number of reminders sent before contacting doctor (includes intitial reminder):')
                           -> setValue(3)
                           -> addValidator(new Zend_Validate_Between(array('min' => 0, 'max' => 10)));

        $preferredWarningDelay = $this->createElement('text','preferredWarningDelay');
        $preferredWarningDelay -> setLabel('Minutes between reminders (No reminder is sent at the preferred medication time):')
                               -> setValue(60)
                               -> addValidator(new Zend_Validate_Between(array('min' => 0, 'max' => 1440)));

        $customMessage = $this->createElement('text','customMessage');
        $customMessage -> setLabel('Custom Message:');
        
        $this   ->addElement($startDate)
                ->addElement($endDate)
                ->addElement($repeatPeriod)
                ->addElement($repeatInterval)
                ->addElement($preferredTime)
                ->addElement($preferredInitialTime)
                ->addElement($preferredWarnings)
                ->addElement($preferredWarningDelay)
                ->addElement($customMessage);
        
        $this->addElement('submit', 'submit', array('label' => 'Submit'));
    }

}