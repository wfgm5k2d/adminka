<?php
if (isset($_REQUEST)) {
    $sName = $_REQUEST['name'];
    $sValue = $_REQUEST['value'];
    $sIdent = $_REQUEST['ident'];

    require '../core/ACConnect.php';
    $query = ACDatabase::add("INSERT INTO blocks SET name = ?, value = ?, ident = ?", array($sName, $sValue, $sIdent));
}