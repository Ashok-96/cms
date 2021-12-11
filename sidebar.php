<header class="topbar" data-navbarbg="">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.php">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                          
                        </b>
                        
                        <!--End Logo icon -->
                         <!-- Logo text -->
                     
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="./assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                        <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                              
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!--<li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>-->
                    </ul>
                       <ul class="navbar-nav float-middle mr-auto">     
                     <h1 class="font-light text-white text-center">Class Management</h1>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="./assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                             <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-success btn-circle"><i class="fas fa-user"></i></span>
                                                    <div class="m-l-10">
                                                    
                                                        <h5 class="m-b-0"><?php echo $_SESSION["user"]; ?></h5> 
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="contact.php" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-warning btn-circle"><i class="fas fa-users"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Contact Us</h5> 
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="logout.php" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-danger btn-circle"><i class="fas fa-sign-out-alt"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Logout</h5> 
                                                    </div>
                                                </div>
                                            </a>
                                             
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    	<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu">User Profile</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="edit-user.php" class="sidebar-link"><i class="fas fa-user-circle"></i><span class="hide-menu"> Edit User </span></a></li>
                                <li class="sidebar-item"><a href="change-password.php" class="sidebar-link"><i class="fas fa-id-card"></i><span class="hide-menu"> Change Password </span></a></li>
                            </ul>
                        </li>
                        
                        
                      <?php if($_SESSION["type"] == 0){ ?>
                       
                   <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">Contents</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="dis1.php" class="sidebar-link"><i class="fas fa-user-circle"></i><span class="hide-menu"> Time table</span></a></li>
                                <li class="sidebar-item"><a href="dis.php" class="sidebar-link"><i class="fas fa-user-circle"></i><span class="hide-menu"> Notification</span></a></li>
                               
                                 <li class="sidebar-item"><a href="dis2.php" class="sidebar-link"><i class="fas fa-user-circle"></i><span class="hide-menu" href="">Notes</span></a></li>
                                <li class="sidebar-item"><a href="a.php" class="sidebar-link"><i class="fas fa-user-circle"></i><span class="hide-menu">Assignments</span></a></li>

                                
                                
                                
                                
                                 
                               
                            </ul>
                        </li>    
                         <?php } ?>
                         <?php if($_SESSION["type"] == 1){ ?>
                                <nav class="sidebar-nav">
                       
                   <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void()" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">Edit Components</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="timetable.php" class="sidebar-link"><i class="fas fa-user-circle"></i><span class="hide-menu"> Time table</span></a></li>
                                <li class="sidebar-item"><a href="notification.php" class="sidebar-link"><i class="fas fa-user-circle"></i><span class="hide-menu"> Notification</span></a></li>
                               
                                 <li class="sidebar-item"><a href="upload1.php" class="sidebar-link"><i class="fas fa-user-circle"></i><span class="hide-menu" href="">Notes</span></a></li>
                                <li class="sidebar-item"><a href="upload.php" class="sidebar-link"><i class="fas fa-user-circle"></i><span class="hide-menu">Assignment</span></a></li>

                                
                                
                                
                                
                                 
                               
                            </ul>
                        </li>    
                         <?php } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
                        