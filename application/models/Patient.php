<?php
class Application_Model_Patient {
    protected $_id;
    protected $_firstName;
    protected $_lastName;
    protected $_phone;
    protected $_email;
    protected $_earlyReminderTime;
    protected $_primaryResponseTime;
    protected $_ownerId;

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->populate($options);
        }
    }
    
    public function populate(array $row) {
        $methods = get_class_methods($this);
        foreach ($row as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                 $this->$method($value);
            }
        }
        return $this;
    }
    
    public function toArray() {
        $vars = get_object_vars($this);
        foreach ($vars as $k => $v) {
           unset ($vars[$k]);
           $new_key =  substr($k,1);
           $vars[$new_key] = $v;
        }
        return $vars;
    }
    
    // ID
    public function getId() 
    {
        return $this->_id;
    }
    
    public function setId($id) {
        $this->_id = (int) $id;
        return $this;
    }
    
    // First Name
    public function getFirstName()
    {
        return $this->_firstName;
    }
    public function setFirstName($firstname)
    {
        $this->_firstName = (string) $firstname;
        return $this;
    }
    
    // Last Name
    public function getLastName()
    {
        return $this->_lastName;
    }
    public function setLastName($lastname)
    {
        $this->_lastName = (string) $lastname;
        return $this;
    }
    
    // Phone
    public function getPhone()
    {
        return $this->_phone;
    }
    public function setPhone($phone)
    {
         $this->_phone = (string) $phone;
         return $this;
    }
    
    // Email
    public function getEmail()
    {
        return $this->_email;
    }
    public function setEmail($email)
    {
        $this->_email = (string) $email;
        return $this;
    }
    
    // Set the Owner ID
    public function getOwnerId()
    {
        return $this->_ownerId;
    }
    public function setOwnerId($ownerid)
    {
        $this->_ownerId = (string) $ownerid;
        return $this;
    }
    
    // early reminder time
    public function getEarlyReminderTime()
    {
        return $this->_earlyReminderTime;
    }
    public function setEarlyReminderTime($earlyReminderTime)
    {
        $this->_earlyReminderTime = (string) $earlyReminderTime;
        return $this;
    }
    
    // primary reponse time
    public function getPrimaryResponseTime()
    {
        return $this->_primaryResponseTime;
    }
    public function setPrimaryResponseTime($primaryResponseTime)
    {
        $this->_primaryResponseTime = (string) $primaryResponseTime;
        return $this;
    }
}