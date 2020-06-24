<?php
require $_SERVER['DOCUMENT_ROOT'].'/core/include.php';
$url = ACRouter::getUrl();

require $_SERVER['DOCUMENT_ROOT'].'/error/ACErrors.php';

require $_SERVER['DOCUMENT_ROOT'].'/class/init.php';

//$cat = ACCatalog::addParent("Пацаны с урала");
//print_r($cat);
$sName = "Пацаны с урала";
$sName = filt($sName);
echo $sName;
//($sUrl == '') ? str2url($sName) : $sUrl;
$sUrl = str2url($sName);

$arItems = ACDatabase::add("INSERT INTO `catalog` (`name`, `url`) VALUES (`?`,`?`)", array($sName, $sUrl));

echo $sUrl;