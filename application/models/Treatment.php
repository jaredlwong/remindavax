<?php
class Application_Model_Treatment {
    
    protected $_id;
    protected $_startDate;
    protected $_endDate;
    protected $_repeatPeriod;
    protected $_repeatInterval;
    protected $_type;
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
    
    public function getId() 
    {
        return $this->_id;
    }

    public function setId($id) 
    {
        $this->_id = (int) $id;
        return $this;
    }

    public function getStartDate() 
    {
        return $this->_startDate;
    }

    public function setStartDate($startDate) 
    {
        $this->_startDate = (string) $startDate;
        return $this;
    }

    public function getEndDate() 
    {
        return $this->_endDate;
    }

    public function setEndDate($endDate) 
    {
        $this->_endDate = (string) $endDate;
        return $this;
    }

    public function getRepeatPeriod() 
    {
        return $this->_repeatPeriod;
    }

    public function setRepeatPeriod($repeatPeriod) 
    {
        $this->_repeatPeriod = (int) $repeatPeriod;
        return $this;
    }

    public function getRepeatInterval() 
    {
        return $this->_repeatInterval;
    }

    public function setRepeatInterval($repeatInterval) 
    {
        $this->_repeatInterval = (int) $repeatInterval;
        return $this;
    }

    public function getType() 
    {
        return $this->_type;
    }

    public function setType($type) 
    {
        $this->_type = (int) $type;
        return $this;
    }

    public function getOwnerId() 
    {
        return $this->_ownerId;
    }

    public function setOwnerId($ownerId) 
    {
        $this->_ownerId = (int) $ownerId;
        return $this;
    }

    
}