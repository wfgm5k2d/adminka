<?php

class ACOption
{
    /**
     * @return mixed|void
     */
    public static function getOption()
    {
        $arItems = ACDatabase::getAll("SELECT * FROM options");

        if(!empty($arItems[0]))
            return $arItems[0];
        else
            return ACErrors::getError(1);
    }
}