<?php
require '../core/ACConnect.php';

$arQuery = ACDatabase::getAll('SELECT * FROM blocks');
header('Content-Type: application/json');

echo json_encode($arQuery);