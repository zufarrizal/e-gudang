  <aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="{{ asset('adminlte/index3.html') }}" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light">E-Gudang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">SUPERADMIN</li>
          <li class="nav-item">
            <a wire:navigate href="{{ route('superadmin.user.index') }}" class="nav-link @yield('menuSuperadminUser')">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a wire:navigate href="{{ route('superadmin.kategori.index') }}" class="nav-link @yield('menuSuperadminKategori')">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a wire:navigate href="{{ route('superadmin.barang.index') }}" class="nav-link @yield('menuSuperadminBarang')">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          <li class="nav-header">ADMIN</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>