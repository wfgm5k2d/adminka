<?php
require "config.php";
// Составляем запрос
$sql = 'SELECT * FROM options';
$result = mysqli_query($GLOBALS['mysqli'], $sql);

// Перебор результата
$k = 0;
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $OPTIONS[$k]=$record;
}

foreach ($OPTIONS as $opt)
{
    $GLOBALS['title'] =  $opt['title'];
    $GLOBALS['og_title'] =  $opt['og_title'];
    $GLOBALS['description'] =  $opt['description'];
    $GLOBALS['og_description'] =  $opt['og_description'];
    $GLOBALS['keywords'] =  $opt['keywords'];
    $GLOBALS['site_name'] =  $opt['site_name'];
}