<?php
include('../../Common files/db/dbutil.php');
$op=[];
$db=new dbutil();
if(isset($_POST['department'])){
    $sql="SELECT * FROM  `departments`";
    $res=$db->queryRequest($sql);
    while($row=$res->fetch_assoc()){
        $op['id'][]=$row['id'];
        $op['department'][]=$row['department'];
        
    }
echo (json_encode($op));
}
if(isset($_POST['add_department'])){
 try{   $sql="INSERT INTO `departments`(`department`)VALUES('".$_POST['Department']."')";
    $res=$db->queryRequest($sql);
    if($res){
        header('Location:./index.html?status=success');
    
}
 } catch(Exception  $e){
    header('Location:./index.html?status=error');
    
 }
}
?>