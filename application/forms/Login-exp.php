<?php
class Application_Form_Login extends EasyBib_Form
{
    /**
     * This class defines a simple login form for the Remindavax application.
     * It has two fields, one for a user's Email and and another for their
     * password.
     *
     * @author Jared Wong
     * @version 1.0
     * @package default
     **/
    
    public function init() {
        $this->setMethod('post');
        
        
        // create elements
        $email      = new Zend_Form_Element_Text('email');
        $password   = new Zend_Form_Element_Text('password');
        $submit     = new Zend_Form_Element_Button('submit');
        
        // config elements
        $email      ->setLabel('Email:')
                    ->setAttrib('placeholder','Email')
                    ->setRequired(true)
                    ->addValidator('emailAddress');
        
        $password   ->setLabel('Password:')
                    ->setAttrib('placeholder','Password')
                    ->setRequired(true)
                    ->addValidator('emailAddress');
        
        $submit     ->setLabel('Login')
                    ->setAttrib('type', 'submit');

        // add elements
        $this->addElements(array(
            $email, $password, $submit
        ));
        
        // add display group
        // $this->addDisplayGroup(
        //     array('email','password','submit'),
        //     'users'
        // );
        
        EasyBib_Form_Decorator::setFormDecorator(
            $this, 
            EasyBib_Form_Decorator::BOOTSTRAP, 
            'submit');

    }
}