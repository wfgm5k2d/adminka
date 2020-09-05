<?php
require '../core/ACConnect.php';

$sId = $_REQUEST['id'];
$arMenu = ACDatabase::getAll('SELECT * FROM menu WHERE parent = ?', $sId);
header('Content-Type: application/json');

echo json_encode($arMenu);