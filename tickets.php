
<?php
   session_start();
   include 'db/dbutil.php';
   $pageName=explode('/', $_SERVER['REQUEST_URI'])[2];
if (strlen($_SESSION["type"]) == 0) {
    header("Location:demo.php");
}
 else {
 ?>




<meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
<script type="text/javascript" src="js/jquery.js"></script>
<head>
  <style >
 
 </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Baumans&display=swap" rel="stylesheet">
<script type="text/javascript" src="bootstrap-4.5.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/sdashboard.js"></script>
<script type="text/javascript" src="js/popover.js"></script>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="./css/snackbar.css">
<script type="text/javascript" src="js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap4.min.js"></script>
<title>Home</title>
</head>
<body >
  <?php include('topbar.php')?> 

<?php  } ?>

<div class="container  my-5 pt-5">
  <table id="table"class="table mx-5 my-5 table-sm table-bordered">
  <thead class="alert-primary ">
    <th class="col-2">Time</th>
    <th class="col-2">Id</th>
    <th class="col-4">Status</th>
  </thead>
  <tbody>
  <?php 
$db=new dbutil();
$sql="SELECT * FROM `complaints` WHERE `userid`='".$_SESSION['userID']."'";
$res=$db->queryRequest($sql);
while($row=$res->fetch_assoc()){
  echo "<tr><td >".date('d-M-Y',strtotime($row['Time']))."</td> "; 
  echo "<td><a class='text-plain' href='read_details.php?id=".$row["tkt_id"]."' target='_blank'>".$row['tkt_id']."</a></td>";  
  echo "<td>".$row['stage']."</td></tr>";  

}
   ?> 
</tbody>
</table>
</div>
<!-- The actual snackbar -->
<button onclick="myFunction('!hi')">clck</button>
<div id="snackbar">Some text some message..</div>
<script >
  function myFunction(str) {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");
  // Add the "show" class to DIV
  x.className = "show";
  x.innerHTML=str;
  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2800);
}
$("#table").DataTable();

</script>
</body>