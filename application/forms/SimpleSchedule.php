<?php

class Application_Form_SimpleSchedule extends Zend_Form

{
    public function init()
    {
        $this->setMethod('post');
        
        $minutes = $this->createElement('text', '0');
        $minutes->setLabel("Minutes of the Hour");
        
        $hours = $this->createElement('text', '1');
        $hours->setLabel("Hours of the Day");
        
        $days = $this->createElement('text', '2');
        $days->setLabel("Days of the Month");
        
        $months = $this->createElement('text', '3');
        $months->setLabel("Months of the Year");
        
        $daysOfWeek = $this->createElement('text', '4');
        $daysOfWeek->setLabel("Days of the Week");
        
        $this->addElement($minutes)
             ->addElement($hours)
             ->addElement($days)
             ->addElement($months)
             ->addElement($daysOfWeek);
    }

}