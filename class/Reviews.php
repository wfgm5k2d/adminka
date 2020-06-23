<?php

class ACReviews {

    /**
     * @return bool
     */
    public static function getReviews()
	{
        $arItems = ACDatabase::getAll("SELECT * FROM reviews");

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
	}

    /**
     * @return bool
     */
    public static function getEditedReviews()
    {
        $arItems = ACDatabase::getAll("SELECT * FROM reviews WHERE hide = 1");

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }
}