<?php

require('core.php');
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_errno) {
    die('Ошибка соединения: ' . $mysqli->connect_errno);
}

mysqli_query($mysqli, "SET NAMES 'utf8'");
mysqli_query($mysqli, "SET CHARACTER SET 'utf8'");

return $GLOBALS['mysqli'] = $mysqli;