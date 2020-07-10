<?php
include('conf.php');
// Составляем запрос
$sql = 'SELECT * FROM options';
$result = mysqli_query($link, $sql);

// Перебор результата
$k = 0;
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $OPTIONS[$k]=$record;
    $k++;
}