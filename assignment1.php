<?php
   session_start();
   ob_start();
if (strlen($_SESSION["type"]) == 0) {
    header("Location:demo.php");
}
 else { ?>
<!DOCTYPE html>
<html>
<head>

		      <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/jquery.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Security-Policy" content="script-src 'self' https://apis.google.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0/css/bootstrap.css">
<script type="text/javascript" src="bootstrap-4.5.0/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap-4.5.0/js/bootstrap.bundle.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script type="text/javascript" src="js/home.js"></script>
  <?php include('topbar.php');?>
	<title>Assignments</title>
  <style >
    pre{
      font-family: old bookman style; 
    }
     .fa-spin.spin-reverse{
    -webkit-animation-direction:reverse;
    -moz-animation-direction:reverse;
    animation-direction: reverse;
   } 
  </style>
</head>
<body>
<!-- Page Content -->
<div class="container">

  <!-- Portfolio Item Heading -->
  <h1 class="my-4">Assignment Section
  </h1>
 

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-7">
      <img class="img-fluid" src="im/work.jpg" alt="">
    </div>

    <div class="col-md-4">
      <p class="my-3">This is the section where it deals with assignment of students and also helps the students, to 
        receive their assignments on time and to complete it on time, so that this shows the unity among students.
  This method also tracks the date of submission  wether a student submits the assignment on time or not.</p>
      <h3 class="my-3">To be followed</h3>
      <ul class="list-group">
        <li class="list-group-item">ontime submission is mandatory</li>
        <li class="list-group-item">If you miss the date of submisson later you can't submit</li>
        <li class="list-group-item">Please upload appropriate files</li>
              </ul>
    </div>

  </div>
  <!-- /.row -->

  <!-- Related Projects Row -->
  <h3 class="my-4">Related Assignments</h3>

  <div class="row">
  <?php 
  $year=$_SESSION['year'];
  $user=$_SESSION['userID'];
  $combination= strtoupper( $_SESSION['combination']);
 include 'db/dbutil.php';
   $db=new dbutil();
   $query="SELECT * FROM `assignment` WHERE `combination`='$combination' AND `year`='$year'";
   $r=$db->queryRequest($query);
   while ($row=$r->fetch_assoc())  {
   ?>
    <div class="col-md-3 col-sm-6 mb-4">
         <div class="card">
          <div class="card-header">
    <h5><?php echo $row["assignment_title"];  ?></h5>
            
          </div>
  <div class="card-body ">
  <p class="card-text p-3">
    <?php echo $row["description"];  ?>
  </p>
  <p class="card-text"><?php echo date('d-m-yy',strtotime($row['date_of_submission']));  ?></p>
  <a href="Admin/uploadassignment/<?php echo $row["file_name"];  ?>" download><?php echo $row["file_name"];  ?></a>
 <div class="card-foot">
   <?php
   $cdate=strtotime(date('yy-m-d')); 
   $sdate=strtotime($row['date_of_submission']);
   $date_diff=($sdate-$cdate)/60/60/24;
   $at=$row["assignment_title"];
   $qu2="SELECT * FROM `submission` WHERE `assignment_title`='$at' AND `submitted_by`='$user'";
   $res=$db->queryRequest($qu2);
   if(($date_diff>=0) && ($date_diff<=5) && ($res->num_rows==0)){
  ?>
  <a href="#exampleModal" class=" btn-primary btn-block btn rounded-pill mt-3"  data-toggle="modal"><?php echo $date_diff." Day(s) left";  ?> Submit</a>
   <?php }else{ ?>
  <a href="javascript:void(0)" class=" btn-success btn-block btn rounded-pill mt-3"  data-toggle="modal">Already submited</a>

 </div>
 </div>
</div>
        </div>
   <?php }
 ?>

    </div>


  </div>
  <!-- /.row -->

</div>
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row["assignment_title"];  ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body justify-content-start">
      <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars('assignment1.php'); ?>">
        <input type="text" class="bg-white form-control" name="atitle" readonly="" value="<?php echo $row["assignment_title"];  ?>">
          <input class="form-control-file m-3" type="file" name="file" type="image/*" required>
          <small>If any note...</small>
          <textarea class="form-control p-3" name="note"  placeholder="Remarks..."></textarea>
          <input class="btn btn-primary m-3" type="submit" name="submit" value="submit the Assginment">
        </form>

      </div>
      <div class="modal-footer">
              </div>
    </div>
  </div>
</div>
</div>
  <?php 
 }
    if (isset($_POST['submit'])) {
    $folder='Admin/Submission/';
    $fname=$_FILES['file']['name'];
    $ftemp=$_FILES['file']['tmp_name'];
    $subject=$row["subject"];
    $at=$_POST['atitle'];
    $dos=date('d-m-yy');
    $remark=$_POST['note'];
    $qb=new dbutil();
    $sby=$_SESSION['userID'];
    $sqlquery='INSERT INTO `submission`(`submitted_by`,`assignment_title`,`submitted_date`,`remarks`,`submitted_file`)VALUES("'.$sby.'","'.$at.'","'.$dos.'","'.$remark.'","'.$fname.'")' ;
        $res=$qb->queryRequest($sqlquery);
    if ($res) {
       $up=move_uploaded_file($ftemp, $folder.$fname);
       if ($up) {
              header('Location:assignment1.php?status=success');
        
       }else{
                     header('Location:assignment1.php?status=nodtsuccess');
          }
     }else{
          header('Location:assignment1.php?status=notsuccess');
            
          } 
  }

   ?>

</body>
<?php
}
?>
</html>