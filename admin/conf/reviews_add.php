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

if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['message']) || isset($_POST['answer']) || isset($_POST['date']) || isset($_POST['hide']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $answer = $_POST['answer'];
    $date = $_POST['date'];
    $hide = $_POST['hide'];
    $result = mysqli_query($link, "INSERT INTO reviews (name, email, message, answer, date, hide) VALUES ('$name', '$email', '$message', '$answer', '$date', '$hide')");

    if ($result)
        echo '1';
    else
    	die();
}
?>
