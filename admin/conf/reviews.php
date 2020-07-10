<?php
include('conf.php');
// Составляем запрос
$sql = 'SELECT * FROM reviews';
$result = mysqli_query($link, $sql);

// Перебор результата
$k = 0;
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $REVIEWS[$k]=$record;
    $k++;
}
?>