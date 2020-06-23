<?php

class ACPage {

    /**
     * @return bool
     */
    public static function getPage()
    {
        $arItems = ACDatabase::getAll("SELECT * FROM page");

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }

    /**
     * @param $url
     * @return bool
     */
    public static function getContentPage($url)
    {
        $arItems = ACDatabase::getAll("SELECT * FROM page WHERE url=?", $url);

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }
}