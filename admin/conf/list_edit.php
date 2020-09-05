<?php

include 'function.php';

if($_REQUEST['parent'] != '')
{
    $nId = $_REQUEST['id'];
    $sName = $_REQUEST['name'];
    $sDescript = $_REQUEST['descriptionText'];
    $sContent = $_REQUEST['contentText'];
    $sUrl = str2url($sName);

    require '../core/ACConnect.php';
    $query = ACDatabase::set("UPDATE list SET name = ?, url = ?, descript = ?, content = ? WHERE id = ?", array($sName, $sUrl, $sDescript, $sContent, $nId));

    if ($query)
        echo 1;
    else
        echo 0;
}
else
{
    $nId = $_REQUEST['id'];
    $sName = $_REQUEST['name'];
    $sDescript = $_REQUEST['descriptionText'];
    $sContent = $_REQUEST['contentText'];
    $sUrl = str2url($sName);

    require '../core/ACConnect.php';
    $query = ACDatabase::set("UPDATE list SET name = ?, url = ?, descript = ?, content = ? WHERE id = ?", array($sName, $sUrl, $sDescript, $sContent, $nId));

    if ($query)
        echo 1;
    else
        echo 0;
}