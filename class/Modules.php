<?php


class Modules
{
    public static function getModule()
    {
        $connect = new ACconfig();

        $connections = $connect->connect();

        $sql = "SELECT * FROM moduls WHERE hide = '1'";
        $query = $GLOBALS['mysqli']->query($sql);

        $k = 0;
        while($record = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
            $MODULE[$k] = $record;
            $k++;
        }
        return $MODULE;
    }

    public static function getModuleSale()
    {
        $connect = new ACconfig();

        $connections = $connect->connect();

        $sql = "SELECT * FROM moduls";
        $query = $GLOBALS['mysqli']->query($sql);

        $k = 0;
        while($record = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
            $MODULESALE[$k] = $record;
            $k++;
        }
        return $MODULESALE;
    }
}