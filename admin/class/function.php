<?php

//алфавит
/**
 * @param $string
 * @return string
 */
function rus2translit($string)
{
    $converter = array(
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
        'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
        'ь' => '\'', 'ы' => 'y', 'Ъ' => '\'',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

        'А' => 'A', 'Б' => 'B', 'В' => 'V',
        'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
        'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
        'И' => 'I', 'Й' => 'Y', 'К' => 'K',
        'Л' => 'L', 'М' => 'M', 'Н' => 'N',
        'О' => 'O', 'П' => 'P', 'Р' => 'R',
        'С' => 'S', 'Т' => 'T', 'У' => 'U',
        'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
        'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
        'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
    );
    return strtr($string, $converter);
}

//Перевод в транслит
/**
 * @param $str
 * @return string
 */
function str2url($str)
{
    // переводим в транслит
    $str = rus2translit($str);
    // в нижний регистр
    $str = strtolower($str);
    // заменям все ненужное нам на "-"
    $str = preg_replace('~[^-a-z0-9_]+~u', '_', $str);
    // удаляем начальные и конечные '-'
    $str = trim($str, "_");
    return $str;
}

//
/**
 * @return string
 */
function curPageURL()
{
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"]))
        if ($_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

/**
 * @param $in
 * @return string
 */
function filt($in) # Максимальная фильтрация для ввода
{
    return trim(strip_tags(htmlspecialchars(htmlentities($in)))); // Добавить $link, $city = mysqli_real_escape_string($link, $city);
}

/**
 * @param $in
 * @return string
 */
function filtsmall($in) # Минимальная фильтрация для ввода
{
    return trim(mysqli_escape_string($in));
}

/**
 * @param $in
 * @return string|string[]
 */
function filtslash($in) # Фильтрация слешей для вывода
{
    return str_replace("\\", "", $in);
}

//Замена номера на +7
/**
 * @param string $phone
 * @return string|string[]
 */
function phone_format($phone = '')
{
    $val = preg_replace('/[^0-9]/', '', $phone);
    $number = '+7';
    $phone = substr_replace($val, $number, 0, 1);
    return $phone;
}

//Чистка значений при выводе из БД
/**
 * @param array $arg
 * @return string
 */
function see($arg = [])
{
    $arg = htmlspecialchars_decode($arg);
    return $arg;
}

//Удаление всех тегов
/**
 * @param string $str
 * @return string
 */
function tag($str = '')
{
    return strip_tags($str);
}

?>