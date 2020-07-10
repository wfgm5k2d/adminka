<?php
include('conf.php');
// Составляем запрос
$sql = 'SELECT * FROM list';
$result = mysqli_query($link, $sql);

// Перебор результата
$k = 0;
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $LIST[$k] = $record;
    $k++;
}

// Родительская лента
$sql1 = 'SELECT * FROM list WHERE parent = 0';
$result1 = mysqli_query($link, $sql1);

// Перебор результата
$k1 = 0;
while($record1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))
{
    $PLIST[$k1] = $record1;
    $k1++;
}

// Детская лента
$sql2 = 'SELECT * FROM list WHERE parent != 0';
$result2 = mysqli_query($link, $sql2);

// Перебор результата
$k2 = 0;
while($record2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
{
    $CHLIST[$k2] = $record2;
    $k2++;
}