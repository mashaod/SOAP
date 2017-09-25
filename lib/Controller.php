<?php

class Controller
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new Model();
        $this->view = new View(TEMPLATE);

        if (isset($_POST['cbrSoap']) && !empty($_POST['cbrSoap']))
        {
            $Cbr = new Cbr();

            $code = $_POST['cbrSoap'];
            $xml = $Cbr->getRate($code);
            
            if(!empty($xml))
            {
                $this->model->addHolder('%CBR-NAME%', $xml->Vname );
                $this->model->addHolder('%CBR-CURS%', $xml->Vcurs);
                $this->model->addHolder('%CBR-CODE%', $xml->VchCode);
                $this->model->addHolder('%TABLE%', ' ');
            }
        }

        $data = $this->model->getArray();
        $this->view->createTemplate($data);
    }
}
