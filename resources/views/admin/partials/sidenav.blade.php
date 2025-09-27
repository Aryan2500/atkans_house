 <!-- START: Main Menu-->

 <style>
     .sidebar-menu li a.active {
         background: linear-gradient(45deg, #667eea, #764ba2);
         color: #fff !important;
         border-radius: 8px;
         font-weight: 600;
         padding: 10px
     }

     .sidebar-menu li.open>a {
         background: rgba(102, 126, 234, 0.1);
         border-radius: 8px;
     }

     .sidebar-menu li a {
         padding: 8px;
         /* set default padding */
         transition: all 0.3s ease;
         /* smooth transition for all properties */
     }

     .sidebar-menu li a:hover {
         background: rgba(102, 126, 234, 0.2);
         color: #333;
         padding: 10px;
         border-radius: 8px;

         /* slightly increased padding */
     }

     .sidebar-menu li a.active i {
         color: #f8e71c;
     }
 </style>


 <div class="sidebar">
     <div class="site-width">
         <ul id="side-menu" class="sidebar-menu">

             <!-- Dashboard -->
             <li class="menu-title">Dashboard</li>
             <li class="dropdown {{ request()->routeIs('admin.dashboard') ? 'open active' : '' }}">
                 <a href="{{ route('admin.dashboard') }}">
                     <i class="icon-home mr-1"></i> Dashboard
                 </a>
             </li>

             <!-- Models Management -->
             <li class="menu-title">Models Management</li>
             <li class="dropdown {{ request()->routeIs('models.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-users mr-1"></i> Models</a>
                 <ul>
                     <li><a href="{{ route('models.index') }}">List All</a></li>
                 </ul>
             </li>
             <li class="dropdown {{ request()->routeIs('ramp-applications.*') ? 'open active' : '' }}">
                 <a href="{{ route('ramp-applications.index') }}">
                     <i class="icon-walk mr-1"></i> Ramp Walk Applications
                 </a>
             </li>
             <li class="dropdown {{ request()->routeIs('stories.*') ? 'open active' : '' }}">
                 <a href="{{ route('stories.index') }}">
                     <i class="icon-book mr-1"></i> Story Contest
                 </a>
             </li>

             <!-- Products & Orders -->
             <li class="menu-title">Products & Orders</li>
             <li class="dropdown {{ request()->routeIs('products.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-basket mr-1"></i> Products</a>
                 <ul>
                     <li><a href="{{ route('products.index') }}">List All</a></li>
                     <li><a href="{{ route('products.create') }}">Add New</a></li>
                 </ul>
             </li>
             <li class="dropdown {{ request()->routeIs('orders.*') ? 'open active' : '' }}">
                 <a href="{{ route('orders.index') }}">
                     <i class="icon-list mr-1"></i> Orders
                 </a>
             </li>
             <li class="dropdown {{ request()->routeIs('packages.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-box mr-1"></i> Packages</a>
                 <ul>
                     <li><a href="{{ route('packages.index') }}">List All</a></li>
                     <li><a href="{{ route('packages.create') }}">Create New</a></li>
                 </ul>
             </li>

             <!-- Events & Engagement -->
             <li class="menu-title">Events & Engagement</li>
             <li class="dropdown {{ request()->routeIs('event.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-calendar mr-1"></i> Events</a>
                 <ul>
                     <li><a href="{{ route('event.index') }}">View All</a></li>
                     <li><a href="{{ route('event.create') }}">Add New</a></li>
                 </ul>
             </li>
             <li class="dropdown {{ request()->routeIs('sponsership.*') ? 'open active' : '' }}">
                 <a href="{{ route('sponsership.index') }}">
                     <i class="icon-handbag mr-1"></i> Sponsorships
                 </a>
             </li>
             <li class="dropdown {{ request()->routeIs('influencers.*') ? 'open active' : '' }}">
                 <a href="{{ route('influencers.index') }}">
                     <i class="icon-user-follow mr-1"></i> Influencers Sponsors
                 </a>
             </li>
             <li class="dropdown {{ request()->routeIs('bookings.*') ? 'open active' : '' }}">
                 <a href="{{ route('bookings.index') }}">
                     <i class="icon-camera mr-1"></i> PhotoShoot Bookings
                 </a>
             </li>
             <li class="dropdown {{ request()->routeIs('hireRequests.*') ? 'open active' : '' }}">
                 <a href="{{ route('hireRequests.index') }}">
                     <i class="icon-briefcase mr-1"></i> Hire Requests
                 </a>
             </li>

             <!-- Audience -->
             <li class="menu-title">Audience</li>
             <li class="dropdown {{ request()->routeIs('subscribers.*') ? 'open active' : '' }}">
                 <a href="{{ route('subscribers.index') }}">
                     <i class="icon-envelope mr-1"></i> Subscribers
                 </a>
             </li>

             <!-- Settings -->
             <li class="menu-title">Settings & Administration</li>
             <li
                 class="dropdown {{ request()->routeIs('role.*') || request()->routeIs('user.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-settings mr-1"></i> Master Settings</a>
                 <ul>
                     <li><a href="{{ route('role.index') }}">Roles</a></li>
                     <li><a href="{{ route('user.index') }}">Users</a></li>
                     <li><a href="{{ route('gallery.index') }}">Gallery</a></li>
                 </ul>
             </li>

         </ul>
     </div>
 </div>

 <!-- END: Main Menu-->
