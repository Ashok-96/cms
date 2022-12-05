<?php
   session_start();
$pageName=explode('/', $_SERVER['REQUEST_URI'])[2];
if (strlen($_SESSION["type"]) == 0) {
    header("Location:demo.php");
}
 elseif($_SESSION["type"] == 1) {
 ?>

 <head>
 	<style>
 		@media(min-width: 990px){
 			#footer{
 				margin-top: 50%;
 			}
 		}
 	</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
<script type="text/javascript" src="js/jquery.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
<script type="text/javascript" src="js/sdashboard.js"></script>
<script type="text/javascript" src="js/popover.js"></script>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<script type="text/javascript" src="js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap4.min.js"></script>
<title>Home</title>
  <style>
 	a,p,h2{
font-family: 'Work Sans', sans-serif;

 	} 
 	.card{
 width: 16rem;
 margin: 5px;
 	}
 </style>
   <?php include'topbar.php';?> 

</head> 
<body >
  
  <div class="container-fluid">
  <h1>Hello, <?php echo $_SESSION['name'] ?></h1>
   <?php
   for($i=0;$i<3;$i++){
   ?> 
    <div class="col-lg-4 border rounded border-dark ">
      <h3>Assignments</h3>
    <div class="d-flex justify-content-between">
    <table class="table table-bordered border-secondary table-sm">
     
     <tr>
        <th>No of Assignments:</th>
          <td>ds</td>
      </tr><tr>
        <th>No of Assignments:</th>
          <td>ds</td>
      </tr>
    </table>
    </div>
    </div>

  </div>
  <?php } ?>

</body>
  

</html>

<?php}else{
  print_r($_SESSION);


}  ?>
