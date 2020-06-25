<?php
session_start();
ini_set('display_errors','Off'); //On показать ошибки
error_reporting('E_ALL');

$_SESSION['title'] = '&copyArtComunity / Панель управления / Администратор сайта';
if($_SESSION['user_activ_admin'] == 1)
{
    $url = explode('/', $_SERVER['REQUEST_URI']);

    if(!empty($url[4]) && $url[4] != '')
    {
        include 'inc/'.$url[4].'.php';
    }
    else
    {
        include "inc/body.php";
    }

    $_SESSION['user_activ_admin'] = 0;
    $_SESSION['login'] = 0;
    $_SESSION['pass'] = 0;
}
else
{
	include 'authorization.php';
}
?>