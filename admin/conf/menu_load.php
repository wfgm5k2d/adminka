<?php
include('conf.php');

$sql = 'SELECT * FROM menu WHERE parent = 0';
$result = mysqli_query($link, $sql);

$arr = array();
// Перебор результата
$k = 0;
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $arr[$k]['id'] = $record['id'];
    $arr[$k]['name'] = $record['name'];
    $arr[$k]['url'] = $record['url'];
    $arr[$k]['parent'] = $record['parent'];
    $k++;
}
header('Content-Type: application/json');
echo json_encode($arr);
?>