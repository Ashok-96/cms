<?php
session_start(); 
if(isset($_SESSION['admin']))
  {?>
<!DOCTYPE html>
<html>
<head>
                  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/dashboard.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<script type="text/javascript" src="js/teacher.js"></script>

  <title>Dashboard</title>
</head>
  <style >
    table,input,h2,body{
      font-family: 'Josefin Sans', sans-serif;
    }
  .card{
    width: 16.05rem;
    margin: 10px;
  }
  </style>
     <?php 
require 'db/dbutil.php';
$db=new dbutil();
$qu1="SELECT DISTINCT `combination` FROM `admin` ";
$cls=$db->queryRequest($qu1);
$qu2="SELECT `name` FROM `users` WHERE `type`=1 ";
$urs=$db->queryRequest($qu2);
$qu3="SELECT * FROM `complaints`";
$tks=$db->queryRequest($qu3);
$qu4="SELECT * FROM `assignment`";
$asts=$db->queryRequest($qu4);
$qu5="SELECT DISTINCT `category` FROM `notification`";
$fds=$db->queryRequest($qu5);
 ?>
<?php include 'topbar.php';  ?>
<body>
  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="teacher">Add Teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="add_teacher.php">
          <div class="form-group ">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group ">
            <label>Phone_number</label>
            <input type="text" pattern="[0-9]{10}" class="form-control" name="phone">
          </div>
          <div class="form-group ">
            <label>Username</label>
            <input type="text" class="form-control" name="username">
          </div>
          <div class="form-group ">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="form-group ">
            <label>Class</label>
            <input type="text" class="form-control" name="class[]" pattern="[A-Z][/^[0-9\/]+$/][A-Za-z]">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="aclass" >Add class</button>
        <button type="button" class="btn btn-primary" id="rclass">Remove Class</button>
        <input type="submit" class="btn btn-outline-success" name="submit" value="submit">
      </div>
        </form>
    </div>
  </div>
</div>
<div class="modal fade" id="editeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editeacher">Add Teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
<div class="container">
  <h2 class="text-center p-2"><i class="fa fa-2x fa-user-secret"></i> <b>Admin Dashboard</b></h2>
  <div class="  pl-5">
    <div class="row">
      <div class="card  rounded-lg shadow alert-success">
        <div class="card-head">
        </div  >
        <div class="card-body">
        <div class="d-flex ">
          <i class="fa m-2 fa-5x fa-users"></i>
          &nbsp&nbsp&nbsp<h3 class="m-2" id="users"></h3>
        </div>
       
        <div class="card-foot">
          <a href="javascript:void(0)" id="user" class="btn rounded-pill btn-outline-success m-2 float-right" data-toggle="collapse" >Users</a>
        </div>
        </div>
    </div>
      <div class="card  rounded-lg shadow alert-info">
        <div class="card-head">
        </div  >
        <div class="card-body">
        <div class="d-flex">
          <i class="fa  fa-5x m-2 fa-university"></i>
          &nbsp&nbsp&nbsp<h3 class="m-2" id="cls"></h3>
        </div>
          
        <div class="card-foot">
      <a href="javascript:void(0)" id="classes"  class="btn rounded-pill btn-outline-info   m-2 float-right" >Classes</a>
         
        </div>
        </div>
      </div>
      <div class="card  rounded-lg shadow alert-warning">
        <div class="card-head">
        </div  >
        <div class="card-body">
        <div class="d-flex">
          <i class="fa  fa-5x m-2 fa-ticket"></i>
          &nbsp&nbsp&nbsp<h3 id="complaints"></h3>
        </div>   
        <div class="card-foot">
          <a href="javascript:void(0)" id="tickets" class="btn rounded-pill m-2 btn-outline-warning float-right" >Tickets</a>
        </div> 
        </div>
      </div>
      <div class="card  rounded-lg shadow alert-danger">
 
        <div class="card-head">
        </div  >
        <div class="card-body">
        <div class="d-flex">
          <i class="fa  fa-5x fa-feed"></i>
          &nbsp&nbsp&nbsp<h3 id="feeds"></h3>
        </div>   
        <div class="card-foot">
          <a href="javascript:void(0)" id="notify" class="btn btn-outline-danger m-2 rounded-pill float-right" >Notification feeds</a>
        </div>
        </div>
      </div>
      <div class="card  rounded-lg shadow alert-primary">
          
        <div class="card-head">
        </div  >
        <div class="card-body">
        <div class="d-flex">
          <i class="fa  fa-5x fa-tasks"></i>
          &nbsp&nbsp&nbsp<h3 id="assingment"></h3>
        </div>   
        <div class="card-foot">
          <a href="javascript:void(0)" id="assign" class="btn btn-outline-primary rounded-pill float-right" >Assignments</a>
        </div>
        </div>
      </div>
      <div class="card  rounded-lg shadow alert-dark">     
        <div class="card-head">
        </div  >
        <div class="card-body">
        <div class="d-flex">
          <i class="fa  fa-5x fa-user-circle"></i>
          &nbsp&nbsp&nbsp<h3 id="assingment"></h3>
        </div>   
        <div class="card-foot">
          <a href="javascript:void(0)" id="teachers" class="btn btn-outline-secondary rounded-pill float-right" > Teachers</a>
        </div>
        </div>
      </div>
    </div>
  </div>
<div class=" p-3" id="datatable" >

  </div>

</div>
</div>
</body>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap4.min.js"></script>


</html>
<?php }else{
  header("Location:index.php");
} ?>