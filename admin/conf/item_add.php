<?php
include('conf.php');
include('function.php');
if(isset($_POST['name']))
{
    $name = $_POST['name'];
    $descript = $_POST['descript'];
    $content = $_POST['content'];
    $price = $_POST['price'];
    $oldprice = $_POST['oldprice'];
    $art = $_POST['art'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    //$parent = $_POST['parent'];
    $url = str2url($name);
    $result = mysqli_query($link, "INSERT INTO item (name, url, descript, content, price, oldprice, art, size, color) VALUES ('$name', '$url', '$descript', '$content', '$price', '$oldprice', '$art', '$size', '$color')");

    if ($result)
        header('Location: ../inc/item_view.php');
    else
        echo 'Ошибка при обработке';
}
?>
