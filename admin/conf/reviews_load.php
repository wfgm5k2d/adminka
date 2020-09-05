<?php
require '../core/ACConnect.php';

$arQuery = ACDatabase::getAll('SELECT * FROM reviews');
header('Content-Type: application/json');

echo json_encode($arQuery);