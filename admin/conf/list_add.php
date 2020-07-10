<?php
include 'function.php';

if($_REQUEST['id'])
{
    $sName = $_REQUEST['name'];
    $sUrl = str2url($sName);
    $sParent = $_REQUEST['id'];

    require '../core/ACConnect.php';
    $query = ACDatabase::add("INSERT INTO list SET name = ?, url = ?, parent = ?", array($sName, $sUrl, $sParent));

    if ($query)
        echo 1;
    else
        echo 0;
}
 // && isset($_POST['img'])
else if($_REQUEST['name'])
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
