 <!-- Top Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         {{-- <li class="nav-item d-none d-sm-inline-block">
             <a href="index3.html" class="nav-link">Home</a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="#" class="nav-link">Contact</a>
         </li> --}}
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">


         <!-- Notifications Dropdown Menu -->

         <li class="nav-item">
             <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                 <i class="fas fa-expand-arrows-alt"></i>
             </a>
         </li>

         <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                 <i class="far fa-user"></i>
             </a>
             <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                 @if (hasPermission('admin.profile.edit'))
                     <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                         Profile
                     </a>
                 @endif
                 <div class="dropdown-divider"></div>
                 @if (hasPermission('logout'))
                     <a href="{{ route('logout') }}" class="dropdown-item">
                         Logout
                     </a>
                 @endif
             </div>
         </li>

     </ul>
 </nav>
 <!-- /.top navbar -->
