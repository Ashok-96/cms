<?php
  session_start();
   $pageName=explode('/', $_SERVER['REQUEST_URI'])[2];
if (strlen($_SESSION["type"]) == 0) {
    header("Location:demo.php");
}
 else {
 ?>
 <!DOCTYPE html>
<html>
<head>
            <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Edit-user</title>


    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   </head>
 <body>
<?php include 'topbar.php';  ?>  
<div  class="container mt-5 pt-5">
  <div class="row">
    <div class="col-lg-6">
      

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
   <div class="form-group">
<div class="form-floating mb-3">
  <input type="text" class="form-control" name="name"id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput"><?php echo $_SESSION['name']; ?></label>
</div>
   <div class="form-floating mb-3">
  <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput"><?php echo $_SESSION['mail']; ?></label>
</div>
<div class="form-floating mb-3">
  <input type="password" class="form-control" name="new_password" id="floatingInput" placeholder="name@example.com" >
  <label for="floatingInput">New Password</label>
</div>
<div class="form-floating mb-3">
  <input type="password" class="form-control" name="cnf_password" id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput">Confirm Password</label>
</div>
<div class="form-floating mb-3">
  <input type="password" class="form-control" name="cur_password" id="floatingInput" placeholder="name@example.com" required>
  <label for="floatingInput">Current Password</label>
</div>
<input class="btn btn-success float-end" type="submit" name="submit" value="submit">
  </form>
      </div>
  </div>
  </div>
 </body>
     <?php
include 'db/dbutil.php';
$db=new dbutil();
$sql="SELECT `password` FROM `users` WHERE `id`='".$_SESSION['userID']."'";
$res=$db->queryRequest($sql);
while($row=$res->fetch_assoc()){
  $curpassword=$row['password'];
}    

if(isset($_POST['submit'])){
  if (md5($_POST['cur_password'])==$curpassword) {
    
  if (strlen($_POST['new_password'])==0) {
 if (strlen($_POST['name'])>0&&strlen($_POST['email'])>0){
        echo $_POST['name'].''.$_POST['email'];
          $sql="UPDATE `users` SET `email`='".$_POST['email']."',`name`= '".$_POST['name']."' WHERE  `id`=".$_SESSION['userID']."";
                    $res=$db->queryRequest($sql);
             if ($res) {
              echo "updated successfully!";
              header('Location:edit-user.php?status=success');
            }

        }
          elseif(strlen($_POST['email'])>0){
          $sql="UPDATE `users` SET `email`='".$_POST['email']."' WHERE  `id`=".$_SESSION['userID']."";
          $res=$db->queryRequest($sql);
    if ($res) {
    echo "updated successfully!";
    header('Location:edit-user.php?status=success');
      }

          }elseif(strlen($_POST['name'])>0){
          $sql="UPDATE `users` SET `name`='".$_POST['name']."' WHERE  `id`=".$_SESSION['userID']."";
          $res=$db->queryRequest($sql);
    if ($res) {
    echo "updated successfully!";
    header('Location:edit-user.php?status=success');
      }


          }
     }else{
      if (md5($_POST['new_password'])==md5($_POST['cnf_password'])) {
      if (strlen($_POST['name'])>0&&strlen($_POST['email'])>0){
    $sql="UPDATE `users` SET `email`='".$_POST['email']."',`name`='".$_POST['name']."',`password`='".md5($_POST['cnf_password'])."' WHERE `id`='".$_SESSION['userID']."'";
          $res=$db->queryRequest($sql);
    if ($res) {
    echo "updated successfully!";
    header('Location:edit-user.php?status=success');
      }
        }
          elseif(strlen($_POST['email'])>0){
        $sql="UPDATE `users` SET `email`='".$_POST['email']."',`password`='".md5($_POST['cnf_password']) ."'WHERE  `id`='".$_SESSION['userID']."'";
          $res=$db->queryRequest($sql);
    if ($res) {
    echo "updated successfully!";
    header('Location:edit-user.php?status=success');
      }

          }elseif(strlen($_POST['name'])>0){
  $sql="UPDATE `users` SET `name`='".$_POST['name']."',`password`='".md5($_POST['cnf_password'])."'WHERE  `id`=".$_SESSION['userID']."";
     $res=$db->queryRequest($sql);
    if ($res) {
    echo "updated successfully!";
    header('Location:edit-user.php?status=success');
      }

          }else{
      $sql="UPDATE `users` SET `password`='".md5($_POST['cnf_password'])."'WHERE  `id`=".$_SESSION['userID']."";
          $res=$db->queryRequest($sql);
    if ($res) {
    echo "updated successfully!";
    header('Location:edit-user.php?status=success');
      }
          }
     }

      }
  }
     }

  
        
                            ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

<!--
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
</script>--!>
   </body>
   </html>
 <?php } ?>