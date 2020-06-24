<?php
class ACCatalog{

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
     * @return int|string
     */
    public static function addParent($sName, $sUrl = '')
    {
        $sName = filt($sName);

        //($sUrl == '') ? str2url($sName) : $sUrl;
        $sUrl = str2url($sName);

        $arItems = ACDatabase::add("INSERT INTO `catalog` (`name`, `url`) VALUES (`{$sName}`,`{$sUrl}`)");

        return $arItems;
    }


    public static function addChild($sName, $nParent, $sUrl = NULL)
    {
        $sName = filt($sName);

        $sUrl = str2url($sName);

        ($sUrl == NULL) ? str2url($sName) : $sUrl;

        $nParent = filt($nParent);

        $arItems = ACDatabase::add("INSERT INTO `catalog` (name, url, parent) VALUES ({$sName},{$sUrl}, {$nParent})");

        return $arItems;
    }
}