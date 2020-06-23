<?php
class Catalog{

    /**
     * @param $parent
     * @return array
     */
    public static function getCat($parent)
	{
		$arItems = ACDatabase::getAll("SELECT * FROM catalog WHERE parent=?", $parent);

		return $arItems;
	}

    /**
     * @param $id
     * @return mixed
     */
    public static function getCatUrl($id)
	{
		$arItems = ACDatabase::getRow("SELECT url FROM catalog WHERE id=?", $id);

		return $arItems['url'];
	}

    /**
     * @param $url
     * @return mixed
     */
    public static function getCatId($url)
	{
		$arItems = ACDatabase::getRow("SELECT id FROM catalog WHERE url=?", $url);

		return $arItems['id'];
	}

    /**
     * @param $url
     * @return mixed
     */
    public static function getCatName($url)
	{
		$arItems = ACDatabase::getRow("SELECT name FROM catalog WHERE url=?", $url);

		return $arItems['name'];
	}
}