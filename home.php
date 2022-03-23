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
</head> 
   <?php include'topbar.php';?> 
<body >
<div class="container ">
 
<h2> <?php echo $_SESSION['user'];?>'s Dashboard</h2>
<div class="d-flex">
<div class="m-5">

  <div class="row">
        <div class="card  rounded-lg shadow bg-success">
        <div class="card-head">
        </div  >
        <div class="card-body">
        <div class="d-flex ">
          <i class="fa m-2 fa-5x fa-tasks text-white"></i>
          &nbsp&nbsp&nbsp<h3 class="m-2" id="users"></h3>
        </div>
        <div class="card-foot">
          <a href="javascript:void(0)" id="assignments" class="btn rounded-pill btn-success m-2 float-right" data-toggle="collapse" combination="<?php echo $_SESSION['combination'];  ?>" year="<?php echo $_SESSION['year'];  ?>" >Assignments</a>
        </div>
        </div>
    </div>
        <div class="card  rounded-lg shadow bg-success">
        <div class="card-head">
        </div  >
        <div class="card-body">
        <div class="d-flex ">
          <i class="fa m-2 fa-5x fa-ticket text-white"></i>
          &nbsp&nbsp&nbsp<h3 class="m-2" id="users"></h3>
        </div>
       
        <div class="card-foot">
          <a href="javascript:void(0)" id="tickets" class="btn rounded-pill btn-success m-2 float-right" data-toggle="collapse" user="<?php echo $_SESSION['userID'] ?>" >Tickets&nbsp;(Queries)</a>
        </div>
        </div>
    </div>
        <div class="card  rounded-lg shadow bg-success">
        <div class="card-head">
        </div >
        <div class="card-body">
        <div class="d-flex ">
          <i class="fa m-2 fa-5x fa-folder-open text-white"></i>
          &nbsp&nbsp&nbsp<h3 class="m-2" id="users"></h3>
        </div>
       
        <div class="card-foot">
          <a href="javascript:void(0)" id="subject" class="btn rounded-pill btn-success m-2 float-right" combination="<?php echo $_SESSION['combination'];  ?>" year="<?php echo $_SESSION['year'];  ?>">Subjects For the year</a>
        </div>
        </div>
    </div>
 
  </div>

</div>
</div>
  <div class="datas col-lg-auto  mt-2">

    </div>
</div>
</div>
</div>


</body>
  

</html>

<?php }else{
  print_r($_SESSION);


}  
?>



