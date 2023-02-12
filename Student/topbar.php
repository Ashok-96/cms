<header>
<nav class="navbar navbar-expand-md navbar-dark <?php if ($pageName == 'home') {
  echo 'bg-transparent'; }else{
  echo "bg-dark";
  }   ?> ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>CMS</b></a>
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="mx-auto"></div>
      <ul class="navbar-nav">
        <li class="nav-item">
      <a class="nav-link <?php if($pageName=='home'){echo 'active';} ?>"   href="../home"  > <i class="fa fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php if($pageName=='assignment'){echo 'active';} ?>" href="../assignment/"   > <i class="fa fa-file"></i> Assignment</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php if($pageName=='attendance'){echo 'active';} ?>" href="../attendance" > <i class="fa fa-braille"></i>  Attendance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($pageName=='tickets'){echo 'active';} ?>" href="../tickets" > <i class="fa fa-ticket"></i> Tickets</a>
        </li>
          
        <li class="nav-item ">
      <a class="nav-link <?php if($pageName=='Edit'){echo 'text-white';} ?> nav-link" href="../Edit" > <i class="fa fa-wrench"></i>   Edit Profile</a> 
      </li>  
          <li class="nav-item ">
        <a href="../logout/"class=" nav-link " > <i class="fa fa-power-off"></i>  Logout</a>
      </li>
    </div>
   
    </li>
      </ul>
  </div>
  </div>
</nav>
</header>
