<?php
require '../core/ACConnect.php';

$uploads_dir = '../../upload';

if($_POST['list'])
{
    if($_REQUEST['delete'] == 'Y')
    {
        $query = ACDatabase::set("UPDATE list SET img = ? WHERE id = ?", array(NULL, $_POST['id']));
    }
    else {
        foreach ($_FILES["images"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["images"]["tmp_name"][$key];
                $type = stristr($_FILES["images"]["type"][$key], '/');
                $type = str_replace('/', '.', $type);
                // basename() может предотвратить атаку на файловую систему;
                // может быть целесообразным дополнительно проверить имя файла
                $name = md5(basename($_FILES["images"]["name"][$key])) . $type;
                move_uploaded_file($tmp_name, "$uploads_dir/$name");

                $query = ACDatabase::set("UPDATE list SET img = ? WHERE id = ?", array($name, $_POST['id']));
            }
        }
    }
}

if($_POST['reviews'])
{
    print_r($_POST);
    if($_REQUEST['delete'] == 'Y')
    {
        $query = ACDatabase::set("UPDATE list SET img = ? WHERE id = ?", array(NULL, $_POST['id']));
    }
    else {
        foreach ($_FILES["images"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["images"]["tmp_name"][$key];
                $type = stristr($_FILES["images"]["type"][$key], '/');
                $type = str_replace('/', '.', $type);
                // basename() может предотвратить атаку на файловую систему;
                // может быть целесообразным дополнительно проверить имя файла
                $name = md5(basename($_FILES["images"]["name"][$key])) . $type;
                move_uploaded_file($tmp_name, "$uploads_dir/$name");

                $query = ACDatabase::set("UPDATE list SET img = ? WHERE id = ?", array($name, $_POST['id']));
            }
        }
    }
}