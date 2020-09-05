<?php
require '../core/ACConnect.php';

$arQuery = ACDatabase::getAll('SELECT * FROM message WHERE hide=1 ORDER BY id DESC');
header('Content-Type: application/json');

echo json_encode($arQuery);