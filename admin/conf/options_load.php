<?php
include('conf.php');

$sql = 'SELECT * FROM options';
$result = mysqli_query($link, $sql);

$arr = array();
// Перебор результата
$k = 0;
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $arr[$k]['id'] = $record['id'];
    $arr[$k]['title'] = $record['title'];
    $arr[$k]['description'] = $record['description'];
    $arr[$k]['og_title'] = $record['og_title'];
    $arr[$k]['og_description'] = $record['og_description'];
    $arr[$k]['site_name'] = $record['site_name'];
    $arr[$k]['keywords'] = $record['keywords'];
    $arr[$k]['pass'] = $record['pass'];
    $k++;
}
header('Content-Type: application/json');
echo json_encode($arr);
?>