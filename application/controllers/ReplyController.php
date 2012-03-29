<?php
class ReplyController extends Zend_Controller_Action
{
  public function init()
  {
  }
  
  public function indexAction()
  {
    $responseFile = "responseFile.txt";
    $fh = fopen($responseFile, 'w');
    $from = $_REQUEST['From'];
    $body = $_REQUEST['Body'];
    $stringData = $from . ":::" . $body;
    fwrite($fh, $stringData);
  }
}
