<?php
include('function.php');
include('conf.php');

// если запрос POST
if(isset($_POST['id']) or isset($_POST['answer'])){

    $id = $_POST['id'];
    $answer = $_POST['answer'];
    $hide = $_POST['hide'];

    $query ="UPDATE reviews SET answer='$answer', hide='$hide' WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    if ($result)
        header('Location: ../inc/reviews_view.php');
    else
        echo 'Ошибка при обработке';
}
?>