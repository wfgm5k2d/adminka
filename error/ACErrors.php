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
                echo "Error 1: The array is empty. Check call parameters.";
                break;
            default:
                echo "Error";
        endswitch;
    }
}