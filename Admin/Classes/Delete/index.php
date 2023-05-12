<?php

session_start();

include '../../../Common files/db/dbutil.php';


$db = new DButil();

if (isset($_GET)) {

   $sql = "DELETE FROM `subjects` WHERE `id`='".$_GET["id"]."'";

    $result = $db->queryRequest($sql);

    if($result){

        header('location:../index.html?status=success');



    }else{

        header('location:../index.html?status=error');



    }

}

?>