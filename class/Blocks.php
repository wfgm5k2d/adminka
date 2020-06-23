<?php

class Blocks
{
    public static function block($sIdent)
    {
        $query = ACDatabase::getRow("SELECT value FROM blocks WHERE ident=?", $sIdent);

        if(!empty($query['value']))
            return $query['value'];
        else
            echo 'The array is empty. Check call parameters.';
    }
}