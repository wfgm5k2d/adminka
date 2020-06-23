<?php
class Item{

	public static function getItems($parent)
	{
        $arItems = ACDatabase::getAll("SELECT * FROM item WHERE parent=?", $parent);

        if(!empty($arItems))
            return $arItems;
        else
            return 'Error 1: The array is empty. Check call parameters.';
	}

    public static function getItemsFull()
	{
        $arItems = ACDatabase::getAll("SELECT * FROM item");

        if(!empty($arItems))
            return $arItems;
        else
            return 'Error 1: The array is empty. Check call parameters.';
	}

    public static function getItemsId($id)
	{
        $arItems = ACDatabase::getAll("SELECT * FROM item WHERE id=?", $id);

        if(!empty($arItems))
            return $arItems;
        else
            return 'Error 1: The array is empty. Check call parameters.';
	}
}
?>