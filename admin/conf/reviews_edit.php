<?php
if (isset($_REQUEST)) {
    $nId = $_POST['id'];
    $sAnswer = $_POST['answer'];
    $hide = $_POST['hide'];

    require '../core/ACConnect.php';
    $query = ACDatabase::set("UPDATE reviews SET answer = ?, hide = ? WHERE id = ?", array($sAnswer, $hide, $nId));
}