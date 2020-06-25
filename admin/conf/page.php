<?php
include('conf.php');
// Составляем запрос
$sql = 'SELECT * FROM page';
$result = mysqli_query($link, $sql);

// Перебор результата
$k = 0;
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $page[$k] = $record;
    $k++;
}

// Родительская лента
$sql1 = 'SELECT * FROM page WHERE parent = 0';
$result1 = mysqli_query($link, $sql1);

// Перебор результата
$k1 = 0;
while($record1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))
{
    $Ppage[$k1] = $record1;
    $k1++;
}

// Детская лента
$sql2 = 'SELECT * FROM page WHERE parent != 0';
$result2 = mysqli_query($link, $sql2);

// Перебор результата
$k2 = 0;
while($record2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
{
    $CHpage[$k2] = $record2;
    $k2++;
}