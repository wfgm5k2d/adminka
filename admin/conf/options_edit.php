<?php

include('function.php');

if (isset($_REQUEST)) {
    $sTitle = ($_POST['title']) ? filt($_POST['title']) : '';
    $site_name = ($_POST['site_name']) ? filt($_POST['site_name']) : '';
    $email = ($_POST['email']) ? filt($_POST['email']) : '';
    $sDescription = ($_POST['description']) ? filt($_POST['description']) : '';
    $og_title = ($_POST['og_title']) ? filt($_POST['og_title']) : '';
    $og_description = ($_POST['og_description']) ? filt($_POST['og_description']) : '';
    $keywords = ($_POST['keywords']) ? filt($_POST['keywords']) : '';
    $password = ($_POST['pass']) ? filt($_POST['pass']) : '';
    $pass = md5($password);

    require '../core/ACConnect.php';
    $query = ACDatabase::set("UPDATE options SET title = ?, site_name = ?, email =?, description = ?, og_title = ?, og_description = ?, keywords = ?", array($sTitle, $site_name, $email, $sDescription, $og_title, $og_description, $keywords));

    $sitePass = ACDatabase::getValue("SELECT pass FROM options");
    if($sitePass !== $password)
    {
        $query = ACDatabase::set("UPDATE options SET pass = ?", array($pass));
    }
}