<?php
include('conf.php');

$sql = 'SELECT * FROM item';
$result = mysqli_query($link, $sql);

$arr = array();
// Перебор результата
$k = 0;
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $arr[$k]['id'] = $record['id'];
    $arr[$k]['name'] = $record['name'];
    $arr[$k]['url'] = $record['url'];
    $arr[$k]['size'] = $record['size'];
    $arr[$k]['color'] = $record['color'];
    $arr[$k]['descript'] = $record['descript'];
    $arr[$k]['content'] = $record['content'];
    $arr[$k]['price'] = $record['price'];
    $arr[$k]['oldprice '] = $record['oldprice'];
    $arr[$k]['art'] = $record['art'];
    $arr[$k]['img'] = $record['img'];
    $arr[$k]['dop_img'] = $record['dop_img'];
    $arr[$k]['parent'] = $record['parent'];
    $k++;
}
mysqli_query($link, "SET NAMES 'utf8'");
mysqli_query($link, "SET CHARACTER SET 'utf8'");
header('Content-Type: application/json');
echo json_encode($arr);
?>