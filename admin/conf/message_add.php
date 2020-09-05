<?php
if (isset($_REQUEST)) {
    $sMessage  = $_POST['message'];
    $sName     = $_POST['name'];
    $sLastname = $_POST['lastname'];
    $sColor    = $_POST['color'];
    $sSize     = $_POST['size'];
    $sType     = $_POST['type'];
    $sTheme    = $_POST['theme'];
    $sMaterial = $_POST['material'];
    $sEmail    = $_POST['email'];
    $sPhone    = $_POST['phone'];
    $sAdress   = $_POST['adress'];

    require '../core/ACConnect.php';
    $query = ACDatabase::add("INSERT INTO message SET message = ?, name = ?, lastname = ?, color = ?, size = ?, type = ?, theme = ?, material = ?, email = ?, phone = ?, adress = ?", array($sMessage, $sName, $sLastname, $sColor, $sSize, $sType, $sTheme, $sMaterial, $sEmail, $sPhone, $sAdress));
}
