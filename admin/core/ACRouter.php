<?php

class ACRouter{

    public $url;

    /**
     * @return false|string[]
     */
    public static function parceUrl(){

        $url = explode('/', $_SERVER['REQUEST_URI']);

        $url['PATH'] = $_SERVER['REQUEST_URI'];

        if(!empty($url[1]) && $url[1] != '')
        {
            $url['PAGE'] = $url[1];
        }
        if (!empty($url[2]) && $url[2] != '')
        {
            $url['ITEM'] = $url[2];
        }
        if (!empty($url[3]) && $url[3] != '')
        {
            $url['LIST'] = $url[3];
        }

        return $url;
    }

    /**
     * @return false|string[]
     */
    public static function getUrl()
    {
        return explode('/', $_SERVER['REQUEST_URI']);
    }

    /**
     * Подключение шаблона
     */
    public static function url()
    {
//        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//
//        $segments = explode('/', trim($uri, '/'));
//
//        if($segments[0] === 'admin')
//        {
//            if($segments[1] === 'users')
//                $file = 'admin_users.php';
//            elseif($segments[1] === 'products')
//                $file = 'admin_products.php';
//            else
//                $file = 'admin_404.php';
//        }
//        else
//        {
//            if($uri === '/')
//                $file = 'template/main.php';
//            else
//                $file = 'error/page.php';
//        }
//
//        require $file;

        $url = self::parceUrl();

        if($url['PATH'] === '/')
        {
            require "template/main.php";
        }
        else{
            require "template/page.php";
        }
    }
}
