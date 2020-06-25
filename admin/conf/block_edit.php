<?php
if (isset($_REQUEST)) {
    $sValue = $_REQUEST['value'];
    $nId = $_REQUEST['id'];

    require '../core/ACConnect.php';
    $query = ACDatabase::set("UPDATE blocks SET value = ? WHERE id = ?", array($sValue, $nId));
}
