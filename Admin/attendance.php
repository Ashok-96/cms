
<?php
include 'mark_attendance.php';
session_start();
error_reporting(0);
$attd = new Attendance;
if (strlen($_SESSION["Teacher"])==0) {
    header("Location:index.php");
}
if(isset($_SESSION["Teacher"])) { 
        $class=$_SESSION["class"];
}  
?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/dashboard.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="./css/switch.css"/>

<script type="text/javascript" src="js/teacher.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Attendance</title>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap4.min.js"></script>

</head>
<body>
<?php  include 'topbar.php';
if(isset($_GET['date'])){
        $date=$_GET['date'];
      }else{
      $date=date('d-M-Y');           
      } 
if (date('l',strtotime($date))=='Sunday') {
  echo '<b class="display-4">Today is non-working day!<br/> Happy weekend! :)</b>';
} else{ 

$attd->AddData();
  ?>
<div class="container" >
  <div class="row">
    <div class="col-lg-8">
<table id="example" class="table table-bordered table-sm" style="width:100%">
  <thead>
    <tr>
      <th>Name</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
<?php

$class=$_SESSION['class'];
$nsql="SELECT * FROM `users` INNER JOIN `$class` ON `$class`.id=`users`.id;";
$re=$attd->query($nsql);       
$strenght=$re->num_rows;
if($strenght==0){
echo "need to add users!";
$sql="SELECT `id` FROM `users` WHERE `year`='".explode('/', $_SESSION['class'])[1]."'";
$re=$attd->query($sql);       
while($row=$re->fetch_array()){
  $sids[]=$row["id"];
} foreach ($sids as $key) {
  $add="INSERT INTO `$class` (`id`) VALUES ($key)";
$re=$attd->query($add);
}
}else{

$attd->listUsers($nsql,$date);
}
?>
</tbody>
</table> 

</div>
<div class="col-lg-4">
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow">
      <div class="card-body">
      <h5 class="card-title border-bottom">
        <?php  echo implode(" ",explode('_',explode('/',$_SESSION['class'])[2]) )."";  ?>
      </h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo date('d-M-y')."'s summary";  ?></h6>
          <ul class="list-group list-group-flush">
    <li class="list-group-item">Total Strength:&nbsp;<?php echo $strenght;   ?></li>
    <li class="list-group-item">No of Presenties:&nbsp;<span id="Presenties"><?php echo $presenties;   ?></span></li>
  </ul>
      </div> 
      </div>
    </div>
  </div>
  <div class="row">
    <div class="form-group">
    <label for="date">Marked Day</label>
        
      <select id="date" class="form-control">
        <option selected >---select----</option>
        <?php $sql="SHOW COLUMNS FROM `".$_SESSION['class']."` WHERE`Field` REGEXP '[0-31]'";
        $res=$attd->query($sql);
        while ($row=$res->fetch_assoc()) {
          if ($row['Field']==$_GET['date']) {
          ?>
          <option value="<?php echo $row['Field'];   ?>" selected><?php echo $row['Field'];   ?> </option>
          <?php 
        }else{
          ?>
          <option value="<?php echo $row['Field'];   ?>"><?php echo $row['Field'];   ?></option>

          <?php
        }   
         }?>
      </select>
    </div>
  </div>
</div>
</div>
  </div>

</body>
<script >
   $(document).ready(function(){
 $('#example').DataTable();
 })
function demo(number) {
    let input={id:number, status:$(`#status${number}`).is(":checked")?'Present':'Absent'}
    console.log(input) 
  $.ajax({
  url:'./test.php',
  method:"post",
  dataType:'JSON',
  data:{id:number, status:$(`#status${number}`).is(":checked")?'Present':'Absent'},
  success:function(data,status) {
  console.log(data)
  $("#Presenties").html(data.strength)
if (data.status=='Present') {
$('#remark'+number+'').html(data.status);
$('#remark'+number+'').attr('class','text-success')
  }else if (data.status=='Absent'){
$('#remark'+number+'').html(data.status);
$('#remark'+number+'').attr('class','text-danger')
 }
$('#remark'+number+'').html(data.status);
 }
  })
}
$("#date").change(function(){
window.location.href='./attendance.php?date='+$("#date").val()+''
  $.ajax({
  url:'./mark_attendance.php',
  method:"post",
  dataType:'JSON',
  data:{date:$("#date").val()},
  success:function(data,status) {
 }
  })
})
</script>
<?php }
/*$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.gmail.com");
$opt=curl_exec($ch);
curl_close($ch);*/
?>
</html>