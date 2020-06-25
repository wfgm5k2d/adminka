<?php
session_start();
include('conf.php');
include('function.php');

if($_SESSION['id'])
{
    $name = $_POST['name'];
    $descript = $_POST['descript'];
    $content = $_POST['content'];
    $url = str2url($name);
    $parent = $_SESSION['id'];
    $result = mysqli_query($link, "INSERT INTO list (name, url, descript, content, parent) VALUES ('$name', '$url', '$descript', '$content', '$parent')");

    if ($result)
        echo 'pomeho';
    else
        echo 0;
}
 // && isset($_POST['img'])
else if($_POST['parent'] == '')
{
    $name = $_POST['name'];
    $descript = $_POST['descript'];
    $content = $_POST['content'];
    $parent = 0;
    $url = str2url($name);
    $result = mysqli_query($link, "INSERT INTO list (name, url, parent) VALUES ('$name', '$url', '$parent')");

    if ($result)
        echo 'treho';
    else
        echo 0;
}
?>
