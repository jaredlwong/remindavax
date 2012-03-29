// Add elements to form:


$repeats = $this->createElement('select','repeats');//, array('onChange' => 'Javascript: repeatsChange();')
$repeats ->setLabel('Repeats:')
       ->addMultiOptions(array('Daily','Weekly','Monthly'));// ,'Yearly'

$range = range(1,30);

$repeatsEvery = new Zend_Form_Element_Select('repeatsEvery');
$repeatsEvery ->setLabel('Repeats Every:')
            ->addMultiOptions($range);

$startDate = $this->createElement('text', 'startDate');
$startDate->addValidator( new Zend_Validate_Date() )
        ->setLabel("Start Date - format as yyyy-mm-dd");

$endDate = $this->createElement('text', 'endDate');
$endDate->addValidator( new Zend_Validate_Date() )
      ->setLabel("End Date - format as yyyy-mm-dd");

$this->addElement($repeats)
    ->addElement($repeatsEvery)
    //->addElement($repeatOn)
    ->addElement($startDate)
    ->addElement($endDate)