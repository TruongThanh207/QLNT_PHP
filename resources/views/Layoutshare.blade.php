<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <base href="{{Asset('')}}">
    <link rel="stylesheet" href="Asset/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->

    <link rel="stylesheet" href="Asset/css/fontastic.css">
    <!-- Google fonts - Roboto -->

    <!-- jQuery Circle-->
  
    <link rel="stylesheet" href="Asset/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="Asset/css/style.default.premium.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="Asset/css/custom.css">
    <!-- Favicon-->
    <link rel="icon" href="Asset/img/favicon.ico">

    <link rel="stylesheet" href="Asset/css/stylennice.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><a href="#"><img src="https://qpdesign.vn/wp-content/uploads/2019/05/logo-cover.jpg" alt="logo" ></a>
            <!-- class="img-fluid rounded-circle" -->
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>NNice</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        
        <div class="main-menu">
          
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
        
            <li><a href="#" aria-expanded="false">Room Management</a>
             
            </li>
            <li><a href="#" aria-expanded="false" >Booking Room</a>
            
            </li>
            <li><a href="#" aria-expanded="false" >Booking Party</a>
              
            </li>
            <li><a href="#" aria-expanded="false">User Management</a>
              
            </li>
            
        </div>
       
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="#" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Room Management</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
               
                <!-- Messages dropdown-->
                
                <!-- Languages dropdown    -->
                <li class="nav-item dropdown">
                  <a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle">
                  	<img src="https://qpdesign.vn/wp-content/uploads/2019/05/logo-cover.jpg" class="img-fluid rounded-circle" alt="avatar">
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a rel="nofollow" href="#" class="dropdown-item"> 
                        <span>Setting</span>
                      </a>
                    </li>
                    <li>
                      <a rel="nofollow" href="#" class="dropdown-item"> 
                      <span>Logout</span>
                    </a>
                  </li>
                  </ul>
                </li>
        
                
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <section>
        <div class="container-fluid">
    		 @yield('content')
    	</div>
      </section>
	<footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Truong Van Thanh - Nguyen Manh Tung</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Quan ly nha tro</p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- JavaScript files-->
    <script src="Asset/vendor/jquery/jquery.min.js"></script>
    <script src="Asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Asset/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="Asset/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="Asset/js/front.js"></script>

     @yield('script')
  </body>
</html>