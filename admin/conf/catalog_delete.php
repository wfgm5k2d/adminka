<?php
include('conf.php');

if(isset($_POST['id']))
{
	$id = $_POST['id'];
     
    $result =mysqli_query($link, "DELETE FROM catalog WHERE id = '$id'");

    if ($result)
    	header('Location: ../inc/catalog_view.php');
    else
    	echo 'Ошибка при обработке';

}

?>