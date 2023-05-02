<?php
$op=[];
include('../../Common files/db/dbutil.php');
$db=new DButil();
if (isset($_POST['Teachers'])) {
  $sql="SELECT * FROM `teachers`";
  $res=$db->queryRequest($sql);
while($row=$res->fetch_assoc()){
    $op['id'][]=$row['id'];
    $op['Firstname'][]=$row['Firstname'];
    $op['Lastname'][]=$row['Lastname'];
    $op['Department'][]=$row['Department'];


}
echo json_encode($op);
}
?>