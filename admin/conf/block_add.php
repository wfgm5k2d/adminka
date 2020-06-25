<?php
include('function.php');
include('conf.php');
if(isset($_POST['name']) && isset($_POST['ident']))
{
    $name = $_POST['name'];
    $ident = $_POST['ident'];
    $result = mysqli_query($link, "INSERT INTO blocks (name, ident) VALUES ('$name', '$ident')");

    if ($result)
    	echo '1';
    else
    	echo '0';
}
?>
