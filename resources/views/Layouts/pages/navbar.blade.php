<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{route('workit.dashboard')}}" class="nav-link">
              <i class="nav-icon bi bi-graph-up-arrow"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('workit.pelayanan')}}" class="nav-link">
              <i class="nav-icon bi bi-clipboard2-fill"></i>
              <p>Nota</p>
            </a>
          </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon bi bi-pin-angle-fill"></i>
          <p>
           Data
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">1</span>
          </p>
        </a>
        <ul class="nav nav-treeview">
          
         
          <li class="nav-item">
            <a href="{{route('workit.pemasukan')}}" class="nav-link">
              <i class="nav-icon bi bi-cash-coin"></i>
              <p>Keuntungan</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon bi bi-pin-angle-fill"></i>
          <p>
           Pengeluaran
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">2</span>
          </p>
        </a>
        <ul class="nav nav-treeview">
          
         
          <li class="nav-item">
            <a href="{{route('jemput.index')}}" class="nav-link">
              <i class="nav-icon bi bi-rocket-takeoff"></i>
              <p>Jemput</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('kebutuhan.index')}}" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>Kebutuhan</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-header">Options</li>
      <li class="nav-item">
        <a href="{{route('register')}}" class="nav-link">
          <i class="nav-icon bi bi-person-fill-lock"></i>
          <p>
            Buat Akun
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('pengaturan')}}" class="nav-link">
          <i class="nav-icon bi bi-gear-wide-connected"></i>
          <p>
            Pengaturan
          </p>
        </a>
      </li>
  
    </ul>
  </nav>
  <!-- /.sidebar-menu -->