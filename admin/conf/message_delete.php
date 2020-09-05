<?php
if(isset($_POST['id']))
{
    $nId = $_POST['id'];

    require '../core/ACConnect.php';
    $query = ACDatabase::add("DELETE FROM message WHERE id = ?", $nId);

    if ($query)
        echo '1';
    else
        echo '0';
}