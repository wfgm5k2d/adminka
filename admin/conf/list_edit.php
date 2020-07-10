<?php

include 'function.php';

if(isset($_REQUEST['name']) or isset($_REQUEST['descript']) or isset($_REQUEST['content']) or isset($_REQUEST['img'])){
 
    $nId = $_REQUEST['id'];
    $sName = $_REQUEST['name'];
    $sDescript = $_REQUEST['descript'];
    $sContent = $_REQUEST['content'];
    $sUrl = str2url($sName);

    require '../core/ACConnect.php';
    $query = ACDatabase::set("UPDATE list SET name = ?, url = ?, descript = ?, content = ? WHERE id = ?", array($sName, $sUrl, $sDescript, $sContent, $nId));

    if ($query)
    	echo 1;
    else
    	echo 0;
}

//if($_POST['parentsort'] && $_POST['parentsort'] != '' && $_POST['idsort'] && $_POST['idsort'] != '')
//{
//    $sort = $_POST['sort'];
//    $id = $_POST['idsort'];
//
//    $query ="UPDATE list SET sort=1 WHERE id = '$id'";
//    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
//
//    if ($result)
//        header('Location: ../inc/list_view.php');
//    else
//        echo 'Ошибка при обработке';
//}
?>