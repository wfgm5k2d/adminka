<?php
include('function.php');
include('conf.php');

// если запрос POST
if(isset($_POST['name']) or isset($_POST['img']) or isset($_POST['id'])){

    $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $url = str2url($name);

    $query ="UPDATE menu SET name='$name', url='$url' WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    if ($result)
        header('Location: ../inc/menu_view.php');
    else
        echo 'Ошибка при обработке';
}
?>