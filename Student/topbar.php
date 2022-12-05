<header>
  <nav class="navbar navbar-expand-md navbar-dark  bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
       
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
        <a class="nav-link <?php if($pageName=='home.php'){echo 'active';} ?>"   href="home.php"  >Home</a>
          </li>
          <li class="nav-item">
          <a class="nav-link <?php if($pageName=='assignment.php'){echo 'active';} ?>" href="assignment.php"   >Assignment</a>
          </li>
          <li class="nav-item">
          <a class="nav-link <?php if($pageName=='attendance.php'){echo 'active';} ?>" href="attendance.php" >Attendance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($pageName=='tickets.php'){echo 'active';} ?>" href="tickets.php" >Tickets</a>
          </li>
            
          <li class="nav-item ">
        <a class="nav-link <?php if($pageName=='edit-user.php'){echo 'text-white';}else{ echo 'text-secondary';} ?> nav-link" href="edit-user.php" >Edit Profile</a> 
        </li>  
           <li class="nav-item ">
          <a href="./logout.php"class=" nav-link " >Logout</a>
        </li>
      </div>
    </li>
        </ul>
    </div>
  </nav>
</header>
