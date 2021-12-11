  
<?php

$conn = mysqli_connect("localhost","root","","users");

$id=$_SESSION["userID"];
$re = mysqli_query($conn,"SELECT * FROM `notification` WHERE `SID`='$id'  AND `status`='New' ");
   while ($res=mysqli_fetch_array($re)) {
echo '<div class="">
<div class="toast fade  show m-2" data-autohide="false" style=" top:200; right: 0;">
    <div class="toast-header">
      <strong class="mr-auto text-primary"><span class="fa fa-bell"></span> Notification</strong>
      <small class="text-muted"></small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
    </div>
    <div class="toast-body">
      An Information form <b class="text-primary">'. $res["category"].' </b>Related
      <b class="text-info">'.$res["sub_category"].'</b> For more information
      <a class="alert-link" id='.$res["id"].' href="read_notification.php"> Click here for more Information...</a> 
    </div>
</div>
</div>';
?>
<script type="text/javascript" src="js/alert.js"></script>
<?php  }?> 

