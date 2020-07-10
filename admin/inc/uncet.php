<?php
session_start();

session_destroy($_SESSION['user_activ_admin']);
session_destroy($_SESSION['login']);
session_destroy($_SESSION['pass']);

$_SESSION['user_activ_admin'] = 0;
$_SESSION['login'] = 0;
$_SESSION['pass'] = 0;

if($_SESSION['pass'] == 0 && $_SESSION['login'] == 0 && $_SESSION['user_activ_admin'] == 0)
    header('location: ../../');