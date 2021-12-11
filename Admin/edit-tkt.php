<?php
include 'db/dbutil.php';
if (isset($_POST['submit'])) {
  $id=$_POST['tktid'];
  $cat=$_POST['category'];
  $remarks=$_POST['resel'];
   $stage=$_POST['stage'];
  if ($stage=="----Select----") {
echo "<script>window.location.href='read_message.php?status=enterthei/pproperly'</script>";
     
   }else{
       $db = new dbutil();
  $sql='UPDATE `complaints` SET `status`="New" ,`stage`="'.$stage.'",`resolution`="'.$remarks.'" WHERE `tkt_id`="'.$id.'"';
  $res=$db->queryRequest($sql);
  if ($res) {
echo "<script>window.location.href='read_message.php?status=success'</script>";
  }else{
    echo $sql;
    echo $id;
    echo $cat;
    echo $remarks;
    

}
}
}  ?>