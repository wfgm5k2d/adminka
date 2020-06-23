<?php
class ACCatalog{

    /**
     * @param $parent
     * @return array
     */
    public static function getCat()
	{
		$arItems = ACDatabase::getAll("SELECT * FROM catalog");

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
	}

    /**
     * @param $id
     * @return mixed
     */
    public static function getParentUrl($id)
	{
        $arItems = ACDatabase::getRow("SELECT url FROM catalog WHERE id=?", $id);

        if(!empty($arItems['url']))
            return $arItems['url'];
        else
            return ACErrors::getError(1);
	}

    /**
     * @param $id
     * @return mixed
     */
    public static function getChildUrl($id)
    {
        $arItems = ACDatabase::getRow("SELECT url FROM ch_catalog WHERE id=?", $id);

        if(!empty($arItems['url']))
            return $arItems['url'];
        else
            return ACErrors::getError(1);
    }

    /**
     * @param $url
     * @return mixed
     */
    public static function getParentId($url)
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
    public static function getChildId($url)
    {
        $arItems = ACDatabase::getRow("SELECT id FROM ch_catalog WHERE url=?", $url);

        if(!empty($arItems['id']))
            return $arItems['id'];
        else
            return ACErrors::getError(1);
    }

    /**
     * @param $url
     * @return mixed
     */
    public static function getParentName($url)
	{
		$arItems = ACDatabase::getRow("SELECT name FROM catalog WHERE url=?", $url);

        if(!empty($arItems['name']))
            return $arItems['name'];
        else
            return ACErrors::getError(1);
	}

    /**
     * @param $url
     * @return mixed
     */
    public static function getChildName($url)
    {
        $arItems = ACDatabase::getRow("SELECT name FROM ch_catalog WHERE url=?", $url);

        if(!empty($arItems['name']))
            return $arItems['name'];
        else
            return ACErrors::getError(1);
    }
}