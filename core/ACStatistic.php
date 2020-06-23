<?php

class ACStatistic
{
    /*
        Получаем IP пользователя
    */
    /**
     * @return mixed
     */
    public static function getIP()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = @$_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
        elseif (filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
        else $ip = $remote;

        $getIP = $ip; //Если хотим фильтровать для БД - trim(strip_tags(htmlentities(htmlspecialchars(str_replace('.', '', $ip)))));

        return $getIP;
    }

    /*
        Записываем в БД IP пользователя
    */
    /**
     * @param $ip
     * @return bool
     */
    public static function readIP($ip)
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $url = Router::getUrl();
        if($url[1] == 'admin')
        {
            return false;
        }
        else
        {
            // Указываем кодировку, в которой будет получена информация из базы
            @mysqli_query ($GLOBALS['mysqli'], 'set character_set_results = "utf8"');

            // Получаем IP-адрес посетителя и сохраняем текущую дату
            $visitor_ip = $_SERVER['REMOTE_ADDR'];
            $date = date("Y-m-d");

            // Узнаем, были ли посещения за сегодня
            $res = mysqli_query($GLOBALS['mysqli'], "SELECT `id` FROM `visits` WHERE `date`='$date'") or die ("Проблема при подключении к БД");

            // Если сегодня еще не было посещений
            if (mysqli_num_rows($res) == 0)
            {
                // Очищаем таблицу stat
                mysqli_query($GLOBALS['mysqli'], "DELETE FROM `stat`");

                //Получаем сокращенное название месяца
                $month = date('M');

                // Заносим в базу IP-адрес текущего посетителя
                mysqli_query($GLOBALS['mysqli'], "INSERT INTO `stat` SET `ip`='$visitor_ip', `date`='$month'");

                // Заносим в базу дату посещения и устанавливаем кол-во просмотров и уник. посещений в значение 1
                $res_count = mysqli_query($GLOBALS['mysqli'], "INSERT INTO `visits` SET `date`='$date', `uniques`=1,`views`=1");
            }

            // Если посещения сегодня уже были
            else
            {
                // Проверяем, есть ли уже в базе IP-адрес, с которого происходит обращение
                $current_ip = mysqli_query($GLOBALS['mysqli'], "SELECT `id` FROM `stat` WHERE `ip`='$visitor_ip'");

                // Если такой IP-адрес уже сегодня был (т.е. это не уникальный посетитель)
                if (mysqli_num_rows($current_ip) == 1)
                {
                    // Добавляем для текущей даты +1 просмотр (хит)
                        mysqli_query($GLOBALS['mysqli'], "UPDATE `visits` SET `views`=`views`+1 WHERE `date`='$date'");
                }

                // Если сегодня такого IP-адреса еще не было (т.е. это уникальный посетитель)
                else
                {
                    // Заносим в базу IP-адрес этого посетителя
                    mysqli_query($GLOBALS['mysqli'], "INSERT INTO `stat` SET `ip`='$visitor_ip'");

                    // Добавляем в базу +1 уникального посетителя (хост) и +1 просмотр (хит)
                    mysqli_query($GLOBALS['mysqli'], "UPDATE `visits` SET `uniques`=`uniques`+1,`views`=`views`+1 WHERE `date`='$date'");
                }
            }
        }
    }

    /*
        Выводим все IP пользователей
    */
    /**
     * @return mixed
     */
    public static function arIP()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = 'SELECT * FROM stat';
        $result = mysqli_query($GLOBALS['mysqli'], $sql);

        $k = 0;
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $STAT[$k] = $record;
            $k++;
        }

        return $STAT;
    }


    /*
        Выводим все уникальные IP пользователей
    */
    /**
     * @return mixed
     */
    public static function arUniqueIP()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = 'SELECT uniques FROM visits';
        $result = mysqli_query($GLOBALS['mysqli'], $sql);

        $k = 0;
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $UNIQUENESS[$k] = $record;
            $k++;
        }

        return $UNIQUENESS;
    }

    /*
        Выводим все кол-во посещений
    */
    /**
     * @return mixed
     */
    public static function arViews()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = 'SELECT views FROM visits';
        $result = mysqli_query($GLOBALS['mysqli'], $sql);

        $k = 0;
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $VIEWS[$k] = $record;
            $k++;
        }

        return $VIEWS;
    }

    /*
        Выводим дату
    */
    /**
     * @return mixed
     */
    public static function arDate()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = 'SELECT date FROM visits';
        $result = mysqli_query($GLOBALS['mysqli'], $sql);

        $k = 0;
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $DATE[$k] = $record;
            $k++;
        }

        return $DATE;
    }

    /*
     * Инициализируем сбор статистики
     */
    /**
     * @return bool
     */
    public static function start()
    {
        $statistic = new ACStatistic();

        $url = Router::getUrl();

        $arPage = new Page();
        $pages = $arPage->getPage();

        //Првоеряем есть ли такая страница в базе
        if($pages && $pages != '')
        {
            foreach($pages as $element)
            {
                if($url[1] === $element['url'])
                {
                    $ip = $statistic->getIP();
                    $readIp = $statistic->readIP($ip);
                }
                else
                {
                    return false;
                }
            }
        }
        //Если страница главная
        if($url[1] == '')
        {
            $ip = $statistic->getIP();
            $readIp = $statistic->readIP($ip);
        }
    }

    /*
     * Чистим базу каждый последний день месяца
     */
    /**
     *
     */
    public static function dropDate()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $lastday = mktime(0, 0, 0, date('m'), 1, date('Y'));
        if(strval(strftime("%d", $lastday)) == date('d'))
            mysqli_query($GLOBALS['mysqli'], "DELETE FROM visits");
    }

    /*
        Уникальных за месяц
    */
    /**
     * @return int|mixed
     */
    public static function countUniqueMonth()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = 'SELECT uniques FROM visits';
        $result = mysqli_query($GLOBALS['mysqli'], $sql);

        $k = 0;
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $arCountUniqueMonth[$k] = $record;
            $k++;
        }

        $countUniqueMonth = 0;
        foreach($arCountUniqueMonth as $element)
        {
            $countUniqueMonth += $element['uniques'];
        }

        return $countUniqueMonth;
    }

    /*
        Уникальных за неделю
    */
    /**
     * @return int|mixed
     */
    public static function countUniqueWeek()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = 'SELECT * FROM visits ORDER BY id DESC LIMIT 7';
        $result = mysqli_query($GLOBALS['mysqli'], $sql);

        $k = 0;
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $arCountUniqueWeek[$k] = $record;
            $k++;
        }

        $countUniqueWeek = 0;
        foreach($arCountUniqueWeek as $element)
        {
            $countUniqueWeek += $element['uniques'];
        }

        return $countUniqueWeek;
    }

    /*
        Уникальных за день
    */
    /**
     * @return int|mixed
     */
    public static function countUniqueDay()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = "SELECT * FROM visits";
        $result = mysqli_query($GLOBALS['mysqli'], $sql);

        $k = 0;
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $arCountUniqueDay[$k] = $record;
            $k++;
        }

        $date = date("Y-m-d");
        $countUniqueDayDate = '';
        $countUniqueDay = 0;
        foreach($arCountUniqueDay as $element)
        {
            if($element['date'] == $date)
            {
                $countUniqueDayDate=$element['date'];
                $countUniqueDay=$element['uniques'];
                break;
            }
        }

        return $countUniqueDay;
    }

    /*
        Просмотров за месяц
    */
    /**
     * @return int|mixed
     */
    public static function countViewsMonth()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = 'SELECT views FROM visits';
        $result = mysqli_query($GLOBALS['mysqli'], $sql);

        $k = 0;
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $arCountViewMonth[$k] = $record;
            $k++;
        }

        $countViewMonth = 0;
        foreach($arCountViewMonth as $element)
        {
            $countViewMonth += $element['views'];
        }

        return $countViewMonth;
    }

    /*
        Просмотров за неделю
    */
    /**
     * @return int|mixed
     */
    public static function countViewsWeek()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = 'SELECT * FROM visits ORDER BY id DESC LIMIT 7';
        $result = mysqli_query($GLOBALS['mysqli'], $sql);

        $k = 0;
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $arCountViewsWeek[$k] = $record;
            $k++;
        }

        $countViewsWeek = 0;
        foreach($arCountViewsWeek as $element)
        {
            $countViewsWeek += $element['views'];
        }

        return $countViewsWeek;
    }

    /*
        Просмотров за день
    */
    /**
     * @return int|mixed
     */
    public static function countViewsDay()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = "SELECT * FROM visits";
        $result = mysqli_query($GLOBALS['mysqli'], $sql);

        $k = 0;
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $arCountViewsDay[$k] = $record;
            $k++;
        }

        $date = date("Y-m-d");
        $countViewsDayDate = '';
        $countViewsDay = 0;
        foreach($arCountViewsDay as $element)
        {
            if($element['date'] == $date)
            {
                $countViewsDayDate=$element['date'];
                $countViewsDay=$element['views'];
                break;
            }
        }

        return $countViewsDay;
    }

    /**
     * @param string $lang
     * @return string
     */
    public static function getGeo($lang='ru')
    {
        $city = '';
        $city = '<script type="text/javascript">
                    $(document).ready(function () {
                        let settings = {
                            "url": "http://free.ipwhois.io/json/'.self::getIP().'?lang='.$lang.'",
                            "method": "POST",
                        }
                        
                        $.ajax(settings).done(function (response) {
                            response.city;
                        });
                    });
                </script>';
        return $city;
    }
}