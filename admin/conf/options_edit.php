<?php

include('conf.php');
include('function.php');
     
// если запрос POST

if(isset($_POST['title']) || isset($_POST['description']) || isset($_POST['og_title']) || isset($_POST['og_description']) || isset($_POST['site_name']) || isset($_POST['keywords']) || isset($_POST['pass']))
{
    $title = filt($_POST['title']);
    $description = filt($_POST['description']);
    $og_title = filt($_POST['og_title']);
    $og_description = filt($_POST['og_description']);
    $site_name = filt($_POST['site_name']);
    $keywords = filt($_POST['keywords']);
    $password = filt($_POST['pass']);
    $pass = md5($password);

    $query ="UPDATE options SET title='$title', description='$description', og_title='$og_title', og_description='$og_description', site_name='$site_name', keywords='$keywords', pass='$pass'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    if ($result)
    	echo '1';
    else
    	echo '0';
}