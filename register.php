    <?php 
	require_once('db/dbutil.php');
	session_start(); 
	ob_start();
	
	$db = new DButil();
	$sql = "SELECT * FROM admin";
	$result = $db->queryRequest($sql);
?>
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link
rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
crossorigin="anonymous"> 
<script
src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
crossorigin="anonymous"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
crossorigin="anonymous"></script> <script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
crossorigin="anonymous"></script> <link rel="stylesheet"
href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body style="background:rgb(48, 212, 188);" >
<div class="container-fluid" >
  <div class="row justify-content-between  " >
     
      <img class="col-lg-8 col-sm-12 p-0"style=" position: relative;" src="im/register.jpg">
    <div class="col-lg-4  card-body  rounded "    >
 <form class="card card-body p-0" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF'],ENT_NOQUOTES) ?>" >
            <div class="form-group p-2" >
                 <div class="input-group-prepend">
    <span class="input-group-text fa fa-user" id="inputGroup-sizing-default"></span>
        
<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" placeholder="FullName">
</div>
</div>

     <div class="form-group p-2">       
    <div class="input-group-prepend">
    <span class="input-group-text fa fa-calendar" id="inputGroup-sizing-default"></span>
        
  <input type="text" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="year" pattern="[0-9]" maxlength="1" placeholder="year">
</div>
</div>
 <div class="form-group p-2 ">  
<div class="input-group justify-content-start">
  <div class="input-group-prepend">
    <div class="">
      <input type="radio" class="plain-text" value="Male" name="gender" aria-label="Radio button for following text input">&nbsp<i class="fa fa-male" ></i><b> Male
    </div>
  </div>&nbsp&nbsp
      <div class="">
      <input type="radio" class="plain-text"value="Female" name="gender" aria-label="Radio button for following text input">&nbsp<i class="fa fa-female" value="Female"></i> Felmale</b>
    </div>
  
</div>
</div>
 <div class="form-group p-2">  
<div class="input-group">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="radio" class="plain-text" name="combination" value="BCA" >&nbsp<b> BCA
    </div>
  </div>&nbsp&nbsp
      <div class="input-group-text">
      <input type="radio" class="plain-text" name="combination"  value="BSC">&nbsp BSC</b>
    </div>
  <input type="text" name="group" class="form-control" placeholder="Please enter the  appropriate group">    
</div>
</div>
<div class="form-group p-2">
     <div class="input-group-prepend">
    <span class="input-group-text fa fa-envelope" id="inputGroup-sizing-default"></span>
        
  <input type="text" class="form-control " name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email">
</div> 
    
</div>
<div class="form-group p-2">
     <div class="input-group-prepend">
    <span class="input-group-text fa fa-phone" id="inputGroup-sizing-default"></span>
        
  <input type="text" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="phno" pattern="[0-9]{10}"  placeholder="Phone number">
</div> 
    
</div>
<div class="form-group p-2">
     <div class="input-group-prepend">
    <span class="input-group-text fa fa-user-circle" id="inputGroup-sizing-default"></span>
        
  <input type="text" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="username"   title="username should be alpha-numeric" placeholder="username">
</div> 
    
</div>
<div class="form-group p-2">
     <div class="input-group-prepend">
    <span class="input-group-text fa fa-key" id="inputGroup-sizing-default"></span>
        
  <input type="password" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="password" maxlength="8" placeholder="password">
</div> 
    
</div>
 <div class="form-group p-2">
    <input class="btn btn-success" type="submit" name="submit" value="Submit">
      <input class="btn btn-primary" type="reset" name="reset" value="Reset">
 </div>
    
        </form>
    </div>
    </b>
  </div>
  <script >
    $(function(){
      $("input[name*='name']").keyup(function(){
        var name=$("input[name*='name']").val()
        if(name.length<10){
           $("input[name='name']").removeClass("bg-light"); 
           $("input[name='name']").addClass("bg-danger");
        }else {
           $("input[name='name']").removeClass("bg-danger");
           $("input[name='name']").addClass("bg-success");

        }

      })
      $("input[name*='name']").focusout(function(){
           $("input[name='name']").addClass("bg-light");
             if(name.length<10){ 
           $("input[name='name']").addClass("border-success");
        }else {
           $("input[name='name']").toggleClass("border-info");

        }

});
      });
      
  </script>
<?php

  if (isset($_POST["submit"])) {
        $name=htmlspecialchars($_POST["name"]);
        $year=htmlspecialchars($_POST["year"]);
        $combination=htmlspecialchars($_POST["combination"]);
        echo $gender=htmlspecialchars($_POST["gender"]);
        $group=htmlspecialchars($_POST["group"]);
        $phno=htmlspecialchars($_POST["phno"]);
        $username=htmlspecialchars($_POST["username"]);
        $password=htmlspecialchars($_POST["password"]);
        $mail=htmlspecialchars($_POST["email"]);
        if ($combination=='BCA') {
            $query1="INSERT INTO `admin`(`name`, `Gender`, `year`, `combination`, `reg_no`, `username`, `email`, `phonenumber`, `password`) VALUES('".$name."','".$gender."','".$year."','".$combination."','12456','".$username."','".$mail."','".$phno."','".md5($password)."')";
            $res=$db->queryRequest($query1);
            if ($res) {
        echo '<script>swal("Good job!", "You clicked the button!", "success");
      </script>';    
            }else{

 echo '<script>swal("Sorry!", "You clicked the button!", "error");
      </script>';
            
        }
      }else{
            $query1="INSERT INTO `admin`(`name`, `Gender`, `year`, `combination`, `reg_no`, `username`, `email`, `phonenumber`, `password`) VALUES('".$name."','".$gender."','".$year."','".$group."','12456','".$username."','".$mail."','".$phno."','".md5($password)."')";
            $res=$db->queryRequest($query1);
          if ($res) {
            
echo '<script>swal("Good job!", "You clicked the button!", "success");
      </script>';
      }else{
echo '<script>swal("sorry!", "", "error");
      </script>';
             }
        }
        
  
} ?>

    </body>
</html>