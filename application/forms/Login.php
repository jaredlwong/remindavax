<?php
class Application_Form_Login extends Zend_Form
{
    /**
     * This class defines a simple submit form for the Remindavax application.
     * It has two fields, one for a user's Email and and another for their
     * password.
     *
     * @author Jared Wong
     * @version 1.0
     * @package default
     **/
     
    public function init() {
        
        // reset form
        $this   ->setDisableLoadDefaultDecorators(true)
                ->clearDecorators();
        
        // config form
        $this   ->setMethod('post')
                ->setAttrib('class','form-inline');
        
        // create elements
        $email      = new Zend_Form_Element_Text('email');
        $password   = new Zend_Form_Element_Password('password');
        $submit     = new Zend_Form_Element_Button('submit');
        
        // config elements
        $email      // ->setLabel('Email:')
                    ->setAttrib('placeholder','Email')
                    ->setRequired(true)
                    ->addValidator('emailAddress');
        
        $password   // ->setLabel('Password:')
                    ->setAttrib('placeholder','Password')
                    ->setRequired(true)
                    ->addValidator('emailAddress');
        
        $submit     ->setLabel('Login')
                    ->setAttrib('type', 'submit')
                    ->setAttrib('class', 'btn btn-primary');
                    

        // add elements
        $this   ->addElements(array(
                    $email, $password, $submit
        ));
        
        // add decorators
        $email      ->setDecorators(array('ViewHelper'));
        $password   ->setDecorators(array('ViewHelper'));
        $submit     ->setDecorators(array('ViewHelper'));
        
        $this->setDecorators(array(
                'FormElements',
                'Form',
                // array('FormErrors', array('placement' => 'prepend'))
        ));
    }
}