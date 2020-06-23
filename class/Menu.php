<?php


class Menu
{
    /**
     * @return array|void
     */
    public static function getMenu()
    {
        $arItems = ACDatabase::getAll('SELECT * FROM menu');

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }

    /**
     * @return array|void
     */
    public static function getParentMenu()
    {
        $arItems = ACDatabase::getAll('SELECT * FROM menu WHERE parent=0');

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }

    /**
     * @param $parent
     * @return array|void
     */
    public static function getChildMenu($parent)
    {
        $arItems = ACDatabase::getAll("SELECT * FROM menu WHERE parent=?", $parent);

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }
}