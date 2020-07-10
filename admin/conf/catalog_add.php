<?php
session_start();
include('function.php');
include('conf.php');
//  && isset($_POST['img'])
if($_SESSION['id'])
{
    $name = $_POST['name'];
    $parent = $_SESSION['id'];
    $url = str2url($name);
    // $img = $_POST['img'];
    $result = mysqli_query($link, "INSERT INTO catalog (name, url, parent) VALUES ('$name', '$url', '$parent')");

    if ($result)
        echo 1;
    else
        echo 0;
}
else if($_POST['parent'] == 0)
{
    $name = $_POST['name'];
	$url = str2url($name);
    // $img = $_POST['img'];
    $result = mysqli_query($link, "INSERT INTO catalog (name, url) VALUES ('$name', '$url')");

    if ($result)
        header('Location: ../inc/catalog_view.php');
    else
        echo 'Ошибка при обработке';
}
?>
