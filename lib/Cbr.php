<?php

Class Cbr
{
    protected $cbr;

    public function __construct()
    {
        $this->cbr = new SoapClient('http://www.cbr.ru/DailyInfoWebServ/DailyInfo.asmx?WSDL');
    }

    function getXml($date)
    {
        date_default_timezone_set('Europe/Kiev');
        $dateArray["On_date"] = date("Y-m-d", $date);
        $result = $this->cbr->GetCursOnDateXML($dateArray);
        return $result->GetCursOnDateXMLResult->any;
    }

    function getRate($currencyCode)
    {
        $date = time();
        $xml = simplexml_load_string($this->getXml($date));
        //var_dump($xml->SimpleXMLElement->firstchild);
        $xPath = "/ValuteData/ValuteCursOnDate[VchCode='$currencyCode']";
        $result = $xml->xpath($xPath);
        if (count($result) == 0) return 0;
        return $result[0];//curs;// / $result[0]->Vnom;
    }
}
