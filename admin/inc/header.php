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
    <meta name="autor" content="artcomunity24@gmail.com">
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
    <link rel="stylesheet" type="text/css" href="<?= $parentDir ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= $parentDir ?>/css/background.css">
    <link rel="stylesheet" type="text/css" href="<?= $parentDir ?>/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= $parentDir ?>/css/animations.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $parentDir ?>/css/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $parentDir ?>/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?= $parentDir ?>/css/owl.carousel.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="Trumbowyg/dist/ui/trumbowyg.css">
    <link rel="stylesheet" href="Trumbowyg/dist/plugins/table/ui/trumbowyg.table.min.css">
    <link rel="stylesheet" href="Trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css">

    <link rel="icon" type="image/png" href="favicon.png">

    <script type="text/javascript" src="<?= $parentDir ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= $parentDir ?>/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= $parentDir ?>/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?= $parentDir ?>/js/jquery.fancybox.min.js"></script>
    <script src="<?= $parentDir ?>/js/plotly-latest.min.js"></script>
    <script type="text/javascript" src="<?= $parentDir ?>/js/loader.js"></script>
    <script src="Trumbowyg/dist/trumbowyg.js"></script>
    <script src="Trumbowyg/dist/langs/ru.js"></script>
    <script src="Trumbowyg/dist/plugins/table/trumbowyg.table.min.js"></script>
    <script src="Trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js"></script>
    <script src="Trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js"></script>
    <script src="Trumbowyg/dist/plugins/fontfamily/trumbowyg.fontfamily.min.js"></script>
    <script src="Trumbowyg/dist/plugins/fontsize/trumbowyg.fontsize.min.js"></script>
    <script src="Trumbowyg/dist/plugins/history/trumbowyg.history.min.js"></script>
    <script src="Trumbowyg/dist/plugins/insertaudio/trumbowyg.insertaudio.min.js"></script>
    <script src="Trumbowyg/dist/plugins/lineheight/trumbowyg.lineheight.min.js"></script>
    <script src="Trumbowyg/dist/plugins/noembed/trumbowyg.noembed.min.js"></script>
    <script src="Trumbowyg/dist/plugins/preformatted/trumbowyg.preformatted.min.js"></script>
    <script src="Trumbowyg/dist/plugins/resizimg/resolveconflict-resizable.min.js"></script>
    <script src="Trumbowyg/dist/plugins/resizimg/resize.with.canvas.min.js"></script>
    <script src="Trumbowyg/dist/plugins/resizimg/trumbowyg.resizimg.min.js"></script>
    <script type="text/javascript" src="<?= $parentDir ?>/js/site.js"></script>
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
        <div class="center header-menu">
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
            <a href="/" class="navigation-panel">
                <img src="<?php echo $img_exit; ?>" alt="Выход" title="Выход">Выход
            </a>
        </div>
    </header>
    <div class="content">
        <div class="center">