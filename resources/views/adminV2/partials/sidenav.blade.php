  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
          <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
          <span class="brand-text font-weight-light">Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('v2/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ auth()->user()->name }} </a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

                  <!-- Dashboard -->
                  <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}"
                          class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>

                  <!-- Models Management -->
                  <li class="nav-header">Models Management</li>

                  <li class="nav-item">
                      <a href="{{ route('models.index') }}"
                          class="nav-link {{ request()->routeIs('models.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-users"></i>
                          <p>Models</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('ramp-applications.index') }}"
                          class="nav-link {{ request()->routeIs('ramp-applications.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-walking"></i>
                          <p>R. Walk Applications</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('stories.index') }}"
                          class="nav-link {{ request()->routeIs('stories.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-book"></i>
                          <p>Story Contest</p>
                      </a>
                  </li>


                  <!-- Products & Orders -->
                  <li class="nav-header">Products & Orders</li>

                  <li class="nav-item">
                      <a href="{{ route('products.index') }}"
                          class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-shopping-basket"></i>
                          <p>
                              Products
                          </p>
                      </a>
                  </li>


                  <li class="nav-item">
                      <a href="{{ route('orders.index') }}"
                          class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-list"></i>
                          <p>Orders</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('packages.index') }}"
                          class="nav-link {{ request()->routeIs('packages.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-box"></i>
                          <p>Orders</p>
                      </a>
                  </li>
                  <!-- Events & Engagement -->
                  <li class="nav-header">Events & Engagement</li>

                  <li class="nav-item">
                      <a href="{{ route('event.index') }}"
                          class="nav-link {{ request()->routeIs('event.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-calendar-alt"></i>
                          <p>Events</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('sponsership.index') }}"
                          class="nav-link {{ request()->routeIs('sponsership.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-hand-holding-usd"></i>
                          <p>Sponsorships</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('influencers.index') }}"
                          class="nav-link {{ request()->routeIs('influencers.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-user-friends"></i>
                          <p>Influencers Sponsors</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('bookings.index') }}"
                          class="nav-link {{ request()->routeIs('bookings.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-camera"></i>
                          <p>PhotoShoot Bookings</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('hireRequests.index') }}"
                          class="nav-link {{ request()->routeIs('hireRequests.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-briefcase"></i>
                          <p>Hire Requests</p>
                      </a>
                  </li>

                  <!-- Audience -->
                  <li class="nav-header">Audience</li>
                  <li class="nav-item">
                      <a href="{{ route('subscribers.index') }}"
                          class="nav-link {{ request()->routeIs('subscribers.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-envelope"></i>
                          <p>Subscribers</p>
                      </a>
                  </li>

                  <!-- Settings -->
                  <li class="nav-header">Settings & Administration</li>

                  <li
                      class="nav-item has-treeview {{ request()->routeIs('role.*') || request()->routeIs('user.*') || request()->routeIs('gallery.*') ? 'menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ request()->routeIs('role.*') || request()->routeIs('user.*') || request()->routeIs('gallery.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-cogs"></i>
                          <p>
                              Master Settings
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('role.index') }}"
                                  class="nav-link {{ request()->routeIs('role.*') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Roles</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('user.index') }}"
                                  class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Users</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('gallery.index') }}"
                                  class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Gallery</p>
                              </a>
                          </li>
                      </ul>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->

      </div>
      <!-- /.sidebar -->
  </aside>
