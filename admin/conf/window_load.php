<?php
require '../core/ACConnect.php';

$arQuery = ACDatabase::getAll('SELECT status FROM window');
header('Content-Type: application/json');

echo json_encode($arQuery);