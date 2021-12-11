<?php
if (isset($_POST['create'])) {
    $class=$_POST['create'];
    include 'db/dbutil.php';

    $con=mysqli_connect('localhost','root','','users');
    $sql="CREATE TABLE `$class`( `id` int(5));";
    $sql.="INSERT INTO `$class`(`id`) SELECT `id` FROM `users`";
    $res=mysqli_multi_query($con,$sql);
    if ($res) {

    	echo "create successfully";
    }else{
    	echo "sorry";
    }
  }  ?>