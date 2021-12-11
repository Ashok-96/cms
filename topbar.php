<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap" rel="stylesheet">
  <style >
    @media(max-width: 991px){
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
     
    }
    .navbar-collapse.collapsing {
        height: 100%;
        margin-right: 50%;
        right:  60%;
       width: 40%; 

    }

    .navbar-collapse.show {
    height: 100%;
        right: 60%;
        width: 40%;
              

    }
   li{
      display: block;
      padding: 3px 10px 20px;
      transition: background-color 1.7s linear;

    } 

  }
@media(min-width: 992px){    
    .fa-chevron-right{
      display: none;
    }
body,h5{
    
font-family: 'Work Sans', sans-serif;
}


</style>
</head>
<body>
    <nav class="navbar bg-dark navbar-dark navbar-expand-lg sticky-top">
      
  
<button type="button" class="popovers ml-auto btn text-center" data-toggle="popover" id="<?php echo $_SESSION['userID'] ?>"><i class="fa  text-white fa-bell-o"></i></button>
             
  

   

   <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" >
  <span class="navbar-toggler-icon"></span>
  </button>

    
  <div class="collapse text-center navbar-collapse p-0 bg-dark overflow-auto " id="navbarCollapse" style="">
  <ul class="navbar-nav  text-left  ">
    
      <li class="nav-item active">
        <a class="nav-link active " href="home.php"><i class="fa fa-home"></i> Home</a>
    
      </li>
      <li class="nav-item ">
        <a class="nav-link active" href="about.php"><i class="fa fa-exclamation-circle"></i> About</a>
         
      </li>
       <li class=" nav-item ">
    <a class="nav-link active  " href="assignment1.php"><span class="fa fa-file-pdf-o"></span> Assignment</a>
     
  </li>
            <li class="nav-item">
        <a class="nav-link active  " href="status.php"><i class="fa fa-bar-chart"></i> Attendance</a>
      </li>
      
              <li class="nav-item">
        <a class="nav-link active  " href="read_message1.php"><i class="fa fa-ticket"></i> Tickets</a>
      </li>
  </li>
 <li class=" nav-item">
    <a class="nav-link active  " href="read_notification.php"><span class="fa fa-feed"></span> Notification</a>
  </li>
  <li class="nav-item">
        <a class="nav-link active" href="edit-user.php"><span class="fa fa-cogs"></span> Edit Profile</a>
  </li>
    <li class="nav-item">
    <a class="nav-link active" href="logout.php"> <span class="fa fa-power-off"></span> Logout</a>
  </li>
      <li class="nav-item">
    <a class="nav-link active" href="help.php"> <span class="fa fa-question-circle"></span> help</a>
  </li>
    </ul>

    </nav>
