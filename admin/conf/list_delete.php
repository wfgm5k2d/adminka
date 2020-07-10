<?php

if(isset($_POST['id']))
{
    $nId = $_POST['id'];

    require '../core/ACConnect.php';
    require '../class/ACLists.php';
    $query = ACLists::delete($nId);

    if ($query)
        echo '1';
    else
        echo '0';
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