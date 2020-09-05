<?php
include('conf.php');

if(isset($_POST['id']))
{
	$id = $_POST['id'];
    $res = mysqli_real_escape_string($link, $id);
     
    $result =mysqli_query($link, "DELETE FROM reviews WHERE id = '$id'");

    if ($result)
    	echo '1';
    else
    	die();

}
?>