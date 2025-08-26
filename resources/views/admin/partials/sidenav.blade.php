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
         <!-- START: Menu-->
         <ul id="side-menu" class="sidebar-menu">
             {{-- Dashboard --}}
             <li class="dropdown {{ request()->routeIs('admin.dashboard') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-home mr-1"></i> Dashboard</a>
                 <ul>
                     <li>
                         <a href="{{ route('admin.dashboard') }}"
                             class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                             <i class="icon-rocket"></i> Dashboard
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- Models --}}
             <li class="dropdown {{ request()->routeIs('models.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> Models</a>
                 <ul>
                     <li>
                         <a href="{{ route('models.index') }}"
                             class="{{ request()->routeIs('models.index') ? 'active' : '' }}">
                             <i class="icon-calendar"></i> List All
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- Products --}}
             <li class="dropdown {{ request()->routeIs('products.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> Products</a>
                 <ul>
                     <li>
                         <a href="{{ route('products.index') }}"
                             class="{{ request()->routeIs('products.index') ? 'active' : '' }}">
                             <i class="icon-calendar"></i> List All
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('products.create') }}"
                             class="{{ request()->routeIs('products.create') ? 'active' : '' }}">
                             <i class="icon-plus"></i> Add New
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- Orders --}}
             <li class="dropdown {{ request()->routeIs('orders.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> Orders</a>
                 <ul>
                     <li>
                         <a href="{{ route('orders.index') }}"
                             class="{{ request()->routeIs('orders.index') ? 'active' : '' }}">
                             <i class="icon-calendar"></i> List All
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- Story Contest --}}
             <li class="dropdown {{ request()->routeIs('stories.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> Story Contest</a>
                 <ul>
                     <li>
                         <a href="{{ route('stories.index') }}"
                             class="{{ request()->routeIs('stories.index') ? 'active' : '' }}">
                             <i class="icon-calendar"></i> List All
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- Subscribers --}}
             <li class="dropdown {{ request()->routeIs('subscribers.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> Subscribers</a>
                 <ul>
                     <li>
                         <a href="{{ route('subscribers.index') }}"
                             class="{{ request()->routeIs('subscribers.index') ? 'active' : '' }}">
                             <i class="icon-calendar"></i> List All
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- Influencers Sponsors --}}
             <li class="dropdown {{ request()->routeIs('influencers.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> Influencers Sponsors</a>
                 <ul>
                     <li>
                         <a href="{{ route('influencers.index') }}"
                             class="{{ request()->routeIs('influencers.index') ? 'active' : '' }}">
                             <i class="icon-calendar"></i> List All
                         </a>
                     </li>
                 </ul>
             </li>


             {{-- PhotoShoot Bookings --}}
             <li class="dropdown {{ request()->routeIs('bookings.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> PhotoShoot Bookings</a>
                 <ul>
                     <li>
                         <a href="{{ route('bookings.index') }}"
                             class="{{ request()->routeIs('bookings.index') ? 'active' : '' }}">
                             <i class="icon-calendar"></i> List All
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- Ramp Walk Applications --}}
             <li class="dropdown {{ request()->routeIs('ramp-applications.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> Ramp Walk Applications</a>
                 <ul>
                     <li>
                         <a href="{{ route('ramp-applications.index') }}"
                             class="{{ request()->routeIs('ramp-applications.index') ? 'active' : '' }}">
                             <i class="icon-calendar"></i> New Applications
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- Hire Requests --}}
             <li class="dropdown {{ request()->routeIs('hireRequests.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> Hire Requests</a>
                 <ul>
                     <li>
                         <a href="{{ route('hireRequests.index') }}"
                             class="{{ request()->routeIs('hireRequests.index') ? 'active' : '' }}">
                             <i class="icon-calendar"></i> New Requests
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- Sponsorships --}}
             <li class="dropdown {{ request()->routeIs('sponsership.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> Sponsorships</a>
                 <ul>
                     <li>
                         <a href="{{ route('sponsership.index') }}"
                             class="{{ request()->routeIs('sponsership.index', 'sponsership.edit') ? 'active' : '' }}">
                             <i class="icon-list"></i> View all Sponsorship
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- Event --}}
             <li class="dropdown {{ request()->routeIs('event.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> Event</a>
                 <ul>
                     <li>
                         <a href="{{ route('event.index') }}"
                             class="{{ request()->routeIs('event.index', 'event.edit') ? 'active' : '' }}">
                             <i class="icon-list"></i> View all Events
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('event.create') }}"
                             class="{{ request()->routeIs('event.create') ? 'active' : '' }}">
                             <i class="icon-plus"></i> Add New Event
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- Packages --}}
             <li class="dropdown {{ request()->routeIs('packages.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> Packages</a>
                 <ul>
                     <li>
                         <a href="{{ route('packages.index') }}"
                             class="{{ request()->routeIs('packages.index') ? 'active' : '' }}">
                             <i class="icon-calendar"></i> List All
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('packages.create') }}"
                             class="{{ request()->routeIs('packages.create') ? 'active' : '' }}">
                             <i class="icon-plus"></i> Create New
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- Master Setting --}}
             <li
                 class="dropdown {{ request()->routeIs('role.*') || request()->routeIs('user.*') ? 'open active' : '' }}">
                 <a href="#"><i class="icon-layers mr-1"></i> Master Setting</a>
                 <ul>
                     <li>
                         <a href="{{ route('role.index') }}"
                             class="{{ request()->routeIs('role.index') ? 'active' : '' }}">
                             <i class="icon-list"></i> Role
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('user.index') }}"
                             class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                             <i class="icon-list"></i> Users
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('gallery.index') }}"
                             class="{{ request()->routeIs('gallery.index') ? 'active' : '' }}">
                             <i class="icon-list"></i> Gallery
                         </a>
                     </li>

                 </ul>
             </li>
         </ul>
     </div>
 </div>
 <!-- END: Main Menu-->
