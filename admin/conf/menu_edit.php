<?php

include 'function.php';

$nId = $_REQUEST['id'];
$sName = $_REQUEST['name'];
$sUrl = str2url($sName);

require '../core/ACConnect.php';
$query = ACDatabase::set("UPDATE menu SET name = ?, url = ? WHERE id = ?", array($sName, $sUrl, $nId));

if ($query)
    echo 1;
else
    echo 0;