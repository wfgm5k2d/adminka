<?php


class ACModules
{
    /**
     * @return mixed
     */
    public static function getModule()
    {
        $arItems = ACDatabase::getAll("SELECT * FROM moduls WHERE hide = 1");

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }

    /**
     * @return mixed
     */
    public static function getModuleSale()
    {
        $arItems = ACDatabase::getAll("SELECT * FROM moduls");

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }
}