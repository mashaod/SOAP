<?php

include('lib/Cbr.php');

$Cbr = new Cbr();

$unix = time();
$xml = $Cbr->getRate('USD');


var_dump($xml);
