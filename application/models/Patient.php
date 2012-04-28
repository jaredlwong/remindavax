<?php
class Application_Model_Patient {
    protected $_id;
    protected $_doctorId;
    protected $_firstName;
    protected $_lastName;
    protected $_phone;
    protected $_email;
    protected $_age;
    protected $_gender;

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
    
    // Doctor Id
    public function getDoctorId() 
    {
        return $this->_doctorId;
    }
    
    public function setDoctorId($doctorId) {
        $this->_doctorId = (int) $doctorId;
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
    public function getAge()
    {
        return $this->_age;
    }
    public function setAge($age)
    {
        $this->_age = (int) $age;
        return $this;
    }
    
    // Set the Owner ID
    public function getGender()
    {
        return $this->_gender;
    }
    public function setGender($gender)
    {
        $this->_gender = (int) $gender;
        return $this;
    }
}