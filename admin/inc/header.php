<?php
session_start();
ini_set('display_errors', 'On'); //On показать ошибки
error_reporting('E_ALL');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="autor" content="Artcomunity">
    <meta property="og:image" content="">
    <meta name="viewport" content="width=640px, initial-scale=0.5">
    <meta content=noindex name=robots>
    <meta content=nofollow name=robots>
    <meta content=none name=robots>
    <meta content=General name=rating>
    <meta content=document name=resource-type>
    <meta content=GLOBAL name=distribution>

    <?php
    $parentDir = basename(dirname($_SERVER['PHP_SELF']));
    if ($parentDir == 'inc')
        $parentDir = 'assets';
    else
        $parentDir = 'inc/assets';
    ?>
    <link rel="stylesheet" type="text/css" href="<?= $parentDir ?>/css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?= $parentDir ?>/icofont/icofont.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="icon" type="image/png" href="favicon.png">

    <?
    $img_reviews = $parentDir . '/icons/reviews-image.png';
    $img_newreviews = $parentDir . '/icons/new-reviews-image.png';
    $img_message = $parentDir . '/icons/message-image.png';
    $img_newmessage = $parentDir . '/icons/new-message-image.png';
    $img_home = $parentDir . '/icons/home-image.png';
    $img_exit = $parentDir . '/icons/exit-image.png';
    ?>

    <title><?php echo $_SESSION['title']; ?></title>

</head>
<body id="background-admin">
<div class="wrapper">
    <header class="header">
        <div class="header-menu">
            <a href="body.php" class="navigation-panel">
                <img src="<?= $parentDir ?>/icons/home-image.png" alt="Главная" title="Главная"><span>Главная</span>
            </a>
            <? if (!empty(ACModules::getModule())): ?>
                <? foreach (ACModules::getModule() as $arModul): ?>
                    <a href="<?=$arModul['url']?>" class="navigation-panel">
                        <img src="<?= $parentDir ?>/icons/<?=$arModul['img']?>.png" alt="<?=$arModul['module']?>"
                             title="<?=$arModul['module']?>">
                        <?=$arModul['module']?>
                    </a>
                <? endforeach; ?>
            <? endif; ?>
            <a href="uncet.php" class="navigation-panel">
                <img src="<?php echo $img_exit; ?>" alt="Выход" title="Выход">Выход
            </a>
        </div>
    </header>
    <div class="content">