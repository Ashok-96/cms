<?php
session_start();
include('../../Common files/db/dbutil.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</head>
<body>
<?php include('../topbar.php');?>
<div class="container-fluid">
<h3>Classes Assigned</h3>
<div class="col-5">
<select class="form-control " name="classes">
<option>---Select Class---</option>
<?php
$db=new dbutil();
$sql="SELECT * FROM `subjects` WHERE `Teacher`='".$_SESSION['teacher']."'";
echo $sql;
$res=$db->queryRequest($sql);
while($row=$res->fetch_assoc()){
    echo"<option value='".$row['subject_code']."'>".$row['subject_code']."</option>";
}
?>
</select>
</div>


<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
</div>
</div>
<script>
        $(".form-check-input").change(function(){
        if($(".form-check-input").is(":checked") ){
        $(".form-check-input").css({'border':'0'})  
        $(".form-check-input").removeClass("bg-danger");
        $(".form-check-input").addClass('bg-success')
        $("label[for='flexSwitchCheckDefault']").text('Present')}else{
        $(".form-check-input").removeClass("bg-success");
        $(".form-check-input").addClass("bg-danger");
        $("label[for='flexSwitchCheckDefault']").text('Absent')


     }
       
    })
</script>
    
</body>
</html>
