<?php
include('function.php');
include('conf.php');
     
// если запрос POST 
if(isset($_POST['name'])){
    //  && isset($_POST['img'])
 
    $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $url = str2url($name);
    // $img = htmlentities(mysqli_real_escape_string($link, $_POST['img']));
     
    $query ="UPDATE catalog SET name='$name', url='$url' WHERE id='$id'";
    // , img='$img'
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    if ($result)
    	header('Location: ../inc/catalog_view.php');
    else
    	echo 'Ошибка при обработке';
}
?>