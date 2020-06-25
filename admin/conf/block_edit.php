<?php

include('conf.php');
     
// если запрос POST 
    $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
if(isset($_POST['name']) && isset($_POST['id'])){
 

     
    $query ="UPDATE blocks SET name='$name' WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    if ($result)
    	echo '1';
    else
    	echo '0';
}
?>