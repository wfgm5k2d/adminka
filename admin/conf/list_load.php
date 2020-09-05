<?php
require '../core/ACConnect.php';

$arLists = ACDatabase::getAll('SELECT * FROM list WHERE parent = 0');
header('Content-Type: application/json');

echo json_encode($arLists);