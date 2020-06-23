<?php


class Lists
{
    public static function getFullList()
    {
        $connect = new ACconfig();

        $connections = $connect->connect();
        // Составляем запрос
        $sql = 'SELECT * FROM list';
        $result = $GLOBALS['mysqli']->query($sql);

        // Перебор результата
        $k = 0;
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $LIST[$k] = $record;
            $k++;
        }

        if(!empty($LIST))
            return $LIST;
        else
            return 'Массив пустой';
    }

    public static function getParentList($parent = 0)
    {
        $connect = new ACconfig();

        $connections = $connect->connect();
        // Родительская лента
        $sql1 = "SELECT * FROM list WHERE parent = '$parent'";
        $result1 = $GLOBALS['mysqli']->query($sql1);

        // Перебор результата
        $k1 = 0;
        while ($record1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            $PLIST[$k1] = $record1;
            $k1++;
        }

        if(!empty($PLIST))
            return $PLIST;
        else
            return 'Массив пустой';
    }

    public static function getChildList()
    {
        $connect = new ACconfig();

        $connections = $connect->connect();
        // Детская лента
        $sql2 = 'SELECT * FROM list WHERE parent != 0';
        $result2 = $GLOBALS['mysqli']->query($sql2);

        // Перебор результата
        $k2 = 0;
        while ($record2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
            $CHLIST[$k2] = $record2;
            $k2++;
        }

        if(!empty($CHLIST))
            return $CHLIST;
        else
            return 'Массив пустой';
    }

    public static function getChildByIdList($id)
    {
        $connect = new ACconfig();

        $connections = $connect->connect();
        // Детская лента
        $sql2 = "SELECT * FROM list WHERE id = '$id'";
        $result2 = $GLOBALS['mysqli']->query($sql2);

        // Перебор результата
        $k2 = 0;
        while ($record2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
            $CHLIST[$k2] = $record2;
            $k2++;
        }

        if(!empty($CHLIST))
            return $CHLIST;
        else
            return 'Массив пустой';
    }

    public static function getContentList($url)
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = 'SELECT * FROM list WHERE url="'.$url.'"';
        $query = $GLOBALS['mysqli']->query($sql);

        $k = 0;
        while($record = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
            $getContentList[$k] = $record;
            $k++;
        }
        if(!empty($getContentList))
            return $getContentList;
        else
            return false;
    }
}