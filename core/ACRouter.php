<?php

class ACRouter{
    public $url;

    /**
     * @return false|string[]
     */
    public static function getUrl(){

        $url = explode('/', $_SERVER['REQUEST_URI']);

        $url['PATH'] = $_SERVER['REQUEST_URI'];

        if(!empty($url[1]) && $url[1] != '')
        {
            $url['PAGE'] = '/'.$url[1];
        }
        if (!empty($url[2]) && $url[2] != '')
        {
            $url['ITEM'] = '/'.$url[2];
        }
        if (!empty($url[3]) && $url[3] != '')
        {
            $url['LIST'] = '/'.$url[3];
        }

        return $url;
    }
}
