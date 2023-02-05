<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
    
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
           Data
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">3</span>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('workit.pelayanan')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pelayanan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('workit.pemasukan')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pemasukan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('workit.pengeluaran')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pengeluaran</p>
            </a>
          </li>
        </ul>
      </li>
        
      <li class="nav-item">
        <a href="pages/widgets.html" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Buat Akun
            <span class="right badge badge-danger">Baru</span>
          </p>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.sidebar-menu -->