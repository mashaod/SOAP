<?php
class Model
{
    private $htmlHolder = array(
        '%TABLE%'=>'hidden',
        '%CBR-NAME%'=>'',
        '%CBR-CURS%'=>'',
        '%CBR-CODE%'=>'',
        '%FOOTBALL-SOAP%'=>''
    );

    public function __construct()
    {
    }

    public function getArray()
    {       
        return $this->htmlHolder;
    }

    public function addHolder($name, $value)
    {
        if(!empty($name) && !empty($value))
        {
            $this->htmlHolder[$name] = $value;
        }   
    }
}
