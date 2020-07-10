<?php
include('conf.php');

$sql = 'SELECT * FROM message WHERE hide=1 ORDER BY id DESC';
$result = mysqli_query($link, $sql);

$arr = array();
// Перебор результата
$k = 0;
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $arr[$k]['id'] = $record['id'];
    $arr[$k]['message'] = $record['message'];
    $arr[$k]['name'] = $record['name'];
    $arr[$k]['lastname'] = $record['lastname'];
    $arr[$k]['color'] = $record['color'];
    $arr[$k]['size'] = $record['size'];
    $arr[$k]['type'] = $record['type'];
    $arr[$k]['theme'] = $record['theme'];
    $arr[$k]['material'] = $record['material'];
    $arr[$k]['email'] = $record['email'];
    $arr[$k]['phone'] = $record['phone'];
    $arr[$k]['adress'] = $record['adress'];
    $k++;
}
header('Content-Type: application/json');
echo json_encode($arr);
?>