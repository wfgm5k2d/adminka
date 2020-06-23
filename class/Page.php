<?php

class Page {
    public static function getPage()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = 'SELECT * FROM page';
        $query = $GLOBALS['mysqli']->query($sql);

        $k = 0;
        while($record = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
            $PAGE[$k] = $record;
            $k++;
        }
        if(!empty($PAGE))
            return $PAGE;
        else
            return false;
    }

    public static function getContentPage($url)
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = 'SELECT * FROM page WHERE url="'.$url.'"';
        $query = $GLOBALS['mysqli']->query($sql);

        $k = 0;
        while($record = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
            $getContentPage[$k] = $record;
            $k++;
        }
        if(!empty($getContentPage))
            return $getContentPage;
        else
            return false;
    }
}