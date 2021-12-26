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
  $sql='UPDATE `complaints` SET `status`="New" ,`stage`="'.$stage.'",`resolution`="'.htmlspecialchars($remarks) .'" WHERE `tkt_id`="'.$id.'"';
  $res=$db->queryRequest($sql);
  if ($res) {
echo "<script>window.location.href='read_message.php?status=success'</script>";
  }else{
    print_r($_POST);
    echo $sql;
    echo $id;
    echo $cat;
    echo $remarks;
}
}
}else{
  if (isset($_FILES['upload']['name'])) {
    $folder='./resolution/';
    $filename=$_FILES['upload']['name'];
    $file_tmpname=$_FILES['upload']['tmp_name'];
    $file_name_array=explode(".",$filename);
    $path=$folder.$filename;
    $res=move_uploaded_file($file_tmpname,$path);
    if($res){
      $function_number=$_GET['CKEditorFuncNum'];
      $url='resolution/'.$filename;
      $message="";
      echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('$function_number.','$url.','$message')</script>";
    }else{
      echo "!moved successfully!";

    }
    

  }

}  ?>