<?php
require '../core/ACConnect.php';

(!empty($_POST['desctop'])) ? $sDesctop = $_POST['desctop'] : $sDesctop = '';
(!empty($_POST['laptop'])) ? $sLaptop = $_POST['laptop'] : $sLaptop = '';
(!empty($_POST['mobile'])) ? $sMobile = $_POST['mobile'] : $sMobile = '';

if (!empty($sDesctop)) {
    ACDatabase::set("UPDATE window SET screen = ? WHERE status = 'Y'", $sDesctop);
}

if (!empty($sLaptop)) {
    ACDatabase::set("UPDATE `window` SET `screen` = ? WHERE `status` = 'Y'", $sLaptop);
}

if (!empty($sMobile)) {
    ACDatabase::set("UPDATE `window` SET `screen` = ? WHERE `status` = 'Y'", $sMobile);
}

$arQuery = ACDatabase::getAll('SELECT status, screen FROM window');
header('Content-Type: application/json');

echo json_encode($arQuery);