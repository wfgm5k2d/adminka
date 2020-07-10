<?php
include('conf.php');

$sql = 'SELECT * FROM reviews';
$result = mysqli_query($link, $sql);

$arr = array();
// Перебор результата
$k = 0;
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $arr[$k]['id'] = $record['id'];
    $arr[$k]['name'] = $record['name'];
    $arr[$k]['email'] = $record['email'];
    $arr[$k]['message'] = $record['message'];
    $arr[$k]['answer'] = $record['answer'];
    $arr[$k]['date'] = $record['date'];
    $arr[$k]['hide'] = $record['hide'];
    $k++;
}
header('Content-Type: application/json');
echo json_encode($arr);
?>