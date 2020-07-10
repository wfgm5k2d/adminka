<?php
include('conf.php');

if(isset($_POST['id']))
{
	$id = $_POST['id'];
    $res = mysqli_real_escape_string($link, $id);
     
    $result =mysqli_query($link, "DELETE FROM item WHERE id = '$id'");

    if ($result)
    	header('Location: ../inc/item_view.php');
    else
    	echo 'Ошибка при обработке';

}

?>