<?php


class ACItem
{

	public static function getItems($parent)
	{
        $arItems = ACDatabase::getAll("SELECT * FROM item WHERE parent=?", $parent);

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
	}

    public static function getItemsFull()
	{
        $arItems = ACDatabase::getAll("SELECT * FROM item");

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
	}

    public static function getItemsId($id)
	{
        $arItems = ACDatabase::getAll("SELECT * FROM item WHERE id=?", $id);

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
	}
}
?>