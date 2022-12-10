  <?php 
  use LDAP\Result;
require_once('../Common files/db/dbutil.php');
session_start(); 
ob_start();
  $db = new DButil();

  $sql = 'select *  from `configurations` WHERE `Entities`="Registration"';
  $result = $db->queryRequest($sql);
  while($row=$result->fetch_assoc()){
    echo $row['Registration'];
  }
$db = new DButil();
$sql = "SELECT * FROM admin";
$result = $db->queryRequest($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
</head>
<body>
  <div class="container-fluid bg-dark bg-gradient p-5">
    <div class="p-5 ">
    <form method="post"class="shadow bg-white p-5 col-lg-6 border border-dark" action=<?php echo $_SERVER["PHP_SELF"] ?>>

    <div class="form-group p-2">
        <b><label  class="text-dark"for="fname">Firstname</label></b>
        <input class="form-control" type="text" name="fname"required />
    </div>
      <div class="form-group p-2">
        <b><label  class="text-dark"for="fname">Lastname</label></b>
        <input class="form-control" type="text" name="lname"required />
      </div>

      <div class="form-group p-2">
        <b><label  class="text-dark"for="phone">Phonenumber</label></b>
        <input class="form-control" type="number" name="phone"required />
      </div>
      <div class="d-flex justify-content-start">
      <div class="form-group p-2">
        <label  class="text-dark"for="gender ">Male</label>
        <input class="" type="radio" name="gender" value='Male'required />
      </div>
      <div class="form-group p-2">
        <label  class="text-dark"for="gender">Female</label>
        <input class="" type="radio" name="gender" value='Female'required />
      </div>
      </div>
      <div class="form-group p-2">
        <b><label  class="text-dark"for="username">Combination</label></b>
        <input class="form-control" type="text" name="Combination"required />
      </div>
      <div class="form-group p-2">
        <b><label  class="text-dark"for="username">Username</label></b>
        <input class="form-control" type="text" name="username"required />
      </div>
      <div class="form-group p-2">
        <b><label  class="text-dark"for="password">Password</label></b>
        <input class="form-control" type="password" name="password"required />
      </div>
      <div class="form-group p-2">
        <input class="btn btn-dark bg-gradient" type="submit" name="submit" value="Register"required />
      </div>
    </form>
    </div>
  </div>
</body>
</html>
<?php
$input = [];
if (isset($_POST["submit"])) {
  foreach($_POST as $key=>$val){
    if($key=='password'){
      $input[$key]=md5($val);
    }else{
      $value=htmlspecialchars($val);
      $input[$key] = $value;
    }
  }
 $sql='INSERT INTO `users` (`Firstname`,`Lastname`,`Gender`,`combination`, `username`, `phonenumber`, `password`) VALUES("'.$input['fname'].'","'.$input['lname'].'","'.$input['gender'].'","'.$input['Combination'].'","'.$input['username'].'","'.$input['phone'].'","'.$input['password'].'")';
$result=$db->queryRequest($sql);
if($result){
  echo "Registed successfully";
  header('Location: ../?status=Registed successfully');
}else{
  header('Location: ./register.php');
  echo "Something wemt wrong!!";

}
  }
?>
