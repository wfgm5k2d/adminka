<?php
include 'function.php';

if($_REQUEST['parent'] != '')
{
    $sName = $_REQUEST['name'];
    $sUrl = str2url($sName);
    $sParent = $_REQUEST['parent'];

    require '../core/ACConnect.php';
    $query = ACDatabase::add("INSERT INTO list SET name = ?, url = ?, parent = ?", array($sName, $sUrl, $sParent));

    if ($query)
        echo 1;
    else
        echo 0;
}
else
{
    $sName = $_REQUEST['name'];
    $sParent = 0;
    $sUrl = str2url($sName);

    require '../core/ACConnect.php';
    $query = ACDatabase::add("INSERT INTO list SET name = ?, url = ?, parent = ?", array($sName, $sUrl, $sParent));

    if ($query)
        echo 1;
    else
        echo 0;
}
?>
