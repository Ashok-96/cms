<?php
   session_start();
if (strlen($_SESSION["type"]) == 0) {
    header("Location:demo.php");
}
 else {
 ?>

	<title>About us</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	<style >
   .fa-spin.spin-reverse{
    -webkit-animation-direction:reverse;
    -moz-animation-direction:reverse;
    animation-direction: reverse;
   } 
  </style>
  
  <link rel="icon" type="text/css" href="im/logo.png">
  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="jquery.js"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<div  id="loader" >
<div style="left: 40%; top: 25%; position: absolute;" >
      <i style="position: absolute; left: 47px; top: 102px;" class="fa fa-4x fa-cog fa-spin "></i>
      <i style="position: absolute; left: 25.4px; top: 148px;" class="fa fa-3x fa-cog fa-spin spin-reverse"></i><br>
      <i style="position: absolute;  left: 80px; top: 148.7px;" class="fa fa-3x fa-cog fa-spin spin-reverse"></i>
 </div>
  <span  style="  position: absolute;
  left: 40%;
  top: 55%;"><b>Loading please wait...</b></span>
</div>
 </div> 
<body onload="myFunction()">

			<?php  
      
 include('topbar.php');?>
		</div>
	<div id="myDiv" style="display: none;">
			<?php include 'alerts.php';  ?>
		 
		
		 <div class="col-lg-4 col-xs-10 p-3" style="">
		 	<ul type="a" class="mb-6 list-group">	
		 
<li class="list-group-item">Aim:-</li>		 
<li class="list-group-item">	This is project itself is a proposal for changing existing way of managing class.</li>
<li  class="list-group-item">	To eliminate the manual way of approaching.</li>
<li  class="list-group-item">	To reduce Man power.</li>
<li  class="list-group-item">	User friendly Visual Graphics to enhance the user experience.</li>
</ul>
</div>
<div class=" mb-6 col-lg-8 col-sm-4 " style="margin: 2rem;">
<ul class="list-group  mb-6 "  type="a">
<li class="list-group-item">Existing System:-</li>
<li class="list-group-item">	Lot of paper work.</li>
<li class="list-group-item">Wastage of time.</li>
<li class="list-group-item">	Dependency among students are increased.</li>
</ul> 
</p></b>
</div>  
		 
	<footer id="footer" class="py-3 bg-dark text-center fixed-bottom" style="left: 0; bottom: 0; right: 0;  ">
      <small class="text-white ">Copyright &copy; CLASS MANAGEMENT SYSTEM 2019-2020</small>
  </footer>
</div>
<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 1500);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
    document.getElementById("footer").style.display = "block";
}
</script>
</body>
 <?php } ?>