<!DOCTYPE html>
<html>
<head>
                  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

<style >
  body,label,.form-control{

      font-family: 'Josefin Sans', sans-serif;
  }
</style>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title></title>
</head>
<body>
  <?php if (isset($_POST['count'])) {
  $count=$_POST['count'];
  echo $count;
}  ?>
<?php include 'topbar.php';  ?>

<div class="container p-5">
  <div class="row">
    <div class="col-lg-4">
    <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group" >
        <label for="count">Enter the no of classes to be added</label>
<input type="text" name="count" class="form-control" pattern="[0-9]" title="only numerical value">
      </div>
<input class="btn btn-outline-dark" type="submit" name="submit" value="submit">
    </form>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $count=$_POST['count'];
     echo'<script>window.location.href="class_allocation.php?count='.$count.'";</script>';
   } 
  ?>
</div>
</body>
</html>