<?php
session_start();
include '../../db/dbutil.php';
$db = new DButil();
if (isset($_GET)) {
    $sql = "DELETE FROM `users` WHERE `id`='".$_GET["id"]."'";
    $result = $db->queryRequest($sql);
    if($result){
        header('location:../?status=success');

    }else{
        header('location:../?status=sorry');

    }
}
?>