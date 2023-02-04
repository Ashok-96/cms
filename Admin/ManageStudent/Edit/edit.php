<?php

include '../../db/dbutil.php';
$db = new DButil();
if(isset($_POST['update'])){
    $sql = "UPDATE `users` SET `Firstname`='" . $_POST['fname'] . "', `Lastname`='" . $_POST['lname'] . "', `combination`='" . $_POST['combination'] . "' WHERE `id`='".$_POST['id']."'";
    $result = $db->queryRequest($sql);
    if ($result) {
?>

  <?php
        header('location:../?status=success');
    }else{
        ?>
        
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Something went wrong!</strong> Please try after sometime.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
   <?php }
}
?>