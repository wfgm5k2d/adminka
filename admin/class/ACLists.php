<?php


class ACLists
{
    /**
     * @return array|void
     */
    private static function getFullList()
    {
        $arItems = ACDatabase::getAll('SELECT * FROM list');

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }

    /**
     * @param int $parent
     * @return mixed|void
     */
    public static function getParentList($parent = 0)
    {
        $arItems = ACDatabase::getRow("SELECT * FROM list WHERE parent = ?", $parent);

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }

    /**
     * @return array|void
     */
    public static function getChildList()
    {
        $arItems = ACDatabase::getAll('SELECT * FROM list WHERE parent != 0');

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }

    /**
     * @param $id
     * @return array|void
     */
    public static function getChildByIdList($id)
    {
        $arItems = ACDatabase::getAll('SELECT * FROM list WHERE id = ?', $id);

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }

    /**
     * @param $url
     * @return array|void
     */
    public static function getContentList($url)
    {
        $arItems = ACDatabase::getAll('SELECT * FROM list WHERE url = ?', $url);

        if(!empty($arItems))
            return $arItems;
        else
            return ACErrors::getError(1);
    }
}