<?php
class Application_Form_Logout extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post')
             ->addElement('submit', 'logout', array('label' => 'Logout'));
    }
}