<?php 
session_start();
ini_set('display_errors','Off'); //On показать ошибки
error_reporting('E_ALL');

include "../../class/include_class.php";
include "../../configuration/include_configuration.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="autor" content="nktpgrlv@gmail.com">
    <meta property="og:image" content="">
    <meta name="viewport" content="width=640px, initial-scale=0.5">
    <meta content=noindex name=robots>
    <meta content=nofollow name=robots>
    <meta content=none name=robots>
    <meta content=General name=rating>
    <meta content=document name=resource-type>
    <meta content=GLOBAL name=distribution>

    <?php
    $parent = basename(dirname($_SERVER['PHP_SELF']));
    if ($parent == 'inc') {
        echo '
		    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
		    <link rel="stylesheet" type="text/css" href="assets/css/background.css">
		    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
		    <link rel="stylesheet" type="text/css" href="assets/css/animations.min.css">
		    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css">
		    <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css">
		    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
		    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
            <link rel="stylesheet" href="../Trumbowyg/dist/ui/trumbowyg.css">
            <link rel="stylesheet" href="../Trumbowyg/dist/plugins/table/ui/trumbowyg.table.min.css">
            <link rel="stylesheet" href="trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css">

		    <link rel="icon" type="image/png" href="../favicon.png">
            
		    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
		    <script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
		    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
		    <script type="text/javascript" src="assets/js/jquery.fancybox.min.js"></script>
            <script src="assets/js/plotly-latest.min.js"></script>
            <script type="text/javascript" src="assets/js/loader.js"></script>
		    <script src="../Trumbowyg/dist/trumbowyg.js"></script>
            <script src="../Trumbowyg/dist/langs/ru.js"></script>
            <script src="../Trumbowyg/dist/plugins/table/trumbowyg.table.min.js"></script>
            <script src="../Trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js"></script>
            <script src="../Trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js"></script>
            <script src="../Trumbowyg/dist/plugins/fontfamily/trumbowyg.fontfamily.min.js"></script>
            <script src="../Trumbowyg/dist/plugins/fontsize/trumbowyg.fontsize.min.js"></script>
            <script src="../Trumbowyg/dist/plugins/history/trumbowyg.history.min.js"></script>
            <script src="../Trumbowyg/dist/plugins/insertaudio/trumbowyg.insertaudio.min.js"></script>
            <script src="../Trumbowyg/dist/plugins/lineheight/trumbowyg.lineheight.min.js"></script>
            <script src="../Trumbowyg/dist/plugins/noembed/trumbowyg.noembed.min.js"></script>
            <script src="../Trumbowyg/dist/plugins/preformatted/trumbowyg.preformatted.min.js"></script>
            <script src="../Trumbowyg/dist/plugins/resizimg/resolveconflict-resizable.min.js"></script>
            <script src="../Trumbowyg/dist/plugins/resizimg/resize.with.canvas.min.js"></script>
            <script src="../Trumbowyg/dist/plugins/resizimg/trumbowyg.resizimg.min.js"></script>
            <script type="text/javascript" src="assets/js/site.js"></script>
        ';
        $img_reviews = 'assets/icons/reviews-image.png';
        $img_newreviews = 'assets/icons/new-reviews-image.png';
        $img_message = 'assets/icons/message-image.png';
        $img_newmessage = 'assets/icons/new-message-image.png';
        $img_home = 'assets/icons/home-image.png';
        $img_exit = 'assets/icons/exit-image.png';
    } else {
        echo '
		    <link rel="stylesheet" type="text/css" href="inc/assets/css/style.css">
		    <link rel="stylesheet" type="text/css" href="inc/assets/css/background.css">
		    <link rel="stylesheet" type="text/css" href="inc/assets/css/animate.css">
		    <link rel="stylesheet" type="text/css" href="inc/assets/css/animations.min.css">
		    <link rel="stylesheet" type="text/css" href="inc/assets/css/jquery.fancybox.min.css">
		    <link rel="stylesheet" type="text/css" href="inc/assets/css/jquery-ui.css">
		    <link rel="stylesheet" type="text/css" href="inc/assets/css/owl.carousel.min.css">
		    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

		    <link rel="icon" type="image/png" href="favicon.png">
		    
		    <script type="text/javascript" src="inc/assets/js/jquery.min.js"></script>
		    <script type="text/javascript" src="inc/assets/js/jquery-ui.min.js"></script>
		    <script type="text/javascript" src="inc/assets/js/owl.carousel.min.js"></script>
		    <script type="text/javascript" src="inc/assets/js/jquery.fancybox.min.js"></script>
		    <script src="inc/assets/js/plotly-latest.min.js"></script>
            <script type="text/javascript" src="inc/assets/js/loader.js"></script>
        ';
        $img_reviews = 'inc/assets/icons/reviews-image.png';
        $img_newreviews = 'inc/assets/icons/new-reviews-image.png';
        $img_message = 'inc/assets/icons/message-image.png';
        $img_newmessage = 'inc/assets/icons/new-message-image.png';
        $img_exit = 'inc/assets/icons/exit-image.png';
        $img_home = 'inc/assets/icons/home-image.png';
    }
    ?>
    <title><?php echo $_SESSION['title']; ?></title>
</head>
<body id="background-admin">
<div class="wrapper">
    <header class="header">
        <div class="center header-menu">
            <?php
            if ($parent == 'inc') {
                ?>
                <a href="body.php" class="navigation-panel">
                    <img src="assets/icons/home-image.png" alt="Главная" title="Главная"><span>Главная</span>
                </a>
                <?php

                    $modules = new Modules;
                    if(!empty($modules->getModule()))
                    {
                        foreach($modules->getModule() as $element)
                        {
                            echo '
                                <a href="'.$element['url'].'.php" class="navigation-panel">
                                    <img src="assets/icons/'.$element['img'].'.png" alt="'.$element['module'].'" title="'.$element['module'].'">'.$element['module'].'
                                </a>
                            ';
                        }
                    }
                ?>
                <a href="/" class="navigation-panel">
                    <img src="<?php echo $img_exit; ?>" alt="Выход" title="Выход">Выход
                </a>
                <?php
            } else {
                ?>
                <a href="inc/body.php" class="navigation-panel">
                    <img src="<?php echo $img_home; ?>" alt="Главная" title="Главная">
                    <span>Главная</span>
                </a>
                <?php
                    $modules = new Modules;
                    if(!empty($modules->getModule()))
                    {
                        foreach($modules->getModule() as $element)
                        {
                            if($element['module'] == 'Отзывы')
                            {
                                $REVIEWS = Reviews::getReviews();
                                if ($REVIEWS && $REVIEWS != '') {
                                    echo '<a href="inc/reviews_view.php" class="navigation-panel"><img src="' . $img_newreviews . '" alt="Новый отзыв" title="Новый отзыв"><span>Новый отзыв</span></a>';
                                } else {
                                    echo '<a href="inc/reviews_view.php" class="navigation-panel"><img src="' . $img_reviews . '" alt="Отзывы" title="Отзывы"><span>Отзывы</span></a>';
                                }
                            }
                            elseif($element['module'] == 'Уведомления')
                            {
                                $MSG = message::msg();
                                if ($MSG && $MSG != '') {
                                    echo '<a href="inc/message_view.php" class="navigation-panel"><img src="' . $img_newmessage . '" alt="Новое уведомление" title="Новое уведомление"><span>Новое уведомление</span></a>';
                                } else {
                                    echo '<a href="inc/message_view.php" class="navigation-panel"><img src="' . $img_message . '" alt="Уведомления" title="Уведомления"><span>Уведомления</span></a>';
                                }
                            }
                            else
                            {
                                echo '
                                <a href="inc/'.$element['url'].'.php" class="navigation-panel">
                                    <img src="inc/assets/icons/'.$element['img'].'.png" alt="'.$element['module'].'" title="'.$element['module'].'">
                                    <span>'.$element['module'].'</span>
                                </a>
                            ';
                            }

                        }
                    }
                ?>
                <a href="/" class="navigation-panel">
                    <img src="<?php echo $img_exit; ?>" alt="Выход" title="Выход">
                    <span>Выход</span>
                </a>
                <?php
            }
            ?>
        </div>
    </header>
    <div class="content">
        <div class="center">