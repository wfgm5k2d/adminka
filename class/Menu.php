<?php


class Menu
{
    public static function getMenu()
    {
        $connect = new ACconfig();

        $connections = $connect->connect();

        $sql = 'SELECT * FROM menu';
        $query = $GLOBALS['mysqli']->query($sql);

        $k = 0;
        while($record = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
            $MENU[$k] = $record;
            $k++;
        }

        if(!empty($MENU))
            return $MENU;
        else
            return include "errors/404.php";
    }

    public static function getParentMenu($parent = 0)
    {
        $connect = new ACconfig();

        $connections = $connect->connect();

        $sql = 'SELECT * FROM menu WHERE parent='.$parent;
        $query = $GLOBALS['mysqli']->query($sql);

        $k = 0;
        while($record = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
            $PARENTMENU[$k] = $record;
            $k++;
        }

        if(!empty($PARENTMENU))
            return $PARENTMENU;
        else
            return '';
    }

    public static function getChildMenu($parent)
    {
        $connect = new ACconfig();

        $connections = $connect->connect();

        $sql = "SELECT * FROM menu WHERE parent=".$parent;
        $query = $GLOBALS['mysqli']->query($sql);

        $k = 0;
        while($record = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
            $CHILDMENU[$k] = $record;
            $k++;
        }
        if(!empty($CHILDMENU))
            return $CHILDMENU;
        else
            return '';
    }
}