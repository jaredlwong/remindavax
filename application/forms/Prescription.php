<?php

class Application_Form_Prescription extends Zend_Form
{
    public function init()
    {
        // config form
        $this   ->setMethod('post');
        
        // create elements
        $begin      = new Zend_Dojo_Form_Element_DateTextBox('begin');
        $end        = new Zend_Dojo_Form_Element_DateTextBox('end');
        $dom      = new Zend_Form_Element_Text('dom');
        $mon   = new Zend_Form_Element_Text('mon');
        $dow   = new Zend_Form_Element_Text('dow');
        
        $submit     = new Zend_Form_Element_Button('submit');
        
        $dateValidator = new Zend_Validate_Date();
        $dateValidator->isValid('mm/dd/yyyy');

        $begin  -> setLabel('Start Date:')
                -> addValidator( $dateValidator );

        $end    -> setLabel('End Date:')
                -> addValidator( $dateValidator );
        
        $dom        ->setLabel('Days of Month:')
                    ->setAttrib('placeholder','* for any, or seperate values with ,')
                    ->setRequired(true);

        $mon        ->setLabel('Months:')
                    ->setAttrib('placeholder','* for any, or seperate values with ,')
                    ->setRequired(true);
                    
        $dow        ->setLabel('Days of the Week:')
                    ->setAttrib('placeholder','* for any, or seperate values with ,')
                    ->setRequired(true);

        // $repeatPeriod = $this->createElement('select','repeatPeriod');
        // $repeatPeriod -> setLabel('Repeat:')
        // -> addMultiOptions(array('Daily','Weekly','Monthly','Yearly'))
        // -> setRequired(true);
        // 
        // $range = array(
        //          1 => 1, 2 => 2, 3 => 3, 4 => 4, 
        //          5 => 5, 6 => 6, 7 => 7, 8 => 8, 
        //          9 => 9, 10 => 10, 11 => 11, 12 => 12, 
        //          13 => 13, 14 => 14, 15 => 15, 16 => 16, 
        //          17 => 17, 18 => 18, 19 => 19, 20 => 20, 
        //          21 => 21, 22 => 22, 23 => 23, 24 => 24, 
        //          25 => 25, 26 => 26, 27 => 27, 28 => 28, 
        //          29 => 29, 30 => 30, 31 => 31,
        //          );
        // $repeatInterval = $this->createElement('select','repeatInterval');
        // $repeatInterval -> setLabel('Every how many (Days, Weeks, Months, Years) will this patient be taking their medication?')
        //                 -> addMultiOptions($range)
        //                 -> setValue(1)
        //                 -> setRequired(true);
        
        $typearray = array(
                 1 => 'Tuberculosis', 2 => 'HIV', 3 => 'Hypertension', 
                 4 => 'Hospital Discharge', 5 => 'Cancer'
                 );
        $xDrug = new Zend_Form_Element_Select('xDrug');
        $xDrug  -> setLabel('Type of treatment:')
                -> addMultiOptions($typearray)
                -> setValue(1)
                -> setRequired(true);
        
        $this   ->addElement($begin)
                ->addElement($end)
                // ->addElement($repeatPeriod)
                // ->addElement($repeatInterval)
                ->addElement($dom)
                ->addElement($mon)
                ->addElement($dow)
                ->addElement($xDrug);
        
        $this->addElement('submit', 'submit', array('label' => 'Submit'));
    }

}