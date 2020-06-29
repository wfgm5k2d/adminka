<?php
session_start();
ini_set('display_errors', 'On'); //On показать ошибки
error_reporting('E_ALL');
$_SESSION['title'] = '&copyArtComunity / Панель управления / Администратор сайта';

if ($_SESSION['user_activ_admin'] == 1) {
    $arUrl = explode('/', $_SERVER['REQUEST_URI']);
    $sUrl = str_replace('.php', '', $arUrl[2]);

    if (!empty($sUrl) && $sUrl != '' && $sUrl != 'index') {
        require 'inc/' . $sUrl . '.php';
    } else {
        include ('inc/body.php');
    }

} else {
    include 'authorization.php';
}