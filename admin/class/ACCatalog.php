<?php


class ACCatalog
{
    /**
     * @param $parent
     * @return array
     */
    public static function getFull()
	{
        $arItems = ACDatabase::getAll("SELECT * FROM catalog");

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
	}

    /**
     * @return array|void
     */
    public static function getParent()
    {
        $arItems = ACDatabase::getAll("SELECT * FROM catalog WHERE parent = 0");

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }

    /**
     * @return array|void
     */
    public static function getChild()
    {
        $arItems = ACDatabase::getAll("SELECT * FROM catalog WHERE parent != 0");

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getUrl($id)
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
    public static function getId($url)
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
    public static function getName($url)
	{
        $arItems = ACDatabase::getRow("SELECT name FROM catalog WHERE url=?", $url);

        if(!empty($arItems['name']))
            return $arItems['name'];
        else
            return ACErrors::getError(1);
	}

    /**
     * @param $sName
     * @param null $sUrl
     * @return int|string
     */
    public static function addParent($sName, $sUrl = NULL)
    {
        $sName = filt($sName);

        ($sUrl == NULL) ? str2url($sName) : $sUrl;

        $arItems = ACDatabase::add("INSERT INTO `catalog` SET name = ?, url = ?", array($sName, $sUrl));

        return $arItems;
    }


    /**
     * @param $sName
     * @param $nParent
     * @param null $sUrl
     * @return int|string
     */
    public static function addChild($sName, $nParent, $sUrl = NULL)
    {
        $sName = filt($sName);

        ($sUrl == NULL) ? str2url($sName) : $sUrl;

        $nParent = filt($nParent);

        $arItems = ACDatabase::add("INSERT INTO `catalog` SET name = ?, url = ?, parent = ?", array($sName, $sUrl, $nParent));

        return $arItems;
    }

    public static function delete($nId)
    {
        ACDatabase::set("DELETE FROM `catalog` WHERE `id` = ?", $nId);
        ACDatabase::set("DELETE FROM `catalog` WHERE `parent` = ?", $nId);
        ACDatabase::set("DELETE FROM `item` WHERE `id` = ?", $nId);
    }

}