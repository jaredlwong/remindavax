<?php

class Application_Form_Treatment extends Zend_Form
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
        
        $typearray = array(
                 1 => 'Tuberculosis', 2 => 'HIV', 3 => 'Hypertension', 
                 4 => 'Hospital Discharge', 5 => 'Cancer'
                 );
        $type = $this->createElement('select','type');
        $type -> setLabel('Type of treatment:')
              -> addMultiOptions($typearray)
              -> setValue(1)
              -> setRequired(true);
        
        $this   ->addElement($startDate)
                ->addElement($endDate)
                ->addElement($repeatPeriod)
                ->addElement($repeatInterval)
                ->addElement($type);
        
        $this->addElement('submit', 'submit', array('label' => 'Submit'));
    }

}