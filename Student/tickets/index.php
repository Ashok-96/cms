
<?php
   session_start();
   include '../common files/db/dbutil.php';
   $pageName=explode('/', $_SERVER['REQUEST_URI'])[3];
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Baumans&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="./css/snackbar.css">
<title>Home</title>
</head>
<body >
  <?php include('../topbar.php')?> 

<?php  } ?>

<div class="container  my-5 pt-5">
  <div >
    
  <table id="table_id" class="table mx-5 my-5 table-sm table-bordered">
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

<?php include '../../dump/help.php';?>
</div>
<!-- The actual snackbar -->
<button onclick="myFunction('!hi')">clck</button>
<div id="snackbar">Some text some message..</div>
<script >
$(document).ready( function () {
    $('#table_id').DataTable();
} );



</script>
</body>