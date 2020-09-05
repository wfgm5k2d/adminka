<?php

include 'function.php';

if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['message']) || isset($_POST['answer']) || isset($_POST['date']) || isset($_POST['hide']))
{
    $sName = $_POST['name'];
    $sEmail = $_POST['email'];
    $sMessage = $_POST['message'];
    $sAnswer = $_POST['answer'];
    $sDate = $_POST['date'];
    $hide = $_POST['hide'];

    require '../core/ACConnect.php';
    $query = ACDatabase::add("INSERT INTO reviews SET name = ?, email = ?, message = ?, answer = ?, date = ?, hide = ?", array($sName, $sEmail, $sMessage, $sAnswer, $sDate, $hide));

    if ($query)
        echo 1;
    else
        echo 0;
}
?>
