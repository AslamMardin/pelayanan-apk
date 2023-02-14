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
              <p>Pelayanan</p>
            </a>
          </li>
      <li class="nav-item menu-open">
        <a href="#" class="nav-link">
          <i class="nav-icon bi bi-grid"></i>
          <p>
           Data
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">3</span>
          </p>
        </a>
        <ul class="nav nav-treeview">
          
         
          <li class="nav-item">
            <a href="{{route('workit.pemasukan')}}" class="nav-link">
              <i class="nav-icon bi bi-cash-coin"></i>
              <p>Pemasukan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('workit.pengeluaran')}}" class="nav-link">
              <i class="nav-icon bi bi-cash-coin"></i>
              <p>Pengeluaran</p>
            </a>
          </li>
        </ul>
      </li>
        
  
    </ul>
  </nav>
  <!-- /.sidebar-menu -->