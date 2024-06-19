  <!-- Sidebar Start -->
  <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
              <a href="{{ route('dashboard') }}" class="text-nowrap logo-img d-flex pt-3">
                  <img src="{{ asset('assets/images/logos/logo.png') }}" width="50" alt="" class="me-2" />
                  <h4 class="fw-bolder"> PERMIT DIGITAL</h4>
              </a>
              <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                  <i class="ti ti-x fs-8"></i>
              </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
              <ul id="sidebarnav">
                  <li class="nav-small-cap">
                      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                      <span class="hide-menu">Home</span>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link {{ Request::is('dashboard') ? 'active' : '' }}"
                          href="{{ route('dashboard') }}" aria-expanded="false">
                          <span>
                              <i class="ti ti-layout-dashboard"></i>
                          </span>
                          <span class="hide-menu">Dashboard</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link {{ Request::is('dashboard/surat*') ? 'active' : '' }}"
                          href="{{ route('surat-jsa.index') }}" aria-expanded="false">
                          <span>
                              <i class="ti ti-file-description"></i>
                          </span>
                          <span class="hide-menu">Surat</span>
                      </a>
                  </li>
                  <li class="nav-small-cap">
                      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                      <span class="hide-menu">DATA MASTER</span>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link {{ Request::is('dashboard/divisi*') ? 'active' : '' }}"
                          href="{{ route('divisi.index') }}" aria-expanded="false">
                          <span>
                              <i class="ti ti-building"></i>
                          </span>
                          <span class="hide-menu">Divisi</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link {{ Request::is('dashboard/user*') ? 'active' : '' }}"
                          href="{{ route('user.index') }}" aria-expanded="false">
                          <span>
                              <i class="ti ti-user-plus"></i>
                          </span>
                          <span class="hide-menu">User</span>
                      </a>
                  </li>
              </ul>
          </nav>

          <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->
