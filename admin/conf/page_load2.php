<?php
session_start();
$id = $_SESSION['id'];
include('conf.php');
$sql = "SELECT * FROM page WHERE parent = '$id'";
$result = mysqli_query($link, $sql);

$arr = array();
// Перебор результата
$k = 0;
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $arr[$k]['iddop'] = $record['id'];
    $arr[$k]['namedop'] = $record['name'];
    $arr[$k]['urldop'] = $record['url'];
    $arr[$k]['descriptdop'] = $record['descript'];
    $arr[$k]['contentdop'] = $record['content'];
    $arr[$k]['parentdop'] = $record['parent'];
    $k++;
}
header('Content-Type: application/json');
echo json_encode($arr);
?>