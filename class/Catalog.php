<?php
class Catalog{

    /**
     * @param $parent
     * @return array
     */
    public static function getCat($parent)
	{
		$arItems = ACDatabase::getAll("SELECT * FROM catalog WHERE parent=?", $parent);

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
	}

    /**
     * @param $id
     * @return mixed
     */
    public static function getCatUrl($id)
	{
		$arItems = ACDatabase::getRow("SELECT url FROM catalog WHERE id=?", $id);

        if(!empty($arItems['url']))
            return $arItems['url'];
        else
            return ACErrors::getError(1);
	}

    /**
     * @param $url
     * @return mixed
     */
    public static function getCatId($url)
	{
		$arItems = ACDatabase::getRow("SELECT id FROM catalog WHERE url=?", $url);

        if(!empty($arItems['id']))
            return $arItems['id'];
        else
            return ACErrors::getError(1);
	}

    /**
     * @param $url
     * @return mixed
     */
    public static function getCatName($url)
	{
		$arItems = ACDatabase::getRow("SELECT name FROM catalog WHERE url=?", $url);

        if(!empty($arItems['name']))
            return $arItems['name'];
        else
            return ACErrors::getError(1);
	}
}