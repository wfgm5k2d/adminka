<?php
include('conf.php');
// Составляем запрос
$sql = 'SELECT * FROM message WHERE hide=1';
$result = mysqli_query($link, $sql);

// Перебор результата
$k = 0;
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $MSG[$k]=$record;
    $k++;
}
?>