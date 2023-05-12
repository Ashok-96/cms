<?php
session_start();

$res=[];
include('../../Common files/db/dbutil.php');
$db=new dbutil();
$sql="SELECT COUNT(`Firstname`)  FROM `registration`;";
$sql.="SELECT COUNT(DISTINCT(`combination`)) FROM `combinations`;";
$sql.="SELECT COUNT(DISTINCT(`department`)) FROM `departments`;";
$sql.="SELECT COUNT(`Firstname`) FROM `teachers`;";


$res_2=$db->multiQuery($sql);
$res['counts']=$res_2;

if(isset($_POST['isloggedin'])){
    if(isset($_SESSION['admin'])){
      $res['isloggedin']=true;
    }else{
      $res['isloggedin']=False;
      
    }
    echo json_encode($res);

  }
  ?>
