<?php


class ACErrors
{
    /**
     * @param $nError
     */
    public static function getError($nError)
    {
        switch ($nError):
            case 1:
                return $nError = "Error 1: The array is empty. Check call parameters.";
                break;
            case 2:
                echo "Error 2: Error connecting to database. Check connection settings or database";
                break;
            default:
                echo "Error";
        endswitch;
    }
}