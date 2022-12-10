<?php
   session_start();
   $pageName=explode('/', $_SERVER['REQUEST_URI'])[3];

   ob_start();
if (strlen($_SESSION["type"]) == 0) {
    header("Location:demo.php");
}
 else { ?>
<!DOCTYPE html>
<html>
<head>

		      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&display=swap" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script type="text/javascript" src="js/home.js"></script>
  <?php include('../topbar.php');?>
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
   span{
    font-size: 13px;
   }
  </style>
</head>
<body>
<!-- Page Content -->
<div class="container mt-5">

  <!-- Portfolio Item Heading -->
  <h1 class="my-4">Assignment Section
  </h1>
 

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-5">
      <img class="col-lg-10 col-sm-8"  src="im/work.jpg" alt="">
    </div>

    <div class="col-md-7">
    <p class="blockquote  ">This is the section where it deals with assignment of students and also helps the students, to receive their assignments on time and to complete it on time, so that this shows the unity among students.
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
         <div class="card shadow">
          <div class="card-header">
    <h6><?php echo str_replace('_', ' ', $row["subject"]) ;  ?></h6>       
          </div>
  <div class="card-body card-text ">
    <ul class="list-group">
  <li class="list-group-item d-flex justify-content-start align-items-center">
    <span>Title&nbsp;:&nbsp;</span>
    <span class="badge alert-primary badge-pill"><?php echo $row["assignment_title"];  ?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <span>Date of Submission&nbsp;:&nbsp;</span>
    <span class="badge alert-warning text badge-pill mt-3"><?php echo date('d-m-Y',strtotime($row['date_of_submission']));  ?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <span>Attachment&nbsp;:&nbsp;</span>
   <?php if ($row["file_name"]) {?>

    <span class=""><a href="Admin/uploadassignment/<?php echo $row["file_name"];  ?>" download>Click here</a></span>
   <?php }  ?>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <span>Descirption&nbsp;:&nbsp;</span>
    <span type="button" tabindex="-1" class="badge bg-danger" role="button" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="bottom" data-bs-content="<?php echo $row["description"];  ?>">Click here</span>  </li>
</ul>
</div>
 <div class="card-footer">
   <?php
   $cdate=strtotime(date('d-m-Y')); 
   $sdate=strtotime($row['date_of_submission']);
   $date_diff=((($sdate-$cdate)*60)*60)*24/86400;
   
   $at=$row["assignment_title"];
   $qu2="SELECT * FROM `submission` WHERE `assignment_title`='".$at."' AND `submitted_by`='".$user."'";
   $res=$db->queryRequest($qu2);
   if($res->num_rows==0){
       if(($date_diff>=0) && ($date_diff<=5)){
 echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal'. $row["id"].'">'.$date_diff.' day(s) left 
  submit
</button>';
}else{

echo '<button type="button" class="btn alert-warning " data-bs-toggle="modal" data-bs-target="#exampleModal'. $row["id"].'">
  <b>submit</b>
</button>';
}
}else{
echo '<a href="#exampleModal" class=" btn-sm btn btn-success btn-block rounded-pill " data-toggle="modal">Submited</a>';  
}
   ?>

 </div>
 </div>
</div>
        


  <!-- /.row -->
  <div class="modal fade " id='exampleModal<?php echo $row['id'];?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row["assignment_title"];  ?></h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body justify-content-start">
      <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars('assignment.php'); ?>">
        <input type="text" class="bg-white form-control" name="atitle" readonly="" value="<?php echo $row["assignment_title"];  ?>">
          <input class="form-control-file m-3" type="file" name="file" type="image/*" required>
          <small>If any note...</small>
          <textarea class="form-control p-3" name="note"  placeholder="Remarks..."></textarea>
          <input class="btn  btn-primary m-3" type="submit" name="submit" value="submit the Assginment">
        </form>

      </div>
      <div class="modal-footer">
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
}

   ?>

  </div>
    </div>
    <!-- Button trigger modal -->

</body>

<script>

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))

var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
</script>

</html>