<?php

if(!empty($_GET['keyword']) || !empty($_GET['yclid']))
{
    ?>
    <?php
}
if ($url['PAGE'] == 'kek')
{

}
else
{
    $arPage = ACPage::getContentPage($url['PAGE']);
    print_r($arPage);
    echo 'Типовая страница';
}