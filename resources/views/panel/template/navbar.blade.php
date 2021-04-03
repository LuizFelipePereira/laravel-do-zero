<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
          <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href=" {{ asset("Auth-Panel")  }}/#" role="button"><i
                         class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
               <a href=" {{ route("panel.main.index") }}" class="nav-link">Home</a>
          </li>
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
               <a class="nav-link" data-widget="navbar-search" href=" {{ asset("Auth-Panel")  }}/#" role="button">
                    <i class="fas fa-search"></i>
               </a>
               <div class="navbar-search-block">
                    <form class="form-inline">
                         <div class="input-group input-group-sm">
                              <input class="form-control form-control-navbar" type="search" placeholder="Busca Global"
                                     aria-label="Busca Global">
                              <div class="input-group-append">
                                   <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                   </button>
                                   <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                   </button>
                              </div>
                         </div>
                    </form>
               </div>
          </li>
          <li class="nav-item dropdown">
               <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-power-off"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item" onclick="$('.logout-form').submit();">
                         <div class="media">
                              Logout
                         </div>
                    </a>
                    <form class="logout-form hide" action="{{ route("logout") }}" method="POST">
                         {{ csrf_field()   }}
                    </form>
               </div>
          </li>
     </ul>
</nav>

