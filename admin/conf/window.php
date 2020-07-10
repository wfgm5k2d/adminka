<?php

if(!empty($_REQUEST['status']))
{
    if(ctype_alpha($_REQUEST['status']))
    {
        $sValue = str_split($_REQUEST['status']);

        require '../core/ACConnect.php';

        $query = ACDatabase::set("UPDATE window SET status = ? WHERE action = 'action'", $sValue);
    }
}