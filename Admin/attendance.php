<?php
  include 'mark_attendance.php';
  error_reporting(0);
session_start();
if (strlen($_SESSION["Teacher"])==0) {
    header("Location:index.php");
}
if(isset($_SESSION["Teacher"])) { 
  date_default_timezone_set('Asia/Kolkata');
        $class=$_SESSION["class"];
if (isset($_GET['date'])) {
  $date=$_GET['date'];
}else{
  $date=date('d-M-Y');
}

  $db = new Attendance;
$nsql="SELECT * FROM `users` INNER JOIN `$class` ON `$class`.id=users.id";
$re=$db->query($nsql);       
$strenght=$re->num_rows;
$per_page=10;
$nos_page=$strenght/10;       
$sq="SELECT `id` FROM `$class` LIMIT 1";
$id=$db->query($sq);
?>
<!DOCTYPE html>
<html>
                  <meta name="viewport" content="width=device-width, initial-scale=1">

<head>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <title>Attendance <?php  $var=explode('/', $_SESSION["class"]); echo'-'.$var[2];  ?></title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/switch.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="js/attendance.js"></script>
<script type="text/javascript" src="js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
</head>
<body>
<?php 
  $i=1;
include 'topbar.php';  
  echo $class;

if(isset($_GET['PGN'])){

      $page=$_GET['PGN'];?>
<div class="container">
  <div class="row ">
    <?php
    if(isset($_GET['date']))?>
    <div class="col-lg-7 pt-2">
          <ul class="pagination">
     <?php if ($page<=1) {

    echo '<li class="page-item disabled">
    <a class="page-link disabled" aria-label="Previous">
        <span aria-hidden="true">Previous</span></a>
        </li>';
  }else{
    echo '
    <li class="page-item">
    <a class="page-link " href="'.$_SERVER["PHP_SELF"].'?PGN='.($page-1).'&&date='.$date.'" aria-label="Previous">
        <span aria-hidden="true">Previous</span></a>
        </li>';
  }  ?>
  <?php
  $i=1;

  $cp=$_GET['PGN'];
  while ($i<=$nos_page) {
    
    if ($i==$cp) {
     echo "<li class='page-item active'><a class='page-link' href='".$_SERVER["PHP_SELF"]."?PGN=".$i."&&date=".$date."'>".$i."</a></li>";
    }else{
   echo "<li class='page-item'><a class='page-link' href='".$_SERVER["PHP_SELF"]."?PGN=".$i."&&date=".$date."'>".$i."</a></li>";

    }
    $i++;
    }
        $id=$_GET['PGN'];  ?>
     
  <?php if ($page==$nos_page) {
    echo '<li class="page-item disabled">
    <a class="page-link disabled"  href="'.$_SERVER["PHP_SELF"].'?PGN='.($page+1).'&& date='.$date.'"  aria-label="Next">
        <span aria-hidden="true">Next</span></a>
        </li>';
  }else{
    echo '
    <li class="page-item">
    <a class="page-link " href="'.$_SERVER["PHP_SELF"].'?PGN='.($page+1).'&&date='.$date.'" aria-label="Next">
        <span aria-hidden="true">Next</span></a>
        </li>';
  }  ?>

      </a>
    </li>
  </ul>

  <form  action="./attendance.php?PGN=<?php echo $id."&date=".$date;?>" method="POST">
    <table class="table table-bordered  mt-3 float-right">
      <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Status</th>
      </thead>

      <tbody>
  <?php
  $ak=new Attendance();
$class= strtolower($_SESSION['class']);
          $id=$_GET['PGN'];
            $day=strtotime($_GET['date']);
          $strenght=$re->num_rows;re
          $per_page=10;
          $nos_page=$strenght/10;
          $start=($id-1)*10;
          $sql="SELECT `users`.`name`, `$class`.`id`,`$class`.`$date` FROM `$class` INNER JOIN `users`  ON `users`.`id`=`$class`.`id` ORDER BY `users`.`name` ASC LIMIT $start,$per_page";
          $ak->listUsers($sql,$date,$day);
          ?>
  </div>
  </tbody>
</table>
<input type="submit" name="submit" value="submit">
</form>
    <div class="col-lg-5 p-5">
   
   <ul class="list-group shadow">
  <li class="list-group-item"><h4><?php echo $date;  ?>'s Report</h4></li>
<li class="list-group-item "><span class="fa fa-calendar"></span> <b> Date: <?php echo $date;  ?> </b></li>
  <li class="list-group-item"><b> Total Strength: <?php echo $strenght;  ?> </b></li>
  <?php  $psql="SELECT * FROM `$class` WHERE `$date`='Present' ";
          $re=$ak->query($psql);     
            $pc=$re->num_rows;
            ?>
  <li class="list-group-item"> <b class="text-success"><?php echo ceil(($pc/$strenght)*100) ?>% </b> </b> </li>
   <?php 
  if(ceil(($pc/$strenght)*100)>=75){
    ?>
<div class="d-flex justify-content-around">
  
</div>
  <span class="mt-3"></span>  <span>  <img class=" col-5" src="../im/stamp.jpg"> </span>
   <?php 
  }
      ?>  </b></li>


  <li class="list-group-item"><b> Shrinkage  <?php echo ceil(($strenght-$pc)/$strenght*100).'%';  ?> </b></li>
</ul>
  <div class="form-group p-2 ">
    <b>
    <label for="days"><span class="fa fa-calendar-check-o"></span> Days</label></b>
    <select class="form-control shadow"  onchange="location = this.value;">
      <option>---Marked_Days---</option>
      <?php

      $f=date('y');
      echo $f;
      $chcs="SHOW COLUMNS FROM `$class`   ";
          $cse=$db->queryRequest($chcs);

          while ($row=$cse->fetch_assoc()) {
            if (strtotime($row["Field"])==strtotime(date('d-M-yy'))) {
             
            }else{
            ?>
            <option value="attendance.php?date=<?php echo htmlentities($row["Field"]) ?>&&PGN=1"><?php echo htmlentities($row['Field']) ?></option>
             
           <?php }
           } ?>    
    </select>
  </div>
   <?php       if ($date!=date('d-M-Y')) {
    echo "<a href='".$_SERVER["PHP_SELF"]."?date=".date('d-M-Y')."' class='btn btn-primary'>current date </a>";
  }?>
</div>

  <?php
  
if (isset($_POST['submit'])) {
        $date=$_GET['date'];
   $alt="ALTER TABLE `$class` ADD (`$date` varchar(20) NOT NULL)";
   $res=$ak->query($alt);
   if ($res) {    
$stts=$ak->cstatus($start,$per_page);
if ($stts) {
  foreach ($stts as $key=>$value ) {
    echo $key;
    $upd="UPDATE `$class` SET `$date`=$key WHERE `id`=";
  }
}
   }else{
    $stts=$ak->cstatus($start,$per_page);
if ($stts) {
  foreach ($stts as $key=>$value ) {
    $upd="UPDATE `$class` SET `$date`='$value' WHERE `id`='$key'";
    $res=$ak->query($upd);
  }
     if ($res) {
     echo $res;
$msg=md5('marked');
echo "<script>window.location.href='attendance.php?PGN=".$id."&&success=".$msg."&&date=$date'</script>".$class;
      
    }else{
echo "<script>window.location.href='attendance.php?PGN=".$id."&&status=sorry&&date=$date'</script>".$class;
     

    }
}
   }
   

}

}else{
    $i=1;
    if(isset($_GET['PGN'])){
      $page=$_GET['PGN'];
    }else{
      $page=0;
    }
 ?>
<div class="container ">
          <ul class="pagination p-2">
    <?php if ($page<=1) {
    echo '<li class="page-item disabled">
    <a class="page-link disabled" href="'.$_SERVER["PHP_SELF"].'?PGN='.($page-1).'" aria-label="Previous">
        <span aria-hidden="true">Previous</span></a>
        </li>';
  }else{
    echo '
    <li class="page-item">
    <a class="page-link " href="'.$_SERVER["PHP_SELF"].'?PGN='.($page-1).'" aria-label="Previous">
        <span aria-hidden="true">Previous</span></a>
        </li>';
  }  ?>
        <?php
          $i=1;
while ($i<=$nos_page) {
echo "<li class='page-item'><a class='page-link' href='".$_SERVER["PHP_SELF"]."?PGN=".$i."&&date=".$date."'>".$i."</a></li>";
$i++;
}
?>
<li class="page-item">
<a class="page-link" href="<?php echo $_SERVER["PHP_SELF"]."?PGN=".($page+1)."&date=".$date?>" aria-label="Next">
    <span aria-hidden="true">Next</span>
      </a>
    </li>
  </ul>
  <?php }
?>
  </div>
    </div>
  </div>
</body>
</html>
<?php }  ?>