<?php
require '../core/ACConnect.php';

$sId = $_REQUEST['id'];
$arLists = ACDatabase::getAll('SELECT * FROM list WHERE parent = ?', $sId);
header('Content-Type: application/json');

echo json_encode($arLists);