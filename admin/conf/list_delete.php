<?php

if(isset($_POST['id']))
{
    $nId = $_POST['id'];

    require '../core/ACConnect.php';
    require '../class/ACLists.php';
    $query = ACLists::delete($nId);
}