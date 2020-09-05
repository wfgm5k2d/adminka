<?php
include('conf.php');

if(isset($_POST['id']))
{
	$id = $_POST['id'];
    $res = mysqli_real_escape_string($link, $id);
     
    $result =mysqli_query($link, "DELETE FROM message WHERE id = '$id'");

    if ($result)
    	echo '1';
    else
    	echo '0';

}
echo '#'.$id;
?>