<?php
include('../../Common files/db/dbutil.php');
$op=[];
$db=new dbutil();
if(isset($_POST['classes'])){
    $sql="SELECT * FROM `subjects`";
    $res=$db->queryRequest($sql);
    while($row=$res->fetch_assoc()){
        $op['id'][]=$row['id'];
        $op['combination'][]=$row['combination'];
        $op['semester'][]=$row['semester'];
        $op['subject_name'][]=$row['subject_name'];
        $op['subject_code'][]=$row['subject_code'];
        $op['Teacher'][]=$row['Teacher'];


        
    }
echo (json_encode($op));
}
if(isset($_POST['add_department'])){
 try{   $sql="INSERT INTO `combinations`(`combination`)VALUES('".$_POST['Department']."')";
    $res=$db->queryRequest($sql);
    if($res){
        header('Location:./index.html?status=success');
    
}
 } catch(Exception  $e){
    header('Location:./index.html?status=error');
    
 }
}
?>