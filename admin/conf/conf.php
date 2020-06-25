<?php

include('cfg.php');

$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

/* проверяем соединение */
if (mysqli_connect_errno()) {
    printf("Нет соединения: %s\n", mysqli_connect_error());
    exit();
}

mysqli_query($link, "SET NAMES 'utf8'");
mysqli_query($link, "SET CHARACTER SET 'utf8'");