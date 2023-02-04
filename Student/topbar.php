<header>
<nav class="navbar navbar-expand-md navbar-dark  bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CMS</a>
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="mx-auto"></div>
      <ul class="navbar-nav">
        <li class="nav-item">
      <a class="nav-link <?php if($pageName=='home'){echo 'active';} ?>"   href="../home"  >Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php if($pageName=='assignment'){echo 'active';} ?>" href="../assignment/"   >Assignment</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php if($pageName=='attendance'){echo 'active';} ?>" href="../attendance" >Attendance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($pageName=='tickets'){echo 'active';} ?>" href="../tickets" >Tickets</a>
        </li>
          
        <li class="nav-item ">
      <a class="nav-link <?php if($pageName=='Edit'){echo 'text-white';}else{ echo 'text-secondary';} ?> nav-link" href="../Edit" >Edit Profile</a> 
      </li>  
          <li class="nav-item ">
        <a href="../logout/"class=" nav-link " >Logout</a>
      </li>
    </div>
   
    </li>
      </ul>
  </div>
  </div>
</nav>
</header>
