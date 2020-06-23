<?php
class Message{
    function msg(){
        include('config.php');

        // Составляем запрос
        $sql = "SELECT * FROM message";
        $result = mysqli_query($GLOBALS['mysqli'], $sql);

        // Перебор результата
        $k = 0;
        while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $MSG[$k] = $record;
            $k++;
        }
        return $MSG;
    }
}