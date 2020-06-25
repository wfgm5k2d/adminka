<?php
session_start();
ini_set('display_errors', 'On'); //On показать ошибки
error_reporting('E_ALL');

$_SESSION['title'] = '&copyArtComunity / Панель управления / Администратор сайта';
if ($_SESSION['user_activ_admin'] == 1) {
    $arUrl = explode('/', $_SERVER['REQUEST_URI']);
    $sUrl = str_replace('.php', '', $arUrl[2]);

    if (!empty($sUrl) && $sUrl != '') {
        include 'inc/' . $sUrl . '.php';
    } else {
        require "inc/body.php";
    }

    $_SESSION['user_activ_admin'] = 0;
    $_SESSION['login'] = 0;
    $_SESSION['pass'] = 0;
} else {
    include 'authorization.php';
}
?>