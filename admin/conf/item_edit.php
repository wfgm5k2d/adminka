<?php

include('function.php');
include('conf.php');
     
// если запрос POST 
if(isset($_POST['name']) || isset($_POST['descript']) || isset($_POST['content']) ||isset($_POST['price']) || isset($_POST['oldprice']) || isset($_POST['art']) || isset($_POST['size']) || isset($_POST['color']) || isset($_POST['id'])){
 
    $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $descript = htmlentities(mysqli_real_escape_string($link, $_POST['descript']));
    $content = htmlentities(mysqli_real_escape_string($link, $_POST['content']));
    $price = htmlentities(mysqli_real_escape_string($link, $_POST['price']));
    $oldprice = htmlentities(mysqli_real_escape_string($link, $_POST['oldprice']));
    $art = htmlentities(mysqli_real_escape_string($link, $_POST['art']));
    $size = htmlentities(mysqli_real_escape_string($link, $_POST['size']));
    $color = htmlentities(mysqli_real_escape_string($link, $_POST['color']));
    //$parent = htmlentities(mysqli_real_escape_string($link, $_POST['parent']));
    $url = str2url($name);

    $query ="UPDATE item SET name='$name', url='$url', descript='$descript', content='$content', price='$price', oldprice='$oldprice', art='$art', size='$size', color='$color' WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    if ($result)
    	header('Location: ../inc/item_view.php');
    else
    	echo 'Ошибка при обработке';
}
?>