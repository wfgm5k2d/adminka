<?php
require '../core/ACConnect.php';

$arMenu = ACDatabase::getAll('SELECT * FROM menu WHERE parent = 0');
header('Content-Type: application/json');

echo json_encode($arMenu);