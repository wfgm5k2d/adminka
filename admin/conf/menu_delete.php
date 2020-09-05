<?php
if(isset($_POST['id']))
{
    $nId = $_POST['id'];

    require '../core/ACConnect.php';
    require '../class/ACMenu.php';
    $query = ACMenu::delete($nId);
}