<?php
class Application_Form_SignUp extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        // Create and configure username element:
        $email = $this->createElement('text', 'email');
        $email->addValidator(new Zend_Validate_EmailAddress())
              ->setRequired(true)
              ->addErrorMessage("Not a valid email.")
              ->setLabel("* Email");
        
        $firstName = $this->createElement('text', 'firstName');
        $firstName->setLabel("First Name");
        
        $lastName = $this->createElement('text', 'lastName');
        $lastName->setLabel("Last Name");
        
        $phone = $this->createElement('text', 'phone');
        $phone->setLabel("* Phone Number")
              ->setRequired(true);
        
        // Create and configure password elements:
        $frmPassword1 = new Zend_Form_Element_Password('password');
        $frmPassword1->setLabel('* Password')
             ->addValidator('StringLength', false, array(8))
             ->setRequired(true)
             ->addErrorMessage("Not a valid password.")
             ->addValidator(new Zend_Validate_NotEmpty());

        $frmPassword2=new Zend_Form_Element_Password('confirm_password');
        $frmPassword2->setLabel('* Confirm Password')
             ->addValidator('StringLength', false, array(8))
             ->setRequired(true)
             ->addErrorMessage("Passwords do not match.")
             ->addValidator(new Zend_Validate_Identical('password'));

        // Add elements to form:
        $this->addElement($email)
             ->addElement($firstName)
             ->addElement($lastName)
             ->addElement($phone)
             ->addElement($frmPassword1)
             ->addElement($frmPassword2)
             // use addElement() as a factory to create 'Login' button:
             ->addElement('submit', 'Sign Up', array('label' => 'Sign Up'));
 
        // // And finally add some CSRF protection
        // $this->addElement('hash', 'csrf', array(
        //     'ignore' => true,
        // ));
    }
}