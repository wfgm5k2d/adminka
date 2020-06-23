<?php
require $_SERVER['DOCUMENT_ROOT'].'/core/include.php';
$url = ACRouter::getUrl();

require $_SERVER['DOCUMENT_ROOT'].'/error/ACErrors.php';

require $_SERVER['DOCUMENT_ROOT'].'/class/init.php';

$obStatistic = new ACStatistic();

$sIp = $obStatistic->getIP();

$obStatistic->readIP($sIp);