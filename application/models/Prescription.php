<?php
class Application_Model_Prescription {
    
    protected $_id;
    protected $_begin;
    protected $_end;
    // protected $_repeatPeriod;
    // protected $_repeatInterval;
    // protected $_type;
    protected $_mon;
    protected $_dom;
    protected $_dow;
    protected $_xDrug;
    // protected $_ownerId;
    protected $_year = '*';
    
    protected $_xSnotB = 0;
    protected $_xSummaryTime = 0;
    protected $_xBeforeMins = 0;
    protected $_xMedTime = 0;
    protected $_xWarningAfterLast = 0;
    protected $_xEndTime = 0;

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

    public function getBegin() 
    {
        return $this->_begin;
    }

    public function setBegin($begin) 
    {
        $this->_begin = (string) $begin;
        return $this;
    }

    public function getEnd() 
    {
        return $this->_end;
    }

    public function setEnd($end) 
    {
        $this->_end = (string) $end;
        return $this;
    }
    
    public function getDom() 
    {
        return $this->_dom;
    }

    public function setDom($dom) 
    {
        $this->_dom = (string) $dom;
        return $this;
    }
    
    public function getMon() 
    {
        return $this->_mon;
    }

    public function setMon($mon) 
    {
        $this->_mon = (string) $mon;
        return $this;
    }
    
    public function getDow() 
    {
        return $this->_dow;
    }

    public function setDow($dow) 
    {
        $this->_dow = (string) $dow;
        return $this;
    }
    
    public function getXDrug() 
    {
        return $this->_xDrug;
    }

    public function setXDrug($xDrug) 
    {
        $this->_xDrug = (int) $xDrug;
        return $this;
    }

    // public function getRepeatPeriod() 
    // {
    //     return $this->_repeatPeriod;
    // }
    // 
    // public function setRepeatPeriod($repeatPeriod) 
    // {
    //     $this->_repeatPeriod = (int) $repeatPeriod;
    //     return $this;
    // }
    // 
    // public function getRepeatInterval() 
    // {
    //     return $this->_repeatInterval;
    // }
    // 
    // public function setRepeatInterval($repeatInterval) 
    // {
    //     $this->_repeatInterval = (int) $repeatInterval;
    //     return $this;
    // }
    // 
    // public function getType() 
    // {
    //     return $this->_type;
    // }
    // 
    // public function setType($type) 
    // {
    //     $this->_type = (int) $type;
    //     return $this;
    // }

    public function getPatientId() 
    {
        return $this->_patientId;
    }

    public function setPatientId($patientId) 
    {
        $this->_patientId = (int) $patientId;
        return $this;
    }

    
}