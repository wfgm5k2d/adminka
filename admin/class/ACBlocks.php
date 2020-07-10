<?php


class ACBlocks
{
    public static function block($sIdent)
    {
        $query = ACDatabase::getRow("SELECT value FROM blocks WHERE ident=?", $sIdent);

        if(!empty($query['value']))
            return $query['value'];
        else
            return ACErrors::getError(1);
    }
}