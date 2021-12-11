<?php 
session_start();
include 'db/dbutil.php';
if (isset($_SESSION['Teacher'])) {
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Shirnkage Report</title>
  </head>
  <body>
    <?php include 'topbar.php';  ?>
   <div class="container p-3">
    <div class="row">
      <div class="col-lg-8" style="background:transparent;">
        <img class="col-lg-auto" src="im/stats.gif  ">
      </div>
      <div class="col-lg-4">
        <form class="form-group " method="post" action="shirnkage_report.php" >
  <label><h4>Class</h4></label> 
<?php $var=explode('/', $_SESSION['class']);
echo $var[2];  ?>
<input type="text" class="form-control" name="select" value="<?php echo $var[2];  ?>">
        <div class="form-group " >
      <label><h4>From  <i class="fa fa-calendar-o"></i></h4></label>
          <input type="date" class="form-control " id="from" name="from" placeholder="Please enter the appropriate value">

    </div>
  <div class="form-group ">
      <label for="to"><h4>To  <i class="fa fa-calendar"></i></h4></label>
      </i>
          <input type="date" class="form-control " name="to" placeholder="Please enter the appropriate value">
    </div>
    
  <input  class="btn btn-primary" type="submit" name="submit" id="submit" value="submit" >
</form>
   <?php if (isset($_POST["submit"])) {   
     $_SESSION["from"]=$_POST["from"];
     $_SESSION["to"]=$_POST["to"];
     echo "<i class='fa fa-file-text'></i>  <a class='text-info' href='../report.php' target='_blank'>Click here to see the Report</a>";
   } ?>
        
      </div>
  </div>
  </body>
  </html>
<?php
}
 ?>