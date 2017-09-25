<?php
class View
{
    private $file;
    public function __construct($template)
    {       
        $this->file = file_get_contents($template);
    }
    public function createTemplate($data)
    {
        foreach($data as $key=>$val)
        {
            $this->file = str_replace($key, $val, $this->file);
        } 
                                                          
        echo $this->file;
    }
}
