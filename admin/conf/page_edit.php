<?php
include('function.php');
include('conf.php');
     
// если запрос POST 
if(isset($_POST['name']) or isset($_POST['descript']) or isset($_POST['content']) or isset($_POST['img']) or isset($_POST['id'])){
 
    $id = htmlspecialchars(mysqli_real_escape_string($link, $_POST['id']));
    $name = htmlspecialchars(mysqli_real_escape_string($link, $_POST['name']));
    $descript = htmlspecialchars(mysqli_real_escape_string($link, $_POST['descript']));
    $content = htmlspecialchars(mysqli_real_escape_string($link, $_POST['content']));
    $url = str2url($name);

    $query ="UPDATE page SET name='$name', descript='$descript', content='$content', url='$url' WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    if ($result)
    	header('Location: ../inc/page_view.php');
    else
    	echo 'Ошибка при обработке';
}
?>