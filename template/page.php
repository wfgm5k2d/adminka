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
    $arContext = [];
    if(!empty($url['PAGE']))
        $arContext = $url['PAGE'];
    if (!empty($url['ITEM']))
        $arContext = $url['ITEM'];
    if (!empty($url['LIST']))
        $arContext = $url['LIST'];

    $arPage = ACPage::getContentPage($arContext);
    $page = '';
    if(is_array($arPage))
    {
        foreach ($arPage as $elPage)
        {
            $page = $elPage['url'];
        }
    }
    ?>
    <?if($page == $arContext):?>
        Типовая страница
    <?else:?>
        <? require 'error/404.php';?>
    <?endif;?>
    <?php
}