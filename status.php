<?php
   session_start();
if (strlen($_SESSION["type"]) == 0) {
    header("Location:demo.php");
}
 else {
 ?>

<head>
    <style >
   .fa-spin.spin-reverse{
    -webkit-animation-direction:reverse;
    -moz-animation-direction:reverse;
    animation-direction: reverse;
   } 
  </style>
      <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script type="text/javascript" src="bootstrap-4.5.0/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  </head>

<?php include('topbar.php'); ?>   
<body >
<div class="container">
  <div class="row">
  <div class="col-lg-4">
       <select class="form-control mt-5 col-lg-12" id="class" user="<?php echo $_SESSION['name'] ?>">  
  <option>select the class</option>
 <?php
   $cs=''.$_SESSION['combination'].'/'.$_SESSION['year'].'';
  include 'db/dbutil.php';
  $db=new dbutil();
  $sql="SHOW TABLES WHERE `Tables_in_users` REGEXP '^".$cs."'";
  $res=$db->queryRequest($sql);
  while ($r=$res->fetch_assoc()) {
          $subjects=explode('/', $r['Tables_in_users']);
          echo "<option value=".$r['Tables_in_users']." >".$subjects[2]."</option>";
          echo "<div class='dropdown-divider'></div>";
    }
              ?>
  </select>
    <img class="col-lg-12" src="im/atm.jpg">
  </div>
  <div class="col-lg-7 p-1" id="chart">
 <canvas id="myChart" ></canvas>
  </div>

   <div  id="data">

  </div>
  </div>
</div>

<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/status.js"></script>
<script type="text/javascript" src="js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap4.min.js"></script>

<script >
  $(document).ready( function () {
   
} );

</script>
  </body>

  
<?php } ?>
