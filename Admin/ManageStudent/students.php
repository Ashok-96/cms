<?php
$res=[];
include('../../Common files/db/dbutil.php');
$db=new DButil();
if(isset($_POST['Students'])){
    $sql="SELECT * FROM `registration`";

    $result=$db->queryRequest($sql);
    while($row=$result->fetch_assoc()){
        $res['id'][]=$row['id'];
        $res['Firstname'][]=$row['Firstname'];
        $res['Lastname'][]=$row['Lastname'];
        $res['Combination'][]=$row['Combination'];
        $res['reg_no'][]=$row['reg_no'];
        $res['semester'][]=$row['semester'];
        $res['Phone'][]=$row['Phone'];
    }
    $sql="SELECT DISTINCT(`combination`) FROM `combinations`";
    $result=$db->queryRequest($sql);
    while($row=$result->fetch_assoc()){
        $res['u_combinations'][]=$row['combination'];
       
    }
    echo json_encode($res);
}

?>