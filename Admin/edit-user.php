<?php
session_start();
 ?>
 <!DOCTYPE html>
<html>
<head>
  <?php include 'db/dbutil.php'; 
  class GetUser extends dbutil
  {
      function details($teacher){
    $sql="SELECT * FROM `admin` WHERE `username`='$teacher'";
    $res=parent::queryRequest($sql);
    if ($res) {
    while ($row=$res->fetch_assoc()) {
      $arra['name']=$row['name'];
    }
    return $arra;
    }else{
      $arra['msg']='sorry';
    }
    }
  }
$teacher=$_SESSION['Teacher'];
  $cls=new GetUser();
  $rus=$cls->details($teacher);

   ?>
            <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Edit-user</title>


    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   </head>
   <body  style="background: rgba(0, 128, 130, 0.15);">
     <?php include 'topbar.php';  ?>
     <div class="container pt-5">
       <div class="row mt-3 p-3 justify-content-start  col-lg-fixed-bottom">
<div class=" card card-shadow p-2 col-lg-6 col-xs-12 border-5 border-secondary rounded-5 rounded-lg">
  <form method="post" action="<?php echo htmlspecialchars('edit-user.php'); ?>">
    <div class="form-group input-group">
      <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
  </div>                                            
    <input type="text" class="form-control" name="username" value="<?php echo $rus['name']; ?>" readonly="name" >
  </div>
    <div class="form-group input-group">
      <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle"></i></span>
  </div>
    <input class="form-control" type="text" name="username" value="<?php echo $_SESSION['Teacher']; ?>"  >
  </div>

         <div class="form-group input-group">
      <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
  </div>                                            
    <input type="password" class="form-control" maxlength="10" name="newpassword"  placeholder="New password" title="password must contain 10 characters that are of at least one number, and one uppercase and lowercase letter:" >
     <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><a href="javascript:void(0)" data-toggle="popover" title="password"  data-trigger="focus" data-content="password must be alphanumeric and must be in length >=10"><i class="fa fa-exclamation-circle"></i></a></span>
   
  </div>       
    </div>
             <div class="form-group input-group">
      <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
  </div>                                            
    <input type="password" class="form-control" name="cnfpassword"   placeholder="Confirm password"  maxlength="10" >
     <span class="input-group-text"   id="basic-addon1"><a href="javascript:void(0)" id="status">
       
     </a></span>
  </div>
          <div class="form-group input-group">
      <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
  </div>                                            
    <input type="password" class="form-control" name="curpassword"   placeholder="Current password" >
  </div>
  <div class="card-foot">
  </div>
  <input type="submit" name="submit" value="submit" class="btn btn-primary">
</form>
  </div>
     </div>
     <?php

    
 if (!empty($_POST)) {
if(isset($_POST['submit'])){
 $name=$_SESSION['Teacher'];
 $newpassword=md5($_POST['newpassword']);
 $cnfpassword=md5($_POST['cnfpassword']);
 $curpassword=md5($_POST['curpassword']);
 if ($cnfpassword==$newpassword) {
     $sql="SELECT `password` FROM `admin` WHERE `name`='$name'";
     $result=$db->queryRequest($sql);
while($row = $result->fetch_assoc())  {
        $pwd=$row['password'];
        if ($pwd==$curpassword) {
          $update="UPDATE `admin` SET `password`='$newpassword' WHERE `username`='$name'";
          $res=$db->queryRequest($update);
          if ($res) {
                echo '<script>
                window.location.href="edit-user.php?status=success";
                swal("success!", "password updated successfully!", "success");</script>';
           } else{
           }
        }else{
                echo '<script>swal("sorry!", "please enter the appropriate current password ", "warning");</script>';
          
        }
     }
 }else{
                echo '<script>swal("sorry!", "please enter the appropriate password ", "warning");</script>';
  
 }
 }
  } 
        
                            ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
    </div>
         

</body>
   </body>       
</footer>
<script >
  $(function(){
    setTimeout(function(){
      $("#loader").hide();
      $("#content").show();
      $('[data-toggle="popover"]').popover(); 
      $('input[name="cnfpassword"]').on('keyup',function(){
              var newpass=$('input[name="newpassword"]').val();
        var cnfpassword=$('input[name="cnfpassword"]').val();
         if (newpass.length>0) {
        if (newpass==cnfpassword ) {
            $('input[name="cnfpassword"]').removeClass('border-danger');
        $('input[name="cnfpassword"]').addClass('border-success');
                $("#status").removeClass('fa fa-ban text-danger');
        $("#status").addClass('fa fa-check-circle text-success');
       
        }else{
               $('input[name="cnfpassword"]').removeClass('border-success');
        $('input[name="cnfpassword"]').addClass('border-danger');
        $("#status").removeClass('fa fa-check-circle text-success');
                $("#status").addClass('fa fa-ban text-danger' );
        }
}
      })
      $('input[name="newpassword"]').on('change keyup ',function(){
        var newpass=$('input[name="newpassword"]').val();
        var cnfpassword=$('input[name="cnfpassword"]').val();
        if (newpass.length>0) {


        if ((newpass==cnfpassword) && (cnfpassword==newpass) ) {
            $('input[name="cnfpassword"]').removeClass('border-danger');
        $('input[name="cnfpassword"]').addClass('border-success');
                $("#status").removeClass('fa fa-ban text-danger');
        $("#status").addClass('fa fa-check-circle text-success');
       
        }else{
               $('input[name="cnfpassword"]').removeClass('border-success');
        $('input[name="cnfpassword"]').addClass('border-danger');
        $("#status").removeClass('fa fa-check-circle text-success');
                $("#status").addClass('fa fa-ban text-danger' );


          

        }
      }
      })
    },800)
  })
</script>
   </body>
   </html>
 <?php  ?>