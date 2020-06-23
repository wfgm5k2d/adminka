<?php
class Message{

    /**
     * @return array|void
     */
    public static function getMessage()
    {
        $arItems = ACDatabase::getAll("SELECT * FROM message");

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }
}