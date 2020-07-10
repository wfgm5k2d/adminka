<?php
include('conf.php');

if(isset($_POST['id']))
{
	$id = $_POST['id'];
    $res = mysqli_real_escape_string($link, $id);
     
    $result =mysqli_query($link, "DELETE FROM list WHERE id = '$id'");

    if ($result)
    	header('Location: ../inc/list_view.php');
    else
    	echo 'Ошибка при обработке';

}

if(isset($_POST['editplusimage']))
{
	$editplusimage = $_POST['editplusimage'];
    $res = mysqli_real_escape_string($link, $img);
     
    $result =mysqli_query($link, "UPDATE list SET img='' WHERE img='$editplusimage'");

    if ($result)
    	header('Location: ../inc/list_view.php');
    else
    	echo 'Ошибка при обработке';

}

if(isset($_POST['img']))
{
    $img = $_POST['img'];
    $res = mysqli_real_escape_string($link, $img);
     
    $result =mysqli_query($link, "UPDATE list SET img='' WHERE img='$img'");

    if ($result)
        header('Location: ../inc/list_view.php');
    else
        echo 'Ошибка при обработке';

}
?>