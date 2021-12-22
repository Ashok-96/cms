
  <!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&display=swap" rel="stylesheet">

  <title></title>
 
 
  <style >
    a{
       font-family: 'Josefin Sans', sans-serif;
    }
 @media(max-width: 991px){
nav{
    background: #4285f4;

}
    .navbar-collapse {
        position: fixed;
        top: 0;
        right:  100%;
        padding-left: 15px;
        padding-right: 15px;
        padding-bottom: 15px;
        z-index: 1;
        transition: margin 0.17s linear;
        display: block;
 overflow: auto;
      font-family: 'Open-sans' sans-serif;

     
    }
    .navbar-collapse.collapsing {
        height: 100%;
        margin-right: 50%;
         right: 50%;
        width: 50%;
    background: #4285f4;
    }

    .navbar-collapse.show {
    height: 100%;
        right: 50%;
        width: 50%;
              
    }
  li{
      display: block;
      padding:5px 5px 10px;
      transition: background-color 1.7s linear;

    }
    .navbar-collapse.show{
    background: #4285f4;
    }

 } 
    @media(min-width: 992px){    
    .fa-chevron-right{
      display: none;
    }
    #attd{
  display: none;
}
  
  }
  
  
    
  
    </style>
</style>
</head>
<body>

<nav class="navbar navbar-dark navbar-expand-lg sticky-top  " style="background: #4285f4;" >



  <div class="collapse navbar-collapse " id="navbarCollapse"  >
    
  <ul class="navbar-nav ">
  
                <?php if (isset($_SESSION['Teacher'])) {
?> 
      <li class="nav-item  ">
        <a class="nav-link active  " href="teacher.php"><i class="fa fa-home"></i> Home <i class="float-right fa fa-chevron-right " id="frm"> </i> </a>
      </li>
<?php }else{  ?>
<li class="nav-item  ">
        <a class="nav-link active  " href="ahome.php"><i class="fa fa-home"></i> Home <i class="float-right fa fa-chevron-right " id="frm"> </i> </a>
      </li>
<?php }  ?>

  
                <?php if (isset($_SESSION['Teacher'])) {
?> 
   <li class="nav-item">
    <a href="#atd" id="attd" data-toggle="collapse" class="nav-link active "><i class="fa fa-address-book"></i> Attendance <i class="float-right fa fa-chevron-right ">  </i></a>
     <div class="collapse d-lg-block " id="atd">
    <div class="d-flex flex-wrap">
     
      <a class=" nav-link active" href="attendance.php?date=<?php echo date('d-M-Y'); ?>"><span class="fa fa-check-square-o"></span> Mark Attendance</a>
    </div> 
     </div>
<?php  } ?>
   </li>
  <?php if (isset($_SESSION['Teacher'])) {
?> 
           <li class="nav-item">
        <a class="nav-link active " href="shirnkage_report.php"><i class="fa fa-file-text"></i> ShrinkageReport <i class="float-right fa fa-chevron-right ">  </i></a>
        
      </li>

           <li class="nav-item">
        <a class="nav-link active " href="fix_assignment.php"><i class="fa fa-file-pdf-o"></i> Assignmnet <i class="float-right fa fa-chevron-right ">  </i></a>
        
      </li>
  <?php  }else{
    
  }  ?>
             <?php if (isset($_SESSION['Teacher'])) {
?> 
           <li class="nav-item">
        <a class="nav-link active " href="edit-user.php"><i class="fa fa-cogs"></i> Editprofile <i class="float-right fa fa-chevron-right ">  </i></a>
        
      </li>

  <?php  }else{
    
  }  ?>   

          <?php if (isset($_SESSION['admin'])) {
?> 
      <li class="nav-item">
          <a href="#" class="nav-link active" data-toggle="modal" data-target="#teacher"><i class="fa fa-user-plus"></i> Add Teacher </a>        
      </li>
            <li class=" nav-item">

    <a class="nav-link active " href="manage_users.php"><span class="fa fa-users"></span> Manage users <sup><span class="badge badge-danger p-1  ">0</span></sup>
     <i class="float-right fa fa-chevron-right ">  </i></a>

  </li>
           <li class="nav-item">
        <a class="nav-link active " href="logs.php"><i class="fa fa-clock-o"></i> userlog <i class="float-right fa fa-chevron-right ">  </i></a>
        
      </li>
  <?php  }else{
    
  }  ?>
          <li class=" nav-item">

    <a class="nav-link active " href="notification.php"><span class="fa fa-feed"></span> Notification <i class="float-right fa fa-chevron-right ">  </i></a>

  </li>
         <li class=" nav-item">

<?php
$db=new dbutil;
 $sql="SELECT * FROM `complaints` WHERE `category`='admin'  AND `stage`='Esculated' ";
$res=$db->queryRequest($sql);

?>
    <a class="nav-link active " href="read_message.php"><span class="fa fa-ticket"></span> Ticket Histroy <i class="float-right fa fa-chevron-right "></i><sup><span class="badge badge-danger p-1  "><?php echo $res->num_rows; ?></span></sup>  </a>

  </li>

   <li class=" nav-item">

    <a class="nav-link active " href="logout.php"><span class="fa fa-power-off"></span> Logout <i class="float-right fa fa-chevron-right ">  </i></a>

  </li>

    </ul>
    </div>

   
</div>


    <button class="navbar-toggler text-dark ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"  >
  <span class="navbar-toggler-icon text-dark" ></span>
  </button>
    </nav>
    
  </script>

</div>
</body>
</html>


