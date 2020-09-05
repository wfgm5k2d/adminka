<?php
$dbhost = "localhost";
$dbname = "artcomunity";
$dbpass = "";
$dbuser = "root";

$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

/* проверяем соединение */
if (mysqli_connect_errno()) {
    printf("Нет соединения: %s\n", mysqli_connect_error());
    exit();
}

mysqli_query($link, "SET NAMES 'utf8'");
mysqli_query($link, "SET CHARACTER SET 'utf8'");

if(isset($_POST['message']) || isset($_POST['name']) || isset($_POST['lastname']) || isset($_POST['color']) || isset($_POST['size']) || isset($_POST['type']) || isset($_POST['theme']) || isset($_POST['material']) || isset($_POST['email']) || isset($_POST['phone']) || isset($_POST['adress']))
{
    $message = $_POST['message'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $type = $_POST['type'];
    $theme = $_POST['theme'];
    $material = $_POST['material'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];
    $result = mysqli_query($link, "INSERT INTO message (message, name, lastname, color, size, type, theme, material, email, phone, adress) VALUES ('$message', '$name', '$lastname', '$color', '$size', '$type', '$theme', '$material', '$email', '$phone', '$adress')");

    if ($result)
        echo '1';
    else
    	echo '0';
}
?>
